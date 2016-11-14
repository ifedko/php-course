<?php

class UserController extends Controller
{
	public function loginAction($request)
	{
		$authentication = $this->container->get('authentication');
		$user = $authentication->getAuthenticatedUser();
		if ($user) {
			$this->render('user:hello', ['user' => $user]);
		} else {
			$isSubmit = isset($_POST['auth_submit']);
			$username = (!empty($_POST['username'])) ? $_POST['username'] : '';
			$password = (!empty($_POST['password'])) ? $_POST['password'] : '';
			if ($isSubmit) {
				$user = $authentication->authenticate($username, $password);
			}

			if ($user) {
				$this->render('user:hello', ['user' => $user]);
			} else {
				$this->render('user:login');
			}
		}
	}
}
