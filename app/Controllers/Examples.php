<?php 
namespace App\Controllers;

use App\Libraries\GroceryCrud;

class Examples extends BaseController
{   

	public function customers()
	{
        try {
            $crud = new GroceryCrud();

            $crud->setTable('clientes');
            $crud->fields(['nome']);
            $crud->columns(['nome']);

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
