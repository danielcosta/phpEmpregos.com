<?php namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesCommands;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;

abstract class Controller extends BaseController 
{

    use DispatchesCommands, ValidatesRequests;

    protected function makeView($viewData = [])
    {
        $controller = get_class($this);
        $controller = explode('\\', $controller);
        $controller = end($controller);

        $controller = str_replace('Controller', '', $controller);
        $folder     = $controller;
        $template   = $folder . '.' . get_callee();


        return view($template , $viewData);
    }

}
