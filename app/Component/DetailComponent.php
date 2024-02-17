<?php
namespace App\Component;

class DetailComponent extends ComponentBase{

    public function render()
    {
        $class = $this->class;
        $style = $this->style;
        $datas = $this->datas;

        $result = "<div class='row'>";
        $number = ['integer', 'float', 'double'];

        foreach ($datas as $key => $value) {
            $label = snake_to_capital($key);
            $content = $value ?? '';
            $type = gettype($content);
            $content = in_array($type, $number) ? number_id($content, 2) : $content;

            $result .= "<div class='col-sm-2 mb-2'>$label</div>";
            $result .= "<div class='col-sm-10 mb-2'>: $content</div>";
        }
        
        $result .= "</div>";

        $this->result = $result;

        return $this;

    }
}
