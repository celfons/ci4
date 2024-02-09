<?php 
namespace App\Controllers;

use App\Libraries\GroceryCrud;

class Examples extends BaseController
{   

	public function customers_management()
	{
	    $crud = new GroceryCrud();

	    $crud->setTable('clientes');
        $crud->fields(['nome']);
        $crud->columns(['nome']);
        $crud->callbackAfterInsert(function ($data) {
            return redirect('customers', 'refresh');
        });
	    $output = $crud->render();

		return $this->_exampleOutput($output);
	}

    private function _exampleOutput($output = null) {
        return view('example', (array)$output);
    }

    public function after_insert_scallback($post_array)
    {
        try {
            redirect('/customers');
        } catch (Exception $e) {
            json_encode($e->getMessage());
        }
    }


}
