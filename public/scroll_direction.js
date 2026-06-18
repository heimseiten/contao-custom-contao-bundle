/* Setzt body.scroll-down / body.scroll-up je nach Scrollrichtung.
   rAF-gedrosselt + passiv. (Scrollrichtung lässt sich nicht per CSS erkennen.) */
document.addEventListener("DOMContentLoaded", function () {
   const body = document.body;
   let last = Math.max(0, window.scrollY);
   let ticking = false;

   function update() {
      const y = Math.max(0, window.scrollY);
      const down = y > last;
      body.classList.toggle("scroll-down", down);
      body.classList.toggle("scroll-up", !down);
      last = y;
      ticking = false;
   }

   window.addEventListener("scroll", function () {
      if (!ticking) {
         ticking = true;
         requestAnimationFrame(update);
      }
   }, { passive: true });
});
