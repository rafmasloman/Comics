<?php namespace App\Controllers;

class Pages extends BaseController
{
	protected $comicsModel;
    public function __construct()
    {
        $this->comicsModel = new \App\Models\ComicsModel();
    }
	public function index()
	{
		$data = [
			'title' => 'Homepage',
			'comics' =>  $this->comicsModel->getComic(),
			
		];
		
		return view('pages/home',$data);
	}
	public function about(){
		$data  = [
			'title' => 'About',
		];
		return view('pages/about',$data);
	}

	//--------------------------------------------------------------------

}
