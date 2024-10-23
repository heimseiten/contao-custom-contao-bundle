<?php

namespace Heimseiten\ContaoCustomContaoBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;

#[AsHook('replaceInsertTags')]

class ReplaceInsertTagsListener
{

    public function __invoke(string $tag)
    {
        $iconPath = 'assets/fontawesome/svgs/';
        $customIconPath = 'files/layout/icons/fontawesome/svgs/';

        [$name, $param, $cssClass] = explode('::', $tag) + [null, null];

        switch ($name) {    
            case 'fab':
                return $this->buildHtml($param, 'brands', $iconPath, $customIconPath, $cssClass);
                break;
            case 'fa':
                return $this->buildHtml($param, 'regular', $iconPath, $customIconPath, $cssClass);
                break;
            case 'fas':
                return $this->buildHtml($param, 'solid', $iconPath, $customIconPath, $cssClass);
                break;
            case 'fad':
                return $this->buildHtml($param, 'duotone', $iconPath, $customIconPath, $cssClass);
                break;
            case 'fal':
                return $this->buildHtml($param, 'light', $iconPath, $customIconPath, $cssClass);
                break;
            case 'fat':
                return $this->buildHtml($param, 'thin', $iconPath, $customIconPath, $cssClass);
                break;
            case 'fasl':
                return $this->buildHtml($param, 'sharp-light', $iconPath, $customIconPath, $cssClass);
                break;
            case 'fasr':
                return $this->buildHtml($param, 'sharp-regular', $iconPath, $customIconPath, $cssClass);
                break;
            case 'fass':
                return $this->buildHtml($param, 'sharp-solid', $iconPath, $customIconPath, $cssClass);
                break;
            case 'fast':
                return $this->buildHtml($param, 'sharp-thin', $iconPath, $customIconPath, $cssClass);
                break;
            case 'fasds':
                return $this->buildHtml($param, 'sharp-duotone-solid', $iconPath, $customIconPath, $cssClass);
                break;
            case 'icon':
                return $this->buildHtml($param, 'custom', $iconPath, $customIconPath, $cssClass);
                break;
            default:
                return false;
        }
    }

    private function buildHtml($param, $variant, $iconPath, $customIconPath, $cssClass) {
        if ($variant == 'custom') {

            if (file_exists('files/layout/icons/'.$param.'.svg')) {
                return '<i class="svg '.$variant.' '.$param.' '.$cssClass.'">'.file_get_contents('files/layout/icons/'.$param.'.svg').'</i>';
            } else {
                return '<i class="svg error '.$cssClass.'">icon not found</i>';
            }

        } else {
            
            if (file_exists($iconPath.$variant.'/'.$param.'.svg')) {
                return '<i class="svg fa-'.$variant.' fa-'.$param.' '.$cssClass.'">'.file_get_contents($iconPath.$variant.'/'.$param.'.svg').'</i>';
            } else {
                if (file_exists($customIconPath.$variant.'/'.$param.'.svg')) {
                    return '<i class="svg fa-'.$variant.' fa-'.$param.' '.$cssClass.'">'.file_get_contents($customIconPath.$variant.'/'.$param.'.svg').'</i>';
                } else {
                    return '<i class="svg error '.$cssClass.'">icon not found</i>';
                }
            }

        }
    } 

}
