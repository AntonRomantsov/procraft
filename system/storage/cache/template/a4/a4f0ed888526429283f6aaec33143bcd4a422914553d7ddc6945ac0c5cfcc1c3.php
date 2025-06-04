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

/* default/template/product/news.twig */
class __TwigTemplate_f96b474fe68fe3ab8f97ef6b5d2dfa6bfcd2a03d28d0fa00af15201d181127b6 extends \Twig\Template
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
<div id=\"product-search\" class=\"container\">
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
  <div class=\"row\">";
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
        echo "    <div id=\"content\" class=\"";
        echo ($context["class"] ?? null);
        echo "\">";
        echo ($context["content_top"] ?? null);
        echo "
      <h2>";
        // line 20
        echo ($context["heading_title"] ?? null);
        echo "</h2>
      ";
        // line 21
        if (($context["products"] ?? null)) {
            // line 22
            echo "      <!-- <div class=\"row\">
        <div class=\"col-md-2 col-sm-6 hidden-xs\">
          <div class=\"btn-group btn-group-sm\">
            <button type=\"button\" id=\"list-view\" class=\"btn btn-default\" data-toggle=\"tooltip\" title=\"";
            // line 25
            echo ($context["button_list"] ?? null);
            echo "\"><i class=\"fa fa-th-list\"></i></button>
            <button type=\"button\" id=\"grid-view\" class=\"btn btn-default\" data-toggle=\"tooltip\" title=\"";
            // line 26
            echo ($context["button_grid"] ?? null);
            echo "\"><i class=\"fa fa-th\"></i></button>
          </div>
        </div>
        <div class=\"col-md-3 col-sm-6\">
          <div class=\"form-group\"><a href=\"";
            // line 30
            echo ($context["compare"] ?? null);
            echo "\" id=\"compare-total\" class=\"btn btn-link\">";
            echo ($context["text_compare"] ?? null);
            echo "</a></div>
        </div>
        <div class=\"col-md-4 col-xs-6\">
          <div class=\"form-group input-group input-group-sm\">
            <label class=\"input-group-addon\" for=\"input-sort\">";
            // line 34
            echo ($context["text_sort"] ?? null);
            echo "</label>
            <select id=\"input-sort\" class=\"form-control\" onchange=\"location = this.value;\">
              
              ";
            // line 37
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["sorts"]);
            foreach ($context['_seq'] as $context["_key"] => $context["sorts"]) {
                // line 38
                echo "              ";
                if ((twig_get_attribute($this->env, $this->source, $context["sorts"], "value", [], "any", false, false, false, 38) == sprintf("%s-%s", ($context["sort"] ?? null), ($context["order"] ?? null)))) {
                    // line 39
                    echo "              
              <option value=\"";
                    // line 40
                    echo twig_get_attribute($this->env, $this->source, $context["sorts"], "href", [], "any", false, false, false, 40);
                    echo "\" selected=\"selected\">";
                    echo twig_get_attribute($this->env, $this->source, $context["sorts"], "text", [], "any", false, false, false, 40);
                    echo "</option>
              
              ";
                } else {
                    // line 43
                    echo "              
              <option value=\"";
                    // line 44
                    echo twig_get_attribute($this->env, $this->source, $context["sorts"], "href", [], "any", false, false, false, 44);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["sorts"], "text", [], "any", false, false, false, 44);
                    echo "</option>
              
              ";
                }
                // line 47
                echo "              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['sorts'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 48
            echo "            
            </select>
          </div>
        </div>
        <div class=\"col-md-3 col-xs-6\">
          <div class=\"form-group input-group input-group-sm\">
            <label class=\"input-group-addon\" for=\"input-limit\">";
            // line 54
            echo ($context["text_limit"] ?? null);
            echo "</label>
            <select id=\"input-limit\" class=\"form-control\" onchange=\"location = this.value;\">
              
              ";
            // line 57
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["limits"]);
            foreach ($context['_seq'] as $context["_key"] => $context["limits"]) {
                // line 58
                echo "              ";
                if ((twig_get_attribute($this->env, $this->source, $context["limits"], "value", [], "any", false, false, false, 58) == ($context["limit"] ?? null))) {
                    // line 59
                    echo "              
              <option value=\"";
                    // line 60
                    echo twig_get_attribute($this->env, $this->source, $context["limits"], "href", [], "any", false, false, false, 60);
                    echo "\" selected=\"selected\">";
                    echo twig_get_attribute($this->env, $this->source, $context["limits"], "text", [], "any", false, false, false, 60);
                    echo "</option>
              
              ";
                } else {
                    // line 63
                    echo "              
              <option value=\"";
                    // line 64
                    echo twig_get_attribute($this->env, $this->source, $context["limits"], "href", [], "any", false, false, false, 64);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["limits"], "text", [], "any", false, false, false, 64);
                    echo "</option>
              
              ";
                }
                // line 67
                echo "              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['limits'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 68
            echo "            
            </select>
          </div>
        </div>
      </div> -->
      <div class=\"subcategory_products__wrapper\">
      ";
            // line 74
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                echo " 
      <div class=\"product";
                // line 75
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 75) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 75) < 1))) {
                    echo " out-of-stock";
                }
                echo "\">
        <div class=\"product__wrapper\">
          <div class=\"product__labels\">
          ";
                // line 78
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 78))) {
                    // line 79
                    echo "          ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 79));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 80
                        echo "            <span class=\"product__labels-label\">";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 80);
                        echo "</span>
          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 82
                    echo "          ";
                }
                // line 83
                echo "          ";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 83))) {
                    // line 84
                    echo "          ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 84));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 85
                        echo "            <span class=\"product__labels-label\">";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 85);
                        echo "</span>
          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 87
                    echo "          ";
                }
                // line 88
                echo "          ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "is_rotate", [], "any", false, false, false, 88)) {
                    // line 89
                    echo "            <span class=\"product__labels-overwiev\">
              <img src=\"catalog/view/theme/default/image//product/overview.png\" alt=\"360\" />
            </span>
          ";
                }
                // line 93
                echo "          </div>
          <div class=\"product__like\">
            <svg class=\"product__like-item product-like-";
                // line 95
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 95);
                if (twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 95)) {
                    echo " product__like-active";
                }
                echo "\" viewBox=\"0 0 24 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" id=\"product-like-";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 95);
                echo "\" ";
                if ( !twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 95)) {
                    echo "onclick=\"wishlist.add(";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 95);
                    echo ")\"";
                } else {
                    echo "onclick=\"wishlist.remove(";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 95);
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
                // line 102
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 102);
                echo "\">
              <img class=\"product__image-item\" src=\"";
                // line 103
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 103);
                echo "\" alt=\"Product\" />
            </a>
          </div>
          <div class=\"product__content-row\">
            <div class=\"product__content\">
              <h4 class=\"product__title\"><a href=\"";
                // line 108
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 108);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 108);
                echo "</a></h4>
              <div class=\"product__rating\">
                <div class=\"rating\">
                ";
                // line 111
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 112
                    echo "                ";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 112) < $context["i"])) {
                        // line 113
                        echo "                <span class=\"rating-star\"></span>
                ";
                    } else {
                        // line 115
                        echo "                <span class=\"rating-star rating-filled\"></span>
                ";
                    }
                    // line 117
                    echo "              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 118
                echo "                </div>
                <span class=\"product__rating-total\">";
                // line 119
                echo twig_get_attribute($this->env, $this->source, $context["product"], "reviews", [], "any", false, false, false, 119);
                echo "</span>
              </div>
              <div class=\"product__price-row\">
              ";
                // line 122
                if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 122)) {
                    // line 123
                    echo "              <p class=\"product__price\">
                <span>";
                    // line 124
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 124);
                    echo "</span>
              </p>
              ";
                } else {
                    // line 127
                    echo "              <p class=\"product__price\">
                ";
                    // line 128
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 128);
                    echo "
              </p>
              ";
                }
                // line 131
                echo "              ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 131)) {
                    // line 132
                    echo "              <p class=\"product__price-old\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 132);
                    echo "</p>
              ";
                }
                // line 134
                echo "              </div>
            </div>
            <div class=\"product__badges\">
            ";
                // line 137
                if (twig_get_attribute($this->env, $this->source, $context["product"], "gifts", [], "any", false, false, false, 137)) {
                    // line 138
                    echo "            <span class=\"product__badge-present\">";
                    echo ($context["text_gift"] ?? null);
                    echo "</span>
            ";
                }
                // line 140
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "is_new", [], "any", false, false, false, 140)) {
                    // line 141
                    echo "            <span class=\"product__badge-new\">New</span>
            ";
                }
                // line 143
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 143)) {
                    // line 144
                    echo "            <span class=\"product__badge-discount\">-";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "percent", [], "any", false, false, false, 144);
                    echo "%</span>
            ";
                }
                // line 146
                echo "            </div>
          </div>
          <div class=\"product__additional\">
            <button class=\"product__additional-button\" onclick=\"cart.add('";
                // line 149
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 149);
                echo "');\">
              <svg class=\"product__additional-icon\"><use href=\"assets/icons.svg#cartSmall\"></use></svg>
              <p>";
                // line 151
                echo ($context["button_cart"] ?? null);
                echo "</p>
            </button>
            <ul class=\"product__additional-attributes\">
            ";
                // line 154
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "attributes", [], "any", false, false, false, 154));
                foreach ($context['_seq'] as $context["_key"] => $context["attr"]) {
                    // line 155
                    echo "            <li class=\"product__additional-attribute\">
              <span class=\"product__additional-attribute_parameter\">";
                    // line 156
                    echo twig_get_attribute($this->env, $this->source, $context["attr"], "name", [], "any", false, false, false, 156);
                    echo "</span>
              <span class=\"product__additional-attribute_value\">";
                    // line 157
                    echo twig_get_attribute($this->env, $this->source, $context["attr"], "text", [], "any", false, false, false, 157);
                    echo "</span>
            </li>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attr'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 160
                echo "            </ul>
          </div>
        </div>
      </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 165
            echo "       </div>
<!--       <div class=\"row\">
        <div class=\"col-sm-6 text-left\">";
            // line 167
            echo ($context["pagination"] ?? null);
            echo "</div>
        <div class=\"col-sm-6 text-right\">";
            // line 168
            echo ($context["results"] ?? null);
            echo "</div>
      </div> -->
      ";
        } else {
            // line 171
            echo "      <p>";
            echo ($context["text_empty"] ?? null);
            echo "</p>
      <div class=\"buttons\">
        <div class=\"pull-right\"><a href=\"";
            // line 173
            echo ($context["continue"] ?? null);
            echo "\" class=\"btn btn-primary\">";
            echo ($context["button_continue"] ?? null);
            echo "</a></div>
      </div>
      ";
        }
        // line 176
        echo "      ";
        echo ($context["content_bottom"] ?? null);
        echo "</div>
    ";
        // line 177
        echo ($context["column_right"] ?? null);
        echo "</div>
</div>
";
        // line 179
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "default/template/product/news.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  513 => 179,  508 => 177,  503 => 176,  495 => 173,  489 => 171,  483 => 168,  479 => 167,  475 => 165,  465 => 160,  456 => 157,  452 => 156,  449 => 155,  445 => 154,  439 => 151,  434 => 149,  429 => 146,  423 => 144,  420 => 143,  416 => 141,  413 => 140,  407 => 138,  405 => 137,  400 => 134,  394 => 132,  391 => 131,  385 => 128,  382 => 127,  376 => 124,  373 => 123,  371 => 122,  365 => 119,  362 => 118,  356 => 117,  352 => 115,  348 => 113,  345 => 112,  341 => 111,  333 => 108,  325 => 103,  321 => 102,  296 => 95,  292 => 93,  286 => 89,  283 => 88,  280 => 87,  271 => 85,  266 => 84,  263 => 83,  260 => 82,  251 => 80,  246 => 79,  244 => 78,  236 => 75,  230 => 74,  222 => 68,  216 => 67,  208 => 64,  205 => 63,  197 => 60,  194 => 59,  191 => 58,  187 => 57,  181 => 54,  173 => 48,  167 => 47,  159 => 44,  156 => 43,  148 => 40,  145 => 39,  142 => 38,  138 => 37,  132 => 34,  123 => 30,  116 => 26,  112 => 25,  107 => 22,  105 => 21,  101 => 20,  94 => 19,  91 => 18,  88 => 17,  85 => 16,  82 => 15,  79 => 14,  76 => 13,  73 => 12,  70 => 11,  67 => 10,  65 => 9,  61 => 8,  58 => 7,  47 => 5,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/product/news.twig", "");
    }
}
