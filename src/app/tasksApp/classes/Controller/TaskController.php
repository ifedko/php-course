<?php

class TaskController extends Controller
{
	public function indexAction($request)
	{
		$inputData = [];
		if (!empty($request['task_run'])) {
			$inputData = explode(PHP_EOL, $request['input_data']);
			var_dump($inputData);
		}
		$dbConnection = $this->application->getDbConnection();
		$section = (!empty($request['section'])) ? $request['section'] : '';
		$taskNumber = (!empty($request['task'])) ? $request['task'] : 0;
		$pageData = getTask($section, $taskNumber, $dbConnection, $inputData);
		$this->render('pages:tasks', [
			'pageData' => $pageData
		]);
	}
}
