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

/* default/template/common/success.twig */
class __TwigTemplate_692e74f0a270022075cb9a98bf248fd5f369c237e6fcb562d738c75b260056f7 extends \Twig\Template
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
<div id=\"common-success\" class=\"container\">
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
        } elseif ((($context["column_left"] ?? null) || ($context["column_right"] ?? null))) {
            // line 12
            echo "    ";
            $context["class"] = "col-sm-9";
            // line 13
            echo "    ";
        } else {
            // line 14
            echo "    ";
            $context["class"] = "col-sm-12";
            // line 15
            echo "    ";
        }
        // line 16
        echo "    <div id=\"content\" class=\"";
        echo ($context["class"] ?? null);
        echo "\">";
        echo ($context["content_top"] ?? null);
        echo "
      <h1>";
        // line 17
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      ";
        // line 18
        echo ($context["text_message"] ?? null);
        echo "
      <div class=\"buttons\">
        <div class=\"pull-right\"><a href=\"";
        // line 20
        echo ($context["continue"] ?? null);
        echo "\" class=\"btn btn-primary\">";
        echo ($context["button_continue"] ?? null);
        echo "</a></div>
      </div>
      ";
        // line 22
        echo ($context["content_bottom"] ?? null);
        echo "</div>
    ";
        // line 23
        echo ($context["column_right"] ?? null);
        echo "</div>
</div>
<script type=\"text/javascript\">
  \$(document).ready(function() {
  window.dataLayer = window.dataLayer || [];
  dataLayer.push({
        'event': 'purchase',
        'ecommerce': {
        'transaction_id': '";
        // line 31
        echo twig_get_attribute($this->env, $this->source, ($context["order_tracker"] ?? null), "order_id", [], "any", false, false, false, 31);
        echo "',
        'value': '";
        // line 32
        echo twig_get_attribute($this->env, $this->source, ($context["order_tracker"] ?? null), "total", [], "any", false, false, false, 32);
        echo "',
        'currency': \"UAH\",
         'items': [
        // If someone purchases more than one item, 
        // you can add those items to the items array
          ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["order_tracker"] ?? null), "products", [], "any", false, false, false, 37));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 38
            echo "         {
          'item_id': '";
            // line 39
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 39);
            echo "',
          'item_name': '";
            // line 40
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 40);
            echo "',
          'affiliation': \"Google Merchandise Store\",
          // coupon: \"SUMMER_FUN\",
          // discount: 2.22,
          // index: 0,
          'item_brand': \"Procraft\",
          'item_category': '";
            // line 46
            echo twig_get_attribute($this->env, $this->source, $context["product"], "category", [], "any", false, false, false, 46);
            echo "',
          // item_category2: \"Adult\",
          // item_category3: \"Shirts\",
          // item_category4: \"Crew\",
          // item_category5: \"Short sleeve\",
          // item_list_id: \"related_products\",
          // item_list_name: \"Related Products\",
          //location_id: \"ChIJIQBpAG2ahYAR_6128GcTUEo\",
          'price': '";
            // line 54
            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 54);
            echo "',
          'quantity': '";
            // line 55
            echo twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 55);
            echo "'
        }
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "        ]
      },
    });
  dataLayer.push({
   'ecommerce': {
     'currencyCode': 'UAH',
     'purchase': {
       'actionField': {
         'id': '";
        // line 66
        echo twig_get_attribute($this->env, $this->source, ($context["order_tracker"] ?? null), "order_id", [], "any", false, false, false, 66);
        echo "',
         'affiliation': '";
        // line 67
        echo twig_get_attribute($this->env, $this->source, ($context["order_tracker"] ?? null), "store_name", [], "any", false, false, false, 67);
        echo "',
         'revenue': '";
        // line 68
        echo twig_get_attribute($this->env, $this->source, ($context["order_tracker"] ?? null), "total", [], "any", false, false, false, 68);
        echo "',
         //'tax': '";
        // line 69
        echo twig_get_attribute($this->env, $this->source, ($context["order_tracker"] ?? null), "shipping", [], "any", false, false, false, 69);
        echo "',
         //'shipping': '";
        // line 70
        echo twig_get_attribute($this->env, $this->source, ($context["order_tracker"] ?? null), "shipping", [], "any", false, false, false, 70);
        echo "'
       },
       'products': [
       ";
        // line 73
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["order_tracker"] ?? null), "products", [], "any", false, false, false, 73));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 74
            echo "         {  
           'name': '";
            // line 75
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 75);
            echo "',
             'id': '";
            // line 76
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 76);
            echo "',
             'price': '";
            // line 77
            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 77);
            echo "',
             'brand': 'ProCraft',
             'category': '";
            // line 79
            echo twig_get_attribute($this->env, $this->source, $context["product"], "category", [], "any", false, false, false, 79);
            echo "',
             'quantity': '";
            // line 80
            echo twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 80);
            echo "'
          }
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 83
        echo "        ]
     }
   },
   'event': 'gtm-ee-event',
   'gtm-ee-event-category': 'Enhanced Ecommerce',
   'gtm-ee-event-action': 'Purchase',
   'gtm-ee-event-non-interaction': 'False',
  });
});
</script>
";
        // line 93
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "default/template/common/success.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  256 => 93,  244 => 83,  235 => 80,  231 => 79,  226 => 77,  222 => 76,  218 => 75,  215 => 74,  211 => 73,  205 => 70,  201 => 69,  197 => 68,  193 => 67,  189 => 66,  179 => 58,  170 => 55,  166 => 54,  155 => 46,  146 => 40,  142 => 39,  139 => 38,  135 => 37,  127 => 32,  123 => 31,  112 => 23,  108 => 22,  101 => 20,  96 => 18,  92 => 17,  85 => 16,  82 => 15,  79 => 14,  76 => 13,  73 => 12,  70 => 11,  67 => 10,  65 => 9,  61 => 8,  58 => 7,  47 => 5,  43 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/common/success.twig", "");
    }
}
