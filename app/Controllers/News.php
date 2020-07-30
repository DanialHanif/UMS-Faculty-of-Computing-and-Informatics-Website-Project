<?php

namespace App\Controllers;

use NewsModel;

class News extends BaseController
{
	public function index()
	{
		if (session()->get('logged_in')) {

			echo view('header_logged');
		} else {
			echo view('header');
		}

		$news = new NewsModel;
		$data['news'] = $news->getAllNews(5);

		echo view('news_view', $data);
		echo view('footer');
	}

	//--------------------------------------------------------------------

}
