<?php

namespace App\Modules\Team\Controllers;

use CodeIgniter\Controller;
use App\Modules\Team\Models\TeamModel;
use Faker\Provider\Base;

class Team extends Controller
{
  protected $team;

  public function __construct()
  {
    $this->team = new TeamModel();
  }
  public function index()
  {
    $data = [
      'title' => 'Team | Company Profile',
      'team_list' => $this->team->findAll()
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Team\Views\index');
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function addTeam()
  {
    $rules = $this->validate([
      'name' => 'required',
      'position' => 'required',
      'fb' => 'required',
      'ig' => 'required',
      'image' => 'max_size[image, 2048]|uploaded[image]|is_image[image]|ext_in[image,png,jpg,jpeg]'
    ]);

    if ($rules) {
      session()->setFlashdata('failed', 'Data Produk Gagal ditambahkan');
      return redirect()->back()->withInput();
    }

    $image = $this->request->getFile('team_image');
    $image_name = $image->getRandomName();
    $image->move(WRITEPATH . '../public/asset_admin/img/team/', $image_name);
    $data = [
      'name' => esc($this->request->getPost('name')),
      'position' => $this->request->getPost('position'),
      'fb' => $this->request->getPost('fb'),
      'ig' => $this->request->getPost('ig'),
      'team_image' => $image_name
    ];
    $this->team->insert($data);

    return redirect()->to(base_url('team'))->with('success', 'Data Berhasil ditambahkan');
  }

  public function deleteTeam($id_team)
  {
    $team = $this->team->find($id_team);
    unlink(WRITEPATH . '../public/asset_admin/img/team/' . $team->team_image);
    $this->team->where('id_team', $id_team)->delete();

    return redirect()->back()->with('success', 'Data Berhasil dihapus');
  }
}