<?php

/**
 *
 * Classe que configura o crud de sessão
 *
 *
 **/
class UserLogin
{

	private $pdoQuery;
	private $userData;

	public function __construct()
	{

		$this->pdoQuery = new PDOQuery;
		$this->userData = new UserSession;

	}
	
	public function getData($email)
	{
		return $this->pdoQuery->fetch('SELECT users.* FROM usuarios users
		WHERE users.email = :email AND users.status = 1', array(
			':email' => mb_strtolower($email)
		));
	}

	private function checkEmailAndPassword($email, $password, $dbEmail, $dbPassword)
	{

		if(strtolower($email) != strtolower($dbEmail)){
			return false;
		}
		
		if($password !== $dbPassword){
			return false;
		}

		return true;

	}

	private function setLogin($email, $password)
	{

		$data = $this->getData($email);

		if($data and $this->checkEmailAndPassword($email, $password, $data['email'], $data['password'])){

			return true;
		}

		return false;

	}

	public function checkLoginEncrypted($email, $password)
	{
		if($this->setLogin($email, $password)){

			$data = $this->getData($email);
			return $data;

		}

		return false;
	}

	public function login($email, $password)
	{
	
		if($this->setLogin($email, hash('sha1', $password))){

			$data = $this->getData($email);
			return $data;

		}

		return false;

	}
}