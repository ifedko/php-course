<?php
	var_dump($_GET);
	$path = '';
	if (!empty($_GET['path'])) {
		$path = $_GET['path'];
	}
	var_dump($path);
	$pathChunks = explode('-', $path);
	var_dump($pathChunks);
	$tasksMap = [
		'loops' => [
			'title' => 'Loops',
			'tasks' => [
				1,
				2
			]
		]
	];
	$section = $pathChunks[0];
	$task = $pathChunks[1];
	require __DIR__ . '/tasks/' . $section . '/' . $task . '.php';
?>
<?php require 'view/header.php'; ?>
<div class="content">
	<?php require 'view/menu.php'; ?>
	<div class="workarea">
		<?php echo $description; ?>
		<?php echo $result; ?>
	</div>
</div>
<?php require 'view/footer.php'; ?>
