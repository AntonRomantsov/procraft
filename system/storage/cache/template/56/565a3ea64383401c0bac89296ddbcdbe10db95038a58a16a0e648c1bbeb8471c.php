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

/* default/template/product/category.twig */
class __TwigTemplate_9ac46eaa7178f2209f5ba9e5ef04a73cd63f3397d2d7e17323994f1b95e1dae1 extends \Twig\Template
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
        echo " ";
        echo ($context["header"] ?? null);
        echo "
 <main>
  <section>
    <div class=\"breadcrumbs__container\">
      <ul class=\"breadcrumbs\">
        ";
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
        echo "      </ul>
    </div>
  </section>

  <section class=\"section__regular category\">
    <div class=\"category__container\">
      <h2 class=\"category__title\">";
        // line 17
        echo ($context["heading_title"] ?? null);
        echo "</h2>
      <div class=\"category__wrapper\">
      ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 20
            echo "        <a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 20);
            echo "\" class=\"category_item\">
          <div class=\"category__image_wrapper\">
            <img class=\"category__image\" src=\"";
            // line 22
            echo twig_get_attribute($this->env, $this->source, $context["category"], "image", [], "any", false, false, false, 22);
            echo "\" alt=\"Categoty\" class=\"category__image\" />
          </div>
          <h5 class=\"category__name\">";
            // line 24
            echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 24);
            echo "</h5>
        </a>
      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        echo "      </div>
    </div>
  </section>
  
  ";
        // line 31
        if (($context["filters"] ?? null)) {
            // line 32
            echo "  <section class=\"section__regular subcategory\">
        <div class=\"subcategory__container\">
          <div class=\"subcategory__wrapper subcategory__wrapper--filter_mod\">
          ";
            // line 35
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["filters"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                // line 36
                echo "            <a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["item"], "href", [], "any", false, false, false, 36);
                echo "\" class=\"subcategory__item subcategory__item--filter_mod\">
              <div class=\"subcategory__image_wrapper\">
                <img class=\"subcategory__image\" src=\"";
                // line 38
                echo twig_get_attribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, false, 38);
                echo "\" alt=\"Product\" />
              </div>
              <h5 class=\"subcategory__name\">";
                // line 40
                echo twig_get_attribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 40);
                echo "</h5>
            </a>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 43
            echo "          </div>
        </div>
  </section>
   ";
        }
        // line 47
        echo "
  <section class=\"section__regular subcategory_products\">
  <div class=\"subcategory_products__container\">
    <div class=\"subcategory_products__wrapper\">
    ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            echo " 
      <div class=\"product";
            // line 52
            if (((twig_get_attribute($this->env, $this->source, $context["product"], "stock_id", [], "any", false, false, false, 52) == 5) && (twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 52) < 1))) {
                echo " out-of-stock";
            }
            echo "\">
        <div class=\"product__wrapper\">
          <div class=\"product__labels\">
          ";
            // line 55
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 55))) {
                // line 56
                echo "          ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers", [], "any", false, false, false, 56));
                foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                    // line 57
                    echo "            <span class=\"product__labels-label\">";
                    echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 57);
                    echo "</span>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 59
                echo "          ";
            }
            // line 60
            echo "          ";
            if ( !twig_test_empty(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 60))) {
                // line 61
                echo "          ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "product_xdstickers_custom", [], "any", false, false, false, 61));
                foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                    // line 62
                    echo "            <span class=\"product__labels-label\">";
                    echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "text", [], "any", false, false, false, 62);
                    echo "</span>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 64
                echo "          ";
            }
            // line 65
            echo "          ";
            if (twig_get_attribute($this->env, $this->source, $context["product"], "is_rotate", [], "any", false, false, false, 65)) {
                // line 66
                echo "            <span class=\"product__labels-overwiev\">
              <img src=\"catalog/view/theme/default/image//product/overview.png\" alt=\"360\" />
            </span>
          ";
            }
            // line 70
            echo "          </div>
          <div class=\"product__like\">
            <svg class=\"product__like-item product-like-";
            // line 72
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 72);
            if (twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 72)) {
                echo " product__like-active";
            }
            echo "\" viewBox=\"0 0 24 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\" id=\"product-like-";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 72);
            echo "\" ";
            if ( !twig_get_attribute($this->env, $this->source, $context["product"], "wl_class", [], "any", false, false, false, 72)) {
                echo "onclick=\"wishlist.add(";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 72);
                echo ")\"";
            } else {
                echo "onclick=\"wishlist.remove(";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 72);
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
            // line 79
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 79);
            echo "\">
              <img class=\"product__image-item\" src=\"";
            // line 80
            echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 80);
            echo "\" alt=\"Product\" />
            </a>
          </div>
          <div class=\"product__content-row\">
            <div class=\"product__content\">
              <h4 class=\"product__title\"><a href=\"";
            // line 85
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 85);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 85);
            echo "</a></h4>
              <div class=\"product__rating\">
                <div class=\"rating\">
                ";
            // line 88
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(1, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 89
                echo "                ";
                if ((twig_get_attribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 89) < $context["i"])) {
                    // line 90
                    echo "                <span class=\"rating-star\"></span>
                ";
                } else {
                    // line 92
                    echo "                <span class=\"rating-star rating-filled\"></span>
                ";
                }
                // line 94
                echo "              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 95
            echo "                </div>
                <span class=\"product__rating-total\">";
            // line 96
            echo twig_get_attribute($this->env, $this->source, $context["product"], "reviews", [], "any", false, false, false, 96);
            echo "</span>
              </div>
              <div class=\"product__price-row\">
              ";
            // line 99
            if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 99)) {
                // line 100
                echo "              <p class=\"product__price\">
                <span>";
                // line 101
                echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 101);
                echo "</span>
              </p>
              ";
            } else {
                // line 104
                echo "              <p class=\"product__price\">
                ";
                // line 105
                echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 105);
                echo "
              </p>
              ";
            }
            // line 108
            echo "              ";
            if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 108)) {
                // line 109
                echo "              <p class=\"product__price-old\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 109);
                echo "</p>
              ";
            }
            // line 111
            echo "              </div>
            </div>
            <div class=\"product__badges\">
            ";
            // line 114
            if (twig_get_attribute($this->env, $this->source, $context["product"], "gifts", [], "any", false, false, false, 114)) {
                // line 115
                echo "            <span class=\"product__badge-present\">";
                echo ($context["text_gifts"] ?? null);
                echo "</span>
            ";
            }
            // line 117
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, $context["product"], "is_new", [], "any", false, false, false, 117)) {
                // line 118
                echo "            <span class=\"product__badge-new\">New</span>
            ";
            }
            // line 120
            echo "            ";
            if (twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 120)) {
                // line 121
                echo "            <span class=\"product__badge-discount\">-";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "percent", [], "any", false, false, false, 121);
                echo "%</span>
            ";
            }
            // line 123
            echo "            </div>
          </div>
          <div class=\"product__additional\">
            <button class=\"product__additional-button\" onclick=\"cart.add('";
            // line 126
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 126);
            echo "');\">
              <svg class=\"product__additional-icon\"><use href=\"assets/icons.svg#cartSmall\"></use></svg>
              <p>";
            // line 128
            echo ($context["button_cart"] ?? null);
            echo "</p>
            </button>
            <ul class=\"product__additional-attributes\">
            ";
            // line 131
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "attributes", [], "any", false, false, false, 131));
            foreach ($context['_seq'] as $context["_key"] => $context["attr"]) {
                // line 132
                echo "            <li class=\"product__additional-attribute\">
              <span class=\"product__additional-attribute_parameter\">";
                // line 133
                echo twig_get_attribute($this->env, $this->source, $context["attr"], "name", [], "any", false, false, false, 133);
                echo "</span>
              <span class=\"product__additional-attribute_value\">";
                // line 134
                echo twig_get_attribute($this->env, $this->source, $context["attr"], "text", [], "any", false, false, false, 134);
                echo "</span>
            </li>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['attr'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 137
            echo "            </ul>
          </div>
        </div>
      </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 142
        echo "   
    </div>
    <div class=\"row\">
          <div class=\"col-sm-12 text-center\">";
        // line 145
        echo ($context["pagination"] ?? null);
        echo "</div>
        </div>
  </div>
</section>

";
        // line 150
        if (($context["video"] ?? null)) {
            // line 151
            echo "<section class=\"section__regular subcategory_video\">
        <div class=\"subcategory_video__container\">
          <div class=\"subcategory_video__wrapper\"></div>
          <div class=\"subcategory_video__block\">
            <h2 class=\"subcategory_video__title\">";
            // line 155
            echo ($context["text_video"] ?? null);
            echo "</h2>
            <div class=\"video\">
              <a href=\"https://www.youtube.com/watch?v=";
            // line 157
            echo twig_get_attribute($this->env, $this->source, ($context["video"] ?? null), "id", [], "any", false, false, false, 157);
            echo "\" class=\"video__wrapper\">
                <img class=\"video__item video-item-cat\" src=\"";
            // line 158
            echo twig_get_attribute($this->env, $this->source, ($context["video"] ?? null), "thumb", [], "any", false, false, false, 158);
            echo "\" alt=\"";
            echo twig_get_attribute($this->env, $this->source, ($context["video"] ?? null), "title", [], "any", false, false, false, 158);
            echo "\" />
                <div class=\"video__play-button\"></div>
              </a>
              <div class=\"video__description\">
                <p class=\"video__title\">";
            // line 162
            echo twig_get_attribute($this->env, $this->source, ($context["video"] ?? null), "title", [], "any", false, false, false, 162);
            echo "</p>
                <div class=\"video__info\">
                  <span>";
            // line 164
            echo twig_get_attribute($this->env, $this->source, ($context["video"] ?? null), "views", [], "any", false, false, false, 164);
            echo " ";
            echo ($context["text_yt_views"] ?? null);
            echo "</span>
                  <span>•</span>
                  <span>";
            // line 166
            echo twig_get_attribute($this->env, $this->source, ($context["video"] ?? null), "date", [], "any", false, false, false, 166);
            echo "</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    ";
        }
        // line 174
        echo "
  <section class=\"section__regular category_text\">
    <div class=\"category_text__container\">
      <div class=\"category_text__wrapper\">
        ";
        // line 178
        echo ($context["description"] ?? null);
        echo "
      </div>
    </div>
  </section>
</main>
";
        // line 432
        echo ($context["footer"] ?? null);
        echo " 
";
    }

    public function getTemplateName()
    {
        return "default/template/product/category.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  471 => 432,  463 => 178,  457 => 174,  446 => 166,  439 => 164,  434 => 162,  425 => 158,  421 => 157,  416 => 155,  410 => 151,  408 => 150,  400 => 145,  395 => 142,  385 => 137,  376 => 134,  372 => 133,  369 => 132,  365 => 131,  359 => 128,  354 => 126,  349 => 123,  343 => 121,  340 => 120,  336 => 118,  333 => 117,  327 => 115,  325 => 114,  320 => 111,  314 => 109,  311 => 108,  305 => 105,  302 => 104,  296 => 101,  293 => 100,  291 => 99,  285 => 96,  282 => 95,  276 => 94,  272 => 92,  268 => 90,  265 => 89,  261 => 88,  253 => 85,  245 => 80,  241 => 79,  216 => 72,  212 => 70,  206 => 66,  203 => 65,  200 => 64,  191 => 62,  186 => 61,  183 => 60,  180 => 59,  171 => 57,  166 => 56,  164 => 55,  156 => 52,  150 => 51,  144 => 47,  138 => 43,  129 => 40,  124 => 38,  118 => 36,  114 => 35,  109 => 32,  107 => 31,  101 => 27,  92 => 24,  87 => 22,  81 => 20,  77 => 19,  72 => 17,  64 => 11,  53 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/product/category.twig", "");
    }
}
