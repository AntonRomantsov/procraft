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

/* default/template/extension/module/cart_popup/cart_popup_voucher.twig */
class __TwigTemplate_66259f2b7778c5c697f454d587bd3a28041400dd537e1581aadff722fb95b031 extends \Twig\Template
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
        echo "<input type=\"text\" name=\"cp_voucher\" value=\"";
        echo ($context["voucher"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_voucher"] ?? null);
        echo "\" id=\"cp-input-voucher\" />
<input type=\"submit\" value=\"";
        // line 2
        echo ($context["button_voucher"] ?? null);
        echo "\" id=\"cp-button-voucher\" data-loading-text=\"";
        echo ($context["text_loading"] ?? null);
        echo "\" class=\"next-step-button\" />
<script type=\"text/javascript\"><!--
\$('#cp-button-voucher').on('click', function() {
  maskElement('#check-data', true);
  \$.ajax({
    url: 'index.php?route=extension/module/cart_popup/voucher',
    type: 'post',
    data: 'cp_voucher=' + encodeURIComponent(\$('input[name=\\'cp_voucher\\']').val()),
    dataType: 'json',
    cache: false,
    beforeSend: function() {
      \$('#cp-button-voucher').button('loading');
    },
    complete: function() {
      \$('#cp-button-voucher').button('reset');
    },
    success: function(json) {
      \$('.field-error').remove();
      if (json['error']) {
        maskElement('#check-data', false);
        \$('input[name=\\'cp_voucher\\']').addClass('error-style').after('<span class=\"error-text field-error\">' + json['error'] + '</span>');
      } else {
        maskElement('#check-data', false);
        \$('input[name=\\'cp_voucher\\']').removeClass('error-style').after('<span id=\"cp-voucher-success\">' + json['success'] + '</span>').fadeIn();
        \$('#cp-voucher-success').delay(1000).fadeOut();
        setTimeout(update_cart, 1000, 1, 'remove');
      }
    }
  });
});
//-->
</script>";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/cart_popup/cart_popup_voucher.twig";
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
        return new Source("", "default/template/extension/module/cart_popup/cart_popup_voucher.twig", "");
    }
}
