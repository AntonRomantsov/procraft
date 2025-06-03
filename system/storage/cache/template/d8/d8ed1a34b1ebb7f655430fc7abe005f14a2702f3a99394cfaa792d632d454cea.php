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
class __TwigTemplate_d5266c0dd8b6492d5cac89644528f29062687d54db6f2b71a16e9836d601068c extends \Twig\Template
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
            echo "\t\t\t<div class=\"row category-products\"> ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                echo "      
        <div class=\"category-product ";
                // line 23
                echo ($context["class_col"] ?? null);
                echo " ";
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 23) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 23) < 1))) {
                    echo "out-of-stock";
                }
                echo " product-mobile-none\">
          <div class=\"product-thumb\">

\t\t\t\t\t<!-- XD stickers start -->
\t\t\t\t\t";
                // line 27
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 27))) {
                    // line 28
                    echo "\t\t\t\t\t<div class=\"xdstickers_wrapper ";
                    echo ($context["xdstickers_position"] ?? null);
                    echo "\">
\t\t\t\t\t\t";
                    // line 29
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 29));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 30
                        echo "\t\t\t\t\t\t\t<div class=\"xdstickers ";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "id", [], "any", false, false, false, 30);
                        echo "\">
\t\t\t\t\t\t\t\t";
                        // line 31
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 31);
                        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 34
                    echo "\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 36
                echo "\t\t\t\t\t";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 36))) {
                    // line 37
                    echo "\t\t\t\t\t<div class=\"xdstickers_wrapper xdstickers_wrapper_custom ";
                    echo ($context["xdstickers_position"] ?? null);
                    echo "\">
\t\t\t\t\t\t";
                    // line 38
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 38));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 39
                        echo "\t\t\t\t\t\t\t<div class=\"xdstickers ";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "id", [], "any", false, false, false, 39);
                        echo "\">
\t\t\t\t\t\t\t\t";
                        // line 40
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 40);
                        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 43
                    echo "\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 45
                echo "\t\t\t\t\t<!-- XD stickers end -->
\t\t\t\t
            <div class=\"image\">";
                // line 47
                if (twig_get_attribute($this->env, $this->source, $context["product"], "is_rotate", [], "any", false, false, false, 47)) {
                    echo "<span class=\"three_de_cover\"></span>";
                }
                echo "<a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 47);
                echo "\"><img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 47);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 47);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 47);
                echo "\" class=\"img-responsive\" /></a></div>
            <div class=\"category-product__inner\">
              <div class=\"caption\">
                <h4><a href=\"";
                // line 50
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 50);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 50);
                echo "</a></h4>
                <div class=\"category-product__rating\">
                  <div class=\"rating\"> ";
                // line 52
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 53
                    echo "                    ";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 53) < $context["i"])) {
                        echo " <span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-2x\"></i></span> ";
                    } else {
                        echo " <span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-2x\"></i><i class=\"fa fa-star-o fa-stack-2x\"></i></span>";
                    }
                    // line 54
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo " 
                  </div>
                  <span class=\"category-product__rating-total\">";
                // line 56
                echo twig_get_attribute($this->env, $this->source, $context["product"], "reviews", [], "any", false, false, false, 56);
                echo "</span>
                </div>
                ";
                // line 58
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 58) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 58) < 1))) {
                    // line 59
                    echo "                <a class=\"product-actions__form-btn\" href=\"javascript:OpenFormBuilderPopup(2);\">";
                    echo ($context["text_form_stock"] ?? null);
                    echo "</a>
                ";
                } else {
                    // line 61
                    echo "                ";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 61)) {
                        // line 62
                        echo "                <p class=\"price\"> ";
                        if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 62)) {
                            // line 63
                            echo "                  ";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 63);
                            echo "
                  ";
                        } else {
                            // line 64
                            echo " <span class=\"price-new\">";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 64);
                            echo "</span> <span class=\"price-old\">";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 64);
                            echo "</span>
                  <span class=\"tb_label_special\">-";
                            // line 65
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "percent", [], "any", false, false, false, 65);
                            echo "%</span> ";
                        }
                        // line 66
                        echo "                  ";
                        if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 66)) {
                            echo " <span class=\"price-tax\">";
                            echo ($context["text_tax"] ?? null);
                            echo " ";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 66);
                            echo "</span> ";
                        }
                        echo " </p>
                ";
                    }
                    // line 68
                    echo "                ";
                }
                // line 69
                echo "                </div>
                ";
                // line 70
                if (twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 70)) {
                    // line 71
                    echo "                  <button class=\"category-product__heart ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 71);
                    echo "\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_wishlist"] ?? null);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 71);
                    echo "');\"><i class=\"fa fa-heart\"></i></button>
                ";
                } else {
                    // line 73
                    echo "                  <button class=\"category-product__heart ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 73);
                    echo "\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_wishlist"] ?? null);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 73);
                    echo "', \$(this));\"><i class=\"fa fa-heart-o\"></i></button>
                ";
                }
                // line 75
                echo "            </div>
          </div>
          <div class=\"category-product__footer\">
            ";
                // line 78
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 78) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 78) < 1))) {
                    // line 79
                    echo "            ";
                } else {
                    // line 80
                    echo "            <button class=\"btn btn-primary category-product__btn\" type=\"button\" onclick=\"cart.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 80);
                    echo "', '";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "minimum", [], "any", false, false, false, 80);
                    echo "');\"><i class=\"fa fa-shopping-cart hidden-lg\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">";
                    echo ($context["button_cart"] ?? null);
                    echo "</span></button>
            ";
                }
                // line 82
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "attributes", [], "any", false, false, false, 82)) {
                    echo "  
            <div class=\"category-product__attributes\">
              ";
                    // line 84
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $context["product"]) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["attributes"] ?? null) : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["attribute_group"]) {
                        echo " 
              ";
                        // line 85
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = $context["attribute_group"]) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["attribute"] ?? null) : null));
                        foreach ($context['_seq'] as $context["i"] => $context["attribute"]) {
                            echo " 
              ";
                            // line 86
                            if (($context["i"] < 4)) {
                                echo " 
                <div class=\"category-product__attribute\"><span>";
                                // line 87
                                echo (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = $context["attribute"]) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["name"] ?? null) : null);
                                echo "</span>  ";
                                echo (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = $context["attribute"]) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["text"] ?? null) : null);
                                echo " </div>
              ";
                            }
                            // line 88
                            echo " 
              ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['i'], $context['attribute'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 90
                        echo "              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attribute_group'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 91
                    echo "            </div>
            ";
                }
                // line 93
                echo "          </div>
        </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 95
            echo " 
        ";
            // line 96
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                echo " 
        <div class=\"category-product ";
                // line 97
                echo ($context["class_col"] ?? null);
                echo " ";
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 97) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 97) < 1))) {
                    echo "out-of-stock";
                }
                echo " product-desctop-none\">
          <div class=\"product-thumb\">
            <div class=\"mobile-left-side\">

\t\t\t\t\t<!-- XD stickers start -->
\t\t\t\t\t";
                // line 102
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 102))) {
                    // line 103
                    echo "\t\t\t\t\t<div class=\"xdstickers_wrapper ";
                    echo ($context["xdstickers_position"] ?? null);
                    echo "\">
\t\t\t\t\t\t";
                    // line 104
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 104));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 105
                        echo "\t\t\t\t\t\t\t<div class=\"xdstickers ";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "id", [], "any", false, false, false, 105);
                        echo "\">
\t\t\t\t\t\t\t\t";
                        // line 106
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 106);
                        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 109
                    echo "\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 111
                echo "\t\t\t\t\t";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 111))) {
                    // line 112
                    echo "\t\t\t\t\t<div class=\"xdstickers_wrapper xdstickers_wrapper_custom ";
                    echo ($context["xdstickers_position"] ?? null);
                    echo "\">
\t\t\t\t\t\t";
                    // line 113
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 113));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 114
                        echo "\t\t\t\t\t\t\t<div class=\"xdstickers ";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "id", [], "any", false, false, false, 114);
                        echo "\">
\t\t\t\t\t\t\t\t";
                        // line 115
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 115);
                        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 118
                    echo "\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 120
                echo "\t\t\t\t\t<!-- XD stickers end -->
\t\t\t\t
            <div class=\"image\">";
                // line 122
                if (twig_get_attribute($this->env, $this->source, $context["product"], "is_rotate", [], "any", false, false, false, 122)) {
                    echo "<span class=\"three_de_cover\"></span>";
                }
                echo "<a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 122);
                echo "\"><img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 122);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 122);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 122);
                echo "\" class=\"img-responsive\" /></a></div>
            <div class=\"category-product__rating\">
              <div class=\"rating\"> ";
                // line 124
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 125
                    echo "                    ";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 125) < $context["i"])) {
                        echo " <span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-2x\"></i></span> ";
                    } else {
                        echo " <span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-2x\"></i><i class=\"fa fa-star-o fa-stack-2x\"></i></span>";
                    }
                    // line 126
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo " 
                    <span class=\"category-product__rating-total\">";
                // line 127
                echo twig_get_attribute($this->env, $this->source, $context["product"], "reviews", [], "any", false, false, false, 127);
                echo "</span>
                  </div>
            </div>
                </div>
            <div class=\"category-product__inner\">
              <div class=\"caption\">
                <h4><a href=\"";
                // line 133
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 133);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 133);
                echo "</a></h4>
                
                ";
                // line 135
                if (twig_get_attribute($this->env, $this->source, $context["product"], "attributes", [], "any", false, false, false, 135)) {
                    echo "  
            <div class=\"category-product__attributes\">
              ";
                    // line 137
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = $context["product"]) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4["attributes"] ?? null) : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["attribute_group"]) {
                        echo " 
              ";
                        // line 138
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 = $context["attribute_group"]) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666["attribute"] ?? null) : null));
                        foreach ($context['_seq'] as $context["i"] => $context["attribute"]) {
                            echo " 
              ";
                            // line 139
                            if (($context["i"] < 4)) {
                                echo " 
                <div class=\"category-product__attribute\"><span>";
                                // line 140
                                echo (($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e = $context["attribute"]) && is_array($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e) || $__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e instanceof ArrayAccess ? ($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e["name"] ?? null) : null);
                                echo "</span>  ";
                                echo (($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 = $context["attribute"]) && is_array($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52) || $__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 instanceof ArrayAccess ? ($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52["text"] ?? null) : null);
                                echo " </div>
              ";
                            }
                            // line 141
                            echo " 
              ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['i'], $context['attribute'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 143
                        echo "              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attribute_group'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 144
                    echo "            </div>
            ";
                }
                // line 146
                echo "            <div class=\"price-wrap\">
                ";
                // line 147
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 147) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 147) < 1))) {
                    // line 148
                    echo "                <a class=\"product-actions__form-btn\" href=\"javascript:OpenFormBuilderPopup(2);\">";
                    echo ($context["text_form_stock"] ?? null);
                    echo "</a>
                ";
                } else {
                    // line 150
                    echo "                ";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 150)) {
                        // line 151
                        echo "                <p class=\"price\"> ";
                        if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 151)) {
                            // line 152
                            echo "                  ";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 152);
                            echo "
                  ";
                        } else {
                            // line 153
                            echo " <span class=\"price-new\">";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 153);
                            echo "</span> <span class=\"price-old\">";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 153);
                            echo "</span>
                  <span class=\"tb_label_special\">-";
                            // line 154
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "percent", [], "any", false, false, false, 154);
                            echo "%</span> ";
                        }
                        // line 155
                        echo "                  ";
                        if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 155)) {
                            echo " <span class=\"price-tax\">";
                            echo ($context["text_tax"] ?? null);
                            echo " ";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 155);
                            echo "</span> ";
                        }
                        echo " </p>
                ";
                    }
                    // line 157
                    echo "                ";
                }
                // line 158
                echo "                ";
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 158) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 158) < 1))) {
                    // line 159
                    echo "                ";
                } else {
                    // line 160
                    echo "                <button class=\"btn btn-primary category-product__btn\" type=\"button\" onclick=\"cart.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 160);
                    echo "', '";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "minimum", [], "any", false, false, false, 160);
                    echo "');\"><i class=\"fa fa-shopping-cart hidden-lg\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">";
                    echo ($context["button_cart"] ?? null);
                    echo "</span></button>
                ";
                }
                // line 162
                echo "              </div>
                </div>
                ";
                // line 164
                if (twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 164)) {
                    // line 165
                    echo "                  <button class=\"category-product__heart ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 165);
                    echo "\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_wishlist"] ?? null);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 165);
                    echo "');\"><i class=\"fa fa-heart\"></i></button>
                ";
                } else {
                    // line 167
                    echo "                  <button class=\"category-product__heart ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 167);
                    echo "\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_wishlist"] ?? null);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 167);
                    echo "', \$(this));\"><i class=\"fa fa-heart-o\"></i></button>
                ";
                }
                // line 169
                echo "            </div>
            
          </div>
          <div class=\"category-product__footer\">
            ";
                // line 173
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 173) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 173) < 1))) {
                    // line 174
                    echo "            ";
                } else {
                    // line 175
                    echo "            <!-- <button class=\"btn btn-primary category-product__btn\" type=\"button\" onclick=\"cart.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 175);
                    echo "', '";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "minimum", [], "any", false, false, false, 175);
                    echo "');\"><i class=\"fa fa-shopping-cart hidden-lg\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">";
                    echo ($context["button_cart"] ?? null);
                    echo "</span></button> -->
            ";
                }
                // line 177
                echo "            
          </div>
        </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 180
            echo " </div>
<!-- \t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-sm-12 text-center\">";
            // line 182
            echo ($context["pagination"] ?? null);
            echo "</div>
\t\t\t\t\t<div class=\"col-sm-6 text-right\">";
            // line 183
            echo ($context["results"] ?? null);
            echo "</div>
\t\t\t\t</div> -->
\t\t\t";
        } else {
            // line 186
            echo "\t\t\t\t<p>";
            echo ($context["text_empty"] ?? null);
            echo "</p>
\t\t\t\t<div class=\"buttons\">
\t\t\t\t\t<div class=\"pull-right\"><a href=\"";
            // line 188
            echo ($context["continue"] ?? null);
            echo "\" class=\"btn btn-primary\">";
            echo ($context["button_continue"] ?? null);
            echo "</a></div>
\t\t\t\t</div>
\t\t\t";
        }
        // line 191
        echo "\t\t\t";
        echo ($context["content_bottom"] ?? null);
        echo "</div>
\t\t\t";
        // line 192
        echo ($context["column_right"] ?? null);
        echo "</div>
</div>
";
        // line 194
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
        return array (  719 => 194,  714 => 192,  709 => 191,  701 => 188,  695 => 186,  689 => 183,  685 => 182,  681 => 180,  672 => 177,  662 => 175,  659 => 174,  657 => 173,  651 => 169,  641 => 167,  631 => 165,  629 => 164,  625 => 162,  615 => 160,  612 => 159,  609 => 158,  606 => 157,  594 => 155,  590 => 154,  583 => 153,  577 => 152,  574 => 151,  571 => 150,  565 => 148,  563 => 147,  560 => 146,  556 => 144,  550 => 143,  543 => 141,  536 => 140,  532 => 139,  526 => 138,  520 => 137,  515 => 135,  508 => 133,  499 => 127,  491 => 126,  484 => 125,  480 => 124,  465 => 122,  461 => 120,  457 => 118,  448 => 115,  443 => 114,  439 => 113,  434 => 112,  431 => 111,  427 => 109,  418 => 106,  413 => 105,  409 => 104,  404 => 103,  402 => 102,  390 => 97,  384 => 96,  381 => 95,  373 => 93,  369 => 91,  363 => 90,  356 => 88,  349 => 87,  345 => 86,  339 => 85,  333 => 84,  327 => 82,  317 => 80,  314 => 79,  312 => 78,  307 => 75,  297 => 73,  287 => 71,  285 => 70,  282 => 69,  279 => 68,  267 => 66,  263 => 65,  256 => 64,  250 => 63,  247 => 62,  244 => 61,  238 => 59,  236 => 58,  231 => 56,  222 => 54,  215 => 53,  211 => 52,  204 => 50,  188 => 47,  184 => 45,  180 => 43,  171 => 40,  166 => 39,  162 => 38,  157 => 37,  154 => 36,  150 => 34,  141 => 31,  136 => 30,  132 => 29,  127 => 28,  125 => 27,  114 => 23,  107 => 22,  105 => 21,  101 => 20,  94 => 19,  91 => 18,  88 => 17,  85 => 16,  82 => 15,  79 => 14,  76 => 13,  73 => 12,  70 => 11,  67 => 10,  65 => 9,  61 => 8,  58 => 7,  47 => 5,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/product/bestseller.twig", "");
    }
}
