<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
  public function index() {
    $suppliers = Supplier::all();
    return view('supplier.index', ['suppliers' => $suppliers]);
  }
}
