<?php

class Authentication
{
	private $dbConnection;

	public function __construct($dbConnection)
	{
		$this->dbConnection = $dbConnection;
	}

	public function authenticate($username, $password)
	{
		if (empty($username) || empty($password)) {
			return null;
		}

		// @todo get user by $username from database
		$userFromDB = null;
		if ($username == 'admin') {
			$userFromDB = [
				'id' => 13,
				'login' => 'admin',
				'password' => $this->encodePassword('mypasswd')
			];
		}

		if (empty($userFromDB)) {
			return null;
		}

		$encodedPassword = $this->encodePassword($password);
		if ($userFromDB['password'] != $encodedPassword) {
			return null;
		}

		// @todo generate hash
		// @todo save hash for user
		setcookie('user', $this->encodePassword('mypasswd'));

		return $userFromDB;
	}

	public function getAuthenticatedUser()
	{
		$hashFromCookies = !empty($_COOKIE['user']) ? $_COOKIE['user'] : '';
		if (empty($hashFromCookies)) {
			return null;
		}

		// @todo get user by cookies hash from DB 
		if ($hashFromCookies != $this->encodePassword('mypasswd')) {
			return null;
		}

		$userFromDB = [
			'id' => 13,
			'login' => 'admin',
			'password' => $this->encodePassword('mypasswd')
		];
		return $userFromDB;
	}

	protected function encodePassword($password)
	{
		return md5(md5($password));
	}
}
