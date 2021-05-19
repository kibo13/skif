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
    } 

    // payment 
    else {
      $tmp->setValue('code', $order->code);
    }

    $tmp->setValue('date', getDMY($order->date_on));

    // filename 
    $fn = 'Счет по заказу №' . $order->code . ' от ' . getDMY($order->date_on);
    $tmp->saveAs($fn . '.docx');

    return response()->download($fn . '.docx')->deleteFileAfterSend(true);
  } 
}
