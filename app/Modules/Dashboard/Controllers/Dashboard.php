<?php

namespace App\Modules\Dashboard\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
  public function index()
  {
    $data['title'] = "Admin Panel";

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Dashboard\Views\index');
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function detail()
  {
    $data['title'] = "Admin Panel | Detail";

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Dashboard\Views\detail');
    echo view('App\Modules\Layouts\Views\footer');
  }
}