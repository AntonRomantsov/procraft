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

/* extension/module/ocfilter/filter_relation_form.twig */
class __TwigTemplate_11486bceff3686254cc666c3901edde8d33b65c6f5527a91291f3ee0428fb121 extends \Twig\Template
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
        echo "<div class=\"container-fluid\">
  <div class=\"form-horizontal\">
    ";
        // line 3
        if (($context["filters"] ?? null)) {
            echo "   
    ";
            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["filters"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["filter"]) {
                echo "        
    ";
                // line 5
                $context["class"] = "form-group ocf-form-group-condensed";
                // line 6
                echo "    
    ";
                // line 7
                if ( !twig_get_attribute($this->env, $this->source, $context["filter"], "status", [], "any", false, false, false, 7)) {
                    // line 8
                    echo "    ";
                    $context["class"] = (($context["class"] ?? null) . " ocf-form-group-inactive");
                    // line 9
                    echo "    ";
                }
                // line 10
                echo "    
    ";
                // line 11
                if (twig_get_attribute($this->env, $this->source, $context["filter"], "selected", [], "any", false, false, false, 11)) {
                    // line 12
                    echo "    ";
                    $context["class"] = (($context["class"] ?? null) . " ocf-form-group-selected");
                    // line 13
                    echo "    ";
                }
                echo "   

    ";
                // line 15
                if (((twig_get_attribute($this->env, $this->source, $context["filter"], "type", [], "any", false, false, false, 15) == "slide") || (twig_get_attribute($this->env, $this->source, $context["filter"], "type", [], "any", false, false, false, 15) == "slide_dual"))) {
                    // line 16
                    echo "    ";
                    $context["class"] = (($context["class"] ?? null) . " ocf-form-group-slider");
                    // line 17
                    echo "    ";
                }
                echo " 

    ";
                // line 19
                if (twig_get_attribute($this->env, $this->source, $context["filter"], "values_autocomplete", [], "any", false, false, false, 19)) {
                    // line 20
                    echo "    ";
                    $context["class"] = (($context["class"] ?? null) . " ocf-form-group-autocomplete");
                    // line 21
                    echo "    ";
                }
                // line 22
                echo "    
    ";
                // line 23
                $context["class"] = ((($context["class"] ?? null) . " ocf-form-group-source-") . twig_get_attribute($this->env, $this->source, $context["filter"], "source_name", [], "any", false, false, false, 23));
                // line 24
                echo "    
    <div class=\"";
                // line 25
                echo ($context["class"] ?? null);
                echo "\" data-ocfilter-filter-key=\"";
                echo twig_get_attribute($this->env, $this->source, $context["filter"], "filter_key", [], "any", false, false, false, 25);
                echo "\" data-total-values=\"";
                echo twig_get_attribute($this->env, $this->source, $context["filter"], "total_values", [], "any", false, false, false, 25);
                echo "\">
      ";
                // line 26
                if (($context["page"] ?? null)) {
                    // line 27
                    echo "      ";
                    $context["class"] = "col-xs-6 col-lg-4 control-label";
                    // line 28
                    echo "      ";
                } else {
                    // line 29
                    echo "      ";
                    $context["class"] = "col-xs-6 col-lg-5 control-label";
                    // line 30
                    echo "      ";
                }
                // line 31
                echo "      <label class=\"";
                echo ($context["class"] ?? null);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["filter"], "name", [], "any", false, false, false, 31);
                echo "</label>
      
      ";
                // line 33
                if (($context["page"] ?? null)) {
                    // line 34
                    echo "      <div class=\"col-xs-6 col-lg-2\">
        <div class=\"btn-group btn-group-toggle\" data-toggle=\"buttons\">
          ";
                    // line 36
                    if (twig_get_attribute($this->env, $this->source, $context["filter"], "selected_all", [], "any", false, false, false, 36)) {
                        // line 37
                        echo "          <label class=\"btn btn-default active\" data-toggle=\"popover\" data-trigger=\"hover\" data-container=\"body\" data-placement=\"top\" data-content=\"";
                        echo ($context["help_all"] ?? null);
                        echo "\"><input type=\"checkbox\" name=\"ocfilter_filter[";
                        echo twig_get_attribute($this->env, $this->source, $context["filter"], "filter_key", [], "any", false, false, false, 37);
                        echo "][]\" value=\"0\" checked=\"checked\" autocomplete=\"off\" /> ";
                        echo ($context["entry_all"] ?? null);
                        echo "</label>
          ";
                    } else {
                        // line 39
                        echo "          <label class=\"btn btn-default\" data-toggle=\"popover\" data-trigger=\"hover\" data-container=\"body\" data-placement=\"top\" data-content=\"";
                        echo ($context["help_all"] ?? null);
                        echo "\"><input type=\"checkbox\" name=\"ocfilter_filter[";
                        echo twig_get_attribute($this->env, $this->source, $context["filter"], "filter_key", [], "any", false, false, false, 39);
                        echo "][]\" value=\"0\" autocomplete=\"off\" /> ";
                        echo ($context["entry_all"] ?? null);
                        echo "</label>
          ";
                    }
                    // line 40
                    echo "  
          ";
                    // line 41
                    if (((($context["allow_group"] ?? null) && (twig_get_attribute($this->env, $this->source, $context["filter"], "type", [], "any", false, false, false, 41) != "slide")) && (twig_get_attribute($this->env, $this->source, $context["filter"], "type", [], "any", false, false, false, 41) != "slide_dual"))) {
                        // line 42
                        echo "          ";
                        if (twig_get_attribute($this->env, $this->source, $context["filter"], "group", [], "any", false, false, false, 42)) {
                            // line 43
                            echo "          <label class=\"btn btn-default active\" data-toggle=\"popover\" data-trigger=\"hover\" data-container=\"body\" data-placement=\"top\" data-content=\"";
                            echo ($context["help_group"] ?? null);
                            echo "\"><input type=\"checkbox\" name=\"ocfilter_filter[";
                            echo twig_get_attribute($this->env, $this->source, $context["filter"], "filter_key", [], "any", false, false, false, 43);
                            echo "][]\" value=\"group\" checked=\"checked\" autocomplete=\"off\" /> ";
                            echo ($context["entry_group"] ?? null);
                            echo "</label>
          ";
                        } else {
                            // line 45
                            echo "          <label class=\"btn btn-default\" data-toggle=\"popover\" data-trigger=\"hover\" data-container=\"body\" data-placement=\"top\" data-content=\"";
                            echo ($context["help_group"] ?? null);
                            echo "\"><input type=\"checkbox\" name=\"ocfilter_filter[";
                            echo twig_get_attribute($this->env, $this->source, $context["filter"], "filter_key", [], "any", false, false, false, 45);
                            echo "][]\" value=\"group\" autocomplete=\"off\" /> ";
                            echo ($context["entry_group"] ?? null);
                            echo "</label>
          ";
                        }
                        // line 46
                        echo "            
          ";
                    }
                    // line 48
                    echo "        </div>     
      </div>
      ";
                }
                // line 51
                echo "
      ";
                // line 52
                if (($context["page"] ?? null)) {
                    // line 53
                    echo "      ";
                    $context["class"] = "col-xs-12 col-lg-6";
                    // line 54
                    echo "      ";
                } else {
                    // line 55
                    echo "      ";
                    $context["class"] = "col-xs-6 col-lg-7";
                    // line 56
                    echo "      ";
                }
                // line 57
                echo "      <div class=\"";
                echo ($context["class"] ?? null);
                echo "\">
        <div class=\"hidden-lg mt-2\"></div>
        ";
                // line 59
                if (((twig_get_attribute($this->env, $this->source, $context["filter"], "type", [], "any", false, false, false, 59) == "slide") || (twig_get_attribute($this->env, $this->source, $context["filter"], "type", [], "any", false, false, false, 59) == "slide_dual"))) {
                    // line 60
                    echo "        <div class=\"input-group\">
          <div class=\"input-group-prepend ocf-relative\">
            <input type=\"number\" name=\"ocfilter_filter[";
                    // line 62
                    echo twig_get_attribute($this->env, $this->source, $context["filter"], "filter_key", [], "any", false, false, false, 62);
                    echo "][min]\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["filter"], "min", [], "any", false, false, false, 62);
                    echo "\" class=\"ocf-input-slide-value-min form-control";
                    echo ((twig_get_attribute($this->env, $this->source, $context["filter"], "selected_all", [], "any", false, false, false, 62)) ? (" disabled") : (""));
                    echo "\" ";
                    echo (((twig_get_attribute($this->env, $this->source, $context["filter"], "selected_all", [], "any", false, false, false, 62) || (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["filter"], "min", [], "any", false, false, false, 62)) < 1))) ? ("disabled=\"disabled\"") : (""));
                    echo " />
            <div class=\"ocf-input-placeholder\"></div>
          </div>
          <span class=\"input-group-addon\">&mdash;</span>
          <div class=\"input-group-prepend ocf-relative\">
            <input type=\"number\" name=\"ocfilter_filter[";
                    // line 67
                    echo twig_get_attribute($this->env, $this->source, $context["filter"], "filter_key", [], "any", false, false, false, 67);
                    echo "][max]\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["filter"], "max", [], "any", false, false, false, 67);
                    echo "\" class=\"ocf-input-slide-value-max form-control";
                    echo ((twig_get_attribute($this->env, $this->source, $context["filter"], "selected_all", [], "any", false, false, false, 67)) ? (" disabled") : (""));
                    echo "\" ";
                    echo (((twig_get_attribute($this->env, $this->source, $context["filter"], "selected_all", [], "any", false, false, false, 67) || (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["filter"], "min", [], "any", false, false, false, 67)) < 1))) ? ("disabled=\"disabled\"") : (""));
                    echo " />
            <div class=\"ocf-input-placeholder\"></div>
          </div>
          ";
                    // line 70
                    if (twig_get_attribute($this->env, $this->source, $context["filter"], "suffix", [], "any", false, false, false, 70)) {
                        // line 71
                        echo "          <span class=\"input-group-addon\">";
                        echo twig_get_attribute($this->env, $this->source, $context["filter"], "suffix", [], "any", false, false, false, 71);
                        echo "</span>
          ";
                    }
                    // line 73
                    echo "        </div>
        ";
                } else {
                    // line 75
                    echo "        ";
                    if (twig_get_attribute($this->env, $this->source, $context["filter"], "values_autocomplete", [], "any", false, false, false, 75)) {
                        // line 76
                        echo "        
        <div class=\"input-group\">
          <input type=\"text\" name=\"filter_value_name\" value=\"\" placeholder=\"";
                        // line 78
                        echo ($context["entry_value_name"] ?? null);
                        echo "\" class=\"form-control\" data-filter-key=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["filter"], "filter_key", [], "any", false, false, false, 78);
                        echo "\" data-target=\"#value-relation-";
                        echo twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["filter"], "filter_key", [], "any", false, false, false, 78), ["." => "-"]);
                        echo "\" ";
                        echo ((twig_get_attribute($this->env, $this->source, $context["filter"], "selected_all", [], "any", false, false, false, 78)) ? ("disabled=\"disabled\"") : (""));
                        echo " />
          <div class=\"input-group-addon\" data-toggle=\"tooltip\" data-placement=\"top\" title=\"";
                        // line 79
                        echo ($context["text_values_autocomplete"] ?? null);
                        echo "\">                    
            <i class=\"fa fa-question-circle\"></i>
          </div>
        </div> 

        <div class=\"label-ocf-list";
                        // line 84
                        echo ((twig_get_attribute($this->env, $this->source, $context["filter"], "selected_all", [], "any", false, false, false, 84)) ? (" disabled") : (""));
                        echo "\" id=\"value-relation-";
                        echo twig_replace_filter(twig_get_attribute($this->env, $this->source, $context["filter"], "filter_key", [], "any", false, false, false, 84), ["." => "-"]);
                        echo "\">
          ";
                        // line 85
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["filter"], "values_selected", [], "any", false, false, false, 85));
                        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                            echo "         
          <span class=\"label label-ocf-value remove-autocomplete-value\" title=\"";
                            // line 86
                            echo twig_get_attribute($this->env, $this->source, $context["value"], "name", [], "any", false, false, false, 86);
                            echo "\"><input type=\"hidden\" name=\"ocfilter_filter[";
                            echo twig_get_attribute($this->env, $this->source, $context["filter"], "filter_key", [], "any", false, false, false, 86);
                            echo "][]\" value=\"";
                            echo twig_get_attribute($this->env, $this->source, $context["value"], "value_id", [], "any", false, false, false, 86);
                            echo "\" /> <span>";
                            echo twig_get_attribute($this->env, $this->source, $context["value"], "name", [], "any", false, false, false, 86);
                            echo "</span> <i class=\"fa fa-times-circle\"></i></span>
          ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 88
                        echo "        </div>
        
        ";
                    } elseif (twig_get_attribute($this->env, $this->source,                     // line 90
$context["filter"], "values", [], "any", false, false, false, 90)) {
                        echo "  
        
        <div class=\"dropdown ocf-product-values-dropdown\">         
          <button type=\"button\" class=\"btn btn-light dropdown-toggle";
                        // line 93
                        echo ((twig_get_attribute($this->env, $this->source, $context["filter"], "selected_all", [], "any", false, false, false, 93)) ? (" disabled") : (""));
                        echo "\" data-toggle=\"dropdown\">
            ";
                        // line 94
                        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, $context["filter"], "values_selected", [], "any", false, false, false, 94)) > 0)) {
                            // line 95
                            echo "            <span class=\"dropdown-label label-selected\" data-default=\"";
                            echo ($context["text_select_product_value"] ?? null);
                            echo "\">
              ";
                            // line 96
                            $context['_parent'] = $context;
                            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["filter"], "values_selected", [], "any", false, false, false, 96));
                            foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                                echo " 
              <span class=\"label label-ocf-value\">";
                                // line 97
                                echo twig_get_attribute($this->env, $this->source, $context["value"], "name", [], "any", false, false, false, 97);
                                echo "</span>
              ";
                            }
                            $_parent = $context['_parent'];
                            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
                            $context = array_intersect_key($context, $_parent) + $_parent;
                            // line 99
                            echo "            </span> 
            ";
                        } else {
                            // line 101
                            echo "            <span class=\"dropdown-label\" data-default=\"";
                            echo ($context["text_select_product_value"] ?? null);
                            echo "\">";
                            echo ($context["text_select_product_value"] ?? null);
                            echo "</span> 
            ";
                        }
                        // line 102
                        echo "        
            <span class=\"fa fa-caret-down\"></span>
          </button>                 

          <ul class=\"dropdown-menu ocf-filter-dm\">
            ";
                        // line 107
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["filter"], "values", [], "any", false, false, false, 107));
                        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                            // line 108
                            echo "            ";
                            if (twig_get_attribute($this->env, $this->source, $context["value"], "selected", [], "any", false, false, false, 108)) {
                                // line 109
                                echo "            <li class=\"active\"><label><input type=\"checkbox\" name=\"ocfilter_filter[";
                                echo twig_get_attribute($this->env, $this->source, $context["filter"], "filter_key", [], "any", false, false, false, 109);
                                echo "][]\" value=\"";
                                echo twig_get_attribute($this->env, $this->source, $context["value"], "value_id", [], "any", false, false, false, 109);
                                echo "\" checked=\"checked\" autocomplete=\"off\" /> <span>";
                                echo twig_get_attribute($this->env, $this->source, $context["value"], "name", [], "any", false, false, false, 109);
                                echo twig_get_attribute($this->env, $this->source, $context["filter"], "suffix", [], "any", false, false, false, 109);
                                echo "</span></label></li>
            ";
                            } else {
                                // line 111
                                echo "            <li><label><input type=\"checkbox\" name=\"ocfilter_filter[";
                                echo twig_get_attribute($this->env, $this->source, $context["filter"], "filter_key", [], "any", false, false, false, 111);
                                echo "][]\" value=\"";
                                echo twig_get_attribute($this->env, $this->source, $context["value"], "value_id", [], "any", false, false, false, 111);
                                echo "\" autocomplete=\"off\" /> <span>";
                                echo twig_get_attribute($this->env, $this->source, $context["value"], "name", [], "any", false, false, false, 111);
                                echo twig_get_attribute($this->env, $this->source, $context["filter"], "suffix", [], "any", false, false, false, 111);
                                echo "</span></label></li>
            ";
                            }
                            // line 113
                            echo "            ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 114
                        echo "          </ul>
        </div>
        
        ";
                    } else {
                        // line 118
                        echo "        <a href=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["filter"], "href", [], "any", false, false, false, 118);
                        echo "#tab-values\" target=\"_blank\">";
                        echo ($context["text_add_filter_values"] ?? null);
                        echo "</a>
        ";
                    }
                    // line 120
                    echo "        ";
                }
                // line 121
                echo "      </div>      
    </div><!-- /.form-group -->
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['filter'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 124
            echo "    ";
        } else {
            // line 125
            echo "    ";
            echo ($context["text_filters_not_found"] ?? null);
            echo "
    ";
        }
        // line 127
        echo "  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "extension/module/ocfilter/filter_relation_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  441 => 127,  435 => 125,  432 => 124,  424 => 121,  421 => 120,  413 => 118,  407 => 114,  401 => 113,  390 => 111,  379 => 109,  376 => 108,  372 => 107,  365 => 102,  357 => 101,  353 => 99,  345 => 97,  339 => 96,  334 => 95,  332 => 94,  328 => 93,  322 => 90,  318 => 88,  304 => 86,  298 => 85,  292 => 84,  284 => 79,  274 => 78,  270 => 76,  267 => 75,  263 => 73,  257 => 71,  255 => 70,  243 => 67,  229 => 62,  225 => 60,  223 => 59,  217 => 57,  214 => 56,  211 => 55,  208 => 54,  205 => 53,  203 => 52,  200 => 51,  195 => 48,  191 => 46,  181 => 45,  171 => 43,  168 => 42,  166 => 41,  163 => 40,  153 => 39,  143 => 37,  141 => 36,  137 => 34,  135 => 33,  127 => 31,  124 => 30,  121 => 29,  118 => 28,  115 => 27,  113 => 26,  105 => 25,  102 => 24,  100 => 23,  97 => 22,  94 => 21,  91 => 20,  89 => 19,  83 => 17,  80 => 16,  78 => 15,  72 => 13,  69 => 12,  67 => 11,  64 => 10,  61 => 9,  58 => 8,  56 => 7,  53 => 6,  51 => 5,  45 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/ocfilter/filter_relation_form.twig", "");
    }
}
