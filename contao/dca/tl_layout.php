<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;

/*
 * Neue Legende "Custom Contao" im Seitenlayout: pro Datei eine Checkbox, ob sie
 * geladen werden soll. Der AddLayoutAssetsListener wertet die Werte aus und bindet
 * die jeweiligen Assets ein (klassisch + modernes Twig-Layout).
 */

PaletteManipulator::create()
    ->addLegend('heimseiten_customcontao_legend', 'script_legend', PaletteManipulator::POSITION_AFTER)
    ->addField(
        [
            'cc_scroll_direction',
            'cc_add_header_height',
            'cc_scroll_to_error',
            'cc_remove_body_class_preload',
            'cc_horizontale_slide_animation',
        ],
        'heimseiten_customcontao_legend',
        PaletteManipulator::POSITION_APPEND
    )
    ->applyToPalette('default', 'tl_layout')
;

$ccCheckbox = [
    'inputType' => 'checkbox',
    'eval'      => ['tl_class' => 'w50'],
    'sql'       => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_layout']['fields']['cc_scroll_direction'] = array_merge(
    ['label' => &$GLOBALS['TL_LANG']['tl_layout']['cc_scroll_direction']], $ccCheckbox
);
$GLOBALS['TL_DCA']['tl_layout']['fields']['cc_add_header_height'] = array_merge(
    ['label' => &$GLOBALS['TL_LANG']['tl_layout']['cc_add_header_height']], $ccCheckbox
);
$GLOBALS['TL_DCA']['tl_layout']['fields']['cc_scroll_to_error'] = array_merge(
    ['label' => &$GLOBALS['TL_LANG']['tl_layout']['cc_scroll_to_error']], $ccCheckbox
);
$GLOBALS['TL_DCA']['tl_layout']['fields']['cc_remove_body_class_preload'] = array_merge(
    ['label' => &$GLOBALS['TL_LANG']['tl_layout']['cc_remove_body_class_preload']], $ccCheckbox
);
$GLOBALS['TL_DCA']['tl_layout']['fields']['cc_horizontale_slide_animation'] = array_merge(
    ['label' => &$GLOBALS['TL_LANG']['tl_layout']['cc_horizontale_slide_animation']], $ccCheckbox
);
