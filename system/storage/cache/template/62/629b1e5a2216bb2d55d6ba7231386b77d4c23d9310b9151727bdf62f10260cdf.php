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

/* default/template/extension/module/owlcarousel_p.twig */
class __TwigTemplate_fe178a2098716fee1a36a31e6142b304b693a1af2ec33d3274544fa38bda179c extends \Twig\Template
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
        if ((twig_length_filter($this->env, ($context["modules"] ?? null)) > 1)) {
            // line 2
            echo "    <ul class=\"nav nav-tabs\" id=\"nav-owl-";
            echo ($context["module"] ?? null);
            echo "\">
    \t";
            // line 3
            $context["is_first_tab"] = true;
            // line 4
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["modules"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
                // line 5
                echo "            ";
                if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["m"], "products", [], "any", false, false, false, 5)) > 1)) {
                    // line 6
                    echo "                <li><a href=\"#owlcarousel_p-";
                    echo ($context["module_id"] ?? null);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["m"], "heading_title", [], "any", false, false, false, 6);
                    echo "</a></li>
                ";
                    // line 7
                    $context["is_first_tab"] = false;
                    // line 8
                    echo "            ";
                }
                echo " 
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 9
            echo " 
    </ul>
";
        }
        // line 11
        echo " 

";
        // line 13
        if ((twig_length_filter($this->env, ($context["modules"] ?? null)) > 1)) {
            // line 14
            echo "<div id=\"products-tabs-content\" class=\"tab-content\">
";
        }
        // line 15
        echo " 

";
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["modules"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["m"]) {
            echo " 
    ";
            // line 18
            if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["m"], "products", [], "any", false, false, false, 18)) >= 1)) {
                // line 19
                echo "        ";
                $context["is_first_tab"] = true;
                // line 20
                echo "        <div class=\"tab-pane module-tab-pane\" id=\"owlcarousel_p-";
                echo ($context["module_id"] ?? null);
                echo "\">
            ";
                // line 21
                if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_title", [], "any", false, false, false, 21) == 1)) {
                    echo " 
                <h3>";
                    // line 22
                    echo twig_get_attribute($this->env, $this->source, $context["m"], "heading_title", [], "any", false, false, false, 22);
                    echo "</h3>
            ";
                }
                // line 24
                echo "            ";
                if (($context["subcategories"] ?? null)) {
                    // line 25
                    echo "            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["subcategories"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                        echo " 
            ";
                        // line 26
                        if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 26), ($context["cats_ids_array"] ?? null))) {
                            // line 27
                            echo "            <a class=\"btn btn-subcategory\" onclick=\"getSubcat(";
                            echo ($context["module_id"] ?? null);
                            echo ", '";
                            echo twig_get_attribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 27);
                            echo "', '";
                            echo ($context["location"] ?? null);
                            echo "', '";
                            echo ($context["cats_ids"] ?? null);
                            echo "');\" style=\"background: #ED6E00; color: #fff; font-weight: bold;\">";
                            echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 27);
                            echo "</a>
            ";
                        } else {
                            // line 29
                            echo "            <a class=\"btn btn-subcategory\" onclick=\"getSubcat(";
                            echo ($context["module_id"] ?? null);
                            echo ", '";
                            echo twig_get_attribute($this->env, $this->source, $context["category"], "id", [], "any", false, false, false, 29);
                            echo "', '";
                            echo ($context["location"] ?? null);
                            echo "', '";
                            echo ($context["cats_ids"] ?? null);
                            echo "');\">";
                            echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 29);
                            echo "</a>
            ";
                        }
                        // line 31
                        echo "            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 32
                    echo "            ";
                }
                // line 33
                echo "            <div class=\"row product-layout ";
                echo twig_get_attribute($this->env, $this->source, $context["m"], "add_class_name", [], "any", false, false, false, 33);
                echo "\">
                <div id=\"owl-";
                // line 34
                echo twig_get_attribute($this->env, $this->source, $context["m"], "module", [], "any", false, false, false, 34);
                echo "\" class=\"owl-carousel\">
                    ";
                // line 35
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["m"], "products", [], "any", false, false, false, 35));
                foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                    echo " 
                        <div class=\"col-lg-12 item ad-category-item hits-actions ";
                    // line 36
                    if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 36) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 36) < 1))) {
                        echo "out-of-stock";
                    }
                    echo "\">
                            <div class=\"product-thumb transition\">
                                ";
                    // line 38
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 38)) {
                        // line 39
                        echo "                                    <div class=\"image\">";
                        if (twig_get_attribute($this->env, $this->source, $context["product"], "is_rotate", [], "any", false, false, false, 39)) {
                            echo "<span class=\"three_de_cover\"></span>";
                        }
                        // line 40
                        echo "                                        <!-- XD stickers start -->
                    ";
                        // line 41
                        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 41))) {
                            // line 42
                            echo "                    <div class=\"xdstickers_wrapper ";
                            echo ($context["xdstickers_position"] ?? null);
                            echo "\">
                        ";
                            // line 43
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 43));
                            foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                                // line 44
                                echo "                            <div class=\"xdstickers ";
                                echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "id", [], "any", false, false, false, 44);
                                echo "\">
                                ";
                                // line 45
                                echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 45);
                                echo "
                            </div>
                        ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 48
                            echo "                    </div>
                    ";
                        }
                        // line 50
                        echo "                    ";
                        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 50))) {
                            // line 51
                            echo "                    <div class=\"xdstickers_wrapper xdstickers_wrapper_custom ";
                            echo ($context["xdstickers_position"] ?? null);
                            echo "\">
                        ";
                            // line 52
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 52));
                            foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                                // line 53
                                echo "                            <div class=\"xdstickers ";
                                echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "id", [], "any", false, false, false, 53);
                                echo "\">
                                ";
                                // line 54
                                echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 54);
                                echo "
                            </div>
                        ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 57
                            echo "                    </div>
                    ";
                        }
                        // line 59
                        echo "                    <!-- XD stickers end -->
                                        <a href=\"";
                        // line 60
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 60);
                        echo "\"><img ";
                        if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_lazy_load", [], "any", false, false, false, 60) == 1)) {
                            echo "data-";
                        }
                        echo "src=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 60);
                        echo "\" alt=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 60);
                        echo "\" class=\"img-responsive ";
                        if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_lazy_load", [], "any", false, false, false, 60) == 1)) {
                            echo "lazyOwl";
                        }
                        echo " ";
                        if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 60) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 60) < 1))) {
                            echo "img-out-of-stock";
                        }
                        echo "\"/></a>
                                    </div>
                                ";
                    }
                    // line 63
                    echo "                                <div class=\"caption\">
                                    ";
                    // line 64
                    if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_name", [], "any", false, false, false, 64) == 1)) {
                        // line 65
                        echo "                                        <h4><a href=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 65);
                        echo "\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 65);
                        echo "</a></h4>
                                    ";
                    }
                    // line 67
                    echo "                                    ";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 67) && (twig_get_attribute($this->env, $this->source, $context["m"], "show_rate", [], "any", false, false, false, 67) == 1))) {
                        echo " 
                                        <div class=\"rating\">
                                            ";
                        // line 69
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(5);
                        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                            // line 70
                            echo "                                                ";
                            if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 70) < $context["i"])) {
                                // line 71
                                echo "                                                    <span class=\"fa fa-stack\"><i class=\"fa fa-star-o fa-stack-2x\"></i></span>
                                                ";
                            } else {
                                // line 73
                                echo "                                                    <span class=\"fa fa-stack\"><i class=\"fa fa-star fa-stack-2x\"></i><i class=\"fa fa-star-o fa-stack-2x\"></i></span>
                                                ";
                            }
                            // line 75
                            echo "                                            ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 76
                        echo "                                        </div>
                                    ";
                    }
                    // line 77
                    echo " 
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
                        echo "                                    ";
                        if (twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 81)) {
                            echo " 
                                        <p class=\"price\">
                                            ";
                            // line 83
                            if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 83)) {
                                // line 84
                                echo "                                                ";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 84);
                                echo "
                                            ";
                            } else {
                                // line 86
                                echo "                                                <span class=\"price-new\">";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 86);
                                echo "</span> <span class=\"price-old\">";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 86);
                                echo "</span>
                                                <span class=\"tb_label_special\">-";
                                // line 87
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "percent", [], "any", false, false, false, 87);
                                echo "%</span>
                                            ";
                            }
                            // line 89
                            echo "                                            ";
                            if (twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 89)) {
                                // line 90
                                echo "                                                <span class=\"price-tax\">";
                                echo ($context["text_tax"] ?? null);
                                echo " ";
                                echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 90);
                                echo "</span>
                                            ";
                            }
                            // line 92
                            echo "                                        </p>
                                    ";
                        }
                        // line 94
                        echo "                                    ";
                    }
                    // line 95
                    echo "                                </div>
                                <div class=\"ad-scis\">
                                    ";
                    // line 97
                    if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 97) != 5) || (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 97) >= 1))) {
                        // line 98
                        echo "                                        ";
                        if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_cart", [], "any", false, false, false, 98) == 1)) {
                            // line 99
                            echo "                                            <button type=\"button\" onclick=\"cart.add('";
                            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 99);
                            echo "');\"> <span class=\"hidden-xs hidden-sm hidden-md\">";
                            echo ($context["button_cart"] ?? null);
                            echo "</span></button>
                                        ";
                        }
                        // line 101
                        echo "                                    ";
                    }
                    echo "    
                                        <div class=\"product_in_category_attributes\">
            ";
                    // line 103
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "attributes", [], "any", false, false, false, 103));
                    foreach ($context['_seq'] as $context["_key"] => $context["attr"]) {
                        // line 104
                        echo "              <div> <span>";
                        echo twig_get_attribute($this->env, $this->source, $context["attr"], "name", [], "any", false, false, false, 104);
                        echo "</span> ";
                        echo twig_get_attribute($this->env, $this->source, $context["attr"], "text", [], "any", false, false, false, 104);
                        echo " </div>
            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attr'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 106
                    echo "            </div>
        </div>
                            </div>
                        </div>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 110
                echo " 
                </div>
            </div>
            <script type=\"text/javascript\">\$(document).ready(function() {function random(owlSelector){owlSelector.children().sort(function(){return Math.round(Math.random()) - 0.5;}).each(function(){\$(this).appendTo(owlSelector);});}var owl = \$(\"#owl-";
                // line 113
                echo twig_get_attribute($this->env, $this->source, $context["m"], "module", [], "any", false, false, false, 113);
                echo "\");owl.owlCarousel({items : ";
                echo twig_get_attribute($this->env, $this->source, $context["m"], "visible", [], "any", false, false, false, 113);
                echo ",itemsDesktop : [1000, ";
                echo twig_get_attribute($this->env, $this->source, $context["m"], "visible_1000", [], "any", false, false, false, 113);
                echo " ],itemsDesktopSmall : [900, ";
                echo twig_get_attribute($this->env, $this->source, $context["m"], "visible_900", [], "any", false, false, false, 113);
                echo " ],itemsTablet: [600, ";
                echo twig_get_attribute($this->env, $this->source, $context["m"], "visible_600", [], "any", false, false, false, 113);
                echo " ],itemsMobile : [479, ";
                echo twig_get_attribute($this->env, $this->source, $context["m"], "visible_479", [], "any", false, false, false, 113);
                echo " ],";
                if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_random_item", [], "any", false, false, false, 113) == 1)) {
                    echo "beforeInit : function(elem){random(elem);},";
                }
                echo " ";
                if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_nav", [], "any", false, false, false, 113) == 1)) {
                    echo " navigation: true,";
                }
                echo " ";
                if (twig_get_attribute($this->env, $this->source, $context["m"], "slide_speed", [], "any", false, false, false, 113)) {
                    echo " slideSpeed: ";
                    echo twig_get_attribute($this->env, $this->source, $context["m"], "slide_speed", [], "any", false, false, false, 113);
                    echo ",";
                }
                echo " ";
                if (twig_get_attribute($this->env, $this->source, $context["m"], "pagination_speed", [], "any", false, false, false, 113)) {
                    echo "paginationSpeed: ";
                    echo twig_get_attribute($this->env, $this->source, $context["m"], "pagination_speed", [], "any", false, false, false, 113);
                    echo ",";
                }
                echo " ";
                if (twig_get_attribute($this->env, $this->source, $context["m"], "autoscroll", [], "any", false, false, false, 113)) {
                    echo "autoPlay: ";
                    echo twig_get_attribute($this->env, $this->source, $context["m"], "autoscroll", [], "any", false, false, false, 113);
                    echo ",";
                }
                echo " ";
                if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_stop_on_hover", [], "any", false, false, false, 113) == 1)) {
                    echo " stopOnHover: true,";
                }
                echo " ";
                if (twig_get_attribute($this->env, $this->source, $context["m"], "rewind_speed", [], "any", false, false, false, 113)) {
                    echo "rewindSpeed: ";
                    echo twig_get_attribute($this->env, $this->source, $context["m"], "rewind_speed", [], "any", false, false, false, 113);
                    echo ",";
                }
                echo " ";
                if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_lazy_load", [], "any", false, false, false, 113) == 1)) {
                    echo " lazyLoad : true,";
                }
                if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_mouse_drag", [], "any", false, false, false, 113) == 0)) {
                    echo " mouseDrag: false,";
                }
                if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_touch_drag", [], "any", false, false, false, 113) == 1)) {
                    echo " touchDrag: true,";
                }
                if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_page", [], "any", false, false, false, 113) == 1)) {
                    echo " pagination: false,";
                }
                if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_per_page", [], "any", false, false, false, 113) == 1)) {
                    echo " scrollPerPage: true,";
                }
                if ((twig_get_attribute($this->env, $this->source, $context["m"], "item_prev_next", [], "any", false, false, false, 113) && (twig_get_attribute($this->env, $this->source, $context["m"], "show_per_page", [], "any", false, false, false, 113) == 0))) {
                    echo " slideItems: ";
                    echo twig_get_attribute($this->env, $this->source, $context["m"], "item_prev_next", [], "any", false, false, false, 113);
                    echo ",";
                }
                echo " navigationText: ['<i class=\"fa fa-chevron-left fa-5x\"></i>', '<i class=\"fa fa-chevron-right fa-5x\"></i>']});";
                if ((twig_length_filter($this->env, ($context["modules"] ?? null)) > 1)) {
                    echo "\$('#nav-owl-";
                    echo ($context["module"] ?? null);
                    echo " a:first').tab('show');\$('#nav-owl-";
                    echo ($context["module"] ?? null);
                    echo " a').click(function (e) {e.preventDefault();\$(this).tab('show');})";
                }
                echo " });</script>
        </div>
        ";
                // line 115
                $context["is_first_tab"] = false;
                // line 116
                echo "    ";
            }
            echo " 
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 117
        echo " 

";
        // line 119
        if ((twig_length_filter($this->env, ($context["modules"] ?? null)) > 1)) {
            // line 120
            echo "</div>
";
        }
        // line 122
        echo "<script type=\"text/javascript\">
    function getSubcat(module_id, subcat_id, redir, cats_ids){
        var cats_ids = explode('_', cats_ids);

        if(cats_ids == ''){
           cats_ids = [];
        }

        var subcat = [];
        subcat['m' + module_id] = cats_ids;
        subcat['m' + module_id] = new_arr(subcat['m' + module_id], subcat_id);
        if(subcat['m' + module_id].length > 0){
            var module_string = '&subcats' + module_id + '=' + implode('_', subcat['m' + module_id]);
            location = redir + module_string;
        }else{
            location = redir;
        }
        return false;
    }

    function implode( glue, pieces ) {
 
        return ( ( pieces instanceof Array ) ? pieces.join ( glue ) : pieces );
    }

    function explode( delimiter, string ) { 
 
        var emptyArray = { 0: '' };
 
        if ( arguments.length != 2
            || typeof arguments[0] == 'undefined'
            || typeof arguments[1] == 'undefined' )
        {
            return null;
        }
 
        if ( delimiter === ''
            || delimiter === false
            || delimiter === null )
        {
            return false;
        }
 
        if ( typeof delimiter == 'function'
            || typeof delimiter == 'object'
            || typeof string == 'function'
            || typeof string == 'object' )
        {
            return emptyArray;
        }
 
        if ( delimiter === true ) {
            delimiter = '1';
        }
 
        return string.toString().split ( delimiter.toString() );
    }

    function new_arr(arr, elem) {
        for (var i = 0; i < arr.length; i++) {
            if (arr[i] === elem) {
                arr.splice(i, 1);
                var j = true;
            }
        }
        if(!j){
            arr.push(elem);
        }
        return arr;
    }
</script>
";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/owlcarousel_p.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  534 => 122,  530 => 120,  528 => 119,  524 => 117,  515 => 116,  513 => 115,  433 => 113,  428 => 110,  418 => 106,  407 => 104,  403 => 103,  397 => 101,  389 => 99,  386 => 98,  384 => 97,  380 => 95,  377 => 94,  373 => 92,  365 => 90,  362 => 89,  357 => 87,  350 => 86,  344 => 84,  342 => 83,  336 => 81,  330 => 79,  328 => 78,  325 => 77,  321 => 76,  315 => 75,  311 => 73,  307 => 71,  304 => 70,  300 => 69,  294 => 67,  286 => 65,  284 => 64,  281 => 63,  259 => 60,  256 => 59,  252 => 57,  243 => 54,  238 => 53,  234 => 52,  229 => 51,  226 => 50,  222 => 48,  213 => 45,  208 => 44,  204 => 43,  199 => 42,  197 => 41,  194 => 40,  189 => 39,  187 => 38,  180 => 36,  174 => 35,  170 => 34,  165 => 33,  162 => 32,  156 => 31,  142 => 29,  128 => 27,  126 => 26,  119 => 25,  116 => 24,  111 => 22,  107 => 21,  102 => 20,  99 => 19,  97 => 18,  91 => 17,  87 => 15,  83 => 14,  81 => 13,  77 => 11,  72 => 9,  63 => 8,  61 => 7,  54 => 6,  51 => 5,  46 => 4,  44 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/owlcarousel_p.twig", "");
    }
}
