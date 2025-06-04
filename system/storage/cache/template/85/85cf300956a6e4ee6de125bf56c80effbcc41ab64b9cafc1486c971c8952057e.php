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

/* default/template/extension/module/owlcarousel.twig */
class __TwigTemplate_2c85265444469be4664a7250bc1a3be1685afa030bed0d78c70b56e7e6405fa9 extends \Twig\Template
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
                    echo "                <li><a href=\"#tab-owl-";
                    echo ($context["module"] ?? null);
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
            if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["m"], "products", [], "any", false, false, false, 18)) > 1)) {
                // line 19
                echo "        ";
                $context["is_first_tab"] = true;
                // line 20
                echo "        <section class=\"promotions\" id=\"tab-owl-";
                echo ($context["module"] ?? null);
                echo "\" style=\"margin-bottom: 30px;\">
        <div class=\"promotions__container main__swiper-container\">
        <div class=\"hero__title-row promotions__title-row\">
            ";
                // line 23
                if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_title", [], "any", false, false, false, 23) == 1)) {
                    echo " 
            <h3 class=\"promotions__title\">";
                    // line 24
                    echo twig_get_attribute($this->env, $this->source, $context["m"], "heading_title", [], "any", false, false, false, 24);
                    echo "</h3>
            ";
                    // line 25
                    if (($context["link"] ?? null)) {
                        // line 26
                        echo "            <a href=\"";
                        echo ($context["link"] ?? null);
                        echo "\" class=\"promotions__button\">";
                        echo ($context["text_show_all"] ?? null);
                        echo "</a>
            ";
                    }
                    // line 28
                    echo "            ";
                }
                // line 29
                echo "        </div>
        <div class=\"promotions__row\">
            <div class=\"swiper main__swiper-";
                // line 31
                echo ($context["module"] ?? null);
                echo "\">
              <div class=\"swiper-wrapper main__swiper-wrapper subcategory_products__wrapper\">
                    ";
                // line 33
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["m"], "products", [], "any", false, false, false, 33));
                foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                    echo " 
                        <div class=\"swiper-slide ";
                    // line 34
                    if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 34) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 34) < 1))) {
                        echo "out-of-stock";
                    }
                    echo "\">
                            <div class=\"product\">
                            <div class=\"product__wrapper\">
                      <div class=\"product__labels\">
                      ";
                    // line 38
                    if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 38))) {
                        // line 39
                        echo "                      ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 39));
                        foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                            // line 40
                            echo "                        <span class=\"product__labels-label\">";
                            echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 40);
                            echo "</span>
                      ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 42
                        echo "                      ";
                    }
                    // line 43
                    echo "                      ";
                    if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 43))) {
                        // line 44
                        echo "                      ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 44));
                        foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                            // line 45
                            echo "                        <span class=\"product__labels-label\">";
                            echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 45);
                            echo "</span>
                      ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 47
                        echo "                      ";
                    }
                    // line 48
                    echo "                      ";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "is_rotate", [], "any", false, false, false, 48)) {
                        // line 49
                        echo "                        <span class=\"product__labels-overwiev\">
                          <img src=\"catalog/view/theme/default/image//product/overview.png\" alt=\"360\" />
                        </span>
                       ";
                    }
                    // line 53
                    echo "                      </div>
                      <div class=\"product__like\">
                        <svg class=\"product__like-item product-like-";
                    // line 55
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 55);
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 55)) {
                        echo " product__like-active";
                    }
                    echo "\" viewBox=\"0 0 24 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" id=\"product-like-";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 55);
                    echo "\" ";
                    if ( !twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 55)) {
                        echo "onclick=\"wishlist.add(";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 55);
                        echo ")\"";
                    } else {
                        echo "onclick=\"wishlist.remove(";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 55);
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
                    // line 62
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 62);
                    echo "\">
                          <img class=\"product__image-item\" src=\"";
                    // line 63
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 63);
                    echo "\" alt=\"Product\" />
                        </a>
                      </div>
                      <div class=\"product__content-row\">
                        <div class=\"product__content\">
                          <h4 class=\"product__title\"><a href=\"";
                    // line 68
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 68);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 68);
                    echo "</a></h4>
                          <div class=\"product__rating\">
                            <div class=\"rating\">
                            ";
                    // line 71
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(range(1, 5));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 72
                        echo "                              ";
                        if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 72) < $context["i"])) {
                            // line 73
                            echo "                              <span class=\"rating-star\"></span>
                              ";
                        } else {
                            // line 75
                            echo "                              <span class=\"rating-star rating-filled\"></span>
                              ";
                        }
                        // line 77
                        echo "                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 78
                    echo "                            </div>
                            <span class=\"product__rating-total\">";
                    // line 79
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "reviews", [], "any", false, false, false, 79);
                    echo "</span>
                          </div>
                          <div class=\"product__price-row\">
                            ";
                    // line 82
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 82)) {
                        // line 83
                        echo "                            <p class=\"product__price\">
                              <span>";
                        // line 84
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 84);
                        echo "</span>
                            </p>
                            ";
                    } else {
                        // line 87
                        echo "                            <p class=\"product__price\">
                              ";
                        // line 88
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 88);
                        echo "
                            </p>
                            ";
                    }
                    // line 91
                    echo "                            ";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 91)) {
                        // line 92
                        echo "                            <p class=\"product__price-old\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 92);
                        echo "</p>
                            ";
                    }
                    // line 94
                    echo "                          </div>
                        </div>
                        <div class=\"product__badges\">
                        ";
                    // line 97
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "gifts", [], "any", false, false, false, 97)) {
                        // line 98
                        echo "                          <span class=\"product__badge-present\">";
                        echo ($context["text_gift"] ?? null);
                        echo "</span>
                        ";
                    }
                    // line 100
                    echo "                        ";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "is_new", [], "any", false, false, false, 100)) {
                        // line 101
                        echo "                          <span class=\"product__badge-new\">New</span>
                        ";
                    }
                    // line 103
                    echo "                        ";
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 103)) {
                        // line 104
                        echo "                          <span class=\"product__badge-discount\">-";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "percent", [], "any", false, false, false, 104);
                        echo "%</span>
                        ";
                    }
                    // line 106
                    echo "                        </div>
                      </div>
                      <div class=\"product__additional\">
                        <button class=\"product__additional-button\" onclick=\"call_cp('";
                    // line 109
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 109);
                    echo "','add');\">
                          <svg class=\"product__additional-icon\"><use href=\"catalog/view/theme/default/image/icons.svg#cartSmall\"></use></svg>
                          <p>";
                    // line 111
                    echo ($context["button_cart"] ?? null);
                    echo "</p>
                        </button>
                        <ul class=\"product__additional-attributes\">
                          ";
                    // line 114
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "attributes", [], "any", false, false, false, 114));
                    foreach ($context['_seq'] as $context["_key"] => $context["attr"]) {
                        // line 115
                        echo "                          <li class=\"product__additional-attribute\">
                            <span class=\"product__additional-attribute_parameter\">";
                        // line 116
                        echo twig_get_attribute($this->env, $this->source, $context["attr"], "name", [], "any", false, false, false, 116);
                        echo "</span>
                            <span class=\"product__additional-attribute_value\">";
                        // line 117
                        echo twig_get_attribute($this->env, $this->source, $context["attr"], "text", [], "any", false, false, false, 117);
                        echo "</span>
                          </li>
                          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attr'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 120
                    echo "                        </ul>
                      </div>
                    </div>
                            </div>
                        </div>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 125
                echo " 
                </div>
            </div>
            <script type=\"text/javascript\">\$(document).ready(function() {function random(owlSelector){owlSelector.children().sort(function(){return Math.round(Math.random()) - 0.5;}).each(function(){\$(this).appendTo(owlSelector);});}var owl = \$(\"#owl-";
                // line 128
                echo twig_get_attribute($this->env, $this->source, $context["m"], "module", [], "any", false, false, false, 128);
                echo "\");owl.owlCarousel({items : ";
                echo twig_get_attribute($this->env, $this->source, $context["m"], "visible", [], "any", false, false, false, 128);
                echo ",itemsDesktop : [1000, ";
                echo twig_get_attribute($this->env, $this->source, $context["m"], "visible_1000", [], "any", false, false, false, 128);
                echo " ],itemsDesktopSmall : [900, ";
                echo twig_get_attribute($this->env, $this->source, $context["m"], "visible_900", [], "any", false, false, false, 128);
                echo " ],itemsTablet: [600, ";
                echo twig_get_attribute($this->env, $this->source, $context["m"], "visible_600", [], "any", false, false, false, 128);
                echo " ],itemsMobile : [479, ";
                echo twig_get_attribute($this->env, $this->source, $context["m"], "visible_479", [], "any", false, false, false, 128);
                echo " ],";
                if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_random_item", [], "any", false, false, false, 128) == 1)) {
                    echo "beforeInit : function(elem){random(elem);},";
                }
                echo " ";
                if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_nav", [], "any", false, false, false, 128) == 1)) {
                    echo " navigation: true,";
                }
                echo " ";
                if (twig_get_attribute($this->env, $this->source, $context["m"], "slide_speed", [], "any", false, false, false, 128)) {
                    echo " slideSpeed: ";
                    echo twig_get_attribute($this->env, $this->source, $context["m"], "slide_speed", [], "any", false, false, false, 128);
                    echo ",";
                }
                echo " ";
                if (twig_get_attribute($this->env, $this->source, $context["m"], "pagination_speed", [], "any", false, false, false, 128)) {
                    echo "paginationSpeed: ";
                    echo twig_get_attribute($this->env, $this->source, $context["m"], "pagination_speed", [], "any", false, false, false, 128);
                    echo ",";
                }
                echo " ";
                if (twig_get_attribute($this->env, $this->source, $context["m"], "autoscroll", [], "any", false, false, false, 128)) {
                    echo "autoPlay: ";
                    echo twig_get_attribute($this->env, $this->source, $context["m"], "autoscroll", [], "any", false, false, false, 128);
                    echo ",";
                }
                echo " ";
                if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_stop_on_hover", [], "any", false, false, false, 128) == 1)) {
                    echo " stopOnHover: true,";
                }
                echo " ";
                if (twig_get_attribute($this->env, $this->source, $context["m"], "rewind_speed", [], "any", false, false, false, 128)) {
                    echo "rewindSpeed: ";
                    echo twig_get_attribute($this->env, $this->source, $context["m"], "rewind_speed", [], "any", false, false, false, 128);
                    echo ",";
                }
                echo " ";
                if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_lazy_load", [], "any", false, false, false, 128) == 1)) {
                    echo " lazyLoad : true,";
                }
                if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_mouse_drag", [], "any", false, false, false, 128) == 0)) {
                    echo " mouseDrag: false,";
                }
                if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_touch_drag", [], "any", false, false, false, 128) == 1)) {
                    echo " touchDrag: true,";
                }
                if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_page", [], "any", false, false, false, 128) == 1)) {
                    echo " pagination: false,";
                }
                if ((twig_get_attribute($this->env, $this->source, $context["m"], "show_per_page", [], "any", false, false, false, 128) == 1)) {
                    echo " scrollPerPage: true,";
                }
                if ((twig_get_attribute($this->env, $this->source, $context["m"], "item_prev_next", [], "any", false, false, false, 128) && (twig_get_attribute($this->env, $this->source, $context["m"], "show_per_page", [], "any", false, false, false, 128) == 0))) {
                    echo " slideItems: ";
                    echo twig_get_attribute($this->env, $this->source, $context["m"], "item_prev_next", [], "any", false, false, false, 128);
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
                echo " });
        </script>    
        </div>  
        <div class=\"swiper-button-prev main__swiper-button-prev main__swiper-button-prev-";
                // line 131
                echo ($context["module"] ?? null);
                echo "\"></div>
        <div class=\"swiper-button-next main__swiper-button-next main__swiper-button-next-";
                // line 132
                echo ($context["module"] ?? null);
                echo "\"></div>  
        </div>    
        </section>
        ";
                // line 135
                $context["is_first_tab"] = false;
                // line 136
                echo "    ";
            }
            echo " 
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['m'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 137
        echo " 

";
        // line 139
        if ((twig_length_filter($this->env, ($context["modules"] ?? null)) > 1)) {
            // line 140
            echo "</div>
";
        }
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/owlcarousel.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  499 => 140,  497 => 139,  493 => 137,  484 => 136,  482 => 135,  476 => 132,  472 => 131,  391 => 128,  386 => 125,  375 => 120,  366 => 117,  362 => 116,  359 => 115,  355 => 114,  349 => 111,  344 => 109,  339 => 106,  333 => 104,  330 => 103,  326 => 101,  323 => 100,  317 => 98,  315 => 97,  310 => 94,  304 => 92,  301 => 91,  295 => 88,  292 => 87,  286 => 84,  283 => 83,  281 => 82,  275 => 79,  272 => 78,  266 => 77,  262 => 75,  258 => 73,  255 => 72,  251 => 71,  243 => 68,  235 => 63,  231 => 62,  206 => 55,  202 => 53,  196 => 49,  193 => 48,  190 => 47,  181 => 45,  176 => 44,  173 => 43,  170 => 42,  161 => 40,  156 => 39,  154 => 38,  145 => 34,  139 => 33,  134 => 31,  130 => 29,  127 => 28,  119 => 26,  117 => 25,  113 => 24,  109 => 23,  102 => 20,  99 => 19,  97 => 18,  91 => 17,  87 => 15,  83 => 14,  81 => 13,  77 => 11,  72 => 9,  63 => 8,  61 => 7,  54 => 6,  51 => 5,  46 => 4,  44 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/owlcarousel.twig", "");
    }
}
