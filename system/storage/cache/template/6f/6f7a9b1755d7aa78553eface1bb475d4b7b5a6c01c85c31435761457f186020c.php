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

/* default/template/common/cart.twig */
class __TwigTemplate_a547c645e63fed60c53bbb568487d17d2537ab026bf425902e5b468ffebb18f6 extends \Twig\Template
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
        echo "<div id=\"cart\" class=\"header-cart\">
  <button type=\"button\" data-loading-text=\"";
        // line 2
        echo ($context["text_loading"] ?? null);
        echo "\" class=\"btn-link header-actions__link header-cart__btn\" onclick=\"call_cp(false,'load');\">
\t\t<svg class=\"svg-icon\"><use xlink:href=\"/image/sprite.svg#cart\"></use></svg>
\t\t<span>";
        // line 4
        echo ($context["count_cart"] ?? null);
        echo "</span>
\t</button>
  <ul class=\"dropdown-menu pull-right\">
   <div class=\"header-cart-title\">";
        // line 7
        echo ($context["text_in_cart"] ?? null);
        echo "</div>
    ";
        // line 8
        if ((($context["products"] ?? null) || ($context["vouchers"] ?? null))) {
            // line 9
            echo "    <li>
      <table class=\"table\">
        ";
            // line 11
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 12
                echo "        <tr>
          <td class=\"text-center header-cart-img\">";
                // line 13
                if (twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 13)) {
                    echo " <a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 13);
                    echo "\"><img src=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 13);
                    echo "\" alt=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 13);
                    echo "\" title=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 13);
                    echo "\" class=\"img-thumbnail\" /></a> ";
                }
                echo "</td>
          <td class=\"text-left header-cart-name\"><a href=\"";
                // line 14
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 14);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 14);
                echo "</a> ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "option", [], "any", false, false, false, 14)) {
                    // line 15
                    echo "            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "option", [], "any", false, false, false, 15));
                    foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                        echo " <br />
            - <small>";
                        // line 16
                        echo twig_get_attribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 16);
                        echo " ";
                        echo twig_get_attribute($this->env, $this->source, $context["option"], "value", [], "any", false, false, false, 16);
                        echo "</small> ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 17
                    echo "            ";
                }
                // line 18
                echo "            ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "recurring", [], "any", false, false, false, 18)) {
                    echo " <br />
            - <small>";
                    // line 19
                    echo ($context["text_recurring"] ?? null);
                    echo " ";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "recurring", [], "any", false, false, false, 19);
                    echo "</small> ";
                }
                // line 20
                echo "            <p class=\"header-class-quantity\"><small>";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 20);
                echo " шт.</small> </p></td>
          ";
                // line 22
                echo "          ";
                if (twig_get_attribute($this->env, $this->source, $context["product"], "old_price", [], "any", false, false, false, 22)) {
                    // line 23
                    echo "          <td class=\"text-right header-right-price\"><div class=\"product-checkout__new-price\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "total", [], "any", false, false, false, 23);
                    echo "</div>
          <div class=\"product-checkout__old-price\" style=\"text-decoration: line-through;\">";
                    // line 24
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "old_total", [], "any", false, false, false, 24);
                    echo "</div></td>
          ";
                } else {
                    // line 26
                    echo "          <td class=\"text-right header-right-price\">";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "total", [], "any", false, false, false, 26);
                    echo "</td>
          ";
                }
                // line 28
                echo "          ";
                // line 29
                echo "        </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 31
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["vouchers"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["voucher"]) {
                // line 32
                echo "        <tr>
          <td class=\"text-center\"></td>
          <td class=\"text-left\">";
                // line 34
                echo twig_get_attribute($this->env, $this->source, $context["voucher"], "description", [], "any", false, false, false, 34);
                echo "</td>
          <td class=\"text-right\">x&nbsp;1</td>
          <td class=\"text-right\">";
                // line 36
                echo twig_get_attribute($this->env, $this->source, $context["voucher"], "amount", [], "any", false, false, false, 36);
                echo "</td>
          ";
                // line 38
                echo "        </tr>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['voucher'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            echo "      </table>
    </li>
    <li>
      <div>
        ";
            // line 52
            echo "        <p class=\"header-cart-totals\">
          <span>";
            // line 53
            echo ($context["text_total"] ?? null);
            echo "<br/><span style=\"font-size: 18px;\">";
            echo twig_get_attribute($this->env, $this->source, ($context["all_total"] ?? null), "text", [], "any", false, false, false, 53);
            echo "</span></span>
          <a href=\"";
            // line 54
            echo ($context["checkout"] ?? null);
            echo "\" type=\"button\" class=\"checkout-button\"> ";
            echo ($context["text_checkout"] ?? null);
            echo "</a></p>
        <div class=\"continue-shopping\"><span class=\"pull-right\">";
            // line 55
            echo ($context["text_csh"] ?? null);
            echo "</span></div>
      </div>
    </li>
    ";
        } else {
            // line 59
            echo "    <li>
      <p class=\"text-center\">";
            // line 60
            echo ($context["text_empty"] ?? null);
            echo "</p>
    </li>
    ";
        }
        // line 63
        echo "  </ul>
</div>
";
    }

    public function getTemplateName()
    {
        return "default/template/common/cart.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  213 => 63,  207 => 60,  204 => 59,  197 => 55,  191 => 54,  185 => 53,  182 => 52,  176 => 40,  169 => 38,  165 => 36,  160 => 34,  156 => 32,  151 => 31,  144 => 29,  142 => 28,  136 => 26,  131 => 24,  126 => 23,  123 => 22,  118 => 20,  112 => 19,  107 => 18,  104 => 17,  95 => 16,  88 => 15,  82 => 14,  68 => 13,  65 => 12,  61 => 11,  57 => 9,  55 => 8,  51 => 7,  45 => 4,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/common/cart.twig", "");
    }
}
