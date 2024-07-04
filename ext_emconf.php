<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "hda".
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
    'title' => 'h_da - Installation',
    'description' => '',
    'category' => 'templates',
    'version' => '10.0.0',
    'state' => 'alpha',
    'clearcacheonload' => true,
    'author' => 'Michael Lang',
    'author_email' => 'michael.lang@h-da.de',
    'author_company' => '',
    'constraints' => array(
        'depends' => array(
            'typo3' => '10.4 -',
        ),
        'conflicts' => array(
            'fluidpages' => '*',
            'themes' => '*',
        ),
    ),
);