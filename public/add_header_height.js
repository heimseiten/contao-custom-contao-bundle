/* Setzt die Höhe von #header und #header_top als CSS-Variablen am Body. */
document.addEventListener("DOMContentLoaded", function () {
    const resizeObserver = new ResizeObserver(function () {
        setHeaderTopHeightAsCssVariable();
        setHeaderHeightAsCssVariable();
    });
    resizeObserver.observe(document.body);
    window.dispatchEvent(new Event('resize'));

    function setHeaderTopHeightAsCssVariable() {
        if (document.querySelector('#header_top')) {
            document.querySelector('body').style.setProperty('--header_top_height', document.querySelector('#header_top').getBoundingClientRect().height.toFixed(3));
        }
    }

    function setHeaderHeightAsCssVariable() {
        if (document.querySelector('#header')) {
            document.querySelector('body').style.setProperty('--header_height', document.querySelector('#header').getBoundingClientRect().height.toFixed(3));
        }
    }
});
