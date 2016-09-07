<?php

if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

$tmp = [
    'tx_staticfilecache_cache' => [
        'exclude' => 0,
        'label' => 'LLL:EXT:staticfilecache/Resources/Private/Language/locallang.xml:staticfilecache.field',
        'config' => [
            'type' => 'check',
            'default' => '1',
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('pages', $tmp);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes('pages', 'tx_staticfilecache_cache;;;;1-1-1');

if (TYPO3_MODE == 'BE') {
    // Add Web>Info module:
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::insertModuleFunction(
        'web_info',
        \SFC\Staticfilecache\Module\CacheModule::class,
        null,
        'LLL:EXT:staticfilecache/Resources/Private/Language/locallang.xml:module.title'
    );
}