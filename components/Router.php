<?php

class Router
{
    private $routes;

    public function __construct()
    {
        $routesPath = ROOT . '/config/routes.php';
        $this->routes = include ($routesPath);
    }

    /**
     * Returns request string
     * @return string|void
     */
    private function getURI()
    {
        if (!empty($_SERVER['REQUEST_URI'])) {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }

    /**
     *
     */
    public function run()
    {
        $uri = $this->getURI();
        if (!$uri) {
            $uri = '/';
        }
        $last_Iteration = count($this->routes);
        $i = 0;
        foreach ($this->routes as $uriPattern => $path) {
            $i++ ;
            if (preg_match("~$uriPattern~", $uri)) {

                //Определение параметров пути
                $internalRoute = preg_replace("~$uriPattern~",$path , $uri);

                //Определение контроллера и экшена
                $segments = explode('/', $internalRoute);

                $controllerName = array_shift($segments) . 'Controller';
                $controllerName = ucfirst($controllerName);

                $actionName = 'action' . ucfirst(array_shift($segments));

                $parameters = $segments;

                //Подключение контролера
                $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
                if (file_exists($controllerFile)) {
                    include_once ($controllerFile);
                }

                //Создание объекта, вызов метода
                $controllerObject = new $controllerName;
                $result = call_user_func_array(array($controllerObject, $actionName), $parameters);
                if ($result != null) {
                    break;
                }
            }
        }


    }
}