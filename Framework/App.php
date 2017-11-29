<?php

namespace Framework;

class App
{
    /**
     * @var $container Container
     */
    private $container;

    public function __construct()
    {
        $this->init();
        $this->run();
    }

    private function init()
    {
        $this->container = new Container();
        $this->define();
    }

    private function run()
    {
        try {

            $config = yaml_parse(file_get_contents(APP_PATH."/app/configuration/config.yml"));

            $this->container->set('config', function () use ($config) {
               return (object)$config;
            });

            $this->container->set('database', function () use ($config) {
                return (new Database($config['database']))->connect();
            });

            // set Twig in the Registry
            $loader = new \Twig_Loader_Filesystem(APP_PATH.'/app/views/');
            $twig   = new \Twig_Environment($loader, array('autoescape' => false, 'debug' => $config['debug'],));
            if ($config['debug']) {
                $twig->addExtension(new \Twig_Extension_Debug());
            }
            $this->container->set('twig', function () use ($twig) {
               return $twig;
            });

            $router = new Router($this->container, array(
                "url" => trim($_SERVER['REQUEST_URI'], "/"),
            ));
            $this->container->set('router', function () use ($router){
               return $router;
            });
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