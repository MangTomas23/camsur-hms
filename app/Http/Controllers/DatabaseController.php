<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatabaseController extends Controller
{
  public function index() {
    return view('database.index');
  }

  public function backup() {
    $host = env('DB_HOST');
    $user = env('DB_USERNAME');
    $password = env('DB_PASSWORD');
    $db = env('DB_DATABASE');

    $backupfile = './dumps/hms' . date("Y-m-d-H-i-s") . '.gz';
    $command = "mysqldump --opt -h $host --user=$user --password=$password $db | gzip > $backupfile";
    exec($command);
    return response()->download($backupfile);
  }
}
