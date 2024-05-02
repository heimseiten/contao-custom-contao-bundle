<?php

namespace Heimseiten\ContaoCustomContaoBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;

#[AsHook('replaceInsertTags')]

class ReplaceInsertTagsListener
{
    public function __invoke(string $tag)
    {
        [$name, $param] = explode('::', $tag) + [null, null];

        switch ($name) {
            
            case 'fab':
                return '<i class="fa-brands fa-'.$param.'">'.file_get_contents('assets/fontawesome/svgs/brands/'.$param.'.svg').'</i>';
                break;
            case 'fa':
                return '<i class="fa-regular fa-'.$param.'">'.file_get_contents('assets/fontawesome/svgs/regular/'.$param.'.svg').'</i>';
                break;
            case 'fas':
                return '<i class="fa-solid fa-'.$param.'">'.file_get_contents('assets/fontawesome/svgs/solid/'.$param.'.svg').'</i>';
                break;
            
            case 'fad':
                return '<i class="fa-duotone fa-'.$param.'">'.file_get_contents('files/layout/icons/fontawesome/svgs/duotone/'.$param.'.svg').'</i>';
                break;
            case 'fal':
                return '<i class="fa-light fa-'.$param.'">'.file_get_contents('files/layout/icons/fontawesome/svgs/light/'.$param.'.svg').'</i>';
                break;
            case 'fat':
                return '<i class="fa-thin fa-'.$param.'">'.file_get_contents('files/layout/icons/fontawesome/svgs/thin/'.$param.'.svg').'</i>';
                break;
            case 'fasl':
                return '<i class="fa-sharp-light fa-'.$param.'">'.file_get_contents('files/layout/icons/fontawesome/svgs/sharp-light/'.$param.'.svg').'</i>';
                break;
            case 'fasr':
                return '<i class="fa-sharp-regular fa-'.$param.'">'.file_get_contents('files/layout/icons/fontawesome/svgs/sharp-regular/'.$param.'.svg').'</i>';
                break;
            case 'fass':
                return '<i class="fa-sharp-solid fa-'.$param.'">'.file_get_contents('files/layout/icons/fontawesome/svgs/sharp-solid/'.$param.'.svg').'</i>';
                break;

            default:
                return false;
        }

    }
}
