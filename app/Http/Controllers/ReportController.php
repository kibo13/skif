<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

use PhpOffice\PhpWord\Element\AbstractContainer;
use PhpOffice\PhpWord\Element\Row;
use PhpOffice\PhpWord\Element\Table;
use PhpOffice\PhpWord\TemplateProcessor;

class ReportController extends Controller
{
  // report for customer bill-depo
  public function depo(Order $order)
  {
    // template
    $tmp = new TemplateProcessor('reports/client-depo.docx');

    // prepayment
    if ($order->pay == 1) {
      $tmp->setValue('code', $order->code . '/1');
      $tmp->setValue('payment', 'Предоплата');
    }

    // payment
    else {
      $tmp->setValue('code', $order->code);
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

    foreach ($order->types as $n => $type) {
      $product = $type->product->name . ', артикул ' . $type->product->code;

      $table->addRow();
      $table->addCell(1000)->addText($n + 1);
      $table->addCell(4500)->addText($product, array('size' => '8'));
      $table->addCell(1500)->addText($type->pivot->count . ' шт.');
      $table->addCell(1500)->addText(number_format($type->product->price) . ' руб.');
      $table->addCell(1500)->addText(number_format($type->getPriceForCount()) . ' руб.');
    }

    $tmp->setComplexBlock('t_depo', $table);

    // cost
    $tmp->setValue('total', calcTotal($order->total));
    $tmp->setValue('depo', calcDepo($order->total));

    // signature
    $tmp->setValue('boss', getShortBoss());
    $tmp->setValue('worker', $order->worker->fio);

    // filename
    $fn = 'Счет на оплату заказа №' . $order->code . ' от ' . getDMY($order->date_on);
    $tmp->saveAs($fn . '.docx');

    return response()->download($fn . '.docx')->deleteFileAfterSend(true);
  }

  // report for customer bill-debt
  public function debt(Order $order)
  {
    // template
    $tmp = new TemplateProcessor('reports/client-debt.docx');

    // debt
    $tmp->setValue('code', $order->code . '/2');
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

    foreach ($order->types as $n => $type) {
      $product = $type->product->name . ', артикул ' . $type->product->code;

      $table->addRow();
      $table->addCell(1000)->addText($n + 1);
      $table->addCell(4500)->addText($product, array('size' => '8'));
      $table->addCell(1500)->addText($type->pivot->count . ' шт.');
      $table->addCell(1500)->addText(number_format($type->product->price) . ' руб.');
      $table->addCell(1500)->addText(number_format($type->getPriceForCount()) . ' руб.');
    }

    $tmp->setComplexBlock('t_debt', $table);

    // cost
    $tmp->setValue('total', calcTotal($order->total));
    $tmp->setValue('debt', calcDebt($order->total));

    // signature
    $tmp->setValue('boss', getShortBoss());
    $tmp->setValue('worker', $order->worker->fio);

    // filename
    $fn = 'Счет на оплату заказа №' . $order->code . '-2 от ' . getDMY($order->date_on);
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
      $fn = 'Договор №' . $order->code . '-' . $order->id . ' от ' . getDMY($order->date_on) . ' [ФЛ]';

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
      $fn = 'Договор №' . $order->code . '-' . $order->id . ' от ' . getDMY($order->date_on) . ' [ЮЛ]';

      // customer
      $customer_full = $order->customer->name;
      $customer_short = $order->customer->name;
    }

    // filling in the fields
    $tmp->setValue('id', $order->code . '/' . $order->id);
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
}
