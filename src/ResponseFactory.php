<?php

namespace Framework;

use phpDocumentor\GraphViz\Exception;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class ResponseFactory
{
    private Environment $twig;

    public function __construct(bool $debugMode, string $viewsPath)
    {
        $loader = new FilesystemLoader($viewsPath);
        $this->twig = new Environment($loader, [
            'debug' => $debugMode,
        ]);

        if ($debugMode) {
            $this->twig->addExtension(new DebugExtension());
        }
    }

    /**
     * @param string $template
     * @param string[] $parameters
     * @return Response
     */
    public function view(string $template, array $parameters = []): Response
    {
        $response = new Response();

        try {
            $response->responseCode = 200;
            $response->body = $this->twig->render($template, $parameters);
        } catch (\Exception $e) {
            $response->responseCode = 500;
            $response->body = $e->getMessage();
        }
        return $response;
    }

    public function notFound(): Response
    {
        $response = new Response();

        try {
            $response->responseCode = 404;
            $response->body = $this->twig->render("404.html.twig");
        } catch (\Exception $e) {
            $response->responseCode = 500;
            $response->body = $e->getMessage();
        }

        return $response;
    }
}
