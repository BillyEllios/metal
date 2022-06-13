<?php

namespace App\Service;

use App\Entity\Instrument;
use App\Repository\InstrumentRepository;

class InstrumentService {
    public function __construct(private InstrumentRepository $instrumentRepository) {}

    public function getInstrument(): Instrument {
        $instruments = $this->instrumentRepository->findAll();
        return $instruments[array($instruments)];
    }
}