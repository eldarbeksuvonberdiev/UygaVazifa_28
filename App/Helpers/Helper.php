<?php

use App\Helpers\View;

if (!function_exists('dd')) {
    function dd(...$data)
    {
        echo "<body bgcolor='grey'>";
        echo "<pre style='background-color:black;color:#0dbb2a;font-family:monospace'>";
        print_r($data);
        echo '</pre>';
        exit;
    }
}

if (!function_exists('view')) {

    function view($view, $title, $models = [])
    {
        View::make($view, $title, $models);
    }
}
