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
      $c = (object) $c;
      $consumeStock = new ConsumeStock;
      $consumeStock->consumecode = $c->consumecode;
      $consumeStock->status = $c->status;
      $consumeStock->productcode = $c->productcode;
      $consumeStock->remarks = $c->remarks;
      $consumeStock->supplierdisc = $c->supplierdisc;
      $consumeStock->dateentry = $c->dateentry;
      $consumeStock->hospitalid = $c->hospitalid;
      $consumeStock->sync = 1;
      $consumeStock->usercode = $c->usercode;
      $consumeStock->discountpercentage = $c->discountpercentage;
      $consumeStock->contactno = $c->contactno;
      $consumeStock->percentage = $c->percentage;
      $consumeStock->amount = $c->amount;
      $consumeStock->discountedamount = $c->discountedamount;
      $consumeStock->hospital_id = $h_id;
      $consumeStock->save();
    }

    if($returns)
    foreach($returns as $i => $r) {
      $r = (object) $r;
      $mreturn = new MReturn;
      $mreturn->returncode = $r->returncode;
      $mreturn->status = $r->status;
      $mreturn->stockcode = $r->stockcode;
      $mreturn->remarks = $r->remarks;
      $mreturn->quantity = $r->quantity;
      $mreturn->dateentry = $this->validateDate($r->dateentry);
      $mreturn->hospitalid = $r->hospitalid;
      $mreturn->sync = 1;
      $mreturn->usercode = $r->usercode;
      $mreturn->hospital_id = $h_id;
      $mreturn->save();
    }

    if($sub_categories)
    foreach($sub_categories as $i => $s) {
      $s = (object) $s;
      $subcat = new SubCategory;
      $subcat->subcatproductcode = $s->subcatproductcode;
      $subcat->subcatproductdescription = $s->subcatproductdescription;
      $subcat->remarks = $s->remarks;
      $subcat->status = $s->status;
      $subcat->usercode = $s->usercode;
      $subcat->dateentry = $this->validateDate($s->dateentry);
      $subcat->sync = 1;
      $subcat->hospitalid = $s->hospitalid;
      $subcat->hospital_id = $h_id;
      $subcat->save();
    }

    if($product_categories)
    foreach($product_categories as $i => $p) {
      $p = (object) $p;
      $pcat = new ProductCategory;
      $pcat->catproductcode = $p->catproductcode;
      $pcat->catproductdescription = $p->catproductdescription;
      $pcat->remarks = $p->remarks;
      $pcat->status = $p->status;
      $pcat->usercode = $p->usercode;
      $pcat->dateentry = $this->validateDate($p->dateentry);
      $pcat->hospitalid = $p->hospitalid;
      $pcat->sync = 1;
      $pcat->hospital_id = $h_id;
      $pcat->save();
    }

    if($accounts)
    foreach($accounts as $i => $a) {
      $a = (object) $a;
      $account = new Account;
      $account->accountType = $a->accountType;
      $account->status = $a->status;
      $account->lastname = $a->lastname;
      $account->middlename = $a->middlename;
      $account->firstname = $a->firstname;
      $account->extension = $a->extension;
      $account->username = $a->username;
      $account->password = $a->password;
      $account->sync = 1;
      $account->hospital_id = $h_id;
      $account->save();
    }

    if($products)
    foreach($products as $i => $p) {
      $p = (object) $p;
      $product = new Product;
      $product->productcode = $p->productcode;
      $product->productdescription = $p->productdescription;
      $product->catproductcode = $p->catproductcode;
      $product->subcatproductcode = $p->subcatproductcode;
      $product->remarks = $p->remarks;
      $product->status = $p->status;
      $product->usercode = $p->usercode;
      $product->dateentry = $this->validateDate($p->dateentry);
      $product->hospitalid = $p->hospitalid;
      $product->sync = 1;
      $product->price = $p->price;
      $product->hospital_id = $h_id;
      $product->save();
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
