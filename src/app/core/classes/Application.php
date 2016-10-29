<?php

class Application
{
	protected $baseDir;
	protected $config;
	protected $dbConnection;
	protected $router;
	protected $view;

	public function __construct($baseDir)
	{
		$this->baseDir = $baseDir;
	}

	public function build($pathToConfig)
	{
		$this->config = new Config($pathToConfig);
		$this->dbConnection = $this->createDbConnection();
		$this->router = $this->createRouter();
		$this->view = $this->createView();

		return $this;
	}

	public function run(array $request)
	{
		$controllerParameters = $this->router->match($request);
		$controllerName = $controllerParameters['controller'];
		$action = $controllerParameters['action'];
		$parameters = !empty($controllerParameters['parameters']) ? $controllerParameters['parameters'] : [];
		$request = array_merge($request, $parameters);

        $controller = ControllerFactory::create($this, $controllerName, $action);
        $controller->$action($request);
	}

	public function getView()
	{
		return $this->view;
	}

	public function getDbConnection()
	{
		return $this->dbConnection;
	}

	protected function createDbConnection()
	{
		$dbParameters = $this->config->get('db');
		try {
			$dsn = $dbParameters['dsn'];
			$username = $dbParameters['username'];
			$password = $dbParameters['password'];

			$dbConnection = new PDO($dsn, $username, $password);
		} catch (PDOException $exception) {
			return null;
		}
		return $dbConnection;
	}

	protected function createRouter()
	{
		$routerMap = $this->config->get('router');
		return new Router($routerMap);
	}

	protected function createView()
	{
		$pathToViews = $this->baseDir . $this->config->get('path_to_views');
		return new View($pathToViews);	
	}
}
