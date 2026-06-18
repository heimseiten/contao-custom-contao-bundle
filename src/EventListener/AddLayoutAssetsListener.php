<?php

declare(strict_types=1);

/*
 * This file is part of CustomContao.
 *
 * (c) Niels Hegmans 2024 <info@heimseiten.de>
 * @license GPL-3.0-or-later
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 * @link https://github.com/heimseiten/contao-custom-contao-bundle
 */

namespace Heimseiten\ContaoCustomContaoBundle\EventListener;

use Contao\CoreBundle\DependencyInjection\Attribute\AsHook;
use Contao\LayoutModel;
use Contao\PageModel;
use Symfony\Component\Asset\Packages;

/**
 * Bindet die im Seitenlayout (Legende „Custom Contao") aktivierten Dateien
 * automatisch ein – klassisch (fe_page) wie modern (Twig-Layout). Pro Datei eine
 * Checkbox; nur Aktiviertes wird geladen. Zusätzlich wird bei aktivierter
 * „preload"-Option diese Klasse serverseitig an den <body> gehängt (und per JS
 * nach dem Laden wieder entfernt).
 *
 * generatePage feuert nur klassisch, LayoutEvent nur modern – daher beide.
 */
class AddLayoutAssetsListener
{
    private const BASE = 'bundles/heimseitencontaocustomcontao/';

    public function __construct(private readonly Packages $packages)
    {
    }

    #[AsHook('generatePage')]
    public function onGeneratePage(PageModel $page, LayoutModel $layout): void
    {
        $this->addAssets($layout);
        $this->adjustBodyClass($layout, $page);
    }

    /**
     * LayoutEvent des modernen Layouts. Bewusst „object" + Registrierung via
     * config/services.yaml (kernel.event_listener) statt Attribut, damit
     * Contao\CoreBundle\Event\LayoutEvent auf Contao 4.13 nie aufgelöst werden muss.
     *
     * @param \Contao\CoreBundle\Event\LayoutEvent $event
     */
    public function onLayout(object $event): void
    {
        $layout = method_exists($event, 'getLayout') ? $event->getLayout() : null;

        if (!$layout instanceof LayoutModel) {
            return;
        }

        $this->addAssets($layout);

        $page = method_exists($event, 'getPage') ? $event->getPage() : null;

        if ($page instanceof PageModel) {
            $this->adjustBodyClass($layout, $page);
        }
    }

    private function addAssets(LayoutModel $layout): void
    {
        if ($layout->cc_scroll_direction) {
            $GLOBALS['TL_BODY']['cc_scroll_direction'] = $this->scriptTag('scroll_direction.js');
        }

        if ($layout->cc_add_header_height) {
            $GLOBALS['TL_BODY']['cc_add_header_height'] = $this->scriptTag('add_header_height.js');
        }

        if ($layout->cc_scroll_to_error) {
            $GLOBALS['TL_BODY']['cc_scroll_to_error'] = $this->scriptTag('scroll_to_error.js');
        }

        if ($layout->cc_remove_body_class_preload) {
            $GLOBALS['TL_BODY']['cc_remove_body_class_preload'] = $this->scriptTag('remove_body_class_preload.js');
        }

        if ($layout->cc_horizontale_slide_animation) {
            $dir = 'js_cc_content_gallery_with_class_horizontaleSlideAnimation/';
            $GLOBALS['TL_BODY']['cc_horizontale_slide_animation'] = $this->scriptTag($dir.'script.js');
            $GLOBALS['TL_CSS']['cc_horizontale_slide_animation'] = self::BASE.$dir.'style.css|static';
        }
    }

    /**
     * Hängt bei aktivierter Option die Klasse „preload" an die Page-cssClass.
     * Beide Layouts schreiben diese an den <body>: klassisch baut PageRegular
     * die Body-Klasse nach dem generatePage-Hook aus cssClass; modern rendert den
     * Body „deferred" und hängt „contao.page.cssClass" an. Das mitgelieferte
     * remove_body_class_preload.js entfernt die Klasse nach dem Laden wieder.
     */
    private function adjustBodyClass(LayoutModel $layout, PageModel $page): void
    {
        if (!$layout->cc_remove_body_class_preload) {
            return;
        }

        $classes = preg_split('/\s+/', (string) $page->cssClass, -1, PREG_SPLIT_NO_EMPTY) ?: [];

        if (!in_array('preload', $classes, true)) {
            $classes[] = 'preload';
            $page->cssClass = implode(' ', $classes);
        }
    }

    private function scriptTag(string $file): string
    {
        return sprintf(
            '<script src="%s" defer></script>',
            htmlspecialchars($this->packages->getUrl(self::BASE.$file), ENT_QUOTES),
        );
    }
}
