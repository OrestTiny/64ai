(function () {
  const mobileMenuBreakpoint = 991;
  let winW = null;

  ["load", "resize"].forEach((event) => {
    window.addEventListener(event, () => {
      calcWinSizes();
      resizeMenu();
    });
  });

  if (document.querySelector(".upqode-header") !== null) {
    const headerEl = document.querySelector(".upqode-header");
    const htmlEl = document.querySelector("html");

    if (document.querySelector(".upqode-header__burger") !== null) {
      document
        .querySelector(".upqode-header__burger")
        .addEventListener("click touchend", function (e) {
          e.preventDefault();

          this.classList.toggle("active");

          if (this.classList.contains("active")) {
            htmlEl.classList.add("no-scroll");
            headerEl.classList.add("menu-open");
          } else {
            htmlEl.classList.remove("no-scroll");
            headerEl.classList.remove("menu-open");
          }
        });
    }
  }

  function calcWinSizes() {
    winW = window.innerWidth;
  }

  function resizeMenu() {
    if (
      window.screen.width > mobileMenuBreakpoint &&
      document.querySelector("html").classList.contains("no-scroll") &&
      document.querySelector(".upqode-header__burger") !== null
    ) {
      document.querySelector("html").classList.remove("no-scroll");
      document
        .querySelector(".upqode-header__burger")
        .classList.toggle("active");
    }
  }
})();
