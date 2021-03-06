<?php
defined('TYPO3_MODE') || die();

call_user_func(
    function () {
        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'dpn_glossary',
            'Glossary',
            'LLL:EXT:dpn_glossary/Resources/Private/Language/locallang.xlf:tx_dpnglossary.wizard_glossary_title'
        );

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'dpn_glossary',
            'Glossarypreview',
            'LLL:EXT:dpn_glossary/Resources/Private/Language/locallang.xlf:tx_dpnglossary.wizard_preview_title'
        );

        $flexforms = [
            'dpnglossary_glossarypreview' => '/Configuration/FlexForms/Preview.xml',
        ];

        foreach ($flexforms as $plugin => $flexform) {
            $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_excludelist'][$plugin] = 'recursive,select_key,pages';
            $GLOBALS['TCA']['tt_content']['types']['list']['subtypes_addlist'][$plugin] = 'pi_flexform';

            \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($plugin, 'FILE:EXT:dpn_glossary' . $flexform);
        }
    }
);
