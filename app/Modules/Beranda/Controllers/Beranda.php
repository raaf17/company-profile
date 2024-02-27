<?php

namespace App\Modules\Beranda\Controllers;

use App\Modules\Slider\Models\SliderModel;
use App\Modules\Team\Models\TeamModel;
use CodeIgniter\Controller;
use Myth\Auth\Models\UserModel;

class Beranda extends Controller
{
  protected $userModel;
  protected $sliderModel;
  protected $teamModel;

  public function __construct()
  {
    $this->userModel = new UserModel();
    $this->sliderModel = new SliderModel();
    $this->teamModel = new TeamModel();
  }

  public function index()
  {
    $data = [
      'title' => 'Beranda | Company Profile',
      'user_list' => $this->userModel->findAll(),
      'slider_list' => $this->sliderModel->findAll(),
      'team_list' => $this->teamModel->findAll()
    ];

    echo view('App\Modules\Beranda\Views\index', $data);
  }
}