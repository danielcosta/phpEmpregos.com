<?php namespace App\Http\Controllers;

class AboutController extends Controller
{
    public function index()
    {
        $viewData = [
            'title' => 'Sobre'
        ];

        return $this->makeView($viewData);
    }
}
