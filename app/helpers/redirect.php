<?php

function redirect($route) {
	$route = str_replace('.', '/', $route);
	header("Location: {$route}");
}