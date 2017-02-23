<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use App\Patient;
use App\Stock;
use App\Supplier;
use App\ConsumeStock;
use App\MReturn;
use App\SubCategory;
use App\ProductCategory;
use App\Account;
use App\Series;
use App\Product;

class SyncController extends Controller
{
  public function index() {

  }

  public function sync(Request $request) {
    $request = (object) $request->hospital;
    $tables = $request->tables;
    $patients = $tables['patients'];
    $stocks = $tables['stocks'];
    $suppliers = $tables['suppliers'];
    $series = $tables['series'];
    $consume_stocks = $tables['consume_stocks'];
    $returns = $tables['returns'];
    $sub_categories = $tables['sub_categories'];
    $product_categories = $tables['product_categories'];
    $accounts = $tables['accounts'];
    $products = $tables['products'];

    $hospital = Hospital::firstOrNew(['hospitalid' => $request->hospitalid]);
    $hospital->hospitaldescription = $request->hospitaldescription;
    $hospital->remarks = $request->remarks;
    $hospital->status = $request->status;
    $hospital->usercode = $request->usercode;
    $hospital->dateentry = $request->dateentry;
    $hospital->save();

    $h_id = $hospital->id;

    if($patients)
    foreach($patients as $i => $p) {
      $p = (object) $p;
      $patient = new Patient;
      $patient->patient = $p->patient;
      $patient->firstname = $p->firstname;
      $patient->middlename = $p->middlename;
      $patient->lastname = $p->lastname;
      $patient->extension = $p->extension;
      $patient->age = $p->age;
      $patient->desc = $p->desc;
      $patient->gender = $p->gender;
      $patient->address = $p->address;
      $patient->contact = $p->contact;
      $patient->bloodtype = $p->bloodtype;
      $patient->height = $p->height;
      $patient->weight = $p->weight;
      $patient->fathername = $p->fathername;
      $patient->fatherstat = $p->fatherstat;
      $patient->mothername = $p->mothername;
      $patient->motherstat = $p->motherstat;
      $patient->parentsstat = $p->parentsstat;
      $patient->photo = $p->photo;
      $patient->remarks = $p->remarks;
      $patient->date = $p->date;
      $patient->hospital_id = $h_id;
      $patient->save();
    }

    if($stocks)
    foreach($stocks as $i => $s) {
      $s = (object) $s;
      $stock = new Stock;
      $stock->stockcode = $s->stockcode;
      $stock->suppliercode = $s->suppliercode;
      $stock->comment = $s->comment;
      $stock->productcode = $s->productcode;
      $stock->damageqty = $s->damageqty;
      $stock->damagecomment = $s->damagecomment;
      $stock->totalcost = $s->totalcost;
      $stock->dateentry = $this->validateDate($s->dateentry);
      $stock->usercode = $s->usercode;
      $stock->hospitalid = $s->hospitalid;
      $stock->consumed = $s->consumed;
      $stock->availablestock = $s->availablestock;
      $stock->quantity = $s->quantity;
      $stock->returnstat = $s->returnstat;
      $stock->status = $s->status;
      $stock->supplierprice = $s->supplierprice;
      $stock->saleprice = $s->saleprice;
      $stock->unitcode = $s->unitcode;
      $stock->sync = 1;
      $stock->hospital_id = $h_id;
      $stock->save();
    }

    if($suppliers)
    foreach($suppliers as $i => $s) {
      $s = (object) $s;
      $supplier = new Supplier;
      $supplier->suppliercode = $s->suppliercode;
      $supplier->status = $s->status;
      $supplier->remarks = $s->remarks;
      $supplier->dateentry = $s->dateentry;
      $supplier->hospitalid = $s->hospitalid;
      $supplier->sync = 1;
      $supplier->usercode = $s->usercode;
      $supplier->contactno = $s->contactno;
      $supplier->contactperson = $s->contactperson;
      $supplier->name = $s->name;
      $supplier->hospital_id = $h_id;
      $supplier->save();
    }

    if($series)
    foreach($series as $i => $s) {
      $s = (object) $s;
      $ser = new Series;
      $ser->description = $s->description;
      $ser->series = $s->series;
      $ser->hospital_id = $h_id;
      $ser->save();
    }

    if($consume_stocks)
    foreach($consume_stocks as $i => $c) {

    }

    return ["message" => "success"];
  }

  public function validateDate($date) {
    $date = \DateTime::createFromFormat('Y-m-d H:i:s', $date);
    if(!$date) {
      return '2000-01-01 00:00:00';
    }
    return  $date;
  }
}
