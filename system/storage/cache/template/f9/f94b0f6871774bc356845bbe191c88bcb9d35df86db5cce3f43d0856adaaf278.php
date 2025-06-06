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

/* default/template/product/search.twig */
class __TwigTemplate_9a696acd9e3261a5fe8cc9bf6dfd0334e755ec5371975683c06167b87ee79dfe extends \Twig\Template
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
      <h1>";
        // line 20
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <label class=\"control-label\" for=\"input-search\">";
        // line 21
        echo ($context["entry_search"] ?? null);
        echo "</label>
      <p>
        <label class=\"checkbox-inline\">
          ";
        // line 24
        if (($context["description"] ?? null)) {
            // line 25
            echo "          <input type=\"checkbox\" name=\"description\" value=\"1\" id=\"description\" checked=\"checked\" />
          ";
        } else {
            // line 27
            echo "          <input type=\"checkbox\" name=\"description\" value=\"1\" id=\"description\" />
          ";
        }
        // line 29
        echo "          ";
        echo ($context["entry_description"] ?? null);
        echo "</label>
      </p>
      <input type=\"button\" value=\"";
        // line 31
        echo ($context["button_search"] ?? null);
        echo "\" id=\"button-search\" class=\"btn btn-primary\" />
      <h2>";
        // line 32
        echo ($context["text_search"] ?? null);
        echo "</h2>
      ";
        // line 33
        if (($context["products"] ?? null)) {
            // line 34
            echo "      <!-- OCFilter Start -->      
      ";
            // line 35
            if (($context["ocfilter_mobile_button"] ?? null)) {
                // line 36
                echo "      <div class=\"ocf-btn-mobile-static ocf-mobile\">
        <button type=\"button\" class=\"ocf-btn ocf-btn-default\" data-ocf=\"mobile\"><span class=\"ocf-btn-name\">";
                // line 37
                echo ($context["button_ocfilter_mobile"] ?? null);
                echo "</span> <i class=\"ocf-icon ocf-icon-16 ocf-brand ocf-sliders\"></i></button>
      </div>
      ";
            }
            // line 39
            echo "   
      <!-- /OCFilter End -->
      <div class=\"row\">
        ";
            // line 42
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                echo "      
        <div class=\"category-product ";
                // line 43
                echo ($context["class_col"] ?? null);
                echo " ";
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 43) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 43) < 1))) {
                    echo "out-of-stock";
                }
                echo " product-mobile-none\">
          <div class=\"product-thumb\">

\t\t\t\t\t<!-- XD stickers start -->
\t\t\t\t\t";
                // line 47
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 47))) {
                    // line 48
                    echo "\t\t\t\t\t<div class=\"xdstickers_wrapper ";
                    echo ($context["xdstickers_position"] ?? null);
                    echo "\">
\t\t\t\t\t\t";
                    // line 49
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 49));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 50
                        echo "\t\t\t\t\t\t\t<div class=\"xdstickers ";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "id", [], "any", false, false, false, 50);
                        echo "\">
\t\t\t\t\t\t\t\t";
                        // line 51
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 51);
                        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 54
                    echo "\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 56
                echo "\t\t\t\t\t";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 56))) {
                    // line 57
                    echo "\t\t\t\t\t<div class=\"xdstickers_wrapper xdstickers_wrapper_custom ";
                    echo ($context["xdstickers_position"] ?? null);
                    echo "\">
\t\t\t\t\t\t";
                    // line 58
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 58));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 59
                        echo "\t\t\t\t\t\t\t<div class=\"xdstickers ";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "id", [], "any", false, false, false, 59);
                        echo "\">
\t\t\t\t\t\t\t\t";
                        // line 60
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 60);
                        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 63
                    echo "\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 65
                echo "\t\t\t\t\t<!-- XD stickers end -->
\t\t\t\t
            <div class=\"image\">";
                // line 67
                if (twig_get_attribute($this->env, $this->source, $context["product"], "is_rotate", [], "any", false, false, false, 67)) {
                    echo "<span class=\"three_de_cover\"></span>";
                }
                echo "<a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 67);
                echo "\"><img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 67);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 67);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 67);
                echo "\" class=\"img-responsive\" /></a></div>
            <div class=\"category-product__inner\">
              <div class=\"caption\">
                <h4><a href=\"";
                // line 70
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 70);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 70);
                echo "</a></h4>
                <div class=\"category-product__rating\">
                  <div class=\"rating\"> ";
                // line 72
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 73
                    echo "                    ";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 73) < $context["i"])) {
                        echo " <span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-2x\"></i></span> ";
                    } else {
                        echo " <span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-2x\"></i><i class=\"fa fa-star-o fa-stack-2x\"></i></span>";
                    }
                    // line 74
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo " 
                  </div>
                  <span class=\"category-product__rating-total\">";
                // line 76
                echo twig_get_attribute($this->env, $this->source, $context["product"], "reviews", [], "any", false, false, false, 76);
                echo "</span>
                </div>
                ";
                // line 78
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 78) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 78) < 1))) {
                    // line 79
                    echo "                <a class=\"product-actions__form-btn\" href=\"javascript:OpenFormBuilderPopup(2);\">";
                    echo ($context["text_form_stock"] ?? null);
                    echo "</a>
                ";
                } else {
                    // line 81
                    echo "                ";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 81)) {
                        // line 82
                        echo "                <p class=\"price\"> ";
                        if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 82)) {
                            // line 83
                            echo "                  ";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 83);
                            echo "
                  ";
                        } else {
                            // line 84
                            echo " <span class=\"price-new\">";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 84);
                            echo "</span> <span class=\"price-old\">";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 84);
                            echo "</span>
                  <span class=\"tb_label_special\">-";
                            // line 85
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "percent", [], "any", false, false, false, 85);
                            echo "%</span> ";
                        }
                        // line 86
                        echo "                  ";
                        if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 86)) {
                            echo " <span class=\"price-tax\">";
                            echo ($context["text_tax"] ?? null);
                            echo " ";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 86);
                            echo "</span> ";
                        }
                        echo " </p>
                ";
                    }
                    // line 88
                    echo "                ";
                }
                // line 89
                echo "                </div>
                ";
                // line 90
                if (twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 90)) {
                    // line 91
                    echo "                  <button class=\"category-product__heart ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 91);
                    echo "\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_wishlist"] ?? null);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 91);
                    echo "');\"><i class=\"fa fa-heart\"></i></button>
                ";
                } else {
                    // line 93
                    echo "                  <button class=\"category-product__heart ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 93);
                    echo "\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_wishlist"] ?? null);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 93);
                    echo "', \$(this));\"><i class=\"fa fa-heart-o\"></i></button>
                ";
                }
                // line 95
                echo "            </div>
          </div>
          <div class=\"category-product__footer\">
            ";
                // line 98
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 98) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 98) < 1))) {
                    // line 99
                    echo "            ";
                } else {
                    // line 100
                    echo "            <button class=\"btn btn-primary category-product__btn\" type=\"button\" onclick=\"cart.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 100);
                    echo "', '";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "minimum", [], "any", false, false, false, 100);
                    echo "');\"><i class=\"fa fa-shopping-cart hidden-lg\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">";
                    echo ($context["button_cart"] ?? null);
                    echo "</span></button>
            ";
                }
                // line 102
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "attributes", [], "any", false, false, false, 102)) {
                    echo "  
            <div class=\"category-product__attributes\">
              ";
                    // line 104
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $context["product"]) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["attributes"] ?? null) : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["attribute_group"]) {
                        echo " 
              ";
                        // line 105
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = $context["attribute_group"]) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["attribute"] ?? null) : null));
                        foreach ($context['_seq'] as $context["i"] => $context["attribute"]) {
                            echo " 
              ";
                            // line 106
                            if (($context["i"] < 4)) {
                                echo " 
                <div class=\"category-product__attribute\"><span>";
                                // line 107
                                echo (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = $context["attribute"]) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["name"] ?? null) : null);
                                echo "</span>  ";
                                echo (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = $context["attribute"]) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["text"] ?? null) : null);
                                echo " </div>
              ";
                            }
                            // line 108
                            echo " 
              ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['i'], $context['attribute'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 110
                        echo "              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attribute_group'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 111
                    echo "            </div>
            ";
                }
                // line 113
                echo "          </div>
        </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 115
            echo " 
        ";
            // line 116
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                echo " 
        <div class=\"category-product ";
                // line 117
                echo ($context["class_col"] ?? null);
                echo " ";
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 117) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 117) < 1))) {
                    echo "out-of-stock";
                }
                echo " product-desctop-none\">
          <div class=\"product-thumb\">
            <div class=\"mobile-left-side\">

\t\t\t\t\t<!-- XD stickers start -->
\t\t\t\t\t";
                // line 122
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 122))) {
                    // line 123
                    echo "\t\t\t\t\t<div class=\"xdstickers_wrapper ";
                    echo ($context["xdstickers_position"] ?? null);
                    echo "\">
\t\t\t\t\t\t";
                    // line 124
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 124));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 125
                        echo "\t\t\t\t\t\t\t<div class=\"xdstickers ";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "id", [], "any", false, false, false, 125);
                        echo "\">
\t\t\t\t\t\t\t\t";
                        // line 126
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 126);
                        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 129
                    echo "\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 131
                echo "\t\t\t\t\t";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 131))) {
                    // line 132
                    echo "\t\t\t\t\t<div class=\"xdstickers_wrapper xdstickers_wrapper_custom ";
                    echo ($context["xdstickers_position"] ?? null);
                    echo "\">
\t\t\t\t\t\t";
                    // line 133
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 133));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 134
                        echo "\t\t\t\t\t\t\t<div class=\"xdstickers ";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "id", [], "any", false, false, false, 134);
                        echo "\">
\t\t\t\t\t\t\t\t";
                        // line 135
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 135);
                        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 138
                    echo "\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 140
                echo "\t\t\t\t\t<!-- XD stickers end -->
\t\t\t\t
            <div class=\"image\">";
                // line 142
                if (twig_get_attribute($this->env, $this->source, $context["product"], "is_rotate", [], "any", false, false, false, 142)) {
                    echo "<span class=\"three_de_cover\"></span>";
                }
                echo "<a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 142);
                echo "\"><img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 142);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 142);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 142);
                echo "\" class=\"img-responsive\" /></a></div>
            <div class=\"category-product__rating\">
              <div class=\"rating\"> ";
                // line 144
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 145
                    echo "                    ";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 145) < $context["i"])) {
                        echo " <span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-2x\"></i></span> ";
                    } else {
                        echo " <span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-2x\"></i><i class=\"fa fa-star-o fa-stack-2x\"></i></span>";
                    }
                    // line 146
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo " 
                    <span class=\"category-product__rating-total\">";
                // line 147
                echo twig_get_attribute($this->env, $this->source, $context["product"], "reviews", [], "any", false, false, false, 147);
                echo "</span>
                  </div>
            </div>
                </div>
            <div class=\"category-product__inner\">
              <div class=\"caption\">
                <h4><a href=\"";
                // line 153
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 153);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 153);
                echo "</a></h4>
                
                ";
                // line 155
                if (twig_get_attribute($this->env, $this->source, $context["product"], "attributes", [], "any", false, false, false, 155)) {
                    echo "  
            <div class=\"category-product__attributes\">
              ";
                    // line 157
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = $context["product"]) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4["attributes"] ?? null) : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["attribute_group"]) {
                        echo " 
              ";
                        // line 158
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 = $context["attribute_group"]) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666["attribute"] ?? null) : null));
                        foreach ($context['_seq'] as $context["i"] => $context["attribute"]) {
                            echo " 
              ";
                            // line 159
                            if (($context["i"] < 4)) {
                                echo " 
                <div class=\"category-product__attribute\"><span>";
                                // line 160
                                echo (($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e = $context["attribute"]) && is_array($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e) || $__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e instanceof ArrayAccess ? ($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e["name"] ?? null) : null);
                                echo "</span>  ";
                                echo (($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 = $context["attribute"]) && is_array($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52) || $__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 instanceof ArrayAccess ? ($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52["text"] ?? null) : null);
                                echo " </div>
              ";
                            }
                            // line 161
                            echo " 
              ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['i'], $context['attribute'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 163
                        echo "              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attribute_group'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 164
                    echo "            </div>
            ";
                }
                // line 166
                echo "            <div class=\"price-wrap\">
                ";
                // line 167
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 167) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 167) < 1))) {
                    // line 168
                    echo "                <a class=\"product-actions__form-btn\" href=\"javascript:OpenFormBuilderPopup(2);\">";
                    echo ($context["text_form_stock"] ?? null);
                    echo "</a>
                ";
                } else {
                    // line 170
                    echo "                ";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 170)) {
                        // line 171
                        echo "                <p class=\"price\"> ";
                        if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 171)) {
                            // line 172
                            echo "                  ";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 172);
                            echo "
                  ";
                        } else {
                            // line 173
                            echo " <span class=\"price-new\">";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 173);
                            echo "</span> <span class=\"price-old\">";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 173);
                            echo "</span>
                  <span class=\"tb_label_special\">-";
                            // line 174
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "percent", [], "any", false, false, false, 174);
                            echo "%</span> ";
                        }
                        // line 175
                        echo "                  ";
                        if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 175)) {
                            echo " <span class=\"price-tax\">";
                            echo ($context["text_tax"] ?? null);
                            echo " ";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 175);
                            echo "</span> ";
                        }
                        echo " </p>
                ";
                    }
                    // line 177
                    echo "                ";
                }
                // line 178
                echo "                ";
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 178) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 178) < 1))) {
                    // line 179
                    echo "                ";
                } else {
                    // line 180
                    echo "                <button class=\"btn btn-primary category-product__btn\" type=\"button\" onclick=\"cart.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 180);
                    echo "', '";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "minimum", [], "any", false, false, false, 180);
                    echo "');\"><i class=\"fa fa-shopping-cart hidden-lg\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">";
                    echo ($context["button_cart"] ?? null);
                    echo "</span></button>
                ";
                }
                // line 182
                echo "              </div>
                </div>
                ";
                // line 184
                if (twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 184)) {
                    // line 185
                    echo "                  <button class=\"category-product__heart ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 185);
                    echo "\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_wishlist"] ?? null);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 185);
                    echo "');\"><i class=\"fa fa-heart\"></i></button>
                ";
                } else {
                    // line 187
                    echo "                  <button class=\"category-product__heart ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 187);
                    echo "\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_wishlist"] ?? null);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 187);
                    echo "', \$(this));\"><i class=\"fa fa-heart-o\"></i></button>
                ";
                }
                // line 189
                echo "            </div>
            
          </div>
          <div class=\"category-product__footer\">
            ";
                // line 193
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 193) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 193) < 1))) {
                    // line 194
                    echo "            ";
                } else {
                    // line 195
                    echo "            <!-- <button class=\"btn btn-primary category-product__btn\" type=\"button\" onclick=\"cart.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 195);
                    echo "', '";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "minimum", [], "any", false, false, false, 195);
                    echo "');\"><i class=\"fa fa-shopping-cart hidden-lg\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">";
                    echo ($context["button_cart"] ?? null);
                    echo "</span></button> -->
            ";
                }
                // line 197
                echo "            
          </div>
        </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 200
            echo " 
      </div>
      <div class=\"row\">
        <div class=\"col-sm-12 text-center\">";
            // line 203
            echo ($context["pagination"] ?? null);
            echo "</div>
      </div>
      ";
        } else {
            // line 206
            echo "      <p>";
            echo ($context["text_empty"] ?? null);
            echo "</p>
      ";
        }
        // line 208
        echo "      ";
        echo ($context["content_bottom"] ?? null);
        echo "</div>
    ";
        // line 209
        echo ($context["column_right"] ?? null);
        echo "</div>
</div>
<script type=\"text/javascript\"><!--
\$('#button-search').bind('click', function() {
\turl = 'index.php?route=product/search';

\tvar search = \$('#content input[name=\\'search\\']').prop('value');

\tif (search) {
\t\turl += '&search=' + encodeURIComponent(search);
\t}

\tvar category_id = \$('#content select[name=\\'category_id\\']').prop('value');

\tif (category_id > 0) {
\t\turl += '&category_id=' + encodeURIComponent(category_id);
\t}

\tvar sub_category = \$('#content input[name=\\'sub_category\\']:checked').prop('value');

\tif (sub_category) {
\t\turl += '&sub_category=true';
\t}

\tvar filter_description = \$('#content input[name=\\'description\\']:checked').prop('value');

\tif (filter_description) {
\t\turl += '&description=true';
\t}

\tlocation = url;
});

\$('#content input[name=\\'search\\']').bind('keydown', function(e) {
\tif (e.keyCode == 13) {
\t\t\$('#button-search').trigger('click');
\t}
});

\$('select[name=\\'category_id\\']').on('change', function() {
\tif (this.value == '0') {
\t\t\$('input[name=\\'sub_category\\']').prop('disabled', true);
\t} else {
\t\t\$('input[name=\\'sub_category\\']').prop('disabled', false);
\t}
});

\$('select[name=\\'category_id\\']').trigger('change');
--></script>
";
        // line 258
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "default/template/product/search.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  803 => 258,  751 => 209,  746 => 208,  740 => 206,  734 => 203,  729 => 200,  720 => 197,  710 => 195,  707 => 194,  705 => 193,  699 => 189,  689 => 187,  679 => 185,  677 => 184,  673 => 182,  663 => 180,  660 => 179,  657 => 178,  654 => 177,  642 => 175,  638 => 174,  631 => 173,  625 => 172,  622 => 171,  619 => 170,  613 => 168,  611 => 167,  608 => 166,  604 => 164,  598 => 163,  591 => 161,  584 => 160,  580 => 159,  574 => 158,  568 => 157,  563 => 155,  556 => 153,  547 => 147,  539 => 146,  532 => 145,  528 => 144,  513 => 142,  509 => 140,  505 => 138,  496 => 135,  491 => 134,  487 => 133,  482 => 132,  479 => 131,  475 => 129,  466 => 126,  461 => 125,  457 => 124,  452 => 123,  450 => 122,  438 => 117,  432 => 116,  429 => 115,  421 => 113,  417 => 111,  411 => 110,  404 => 108,  397 => 107,  393 => 106,  387 => 105,  381 => 104,  375 => 102,  365 => 100,  362 => 99,  360 => 98,  355 => 95,  345 => 93,  335 => 91,  333 => 90,  330 => 89,  327 => 88,  315 => 86,  311 => 85,  304 => 84,  298 => 83,  295 => 82,  292 => 81,  286 => 79,  284 => 78,  279 => 76,  270 => 74,  263 => 73,  259 => 72,  252 => 70,  236 => 67,  232 => 65,  228 => 63,  219 => 60,  214 => 59,  210 => 58,  205 => 57,  202 => 56,  198 => 54,  189 => 51,  184 => 50,  180 => 49,  175 => 48,  173 => 47,  162 => 43,  156 => 42,  151 => 39,  145 => 37,  142 => 36,  140 => 35,  137 => 34,  135 => 33,  131 => 32,  127 => 31,  121 => 29,  117 => 27,  113 => 25,  111 => 24,  105 => 21,  101 => 20,  94 => 19,  91 => 18,  88 => 17,  85 => 16,  82 => 15,  79 => 14,  76 => 13,  73 => 12,  70 => 11,  67 => 10,  65 => 9,  61 => 8,  58 => 7,  47 => 5,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/product/search.twig", "");
    }
}
