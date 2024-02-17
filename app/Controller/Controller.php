<?php
namespace App\Controller;

use App\Core\View;

class Controller
{
    protected function view(string $view, $data = [], $template='app')
    {
        View::render($view, $data, $template);
    }
}