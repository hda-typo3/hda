<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "hda".
 ***************************************************************/

$EM_CONF[$_EXTKEY] = array(
    'title' => 'h_da - Installation',
    'description' => '',
    'category' => 'templates',
    'version' => '13.0.01',
    'state' => 'alpha',
    'clearcacheonload' => true,
    'author' => 'Michael Lang',
    'author_email' => 'michael.lang@h-da.de',
    'author_company' => '',
    'constraints' => array(
        'depends' => array(
            'typo3' => '12.4.0 - 13.4.99',
        ),
        'conflicts' => array(
            'fluidpages' => '*',
            'themes' => '*',
        ),
    ),
);
