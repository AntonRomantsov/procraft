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

/* default/template/extension/module/cart_popup/cart_popup_coupon.twig */
class __TwigTemplate_13b7d134cbea14fb4fcd6aacaacd32c79d74d3ad84326d32e2937673d5c657f6 extends \Twig\Template
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
        echo "<input type=\"text\" name=\"cp_coupon\" value=\"";
        echo ($context["coupon"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_coupon"] ?? null);
        echo "\" id=\"cp-input-coupon\" />
<input type=\"button\" value=\"";
        // line 2
        echo ($context["button_coupon"] ?? null);
        echo "\" id=\"cp-button-coupon\" data-loading-text=\"";
        echo ($context["text_loading"] ?? null);
        echo "\" class=\"next-step-button\" />
<script type=\"text/javascript\"><!--
\t\$('#cp-button-coupon').on('click', function() {
\t\tmaskElement('#check-data', true);
\t\t\$.ajax({
\t\t\turl: 'index.php?route=extension/module/cart_popup/coupon',
\t\t\ttype: 'post',
\t\t\tdata: 'cp_coupon=' + encodeURIComponent(\$('input[name=\\'cp_coupon\\']').val()),
\t\t\tdataType: 'json',
\t\t\tcache: false,
\t\t\tbeforeSend: function() {
\t\t\t\t\$('#cp-button-coupon').button('loading');
\t\t\t},
\t\t\tcomplete: function() {
\t\t\t\t\$('#cp-button-coupon').button('reset');
\t\t\t},
\t\t\tsuccess: function(json) {
\t\t\t\t\$('.field-error').remove();
\t\t\t\tif (json['error']) {
\t\t\t\t\tmaskElement('#check-data', false);
\t\t\t\t\t\$('input[name=\\'cp_coupon\\']').addClass('error-style').after('<span class=\"error-text field-error\">' + json['error'] + '</span>');
\t\t\t\t} else {
\t\t\t\t\tmaskElement('#check-data', false);
\t\t\t\t\t\$('input[name=\\'cp_coupon\\']').removeClass('error-style').after('<span id=\"cp-coupon-success\">' + json['success'] + '</span>').fadeIn();
\t\t\t\t\t\$('#cp-coupon-success').delay(1000).fadeOut();
\t\t\t\t\tsetTimeout(update_cart, 1000, 1, 'remove');
\t\t\t\t}
\t\t\t}
\t\t});
\t});
//-->
</script>";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/cart_popup/cart_popup_coupon.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  44 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/cart_popup/cart_popup_coupon.twig", "");
    }
}
