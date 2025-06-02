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

/* default/template/common/mob_menu.twig */
class __TwigTemplate_51235d169252a573ff96af91b5dfec72deb397768493ec608ed4583a44444778 extends \Twig\Template
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
        echo "<div class=\"modal fade\" id=\"modal-mob-menu\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"modalLabel1\">
\t<nav class=\"mob-menu\">
\t\t<div class=\"mob-menu__header\">
\t\t\t<a href=\"";
        // line 4
        echo ($context["home"] ?? null);
        echo "\" class=\"mob-menu__logo\"><img src=\"";
        echo ($context["logo"] ?? null);
        echo "\" title=\"";
        echo ($context["name"] ?? null);
        echo "\" alt=\"";
        echo ($context["name"] ?? null);
        echo "\" class=\"img-responsive\" /></a>
\t\t\t<div class=\"mob-menu__lang\">";
        // line 5
        echo ($context["language"] ?? null);
        echo "</div>
\t\t</div>
\t\t<div class=\"mob-menu__body\">
\t\t\t";
        // line 8
        if (($context["categories"] ?? null)) {
            // line 9
            echo "\t\t\t<div class=\"mob-menu__category categor-mob\">
\t\t\t\t<a class=\"categor-mob__btn\" data-toggle=\"collapse\"  href=\"#categor-mob\" role=\"button\" aria-expanded=\"false\" aria-controls=\"categor-mob\">
\t\t\t\t\t";
            // line 11
            echo ($context["text_category"] ?? null);
            echo "
\t\t\t\t\t<i class=\"fa fa-angle-down\"></i>
\t\t\t\t</a>
\t\t\t\t<div class=\"collapse\" id=\"categor-mob\">
\t\t\t\t\t<ul class=\"categor-mob__list list-unstyled\">
\t\t\t\t\t\t";
            // line 16
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 17
                echo "\t\t\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 17)) {
                    // line 18
                    echo "\t\t\t\t\t\t<li class=\"categor-mob__item\">
\t\t\t\t\t\t\t<a href=\"";
                    // line 19
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 19);
                    echo "\" class=\"categor-mob__link\">
\t\t\t\t\t\t\t\t<svg class=\"svg-icon\">
\t\t\t\t\t\t\t\t\t<use xlink:href=\"/image/sprite-category.svg#";
                    // line 21
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 21);
                    echo "\"></use>
\t\t\t\t\t\t\t\t</svg>
\t\t\t\t\t\t\t\t";
                    // line 23
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 23);
                    echo "
\t\t\t\t\t\t\t\t<div class=\"categor-mob__arrow\">
\t\t\t\t\t\t\t\t\t<i class=\"fa fa-angle-down\"></i>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t<div class=\"categor-mob__dropdown categor-mob-dropdown\">
\t\t\t\t\t\t\t\t<ul class=\"list-unstyled categor-mob-dropdown__list\">
\t\t\t\t\t\t\t\t    ";
                    // line 30
                    if ((twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 30) == 73)) {
                        // line 31
                        echo "\t\t\t\t\t\t\t            <li class=\"categor-mob-dropdown__item\">
\t\t\t\t\t\t\t            \t<a class=\"categor-mob-dropdown__link\" href=\"";
                        // line 32
                        echo ($context["href_acum"] ?? null);
                        echo "\">
\t\t\t\t\t\t\t            \t    ";
                        // line 33
                        echo ($context["text_acum"] ?? null);
                        echo "
\t\t\t\t\t\t\t                </a>
\t\t\t\t\t\t\t            </li>
\t\t\t\t\t\t\t        ";
                    }
                    // line 37
                    echo "\t\t\t\t\t\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 37));
                    foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                        // line 38
                        echo "\t\t\t\t\t\t\t\t\t\t<li class=\"categor-mob-dropdown__item\">
\t\t\t\t\t\t\t\t\t\t\t<a class=\"categor-mob-dropdown__link\" href=\"";
                        // line 39
                        echo twig_get_attribute($this->env, $this->source, $context["child"], "href", [], "any", false, false, false, 39);
                        echo "\">
\t\t\t\t\t\t\t\t\t\t\t\t";
                        // line 40
                        echo twig_get_attribute($this->env, $this->source, $context["child"], "name", [], "any", false, false, false, 40);
                        echo "
\t\t\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 44
                    echo "\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
                } else {
                    // line 48
                    echo "\t\t\t\t\t\t<li class=\"mob-menu__item\"><a class=\"mob-menu__link\" href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 48);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 48);
                    echo "</a></li>
\t\t\t\t\t\t";
                }
                // line 50
                echo "\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 51
            echo "\t\t\t\t\t</ul>
\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
        }
        // line 55
        echo "\t\t\t<nav class=\"mob-menu__top mob-menu-top\">
\t\t\t\t<ul class=\"mob-menu-top__list list-unstyled\">
\t\t\t\t\t<li class=\"mob-menu-top__item\">
\t\t\t\t\t\t<a href=\"";
        // line 58
        echo ($context["link_bestseller"] ?? null);
        echo "\" class=\"mob-menu-top__link mob-menu-top__link--fire\">
\t\t\t\t\t\t\t<svg class=\"svg-icon\"><use xlink:href=\"/image/sprite.svg#fire\"></use></svg>
\t\t\t\t\t\t\t";
        // line 60
        echo ($context["text_bestseller"] ?? null);
        echo "
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"mob-menu-top__item\">
\t\t\t\t\t\t<a href=\"";
        // line 64
        echo ($context["link_special"] ?? null);
        echo "\" class=\"mob-menu-top__link mob-menu-top__link--fire\">
\t\t\t\t\t\t\t<!-- <svg class=\"svg-icon\"><use xlink:href=\"/image/sprite.svg#fire\"></use></svg> -->
\t\t\t\t\t\t\t";
        // line 66
        echo ($context["text_special"] ?? null);
        echo "
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"mob-menu-top__item\">
\t\t\t\t\t\t<a href=\"";
        // line 70
        echo ($context["link_news"] ?? null);
        echo "\" class=\"mob-menu-top__link mob-menu-top__link--fire\">
\t\t\t\t\t\t\t<!-- <svg class=\"svg-icon\"><use xlink:href=\"/image/sprite.svg#fire\"></use></svg> -->
\t\t\t\t\t\t\t";
        // line 72
        echo ($context["text_news"] ?? null);
        echo "
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"mob-menu-top__item dropdown\">
\t\t\t\t\t\t<a href=\"javascript:void(0);\" class=\"mob-menu-top__link\" role=\"button\" aria-expanded=\"false\" data-toggle=\"collapse\" data-target=\".mob-menu-top__dropdown\">
\t\t\t\t\t\t\t<svg class=\"svg-icon\"><use xlink:href=\"/image/sprite.svg#users\"></use></svg>
\t\t\t\t\t\t\t";
        // line 78
        echo ($context["text_buyer"] ?? null);
        echo " 
\t\t\t\t\t\t\t<i class=\"fa fa-angle-down\"></i>
\t\t\t\t\t\t</a>
\t\t\t\t\t\t<ul class=\"collapse mob-menu-top__dropdown list-unstyled\">
\t\t\t\t\t\t\t<!-- <li><a href=\"";
        // line 82
        echo ($context["link_register"] ?? null);
        echo "\">";
        echo ($context["text_register_instr"] ?? null);
        echo "</a></li> -->
\t\t\t\t\t\t\t<li><a href=\"";
        // line 83
        echo ($context["link_store"] ?? null);
        echo "\">";
        echo ($context["text_store"] ?? null);
        echo "</a></li>
\t\t\t\t\t\t\t<li><a href=\"";
        // line 84
        echo ($context["link_services"] ?? null);
        echo "\">";
        echo ($context["text_services"] ?? null);
        echo "</a></li>
\t\t\t\t\t\t\t<li><a href=\"";
        // line 85
        echo ($context["link_delivery"] ?? null);
        echo "\">";
        echo ($context["text_delivery"] ?? null);
        echo "</a></li>
\t\t\t\t\t\t\t<li><a href=\"";
        // line 86
        echo ($context["link_black_list"] ?? null);
        echo "\">";
        echo ($context["text_black_list"] ?? null);
        echo "</a></li>
\t\t\t\t\t\t\t<!-- <li><a href=\"";
        // line 87
        echo ($context["link_partner"] ?? null);
        echo "\">";
        echo ($context["text_partner"] ?? null);
        echo "</a></li>-->
\t\t\t\t\t\t</ul>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"mob-menu-top__item\">
\t\t\t\t\t\t<a href=\"";
        // line 91
        echo ($context["link_about"] ?? null);
        echo "\" class=\"mob-menu-top__link\">
\t\t\t\t\t\t\t<svg class=\"svg-icon\"><use xlink:href=\"/image/sprite.svg#work\"></use></svg>
\t\t\t\t\t\t\tО Procraft
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"mob-menu-top__item\">
\t\t\t\t\t\t<a href=\"#\" class=\"mob-menu-top__link\">
\t\t\t\t\t\t\t<svg class=\"svg-icon\"><use xlink:href=\"/image/sprite.svg#blog\"></use></svg>
\t\t\t\t\t\t\tБлог
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t</nav>
\t\t\t<div class=\"mob-menu__footer mob-menu-footer\">
\t\t\t\t<ul class=\"list-unstyled mob-menu-footer__list\">
\t\t\t\t\t<li class=\"mob-menu-footer__item\">
\t\t\t\t\t\t<a href=\"tel:";
        // line 107
        echo ($context["telephone"] ?? null);
        echo "\" class=\"mob-menu-footer__link\">
\t\t\t\t\t\t\t<svg class=\"svg-icon\"><use xlink:href=\"/image/sprite.svg#phone\"></use></svg>
\t\t\t\t\t\t\t";
        // line 109
        echo ($context["telephone"] ?? null);
        echo "
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"mob-menu-footer__item\">
\t\t\t\t\t\t<a href=\"mailto:";
        // line 113
        echo ($context["email"] ?? null);
        echo "\" class=\"mob-menu-footer__link\">
\t\t\t\t\t\t\t<svg class=\"svg-icon\"><use xlink:href=\"/image/sprite.svg#email\"></use></svg>
\t\t\t\t\t\t\t";
        // line 115
        echo ($context["email"] ?? null);
        echo "
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t</div>
\t\t</div>
\t</nav>
</div>";
    }

    public function getTemplateName()
    {
        return "default/template/common/mob_menu.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  291 => 115,  286 => 113,  279 => 109,  274 => 107,  255 => 91,  246 => 87,  240 => 86,  234 => 85,  228 => 84,  222 => 83,  216 => 82,  209 => 78,  200 => 72,  195 => 70,  188 => 66,  183 => 64,  176 => 60,  171 => 58,  166 => 55,  160 => 51,  154 => 50,  146 => 48,  140 => 44,  130 => 40,  126 => 39,  123 => 38,  118 => 37,  111 => 33,  107 => 32,  104 => 31,  102 => 30,  92 => 23,  87 => 21,  82 => 19,  79 => 18,  76 => 17,  72 => 16,  64 => 11,  60 => 9,  58 => 8,  52 => 5,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/common/mob_menu.twig", "");
    }
}
