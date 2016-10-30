<?php

class IndexController extends Controller
{
	public function indexAction($request)
	{
		$this->render('pages:index');
	}

	public function aboutAction($request)
	{
		$this->render('pages:about');
	}

	public function contactsAction($request)
	{
		$this->render('pages:contacts');
	}
}
