<?php

class Task
{
	protected $title;
	protected $category;
	protected $description;

	public function __construct($title, $category, $description)
	{
		$this->title = $title;
		$this->description = $description;
		$this->category = $category;
	}

	public function getTitle()
	{
		return $this->title;
	}

	public function getCategory()
	{
		return $this->category;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function run($data)
	{
		require_once __DIR__ . '/../tasks/' . $this->category . '/' . $this->title . '.php';
		return taskFunction($data);
	}
}