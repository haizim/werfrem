<?php
namespace App\Controller;

use App\Core\Router;

class AuthController extends Controller
{
    private $loginForm;

    public function __construct()
    {
        $data = data('Auth');
        $this->loginForm = $data->login;
    }
    
    public function home()
    {
        $menu = data('Menu');
        $role = capital_to_snake($_SESSION['user']['role']);
        
        return $this->view('blank', [
            'title' => 'Home',
            'user' => $_SESSION['user']['nama'],
            'menu' => $menu->get($role),
        ]);
    }
    public function login()
    {
        if (isset($_SESSION['user'])) {
            Router::to('/home');
        }
        
        return $this->view('auth/login', [
            'title' => 'Login',
            'form' => $this->loginForm
        ], 'auth');
    }

    public function loginCheck()
    {
        $users = data('Users')->data;
        $email = $_POST['email'];

        $user = $users->filter(function ($val) use ($email) {
            return $val['email'] == $email;
        })->first();
        
        if ($user) {
            $_SESSION['user'] = $user;
            Router::to('/home');
        }

        Router::to('/login');
    }
}