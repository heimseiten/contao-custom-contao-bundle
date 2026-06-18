# CustomContao

Mehrere kleine Frontend-Helfer für Contao. Welche geladen werden, wird **pro Seitenlayout** in der Legende **„Custom Contao (heimseiten.de)"** per Checkbox eingestellt — funktioniert im klassischen `fe_page`- wie im modernen Twig-Layout.

## Features (im Seitenlayout aktivierbar)

- **Scroll-Richtung** – setzt am `<body>` die Klasse `scroll-down` bzw. `scroll-up`.
- **Header-Höhe als CSS-Variable** – setzt `--header_height` und `--header_top_height` am `<body>` (z. B. für Sticky-Layouts).
- **Zu Formularfehlern scrollen** – scrollt nach dem Absenden automatisch zum ersten Fehler.
- **„preload"-Klasse am Body** – setzt `body.preload` **serverseitig** (im `<body>`-Tag) und entfernt es per JavaScript, sobald die Seite geladen ist. Damit lassen sich Übergänge während des Seitenaufbaus unterdrücken, z. B. mit `body.preload * { transition: none; }`.
- **Galerie: horizontale Slide-Animation** – lädt JS + CSS für die horizontale Slide-Animation der Galerie.

## Templates

- `content_element/player/with_iphone_thumnail.html.twig` – Thumbnail auf dem iPhone anzeigen
- `content_element/accordion/…` – Akkordeon-Varianten

## Migration von < 7.0

Bis v6 wurden die Skripte über *Seitenlayout → JavaScript → JavaScript-Templates* (`js_cc_*`) eingebunden — das wird vom modernen Twig-Layout nicht mehr verarbeitet. Ab **7.0** stattdessen die Häkchen in der Legende **„Custom Contao (heimseiten.de)"** setzen; die alten `js_cc_*`-Einträge können aus den JavaScript-Templates des Layouts entfernt werden. Das Element `js_cc_add_srcoll_data_for_elements` (alte Klon-Parallax) entfällt ersatzlos.

Funktionen, die früher hier enthalten waren, liegen inzwischen in eigenen Erweiterungen:

- https://github.com/heimseiten/contao-custom-swiper-bundle
- https://github.com/heimseiten/contao-icon-insert-tags-bundle
