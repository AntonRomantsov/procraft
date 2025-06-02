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
class __TwigTemplate_429b8cae8e567ebc1cef648a47ab43317c9123f15af1201e4a4ac4fc394a6699 extends \Twig\Template
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
    ";
            // line 189
            echo "
";
        }
        // line 190
        echo " 
<script>
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
        return array (  168 => 190,  164 => 189,  155 => 40,  149 => 39,  144 => 37,  140 => 36,  133 => 35,  127 => 31,  120 => 30,  107 => 28,  102 => 27,  94 => 25,  92 => 24,  89 => 23,  85 => 22,  78 => 18,  73 => 16,  68 => 14,  63 => 13,  60 => 12,  56 => 11,  49 => 7,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/common/menu.twig", "");
    }
}
