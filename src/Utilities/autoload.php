<?php
	spl_autoload_register(function ($class) {
		$parts = explode('\\', $class);
		$filename = __DIR__ . '/' . implode('/', array_slice($parts, 1)) . '.php';
		if (file_exists($filename)) {
			require $filename;
		}
	});
?>
