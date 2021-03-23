<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class My extends BaseController
{
	public function index()
	{
		echo view('upload_view');
	}

	public function upload()
	{
		helper(['form','url']);
		$validation= \config\Services::validation();
		$c=$this->validate([
			'img'=>['uploaded[img]|','mime_in[img,image/jpg,image/jpeg,image/png]'],
		]);
		if(!$c){
			return view('upload_view', ['validation'=> $this->validator]);
		}else{
			$img=$this->request->getFile('img');
			if($img->isValid() && ! $img->hasMoved()){
				$newName = $img->getRandomName();
				// $img->move(WRITEPATH.'uploads/',$newName); IT's work but i can't display
				$img->move('uploads/',$newName);
				/**
				 * Note:
				 * $img->move('uploads/',$newName);--> if we use this line then make sure that don't crete any folder(like: uploads) in pubilc directory.
				 * It's create automatic uploads folder.  
				 */
				// unlink('uploads/1616498097_4b30158c38e4fb24c075.jpg'); //it's also work
				return redirect()->to('photo');
			}
		}
	}
}
