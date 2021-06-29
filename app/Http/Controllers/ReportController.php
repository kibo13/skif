<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Movement;
use App\Models\Purchase;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

use PhpOffice\PhpWord\Element\AbstractContainer;
use PhpOffice\PhpWord\Element\Row;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\Style\Tab;
use PhpOffice\PhpWord\TemplateProcessor;

class ReportController extends Controller
{
  // repo.index 
  public function index()
  {
    // reports 
    $reports = config('constants.reports');

    return view('pages.reports.index', compact('reports'));
  }

  // repo.sales 
  public function sales(Request $request)
  {
    // dates 
    $from = $request->date_from;
    $to   = $request->date_to;

    // products 
    $products = DB::table('orders')
      ->join(
        'order_top',
        'order_top.order_id',
        '=',
        'orders.id'
      )
      ->join(
        'tops',
        'tops.id',
        '=',
        'order_top.top_id'
      )
      ->join(
        'products',
        'tops.product_id',
        '=',
        'products.id'
      )
      ->join(
        'colors',
        'colors.id',
        '=',
        'tops.color_id'
      )
      ->select(
        'orders.date_on',
        'order_top.top_id',
        'products.name as product',
        'colors.name as color',
        'products.price',
        'order_top.count',
        DB::raw('price * count as total')
      )
      ->whereBetween('date_on', [$from, $to])
      ->get();

    // template
    $tmp = new TemplateProcessor('reports/sales.docx');

    // filename
    $fn = 'Отчет по продажам за период с ' . getDMY($from) . ' по ' . getDMY($to);

    // table 
    $table = new Table(array('borderSize' => 10));
    $table->addRow();
    $table->addCell(1000)->addText('№', array('bold' => true));
    $table->addCell(4000)->addText('Товар', array('bold' => true));
    $table->addCell(1500)->addText('Цена', array('bold' => true));
    $table->addCell(1500)->addText('Кол-во', array('bold' => true));
    $table->addCell(2000)->addText('Сумма', array('bold' => true));

    // amount 
    $amount = 0;

    foreach ($products as $n => $product) {
      $item = $product->product . ', ' . $product->color;
      $price = number_format($product->price) . ' руб.';
      $sum = number_format($product->total) . ' руб.';
      $amount = $amount + $product->total;

      $table->addRow();
      $table->addCell(1000)->addText($n + 1);
      $table->addCell(4000)->addText($item, array('size' => '11'));
      $table->addCell(1500)->addText($price, array('size' => '11'));
      $table->addCell(1500)->addText($product->count, array('size' => '11'));
      $table->addCell(2000)->addText($sum, array('size' => '11'));
    }

    $tmp->setComplexBlock('t_sales', $table);
    $tmp->setValue('date_from', getDMY($from) . 'г.');
    $tmp->setValue('date_to', getDMY($to) . 'г.');
    $tmp->setValue('total', number_format($amount));
    $tmp->setValue('boss', getShortBoss());
    $tmp->saveAs($fn . '.docx');

    return response()->download($fn . '.docx')->deleteFileAfterSend(true);
  }

  // repo.budget 
  public function budget(Request $request)
  {
    // dates 
    $from = $request->date_from;
    $to   = $request->date_to;

    // template
    $tmp = new TemplateProcessor('reports/budget.docx');

    // filename
    $fn = 'Отчет по доходам и расходам за период с ' . getDMY($from) . ' по ' . getDMY($to);

    // orders
    $orders = Order::whereBetween('date_on', [$from, $to])->get();

    // purchases 
    $purchases = Purchase::whereBetween('date_off', [$from, $to])->get();

    // income and rate 
    $income = '';
    $rate = '';

    // totals
    $total_a = 0;
    $total_b = 0;
    $total_c = 0;

    // output 
    $output = '';

    foreach ($orders as $order) {
      $total_a += $order->total;

      $income = $income . '+' . number_format($order->total) . ' руб. / заказ №' . $order->code . '<w:br />';
    }

    foreach ($purchases as $purchase) {
      $total_b += $purchase->total;

      $rate = $rate . '-' . number_format($purchase->total) . ' руб. / ведом. №' . $purchase->code . '<w:br />';
    }

    if ($total_a > $total_b) {
      $total_c = $total_a - $total_b;
      $output = 'Прибыль за заданный период c ' . getDMY($from) . 'г. по ' . getDMY($to) . 'г. составила +' . number_format($total_c) . ' руб.';
    } else {
      $total_c = $total_b - $total_a;
      $output = 'Убыток за заданный период c ' . getDMY($from) . 'г. по ' . getDMY($to) . 'г. составил -' . number_format($total_c) . ' руб.';
    }

    $tmp->setValue('from', getDMY($from) . 'г.');
    $tmp->setValue('to', getDMY($to) . 'г.');
    $tmp->setValue('income', $income);
    $tmp->setValue('rate', $rate);
    $tmp->setValue('total_a', '+' . number_format($total_a) . ' руб.');
    $tmp->setValue('total_b', '-' . number_format($total_b) . ' руб.');
    $tmp->setValue('output', $output);
    $tmp->setValue('boss', getShortBoss());
    $tmp->saveAs($fn . '.docx');

    return response()->download($fn . '.docx')->deleteFileAfterSend(true);
  }

  // report for customer bill-depo
  public function depo(Order $order)
  {
    // template
    $tmp = new TemplateProcessor('reports/client-depo.docx');

    // prepayment
    if ($order->pay == 1) {
      $tmp->setValue('code', $order->id . '/1');
      $tmp->setValue('payment', 'Предоплата');
    }

    // payment
    else {
      $tmp->setValue('code', $order->id);
      $tmp->setValue('payment', 'Оплата');
    }

    $tmp->setValue('date', getDMY($order->date_on));

    // individual
    if ($order->customer->type_id == 1) {
      $lastname = $order->customer->lastname;
      $firstname = $order->customer->firstname;
      $surname = $order->customer->surname;
      $fio = $lastname . ' ' . $firstname . ' ' . $surname;

      $tmp->setValue('name', $fio);
      $tmp->setValue('id', 'ИИН ' . $order->customer->code);
    }
    // entity
    else {
      $tmp->setValue('name', $order->customer->name);
      $tmp->setValue('id', 'БИН ' . $order->customer->code);
    }

    // address
    $tmp->setValue('address', $order->customer->address);


    // table
    $table = new Table(array('borderSize' => 8));
    $table->addRow();
    $table->addCell(1000)->addText('№', array('bold' => true));
    $table->addCell(4500)->addText('Наименование товара', array('bold' => true));
    $table->addCell(1500)->addText('Кол-во', array('bold' => true));
    $table->addCell(1500)->addText('Цена', array('bold' => true));
    $table->addCell(1500)->addText('Сумма', array('bold' => true));

    foreach ($order->tops as $n => $top) {
      $product = $top->product->name . ', артикул ' . $top->product->code;

      $table->addRow();
      $table->addCell(1000)->addText($n + 1);
      $table->addCell(4500)->addText($product, array('size' => '8'));
      $table->addCell(1500)->addText($top->pivot->count . ' шт.');
      $table->addCell(1500)->addText(number_format($top->product->price) . ' руб.');
      $table->addCell(1500)->addText(number_format($top->getPriceForCount()) . ' руб.');
    }

    $tmp->setComplexBlock('t_depo', $table);

    // cost
    $tmp->setValue('total', calcTotal($order->total));
    $tmp->setValue('depo', calcDepo($order->total));

    // signature
    $tmp->setValue('boss', getShortBoss());
    $tmp->setValue('worker', $order->worker->fio);

    // filename
    $fn = 'Счет на оплату заказа №' . $order->id . ' от ' . getDMY($order->date_on);
    $tmp->saveAs($fn . '.docx');

    return response()->download($fn . '.docx')->deleteFileAfterSend(true);
  }

  // report for customer bill-debt
  public function debt(Order $order)
  {
    // template
    $tmp = new TemplateProcessor('reports/client-debt.docx');

    // debt
    $tmp->setValue('code', $order->id . '/2');
    $tmp->setValue('date', getDMY($order->date_on));
    $tmp->setValue('payment', 'Предоплата');

    // individual
    if ($order->customer->type_id == 1) {
      $lastname = $order->customer->lastname;
      $firstname = $order->customer->firstname;
      $surname = $order->customer->surname;
      $fio = $lastname . ' ' . $firstname . ' ' . $surname;

      $tmp->setValue('name', $fio);
      $tmp->setValue('id', 'ИИН ' . $order->customer->code);
    }
    // entity
    else {
      $tmp->setValue('name', $order->customer->name);
      $tmp->setValue('id', 'БИН ' . $order->customer->code);
    }

    // address
    $tmp->setValue('address', $order->customer->address);


    // table
    $table = new Table(array('borderSize' => 8));
    $table->addRow();
    $table->addCell(1000)->addText('№', array('bold' => true));
    $table->addCell(4500)->addText('Наименование товара', array('bold' => true));
    $table->addCell(1500)->addText('Кол-во', array('bold' => true));
    $table->addCell(1500)->addText('Цена', array('bold' => true));
    $table->addCell(1500)->addText('Сумма', array('bold' => true));

    foreach ($order->tops as $n => $top) {
      $product = $top->product->name . ', артикул ' . $top->product->code;

      $table->addRow();
      $table->addCell(1000)->addText($n + 1);
      $table->addCell(4500)->addText($product, array('size' => '8'));
      $table->addCell(1500)->addText($top->pivot->count . ' шт.');
      $table->addCell(1500)->addText(number_format($top->product->price) . ' руб.');
      $table->addCell(1500)->addText(number_format($top->getPriceForCount()) . ' руб.');
    }

    $tmp->setComplexBlock('t_debt', $table);

    // cost
    $tmp->setValue('total', calcTotal($order->total));
    $tmp->setValue('debt', calcDebt($order->total));

    // signature
    $tmp->setValue('boss', getShortBoss());
    $tmp->setValue('worker', $order->worker->fio);

    // filename
    $fn = 'Счет на оплату заказа №' . $order->id . '-2 от ' . getDMY($order->date_on);
    $tmp->saveAs($fn . '.docx');

    return response()->download($fn . '.docx')->deleteFileAfterSend(true);
  }

  // report for customer contract
  public function term(Order $order)
  {
    // template
    $tmp = new TemplateProcessor('reports/client-term.docx');

    // individual
    if ($order->customer->type_id == 1) {

      // filename
      $fn = 'Договор №' . $order->id . ' от ' . getDMY($order->date_on) . ' [ФЛ]';

      // customer
      $lastname = $order->customer->lastname;
      $firstname = $order->customer->firstname;
      $surname = $order->customer->surname;

      $customer_full = $lastname . ' ' . $firstname . ' ' . $surname;
      $customer_short = getFIO($lastname, $firstname, $surname);
    }
    // entity
    else {

      // filename
      $fn = 'Договор №' . $order->id . ' от ' . getDMY($order->date_on) . ' [ЮЛ]';

      // customer
      $customer_full = $order->customer->name;
      $customer_short = $order->customer->name;
    }

    // filling in the fields
    $tmp->setValue('id', $order->id);
    $tmp->setValue('date_on', getDMY($order->date_on) . 'г.');
    $tmp->setValue('boss_full', getFullBoss());
    $tmp->setValue('customer_full', $customer_full);
    $tmp->setValue('total', number_format($order->total) . ' руб.');
    $tmp->setValue('address', $order->customer->address);
    $tmp->setValue('phone', $order->customer->phone);
    $tmp->setValue('customer_short', $customer_short);
    $tmp->setValue('boss_short', getShortBoss());
    $tmp->saveAs($fn . '.docx');

    return response()->download($fn . '.docx')->deleteFileAfterSend(true);
  }

  // report for bills
  public function bill(Movement $movement)
  {
    // type of transaction
    $tot = $movement->tot;

    // income
    if ($tot == 1) {
      // template
      $tmp = new TemplateProcessor('reports/bill-in.docx');

      // filename
      $fn = 'Приходная накладная №' . $movement->code . ' от ' . getDMY($movement->date_move);

      // storeman
      $tmp->setValue('store', $movement->user->worker->fio);
    }
    // outcome
    else {
      // template
      $tmp = new TemplateProcessor('reports/bill-out.docx');

      // filename
      $fn = 'Расходная накладная №' . $movement->code . ' от ' . getDMY($movement->date_move);

      // master
      $tmp->setValue('master', $movement->worker->fio);

      // storeman
      $tmp->setValue('store', $movement->user->worker->fio);
    }

    $tmp->setValue('num_bill', $movement->code);
    $tmp->setValue('date_bill', getDMY($movement->date_move));
    $tmp->setValue('total', number_format($movement->getFullPrice()));

    // table
    $table = new Table(array('borderSize' => 8));
    $table->addRow();
    $table->addCell(1000)->addText('№', array('bold' => true));
    $table->addCell(3000)->addText('Наименование', array('bold' => true));
    $table->addCell(1000)->addText('Ед.изм.', array('bold' => true));
    $table->addCell(1000)->addText('Длина', array('bold' => true));
    $table->addCell(1000)->addText('Ширина', array('bold' => true));
    $table->addCell(1000)->addText('Толщина', array('bold' => true));
    $table->addCell(1500)->addText('Кол-во', array('bold' => true));
    $table->addCell(1500)->addText('Цена', array('bold' => true));
    $table->addCell(1500)->addText('Сумма', array('bold' => true));

    foreach ($movement->moms as $n => $mom) {
      $table->addRow();
      $table->addCell(1000)->addText($n + 1);
      $table->addCell(3000)->addText($mom->material->name, array('size' => '8'));
      $table->addCell(1000)->addText($mom->material->measure, array('size' => '8'));
      $table->addCell(1000)->addText($mom->material->L, array('size' => '8'));
      $table->addCell(1000)->addText($mom->material->B, array('size' => '8'));
      $table->addCell(1000)->addText($mom->material->H, array('size' => '8'));
      $table->addCell(1500)->addText($mom->count, array('size' => '8'));
      $table->addCell(1500)->addText(number_format($mom->price) . ' руб.', array('size' => '8'));
      $table->addCell(1500)->addText(number_format($mom->getPriceForCount()) . ' руб.', array('size' => '8'));
    }

    $tmp->setComplexBlock('t_bill', $table);
    $tmp->saveAs($fn . '.docx');

    return response()->download($fn . '.docx')->deleteFileAfterSend(true);
  }

  // report for purchase of materials 
  public function list(Purchase $purchase)
  {
    // template
    $tmp = new TemplateProcessor('reports/list.docx');

    // filename
    $fn = 'Ведомость на закупку материалов №' . $purchase->code . ' от ' . getDMY($purchase->date_p);

    $tmp->setValue('code', $purchase->code);
    $tmp->setValue('author', $purchase->user->worker->fio);
    $tmp->setValue('date', getDMY($purchase->date_p));
    $tmp->setValue('boss', getShortBoss());

    // table
    $table = new Table(array('borderSize' => 10));
    $table->addRow();
    $table->addCell(1000)->addText('№', array('bold' => true));
    $table->addCell(3000)->addText('Наименование', array('bold' => true));
    $table->addCell(1000)->addText('Длина', array('bold' => true));
    $table->addCell(1000)->addText('Ширина', array('bold' => true));
    $table->addCell(1000)->addText('Толщина', array('bold' => true));
    $table->addCell(1500)->addText('Кол-во', array('bold' => true));
    $table->addCell(1000)->addText('Ед.изм.', array('bold' => true));

    foreach ($purchase->poms as $n => $pom) {
      $table->addRow();
      $table->addCell(1000)->addText($n + 1);
      $table->addCell(3000)->addText($pom->material->name, array('size' => '11'));
      $table->addCell(1500)->addText($pom->material->L, array('size' => '11'));
      $table->addCell(1500)->addText($pom->material->B, array('size' => '11'));
      $table->addCell(1500)->addText($pom->material->H, array('size' => '11'));
      $table->addCell(1500)->addText($pom->count, array('size' => '11'));
      $table->addCell(1000)->addText($pom->material->measure, array('size' => '11'));
    }

    $tmp->setComplexBlock('t_list', $table);
    $tmp->saveAs($fn . '.docx');

    return response()->download($fn . '.docx')->deleteFileAfterSend(true);
  }

  // report for supplier bill-depo
  public function supDepo(Purchase $purchase)
  {
    // template
    $tmp = new TemplateProcessor('reports/sup-depo.docx');

    // prepayment
    if ($purchase->pay == 1) {
      $tmp->setValue('code', $purchase->code . '/1');
      $tmp->setValue('payment', 'Предоплата');
    }

    // payment
    else {
      $tmp->setValue('code', $purchase->code);
      $tmp->setValue('payment', 'Оплата');
    }

    $tmp->setValue('date', getDMY($purchase->date_off));
    $tmp->setValue('name', $purchase->supplier->name);
    $tmp->setValue('id', 'БИН ' . $purchase->supplier->code);

    // full address
    $country = $purchase->supplier->country;
    $index = $purchase->supplier->index;
    $city = $purchase->supplier->city;
    $st = $purchase->supplier->address;
    $address_full = $country . ', ' . $index . ', ' .  $city . ', ' .   $st;

    $tmp->setValue('address', $address_full);

    // table
    $table = new Table(array('borderSize' => 10));
    $table->addRow();
    $table->addCell(1000)->addText('№', array('bold' => true));
    $table->addCell(3000)->addText('Наименование', array('bold' => true));
    $table->addCell(1000)->addText('Длина', array('bold' => true));
    $table->addCell(1000)->addText('Ширина', array('bold' => true));
    $table->addCell(1000)->addText('Толщина', array('bold' => true));
    $table->addCell(1500)->addText('Кол-во', array('bold' => true));
    $table->addCell(1000)->addText('Ед.изм.', array('bold' => true));

    foreach ($purchase->poms as $n => $pom) {
      $table->addRow();
      $table->addCell(1000)->addText($n + 1);
      $table->addCell(3000)->addText($pom->material->name, array('size' => '11'));
      $table->addCell(1500)->addText($pom->material->L, array('size' => '11'));
      $table->addCell(1500)->addText($pom->material->B, array('size' => '11'));
      $table->addCell(1500)->addText($pom->material->H, array('size' => '11'));
      $table->addCell(1500)->addText($pom->count, array('size' => '11'));
      $table->addCell(1000)->addText($pom->material->measure, array('size' => '11'));
    }

    $tmp->setComplexBlock('t_depo', $table);

    // cost
    $tmp->setValue('total', calcTotal($purchase->total));
    $tmp->setValue('depo', calcDepo($purchase->total));

    // signature
    $tmp->setValue('boss', getShortBoss());

    // filename
    $fn = 'Счет на оплату заказа №' . $purchase->code . ' от ' . getDMY($purchase->date_off);
    $tmp->saveAs($fn . '.docx');

    return response()->download($fn . '.docx')->deleteFileAfterSend(true);
  }

  // report for supplier bill-debt
  public function supDebt(Purchase $purchase)
  {
    // template
    $tmp = new TemplateProcessor('reports/sup-debt.docx');

    // debt
    $tmp->setValue('code', $purchase->code . '/2');
    $tmp->setValue('date', getToday());
    $tmp->setValue('payment', 'Предоплата');

    $tmp->setValue('date', getDMY($purchase->date_off));
    $tmp->setValue('name', $purchase->supplier->name);
    $tmp->setValue('id', 'БИН ' . $purchase->supplier->code);

    // full address
    $country = $purchase->supplier->country;
    $index = $purchase->supplier->index;
    $city = $purchase->supplier->city;
    $st = $purchase->supplier->address;
    $address_full = $country . ', ' . $index . ', ' .  $city . ', ' .   $st;

    // address
    $tmp->setValue('address', $address_full);

    // table
    $table = new Table(array('borderSize' => 10));
    $table->addRow();
    $table->addCell(1000)->addText('№', array('bold' => true));
    $table->addCell(3000)->addText('Наименование', array('bold' => true));
    $table->addCell(1000)->addText('Длина', array('bold' => true));
    $table->addCell(1000)->addText('Ширина', array('bold' => true));
    $table->addCell(1000)->addText('Толщина', array('bold' => true));
    $table->addCell(1500)->addText('Кол-во', array('bold' => true));
    $table->addCell(1000)->addText('Ед.изм.', array('bold' => true));

    foreach ($purchase->poms as $n => $pom) {
      $table->addRow();
      $table->addCell(1000)->addText($n + 1);
      $table->addCell(3000)->addText($pom->material->name, array('size' => '11'));
      $table->addCell(1500)->addText($pom->material->L, array('size' => '11'));
      $table->addCell(1500)->addText($pom->material->B, array('size' => '11'));
      $table->addCell(1500)->addText($pom->material->H, array('size' => '11'));
      $table->addCell(1500)->addText($pom->count, array('size' => '11'));
      $table->addCell(1000)->addText($pom->material->measure, array('size' => '11'));
    }

    $tmp->setComplexBlock('t_debt', $table);

    // cost
    $tmp->setValue('total', calcTotal($purchase->total));
    $tmp->setValue('debt', calcDebt($purchase->total));

    // signature
    $tmp->setValue('boss', getShortBoss());

    // filename
    $fn = 'Счет на оплату заказа №' . $purchase->code . '-2 от ' . getToday();
    $tmp->saveAs($fn . '.docx');

    return response()->download($fn . '.docx')->deleteFileAfterSend(true);
  }

  // report for supplier contract 
  public function agree(Purchase $purchase)
  {
    // template
    $tmp = new TemplateProcessor('reports/sup-term.docx');

    // filename
    $fn = 'Договор №' . $purchase->code . '-' . $purchase->id . ' от ' . getDMY($purchase->date_off);

    // supplier 
    $lastname = $purchase->supplier->lastname;
    $firstname = $purchase->supplier->firstname;
    $surname = $purchase->supplier->surname;

    $supplier_full = $lastname . ' ' . $firstname . ' ' . $surname;
    $supplier_short = getFIO($lastname, $firstname, $surname);
    $company = $purchase->supplier->name;

    // full address
    $country = $purchase->supplier->country;
    $index = $purchase->supplier->index;
    $city = $purchase->supplier->city;
    $st = $purchase->supplier->address;
    $address_full = $country . ', ' . $index . ', ' .  $city . ', ' .   $st;

    // filling in the fields
    $tmp->setValue('id', $purchase->code . '/' . $purchase->id);
    $tmp->setValue('date_on', getDMY($purchase->date_off) . 'г.');
    $tmp->setValue('boss_full', getFullBoss());
    $tmp->setValue('supplier_company', $company);
    $tmp->setValue('supplier_boss', $supplier_full);
    $tmp->setValue('total', number_format($purchase->total) . ' руб.');
    $tmp->setValue('boss_short', getShortBoss());
    $tmp->setValue('supplier_short', $supplier_short);
    $tmp->setValue('supplier_id', $purchase->supplier->code);
    $tmp->setValue('supplier_address', $address_full);

    // table
    $table = new Table(array('borderSize' => 10));
    $table->addRow();
    $table->addCell(1000)->addText('№', array('bold' => true));
    $table->addCell(3000)->addText('Наименование', array('bold' => true));
    $table->addCell(1000)->addText('Длина', array('bold' => true));
    $table->addCell(1000)->addText('Ширина', array('bold' => true));
    $table->addCell(1000)->addText('Толщина', array('bold' => true));
    $table->addCell(1500)->addText('Кол-во', array('bold' => true));
    $table->addCell(1000)->addText('Ед.изм.', array('bold' => true));

    foreach ($purchase->poms as $n => $pom) {
      $table->addRow();
      $table->addCell(1000)->addText($n + 1);
      $table->addCell(3000)->addText($pom->material->name, array('size' => '11'));
      $table->addCell(1500)->addText($pom->material->L, array('size' => '11'));
      $table->addCell(1500)->addText($pom->material->B, array('size' => '11'));
      $table->addCell(1500)->addText($pom->material->H, array('size' => '11'));
      $table->addCell(1500)->addText($pom->count, array('size' => '11'));
      $table->addCell(1000)->addText($pom->material->measure, array('size' => '11'));
    }

    $tmp->setComplexBlock('t_materials', $table);
    $tmp->saveAs($fn . '.docx');

    return response()->download($fn . '.docx')->deleteFileAfterSend(true);
  }
}
