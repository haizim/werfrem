<?php

if (! function_exists('component')) {
    function component() {
        return (new \App\Component\Component);
    }
}

if (! function_exists('snake_to_capital')) {
    function snake_to_capital($str) {
        $result = str_replace("_", " ", $str);
        $result = ucwords($result);

        return $result;
    }
}

if (! function_exists('capital_to_snake')) {
    function capital_to_snake($str) {
        $result = str_replace(" ", "_", $str);
        $result = strtolower($result);

        return $result;
    }
}

if (! function_exists('data')) {
    function data($name, $isRecursive = false) {
        $class = "\\App\\Datas\\" . $name . "Data";
        $class = (new $class);
        return $isRecursive ? $class->recursive() : $class;
    }
}

if (! function_exists('dump')) {
    function dump() {
        foreach (func_get_args() as $arg) {            
            $string = print_r($arg, true);
            $string = str_replace("<", "&lt;", $string);
            $string = str_replace(">", "&gt;", $string);

            echo "<hr/><pre><code>$string</code></pre>";
        }
    }
}

if (! function_exists('dd')) {
    function dd() {
        $args = func_get_args();
        call_user_func_array('dump', $args);
        die();
    }
}

if (! function_exists('err')) {
    function err($error) {
        $message = $error->getMessage();
        $file = $error->getFile();
        $line = $error->getLine();
        $traces = $error->getTrace();
        echo "<h1 style='background: #fa5252; color: #212529; padding: .25em .5em;'>$message</h1>";
        echo "<h4>' $file ' on line  ' $line '</h4>";
        echo "<h3>Traces : </h3>";
        foreach ($traces as $trace) {
            $string = print_r($trace, true);
            $string = str_replace("<", "&lt;", $string);
            $string = str_replace(">", "&gt;", $string);
            
            echo "<div style='color: #fa5252; background: #212529; padding: .25em 1em; margin: .5em;'>
                <pre><code>$string</code></pre>
                </div>";
        }
        
        echo "<hr>";
        echo "<details><summary style='font-size: 1.5em;font-weight: bold;'>Raw error</summary>";
        echo "<div style='color: #eee; background: #212529; padding: .25em 1em; margin: .5em;'><pre><code>";
        print_r($error);
        echo "</code></pre></div></details>";

        die();
    }
}

if (! function_exists('collect')) {
    function collect($array) {
        return (new Illuminate\Support\Collection($array));
    }
}

if (! function_exists('number_id')) {
    function number_id($number, $dec = 0) {
        return number_format($number, $dec, ',', '.');
    }
}

if (! function_exists('date_id')) {
    function date_id($timestamp = null, $format = 'DD MMMM YYYY HH:mm:ss') {
        return (new \Carbon\Carbon($timestamp, "Asia/Jakarta"))->locale('id')->isoFormat($format);
    }
}
