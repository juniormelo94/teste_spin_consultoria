<?php

function dd() {
	$separator = (php_sapi_name() === 'cli') ? PHP_EOL : '<br/>';
	$bt = debug_backtrace();
	$caller = array_shift($bt);
	$args = func_get_args();

	call_user_func_array('var_dump', $args);
	die($caller['file'] .':'. $caller['line'] . $separator);
}