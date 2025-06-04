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

/* default/template/product/special.twig */
class __TwigTemplate_abd7677b5ff71586925c9621597048e189d01ffe2be7400c27b260b2deb81c86 extends \Twig\Template
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
        echo ($context["text_gifts"] ?? null);
        echo "</h2>
      ";
        // line 21
        if (($context["products_with_gifts"] ?? null)) {
            // line 22
            echo "      <div class=\"row\">
       ";
            // line 23
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products_with_gifts"] ?? null));
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
            // line 113
            echo " 
        ";
            // line 199
            echo "      </div>
        
<!--       <div class=\"row\">
        <div class=\"col-sm-6 text-left\">";
            // line 202
            echo ($context["pagination"] ?? null);
            echo "</div>
        <div class=\"col-sm-6 text-right\">";
            // line 203
            echo ($context["results"] ?? null);
            echo "</div>
      </div> -->
      ";
        } else {
            // line 206
            echo "      <p>";
            echo ($context["text_empty"] ?? null);
            echo "</p>
      <div class=\"buttons\">
        <div class=\"pull-right\"><a href=\"";
            // line 208
            echo ($context["continue"] ?? null);
            echo "\" class=\"btn btn-primary\">";
            echo ($context["button_continue"] ?? null);
            echo "</a></div>
      </div>
      ";
        }
        // line 211
        echo "      <div id=\"content\" class=\"";
        echo ($context["class"] ?? null);
        echo "\">";
        echo ($context["content_top"] ?? null);
        echo "
      <h2>";
        // line 212
        echo ($context["heading_title"] ?? null);
        echo "</h2>
      ";
        // line 213
        if (($context["products"] ?? null)) {
            // line 214
            echo "      <!-- OCFilter Start -->      
      ";
            // line 215
            if (($context["ocfilter_mobile_button"] ?? null)) {
                // line 216
                echo "      <div class=\"ocf-btn-mobile-static ocf-mobile\">
        <button type=\"button\" class=\"ocf-btn ocf-btn-default\" data-ocf=\"mobile\"><span class=\"ocf-btn-name\">";
                // line 217
                echo ($context["button_ocfilter_mobile"] ?? null);
                echo "</span> <i class=\"ocf-icon ocf-icon-16 ocf-brand ocf-sliders\"></i></button>
      </div>
      ";
            }
            // line 219
            echo "   
      <!-- /OCFilter End -->
      <div class=\"row\">      
         ";
            // line 222
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                echo " 
      <div class=\"product";
                // line 223
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 223) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 223) < 1))) {
                    echo " out-of-stock";
                }
                echo "\">
        <div class=\"product__wrapper\">
          <div class=\"product__labels\">
          ";
                // line 226
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 226))) {
                    // line 227
                    echo "          ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 227));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 228
                        echo "            <span class=\"product__labels-label\">";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 228);
                        echo "</span>
          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 230
                    echo "          ";
                }
                // line 231
                echo "          ";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 231))) {
                    // line 232
                    echo "          ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 232));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 233
                        echo "            <span class=\"product__labels-label\">";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 233);
                        echo "</span>
          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 235
                    echo "          ";
                }
                // line 236
                echo "          ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "is_rotate", [], "any", false, false, false, 236)) {
                    // line 237
                    echo "            <span class=\"product__labels-overwiev\">
              <img src=\"catalog/view/theme/default/image//product/overview.png\" alt=\"360\" />
            </span>
          ";
                }
                // line 241
                echo "          </div>
          <div class=\"product__like\">
            <svg class=\"product__like-item product-like-";
                // line 243
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 243);
                if (twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 243)) {
                    echo " product__like-active";
                }
                echo "\" viewBox=\"0 0 24 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" id=\"product-like-";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 243);
                echo "\" ";
                if ( !twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 243)) {
                    echo "onclick=\"wishlist.add(";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 243);
                    echo ")\"";
                } else {
                    echo "onclick=\"wishlist.remove(";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 243);
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
                // line 250
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 250);
                echo "\">
              <img class=\"product__image-item\" src=\"";
                // line 251
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 251);
                echo "\" alt=\"Product\" />
            </a>
          </div>
          <div class=\"product__content-row\">
            <div class=\"product__content\">
              <h4 class=\"product__title\"><a href=\"";
                // line 256
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 256);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 256);
                echo "</a></h4>
              <div class=\"product__rating\">
                <div class=\"rating\">
                ";
                // line 259
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 260
                    echo "                ";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 260) < $context["i"])) {
                        // line 261
                        echo "                <span class=\"rating-star\"></span>
                ";
                    } else {
                        // line 263
                        echo "                <span class=\"rating-star rating-filled\"></span>
                ";
                    }
                    // line 265
                    echo "              ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 266
                echo "                </div>
                <span class=\"product__rating-total\">";
                // line 267
                echo twig_get_attribute($this->env, $this->source, $context["product"], "reviews", [], "any", false, false, false, 267);
                echo "</span>
              </div>
              <div class=\"product__price-row\">
              ";
                // line 270
                if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 270)) {
                    // line 271
                    echo "              <p class=\"product__price\">
                <span>";
                    // line 272
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 272);
                    echo "</span>
              </p>
              ";
                } else {
                    // line 275
                    echo "              <p class=\"product__price\">
                ";
                    // line 276
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 276);
                    echo "
              </p>
              ";
                }
                // line 279
                echo "              ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 279)) {
                    // line 280
                    echo "              <p class=\"product__price-old\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 280);
                    echo "</p>
              ";
                }
                // line 282
                echo "              </div>
            </div>
            <div class=\"product__badges\">
            ";
                // line 285
                if (twig_get_attribute($this->env, $this->source, $context["product"], "gifts", [], "any", false, false, false, 285)) {
                    // line 286
                    echo "            <span class=\"product__badge-present\">";
                    echo ($context["text_gift"] ?? null);
                    echo "</span>
            ";
                }
                // line 288
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "is_new", [], "any", false, false, false, 288)) {
                    // line 289
                    echo "            <span class=\"product__badge-new\">New</span>
            ";
                }
                // line 291
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 291)) {
                    // line 292
                    echo "            <span class=\"product__badge-discount\">-";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "percent", [], "any", false, false, false, 292);
                    echo "%</span>
            ";
                }
                // line 294
                echo "            </div>
          </div>
          <div class=\"product__additional\">
            <button class=\"product__additional-button\" onclick=\"cart.add('";
                // line 297
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 297);
                echo "');\">
              <svg class=\"product__additional-icon\"><use href=\"assets/icons.svg#cartSmall\"></use></svg>
              <p>";
                // line 299
                echo ($context["button_cart"] ?? null);
                echo "</p>
            </button>
            <ul class=\"product__additional-attributes\">
            ";
                // line 302
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "attributes", [], "any", false, false, false, 302));
                foreach ($context['_seq'] as $context["_key"] => $context["attr"]) {
                    // line 303
                    echo "            <li class=\"product__additional-attribute\">
              <span class=\"product__additional-attribute_parameter\">";
                    // line 304
                    echo twig_get_attribute($this->env, $this->source, $context["attr"], "name", [], "any", false, false, false, 304);
                    echo "</span>
              <span class=\"product__additional-attribute_value\">";
                    // line 305
                    echo twig_get_attribute($this->env, $this->source, $context["attr"], "text", [], "any", false, false, false, 305);
                    echo "</span>
            </li>
            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attr'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 308
                echo "            </ul>
          </div>
        </div>
      </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 313
            echo "        ";
            // line 398
            echo "        </div>
<!--       <div class=\"row\">
        <div class=\"col-sm-6 text-left\">";
            // line 400
            echo ($context["pagination"] ?? null);
            echo "</div>
        <div class=\"col-sm-6 text-right\">";
            // line 401
            echo ($context["results"] ?? null);
            echo "</div>
      </div> -->
      ";
        } else {
            // line 404
            echo "      <p>";
            echo ($context["text_empty"] ?? null);
            echo "</p>
      <div class=\"buttons\">
        <div class=\"pull-right\"><a href=\"";
            // line 406
            echo ($context["continue"] ?? null);
            echo "\" class=\"btn btn-primary\">";
            echo ($context["button_continue"] ?? null);
            echo "</a></div>
      </div>
      ";
        }
        // line 409
        echo "      ";
        echo ($context["content_bottom"] ?? null);
        echo "</div>
    ";
        // line 410
        echo ($context["column_right"] ?? null);
        echo "</div>
</div></div>
";
        // line 412
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "default/template/product/special.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  704 => 412,  699 => 410,  694 => 409,  686 => 406,  680 => 404,  674 => 401,  670 => 400,  666 => 398,  664 => 313,  654 => 308,  645 => 305,  641 => 304,  638 => 303,  634 => 302,  628 => 299,  623 => 297,  618 => 294,  612 => 292,  609 => 291,  605 => 289,  602 => 288,  596 => 286,  594 => 285,  589 => 282,  583 => 280,  580 => 279,  574 => 276,  571 => 275,  565 => 272,  562 => 271,  560 => 270,  554 => 267,  551 => 266,  545 => 265,  541 => 263,  537 => 261,  534 => 260,  530 => 259,  522 => 256,  514 => 251,  510 => 250,  485 => 243,  481 => 241,  475 => 237,  472 => 236,  469 => 235,  460 => 233,  455 => 232,  452 => 231,  449 => 230,  440 => 228,  435 => 227,  433 => 226,  425 => 223,  419 => 222,  414 => 219,  408 => 217,  405 => 216,  403 => 215,  400 => 214,  398 => 213,  394 => 212,  387 => 211,  379 => 208,  373 => 206,  367 => 203,  363 => 202,  358 => 199,  355 => 113,  345 => 109,  336 => 106,  332 => 105,  329 => 104,  325 => 103,  319 => 100,  314 => 98,  309 => 95,  303 => 93,  300 => 92,  296 => 90,  293 => 89,  287 => 87,  285 => 86,  280 => 83,  274 => 81,  271 => 80,  265 => 77,  262 => 76,  256 => 73,  253 => 72,  251 => 71,  245 => 68,  242 => 67,  236 => 66,  232 => 64,  228 => 62,  225 => 61,  221 => 60,  213 => 57,  205 => 52,  201 => 51,  176 => 44,  172 => 42,  166 => 38,  163 => 37,  160 => 36,  151 => 34,  146 => 33,  143 => 32,  140 => 31,  131 => 29,  126 => 28,  124 => 27,  116 => 24,  110 => 23,  107 => 22,  105 => 21,  101 => 20,  94 => 19,  91 => 18,  88 => 17,  85 => 16,  82 => 15,  79 => 14,  76 => 13,  73 => 12,  70 => 11,  67 => 10,  65 => 9,  61 => 8,  58 => 7,  47 => 5,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/product/special.twig", "");
    }
}
