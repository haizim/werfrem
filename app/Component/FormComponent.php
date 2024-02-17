<?php
namespace App\Component;

class FormComponent extends ComponentBase{
    private $action = '';
    private $method = 'get';

    public function render()
    {
        $class = $this->class;
        $style = $this->style;
        $datas = $this->datas;
        $action = $this->action;
        $method = $this->method;

        $result = "<form action='$action' method='$method' id='form'>";

        foreach ($datas as $key => $type) {
            $label = snake_to_capital($key);
            $result .= "<div class='mb-3'>";
            $result .= "<label for='$key'>$label:</label>";
            switch ($type) {
                case 'text readonly':
                    $result .= "<input type='text' name='$key' id='$key' class='form-control' placeholder='$type' readonly>";
                    break;
                case 'textarea':
                    $result .= "<textarea name='$key' id='$key' class='form-control' placeholder='$type'></textarea>";
                    break;
                case 'select':
                    $result .= "<select name='$key' id='$key' class='form-select' placeholder='Pilih $label'>
                    <option>Pilih $label</option></select>";
                    break;
                default:
                    $result .= "<input type='$type' name='$key' id='$key' class='form-control' placeholder='$type'>";
                    break;
            }
            $result .= "</div>";    
        }
        
        $result .= "</form>";

        $this->result = $result;

        return $this;
    }

    public function setAction($value = '')
    {
        $this->action = $value;

        return $this->render();
    }
    
    public function setMethod($value = 'get')
    {
        $this->method = $value;

        return $this->render();
    }
}
