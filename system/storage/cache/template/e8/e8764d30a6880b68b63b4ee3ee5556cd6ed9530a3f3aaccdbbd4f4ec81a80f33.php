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

/* default/template/extension/module/giftor.twig */
class __TwigTemplate_e5789fc52885cf68c21c863f681b5063f14312215a0d9e10dffa574b9c005c74 extends \Twig\Template
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
        echo "<div class=\"giftor-box\">
\t<div class=\"giftor-head\">
\t<svg width=\"51\" height=\"51\" viewBox=\"0 0 51 51\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
<path d=\"M17.6409 37.5256L15.6548 34.3032L11.461 35.0566L16.9764 25.2749H6.22162V51H24.5469V25.2749L17.6409 37.5256Z\" fill=\"#ED6E00\"/>
<path d=\"M47.803 12.9987H35.6339C36.3456 12.632 36.981 12.2489 37.5438 11.8423C39.7078 10.2919 40.857 8.32753 40.8534 6.37772C40.8534 4.7783 40.0964 2.48719 38.9962 1.53225C37.8942 0.566425 36.4328 0 34.8733 0C33.2067 0 31.6581 0.571871 30.331 1.46145C28.3358 2.79763 26.7745 5.69148 25.6616 7.89908C25.6053 8.00983 25.549 8.11694 25.4946 8.22405C25.0879 7.3726 24.6123 5.66788 24.0731 4.89086C23.129 3.54379 21.9944 2.35284 20.6618 1.46145C19.3383 0.571871 17.7916 0 16.1268 0C14.4675 0.00544639 12.9479 0.700769 11.8114 1.77371C10.6804 2.83575 9.88886 5.22672 9.8816 6.93507C9.87434 7.93176 10.1648 8.97565 10.7657 9.92514C11.521 11.1143 12.7174 12.1509 14.3694 12.9987H3.1662L3.19162 23.2289H24.2292V12.9987H26.7926V23.2289H47.8339L47.803 12.9987ZM15.0956 9.79987C14.2514 9.26613 13.7322 8.73057 13.4272 8.24947C13.1313 7.772 13.0278 6.93326 13.0278 6.52115C13.0205 5.83308 13.3637 4.6258 13.9737 4.05938C14.5691 3.49114 15.3788 3.14075 16.105 3.14075H16.1268C17.0618 3.14801 17.9876 3.46027 18.9208 4.07572C20.3096 4.99252 21.6186 7.48516 22.5281 9.31151C23.0038 10.241 23.3669 11.2123 23.6119 12.1618C19.3983 11.7261 16.6751 10.7966 15.0956 9.79987ZM29.4977 7.57593C30.2565 6.48847 31.1516 4.69479 32.0793 4.07572C33.0015 3.46027 33.9383 3.14801 34.8733 3.14075H34.8823C35.6612 3.14075 36.411 3.44575 36.9211 3.8978C37.4331 4.35711 37.7072 5.19767 37.7072 5.78951C37.6963 6.48847 37.335 8.09697 35.7029 9.28973C34.1543 10.4189 31.4656 11.5754 27.3318 12.3851C27.7222 10.7457 28.4865 9.01015 29.4977 7.57593Z\" fill=\"#ED6E00\"/>
<path d=\"M39.5608 35.0149L35.3689 34.3032L33.3901 37.5638L26.573 25.4401V51H44.8057V25.2749H34.0509L39.5608 35.0149Z\" fill=\"#ED6E00\"/>
</svg>
    <div class=\"gitor-inner\">
\t";
        // line 9
        if (($context["title"] ?? null)) {
            // line 10
            echo "\t\t<h3>";
            echo ($context["title"] ?? null);
            echo "</h3>
\t";
        }
        // line 12
        echo "\t
\t\t";
        // line 13
        if (($context["description"] ?? null)) {
            // line 14
            echo "\t\t\t<div class=\"giftor-description\">";
            echo ($context["description"] ?? null);
            echo "</div>
\t\t";
        }
        // line 16
        echo "\t\t</div>
\t</div>
\t\t<div class=\"giftor-list\">
\t\t\t";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["product_gifts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["gift"]) {
            // line 20
            echo "\t\t\t\t<div class=\"giftor-item col-6\">
\t\t\t\t\t<img src=\"";
            // line 21
            echo twig_get_attribute($this->env, $this->source, $context["gift"], "thumb", [], "any", false, false, false, 21);
            echo "\" class=\"giftor-img img-responsive\">
\t\t\t\t\t<h4><a class=\"giftor-name\" href=\"";
            // line 22
            echo twig_get_attribute($this->env, $this->source, $context["gift"], "href", [], "any", false, false, false, 22);
            echo "\" target=\"_blank\">";
            echo twig_get_attribute($this->env, $this->source, $context["gift"], "name", [], "any", false, false, false, 22);
            echo "</a></h4>
\t\t\t\t\t<span class=\"giftor-price\">";
            // line 23
            echo twig_get_attribute($this->env, $this->source, $context["gift"], "price", [], "any", false, false, false, 23);
            echo "</span>
\t\t\t\t\t<span class=\"giftor-free\">";
            // line 24
            echo ($context["text_giftor_free"] ?? null);
            echo "</span>
\t\t\t\t\t<div class=\"clearfix\"></div>
\t\t\t\t</div>
\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['gift'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 28
        echo "\t\t</div>
</div>
<style type=\"text/css\">
.giftor-box {
\tmargin: 20px 0;
}
.giftor-price {
\ttext-decoration: line-through;
    color: #b90303;
    margin-right: 8px;
}
.giftor-item {
\tmargin-bottom: 5px;
}
.giftor-img {
\tfloat: left;
\tmargin-right: 20px;
}
";
        // line 46
        if (($context["css"] ?? null)) {
            echo ($context["css"] ?? null);
        }
        // line 47
        echo "</style>";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/giftor.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  126 => 47,  122 => 46,  102 => 28,  92 => 24,  88 => 23,  82 => 22,  78 => 21,  75 => 20,  71 => 19,  66 => 16,  60 => 14,  58 => 13,  55 => 12,  49 => 10,  47 => 9,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/giftor.twig", "");
    }
}
