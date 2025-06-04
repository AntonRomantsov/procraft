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

/* default/template/product/bestseller.twig */
class __TwigTemplate_88bc349a8239b3867ee5370c5f4e27679837ce0f130c1500d5115e0adf27a3ca extends \Twig\Template
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
        echo ($context["header"] ?? null);
        echo "
<div id=\"product-bestseller\" class=\"container\">
  <ul class=\"breadcrumb\">
    ";
        // line 4
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 5
            echo "    <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 5);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 5);
            echo "</a></li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 7
        echo "  </ul>
\t<div class=\"row\">";
        // line 8
        echo ($context["column_left"] ?? null);
        echo "
";
        // line 9
        if ((($context["column_left"] ?? null) && ($context["column_right"] ?? null))) {
            // line 10
            echo "    ";
            $context["class"] = "col-sm-6";
            // line 11
            echo "    ";
            $context["class_col"] = "product-layout product-grid col-lg-6 col-md-6 col-sm-12 col-xs-12";
            // line 12
            echo "    ";
        } elseif ((($context["column_left"] ?? null) || ($context["column_right"] ?? null))) {
            // line 13
            echo "    ";
            $context["class"] = "col-sm-9";
            // line 14
            echo "    ";
            $context["class_col"] = "product-layout product-grid col-lg-4 col-md-4 col-sm-6 col-xs-12";
            // line 15
            echo "    ";
        } else {
            // line 16
            echo "    ";
            $context["class"] = "col-sm-12";
            // line 17
            echo "    ";
            $context["class_col"] = "product-layout product-grid col-lg-3 col-md-3 col-sm-6 col-xs-12";
            // line 18
            echo "    ";
        }
        // line 19
        echo "\t\t<div id=\"content\" class=\"";
        echo ($context["class"] ?? null);
        echo "\">";
        echo ($context["content_top"] ?? null);
        echo "
\t\t\t<h1>";
        // line 20
        echo ($context["heading_title"] ?? null);
        echo "</h1>
\t\t\t";
        // line 21
        if (($context["products"] ?? null)) {
            // line 22
            echo "\t\t\t<div class=\"subcategory_products__wrapper category-products\">
       ";
            // line 23
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                echo " 
      <div class=\"product";
                // line 24
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 24) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 24) < 1))) {
                    echo " out-of-stock";
                }
                echo "\">
        <div class=\"product__wrapper\">
          <div class=\"product__labels\">
          ";
                // line 27
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 27))) {
                    // line 28
                    echo "          ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 28));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 29
                        echo "            <span class=\"product__labels-label\">";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 29);
                        echo "</span>
          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 31
                    echo "          ";
                }
                // line 32
                echo "          ";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 32))) {
                    // line 33
                    echo "          ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 33));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 34
                        echo "            <span class=\"product__labels-label\">";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 34);
                        echo "</span>
          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 36
                    echo "          ";
                }
                // line 37
                echo "          ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "is_rotate", [], "any", false, false, false, 37)) {
                    // line 38
                    echo "            <span class=\"product__labels-overwiev\">
              <img src=\"catalog/view/theme/default/image//product/overview.png\" alt=\"360\" />
            </span>
          ";
                }
                // line 42
                echo "          </div>
          <div class=\"product__like\">
            <svg class=\"product__like-item product-like-";
                // line 44
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 44);
                if (twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 44)) {
                    echo " product__like-active";
                }
                echo "\" viewBox=\"0 0 24 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" id=\"product-like-";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 44);
                echo "\" ";
                if ( !twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 44)) {
                    echo "onclick=\"wishlist.add(";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 44);
                    echo ")\"";
                } else {
                    echo "onclick=\"wishlist.remove(";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 44);
                    echo ")\"";
                }
                echo ">
              <path
                d=\"M11.9626 19.5381L2.10281 9.80024C1.07574 8.78576 0.5 7.41137 0.5 5.97966C0.5 4.548 1.07574 3.17365 2.10281 2.15928C3.13034 1.1449 4.52508 0.573975 5.98067 0.573975C7.43626 0.573975 8.83108 1.1449 9.85873 2.15928L11.9626 4.23506L14.0665 2.15928C15.094 1.1449 16.4888 0.573975 17.9444 0.573975C19.4 0.573975 20.7948 1.1449 21.8224 2.15928C22.8499 3.17365 23.4287 4.548 23.4287 5.97966C23.4287 7.41137 22.8499 8.78576 21.8224 9.80024L11.9626 19.5381Z\"
              />
            </svg>
          </div>
          <div class=\"product__image\">
            <a class=\"product__image-link\" href=\"";
                // line 51
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 51);
                echo "\">
              <img class=\"product__image-item\" src=\"";
                // line 52
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 52);
                echo "\" alt=\"Product\" />
            </a>
          </div>
          <div class=\"product__content-row\">
            <div class=\"product__content\">
              <h4 class=\"product__title\"><a href=\"";
                // line 57
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 57);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 57);
                echo "</a></h4>
              <div class=\"product__rating\">
                <div class=\"rating\">
                ";
                // line 60
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 61
                    echo "                ";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 61) < $context["i"])) {
                        // line 62
                        echo "                <span class=\"rating-star\"></span>
                ";
                    } else {
                        // line 64
                        echo "                <span class=\"rating-star rating-filled\"></span>
                ";
                    }
                    // line 66
                    echo "              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 67
                echo "                </div>
                <span class=\"product__rating-total\">";
                // line 68
                echo twig_get_attribute($this->env, $this->source, $context["product"], "reviews", [], "any", false, false, false, 68);
                echo "</span>
              </div>
              <div class=\"product__price-row\">
              ";
                // line 71
                if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 71)) {
                    // line 72
                    echo "              <p class=\"product__price\">
                <span>";
                    // line 73
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 73);
                    echo "</span>
              </p>
              ";
                } else {
                    // line 76
                    echo "              <p class=\"product__price\">
                ";
                    // line 77
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 77);
                    echo "
              </p>
              ";
                }
                // line 80
                echo "              ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 80)) {
                    // line 81
                    echo "              <p class=\"product__price-old\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 81);
                    echo "</p>
              ";
                }
                // line 83
                echo "              </div>
            </div>
            <div class=\"product__badges\">
            ";
                // line 86
                if (twig_get_attribute($this->env, $this->source, $context["product"], "gifts", [], "any", false, false, false, 86)) {
                    // line 87
                    echo "            <span class=\"product__badge-present\">";
                    echo ($context["text_gift"] ?? null);
                    echo "</span>
            ";
                }
                // line 89
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "is_new", [], "any", false, false, false, 89)) {
                    // line 90
                    echo "            <span class=\"product__badge-new\">New</span>
            ";
                }
                // line 92
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 92)) {
                    // line 93
                    echo "            <span class=\"product__badge-discount\">-";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "percent", [], "any", false, false, false, 93);
                    echo "%</span>
            ";
                }
                // line 95
                echo "            </div>
          </div>
          <div class=\"product__additional\">
            <button class=\"product__additional-button\" onclick=\"cart.add('";
                // line 98
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 98);
                echo "');\">
              <svg class=\"product__additional-icon\"><use href=\"assets/icons.svg#cartSmall\"></use></svg>
              <p>";
                // line 100
                echo ($context["button_cart"] ?? null);
                echo "</p>
            </button>
            <ul class=\"product__additional-attributes\">
            ";
                // line 103
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "attributes", [], "any", false, false, false, 103));
                foreach ($context['_seq'] as $context["_key"] => $context["attr"]) {
                    // line 104
                    echo "            <li class=\"product__additional-attribute\">
              <span class=\"product__additional-attribute_parameter\">";
                    // line 105
                    echo twig_get_attribute($this->env, $this->source, $context["attr"], "name", [], "any", false, false, false, 105);
                    echo "</span>
              <span class=\"product__additional-attribute_value\">";
                    // line 106
                    echo twig_get_attribute($this->env, $this->source, $context["attr"], "text", [], "any", false, false, false, 106);
                    echo "</span>
            </li>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attr'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 109
                echo "            </ul>
          </div>
        </div>
      </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 114
            echo "       </div>
<!-- \t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-sm-12 text-center\">";
            // line 116
            echo ($context["pagination"] ?? null);
            echo "</div>
\t\t\t\t\t<div class=\"col-sm-6 text-right\">";
            // line 117
            echo ($context["results"] ?? null);
            echo "</div>
\t\t\t\t</div> -->
\t\t\t";
        } else {
            // line 120
            echo "\t\t\t\t<p>";
            echo ($context["text_empty"] ?? null);
            echo "</p>
\t\t\t\t<div class=\"buttons\">
\t\t\t\t\t<div class=\"pull-right\"><a href=\"";
            // line 122
            echo ($context["continue"] ?? null);
            echo "\" class=\"btn btn-primary\">";
            echo ($context["button_continue"] ?? null);
            echo "</a></div>
\t\t\t\t</div>
\t\t\t";
        }
        // line 125
        echo "\t\t\t";
        echo ($context["content_bottom"] ?? null);
        echo "</div>
\t\t\t";
        // line 126
        echo ($context["column_right"] ?? null);
        echo "</div>
</div>
";
        // line 128
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/template/product/bestseller.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  393 => 128,  388 => 126,  383 => 125,  375 => 122,  369 => 120,  363 => 117,  359 => 116,  355 => 114,  345 => 109,  336 => 106,  332 => 105,  329 => 104,  325 => 103,  319 => 100,  314 => 98,  309 => 95,  303 => 93,  300 => 92,  296 => 90,  293 => 89,  287 => 87,  285 => 86,  280 => 83,  274 => 81,  271 => 80,  265 => 77,  262 => 76,  256 => 73,  253 => 72,  251 => 71,  245 => 68,  242 => 67,  236 => 66,  232 => 64,  228 => 62,  225 => 61,  221 => 60,  213 => 57,  205 => 52,  201 => 51,  176 => 44,  172 => 42,  166 => 38,  163 => 37,  160 => 36,  151 => 34,  146 => 33,  143 => 32,  140 => 31,  131 => 29,  126 => 28,  124 => 27,  116 => 24,  110 => 23,  107 => 22,  105 => 21,  101 => 20,  94 => 19,  91 => 18,  88 => 17,  85 => 16,  82 => 15,  79 => 14,  76 => 13,  73 => 12,  70 => 11,  67 => 10,  65 => 9,  61 => 8,  58 => 7,  47 => 5,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/product/bestseller.twig", "");
    }
}
