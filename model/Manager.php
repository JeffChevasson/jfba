<?php
class Manager {
	protected function dbconnect() {
		
		try {
			$db= new \PDO('mysql:host=localhost;dbname=blog_mvc;charset=utf8','root','');
			return $db;
		}
		catch (Exception $e) {
			die($e->getMessage());
		}
		
	}
	
} 