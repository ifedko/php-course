<?php
// We declare library functions here

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
				1
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
function getTask($section, $taskNumber)
{
	$tasksMap = getTasksMap();
	$title = getTaskTitle($section, $taskNumber);
	require __DIR__ . '/../tasks/' . $section . '/' . $taskNumber . '.php';
	
	return [
		'title' => $title,
		'description' => $description,
		'inputData' => $inputData,
		'result' => $result
	];
}
