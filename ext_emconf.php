<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "hh_gmaps_simplest".
 *
 * Auto generated 14-02-2019 14:40
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF['hh_gmaps_simplest'] = [
    "title" => "hh_gmaps_simplest",
    "description" => "Hauer-Heinrich - Simple Google Maps TYPO3 extension.",
    "category" => "fe",
    "author" => "Christian Hackl",
    "author_email" => "chackl@hauer-heinrich.de",
    "author_company" => "Werbeagentur Hauer-Heinrich.de",
    "state" => "stable",
    "version" => "0.2.0",
    "constraints" => [
        "depends" => [
            "typo3" => "10.4.0-11.5.99",
            "fluid_styled_content" => "10.4.0-11.5.99",
        ],
        "conflicts" => [
        ],
        "suggests" => [
        ],
    ],
    'autoload' => [
        'psr-4' => [
            'HauerHeinrich\\HhGmapsSimplest\\' => 'Classes',
        ],
    ],
];
