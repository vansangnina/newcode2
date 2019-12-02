<?php
	/**
	 * Application Main Page That Will Serve All Requests
	 *
	 * @package Simple Nina Framework
	 * @author  Hiếu Nguyễn <nguyenhieunina@gmail.com>
	 * @version 1.0.0
	 * @license http://nina.vn
	 */
	 
	defined( 'ROOT' ) ?:  define( 'ROOT', dirname(__DIR__));
	defined( 'AJAX' ) ?:  define( 'AJAX', "AJAX" );
	require_once dirname(__DIR__). '/Library/Autoload.php';
	$type = $_POST['type'];

	switch ($type) {

		case 'stt':
			// update Number table
			$table = $_POST['table'];
			$id = $_POST['id'];
			$value = $_POST['value'];

			$data['number'] = $value;
			$db->setTable($table);
			$db->setWhere('id', $id);
			echo $db->update($data);
			break;

		case 'soluong':
			// update Number table
			$table = $_POST['table'];
			$id = $_POST['id'];
			$value = $_POST['value'];

			$data['amount'] = $value;
			$db->setTable($table);
			$db->setWhere('id', $id);
			echo $db->update($data);
			break;

		case 'hienthi':
			// update Number table
			$table = $_POST['table'];
			$id = $_POST['id'];
			$value = $_POST['value'];

			$data['shows'] = $value;
			$db->setTable($table);
			$db->setWhere('id', $id);
			echo $db->update($data);
			break;
		default:
			// update Number table
			$table = $_POST['table'];
			$id = $_POST['id'];
			$value = $_POST['value'];

			$data[$type] = $value;
			$db->setTable($table);
			$db->setWhere('id', $id);
			echo $db->update($data);
			// code...
			break;
	}

	
?>	