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
class __TwigTemplate_81bbbaa2eb1b061936bec8535bb1ced12344b3e2405747cc5a95841764305c71 extends \Twig\Template
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
      <div class=\"row\"> ";
            // line 73
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                echo "      
        <div class=\"category-product ";
                // line 74
                echo ($context["class_col"] ?? null);
                echo " ";
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 74) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 74) < 1))) {
                    echo "out-of-stock";
                }
                echo " product-mobile-none\">
          <div class=\"product-thumb\">

\t\t\t\t\t<!-- XD stickers start -->
\t\t\t\t\t";
                // line 78
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 78))) {
                    // line 79
                    echo "\t\t\t\t\t<div class=\"xdstickers_wrapper ";
                    echo ($context["xdstickers_position"] ?? null);
                    echo "\">
\t\t\t\t\t\t";
                    // line 80
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 80));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 81
                        echo "\t\t\t\t\t\t\t<div class=\"xdstickers ";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "id", [], "any", false, false, false, 81);
                        echo "\">
\t\t\t\t\t\t\t\t";
                        // line 82
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 82);
                        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 85
                    echo "\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 87
                echo "\t\t\t\t\t";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 87))) {
                    // line 88
                    echo "\t\t\t\t\t<div class=\"xdstickers_wrapper xdstickers_wrapper_custom ";
                    echo ($context["xdstickers_position"] ?? null);
                    echo "\">
\t\t\t\t\t\t";
                    // line 89
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 89));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 90
                        echo "\t\t\t\t\t\t\t<div class=\"xdstickers ";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "id", [], "any", false, false, false, 90);
                        echo "\">
\t\t\t\t\t\t\t\t";
                        // line 91
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 91);
                        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 94
                    echo "\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 96
                echo "\t\t\t\t\t<!-- XD stickers end -->
\t\t\t\t
            <div class=\"image\">";
                // line 98
                if (twig_get_attribute($this->env, $this->source, $context["product"], "is_rotate", [], "any", false, false, false, 98)) {
                    echo "<span class=\"three_de_cover\"></span>";
                }
                echo "<a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 98);
                echo "\"><img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 98);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 98);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 98);
                echo "\" class=\"img-responsive\" /></a></div>
            <div class=\"category-product__inner\">
              <div class=\"caption\">
                <h4><a href=\"";
                // line 101
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 101);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 101);
                echo "</a></h4>
                <div class=\"category-product__rating\">
                  <div class=\"rating\"> ";
                // line 103
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 104
                    echo "                    ";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 104) < $context["i"])) {
                        echo " <span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-2x\"></i></span> ";
                    } else {
                        echo " <span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-2x\"></i><i class=\"fa fa-star-o fa-stack-2x\"></i></span>";
                    }
                    // line 105
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo " 
                  </div>
                  <span class=\"category-product__rating-total\">";
                // line 107
                echo twig_get_attribute($this->env, $this->source, $context["product"], "reviews", [], "any", false, false, false, 107);
                echo "</span>
                </div>
                ";
                // line 109
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 109) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 109) < 1))) {
                    // line 110
                    echo "                <a class=\"product-actions__form-btn\" href=\"javascript:OpenFormBuilderPopup(2);\">";
                    echo ($context["text_form_stock"] ?? null);
                    echo "</a>
                ";
                } else {
                    // line 112
                    echo "                ";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 112)) {
                        // line 113
                        echo "                <p class=\"price\"> ";
                        if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 113)) {
                            // line 114
                            echo "                  ";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 114);
                            echo "
                  ";
                        } else {
                            // line 115
                            echo " <span class=\"price-new\">";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 115);
                            echo "</span> <span class=\"price-old\">";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 115);
                            echo "</span>
                  <span class=\"tb_label_special\">-";
                            // line 116
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "percent", [], "any", false, false, false, 116);
                            echo "%</span> ";
                        }
                        // line 117
                        echo "                  ";
                        if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 117)) {
                            echo " <span class=\"price-tax\">";
                            echo ($context["text_tax"] ?? null);
                            echo " ";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 117);
                            echo "</span> ";
                        }
                        echo " </p>
                ";
                    }
                    // line 119
                    echo "                ";
                }
                // line 120
                echo "                </div>
                ";
                // line 121
                if (twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 121)) {
                    // line 122
                    echo "                  <button class=\"category-product__heart ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 122);
                    echo "\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_wishlist"] ?? null);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 122);
                    echo "');\"><i class=\"fa fa-heart\"></i></button>
                ";
                } else {
                    // line 124
                    echo "                  <button class=\"category-product__heart ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 124);
                    echo "\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_wishlist"] ?? null);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 124);
                    echo "', \$(this));\"><i class=\"fa fa-heart-o\"></i></button>
                ";
                }
                // line 126
                echo "            </div>
          </div>
          <div class=\"category-product__footer\">
            ";
                // line 129
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 129) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 129) < 1))) {
                    // line 130
                    echo "            ";
                } else {
                    // line 131
                    echo "            <button class=\"btn btn-primary category-product__btn\" type=\"button\" onclick=\"cart.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 131);
                    echo "', '";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "minimum", [], "any", false, false, false, 131);
                    echo "');\"><i class=\"fa fa-shopping-cart hidden-lg\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">";
                    echo ($context["button_cart"] ?? null);
                    echo "</span></button>
            ";
                }
                // line 133
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "attributes", [], "any", false, false, false, 133)) {
                    echo "  
            <div class=\"category-product__attributes\">
              ";
                    // line 135
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $context["product"]) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["attributes"] ?? null) : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["attribute_group"]) {
                        echo " 
              ";
                        // line 136
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = $context["attribute_group"]) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["attribute"] ?? null) : null));
                        foreach ($context['_seq'] as $context["i"] => $context["attribute"]) {
                            echo " 
              ";
                            // line 137
                            if (($context["i"] < 4)) {
                                echo " 
                <div class=\"category-product__attribute\"><span>";
                                // line 138
                                echo (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = $context["attribute"]) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["name"] ?? null) : null);
                                echo "</span>  ";
                                echo (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = $context["attribute"]) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["text"] ?? null) : null);
                                echo " </div>
              ";
                            }
                            // line 139
                            echo " 
              ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['i'], $context['attribute'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 141
                        echo "              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attribute_group'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 142
                    echo "            </div>
            ";
                }
                // line 144
                echo "          </div>
        </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 146
            echo " 
        ";
            // line 147
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                echo " 
        <div class=\"category-product ";
                // line 148
                echo ($context["class_col"] ?? null);
                echo " ";
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 148) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 148) < 1))) {
                    echo "out-of-stock";
                }
                echo " product-desctop-none\">
          <div class=\"product-thumb\">
            <div class=\"mobile-left-side\">

\t\t\t\t\t<!-- XD stickers start -->
\t\t\t\t\t";
                // line 153
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 153))) {
                    // line 154
                    echo "\t\t\t\t\t<div class=\"xdstickers_wrapper ";
                    echo ($context["xdstickers_position"] ?? null);
                    echo "\">
\t\t\t\t\t\t";
                    // line 155
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 155));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 156
                        echo "\t\t\t\t\t\t\t<div class=\"xdstickers ";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "id", [], "any", false, false, false, 156);
                        echo "\">
\t\t\t\t\t\t\t\t";
                        // line 157
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 157);
                        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 160
                    echo "\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 162
                echo "\t\t\t\t\t";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 162))) {
                    // line 163
                    echo "\t\t\t\t\t<div class=\"xdstickers_wrapper xdstickers_wrapper_custom ";
                    echo ($context["xdstickers_position"] ?? null);
                    echo "\">
\t\t\t\t\t\t";
                    // line 164
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 164));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 165
                        echo "\t\t\t\t\t\t\t<div class=\"xdstickers ";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "id", [], "any", false, false, false, 165);
                        echo "\">
\t\t\t\t\t\t\t\t";
                        // line 166
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 166);
                        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 169
                    echo "\t\t\t\t\t</div>
\t\t\t\t\t";
                }
                // line 171
                echo "\t\t\t\t\t<!-- XD stickers end -->
\t\t\t\t
            <div class=\"image\">";
                // line 173
                if (twig_get_attribute($this->env, $this->source, $context["product"], "is_rotate", [], "any", false, false, false, 173)) {
                    echo "<span class=\"three_de_cover\"></span>";
                }
                echo "<a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 173);
                echo "\"><img src=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 173);
                echo "\" alt=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 173);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 173);
                echo "\" class=\"img-responsive\" /></a></div>
            <div class=\"category-product__rating\">
              <div class=\"rating\"> ";
                // line 175
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 176
                    echo "                    ";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 176) < $context["i"])) {
                        echo " <span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-2x\"></i></span> ";
                    } else {
                        echo " <span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-2x\"></i><i class=\"fa fa-star-o fa-stack-2x\"></i></span>";
                    }
                    // line 177
                    echo "                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo " 
                    <span class=\"category-product__rating-total\">";
                // line 178
                echo twig_get_attribute($this->env, $this->source, $context["product"], "reviews", [], "any", false, false, false, 178);
                echo "</span>
                  </div>
            </div>
                </div>
            <div class=\"category-product__inner\">
              <div class=\"caption\">
                <h4><a href=\"";
                // line 184
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 184);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 184);
                echo "</a></h4>
                
                ";
                // line 186
                if (twig_get_attribute($this->env, $this->source, $context["product"], "attributes", [], "any", false, false, false, 186)) {
                    echo "  
            <div class=\"category-product__attributes\">
              ";
                    // line 188
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable((($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = $context["product"]) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4["attributes"] ?? null) : null));
                    foreach ($context['_seq'] as $context["_key"] => $context["attribute_group"]) {
                        echo " 
              ";
                        // line 189
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable((($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 = $context["attribute_group"]) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666["attribute"] ?? null) : null));
                        foreach ($context['_seq'] as $context["i"] => $context["attribute"]) {
                            echo " 
              ";
                            // line 190
                            if (($context["i"] < 4)) {
                                echo " 
                <div class=\"category-product__attribute\"><span>";
                                // line 191
                                echo (($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e = $context["attribute"]) && is_array($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e) || $__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e instanceof ArrayAccess ? ($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e["name"] ?? null) : null);
                                echo "</span>  ";
                                echo (($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 = $context["attribute"]) && is_array($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52) || $__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 instanceof ArrayAccess ? ($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52["text"] ?? null) : null);
                                echo " </div>
              ";
                            }
                            // line 192
                            echo " 
              ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['i'], $context['attribute'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 194
                        echo "              ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attribute_group'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 195
                    echo "            </div>
            ";
                }
                // line 197
                echo "            <div class=\"price-wrap\">
                ";
                // line 198
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 198) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 198) < 1))) {
                    // line 199
                    echo "                <a class=\"product-actions__form-btn\" href=\"javascript:OpenFormBuilderPopup(2);\">";
                    echo ($context["text_form_stock"] ?? null);
                    echo "</a>
                ";
                } else {
                    // line 201
                    echo "                ";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 201)) {
                        // line 202
                        echo "                <p class=\"price\"> ";
                        if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 202)) {
                            // line 203
                            echo "                  ";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 203);
                            echo "
                  ";
                        } else {
                            // line 204
                            echo " <span class=\"price-new\">";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 204);
                            echo "</span> <span class=\"price-old\">";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 204);
                            echo "</span>
                  <span class=\"tb_label_special\">-";
                            // line 205
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "percent", [], "any", false, false, false, 205);
                            echo "%</span> ";
                        }
                        // line 206
                        echo "                  ";
                        if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 206)) {
                            echo " <span class=\"price-tax\">";
                            echo ($context["text_tax"] ?? null);
                            echo " ";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 206);
                            echo "</span> ";
                        }
                        echo " </p>
                ";
                    }
                    // line 208
                    echo "                ";
                }
                // line 209
                echo "                ";
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 209) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 209) < 1))) {
                    // line 210
                    echo "                ";
                } else {
                    // line 211
                    echo "                <button class=\"btn btn-primary category-product__btn\" type=\"button\" onclick=\"cart.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 211);
                    echo "', '";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "minimum", [], "any", false, false, false, 211);
                    echo "');\"><i class=\"fa fa-shopping-cart hidden-lg\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">";
                    echo ($context["button_cart"] ?? null);
                    echo "</span></button>
                ";
                }
                // line 213
                echo "              </div>
                </div>
                ";
                // line 215
                if (twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 215)) {
                    // line 216
                    echo "                  <button class=\"category-product__heart ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 216);
                    echo "\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_wishlist"] ?? null);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 216);
                    echo "');\"><i class=\"fa fa-heart\"></i></button>
                ";
                } else {
                    // line 218
                    echo "                  <button class=\"category-product__heart ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 218);
                    echo "\" type=\"button\" data-toggle=\"tooltip\" title=\"";
                    echo ($context["button_wishlist"] ?? null);
                    echo "\" onclick=\"wishlist.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 218);
                    echo "', \$(this));\"><i class=\"fa fa-heart-o\"></i></button>
                ";
                }
                // line 220
                echo "            </div>
            
          </div>
          <div class=\"category-product__footer\">
            ";
                // line 224
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 224) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 224) < 1))) {
                    // line 225
                    echo "            ";
                } else {
                    // line 226
                    echo "            <!-- <button class=\"btn btn-primary category-product__btn\" type=\"button\" onclick=\"cart.add('";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 226);
                    echo "', '";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "minimum", [], "any", false, false, false, 226);
                    echo "');\"><i class=\"fa fa-shopping-cart hidden-lg\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">";
                    echo ($context["button_cart"] ?? null);
                    echo "</span></button> -->
            ";
                }
                // line 228
                echo "            
          </div>
        </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 231
            echo " </div>
<!--       <div class=\"row\">
        <div class=\"col-sm-6 text-left\">";
            // line 233
            echo ($context["pagination"] ?? null);
            echo "</div>
        <div class=\"col-sm-6 text-right\">";
            // line 234
            echo ($context["results"] ?? null);
            echo "</div>
      </div> -->
      ";
        } else {
            // line 237
            echo "      <p>";
            echo ($context["text_empty"] ?? null);
            echo "</p>
      <div class=\"buttons\">
        <div class=\"pull-right\"><a href=\"";
            // line 239
            echo ($context["continue"] ?? null);
            echo "\" class=\"btn btn-primary\">";
            echo ($context["button_continue"] ?? null);
            echo "</a></div>
      </div>
      ";
        }
        // line 242
        echo "      ";
        echo ($context["content_bottom"] ?? null);
        echo "</div>
    ";
        // line 243
        echo ($context["column_right"] ?? null);
        echo "</div>
</div>
";
        // line 245
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
        return array (  840 => 245,  835 => 243,  830 => 242,  822 => 239,  816 => 237,  810 => 234,  806 => 233,  802 => 231,  793 => 228,  783 => 226,  780 => 225,  778 => 224,  772 => 220,  762 => 218,  752 => 216,  750 => 215,  746 => 213,  736 => 211,  733 => 210,  730 => 209,  727 => 208,  715 => 206,  711 => 205,  704 => 204,  698 => 203,  695 => 202,  692 => 201,  686 => 199,  684 => 198,  681 => 197,  677 => 195,  671 => 194,  664 => 192,  657 => 191,  653 => 190,  647 => 189,  641 => 188,  636 => 186,  629 => 184,  620 => 178,  612 => 177,  605 => 176,  601 => 175,  586 => 173,  582 => 171,  578 => 169,  569 => 166,  564 => 165,  560 => 164,  555 => 163,  552 => 162,  548 => 160,  539 => 157,  534 => 156,  530 => 155,  525 => 154,  523 => 153,  511 => 148,  505 => 147,  502 => 146,  494 => 144,  490 => 142,  484 => 141,  477 => 139,  470 => 138,  466 => 137,  460 => 136,  454 => 135,  448 => 133,  438 => 131,  435 => 130,  433 => 129,  428 => 126,  418 => 124,  408 => 122,  406 => 121,  403 => 120,  400 => 119,  388 => 117,  384 => 116,  377 => 115,  371 => 114,  368 => 113,  365 => 112,  359 => 110,  357 => 109,  352 => 107,  343 => 105,  336 => 104,  332 => 103,  325 => 101,  309 => 98,  305 => 96,  301 => 94,  292 => 91,  287 => 90,  283 => 89,  278 => 88,  275 => 87,  271 => 85,  262 => 82,  257 => 81,  253 => 80,  248 => 79,  246 => 78,  235 => 74,  229 => 73,  222 => 68,  216 => 67,  208 => 64,  205 => 63,  197 => 60,  194 => 59,  191 => 58,  187 => 57,  181 => 54,  173 => 48,  167 => 47,  159 => 44,  156 => 43,  148 => 40,  145 => 39,  142 => 38,  138 => 37,  132 => 34,  123 => 30,  116 => 26,  112 => 25,  107 => 22,  105 => 21,  101 => 20,  94 => 19,  91 => 18,  88 => 17,  85 => 16,  82 => 15,  79 => 14,  76 => 13,  73 => 12,  70 => 11,  67 => 10,  65 => 9,  61 => 8,  58 => 7,  47 => 5,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/product/news.twig", "");
    }
}
