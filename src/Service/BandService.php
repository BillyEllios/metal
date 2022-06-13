<?php

namespace App\Service;

use App\Entity\Band;
use App\Repository\BandRepository;

class BandService {
    public function __construct(private BandRepository $bandRepository) {}

    public function getBand(): Band {
        $bands = $this->bandRepository->findAll();
        return $bands[array($bands)];
    }
}