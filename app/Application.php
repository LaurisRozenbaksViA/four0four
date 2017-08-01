<?php

namespace ToDoProject;

use ToDoProject\Controllers\SportTODOcontrol;
use ToDoProject\Controllers\CategoriesController;
use ToDoProject\Controllers\TaskController;
use ToDoProject\Controllers\LandingController;
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

    public function getContainer() : Container
    {
        $containerBuilder = new ContainerBuilder();
        $containerBuilder->setParameter('resource.views', __DIR__ . '/views/');
        $containerBuilder->setParameter('resource.cache', __DIR__ . '/compilation_cache');
        $containerBuilder->register('repository.dummy', '\ToDoProject\Repositories\DummyTaskRepository');
        $containerBuilder->register('repository.landing', '\ToDoProject\Repositories\LandingRepository');
        $containerBuilder->register('repository.dummy2', '\ToDoProject\Repositories\DummyCategoriesRepository');
        $containerBuilder->register('model.task', '\ToDoProject\Models\Task')
            ->addArgument(new Reference('repository.dummy'));
        $containerBuilder->register('model.landing', 'ToDoProject\Models\Landing')
            ->addArgument(new Reference('repository.landing'));
        $containerBuilder->register('model.todo', '\ToDoProject\Models\Kat1Model')
            ->addArgument(new Reference('repository.dummy'));
        $containerBuilder->register('model.categ', '\ToDoProject\Models\Categories')
            ->addArgument(new Reference('repository.dummy2'));
        $containerBuilder->register('twig.loader', '\Twig_Loader_Filesystem')
        ->addArgument('%resource.views%');
        $containerBuilder->register('twig.enviroment', '\Twig_Environment')
            ->addArgument(new Reference('twig.loader'))
            ->addArgument(array('cache'=>false));

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
        $dispatcher = \FastRoute\simpleDispatcher(function(\FastRoute\RouteCollector $r) {

            $task = new TaskController($this->getContainer());
            $landing = new LandingController($this->getContainer());
            $todo = new SportTODOcontrol($this->getContainer());
            $categ = new CategoriesController($this->getContainer());

            $r->addRoute('GET', '/singletask', [$task, 'taskAction']);
            $r->addRoute('GET', '/', [$landing, 'landingAction']);
            $r->addRoute('GET', '/todo', [$todo, 'sportcontrol']);
            $r->addRoute('GET', '/categories', [$categ, 'categoriescontrol']);

        });

        return $dispatcher;
    }
}
