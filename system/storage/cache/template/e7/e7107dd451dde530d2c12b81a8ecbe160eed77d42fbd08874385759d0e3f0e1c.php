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

/* catalog/review_form.twig */
class __TwigTemplate_f4959cc5a811fe72817d1c69429be18142a36d14fa9d0a1ec35ce85449aa83bc extends \Twig\Template
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
        <button type=\"submit\" form=\"#form-review\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
        <a href=\"";
        // line 7
        echo ($context["cancel"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_cancel"] ?? null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a></div>
      <h1>";
        // line 8
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            echo "        <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 11);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 11);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\"> ";
        // line 16
        if (($context["error_warning"] ?? null)) {
            // line 17
            echo "    <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 21
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 23
        echo ($context["text_form"] ?? null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 26
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-review\" class=\"form-horizontal\">
          <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\" for=\"input-author\">";
        // line 28
        echo ($context["entry_author"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"author\" value=\"";
        // line 30
        echo ($context["author"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_author"] ?? null);
        echo "\" id=\"input-author\" class=\"form-control\" />
              ";
        // line 31
        if (($context["error_author"] ?? null)) {
            // line 32
            echo "              <div class=\"text-danger\">";
            echo ($context["error_author"] ?? null);
            echo "</div>
              ";
        }
        // line 33
        echo " </div>
          </div>
          <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\" for=\"input-product\"><span data-toggle=\"tooltip\" title=\"";
        // line 36
        echo ($context["help_product"] ?? null);
        echo "\">";
        echo ($context["entry_product"] ?? null);
        echo "</span></label>
            <div class=\"col-sm-10\">
              <input type=\"text\" name=\"product\" value=\"";
        // line 38
        echo ($context["product"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_product"] ?? null);
        echo "\" id=\"input-product\" class=\"form-control\" />
              <input type=\"hidden\" name=\"product_id\" value=\"";
        // line 39
        echo ($context["product_id"] ?? null);
        echo "\" />
              ";
        // line 40
        if (($context["error_product"] ?? null)) {
            // line 41
            echo "              <div class=\"text-danger\">";
            echo ($context["error_product"] ?? null);
            echo "</div>
              ";
        }
        // line 42
        echo " </div>
          </div>
          <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\" for=\"input-text\">";
        // line 45
        echo ($context["entry_text"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <textarea name=\"text\" cols=\"60\" rows=\"8\" placeholder=\"";
        // line 47
        echo ($context["entry_text"] ?? null);
        echo "\" id=\"input-text\" class=\"form-control\">";
        echo ($context["text"] ?? null);
        echo "</textarea>
              ";
        // line 48
        if (($context["error_text"] ?? null)) {
            // line 49
            echo "              <div class=\"text-danger\">";
            echo ($context["error_text"] ?? null);
            echo "</div>
              ";
        }
        // line 50
        echo " </div>
          </div>
          ";
        // line 52
        if ((($context["parent_id"] ?? null) == 0)) {
            // line 53
            echo "          <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\" for=\"input-text\">";
            // line 54
            echo ($context["entry_answer"] ?? null);
            echo "</label>
            <div class=\"col-sm-10\">
              <textarea name=\"answer\" cols=\"60\" rows=\"8\" placeholder=\"";
            // line 56
            echo ($context["entry_answer"] ?? null);
            echo "\" id=\"input-text\" class=\"form-control\">";
            echo ($context["answer"] ?? null);
            echo "</textarea>
              ";
            // line 57
            if (($context["error_text"] ?? null)) {
                // line 58
                echo "              <div class=\"text-danger\">";
                echo ($context["error_answer"] ?? null);
                echo "</div>
              ";
            }
            // line 59
            echo " </div>
          </div>
          ";
        }
        // line 62
        echo "          <div class=\"form-group required\">
            <label class=\"col-sm-2 control-label\" for=\"input-name\">";
        // line 63
        echo ($context["entry_rating"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <label class=\"radio-inline\"> ";
        // line 65
        if ((($context["rating"] ?? null) == 1)) {
            // line 66
            echo "                <input type=\"radio\" name=\"rating\" value=\"1\" checked=\"checked\" />
                1
                ";
        } else {
            // line 69
            echo "                <input type=\"radio\" name=\"rating\" value=\"1\" />
                1
                ";
        }
        // line 71
        echo " </label>
              <label class=\"radio-inline\"> ";
        // line 72
        if ((($context["rating"] ?? null) == 2)) {
            // line 73
            echo "                <input type=\"radio\" name=\"rating\" value=\"2\" checked=\"checked\" />
                2
                ";
        } else {
            // line 76
            echo "                <input type=\"radio\" name=\"rating\" value=\"2\" />
                2
                ";
        }
        // line 78
        echo " </label>
              <label class=\"radio-inline\"> ";
        // line 79
        if ((($context["rating"] ?? null) == 3)) {
            // line 80
            echo "                <input type=\"radio\" name=\"rating\" value=\"3\" checked=\"checked\" />
                3
                ";
        } else {
            // line 83
            echo "                <input type=\"radio\" name=\"rating\" value=\"3\" />
                3
                ";
        }
        // line 85
        echo " </label>
              <label class=\"radio-inline\"> ";
        // line 86
        if ((($context["rating"] ?? null) == 4)) {
            // line 87
            echo "                <input type=\"radio\" name=\"rating\" value=\"4\" checked=\"checked\" />
                4
                ";
        } else {
            // line 90
            echo "                <input type=\"radio\" name=\"rating\" value=\"4\" />
                4
                ";
        }
        // line 92
        echo " </label>
              <label class=\"radio-inline\"> ";
        // line 93
        if ((($context["rating"] ?? null) == 5)) {
            // line 94
            echo "                <input type=\"radio\" name=\"rating\" value=\"5\" checked=\"checked\" />
                5
                ";
        } else {
            // line 97
            echo "                <input type=\"radio\" name=\"rating\" value=\"5\" />
                5
                ";
        }
        // line 99
        echo " </label>
              ";
        // line 100
        if (($context["error_rating"] ?? null)) {
            // line 101
            echo "              <div class=\"text-danger\">";
            echo ($context["error_rating"] ?? null);
            echo "</div>
              ";
        }
        // line 102
        echo " </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-date-added\">";
        // line 105
        echo ($context["entry_date_added"] ?? null);
        echo "</label>
            <div class=\"col-sm-3\">
              <div class=\"input-group datetime\">
                <input type=\"text\" name=\"date_added\" value=\"";
        // line 108
        echo ($context["date_added"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_date_added"] ?? null);
        echo "\" data-date-format=\"YYYY-MM-DD HH:mm:ss\" id=\"input-date-added\" class=\"form-control\" />
                <span class=\"input-group-btn\">
                <button type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-calendar\"></i></button>
                </span> </div>
            </div>
          </div>
          <div class=\"form-group\">
            <label class=\"col-sm-2 control-label\" for=\"input-status\">";
        // line 115
        echo ($context["entry_status"] ?? null);
        echo "</label>
            <div class=\"col-sm-10\">
              <select name=\"status\" id=\"input-status\" class=\"form-control\">
                
                ";
        // line 119
        if (($context["status"] ?? null)) {
            // line 120
            echo "                
                <option value=\"1\" selected=\"selected\">";
            // line 121
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                <option value=\"0\">";
            // line 122
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                
                ";
        } else {
            // line 125
            echo "                
                <option value=\"1\">";
            // line 126
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                <option value=\"0\" selected=\"selected\">";
            // line 127
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                
                ";
        }
        // line 130
        echo "              
              </select>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type=\"text/javascript\"><!--
\$('.datetime').datetimepicker({
\tlanguage: '";
        // line 140
        echo ($context["datepicker"] ?? null);
        echo "',
\tpickDate: true,
\tpickTime: true
});
//--></script> 
  <script type=\"text/javascript\"><!--
\$('input[name=\\'product\\']').autocomplete({
\t'source': function(request, response) {
\t\t\$.ajax({
\t\t\turl: 'index.php?route=catalog/product/autocomplete&user_token=";
        // line 149
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' +  encodeURIComponent(request),
\t\t\tdataType: 'json',\t\t\t
\t\t\tsuccess: function(json) {
\t\t\t\tresponse(\$.map(json, function(item) {
\t\t\t\t\treturn {
\t\t\t\t\t\tlabel: item['name'],
\t\t\t\t\t\tvalue: item['product_id']
\t\t\t\t\t}
\t\t\t\t}));
\t\t\t}
\t\t});
\t},
\t'select': function(item) {
\t\t\$('input[name=\\'product\\']').val(item['label']);
\t\t\$('input[name=\\'product_id\\']').val(item['value']);\t\t
\t}\t
});
//--></script></div>
";
        // line 167
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "catalog/review_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  406 => 167,  385 => 149,  373 => 140,  361 => 130,  355 => 127,  351 => 126,  348 => 125,  342 => 122,  338 => 121,  335 => 120,  333 => 119,  326 => 115,  314 => 108,  308 => 105,  303 => 102,  297 => 101,  295 => 100,  292 => 99,  287 => 97,  282 => 94,  280 => 93,  277 => 92,  272 => 90,  267 => 87,  265 => 86,  262 => 85,  257 => 83,  252 => 80,  250 => 79,  247 => 78,  242 => 76,  237 => 73,  235 => 72,  232 => 71,  227 => 69,  222 => 66,  220 => 65,  215 => 63,  212 => 62,  207 => 59,  201 => 58,  199 => 57,  193 => 56,  188 => 54,  185 => 53,  183 => 52,  179 => 50,  173 => 49,  171 => 48,  165 => 47,  160 => 45,  155 => 42,  149 => 41,  147 => 40,  143 => 39,  137 => 38,  130 => 36,  125 => 33,  119 => 32,  117 => 31,  111 => 30,  106 => 28,  101 => 26,  95 => 23,  91 => 21,  83 => 17,  81 => 16,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "catalog/review_form.twig", "");
    }
}
