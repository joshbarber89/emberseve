<?php namespace App\Controllers\Admin;

use App\Models\PageModel;

class PagesController extends AdminBaseController
{
	public function index()
	{
        $model = new PageModel();

        $data['pages'] = $model->findAll();

        echo view('admin/admin_templates/header');
		echo view('admin/pages/index', $data);
		echo view('admin/admin_templates/footer');
	}

	public function edit()
	{
        $uri = service('uri');
        $id = $uri->getSegment(1);

        if(is_int($id)) {
            $model = new PageModel();

            $data['page'] = $model->where('id', $id);

            echo view('admin/admin_templates/header');
            echo view('admin/pages/index', $data);
            echo view('admin/admin_templates/footer');
        } else {
            return redirect()->to('pages');
        }
	}
	//--------------------------------------------------------------------

}
