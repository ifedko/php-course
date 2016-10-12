<?php
function sayHelloWorld($count = 1)
{
	$result = '';
	for ($i = 0; $i < $count; $i++) {
		$result .= 'Hello World 2!<br>';
	}
	return $result;
}

$result = sayHelloWorld(10);
?>

<?php require '../../view/header.php'; ?>
<div class="content">
	<?php require '../../view/menu.php'; ?>
	<div class="workarea">
		<h1>Loops -> 1</h1>
		<div class="task-item">
			Task:<br>
			Сказать десять раз HelloWorld!
		</div>
		<div class="task-item">
			Input:<br>
			-
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
<?php require '../../view/footer.php'; ?>
