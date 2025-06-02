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

/* default/template/common/simple_footer.twig */
class __TwigTemplate_87d3e8bfdc34cb95488c738b6ba6b73c2f61d49b96e2d40a58c43605aef865b9 extends \Twig\Template
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
        echo "
      ";
        // line 2
        echo ($context["content_bottom"] ?? null);
        echo "</div>
    ";
        // line 3
        echo ($context["column_right"] ?? null);
        echo "</div>
</div>
";
        // line 5
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "default/template/common/simple_footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 5,  44 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/common/simple_footer.twig", "/home/stromo/procraft.ua/dev/catalog/view/theme/default/template/common/simple_footer.twig");
    }
}
