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

/* default/template/account/password.twig */
class __TwigTemplate_290b0fe196a06622290c5c09dce7b4837d59af3986f23fa967e18ce637361999 extends \Twig\Template
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

\t\t\t<main>
\t\t\t\t<section\tclass=\"profile\">
\t\t\t\t\t<div\tclass=\"breadcrumbs__container\"\tbis_skin_checked=\"1\">
\t\t\t\t\t\t<ul\tclass=\"breadcrumb\">
\t\t\t\t\t\t\t";
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 8
            echo "\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t<a\thref=\"";
            // line 9
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 9);
            echo "\">
\t\t\t\t\t\t\t\t\t\t";
            // line 10
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 10);
            echo "
\t\t\t\t\t\t\t\t\t</a>
\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t\t<div\tclass=\"profile__container\">
\t\t\t\t\t\t<div\tclass=\"profile__wrapper\">
\t\t\t\t\t\t\t";
        // line 18
        echo ($context["account"] ?? null);
        echo "
\t\t\t\t\t\t\t<div\tclass=\"profile__main\">
\t\t\t\t\t\t\t\t";
        // line 20
        echo ($context["account_discount"] ?? null);
        echo "
\t\t\t\t\t\t\t\t<div\tclass=\"profile__block profile__block--line_mod\">
\t\t\t\t\t\t\t\t\t<h2\tclass=\"profile__title\">
\t\t\t\t\t\t\t\t\t\t";
        // line 23
        echo ($context["heading_title"] ?? null);
        echo "
\t\t\t\t\t\t\t\t\t</h2>
\t\t\t\t\t\t\t\t\t<form\tclass=\"profile__form\"\taction=\"";
        // line 25
        echo ($context["action"] ?? null);
        echo "\"\tmethod=\"post\"\tenctype=\"multipart/form-data\">
\t\t\t\t\t\t\t\t\t\t<div\tclass=\"profile__form_row\">
\t\t\t\t\t\t\t\t\t\t\t<label\tclass=\"toggle\">
\t\t\t\t\t\t\t\t\t\t\t\t<input\ttype=\"checkbox\"\tclass=\"toggle_input\"\tname=\"newsletter\"\tid=\"newsletter\"\t";
        // line 28
        if (($context["newsletter"] ?? null)) {
            echo "\tchecked=\"checked\"\t";
        }
        echo " />
\t\t\t\t\t\t\t\t\t\t\t\t<div\tclass=\"toggle_switch\"></div>
\t\t\t\t\t\t\t\t\t\t\t\t<span>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 31
        echo ($context["text_subscribed"] ?? null);
        echo "
\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<div\tclass=\"account-newsletter__success\"\tid=\"respond-success\"></div>
\t\t\t\t\t\t\t\t\t\t<div\tclass=\"profile__form_row\">
\t\t\t\t\t\t\t\t\t\t\t<div\tclass=\"profile__form_column\">
\t\t\t\t\t\t\t\t\t\t\t\t<label\tclass=\"registration_input__label\"\tfor=\"newPassword\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t*
\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 42
        echo ($context["entry_password"] ?? null);
        echo "
\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t<input\tclass=\"input--profile_mod\"\tid=\"newPassword\"\ttype=\"password\"\tname=\"password\"\tvalue=\"";
        // line 44
        echo ($context["password"] ?? null);
        echo "\"\tplaceholder=\"";
        echo ($context["entry_password"] ?? null);
        echo "\"\trequired />
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 45
        if (($context["error_password"] ?? null)) {
            // line 46
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div\tclass=\"text-danger\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 47
            echo ($context["error_password"] ?? null);
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 50
        echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t<div\tclass=\"profile__form_column\">
\t\t\t\t\t\t\t\t\t\t\t\t<label\tclass=\"registration_input__label\"\tfor=\"newPassword2\">
\t\t\t\t\t\t\t\t\t\t\t\t\t<span>
\t\t\t\t\t\t\t\t\t\t\t\t\t\t*
\t\t\t\t\t\t\t\t\t\t\t\t\t</span>
\t\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 56
        echo ($context["entry_confirm"] ?? null);
        echo "
\t\t\t\t\t\t\t\t\t\t\t\t</label>
\t\t\t\t\t\t\t\t\t\t\t\t<input\tclass=\"input--profile_mod\"\tid=\"newPassword2\"\ttype=\"password\"\tplaceholder=\"";
        // line 58
        echo ($context["entry_confirm"] ?? null);
        echo "\"\tname=\"confirm\"\tvalue=\"";
        echo ($context["confirm"] ?? null);
        echo "\"\trequired />
\t\t\t\t\t\t\t\t\t\t\t\t";
        // line 59
        if (($context["error_confirm"] ?? null)) {
            // line 60
            echo "\t\t\t\t\t\t\t\t\t\t\t\t\t<div\tclass=\"text-danger\">
\t\t\t\t\t\t\t\t\t\t\t\t\t\t";
            // line 61
            echo ($context["error_confirm"] ?? null);
            echo "
\t\t\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t\t\t";
        }
        // line 64
        echo "\t\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t\t<button\ttype=\"submit\"\tclass=\"button profile__form_button\">
\t\t\t\t\t\t\t\t\t\t\t";
        // line 67
        echo ($context["text_save"] ?? null);
        echo "
\t\t\t\t\t\t\t\t\t\t</button>
\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</section>
\t\t\t</main>
\t\t\t<script>
\t\t\$(document).ready(function() {
\t\t\t\$('#newsletter').on('click', function() {
\t\t\t\tif(\$('input[name=\"newsletter\"]').attr('checked') == 'checked'){
\t\t\t\t\tvar elem = 'unsubscribe';
\t\t\t\t\t\$('input[name=\"newsletter\"]').removeAttr('checked');
\t\t\t\t}else{
                    var elem = 'subscribe';
\t\t\t\t\t\$('input[name=\"newsletter\"]').attr('checked', 'checked');
\t\t\t\t}
\t\t\t\t\$.ajax({
\t\t\t\t\turl: 'index.php?route=account/password/' + elem +'',
\t\t\t\t\ttype: 'post',
\t\t\t\t\tdataType: 'json',
\t\t\t\t\tdata: 'email=' + '";
        // line 90
        echo ($context["customer_email"] ?? null);
        echo "&lang=";
        echo ($context["lang"] ?? null);
        echo "',
\t\t\t\t\tsuccess: function(json) {
\t\t\t\t\t\t\$('.text-success, .text-danger').remove();
\t\t\t\t\t\tif (json['error']) {
\t\t\t\t\t\t\t\$('#respond-success').html('<span class=\"text-danger\">' + json['error'] + '</span>');
\t\t\t\t\t\t}
\t\t\t\t\t\tif (json['success']) {
\t\t\t\t\t\t\t\$('#respond-success').html('<span class=\"text-success\">' + json['success'] + '</span>'); }}
\t\t\t\t});
\t\t\t\t//return false;
\t\t\t});
\t\t});
\t</script>

\t\t\t";
        // line 104
        echo ($context["content_bottom"] ?? null);
        echo "
\t\t</div>
\t\t";
        // line 106
        echo ($context["column_right"] ?? null);
        echo "
\t</div>
</div>
";
        // line 109
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/template/account/password.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  230 => 109,  224 => 106,  219 => 104,  200 => 90,  174 => 67,  169 => 64,  163 => 61,  160 => 60,  158 => 59,  152 => 58,  147 => 56,  139 => 50,  133 => 47,  130 => 46,  128 => 45,  122 => 44,  117 => 42,  103 => 31,  95 => 28,  89 => 25,  84 => 23,  78 => 20,  73 => 18,  67 => 14,  57 => 10,  53 => 9,  50 => 8,  46 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/account/password.twig", "");
    }
}
