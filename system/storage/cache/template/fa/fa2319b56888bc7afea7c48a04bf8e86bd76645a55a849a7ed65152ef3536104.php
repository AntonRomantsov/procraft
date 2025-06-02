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

/* default/template/extension/module/ocfilter48/filter_list.twig */
class __TwigTemplate_06e66f2f29bd81d4f63b0a44e3360ed6930d60b913e650213ff6b54990fb83d8 extends \Twig\Template
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
        echo "<div class=\"ocf-filter-list ocf-clearfix\">   
  ";
        // line 2
        if ( !(isset($context["has_loaded_filters"]) || array_key_exists("has_loaded_filters", $context))) {
            // line 3
            echo "  ";
            if (($context["seo_pages"] ?? null)) {
                // line 4
                echo "  ";
                $this->loadTemplate("default/template/extension/module/ocfilter48/page_link_list.twig", "default/template/extension/module/ocfilter48/filter_list.twig", 4)->display($context);
                // line 5
                echo "  ";
            }
            // line 6
            echo "
  ";
            // line 7
            if (((($context["layout"] ?? null) == "vertical") && ($context["selecteds"] ?? null))) {
                // line 8
                echo "  ";
                $this->loadTemplate("default/template/extension/module/ocfilter48/selected_filter.twig", "default/template/extension/module/ocfilter48/filter_list.twig", 8)->display($context);
                // line 9
                echo "  ";
            }
            // line 10
            echo "  ";
        }
        // line 11
        echo "
  ";
        // line 12
        if (((($context["layout"] ?? null) == "vertical") && (isset($context["has_loaded_filters"]) || array_key_exists("has_loaded_filters", $context)))) {
            // line 13
            echo "  <div class=\"ocf-hidden-filters-divider\">
    <span data-ocf=\"collapse\" data-target=\"#ocf-hidden-filters-";
            // line 14
            echo ($context["index"] ?? null);
            echo "\">";
            echo ($context["button_hide"] ?? null);
            echo " <i class=\"ocf-icon ocf-angle ocf-angle-up\"></i></span>
  </div>
  ";
        }
        // line 17
        echo "
  ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["filters"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["filter"]) {
            // line 19
            echo "  ";
            $this->loadTemplate("default/template/extension/module/ocfilter48/filter_item.twig", "default/template/extension/module/ocfilter48/filter_list.twig", 19)->display($context);
            // line 20
            echo "  ";
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['filter'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "
  ";
        // line 22
        if (($context["button_show_more_filters"] ?? null)) {
            // line 23
            echo "  ";
            if ((($context["layout"] ?? null) == "horizontal")) {
                // line 24
                echo "  <div class=\"ocf-btn-block ocf-text-center\">
    <button type=\"button\" class=\"ocf-btn ocf-btn-link ocf-btn-show-filters\" data-ocf=\"collapse\" data-target=\"#ocf-hidden-filters-";
                // line 25
                echo ($context["index"] ?? null);
                echo "\" data-loading-text=\"";
                echo ($context["text_loading"] ?? null);
                echo "\" aria-expanded=\"false\"> 
      <span class=\"ocf-hide-expand-1\">";
                // line 26
                echo ($context["button_show_more_filters"] ?? null);
                echo " <i class=\"ocf-icon ocf-angle ocf-angle-down\"></i></span>
      <span class=\"ocf-hide-expand-0\">";
                // line 27
                echo ($context["button_hide"] ?? null);
                echo " <i class=\"ocf-icon ocf-angle ocf-angle-up\"></i></span>  
    </button>   
  </div>
  ";
            }
            // line 31
            echo "  <div class=\"ocf-collapse ocf-collapse-filter\" id=\"ocf-hidden-filters-";
            echo ($context["index"] ?? null);
            echo "\" data-ocf-load=\"filters\"> 
    <div class=\"ocf-filter-list\">
      ";
            // line 33
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["hidden_filters"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["filter"]) {
                // line 34
                echo "      ";
                $this->loadTemplate("default/template/extension/module/ocfilter48/filter_item.twig", "default/template/extension/module/ocfilter48/filter_list.twig", 34)->display($context);
                // line 35
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['filter'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            echo "  
    </div>    
  </div>
  ";
            // line 38
            if ((($context["layout"] ?? null) == "vertical")) {
                // line 39
                echo "  <button type=\"button\" class=\"ocf-btn ocf-btn-block ocf-btn-show-filters\" data-ocf=\"collapse\" data-target=\"#ocf-hidden-filters-";
                echo ($context["index"] ?? null);
                echo "\" data-loading-text=\"";
                echo ($context["text_loading"] ?? null);
                echo "\" aria-expanded=\"false\"> 
    <span class=\"ocf-hide-expand-1\">";
                // line 40
                echo ($context["button_show_more_filters"] ?? null);
                echo " <i class=\"ocf-icon ocf-angle ocf-angle-down\"></i></span>
    <span class=\"ocf-hide-expand-0\">";
                // line 41
                echo ($context["button_hide"] ?? null);
                echo " <i class=\"ocf-icon ocf-angle ocf-angle-up\"></i></span>  
  </button>
  ";
            }
            // line 44
            echo "  ";
        }
        // line 45
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/ocfilter48/filter_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  212 => 45,  209 => 44,  203 => 41,  199 => 40,  192 => 39,  190 => 38,  172 => 35,  169 => 34,  152 => 33,  146 => 31,  139 => 27,  135 => 26,  129 => 25,  126 => 24,  123 => 23,  121 => 22,  118 => 21,  104 => 20,  101 => 19,  84 => 18,  81 => 17,  73 => 14,  70 => 13,  68 => 12,  65 => 11,  62 => 10,  59 => 9,  56 => 8,  54 => 7,  51 => 6,  48 => 5,  45 => 4,  42 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/ocfilter48/filter_list.twig", "/home/stromo/procraft.ua/dev/catalog/view/theme/default/template/extension/module/ocfilter48/filter_list.twig");
    }
}
