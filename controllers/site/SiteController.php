<?php

/**
*
* Controller do site.
*
**/
class SiteController extends Controller
{

	public function index()
	{		

		$this->setLayout('site/shared/layout.php');
		$this->view('site/home/index.php');

	}

	public function location()
	{

		$this->setLayout('site/shared/layout.php');
		$this->view('site/location/index.php');
	}

	public function services()
	{

		$this->setLayout('site/shared/layout.php');
		$this->view('site/services/index.php');
	}

}