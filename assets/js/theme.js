(() => {
  const toggle = document.querySelector("[data-dp-menu-toggle]");
  const closeBtn = document.querySelector("[data-dp-menu-close]");
  const nav = document.querySelector("[data-dp-nav]");
  if (!nav) return;

  const open = () => {
    if (toggle) toggle.setAttribute("aria-expanded", "true");
    nav.classList.add("is-open");
    document.body.classList.add("nav-open");
  };

  const close = () => {
    if (toggle) toggle.setAttribute("aria-expanded", "false");
    nav.classList.remove("is-open");
    document.body.classList.remove("nav-open");
  };

  if (toggle) {
    toggle.addEventListener("click", () => {
      toggle.getAttribute("aria-expanded") === "true" ? close() : open();
    });
  }

  if (closeBtn) {
    closeBtn.addEventListener("click", close);
  }

  nav.addEventListener("click", (e) => {
    if (e.target.closest("a")) close();
  });

  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape") close();
  });
})();
