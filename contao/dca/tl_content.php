<?php
use Contao\CoreBundle\DataContainer\PaletteManipulator;
use Contao\DataContainer;
use Contao\StringUtil;

PaletteManipulator::create()   

    ->addField('sliderEffect', 'slider_legend', PaletteManipulator::POSITION_PREPEND)
    
    ->addField('sliderButtons', 'slider_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('sliderPagination', 'slider_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('sliderScrollbar', 'slider_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('sliderAutoheight', 'slider_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('sliderKeyboardControl', 'slider_legend', PaletteManipulator::POSITION_APPEND)
    
    ->addField('sliderBreakpoint1', 'slider_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('sliderSlidesPerViewBreakpoint1', 'slider_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('sliderSpaceBetweenBreakpoint1', 'slider_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('sliderCenteredSlidesBreakpoint1', 'slider_legend', PaletteManipulator::POSITION_APPEND)

    ->addField('sliderBreakpoint2', 'slider_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('sliderSlidesPerViewBreakpoint2', 'slider_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('sliderSpaceBetweenBreakpoint2', 'slider_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('sliderCenteredSlidesBreakpoint2', 'slider_legend', PaletteManipulator::POSITION_APPEND)

    ->addField('sliderBreakpoint3', 'slider_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('sliderSlidesPerViewBreakpoint3', 'slider_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('sliderSpaceBetweenBreakpoint3', 'slider_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('sliderCenteredSlidesBreakpoint3', 'slider_legend', PaletteManipulator::POSITION_APPEND)

    ->addField('sliderBreakpoint4', 'slider_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('sliderSlidesPerViewBreakpoint4', 'slider_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('sliderSpaceBetweenBreakpoint4', 'slider_legend', PaletteManipulator::POSITION_APPEND)
    ->addField('sliderCenteredSlidesBreakpoint4', 'slider_legend', PaletteManipulator::POSITION_APPEND)
    
    ->applyToPalette('swiper', 'tl_content')
;

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderDelay']['eval']['rgxp'] = 'natural';
$GLOBALS['TL_DCA']['tl_content']['fields']['sliderDelay']['default'] = 5000;

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderSpeed']['eval']['rgxp'] = 'natural';
$GLOBALS['TL_DCA']['tl_content']['fields']['sliderSpeed']['default'] = 1500;


$GLOBALS['TL_DCA']['tl_content']['fields']['sliderBreakpoint1'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderBreakpoint1'],
    'exclude' => true,
    'default' => 0,
    'inputType' => 'text',
    'eval' => ['maxlength' => 4, 'tl_class' => 'w25 clr'],
    'sql' => "varchar(4) NOT NULL default '0'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderSlidesPerViewBreakpoint1'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderSlidesPerViewBreakpoint1'],
    'exclude' => true,
    'default' => 1,
    'inputType' => 'text',
    'eval' => ['maxlength' => 4, 'tl_class' => 'w25'],
    'sql' => "varchar(4) NOT NULL default '1'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderSpaceBetweenBreakpoint1'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderSpaceBetweenBreakpoint1'],
    'exclude' => true,
    'default' => 0,
    'inputType' => 'text',
    'eval' => ['rgxp' => 'digit', 'maxlength' => 5, 'tl_class' => 'w25'],
    'sql' => ['type' => 'integer', 'unsigned' => false, 'default' => 0],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderCenteredSlidesBreakpoint1'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderCenteredSlidesBreakpoint1'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w25 m12'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderBreakpoint2'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderBreakpoint2'],
    'exclude' => true,
    'default' => 768,
    'inputType' => 'text',
    'eval' => ['maxlength' => 4, 'tl_class' => 'w25'],
    'sql' => "varchar(4) NOT NULL default '768'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderSlidesPerViewBreakpoint2'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderSlidesPerViewBreakpoint2'],
    'exclude' => true,
    'default' => 2,
    'inputType' => 'text',
    'eval' => ['maxlength' => 4, 'tl_class' => 'w25'],
    'sql' => "varchar(4) NOT NULL default '2'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderSpaceBetweenBreakpoint2'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderSpaceBetweenBreakpoint2'],
    'exclude' => true,
    'default' => 10,
    'inputType' => 'text',
    'eval' => ['rgxp' => 'digit', 'maxlength' => 5, 'tl_class' => 'w25'],
    'sql' => ['type' => 'integer', 'unsigned' => false, 'default' => 10],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderCenteredSlidesBreakpoint2'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderCenteredSlidesBreakpoint2'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w25 m12'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderBreakpoint3'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderBreakpoint3'],
    'exclude' => true,
    'default' => 1024,
    'inputType' => 'text',
    'eval' => ['maxlength' => 4, 'tl_class' => 'w25'],
    'sql' => "varchar(4) NOT NULL default '1024'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderSlidesPerViewBreakpoint3'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderSlidesPerViewBreakpoint3'],
    'exclude' => true,
    'default' => 4,
    'inputType' => 'text',
    'eval' => ['maxlength' => 4, 'tl_class' => 'w25'],
    'sql' => "varchar(4) NOT NULL default '4'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderSpaceBetweenBreakpoint3'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderSpaceBetweenBreakpoint3'],
    'exclude' => true,
    'default' => 30,
    'inputType' => 'text',
    'eval' => ['rgxp' => 'digit', 'maxlength' => 5, 'tl_class' => 'w25'],
    'sql' => ['type' => 'integer', 'unsigned' => false, 'default' => 30],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderCenteredSlidesBreakpoint3'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderCenteredSlidesBreakpoint3'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w25 m12'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderBreakpoint4'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderBreakpoint4'],
    'exclude' => true,
    'default' => 1441,
    'inputType' => 'text',
    'eval' => ['maxlength' => 4, 'tl_class' => 'w25'],
    'sql' => "varchar(4) NOT NULL default '1441'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderSlidesPerViewBreakpoint4'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderSlidesPerViewBreakpoint4'],
    'exclude' => true,
    'default' => 5,
    'inputType' => 'text',
    'eval' => ['maxlength' => 4, 'tl_class' => 'w25'],
    'sql' => "varchar(4) NOT NULL default '5'",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderSpaceBetweenBreakpoint4'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderSpaceBetweenBreakpoint4'],
    'exclude' => true,
    'default' => 40,
    'inputType' => 'text',
    'eval' => ['rgxp' => 'digit', 'maxlength' => 5, 'tl_class' => 'w25'],
    'sql' => ['type' => 'integer', 'unsigned' => false, 'default' => 40],
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderCenteredSlidesBreakpoint4'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderCenteredSlidesBreakpoint4'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w25 m12'],
    'sql' => "char(1) NOT NULL default ''",
];


$GLOBALS['TL_DCA']['tl_content']['fields']['sliderEffect'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderEffect'],
    'exclude' => true,
    'default' => 'slide',
    'inputType' => 'select',
    'options' => [
        'slide' => 'Slide',
        'fade' => 'Fade',
        'cube' => 'Cube',
        'coverflow' => 'Coverflow',
        'flip' => 'Flip',
    ],
    'eval' => ['tl_class' => 'w25'],
    'sql' => "varchar(16) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderButtons'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderButtons'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w25 m12'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderScrollbar'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderScrollbar'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w25 m12'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderPagination'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderPagination'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w25 m12'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderBreakpoints'] = [
    'exclude' => true,
    'inputType' => 'group',
    'palette' => ['breakpoint', 'slidesPerView', 'spaceBetween'],
    'eval' => ['tl_class' => 'clr'],
    'fields' => [
        'breakpoint' => [
            'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderBreakpointsSettings']['breakpoint'],
            'inputType' => 'text',
            'eval' => ['rgxp' => 'natural', 'tl_class' => 'w50'],
        ],
        'slidesPerView' => [
            'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderBreakpointsSettings']['slidesPerView'],
            'inputType' => 'text',
            'eval' => ['maxlength' => 4, 'tl_class' => 'clr w50'],
        ],
        'spaceBetween' => [
            'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderBreakpointsSettings']['spaceBetween'],
            'inputType' => 'text',
            'eval' => ['rgxp' => 'digit', 'tl_class' => 'w50'],
        ],
    ],
    'sql' => 'BLOB null',
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderAutoheight'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderAutoheight'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w25 m12'],
    'sql' => "char(1) NOT NULL default ''",
];

$GLOBALS['TL_DCA']['tl_content']['fields']['sliderKeyboardControl'] = [
    'label' => &$GLOBALS['TL_LANG']['tl_content']['sliderKeyboardControl'],
    'exclude' => true,
    'inputType' => 'checkbox',
    'eval' => ['tl_class' => 'w25 m12'],
    'sql' => "char(1) NOT NULL default ''",
];