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

/* default/template/common/simple_row_header.twig */
class __TwigTemplate_e77ec7fed4ba40679ee0119f16bc67f2e56f16ae89746412787b7d4e7af52e07 extends \Twig\Template
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
        echo "<div class=\"form-group\">
  <div class=\"col-sm-12\">
    ";
        // line 3
        if ((($context["tag"] ?? null) != "")) {
            // line 4
            echo "      <";
            echo ($context["tag"] ?? null);
            echo ">";
            echo ($context["label"] ?? null);
            echo "</";
            echo ($context["tag"] ?? null);
            echo ">
    ";
        } else {
            // line 6
            echo "      ";
            echo ($context["label"] ?? null);
            echo "
    ";
        }
        // line 7
        echo "  
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "default/template/common/simple_row_header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  59 => 7,  53 => 6,  43 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/common/simple_row_header.twig", "");
    }
}
