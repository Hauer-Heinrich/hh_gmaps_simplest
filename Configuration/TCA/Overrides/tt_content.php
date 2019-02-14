<?php
$GLOBALS['TCA']['tt_content']['ctrl']['typeicon_classes']['hhgmapssimplest_gmaps'] = 'tx_hhgmapssimplest_gmaps';

$tempColumns = [
    'tx_hhgmapssimplest_gmaps_key' => [
        'config' => [
            'type' => 'input',
        ],
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_gmaps_simplest/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhgmapssimplest_gmaps_key',
    ],
    'tx_hhgmapssimplest_marker_dest' => [
        'config' => [
            'type' => 'input',
        ],
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_gmaps_simplest/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhgmapssimplest_marker_dest',
    ],
    'tx_hhgmapssimplest_marker_text' => [
        'config' => [
            'enableRichtext' => '1',
            'richtextConfiguration' => 'default',
            'type' => 'text',
        ],
        'exclude' => '1',
        'label' => 'LLL:EXT:hh_gmaps_simplest/Resources/Private/Language/locallang_db.xlf:tt_content.tx_hhgmapssimplest_marker_text',
    ],
];
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns);

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
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:general,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,
            header,
            subheader,
            header_link,
            header_layout,
            header_position,
            tx_hhgmapssimplest_gmaps_key,
            tx_hhgmapssimplest_marker_text,
            tx_hhgmapssimplest_marker_dest,
            --div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.appearanceLinks;appearanceLinks,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:language,--palette--;;language,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:access,
            --palette--;;hidden,
            --palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:categories,
            --div--;LLL:EXT:core/Resources/Private/Language/locallang_tca.xlf:sys_category.tabs.category,categories,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:notes,rowDescription,
            --div--;LLL:EXT:core/Resources/Private/Language/Form/locallang_tabs.xlf:extended,
            tx_gridelements_container,
            tx_gridelements_columns,
            --div--;LLL:EXT:gridelements/Resources/Private/Language/locallang_db.xlf:gridElements',
    ],
];
$GLOBALS['TCA']['tt_content']['types'] += $tempTypes;
