<?php

namespace App\Modules\Dashboard\Controllers;

use App\Modules\Product\Models\CategoryModel;
use App\Modules\Product\Models\ProductModel;
use App\Modules\Team\Models\TeamModel;
use CodeIgniter\Controller;
use Myth\Auth\Models\UserModel;

class Dashboard extends Controller
{
  protected $product;
  protected $category;
  protected $user;
  protected $team;

  public function __construct()
  {
    $this->product = new ProductModel();
    $this->category = new CategoryModel();
    $this->user = new UserModel();
    $this->team = new TeamModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Admin Panel',
      'product_list' => $this->product->findAll(),
      'product_count' => $this->product->countAllResults(),
      'category_count' => $this->category->countAllResults(),
      'user_count' => $this->user->countAllResults(),
      'team_count' => $this->team->countAllResults()
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Dashboard\Views\index', $data);
    echo view('App\Modules\Layouts\Views\footer');
  }
}