<?php namespace App\Controllers;

class UserAdmin extends BaseController
{
    protected $adminModel;
    public function __construct()
    {
        $this->adminModel = new \App\Models\AdminModel();
    }
	public function index()
	{
        $data = [
          'title' => 'Login Page',
          'account' => $this->adminModel->getEmail()
        ];
		return view('admin/login',$data);
	}

	//--------------------------------------------------------------------

}
