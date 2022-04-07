<?php
error_reporting(0);
include("../vendor/autoload.php");
include("../includes/db_connect.php");

use Rakit\Validation\Validator;

//Sanitize input
$post_data['first_name'] = filter_var($_POST['first_name'], FILTER_SANITIZE_STRING);
$post_data['last_name'] = filter_var($_POST['last_name'], FILTER_SANITIZE_STRING);
$post_data['zaid'] = filter_var($_POST['zaid'], FILTER_SANITIZE_STRING);
$post_data['age'] = filter_var($_POST['age'], FILTER_VALIDATE_INT);
$post_data['dob'] = filter_var($_POST['dob'], FILTER_SANITIZE_STRING);

//Initialise validator
$validator = new Validator;

//Make validator
$validation = $validator->make(
	$post_data,
	[
		'first_name'     => 'required|alpha_spaces',
		'last_name'      => 'required|alpha_spaces',
		'zaid'           => 'required|numeric|sa_id',
		'age'            => 'required|numeric|between:6,200',
		'dob'            => 'required|date',
	]
);

// then validate
$validation->validate();

if ($validation->fails()) {
    // handling errors
	$errors = $validation->errors();
	$error_messages = $errors->all();
	$data['success'] = false;
	$data['error'] = $error_messages[0];
	echo json_encode($data);
	exit;
} else {
    // validation passes add the data into the database
	$db_data = array(
		"first_name" => $post_data['first_name'],
		"last_name" => $post_data['last_name'],
		"zaid" => $post_data['zaid'],
		"age" => $post_data['age'],
		"dob" => $post_data['dob']
	);
	try {
		$id = $db->insert('persons', $db_data);
		if ($id) {
			$data['success'] = true;
			$data['message'] = 'Success! Details successfully captured';
		} else {
			$data['success'] = false;
			$data['error'] = 'Error encountered! Data could not be saved!';
		}
	} catch (Exception $e) {
		$data['success'] = false;
		$data['error'] = 'Error encountered! SA ID No. already exist.';
	}
	echo json_encode($data);
}
