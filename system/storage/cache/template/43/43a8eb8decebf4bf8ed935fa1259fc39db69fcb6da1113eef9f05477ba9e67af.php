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

/* default/template/account/simpleaddress.twig */
class __TwigTemplate_7aaa71a986820c63c6f2ba80a863a64038ad0824a041c4e37eb6abc4a68e6c3e extends \Twig\Template
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
        if ((( !($context["ajax"] ?? null) &&  !($context["popup"] ?? null)) &&  !($context["as_module"] ?? null))) {
            // line 2
            $context["simple_page"] = "simpleaddress";
            // line 3
            echo ($context["header"] ?? null);
            echo "
<div class=\"container\">
  <ul class=\"breadcrumb\">
    ";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
                // line 7
                echo "    <li><a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 7);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 7);
                echo "</a></li>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 9
            echo "  </ul>
  ";
            // line 10
            if (($context["error_warning"] ?? null)) {
                // line 11
                echo "  <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
                echo ($context["error_warning"] ?? null);
                echo "</div>
  ";
            }
            // line 13
            echo "  <div class=\"row\">";
            echo ($context["column_left"] ?? null);
            echo "
    ";
            // line 14
            if ((($context["column_left"] ?? null) && ($context["column_right"] ?? null))) {
                // line 15
                echo "    ";
                $context["class"] = "col-sm-6";
                // line 16
                echo "    ";
            } elseif ((($context["column_left"] ?? null) || ($context["column_right"] ?? null))) {
                // line 17
                echo "    ";
                $context["class"] = "col-sm-9";
                // line 18
                echo "    ";
            } else {
                // line 19
                echo "    ";
                $context["class"] = "col-sm-12";
                // line 20
                echo "    ";
            }
            // line 21
            echo "    <div id=\"content\" class=\"";
            echo ($context["class"] ?? null);
            echo "\">";
            echo ($context["content_top"] ?? null);
            echo "
\t\t";
            // line 22
            echo ($context["account_discount"] ?? null);
            echo "
\t\t<div class=\"account-content\">
    <h1>";
            // line 24
            echo ($context["heading_title"] ?? null);
            echo "</h1>
<div class=\"simple-content\">
";
        }
        // line 27
        echo "    ";
        if (( !($context["ajax"] ?? null) || (($context["ajax"] ?? null) && ($context["popup"] ?? null)))) {
            // line 28
            echo "    <script type=\"text/javascript\">
        var startSimpleInterval = window.setInterval(function(){
            if (typeof jQuery !== 'undefined' && typeof Simplepage === \"function\" && jQuery.isReady) {
                window.clearInterval(startSimpleInterval);

                var simplepage = new Simplepage({
                    additionalParams: \"";
            // line 34
            echo ($context["additional_params"] ?? null);
            echo "\",
                    additionalPath: \"";
            // line 35
            echo ($context["additional_path"] ?? null);
            echo "\",
                    mainUrl: \"";
            // line 36
            echo ($context["action"] ?? null);
            echo "\",
                    mainContainer: \"#simplepage_form\",
                    useAutocomplete: ";
            // line 38
            echo ((($context["use_autocomplete"] ?? null)) ? (1) : (0));
            echo ",
                    scrollToError: ";
            // line 39
            echo ((($context["scroll_to_error"] ?? null)) ? (1) : (0));
            echo ",
                    notificationDefault: ";
            // line 40
            echo ((($context["notification_default"] ?? null)) ? (1) : (0));
            echo ",
                    notificationToasts: ";
            // line 41
            echo ((($context["notification_toasts"] ?? null)) ? (1) : (0));
            echo ",
                    notificationCheckForm: ";
            // line 42
            echo ((($context["notification_check_form"] ?? null)) ? (1) : (0));
            echo ",
                    notificationCheckFormText: \"";
            // line 43
            echo ($context["notification_check_form_text"] ?? null);
            echo "\",
                    languageCode: \"";
            // line 44
            echo ($context["language_code"] ?? null);
            echo "\",
                    javascriptCallback: function() { ";
            // line 45
            echo ($context["javascript_callback"] ?? null);
            echo " }
                });

                if (typeof toastr !== 'undefined') {
                    toastr.options.positionClass = \"";
            // line 49
            echo ((($context["notification_position"] ?? null)) ? (($context["notification_position"] ?? null)) : ("toast-top-right"));
            echo "\";
                    toastr.options.timeOut = \"";
            // line 50
            echo ((($context["notification_timeout"] ?? null)) ? (($context["notification_timeout"] ?? null)) : ("5000"));
            echo "\";
                    toastr.options.progressBar = true;
                }
                
                simplepage.init();
            }
        },0);
    </script>
    ";
        }
        // line 59
        echo "    <form action=\"";
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"simplepage_form\">    
        <div class=\"simpleregister\" id=\"simpleaddress\">
            <div class=\"simpleregister-block-content\">
                ";
        // line 62
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 63
            echo "                  ";
            echo $context["row"];
            echo "
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "                ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["hidden_rows"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
            // line 66
            echo "                  ";
            echo $context["row"];
            echo "
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "            </div>
            <div class=\"simpleregister-button-block buttons\">
                <div class=\"simpleregister-button-right\">
                    <a class=\"button btn-primary button_oc btn\" data-onclick=\"submit\" id=\"simpleregister_button_confirm\"><span>";
        // line 71
        echo ($context["button_continue"] ?? null);
        echo "</span></a>
                </div>
            </div>
        </div>
        ";
        // line 75
        if (($context["redirect"] ?? null)) {
            // line 76
            echo "            <input type=\"hidden\" id=\"simple_redirect_url\" value=\"";
            echo ($context["redirect"] ?? null);
            echo "\">
        ";
        }
        // line 78
        echo "    </form>
";
        // line 79
        if ((( !($context["ajax"] ?? null) &&  !($context["popup"] ?? null)) &&  !($context["as_module"] ?? null))) {
            // line 80
            echo "</div>
</div>
";
            // line 82
            $this->loadTemplate(($context["simple_footer"] ?? null), "default/template/account/simpleaddress.twig", 82)->display($context);
        }
    }

    public function getTemplateName()
    {
        return "default/template/account/simpleaddress.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  254 => 82,  250 => 80,  248 => 79,  245 => 78,  239 => 76,  237 => 75,  230 => 71,  225 => 68,  216 => 66,  211 => 65,  202 => 63,  198 => 62,  191 => 59,  179 => 50,  175 => 49,  168 => 45,  164 => 44,  160 => 43,  156 => 42,  152 => 41,  148 => 40,  144 => 39,  140 => 38,  135 => 36,  131 => 35,  127 => 34,  119 => 28,  116 => 27,  110 => 24,  105 => 22,  98 => 21,  95 => 20,  92 => 19,  89 => 18,  86 => 17,  83 => 16,  80 => 15,  78 => 14,  73 => 13,  67 => 11,  65 => 10,  62 => 9,  51 => 7,  47 => 6,  41 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/account/simpleaddress.twig", "");
    }
}
