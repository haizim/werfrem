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

        // if
        $_combined = preg_replace('/@if\(\s*(.+?)\s*\):/', '<?php if ($1) { ?>', $_combined);
        $_combined = preg_replace('/@elseif\(\s*(.+?)\s*\):/', '<?php } elseif ($1) { ?>', $_combined);
        $_combined = str_replace('@endif', '<?php } ?>', $_combined);
        // switch
        $_combined = preg_replace('/@switch\(\s*(.+?)\s*\):/', '<?php switch ($1) { ?>', $_combined);
        $_combined = preg_replace('/@case\(\s*(.+?)\s*\):/', '<?php case "$1" : ?>', $_combined);
        $_combined = str_replace('@default', '<?php default : ?>', $_combined);
        $_combined = str_replace('@break', '<?php break; ?>', $_combined);
        $_combined = str_replace('@endswitch', '<?php } ?>', $_combined);
        
        // for
        $_combined = preg_replace('/@for\(\s*(.+?)\s*\):/', '<?php for ($1) { ?>', $_combined);
        $_combined = str_replace('@endfor', '<?php } ?>', $_combined);
        // foreach
        $_combined = preg_replace('/@foreach\(\s*(.+?)\s*\):/', '<?php foreach ($1) { ?>', $_combined);
        $_combined = str_replace('@endforeach', '<?php } ?>', $_combined);
        // while
        $_combined = preg_replace('/@while\(\s*(.+?)\s*\):/', '<?php while ($1) { ?>', $_combined);
        $_combined = str_replace('@endwhile', '<?php } ?>', $_combined);

        unset($content);
        unset($template);
        extract($data);

        eval('?>' . $_combined);
    }

}