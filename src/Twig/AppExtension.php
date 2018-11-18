<?php

// src/Twig/AppExtension.php
namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class AppExtension extends AbstractExtension
{
    public function getFilters()
    {
        return array(
            new TwigFilter('lienDocument', array($this, 'lienDocument')),
        );
    }

    public function lienDocument($fichier)
    {
        $directory = "";
dump($fichier);
        return $fichier.vars.data.pathname;
    }
}