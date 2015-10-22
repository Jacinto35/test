<?php

// This is the database connection configuration.
return array(
    'class' => 'CDbConnection',
	'connectionString' => 'mysql:host=localhost;dbname=testdrive',
	'emulatePrepare' => true,
	'username' => 'root',
	'password' => '',
	'charset' => 'utf8',
);