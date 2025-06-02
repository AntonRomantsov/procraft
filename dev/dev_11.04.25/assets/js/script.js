const heroSwiper = new Swiper(".main__swiper", {
  slidesPerView: 1,
  spaceBetween: 15,
  loop: true,
  pagination: {
    el: ".main__swiper-pagination",
    clickable: true,
  },
});

const heroSwiperOne = new Swiper(".main__swiper-1", {
  slidesPerView: 1,
  spaceBetween: 0,
  loop: true,
  navigation: {
    nextEl: ".main__swiper-button-next-1",
    prevEl: ".main__swiper-button-prev-1",
  },
  breakpoints: {
    384: {
      slidesPerView: 2,
    },
    992: {
      slidesPerView: 3,
    },
    1200: {
      slidesPerView: 4,
    },
  },
});

const heroSwiperTwo = new Swiper(".main__swiper-2", {
  slidesPerView: 1,
  spaceBetween: 0,
  loop: true,
  navigation: {
    nextEl: ".main__swiper-button-next-2",
    prevEl: ".main__swiper-button-prev-2",
  },
  breakpoints: {
    384: {
      slidesPerView: 2,
    },
    992: {
      slidesPerView: 3,
    },
    1200: {
      slidesPerView: 4,
    },
  },
});

const heroSwiperThree = new Swiper(".main__swiper-3", {
  slidesPerView: 1,
  spaceBetween: 0,
  loop: true,
  navigation: {
    nextEl: ".main__swiper-button-next-3",
    prevEl: ".main__swiper-button-prev-3",
  },
  breakpoints: {
    384: {
      slidesPerView: 2,
    },
    992: {
      slidesPerView: 3,
    },
    1200: {
      slidesPerView: 4,
    },
  },
});

const heroSwiperVidoe = new Swiper(".main__swiper-video", {
  slidesPerView: 1.3,
  spaceBetween: 25,
  loop: true,
  navigation: {
    nextEl: ".main__swiper-button-next-video",
    prevEl: ".main__swiper-button-prev-video",
  },
  breakpoints: {
    576: {
      slidesPerView: 2,
    },
    1024: {
      slidesPerView: 3,
    },
  },
});

/* ======================== header burger ======================== */
const burger = document.getElementById("burger");
const menu = document.getElementById("mainMenu");
const body = document.querySelector("body");
const html = document.querySelector("html");
const closeButton = document.getElementById("closeButton");

if (burger && menu && body && html) {
  burger.addEventListener("click", () => {
    if (burger) {
      burger.classList.toggle("active");
      if (burger.classList.contains("active")) {
        if (menu) menu.classList.add("main-menu--active");
        if (body) body.classList.add("overflow_hidden");
        if (html) html.classList.add("overflow_hidden");
      } else {
        closeMenu();
      }
    }
  });

  document.addEventListener("click", (event) => {
    if (menu && burger) {
      const clickOnMenu = menu.contains(event.target);
      const clickOnBurger = burger.contains(event.target);
      if (!clickOnMenu && !clickOnBurger) {
        closeMenu();
      }
    }
  });

  if (menu) {
    menu.addEventListener("click", (event) => {
      if (event.target.tagName === "IMG") {
        closeMenu();
      }
    });
  }

  if (closeButton) {
    closeButton.addEventListener("click", () => {
      closeMenu();
    });
  }

  function resize() {
    const screenWidth = window.innerWidth;
    if (screenWidth > 1024) {
      closeMenu();
    }
  }
  window.addEventListener("resize", resize);
  resize();

  function closeMenu() {
    if (menu) menu.classList.remove("main-menu--active");
    if (body) body.classList.remove("overflow_hidden");
    if (html) html.classList.remove("overflow_hidden");
    if (burger) burger.classList.remove("active");
  }
}
/* ======================== dropdown ======================== */

document.addEventListener("DOMContentLoaded", () => {
  if (window.innerWidth <= 1024) return;

  const mainMenu = document.querySelector(".main-menu");
  const main = document.querySelector("main");

  if (!mainMenu) return;

  let activeDropdown = null;
  let activeSecondaryMenu = null;

  const activateDropdown = (menuItem) => {
    const dropdown = menuItem.querySelector(".main-nav-dropdown");

    if (dropdown) {
      deactivateDropdown();
      dropdown.classList.add("main-nav-dropdown--active");
      activeDropdown = dropdown;
      mainMenu.classList.add("main-nav-dropdown--active");
    } else {
      deactivateDropdown();
    }
  };

  const activateSecondaryMenu = (menuItem) => {
    const secondaryMenu = menuItem.querySelector(".secondary-menu__dropdown");

    if (secondaryMenu) {
      deactivateSecondaryMenu();
      secondaryMenu.classList.add("secondary-menu__dropdown--active");
      activeSecondaryMenu = secondaryMenu;
    }
  };

  const deactivateDropdown = () => {
    if (activeDropdown) {
      activeDropdown.classList.remove("main-nav-dropdown--active");
      activeDropdown = null;
    }
    mainMenu.classList.remove("main-nav-dropdown--active");
  };

  const deactivateSecondaryMenu = () => {
    if (activeSecondaryMenu) {
      activeSecondaryMenu.classList.remove("secondary-menu__dropdown--active");
      activeSecondaryMenu = null;
    }
  };

  const isCursorInside = (event, element) => {
    const rect = element.getBoundingClientRect();
    return event.clientX >= rect.left && event.clientX <= rect.right && event.clientY >= rect.top && event.clientY <= rect.bottom;
  };

  const menuItems = mainMenu.querySelectorAll(".main-menu__list-item");
  menuItems.forEach((menuItem) => {
    menuItem.addEventListener("mouseenter", () => activateDropdown(menuItem));

    const firstLink = menuItem.querySelector(".main-menu__link");
    if (firstLink) {
      firstLink.addEventListener("click", (event) => {
        const secondaryMenu = menuItem.querySelector(".secondary-menu__dropdown");
        if (secondaryMenu) {
          event.preventDefault();
          activateSecondaryMenu(menuItem);
        }
      });
    }
  });

  document.addEventListener("mousemove", (event) => {
    if (!isCursorInside(event, mainMenu)) {
      deactivateDropdown();
      deactivateSecondaryMenu();
    }
  });
});

document.addEventListener("DOMContentLoaded", () => {
  const mainMenu = document.querySelector(".main-menu");
  const buttonDrop = mainMenu.querySelector(".main-menu__button-drop");
  const menuList = mainMenu.querySelector(".main-menu__list");

  if (!mainMenu || !buttonDrop || !menuList) return;

  let activeDropdown = null;
  let activeSecondaryMenu = null;
  let isMobile = window.innerWidth <= 1024;

  const activateDropdown = (menuItem) => {
    const dropdown = menuItem.querySelector(".main-nav-dropdown");

    if (dropdown) {
      deactivateDropdown();
      dropdown.classList.add("main-nav-dropdown--active");
      activeDropdown = dropdown;
      mainMenu.classList.add("main-nav-dropdown--active");
    } else {
      deactivateDropdown();
    }
  };

  const deactivateDropdown = () => {
    if (activeDropdown) {
      activeDropdown.classList.remove("main-nav-dropdown--active");
      activeDropdown = null;
    }
    mainMenu.classList.remove("main-nav-dropdown--active");
  };

  const toggleMenuList = () => {
    buttonDrop.classList.toggle("main-menu__button-drop--active");
    if (buttonDrop.classList.contains("main-menu__button-drop--active")) {
      menuList.classList.add("main-menu__list--active");
    } else {
      menuList.classList.remove("main-menu__list--active");
    }
  };

  buttonDrop.addEventListener("click", () => {
    if (isMobile) {
      toggleMenuList();
    }
  });

  const menuItems = mainMenu.querySelectorAll(".main-menu__list-item");
  menuItems.forEach((menuItem) => {
    menuItem.addEventListener("click", (event) => {
      const dropdown = menuItem.querySelector(".main-nav-dropdown");

      if (dropdown) {
        event.preventDefault();
        dropdown.classList.toggle("main-nav-dropdown--active");
        activeDropdown = dropdown;
      } else {
        window.location.href = menuItem.querySelector("a").href;
      }
    });
  });

  window.addEventListener("resize", () => {
    isMobile = window.innerWidth <= 1024;
    if (!isMobile) {
      deactivateDropdown();
      buttonDrop.classList.remove("main-menu__button-drop--active");
      menuList.classList.remove("main-menu__list--active");
    }
  });
});

/* ======================== description ======================== */
document.addEventListener("DOMContentLoaded", () => {
  const toggleDescription = (button) => {
    const content = button.previousElementSibling;
    content.classList.toggle("description__content--open");

    button.textContent = content.classList.contains("description__content--open") ? "Згорнути" : "Читати більше";

    button.classList.toggle("description__button--active", content.classList.contains("description__content--open"));
  };

  const buttons = document.querySelectorAll(".description__button");
  buttons.forEach((button) => {
    button.addEventListener("click", () => toggleDescription(button));
  });
});

/* ======================== profile progressbar column ======================== */
function updateColumnWidth() {
  const column = document.querySelector(".profile__progressbar_column");
  if (column) {
    const width = column.offsetWidth + "px";
    document.documentElement.style.setProperty("--column-width", width);
  }
}

window.addEventListener("resize", updateColumnWidth);
window.addEventListener("DOMContentLoaded", updateColumnWidth);
