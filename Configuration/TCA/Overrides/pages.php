<?php
defined('TYPO3_MODE') || defined('TYPO3') || die('Access denied.');

$pagesColumns = [
    
    'editor' => [
        'exclude' => true,
        'label' => 'LLL:EXT:hda/Resources/Private/Language/locallang.xlf:editor',
        'config' => [
            'type' => 'input',
            'size' => 60
        ]
    ],
    'editor_substitute' => [
        'exclude' => true,
        'label' => 'LLL:EXT:hda/Resources/Private/Language/locallang.xlf:editor_substitute',
        'config' => [
            'type' => 'input',
            'size' => 60
        ]
    ],
];

$GLOBALS['TCA']['pages']['palettes']['hda'] = array(
    'canNotCollapse' => true,
    'showitem' => ',-linebreak--,editor,editor_substitute'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $pagesColumns);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages', 'xtrafunction,--palette--;LLL:EXT:hda/Resources/Private/Language/locallang.xlf:palette;hda', '', 'after:subtitle');
