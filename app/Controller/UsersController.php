<?php
namespace App\Controller;

use App\Core\Router;

class UsersController extends Controller
{
    private $data;
    private $form ;
    private $menu;
    private $title = 'Users';
    private $url = '/users';

    function __construct()
    {
        $data = data('Users');
        $menu = data('Menu');
        $role = capital_to_snake($_SESSION['user']['role']);
        $this->menu = $menu->get($role);
        $this->data = $data->data;
        $this->form = $data->form;
    }

    public function _index($table)
    {
        return $this->view('index', [
            'title' => $this->title,
            'user' => $_SESSION['user']['nama'],
            'menu' => $this->menu,
            'table' => $table,
            'addLink' => $this->url.'/create',
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
            'action' => $this->url.'/store',
        ]);
    }

    public function create()
    {
        $this->_form("Tambah/Edit $this->title");
    }

    public function edit($id)
    {
        $this->_form("Edit $this->title");
    }
    
    public function store()
    {
        $p = $_POST;

        $table = $this->data;
        $table[] = [
            "nama" => $p['nama'],
            "email" => $p['email'],
            "role" => $p['role'],
            "status" => $p['status'],
            "terdaftar" => date_id(),
            "action" => "<a href='/users/1' class='btn btn-sm btn-secondary'>Detail</a>
            <a href='/users/1/edit' class='btn btn-sm btn-secondary'>Edit</a>",
        ];

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
