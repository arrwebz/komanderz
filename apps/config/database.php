<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$active_group = 'default';
$query_builder = TRUE;

$db['default'] = array(
	'dsn'	=> '',
	'hostname' => 'localhost',
	'username' => 'u8267455_new',
	'password' => 'tIXSR8c1DEPe',
	'database' => 'u8267455_kmsdb',
	'dbdriver' => 'mysqli',
	'dbprefix' => 'tb_',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE  
);

	// 'username' => 'u8267455',
	// 'password' => 'tIXSR8c1DEPe',
	// 'database' => 'u8267455_devkms',