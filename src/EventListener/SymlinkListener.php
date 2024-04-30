<?php

namespace Heimseiten\ContaoCustomContaoBundle\EventListener;

use Contao\CoreBundle\Event\ContaoCoreEvents;
use Contao\CoreBundle\Event\GenerateSymlinksEvent;
use Terminal42\ServiceAnnotationBundle\Annotation\ServiceTag;

/**
 * @ServiceTag("kernel.event_listener", event=ContaoCoreEvents::GENERATE_SYMLINKS)
 */
class SymlinkListener
{
    public function __invoke(GenerateSymlinksEvent $event): void
    {
        $event->addSymlink('vendor/fortawesome/font-awesome/free/svgs/regular', 'public/vendor/fontawesome/svgs/regular');
        $event->addSymlink('vendor/fortawesome/font-awesome/free/svgs/solid', 'public/vendor/fontawesome/svgs/solid');
        $event->addSymlink('vendor/fortawesome/font-awesome/free/svgs/brands', 'public/vendor/fontawesome/svgs/brands');
    }
}
