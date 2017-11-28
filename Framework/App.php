<?php

namespace Framework;

class App
{
    public function __construct()
    {
        $this->init();
        $this->run();
    }

    private function init()
    {
        $this->define();
    }

    private function run()
    {
        try {

            $config = yaml_parse(file_get_contents(APP_PATH."/app/configuration/config.yml"));

            Registry::set("config", (object)$config);
            $database = new Database($config['database']);
            Registry::set("database", $database->connect());

            // set Twig in the Registry
            $loader = new \Twig_Loader_Filesystem(APP_PATH.'/app/views/');
            $twig   = new \Twig_Environment($loader, array('autoescape' => false, 'debug' => $config['debug'],));
            if ($config['debug']) {
                $twig->addExtension(new \Twig_Extension_Debug());
            }
            Registry::set("twig", $twig);

            $router = new Router(array(
                "url" => trim($_SERVER['REQUEST_URI'], "/"),
            ));
            Registry::set("router", $router);
            foreach (\app\configuration\Routes::$routes as $route) {
                $router->addRoute(new Route($route));
            }

            $router->dispatch();
        } catch (\Exception $e) {

            header("Content-type: text/html");
            echo "An error occurred. ".$e->getMessage();
            exit;
        }
    }

    private function define()
    {
        define("APP_PATH", dirname(dirname(__FILE__)));
        define("BASE_URL", 'http://'.$_SERVER["SERVER_NAME"].'/');
        setlocale(LC_TIME, 'fra', 'fr_FR');
    }
}