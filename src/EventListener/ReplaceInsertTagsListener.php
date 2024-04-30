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
            case 'fa':
                return file_get_contents('files/layout/icons/fontawesome/svgs/regular/'.$param.'.svg');
                break;
            case 'fab':
                return file_get_contents('files/layout/icons/fontawesome/svgs/brands/'.$param.'.svg');
                break;
            case 'fad':
                return file_get_contents('files/layout/icons/fontawesome/svgs/duotone/'.$param.'.svg');
                break;
            case 'fal':
                return file_get_contents('files/layout/icons/fontawesome/svgs/light/'.$param.'.svg');
                break;
            case 'fas':
                return file_get_contents('files/layout/icons/fontawesome/svgs/solid/'.$param.'.svg');
                break;
            case 'fat':
                return file_get_contents('files/layout/icons/fontawesome/svgs/thin/'.$param.'.svg');
                break;
            case 'fasl':
                return file_get_contents('files/layout/icons/fontawesome/svgs/sharp-light/'.$param.'.svg');
                break;
            case 'fasr':
                return file_get_contents('files/layout/icons/fontawesome/svgs/sharp-regular/'.$param.'.svg');
                break;
            case 'fass':
                return file_get_contents('files/layout/icons/fontawesome/svgs/sharp-solid/'.$param.'.svg');
                break;

            default:
                return false;
        }

    }
}