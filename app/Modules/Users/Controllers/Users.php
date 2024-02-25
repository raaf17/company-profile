<?php

namespace App\Modules\Users\Controllers;

use CodeIgniter\Controller;

class Users extends Controller
{
  public function index() {
    echo view('App\Modules\Users\Views\index');
  }
}