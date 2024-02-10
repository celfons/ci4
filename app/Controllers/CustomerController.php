<?php 
namespace App\Controllers;

use App\Libraries\GroceryCrud;
use \Exception;

class CustomerController extends BaseController
{   

	public function index()
	{
        try {
            $crud = new GroceryCrud();

            $crud->setTable('clientes');
            $crud->fields(['nome']);
            $crud->columns(['nome']);

            $output = $crud->render();

            return $this->_exampleOutput($output);
        } catch (\Exception $e) {
            var_dump($e);
            return $this->response->setJSON(['error' => $e->getMessage()]);
        }
	}

    private function _exampleOutput($output = null) {
        return view('example', (array)$output);
    }

}
