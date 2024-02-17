<?php
namespace App\Core;

class View
{
    public static function render(string $view, $data = [], $template='app')
    {
        // require __DIR__ . '/../View/' . $view . '.php';
        $content = file_get_contents(__DIR__ . '/../View/' . $view . '.php');
        $template = file_get_contents(__DIR__ . '/../Template/' . $template . '.php');

        $_combined = str_replace('{{ content }}', $content, $template);

        $_combined = preg_replace('/{{\s*(.+?)\s*}}/', '<?php echo $1 ?>', $_combined);

        $_combined = preg_replace('/@if\(\s*(.+?)\s*\):/', '<?php if ($1) { ?>', $_combined);
        $_combined = str_replace('@endif', '<?php } ?>', $_combined);
        
        $_combined = preg_replace('/@foreach\(\s*(.+?)\s*\):/', '<?php foreach ($1) { ?>', $_combined);
        $_combined = str_replace('@endforeach', '<?php } ?>', $_combined);

        unset($content);
        unset($template);
        extract($data);

        eval('?>' . $_combined);
    }

}