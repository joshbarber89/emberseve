<?php namespace App\Controllers\Admin;

class MenusController extends AdminBaseController
{
	public function index()
	{
		$data = [];

		echo view('admin/admin_templates/header', $data);
		echo view('admin/dashboard');
		echo view('admin/admin_templates/footer');
	}


	//--------------------------------------------------------------------

}
