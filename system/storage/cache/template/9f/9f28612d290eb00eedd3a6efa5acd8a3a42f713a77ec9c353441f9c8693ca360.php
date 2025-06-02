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

/* default/template/product/catalog.twig */
class __TwigTemplate_5365daace75d29321e55ce488d4864634c05e62493b2206255fd3128f5687768 extends \Twig\Template
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
        echo "    ";
        echo ($context["header"] ?? null);
        echo "

    <main>
      <section>
        <div class=\"breadcrumbs__container\">
          <ul class=\"breadcrumbs\">
            ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 8
            echo "            <li class=\"breadcrumbs__item\">
              <a class=\"breadcrumbs__link\" href=\"";
            // line 9
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 9);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 9);
            echo "</a>
            </li>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 12
        echo "          </ul>
        </div>
      </section>
      ";
        // line 15
        echo ($context["content_top"] ?? null);
        echo "

      <section class=\"section__regular catalog\">
        <div class=\"catalog__container\">
          <h2 class=\"catalog__title\">";
        // line 19
        echo ($context["heading_title"] ?? null);
        echo "</h2>
          <div class=\"catalog__wrapper\">
            ";
        // line 21
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 22
            echo "            <a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 22);
            echo "\" class=\"catalog__item\">
              <div class=\"catalog__image_wrapper\">
              <svg class=\"svg-icon catalog-svg-icon\">
                <use xlink:href=\"/image/sprite-category.svg#";
            // line 25
            echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 25);
            echo "\"></use>
              </svg>
              </div>
              <div class=\"catalog__description\">
                <h5 class=\"catalog__name\">";
            // line 29
            echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 29);
            echo "</h5>
                <span class=\"catalog__quantity\">";
            // line 30
            echo twig_get_attribute($this->env, $this->source, $context["category"], "count_products", [], "any", false, false, false, 30);
            echo " ";
            echo ($context["text_products"] ?? null);
            echo "</span>
              </div>
            </a>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 34
        echo "          </div>
        </div>
      </section>
      ";
        // line 37
        echo ($context["content_bottom"] ?? null);
        echo "

      ";
        // line 76
        echo "    </main>

    ";
        // line 78
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "default/template/product/catalog.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  130 => 78,  126 => 76,  121 => 37,  116 => 34,  104 => 30,  100 => 29,  93 => 25,  86 => 22,  82 => 21,  77 => 19,  70 => 15,  65 => 12,  54 => 9,  51 => 8,  47 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/product/catalog.twig", "");
    }
}
