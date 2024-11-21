<?php

use LSR\Api\CalenderImport;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

require_once 'vendor/autoload.php';
const project_root = __DIR__ . DIRECTORY_SEPARATOR;

function makeDir(string $path): string
{
    $path = trim($path,"/");
    if(!is_dir($dirPath = project_root . $path)){
        if(!mkdir($dirPath, recursive: true)) {
            exit("Fehler beim Erstellen des Ordners $dirPath");
        }
    }
    return str_replace("/", DIRECTORY_SEPARATOR, $dirPath . DIRECTORY_SEPARATOR);
}

$loader = new FilesystemLoader(makeDir("templates"));
$twig = new Environment($loader, [
    'cache' => makeDir('/var/cache'),
    'debug' => true,
]);


// Veranstaltungen (IDs)
$events = [
    575974,
    575685,
    575856,
    576001,
    575192,
    576007,
    573965,
    575955,
    576048,
    575288,
    576007,
    576001,
    573965,
    580694,
    575281,
    588403,
    575862
];

$lsf = new CalenderImport($events);

try {
    echo $twig->render('index.html.twig', [
        'events' => $lsf->import()
    ]);
} catch (LoaderError|RuntimeError|SyntaxError $e) {

}