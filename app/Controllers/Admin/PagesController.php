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
        helper(['form']);

        $uri = service('uri');
        $id = $uri->getSegment(3);

        if(is_numeric($id)) {
            $model = new PageModel();

            $data['page'] = $model->where('id', $id)->first();

            echo view('admin/admin_templates/header');
            echo view('admin/pages/edit', $data);
            echo view('admin/admin_templates/footer');

            if($this->request->getMethod() == 'post') {
                $rules = [
                    'name' => 'required|min_length[3]|max_length[20]',
                    'seo_url' => 'required|min_length[3]'
                ];

                if (! $this->validate($rules)) {
                    $data['validation'] = $this->validator;
                }else{

                    $newData = [
                        'id' => session()->get('id'),
                        'name' => $this->request->getPost('name'),
                        'title' => $this->request->getPost('title'),
                        'content' => $this->request->getPost('content'),
                        'featured_image' => $this->request->getPost('featured_image'),
                        'meta_title' => $this->request->getPost('meta_title'),
                        'meta_description' => $this->request->getPost('meta_description'),
                        'meta_image' => $this->request->getPost('meta_image'),
                        'seo_url' => $this->request->getPost('seo_url'),
                    ];

                    $model->save($newData);

                    session()->setFlashdata('success', 'Successfuly Updated');
                    return redirect()->to('/pages');

                }
            }
        } else {
            return redirect()->to('/pages');
        }
    }

    public function create()
	{
        echo view('admin/admin_templates/header');
        echo view('admin/pages/create', $data);
        echo view('admin/admin_templates/footer');
	}
	//--------------------------------------------------------------------

}
