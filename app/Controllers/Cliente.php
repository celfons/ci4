<?php
namespace App\Controllers;
use App\Libraries\GroceryCrud;

class Cliente extends BaseController
{
    public function index()
    {
        $crud = new GroceryCrud();
        $crud->setTable('clientes');
        $output = $crud->render();
        return view('clientes', ['output' => $output]);
    }

    public function add()
    {
        $crud = new GroceryCrud();
        $crud->setTable('clientes');
        $output = $crud->render();
        return view('clientes', ['output' => $output]);
    }
}