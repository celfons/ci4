<?php 
namespace App\Controllers;

use App\Libraries\GroceryCrud;

class ServiceOrderController extends BaseController
{   

	public function index()
	{
        try {
            $crud = new GroceryCrud();

            $crud->setTable('ordem_servico');
            $crud->fields(['cliente_id','data']);
            $crud->columns(['cliente_id','data']);
            $crud->setRelation('cliente_id', 'clientes', 'nome', []);
            $crud->displayAs('cliente_id', 'Cliente');

            $output = $crud->render();

            return $this->_exampleOutput($output);
        } catch (Exception $e) {
            return json_encode($e->getMessage());
        }
	}

    private function _exampleOutput($output = null) {
        return view('example', (array)$output);
    }

}
