<?php

namespace LSR\Controller;

use LSR\Api\CalenderImport;

class AppController extends AbstractController
{

    public function index(): string
    {
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

        return $this->render('index.html.twig', [
            'events' => $lsf->import()
        ]);
    }

    public function presentation(): string
    {

        return $this->render('/presentation/test.html.twig');
    }

}