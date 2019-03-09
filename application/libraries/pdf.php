<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
require dirname(__FILE__) . '/tcpdf/tcpdf.php';
/**
* 
*/
class Pdf extends TCPF
{
	
	function __construct()
	{
		parent::__construct();
	}
}