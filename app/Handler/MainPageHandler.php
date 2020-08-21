<?php

namespace App\Handler;

use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\RequestHandlerInterface;
use Psr\Log\LoggerInterface;
use Slim\Psr7\Response;

/**
 * Class MainPageHandler
 * @package app\Handler
 */
class MainPageHandler implements RequestHandlerInterface
{
    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * MainPageHandler constructor
     *
     * @param LoggerInterface $logger
     * @param ContainerInterface $container
     */
    public function __construct(LoggerInterface $logger, ContainerInterface $container)
    {
        $this->logger = $logger;
        $this->container = $container;
    }

    /**
     * @param ServerRequestInterface $request
     * @return ResponseInterface
     */
    public function handle(ServerRequestInterface $request): ResponseInterface
    {
        $this->logger->info('Main page handler dispatched');
        $response = new Response();

        $nameParam = $request->getAttribute('name', 'world');

        return $this->container->get('view')->render($response, 'index.twig', [
            'content' => "Hello $nameParam!"
        ]);
    }
}
