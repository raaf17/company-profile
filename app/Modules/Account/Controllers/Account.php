<?php

namespace App\Modules\Account\Controllers;

use CodeIgniter\Controller;
use \Myth\Auth\Models\UserModel;

class Account extends Controller
{
  protected $userModel;
  protected $db;
  protected $builder;

  public function __construct()
  {
    $this->userModel = new UserModel();
    $this->db = \Config\Database::connect();
    $this->builder = $this->db->table('users');
  }

  public function index()
  {
    $data = [
      'title' => 'Kelola Akun',
      'user_list' => $this->builder->get()->getResultObject()
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Account\Views\index', $data);
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function deleteAccount()
  {
    if ($this->request->isAJAX()) {
      $id = $this->request->getVar('id');
      $this->userModel->where('id', $id)->delete();
      $result = [
        'success' => 'Data Akun Berhasil dihapus'
      ];

      echo json_encode($result);
    } else {
      exit('404 Not Found');
    }
  }
}
