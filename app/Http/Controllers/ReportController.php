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
  // report for depo
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
    $tmp->setValue('boss', getBoss());
    $tmp->setValue('worker', $order->worker->fio);

    // filename
    $fn = 'Счет на оплату заказа №' . $order->code . ' от ' . getDMY($order->date_on);
    $tmp->saveAs($fn . '.docx');

    return response()->download($fn . '.docx')->deleteFileAfterSend(true);
  }

  // report for debt
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
    $tmp->setValue('boss', getBoss());
    $tmp->setValue('worker', $order->worker->fio);

    // filename
    $fn = 'Счет на оплату заказа №' . $order->code . '-2 от ' . getDMY($order->date_on);
    $tmp->saveAs($fn . '.docx');

    return response()->download($fn . '.docx')->deleteFileAfterSend(true);
  }
}
