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

/* default/template/page/page_oc3/form_fields.twig */
class __TwigTemplate_054f2b9b092c94c3e3833310b2e7a89f831d03b34abc39e0f8a989161eb27aca extends \Twig\Template
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
        if (($context["page_form_options"] ?? null)) {
            // line 2
            echo "  ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["page_form_options"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["page_form_option"]) {
                // line 3
                echo "    ";
                if ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "type", [], "any", false, false, false, 3) == "select")) {
                    // line 4
                    echo "      <div class=\"form-group";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "required", [], "any", false, false, false, 4)) ? (" required") : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 4)) ? (("col-sm-" . twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 4))) : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 4)) ? (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 4)) : (""));
                    echo "\">
        <label class=\"control-label\" for=\"input-field";
                    // line 5
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 5);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_name", [], "any", false, false, false, 5);
                    echo "
          ";
                    // line 6
                    if (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 6)) {
                        // line 7
                        echo "            <i class=\"fa fa-question-circle\" data-toggle=\"tooltip\" title=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 7);
                        echo "\"></i>
          ";
                    }
                    // line 9
                    echo "        </label>
        <select name=\"field[";
                    // line 10
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 10);
                    echo "]\" id=\"input-field";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 10);
                    echo "\" class=\"form-control\">
          <option value=\"\">";
                    // line 11
                    echo ($context["text_select"] ?? null);
                    echo "</option>
          ";
                    // line 12
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_value", [], "any", false, false, false, 12));
                    foreach ($context['_seq'] as $context["_key"] => $context["page_form_option_value"]) {
                        // line 13
                        echo "          ";
                        if (twig_get_attribute($this->env, $this->source, $context["page_form_option_value"], "default_value", [], "any", false, false, false, 13)) {
                            // line 14
                            echo "            ";
                            $context["sel"] = "selected=\"selected\"";
                            // line 15
                            echo "          ";
                        } else {
                            // line 16
                            echo "            ";
                            $context["sel"] = "";
                            // line 17
                            echo "          ";
                        }
                        // line 18
                        echo "          <option value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option_value"], "page_form_option_value_id", [], "any", false, false, false, 18);
                        echo "\" ";
                        echo ($context["sel"] ?? null);
                        echo ">";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option_value"], "name", [], "any", false, false, false, 18);
                        echo "</option>
          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page_form_option_value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 20
                    echo "        </select>
      </div>
      ";
                }
                // line 23
                echo "      ";
                if ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "type", [], "any", false, false, false, 23) == "radio")) {
                    // line 24
                    echo "      <div class=\"form-group";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "required", [], "any", false, false, false, 24)) ? (" required") : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 24)) ? (("col-sm-" . twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 24))) : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 24)) ? (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 24)) : (""));
                    echo "\">
        <label class=\"control-label\">";
                    // line 25
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_name", [], "any", false, false, false, 25);
                    echo "
          ";
                    // line 26
                    if (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 26)) {
                        // line 27
                        echo "            <i class=\"fa fa-question-circle\" data-toggle=\"tooltip\" title=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 27);
                        echo "\"></i>
          ";
                    }
                    // line 29
                    echo "        </label>
        <div id=\"input-field";
                    // line 30
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 30);
                    echo "\">
          ";
                    // line 31
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_value", [], "any", false, false, false, 31));
                    foreach ($context['_seq'] as $context["_key"] => $context["page_form_option_value"]) {
                        // line 32
                        echo "          <div class=\"radio-inline\">
            <label>
              ";
                        // line 34
                        if (twig_get_attribute($this->env, $this->source, $context["page_form_option_value"], "default_value", [], "any", false, false, false, 34)) {
                            // line 35
                            echo "                ";
                            $context["sel"] = "selected=\"selected\"";
                            // line 36
                            echo "              ";
                        } else {
                            // line 37
                            echo "                ";
                            $context["sel"] = "";
                            // line 38
                            echo "              ";
                        }
                        // line 39
                        echo "              <input type=\"radio\" name=\"field[";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 39);
                        echo "]\" value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option_value"], "page_form_option_value_id", [], "any", false, false, false, 39);
                        echo "\" ";
                        echo ($context["sel"] ?? null);
                        echo " />
              ";
                        // line 40
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option_value"], "name", [], "any", false, false, false, 40);
                        echo "
            </label>
          </div>
          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page_form_option_value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 44
                    echo "        </div>
      </div>
      ";
                }
                // line 47
                echo "      ";
                if ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "type", [], "any", false, false, false, 47) == "checkbox")) {
                    // line 48
                    echo "      <div class=\"form-group";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "required", [], "any", false, false, false, 48)) ? (" required") : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 48)) ? (("col-sm-" . twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 48))) : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 48)) ? (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 48)) : (""));
                    echo "\">
        <label class=\"control-label\">";
                    // line 49
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_name", [], "any", false, false, false, 49);
                    echo "
          ";
                    // line 50
                    if (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 50)) {
                        // line 51
                        echo "            <i class=\"fa fa-question-circle\" data-toggle=\"tooltip\" title=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 51);
                        echo "\"></i>
          ";
                    }
                    // line 53
                    echo "        </label>
        <div id=\"input-field";
                    // line 54
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 54);
                    echo "\">
          ";
                    // line 55
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_value", [], "any", false, false, false, 55));
                    foreach ($context['_seq'] as $context["_key"] => $context["page_form_option_value"]) {
                        // line 56
                        echo "          <div class=\"checkbox\">
            <label>
              ";
                        // line 58
                        if (twig_get_attribute($this->env, $this->source, $context["page_form_option_value"], "default_value", [], "any", false, false, false, 58)) {
                            // line 59
                            echo "                ";
                            $context["sel"] = "selected=\"selected\"";
                            // line 60
                            echo "              ";
                        } else {
                            // line 61
                            echo "                ";
                            $context["sel"] = "";
                            // line 62
                            echo "              ";
                        }
                        // line 63
                        echo "              <input type=\"checkbox\" name=\"field[";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 63);
                        echo "][]\" value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option_value"], "page_form_option_value_id", [], "any", false, false, false, 63);
                        echo "\" ";
                        echo ($context["sel"] ?? null);
                        echo " />
              ";
                        // line 64
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option_value"], "name", [], "any", false, false, false, 64);
                        echo "
            </label>
          </div>
          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page_form_option_value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 68
                    echo "        </div>
      </div>
      ";
                }
                // line 71
                echo "
      ";
                // line 72
                if ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "type", [], "any", false, false, false, 72) == "checkbox_toggle")) {
                    // line 73
                    echo "      <div class=\"form-group";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "required", [], "any", false, false, false, 73)) ? (" required") : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 73)) ? (("col-sm-" . twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 73))) : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 73)) ? (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 73)) : (""));
                    echo "\">
        <label class=\"control-label\">";
                    // line 74
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_name", [], "any", false, false, false, 74);
                    echo "
          ";
                    // line 75
                    if (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 75)) {
                        // line 76
                        echo "            <i class=\"fa fa-question-circle\" data-toggle=\"tooltip\" title=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 76);
                        echo "\"></i>
          ";
                    }
                    // line 78
                    echo "        </label>
        <div id=\"input-field";
                    // line 79
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 79);
                    echo "\">
          ";
                    // line 80
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_value", [], "any", false, false, false, 80));
                    foreach ($context['_seq'] as $context["_key"] => $context["page_form_option_value"]) {
                        // line 81
                        echo "          <div class=\"checkbox\">
            <label class=\"ci-switch\">
              ";
                        // line 83
                        if (twig_get_attribute($this->env, $this->source, $context["page_form_option_value"], "default_value", [], "any", false, false, false, 83)) {
                            // line 84
                            echo "                ";
                            $context["sel"] = "selected=\"selected\"";
                            // line 85
                            echo "                ";
                            $context["sel_active"] = "active";
                            // line 86
                            echo "              ";
                        } else {
                            // line 87
                            echo "                ";
                            $context["sel"] = "";
                            // line 88
                            echo "                ";
                            $context["sel_active"] = "";
                            // line 89
                            echo "              ";
                        }
                        // line 90
                        echo "              <input type=\"checkbox\" name=\"field[";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 90);
                        echo "][]\" value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option_value"], "page_form_option_value_id", [], "any", false, false, false, 90);
                        echo "\" ";
                        echo ($context["sel"] ?? null);
                        echo " />
              <span class=\"ci-slider round\"></span>
            </label>
            <label>
            ";
                        // line 94
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option_value"], "name", [], "any", false, false, false, 94);
                        echo "
            </label>
          </div>
          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page_form_option_value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 98
                    echo "        </div>
      </div>
      ";
                }
                // line 101
                echo "
      ";
                // line 102
                if ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "type", [], "any", false, false, false, 102) == "multi_select")) {
                    // line 103
                    echo "      <div class=\"form-group";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "required", [], "any", false, false, false, 103)) ? (" required") : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 103)) ? (("col-sm-" . twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 103))) : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 103)) ? (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 103)) : (""));
                    echo "\">
        <label class=\"control-label\">";
                    // line 104
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_name", [], "any", false, false, false, 104);
                    echo "
          ";
                    // line 105
                    if (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 105)) {
                        // line 106
                        echo "            <i class=\"fa fa-question-circle\" data-toggle=\"tooltip\" title=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 106);
                        echo "\"></i>
          ";
                    }
                    // line 108
                    echo "        </label>
        <select multiple name=\"field[";
                    // line 109
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 109);
                    echo "][]\" id=\"input-field";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 109);
                    echo "\" class=\"form-control multiselect\">
          ";
                    // line 110
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_value", [], "any", false, false, false, 110));
                    foreach ($context['_seq'] as $context["_key"] => $context["page_form_option_value"]) {
                        // line 111
                        echo "          ";
                        if (twig_get_attribute($this->env, $this->source, $context["page_form_option_value"], "default_value", [], "any", false, false, false, 111)) {
                            // line 112
                            echo "            ";
                            $context["sel"] = "selected=\"selected\"";
                            // line 113
                            echo "          ";
                        } else {
                            // line 114
                            echo "            ";
                            $context["sel"] = "";
                            // line 115
                            echo "          ";
                        }
                        // line 116
                        echo "          <option value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option_value"], "page_form_option_value_id", [], "any", false, false, false, 116);
                        echo "\" ";
                        echo ($context["sel"] ?? null);
                        echo ">";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option_value"], "name", [], "any", false, false, false, 116);
                        echo "
          </option>
          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page_form_option_value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 119
                    echo "        </select>
      </div>
      ";
                }
                // line 122
                echo "
      ";
                // line 123
                if ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "type", [], "any", false, false, false, 123) == "radio_toggle")) {
                    // line 124
                    echo "      <div class=\"form-group";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "required", [], "any", false, false, false, 124)) ? (" required") : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 124)) ? (("col-sm-" . twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 124))) : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 124)) ? (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 124)) : (""));
                    echo "\">
        <label class=\"control-label\">";
                    // line 125
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_name", [], "any", false, false, false, 125);
                    echo "
          ";
                    // line 126
                    if (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 126)) {
                        // line 127
                        echo "            <i class=\"fa fa-question-circle\" data-toggle=\"tooltip\" title=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 127);
                        echo "\"></i>
          ";
                    }
                    // line 129
                    echo "        </label>
        <div id=\"input-field";
                    // line 130
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 130);
                    echo "\" class=\"btn-group\" data-toggle=\"buttons\">
          ";
                    // line 131
                    $context["sel_count"] = 0;
                    // line 132
                    echo "          ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_value", [], "any", false, false, false, 132));
                    foreach ($context['_seq'] as $context["_key"] => $context["page_form_option_value"]) {
                        // line 133
                        echo "            ";
                        if (((($context["sel_count"] ?? null) == 0) && twig_get_attribute($this->env, $this->source, $context["page_form_option_value"], "default_value", [], "any", false, false, false, 133))) {
                            // line 134
                            echo "              ";
                            $context["sel"] = "checked=\"checked\"";
                            // line 135
                            echo "              ";
                            $context["sel_active"] = "active";
                            // line 136
                            echo "              ";
                            $context["sel_count"] = (($context["sel_count"] ?? null) + 1);
                            // line 137
                            echo "            ";
                        } else {
                            // line 138
                            echo "              ";
                            $context["sel"] = "";
                            // line 139
                            echo "              ";
                            $context["sel_active"] = "";
                            // line 140
                            echo "            ";
                        }
                        // line 141
                        echo "            <label class=\"btn btn-default ";
                        echo ($context["sel_active"] ?? null);
                        echo "\">
              <input name=\"field[";
                        // line 142
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 142);
                        echo "]\"  autocomplete=\"off\" value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option_value"], "page_form_option_value_id", [], "any", false, false, false, 142);
                        echo "\" type=\"radio\" ";
                        echo ($context["sel"] ?? null);
                        echo ">";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option_value"], "name", [], "any", false, false, false, 142);
                        echo "
            </label>
          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page_form_option_value'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 145
                    echo "        </div>
      </div>
      ";
                }
                // line 148
                echo "
      ";
                // line 149
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["page_form_option"], "type", [], "any", false, false, false, 149), [0 => "text", 1 => "number", 2 => "telephone", 3 => "email", 4 => "email_exists", 5 => "postcode", 6 => "address"])) {
                    // line 150
                    echo "      <div class=\"form-group";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "required", [], "any", false, false, false, 150)) ? (" required") : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 150)) ? (("col-sm-" . twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 150))) : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 150)) ? (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 150)) : (""));
                    echo "\">
        <label class=\"control-label\" for=\"input-field";
                    // line 151
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 151);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_name", [], "any", false, false, false, 151);
                    echo "
          ";
                    // line 152
                    if (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 152)) {
                        // line 153
                        echo "            <i class=\"fa fa-question-circle\" data-toggle=\"tooltip\" title=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 153);
                        echo "\"></i>
          ";
                    }
                    // line 155
                    echo "        </label>
        <input type=\"text\" name=\"field[";
                    // line 156
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 156);
                    echo "]\" id=\"input-field";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 156);
                    echo "\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_dvalue", [], "any", false, false, false, 156);
                    echo "\" class=\"form-control\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_placeholder", [], "any", false, false, false, 156);
                    echo "\">
      </div>
    ";
                }
                // line 159
                echo "    ";
                if ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "type", [], "any", false, false, false, 159) == "textarea")) {
                    // line 160
                    echo "      <div class=\"form-group";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "required", [], "any", false, false, false, 160)) ? (" required") : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 160)) ? (("col-sm-" . twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 160))) : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 160)) ? (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 160)) : (""));
                    echo "\">
        <label class=\"control-label\" for=\"input-field";
                    // line 161
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 161);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_name", [], "any", false, false, false, 161);
                    echo "
          ";
                    // line 162
                    if (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 162)) {
                        // line 163
                        echo "            <i class=\"fa fa-question-circle\" data-toggle=\"tooltip\" title=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 163);
                        echo "\"></i>
          ";
                    }
                    // line 165
                    echo "        </label>
        <textarea name=\"field[";
                    // line 166
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 166);
                    echo "]\" rows=\"5\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_placeholder", [], "any", false, false, false, 166);
                    echo "\" id=\"input-field";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 166);
                    echo "\" class=\"form-control\">";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_dvalue", [], "any", false, false, false, 166);
                    echo "</textarea>
      </div>
      ";
                }
                // line 169
                echo "
      ";
                // line 170
                if ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "type", [], "any", false, false, false, 170) == "color_picker")) {
                    // line 171
                    echo "      <div class=\"form-group";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "required", [], "any", false, false, false, 171)) ? (" required") : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 171)) ? (("col-sm-" . twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 171))) : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 171)) ? (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 171)) : (""));
                    echo "\">
        <label class=\"control-label\">";
                    // line 172
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_name", [], "any", false, false, false, 172);
                    echo "
          ";
                    // line 173
                    if (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 173)) {
                        // line 174
                        echo "            <i class=\"fa fa-question-circle\" data-toggle=\"tooltip\" title=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 174);
                        echo "\"></i>
          ";
                    }
                    // line 176
                    echo "        </label>
        <input type=\"text\" name=\"field[";
                    // line 177
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 177);
                    echo "]\" id=\"input-field";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 177);
                    echo "\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_dvalue", [], "any", false, false, false, 177);
                    echo "\" class=\"form-control color-picker\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_placeholder", [], "any", false, false, false, 177);
                    echo "\">
      </div>
      ";
                }
                // line 180
                echo "
      ";
                // line 181
                if ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "type", [], "any", false, false, false, 181) == "google_map")) {
                    // line 182
                    echo "        ";
                    if (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 182)) {
                        // line 183
                        echo "        <div class=\"form-group ";
                        echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 183)) ? (("col-sm-" . twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 183))) : (""));
                        echo " ";
                        echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 183)) ? (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 183)) : (""));
                        echo "\">
          <iframe src=\"";
                        // line 184
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 184);
                        echo "\" width=\"100%\" height=\"250\" frameborder=\"0\" style=\"border:0\" allowfullscreen></iframe>
        </div>
        ";
                    }
                    // line 187
                    echo "      ";
                }
                // line 188
                echo "
      ";
                // line 189
                if ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "type", [], "any", false, false, false, 189) == "file")) {
                    // line 190
                    echo "      <div class=\"form-group";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "required", [], "any", false, false, false, 190)) ? (" required") : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 190)) ? (("col-sm-" . twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 190))) : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 190)) ? (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 190)) : (""));
                    echo " upload-wise\">
        <label class=\"control-label\">";
                    // line 191
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_name", [], "any", false, false, false, 191);
                    echo "
          ";
                    // line 192
                    if (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 192)) {
                        // line 193
                        echo "            <i class=\"fa fa-question-circle\" data-toggle=\"tooltip\" title=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 193);
                        echo "\"></i>
          ";
                    }
                    // line 195
                    echo "        </label>
        <div class=\"dropzone dropzone-file-area\" id=\"dropzone-upload";
                    // line 196
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 196);
                    echo "\" data-formid=\"";
                    echo ($context["page_form_id"] ?? null);
                    echo "\">
          <div class=\"dz-default dz-message\">
            <h4 class=\"sbold\"><i class=\"fa fa-cloud-upload\"></i></h4>
            <label for=\"file\"><strong>Choose a file</strong><span class=\"box__dragndrop\"> or drag it here</span>.</label>
          </div>
        </div>
        <input type=\"hidden\" name=\"field[";
                    // line 202
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 202);
                    echo "]\" value=\"\" id=\"input-field";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 202);
                    echo "\" />
      </div>
      ";
                }
                // line 205
                echo "
      ";
                // line 206
                if ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "type", [], "any", false, false, false, 206) == "date")) {
                    // line 207
                    echo "      <div class=\"form-group";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "required", [], "any", false, false, false, 207)) ? (" required") : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 207)) ? (("col-sm-" . twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 207))) : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 207)) ? (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 207)) : (""));
                    echo "\">
        <label class=\"control-label\" for=\"input-field";
                    // line 208
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 208);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_name", [], "any", false, false, false, 208);
                    echo "
          ";
                    // line 209
                    if (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 209)) {
                        // line 210
                        echo "            <i class=\"fa fa-question-circle\" data-toggle=\"tooltip\" title=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 210);
                        echo "\"></i>
          ";
                    }
                    // line 212
                    echo "        </label>
        <div class=\"input-group date\">
          <input type=\"text\" name=\"field[";
                    // line 214
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 214);
                    echo "]\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_dvalue", [], "any", false, false, false, 214);
                    echo "\" data-date-format=\"YYYY-MM-DD\" id=\"input-field";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 214);
                    echo "\" class=\"form-control\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_placeholder", [], "any", false, false, false, 214);
                    echo "\" />
          <span class=\"input-group-btn\">
          <button class=\"btn btn-default\" type=\"button\"><i class=\"fa fa-calendar\"></i></button>
          </span>
        </div>
      </div>
      ";
                }
                // line 221
                echo "      ";
                if ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "type", [], "any", false, false, false, 221) == "datetime")) {
                    // line 222
                    echo "      <div class=\"form-group";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "required", [], "any", false, false, false, 222)) ? (" required") : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 222)) ? (("col-sm-" . twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 222))) : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 222)) ? (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 222)) : (""));
                    echo "\">
        <label class=\"control-label\" for=\"input-field";
                    // line 223
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 223);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_name", [], "any", false, false, false, 223);
                    echo "
          ";
                    // line 224
                    if (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 224)) {
                        // line 225
                        echo "            <i class=\"fa fa-question-circle\" data-toggle=\"tooltip\" title=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 225);
                        echo "\"></i>
          ";
                    }
                    // line 227
                    echo "        </label>
        <div class=\"input-group datetime\">
          <input type=\"text\" name=\"field[";
                    // line 229
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 229);
                    echo "]\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_dvalue", [], "any", false, false, false, 229);
                    echo "\" data-date-format=\"YYYY-MM-DD HH:mm\" id=\"input-field";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 229);
                    echo "\" class=\"form-control\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_placeholder", [], "any", false, false, false, 229);
                    echo "\" />
          <span class=\"input-group-btn\">
          <button type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-calendar\"></i></button>
          </span>
        </div>
      </div>
      ";
                }
                // line 236
                echo "      ";
                if ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "type", [], "any", false, false, false, 236) == "time")) {
                    // line 237
                    echo "      <div class=\"form-group";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "required", [], "any", false, false, false, 237)) ? (" required") : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 237)) ? (("col-sm-" . twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 237))) : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 237)) ? (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 237)) : (""));
                    echo "\">
        <label class=\"control-label\" for=\"input-field";
                    // line 238
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 238);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_name", [], "any", false, false, false, 238);
                    echo "
          ";
                    // line 239
                    if (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 239)) {
                        // line 240
                        echo "            <i class=\"fa fa-question-circle\" data-toggle=\"tooltip\" title=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 240);
                        echo "\"></i>
          ";
                    }
                    // line 242
                    echo "        </label>
        <div class=\"input-group time\">
          <input type=\"text\" name=\"field[";
                    // line 244
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 244);
                    echo "]\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_dvalue", [], "any", false, false, false, 244);
                    echo "\" data-date-format=\"HH:mm\" id=\"input-field";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 244);
                    echo "\" class=\"form-control\" placeholder=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_placeholder", [], "any", false, false, false, 244);
                    echo "\" />
          <span class=\"input-group-btn\">
          <button type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-calendar\"></i></button>
          </span>
        </div>
      </div>
    ";
                }
                // line 251
                echo "    ";
                if ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "type", [], "any", false, false, false, 251) == "country")) {
                    // line 252
                    echo "      <div class=\"form-group";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "required", [], "any", false, false, false, 252)) ? (" required") : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 252)) ? (("col-sm-" . twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 252))) : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 252)) ? (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 252)) : (""));
                    echo "\">
        <label class=\"control-label\" for=\"input-field";
                    // line 253
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 253);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_name", [], "any", false, false, false, 253);
                    echo "
          ";
                    // line 254
                    if (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 254)) {
                        // line 255
                        echo "            <i class=\"fa fa-question-circle\" data-toggle=\"tooltip\" title=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 255);
                        echo "\"></i>
          ";
                    }
                    // line 257
                    echo "        </label>
        <select name=\"field[";
                    // line 258
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 258);
                    echo "]\" id=\"input-field";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 258);
                    echo "\" class=\"form-control country_id\">
          <option value=\"\">";
                    // line 259
                    echo ($context["text_select"] ?? null);
                    echo "</option>
          ";
                    // line 260
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["countries"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
                        // line 261
                        echo "          <option value=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["country"], "country_id", [], "any", false, false, false, 261);
                        echo "\">";
                        echo twig_get_attribute($this->env, $this->source, $context["country"], "name", [], "any", false, false, false, 261);
                        echo "
          </option>
          ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 264
                    echo "        </select>
      </div>
    ";
                }
                // line 267
                echo "    ";
                if ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "type", [], "any", false, false, false, 267) == "zone")) {
                    // line 268
                    echo "      <div class=\"form-group";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "required", [], "any", false, false, false, 268)) ? (" required") : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 268)) ? (("col-sm-" . twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 268))) : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 268)) ? (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 268)) : (""));
                    echo "\">
        <label class=\"control-label\" for=\"input-field";
                    // line 269
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 269);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_name", [], "any", false, false, false, 269);
                    echo "
          ";
                    // line 270
                    if (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 270)) {
                        // line 271
                        echo "            <i class=\"fa fa-question-circle\" data-toggle=\"tooltip\" title=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 271);
                        echo "\"></i>
          ";
                    }
                    // line 273
                    echo "        </label>
        ";
                    // line 274
                    if (($context["country_exists"] ?? null)) {
                        // line 275
                        echo "        <select name=\"field[";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 275);
                        echo "]\" id=\"input-field";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 275);
                        echo "\" class=\"form-control zone_id\"></select>
        ";
                    } else {
                        // line 277
                        echo "        <select name=\"field[";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 277);
                        echo "]\" id=\"input-field";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 277);
                        echo "\" class=\"form-control zone_id\">
          <option value=\"\">";
                        // line 278
                        echo ($context["text_select"] ?? null);
                        echo "</option>
          ";
                        // line 279
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(($context["zones"] ?? null));
                        foreach ($context['_seq'] as $context["_key"] => $context["zone"]) {
                            // line 280
                            echo "          <option value=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["zone"], "zone_id", [], "any", false, false, false, 280);
                            echo "\">";
                            echo twig_get_attribute($this->env, $this->source, $context["zone"], "name", [], "any", false, false, false, 280);
                            echo "
          </option>
          ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['zone'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 283
                        echo "        </select>
        ";
                    }
                    // line 285
                    echo "      </div>
    ";
                }
                // line 287
                echo "    ";
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["page_form_option"], "type", [], "any", false, false, false, 287), [0 => "password", 1 => "confirm_password"])) {
                    // line 288
                    echo "      <div class=\"form-group";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "required", [], "any", false, false, false, 288)) ? (" required") : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 288)) ? (("col-sm-" . twig_get_attribute($this->env, $this->source, $context["page_form_option"], "width", [], "any", false, false, false, 288))) : (""));
                    echo " ";
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 288)) ? (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 288)) : (""));
                    echo "\">
        <label class=\"control-label\" for=\"input-field";
                    // line 289
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 289);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_name", [], "any", false, false, false, 289);
                    echo "
          ";
                    // line 290
                    if (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 290)) {
                        // line 291
                        echo "            <i class=\"fa fa-question-circle\" data-toggle=\"tooltip\" title=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_help", [], "any", false, false, false, 291);
                        echo "\"></i>
          ";
                    }
                    // line 293
                    echo "        </label>
        <input type=\"password\" name=\"field[";
                    // line 294
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 294);
                    echo "]\" id=\"input-field";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "page_form_option_id", [], "any", false, false, false, 294);
                    echo "\" value=\"\" class=\"form-control\">
      </div>
    ";
                }
                // line 297
                echo "
    ";
                // line 298
                if ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "type", [], "any", false, false, false, 298) == "header")) {
                    // line 299
                    echo "      <div class=\"col-sm-12\">
        <h3 class=\"ci-header ";
                    // line 300
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 300)) ? (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 300)) : (""));
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_name", [], "any", false, false, false, 300);
                    echo "</h3>
      </div>
    ";
                }
                // line 303
                echo "
    ";
                // line 304
                if ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "type", [], "any", false, false, false, 304) == "paragraph")) {
                    // line 305
                    echo "    <div class=\"col-sm-12\">
      <p class=\"ci-paragraph ";
                    // line 306
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 306)) ? (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 306)) : (""));
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["page_form_option"], "field_name", [], "any", false, false, false, 306);
                    echo "</p>
    </div>
    ";
                }
                // line 309
                echo "
    ";
                // line 310
                if ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "type", [], "any", false, false, false, 310) == "hrline")) {
                    // line 311
                    echo "      <div class=\"col-sm-12\">
        <hr class=\"ci-hrline ";
                    // line 312
                    echo ((twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 312)) ? (twig_get_attribute($this->env, $this->source, $context["page_form_option"], "class", [], "any", false, false, false, 312)) : (""));
                    echo "\" />
      </div>
    ";
                }
                // line 315
                echo "
  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['page_form_option'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
    }

    public function getTemplateName()
    {
        return "default/template/page/page_oc3/form_fields.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1078 => 315,  1072 => 312,  1069 => 311,  1067 => 310,  1064 => 309,  1056 => 306,  1053 => 305,  1051 => 304,  1048 => 303,  1040 => 300,  1037 => 299,  1035 => 298,  1032 => 297,  1024 => 294,  1021 => 293,  1015 => 291,  1013 => 290,  1007 => 289,  998 => 288,  995 => 287,  991 => 285,  987 => 283,  975 => 280,  971 => 279,  967 => 278,  960 => 277,  952 => 275,  950 => 274,  947 => 273,  941 => 271,  939 => 270,  933 => 269,  924 => 268,  921 => 267,  916 => 264,  904 => 261,  900 => 260,  896 => 259,  890 => 258,  887 => 257,  881 => 255,  879 => 254,  873 => 253,  864 => 252,  861 => 251,  845 => 244,  841 => 242,  835 => 240,  833 => 239,  827 => 238,  818 => 237,  815 => 236,  799 => 229,  795 => 227,  789 => 225,  787 => 224,  781 => 223,  772 => 222,  769 => 221,  753 => 214,  749 => 212,  743 => 210,  741 => 209,  735 => 208,  726 => 207,  724 => 206,  721 => 205,  713 => 202,  702 => 196,  699 => 195,  693 => 193,  691 => 192,  687 => 191,  678 => 190,  676 => 189,  673 => 188,  670 => 187,  664 => 184,  657 => 183,  654 => 182,  652 => 181,  649 => 180,  637 => 177,  634 => 176,  628 => 174,  626 => 173,  622 => 172,  613 => 171,  611 => 170,  608 => 169,  596 => 166,  593 => 165,  587 => 163,  585 => 162,  579 => 161,  570 => 160,  567 => 159,  555 => 156,  552 => 155,  546 => 153,  544 => 152,  538 => 151,  529 => 150,  527 => 149,  524 => 148,  519 => 145,  504 => 142,  499 => 141,  496 => 140,  493 => 139,  490 => 138,  487 => 137,  484 => 136,  481 => 135,  478 => 134,  475 => 133,  470 => 132,  468 => 131,  464 => 130,  461 => 129,  455 => 127,  453 => 126,  449 => 125,  440 => 124,  438 => 123,  435 => 122,  430 => 119,  416 => 116,  413 => 115,  410 => 114,  407 => 113,  404 => 112,  401 => 111,  397 => 110,  391 => 109,  388 => 108,  382 => 106,  380 => 105,  376 => 104,  367 => 103,  365 => 102,  362 => 101,  357 => 98,  347 => 94,  335 => 90,  332 => 89,  329 => 88,  326 => 87,  323 => 86,  320 => 85,  317 => 84,  315 => 83,  311 => 81,  307 => 80,  303 => 79,  300 => 78,  294 => 76,  292 => 75,  288 => 74,  279 => 73,  277 => 72,  274 => 71,  269 => 68,  259 => 64,  250 => 63,  247 => 62,  244 => 61,  241 => 60,  238 => 59,  236 => 58,  232 => 56,  228 => 55,  224 => 54,  221 => 53,  215 => 51,  213 => 50,  209 => 49,  200 => 48,  197 => 47,  192 => 44,  182 => 40,  173 => 39,  170 => 38,  167 => 37,  164 => 36,  161 => 35,  159 => 34,  155 => 32,  151 => 31,  147 => 30,  144 => 29,  138 => 27,  136 => 26,  132 => 25,  123 => 24,  120 => 23,  115 => 20,  102 => 18,  99 => 17,  96 => 16,  93 => 15,  90 => 14,  87 => 13,  83 => 12,  79 => 11,  73 => 10,  70 => 9,  64 => 7,  62 => 6,  56 => 5,  47 => 4,  44 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/page/page_oc3/form_fields.twig", "/home/stromo/procraft.ua/dev/catalog/view/theme/default/template/page/page_oc3/form_fields.twig");
    }
}
