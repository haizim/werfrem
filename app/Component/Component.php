<?php
namespace App\Component;

class Component{
    public function Table($data = [])
    {
        return new TableComponent($data);
    }

    public function Detail($data = [])
    {
        return new DetailComponent($data);
    }

    public function Form($data = [])
    {
        return new FormComponent($data);
    }
}