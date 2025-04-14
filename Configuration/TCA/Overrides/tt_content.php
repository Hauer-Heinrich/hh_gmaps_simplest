<?php
defined('TYPO3') || die();

use \TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['hhgmapssimplest_gmaps'] = 'tx_hhgmapssimplest_gmaps';

$tempColumns = [
    'tx_hhgmapssimplest_gmaps_key' => [
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_gmaps_simplest/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhgmapssimplest_gmaps_key',
        'description' => 'LLL:EXT:hh_gmaps_simplest/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhgmapssimplest_gmaps_key.description',
        'config' => [
            'type' => 'input',
        ],
    ],
    'tx_hhgmapssimplest_marker_dest' => [
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_gmaps_simplest/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhgmapssimplest_marker_dest',
        'description' => 'LLL:EXT:hh_gmaps_simplest/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhgmapssimplest_marker_dest.description',
        'config' => [
            'type' => 'input',
        ],
    ],
    'tx_hhgmapssimplest_marker_text' => [
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_gmaps_simplest/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhgmapssimplest_marker_text',
        'description' => 'LLL:EXT:hh_gmaps_simplest/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhgmapssimplest_marker_text.description',
        'config' => [
            'type' => 'text',
            'enableRichtext' => '1',
            'richtextConfiguration' => 'default',

        ],
    ],
    'tx_hhgmapssimplest_gmaps_googleid' => [
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_gmaps_simplest/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhgmapssimplest_gmaps_googleid',
        'description' => 'LLL:EXT:hh_gmaps_simplest/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhgmapssimplest_gmaps_googleid.description',
        'config' => [
            'type' => 'input',
            'eval' => 'trim',
            'behaviour' => [
                'allowLanguageSynchronization' => true,
            ],
        ],
    ],
];
ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns);

$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'][] = [
    'LLL:EXT:hh_gmaps_simplest/Resources/Private/Language/locallang_db.xlf:tt_content.CType.div._hhgmapssimplest_',
    '--div--',
];

$GLOBALS['TCA']['tt_content']['columns']['CType']['config']['items'][] = [
    'LLL:EXT:hh_gmaps_simplest/Resources/Private/Language/locallang_db.xlf:tt_content.CType.hhgmapssimplest_gmaps',
    'hhgmapssimplest_gmaps',
    'tx_hhgmapssimplest_gmaps',
];

$tempTypes = [
    'hhgmapssimplest_gmaps' => [
        'columnsOverrides' => [
            'bodytext' => [
                'config' => [
                    'richtextConfiguration' => 'default',
                    'enableRichtext' => 1,
                ],
            ],
        ],
        'showitem' => '
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
            --palette--;;headers,
            bodytext,

            --div--;LLL:EXT:hh_gmaps_simplest/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhgmapssimplest_gmap.tab.option,
                tx_hhgmapssimplest_gmaps_key,
                tx_hhgmapssimplest_gmaps_googleid,
                tx_hhgmapssimplest_marker_text,
                tx_hhgmapssimplest_marker_dest,

            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
                --palette--;;frames,
                --palette--;;appearanceLinks,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,
                --palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
                --palette--;;hidden,
                --palette--;;access,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
                    categories,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,
                rowDescription,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.extended,
            ',
    ],
];
$GLOBALS['TCA']['tt_content']['types'] += $tempTypes;

// Backend Preview
$GLOBALS['TCA']['tt_content']['types']['hhgmapssimplest_gmaps']['previewRenderer'] = \HauerHeinrich\HhGmapsSimplest\Preview\GmapsSimplestPreviewRenderer::class;
