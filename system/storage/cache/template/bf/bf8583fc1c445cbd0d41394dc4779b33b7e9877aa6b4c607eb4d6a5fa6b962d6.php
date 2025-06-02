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

/* default/template/extension/module/ocfilter48/filter_item.twig */
class __TwigTemplate_56baee428c995d0b19396f964daa6646d3b4d2f887c4b15420034ef2ce1e5da5 extends \Twig\Template
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
        $context["dropdown"] = twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "dropdown", [], "any", false, false, false, 1);
        // line 2
        echo "
";
        // line 3
        if ((($context["layout"] ?? null) == "horizontal")) {
            // line 4
            $context["dropdown"] = true;
        }
        // line 6
        echo "
";
        // line 7
        $context["class"] = "ocf-filter";
        // line 8
        echo "
";
        // line 9
        if (($context["dropdown"] ?? null)) {
            // line 10
            $context["class"] = (($context["class"] ?? null) . "");
        }
        // line 12
        echo "
";
        // line 13
        if (((twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "type", [], "any", false, false, false, 13) == "slide") || (twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "type", [], "any", false, false, false, 13) == "slide_dual"))) {
            // line 14
            $context["class"] = (($context["class"] ?? null) . " ocf-slider");
            // line 15
            echo "
";
            // line 16
            if (($context["slider_input"] ?? null)) {
                // line 17
                $context["class"] = (($context["class"] ?? null) . " ocf-has-input");
            }
        }
        // line 20
        echo "
";
        // line 21
        if (twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "selected", [], "any", false, false, false, 21)) {
            // line 22
            $context["class"] = (($context["class"] ?? null) . " ocf-active");
        }
        // line 24
        echo "
<div class=\"";
        // line 25
        echo ($context["class"] ?? null);
        echo "\" id=\"ocf-filter-";
        echo twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "id", [], "any", false, false, false, 25);
        echo "\">
  <div class=\"ocf-filter-body\">
    <div class=\"ocf-filter-header\" data-ocf=\"expand\" style=\"display:none\">  
      <i class=\"ocf-mobile ocf-icon ocf-arrow-long ocf-arrow-left\"></i> 
      
      ";
        // line 30
        if (((twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "type", [], "any", false, false, false, 30) == "slide") || (twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "type", [], "any", false, false, false, 30) == "slide_dual"))) {
            // line 31
            echo "      <span class=\"ocf-active-label\">
        ";
            // line 32
            echo twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "prefix", [], "any", false, false, false, 32);
            echo "
        <span id=\"ocf-text-min-";
            // line 33
            echo twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "id", [], "any", false, false, false, 33);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "min_request", [], "any", false, false, false, 33);
            echo "</span>
        ";
            // line 34
            if ((twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "type", [], "any", false, false, false, 34) == "slide_dual")) {
                // line 35
                echo "        - <span id=\"ocf-text-max-";
                echo twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "id", [], "any", false, false, false, 35);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "max_request", [], "any", false, false, false, 35);
                echo "</span>
        ";
            }
            // line 37
            echo "        ";
            echo twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "suffix", [], "any", false, false, false, 37);
            echo "
      </span>    
      ";
        } else {
            // line 40
            echo "      <span class=\"ocf-active-label\">";
            echo twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "text_selected", [], "any", false, false, false, 40);
            echo "</span>    
      ";
        }
        // line 41
        echo "                      
      
      <span class=\"ocf-filter-name\">";
        // line 43
        echo twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "name", [], "any", false, false, false, 43);
        echo "</span>     
      
      <span class=\"ocf-filter-header-append\">
        ";
        // line 46
        if (twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "description", [], "any", false, false, false, 46)) {
            // line 47
            echo "        <span class=\"ocf-desktop ocf-filter-description\" data-ocf=\"popover\" data-content=\"";
            echo twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "description", [], "any", false, false, false, 47);
            echo "\">
          <i class=\"ocf-icon ocf-icon-16 ocf-help-circle\"></i>
        </span>
        ";
        }
        // line 50
        echo "     
        
        <span class=\"ocf-filter-discard ocf-icon ocf-icon-16 ocf-minus-circle\" data-ocf-discard=\"";
        // line 52
        echo twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "filter_key", [], "any", false, false, false, 52);
        echo "\"></span> 
        
        <i class=\"ocf-mobile ocf-icon ocf-angle ocf-angle-right\"></i>        
        ";
        // line 55
        if (($context["dropdown"] ?? null)) {
            echo " 
        <i class=\"ocf-desktop ocf-icon ocf-angle ocf-angle-down\"></i>
        ";
        }
        // line 57
        echo "   
      </span>
    </div><!-- /.ocf-filter-header -->
    
    ";
        // line 61
        if (((twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "type", [], "any", false, false, false, 61) == "slide") || (twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "type", [], "any", false, false, false, 61) == "slide_dual"))) {
            // line 62
            echo "    
    ";
            // line 63
            $this->loadTemplate("default/template/extension/module/ocfilter48/filter_slider_item.twig", "default/template/extension/module/ocfilter48/filter_item.twig", 63)->display($context);
            // line 64
            echo "    
    ";
        } else {
            // line 66
            echo "    
    ";
            // line 67
            $this->loadTemplate("default/template/extension/module/ocfilter48/value_list.twig", "default/template/extension/module/ocfilter48/filter_item.twig", 67)->display($context);
            // line 68
            echo "    
    ";
        }
        // line 70
        echo "  </div>    
</div>";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/ocfilter48/filter_item.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  197 => 70,  193 => 68,  191 => 67,  188 => 66,  184 => 64,  182 => 63,  179 => 62,  177 => 61,  171 => 57,  165 => 55,  159 => 52,  155 => 50,  147 => 47,  145 => 46,  139 => 43,  135 => 41,  129 => 40,  122 => 37,  114 => 35,  112 => 34,  106 => 33,  102 => 32,  99 => 31,  97 => 30,  87 => 25,  84 => 24,  81 => 22,  79 => 21,  76 => 20,  72 => 17,  70 => 16,  67 => 15,  65 => 14,  63 => 13,  60 => 12,  57 => 10,  55 => 9,  52 => 8,  50 => 7,  47 => 6,  44 => 4,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/ocfilter48/filter_item.twig", "/home/stromo/procraft.ua/dev/catalog/view/theme/default/template/extension/module/ocfilter48/filter_item.twig");
    }
}
