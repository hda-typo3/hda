<?php

defined('TYPO3') || die('Access denied.');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile(
	'hda', 
	'Configuration/TypoScript', 
	'h_da - Setup-Installation'
);
