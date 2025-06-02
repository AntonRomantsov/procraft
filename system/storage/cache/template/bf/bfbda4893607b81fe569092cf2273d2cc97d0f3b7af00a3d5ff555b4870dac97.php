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

/* default/template/extension/module/search_suggestion.twig */
class __TwigTemplate_f7941b14379129aff6f9603a14bafb63f9478797479b13de9c1bfead6a049dd9 extends \Twig\Template
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
        echo "<style type=\"text/css\">
";
        // line 2
        echo ($context["css"] ?? null);
        echo " 
</style>

";
        // line 5
        if (((isset($context["element"]) || array_key_exists("element", $context)) && ($context["element"] ?? null))) {
            echo " 
<script type=\"text/javascript\">
  var search_element = \"";
            // line 7
            echo ($context["element"] ?? null);
            echo "\";
</script>
";
        }
        // line 10
        echo "
<script type=\"text/javascript\">
  function ss_cart_add(product_id, minimum) {
    window.ss_btn_clicked = true;
    cart.add(product_id, minimum);
    return false;
  }
</script>";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/search_suggestion.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 10,  51 => 7,  46 => 5,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/search_suggestion.twig", "");
    }
}
