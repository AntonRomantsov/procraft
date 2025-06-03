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

/* default/template/extension/module/ocfilter48/value_item.twig */
class __TwigTemplate_d31437704213d642ec677413c9db7dacb59dfbf5c30d0a5d7e1de3e647f1422d extends \Twig\Template
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
        $context["class"] = ("ocf-value ocf-" . twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "type", [], "any", false, false, false, 1));
        // line 2
        if (twig_get_attribute($this->env, $this->source, ($context["value"] ?? null), "selected", [], "any", false, false, false, 2)) {
            // line 3
            $context["class"] = (($context["class"] ?? null) . " ocf-selected");
        } elseif ( !twig_get_attribute($this->env, $this->source,         // line 4
($context["value"] ?? null), "count", [], "any", false, false, false, 4)) {
            // line 5
            $context["class"] = (($context["class"] ?? null) . " ocf-disabled");
        }
        // line 7
        echo "<button type=\"button\" id=\"ocf-v-";
        echo twig_get_attribute($this->env, $this->source, ($context["value"] ?? null), "value_id", [], "any", false, false, false, 7);
        echo "-";
        echo ($context["index"] ?? null);
        echo "\" class=\"";
        echo ($context["class"] ?? null);
        echo "\" data-filter-key=\"";
        echo twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "filter_key", [], "any", false, false, false, 7);
        echo "\" data-value-id=\"";
        echo twig_get_attribute($this->env, $this->source, ($context["value"] ?? null), "value_id", [], "any", false, false, false, 7);
        echo "\">
  ";
        // line 8
        if (( !twig_get_attribute($this->env, $this->source, ($context["value"] ?? null), "color", [], "any", false, false, false, 8) &&  !twig_get_attribute($this->env, $this->source, ($context["value"] ?? null), "image", [], "any", false, false, false, 8))) {
            // line 9
            echo "  <span class=\"ocf-value-input ocf-value-input-";
            echo twig_get_attribute($this->env, $this->source, ($context["filter"] ?? null), "type", [], "any", false, false, false, 9);
            echo "\"></span>
  ";
        } elseif (twig_get_attribute($this->env, $this->source,         // line 10
($context["value"] ?? null), "color", [], "any", false, false, false, 10)) {
            // line 11
            echo "  <span class=\"ocf-value-color\" style=\"background-color: #";
            echo twig_get_attribute($this->env, $this->source, ($context["value"] ?? null), "color", [], "any", false, false, false, 11);
            echo ";\"></span>
  ";
        } elseif (twig_get_attribute($this->env, $this->source,         // line 12
($context["value"] ?? null), "image", [], "any", false, false, false, 12)) {
            // line 13
            echo "  <span class=\"ocf-value-image\" style=\"background-image: url(";
            echo twig_get_attribute($this->env, $this->source, ($context["value"] ?? null), "image", [], "any", false, false, false, 13);
            echo ");\"></span>
  <div class=\"ocf-value-name\">";
            // line 14
            echo twig_get_attribute($this->env, $this->source, ($context["value"] ?? null), "name", [], "any", false, false, false, 14);
            echo "</div>
  ";
        }
        // line 16
        echo "    
  
  ";
        // line 18
        if (($context["show_counter"] ?? null)) {
            // line 19
            echo "  <span class=\"ocf-value-append\">   
    <span class=\"ocf-value-count\">";
            // line 20
            echo twig_get_attribute($this->env, $this->source, ($context["value"] ?? null), "count", [], "any", false, false, false, 20);
            echo "</span>
  </span>
  ";
        }
        // line 23
        echo "</button>";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/ocfilter48/value_item.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  102 => 23,  96 => 20,  93 => 19,  91 => 18,  87 => 16,  82 => 14,  77 => 13,  75 => 12,  70 => 11,  68 => 10,  63 => 9,  61 => 8,  48 => 7,  45 => 5,  43 => 4,  41 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/ocfilter48/value_item.twig", "/home/stromo/procraft.ua/dev/catalog/view/theme/default/template/extension/module/ocfilter48/value_item.twig");
    }
}
