<?php
namespace App\Controller;

use Carbon\Carbon;

class MasterProdukController extends Controller
{
    private $data;
    private $form ;
    private $menu;
    private $title = 'Master Produk';
    private $url = '/master-produk';

    function __construct()
    {
        $data = data('MasterProduk');
        $menu = data('Menu');
        $role = capital_to_snake($_SESSION['user']['role']);
        $this->menu = $menu->get($role);
        $this->data = $data->data;
        $this->form = $data->form;
    }

    private function _index($table)
    {
        return $this->view('index', [
            'title' => $this->title,
            'user' => $_SESSION['user']['nama'],
            'menu' => $this->menu,
            'table' => $table,
            'addLink' => $this->url . '/create',
        ]);
    }

    public function index()
    {
        $this->_index($this->data);
    }

    private function _form($title)
    {
        return $this->view('form', [
            'title' => $title,
            'user' => $_SESSION['user']['nama'],
            'menu' => $this->menu,
            'form' => $this->form,
            'action' => $this->url . '/store',
        ]);
    }

    public function create()
    {
        $this->_form("Tambah $this->title");
    }

    public function edit($id)
    {
        $this->_form("Edit $this->title");
    }

    public function store()
    {
        $table = $this->data;

        if (!is_null($_POST['nama'])) {
            $table[] = [
                "nama" => $_POST['nama'], 
                "merk" => $_POST['merk'], 
                "sku" => $_POST['sku'], 
                "harga" => $_POST['harga'], 
                "waktu_pembaruan" => Carbon::now()->isoFormat('DD MMMM YYYY HH:mm:ss'),
                "action" => "<a href='/master-produk/1' class='btn btn-sm btn-secondary'>Detail</a>
                <a href='/master-produk/1/edit' class='btn btn-sm btn-secondary'>Edit</a>",
            ];
        }
        
        $this->_index($table);
    }

    public function show($id)
    {
        $detail = $this->data[$id-1];
        unset($detail['action']);

        return $this->view('detail', [
            'title' => "Detail $this->title",
            'user' => $_SESSION['user']['nama'],
            'menu' => $this->menu,
            'detail' => $detail,
        ]);
    }
}
