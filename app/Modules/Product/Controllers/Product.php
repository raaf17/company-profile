<?php

namespace App\Modules\Product\Controllers;

use CodeIgniter\Controller;
use App\Modules\Product\Models\CategoryModel;
use App\Modules\Product\Models\ProductModel;

class Product extends Controller
{
  protected $category;
  protected $product;

  public function __construct()
  {
    $this->category = new CategoryModel();
    $this->product = new ProductModel();
  }

  // Menu Daftar Produk
  public function index()
  {
    $data = [
      'title' => 'Produk | Daftar Produk',
      'product_list' => $this->product->orderBy('id_product', 'DESC')->findAll()
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Product\Views\index', $data);
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function newProduct()
  {
    $data = [
      'title' => 'Tambah Produk',
      'category_product' => $this->category->findAll(),
      'validation' => \Config\Services::validation(),
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Product\Views\newProduct', $data);
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function addProduct()
  {
    $rules = $this->validate([
      'category_name' => 'required',
      'category_slug' => 'required',
      'description' => 'required',
      'image' => 'max_size[image, 2048]|uploaded[image]|is_image[image]|mine_in[image,image/png,image/jpg,image/jpeg]|ext_in[image,png,jpg,jpeg]'
    ]);

    if($rules) {
      session()->setFlashdata('failed', 'Data Produk Gagal ditambahkan');
      return redirect()->back()->withInput();
    }

    $slug = url_title($this->request->getPost('product_name'), '-', TRUE);
    $image = $this->request->getFile('image');
    $image_name = $image->getRandomName();
    $image->move(WRITEPATH . '../public/asset_admin/img/', $image_name);
    $data = [
      'product_slug' => $slug,
      'category_slug' => esc($this->request->getPost('category_slug')),
      'product_name' => esc($this->request->getPost('product_name')),
      'description' => $this->request->getPost('description'),
      'image' => $image_name
    ];
    $this->product->insert($data);

    return redirect()->to(base_url('product'))->with('success', 'Data Berhasil ditambahkan');
  }

  // Menu Daftar Category
  public function category()
  {
    $data = [
      'title' => 'Produk | Kategori',
      'category_list' => $this->category->orderBy('id_category', 'DESC')->findAll()
    ];

    echo view('App\Modules\Layouts\Views\header', $data);
    echo view('App\Modules\Product\Views\category', $data);
    echo view('App\Modules\Layouts\Views\footer');
  }

  public function addCategory()
  {
    $slug = url_title($this->request->getPost('category_name'), '-', TRUE);
    $data = [
      'category_name' => esc($this->request->getPost('category_name')),
      'category_slug' => $slug
    ];
    $this->category->insert($data);

    return redirect()->back()->with('success', 'Data Berhasil ditambahkan');
  }

  public function editCategory($id_category)
  {
    $slug = url_title($this->request->getPost('category_name'), '-', TRUE);
    $data = [
      'category_name' => esc($this->request->getPost('category_name')),
      'category_slug' => $slug
    ];
    $this->category->update($id_category, $data);

    return redirect()->back()->with('success', 'Data Berhasil diubah');
  }

  public function deleteCategory($id_category)
  {
    $this->category->where('id_category', $id_category)->delete();
    
    return redirect()->back()->with('success', 'Data Berhasil dihapus');
  }
}