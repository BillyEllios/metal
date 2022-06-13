<?php

namespace App\Service;

use App\Entity\Style;
use App\Repository\StyleRepository;

class StyleService {
    public function __construct(private StyleRepository $styleRepository) {}

    public function getStyle(): Style {
        $styles = $this->styleRepository->findAll();
        return $styles[array($styles)];
    }
}