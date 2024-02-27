<?php

namespace App\Modules\Slider\Controllers;

use CodeIgniter\Controller;
use App\Modules\Slider\Models\SliderModel;
use Faker\Provider\Base;

class Slider extends Controller
{
  protected $slider;

  public function __construct()
  {
    $this->slider = new SliderModel();
  }
  public function index()
  {
    $data = [
      'title' => 'Slider | Company Profile',
      'slider_list' => $this->slider->findAll()
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Slider\Views\index');
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function addSlider()
  {
    $rules = $this->validate([
      'title' => 'required',
      'description1' => 'required',
      'image' => 'max_size[image, 2048]|uploaded[image]|is_image[image]|ext_in[image,png,jpg,jpeg]'
    ]);

    if ($rules) {
      session()->setFlashdata('failed', 'Data Produk Gagal ditambahkan');
      return redirect()->back()->withInput();
    }

    $image = $this->request->getFile('image_slider');
    $image_name = $image->getRandomName();
    $image->move(WRITEPATH . '../public/asset_admin/img/slider/', $image_name);
    $data = [
      'title' => esc($this->request->getPost('title')),
      'description' => $this->request->getPost('description2'),
      'image_slider' => $image_name
    ];
    $this->slider->insert($data);

    return redirect()->to(base_url('slider'))->with('success', 'Data Berhasil ditambahkan');
  }

  public function deleteSlider($id_slider)
  {
    $slider = $this->slider->find($id_slider);
    unlink(WRITEPATH . '../public/asset_admin/img/slider/' . $slider->image_slider);
    $this->slider->where('id_slider', $id_slider)->delete();

    return redirect()->back()->with('success', 'Data Berhasil dihapus');
  }
}