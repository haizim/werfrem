<?php
namespace App\Component;

abstract class ComponentBase{
    protected $class = "";
    protected $style = "";
    protected $result = "";
    protected $datas = [];

    public function __construct($datas)
    {
        $this->datas = $datas;
    }

    abstract public function render();

    public function setClass($str)
    {
        $this->class = $str;

        return $this->render();
    }

    public function setStyle($str)
    {
        $this->style = $str;

        return $this->render();
    }

    public function __toString()
    {
        $this->render();

        return $this->result;
    }
}