<?php

defined('TYPO3') || die('Access denied.');

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

call_user_func(static function () {
    
    # The extension configuration -----------------------------------------------------------------------#
    
    if (class_exists('TYPO3\CMS\Core\Configuration\ExtensionConfiguration')) {
        $extensionConfiguration = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(
            \TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class
            );
        $Configuration = $extensionConfiguration->get('hda');
    } else {
        $Configuration = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('hda');
        if (!is_array($Configuration)) {
            $Configuration = unserialize($Configuration);
        }
    }
    
    # Enable/dissable the StartLayouts -> addPageTSConfig
    if ($Configuration['StartLayout']) {
        ExtensionManagementUtility::addPageTSConfig("@import 'EXT:hda/Configuration/TsConfig/StartLayout.tsconfig'");
    }
    
    # Enable/dissable the RightTopnavigation Small media -> addPageTSConfig
    if ($Configuration['RightNavigationInMediaTopLayout']) {
        ExtensionManagementUtility::addPageTSConfig("@import 'EXT:hda/Configuration/TsConfig/RightNavigationInMediaTopLayout.tsconfig'");
    }
        
    # Enable/dissable the Monitornavigation  -> addPageTSConfig
    if ($Configuration['Monitor']) {
        ExtensionManagementUtility::addPageTSConfig("@import 'EXT:hda/Configuration/TsConfig/Monitor.tsconfig'");
    }
    
    # Enable/dissable the Frame-Designs
    if ($Configuration['Design']) {
        ExtensionManagementUtility::addPageTSConfig("@import 'EXT:hda/Configuration/TsConfig/Design.tsconfig'");
    }
    
    
});