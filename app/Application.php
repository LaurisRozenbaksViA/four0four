<?php
namespace ToDoProject;

use ToDoProject\Controllers\SportTODOcontrol;
use ToDoProject\Controllers\CategoriesController;

use ToDoProject\Controllers\LandingController;
use ToDoProject\Controllers\TaskController;
use ToDoProject\Controllers\CategoryController;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;
class Application
{
    private $dispatcher;
    private $loader;
    private $twig;

    public function __construct()
    {
        $this->dispatcher = $this->configureRoutes();
    }

    public function getContainer(): Container
    {
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->setParameter('resource.views', __DIR__ . '/views/');
        $containerBuilder->register('database', '\Medoo\Medoo')
            ->addArgument(
                [
                    'database_type' => 'mysql',
                    'database_name' => 'bootcamp',
                    'server' => 'localhost',
                    'username' => 'root',
                    'password' => ''
                ]
            );
        $containerBuilder->setParameter('resource.cache', __DIR__ . '/compilation_cache');
        $containerBuilder->register('repository.task', '\ToDoProject\Repositories\TaskRepository')
            ->addArgument(new Reference('database'));
        $containerBuilder->register('repository.landing', '\ToDoProject\Repositories\LandingRepository')
            ->addArgument(new Reference('database'));
        $containerBuilder->register('repository.category', '\ToDoProject\Repositories\CategoryRepository')

            ->addArgument(new Reference('database'));
        $containerBuilder->register('model.task', '\ToDoProject\Models\Task')
            ->addArgument(new Reference('repository.task'));
        $containerBuilder->register('model.landing', '\ToDoProject\Models\Landing')
            ->addArgument(new Reference('repository.landing'));
        $containerBuilder->register('model.category', '\ToDoProject\Models\Category')
            ->addArgument(new Reference('repository.category'));

        $containerBuilder->register('twig.loader', '\Twig_Loader_Filesystem')
            ->addArgument('%resource.views%');
        $containerBuilder->register('twig.enviroment', '\Twig_Environment')
            ->addArgument(new Reference('twig.loader'))
            ->addArgument(array('cache' => false));
        return new Container($containerBuilder);
    }

    public function handle($httpMethod, $uri)
    {
        if (false !== $pos = strpos($uri, '?')) {
            $uri = substr($uri, 0, $pos);
        }
        $uri = rawurldecode($uri);
        $routeInfo = $this->dispatcher->dispatch($httpMethod, $uri);
        $response = '';
        switch ($routeInfo[0]) {
            case \FastRoute\Dispatcher::NOT_FOUND:
                //http_response_code(404);
                header('HTTP/1.1 404 Not Found');
                break;
            case \FastRoute\Dispatcher::FOUND:
                $handler = $routeInfo[1];
                $vars = $routeInfo[2];
                $response = call_user_func_array($handler, $vars);
                break;
        }
        return $response;
    }

    protected function configureRoutes()
    {
        $dispatcher = \FastRoute\simpleDispatcher(function (\FastRoute\RouteCollector $r) {
            $task = new TaskController($this->getContainer());
            $landing = new LandingController($this->getContainer());
            $category = new CategoryController($this->getContainer());

            $r->addRoute('GET', '/', [$landing, 'landingAction']);
            $r->addRoute('GET', '/task=[{taskID}]', [$task, 'taskAction']);
            $r->addRoute('GET', '/category=[{categoryID}]', [$category, 'categoryAction']);
        });
        return $dispatcher;
    }
}