<?php
namespace App\Controller;

use App\Core\Router;

class StokController extends Controller
{
    private $data;
    private $form ;
    private $menu;
    private $title = 'Stok';
    private $url = '/stok';

    function __construct()
    {
        $data = data('Stok');
        $menu = data('Menu');
        $role = capital_to_snake($_SESSION['user']['role']);
        $this->menu = $menu->get($role);
        $this->data = $data->data;
        $this->form = $data->form;
    }

    public function index()
    {
        $table = $this->data;

        $remove = [];
        if ($_SESSION['user']['role'] == 'Admin') {
            $remove[] = '_action';
        } else {
            $remove[] = 'action';
        }
        $table = $table->map(function ($value, $key) use ($remove) {
            foreach ($remove as $r) {
                unset($value[$r]);
            }
            return $value;
        });
        
        return $this->view('table', [
            'title' => $this->title,
            'user' => $_SESSION['user']['nama'],
            'menu' => $this->menu,
            'table' => $table,
            'addLink' => $this->url . '/create',
        ]);
    }

    public function edit($id)
    {
        return $this->view('form', [
            'title' => "Edit $this->title",
            'user' => $_SESSION['user']['nama'],
            'menu' => $this->menu,
            'form' => $this->form,
            'action' => $this->url . '/store',
        ]);
    }

    public function store()
    {
        Router::to($this->url);
    }

    public function show($id)
    {
        $detail = $this->data[$id-1];
        unset($detail['action']);
        unset($detail['_action']);

        return $this->view('detail', [
            'title' => "Detail $this->title",
            'user' => $_SESSION['user']['nama'],
            'menu' => $this->menu,
            'detail' => $detail,
        ]);
    }
}
