const qs = (selectors) => document.querySelector(selectors);
const qsa = (selectors) => document.querySelectorAll(selectors);

function showMenu() {
  const navLinks = qs("#nav-links");
  if (navLinks) {
    const clazz = navLinks.classList;
    if (clazz.contains("hidden")) {
      clazz.remove("hidden");
      clazz.add("flex");
    } else {
      clazz.remove("flex");
      clazz.add("hidden");
    }
  }
}

new Lightbox(qs(".grid-container"));
