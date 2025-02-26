<?php

defined('TYPO3') || die('Access denied.');

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

ExtensionManagementUtility::addPageTSConfig("@import 'EXT:hda/Configuration/TsConfig/Layouts/Design.tsconfig'");
ExtensionManagementUtility::addPageTSConfig("@import 'EXT:hda/Configuration/TsConfig/Layouts/brofix.tsconfig'");
ExtensionManagementUtility::addPageTSConfig("@import 'EXT:hda/Configuration/TsConfig/Layouts/linkvalidator.tsconfig'");