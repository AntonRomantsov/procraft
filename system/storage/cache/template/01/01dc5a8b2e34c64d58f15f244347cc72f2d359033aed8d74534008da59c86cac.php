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

/* default/template/product/product.twig */
class __TwigTemplate_dd3ae0dc66b6fb7357055832bed8c2d2e6ba58c480341903bd02a4c220aafbc3 extends \Twig\Template
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
<main>
\t<section class=\"section__underlined\">
\t  <div class=\"breadcrumbs__container\">
\t\t<ul class=\"breadcrumbs\">
\t\t";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 7
            echo "        <li class=\"breadcrumbs__item\">
          <a class=\"breadcrumbs__link\" href=\"";
            // line 8
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 8);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 8);
            echo "</a>
        </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        echo "\t\t</ul>
\t  </div>
\t</section>

\t<section class=\"section__regular tab\">
\t  <div class=\"tab__container\">
\t\t<div class=\"tab__header\">
\t\t  <button class=\"tab__button active\" data-tab=\"tab1\">";
        // line 18
        echo ($context["tab_description"] ?? null);
        echo "</button>
\t\t  <button class=\"tab__button\" data-tab=\"tab2\">";
        // line 19
        echo ($context["tab_attribute"] ?? null);
        echo "</button>
\t\t  <button class=\"tab__button\" data-tab=\"tab3\">";
        // line 20
        echo ($context["tab_review"] ?? null);
        echo "</button>
\t\t  <button class=\"tab__button\" data-tab=\"tab4\">";
        // line 21
        echo ($context["tab_video"] ?? null);
        echo "</button>
\t\t</div>
\t\t<div class=\"tab__wrapper tab_1__wrapper active\" id=\"tab1\">
\t\t  <div class=\"tab__block tab_1__block\">
\t\t\t<div class=\"tab__content\">
\t\t\t  <div class=\"product_overview\">
\t\t\t\t<div class=\"product_overview__image_list\">
\t\t\t\t";
        // line 28
        if ((($context["images"] ?? null) || ($context["kit_part"] ?? null))) {
            // line 29
            echo "\t               <a class=\"thumbnail\" href=\"";
            echo ($context["popup"] ?? null);
            echo "\" data-fancybox=\"images\" data-caption=\"";
            echo ($context["heading_title"] ?? null);
            echo "\" data-thumbnail=\"";
            echo ($context["thumb"] ?? null);
            echo "\" title=\"";
            echo ($context["heading_title"] ?? null);
            echo "\"><img src=\"";
            echo ($context["popup"] ?? null);
            echo "\" class=\"product_overview__item product_overview__item--active\" /></a>
\t\t\t\t  ";
            // line 30
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["first_images"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["image2"]) {
                // line 31
                echo "\t\t\t\t  ";
                if ((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $context["image2"]) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["video_url"] ?? null) : null)) {
                    // line 32
                    echo "\t\t\t\t  <a class=\"thumbnail thumbnail_video\" style=\"position: relative;\" href=\"";
                    echo (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = $context["image2"]) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["video_url"] ?? null) : null);
                    echo "\" data-type=\"iframe\" data-fancybox=\"images\" data-caption=\"";
                    echo ($context["heading_title"] ?? null);
                    echo "\" title=\"";
                    echo ($context["heading_title"] ?? null);
                    echo "\"><div class=\"product_overview__item\"><div class=\"play_button\" bis_skin_checked=\"1\"></div></div></a>
\t\t\t\t  ";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 33
$context["image2"], "sort_order", [], "any", false, false, false, 33) > 1000)) {
                    // line 34
                    echo "\t\t\t\t  <a class=\"thumbnail rotate-cover mfp-iframe\" href=\"#\" data-type=\"iframe\" data-fancybox=\"images\" data-caption=\"";
                    echo ($context["heading_title"] ?? null);
                    echo "\" data-rotate=\"/";
                    echo ($context["model2"] ?? null);
                    echo ".html\" data-thumbnail=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["image2"], "thumb", [], "any", false, false, false, 34);
                    echo "\" title=\"";
                    echo ($context["heading_title"] ?? null);
                    echo "\"><img class=\"product_overview__item\" src=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["image2"], "thumb", [], "any", false, false, false, 34);
                    echo "\" alt=\"360\" /></a>
\t\t\t\t  ";
                } else {
                    // line 36
                    echo "\t\t\t\t  <a class=\"thumbnail\" href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["image2"], "popup", [], "any", false, false, false, 36);
                    echo "\" data-fancybox=\"images\" data-caption=\"";
                    echo ($context["heading_title"] ?? null);
                    echo "\" data-thumbnail=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["image2"], "thumb", [], "any", false, false, false, 36);
                    echo "\" title=\"";
                    echo ($context["heading_title"] ?? null);
                    echo "\"><img src=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["image2"], "thumb", [], "any", false, false, false, 36);
                    echo "\" alt=\"";
                    echo ($context["heading_title"] ?? null);
                    echo "\" class=\"product_overview__item\" /></a>
\t\t\t\t  ";
                }
                // line 38
                echo "\t\t\t\t  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image2'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 39
            echo "\t\t\t\t<div id=\"hidden-images\">
\t\t\t\t";
            // line 40
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["last_images"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["image2"]) {
                // line 41
                echo "\t\t\t\t";
                if ((($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = $context["image2"]) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["video_url"] ?? null) : null)) {
                    // line 42
                    echo "\t\t\t\t<div class=\"product_overview__item\"><div class=\"play_button\" bis_skin_checked=\"1\"></div></div>
\t\t\t\t";
                } elseif ((twig_get_attribute($this->env, $this->source,                 // line 43
$context["image2"], "sort_order", [], "any", false, false, false, 43) > 1000)) {
                    // line 44
                    echo "\t\t\t\t<img class=\"product_overview__item\" src=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["image2"], "thumb", [], "any", false, false, false, 44);
                    echo "\" alt=\"360\" />
\t\t\t\t";
                } else {
                    // line 46
                    echo "\t\t\t\t<img src=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["image2"], "thumb", [], "any", false, false, false, 46);
                    echo "\" alt=\"";
                    echo ($context["heading_title"] ?? null);
                    echo "\" class=\"product_overview__item\" />
\t\t\t\t";
                }
                // line 48
                echo "\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image2'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 49
            echo "\t\t\t    </div>
\t\t\t\t";
        }
        // line 51
        echo "\t\t\t\t</div>
\t\t\t\t<div class=\"product_overview__buttons\">
\t\t\t\t  <span class=\"product_overview__quantity\">+";
        // line 53
        echo ($context["count_last_images"] ?? null);
        echo "</span>
\t\t\t\t  <span class=\"product_overview__arrow\"></span>
\t\t\t\t</div>
\t\t\t\t<div class=\"product_overview__image--main\">
\t\t\t    <a class=\"thumbnail\" href=\"";
        // line 57
        echo ($context["popup"] ?? null);
        echo "\" data-fancybox=\"images\" data-caption=\"";
        echo ($context["heading_title"] ?? null);
        echo "\" data-thumbnail=\"";
        echo ($context["thumb"] ?? null);
        echo "\" title=\"";
        echo ($context["heading_title"] ?? null);
        echo "\"><img src=\"";
        echo ($context["popup"] ?? null);
        echo "\" alt=\"Product\" class=\"product_overview__image\" /></a>
\t\t\t\t  <div class=\"product__labels\">
\t\t\t\t  ";
        // line 59
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "product_xdstickers", [], "any", false, false, false, 59))) {
            // line 60
            echo "\t\t\t\t  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "product_xdstickers", [], "any", false, false, false, 60));
            foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                // line 61
                echo "\t\t\t\t\t<span class=\"product__labels-label\">";
                echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 61);
                echo "</span>
\t\t\t\t  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 63
            echo "\t\t\t\t  ";
        }
        // line 64
        echo "\t\t\t\t  ";
        if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "product_xdstickers_custom", [], "any", false, false, false, 64))) {
            // line 65
            echo "\t\t\t\t  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "product_xdstickers_custom", [], "any", false, false, false, 65));
            foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                // line 66
                echo "\t\t\t\t\t<span class=\"product__labels-label\">";
                echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 66);
                echo "</span>
\t\t\t\t  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 68
            echo "\t\t\t\t  ";
        }
        // line 69
        echo "\t\t\t\t  </div>
\t\t\t\t</div>
\t\t\t\t<div class=\"product_overview__pagination\">
\t\t\t\t  ";
        // line 72
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["images"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["image2"]) {
            // line 73
            echo "\t\t\t\t  <span class=\"product_overview__pagination_item ";
            if (($context["key"] == 0)) {
                echo "product_overview__pagination_item--active";
            }
            echo "\" id=\"pic-";
            echo $context["key"];
            echo "\" data-image=\"";
            echo twig_get_attribute($this->env, $this->source, $context["image2"], "popup", [], "any", false, false, false, 73);
            echo "\" onclick=\"setImage(";
            echo $context["key"];
            echo ")\"></span>
\t\t\t\t ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['image2'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 75
        echo "\t\t\t\t</div>
\t\t\t  </div>
\t\t\t  <div class=\"tab_1__parameters\">
\t\t\t\t<h2 class=\"tab_1__parameters_title\">";
        // line 78
        echo ($context["text_main_attrs"] ?? null);
        echo "</h2>
\t\t\t\t<div class=\"product-parameters\">
\t\t\t\t  <ul class=\"parameters__wrapper\">
\t\t\t\t  ";
        // line 81
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["main_attributes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["attr"]) {
            // line 82
            echo "\t\t\t\t\t<li class=\"parameters__item\">
\t\t\t\t\t  <p class=\"parameters__label\">";
            // line 83
            echo twig_get_attribute($this->env, $this->source, $context["attr"], "name", [], "any", false, false, false, 83);
            echo "</p>
\t\t\t\t\t  <p class=\"parameters__value\">";
            // line 84
            echo twig_get_attribute($this->env, $this->source, $context["attr"], "text", [], "any", false, false, false, 84);
            echo "</p>
\t\t\t\t\t</li>
\t\t\t\t  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 87
        echo "\t\t\t\t  </ul>
\t\t\t\t  <ul class=\"parameters__wrapper\" id=\"hidden-attrs\">
\t\t\t\t  ";
        // line 89
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["another_attributes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["attr"]) {
            // line 90
            echo "\t\t\t\t\t<li class=\"parameters__item\">
\t\t\t\t\t  <p class=\"parameters__label\">";
            // line 91
            echo twig_get_attribute($this->env, $this->source, $context["attr"], "name", [], "any", false, false, false, 91);
            echo "</p>
\t\t\t\t\t  <p class=\"parameters__value\">";
            // line 92
            echo twig_get_attribute($this->env, $this->source, $context["attr"], "text", [], "any", false, false, false, 92);
            echo "</p>
\t\t\t\t\t</li>
\t\t\t\t  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 95
        echo "\t\t\t\t  </ul>
\t\t\t\t</div>
\t\t\t  </div>
\t\t\t</div>
\t\t  </div>

\t\t  <aside class=\"tab_1__aside\">
\t\t\t<div class=\"tab_1__aside_header\">
\t\t\t  <div class=\"product__badges product__badges_page--state\" bis_skin_checked=\"1\">
\t\t\t    ";
        // line 104
        if ((($context["stock_pos"] ?? null) == false)) {
            echo "<span class=\"product__badge-stock\">";
            echo ($context["text_instock"] ?? null);
            echo "</span>";
        }
        // line 105
        echo "\t\t\t\t<span class=\"product__badge-deco\"></span>
\t\t\t    ";
        // line 106
        if (($context["gifts"] ?? null)) {
            echo "<span class=\"product__badge-present\">";
            echo ($context["text_gift"] ?? null);
            echo "</span>";
        }
        // line 107
        echo "\t\t\t    ";
        if (($context["is_new"] ?? null)) {
            echo "<span class=\"product__badge-new\">new</span>";
        }
        // line 108
        echo "\t\t\t    ";
        if (($context["special"] ?? null)) {
            echo "<span class=\"product__badge-discount\">-";
            echo ($context["percent"] ?? null);
            echo "%</span>";
        }
        // line 109
        echo "\t\t\t  </div>
\t\t\t  <div class=\"tab_1__aside_article\">
\t\t\t\t<p>
\t\t\t\t  ";
        // line 112
        echo ($context["text_model"] ?? null);
        echo "
\t\t\t\t  <span>";
        // line 113
        echo ($context["model"] ?? null);
        echo "</span>
\t\t\t\t</p>
\t\t\t  </div>
\t\t\t</div>

\t\t\t<h2 class=\"tab_1__name\">
\t\t\t  <a href=\"#\">";
        // line 119
        echo ($context["heading_title"] ?? null);
        echo "</a>
\t\t\t</h2>
\t\t\t<div class=\"product__rating product__rating--sigle_mod\">
\t\t\t  <div class=\"rating\">
\t\t\t    ";
        // line 123
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 124
            echo "\t\t\t\t";
            if ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "rating", [], "any", false, false, false, 124) >= $context["i"])) {
                // line 125
                echo "\t\t\t\t<span class=\"rating-star rating-filled\"></span>
\t\t\t\t";
            } else {
                // line 127
                echo "\t\t\t\t<span class=\"rating-star\"></span>
\t\t\t    ";
            }
            // line 129
            echo "\t\t        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 130
        echo "\t\t\t  </div>
\t\t\t  <span class=\"product__rating-total\">";
        // line 131
        echo ($context["tab_review"] ?? null);
        echo "</span>
\t\t\t</div>

\t\t\t<div class=\"product_secondary product_secondary--single_mod\">
\t\t\t  <div class=\"product_secondary__wrapper\">
\t\t\t\t<div class=\"product_secondary__main\">
\t\t\t\t  <div class=\"product_secondary__content\">
\t\t\t\t\t<div class=\"product__price-row\">
\t\t\t\t\t  <p class=\"product__price\">
\t\t\t\t\t    ";
        // line 140
        if (($context["special"] ?? null)) {
            echo "  
\t\t\t\t\t\t<span>";
            // line 141
            echo ($context["special"] ?? null);
            echo "</span>
\t\t\t\t\t\t";
        } else {
            // line 143
            echo "\t\t\t\t\t    ";
            echo ($context["price"] ?? null);
            echo "
\t\t\t\t\t\t";
        }
        // line 145
        echo "\t\t\t\t\t  </p>
\t\t\t\t\t  ";
        // line 146
        if (($context["special"] ?? null)) {
            echo "  
\t\t\t\t\t  <p class=\"product__price-old\">";
            // line 147
            echo ($context["price"] ?? null);
            echo "</p>
\t\t\t\t\t  ";
        }
        // line 149
        echo "\t\t\t\t\t</div>
\t\t\t\t  </div>
\t\t\t\t</div>
\t\t\t\t<div class=\"product_secondary__buttons\">
\t\t\t\t  <button class=\"button\" onclick=\"cart.add('";
        // line 153
        echo ($context["product_id"] ?? null);
        echo "');\">
\t\t\t\t\t<p>";
        // line 154
        echo ($context["button_cart"] ?? null);
        echo "</p>
\t\t\t\t  </button>

\t\t\t\t  <button type=\"button\" class=\"button button_icon product_secondary__button_big\">
\t\t\t\t\t<span class=\"button_icon__icon product_secondary__button_big_icon\"></span>
\t\t\t\t\t";
        // line 159
        echo ($context["text_pay_part"] ?? null);
        echo "
\t\t\t\t  </button>

\t\t\t\t  <a class=\"button button_gray product_secondary__button_gray\" ";
        // line 162
        if ( !($context["wl_class"] ?? null)) {
            echo "onclick=\"wishlist.add(";
            echo ($context["product_id"] ?? null);
            echo ", '', '";
            echo ($context["to_wishlist"] ?? null);
            echo "', '";
            echo ($context["from_wishlist"] ?? null);
            echo "')\"";
        } else {
            echo "onclick=\"wishlist.remove(";
            echo ($context["product_id"] ?? null);
            echo ", '', '";
            echo ($context["from_wishlist"] ?? null);
            echo "', '";
            echo ($context["to_wishlist"] ?? null);
            echo "')\"";
        }
        echo ">
\t\t\t\t\t<svg class=\"product_secondary__button_gray_icon product-like-";
        // line 163
        echo ($context["product_id"] ?? null);
        echo " ";
        if (($context["wl_class"] ?? null)) {
            echo "product__like-active";
        }
        echo "\" viewBox=\"0 0 24 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t\t  <path
\t\t\t\t\t\td=\"M11.9626 19.5381L2.10281 9.80024C1.07574 8.78576 0.5 7.41137 0.5 5.97966C0.5 4.548 1.07574 3.17365 2.10281 2.15928C3.13034 1.1449 4.52508 0.573975 5.98067 0.573975C7.43626 0.573975 8.83108 1.1449 9.85873 2.15928L11.9626 4.23506L14.0665 2.15928C15.094 1.1449 16.4888 0.573975 17.9444 0.573975C19.4 0.573975 20.7948 1.1449 21.8224 2.15928C22.8499 3.17365 23.4287 4.548 23.4287 5.97966C23.4287 7.41137 22.8499 8.78576 21.8224 9.80024L11.9626 19.5381Z\"
\t\t\t\t\t  />
\t\t\t\t\t</svg>
\t\t\t\t\t";
        // line 168
        if ( !($context["wl_class"] ?? null)) {
            // line 169
            echo "\t\t\t\t        <p class=\"in_wishlist\">";
            echo ($context["text_wl"] ?? null);
            echo "</p>
\t\t\t\t\t\t";
        } else {
            // line 171
            echo "\t\t\t\t\t\t<p class=\"in_wishlist\">";
            echo ($context["text_from_wl"] ?? null);
            echo "</p>
\t\t\t\t\t\t";
        }
        // line 173
        echo "\t\t\t\t  </a>
\t\t\t\t</div>
\t\t\t  </div>
\t\t\t</div>

\t\t\t<div class=\"tab_1__aside_info\">
\t\t\t  <div class=\"info__block\">
\t\t\t\t<div class=\"tab_1__parameters tab_1__parameters--mob_mod\">
\t\t\t    <h2 class=\"tab_1__parameters_title\">";
        // line 181
        echo ($context["text_main_attrs"] ?? null);
        echo "</h2>
\t\t\t    <div class=\"product-parameters\">
\t\t\t      <ul class=\"parameters__wrapper\">
\t\t\t      ";
        // line 184
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["main_attributes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["attr"]) {
            // line 185
            echo "\t\t\t\t    <li class=\"parameters__item\">
\t\t\t\t      <p class=\"parameters__label\">";
            // line 186
            echo twig_get_attribute($this->env, $this->source, $context["attr"], "name", [], "any", false, false, false, 186);
            echo "</p>
\t\t\t\t      <p class=\"parameters__value\">";
            // line 187
            echo twig_get_attribute($this->env, $this->source, $context["attr"], "text", [], "any", false, false, false, 187);
            echo "</p>
\t\t\t\t    </li>
\t\t\t      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 190
        echo "\t\t\t      </ul>
\t\t\t      <ul class=\"parameters__wrapper\" id=\"hidden-attrs\">
\t\t\t      ";
        // line 192
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["another_attributes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["attr"]) {
            // line 193
            echo "\t\t\t\t    <li class=\"parameters__item\">
\t\t\t\t      <p class=\"parameters__label\">";
            // line 194
            echo twig_get_attribute($this->env, $this->source, $context["attr"], "name", [], "any", false, false, false, 194);
            echo "</p>
\t\t\t\t      <p class=\"parameters__value\">";
            // line 195
            echo twig_get_attribute($this->env, $this->source, $context["attr"], "text", [], "any", false, false, false, 195);
            echo "</p>
\t\t\t\t    </li>
\t\t\t      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 198
        echo "\t\t\t      </ul>
\t\t\t\t  <ul class=\"parameters__wrapper\" id=\"hidden-attrs2\">
\t\t\t\t  ";
        // line 200
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["another_attributes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["attr"]) {
            // line 201
            echo "\t\t\t\t\t<li class=\"parameters__item\">
\t\t\t\t\t  <p class=\"parameters__label\">";
            // line 202
            echo twig_get_attribute($this->env, $this->source, $context["attr"], "name", [], "any", false, false, false, 202);
            echo "</p>
\t\t\t\t\t  <p class=\"parameters__value\">";
            // line 203
            echo twig_get_attribute($this->env, $this->source, $context["attr"], "text", [], "any", false, false, false, 203);
            echo "</p>
\t\t\t\t\t</li>
\t\t\t\t  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 206
        echo "\t\t\t\t  </ul>
\t\t\t    </div>
\t\t\t\t</div>
\t\t\t\t<div class=\"info\">
\t\t\t\t  <div class=\"info__item\">
\t\t\t\t\t<ul class=\"info__list\">
\t\t\t\t\t  <li class=\"info__list_title\">Оплата</li>
\t\t\t\t\t  <li class=\"info__list_item info__list_item--pay\">";
        // line 213
        echo ($context["text_buy_1"] ?? null);
        echo "</li>
\t\t\t\t\t  <li class=\"info__list_item info__list_item--pay\">";
        // line 214
        echo ($context["text_buy_2"] ?? null);
        echo "</li>
\t\t\t\t\t  <li class=\"info__list_item info__list_item--pay\">";
        // line 215
        echo ($context["text_buy_3"] ?? null);
        echo "</li>
\t\t\t\t\t  <li class=\"info__list_item info__list_item--pay\">";
        // line 216
        echo ($context["text_buy_4"] ?? null);
        echo "</li>
\t\t\t\t\t  <div class=\"info__list_pay_row\">
\t\t\t\t\t\t<img src=\"image/info/icon_01.svg\" alt=\"\" />
\t\t\t\t\t\t<img src=\"image/info/icon_02.svg\" alt=\"\" />
\t\t\t\t\t\t<img src=\"image/info/icon_03.svg\" alt=\"\" />
\t\t\t\t\t\t<img src=\"image/info/icon_04.svg\" alt=\"\" />
\t\t\t\t\t\t<img src=\"image/info/icon_05.svg\" alt=\"\" />
\t\t\t\t\t  </div>
\t\t\t\t\t</ul>
\t\t\t\t  </div>
\t\t\t\t  <div class=\"info__item\">
\t\t\t\t\t<ul class=\"info__list\">
\t\t\t\t\t  <li class=\"info__list_title info__list_title--delivery\">";
        // line 228
        echo ($context["title_delivery"] ?? null);
        echo "</li>
\t\t\t\t\t  <li class=\"info__list_item info__list_item--delivery\">
\t\t\t\t\t\t";
        // line 230
        echo ($context["text_delivery_1"] ?? null);
        echo "
\t\t\t\t\t  </li>
\t\t\t\t\t<li class=\"info__list_item info__list_item--delivery\">";
        // line 232
        echo ($context["text_delivery_2"] ?? null);
        echo "</li>
\t\t\t\t\t</ul>
\t\t\t\t  </div>
\t\t\t\t</div>
\t\t\t\t<div class=\"info\">
\t\t\t\t  <div class=\"info__item\">
\t\t\t\t\t<ul class=\"info__list\">
\t\t\t\t\t  <li class=\"info__list_item info__list_item--guarantee\">
\t\t\t\t\t\t<strong>";
        // line 240
        echo ($context["title_garanty"] ?? null);
        echo "</strong>
\t\t\t\t\t\t";
        // line 241
        echo ($context["garanties"] ?? null);
        echo "
\t\t\t\t\t  </li>
\t\t\t\t\t</ul>
\t\t\t\t  </div>
\t\t\t\t</div>
\t\t\t  </div>
\t\t\t</div>
            
\t\t\t";
        // line 249
        if (($context["product_gifts"] ?? null)) {
            // line 250
            echo "\t\t\t<div class=\"tab_1__present\">
\t\t\t  <div class=\"tab_1__present_title\">
\t\t\t\t<h3>
\t\t\t\t  ";
            // line 253
            echo ($context["text_gift"] ?? null);
            echo "
\t\t\t\t  <span>×";
            // line 254
            echo ($context["count_gifts"] ?? null);
            echo "</span>
\t\t\t\t</h3>
\t\t\t  </div>
\t\t\t  <div class=\"tab_1__present_wrapper\">
\t\t\t  ";
            // line 258
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["product_gifts"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["gift"]) {
                // line 259
                echo "\t\t\t\t<div class=\"product_present\">
\t\t\t\t  <span class=\"product_present__number\">";
                // line 260
                echo twig_get_attribute($this->env, $this->source, $context["gift"], "i", [], "any", false, false, false, 260);
                echo "</span>
\t\t\t\t  <div class=\"product_present__image_wraper\">
\t\t\t\t\t<img class=\"product_present__image\" src=\"";
                // line 262
                echo twig_get_attribute($this->env, $this->source, $context["gift"], "thumb", [], "any", false, false, false, 262);
                echo "\" alt=\"Present image\" />
\t\t\t\t  </div>
\t\t\t\t  <div class=\"product_present__content\">
\t\t\t\t\t<h4 class=\"product_present__title\">";
                // line 265
                echo twig_get_attribute($this->env, $this->source, $context["gift"], "name", [], "any", false, false, false, 265);
                echo "</h4>
\t\t\t\t\t<div class=\"product_present__options\">
\t\t\t\t\t  <span class=\"product_present__price\">";
                // line 267
                echo twig_get_attribute($this->env, $this->source, $context["gift"], "last_price", [], "any", false, false, false, 267);
                echo "</span>
\t\t\t\t\t</div>
\t\t\t\t  </div>
\t\t\t\t</div>
\t\t\t  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['gift'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 272
            echo "\t\t\t  </div>
\t\t\t</div>
\t\t    ";
        }
        // line 275
        echo "\t\t  </aside>
\t\t</div>
\t\t<div class=\"tab__wrapper\" id=\"tab2\">
            <div class=\"tab__block\">
              <div class=\"tab__content\">
                <div class=\"tab_2__body\">
                  <h2 class=\"tab_2__title\">";
        // line 281
        echo ($context["tab_attribute"] ?? null);
        echo "</h2>
                  <div class=\"tab_in__header\">
                    <button class=\"tab_in__button active\" data-tab=\"tabIn1\">";
        // line 283
        echo ($context["text_tech_attrs"] ?? null);
        echo "</button>
                    <button class=\"tab_in__button\" data-tab=\"tabIn2\">";
        // line 284
        echo ($context["tab_attribute_parts"] ?? null);
        echo "</button>
                  </div>
                  <div class=\"tab_in__content\" id=\"tabIn1\">
                    <div class=\"parameters\"  id=\"tabAttr1\">
                      <ul class=\"parameters__wrapper\">
\t\t\t\t\t    ";
        // line 289
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["attributes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["attr"]) {
            // line 290
            echo "\t\t\t\t\t    <li class=\"parameters__item\">
\t\t\t\t\t\t  <p class=\"parameters__label\">";
            // line 291
            echo twig_get_attribute($this->env, $this->source, $context["attr"], "name", [], "any", false, false, false, 291);
            echo "</p>
\t\t\t\t\t\t  <p class=\"parameters__value\">";
            // line 292
            echo twig_get_attribute($this->env, $this->source, $context["attr"], "text", [], "any", false, false, false, 292);
            echo "</p>
\t\t\t\t\t    </li>
\t\t\t\t\t    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 295
        echo "                      </ul>
                    </div>
                    <div class=\"load tab_2__load--mob\" id=\"instruction-1\">
                      <h2 class=\"h2 load__title\">";
        // line 298
        echo ($context["text_tool_user_instruction"] ?? null);
        echo "</h2>
                      <ul class=\"load__list\">
\t\t\t\t\t    ";
        // line 300
        if (($context["draw"] ?? null)) {
            // line 301
            echo "                        <li class=\"load__item\">
                          <svg width=\"18\" height=\"20\" viewBox=\"0 0 18 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                            <path
                              d=\"M0.9985 0C0.44749 0 0 0.44405 0 0.9918V19.0082C0 19.5447 0.44476 20 0.9934 20H17.0066C17.5551 20 18 19.5489 18 18.9925L17.9997 5L13 0H0.9985ZM7.5 5.5H9.5C9.5 7.98994 11.6436 10.6604 14.3162 11.5513L13.8586 13.49C10.7234 13.0421 7.4821 14.3804 4.5547 16.3321L3.3753 14.7191C4.46149 13.8502 5.50293 12.3757 6.27499 10.6534C7.0443 8.9373 7.5 7.07749 7.5 5.5ZM8.1 11.4716C8.3673 10.8752 8.6043 10.2563 8.8037 9.6285C9.2754 10.3531 9.8553 11.0182 10.5102 11.5953C9.5284 11.7711 8.5666 12.0596 7.6353 12.4276C7.8 12.1143 7.9551 11.7948 8.1 11.4716Z\"
                              fill=\"#101010\"
                            />
                          </svg>
                          <a href=\"";
            // line 308
            echo ($context["draw"] ?? null);
            echo "\" class=\"load__link\" target=\"_blank\">";
            echo ($context["text_draw"] ?? null);
            echo "</a>
                        </li>
\t\t\t\t\t    ";
        }
        // line 311
        echo "                        ";
        if (($context["instruction"] ?? null)) {
            // line 312
            echo "\t\t\t\t            <li class=\"load__item\">
\t\t\t\t                <svg width=\"18\" height=\"20\" viewBox=\"0 0 18 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t\t            <path
\t\t\t\t\t            d=\"M0.9985 0C0.44749 0 0 0.44405 0 0.9918V19.0082C0 19.5447 0.44476 20 0.9934 20H17.0066C17.5551 20 18 19.5489 18 18.9925L17.9997 5L13 0H0.9985ZM7.5 5.5H9.5C9.5 7.98994 11.6436 10.6604 14.3162 11.5513L13.8586 13.49C10.7234 13.0421 7.4821 14.3804 4.5547 16.3321L3.3753 14.7191C4.46149 13.8502 5.50293 12.3757 6.27499 10.6534C7.0443 8.9373 7.5 7.07749 7.5 5.5ZM8.1 11.4716C8.3673 10.8752 8.6043 10.2563 8.8037 9.6285C9.2754 10.3531 9.8553 11.0182 10.5102 11.5953C9.5284 11.7711 8.5666 12.0596 7.6353 12.4276C7.8 12.1143 7.9551 11.7948 8.1 11.4716Z\"
\t\t\t\t\t            fill=\"#101010\"
\t\t\t\t\t            />
\t\t\t\t               </svg>
\t\t\t\t               <a href=\"";
            // line 319
            echo ($context["instruction"] ?? null);
            echo "\" target=\"_blank\" class=\"load__link\" target=\"_blank\">";
            echo ($context["text_instruction"] ?? null);
            echo "</a>
\t\t\t\t            </li>
\t\t\t            ";
        }
        // line 322
        echo "                      </ul>
                    </div>
\t\t\t\t\t<div class=\"parameters product-parameters\" id=\"tabAttr2\">
                      <ul class=\"parameters__wrapper\">
\t\t\t\t\t    ";
        // line 326
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["complectation"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["attr"]) {
            // line 327
            echo "\t\t\t\t\t    <li class=\"parameters__item\">
\t\t\t\t\t\t  <p class=\"parameters__label\">";
            // line 328
            echo twig_get_attribute($this->env, $this->source, $context["attr"], "name", [], "any", false, false, false, 328);
            echo "</p>
\t\t\t\t\t\t  <p class=\"parameters__value\">";
            // line 329
            echo twig_get_attribute($this->env, $this->source, $context["attr"], "text", [], "any", false, false, false, 329);
            echo "</p>
\t\t\t\t\t    </li>
\t\t\t\t\t    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 332
        echo "                      </ul>
                    </div>
\t\t\t\t\t<div class=\"load tab_2__load--mob\" id=\"instruction-2\">
                      <h2 class=\"h2 load__title\">";
        // line 335
        echo ($context["text_tool_user_instruction"] ?? null);
        echo "</h2>
                      <ul class=\"load__list\">
\t\t\t\t\t    ";
        // line 337
        if (($context["draw"] ?? null)) {
            // line 338
            echo "                        <li class=\"load__item\">
                          <svg width=\"18\" height=\"20\" viewBox=\"0 0 18 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                            <path
                              d=\"M0.9985 0C0.44749 0 0 0.44405 0 0.9918V19.0082C0 19.5447 0.44476 20 0.9934 20H17.0066C17.5551 20 18 19.5489 18 18.9925L17.9997 5L13 0H0.9985ZM7.5 5.5H9.5C9.5 7.98994 11.6436 10.6604 14.3162 11.5513L13.8586 13.49C10.7234 13.0421 7.4821 14.3804 4.5547 16.3321L3.3753 14.7191C4.46149 13.8502 5.50293 12.3757 6.27499 10.6534C7.0443 8.9373 7.5 7.07749 7.5 5.5ZM8.1 11.4716C8.3673 10.8752 8.6043 10.2563 8.8037 9.6285C9.2754 10.3531 9.8553 11.0182 10.5102 11.5953C9.5284 11.7711 8.5666 12.0596 7.6353 12.4276C7.8 12.1143 7.9551 11.7948 8.1 11.4716Z\"
                              fill=\"#101010\"
                            />
                          </svg>
                          <a href=\"";
            // line 345
            echo ($context["draw"] ?? null);
            echo "\" class=\"load__link\" target=\"_blank\">";
            echo ($context["text_draw"] ?? null);
            echo "</a>
                        </li>
\t\t\t\t\t    ";
        }
        // line 348
        echo "                        ";
        if (($context["instruction"] ?? null)) {
            // line 349
            echo "\t\t\t\t            <li class=\"load__item\">
\t\t\t\t                <svg width=\"18\" height=\"20\" viewBox=\"0 0 18 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t\t            <path
\t\t\t\t\t            d=\"M0.9985 0C0.44749 0 0 0.44405 0 0.9918V19.0082C0 19.5447 0.44476 20 0.9934 20H17.0066C17.5551 20 18 19.5489 18 18.9925L17.9997 5L13 0H0.9985ZM7.5 5.5H9.5C9.5 7.98994 11.6436 10.6604 14.3162 11.5513L13.8586 13.49C10.7234 13.0421 7.4821 14.3804 4.5547 16.3321L3.3753 14.7191C4.46149 13.8502 5.50293 12.3757 6.27499 10.6534C7.0443 8.9373 7.5 7.07749 7.5 5.5ZM8.1 11.4716C8.3673 10.8752 8.6043 10.2563 8.8037 9.6285C9.2754 10.3531 9.8553 11.0182 10.5102 11.5953C9.5284 11.7711 8.5666 12.0596 7.6353 12.4276C7.8 12.1143 7.9551 11.7948 8.1 11.4716Z\"
\t\t\t\t\t            fill=\"#101010\"
\t\t\t\t\t            />
\t\t\t\t               </svg>
\t\t\t\t               <a href=\"";
            // line 356
            echo ($context["instruction"] ?? null);
            echo "\" class=\"load__link\" target=\"_blank\">";
            echo ($context["text_instruction"] ?? null);
            echo "</a>
\t\t\t\t            </li>
\t\t\t            ";
        }
        // line 359
        echo "                      </ul>
                    </div>

                    <div class=\"product_secondary product_secondary--single_mod product_secondary--single_mob\">
                      <div class=\"product_secondary__wrapper\">
                        <div class=\"product_secondary__main\">
                          <div class=\"product_secondary__content\">
                            <div class=\"product__price-row\">
\t\t\t\t\t\t\t<p class=\"product__price\">
\t\t\t\t\t\t\t  ";
        // line 368
        if (($context["special"] ?? null)) {
            echo "  
\t\t\t\t\t\t\t  <span>";
            // line 369
            echo ($context["special"] ?? null);
            echo "</span>
\t\t\t\t\t\t\t  ";
        } else {
            // line 371
            echo "\t\t\t\t\t\t\t  ";
            echo ($context["price"] ?? null);
            echo "
\t\t\t\t\t\t\t  ";
        }
        // line 373
        echo "\t\t\t\t\t\t    </p>
\t\t\t\t\t\t    ";
        // line 374
        if (($context["special"] ?? null)) {
            echo "  
\t\t\t\t\t\t    <p class=\"product__price-old\">";
            // line 375
            echo ($context["price"] ?? null);
            echo "</p>
\t\t\t\t\t\t    ";
        }
        // line 377
        echo "                            </div>
                          </div>
                        </div>
                        <div class=\"product_secondary__buttons\">
                          <button class=\"button\" onclick=\"cart.add('";
        // line 381
        echo ($context["product_id"] ?? null);
        echo "');\">
                            <p>";
        // line 382
        echo ($context["button_cart"] ?? null);
        echo "</p>
                          </button>
                          <button type=\"button\" class=\"button button_icon product_secondary__button_big\">
                            <span class=\"button_icon__icon product_secondary__button_big_icon\"></span>
                            ";
        // line 386
        echo ($context["text_pay_part"] ?? null);
        echo "
                          </button>
\t\t\t\t\t\t  <a class=\"button button_gray product_secondary__button_gray\" ";
        // line 388
        if ( !($context["wl_class"] ?? null)) {
            echo "onclick=\"wishlist.add(";
            echo ($context["product_id"] ?? null);
            echo ", '', '";
            echo ($context["to_wishlist"] ?? null);
            echo "', '";
            echo ($context["from_wishlist"] ?? null);
            echo "')\"";
        } else {
            echo "onclick=\"wishlist.remove(";
            echo ($context["product_id"] ?? null);
            echo ", '', '";
            echo ($context["from_wishlist"] ?? null);
            echo "', '";
            echo ($context["to_wishlist"] ?? null);
            echo "')\"";
        }
        echo ">
\t\t\t\t\t      <svg class=\"product_secondary__button_gray_icon product-like-";
        // line 389
        echo ($context["product_id"] ?? null);
        echo " ";
        if (($context["wl_class"] ?? null)) {
            echo "product__like-active";
        }
        echo "\" viewBox=\"0 0 24 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t\t      <path
\t\t\t\t\t\t    d=\"M11.9626 19.5381L2.10281 9.80024C1.07574 8.78576 0.5 7.41137 0.5 5.97966C0.5 4.548 1.07574 3.17365 2.10281 2.15928C3.13034 1.1449 4.52508 0.573975 5.98067 0.573975C7.43626 0.573975 8.83108 1.1449 9.85873 2.15928L11.9626 4.23506L14.0665 2.15928C15.094 1.1449 16.4888 0.573975 17.9444 0.573975C19.4 0.573975 20.7948 1.1449 21.8224 2.15928C22.8499 3.17365 23.4287 4.548 23.4287 5.97966C23.4287 7.41137 22.8499 8.78576 21.8224 9.80024L11.9626 19.5381Z\"
\t\t\t\t\t       />
\t\t\t\t\t       </svg>
                        ";
        // line 394
        if ( !($context["wl_class"] ?? null)) {
            // line 395
            echo "\t\t\t\t        <p class=\"in_wishlist\">";
            echo ($context["text_wl"] ?? null);
            echo "</p>
\t\t\t\t\t\t";
        } else {
            // line 397
            echo "\t\t\t\t\t\t<p class=\"in_wishlist\">";
            echo ($context["text_from_wl"] ?? null);
            echo "</p>
\t\t\t\t\t\t";
        }
        // line 399
        echo "\t\t\t\t           </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <aside class=\"aside\">
              <div class=\"aside_content\">
                <div class=\"product_secondary\">
                  <div class=\"product_secondary__wrapper\">
                    <div class=\"product_secondary__main\">
                      <div class=\"product_secondary__image_wrapper\">
                        <a class=\"product_secondary__image-link\" href=\"";
        // line 414
        echo ($context["popup"] ?? null);
        echo "\" data-fancybox=\"images\" data-caption=\"";
        echo ($context["heading_title"] ?? null);
        echo "\" data-thumbnail=\"";
        echo ($context["thumb"] ?? null);
        echo "\" title=\"";
        echo ($context["heading_title"] ?? null);
        echo "\">
                          <img class=\"product_secondary__image-item\" src=\"";
        // line 415
        echo ($context["thumb"] ?? null);
        echo "\" alt=\"Product\" />
                        </a>
                      </div>
                      <div class=\"product_secondary__content\">
                        <h2 class=\"product_secondary__title\">
                          <a>";
        // line 420
        echo ($context["heading_title"] ?? null);
        echo "</a>
                        </h2>
                        <div class=\"product__rating\">
                          <div class=\"rating\">
\t\t\t\t\t\t  ";
        // line 424
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 425
            echo "\t\t\t\t\t\t  ";
            if ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "rating", [], "any", false, false, false, 425) >= $context["i"])) {
                // line 426
                echo "\t\t\t\t\t\t  <span class=\"rating-star rating-filled\"></span>
\t\t\t\t\t\t  ";
            } else {
                // line 428
                echo "\t\t\t\t\t\t  <span class=\"rating-star\"></span>
\t\t\t\t\t\t  ";
            }
            // line 430
            echo "\t\t\t\t\t\t  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 431
        echo "                          </div>
                          <span class=\"product__rating-total\">";
        // line 432
        echo ($context["reviews"] ?? null);
        echo "</span>
                        </div>
                        <div class=\"product__price-row\">
\t\t\t\t\t\t<p class=\"product__price\">
\t\t\t\t\t\t  ";
        // line 436
        if (($context["special"] ?? null)) {
            echo "  
\t\t\t\t\t\t  <span>";
            // line 437
            echo ($context["special"] ?? null);
            echo "</span>
\t\t\t\t\t\t  ";
        } else {
            // line 439
            echo "\t\t\t\t\t\t  ";
            echo ($context["price"] ?? null);
            echo "
\t\t\t\t\t\t  ";
        }
        // line 441
        echo "\t\t\t\t\t    </p>
\t\t\t\t\t    ";
        // line 442
        if (($context["special"] ?? null)) {
            echo "  
\t\t\t\t\t    <p class=\"product__price-old\">";
            // line 443
            echo ($context["price"] ?? null);
            echo "</p>
\t\t\t\t\t    ";
        }
        // line 445
        echo "\t\t\t\t\t  </div>
                        </div>
                      </div>
                    </div>
                    <div class=\"product_secondary__buttons\">
\t\t\t\t\t<button class=\"button\" onclick=\"cart.add('";
        // line 450
        echo ($context["product_id"] ?? null);
        echo "');\">
\t\t\t\t        <p>";
        // line 451
        echo ($context["button_cart"] ?? null);
        echo "</p>
\t\t\t        </button>

                      <button type=\"button\" class=\"button button_icon product_secondary__button_big\">
                        <span class=\"button_icon__icon product_secondary__button_big_icon\"></span>
                        ";
        // line 456
        echo ($context["text_pay_part"] ?? null);
        echo "
                      </button>

\t\t\t\t\t<a class=\"button button_gray product_secondary__button_gray\" ";
        // line 459
        if ( !($context["wl_class"] ?? null)) {
            echo "onclick=\"wishlist.add(";
            echo ($context["product_id"] ?? null);
            echo ", '', '";
            echo ($context["to_wishlist"] ?? null);
            echo "', '";
            echo ($context["from_wishlist"] ?? null);
            echo "')\"";
        } else {
            echo "onclick=\"wishlist.remove(";
            echo ($context["product_id"] ?? null);
            echo ", '', '";
            echo ($context["from_wishlist"] ?? null);
            echo "', '";
            echo ($context["to_wishlist"] ?? null);
            echo "')\"";
        }
        echo ">
\t\t\t\t        <svg class=\"product_secondary__button_gray_icon product-like-";
        // line 460
        echo ($context["product_id"] ?? null);
        echo " ";
        if (($context["wl_class"] ?? null)) {
            echo "product__like-active";
        }
        echo "\" viewBox=\"0 0 24 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t        <path
\t\t\t\t             d=\"M11.9626 19.5381L2.10281 9.80024C1.07574 8.78576 0.5 7.41137 0.5 5.97966C0.5 4.548 1.07574 3.17365 2.10281 2.15928C3.13034 1.1449 4.52508 0.573975 5.98067 0.573975C7.43626 0.573975 8.83108 1.1449 9.85873 2.15928L11.9626 4.23506L14.0665 2.15928C15.094 1.1449 16.4888 0.573975 17.9444 0.573975C19.4 0.573975 20.7948 1.1449 21.8224 2.15928C22.8499 3.17365 23.4287 4.548 23.4287 5.97966C23.4287 7.41137 22.8499 8.78576 21.8224 9.80024L11.9626 19.5381Z\"
\t\t\t\t        />
\t\t\t\t        </svg>
\t\t\t\t        ";
        // line 465
        if ( !($context["wl_class"] ?? null)) {
            // line 466
            echo "\t\t\t\t        <p class=\"in_wishlist\">";
            echo ($context["text_wl"] ?? null);
            echo "</p>
\t\t\t\t\t\t";
        } else {
            // line 468
            echo "\t\t\t\t\t\t<p class=\"in_wishlist\">";
            echo ($context["text_from_wl"] ?? null);
            echo "</p>
\t\t\t\t\t\t";
        }
        // line 470
        echo "\t\t\t\t    </a>
                    </div>
                  </div>
                </div>

                <div class=\"load\">
                  <h2 class=\"h2 load__title\">";
        // line 476
        echo ($context["text_tool_user_instruction"] ?? null);
        echo "</h2>
                  <ul class=\"load__list\">
\t\t\t\t  ";
        // line 478
        if (($context["draw"] ?? null)) {
            // line 479
            echo "\t\t\t\t  <li class=\"load__item\">
\t\t\t\t\t<svg width=\"18\" height=\"20\" viewBox=\"0 0 18 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t\t  <path
\t\t\t\t\t\td=\"M0.9985 0C0.44749 0 0 0.44405 0 0.9918V19.0082C0 19.5447 0.44476 20 0.9934 20H17.0066C17.5551 20 18 19.5489 18 18.9925L17.9997 5L13 0H0.9985ZM7.5 5.5H9.5C9.5 7.98994 11.6436 10.6604 14.3162 11.5513L13.8586 13.49C10.7234 13.0421 7.4821 14.3804 4.5547 16.3321L3.3753 14.7191C4.46149 13.8502 5.50293 12.3757 6.27499 10.6534C7.0443 8.9373 7.5 7.07749 7.5 5.5ZM8.1 11.4716C8.3673 10.8752 8.6043 10.2563 8.8037 9.6285C9.2754 10.3531 9.8553 11.0182 10.5102 11.5953C9.5284 11.7711 8.5666 12.0596 7.6353 12.4276C7.8 12.1143 7.9551 11.7948 8.1 11.4716Z\"
\t\t\t\t\t\tfill=\"#101010\"
\t\t\t\t\t  />
\t\t\t\t\t</svg>
\t\t\t\t\t<a href=\"";
            // line 486
            echo ($context["draw"] ?? null);
            echo "\" class=\"load__link\" target=\"_blank\">";
            echo ($context["text_draw"] ?? null);
            echo "</a>
\t\t\t\t  </li>
\t\t\t\t  ";
        }
        // line 489
        echo "\t\t\t\t  ";
        if (($context["instruction"] ?? null)) {
            // line 490
            echo "\t\t\t\t  <li class=\"load__item\">
\t\t\t\t\t  <svg width=\"18\" height=\"20\" viewBox=\"0 0 18 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t\t  <path
\t\t\t\t\t  d=\"M0.9985 0C0.44749 0 0 0.44405 0 0.9918V19.0082C0 19.5447 0.44476 20 0.9934 20H17.0066C17.5551 20 18 19.5489 18 18.9925L17.9997 5L13 0H0.9985ZM7.5 5.5H9.5C9.5 7.98994 11.6436 10.6604 14.3162 11.5513L13.8586 13.49C10.7234 13.0421 7.4821 14.3804 4.5547 16.3321L3.3753 14.7191C4.46149 13.8502 5.50293 12.3757 6.27499 10.6534C7.0443 8.9373 7.5 7.07749 7.5 5.5ZM8.1 11.4716C8.3673 10.8752 8.6043 10.2563 8.8037 9.6285C9.2754 10.3531 9.8553 11.0182 10.5102 11.5953C9.5284 11.7711 8.5666 12.0596 7.6353 12.4276C7.8 12.1143 7.9551 11.7948 8.1 11.4716Z\"
\t\t\t\t\t  fill=\"#101010\"
\t\t\t\t\t  />
\t\t\t\t\t </svg>
\t\t\t\t\t <a href=\"";
            // line 497
            echo ($context["instruction"] ?? null);
            echo "\" class=\"load__link\" target=\"_blank\">";
            echo ($context["text_instruction"] ?? null);
            echo "</a>
\t\t\t\t  </li>
\t\t\t      ";
        }
        // line 500
        echo "                  </ul>
                </div>
              </div>
            </aside>
\t\t  <div class=\"tab__wrapper\" id=\"tab3\">
            <div class=\"tab__block\">
              <div class=\"tab__content\">
                <div class=\"tab_3__head\">
                  <h2 class=\"tab_3__title\">
\t\t\t\t    ";
        // line 509
        echo ($context["text_review"] ?? null);
        echo " (
                    <span>";
        // line 510
        echo ($context["reviews_count"] ?? null);
        echo "</span>
                    )
                  </h2>
\t\t\t\t<a href=\"javascript:;\" data-fancybox data-src=\"#review-modal\" class=\"tab_3__button\">";
        // line 513
        echo ($context["text_write"] ?? null);
        echo "</a>
                </div>

                <div class=\"tab_3__body\">
\t\t\t\t  ";
        // line 517
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["feedbacks"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["feedback"]) {
            // line 518
            echo "                  <div class=\"feedback_block\">
                    <div class=\"feedback\">
                      <div class=\"feedback__wrapper\">
                        <div class=\"feedback__account\">
                          <div class=\"feedback__image_wrapper\">
                            <img class=\"feedback__image\" src=\"image/icon/user-icon.svg\" alt=\"Profile image\" />
                          </div>
                          <div class=\"feedback__account_info\">
                            <h6 class=\"feedback__name\">";
            // line 526
            echo twig_get_attribute($this->env, $this->source, $context["feedback"], "author", [], "any", false, false, false, 526);
            echo "</h6>
                            <div class=\"rating\" bis_skin_checked=\"1\">
\t\t\t\t\t\t\t";
            // line 528
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 529
                echo "\t\t\t\t\t\t\t";
                if ((twig_get_attribute($this->env, $this->source, $context["feedback"], "rating", [], "any", false, false, false, 529) < $context["i"])) {
                    // line 530
                    echo "\t\t\t\t\t\t\t<span class=\"rating-star\"></span>
\t\t\t\t\t\t\t";
                } else {
                    // line 532
                    echo "\t\t\t\t\t\t\t<span class=\"rating-star rating-filled\"></span>
\t\t\t\t\t\t\t";
                }
                // line 534
                echo "\t\t\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 535
            echo "                            </div>
                          </div>
                        </div>
                        <span class=\"feedback__date\">";
            // line 538
            echo twig_get_attribute($this->env, $this->source, $context["feedback"], "date_added", [], "any", false, false, false, 538);
            echo "</span>
                        <div class=\"feedback__content\">
                          ";
            // line 540
            echo twig_get_attribute($this->env, $this->source, $context["feedback"], "text", [], "any", false, false, false, 540);
            echo "
                        </div>
                        <div class=\"feedback__button_row\">
\t\t\t\t\t    <a href=\"javascript:;\" class=\"feedback__respond answer-link data-fancybox\" data-fancybox data-src=\"#form-answer-review\" onclick=\"\$('#review-id').val('";
            // line 543
            echo twig_get_attribute($this->env, $this->source, $context["feedback"], "id", [], "any", false, false, false, 543);
            echo "');\">";
            echo ($context["set_answer"] ?? null);
            echo "</a>
                          <span class=\"feedback__deco\"></span>
                          <span class=\"feedback__quantity\">";
            // line 545
            echo twig_get_attribute($this->env, $this->source, $context["feedback"], "answers_count", [], "any", false, false, false, 545);
            echo "</span>
                        </div>
                      </div>
                    </div>
                    ";
            // line 549
            if (twig_get_attribute($this->env, $this->source, $context["feedback"], "answers", [], "any", false, false, false, 549)) {
                // line 550
                echo "\t\t\t\t\t";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["feedback"], "answers", [], "any", false, false, false, 550));
                foreach ($context['_seq'] as $context["_key"] => $context["answer"]) {
                    // line 551
                    echo "                    <div class=\"answer\">
                      <div class=\"answer__wrapper\">
                        <div class=\"answer__image_wrapper\">
                          <img class=\"answer__image\" src=\"image/icon/user-icon.svg\" alt=\"Profile image\" />
                        </div>
                        <h6 class=\"answer__name\">";
                    // line 556
                    echo twig_get_attribute($this->env, $this->source, $context["answer"], "author", [], "any", false, false, false, 556);
                    echo "</h6>
                        <div class=\"answer__date\">";
                    // line 557
                    echo twig_get_attribute($this->env, $this->source, $context["answer"], "date_added", [], "any", false, false, false, 557);
                    echo "</div>
                        <span class=\"answer__deco\"></span>
                        <div class=\"answer__content\">
                          ";
                    // line 560
                    echo twig_get_attribute($this->env, $this->source, $context["answer"], "text", [], "any", false, false, false, 560);
                    echo "
                        </div>
                      </div>
                    </div>
\t\t\t\t    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['answer'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 565
                echo "\t\t\t\t    <div id=\"all-answers-";
                echo twig_get_attribute($this->env, $this->source, $context["feedback"], "id", [], "any", false, false, false, 565);
                echo "\"></div>
\t\t\t\t\t";
                // line 566
                if ((twig_get_attribute($this->env, $this->source, $context["feedback"], "answers_count", [], "any", false, false, false, 566) < 10)) {
                    // line 567
                    echo "\t\t\t\t    <button class=\"feedback_block__button\" id=\"more_answers-";
                    echo twig_get_attribute($this->env, $this->source, $context["feedback"], "id", [], "any", false, false, false, 567);
                    echo "\" onclick=\"more_answers(";
                    echo twig_get_attribute($this->env, $this->source, $context["feedback"], "id", [], "any", false, false, false, 567);
                    echo ")\">";
                    echo ($context["text_more_answers"] ?? null);
                    echo "</button>
\t\t\t\t    ";
                }
                // line 569
                echo "\t\t\t\t    ";
            }
            // line 570
            echo "                  </div>
\t\t\t\t  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['feedback'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 572
        echo "\t\t\t\t  <div id=\"more_feedbacks\"></div>

                  <div class=\"tab_3__footer\">
                    <div class=\"progress-feedbacks\">
                      <p>";
        // line 576
        echo ($context["text_show_reviews"] ?? null);
        echo "</p>
                      <div class=\"progress__wrapper\">
                        <div class=\"progress__bar\" style=\"width: ";
        // line 578
        echo ($context["percent_reviews"] ?? null);
        echo "%;\"></div>
                      </div>
                    </div>
                    
\t\t\t\t\t";
        // line 582
        if ((($context["part_count"] ?? null) < ($context["reviews_count"] ?? null))) {
            // line 583
            echo "                    <button class=\"button button_outline\" data-count=\"10\" id=\"more_reviews\" onclick=\"more_reviews()\">";
            echo ($context["text_show_more"] ?? null);
            echo "</button>
\t\t\t\t    ";
        }
        // line 585
        echo "                  </div>

                    <div class=\"product_secondary product_secondary--single_mod product_secondary--single_mob\">
                      <div class=\"product_secondary__wrapper\">
                        <div class=\"product_secondary__main\">
                          <div class=\"product_secondary__content\">
                            <div class=\"product__price-row\">
\t\t\t\t\t\t\t<p class=\"product__price\">
\t\t\t\t\t\t\t  ";
        // line 593
        if (($context["special"] ?? null)) {
            echo "  
\t\t\t\t\t\t\t  <span>";
            // line 594
            echo ($context["special"] ?? null);
            echo "</span>
\t\t\t\t\t\t\t  ";
        } else {
            // line 596
            echo "\t\t\t\t\t\t\t  ";
            echo ($context["price"] ?? null);
            echo "
\t\t\t\t\t\t\t  ";
        }
        // line 598
        echo "\t\t\t\t\t\t    </p>
\t\t\t\t\t\t    ";
        // line 599
        if (($context["special"] ?? null)) {
            echo "  
\t\t\t\t\t\t    <p class=\"product__price-old\">";
            // line 600
            echo ($context["price"] ?? null);
            echo "</p>
\t\t\t\t\t\t    ";
        }
        // line 602
        echo "                            </div>
                          </div>
                        </div>
                        <div class=\"product_secondary__buttons\">
                          <button class=\"button\" onclick=\"cart.add('";
        // line 606
        echo ($context["product_id"] ?? null);
        echo "');\">
                            <p>";
        // line 607
        echo ($context["button_cart"] ?? null);
        echo "</p>
                          </button>
                          <button type=\"button\" class=\"button button_icon product_secondary__button_big\">
                            <span class=\"button_icon__icon product_secondary__button_big_icon\"></span>
                            ";
        // line 611
        echo ($context["text_pay_part"] ?? null);
        echo "
                          </button>
\t\t\t\t\t\t  <a class=\"button button_gray product_secondary__button_gray\" ";
        // line 613
        if ( !($context["wl_class"] ?? null)) {
            echo "onclick=\"wishlist.add(";
            echo ($context["product_id"] ?? null);
            echo ", '', '";
            echo ($context["to_wishlist"] ?? null);
            echo "', '";
            echo ($context["from_wishlist"] ?? null);
            echo "')\"";
        } else {
            echo "onclick=\"wishlist.remove(";
            echo ($context["product_id"] ?? null);
            echo ", '', '";
            echo ($context["from_wishlist"] ?? null);
            echo "', '";
            echo ($context["to_wishlist"] ?? null);
            echo "')\"";
        }
        echo ">
\t\t\t\t\t      <svg class=\"product_secondary__button_gray_icon product-like-";
        // line 614
        echo ($context["product_id"] ?? null);
        echo " ";
        if (($context["wl_class"] ?? null)) {
            echo "product__like-active";
        }
        echo "\" viewBox=\"0 0 24 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t\t      <path
\t\t\t\t\t\t    d=\"M11.9626 19.5381L2.10281 9.80024C1.07574 8.78576 0.5 7.41137 0.5 5.97966C0.5 4.548 1.07574 3.17365 2.10281 2.15928C3.13034 1.1449 4.52508 0.573975 5.98067 0.573975C7.43626 0.573975 8.83108 1.1449 9.85873 2.15928L11.9626 4.23506L14.0665 2.15928C15.094 1.1449 16.4888 0.573975 17.9444 0.573975C19.4 0.573975 20.7948 1.1449 21.8224 2.15928C22.8499 3.17365 23.4287 4.548 23.4287 5.97966C23.4287 7.41137 22.8499 8.78576 21.8224 9.80024L11.9626 19.5381Z\"
\t\t\t\t\t       />
\t\t\t\t\t       </svg>
\t\t\t\t\t     ";
        // line 619
        if ( !($context["wl_class"] ?? null)) {
            // line 620
            echo "\t\t\t\t        <p class=\"in_wishlist\">";
            echo ($context["text_wl"] ?? null);
            echo "</p>
\t\t\t\t\t\t";
        } else {
            // line 622
            echo "\t\t\t\t\t\t<p class=\"in_wishlist\">";
            echo ($context["text_from_wl"] ?? null);
            echo "</p>
\t\t\t\t\t\t";
        }
        // line 624
        echo "\t\t\t\t           </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <aside class=\"aside\">
              <div class=\"aside_content\">
                <div class=\"product_secondary\">
                  <div class=\"product_secondary__wrapper\">
                    <div class=\"product_secondary__main\">
                      <div class=\"product_secondary__image_wrapper\">
                        <a class=\"product_secondary__image-link\" href=\"";
        // line 637
        echo ($context["popup"] ?? null);
        echo "\" data-fancybox=\"images\" data-caption=\"";
        echo ($context["heading_title"] ?? null);
        echo "\" data-thumbnail=\"";
        echo ($context["thumb"] ?? null);
        echo "\" title=\"";
        echo ($context["heading_title"] ?? null);
        echo "\">
                          <img class=\"product_secondary__image-item\" src=\"";
        // line 638
        echo ($context["thumb"] ?? null);
        echo "\" alt=\"Product\" />
                        </a>
                      </div>
                      <div class=\"product_secondary__content\">
                        <h2 class=\"product_secondary__title\">
                          <a>";
        // line 643
        echo ($context["heading_title"] ?? null);
        echo "</a>
                        </h2>
                        <div class=\"product__rating\">
                          <div class=\"rating\">
\t\t\t\t\t\t  ";
        // line 647
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 648
            echo "\t\t\t\t\t\t  ";
            if ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "rating", [], "any", false, false, false, 648) >= $context["i"])) {
                // line 649
                echo "\t\t\t\t\t\t  <span class=\"rating-star rating-filled\"></span>
\t\t\t\t\t\t  ";
            } else {
                // line 651
                echo "\t\t\t\t\t\t  <span class=\"rating-star\"></span>
\t\t\t\t\t\t  ";
            }
            // line 653
            echo "\t\t\t\t\t\t  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 654
        echo "                          </div>
                          <span class=\"product__rating-total\">";
        // line 655
        echo ($context["reviews"] ?? null);
        echo "</span>
                        </div>
                        <div class=\"product__price-row\">
\t\t\t\t\t\t<p class=\"product__price\">
\t\t\t\t\t\t  ";
        // line 659
        if (($context["special"] ?? null)) {
            echo "  
\t\t\t\t\t\t  <span>";
            // line 660
            echo ($context["special"] ?? null);
            echo "</span>
\t\t\t\t\t\t  ";
        } else {
            // line 662
            echo "\t\t\t\t\t\t  ";
            echo ($context["price"] ?? null);
            echo "
\t\t\t\t\t\t  ";
        }
        // line 664
        echo "\t\t\t\t\t    </p>
\t\t\t\t\t    ";
        // line 665
        if (($context["special"] ?? null)) {
            echo "  
\t\t\t\t\t    <p class=\"product__price-old\">";
            // line 666
            echo ($context["price"] ?? null);
            echo "</p>
\t\t\t\t\t    ";
        }
        // line 668
        echo "\t\t\t\t\t  </div>
                        </div>
                      </div>
                    </div>
                    <div class=\"product_secondary__buttons\">
\t\t\t\t\t<button class=\"button\" onclick=\"cart.add('";
        // line 673
        echo ($context["product_id"] ?? null);
        echo "');\">
\t\t\t\t        <p>";
        // line 674
        echo ($context["button_cart"] ?? null);
        echo "</p>
\t\t\t        </button>

                      <button type=\"button\" class=\"button button_icon product_secondary__button_big\">
                        <span class=\"button_icon__icon product_secondary__button_big_icon\"></span>
                        ";
        // line 679
        echo ($context["text_pay_part"] ?? null);
        echo "
                      </button>

\t\t\t\t\t<a class=\"button button_gray product_secondary__button_gray\" ";
        // line 682
        if ( !($context["wl_class"] ?? null)) {
            echo "onclick=\"wishlist.add(";
            echo ($context["product_id"] ?? null);
            echo ", '', '";
            echo ($context["to_wishlist"] ?? null);
            echo "', '";
            echo ($context["from_wishlist"] ?? null);
            echo "')\"";
        } else {
            echo "onclick=\"wishlist.remove(";
            echo ($context["product_id"] ?? null);
            echo ", '', '";
            echo ($context["from_wishlist"] ?? null);
            echo "', '";
            echo ($context["to_wishlist"] ?? null);
            echo "')\"";
        }
        echo ">
\t\t\t\t        <svg class=\"product_secondary__button_gray_icon product-like-";
        // line 683
        echo ($context["product_id"] ?? null);
        echo " ";
        if (($context["wl_class"] ?? null)) {
            echo "product__like-active";
        }
        echo "\" viewBox=\"0 0 24 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t        <path
\t\t\t\t             d=\"M11.9626 19.5381L2.10281 9.80024C1.07574 8.78576 0.5 7.41137 0.5 5.97966C0.5 4.548 1.07574 3.17365 2.10281 2.15928C3.13034 1.1449 4.52508 0.573975 5.98067 0.573975C7.43626 0.573975 8.83108 1.1449 9.85873 2.15928L11.9626 4.23506L14.0665 2.15928C15.094 1.1449 16.4888 0.573975 17.9444 0.573975C19.4 0.573975 20.7948 1.1449 21.8224 2.15928C22.8499 3.17365 23.4287 4.548 23.4287 5.97966C23.4287 7.41137 22.8499 8.78576 21.8224 9.80024L11.9626 19.5381Z\"
\t\t\t\t        />
\t\t\t\t        </svg>
\t\t\t\t        ";
        // line 688
        if ( !($context["wl_class"] ?? null)) {
            // line 689
            echo "\t\t\t\t        <p class=\"in_wishlist\">";
            echo ($context["text_wl"] ?? null);
            echo "</p>
\t\t\t\t\t\t";
        } else {
            // line 691
            echo "\t\t\t\t\t\t<p class=\"in_wishlist\">";
            echo ($context["text_from_wl"] ?? null);
            echo "</p>
\t\t\t\t\t\t";
        }
        // line 693
        echo "\t\t\t\t    </a>
                    </div>
                  </div>
                </div>

                <div class=\"load\">
                  <h2 class=\"h2 load__title\">";
        // line 699
        echo ($context["text_tool_user_instruction"] ?? null);
        echo "</h2>
                  <ul class=\"load__list\">
\t\t\t\t  ";
        // line 701
        if (($context["draw"] ?? null)) {
            // line 702
            echo "\t\t\t\t  <li class=\"load__item\">
\t\t\t\t\t<svg width=\"18\" height=\"20\" viewBox=\"0 0 18 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t\t  <path
\t\t\t\t\t\td=\"M0.9985 0C0.44749 0 0 0.44405 0 0.9918V19.0082C0 19.5447 0.44476 20 0.9934 20H17.0066C17.5551 20 18 19.5489 18 18.9925L17.9997 5L13 0H0.9985ZM7.5 5.5H9.5C9.5 7.98994 11.6436 10.6604 14.3162 11.5513L13.8586 13.49C10.7234 13.0421 7.4821 14.3804 4.5547 16.3321L3.3753 14.7191C4.46149 13.8502 5.50293 12.3757 6.27499 10.6534C7.0443 8.9373 7.5 7.07749 7.5 5.5ZM8.1 11.4716C8.3673 10.8752 8.6043 10.2563 8.8037 9.6285C9.2754 10.3531 9.8553 11.0182 10.5102 11.5953C9.5284 11.7711 8.5666 12.0596 7.6353 12.4276C7.8 12.1143 7.9551 11.7948 8.1 11.4716Z\"
\t\t\t\t\t\tfill=\"#101010\"
\t\t\t\t\t  />
\t\t\t\t\t</svg>
\t\t\t\t\t<a href=\"";
            // line 709
            echo ($context["draw"] ?? null);
            echo "\" class=\"load__link\" target=\"_blank\">";
            echo ($context["text_draw"] ?? null);
            echo "</a>
\t\t\t\t  </li>
\t\t\t\t  ";
        }
        // line 712
        echo "\t\t\t\t  ";
        if (($context["instruction"] ?? null)) {
            // line 713
            echo "\t\t\t\t  <li class=\"load__item\">
\t\t\t\t\t  <svg width=\"18\" height=\"20\" viewBox=\"0 0 18 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t\t  <path
\t\t\t\t\t  d=\"M0.9985 0C0.44749 0 0 0.44405 0 0.9918V19.0082C0 19.5447 0.44476 20 0.9934 20H17.0066C17.5551 20 18 19.5489 18 18.9925L17.9997 5L13 0H0.9985ZM7.5 5.5H9.5C9.5 7.98994 11.6436 10.6604 14.3162 11.5513L13.8586 13.49C10.7234 13.0421 7.4821 14.3804 4.5547 16.3321L3.3753 14.7191C4.46149 13.8502 5.50293 12.3757 6.27499 10.6534C7.0443 8.9373 7.5 7.07749 7.5 5.5ZM8.1 11.4716C8.3673 10.8752 8.6043 10.2563 8.8037 9.6285C9.2754 10.3531 9.8553 11.0182 10.5102 11.5953C9.5284 11.7711 8.5666 12.0596 7.6353 12.4276C7.8 12.1143 7.9551 11.7948 8.1 11.4716Z\"
\t\t\t\t\t  fill=\"#101010\"
\t\t\t\t\t  />
\t\t\t\t\t </svg>
\t\t\t\t\t <a href=\"";
            // line 720
            echo ($context["instruction"] ?? null);
            echo "\" class=\"load__link\" target=\"_blank\">";
            echo ($context["text_instruction"] ?? null);
            echo "</a>
\t\t\t\t  </li>
\t\t\t      ";
        }
        // line 723
        echo "                  </ul>
                </div>
              </div>
            </aside>
\t\t  <div class=\"tab__wrapper\" id=\"tab4\">
            <div class=\"tab__block\">
              <div class=\"tab__content\">
                <div class=\"tab_4__video\">
                  <h2 class=\"h2 tab_4__title\">";
        // line 731
        echo ($context["tab_video"] ?? null);
        echo "</h2>
                  <div class=\"video video_big\">
                    <a href=\"https://www.youtube.com/watch?v=";
        // line 733
        echo twig_get_attribute($this->env, $this->source, ($context["video"] ?? null), "id", [], "any", false, false, false, 733);
        echo "\" class=\"video__wrapper\">
                      <img class=\"video__item\" src=\"";
        // line 734
        echo twig_get_attribute($this->env, $this->source, ($context["video"] ?? null), "thumb", [], "any", false, false, false, 734);
        echo "\" alt=\"";
        echo twig_get_attribute($this->env, $this->source, ($context["video"] ?? null), "title", [], "any", false, false, false, 734);
        echo "\" />
                      <div class=\"video__play-button\"></div>
                    </a>
                  </div>
                  <div class=\"product_secondary product_secondary--single_mod product_secondary--single_mob\">
                      <div class=\"product_secondary__wrapper\">
                        <div class=\"product_secondary__main\">
                          <div class=\"product_secondary__content\">
                            <div class=\"product__price-row\">
\t\t\t\t\t\t\t<p class=\"product__price\">
\t\t\t\t\t\t\t  ";
        // line 744
        if (($context["special"] ?? null)) {
            echo "  
\t\t\t\t\t\t\t  <span>";
            // line 745
            echo ($context["special"] ?? null);
            echo "</span>
\t\t\t\t\t\t\t  ";
        } else {
            // line 747
            echo "\t\t\t\t\t\t\t  ";
            echo ($context["price"] ?? null);
            echo "
\t\t\t\t\t\t\t  ";
        }
        // line 749
        echo "\t\t\t\t\t\t    </p>
\t\t\t\t\t\t    ";
        // line 750
        if (($context["special"] ?? null)) {
            echo "  
\t\t\t\t\t\t    <p class=\"product__price-old\">";
            // line 751
            echo ($context["price"] ?? null);
            echo "</p>
\t\t\t\t\t\t    ";
        }
        // line 753
        echo "                            </div>
                          </div>
                        </div>
                        <div class=\"product_secondary__buttons\">
                          <button class=\"button\" onclick=\"cart.add('";
        // line 757
        echo ($context["product_id"] ?? null);
        echo "');\">
                            <p>";
        // line 758
        echo ($context["button_cart"] ?? null);
        echo "</p>
                          </button>
                          <button type=\"button\" class=\"button button_icon product_secondary__button_big\">
                            <span class=\"button_icon__icon product_secondary__button_big_icon\"></span>
                            ";
        // line 762
        echo ($context["text_pay_part"] ?? null);
        echo "
                          </button>
\t\t\t\t\t\t  <a class=\"button button_gray product_secondary__button_gray\" ";
        // line 764
        if ( !($context["wl_class"] ?? null)) {
            echo "onclick=\"wishlist.add(";
            echo ($context["product_id"] ?? null);
            echo ", '', '";
            echo ($context["to_wishlist"] ?? null);
            echo "', '";
            echo ($context["from_wishlist"] ?? null);
            echo "')\"";
        } else {
            echo "onclick=\"wishlist.remove(";
            echo ($context["product_id"] ?? null);
            echo ", '', '";
            echo ($context["from_wishlist"] ?? null);
            echo "', '";
            echo ($context["to_wishlist"] ?? null);
            echo "')\"";
        }
        echo ">
\t\t\t\t\t      <svg class=\"product_secondary__button_gray_icon product-like-";
        // line 765
        echo ($context["product_id"] ?? null);
        echo " ";
        if (($context["wl_class"] ?? null)) {
            echo "product__like-active";
        }
        echo "\" viewBox=\"0 0 24 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t\t      <path
\t\t\t\t\t\t    d=\"M11.9626 19.5381L2.10281 9.80024C1.07574 8.78576 0.5 7.41137 0.5 5.97966C0.5 4.548 1.07574 3.17365 2.10281 2.15928C3.13034 1.1449 4.52508 0.573975 5.98067 0.573975C7.43626 0.573975 8.83108 1.1449 9.85873 2.15928L11.9626 4.23506L14.0665 2.15928C15.094 1.1449 16.4888 0.573975 17.9444 0.573975C19.4 0.573975 20.7948 1.1449 21.8224 2.15928C22.8499 3.17365 23.4287 4.548 23.4287 5.97966C23.4287 7.41137 22.8499 8.78576 21.8224 9.80024L11.9626 19.5381Z\"
\t\t\t\t\t       />
\t\t\t\t\t       </svg>
\t\t\t\t\t    ";
        // line 770
        if ( !($context["wl_class"] ?? null)) {
            // line 771
            echo "\t\t\t\t        <p class=\"in_wishlist\">";
            echo ($context["text_wl"] ?? null);
            echo "</p>
\t\t\t\t\t\t";
        } else {
            // line 773
            echo "\t\t\t\t\t\t<p class=\"in_wishlist\">";
            echo ($context["text_from_wl"] ?? null);
            echo "</p>
\t\t\t\t\t\t";
        }
        // line 775
        echo "\t\t\t\t           </a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <aside class=\"aside\">
              <div class=\"aside_content\">
                <div class=\"product_secondary\">
                  <div class=\"product_secondary__wrapper\">
                    <div class=\"product_secondary__main\">
                      <div class=\"product_secondary__image_wrapper\">
                        <a class=\"product_secondary__image-link\" href=\"";
        // line 788
        echo ($context["popup"] ?? null);
        echo "\" data-fancybox=\"images\" data-caption=\"";
        echo ($context["heading_title"] ?? null);
        echo "\" data-thumbnail=\"";
        echo ($context["thumb"] ?? null);
        echo "\" title=\"";
        echo ($context["heading_title"] ?? null);
        echo "\">
                          <img class=\"product_secondary__image-item\" src=\"";
        // line 789
        echo ($context["thumb"] ?? null);
        echo "\" alt=\"Product\" />
                        </a>
                      </div>
                      <div class=\"product_secondary__content\">
                        <h2 class=\"product_secondary__title\">
                          <a>";
        // line 794
        echo ($context["heading_title"] ?? null);
        echo "</a>
                        </h2>
                        <div class=\"product__rating\">
                          <div class=\"rating\">
\t\t\t\t\t\t  ";
        // line 798
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(range(1, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 799
            echo "\t\t\t\t\t\t  ";
            if ((twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "rating", [], "any", false, false, false, 799) >= $context["i"])) {
                // line 800
                echo "\t\t\t\t\t\t  <span class=\"rating-star rating-filled\"></span>
\t\t\t\t\t\t  ";
            } else {
                // line 802
                echo "\t\t\t\t\t\t  <span class=\"rating-star\"></span>
\t\t\t\t\t\t  ";
            }
            // line 804
            echo "\t\t\t\t\t\t  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 805
        echo "                          </div>
                          <span class=\"product__rating-total\">";
        // line 806
        echo ($context["reviews"] ?? null);
        echo "</span>
                        </div>
                        <div class=\"product__price-row\">
\t\t\t\t\t\t<p class=\"product__price\">
\t\t\t\t\t\t  ";
        // line 810
        if (($context["special"] ?? null)) {
            echo "  
\t\t\t\t\t\t  <span>";
            // line 811
            echo ($context["special"] ?? null);
            echo "</span>
\t\t\t\t\t\t  ";
        } else {
            // line 813
            echo "\t\t\t\t\t\t  ";
            echo ($context["price"] ?? null);
            echo "
\t\t\t\t\t\t  ";
        }
        // line 815
        echo "\t\t\t\t\t    </p>
\t\t\t\t\t    ";
        // line 816
        if (($context["special"] ?? null)) {
            echo "  
\t\t\t\t\t    <p class=\"product__price-old\">";
            // line 817
            echo ($context["price"] ?? null);
            echo "</p>
\t\t\t\t\t    ";
        }
        // line 819
        echo "\t\t\t\t\t  </div>
                        </div>
                      </div>
                    </div>
                    <div class=\"product_secondary__buttons\">
\t\t\t\t\t<button class=\"button\" onclick=\"cart.add('";
        // line 824
        echo ($context["product_id"] ?? null);
        echo "');\">
\t\t\t\t        <p>";
        // line 825
        echo ($context["button_cart"] ?? null);
        echo "</p>
\t\t\t        </button>

                      <button type=\"button\" class=\"button button_icon product_secondary__button_big\">
                        <span class=\"button_icon__icon product_secondary__button_big_icon\"></span>
                        ";
        // line 830
        echo ($context["text_pay_part"] ?? null);
        echo "
                      </button>

\t\t\t\t\t<a class=\"button button_gray product_secondary__button_gray\" ";
        // line 833
        if ( !($context["wl_class"] ?? null)) {
            echo "onclick=\"wishlist.add(";
            echo ($context["product_id"] ?? null);
            echo ", '', '";
            echo ($context["to_wishlist"] ?? null);
            echo "', '";
            echo ($context["from_wishlist"] ?? null);
            echo "')\"";
        } else {
            echo "onclick=\"wishlist.remove(";
            echo ($context["product_id"] ?? null);
            echo ", '', '";
            echo ($context["from_wishlist"] ?? null);
            echo "', '";
            echo ($context["to_wishlist"] ?? null);
            echo "')\"";
        }
        echo ">
\t\t\t\t        <svg class=\"product_secondary__button_gray_icon product-like-";
        // line 834
        echo ($context["product_id"] ?? null);
        echo " ";
        if (($context["wl_class"] ?? null)) {
            echo "product__like-active";
        }
        echo "\" viewBox=\"0 0 24 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t        <path
\t\t\t\t             d=\"M11.9626 19.5381L2.10281 9.80024C1.07574 8.78576 0.5 7.41137 0.5 5.97966C0.5 4.548 1.07574 3.17365 2.10281 2.15928C3.13034 1.1449 4.52508 0.573975 5.98067 0.573975C7.43626 0.573975 8.83108 1.1449 9.85873 2.15928L11.9626 4.23506L14.0665 2.15928C15.094 1.1449 16.4888 0.573975 17.9444 0.573975C19.4 0.573975 20.7948 1.1449 21.8224 2.15928C22.8499 3.17365 23.4287 4.548 23.4287 5.97966C23.4287 7.41137 22.8499 8.78576 21.8224 9.80024L11.9626 19.5381Z\"
\t\t\t\t        />
\t\t\t\t        </svg>
\t\t\t\t\t\t";
        // line 839
        if ( !($context["wl_class"] ?? null)) {
            // line 840
            echo "\t\t\t\t        <p class=\"in_wishlist\">";
            echo ($context["text_wl"] ?? null);
            echo "</p>
\t\t\t\t\t\t";
        } else {
            // line 842
            echo "\t\t\t\t\t\t<p class=\"in_wishlist\">";
            echo ($context["text_from_wl"] ?? null);
            echo "</p>
\t\t\t\t\t\t";
        }
        // line 844
        echo "\t\t\t\t    </a>
                    </div>
                  </div>
                </div>

                <div class=\"load\">
                  <h2 class=\"h2 load__title\">";
        // line 850
        echo ($context["text_tool_user_instruction"] ?? null);
        echo "</h2>
                  <ul class=\"load__list\">
\t\t\t\t  ";
        // line 852
        if (($context["draw"] ?? null)) {
            // line 853
            echo "\t\t\t\t  <li class=\"load__item\">
\t\t\t\t\t<svg width=\"18\" height=\"20\" viewBox=\"0 0 18 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t\t  <path
\t\t\t\t\t\td=\"M0.9985 0C0.44749 0 0 0.44405 0 0.9918V19.0082C0 19.5447 0.44476 20 0.9934 20H17.0066C17.5551 20 18 19.5489 18 18.9925L17.9997 5L13 0H0.9985ZM7.5 5.5H9.5C9.5 7.98994 11.6436 10.6604 14.3162 11.5513L13.8586 13.49C10.7234 13.0421 7.4821 14.3804 4.5547 16.3321L3.3753 14.7191C4.46149 13.8502 5.50293 12.3757 6.27499 10.6534C7.0443 8.9373 7.5 7.07749 7.5 5.5ZM8.1 11.4716C8.3673 10.8752 8.6043 10.2563 8.8037 9.6285C9.2754 10.3531 9.8553 11.0182 10.5102 11.5953C9.5284 11.7711 8.5666 12.0596 7.6353 12.4276C7.8 12.1143 7.9551 11.7948 8.1 11.4716Z\"
\t\t\t\t\t\tfill=\"#101010\"
\t\t\t\t\t  />
\t\t\t\t\t</svg>
\t\t\t\t\t<a href=\"";
            // line 860
            echo ($context["draw"] ?? null);
            echo "\" class=\"load__link\" target=\"_blank\">";
            echo ($context["text_draw"] ?? null);
            echo "</a>
\t\t\t\t  </li>
\t\t\t\t  ";
        }
        // line 863
        echo "\t\t\t\t  ";
        if (($context["instruction"] ?? null)) {
            // line 864
            echo "\t\t\t\t  <li class=\"load__item\">
\t\t\t\t\t  <svg width=\"18\" height=\"20\" viewBox=\"0 0 18 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t\t  <path
\t\t\t\t\t  d=\"M0.9985 0C0.44749 0 0 0.44405 0 0.9918V19.0082C0 19.5447 0.44476 20 0.9934 20H17.0066C17.5551 20 18 19.5489 18 18.9925L17.9997 5L13 0H0.9985ZM7.5 5.5H9.5C9.5 7.98994 11.6436 10.6604 14.3162 11.5513L13.8586 13.49C10.7234 13.0421 7.4821 14.3804 4.5547 16.3321L3.3753 14.7191C4.46149 13.8502 5.50293 12.3757 6.27499 10.6534C7.0443 8.9373 7.5 7.07749 7.5 5.5ZM8.1 11.4716C8.3673 10.8752 8.6043 10.2563 8.8037 9.6285C9.2754 10.3531 9.8553 11.0182 10.5102 11.5953C9.5284 11.7711 8.5666 12.0596 7.6353 12.4276C7.8 12.1143 7.9551 11.7948 8.1 11.4716Z\"
\t\t\t\t\t  fill=\"#101010\"
\t\t\t\t\t  />
\t\t\t\t\t </svg>
\t\t\t\t\t <a href=\"";
            // line 871
            echo ($context["instruction"] ?? null);
            echo "\" class=\"load__link\" target=\"_blank\">";
            echo ($context["text_instruction"] ?? null);
            echo "</a>
\t\t\t\t  </li>
\t\t\t      ";
        }
        // line 874
        echo "                  </ul>
                </div>
              </div>
            </aside>
          </div>
\t  </div>
\t</section>

\t";
        // line 882
        echo ($context["content_bottom"] ?? null);
        echo "
    
\t";
        // line 884
        if (($context["products"] ?? null)) {
            // line 885
            echo "\t<section class=\"section__regular bestsellers\">
\t  <div class=\"bestsellers__container main__swiper-container\">
\t\t<div class=\"hero__title-row bestsellers__title-row\">
\t\t  <h3 class=\"bestsellers__title\">";
            // line 888
            echo ($context["text_related"] ?? null);
            echo ":</h3>
\t\t</div>
\t\t<div class=\"bestsellers__row\">
\t\t  <div class=\"swiper main__swiper-2\">
\t\t  <div class=\"swiper-wrapper main__swiper-wrapper\">
\t\t  ";
            // line 893
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                echo " 
\t\t  <div class=\"swiper-slide\">
\t\t\t<div class=\"product ";
                // line 895
                if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 895) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 895) < 1))) {
                    echo "out-of-stock";
                }
                echo "\">
\t\t\t  <div class=\"product__wrapper\">
\t\t\t\t<div class=\"product__labels\">
\t\t\t\t";
                // line 898
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 898))) {
                    // line 899
                    echo "\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 899));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 900
                        echo "\t\t\t\t  <span class=\"product__labels-label\">";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 900);
                        echo "</span>
\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 902
                    echo "\t\t\t\t";
                }
                // line 903
                echo "\t\t\t\t";
                if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 903))) {
                    // line 904
                    echo "\t\t\t\t";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 904));
                    foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                        // line 905
                        echo "\t\t\t\t  <span class=\"product__labels-label\">";
                        echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 905);
                        echo "</span>
\t\t\t\t";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 907
                    echo "\t\t\t\t";
                }
                // line 908
                echo "\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "is_rotate", [], "any", false, false, false, 908)) {
                    // line 909
                    echo "\t\t\t\t  <span class=\"product__labels-overwiev\">
\t\t\t\t\t<img src=\"catalog/view/theme/default/image//product/overview.png\" alt=\"360\" />
\t\t\t\t  </span>
\t\t\t\t";
                }
                // line 913
                echo "\t\t\t  </div>
\t\t\t\t<div class=\"product__like\">
\t\t\t\t  <svg class=\"product__like-item product-like-";
                // line 915
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 915);
                if (twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 915)) {
                    echo " product__like-active";
                }
                echo "\" viewBox=\"0 0 24 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" id=\"product-like-";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 915);
                echo "\" ";
                if ( !twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 915)) {
                    echo "onclick=\"wishlist.add(";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 915);
                    echo ")\"";
                }
                echo ">
\t\t\t\t\t<path
\t\t\t\t\t   d=\"M11.9626 19.5381L2.10281 9.80024C1.07574 8.78576 0.5 7.41137 0.5 5.97966C0.5 4.548 1.07574 3.17365 2.10281 2.15928C3.13034 1.1449 4.52508 0.573975 5.98067 0.573975C7.43626 0.573975 8.83108 1.1449 9.85873 2.15928L11.9626 4.23506L14.0665 2.15928C15.094 1.1449 16.4888 0.573975 17.9444 0.573975C19.4 0.573975 20.7948 1.1449 21.8224 2.15928C22.8499 3.17365 23.4287 4.548 23.4287 5.97966C23.4287 7.41137 22.8499 8.78576 21.8224 9.80024L11.9626 19.5381Z\"
\t\t\t\t\t/>
\t\t\t\t  </svg>
\t\t\t\t</div>
\t\t\t\t<div class=\"product__image\">
\t\t\t\t  <a class=\"product__image-link\" href=\"";
                // line 922
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 922);
                echo "\">
\t\t\t\t\t<img class=\"product__image-item\" src=\"";
                // line 923
                echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 923);
                echo "\" alt=\"Product\" />
\t\t\t\t  </a>
\t\t\t\t</div>
\t\t\t\t<div class=\"product__content-row\">
\t\t\t\t  <div class=\"product__content\">
\t\t\t\t\t<h4 class=\"product__title\"><a href=\"";
                // line 928
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 928);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 928);
                echo "</a></h4>
\t\t\t\t\t<div class=\"product__rating\">
\t\t\t\t\t  <div class=\"rating\">
\t\t\t\t\t  ";
                // line 931
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 932
                    echo "\t\t\t\t\t  ";
                    if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 932) < $context["i"])) {
                        // line 933
                        echo "\t\t\t\t\t  <span class=\"rating-star\"></span>
\t\t\t\t\t  ";
                    } else {
                        // line 935
                        echo "\t\t\t\t\t  <span class=\"rating-star rating-filled\"></span>
\t\t\t\t\t  ";
                    }
                    // line 937
                    echo "\t\t\t\t\t  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 938
                echo "\t\t\t\t\t  </div>
\t\t\t\t\t  <span class=\"product__rating-total\">";
                // line 939
                echo twig_get_attribute($this->env, $this->source, $context["product"], "reviews", [], "any", false, false, false, 939);
                echo "</span>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"product__price-row\">
\t\t\t\t\t";
                // line 942
                if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 942)) {
                    // line 943
                    echo "\t\t\t\t\t<p class=\"product__price\">
\t\t\t\t\t  <span>";
                    // line 944
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 944);
                    echo "</span>
\t\t\t\t\t</p>
\t\t\t\t\t";
                } else {
                    // line 947
                    echo "\t\t\t\t\t<p class=\"product__price\">
\t\t\t\t\t  ";
                    // line 948
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 948);
                    echo "
\t\t\t\t\t</p>
\t\t\t\t\t";
                }
                // line 951
                echo "\t\t\t\t\t";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 951)) {
                    // line 952
                    echo "\t\t\t\t\t<p class=\"product__price-old\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 952);
                    echo "</p>
\t\t\t\t\t";
                }
                // line 954
                echo "\t\t\t\t\t</div>
\t\t\t\t  </div>
\t\t\t\t  <div class=\"product__badges\">
\t\t\t\t  ";
                // line 957
                if (twig_get_attribute($this->env, $this->source, $context["product"], "gifts", [], "any", false, false, false, 957)) {
                    // line 958
                    echo "\t\t\t\t  <span class=\"product__badge-present\">";
                    echo ($context["text_gift"] ?? null);
                    echo "</span>
\t\t\t\t  ";
                }
                // line 960
                echo "\t\t\t\t  ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "is_new", [], "any", false, false, false, 960)) {
                    // line 961
                    echo "\t\t\t\t  <span class=\"product__badge-new\">New</span>
\t\t\t\t  ";
                }
                // line 963
                echo "\t\t\t\t  ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 963)) {
                    // line 964
                    echo "\t\t\t\t  <span class=\"product__badge-discount\">-";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "percent", [], "any", false, false, false, 964);
                    echo "%</span>
\t\t\t\t  ";
                }
                // line 966
                echo "\t\t\t\t  </div>
\t\t\t\t</div>
\t\t\t\t<div class=\"product__additional\">
\t\t\t\t  <button class=\"product__additional-button\" onclick=\"cart.add('";
                // line 969
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 969);
                echo "');\">
\t\t\t\t\t<svg class=\"product__additional-icon\"><use href=\"assets/icons.svg#cartSmall\"></use></svg>
\t\t\t\t\t<p>";
                // line 971
                echo ($context["button_cart"] ?? null);
                echo "</p>
\t\t\t\t  </button>
\t\t\t\t  <ul class=\"product__additional-attributes\">
\t\t\t\t  ";
                // line 974
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "attributes", [], "any", false, false, false, 974));
                foreach ($context['_seq'] as $context["_key"] => $context["attr"]) {
                    // line 975
                    echo "\t\t\t\t  <li class=\"product__additional-attribute\">
\t\t\t\t\t<span>";
                    // line 976
                    echo twig_get_attribute($this->env, $this->source, $context["attr"], "name", [], "any", false, false, false, 976);
                    echo "</span>
\t\t\t\t\t";
                    // line 977
                    echo twig_get_attribute($this->env, $this->source, $context["attr"], "text", [], "any", false, false, false, 977);
                    echo "
\t\t\t\t\t</li>
\t\t\t\t  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attr'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 980
                echo "\t\t\t\t  </ul>
\t\t\t\t</div>
\t\t\t  </div>
\t\t\t</div>
\t\t</div>
\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 986
            echo "\t</div>
\t\t</div>
\t\t<div class=\"swiper-button-prev main__swiper-button-prev main__swiper-button-prev-2\"></div>
\t\t<div class=\"swiper-button-next main__swiper-button-next main__swiper-button-next-2\"></div>
\t  </div>
\t</section>
    ";
        }
        // line 993
        echo "
\t<section class=\"section__regular single_block\">
\t  <div class=\"single_block__container\">
\t\t<div class=\"single_block__wrapper\">
\t\t  <div class=\"single_block__parameter\">
\t\t\t<h2 class=\"h2 single_block__header\">";
        // line 998
        echo ($context["text_attrs"] ?? null);
        echo "</h2>
\t\t\t<div class=\"load\">
\t\t\t  <ul class=\"load__list\">
\t\t\t  ";
        // line 1001
        if (($context["draw"] ?? null)) {
            // line 1002
            echo "\t\t\t\t<li class=\"load__item\">
\t\t\t\t  <svg width=\"18\" height=\"20\" viewBox=\"0 0 18 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t\t<path
\t\t\t\t\t  d=\"M0.9985 0C0.44749 0 0 0.44405 0 0.9918V19.0082C0 19.5447 0.44476 20 0.9934 20H17.0066C17.5551 20 18 19.5489 18 18.9925L17.9997 5L13 0H0.9985ZM7.5 5.5H9.5C9.5 7.98994 11.6436 10.6604 14.3162 11.5513L13.8586 13.49C10.7234 13.0421 7.4821 14.3804 4.5547 16.3321L3.3753 14.7191C4.46149 13.8502 5.50293 12.3757 6.27499 10.6534C7.0443 8.9373 7.5 7.07749 7.5 5.5ZM8.1 11.4716C8.3673 10.8752 8.6043 10.2563 8.8037 9.6285C9.2754 10.3531 9.8553 11.0182 10.5102 11.5953C9.5284 11.7711 8.5666 12.0596 7.6353 12.4276C7.8 12.1143 7.9551 11.7948 8.1 11.4716Z\"
\t\t\t\t\t  fill=\"#101010\"
\t\t\t\t\t/>
\t\t\t\t  </svg>
\t\t\t\t  <a href=\"";
            // line 1009
            echo ($context["draw"] ?? null);
            echo "\" class=\"load__link\" target=\"_blank\">";
            echo ($context["text_draw"] ?? null);
            echo "</a>
\t\t\t\t</li>
\t\t\t";
        }
        // line 1012
        echo "\t\t\t";
        if (($context["instruction"] ?? null)) {
            // line 1013
            echo "\t\t\t\t<li class=\"load__item\">
\t\t\t\t  <svg width=\"18\" height=\"20\" viewBox=\"0 0 18 20\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t\t<path
\t\t\t\t\t  d=\"M0.9985 0C0.44749 0 0 0.44405 0 0.9918V19.0082C0 19.5447 0.44476 20 0.9934 20H17.0066C17.5551 20 18 19.5489 18 18.9925L17.9997 5L13 0H0.9985ZM7.5 5.5H9.5C9.5 7.98994 11.6436 10.6604 14.3162 11.5513L13.8586 13.49C10.7234 13.0421 7.4821 14.3804 4.5547 16.3321L3.3753 14.7191C4.46149 13.8502 5.50293 12.3757 6.27499 10.6534C7.0443 8.9373 7.5 7.07749 7.5 5.5ZM8.1 11.4716C8.3673 10.8752 8.6043 10.2563 8.8037 9.6285C9.2754 10.3531 9.8553 11.0182 10.5102 11.5953C9.5284 11.7711 8.5666 12.0596 7.6353 12.4276C7.8 12.1143 7.9551 11.7948 8.1 11.4716Z\"
\t\t\t\t\t  fill=\"#101010\"
\t\t\t\t\t/>
\t\t\t\t  </svg>
\t\t\t\t  <a href=\"";
            // line 1020
            echo ($context["instruction"] ?? null);
            echo "\" class=\"load__link\" target=\"_blank\">";
            echo ($context["text_instruction"] ?? null);
            echo "</a>
\t\t\t\t</li>
\t\t\t";
        }
        // line 1023
        echo "\t\t\t  </ul>
\t\t\t</div>
\t\t\t<div class=\"product-parameters\">
\t\t\t  <ul class=\"parameters__wrapper\">
\t\t\t    ";
        // line 1027
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["main_attributes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["attr"]) {
            // line 1028
            echo "\t\t\t\t<li class=\"parameters__item\">
\t\t\t\t  <p class=\"parameters__label\">";
            // line 1029
            echo twig_get_attribute($this->env, $this->source, $context["attr"], "name", [], "any", false, false, false, 1029);
            echo "</p>
\t\t\t\t  <p class=\"parameters__value\">";
            // line 1030
            echo twig_get_attribute($this->env, $this->source, $context["attr"], "text", [], "any", false, false, false, 1030);
            echo "</p>
\t\t\t\t</li>
\t\t\t    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1033
        echo "\t\t\t  </ul>
\t\t\t  <ul class=\"parameters__wrapper\" id=\"hidden-attrs3\">
\t\t\t\t";
        // line 1035
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["another_attributes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["attr"]) {
            // line 1036
            echo "\t\t\t\t<li class=\"parameters__item\">
\t\t\t\t\t<p class=\"parameters__label\">";
            // line 1037
            echo twig_get_attribute($this->env, $this->source, $context["attr"], "name", [], "any", false, false, false, 1037);
            echo "</p>
\t\t\t\t\t<p class=\"parameters__value\">";
            // line 1038
            echo twig_get_attribute($this->env, $this->source, $context["attr"], "text", [], "any", false, false, false, 1038);
            echo "</p>
\t\t\t\t</li>
\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attr'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1041
        echo "\t\t\t\t</ul>
\t\t\t</div>
\t\t\t<a class=\"single_block__button\" id=\"show-attrs3\">";
        // line 1043
        echo ($context["text_all_attrs"] ?? null);
        echo "</a>
\t\t  </div>
\t\t  <div class=\"single_block__feedback\">
\t\t\t<h2 class=\"h2 single_block__header\">
\t\t\t  ";
        // line 1047
        echo ($context["text_review"] ?? null);
        echo "
\t\t\t  <span>";
        // line 1048
        echo ($context["reviews_count"] ?? null);
        echo "</span>
\t\t\t</h2>
\t\t\t<div class=\"single_block__feedback_block\">
\t\t\t  ";
        // line 1051
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["main_reviews"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["feedback"]) {
            // line 1052
            echo "\t\t\t  <div class=\"feedback\">
\t\t\t\t<div class=\"feedback__wrapper\">
\t\t\t\t  <div class=\"feedback__account\">
\t\t\t\t\t<div class=\"feedback__image_wrapper\">
\t\t\t\t\t  <img class=\"feedback__image\" src=\"image/icon/user-icon.svg\" alt=\"Profile image\" />
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"feedback__account_info\">
\t\t\t\t\t  <h6 class=\"feedback__name\">";
            // line 1059
            echo twig_get_attribute($this->env, $this->source, $context["feedback"], "author", [], "any", false, false, false, 1059);
            echo "</h6>
\t\t\t\t\t  <div class=\"rating\" bis_skin_checked=\"1\">
\t\t\t\t\t  ";
            // line 1061
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 1062
                echo "\t\t\t\t\t  ";
                if ((twig_get_attribute($this->env, $this->source, $context["feedback"], "rating", [], "any", false, false, false, 1062) < $context["i"])) {
                    // line 1063
                    echo "\t\t\t\t\t  <span class=\"rating-star\"></span>
\t\t\t\t\t  ";
                } else {
                    // line 1065
                    echo "\t\t\t\t\t  <span class=\"rating-star rating-filled\"></span>
\t\t\t\t\t  ";
                }
                // line 1067
                echo "\t\t\t\t\t  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 1068
            echo "\t\t\t\t\t  </div>
\t\t\t\t\t</div>
\t\t\t\t  </div>
\t\t\t\t  <span class=\"feedback__date\">";
            // line 1071
            echo twig_get_attribute($this->env, $this->source, $context["feedback"], "date_added", [], "any", false, false, false, 1071);
            echo "</span>
\t\t\t\t  <div class=\"feedback__content\">
\t\t\t\t\t<p>";
            // line 1073
            echo twig_get_attribute($this->env, $this->source, $context["feedback"], "text", [], "any", false, false, false, 1073);
            echo "</p>
\t\t\t\t  </div>
\t\t\t\t  <div class=\"feedback__button_row\">
\t\t\t\t   <a href=\"javascript:;\" class=\"feedback__respond answer-link\" data-fancybox data-src=\"#form-answer-review\" onclick=\"\$('#review-id').val('";
            // line 1076
            echo twig_get_attribute($this->env, $this->source, $context["feedback"], "id", [], "any", false, false, false, 1076);
            echo "');\">";
            echo ($context["set_answer"] ?? null);
            echo "</a>
\t\t\t\t\t<span class=\"feedback__deco\"></span>
\t\t\t\t\t<span class=\"feedback__quantity\">";
            // line 1078
            echo twig_get_attribute($this->env, $this->source, $context["feedback"], "answers", [], "any", false, false, false, 1078);
            echo "</span>
\t\t\t\t  </div>
\t\t\t\t</div>
\t\t\t  </div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['feedback'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1083
        echo "\t\t    <div id=\"hidden-feedbacks\">
\t\t\t";
        // line 1084
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["another_reviews"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["feedback"]) {
            // line 1085
            echo "\t\t\t  <div class=\"feedback\">
\t\t\t\t<div class=\"feedback__wrapper\">
\t\t\t\t  <div class=\"feedback__account\">
\t\t\t\t\t<div class=\"feedback__image_wrapper\">
\t\t\t\t\t  <img class=\"feedback__image\" src=\"image/icon/user-icon.svg\" alt=\"Profile image\" />
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"feedback__account_info\">
\t\t\t\t\t  <h6 class=\"feedback__name\">";
            // line 1092
            echo twig_get_attribute($this->env, $this->source, $context["feedback"], "author", [], "any", false, false, false, 1092);
            echo "</h6>
\t\t\t\t\t  <div class=\"rating\" bis_skin_checked=\"1\">
\t\t\t\t\t  ";
            // line 1094
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 1095
                echo "\t\t\t\t\t  ";
                if ((twig_get_attribute($this->env, $this->source, $context["feedback"], "rating", [], "any", false, false, false, 1095) < $context["i"])) {
                    // line 1096
                    echo "\t\t\t\t\t  <span class=\"rating-star\"></span>
\t\t\t\t\t  ";
                } else {
                    // line 1098
                    echo "\t\t\t\t\t  <span class=\"rating-star rating-filled\"></span>
\t\t\t\t\t  ";
                }
                // line 1100
                echo "\t\t\t\t\t  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 1101
            echo "\t\t\t\t\t  </div>
\t\t\t\t\t</div>
\t\t\t\t  </div>
\t\t\t\t  <span class=\"feedback__date\">";
            // line 1104
            echo twig_get_attribute($this->env, $this->source, $context["feedback"], "date_added", [], "any", false, false, false, 1104);
            echo "</span>
\t\t\t\t  <div class=\"feedback__content\">
\t\t\t\t\t<p>";
            // line 1106
            echo twig_get_attribute($this->env, $this->source, $context["feedback"], "text", [], "any", false, false, false, 1106);
            echo "</p>
\t\t\t\t  </div>
\t\t\t\t  <div class=\"feedback__button_row\">
\t\t\t\t  <a href=\"javascript:;\" class=\"answer-link data-fancybox\" data-fancybox data-src=\"#form-answer-review\" onclick=\"\$('#review-id').val('";
            // line 1109
            echo twig_get_attribute($this->env, $this->source, ($context["review"] ?? null), "id", [], "any", false, false, false, 1109);
            echo "');\"><img src=\"/image/answer-arrow-down.svg\"> ";
            echo ($context["set_answer"] ?? null);
            echo "</a>
\t\t\t\t\t<span class=\"feedback__deco\"></span>
\t\t\t\t\t<span class=\"feedback__quantity\">";
            // line 1111
            echo twig_get_attribute($this->env, $this->source, $context["feedback"], "answers", [], "any", false, false, false, 1111);
            echo " ";
            echo ($context["count_answer"] ?? null);
            echo "</span>
\t\t\t\t  </div>
\t\t\t\t</div>
\t\t\t  </div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['feedback'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1116
        echo "\t\t    </div>
\t\t\t</div>
\t\t\t<a class=\"single_block__button\" id=\"show-feedbacks\">";
        // line 1118
        echo ($context["text_review_all"] ?? null);
        echo "</a>
\t\t  </div>
\t\t</div>
\t  </div>
\t</section>

\t<section class=\"section__regular description_block\">
\t  <div class=\"description_block__container\">
\t\t<h2 class=\"description_block__title\">
\t\t  ";
        // line 1127
        echo ($context["text_description"] ?? null);
        echo "
\t\t  <span>";
        // line 1128
        echo ($context["heading_title"] ?? null);
        echo "</span>
\t\t</h2>
\t\t<div class=\"description_block__wrapper\">
\t\t  
\t\t\t\t";
        // line 1132
        echo ($context["description"] ?? null);
        echo "
\t\t\t\t";
        // line 1133
        if ((($context["giftor"] ?? null) && (($context["giftor_position"] ?? null) == "after"))) {
            echo ($context["giftor"] ?? null);
        }
        // line 1134
        echo "\t\t\t
\t\t</div>
\t  </div>
\t</section>

\t<section class=\"section__regular\">
\t  <div class=\"questions__container\">
\t\t<div class=\"questions__wrapper\">
\t\t  <div class=\"questions__row\">
\t\t  
\t\t\t<div class=\"questions__content\">
\t\t\t  ";
        // line 1145
        echo twig_get_attribute($this->env, $this->source, ($context["q_form"] ?? null), "description", [], "any", false, false, false, 1145);
        echo "
\t\t\t</div>
\t\t\t<form action=\"#\" class=\"questions__form\">
\t\t\t  <input class=\"questions__input\" type=\"text\" name=\"field[4]\" id=\"input-field4\" placeholder=\"+38 (0__) ___ __ __\" />
\t\t      <textarea id=\"input-field25\" name=\"field[25]\" style=\"display: none;\"></textarea>
\t\t\t  <input type=\"hidden\" id=\"input-field26\" name=\"field[26]\">
\t\t\t  <input type=\"hidden\" id=\"input-field27\" name=\"field[27]\">
\t\t\t  <input type=\"hidden\" id=\"input-field28\" name=\"field[28]\">
\t\t\t  <button class=\"button questions__button\" type=\"button\" id=\"button-buildersubmit1\">
\t\t\t\t<p>";
        // line 1154
        echo twig_get_attribute($this->env, $this->source, ($context["q_form"] ?? null), "submit_button", [], "any", false, false, false, 1154);
        echo "</p>
\t\t\t  </button>
\t\t\t</form>
\t\t  </div>
\t\t</div>
\t  </div>
\t</section>
\t<section class=\"product_secondary product_secondary--single_mod\">
\t\t\t  <div class=\"product_secondary__wrapper\">
\t\t\t\t<div class=\"product_secondary__main\">
\t\t\t\t  <div class=\"product_secondary__content\">
\t\t\t\t\t<div class=\"product__price-row\">
\t\t\t\t\t  <p class=\"product__price\">
\t\t\t\t\t    ";
        // line 1167
        if (($context["special"] ?? null)) {
            echo "  
\t\t\t\t\t\t<span>";
            // line 1168
            echo ($context["special"] ?? null);
            echo "</span>
\t\t\t\t\t\t";
        } else {
            // line 1170
            echo "\t\t\t\t\t    ";
            echo ($context["price"] ?? null);
            echo "
\t\t\t\t\t\t";
        }
        // line 1172
        echo "\t\t\t\t\t  </p>
\t\t\t\t\t  ";
        // line 1173
        if (($context["special"] ?? null)) {
            echo "  
\t\t\t\t\t  <p class=\"product__price-old\">";
            // line 1174
            echo ($context["price"] ?? null);
            echo "</p>
\t\t\t\t\t  ";
        }
        // line 1176
        echo "\t\t\t\t\t</div>
\t\t\t\t  </div>
\t\t\t\t</div>
\t\t\t\t<div class=\"product_secondary__buttons\">
\t\t\t\t  <button class=\"button\" onclick=\"cart.add('";
        // line 1180
        echo ($context["product_id"] ?? null);
        echo "');\">
\t\t\t\t\t<p>";
        // line 1181
        echo ($context["button_cart"] ?? null);
        echo "</p>
\t\t\t\t  </button>

\t\t\t\t  <button type=\"button\" class=\"button button_icon product_secondary__button_big\">
\t\t\t\t\t<span class=\"button_icon__icon product_secondary__button_big_icon\"></span>
\t\t\t\t\t";
        // line 1186
        echo ($context["text_pay_part"] ?? null);
        echo "
\t\t\t\t  </button>

\t\t\t\t  <a class=\"button button_gray product_secondary__button_gray\" ";
        // line 1189
        if ( !($context["wl_class"] ?? null)) {
            echo "onclick=\"wishlist.add(";
            echo ($context["product_id"] ?? null);
            echo ", '', '";
            echo ($context["to_wishlist"] ?? null);
            echo "', '";
            echo ($context["from_wishlist"] ?? null);
            echo "')\"";
        } else {
            echo "onclick=\"wishlist.remove(";
            echo ($context["product_id"] ?? null);
            echo ", '', '";
            echo ($context["from_wishlist"] ?? null);
            echo "', '";
            echo ($context["to_wishlist"] ?? null);
            echo "')\"";
        }
        echo ">
\t\t\t\t\t<svg class=\"product_secondary__button_gray_icon product-like-";
        // line 1190
        echo ($context["product_id"] ?? null);
        echo " ";
        if (($context["wl_class"] ?? null)) {
            echo "product__like-active";
        }
        echo "\" viewBox=\"0 0 24 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
\t\t\t\t\t  <path
\t\t\t\t\t\td=\"M11.9626 19.5381L2.10281 9.80024C1.07574 8.78576 0.5 7.41137 0.5 5.97966C0.5 4.548 1.07574 3.17365 2.10281 2.15928C3.13034 1.1449 4.52508 0.573975 5.98067 0.573975C7.43626 0.573975 8.83108 1.1449 9.85873 2.15928L11.9626 4.23506L14.0665 2.15928C15.094 1.1449 16.4888 0.573975 17.9444 0.573975C19.4 0.573975 20.7948 1.1449 21.8224 2.15928C22.8499 3.17365 23.4287 4.548 23.4287 5.97966C23.4287 7.41137 22.8499 8.78576 21.8224 9.80024L11.9626 19.5381Z\"
\t\t\t\t\t  />
\t\t\t\t\t</svg>
\t\t\t\t\t";
        // line 1195
        if ( !($context["wl_class"] ?? null)) {
            // line 1196
            echo "\t\t\t\t        <p class=\"in_wishlist\">";
            echo ($context["text_wl"] ?? null);
            echo "</p>
\t\t\t\t\t\t";
        } else {
            // line 1198
            echo "\t\t\t\t\t\t<p class=\"in_wishlist\">";
            echo ($context["text_from_wl"] ?? null);
            echo "</p>
\t\t\t\t\t\t";
        }
        // line 1200
        echo "\t\t\t\t  </a>
\t\t\t\t</div>
\t\t\t  </div>
\t\t\t</section>
  </main>
";
        // line 1278
        echo "\t\t\t\t\t\t\t\t\t\t\t ";
        // line 2086
        echo "\t\t\t\t\t\t\t\t\t";
        // line 2114
        echo "<!-- <iframe class=\"threede_view\" src=\"/";
        echo ($context["model"] ?? null);
        echo ".html\"></iframe> -->
<div id=\"review-modal\" style=\"display: none;\">
<form class=\"form-horizontal\" id=\"form-review\">
  <input type=\"hidden\" id=\"review-id\" name=\"review_id\" value=\"\">
<div class=\"user-review-write-block\">
<h2>";
        // line 2119
        echo ($context["text_write"] ?? null);
        echo "</h2>
<div style=\"display:";
        // line 2120
        echo ((( !twig_test_empty((($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = ($context["extended_reviews"] ?? null)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["limitations"] ?? null) : null)) && (($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = ($context["extended_reviews"] ?? null)) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4["limitations"] ?? null) : null))) ? ("block") : ("none"));
        echo "\">
  <div class=\"form-group required\">
    <div class=\"col-sm-12\">
      <label for=\"input-text-plus\">";
        // line 2123
        echo ($context["text_plus"] ?? null);
        echo "</label>
      <input type=\"text\" name=\"plus\"  id=\"input-text-plus\" class=\"form-control\" />
    </div>
  </div>
  <div class=\"form-group required\">
    <div class=\"col-sm-12\">
      <label for=\"input-text-plus\">";
        // line 2129
        echo ($context["text_minus"] ?? null);
        echo "</label>
      <input type=\"text\" name=\"minus\"  id=\"input-text-minus\" class=\"form-control\" />
    </div>
  </div>
</div>
<div class=\"form-group required\">
  <div class=\"col-sm-12\">
    <label class=\"control-label\" for=\"input-name\">";
        // line 2136
        echo ($context["entry_name"] ?? null);
        echo "</label>
    <input type=\"text\" name=\"name\" value=\"";
        // line 2137
        echo ($context["customer_name"] ?? null);
        echo "\" id=\"input-name\" class=\"form-control\" />
  </div>
</div>
<div class=\"form-group required\">
  <div class=\"col-sm-12\">
    <label class=\"control-label\" for=\"input-review\">";
        // line 2142
        echo ($context["entry_review"] ?? null);
        echo "</label>
    <textarea name=\"text\" rows=\"5\" id=\"input-review\" class=\"form-control\"></textarea>
  </div>
</div>
<div class =\"images-user-content-block\">
</div>
";
        // line 2148
        if (((($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 = ($context["extended_reviews"] ?? null)) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666["photo_status"] ?? null) : null) || (($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e = ($context["extended_reviews"] ?? null)) && is_array($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e) || $__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e instanceof ArrayAccess ? ($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e["video_status"] ?? null) : null))) {
            // line 2149
            echo "<div class =\"reviews-user-add-content-block\">
  ";
            // line 2150
            if ((($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 = ($context["extended_reviews"] ?? null)) && is_array($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52) || $__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 instanceof ArrayAccess ? ($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52["photo_status"] ?? null) : null)) {
                // line 2151
                echo "<div class=\"review-media-add-block\">
  <span class=\"btn-link-review\"><a class=\"btn-link-i\" id=\"add-photo\" href=\"#media-content-popup\">
  <svg class=\"media-add-button-icon\">
    <svg viewBox=\"0 0 38 34\"  xmlns=\"http://www.w3.org/2000/svg\" width=\"100%\" height=\"100%\">
      <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M27.994 32H4a4 4 0 0 1-4-4V4.008a4 4 0 0 1 4-4h23.992a4 4 0 0 1 4 4V28a4 4 0 0 1-3.998 4zm2.865-27.99a2.869 2.869 0 0 0-2.865-2.865H4A2.869 2.869 0 0 0 1.135 4.01V28A2.869 2.869 0 0 0 4 30.866h23.992A2.869 2.869 0 0 0 30.859 28V4.008v.002z\"></path><path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M17 20l-5-5-7 7v-2l7-7 5 5 4-4 7 7v2l-7-7-4 4z\"></path>
      <path d=\"M30.5 34a7.5 7.5 0 1 0 0-15 7.5 7.5 0 0 0 0 15z\"></path>
      <path d=\"M30.5 23a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0v-6a.5.5 0 0 1 .5-.5z\" fill=\"#fff\"></path>
      <path d=\"M27.5 26h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1 0-1z\" fill=\"#fff\"></path>
      <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M21.5 12a2.5 2.5 0 1 1 0-5 2.5 2.5 0 0 1 0 5zm0-4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z\"></path>
      <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M4 4h24v20H4V4zm1 1h22v18H5V5z\"></path></svg>
  </svg>
  <span class=\"btn-link-text\">";
                // line 2162
                echo ($context["text_add_photo"] ?? null);
                echo "</span>
</a></span>
</div>
";
            }
            // line 2166
            if ((($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 = ($context["extended_reviews"] ?? null)) && is_array($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136) || $__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 instanceof ArrayAccess ? ($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136["video_status"] ?? null) : null)) {
                // line 2167
                echo "<div class=\"review-media-add-block\">
  <span class=\"btn-link-review\"><a class=\"btn-link-i\" id=\"add-video\" href=\"#media-content-popup\">
  <svg class=\"media-add-button-icon\">
  <svg viewBox=\"0 0 38 34\" xmlns=\"http://www.w3.org/2000/svg\" width=\"100%\" height=\"100%\">
    <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M27.994 32H4a4 4 0 0 1-4-4V4.01a4 4 0 0 1 4-4h23.992a4 4 0 0 1 4 4V28a4 4 0 0 1-3.998 4zm2.865-27.99a2.869 2.869 0 0 0-2.865-2.867H4A2.869 2.869 0 0 0 1.135 4.01V28A2.873 2.873 0 0 0 4 30.87h23.992A2.873 2.873 0 0 0 30.857 28V4.01h.002zM24.02 26.7a64.388 64.388 0 0 1-7.958.3c-2.375 0-5.978-.06-7.362-.18-2.7-.24-2.462-3.57-2.581-6.35.001-1.427.122-2.852.36-4.26.541-2.32 2.042-2.02 4.206-2.14.23 0 1.92-.06 5.285-.06 4.983.06 6.546 0 7.926.24 2.1.3 1.925 3.63 2.044 6.19-.063 3.02-.076 4.43-.779 5.37-.276.41-.676.722-1.141.89zM11.945 15.98H7.98v1.25H9.3v7.21h1.266v-7.21h1.379c.03-.416.03-.833 0-1.25zm3.544 2.2h-1.142v4.77c-.144.28-.41.476-.719.53a.255.255 0 0 1-.3-.23v-5.07h-1.141v5.19c0 .77.243 1.19.9 1.19.504-.09.954-.369 1.26-.78v.72h1.142v-6.32zm4.387 1.01a1.052 1.052 0 0 0-1.082-1.13 2.03 2.03 0 0 0-1.142.72v-2.75h-1.141v8.47h1.141v-.66c.319.447.831.715 1.38.72.72 0 .844-1.19.844-1.19v-4.18zm4.382 3.1h-1.141v.48s0 .71-.482.71a.636.636 0 0 1-.66-.71v-1.25h2.283v-1.73a1.573 1.573 0 0 0-1.623-1.67c-1.439 0-1.558.72-1.682 1.07a2.456 2.456 0 0 0-.119.6v2.98a1.73 1.73 0 0 0 1.861 1.79 1.68 1.68 0 0 0 1.5-1.19 3.61 3.61 0 0 0 .063-1.08zm-3.92-10.61c-.318.392-.76.664-1.252.77a.826.826 0 0 1-.894-.94V6.128h1.132v5.023s-.059.3.358.3a1.05 1.05 0 0 0 .656-.54V6.128h1.131v6.263h-1.131v-.71zm-4.521.75a3.267 3.267 0 0 1-.438.01 1.536 1.536 0 0 1-1.179-.7 2.06 2.06 0 0 1-.3-.94V7.842c0-.178.059-.59.059-.59a1.65 1.65 0 0 1 1.34-1.154 1.63 1.63 0 0 1 .526 0c.637.09 1.165.54 1.352 1.156 0 0 .059.413.059.591v2.958a2.063 2.063 0 0 1-.3.94c-.249.388-.66.64-1.119.688zm-.246-5.357s-.6-.06-.6.77V10.8a.56.56 0 0 0 .6.65.526.526 0 0 0 .536-.65V7.842s.06-.769-.536-.769zm-3.277 5.258H11.1V8.96L9.494 4h1.311l.893 3.251L12.591 4h1.252l-1.549 4.961v3.37zm10.823 7.46a.685.685 0 0 0-.541-.66.672.672 0 0 0-.6.66v.77h1.142v-.77h-.001zm-4.864-.66a.863.863 0 0 0-.541.24v3.88a.76.76 0 0 0 .541.23.506.506 0 0 0 .481-.53v-3.16a.54.54 0 0 0-.481-.66z\"></path>
    <path d=\"M30.5 34a7.5 7.5 0 1 0 0-15 7.5 7.5 0 0 0 0 15z\"></path>
    <path d=\"M30.5 23a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0v-6a.5.5 0 0 1 .5-.5z\" fill=\"#fff\"></path>
    <path d=\"M27.5 26h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1 0-1z\" fill=\"#fff\"></path></svg>
  </svg>
  <span class=\"btn-link-text\">";
                // line 2176
                echo ($context["text_add_video"] ?? null);
                echo "</span>
</a></span>
</div>
";
            }
            // line 2180
            echo "<div class=\"review-media-text-block\">
  <svg class=\"user-content-add-caption-arrow\">
  <svg overflow=\"scroll\" viewBox=\"0 0 47 22\" id=\"arrow-left-soft\" xmlns=\"http://www.w3.org/2000/svg\" width=\"100%\" height=\"100%\">
    <g fill=\"none\"><path d=\"M0 0h47v22H0z\"></path>
      <path fill=\"#a6a5a5\" d=\"M46.585 2.753c-3.199 2.8-17.394 7.7-25.49 7.7-8.598 0-8.298-2.3-8.298-2.3.1-1.7 5.198-.3 9.397-.5 8.097-.6 16.094-2.4 23.791-5.4.3-.1 1.7-.5.6.5zm-33.888.4s-9.796 3.5-9.796 5.2S17.595 19.85 17.595 19.85s2.3 1.8 1 2.1-3.299-.8-4.898-2.1S.202 11.052.002 8.353 14.697-.646 17.595.053s-4.898 3.1-4.898 3.1z\"></path>
    </g></svg>
  </svg>
  ";
            // line 2187
            echo ($context["text_add_media_note"] ?? null);
            echo "
</div>
</div>
";
        }
        // line 2191
        echo "  <div class=\"form-group required\">
    <h4 style=\"padding-left: 15px;\">";
        // line 2192
        echo ($context["text_grade"] ?? null);
        echo "</h4> 
<div class=\"add-review-star-wrap\" id='super-stars'>
<div class='star-block' value='1'><i class=\"fa fa-star star-gray star-3x\" style=\"font-size: 14px !important;\"></i></div>
<div class='star-block' value='2'><i class=\"fa fa-star star-gray star-3x\" style=\"font-size: 14px !important;\"></i></div>
<div class='star-block' value='3'><i class=\"fa fa-star star-gray star-3x\" style=\"font-size: 14px !important;\"></i></div>
<div class='star-block' value='4'><i class=\"fa fa-star star-gray star-3x\" style=\"font-size: 14px !important;\"></i></div>
<div class='star-block' value='5'><i class=\"fa fa-star star-gray star-3x\" style=\"font-size: 14px !important;\"></i></div>
</div>
<input type=\"hidden\" value=\"0\" id=\"rating\" name=\"rating\">
  </div>
";
        // line 2202
        echo ($context["captcha"] ?? null);
        echo "
<input type=\"hidden\" name=\"image_id\"  id=\"input-image-id\" class=\"form-control\" />
<input type=\"hidden\" name=\"video_links\"  id=\"input-video-links\" class=\"form-control\" />
<div class=\"review-form-write-footer\">
  ";
        // line 2206
        if (($context["review_guest"] ?? null)) {
            // line 2207
            echo "    <button type=\"button\" id=\"button-review-extended\" data-loading-text=\"";
            echo ($context["text_loading"] ?? null);
            echo "\" class=\"btn btn-primary\">";
            echo ($context["leave_feedback"] ?? null);
            echo "</button>
";
        } else {
            // line 2209
            echo "  <div class=\"review-alert alert-info\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["text_login"] ?? null);
            echo "</div>
";
        }
        // line 2211
        echo "</div>
</div>
</form>
</div>
<script type=\"text/javascript\"><!--
\$('select[name=\\'recurring_id\\'], input[name=\"quantity\"]').change(function(){
\t\$.ajax({
\t\turl: 'index.php?route=product/product/getRecurringDescription',
\t\ttype: 'post',
\t\tdata: \$('input[name=\\'product_id\\'], input[name=\\'quantity\\'], select[name=\\'recurring_id\\']'),
\t\tdataType: 'json',
\t\tbeforeSend: function() {
\t\t\t\$('#recurring-description').html('');
\t\t},
\t\tsuccess: function(json) {
\t\t\t\$('.alert-dismissible, .text-danger').remove();

\t\t\tif (json['success']) {
\t\t\t\t\$('#recurring-description').html(json['success']);
\t\t\t}
\t\t}
\t});
});
//--></script> 
<script type=\"text/javascript\"><!--
\$('#button-cart').on('click', function() {
\t\$.ajax({
\t\turl: 'index.php?route=checkout/cart/add',
\t\ttype: 'post',
\t\tdata: \$('#product input[type=\\'text\\'], #product input[type=\\'hidden\\'], #product input[type=\\'radio\\']:checked, #product input[type=\\'checkbox\\']:checked, #product select, #product textarea'),
\t\tdataType: 'json',
\t\tbeforeSend: function() {
\t\t\t\$('#button-cart').button('loading');
\t\t},
\t\tcomplete: function() {
\t\t\t\$('#button-cart').button('reset');
\t\t},
\t\tsuccess: function(json) {
\t\t\t\$('.alert-dismissible, .text-danger').remove();
\t\t\t\$('.form-group').removeClass('has-error');

\t\t\tif (json['error']) {
\t\t\t\tif (json['error']['option']) {
\t\t\t\t\tfor (i in json['error']['option']) {
\t\t\t\t\t\tvar element = \$('#input-option' + i.replace('_', '-'));

\t\t\t\t\t\tif (element.parent().hasClass('input-group')) {
\t\t\t\t\t\t\telement.parent().after('<div class=\"text-danger\">' + json['error']['option'][i] + '</div>');
\t\t\t\t\t\t} else {
\t\t\t\t\t\t\telement.after('<div class=\"text-danger\">' + json['error']['option'][i] + '</div>');
\t\t\t\t\t\t}
\t\t\t\t\t}
\t\t\t\t}

\t\t\t\tif (json['error']['recurring']) {
\t\t\t\t\t\$('select[name=\\'recurring_id\\']').after('<div class=\"text-danger\">' + json['error']['recurring'] + '</div>');
\t\t\t\t}

\t\t\t\t// Highlight any found errors
\t\t\t\t\$('.text-danger').parent().addClass('has-error');
\t\t\t}

\t\t\tif (json['success']) {
\t\t\t\t\$('.breadcrumb').after('<div class=\"alert alert-success alert-dismissible\">' + json['success'] + '<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');

\t\t\t\t\$('#cart > button > span').html(json['count_cart']);
\t\t\t\t\$('.secondary-footer__number').html(json['count_cart']);

\t\t\t\t\$('html, body').animate({ scrollTop: 0 }, 'slow');

\t\t\t\t\$('#cart > ul').load('index.php?route=common/cart/info ul li');
\t\t\t}
\t\t},
        error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
\t});
});

\$('#super-stars > div').on('click', function(){
\$('#super-stars > div').removeClass('star-active');
var id_val = \$(this).index()+1;
\$('#super-stars > .star-block:nth-child(-n+' + id_val + ')').addClass('star-active');
\$('#rating').val(id_val);
});

\$('#button-review-extended').on('click', function() {
\tvar product_id = ";
        // line 2298
        echo ($context["product_id"] ?? null);
        echo ";
var strImages = '';
var strVideos ='';
var btn = \$(this);
btn.button('loading');
// if(images_id){
//for(var i=0; i<images_id.length; i++){
//  if(images_id[i] != null)
//  strImages+=images_id[i] + ' ';
//}
//}
//if(video_links){
//for(var i=0; i<video_links.length; i++){
//  if(video_links[i] != null)
//  strVideos+=video_links[i] + ' ';
//}
//}
//inputImageId.val(strImages.trim());
//inputVideos.val(strVideos.trim()); 
\$.ajax({
  url: 'index.php?route=product/extended_reviews/write&product-id=' + product_id,
  type: 'post',
  dataType: 'json',
  data: \$(\"#form-review\").serialize(),
  success: function(json) {
    \$('.alert-success, .alert-danger').remove();
    if (json['error']) {
      \$('.review-form-write-footer').append('<div class=\"review-alert alert-danger m-r-20\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error'] + '</div>');
      btn.button('reset');
    }

    if (json['success']) {
      \$('.review-form-write-footer').append('<div class=\"review-alert alert-success m-r-20\"><i class=\"fa fa-check-circle\"></i> ' + json['success'] + '</div>');
      \$('input[name=\\'plus\\']').val('');
      \$('input[name=\\'minus\\']').val('');
      \$('input[name=\\'name\\']').val('');
      \$('textarea[name=\\'text\\']').val('');
      \$('input[name=\\'image_id\\']').val('');
      \$('input[name=\\'rating\\']').val('0');
      \$('.star-block').removeClass('star-active');
      \$('.images-user-content-block > div').remove();
      btn.button('reset');
      images_id = [];
      count = 0;
    }
  }
});
});
//--></script> 
<script type=\"text/javascript\"><!--
\$('.date').datetimepicker({
\tlanguage: '";
        // line 2349
        echo ($context["datepicker"] ?? null);
        echo "',
\tpickTime: false
});

\$('.datetime').datetimepicker({
\tlanguage: '";
        // line 2354
        echo ($context["datepicker"] ?? null);
        echo "',
\tpickDate: true,
\tpickTime: true
});

\$('.time').datetimepicker({
\tlanguage: '";
        // line 2360
        echo ($context["datepicker"] ?? null);
        echo "',
\tpickDate: false
});

\$('button[id^=\\'button-upload\\']').on('click', function() {
\tvar node = this;

\t\$('#form-upload').remove();

\t\$('body').prepend('<form enctype=\"multipart/form-data\" id=\"form-upload\" style=\"display: none;\"><input type=\"file\" name=\"file\" /></form>');

\t\$('#form-upload input[name=\\'file\\']').trigger('click');

\tif (typeof timer != 'undefined') {
    \tclearInterval(timer);
\t}

\ttimer = setInterval(function() {
\t\tif (\$('#form-upload input[name=\\'file\\']').val() != '') {
\t\t\tclearInterval(timer);

\t\t\t\$.ajax({
\t\t\t\turl: 'index.php?route=tool/upload',
\t\t\t\ttype: 'post',
\t\t\t\tdataType: 'json',
\t\t\t\tdata: new FormData(\$('#form-upload')[0]),
\t\t\t\tcache: false,
\t\t\t\tcontentType: false,
\t\t\t\tprocessData: false,
\t\t\t\tbeforeSend: function() {
\t\t\t\t\t\$(node).button('loading');
\t\t\t\t},
\t\t\t\tcomplete: function() {
\t\t\t\t\t\$(node).button('reset');
\t\t\t\t},
\t\t\t\tsuccess: function(json) {
\t\t\t\t\t\$('.text-danger').remove();

\t\t\t\t\tif (json['error']) {
\t\t\t\t\t\t\$(node).parent().find('input').after('<div class=\"text-danger\">' + json['error'] + '</div>');
\t\t\t\t\t}

\t\t\t\t\tif (json['success']) {
\t\t\t\t\t\talert(json['success']);

\t\t\t\t\t\t\$(node).parent().find('input').val(json['code']);
\t\t\t\t\t}
\t\t\t\t},
\t\t\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t\t\t}
\t\t\t});
\t\t}
\t}, 500);
});
//--></script> 
<script type=\"text/javascript\"><!--
\$('#review').delegate('.pagination a', 'click', function(e) {
    e.preventDefault();

    
    /* \$('#review').fadeOut('slow'); */
      

    \$('#review').load(this.href);

    
        /* \$('#review').fadeIn('slow'); */
          
});


";
        // line 2432
        if (twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["comments"] ?? null), "extended_reviews", [], "any", false, true, false, 2432), "status", [], "any", true, true, false, 2432)) {
            // line 2433
            echo "\$('#review-content').html('<div id=\"review\"></div>');
\$('#review').load('index.php?route=product/extended_reviews/review&product-id=";
            // line 2434
            echo ($context["product_id"] ?? null);
            echo "');
\$('#review').delegate('.pagination a', 'click', function(e) {
    e.preventDefault();
    \$('#review').load(this.href);
});
";
        } else {
            // line 2440
            echo "\$('#review').load('index.php?route=product/product/review&product_id=";
            echo ($context["product_id"] ?? null);
            echo "');
";
        }
        // line 2442
        echo "  

\$('#review-short').load('index.php?route=product/product/review&product_id=";
        // line 2444
        echo ($context["product_id"] ?? null);
        echo "');


\$('#button-review').on('click', function() {
\t\$.ajax({
\t\turl: 'index.php?route=product/product/write&product_id=";
        // line 2449
        echo ($context["product_id"] ?? null);
        echo "',
\t\ttype: 'post',
\t\tdataType: 'json',
\t\tdata: \$(\"#form-review\").serialize(),
\t\tbeforeSend: function() {
\t\t\t\$('#button-review').button('loading');
\t\t},
\t\tcomplete: function() {
\t\t\t\$('#button-review').button('reset');
\t\t},
\t\tsuccess: function(json) {
\t\t\t\$('.alert-dismissible').remove();

\t\t\tif (json['error']) {
\t\t\t\t\$('#review').after('<div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error'] + '</div>');
\t\t\t}

\t\t\tif (json['success']) {
\t\t\t\t\$('#review').after('<div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ' + json['success'] + '</div>');

\t\t\t\$('input[name=\\'name\\']').val('');
\t\t\t\t\$('textarea[name=\\'text\\']').val('');
\t\t\t\t\$('input[name=\\'rating\\']:checked').prop('checked', false);
\t\t\t}
\t\t}
\t});
});

";
        // line 2486
        echo "//--></script> 
<script type=\"text/javascript\">
\$(document).ready(function() {
    ";
        // line 2489
        if (($context["price_int"] ?? null)) {
            // line 2490
            echo "    ";
            if ( !($context["special_int"] ?? null)) {
                // line 2491
                echo "    var price = '";
                echo ($context["price_int"] ?? null);
                echo "';
    ";
            } else {
                // line 2493
                echo "    var price = '";
                echo ($context["special_int"] ?? null);
                echo "';
    ";
            }
        }
        // line 2495
        echo "
\t\$('#input-field16').text(\"";
        // line 2496
        echo ($context["heading_title"] ?? null);
        echo "\");
\t\$('#input-field16').hide();

\t\$('#input-field17').attr('value', price); 
\t\$('#input-field17').hide();

\t\$('#input-field18').attr('value', '";
        // line 2502
        echo ($context["model"] ?? null);
        echo "'); 
\t\$('#input-field18').hide();

\t\$('#input-field19').attr('value', '";
        // line 2505
        echo ($context["href_link"] ?? null);
        echo "'); 
\t\$('#input-field19').hide();

\t\$('#input-field25').text(\"";
        // line 2508
        echo ($context["heading_title"] ?? null);
        echo "\");
\t\$('#input-field25').hide();

\t\$('#input-field26').attr('value', price); 
\t\$('#input-field26').hide();

\t\$('#input-field27').attr('value', '";
        // line 2514
        echo ($context["model"] ?? null);
        echo "'); 
\t\$('#input-field27').hide();

\t\$('#input-field28').attr('value', '";
        // line 2517
        echo ($context["href_link"] ?? null);
        echo "'); 
\t\$('#input-field28').hide();

\t\$('#input-field29').attr('value', '";
        // line 2520
        echo ($context["product_id"] ?? null);
        echo "'); 
\t\$('#input-field29').hide();

    \$.fancybox.defaults.hash = false;
    \$.fancybox.defaults.loop = true;
    \$.fancybox.defaults.thumbs[\"autoStart\"] = true;
    \$.fancybox.defaults.mobile[\"thumbs\"] = {
      autoStart: true,
    };
    \$('[data-fancybox=\"images\"]').fancybox({
\t\tclickContent: false,
\t\tbaseClass: \"product-fancybox\",
\t\tbuttons : [
\t\t\t'close'
\t\t],
\t\tbtnTpl: {
\t\t\tclose:
\t\t\t  '<button data-fancybox-close class=\"fancybox-button fancybox-button--close\" title=\"";
        // line 2537
        echo ($context["CLOSE"] ?? null);
        echo "\" style=\"background-color: transparent !important;\">' +
\t\t\t  '<svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M12 10.6L6.6 5.2 5.2 6.6l5.4 5.4-5.4 5.4 1.4 1.4 5.4-5.4 5.4 5.4 1.4-1.4-5.4-5.4 5.4-5.4-1.4-1.4-5.4 5.4z\"/></svg>' +
\t\t\t  \"</button>\",
\t\t\tarrowLeft:
\t\t\t  '<button data-fancybox-prev class=\"fancybox-button fancybox-button--arrow_left\" title=\"";
        // line 2541
        echo ($context["PREV"] ?? null);
        echo "\">' +
\t\t\t  '<div><svg aria-hidden=\"true\" focusable=\"false\" data-prefix=\"fas\" data-icon=\"chevron-left\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 320 512\"><path fill=\"currentColor\" d=\"M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z\" class=\"\"></path></svg></div>' +
\t\t\t  \"</button>\",

\t\t\tarrowRight:
\t\t\t  '<button data-fancybox-next class=\"fancybox-button fancybox-button--arrow_right\" title=\"";
        // line 2546
        echo ($context["NEXT"] ?? null);
        echo "\">' +
\t\t\t  '<div><svg aria-hidden=\"true\" focusable=\"false\" data-prefix=\"fas\" data-icon=\"chevron-right\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 320 512\"><path fill=\"currentColor\" d=\"M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z\" class=\"\"></path></svg></div>' +
\t\t\t  \"</button>\",
\t\t},
\t\tbaseTpl:
\t\t\t'<div class=\"fancybox-container\" role=\"dialog\" tabindex=\"-1\">' +
\t\t\t'<div class=\"fancybox-bg\"></div>' +
\t\t\t'<div class=\"fancybox-inner\">' +
\t\t\t'<div class=\"fancybox-toolbar\"><button data-fancybox-close class=\"fancybox-button fancybox-button--close\"><svg xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 24 24\"><path d=\"M12 10.6L6.6 5.2 5.2 6.6l5.4 5.4-5.4 5.4 1.4 1.4 5.4-5.4 5.4 5.4 1.4-1.4-5.4-5.4 5.4-5.4-1.4-1.4-5.4 5.4z\"/></svg></button></div>' +
\t\t\t'<div class=\"fancybox-navigation\"><button data-fancybox-prev=\"\" class=\"fancybox-button fancybox-button--arrow_left\" title=\"Previous\"><div><svg aria-hidden=\"true\" focusable=\"false\" data-prefix=\"fas\" data-icon=\"chevron-left\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 320 512\"><path fill=\"currentColor\" d=\"M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z\" class=\"\"></path></svg></div></button><button data-fancybox-next=\"\" class=\"fancybox-button fancybox-button--arrow_right\" title=\"Next\"><div><svg aria-hidden=\"true\" focusable=\"false\" data-prefix=\"fas\" data-icon=\"chevron-right\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 320 512\"><path fill=\"currentColor\" d=\"M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z\" class=\"\"></path></svg></div></button></div>' +
\t\t\t'<div class=\"fancybox-stage\"></div>' +
\t\t\t'<div class=\"fancybox-caption\"><div class=\"fancybox-caption__body\"></div></div>' +
\t\t\t'<div class=\"fancy-price-details\"><div class=\"price-wrapp\"></div></div>' +
\t\t\t'</div>' +
\t\t\t'</div>',
      thumbs : {
\t\t  axis        : 'y'                     // Vertical (y) or horizontal (x) scrolling
      },
      mobile: {
        thumbs: {
          autoStart: true,
\t\t  \taxis: 'x'
        }
      },
      /* afterShow : function(  ) {
        if(\$('.three_de a').length > 0) {
          \$('.fancybox-thumbs__list a:last-child').html('<span></span>').addClass('fb_three_de');
        }
        if(\$('.three_de_video a').length > 0) {
          \$('.fancybox-thumbs__list a').eq(1).html('<span></span>').addClass('fb_three_de_video');
        }
      } */
    });
\t\t
/* Fancybox redesign window
***********************/
var openFancy = false;
var int = setInterval(function(){
  if(\$('body').hasClass('fancybox-active')){
    if(!openFancy){
\t\t\$( \".fancybox-navigation\" ).prependTo( \$( \".product-fancybox .fancybox-stage\" ) );
\t\t\$( \".fancybox-thumbs\" ).prependTo( \$( \".product-fancybox .fancybox-inner\" ) );
\t\t var thumbs = \$('.fancybox-thumbs a');
\t\t\$('#additional .image-additional.slick-active').each(function(i, el){
\t\t\tvar index = \$(el).attr('data-slick-index');
\t\t\tif(\$(el).find('.thumbnail').hasClass('rotate-cover')){
\t\t\t\tindex++;
\t\t\t\t\$(thumbs[index]).addClass('rotate-cover');
\t\t\t\tindex--;
\t\t\t}
\t\t\tif(\$(el).find('.thumbnail').hasClass('thumbnail_video')){
\t\t\t\tindex++;
\t\t\t\t\$(thumbs[index]).append('<img style=\"width: 100%; padding: 5px; position: absolute;top: 50%; left: 50%; transform: translate(-50%, -50%);\" class=\"video_icon\" src=\"image/video_icon.svg\">');
\t\t\t\tindex--;
\t\t\t}
\t\t});
\t\t\$('.threede_view').attr('src', '/";
        // line 2602
        echo ($context["model"] ?? null);
        echo ".html');
\t\t
\t\tvar p = \$( \".price-to-fancybox\" );
\t\tvar bc = \$( \".product-actions__buttons\" );
\t\t
\t\t\$( p[0] ).clone().appendTo( \".product-fancybox .fancybox-inner .fancy-price-details .price-wrapp\" );
\t\t\$( bc[0] ).clone().appendTo( \".product-fancybox .fancybox-inner .fancy-price-details\" );
      
      
\t\tvar ww = \$( window ).width();
\t\tif(ww < 1140){
\t\t  var itemsCount = 4;
\t\t}else{
\t\t  var itemsCount = 6;
\t\t}

    var list = \$('.fancybox-thumbs__list a');
\t\tfor(var n in list){
\t\t\tif(n < itemsCount){
\t\t\t\t\$(list[n]).addClass('active');
\t\t\t}
\t\t}
    if(list.length > itemsCount){
\t\t\t\$('.fancybox-thumbs .fancybox-thumbs__list').prepend('<svg aria-hidden=\"true\" focusable=\"false\" data-prefix=\"fal\" data-icon=\"chevron-up\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M4.465 366.475l7.07 7.071c4.686 4.686 12.284 4.686 16.971 0L224 178.053l195.494 195.493c4.686 4.686 12.284 4.686 16.971 0l7.07-7.071c4.686-4.686 4.686-12.284 0-16.97l-211.05-211.051c-4.686-4.686-12.284-4.686-16.971 0L4.465 349.505c-4.687 4.686-4.687 12.284 0 16.97z\" class=\"\"></path></svg>');
\t\t\t\$('.fancybox-thumbs .fancybox-thumbs__list').append('<svg aria-hidden=\"true\" focusable=\"false\" data-prefix=\"fal\" data-icon=\"chevron-down\" role=\"img\" xmlns=\"http://www.w3.org/2000/svg\" viewBox=\"0 0 448 512\"><path fill=\"currentColor\" d=\"M443.5 162.6l-7.1-7.1c-4.7-4.7-12.3-4.7-17 0L224 351 28.5 155.5c-4.7-4.7-12.3-4.7-17 0l-7.1 7.1c-4.7 4.7-4.7 12.3 0 17l211 211.1c4.7 4.7 12.3 4.7 17 0l211-211.1c4.8-4.7 4.8-12.3.1-17z\" class=\"\"></path></svg>');
    }
      
\t\t\$('.fancybox-thumbs__list svg[data-icon=\"chevron-up\"]').click(function(){
\t\t\tvar items = \$('.fancybox-thumbs__list a');
\t\t\tvar activeItems = \$('.fancybox-thumbs__list > a.active');
\t\t\tvar nextItem = parseInt(\$(activeItems[0]).attr('data-index')) - parseInt(1);
\t\t\tif(nextItem > -1 && typeof nextItem != 'undefined'){
\t\t\t\tvar lastItemIndex = \$(activeItems[activeItems.length - 1]).attr('data-index');
\t\t\t\t\$('.fancybox-thumbs__list a[data-index=\"' + lastItemIndex + '\"]').removeClass('active');
\t\t\t\t\$('.fancybox-thumbs__list a[data-index=\"' + nextItem + '\"]').addClass('active');
\t\t\t}
\t\t});
      
\t\t\$('.fancybox-thumbs__list svg[data-icon=\"chevron-down\"]').click(function(){
\t\t\tvar items = \$('.fancybox-thumbs__list a');
\t\t\tvar activeItems = \$('.fancybox-thumbs__list > a.active');
\t\t\tvar nextItem = parseInt(\$(activeItems[activeItems.length - 1]).attr('data-index')) + parseInt(1);
\t\t\tif(nextItem != items.length && typeof nextItem != 'undefined'){
\t\t\t\tvar firstItemIndex = \$(activeItems[0]).attr('data-index');
\t\t\t\t\$('.fancybox-thumbs__list a[data-index=\"' + firstItemIndex + '\"]').removeClass('active');
\t\t\t\t\$('.fancybox-thumbs__list a[data-index=\"' + nextItem + '\"]').addClass('active');
\t\t\t}
\t\t});
\t\t\$('.threede_view').attr('src', '/";
        // line 2650
        echo ($context["model"] ?? null);
        echo ".html');
      
      
\t\t\t/*
\t\t\t\t\$('.fancybox-inner .fancy-price-details .button-cart').click(function(){
\t\t\t\t\taddCart();
\t\t\t\t});
\t\t\t\t\$( \".fancybox-inner .fancy-price-details .price-new\" ).prependTo( \$( \".fancy-price-details .price-to-fancybox\" ) );
\t\t\t*/
      
      /*
          \$(\".fancybox-thumbs .fancybox-thumbs__list\").slick({
            vertical: true,
            dots: false,
            loop: false,
            infinite: true,
            slidesToShow: 6,
            slidesToScroll: 1,
            prevArrow:\"<div class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></div>\",
            nextArrow:\"<div class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></div>\"
          });*/
      openFancy = true;
    }
  }else{
  \topenFancy = false;
  }
}, 100);

  });
\t\$(document).ready(function() {
    \$(\".product-gallery__nav\").slick({
\t\t\tvertical: true,
      dots: false,
      loop: false,
      infinite: true,
      slidesToShow: 6,
      slidesToScroll: 1,
      prevArrow:\"<div class='slick-prev pull-left'><i class='fa fa-angle-left' aria-hidden='true'></i></div>\",
      nextArrow:\"<div class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></div>\",
\t\t\tresponsive: [
    \t\t{
\t\t\t\t\tbreakpoint: 767,
\t\t\t\t\tsettings: {
\t\t\t\t\t\tvertical: false,
\t\t\t\t\t\tslidesToShow: 1,
\t\t\t\t\t\tvariableWidth: true
\t\t\t\t\t}
\t\t\t\t},
\t\t\t]
    });
  });
</script>
<script type=\"text/javascript\">
\t\$('.tab__header > button').click(function(){
         var tab = \$(this).index();
\t\t var tabindex = tab + +1;
         localStorage.setItem('tab', tab);
\t\t \$('.tab__header > button').removeClass('active');
         \$('.tab__wrapper').removeClass('active');
         \$('.tab__header button:eq(' + tab +')').addClass('active');
         \$('#tab' + tabindex).addClass('active');

\t\t if(tab > 0){
\t\t\t\$('.single_block').hide();
\t\t\t\$('.description_block').hide();
\t\t}else{
\t\t\t\$('.single_block').show();
\t\t\t\$('.description_block').show();
\t\t}

\t\tif(tab == 3){
\t\t\t\$('.videos').show();
\t\t}else{
\t\t\t\$('.videos').hide();
\t\t}
\t });

\t\$(document).ready(function() {
\t\t//if(localStorage.getItem('tab')){
        //    var navtab = localStorage.getItem('tab');
\t\t//}else{
\t\tvar navtab = 0;
\t\t//} 
\t\t
\t\tvar navtabindex = +navtab + +1;
        \$('.tab__header > button').removeClass('active');
        \$('.tab__wrapper').removeClass('active');
        \$('.tab__header > button:eq(' + navtab +')').addClass('active');
        \$('#tab' + navtabindex).addClass('active');

\t\tif(navtab > 0){
\t\t\t\$('.single_block').hide();
\t\t\t\$('.description_block').hide();
\t\t}else{
\t\t\t\$('.single_block').show();
\t\t\t\$('.description_block').show();
\t\t}

\t\tif(navtab == 3){
\t\t\t\$('.videos').show();
\t\t}else{
\t\t\t\$('.videos').hide();
\t\t}
\t});

\t";
        // line 2766
        echo "
\t";
        // line 2782
        echo "
\tfunction setPrice(){
\t\t";
        // line 2784
        if (($context["price_int"] ?? null)) {
            // line 2785
            echo "        ";
            if ( !($context["special_int"] ?? null)) {
                // line 2786
                echo "        var price = '";
                echo ($context["price_int"] ?? null);
                echo "';
        ";
            } else {
                // line 2788
                echo "        var price = '";
                echo ($context["special_int"] ?? null);
                echo "';
        ";
            }
            // line 2790
            echo "        return price;
        ";
        }
        // line 2792
        echo "        return 0;
\t    }
</script>
<script>
\$('.product_overview__buttons span').click(function(){
    \$('#hidden-images').show();
\t\$('.product_overview__buttons').hide();
});
</script>
<script>
\t\$('.tab_1__button').click(function(){
\t\t\$('#hidden-attrs').show();
\t\t\$('#hidden-attrs2').show();
\t\t\$(this).hide();
\t});
\t\$('#show-attrs3').click(function(){
\t\t//\$('#hidden-attrs3').show();
\t\t//\$(this).hide();
\t\t\$('button[data-tab=\\'tab2\\']').trigger('click'); 
\t\t\$('html, body').animate({ scrollTop: \$('body').offset().top}, 'slow'); 
\t\treturn false;
\t});
\t\$('#show-feedbacks').click(function(){
\t\t\$('#hidden-feedbacks').show();
\t\t\$(this).hide();
\t});
\t</script>
<script src=\"https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js\"></script>
<script>
\tconst heroSwiper = new Swiper(\".main__swiper\", {
\t\tslidesPerView: 1,
\t\tspaceBetween: 15,
\t\tloop: true,
\t\tpagination: {
\t\t  el: \".main__swiper-pagination\",
\t\t  clickable: true,
\t\t},
\t  });
\t  
\t  const heroSwiperOne = new Swiper(\".main__swiper-1\", {
\t\tslidesPerView: 1,
\t\tspaceBetween: 0,
\t\tloop: true,
\t\tnavigation: {
\t\t  nextEl: \".main__swiper-button-next-1\",
\t\t  prevEl: \".main__swiper-button-prev-1\",
\t\t},
\t\tbreakpoints: {
\t\t  384: {
\t\t\tslidesPerView: 2,
\t\t  },
\t\t  992: {
\t\t\tslidesPerView: 3,
\t\t  },
\t\t  1200: {
\t\t\tslidesPerView: 4,
\t\t  },
\t\t},
\t  });
\t  
\t  const heroSwiperTwo = new Swiper(\".main__swiper-2\", {
\t\tslidesPerView: 1,
\t\tspaceBetween: 0,
\t\tloop: true,
\t\tnavigation: {
\t\t  nextEl: \".main__swiper-button-next-2\",
\t\t  prevEl: \".main__swiper-button-prev-2\",
\t\t},
\t\tbreakpoints: {
\t\t  384: {
\t\t\tslidesPerView: 2,
\t\t  },
\t\t  992: {
\t\t\tslidesPerView: 3,
\t\t  },
\t\t  1200: {
\t\t\tslidesPerView: 4,
\t\t  },
\t\t},
\t  });
\t  
\t  const heroSwiperThree = new Swiper(\".main__swiper-3\", {
\t\tslidesPerView: 1,
\t\tspaceBetween: 0,
\t\tloop: true,
\t\tnavigation: {
\t\t  nextEl: \".main__swiper-button-next-3\",
\t\t  prevEl: \".main__swiper-button-prev-3\",
\t\t},
\t\tbreakpoints: {
\t\t  384: {
\t\t\tslidesPerView: 2,
\t\t  },
\t\t  992: {
\t\t\tslidesPerView: 3,
\t\t  },
\t\t  1200: {
\t\t\tslidesPerView: 4,
\t\t  },
\t\t},
\t  });
\t  
\t  const heroSwiperFive = new Swiper(\".main__swiper-5\", {
\t\tslidesPerView: 1,
\t\tspaceBetween: 0,
\t\tloop: true,
\t\tnavigation: {
\t\t  nextEl: \".main__swiper-button-next-5\",
\t\t  prevEl: \".main__swiper-button-prev-5\",
\t\t},
\t\tbreakpoints: {
\t\t  384: {
\t\t\tslidesPerView: 2,
\t\t  },
\t\t  992: {
\t\t\tslidesPerView: 3,
\t\t  },
\t\t  1200: {
\t\t\tslidesPerView: 4,
\t\t  },
\t\t},
\t  });
\t  
\t  const heroSwiperVidoe = new Swiper(\".main__swiper-video\", {
\t\tslidesPerView: 1,
\t\tspaceBetween: 25,
\t\tloop: true,
\t\tnavigation: {
\t\t  nextEl: \".main__swiper-button-next-video\",
\t\t  prevEl: \".main__swiper-button-prev-video\",
\t\t},
\t\tbreakpoints: {
\t\t  576: {
\t\t\tslidesPerView: 2,
\t\t  },
\t\t  1024: {
\t\t\tslidesPerView: 3,
\t\t  },
\t\t},
\t  });
</script>
<script type=\"text/javascript\"><!--
\$('#button-buildersubmit1').on('click', function() {
\tconsole.log(\$('.questions__form').serialize());
  \$.ajax({
    url: 'index.php?route=page/form/add&page_form_id=4',
    type: 'post',
    data: \$('.questions__form').serialize(),
    dataType: 'json',
    beforeSend: function() {
      \$('#button-buildersubmit1').button('loading');
    },
    complete: function() {
      \$('#button-buildersubmit1').button('reset');
    },
    success: function(json) {
      \$('#layoutform1 .alert, #layoutform1 .text-danger').remove();
      \$('#layoutform1 .form-group').removeClass('has-error');

      if (json['error']) {
        if (json['error']['field']) {
          for (i in json['error']['field']) {
            var element = \$('#layoutform1 #input-field' + i.replace('_', '-'));
            if (element.parent().hasClass('input-group')) {
              element.parent().after('<div class=\"text-danger\">' + json['error']['field'][i] + '</div>');
            } else {
              element.after('<div class=\"text-danger\">' + json['error']['field'][i] + '</div>');
            }
          }
        }

        if(json['captcha']) {
          \$('#layoutform1 .layout-cicaptcha').html(json['captcha']);
        }

        if (json['error']['warning']) {
          \$('#layoutform1 .form-horizontal').prepend('<div class=\"alert alert-danger warning\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error']['warning'] + '<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');

          \$('html, body').animate({ scrollTop: \$('#layoutform1 .form-horizontal').offset().top - 8 }, 'slow');
        }

        // Highlight any found errors
        \$('.text-danger').parent().addClass('has-error');
      }

      if (json['success']) {
        \$('#buildersuccess-modal1').remove();

        \$('body').append('<div id=\"buildersuccess-modal1\" class=\"modal fade\" role=\"dialog\"><div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button><h4 class=\"modal-title\">'+ json['success_title'] +'</h4></div><div class=\"modal-body\">'+ json['success_description'] +'</div></div></div></div>');

        \$('#buildersuccess-modal1').modal('show');

        \$('#layoutform1 input[type=\\'text\\'], #layoutform1 input[type=\\'hidden\\'], #layoutform1 input[type=\\'password\\'],  #layoutform1 textarea').val('');

        \$('#layoutform1 input[type=\\'checkbox\\']:checked, #layoutform1 input[type=\\'radio\\']:checked').prop('checked', false);

        \$('#layoutform1 select').val('');
      }
    },
    error: function(xhr, ajaxOptions, thrownError) {
        alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
    }
  });
});
//--></script>
<script>
function setImage(key){
\t\$('.product_overview__image').attr('src', \$('#pic-' + key).attr('data-image'));
\t\$('.product_overview__pagination span').removeClass('product_overview__pagination_item--active');
\t\$('#pic-' + key).addClass('product_overview__pagination_item--active');
}

function more_reviews(){
\tvar offset = \$('#more_reviews').attr('data-count');

\t\$.ajax({
\t\turl: 'index.php?route=product/product/more_reviews&count=' + offset + '&product_id=";
        // line 3008
        echo ($context["product_id"] ?? null);
        echo "',
\t\ttype: 'get',
\t\tdataType: 'json',
\t\tsuccess: function(json){
\t\t\tvar html = '';
            for (item in json['feedbacks']){
\t\t\t\thtml += '<div class=\"feedback_block\"><div class=\"feedback\"><div class=\"feedback__wrapper\"><div class=\"feedback__account\"><div class=\"feedback__image_wrapper\"><img class=\"feedback__image\" src=\"image/icon/user-icon.svg\" alt=\"Profile image\" /></div><div class=\"feedback__account_info\"><h6 class=\"feedback__name\">' + json['feedbacks'][item]['author'] + '</h6><div class=\"rating\" bis_skin_checked=\"1\">';
\t\t\t\t\t\tfor(var i = 1; i <=5; i++ ){
\t\t\t\t\t\t    if(json['feedbacks'][item]['author'] < i){
\t\t\t\t\t\t    html += '<span class=\"rating-star\"></span>';
\t\t\t\t\t\t    }else{
\t\t\t\t\t\t    html += '<span class=\"rating-star rating-filled\"></span>';
\t\t\t\t\t\t    }
\t\t\t\t\t\t}
\t\t\t\thtml += '</div></div></div><span class=\"feedback__date\">' + json['feedbacks'][item]['date_added'] + '</span><div class=\"feedback__content\">' + json['feedbacks'][item]['text'] + '</div><div class=\"feedback__button_row\"><a href=\"javascript:;\" class=\"feedback__respond answer-link data-fancybox\" data-fancybox data-src=\"#form-answer-review\" onclick=\"\$(\\'#review-id\\').val(' + json['feedbacks'][item]['id'] + ');\">";
        // line 3022
        echo ($context["set_answer"] ?? null);
        echo "</a><span class=\"feedback__deco\"></span><span class=\"feedback__quantity\">' + json['feedbacks'][item]['answer_count'] + '</span></div></div></div>';
\t\t\t\tvar answers = json['feedbacks'][item]['answers'];
\t\t\t\tif(answers){
\t\t\t\t    for(item2 in answers){
\t\t\t\t        html += '<div class=\"answer\"><div class=\"answer__wrapper\"><div class=\"answer__image_wrapper\"><img class=\"answer__image\" src=\"image/icon/user-icon.svg\" alt=\"Profile image\" /></div><h6 class=\"answer__name\">' + answers[item2]['author'] + '</h6><div class=\"answer__date\">' + answers[item2]['date_added'] + '</div><span class=\"answer__deco\"></span><div class=\"answer__content\">' + answers[item2]['text'] + '</div></div></div>';
\t\t\t\t\t}
\t\t\t\t}
\t\t\t    html += '</div>';
\t\t\t}
\t\t\t\$('#more_feedbacks').append(html);
\t\t\tvar open_feedbacks = +json['offset'] + +json['feedbacks'].length;
\t\t\t\$('#part-count').text(open_feedbacks);
\t\t\tvar offset = \$('#more_reviews').attr('data-count', open_feedbacks);
\t\t\tif(open_feedbacks >= ";
        // line 3035
        echo ($context["reviews_count"] ?? null);
        echo "){
\t\t\t\t\$('#more_reviews').hide();
\t\t\t}
\t\t\tvar percent = Math.round(open_feedbacks / ";
        // line 3038
        echo ($context["reviews_count"] ?? null);
        echo " * 100);
\t\t\t\$('.progress__bar').css('width', percent + '%');
\t\t}
\t}); 
}

function more_answers(feedback_id){
\t\$.ajax({
\t\turl: 'index.php?route=product/product/more_answers&feedback_id=' + feedback_id,
\t\ttype: 'get',
\t\tdataType: 'json',
\t\tsuccess: function(json){
\t\t\tvar html = '';
            for(item in json['answers']){
                html += '<div class=\"answer\"><div class=\"answer__wrapper\"><div class=\"answer__image_wrapper\"><img class=\"answer__image\" src=\"image/icon/user-icon.svg\" alt=\"Profile image\" /></div><h6 class=\"answer__name\">' + json['answers'][item]['author'] + '</h6><div class=\"answer__date\">' + json['answers'][item]['date_added'] + '</div><span class=\"answer__deco\"></span><div class=\"answer__content\">' + json['answers'][item]['text'] + '</div></div></div>';
\t\t\t}
\t\t\t\$('#all-answers-' + feedback_id).html(html);
\t\t\t\$('#more_answers-' + feedback_id).hide();
\t\t}
\t}); 
}
</script>

";
        // line 3061
        if (($context["ukrcredits_status"] ?? null)) {
            // line 3062
            echo "<script type=\"text/javascript\"><!--
\$('";
            // line 3063
            echo ($context["ukrcredits_selector_button"] ?? null);
            echo "').after('";
            echo ($context["ukrcredits"] ?? null);
            echo "');
\$('body').on('click', '#button-ukrcredits', function(){
  \$('[data-toggle=\"tooltip\"]').tooltip('hide');
  \$.ajax({
    url: 'index.php?route=module/ukrcredits/checkoptions',
    type: 'post',
    data: \$('";
            // line 3069
            echo ($context["ukrcredits_selector_block"] ?? null);
            echo " input[type=\\'text\\'], ";
            echo ($context["ukrcredits_selector_block"] ?? null);
            echo " input[type=\\'hidden\\'], ";
            echo ($context["ukrcredits_selector_block"] ?? null);
            echo " input[type=\\'radio\\']:checked, ";
            echo ($context["ukrcredits_selector_block"] ?? null);
            echo " input[type=\\'checkbox\\']:checked, ";
            echo ($context["ukrcredits_selector_block"] ?? null);
            echo " select, ";
            echo ($context["ukrcredits_selector_block"] ?? null);
            echo " textarea'),
    dataType: 'json',
    beforeSend: function() {
      \$('#button-ukrcredits').button('loading');
    },
    complete: function() {
      \$('#button-ukrcredits').button('reset');
    },
    success: function(json) {
      \$('.alert, .text-danger').remove();
      \$('.form-group').removeClass('has-error');

      if (json['error']) {
        if (json['error']['option']) {
          for (i in json['error']['option']) {
            var element = \$('#input-option' + i.replace('_', '-'));

            if (element.parent().hasClass('input-group')) {
              element.parent().after('<div class=\"text-danger\">' + json['error']['option'][i] + '</div>');
            } else {
              element.after('<div class=\"text-danger\">' + json['error']['option'][i] + '</div>');
            }
          }
        }

        if (json['error']['recurring']) {
          \$('select[name=\\'recurring_id\\']').after('<div class=\"text-danger\">' + json['error']['recurring'] + '</div>');
        }

        // Highlight any found errors
        \$('.text-danger').parent().addClass('has-error');
      }

      if (json['success']) {
\t\t\$.magnificPopup.open({
\t\t//\ttype:'ajax',
\t\t\ttLoading: '',
\t\t\ttLoading: '<img src=\"catalog/view/theme/default/image/ukrcredits/PP_logo.png\" />',
\t\t\tremovalDelay: 300,
\t\t\tcallbacks: {
\t\t\t\tbeforeOpen: function() {
\t\t\t\t   this.st.mainClass = 'mfp-zoom-in';
\t\t\t\t}
\t\t\t},
\t\t\titems:{
\t\t\t\ttype:'ajax',
\t\t\t\tsrc:'index.php?route=module/ukrcredits/loadpopup'
\t\t\t},
\t\t\tajax: {
\t\t\t  settings: {
\t\t\t\ttype: 'GET',
\t\t\t\tdata: \$('";
            // line 3120
            echo ($context["ukrcredits_selector_block"] ?? null);
            echo " input[type=\\'text\\'], ";
            echo ($context["ukrcredits_selector_block"] ?? null);
            echo " input[type=\\'hidden\\'], ";
            echo ($context["ukrcredits_selector_block"] ?? null);
            echo " input[type=\\'radio\\']:checked, ";
            echo ($context["ukrcredits_selector_block"] ?? null);
            echo " input[type=\\'checkbox\\']:checked, ";
            echo ($context["ukrcredits_selector_block"] ?? null);
            echo " select, ";
            echo ($context["ukrcredits_selector_block"] ?? null);
            echo " textarea'),
\t\t\t  }
\t\t\t}
\t\t});\t
      }
    },
    error: function(xhr, ajaxOptions, thrownError) {
      alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
    }
  });
});
//--></script>
<style>
#ukrcredit-popup {
  position: relative;
  background: #FFF;
  padding: 20px;
  width: auto;
  max-width: 750px;
  margin: 20px auto;
}
.mfp-zoom-in .mfp-content > div {
  opacity: 0;
  transition: all 0.2s ease-in-out;
  transform: scale(0.7);
}
.mfp-zoom-in.mfp-ready .mfp-content > div {
  opacity: 1;
  transform: scale(1);
}
.mfp-zoom-in.mfp-removing .mfp-content > div {
  transform: scale(0.7);
  opacity: 0;
}
";
            // line 3154
            echo ($context["ukrcredits_css_custom"] ?? null);
            echo "
</style>
";
        }
        // line 3157
        echo "\t\t\t
";
        // line 3158
        echo ($context["footer"] ?? null);
        echo " 
";
    }

    public function getTemplateName()
    {
        return "default/template/product/product.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  4082 => 3158,  4079 => 3157,  4073 => 3154,  4026 => 3120,  3962 => 3069,  3951 => 3063,  3948 => 3062,  3946 => 3061,  3920 => 3038,  3914 => 3035,  3898 => 3022,  3881 => 3008,  3663 => 2792,  3659 => 2790,  3653 => 2788,  3647 => 2786,  3644 => 2785,  3642 => 2784,  3638 => 2782,  3635 => 2766,  3527 => 2650,  3476 => 2602,  3417 => 2546,  3409 => 2541,  3402 => 2537,  3382 => 2520,  3376 => 2517,  3370 => 2514,  3361 => 2508,  3355 => 2505,  3349 => 2502,  3340 => 2496,  3337 => 2495,  3330 => 2493,  3324 => 2491,  3321 => 2490,  3319 => 2489,  3314 => 2486,  3283 => 2449,  3275 => 2444,  3271 => 2442,  3265 => 2440,  3256 => 2434,  3253 => 2433,  3251 => 2432,  3176 => 2360,  3167 => 2354,  3159 => 2349,  3105 => 2298,  3016 => 2211,  3010 => 2209,  3002 => 2207,  3000 => 2206,  2993 => 2202,  2980 => 2192,  2977 => 2191,  2970 => 2187,  2961 => 2180,  2954 => 2176,  2943 => 2167,  2941 => 2166,  2934 => 2162,  2921 => 2151,  2919 => 2150,  2916 => 2149,  2914 => 2148,  2905 => 2142,  2897 => 2137,  2893 => 2136,  2883 => 2129,  2874 => 2123,  2868 => 2120,  2864 => 2119,  2855 => 2114,  2853 => 2086,  2851 => 1278,  2844 => 1200,  2838 => 1198,  2832 => 1196,  2830 => 1195,  2818 => 1190,  2798 => 1189,  2792 => 1186,  2784 => 1181,  2780 => 1180,  2774 => 1176,  2769 => 1174,  2765 => 1173,  2762 => 1172,  2756 => 1170,  2751 => 1168,  2747 => 1167,  2731 => 1154,  2719 => 1145,  2706 => 1134,  2702 => 1133,  2698 => 1132,  2691 => 1128,  2687 => 1127,  2675 => 1118,  2671 => 1116,  2658 => 1111,  2651 => 1109,  2645 => 1106,  2640 => 1104,  2635 => 1101,  2629 => 1100,  2625 => 1098,  2621 => 1096,  2618 => 1095,  2614 => 1094,  2609 => 1092,  2600 => 1085,  2596 => 1084,  2593 => 1083,  2582 => 1078,  2575 => 1076,  2569 => 1073,  2564 => 1071,  2559 => 1068,  2553 => 1067,  2549 => 1065,  2545 => 1063,  2542 => 1062,  2538 => 1061,  2533 => 1059,  2524 => 1052,  2520 => 1051,  2514 => 1048,  2510 => 1047,  2503 => 1043,  2499 => 1041,  2490 => 1038,  2486 => 1037,  2483 => 1036,  2479 => 1035,  2475 => 1033,  2466 => 1030,  2462 => 1029,  2459 => 1028,  2455 => 1027,  2449 => 1023,  2441 => 1020,  2432 => 1013,  2429 => 1012,  2421 => 1009,  2412 => 1002,  2410 => 1001,  2404 => 998,  2397 => 993,  2388 => 986,  2377 => 980,  2368 => 977,  2364 => 976,  2361 => 975,  2357 => 974,  2351 => 971,  2346 => 969,  2341 => 966,  2335 => 964,  2332 => 963,  2328 => 961,  2325 => 960,  2319 => 958,  2317 => 957,  2312 => 954,  2306 => 952,  2303 => 951,  2297 => 948,  2294 => 947,  2288 => 944,  2285 => 943,  2283 => 942,  2277 => 939,  2274 => 938,  2268 => 937,  2264 => 935,  2260 => 933,  2257 => 932,  2253 => 931,  2245 => 928,  2237 => 923,  2233 => 922,  2212 => 915,  2208 => 913,  2202 => 909,  2199 => 908,  2196 => 907,  2187 => 905,  2182 => 904,  2179 => 903,  2176 => 902,  2167 => 900,  2162 => 899,  2160 => 898,  2152 => 895,  2145 => 893,  2137 => 888,  2132 => 885,  2130 => 884,  2125 => 882,  2115 => 874,  2107 => 871,  2098 => 864,  2095 => 863,  2087 => 860,  2078 => 853,  2076 => 852,  2071 => 850,  2063 => 844,  2057 => 842,  2051 => 840,  2049 => 839,  2037 => 834,  2017 => 833,  2011 => 830,  2003 => 825,  1999 => 824,  1992 => 819,  1987 => 817,  1983 => 816,  1980 => 815,  1974 => 813,  1969 => 811,  1965 => 810,  1958 => 806,  1955 => 805,  1949 => 804,  1945 => 802,  1941 => 800,  1938 => 799,  1934 => 798,  1927 => 794,  1919 => 789,  1909 => 788,  1894 => 775,  1888 => 773,  1882 => 771,  1880 => 770,  1868 => 765,  1848 => 764,  1843 => 762,  1836 => 758,  1832 => 757,  1826 => 753,  1821 => 751,  1817 => 750,  1814 => 749,  1808 => 747,  1803 => 745,  1799 => 744,  1784 => 734,  1780 => 733,  1775 => 731,  1765 => 723,  1757 => 720,  1748 => 713,  1745 => 712,  1737 => 709,  1728 => 702,  1726 => 701,  1721 => 699,  1713 => 693,  1707 => 691,  1701 => 689,  1699 => 688,  1687 => 683,  1667 => 682,  1661 => 679,  1653 => 674,  1649 => 673,  1642 => 668,  1637 => 666,  1633 => 665,  1630 => 664,  1624 => 662,  1619 => 660,  1615 => 659,  1608 => 655,  1605 => 654,  1599 => 653,  1595 => 651,  1591 => 649,  1588 => 648,  1584 => 647,  1577 => 643,  1569 => 638,  1559 => 637,  1544 => 624,  1538 => 622,  1532 => 620,  1530 => 619,  1518 => 614,  1498 => 613,  1493 => 611,  1486 => 607,  1482 => 606,  1476 => 602,  1471 => 600,  1467 => 599,  1464 => 598,  1458 => 596,  1453 => 594,  1449 => 593,  1439 => 585,  1433 => 583,  1431 => 582,  1424 => 578,  1419 => 576,  1413 => 572,  1406 => 570,  1403 => 569,  1393 => 567,  1391 => 566,  1386 => 565,  1375 => 560,  1369 => 557,  1365 => 556,  1358 => 551,  1353 => 550,  1351 => 549,  1344 => 545,  1337 => 543,  1331 => 540,  1326 => 538,  1321 => 535,  1315 => 534,  1311 => 532,  1307 => 530,  1304 => 529,  1300 => 528,  1295 => 526,  1285 => 518,  1281 => 517,  1274 => 513,  1268 => 510,  1264 => 509,  1253 => 500,  1245 => 497,  1236 => 490,  1233 => 489,  1225 => 486,  1216 => 479,  1214 => 478,  1209 => 476,  1201 => 470,  1195 => 468,  1189 => 466,  1187 => 465,  1175 => 460,  1155 => 459,  1149 => 456,  1141 => 451,  1137 => 450,  1130 => 445,  1125 => 443,  1121 => 442,  1118 => 441,  1112 => 439,  1107 => 437,  1103 => 436,  1096 => 432,  1093 => 431,  1087 => 430,  1083 => 428,  1079 => 426,  1076 => 425,  1072 => 424,  1065 => 420,  1057 => 415,  1047 => 414,  1030 => 399,  1024 => 397,  1018 => 395,  1016 => 394,  1004 => 389,  984 => 388,  979 => 386,  972 => 382,  968 => 381,  962 => 377,  957 => 375,  953 => 374,  950 => 373,  944 => 371,  939 => 369,  935 => 368,  924 => 359,  916 => 356,  907 => 349,  904 => 348,  896 => 345,  887 => 338,  885 => 337,  880 => 335,  875 => 332,  866 => 329,  862 => 328,  859 => 327,  855 => 326,  849 => 322,  841 => 319,  832 => 312,  829 => 311,  821 => 308,  812 => 301,  810 => 300,  805 => 298,  800 => 295,  791 => 292,  787 => 291,  784 => 290,  780 => 289,  772 => 284,  768 => 283,  763 => 281,  755 => 275,  750 => 272,  739 => 267,  734 => 265,  728 => 262,  723 => 260,  720 => 259,  716 => 258,  709 => 254,  705 => 253,  700 => 250,  698 => 249,  687 => 241,  683 => 240,  672 => 232,  667 => 230,  662 => 228,  647 => 216,  643 => 215,  639 => 214,  635 => 213,  626 => 206,  617 => 203,  613 => 202,  610 => 201,  606 => 200,  602 => 198,  593 => 195,  589 => 194,  586 => 193,  582 => 192,  578 => 190,  569 => 187,  565 => 186,  562 => 185,  558 => 184,  552 => 181,  542 => 173,  536 => 171,  530 => 169,  528 => 168,  516 => 163,  496 => 162,  490 => 159,  482 => 154,  478 => 153,  472 => 149,  467 => 147,  463 => 146,  460 => 145,  454 => 143,  449 => 141,  445 => 140,  433 => 131,  430 => 130,  424 => 129,  420 => 127,  416 => 125,  413 => 124,  409 => 123,  402 => 119,  393 => 113,  389 => 112,  384 => 109,  377 => 108,  372 => 107,  366 => 106,  363 => 105,  357 => 104,  346 => 95,  337 => 92,  333 => 91,  330 => 90,  326 => 89,  322 => 87,  313 => 84,  309 => 83,  306 => 82,  302 => 81,  296 => 78,  291 => 75,  274 => 73,  270 => 72,  265 => 69,  262 => 68,  253 => 66,  248 => 65,  245 => 64,  242 => 63,  233 => 61,  228 => 60,  226 => 59,  213 => 57,  206 => 53,  202 => 51,  198 => 49,  192 => 48,  184 => 46,  178 => 44,  176 => 43,  173 => 42,  170 => 41,  166 => 40,  163 => 39,  157 => 38,  141 => 36,  127 => 34,  125 => 33,  116 => 32,  113 => 31,  109 => 30,  96 => 29,  94 => 28,  84 => 21,  80 => 20,  76 => 19,  72 => 18,  63 => 11,  52 => 8,  49 => 7,  45 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/product/product.twig", "");
    }
}
