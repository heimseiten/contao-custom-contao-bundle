<?php

use Contao\CoreBundle\DataContainer\PaletteManipulator;

/*
 * Legende „Custom Contao" im Seitenlayout: pro Datei eine Checkbox, ob sie
 * geladen werden soll. Der AddLayoutAssetsListener wertet die Werte aus und
 * bindet nur die aktivierten Assets ein (klassisch + modernes Twig-Layout).
 *
 * Wird an die Paletten „default" UND „modern" gehängt (modernes Layout nutzt die
 * eigene „modern"-Palette). Referenz „modules_legend", weil diese in beiden
 * Paletten existiert.
 */

$ccFields = [
    'cc_scroll_direction',
    'cc_add_header_height',
    'cc_scroll_to_error',
    'cc_remove_body_class_preload',
    'cc_horizontale_slide_animation',
];

PaletteManipulator::create()
    ->addLegend('heimseiten_customcontao_legend', 'modules_legend', PaletteManipulator::POSITION_AFTER)
    ->addField($ccFields, 'heimseiten_customcontao_legend', PaletteManipulator::POSITION_APPEND)
    ->applyToPalette('default', 'tl_layout')
    ->applyToPalette('modern', 'tl_layout')
;

foreach ($ccFields as $ccField) {
    $GLOBALS['TL_DCA']['tl_layout']['fields'][$ccField] = [
        'label'     => &$GLOBALS['TL_LANG']['tl_layout'][$ccField],
        'inputType' => 'checkbox',
        'eval'      => ['tl_class' => 'w50'],
        'sql'       => "char(1) NOT NULL default ''",
    ];
}
