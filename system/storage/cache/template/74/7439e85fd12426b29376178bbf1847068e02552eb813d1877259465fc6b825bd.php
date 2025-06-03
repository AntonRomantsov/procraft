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

/* default/template/common/presentation.twig */
class __TwigTemplate_c3319fa4ba226f4b0cd8fdff88bafe09d78d00260d65e292d0a42dc05902e8aa extends \Twig\Template
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
        echo ($context["header"] ?? null);
        echo "
<div class=\"modules-fade\" onclick=\"\$('.modules-menu').fadeToggle();\$('.modules-fade').fadeToggle();\$('body').css('overflow-y', 'auto');\"></div>
<div class=\"container\">
  <div class=\"modules-menu\">
    <h2>";
        // line 5
        echo ($context["text_navigation"] ?? null);
        echo "</h2>
    <img src=\"/image/mobile-menu-close.svg\" class=\"mobile-menu-close\" onclick=\"\$('.modules-menu').fadeToggle();\$('.modules-fade').fadeToggle();\$('body').css('overflow-y', 'auto');\">
    ";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["anchors"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["anchor"]) {
            // line 8
            echo "    <p><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["anchor"], "href", [], "any", false, false, false, 8);
            echo "\" onclick=\"anchor('";
            echo twig_get_attribute($this->env, $this->source, $context["anchor"], "code", [], "any", false, false, false, 8);
            echo "');\">";
            echo twig_get_attribute($this->env, $this->source, $context["anchor"], "title", [], "any", false, false, false, 8);
            echo "</a></p>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['anchor'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 10
        echo "    <div id=\"undermenu\"></div>
  </div>
</div>
";
        // line 13
        echo ($context["content_full"] ?? null);
        echo "
<div id=\"common-home\" class=\"container\">
  <button class=\"btn btn-modules\" onclick=\"\$('.modules-menu').fadeToggle();\$('.modules-fade').fadeToggle();\$('body').css('overflow-y', 'hidden');\">";
        // line 15
        echo ($context["text_navigation"] ?? null);
        echo "</button>
  <div class=\"row\"><div style=\"width: 25%; visibility: hidden;\">";
        // line 16
        echo ($context["column_left"] ?? null);
        echo "</div>
    ";
        // line 17
        if ((($context["column_left"] ?? null) && ($context["column_right"] ?? null))) {
            // line 18
            echo "    ";
            $context["class"] = "col-sm-6";
            // line 19
            echo "    ";
        } elseif ((($context["column_left"] ?? null) || ($context["column_right"] ?? null))) {
            // line 20
            echo "    ";
            $context["class"] = "col-sm-12 col-md-9 col-md-push-3";
            // line 21
            echo "    ";
        } else {
            // line 22
            echo "    ";
            $context["class"] = "col-sm-12";
            // line 23
            echo "    ";
        }
        // line 24
        echo "    <div id=\"content\" class=\"";
        echo ($context["class"] ?? null);
        echo " content-presentation\">";
        echo ($context["content_top"] ?? null);
        echo ($context["content_bottom"] ?? null);
        echo "</div>
    ";
        // line 25
        echo ($context["column_right"] ?? null);
        echo "</div>
</div>
<script type=\"text/javascript\">
  function anchor(link){
    \$('.modules-menu p').removeClass('active-item');
    \$(this).parent().addClass('active-item'); 
    scrollTo(800, \$('.modules-menu').offsetTop); 
    \$('.module-tab-pane h3').removeClass('active');
    \$(link + ' h3').addClass('active');
    if(window.innerWidth < 992) {
     \$('.modules-menu').fadeToggle();
     \$('.modules-fade').fadeToggle();
     \$('body').css('overflow-y', 'auto');
    }
  }
</script>
";
        // line 41
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/template/common/presentation.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 41,  112 => 25,  104 => 24,  101 => 23,  98 => 22,  95 => 21,  92 => 20,  89 => 19,  86 => 18,  84 => 17,  80 => 16,  76 => 15,  71 => 13,  66 => 10,  53 => 8,  49 => 7,  44 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/common/presentation.twig", "");
    }
}
