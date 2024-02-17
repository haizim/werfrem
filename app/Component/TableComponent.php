<?php
namespace App\Component;

class TableComponent extends ComponentBase{
    protected $class = "tbl";
    protected $style = "width: 100%;text-align: left;";
    protected $decimal = 2;

    public function render()
    {
        $class = $this->class;
        $style = $this->style;
        $datas = $this->datas;

        $result = "";
        $number = ['integer', 'float', 'double'];

        if (isset($datas[0])) {        
            $result = "<table class='$class' style='$style'>";
            $headers = array_keys($datas[0]);

            $result .= "<thead><tr>";
            $result .= "\n<th width=5>No.</th>";
            foreach ($headers as $head) {
                $result .= "\n<th>". snake_to_capital($head) ."</th>";
            }
            $result .= "\n</tr></thead>";

            $result .= "\n<tbody>";
            foreach ($datas as $n => $data) {
                $result .= "\n<tr>";
                $result .= "\n<td> ". $n+1 ."</td>";
                
                foreach ($headers as $h) {
                    $content = $data[$h] ?? '';
                    $type = gettype($content);
                    $content = in_array($type, $number) ? number_id($content, $this->decimal) : $content;
                    $result .= "\n<td>$content</td>";
                }
                $result .= "\n</tr>";
            }
            $result .= "\n</tbody>";
            $result .= "\n</table>";
        }
        $this->result = $result;

        return $this;
    }

    public function setDecimal($value = 2)
    {
        $this->decimal = $value;

        return $this->render();
    }
}
