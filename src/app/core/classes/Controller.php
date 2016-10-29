<?php

class Controller
{
	public $application;

	public function __construct($application)
	{
		$this->application = $application;
	}

	public function render($viewPath, array $parameters = [])
	{
		return $this->application->getView()->render($viewPath, $parameters);
	}
}
