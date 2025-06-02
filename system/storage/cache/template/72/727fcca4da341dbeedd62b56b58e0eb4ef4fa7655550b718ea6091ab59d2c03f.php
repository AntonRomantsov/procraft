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
class __TwigTemplate_c6deedd234a247dd29a46d607797890c3706a9dfe369681d8043023649e46309 extends \Twig\Template
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
            echo "      <div class=\"row\"> ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products_with_gifts"] ?? null));
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
            $context['_seq'] = twig_ensure_traversable(($context["products_with_gifts"] ?? null));
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
        
<!--       <div class=\"row\">
        <div class=\"col-sm-6 text-left\">";
            // line 183
            echo ($context["pagination"] ?? null);
            echo "</div>
        <div class=\"col-sm-6 text-right\">";
            // line 184
            echo ($context["results"] ?? null);
            echo "</div>
      </div> -->
      ";
        } else {
            // line 187
            echo "      <p>";
            echo ($context["text_empty"] ?? null);
            echo "</p>
      <div class=\"buttons\">
        <div class=\"pull-right\"><a href=\"";
            // line 189
            echo ($context["continue"] ?? null);
            echo "\" class=\"btn btn-primary\">";
            echo ($context["button_continue"] ?? null);
            echo "</a></div>
      </div>
      ";
        }
        // line 192
        echo "      <div id=\"content\" class=\"";
        echo ($context["class"] ?? null);
        echo "\">";
        echo ($context["content_top"] ?? null);
        echo "
      <h2>";
        // line 193
        echo ($context["heading_title"] ?? null);
        echo "</h2>
      ";
        // line 194
        if (($context["products"] ?? null)) {
            // line 195
            echo "      <!-- OCFilter Start -->      
      ";
            // line 196
            if (($context["ocfilter_mobile_button"] ?? null)) {
                // line 197
                echo "      <div class=\"ocf-btn-mobile-static ocf-mobile\">
        <button type=\"button\" class=\"ocf-btn ocf-btn-default\" data-ocf=\"mobile\"><span class=\"ocf-btn-name\">";
                // line 198
                echo ($context["button_ocfilter_mobile"] ?? null);
                echo "</span> <i class=\"ocf-icon ocf-icon-16 ocf-brand ocf-sliders\"></i></button>
      </div>
      ";
            }
            // line 200
            echo "   
      <!-- /OCFilter End -->
      <div class=\"row\"> ";
            // line 202
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                echo "      
        <div class=\"category-product ";
                // line 203
                echo ($context["class_col"] ?? null);
                echo " ";
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 203) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 203) < 1))) {
                    echo "out-of-stock";
                }
                echo " product-mobile-none\">
          <div class=\"product-thumb\">

\t\t\t\t\t<!-- XD stickers start -->
\t\t\t\t\t";
                // line 207
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 207))) {
                    // line 208
                    echo "\t\t\t\t\t<div class=\"xdstickers_wrapper ";
                    echo ($context["xdstickers_position"] ?? null);
                    echo "\">
\t\t\t\t\t\t";
                    // line 209
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 209));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 210
                        echo "\t\t\t\t\t\t\t<div class=\"xdstickers ";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "id", [], "any", false, false, false, 210);
                        echo "\">
\t\t\t\t\t\t\t\t";
                        // line 211
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 211);
                        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 214
                    echo "\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 216
                echo "\t\t\t\t\t";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 216))) {
                    // line 217
                    echo "\t\t\t\t\t<div class=\"xdstickers_wrapper xdstickers_wrapper_custom ";
                    echo ($context["xdstickers_position"] ?? null);
                    echo "\">
\t\t\t\t\t\t";
                    // line 218
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 218));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 219
                        echo "\t\t\t\t\t\t\t<div class=\"xdstickers ";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "id", [], "any", false, false, false, 219);
                        echo "\">
\t\t\t\t\t\t\t\t";
                        // line 220
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 220);
                        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 223
                    echo "\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 225
                echo "\t\t\t\t\t<!-- XD stickers end -->
\t\t\t\t
            <div class=\"image\">";
                // line 227
                if (twig_get_attribute($this->env, $this->source, $context["product"], "is_rotate", [], "any", false, false, false, 227)) {
                    echo "<span class=\"three_de_cover\"></span>";
                }
                echo "<a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 227);
                echo "\"><img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 227);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 227);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 227);
                echo "\" class=\"img-responsive\" /></a></div>
            <div class=\"category-product__inner\">
              <div class=\"caption\">
                <h4><a href=\"";
                // line 230
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 230);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 230);
                echo "</a></h4>
                <div class=\"category-product__rating\">
                  <div class=\"rating\"> ";
                // line 232
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 233
                    echo "                    ";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 233) < $context["i"])) {
                        echo " <span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-2x\"></i></span> ";
                    } else {
                        echo " <span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-2x\"></i><i class=\"fa fa-star-o fa-stack-2x\"></i></span>";
                    }
                    // line 234
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo " 
                  </div>
                  <span class=\"category-product__rating-total\">";
                // line 236
                echo twig_get_attribute($this->env, $this->source, $context["product"], "reviews", [], "any", false, false, false, 236);
                echo "</span>
                </div>
                ";
                // line 238
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 238) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 238) < 1))) {
                    // line 239
                    echo "                <a class=\"product-actions__form-btn\" href=\"javascript:OpenFormBuilderPopup(2);\">";
                    echo ($context["text_form_stock"] ?? null);
                    echo "</a>
                ";
                } else {
                    // line 241
                    echo "                ";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 241)) {
                        // line 242
                        echo "                <p class=\"price\"> ";
                        if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 242)) {
                            // line 243
                            echo "                  ";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 243);
                            echo "
                  ";
                        } else {
                            // line 244
                            echo " <span class=\"price-new\">";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 244);
                            echo "</span> <span class=\"price-old\">";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 244);
                            echo "</span>
                  <span class=\"tb_label_special\">-";
                            // line 245
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "percent", [], "any", false, false, false, 245);
                            echo "%</span> ";
                        }
                        // line 246
                        echo "                  ";
                        if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 246)) {
                            echo " <span class=\"price-tax\">";
                            echo ($context["text_tax"] ?? null);
                            echo " ";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 246);
                            echo "</span> ";
                        }
                        echo " </p>
                ";
                    }
                    // line 248
                    echo "                ";
                }
                // line 249
                echo "                </div>
                ";
                // line 250
                if (twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 250)) {
                    // line 251
                    echo "                  <button class=\"category-product__heart ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 251);
                    echo "\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_wishlist"] ?? null);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 251);
                    echo "');\"><i class=\"fa fa-heart\"></i></button>
                ";
                } else {
                    // line 253
                    echo "                  <button class=\"category-product__heart ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 253);
                    echo "\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_wishlist"] ?? null);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 253);
                    echo "', \$(this));\"><i class=\"fa fa-heart-o\"></i></button>
                ";
                }
                // line 255
                echo "            </div>
          </div>
          <div class=\"category-product__footer\">
            ";
                // line 258
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 258) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 258) < 1))) {
                    // line 259
                    echo "            ";
                } else {
                    // line 260
                    echo "            <button class=\"btn btn-primary category-product__btn\" type=\"button\" onclick=\"cart.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 260);
                    echo "', '";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "minimum", [], "any", false, false, false, 260);
                    echo "');\"><i class=\"fa fa-shopping-cart hidden-lg\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">";
                    echo ($context["button_cart"] ?? null);
                    echo "</span></button>
            ";
                }
                // line 262
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "attributes", [], "any", false, false, false, 262)) {
                    echo "  
            <div class=\"category-product__attributes\">
              ";
                    // line 264
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 = $context["product"]) && is_array($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136) || $__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 instanceof ArrayAccess ? ($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136["attributes"] ?? null) : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["attribute_group"]) {
                        echo " 
              ";
                        // line 265
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 = $context["attribute_group"]) && is_array($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386) || $__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 instanceof ArrayAccess ? ($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386["attribute"] ?? null) : null));
                        foreach ($context['_seq'] as $context["i"] => $context["attribute"]) {
                            echo " 
              ";
                            // line 266
                            if (($context["i"] < 4)) {
                                echo " 
                <div class=\"category-product__attribute\"><span>";
                                // line 267
                                echo (($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 = $context["attribute"]) && is_array($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9) || $__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 instanceof ArrayAccess ? ($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9["name"] ?? null) : null);
                                echo "</span>  ";
                                echo (($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae = $context["attribute"]) && is_array($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae) || $__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae instanceof ArrayAccess ? ($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae["text"] ?? null) : null);
                                echo " </div>
              ";
                            }
                            // line 268
                            echo " 
              ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['i'], $context['attribute'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 270
                        echo "              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attribute_group'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 271
                    echo "            </div>
            ";
                }
                // line 273
                echo "          </div>
        </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 275
            echo " 
        ";
            // line 276
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                echo " 
        <div class=\"category-product ";
                // line 277
                echo ($context["class_col"] ?? null);
                echo " ";
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 277) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 277) < 1))) {
                    echo "out-of-stock";
                }
                echo " product-desctop-none\">
          <div class=\"product-thumb\">
            <div class=\"mobile-left-side\">

\t\t\t\t\t<!-- XD stickers start -->
\t\t\t\t\t";
                // line 282
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 282))) {
                    // line 283
                    echo "\t\t\t\t\t<div class=\"xdstickers_wrapper ";
                    echo ($context["xdstickers_position"] ?? null);
                    echo "\">
\t\t\t\t\t\t";
                    // line 284
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 284));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 285
                        echo "\t\t\t\t\t\t\t<div class=\"xdstickers ";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "id", [], "any", false, false, false, 285);
                        echo "\">
\t\t\t\t\t\t\t\t";
                        // line 286
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 286);
                        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 289
                    echo "\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 291
                echo "\t\t\t\t\t";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 291))) {
                    // line 292
                    echo "\t\t\t\t\t<div class=\"xdstickers_wrapper xdstickers_wrapper_custom ";
                    echo ($context["xdstickers_position"] ?? null);
                    echo "\">
\t\t\t\t\t\t";
                    // line 293
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 293));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 294
                        echo "\t\t\t\t\t\t\t<div class=\"xdstickers ";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "id", [], "any", false, false, false, 294);
                        echo "\">
\t\t\t\t\t\t\t\t";
                        // line 295
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 295);
                        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 298
                    echo "\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 300
                echo "\t\t\t\t\t<!-- XD stickers end -->
\t\t\t\t
            <div class=\"image\">";
                // line 302
                if (twig_get_attribute($this->env, $this->source, $context["product"], "is_rotate", [], "any", false, false, false, 302)) {
                    echo "<span class=\"three_de_cover\"></span>";
                }
                echo "<a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 302);
                echo "\"><img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 302);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 302);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 302);
                echo "\" class=\"img-responsive\" /></a></div>
            <div class=\"category-product__rating\">
              <div class=\"rating\"> ";
                // line 304
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 305
                    echo "                    ";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 305) < $context["i"])) {
                        echo " <span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-2x\"></i></span> ";
                    } else {
                        echo " <span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-2x\"></i><i class=\"fa fa-star-o fa-stack-2x\"></i></span>";
                    }
                    // line 306
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo " 
                    <span class=\"category-product__rating-total\">";
                // line 307
                echo twig_get_attribute($this->env, $this->source, $context["product"], "reviews", [], "any", false, false, false, 307);
                echo "</span>
                  </div>
            </div>
                </div>
            <div class=\"category-product__inner\">
              <div class=\"caption\">
                <h4><a href=\"";
                // line 313
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 313);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 313);
                echo "</a></h4>
                
                ";
                // line 315
                if (twig_get_attribute($this->env, $this->source, $context["product"], "attributes", [], "any", false, false, false, 315)) {
                    echo "  
            <div class=\"category-product__attributes\">
              ";
                    // line 317
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f = $context["product"]) && is_array($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f) || $__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f instanceof ArrayAccess ? ($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f["attributes"] ?? null) : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["attribute_group"]) {
                        echo " 
              ";
                        // line 318
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40 = $context["attribute_group"]) && is_array($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40) || $__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40 instanceof ArrayAccess ? ($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40["attribute"] ?? null) : null));
                        foreach ($context['_seq'] as $context["i"] => $context["attribute"]) {
                            echo " 
              ";
                            // line 319
                            if (($context["i"] < 4)) {
                                echo " 
                <div class=\"category-product__attribute\"><span>";
                                // line 320
                                echo (($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f = $context["attribute"]) && is_array($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f) || $__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f instanceof ArrayAccess ? ($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f["name"] ?? null) : null);
                                echo "</span>  ";
                                echo (($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760 = $context["attribute"]) && is_array($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760) || $__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760 instanceof ArrayAccess ? ($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760["text"] ?? null) : null);
                                echo " </div>
              ";
                            }
                            // line 321
                            echo " 
              ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['i'], $context['attribute'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 323
                        echo "              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attribute_group'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 324
                    echo "            </div>
            ";
                }
                // line 326
                echo "            <div class=\"price-wrap\">
                ";
                // line 327
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 327) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 327) < 1))) {
                    // line 328
                    echo "                <a class=\"product-actions__form-btn\" href=\"javascript:OpenFormBuilderPopup(2);\">";
                    echo ($context["text_form_stock"] ?? null);
                    echo "</a>
                ";
                } else {
                    // line 330
                    echo "                ";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 330)) {
                        // line 331
                        echo "                <p class=\"price\"> ";
                        if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 331)) {
                            // line 332
                            echo "                  ";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 332);
                            echo "
                  ";
                        } else {
                            // line 333
                            echo " <span class=\"price-new\">";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 333);
                            echo "</span> <span class=\"price-old\">";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 333);
                            echo "</span>
                  <span class=\"tb_label_special\">-";
                            // line 334
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "percent", [], "any", false, false, false, 334);
                            echo "%</span> ";
                        }
                        // line 335
                        echo "                  ";
                        if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 335)) {
                            echo " <span class=\"price-tax\">";
                            echo ($context["text_tax"] ?? null);
                            echo " ";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 335);
                            echo "</span> ";
                        }
                        echo " </p>
                ";
                    }
                    // line 337
                    echo "                ";
                }
                // line 338
                echo "                ";
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 338) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 338) < 1))) {
                    // line 339
                    echo "                ";
                } else {
                    // line 340
                    echo "                <button class=\"btn btn-primary category-product__btn\" type=\"button\" onclick=\"cart.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 340);
                    echo "', '";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "minimum", [], "any", false, false, false, 340);
                    echo "');\"><i class=\"fa fa-shopping-cart hidden-lg\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">";
                    echo ($context["button_cart"] ?? null);
                    echo "</span></button>
                ";
                }
                // line 342
                echo "              </div>
                </div>
                ";
                // line 344
                if (twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 344)) {
                    // line 345
                    echo "                  <button class=\"category-product__heart ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 345);
                    echo "\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_wishlist"] ?? null);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 345);
                    echo "');\"><i class=\"fa fa-heart\"></i></button>
                ";
                } else {
                    // line 347
                    echo "                  <button class=\"category-product__heart ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 347);
                    echo "\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_wishlist"] ?? null);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 347);
                    echo "', \$(this));\"><i class=\"fa fa-heart-o\"></i></button>
                ";
                }
                // line 349
                echo "            </div>
            
          </div>
          <div class=\"category-product__footer\">
            ";
                // line 353
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 353) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 353) < 1))) {
                    // line 354
                    echo "            ";
                } else {
                    // line 355
                    echo "            <!-- <button class=\"btn btn-primary category-product__btn\" type=\"button\" onclick=\"cart.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 355);
                    echo "', '";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "minimum", [], "any", false, false, false, 355);
                    echo "');\"><i class=\"fa fa-shopping-cart hidden-lg\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">";
                    echo ($context["button_cart"] ?? null);
                    echo "</span></button> -->
            ";
                }
                // line 357
                echo "            
          </div>
        </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 360
            echo " </div>
        
<!--       <div class=\"row\">
        <div class=\"col-sm-6 text-left\">";
            // line 363
            echo ($context["pagination"] ?? null);
            echo "</div>
        <div class=\"col-sm-6 text-right\">";
            // line 364
            echo ($context["results"] ?? null);
            echo "</div>
      </div> -->
      ";
        } else {
            // line 367
            echo "      <p>";
            echo ($context["text_empty"] ?? null);
            echo "</p>
      <div class=\"buttons\">
        <div class=\"pull-right\"><a href=\"";
            // line 369
            echo ($context["continue"] ?? null);
            echo "\" class=\"btn btn-primary\">";
            echo ($context["button_continue"] ?? null);
            echo "</a></div>
      </div>
      ";
        }
        // line 372
        echo "      ";
        echo ($context["content_bottom"] ?? null);
        echo "</div>
    ";
        // line 373
        echo ($context["column_right"] ?? null);
        echo "</div>
</div></div>
";
        // line 375
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
        return array (  1353 => 375,  1348 => 373,  1343 => 372,  1335 => 369,  1329 => 367,  1323 => 364,  1319 => 363,  1314 => 360,  1305 => 357,  1295 => 355,  1292 => 354,  1290 => 353,  1284 => 349,  1274 => 347,  1264 => 345,  1262 => 344,  1258 => 342,  1248 => 340,  1245 => 339,  1242 => 338,  1239 => 337,  1227 => 335,  1223 => 334,  1216 => 333,  1210 => 332,  1207 => 331,  1204 => 330,  1198 => 328,  1196 => 327,  1193 => 326,  1189 => 324,  1183 => 323,  1176 => 321,  1169 => 320,  1165 => 319,  1159 => 318,  1153 => 317,  1148 => 315,  1141 => 313,  1132 => 307,  1124 => 306,  1117 => 305,  1113 => 304,  1098 => 302,  1094 => 300,  1090 => 298,  1081 => 295,  1076 => 294,  1072 => 293,  1067 => 292,  1064 => 291,  1060 => 289,  1051 => 286,  1046 => 285,  1042 => 284,  1037 => 283,  1035 => 282,  1023 => 277,  1017 => 276,  1014 => 275,  1006 => 273,  1002 => 271,  996 => 270,  989 => 268,  982 => 267,  978 => 266,  972 => 265,  966 => 264,  960 => 262,  950 => 260,  947 => 259,  945 => 258,  940 => 255,  930 => 253,  920 => 251,  918 => 250,  915 => 249,  912 => 248,  900 => 246,  896 => 245,  889 => 244,  883 => 243,  880 => 242,  877 => 241,  871 => 239,  869 => 238,  864 => 236,  855 => 234,  848 => 233,  844 => 232,  837 => 230,  821 => 227,  817 => 225,  813 => 223,  804 => 220,  799 => 219,  795 => 218,  790 => 217,  787 => 216,  783 => 214,  774 => 211,  769 => 210,  765 => 209,  760 => 208,  758 => 207,  747 => 203,  741 => 202,  737 => 200,  731 => 198,  728 => 197,  726 => 196,  723 => 195,  721 => 194,  717 => 193,  710 => 192,  702 => 189,  696 => 187,  690 => 184,  686 => 183,  681 => 180,  672 => 177,  662 => 175,  659 => 174,  657 => 173,  651 => 169,  641 => 167,  631 => 165,  629 => 164,  625 => 162,  615 => 160,  612 => 159,  609 => 158,  606 => 157,  594 => 155,  590 => 154,  583 => 153,  577 => 152,  574 => 151,  571 => 150,  565 => 148,  563 => 147,  560 => 146,  556 => 144,  550 => 143,  543 => 141,  536 => 140,  532 => 139,  526 => 138,  520 => 137,  515 => 135,  508 => 133,  499 => 127,  491 => 126,  484 => 125,  480 => 124,  465 => 122,  461 => 120,  457 => 118,  448 => 115,  443 => 114,  439 => 113,  434 => 112,  431 => 111,  427 => 109,  418 => 106,  413 => 105,  409 => 104,  404 => 103,  402 => 102,  390 => 97,  384 => 96,  381 => 95,  373 => 93,  369 => 91,  363 => 90,  356 => 88,  349 => 87,  345 => 86,  339 => 85,  333 => 84,  327 => 82,  317 => 80,  314 => 79,  312 => 78,  307 => 75,  297 => 73,  287 => 71,  285 => 70,  282 => 69,  279 => 68,  267 => 66,  263 => 65,  256 => 64,  250 => 63,  247 => 62,  244 => 61,  238 => 59,  236 => 58,  231 => 56,  222 => 54,  215 => 53,  211 => 52,  204 => 50,  188 => 47,  184 => 45,  180 => 43,  171 => 40,  166 => 39,  162 => 38,  157 => 37,  154 => 36,  150 => 34,  141 => 31,  136 => 30,  132 => 29,  127 => 28,  125 => 27,  114 => 23,  107 => 22,  105 => 21,  101 => 20,  94 => 19,  91 => 18,  88 => 17,  85 => 16,  82 => 15,  79 => 14,  76 => 13,  73 => 12,  70 => 11,  67 => 10,  65 => 9,  61 => 8,  58 => 7,  47 => 5,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/product/special.twig", "");
    }
}
