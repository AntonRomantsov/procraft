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
class __TwigTemplate_5f1f1135d3e351d531062a86d93a5120f5a8f6e684dfee124ec353679f97fa8a extends \Twig\Template
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
\t";
        // line 252
        echo "
";
        // line 369
        echo "</script>";
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
        return array (  175 => 369,  172 => 252,  168 => 190,  164 => 189,  155 => 40,  149 => 39,  144 => 37,  140 => 36,  133 => 35,  127 => 31,  120 => 30,  107 => 28,  102 => 27,  94 => 25,  92 => 24,  89 => 23,  85 => 22,  78 => 18,  73 => 16,  68 => 14,  63 => 13,  60 => 12,  56 => 11,  49 => 7,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/common/menu.twig", "");
    }
}
