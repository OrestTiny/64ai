window.addEventListener('load', handleWindowResize);
window.addEventListener('resize', handleWindowResize);

function handleWindowResize() {
  const windowW = window.innerWidth;
  const overlay = document.querySelector(".sixtyia-overlay");
  const header = document.querySelector('.sixtyia-header');
  const subMenu = document.querySelector('.sub-menu');

  if (windowW >= 992) {
    overlay.classList.remove('active');
    header.classList.remove('menu-open');
    subMenu.removeAttribute('style');
  }
}

const btn = document.querySelectorAll('.sixtyia-header .header-menu > .menu-item-has-children');

if (btn) {
  btn.forEach(function (button) {
    const menu = button.querySelector('.sub-menu');

    button.addEventListener('click', function () {
      const windowW = window.innerWidth;

      if (windowW <= 992) {
        if (menu.style.display === 'none' || menu.style.display === '') {
          menu.style.display = 'block';
        } else {
          menu.style.display = 'none';
        }
      }
    });
  });
}



const mobileMenuBreakpoint = 991;
let winW = null;

["load", "resize"].forEach((event) => {
  window.addEventListener(event, () => {
    calcWinSizes();
    resizeMenu();
  });
});



if (document.querySelector(".sixtyia-header")) {
  const headerEl = document.querySelector(".sixtyia-header");
  const htmlEl = document.querySelector("html");
  const burger = document.querySelector(".sixtyia-header__burger");
  const overlay = document.querySelector('.sixtyia-overlay');

  if (burger) {
    burger.addEventListener("click", function () {
      this.classList.toggle("active");

      if (this.classList.contains("active")) {
        htmlEl.classList.add("no-scroll");
        headerEl.classList.add("menu-open");
        overlay.classList.add('active');
      } else {
        overlay.classList.remove('active');
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
    document.querySelector(".sixtyia-header__burger") !== null
  ) {
    document.querySelector("html").classList.remove("no-scroll");
    document
      .querySelector(".sixtyia-header__burger")
      .classList.toggle("active");
  }
}



const headerLink = document.querySelectorAll('a[href="#"]');

if (headerLink) {
  headerLink.forEach(function (el) {
    el.addEventListener('click', function (el) {
      el.preventDefault();
    })
  })
}

setTimeout(function () {
  let inputField = document.querySelector('.sixtyai-phone input');
  if (inputField) {
    inputField.addEventListener('input', function (event) {
      let inputValue = event.target.value;
      let sanitizedValue = inputValue.replace(/[^0-9\-+]/g, '');
      event.target.value = sanitizedValue;
    });
  }
}, 300);

