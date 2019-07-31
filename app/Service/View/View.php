<?php

namespace App\Service\View;

use Jenssegers\Blade\Blade;

class View
{

    public static function load($view, $data = [])
    {
        global $blade;
        $blade = new Blade('views','cache');
        $viewPath = str_replace(".", "/", $view);
        $fullViewPath = VIEWS . $viewPath . ".blade.php";
        if (file_exists($fullViewPath) and is_readable($fullViewPath)) {
            echo $blade->make($view, $data);
        }
        else {
            die('View Not Found');
        }
    }

    public static function render($viewPath, $data = null)
    {
        $viewPath = str_replace(".", "/", $viewPath);
        $fullViewPath = VIEWS . $viewPath . ".php";
        if (file_exists($fullViewPath) and is_readable($fullViewPath)) {
            if (isset($data) and is_null($data)) {
                extract($data);
            }
            ob_start();
            include_once $fullViewPath;
            $renderView = ob_get_clean();
            return $renderView;
        } else {
            die('View Not Found');
        }
    }

}