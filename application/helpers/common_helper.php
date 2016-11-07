<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function PrintR($data)
{
	echo "<pre>";
	print_r( $data );
	exit();
}