<?php

class TaskController extends Controller
{
	public function indexAction($request)
	{
		$dbConnection = $this->application->getDbConnection();
		$section = (!empty($request['section'])) ? $request['section'] : '';
		$taskNumber = (!empty($request['task'])) ? $request['task'] : 0;
		$pageData = getTask($section, $taskNumber, $dbConnection);
		$this->render('pages:tasks', [
			'pageData' => $pageData
		]);
	}
}
