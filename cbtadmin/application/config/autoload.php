<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();
$autoload['libraries'] = array('database','template','session','form_validation','pagination', 'zip', 'encryption');
$autoload['drivers'] = array();
$autoload['helper'] = array('form','url','html','download','cbtadmin','cbtid');
$autoload['config'] = array();
$autoload['language'] = array();
$autoload['model'] = array('mdl_cbtadmin','mdl__cbtadmin', 'mdl___enka');
