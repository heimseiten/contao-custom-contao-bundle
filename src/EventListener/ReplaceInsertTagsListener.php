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

        [$name, $param] = explode('::', $tag) + [null, null];

        switch ($name) {    
            case 'fab':
                return $this->buildHtml($param, 'brands', $iconPath, $customIconPath);
                break;
            case 'fa':
                return $this->buildHtml($param, 'regular', $iconPath, $customIconPath);
                break;
            case 'fas':
                return $this->buildHtml($param, 'solid', $iconPath, $customIconPath);
                break;
            case 'fad':
                return $this->buildHtml($param, 'duotone', $iconPath, $customIconPath);
                break;
            case 'fal':
                return $this->buildHtml($param, 'light', $iconPath, $customIconPath);
                break;
            case 'fat':
                return $this->buildHtml($param, 'thin', $iconPath, $customIconPath);
                break;
            case 'fasl':
                return $this->buildHtml($param, 'sharp-light', $iconPath, $customIconPath);
                break;
            case 'fasr':
                return $this->buildHtml($param, 'sharp-regular', $iconPath, $customIconPath);
                break;
            case 'fass':
                return $this->buildHtml($param, 'sharp-solid', $iconPath, $customIconPath);
                break;
            case 'fast':
                return $this->buildHtml($param, 'sharp-thin', $iconPath, $customIconPath);
                break;
            case 'fasds':
                return $this->buildHtml($param, 'sharp-duotone-solid', $iconPath, $customIconPath);
                break;
            default:
                return false;
        }
    }

    private function buildHtml($param, $variant, $iconPath, $customIconPath) {        
        if (file_exists($iconPath.$variant.'/'.$param.'.svg')) {
            return '<i class="fa-'.$variant.' fa-'.$param.'">'.file_get_contents($iconPath.$variant.'/'.$param.'.svg').'</i>';
        } else {
            if (file_exists($customIconPath.$variant.'/'.$param.'.svg')) {
                return '<i class="fa-'.$variant.' fa-'.$param.'">'.file_get_contents($customIconPath.$variant.'/'.$param.'.svg').'</i>';
            } else {
                return '<i class="error">icon not found</i>';
            }
        }
    } 

}
