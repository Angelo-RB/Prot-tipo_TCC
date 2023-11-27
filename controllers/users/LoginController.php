<?php

/**
*
* Controller do login.
*
**/

class LoginController extends Controller
{

	public function index()
	{		

		$this->setLayout('site/shared/layout.php');
		$this->view('site/login/index.php');

	}

	public function loginUser() 
	{
		if(isset($_POST['email']) && isset($_POST['password'])){

			$email = addslashes($_POST['email']);
			$password = addslashes($_POST['password']);

			$userLogin = new UserLogin;
			$response = $userLogin->login($email, $password);

			if($response) {

				$this->helpers["UserSession"]->saveUser($response);
				
			}
			
			echo json_encode(array(
				"response" => $response ? true : false
			));

		}else{
			http_response_code(403);
			
			echo json_encode(array(
				"error" => "Falta de parâmetros necessários para o Login"
			));
		}

	}

	public function logout()
	{
		$this->helpers["UserSession"]->deleteUser();
		header("location: " . $this->helpers["URLHelper"]->getURL("/"));
	}

}