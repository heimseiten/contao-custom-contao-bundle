const scrollers = document.querySelectorAll(".horizontaleSlideAnimation")

if (!window.matchMedia("(prefers-reduced-motion: reduce)").matches) { addAnimation() }

function addAnimation() {
  scrollers.forEach((scroller) => {
    scroller.setAttribute("data-animated", true)

    const scrollerInner = scroller.querySelector("ul")
    const scrollerContent = Array.from(scrollerInner.children)

    scrollerContent.forEach((item) => {
      const duplicatedItem = item.cloneNode(true)
      duplicatedItem.setAttribute("aria-hidden", true)
      scrollerInner.appendChild(duplicatedItem)
    })
  })
}
