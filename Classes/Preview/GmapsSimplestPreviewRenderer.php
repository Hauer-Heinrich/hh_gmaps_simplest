<?php
declare(strict_types=1);

/*
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 */

namespace HauerHeinrich\HhGmapsSimplest\Preview;

// use \TYPO3\CMS\Extbase\Utility\DebuggerUtility;
use \TYPO3\CMS\Backend\Preview\PreviewRendererInterface;
use \TYPO3\CMS\Backend\Routing\UriBuilder AS BackendUriBuilder;
use \TYPO3\CMS\Backend\View\BackendLayout\Grid\GridColumnItem;
use TYPO3\CMS\Core\Utility\GeneralUtility;

/**
 * Contains a preview rendering for the page module of CType="hhgmapssimplest_gmaps"
 */
class GmapsSimplestPreviewRenderer implements PreviewRendererInterface {

    public function renderPageModulePreviewHeader(GridColumnItem $item): string {
        return '';
    }

    public function renderPageModulePreviewContent(GridColumnItem $item): string {
        $content = '';
        $recordUid = isset($item->getRecord()['uid']) ? $item->getRecord()['uid'] : 0;
        $markerDestination = isset($item->getRecord()['tx_hhgmapssimplest_marker_dest']) ? $item->getRecord()['tx_hhgmapssimplest_marker_dest'] : '';
        $markerText = isset($item->getRecord()['tx_hhgmapssimplest_marker_text']) ? $item->getRecord()['tx_hhgmapssimplest_marker_text'] : '';

        if(!empty($markerText)) {
            $content .= '<b>Marker text:</b> '. $markerText;
        }

        if(!empty($markerDestination)) {
            $content .= '<i>'.$markerDestination.'</i>';
        }

        if($recordUid !== 0) {
            $backendUriBuilder = GeneralUtility::makeInstance(BackendUriBuilder::class);
            $uriParameters = [
                'edit' => [
                    'tt_content' => [
                        $recordUid => 'edit'
                    ]
                ]
            ];
            $editLinkObject = $backendUriBuilder->buildUriFromRoute('record_edit', $uriParameters);
            $editContentUrl = $editLinkObject->__toString();

            $content = '<a href="'.$editContentUrl.'" title="Edit record gmaps simplest">'.$content.'</a>';
        }

        return $content;
    }

    public function renderPageModulePreviewFooter(GridColumnItem $item): string {
        return '';
    }

    public function wrapPageModulePreview(string $previewHeader, string $previewContent, GridColumnItem $item): string {
        return $previewContent;
    }
}
