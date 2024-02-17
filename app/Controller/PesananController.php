<?php
namespace App\Controller;

class PesananController extends Controller
{
    private $data;
    private $detail;
    private $form;
    private $menu;
    private $riwayat;
    private $title = 'Pesanan';
    private $url = '/pesanan';

    function __construct()
    {
        $data = data('Pesanan');
        $menu = data('Menu');
        $role = capital_to_snake($_SESSION['user']['role']);
        $this->menu = $menu->get($role);
        $this->data = $data->data;
        $this->detail = $data->detail_pesanan;
        $this->form = [$data->form->toArray()];
        $this->riwayat = $data->riwayat;
    }

    public function _index($table)
    {
        $remove = [];
        if ($_SESSION['user']['role'] == 'Gudang') {
            $remove[] = 'action';
        } else {
            $remove[] = '_action';
        }

        $table = $table->map(function ($value, $key) use ($remove) {
            foreach ($remove as $r) {
                unset($value[$r]);
            }
            return $value;
        });

        return $this->view('index', [
            'title' => $this->title,
            'user' => $_SESSION['user']['nama'],
            'menu' => $this->menu,
            'table' => $table,
            'addLink' => $this->url . '/create',
            'detailPesanan' => $this->detail,
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
        return $this->view('pesanan/form', [
            'title' => "Tambah $this->title",
            'user' => $_SESSION['user']['nama'],
            'menu' => $this->menu,
            'table' => $this->form,
        ]);
    }

    public function edit($id)
    {
        $this->_form("Edit $this->title");
    }

    public function store()
    {
        $table = $this->data;
        $table[] = [
            "Nama" => $_POST['nama'], 
            "Kode" => $_POST['kode'],
            "Alamat" => $_POST['alamat'],
            "Provinsi" => $_POST['provinsi'],
            "Kabupaten/Kota" => $_POST['kota'],
            "Kecamatan" => $_POST['kecamatan'],
            "action" => "<a href='/users/3' class='btn btn-sm btn-secondary'>Detail</a><br>
            <a href='/users/3/edit' class='btn btn-sm btn-secondary'>Edit</a>",
        ];

        $this->_index($table);
    }

    public function show($id)
    {
        $detail = $this->data[$id-1];
        $table = $this->detail[$id-1];
        unset($detail['action']);
        unset($detail['_action']);
        unset($detail['produk']);
        unset($detail['status_cetak']);
        
        return $this->view('detail-table', [
            'title' => "Detail $this->title",
            'user' => $_SESSION['user']['nama'],
            'menu' => $this->menu,
            'detail' => $detail,
            'table' => $table,
        ]);
    }

    public function riwayat($id)
    {
        $detail = $this->riwayat[$id-1];
        return $this->view('detail', [
            'title' => "Riwayat $this->title",
            'user' => $_SESSION['user']['nama'],
            'menu' => $this->menu,
            'detail' => $detail,
        ]);
    }
}
