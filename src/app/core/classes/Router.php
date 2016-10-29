<?php

class Router
{
	protected $map;

	public function __construct($map)
	{
		$this->map = $map;
	}

	public function match(array $request)
	{
		$matchedParameters = [];
		$requestURI = $this->parseRequest($request);

		foreach ($this->map as $pattern => $parameters) {
			$pattern = str_replace('/', '\/', $pattern);
			if (preg_match('/^' . $pattern . '$/', $requestURI, $matches)) {
				$matchedParameters = $parameters;
				unset($matchedParameters['parameters']);
				if (!empty($parameters['parameters'])) {
					foreach ($parameters['parameters'] as $i => $name) {
						$matchedParameters['parameters'][$name] = (isset($matches[$i + 1])) ? $matches[$i + 1] : null;
					}
				}
				break;
			}
		}
		return $matchedParameters;
	}

	protected function parseRequest(array $request)
	{
		$requestURI = isset($request['path']) ? '/' . $request['path'] : '/';
        return $requestURI;
	}
}
