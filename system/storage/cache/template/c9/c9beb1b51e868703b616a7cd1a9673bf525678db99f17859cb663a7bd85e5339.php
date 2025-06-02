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

/* default/template/extension/module/newsletter.twig */
class __TwigTemplate_090e93abb611ec16dfc1b660086ab09d1318cfcaf19f3fd0e08dbe587cde2fa1 extends \Twig\Template
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
        if ((($context["type"] ?? null) == "module")) {
            // line 2
            echo "<h3>";
            echo ($context["heading_title"] ?? null);
            echo "</h3>
<div class=\"bordered_content padded box newsletter_module\">
<p class=\"newsletter-descr\">";
            // line 4
            echo ($context["html"] ?? null);
            echo "</p>
<div id=\"respond\" class=\"";
            // line 5
            echo ($context["module"] ?? null);
            echo "\"></div>
<div class=\"input-group\">
<input type=\"text\" id=\"email";
            // line 7
            echo ($context["module"] ?? null);
            echo "\" name=\"email\" class=\"form-control\" placeholder=\"";
            echo ($context["entry_email"] ?? null);
            echo "\" />
<span id=\"button-subscribe\" class=\"";
            // line 8
            echo ($context["module"] ?? null);
            echo " input-group-addon btn btn-primary newsletter-btn\"><i class=\"fa fa-envelope\"></i></span>
</div>
";
            // line 10
            if (($context["unsubscribe"] ?? null)) {
                // line 11
                echo "<div class=\"unsubscribe\"><a id=\"button-unsubscribe\" class=\"";
                echo ($context["module"] ?? null);
                echo "\">";
                echo ($context["button_unsubscribe"] ?? null);
                echo "</a></div>
";
            }
            // line 13
            echo "<p class=\"newsletter-private\">";
            echo ($context["private_text"] ?? null);
            echo "</p>
</div>
";
        } elseif ((        // line 15
($context["type"] ?? null) == "popup")) {
            // line 16
            echo "<div class=\"init_popup\">
<div style=\"display: none;\" class=\"window_holder\">
<div class=\"newsletter_module popup\">
<a class=\"popup_close\"><i class=\"fa fa-times\"></i></a>
<h3>";
            // line 20
            echo ($context["heading_title"] ?? null);
            echo "</h3>
<div class=\"table ";
            // line 21
            if (($context["image"] ?? null)) {
                echo " ";
                echo "split";
                echo " ";
            }
            echo "\">
";
            // line 22
            if (($context["image"] ?? null)) {
                // line 23
                echo "<div class=\"table-cell text-center\">
<img src=\"";
                // line 24
                echo ($context["image"] ?? null);
                echo "\" alt=\"\" class=\"img-responsive\" style=\"margin:5px auto;\" />
</div>
";
            }
            // line 27
            echo "<div class=\"table-cell\">
";
            // line 28
            echo ($context["html"] ?? null);
            echo "
<div id=\"respond\" class=\"";
            // line 29
            echo ($context["module"] ?? null);
            echo "\"></div>
<div class=\"form-group\">
<input id=\"email";
            // line 31
            echo ($context["module"] ?? null);
            echo "\" name=\"email\" class=\"form-control\" placeholder=\"";
            echo ($context["entry_email"] ?? null);
            echo "\" />
</div>
<a id=\"button-subscribe\" class=\"";
            // line 33
            echo ($context["module"] ?? null);
            echo " btn btn-primary\">";
            echo ($context["button_subscribe"] ?? null);
            echo "</a>
";
            // line 34
            if (($context["unsubscribe"] ?? null)) {
                // line 35
                echo "<a id=\"button-unsubscribe\" class=\"";
                echo ($context["module"] ?? null);
                echo " btn btn-default\">";
                echo ($context["button_unsubscribe"] ?? null);
                echo "</a>
";
            }
            // line 37
            echo "</div>
</div>
</div>
</div>
</div>
<div class=\"popup_mask popup_close\" style=\"display: none;\"></div>

<script>
\$(document).ready(function() {

";
            // line 47
            if (($context["only_once"] ?? null)) {
                // line 48
                echo "\tif (getCookie('newsletter_already_popup') == undefined) {\t
\t\tinitNewsletter();
\t\t\$.cookie( 'newsletter_already_popup' , 1 , { expires: 14 , path: '/' });
\t}
";
            } else {
                // line 53
                echo "\tif (getCookie('newsletter_already_added') == undefined) {
\t\tinitNewsletter();
\t}
";
            }
            // line 57
            echo "
\$('.popup_close').click(function () {
\t\$('.popup_mask').hide();
\t\$('.window_holder').hide();
});\t

});

function initNewsletter() {
\tsetTimeout(function() {\t
\t\t\$('.popup_mask').fadeTo(750,0.5);\t
\t\t\$('.window_holder').show();
\t\tsetTimeout(function() { \$('.window_holder').addClass('active'); }, 750);
\t}, ";
            // line 70
            echo ($context["delay"] ?? null);
            echo ");
}
function getCookie(name) {
  var matches = document.cookie.match(new RegExp(
    \"(?:^|; )\" + name.replace(/([\\.\$?*|{}\\(\\)\\[\\]\\\\\\/\\+^])/g, '\\\\\$1') + \"=([^;]*)\"
  ));
  return matches ? decodeURIComponent(matches[1]) : undefined;
}
</script>

";
        }
        // line 81
        echo "
<script>
\$(document).ready(function() {
\t\$('.newsletter_box input[name=\\'email";
        // line 84
        echo ($context["module"] ?? null);
        echo "\\']').bind('keydown', function(e) {
\t\tif (e.keyCode == 13) {
\t\t\t\$('#button-subscribe";
        // line 86
        echo ($context["module"] ?? null);
        echo "').trigger('click');
\t\t}
\t});
\t\$('#button-subscribe.";
        // line 89
        echo ($context["module"] ?? null);
        echo "').on('click', function() {
\t\t\$.ajax({
\t\t\turl: 'index.php?route=extension/module/newsletter/subscribe',
\t\t\ttype: 'post',
\t\t\tdataType: 'json',
\t\t\tdata: 'email=' + encodeURIComponent(\$('input[id=\\'email";
        // line 94
        echo ($context["module"] ?? null);
        echo "\\']').val()),
\t\t\tsuccess: function(json) {
\t\t\t\t\$('.text-success, .text-danger').remove();
\t\t\t\tif (json['error']) {
\t\t\t\t\t\$('#respond.";
        // line 98
        echo ($context["module"] ?? null);
        echo "').after('<span class=\"text-danger\">' + json['error'] + '</span>');
\t\t\t\t}
\t\t\t\tif (json['success']) {
\t\t\t\t\t\$('#respond.";
        // line 101
        echo ($context["module"] ?? null);
        echo "').after('<span class=\"text-success\">' + '";
        echo ($context["success_message"] ?? null);
        echo "' + '</span>');
\t\t\t\t\t\$.cookie( 'newsletter_already_added' , 1 , { expires: 14 , path: '/' });
\t\t\t\t\tsetTimeout(function() { \$('.popup_close').trigger('click'); }, 1200);
\t\t\t\t\t\$('input[id=\\'email";
        // line 104
        echo ($context["module"] ?? null);
        echo "\\']').val('');
\t\t\t\t}}
\t\t});
\t});
});
</script>
<script>
\$(document).ready(function() {
\t\$('#button-unsubscribe.";
        // line 112
        echo ($context["module"] ?? null);
        echo "').on('click', function() {
\t\t\$.ajax({
\t\t\turl: 'index.php?route=extension/module/newsletter/unsubscribe',
\t\t\ttype: 'post',
\t\t\tdataType: 'json',
\t\t\tdata: 'email=' + encodeURIComponent(\$('input[id=\\'email";
        // line 117
        echo ($context["module"] ?? null);
        echo "\\']').val()),
\t\t\tsuccess: function(json) {
\t\t\t\t\$('.text-success, .text-danger').remove();
\t\t\t\tif (json['error']) {
\t\t\t\t\t\$('#respond.";
        // line 121
        echo ($context["module"] ?? null);
        echo "').after('<span class=\"text-danger\">' + json['error'] + '</span>');
\t\t\t\t}
\t\t\t\tif (json['success']) {
\t\t\t\t\t\$('#respond.";
        // line 124
        echo ($context["module"] ?? null);
        echo "').after('<span class=\"text-success\">' + json['success'] + '</span>');
\t\t\t\t\t\$.cookie( 'newsletter_already_added' , 1 , { expires: 14 , path: '/' });
\t\t\t\t\tsetTimeout(function() { \$('.popup_close').trigger('click'); }, 1200);
\t\t\t\t\t\$('input[id=\\'email";
        // line 127
        echo ($context["module"] ?? null);
        echo "\\']').val('');
\t\t\t\t}}
\t\t});
\t});
});
</script>
";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/newsletter.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  286 => 127,  280 => 124,  274 => 121,  267 => 117,  259 => 112,  248 => 104,  240 => 101,  234 => 98,  227 => 94,  219 => 89,  213 => 86,  208 => 84,  203 => 81,  189 => 70,  174 => 57,  168 => 53,  161 => 48,  159 => 47,  147 => 37,  139 => 35,  137 => 34,  131 => 33,  124 => 31,  119 => 29,  115 => 28,  112 => 27,  106 => 24,  103 => 23,  101 => 22,  93 => 21,  89 => 20,  83 => 16,  81 => 15,  75 => 13,  67 => 11,  65 => 10,  60 => 8,  54 => 7,  49 => 5,  45 => 4,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/newsletter.twig", "");
    }
}
