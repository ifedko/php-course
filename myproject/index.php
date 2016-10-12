<?php
// Map of tasks by section and task number
$tasksMap = [
	'loops' => [
		'title' => 'Loops',
		'tasks' => [
			1,
			2
		]
	]
];
//	var_dump($_GET);
// We have one entry point of application, path GET variable should have #section#-#tasknumber# format
$pathChunks = (!empty($_GET['path'])) ? explode('-', $_GET['path']) : '';
// @todo Handle case when 0 and 1 keys don't exist in $pathChunks. For example, we should show 404 error code.
$section = $pathChunks[0];
$task = $pathChunks[1];

require __DIR__ . '/tasks/' . $section . '/' . $task . '.php';
?>
<?php require 'view/header.php'; ?>
<div class="content">
	<?php require 'view/menu.php'; ?>
	<div class="workarea">
		<h1>Loops -> 1</h1>
		<div class="task-item">
			Task:<br>
			<?php echo $description; ?>
		</div>
		<div class="task-item">
			Input:<br>
			<?php echo $inputData; ?>
		</div>
		<div class="task-item">
			Output:<br>
			<?php echo $result; ?>
		</div>
		<div class="task-item">
			Code:<br>
			...
		</div>
	</div>
</div>
<?php require 'view/footer.php'; ?>
