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

/* default/template/extension/module/account_discount.twig */
class __TwigTemplate_ddcd4f74424f9023b30ecc21814f8d0a3d4b966d11d03f7c52e7b70c429aed17 extends \Twig\Template
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
        // line 5
        echo "\t\t";
        // line 20
        echo " 
<style>
.profile__progressbar_line:after{
    width: ";
        // line 23
        echo ($context["progresbar"] ?? null);
        echo "%;
}
</style>
<div class=\"profile__block\">
                <h2 class=\"profile__title\">";
        // line 27
        echo ($context["text_discount"] ?? null);
        echo "</h2>
                <div class=\"profile__progressbar\">
                  <div class=\"profile__progressbar_inner\">
                    <div class=\"profile__progressbar_line\" style=\"width: calc(100% - 81px);\">
\t\t\t\t\t";
        // line 31
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["steps"] ?? null));
        foreach ($context['_seq'] as $context["percent"] => $context["step"]) {
            // line 32
            echo "\t\t\t\t\t  ";
            if (($context["percent"] < ($context["customer_percent"] ?? null))) {
                // line 33
                echo "                      <span class=\"profile__progressbar_line_dot profile__progressbar_line_dot--filled_mod\"></span>
                      ";
            } elseif ((            // line 34
$context["percent"] == ($context["customer_percent"] ?? null))) {
                echo " 
                      <span class=\"profile__progressbar_line_dot profile__progressbar_line_dot--active_mod\"></span>
\t\t\t\t\t  ";
            } else {
                // line 36
                echo " 
                      <span class=\"profile__progressbar_line_dot\"></span>
\t\t\t\t\t  ";
            }
            // line 39
            echo "\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['percent'], $context['step'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "                    </div>
                    ";
        // line 45
        echo "\t\t\t\t\t";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["steps"] ?? null));
        foreach ($context['_seq'] as $context["percent"] => $context["step"]) {
            // line 46
            echo "                    <div class=\"profile__progressbar_column ";
            if (($context["percent"] == ($context["customer_percent"] ?? null))) {
                echo "profile__progressbar_column--active_mod";
            }
            echo "\">
                      <span class=\"profile__progressbar_price\" ";
            // line 47
            if (($context["step"] == 0)) {
                echo " style=\"visibility:hidden;\" ";
            }
            echo ">
                        ";
            // line 48
            echo $context["step"];
            echo "
                        <span class=\"profile__progressbar_price--desc\">000 ₴</span>
                        <span class=\"profile__progressbar_price--mob\">тис грн</span>
                      </span>
                      <span class=\"profile__progressbar_percent\">";
            // line 52
            echo $context["percent"];
            echo "%</span>
                    </div>
\t\t\t\t    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['percent'], $context['step'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "                    ";
        // line 111
        echo "                  </div>
                </div>
              </div>
";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/account_discount.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  124 => 111,  122 => 55,  113 => 52,  106 => 48,  100 => 47,  93 => 46,  88 => 45,  85 => 40,  79 => 39,  74 => 36,  68 => 34,  65 => 33,  62 => 32,  58 => 31,  51 => 27,  44 => 23,  39 => 20,  37 => 5,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/account_discount.twig", "");
    }
}
