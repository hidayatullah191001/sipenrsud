<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
require_once('PHPExcel.php');

class Excell extends PHPExcel{

	public function __construct()
	{
		parent::__construct();
	}
}
?>