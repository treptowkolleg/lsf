<?php

use LSR\Api\CalenderImport;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Loader\FilesystemLoader;

require_once 'vendor/autoload.php';
const project_root = __DIR__;

$loader = new FilesystemLoader(project_root.'/templates');
$twig = new Environment($loader, [
    'cache' => project_root.'/var/cache',
    'debug' => false,
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