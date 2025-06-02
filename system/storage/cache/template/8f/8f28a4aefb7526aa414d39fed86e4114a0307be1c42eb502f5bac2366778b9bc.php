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

/* default/template/extension/module/ocfilter48/module.twig */
class __TwigTemplate_e13361a8225fc273ac45a83134168ec8ef915a989175b51f925a7818d6231ca7 extends \Twig\Template
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
        echo "<div class=\"ocf-container ";
        echo ($context["ocf_class"] ?? null);
        echo " ocf-theme-";
        echo ($context["theme"] ?? null);
        echo " ocf-mobile-";
        echo ($context["index"] ?? null);
        echo " ocf-mobile-";
        echo ($context["mobile_placement"] ?? null);
        echo " ocf-";
        echo ($context["layout"] ?? null);
        echo " ocf-";
        echo ($context["position"] ?? null);
        echo "\" id=\"ocf-module-";
        echo ($context["index"] ?? null);
        echo "\">
";
        // line 2
        if ((($context["index"] ?? null) < 2)) {
            // line 3
            echo "<link rel=\"stylesheet\" href=\"";
            echo ($context["stylesheet"] ?? null);
            echo "\" />
";
        }
        // line 5
        echo "
  <div class=\"ocf-content\">
    <div class=\"ocf-header\" style=\"display:none\">
      <i class=\"ocf-icon ocf-icon-16 ocf-brand ocf-sliders\"></i>      
      
      ";
        // line 10
        echo ($context["heading_title"] ?? null);
        echo "
      
      ";
        // line 12
        if (((($context["layout"] ?? null) == "horizontal") && (($context["search_button"] ?? null) || ($context["selecteds"] ?? null)))) {
            // line 13
            echo "      <div class=\"ocf-header-btn ocf-desktop\">
        ";
            // line 14
            if (($context["selecteds"] ?? null)) {
                // line 15
                echo "        <button type=\"button\" onclick=\"location = '";
                echo ($context["link"] ?? null);
                echo "';\" class=\"ocf-btn ocf-btn-link\">";
                echo ($context["button_cancel_all"] ?? null);
                echo "</button>
        ";
            } else {
                // line 17
                echo "        <button type=\"button\" data-ocf-discard=\"*\" class=\"ocf-btn ocf-btn-link ocf-disabled\" disabled=\"disabled\">";
                echo ($context["button_cancel_all"] ?? null);
                echo "</button>
        ";
            }
            // line 18
            echo "         
        ";
            // line 19
            if (($context["search_button"] ?? null)) {
                // line 20
                echo "        <button type=\"button\" class=\"ocf-btn ocf-btn-link ocf-disabled\" data-ocf=\"button\" data-loading-text=\"";
                echo ($context["text_loading"] ?? null);
                echo "\" disabled=\"disabled\">";
                echo ($context["button_select"] ?? null);
                echo "</button>
        ";
            }
            // line 21
            echo "        
      </div>   
      ";
        }
        // line 23
        echo "  
      
      <button type=\"button\" data-ocf=\"mobile\" class=\"ocf-btn ocf-btn-link ocf-mobile ocf-close-mobile\" aria-label=\"Close filter\"><i class=\"ocf-icon ocf-icon-16 ocf-times\"></i></button>
    </div>
          
    <div class=\"ocf-body\">     
      ";
        // line 29
        $this->loadTemplate("default/template/extension/module/ocfilter48/filter_list.twig", "default/template/extension/module/ocfilter48/module.twig", 29)->display($context);
        // line 30
        echo "    </div>      
       
    ";
        // line 32
        if ((($context["search_button"] ?? null) || ($context["selecteds"] ?? null))) {
            // line 33
            echo "    ";
            if ((($context["layout"] ?? null) == "vertical")) {
                // line 34
                echo "    ";
                $context["class"] = "ocf-footer";
                // line 35
                echo "    ";
            } else {
                // line 36
                echo "    ";
                $context["class"] = "ocf-footer ocf-mobile";
                // line 37
                echo "    ";
            }
            // line 38
            echo "    <div class=\"";
            echo ($context["class"] ?? null);
            echo "\">
      <div class=\"ocf-between\">
        ";
            // line 40
            if (($context["selecteds"] ?? null)) {
                // line 41
                echo "        <button type=\"button\" onclick=\"location = '";
                echo ($context["link"] ?? null);
                echo "';\" class=\"ocf-btn ocf-btn-link\">";
                echo ($context["button_cancel_all"] ?? null);
                echo "</button>
        ";
            } else {
                // line 43
                echo "        <button type=\"button\" data-ocf-discard=\"*\" class=\"ocf-btn ocf-btn-link ocf-disabled\" disabled=\"disabled\">";
                echo ($context["button_cancel_all"] ?? null);
                echo "</button>
        ";
            }
            // line 44
            echo "        
        ";
            // line 45
            if (($context["search_button"] ?? null)) {
                // line 46
                echo "        <button type=\"button\" class=\"ocf-btn ocf-disabled ocf-btn-block ocf-search-btn-static\" data-ocf=\"button\" data-loading-text=\"";
                echo ($context["text_loading"] ?? null);
                echo "\" disabled=\"disabled\">";
                echo ($context["button_select"] ?? null);
                echo "</button>
        ";
            }
            // line 47
            echo "        
      </div>
    </div>            
    ";
        }
        // line 51
        echo "  </div><!-- /.ocf-content -->
  
  <div class=\"ocf-is-mobile\"></div>
  
  ";
        // line 55
        if ((((($context["mobile_button_position"] ?? null) == "fixed") || (($context["mobile_button_position"] ?? null) == "both")) && (($context["index"] ?? null) < 2))) {
            // line 56
            echo "  <div class=\"ocf-btn-mobile-fixed ocf-mobile\">
    <button type=\"button\" class=\"ocf-btn ocf-btn-default\" data-ocf=\"mobile\" aria-label=\"";
            // line 57
            echo ($context["button_ocfilter_mobile"] ?? null);
            echo "\">
      <span class=\"ocf-btn-name\">";
            // line 58
            echo ($context["button_ocfilter_mobile"] ?? null);
            echo "</span>
      <i class=\"ocf-icon ocf-icon-16 ocf-brand ocf-sliders\"></i>
    </button>
  </div>  
  ";
        }
        // line 62
        echo " 
  
  <div class=\"ocf-hidden\">
    <button class=\"ocf-btn ocf-search-btn-popover\" data-ocf=\"button\" data-loading-text=\"";
        // line 65
        echo ($context["text_loading"] ?? null);
        echo "\">";
        echo ($context["button_select"] ?? null);
        echo "</button>
  </div>
  
<script>
+(function(global) {

var startOCFilter = function() {
  var loadScript = function(url, callback) {
    \$.ajax({ url: url, dataType: 'script', success: callback, async: true });
  };
  
  var init = function() {
    \$('#ocf-module-";
        // line 77
        echo ($context["index"] ?? null);
        echo "').ocfilter({
      index: '";
        // line 78
        echo ($context["index"] ?? null);
        echo "',
      
      paramsIndex: '";
        // line 80
        echo ($context["url_index"] ?? null);
        echo "',
      
      urlHost: '";
        // line 82
        echo ($context["url_host"] ?? null);
        echo "',
      urlParams: '";
        // line 83
        echo ($context["url_params"] ?? null);
        echo "',
      
      params: '";
        // line 85
        echo ($context["filter_params"] ?? null);
        echo "',
      
      sepFilt: '";
        // line 87
        echo ($context["sep_filt"] ?? null);
        echo "',
      sepFsrc: '";
        // line 88
        echo ($context["sep_fsrc"] ?? null);
        echo "',
      sepVals: '";
        // line 89
        echo ($context["sep_vals"] ?? null);
        echo "',
      sepSdot: '";
        // line 90
        echo ($context["sep_sdot"] ?? null);
        echo "',
      sepSneg: '";
        // line 91
        echo ($context["sep_sneg"] ?? null);
        echo "',
      sepSran: '";
        // line 92
        echo ($context["sep_sran"] ?? null);
        echo "',

      position: '";
        // line 94
        echo ($context["position"] ?? null);
        echo "',
      layout: '";
        // line 95
        echo ($context["layout"] ?? null);
        echo "',
      numeralLocale: '";
        // line 96
        echo ($context["numeral_locale"] ?? null);
        echo "',
      searchButton: ";
        // line 97
        echo (($context["search_button"] ?? null) + 0);
        echo ",
      showCounter: ";
        // line 98
        echo (($context["show_counter"] ?? null) + 0);
        echo ",
      sliderInput: ";
        // line 99
        echo (($context["slider_input"] ?? null) + 0);
        echo ",
      sliderPips: ";
        // line 100
        echo (($context["slider_pips"] ?? null) + 0);
        echo ",
      priceLogarithmic: ";
        // line 101
        echo (($context["price_logarithmic"] ?? null) + 0);
        echo ",
      lazyLoadFilters: ";
        // line 102
        echo (($context["hidden_filters_lazy_load"] ?? null) + 0);
        echo ",
      lazyLoadValues: ";
        // line 103
        echo (($context["hidden_values_lazy_load"] ?? null) + 0);
        echo ",
      
      mobileMaxWidth: ";
        // line 105
        echo (($context["mobile_max_width"] ?? null) + 0);
        echo ",
      mobileRememberState: ";
        // line 106
        echo (($context["mobile_remember_state"] ?? null) + 0);
        echo ",
      
      textLoad: '";
        // line 108
        echo twig_escape_filter($this->env, ($context["text_loading_ocf"] ?? null), "js");
        echo "',
      textSelect: '";
        // line 109
        echo twig_escape_filter($this->env, ($context["button_select"] ?? null), "js");
        echo "'
    });
  };
  
  ";
        // line 113
        if ((($context["index"] ?? null) < 2)) {
            // line 114
            echo "  loadScript('";
            echo ($context["javascript"] ?? null);
            echo "', init);
  ";
        }
        // line 116
        echo "};

var ready = function(fn) {
  if (global.readyState != 'loading') {
    fn();
  } else {
    global.addEventListener('DOMContentLoaded', fn);
  }
};

ready(function() { // DOM loaded
  if ('undefined' == typeof jQuery) {
    console.error('OCFilter required jQuery');
    
    return;
  }

  \$(startOCFilter); // jQuery loaded
});

})(document);
</script>
</div><!-- /.ocf-container -->";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/ocfilter48/module.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  352 => 116,  346 => 114,  344 => 113,  337 => 109,  333 => 108,  328 => 106,  324 => 105,  319 => 103,  315 => 102,  311 => 101,  307 => 100,  303 => 99,  299 => 98,  295 => 97,  291 => 96,  287 => 95,  283 => 94,  278 => 92,  274 => 91,  270 => 90,  266 => 89,  262 => 88,  258 => 87,  253 => 85,  248 => 83,  244 => 82,  239 => 80,  234 => 78,  230 => 77,  213 => 65,  208 => 62,  200 => 58,  196 => 57,  193 => 56,  191 => 55,  185 => 51,  179 => 47,  171 => 46,  169 => 45,  166 => 44,  160 => 43,  152 => 41,  150 => 40,  144 => 38,  141 => 37,  138 => 36,  135 => 35,  132 => 34,  129 => 33,  127 => 32,  123 => 30,  121 => 29,  113 => 23,  108 => 21,  100 => 20,  98 => 19,  95 => 18,  89 => 17,  81 => 15,  79 => 14,  76 => 13,  74 => 12,  69 => 10,  62 => 5,  56 => 3,  54 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/ocfilter48/module.twig", "");
    }
}
