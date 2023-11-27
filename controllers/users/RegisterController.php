<?php

/**
*
* Controller do registro.
*
**/

class RegisterController extends Controller
{

	public function index()
	{		

		$this->setLayout('site/shared/layout.php');
		$this->view('site/register/index.php');

	}

	public function registerUser()
	{

		if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['phone'])){

			$name = addslashes($_POST['name']);
			$email = addslashes($_POST['email']);
			$password = sha1($_POST['password']);
			$phone = addslashes($_POST['phone']);

			$userData = new UserData;
			$checkEmail = $userData->getUserByEmail($email);

			if($checkEmail){
				http_response_code(409);
				echo json_encode(array(
					"error" => "E-mail já existente"
				));
				exit;
			}

			$userCrud = new UserCrud;
			$response = $userCrud->registerUser($name, $email, $password, $phone);

			if($response) {

				$this->helpers["UserSession"]->saveUser(array(
					"id"    => $response,
					"name"  => $name,
					"email" => $email,
					"phone" => $phone, 
				));
				
			}
			
			echo json_encode(array(
				"response" => $response
			));

		}else{
			http_response_code(403);
			
			echo json_encode(array(
				"error" => "Falta de parâmetros necessários para o cadastro"
			));
		}

	}

}