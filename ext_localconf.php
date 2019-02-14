<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(function() {
    // Register content element icons
    $iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);
    $iconRegistry->registerIcon(
        'tx_hhgmapssimplest_gmaps',
        \TYPO3\CMS\Core\Imaging\IconProvider\BitmapIconProvider::class,
        [
            'source' => 'EXT:hh_gmaps_simplest/Resources/Public/Icons/Content/gmaps.png',
        ]
    );

    // Add backend preview hook
    // $GLOBALS['TYPO3_CONF_VARS']['SC_OPTIONS']['cms/layout/class.tx_cms_layout.php']['tt_content_drawItem']['hh_gmaps_simplest'] =
    //     HauerHeinrich\HhGmapsSimplest\Hooks\PageLayoutViewDrawItem::class;
});
