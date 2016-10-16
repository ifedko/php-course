<?php
// include library of functions
require_once __DIR__ . '/library/index.php';

// determine page code to handle action
$pageCode = 'index';
$pageParameters = [];
$urlChunks = [];
if (!empty($_GET['path'])) {
	// get url parts (page code and page parameters)
	$urlChunks = explode('/', $_GET['path']);
	if (!empty($urlChunks[0])) {
		$pageCode = $urlChunks[0];
	}
	if (!empty($urlChunks[1])) {
		$pageParameters = explode('-', $urlChunks[1]);
	}
}

// Variable $pageData is used in views. So we should init $pageData depending on pageCode.
switch ($pageCode) {
	case 'tasks':
		$section = (!empty($pageParameters[0])) ? $pageParameters[0] : '';
		$taskNumber = (!empty($pageParameters[1])) ? $pageParameters[1] : 0;
		$pageData = getTask($section, $taskNumber);
		break;
	default:
		$pageData = [];
		break;
}

// get path to view to include it in content area of page.
$pathToView = __DIR__ . '/view/pages/' . $pageCode . '.php';
if (!file_exists($pathToView)) {
	// if view file doesn't exist, we set 404 view file.
	$pageCode = '404';
	$pathToView = __DIR__ . '/view/pages/' . $pageCode . '.php';
}
?>
<?php require 'view/header.php'; ?>
<div class="content">
	<?php require 'view/menu.php'; ?>
	<div class="workarea">
		<?php require $pathToView; ?>
	</div>
</div>
<?php require 'view/footer.php'; ?>
