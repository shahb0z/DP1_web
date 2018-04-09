<?php
	include_once 'functions.php';
	createTable('users', 'name VARCHAR(30),
			surname VARCHAR(30),
			mail VARCHAR(40) PRIMARY KEY,
			pass VARCHAR(20)');
	createTable('goods', 'id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
			name VARCHAR(30),
			descr TINYTEXT,
			owner VARCHAR(40),
			bidder VARCHAR(40),
			`date` DATETIME,
			highPrice INT UNSIGNED NOT NULL DEFAULT \'0\',
			INDEX(name(15)),
			INDEX(owner(15)),
			INDEX(bidder(15))
			');
?>