<?php

namespace LSR\Controller;

use AllowDynamicProperties;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

class AbstractController
{
    private FilesystemLoader $loader;
    private Environment $twig;

    public function __construct()
    {
        $this->loader = new FilesystemLoader($this->makeDir("templates"));
        $this->twig = new Environment($this->loader, [
            'cache' => $this->makeDir('/var/cache'),
            'debug' => true,
        ]);
    }

    private function makeDir(string $path): string
    {
        $path = trim($path,"/");
        if(!is_dir($dirPath = project_root . $path)){
            if(!mkdir($dirPath, recursive: true)) {
                exit("Fehler beim Erstellen des Ordners $dirPath");
            }
        }
        return str_replace("/", DIRECTORY_SEPARATOR, $dirPath . DIRECTORY_SEPARATOR);
    }

    protected function render(string $template, array $parameters = []): string
    {
        try {
            return $this->twig->render($template, $parameters);
        } catch (LoaderError|RuntimeError|SyntaxError $e) {
            return $e->getMessage();
        }
    }

}