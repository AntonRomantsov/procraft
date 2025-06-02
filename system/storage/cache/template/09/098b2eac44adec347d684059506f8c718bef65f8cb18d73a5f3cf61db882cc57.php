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

/* default/template/extension/module/ocfilter48/value_list.twig */
class __TwigTemplate_9433a29e558ca3a2078d428a1509ac52945eb5e877ab0af88bc58adc968b2053 extends \Twig\Template
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
        if (((((isset($context["has_loaded_values"]) || array_key_exists("has_loaded_values", $context)) &&  !twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "dropdown", [], "any", false, false, false, 1)) && (($context["layout"] ?? null) == "vertical")) || ( !(isset($context["has_loaded_values"]) || array_key_exists("has_loaded_values", $context)) && (twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "dropdown", [], "any", false, false, false, 1) || (($context["layout"] ?? null) == "horizontal"))))) {
            // line 2
            $context["class_scroll"] = "ocf-scroll-y";
        } else {
            // line 4
            $context["class_scroll"] = "";
        }
        // line 6
        echo "
";
        // line 7
        if ((twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "columns", [], "any", false, false, false, 7) > 1)) {
            // line 8
            $context["class_value_list_body"] = ("ocf-value-list-body ocf-auto-column ocf-column-" . twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "columns", [], "any", false, false, false, 8));
        } else {
            // line 10
            $context["class_value_list_body"] = "ocf-value-list-body";
        }
        // line 12
        echo "
<div class=\"ocf-value-list\">
  ";
        // line 14
        if (($context["class_scroll"] ?? null)) {
            // line 15
            echo "  <div class=\"ocf-scroll-x\">  
  ";
        }
        // line 16
        echo "   
    <div class=\"";
        // line 17
        echo ($context["class_value_list_body"] ?? null);
        echo "\">
      ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "values", [], "any", false, false, false, 18));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
            // line 19
            echo "      ";
            $this->loadTemplate("default/template/extension/module/ocfilter48/value_item.twig", "default/template/extension/module/ocfilter48/value_list.twig", 19)->display($context);
            // line 20
            echo "      ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "    </div>

    ";
        // line 23
        if (twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "button_show_more_values", [], "any", false, false, false, 23)) {
            // line 24
            echo "    <div class=\"ocf-collapse ocf-collapse-value\" id=\"ocf-hidden-values-";
            echo twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "id", [], "any", false, false, false, 24);
            echo "\" data-ocf-load=\"values\" data-filter-key=\"";
            echo twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "filter_key", [], "any", false, false, false, 24);
            echo "\"> 
      ";
            // line 25
            if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "hidden_values", [], "any", false, false, false, 25)) > 0)) {
                // line 26
                echo "      <div class=\"ocf-value-list\">
        <div class=\"ocf-scroll-y\">
          <div class=\"";
                // line 28
                echo ($context["class_value_list_body"] ?? null);
                echo "\">
            ";
                // line 29
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "hidden_values", [], "any", false, false, false, 29));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["value"]) {
                    // line 30
                    echo "            ";
                    $this->loadTemplate("default/template/extension/module/ocfilter48/value_item.twig", "default/template/extension/module/ocfilter48/value_list.twig", 30)->display($context);
                    // line 31
                    echo "            ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['length'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['value'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                echo "    
          </div>        
        </div>
      </div>      
      ";
            }
            // line 36
            echo "    </div>
    ";
        }
        // line 38
        echo "  ";
        if (($context["class_scroll"] ?? null)) {
            // line 39
            echo "  </div>
  ";
        }
        // line 40
        echo "      
  
  ";
        // line 42
        if (twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "button_show_more_values", [], "any", false, false, false, 42)) {
            // line 43
            echo "  <button type=\"button\" class=\"ocf-btn ocf-btn-link ocf-btn-show-values\" data-ocf=\"collapse\" data-target=\"#ocf-hidden-values-";
            echo twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "id", [], "any", false, false, false, 43);
            echo "\" data-loading-text=\"";
            echo ($context["text_loading"] ?? null);
            echo "\" aria-expanded=\"false\">
    <span class=\"ocf-hide-expand-1\">";
            // line 44
            echo twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "button_show_more_values", [], "any", false, false, false, 44);
            echo " <i class=\"ocf-icon ocf-angle ocf-angle-down\"></i></span>
    <span class=\"ocf-hide-expand-0\">";
            // line 45
            echo ($context["button_hide"] ?? null);
            echo " <i class=\"ocf-icon ocf-angle ocf-angle-up\"></i></span>
  </button>  
  ";
        }
        // line 48
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/ocfilter48/value_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  204 => 48,  198 => 45,  194 => 44,  187 => 43,  185 => 42,  181 => 40,  177 => 39,  174 => 38,  170 => 36,  150 => 31,  147 => 30,  130 => 29,  126 => 28,  122 => 26,  120 => 25,  113 => 24,  111 => 23,  107 => 21,  93 => 20,  90 => 19,  73 => 18,  69 => 17,  66 => 16,  62 => 15,  60 => 14,  56 => 12,  53 => 10,  50 => 8,  48 => 7,  45 => 6,  42 => 4,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/ocfilter48/value_list.twig", "/home/stromo/procraft.ua/dev/catalog/view/theme/default/template/extension/module/ocfilter48/value_list.twig");
    }
}
