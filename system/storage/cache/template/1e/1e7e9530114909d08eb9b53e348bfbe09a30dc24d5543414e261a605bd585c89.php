<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* default/template/common/menu.twig */
class __TwigTemplate_a98d149f2bb2c225b3dfe4fee6b44d5dc3c532823fe9447779ed94ee48ff2632 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        if (($context["categories"] ?? null)) {
            // line 2
            echo "
\t<a href=\"";
            // line 3
            echo ($context["catalog"] ?? null);
            echo "\" type=\"button\" class=\"main-menu__button main-menu__button-js\">
\t\t<span class=\"main-menu__button-deco\">
            <svg><use href=\"catalog/view/theme/default/image/icons.svg#catalog\"></use></svg>
        </span>
        ";
            // line 7
            echo ($context["text_category"] ?? null);
            echo "
    </a>
\t<div class=\"main-nav__collapse\">
\t\t<ul class=\"main-nav__list list-unstyled\">
\t\t\t";
            // line 11
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 12
                echo "\t\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 12)) {
                    // line 13
                    echo "\t\t\t<li class=\"main-nav__item main-nav__item--";
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 13);
                    echo "\">
\t\t\t\t<a href=\"";
                    // line 14
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 14);
                    echo "\" class=\"main-nav__link\">
\t\t\t\t\t<svg class=\"svg-icon\">
\t\t\t\t\t\t<use xlink:href=\"/image/sprite-category.svg#";
                    // line 16
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 16);
                    echo "\"></use>
\t\t\t\t\t</svg>
\t\t\t\t\t";
                    // line 18
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 18);
                    echo "
\t\t\t\t\t<i class=\"fa fa-angle-right\"></i>
\t\t\t\t</a>
\t\t\t\t<div class=\"main-nav__dropdown main-nav-dropdown\">
\t\t\t\t\t<div class=\"main-nav-dropdown__inner\"> ";
                    // line 22
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_array_batch(twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 22), (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 22)) / twig_round(twig_get_attribute($this->env, $this->source, $context["category"], "column", [], "any", false, false, false, 22), 1, "ceil"))));
                    foreach ($context['_seq'] as $context["_key"] => $context["children"]) {
                        // line 23
                        echo "\t\t\t\t\t\t<ul class=\"main-nav-dropdown__list list-unstyled\">
\t\t\t\t\t\t\t";
                        // line 24
                        if ((twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 24) == 73)) {
                            // line 25
                            echo "\t\t\t\t\t\t\t<li class=\"main-nav-dropdown__item\"><a class=\"main-nav-dropdown__link\" href=\"";
                            echo ($context["href_acum"] ?? null);
                            echo "\"><img class=\"main-nav-dropdown__img\" src=\"/image/acum.jpg\" alt=\"\" style=\"width: 70px; height: 70px;\"><span style=\"margin-top: 10px\">";
                            echo ($context["text_acum"] ?? null);
                            echo "</span></a></li>
\t\t\t\t\t\t\t";
                        }
                        // line 27
                        echo "\t\t\t\t\t\t\t";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable($context["children"]);
                        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                            // line 28
                            echo "\t\t\t\t\t\t\t<li class=\"main-nav-dropdown__item\"><a class=\"main-nav-dropdown__link\" href=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["child"], "href", [], "any", false, false, false, 28);
                            echo "\"><img class=\"main-nav-dropdown__img\" src=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["child"], "image", [], "any", false, false, false, 28);
                            echo "\" alt=\"\">";
                            echo twig_get_attribute($this->env, $this->source, $context["child"], "name", [], "any", false, false, false, 28);
                            echo "</a></li>
\t\t\t\t\t\t\t";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 30
                        echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['children'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 31
                    echo "</div>
\t\t\t\t\t</div>
\t\t\t</li>
\t\t\t";
                } else {
                    // line 35
                    echo "\t\t\t<li class=\"main-nav__item main-nav__item--";
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 35);
                    echo "\"><a class=\"main-nav__link\" href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 35);
                    echo "\"><svg class=\"svg-icon\">
\t\t\t\t\t\t<use xlink:href=\"/image/sprite-category.svg#";
                    // line 36
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 36);
                    echo "\"></use>
\t\t\t\t\t</svg>";
                    // line 37
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 37);
                    echo "</a></li>
\t\t\t";
                }
                // line 39
                echo "\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "\t\t</ul>
\t</div>
\t<button class=\"header__burger-button\">
        <a id=\"burger\" class=\"header__burger\">
            <div></div>
        </a>
    </button>
    <nav id=\"mainMenu\" class=\"mob-menu main-menu\">
    <div class=\"main-menu__drop\">
      <div class=\"main-menu__row\">
        <a href=\"#\" class=\"main-menu__row-logo\">
          <img src=\"catalog/view/theme/default/image//header/logo.svg\" alt=\"Logo\" />
        </a>
        <div class=\"main-menu__row-languages\">
          <button class=\"main-menu__row-button main-menu__row-button--active main-menu__row-ua\">УКР</button>
          <span>|</span>
          <button class=\"main-menu__row-button main-menu__row-ru\">РУС</button>
        </div>
      </div>
      <button type=\"button\" class=\"main-menu__button-drop\">
        <span class=\"main-menu__button-drop-deco\">
          <svg><use href=\"catalog/view/theme/default/image/icons.svg#fire\"></use></svg>
        </span>
        Каталог товарів
      </button>

      <button id=\"closeButton\" class=\"main-menu__button-close\">
        <span class=\"main-menu__button-close_icon\">
          <svg><use href=\"catalog/view/theme/default/image/icons.svg#close\"></use></svg>
        </span>
      </button>
      <ul class=\"main-menu__list\">
      ";
            // line 72
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 73
                echo "      ";
                if (twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 73)) {
                    // line 74
                    echo "        <li class=\"main-menu__list-item\">
          <a href=\"";
                    // line 75
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 75);
                    echo "\" class=\"main-menu__link\">
            <svg class=\"main-menu__link-icon\"><use href=\"/image/sprite-category.svg#";
                    // line 76
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 76);
                    echo "\"></use></svg>
            ";
                    // line 77
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 77);
                    echo "
          </a>
          <div class=\"main-nav__dropdown main-nav-dropdown\">
            <div class=\"main-nav-dropdown__wrapper\">
              <ul class=\"main-nav-dropdown__list\">
                ";
                    // line 82
                    if ((twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 82) == 73)) {
                        // line 83
                        echo "                <li class=\"main-nav-dropdown__item\">
                  <a class=\"main-nav-dropdown__link\" href=\"";
                        // line 84
                        echo ($context["href_acum"] ?? null);
                        echo "\">
                    <img src=\"/image/acum.jpg\" alt=\"\" style=\"width: 70px; height: 70px;\">
                    <p>";
                        // line 86
                        echo ($context["text_acum"] ?? null);
                        echo "</p>
                  </a>
                </li>
                ";
                    }
                    // line 90
                    echo "                ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 90));
                    foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                        // line 91
                        echo "                <li class=\"main-nav-dropdown__item\">
                  <a class=\"main-nav-dropdown__link\" href=\"";
                        // line 92
                        echo twig_get_attribute($this->env, $this->source, $context["child"], "href", [], "any", false, false, false, 92);
                        echo "\">
                    <img src=\"";
                        // line 93
                        echo twig_get_attribute($this->env, $this->source, $context["child"], "image", [], "any", false, false, false, 93);
                        echo "\" alt=\"Product\" />
                    <p>";
                        // line 94
                        echo twig_get_attribute($this->env, $this->source, $context["child"], "name", [], "any", false, false, false, 94);
                        echo "</p>
                  </a>
                </li>
                ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 98
                    echo "              </ul>
            </div>
          </div>
        </li>
        ";
                } else {
                    // line 103
                    echo "        <li class=\"main-menu__list-item\"><a class=\"main-menu__link\" href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 103);
                    echo "\"><svg class=\"main-menu__link-icon\">
          <use xlink:href=\"/image/sprite-category.svg#";
                    // line 104
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 104);
                    echo "\"></use>
        </svg>";
                    // line 105
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 105);
                    echo "</a></li>
      ";
                }
                // line 107
                echo "      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 108
            echo "      </ul>

      <ul class=\"main-menu__list--secondary desctop-none\">
        <li class=\"main-menu__list-item\">
          <a href=\"";
            // line 112
            echo ($context["link_special"] ?? null);
            echo "\" class=\"main-menu__link\">
            <svg class=\"main-menu__link-icon\"><use href=\"catalog/view/theme/default/image/icons.svg#promotion\"></use></svg>
            ";
            // line 114
            echo ($context["text_special"] ?? null);
            echo "
          </a>
        </li>
        <li class=\"main-menu__list-item\">
          <a href=\"";
            // line 118
            echo ($context["link_bestseller"] ?? null);
            echo "\" class=\"main-menu__link\">
            <svg class=\"main-menu__link-icon\"><use href=\"catalog/view/theme/default/image/icons.svg#bestseller\"></use></svg>
            ";
            // line 120
            echo ($context["text_bestseller"] ?? null);
            echo "
          </a>
        </li>
        <li class=\"main-menu__list-item\">
          <a href=\"";
            // line 124
            echo ($context["link_news"] ?? null);
            echo "\" class=\"main-menu__link\">
          <svg class=\"main-menu__link-icon\" width=\"22\" height=\"21\" viewBox=\"0 0 22 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
          <path d=\"M8.74712 1.2573C9.47552 0.528902 10.5044 0.185956 11.5241 0.331635L17.3738 1.1673C18.8138 1.37301 19.9451 2.50438 20.1508 3.94431L20.9865 9.79404C21.1322 10.8138 20.7892 11.8427 20.0608 12.5711L12.0255 20.6063C11.635 20.9969 11.0019 20.9969 10.6113 20.6063L0.711843 10.7069C0.321313 10.3163 0.321313 9.68317 0.711843 9.29257L8.74712 1.2573ZM12.7327 8.58547C13.5137 9.36657 14.78 9.36657 15.5611 8.58547C16.3421 7.80445 16.3421 6.53812 15.5611 5.75707C14.78 4.97603 13.5137 4.97603 12.7327 5.75707C11.9516 6.53812 11.9516 7.80445 12.7327 8.58547Z\" fill=\"#ed6e00\"/>
          </svg>
            ";
            // line 128
            echo ($context["text_news"] ?? null);
            echo "
          </a>
        </li>
        <li class=\"main-menu__list-item\">
          <a href=\"javascript:void(0)\" class=\"main-menu__link buyer-link\" onclick=\"openSubMenu();\">
          <svg class=\"main-menu__link-icon\" width=\"21\" height=\"21\" viewBox=\"0 0 21 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
          <path d=\"M0.833496 20.1666C0.833496 16.1165 4.11674 12.8333 8.16683 12.8333C12.2169 12.8333 15.5002 16.1165 15.5002 20.1666H0.833496ZM8.16683 11.9166C5.12808 11.9166 2.66683 9.45538 2.66683 6.41663C2.66683 3.37788 5.12808 0.916626 8.16683 0.916626C11.2056 0.916626 13.6668 3.37788 13.6668 6.41663C13.6668 9.45538 11.2056 11.9166 8.16683 11.9166ZM14.9161 13.9637C17.7443 14.6865 19.8707 17.1632 20.0685 20.1666H17.3335C17.3335 17.7743 16.417 15.596 14.9161 13.9637ZM13.0619 11.8771C14.5586 10.5345 15.5002 8.58552 15.5002 6.41663C15.5002 5.1174 15.1623 3.89709 14.5697 2.83876C16.6692 3.25777 18.2502 5.11006 18.2502 7.33329C18.2502 9.86558 16.1991 11.9166 13.6668 11.9166C13.4618 11.9166 13.2598 11.9032 13.0619 11.8771Z\" fill=\"#ed6e00\"/>
          </svg>
            ";
            // line 136
            echo ($context["text_buyer"] ?? null);
            echo "
          </a>
          <div class=\"main-nav--secondary__dropdown secondary-menu__dropdown\">
            <div class=\"secondary-menu__wrapper\">
              <ul class=\"secondary-menu__list-list\">
                <li class=\"secondary-menu__item\">
                  <a class=\"secondary-menu__link\" href=\"";
            // line 142
            echo ($context["link_store"] ?? null);
            echo "\">";
            echo ($context["text_store"] ?? null);
            echo "</a>
                </li>
                <li class=\"secondary-menu__item\">
                  <a class=\"secondary-menu__link\" href=\"";
            // line 145
            echo ($context["link_services"] ?? null);
            echo "\">";
            echo ($context["text_services"] ?? null);
            echo "</a>
                </li>
                <li class=\"secondary-menu__item\">
                  <a class=\"secondary-menu__link\" href=\"";
            // line 148
            echo ($context["link_delivery"] ?? null);
            echo "\">";
            echo ($context["text_delivery"] ?? null);
            echo "</a>
                </li>
                <li class=\"secondary-menu__item\">
                  <a class=\"secondary-menu__link\" href=\"";
            // line 151
            echo ($context["link_black_list"] ?? null);
            echo "\">";
            echo ($context["text_black_list"] ?? null);
            echo "</a>
                </li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
      <ul class=\"main-nav__contact\">
        <li class=\"main-menu__list-item main-nav__contact-item\">
          <a class=\"main-menu__link\" href=\"callto:+380800333900\" class=\"main-menu__link main-nav__contact-link\">
          <svg class=\"main-menu__link-icon\" width=\"18\" height=\"18\" viewBox=\"0 0 18 18\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
          <path d=\"M18 13.42V16.9561C18 17.4811 17.5941 17.9167 17.0705 17.9537C16.6331 17.9846 16.2763 18 16 18C7.1634 18 0 10.8366 0 2C0 1.72371 0.01545 1.36687 0.04635 0.9295C0.08337 0.40588 0.51894 0 1.04386 0H4.5801C4.83678 0 5.05176 0.19442 5.07753 0.4498C5.10067 0.67907 5.12218 0.86314 5.14207 1.00202C5.34435 2.41472 5.75753 3.75936 6.3487 5.00303C6.44359 5.20265 6.38171 5.44159 6.20185 5.57006L4.04355 7.1118C5.35752 10.1811 7.8189 12.6425 10.8882 13.9565L12.4271 11.8019C12.5572 11.6199 12.799 11.5573 13.001 11.6532C14.2446 12.2439 15.5891 12.6566 17.0016 12.8584C17.1396 12.8782 17.3225 12.8995 17.5502 12.9225C17.8056 12.9483 18 13.1633 18 13.42Z\" fill=\"#ed6e00\"/>
          </svg>
            0 800 333 900
          </a>
        </li>
        <li class=\"main-menu__list-item main-nav__contact-item\">
          <a href=\"mailto:info@procraft.ua\" class=\"main-menu__link main-nav__contact-link\">
          <svg class=\"main-menu__link-icon\" width=\"20\" height=\"18\" viewBox=\"0 0 20 18\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
          <path d=\"M1 0H19C19.5523 0 20 0.44772 20 1V17C20 17.5523 19.5523 18 19 18H1C0.44772 18 0 17.5523 0 17V1C0 0.44772 0.44772 0 1 0ZM10.0606 8.6829L3.64722 3.2377L2.35278 4.7623L10.0731 11.3171L17.6544 4.75616L16.3456 3.24384L10.0606 8.6829Z\" fill=\"#ed6e00\"/>
          </svg>
            info@procraft.ua
          </a>
        </li>
      </ul>
      
    </div>
    <div class=\"main-menu__drop\">
    <ul class=\"main-menu-gift\">
      <li class=\"main-menu__list-item main-nav__contact-item\">
        <a href=\"";
            // line 181
            echo ($context["link_special"] ?? null);
            echo "\" class=\"main-menu__link main-nav__contact-link\">
          <svg class=\"main-menu__link-icon\"><use href=\"catalog/view/theme/default/image/icons.svg#promotion\"></use></svg>
          ";
            // line 183
            echo ($context["text_special"] ?? null);
            echo "
        </a>
      </li>
    </ul>
    </div>
  </nav> 

";
        }
        // line 190
        echo " 
<script>
document.addEventListener(\"DOMContentLoaded\", () => {
  if (window.innerWidth <= 1024) return;

  const mainMenu = document.querySelector(\".main-menu2\");
  const main = document.querySelector(\"main\");

  if (!mainMenu) return;

  let activeDropdown = null;
  let activeSecondaryMenu = null;

  const activateDropdown = (menuItem) => {
    const dropdown = menuItem.querySelector(\".main-nav-dropdown\");

    if (dropdown) {
      deactivateDropdown();
      dropdown.classList.add(\"main-nav-dropdown--active\");
      activeDropdown = dropdown;
      mainMenu.classList.add(\"main-nav-dropdown--active\");
    } else {
      deactivateDropdown();
    }
  };

  const activateSecondaryMenu = (menuItem) => {
    const secondaryMenu = menuItem.querySelector(\".secondary-menu__dropdown\");

    if (secondaryMenu) {
      deactivateSecondaryMenu();
      secondaryMenu.classList.add(\"secondary-menu__dropdown--active\");
      activeSecondaryMenu = secondaryMenu;
    }
  };

  const deactivateDropdown = () => {
    if (activeDropdown) {
      activeDropdown.classList.remove(\"main-nav-dropdown--active\");
      activeDropdown = null;
    }
    mainMenu.classList.remove(\"main-nav-dropdown--active\");
  };

  const deactivateSecondaryMenu = () => {
    if (activeSecondaryMenu) {
      activeSecondaryMenu.classList.remove(\"secondary-menu__dropdown--active\");
      activeSecondaryMenu = null;
    }
  };

  const isCursorInside = (event, element) => {
    const rect = element.getBoundingClientRect();
    return event.clientX >= rect.left && event.clientX <= rect.right && event.clientY >= rect.top && event.clientY <= rect.bottom;
  };

  const menuItems = mainMenu.querySelectorAll(\".main-menu__list-item\");
  menuItems.forEach((menuItem) => {
    menuItem.addEventListener(\"mouseenter\", () => activateDropdown(menuItem));

    const firstLink = menuItem.querySelector(\".main-menu__link\");
    if (firstLink) {
      firstLink.addEventListener(\"click\", (event) => {
        const secondaryMenu = menuItem.querySelector(\".secondary-menu__dropdown\");
        if (secondaryMenu) {
          //event.preventDefault();
          activateSecondaryMenu(menuItem);
        }
      });
    }
  });

  document.addEventListener(\"mousemove\", (event) => {
    if (!isCursorInside(event, mainMenu)) {
      deactivateDropdown();
      deactivateSecondaryMenu();
    }
  });
});




         \$('.main-menu__button').mouseenter(() => {
            body.classList.add(\"menu-open\");
            \$('.main-menu2').css('position', 'fixed');
            \$('.main-menu2').css('top', '144px');
            \$('.main-menu2').css('z-index', '1000');
            let elem2 = document.querySelector('.header__main-menu');
            let coords = elem2.getBoundingClientRect();
            \$('.main-nav__dropdown').addClass('scroll-dropdown');
            \$('.main-menu2').css('left', coords.left + 'px');
        });
         \$('.main-menu__button').mouseleave(event => {
          if(event.relatedTarget.getAttribute('class') != 'header__wrapper'){
            body.classList.remove(\"menu-open\");
            \$('.main-menu2').hide();
            \$('.main-nav__dropdown').removeClass('scroll-dropdown');
          }
          \$('.main-menu2').mouseleave(() => {
            body.classList.remove(\"menu-open\");
            \$('.main-menu2').hide();
            \$('.main-nav__dropdown').removeClass('scroll-dropdown');
          });
        });
      
        \$('.header__search').mouseenter(() => {
          body.classList.remove(\"menu-open\");
          \$('.main-menu2').hide();
          \$('.main-nav__dropdown').removeClass('scroll-dropdown');
         });
      
        \$('.header__actions-row').mouseenter(() => {
          body.classList.remove(\"menu-open\");
          \$('.main-menu2').hide();
          \$('.main-nav__dropdown').removeClass('scroll-dropdown');
        }); 


\tconst burger = document.getElementById(\"burger\");
\tconst menu = document.getElementById(\"mainMenu\");
\tconst body = document.querySelector(\"body\");
\tconst html = document.querySelector(\"html\");
\tconst closeButton = document.getElementById(\"closeButton\");
\t
\tif (burger && menu && body && html) {
\t  burger.addEventListener(\"click\", () => {
\t\tif (burger) {
\t\t  burger.classList.toggle(\"active\");
\t\t  if (burger.classList.contains(\"active\")) {
\t\t\tif (menu) menu.classList.add(\"main-menu--active\");
\t\t\tif (body) body.classList.add(\"overflow_hidden\");
\t\t\tif (html) html.classList.add(\"overflow_hidden\");
\t\t  } else {
\t\t\tcloseMenu();
\t\t  }
\t\t}
\t  });
\t
\t  document.addEventListener(\"click\", (event) => {
\t\tif (menu && burger) {
\t\t  const clickOnMenu = menu.contains(event.target);
\t\t  const clickOnBurger = burger.contains(event.target);
\t\t  if (!clickOnMenu && !clickOnBurger) {
\t\t\tcloseMenu();
\t\t  }
\t\t}
\t  });
\t
\t  if (menu) {
\t\tmenu.addEventListener(\"click\", (event) => {
\t\t  if (event.target.tagName === \"IMG\") {
\t\t\tcloseMenu();
\t\t  }
\t\t});
\t  }
\t
\t  if (closeButton) {
\t\tcloseButton.addEventListener(\"click\", () => {
\t\t  closeMenu();
\t\t});
\t  }
\t
\t  function resize() {
\t\tconst screenWidth = window.innerWidth;
\t\tif (screenWidth > 1024) {
\t\t  closeMenu();
\t\t}
\t  }
\t  window.addEventListener(\"resize\", resize);
\t  resize();
\t
\t  function closeMenu() {
\t\tif (menu) menu.classList.remove(\"main-menu--active\");
\t\tif (body) body.classList.remove(\"overflow_hidden\");
\t\tif (html) html.classList.remove(\"overflow_hidden\");
\t\tif (burger) burger.classList.remove(\"active\");
\t  }
\t}

document.addEventListener(\"DOMContentLoaded\", () => {
  const body = document.querySelector(\".body\");
  const mainMenu = document.querySelector(\".main-menu-nomainpage\");
  const buttonDrop = document.querySelector(\".main-menu__button-drop\");
  const menuList = mainMenu.querySelector(\".main-menu__list\");
  const menuListSecondary = mainMenu.querySelector(\".main-nav--secondary__dropdown\");

  if (!mainMenu || !buttonDrop || !menuList) return;

  let activeDropdown = null;
  let activeSecondaryMenu = null;
  let isMobile = window.innerWidth <= 1024;

  const activateDropdown = (menuItem) => {
    const dropdown = menuItem.querySelector(\".main-nav-dropdown\");

    if (dropdown) {
      deactivateDropdown();
      dropdown.classList.add(\"main-nav-dropdown--active\");
      activeDropdown = dropdown;
      mainMenu.classList.add(\"main-nav-dropdown--active\");
    } else {
      deactivateDropdown();
    }
  };

  const deactivateDropdown = () => {
    if (activeDropdown) {
      activeDropdown.classList.remove(\"main-nav-dropdown--active\");
      activeDropdown = null;
    }
    mainMenu.classList.remove(\"main-nav-dropdown--active\");
  };

  const toggleMenuList = () => {
    buttonDrop.classList.toggle(\"main-menu__button-drop--active\");
    if (buttonDrop.classList.contains(\"main-menu__button-drop--active\")) {
      menuList.classList.add(\"main-menu__list--active\");
    } else {
      menuList.classList.remove(\"main-menu__list--active\");
    }
  };

  buttonDrop.addEventListener(\"click\", () => {
    if (isMobile) {
      toggleMenuList();
    }
  });

  const showMenu = () => {
    mainMenu.classList.remove(\"header__main-menu_hidden--mod\");
    body.classList.add(\"menu-open\");
    menuListSecondary.classList.add(\"secondary-menu__dropdown--active\");
  };

  const hideMenu = () => {
    mainMenu.classList.add(\"header__main-menu_hidden--mod\");
    body.classList.remove(\"menu-open\");
    menuListSecondary.classList.remove(\"secondary-menu__dropdown--active\");
  };

  let isOverButton = false;
  let isOverMenu = false;
  let buttonMenu = document.querySelector(\".main-menu__button-js\");

  buttonMenu.addEventListener(\"mouseenter\", () => {
    isOverButton = true;
    showMenu();
  });

  buttonMenu.addEventListener(\"mouseleave\", () => {
    isOverButton = false;

    if (!isOverMenu && !isOverButton) {
      hideMenu();
    }
  });

  mainMenu.addEventListener(\"mouseenter\", () => {
    isOverMenu = true;
    if (!isMobile) {
      showMenu();
    }
  });

  mainMenu.addEventListener(\"mouseleave\", () => {
    isOverMenu = false;
    if (!isOverMenu && !isOverButton && !isMobile) {
      hideMenu();
    }
  });

  const menuItems = mainMenu.querySelectorAll(\".main-menu__list-item\");
  menuItems.forEach((menuItem) => {
    menuItem.addEventListener(\"click\", (event) => {
      const dropdown = menuItem.querySelector(\".main-nav-dropdown\");

      if (dropdown) {
        event.preventDefault();
        dropdown.classList.toggle(\"main-nav-dropdown--active\");
        activeDropdown = dropdown;
      } else {
        window.location.href = menuItem.querySelector(\"a\").href;
      }
    });
  });

  window.addEventListener(\"resize\", () => {
    isMobile = window.innerWidth <= 1024;
    if (!isMobile) {
      deactivateDropdown();
      buttonDrop.classList.remove(\"main-menu__button-drop--active\");
      menuList.classList.remove(\"main-menu__list--active\");
    }
  });
});
</script>";
    }

    public function getTemplateName()
    {
        return "default/template/common/menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  417 => 190,  406 => 183,  401 => 181,  366 => 151,  358 => 148,  350 => 145,  342 => 142,  333 => 136,  322 => 128,  315 => 124,  308 => 120,  303 => 118,  296 => 114,  291 => 112,  285 => 108,  279 => 107,  274 => 105,  270 => 104,  265 => 103,  258 => 98,  248 => 94,  244 => 93,  240 => 92,  237 => 91,  232 => 90,  225 => 86,  220 => 84,  217 => 83,  215 => 82,  207 => 77,  203 => 76,  199 => 75,  196 => 74,  193 => 73,  189 => 72,  155 => 40,  149 => 39,  144 => 37,  140 => 36,  133 => 35,  127 => 31,  120 => 30,  107 => 28,  102 => 27,  94 => 25,  92 => 24,  89 => 23,  85 => 22,  78 => 18,  73 => 16,  68 => 14,  63 => 13,  60 => 12,  56 => 11,  49 => 7,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/common/menu.twig", "");
    }
}
