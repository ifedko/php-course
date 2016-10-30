<?php

/**
 * Get map of tasks by section and task number
 * @return array
 */
function getTasksMap ()
{
	return [
		'loops' => [
			'title' => 'Loops',
			'tasks' => [
				1,
				2
			]
		],
		'arrays_1' => [
			'title' => 'Arrays 1',
			'tasks' => [
				1
			]
		],
		'mysql' => [
			'title' => 'MySQL',
			'tasks' => [
				1, 2
			]
		],
		'form' => [
			'title' => 'Form',
			'tasks' => [
				1, 2
			]
		]
	];
}

/**
 * Get task title
 * @param string $section
 * @param integer $taskNumber
 * @return string
 */
function getTaskTitle($section, $taskNumber)
{
	$tasksMap = getTasksMap();
	$sectionData = $tasksMap[$section];
	$titleChunks = [
		$sectionData['title'],
		$taskNumber
	];
	return implode('->', $titleChunks);
}


/**
 * Get task data
 * @param string $section
 * @param integer $taskNumber
 * @return array
 */
function getTask($section, $taskNumber, $dbConnection, array $inputData = [])
{
	$tasksMap = getTasksMap();
	$pageTitle = getTaskTitle($section, $taskNumber);
	$description = ''; // @todo get description from tasksMap
	$categoryCode = $section;
	$task = new Task($taskNumber, $categoryCode, $description);
	$result = $task->run($inputData, $dbConnection);
	
	return [
		'title' => $pageTitle,
		'description' => $task->getDescription(),
		'inputData' => '',
		'result' => $result
	];
}
