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

/* default/template/common/language.twig */
class __TwigTemplate_b911626e9650a1d883c2a0c70afce2a45c90ddc3a55b59c9296e71e69248b9a6 extends \Twig\Template
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
        if ((twig_length_filter($this->env, ($context["languages"] ?? null)) > 1)) {
            // line 2
            echo "<form action=\"";
            echo ($context["action"] ?? null);
            echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-language\">
\t<ul class=\"language-list list-unstyled\">
\t\t";
            // line 4
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
                // line 5
                echo "\t\t";
                if ((twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 5) == ($context["code"] ?? null))) {
                    echo " 
\t\t\t<li class=\"language-list__select active\">
\t\t\t\t<button class=\"btn btn-link language-list__btn language-select\" type=\"button\" name=\"";
                    // line 7
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 7);
                    echo "\">
\t\t\t\t\t";
                    // line 8
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 8);
                    echo "
\t\t\t\t</button>
\t\t\t</li>
\t\t";
                } else {
                    // line 12
                    echo "\t\t<li class=\"language-list__select\">
\t\t\t<button class=\"btn btn-link language-list__btn language-select\" type=\"button\" name=\"";
                    // line 13
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 13);
                    echo "\">
\t\t\t\t";
                    // line 14
                    echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 14);
                    echo "
\t\t\t</button>
\t\t</li>
\t\t";
                }
                // line 18
                echo "\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 19
            echo "\t</ul>
\t<input type=\"hidden\" name=\"code\" value=\"\" />
\t<input type=\"hidden\" name=\"redirect\" value=\"";
            // line 21
            echo ($context["redirect"] ?? null);
            echo "\" />
</form>
";
        }
    }

    public function getTemplateName()
    {
        return "default/template/common/language.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  90 => 21,  86 => 19,  80 => 18,  73 => 14,  69 => 13,  66 => 12,  59 => 8,  55 => 7,  49 => 5,  45 => 4,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/common/language.twig", "");
    }
}
