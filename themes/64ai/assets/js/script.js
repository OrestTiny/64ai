(function () {
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


})();




(function ($, window, document, undefined) {
  'use strict';

  $(window).on('load resize', function () {
    const windowW = $(this).innerWidth();
    const overlay = $(".sixtyia-overlay");
    const header = $('.sixtyia-header');
    const subMenu = $('.sub-menu');

    if (windowW >= 992) {
      overlay.removeClass('active');
      header.removeClass('menu-open');
      subMenu.removeAttr('style');
    }
  })


  const btn = $('.sixtyia-header .icon-angle-down');

  if (btn) {
    btn.each(function () {
      $(this).click(function () {
        const windowW = $(window).innerWidth();

        if (windowW <= 992) {
          $(this).next().stop(true).slideToggle();
        }
      })
    })
  }


  const noLink = $('a[href="#"]');

  if (noLink) {
    noLink.each(function () {
      $(this).click(function (el) {
        el.preventDefault();
      })
    })
  }


})(jQuery, window, document);
