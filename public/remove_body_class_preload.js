/* Entfernt die Body-Klasse "preload", sobald die Seite geladen ist. */
document.addEventListener('DOMContentLoaded', function () {
    if (document.querySelector('body').classList.contains('preload')) {
        document.querySelector('body').classList.remove('preload');
    }
});
