<?php

namespace App\Controllers;

use App\Models\User;

class Home extends BaseController
{
	public function index()
	{
		return view('welcome_message');
	}

	public function about()
	{
		echo view('layout/header',['title'=>"About"]); // don't work return 
		echo view('about');
		echo view('layout/footer');
	}
	public function insert(){
		helper(['form','url']);
		$user= new User();
		$validation= \config\Services::validation();
		$c=$this->validate([
			'email'=>'required|valid_email|is_unique[users.email]',
		]);
		if(!$c){
			return view('about', ['validation'=> $this->validator]);
		}else{
			
			$data=[
                "email" =>$this->request->getPost('email'),
            ];
            $user=$user->insert($data);
            if ($user) {
				return redirect()->to(site_url('display'));
			}
		}
		
	}
	public function display()
	{
		$user= new User();
		$user = $user->findAll();
		// print_r($user);
		// die();
		echo view('layout/header',['title'=>"Display"]); // don't work return 
		echo view('display',['user'=>$user]);
		echo view('layout/footer');
	}

	public function delete(int $id)
	{
		$user= new User();
		$user=$user->delete($id);
		if($user){
			$session=session();
			$session->setFlashdata('msg','data delete');
			return redirect()->to(site_url('display'));
			
		} 
	}

	public function edit(int $id)
	{
		$user= new User();
		$user=$user->find($id);  /// find specifie value
		echo view('layout/header',['title'=>"Edit"]); // don't work return 
		echo view('edit',['user'=>$user]);
		echo view('layout/footer');
	}

	public function update()
	{
		helper(['form','url']);
		$validation= \config\Services::validation();
		$c=$this->validate([
			'email'=>'required|valid_email|is_unique[users.email]',
			'id'=>'required|integer',
		]);
		if(!$c){
			return view('display', ['validation'=> $this->validator]);
		}else{
		
			$user= new User();
			$user->set('email',$this->request->getPost('email'));
			$user->where('id',$this->request->getPost('id'));
       		$user=$user->update();
			if ($user) {				
				$session=session();
				$session->setFlashdata('msg','data updated');
				return redirect()->to(site_url('display'));
			}
		}	
	}
}
