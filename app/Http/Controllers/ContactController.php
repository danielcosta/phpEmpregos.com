<?php namespace App\Http\Controllers;

class ContactController extends Controller
{
    public function create()
    {
        $viewData = [
            'title' => 'Contato' 
        ];
        
        return $this->makeView($viewData);
    }

}