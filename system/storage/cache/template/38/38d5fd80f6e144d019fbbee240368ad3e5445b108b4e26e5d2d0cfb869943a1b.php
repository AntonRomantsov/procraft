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

/* extension/module/giftor/form.twig */
class __TwigTemplate_efd61b499f1899f6238099a0cdcacc5e0936361e080cf0adaf09e7c24506594c extends \Twig\Template
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
        echo ($context["column_left"] ?? null);
        echo "
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"pull-right\">
        <button type=\"submit\" form=\"form-gift\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
        <a href=\"";
        // line 7
        echo ($context["cancel"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_cancel"] ?? null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a>
      </div>
      <h1>";
        // line 9
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 12
            echo "        <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 12);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 12);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\">
    ";
        // line 18
        if (($context["error_warning"] ?? null)) {
            // line 19
            echo "    <div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 23
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 25
        echo ($context["text_form"] ?? null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 28
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-gift\" class=\"form-horizontal\">
          <ul class=\"nav nav-tabs\">
            <li class=\"active\"><a href=\"#tab-general\" data-toggle=\"tab\">";
        // line 30
        echo ($context["tab_general"] ?? null);
        echo "</a></li>
          </ul>
          <div class=\"tab-content\">
            <div class=\"tab-pane active in\" id=\"tab-general\">

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-gift\"><span data-toggle=\"tooltip\" title=\"";
        // line 36
        echo ($context["help_gift"] ?? null);
        echo "\">";
        echo ($context["entry_gift"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"product_gift\" value=\"";
        // line 38
        echo ($context["product_gift"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_gift"] ?? null);
        echo "\" id=\"input-gift\" class=\"form-control\" />
                  <input type=\"hidden\" name=\"product_id\" value=\"";
        // line 39
        echo ($context["product_id"] ?? null);
        echo "\" />
                  ";
        // line 40
        if (($context["error_gift"] ?? null)) {
            // line 41
            echo "                    <div class=\"text-danger\">";
            echo ($context["error_gift"] ?? null);
            echo "</div>
                  ";
        }
        // line 43
        echo "                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-based\"><span data-toggle=\"tooltip\" title=\"";
        // line 47
        echo ($context["help_based"] ?? null);
        echo "\">";
        echo ($context["entry_based"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <select name=\"based\" id=\"input-based\" class=\"form-control\">
                    <option value=\"0\" ";
        // line 50
        echo (((($context["based"] ?? null) == "0")) ? ("selected") : (""));
        echo ">";
        echo ($context["text_amount"] ?? null);
        echo "</option>
                    <option value=\"1\" ";
        // line 51
        echo (((($context["based"] ?? null) == "1")) ? ("selected") : (""));
        echo ">";
        echo ($context["text_product"] ?? null);
        echo "</option>
                    <option value=\"2\" ";
        // line 52
        echo (((($context["based"] ?? null) == "2")) ? ("selected") : (""));
        echo ">";
        echo ($context["text_category"] ?? null);
        echo "</option>
                    <option value=\"3\" ";
        // line 53
        echo (((($context["based"] ?? null) == "3")) ? ("selected") : (""));
        echo ">";
        echo ($context["text_manufacturer"] ?? null);
        echo "</option>
                  </select>
                </div>
              </div>

              <div class=\"form-group\" data-parent-id=\"#input-based\" data-parent-value=\"1\">
                <label class=\"col-sm-2 control-label\" for=\"input-product\"><span data-toggle=\"tooltip\" title=\"";
        // line 59
        echo ($context["help_product"] ?? null);
        echo "\">";
        echo ($context["entry_product"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"product_name\" value=\"\" placeholder=\"";
        // line 61
        echo ($context["entry_product"] ?? null);
        echo "\" id=\"input-product\" class=\"form-control\" />
                  <div id=\"gift-product\" class=\"well well-sm\" style=\"height: 150px; overflow: auto;\">
                    ";
        // line 63
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 64
            echo "                    <div id=\"gift-product";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 64);
            echo "\"><i class=\"fa fa-minus-circle\"></i> ";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 64);
            echo "
                      <input type=\"hidden\" name=\"product[]\" value=\"";
            // line 65
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 65);
            echo "\" />
                    </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "                  </div>
                </div>
              </div>

              <div class=\"form-group\" data-parent-id=\"#input-based\" data-parent-value=\"1\">
                <label class=\"col-sm-2 control-label\" for=\"input-condition1\"><span data-toggle=\"tooltip\" title=\"";
        // line 73
        echo ($context["help_condition"] ?? null);
        echo "\">";
        echo ($context["entry_condition"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <select name=\"condition1\" id=\"input-condition1\" class=\"form-control\">
                    <option value=\"0\" ";
        // line 76
        echo (((($context["condition1"] ?? null) == "0")) ? ("selected") : (""));
        echo ">";
        echo ($context["text_all1"] ?? null);
        echo "</option>
                    <option value=\"1\" ";
        // line 77
        echo (((($context["condition1"] ?? null) == "1")) ? ("selected") : (""));
        echo ">";
        echo ($context["text_any1"] ?? null);
        echo "</option>
                  </select>
                </div>
              </div>

              <div class=\"form-group\" data-parent-id=\"#input-based\" data-parent-value=\"2\">
                <label class=\"col-sm-2 control-label\" for=\"input-category\"><span data-toggle=\"tooltip\" title=\"";
        // line 83
        echo ($context["help_category"] ?? null);
        echo "\">";
        echo ($context["entry_category"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"category_name\" value=\"\" placeholder=\"";
        // line 85
        echo ($context["entry_category"] ?? null);
        echo "\" id=\"input-category\" class=\"form-control\" />
                  <div id=\"gift-category\" class=\"well well-sm\" style=\"height: 150px; overflow: auto;\">
                    ";
        // line 87
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 88
            echo "                    <div id=\"gift-category";
            echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 88);
            echo "\"><i class=\"fa fa-minus-circle\"></i> ";
            echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 88);
            echo "
                      <input type=\"hidden\" name=\"category[]\" value=\"";
            // line 89
            echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 89);
            echo "\" />
                    </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
        echo "                  </div>
                </div>
              </div>

              <div class=\"form-group\" data-parent-id=\"#input-based\" data-parent-value=\"2\">
                <label class=\"col-sm-2 control-label\" for=\"input-condition2\"><span data-toggle=\"tooltip\" title=\"";
        // line 97
        echo ($context["help_condition"] ?? null);
        echo "\">";
        echo ($context["entry_condition"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <select name=\"condition2\" id=\"input-condition2\" class=\"form-control\">
                    <option value=\"0\" ";
        // line 100
        echo (((($context["condition2"] ?? null) == "0")) ? ("selected") : (""));
        echo ">";
        echo ($context["text_all2"] ?? null);
        echo "</option>
                    <option value=\"1\" ";
        // line 101
        echo (((($context["condition2"] ?? null) == "1")) ? ("selected") : (""));
        echo ">";
        echo ($context["text_any2"] ?? null);
        echo "</option>
                  </select>
                </div>
              </div>

              <div class=\"form-group\" data-parent-id=\"#input-based\" data-parent-value=\"3\">
                <label class=\"col-sm-2 control-label\" for=\"input-manufacturer\"><span data-toggle=\"tooltip\" title=\"";
        // line 107
        echo ($context["help_manufacturer"] ?? null);
        echo "\">";
        echo ($context["entry_manufacturer"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"manufacturer_name\" value=\"\" placeholder=\"";
        // line 109
        echo ($context["entry_manufacturer"] ?? null);
        echo "\" id=\"input-manufacturer\" class=\"form-control\" />
                  <div id=\"gift-manufacturer\" class=\"well well-sm\" style=\"height: 150px; overflow: auto;\">
                    ";
        // line 111
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["manufacturers"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["manufacturer"]) {
            // line 112
            echo "                    <div id=\"gift-manufacturer";
            echo twig_get_attribute($this->env, $this->source, $context["manufacturer"], "manufacturer_id", [], "any", false, false, false, 112);
            echo "\"><i class=\"fa fa-minus-circle\"></i> ";
            echo twig_get_attribute($this->env, $this->source, $context["manufacturer"], "name", [], "any", false, false, false, 112);
            echo "
                      <input type=\"hidden\" name=\"manufacturer[]\" value=\"";
            // line 113
            echo twig_get_attribute($this->env, $this->source, $context["manufacturer"], "manufacturer_id", [], "any", false, false, false, 113);
            echo "\" />
                    </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['manufacturer'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 116
        echo "                  </div>
                </div>
              </div>

              <div class=\"form-group\" data-parent-id=\"#input-based\" data-parent-value=\"3\">
                <label class=\"col-sm-2 control-label\" for=\"input-condition3\"><span data-toggle=\"tooltip\" title=\"";
        // line 121
        echo ($context["help_condition"] ?? null);
        echo "\">";
        echo ($context["entry_condition"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <select name=\"condition3\" id=\"input-condition3\" class=\"form-control\">
                    <option value=\"0\" ";
        // line 124
        echo (((($context["condition3"] ?? null) == "0")) ? ("selected") : (""));
        echo ">";
        echo ($context["text_all3"] ?? null);
        echo "</option>
                    <option value=\"1\" ";
        // line 125
        echo (((($context["condition3"] ?? null) == "1")) ? ("selected") : (""));
        echo ">";
        echo ($context["text_any3"] ?? null);
        echo "</option>
                  </select>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-min\"><span data-toggle=\"tooltip\" title=\"";
        // line 131
        echo ($context["help_total"] ?? null);
        echo "\">";
        echo ($context["entry_total"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <div class=\"form-inline\">
                    <input name=\"min_total\" id=\"input-min\" value=\"";
        // line 134
        echo ($context["min_total"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_min"] ?? null);
        echo "\" class=\"form-control\">
                    <label>&nbsp;&nbsp; &ndash; &nbsp;&nbsp;</label>
                    <input name=\"max_total\" id=\"input-max\" value=\"";
        // line 136
        echo ($context["max_total"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_max"] ?? null);
        echo "\" class=\"form-control\">
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 142
        echo ($context["help_date"] ?? null);
        echo "\">";
        echo ($context["entry_date"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <div class=\"form-inline\">
                  <div class=\"input-group date\">
                    <input type=\"text\" name=\"date_start\" value=\"";
        // line 146
        echo ($context["date_start"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_date_start"] ?? null);
        echo "\" data-date-format=\"YYYY-MM-DD\" class=\"form-control\"/>
                    <span class=\"input-group-btn\">
                      <button class=\"btn btn-default\" type=\"button\"><i class=\"fa fa-calendar\"></i></button>
                    </span>
                  </div>
                  <label>&nbsp;&nbsp; &ndash; &nbsp;&nbsp;</label>
                  <div class=\"input-group date\">
                    <input type=\"text\" name=\"date_end\" value=\"";
        // line 153
        echo ($context["date_end"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_date_end"] ?? null);
        echo "\" data-date-format=\"YYYY-MM-DD\" class=\"form-control\"/>
                    <span class=\"input-group-btn\">
                      <button class=\"btn btn-default\" type=\"button\"><i class=\"fa fa-calendar\"></i></button>
                    </span>
                  </div>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\"><span class=\"help\" title=\"";
        // line 163
        echo ($context["help_customer_group"] ?? null);
        echo "\" data-toggle=\"tooltip\">";
        echo ($context["entry_customer_group"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <div class=\"checkbox\">
                    <label><input type=\"checkbox\" name=\"customer_group[]\" value=\"0\" ";
        // line 166
        if ((twig_test_empty(($context["customer_group"] ?? null)) || twig_in_filter(0, ($context["customer_group"] ?? null)))) {
            echo "checked=\"checked\"";
        }
        echo "/> ";
        echo ($context["text_all_group"] ?? null);
        echo "</label>
                  </div>
                  ";
        // line 168
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["group"]) {
            // line 169
            echo "                  <div class=\"checkbox\">
                    <label>
                      ";
            // line 171
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["group"], "customer_group_id", [], "any", false, false, false, 171), ($context["customer_group"] ?? null))) {
                // line 172
                echo "                      <input type=\"checkbox\" name=\"customer_group[]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["group"], "customer_group_id", [], "any", false, false, false, 172);
                echo "\" checked=\"checked\" />
                      ";
                // line 173
                echo twig_get_attribute($this->env, $this->source, $context["group"], "name", [], "any", false, false, false, 173);
                echo "
                      ";
            } else {
                // line 175
                echo "                      <input type=\"checkbox\" name=\"customer_group[]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["group"], "customer_group_id", [], "any", false, false, false, 175);
                echo "\" />
                      ";
                // line 176
                echo twig_get_attribute($this->env, $this->source, $context["group"], "name", [], "any", false, false, false, 176);
                echo "
                      ";
            }
            // line 178
            echo "                    </label>
                  </div>
                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 181
        echo "                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 185
        echo ($context["entry_status"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <select name=\"status\" id=\"input-status\" class=\"form-control\">
                    ";
        // line 188
        if (($context["status"] ?? null)) {
            // line 189
            echo "                    <option value=\"1\" selected=\"selected\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                    <option value=\"0\">";
            // line 190
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                    ";
        } else {
            // line 192
            echo "                    <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                    <option value=\"0\" selected=\"selected\">";
            // line 193
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                    ";
        }
        // line 194
        echo " 
                  </select>
                </div>
              </div>

            </div>

          </div>
        </form>
      </div>
  </div>
<script type=\"text/javascript\"><!--
\$('input[name=\\'product_gift\\']').autocomplete({
  'source': function(request, response) {
    \$.ajax({
      url: 'index.php?route=catalog/product/autocomplete&user_token=";
        // line 209
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' +  encodeURIComponent(request),
      dataType: 'json',     
      success: function(json) {
        
        response(\$.map(json, function(item) {
          return {
            label: item['name'],
            value: item['product_id']
          }
        }));
      }
    });
  },
  'select': function(item) {
    \$('input[name=\\'product_gift\\']').val(item['label']);
    \$('input[name=\\'product_id\\']').val(item['value']);
  } 
});

\$('input[name=\\'product_name\\']').autocomplete({
  source: function(request, response) {
    \$.ajax({
      url: 'index.php?route=catalog/product/autocomplete&user_token=";
        // line 231
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' +  encodeURIComponent(request),
      dataType: 'json',
      success: function(json) {
        response(\$.map(json, function(item) {
          return {
            label: item['name'],
            value: item['product_id']
          }
        }));
      }
    });
  },
  select: function(item) {
    \$('input[name=\\'product_name\\']').val('');
    
    \$('#gift-product' + item['value']).remove();
    
    \$('#gift-product').append('<div id=\"gift-product' + item['value'] + '\"><i class=\"fa fa-minus-circle\"></i> ' + item['label'] + '<input type=\"hidden\" name=\"product[]\" value=\"' + item['value'] + '\" /></div>');  
  }
});
  
\$('#gift-product').delegate('.fa-minus-circle', 'click', function() {
  \$(this).parent().remove();
});

\$('input[name=\\'category_name\\']').autocomplete({
  source: function(request, response) {
    \$.ajax({
      url: 'index.php?route=catalog/category/autocomplete&user_token=";
        // line 259
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' +  encodeURIComponent(request),
      dataType: 'json',
      success: function(json) {
        response(\$.map(json, function(item) {
          return {
            label: item['name'],
            value: item['category_id']
          }
        }));
      }
    });
  },
  select: function(item) {
    \$('input[name=\\'category_name\\']').val('');
    
    \$('#gift-category' + item['value']).remove();
    
    \$('#gift-category').append('<div id=\"gift-category' + item['value'] + '\"><i class=\"fa fa-minus-circle\"></i> ' + item['label'] + '<input type=\"hidden\" name=\"category[]\" value=\"' + item['value'] + '\" /></div>'); 
  }
});
  
\$('#gift-category').delegate('.fa-minus-circle', 'click', function() {
  \$(this).parent().remove();
});

\$('input[name=\\'manufacturer_name\\']').autocomplete({
  source: function(request, response) {
    \$.ajax({
      url: 'index.php?route=catalog/manufacturer/autocomplete&user_token=";
        // line 287
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' +  encodeURIComponent(request),
      dataType: 'json',
      success: function(json) {
        response(\$.map(json, function(item) {
          return {
            label: item['name'],
            value: item['manufacturer_id']
          }
        }));
      }
    });
  },
  select: function(item) {
    \$('input[name=\\'manufacturer_name\\']').val('');
    
    \$('#gift-manufacturer' + item['value']).remove();
    
    \$('#gift-manufacturer').append('<div id=\"gift-manufacturer' + item['value'] + '\"><i class=\"fa fa-minus-circle\"></i> ' + item['label'] + '<input type=\"hidden\" name=\"manufacturer[]\" value=\"' + item['value'] + '\" /></div>'); 
  }
});
  
\$('#gift-manufacturer').delegate('.fa-minus-circle', 'click', function() {
  \$(this).parent().remove();
});
//--></script>
<script><!--
  function visibility(selector = '.form-group'){
    \$.each(\$(selector), function(index, item){
      var parent = \$(item).data('parent-id');
      var value = \$(item).data('parent-value');
      if (parent) {
      if (\$(parent).val() == value) {
        \$(item).css('background', '#e9f1fe').show(400);
      } else {
        \$(item).hide(400);
      }
      }
    });
  }

  \$(document).ready(function(){
    setInterval('visibility()', 500);
  });

  \$('.date').datetimepicker({
    language: '";
        // line 332
        echo ($context["datepicker"] ?? null);
        echo "',
    pickTime: false
  });
//--></script>

</div>
";
        // line 338
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "extension/module/giftor/form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  689 => 338,  680 => 332,  632 => 287,  601 => 259,  570 => 231,  545 => 209,  528 => 194,  523 => 193,  518 => 192,  513 => 190,  508 => 189,  506 => 188,  500 => 185,  494 => 181,  486 => 178,  481 => 176,  476 => 175,  471 => 173,  466 => 172,  464 => 171,  460 => 169,  456 => 168,  447 => 166,  439 => 163,  424 => 153,  412 => 146,  403 => 142,  392 => 136,  385 => 134,  377 => 131,  366 => 125,  360 => 124,  352 => 121,  345 => 116,  336 => 113,  329 => 112,  325 => 111,  320 => 109,  313 => 107,  302 => 101,  296 => 100,  288 => 97,  281 => 92,  272 => 89,  265 => 88,  261 => 87,  256 => 85,  249 => 83,  238 => 77,  232 => 76,  224 => 73,  217 => 68,  208 => 65,  201 => 64,  197 => 63,  192 => 61,  185 => 59,  174 => 53,  168 => 52,  162 => 51,  156 => 50,  148 => 47,  142 => 43,  136 => 41,  134 => 40,  130 => 39,  124 => 38,  117 => 36,  108 => 30,  103 => 28,  97 => 25,  93 => 23,  85 => 19,  83 => 18,  77 => 14,  66 => 12,  62 => 11,  57 => 9,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/giftor/form.twig", "");
    }
}
