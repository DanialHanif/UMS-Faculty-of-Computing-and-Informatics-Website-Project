<?php

namespace App\Controllers;

use StudentModel;
use StaffModel;
use NewsModel;
use EventModel;

class Dashboard extends BaseController
{

	
	public function index()
	{
		helper(['form', 'url']);
		if (!session()->get('logged_in')) {
			return redirect()->to('/lab6/public/Home');
		} else {
			echo view('header_logged');
		}
		if (session()->get('logged_in')['type'] =='staff') {
			$model = new StaffModel;
			$data = $model->getData(session()->get('logged_in')['id']);
			$_SESSION['logged_in']['firstname'] = $data['staffFirstName'];
			$_SESSION['logged_in']['lastname'] = $data['staffLastName'];
		} else {
			$model = new StudentModel;
			$data = $model->getData(session()->get('logged_in')['id']);
			$_SESSION['logged_in']['firstname'] = $data['studentFirstName'];
			$_SESSION['logged_in']['lastname'] = $data['studentLastName'];
		}

		$news = new NewsModel;
		$data['news'] = $news->getAllNews(5);
		
		$news = new EventModel;
		$data['events'] = $news->getAllEvent(5);

		echo view('dashboard_view', $data);
		echo view('footer');
	}

	//--------------------------------------------------------------------

}
