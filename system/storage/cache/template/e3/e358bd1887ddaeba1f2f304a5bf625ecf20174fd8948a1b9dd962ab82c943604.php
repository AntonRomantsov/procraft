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

/* default/template/common/home.twig */
class __TwigTemplate_bd910360e695e9b1371fd41a8c9ca121ef33586e28c3cddc68213e5b391e5143 extends \Twig\Template
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
        // line 16
        echo "

<!DOCTYPE html>
<html lang=\"en\">
<head>
\t<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M7JJKH9');</script>
<!-- End Google Tag Manager -->
<script async src=\"https://www.googletagmanager.com/gtag/js?id=AW-663321007\"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'UA-159129339-1');
  </script>
<meta charset=\"UTF-8\" />
<meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
<title>";
        // line 39
        echo ($context["title"] ?? null);
        echo "</title>
<base href=\"";
        // line 40
        echo ($context["base"] ?? null);
        echo "\" />
";
        // line 41
        if (($context["description"] ?? null)) {
            // line 42
            echo "<meta name=\"description\" content=\"";
            echo ($context["description"] ?? null);
            echo "\" />
";
        }
        // line 44
        if (($context["keywords"] ?? null)) {
            // line 45
            echo "<meta name=\"keywords\" content=\"";
            echo ($context["keywords"] ?? null);
            echo "\" />
";
        }
        // line 47
        echo "<link rel=\"alternate\" href=\"";
        echo ($context["uri"] ?? null);
        echo "\" hreflang=\"";
        echo ($context["hreflang"] ?? null);
        echo "\">
<link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 48
        echo ($context["favicon"] ?? null);
        echo "\">
<script src=\"/catalog/view/javascript/jquery/jquery-2.1.1.min.js\" type=\"text/javascript\"></script>
<link href=\"/catalog/view/javascript/bootstrap/css/bootstrap.min.css\" rel=\"stylesheet\" media=\"screen\" />
<script src=\"/catalog/view/javascript/bootstrap/js/bootstrap.min.js\" type=\"text/javascript\"></script>
<link href=\"/catalog/view/javascript/font-awesome/css/font-awesome.min.css\" rel=\"stylesheet\" type=\"text/css\" />
<link href=\"//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700\" rel=\"stylesheet\" type=\"text/css\" />
<link href=\"/catalog/view/theme/default/fonts/Myriad Pro/stylesheet.css\" rel=\"stylesheet\" type=\"text/css\" />
<link href=\"/catalog/view/javascript/jquery/fancybox/jquery.fancybox.min.css\" rel=\"stylesheet\">
<link href=\"https://procraft.ua/catalog/view/javascript/cart_popup/magnific-popup.css\" rel=\"stylesheet\">
<link href=\"/catalog/view/theme/default/stylesheet/cart_popup/stylesheet.css\" rel=\"stylesheet\">
<link rel=\"stylesheet\" href=\"catalog/view/theme/default/stylesheet/style/main.css\" />
<link href=\"/catalog/view/theme/default/stylesheet/stylesheet.css\" rel=\"stylesheet\">
<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\" integrity=\"sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\">
";
        // line 61
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["styles"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["style"]) {
            // line 62
            echo "<link href=\"/";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "href", [], "any", false, false, false, 62);
            echo "\" type=\"text/css\" rel=\"";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "rel", [], "any", false, false, false, 62);
            echo "\" media=\"";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "media", [], "any", false, false, false, 62);
            echo "\" />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['style'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
        echo "<link href=\"/catalog/view/theme/default/stylesheet/main.css\" rel=\"stylesheet\">
<link rel=\"stylesheet\" href=\"catalog/view/theme/default/stylesheet/style/main.css\" />
<link href=\"/catalog/view/theme/default/stylesheet/media.css\" rel=\"stylesheet\">
";
        // line 67
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["scripts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 68
            echo "<script src=\"";
            echo $context["script"];
            echo "\" type=\"text/javascript\"></script>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "<script src=\"catalog/view/javascript/cart_popup/jquery.magnific-popup.min.js\" type=\"text/javascript\"></script>
<script type=\"text/javascript\" src=\"catalog/view/javascript/cart_popup/cart_popup.js\"></script>
<script src=\"/catalog/view/javascript/common.js\" type=\"text/javascript\"></script>
";
        // line 73
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["links"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
            // line 74
            echo "<link href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["link"], "href", [], "any", false, false, false, 74);
            echo "\" rel=\"";
            echo twig_get_attribute($this->env, $this->source, $context["link"], "rel", [], "any", false, false, false, 74);
            echo "\" />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        echo "<!-- XD stickers start -->
\t\t\t\t\t";
        // line 77
        if ( !twig_test_empty(($context["xdstickers"] ?? null))) {
            // line 78
            echo "\t\t\t\t\t<style type='text/css'>
\t\t\t\t\t";
            // line 79
            echo ($context["xdstickers_inline_styles"] ?? null);
            echo "
\t\t\t\t\t";
            // line 80
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["xdstickers"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                // line 81
                echo "\t\t\t\t\t\t";
                if ((twig_get_attribute($this->env, $this->source, $context["xdsticker"], "status", [], "any", false, false, false, 81) == "1")) {
                    // line 82
                    echo "\t\t\t\t\t\t\t.";
                    echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "id", [], "any", false, false, false, 82);
                    echo " {
\t\t\t\t\t\t\t\tbackground-color:";
                    // line 83
                    echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "bg", [], "any", false, false, false, 83);
                    echo ";
\t\t\t\t\t\t\t\tcolor:";
                    // line 84
                    echo twig_get_attribute($this->env, $this->source, $context["xdsticker"], "color", [], "any", false, false, false, 84);
                    echo ";
\t\t\t\t\t\t\t}
\t\t\t\t\t\t";
                }
                // line 87
                echo "\t\t\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 88
            echo "\t\t\t\t\t</style>
\t\t\t\t\t";
        }
        // line 90
        echo "\t\t\t\t\t<!-- XD stickers end -->
";
        // line 91
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["analytics"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["analytic"]) {
            // line 92
            echo $context["analytic"];
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['analytic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 94
        echo "</head>
  <body id=\"body\">
  <header class=\"header\">
  <div class=\"header-top mobile-none\">
\t\t<div class=\"container\">
\t\t\t<div class=\"header-top__flex\">
\t\t\t\t<button type=\"button\" class=\"btn btn-primary open_mob_menu visible-sm visible-xs\" data-toggle=\"modal\" data-target=\"#modal-mob-menu\">
\t\t\t\t\t<i class=\"fa fa-bars\"></i>
\t\t\t\t</button>
\t\t\t\t<div class=\"header-top__logo logo\">
\t\t\t\t\t";
        // line 104
        if (($context["logo"] ?? null)) {
            echo "<a href=\"";
            echo ($context["home"] ?? null);
            echo "\"><img src=\"";
            echo ($context["logo"] ?? null);
            echo "\" title=\"";
            echo ($context["name"] ?? null);
            echo "\" alt=\"";
            echo ($context["name"] ?? null);
            echo "\" class=\"img-responsive\" /></a>";
        } else {
            // line 105
            echo "                      <a href=\"";
            echo ($context["home"] ?? null);
            echo "\">";
            echo ($context["name"] ?? null);
            echo "</a>
                   ";
        }
        // line 107
        echo "\t\t\t\t</div>
\t\t\t\t<nav class=\"header-top__nav nav-top\">
\t\t\t\t\t<ul class=\"nav-top__list list-unstyled\">
\t\t\t\t\t\t<li class=\"nav-top__item\">
\t\t\t\t\t\t\t<a href=\"";
        // line 111
        echo ($context["link_special"] ?? null);
        echo "\" class=\"nav-top__link\">";
        echo ($context["text_special"] ?? null);
        echo "</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"nav-top__item\">
\t\t\t\t\t\t\t<a href=\"";
        // line 114
        echo ($context["link_news"] ?? null);
        echo "\" class=\"nav-top__link\">";
        echo ($context["text_news"] ?? null);
        echo "</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"nav-top__item\">
\t\t\t\t\t\t\t<a href=\"";
        // line 117
        echo ($context["link_bestseller"] ?? null);
        echo "\" class=\"nav-top__link\">";
        echo ($context["text_bestseller"] ?? null);
        echo "</a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"nav-top__item dropdown\">
\t\t\t\t\t\t\t<a href=\"#\" class=\"nav-top__link\" data-toggle=\"dropdown\">";
        // line 120
        echo ($context["text_buyer"] ?? null);
        echo " <i class=\"fa fa-angle-down\"></i></a>
\t\t\t\t\t\t\t<ul class=\"nav-top__dropdown dropdown-menu list-unstyled\">
\t\t\t\t\t\t\t\t<!-- <li><a href=\"";
        // line 122
        echo ($context["link_register"] ?? null);
        echo "\">";
        echo ($context["text_register_instr"] ?? null);
        echo "</a></li> -->
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 123
        echo ($context["link_store"] ?? null);
        echo "\">";
        echo ($context["text_store"] ?? null);
        echo "</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 124
        echo ($context["link_services"] ?? null);
        echo "\">";
        echo ($context["text_services"] ?? null);
        echo "</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 125
        echo ($context["link_delivery"] ?? null);
        echo "\">";
        echo ($context["text_delivery"] ?? null);
        echo "</a></li>
\t\t\t\t\t\t\t\t<li><a href=\"";
        // line 126
        echo ($context["link_black_list"] ?? null);
        echo "\">";
        echo ($context["text_black_list"] ?? null);
        echo "</a></li>
\t\t\t\t\t\t\t\t<!-- <li><a href=\"";
        // line 127
        echo ($context["link_partner"] ?? null);
        echo "\">";
        echo ($context["text_partner"] ?? null);
        echo "</a></li>-->
\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t";
        // line 136
        echo "\t\t\t\t\t</ul>
\t\t\t\t</nav>
\t\t\t\t<div class=\"header-top__phone\"><a class=\"binct-phone-number-1\" href=\"tel:";
        // line 138
        echo ($context["telephone"] ?? null);
        echo "\">";
        echo ($context["telephone"] ?? null);
        echo "</a>
\t\t\t\t<i class=\"fa fa-angle-down\" style=\"color: white;\" id=\"modal-header-open\"></i>
        <div id=\"contact-info-header\" class=\"tb_wt tb_wt_block_group hover-block-show tbMobileShow display-block tb_equal_columns hoveredshow\" style=\"display:none;\"><div class=\"row tb_gut_xs_0 tb_gut_sm_0 tb_gut_md_0 tb_gut_lg_0\">
<div class=\"col col-xs-12 col-sm-2 col-md-12 col-lg-12 col-align-center col-valign-top\">
<div id=\"Html_MBFt06W6\" class=\"tb_wt tb_wt_html tbMobileShow hover-block-show display-block hoveredshow\"><div class=\"panel-body tb_text_wrap\">
<div id=\"number-phone\">
<ul class=\"more-info-text\"><li class=\"item-phone\"><a class=\"binct-phone-number-1\" href=\"javascript:void(0);\" data-binct-original=\"2\"><span>0</span><span style=\"opacity: 0.6; margin-left: 3px;\">8</span><span style=\"opacity: 0.5;\">0</span><span style=\"opacity: 0.4;\">0</span><span style=\"margin-left: 5px;\"><u>";
        // line 144
        echo ($context["text_show"] ?? null);
        echo " </u></span></a></li>
<li class=\"cool\">";
        // line 145
        echo ($context["text_call_receiving"] ?? null);
        echo ":</li>
<li>";
        // line 146
        echo ($context["text_schedule1"] ?? null);
        echo "</li>
<li>";
        // line 147
        echo ($context["text_schedule2"] ?? null);
        echo "</li>
</ul></div> </div>
</div> </div>
<div class=\"col col-xs-12 col-sm-2 col-md-12 col-lg-12 col-align-center col-valign-top\">
<div id=\"OpenCart_VQeh6bJ0\" class=\"tb_wt tb_wt_open_cart tbMobileShow header-form hover-block-show display-block tb_module_jform hoveredshow\"><div class=\"jform-wrap row tb_gut_xs_0\">
<div class=\"col  col-xs-12 tbMobileShow\">
<div class=\"form-title\">
<span></span>
</div>
<!-- <div data-success=\"Чекайте зв язку з менеджером.\" id=\"jfrom-1\"> -->
<form method=\"post\" enctype=\"multipart/form-data\" class=\"form-horizontal\">
<input type=\"hidden\" name=\"jform_id\" value=\"7\">
<input type=\"hidden\" name=\"current_url\" value=\"";
        // line 159
        echo ($context["uri"] ?? null);
        echo "\">
<div class=\"row tb_gut_xs_0\">
<div class=\"col col-xs-12 input-effect tbMobileShow\">
<div class=\"form-group\">
<input type=\"text\" class=\"effect-17 form-control\" name=\"field855\" id=\"field-855\" placeholder=\"Ваш телефон*\" required>
<label class=\"control-label\" for=\"field-855\"> </label>
</div>
</div>
</div>
<div class=\"row tb_gut_xs_0\">
<div class=\"col col-xs-12 tbMobileShow\">
<div class=\"button-wrap\">
<a class=\"btn btn-primary\" id=\"jfrom-submit-1\" onclick=\"sendCallback();\">";
        // line 171
        echo ($context["text_callback"] ?? null);
        echo "</a>
</div>
</div>
</div>
</form>
</div>
</div>
</div>
<script type=\"text/javascript\">function formsubmit(id){\$.ajax({url:'index.php?route=module/jform/formsubmit',type:'post',data:new FormData(\$('#jfrom-'+id+' form')[0]),dataType:'json',cache:false,contentType:false,processData:false,complete:function(){\$('#jfrom-submit-'+id).button('reset');},success:function(json){\$('#jfrom-'+id).find('.alert, .text-danger').remove();\$('#jfrom-'+id).find(\"input[type=text], textarea\").val(\"\");\$('#jfrom-'+id).find(\"input[type=checkbox]\").attr(\"checked\",false);go(\$('#jfrom-'+id).attr('data-success'),50);if(\$('#jfrom-'+id).parents('.popap-form').length||\$('#jfrom-'+id).parents('.mfp-content').length){\$('.close, .mfp-close').trigger('click');}},error:function(xhr,ajaxOptions,thrownError){alert(thrownError+\"\\r\\n\"+xhr.statusText+\"\\r\\n\"+xhr.responseText);}});}function validate(id){\$.ajax({url:'index.php?route=module/jform/validate',type:'post',data:new FormData(\$('#jfrom-'+id+' form')[0]),dataType:'json',cache:false,contentType:false,processData:false,success:function(json){\$('.alert, .text-danger').remove();if(json['error']||json['field_id']){\$('#field-'+json['field_id']).before('<div class=\"text-danger\">'+json['error']+'</div>');}else if(json['error_captcha']){\$('#input-captcha-'+id).after('<div class=\"text-danger\">Error: '+json['error_captcha']+'</div>');}else{formsubmit(id);}},error:function(xhr,ajaxOptions,thrownError){alert(thrownError+\"\\r\\n\"+xhr.statusText+\"\\r\\n\"+xhr.responseText);}});}</script>
<script type=\"text/javascript\">\$('button[id^=\\'button-upload\\']').on('click',function(){var node=this;id=\$('input[name=\\'jform_id\\']').val();\$('#form-upload-1').remove();\$('body').prepend('<form enctype=\"multipart/form-data\" id=\"form-upload-1\" style=\"display: none;\"><input type=\"file\" name=\"file\" /></form>');\$('#form-upload-1 input[name=\\'file\\']').trigger('click');if(typeof timer!='undefined'){clearInterval(timer);}timer=setInterval(function(){if(\$('#form-upload-1 input[name=\\'file\\']').val()!=''){clearInterval(timer);\$.ajax({url:'index.php?route=module/jform/upload&jform_id='+id,type:'post',dataType:'json',data:new FormData(\$('#form-upload-1')[0]),cache:false,contentType:false,processData:false,beforeSend:function(){\$(node).button('loading');},complete:function(){\$(node).button('reset');},success:function(json){\$('.text-danger').remove();if(json['error']){\$(node).parent().find('input').after('<div class=\"text-danger\">'+json['error']+'</div>');}if(json['success']){alert(json['success']);\$(node).parent().find('input').attr('value',json['code']);}},error:function(xhr,ajaxOptions,thrownError){alert(thrownError+\"\\r\\n\"+xhr.statusText+\"\\r\\n\"+xhr.responseText);}});}},500);});</script></div> </div>

\t\t\t</div></div>
\t\t\t<div>
\t\t\t\t<div class=\"header-top__lang\">";
        // line 184
        echo ($context["language"] ?? null);
        echo "</div>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
    <div class=\"header-second\">
      <div class=\"header__container\">
        <div class=\"header__wrapper\">
          <div class=\"header__main-menu\">
            <a href=\"";
        // line 193
        echo ($context["catalog"] ?? null);
        echo "\" type=\"button\" class=\"main-menu__button\">
              <span class=\"main-menu__button-deco\">
                <svg><use href=\"catalog/view/theme/default/image/icons.svg#catalog\"></use></svg>
              </span>
              Каталог товарів
            </a>
            <button class=\"header__burger-button\">
              <a id=\"burger\" class=\"header__burger\">
                <div></div>
              </a>
            </button>
          </div>

          <div class=\"header__search\">
            <div id=\"search\" class=\"header__search-wrapper\">
              <input class=\"header__search-input\" type=\"text\" name=\"search\" value=\"\" placeholder=\"Шукати\" autocomplete=\"off\" />
              <span class=\"header__search-icon\">
                <svg><use href=\"catalog/view/theme/default/image/icons.svg#search\"></use></svg>
              </span>
            </div>
          </div>

          <div class=\"header__actions-row\">
            <div class=\"header-actions__item header-actions__cart\">
              ";
        // line 217
        echo ($context["cart"] ?? null);
        echo "
            </div>
            <div class=\"header-actions__item header-actions__wishlist header-wishlist\">
\t\t\t\t\t\t  <a href=\"";
        // line 220
        echo ($context["wishlist"] ?? null);
        echo "\" id=\"wishlist-total\" class=\"header-wishlist__link header-actions__link\">
\t\t\t\t\t\t\t  <svg class=\"svg-icon\"><use xlink:href=\"/image/sprite.svg#heart\"></use></svg>
\t\t\t\t\t\t\t  <span>";
        // line 222
        echo ($context["text_wishlist"] ?? null);
        echo "</span>
\t\t\t\t\t\t  </a>
\t\t\t\t\t  </div>
            <div class=\"header-actions__item header-actions__user header-user\">
\t\t\t\t\t\t";
        // line 226
        if (($context["logged"] ?? null)) {
            // line 227
            echo "\t\t\t\t\t\t\t<a href=\"";
            echo ($context["account"] ?? null);
            echo "\"  class=\"header-user__link\"><svg class=\"svg-icon\"><use xlink:href=\"/image/sprite.svg#user\"></use></svg><!-- ";
            echo ($context["login_name"] ?? null);
            echo " <span>(";
            echo ($context["customer_percent"] ?? null);
            echo "%)</span>--></a>
\t\t\t\t\t\t";
        } else {
            // line 229
            echo "\t\t\t\t\t\t\t<a data-fancybox data-touch=\"false\" href=\"#user-login\" class=\"header-user__link\"><svg class=\"svg-icon\"><use xlink:href=\"/image/sprite.svg#user\"></use></svg></a>
\t\t\t\t\t\t";
        }
        // line 231
        echo "            <div class=\"fancybox-hidden profile_login active\" style=\"display: none;\"  id=\"user-login\">
\t\t\t\t\t\t<div class=\"profile_login__content\">
\t\t\t\t\t\t  ";
        // line 236
        echo "\t\t\t\t\t\t  <h2 class=\"profile_login__title\">";
        echo ($context["text_login"] ?? null);
        echo "</h2>
              <div class=\"alert alert-danger alert-dismissible\" style=\"display: none;\"><i class=\"fa fa-exclamation-circle\"></i></div>
\t\t\t\t\t\t  <div class=\"profile_login__body\">
\t\t\t\t\t\t  <form action=\"";
        // line 239
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"login-form\">
\t\t\t\t\t\t\t  <div class=\"profile_login__wrapper\">
\t\t\t\t\t\t\t\t<label class=\"profile_login__label\" for=\"profileLogin\">E-MAIL</label>
\t\t\t\t\t\t\t\t<input class=\"input--profile_mod\" id=\"profileLogin\" type=\"email\" placeholder=\"Логін\" name=\"email\" required />
\t\t\t\t\t\t\t  </div>
\t\t\t\t\t\t\t  <div class=\"profile_login__wrapper\">
\t\t\t\t\t\t\t\t<div class=\"profile_login__row\">
\t\t\t\t\t\t\t\t  <label class=\"profile_login__label\" for=\"passwordLogin\">Пароль</label>
\t\t\t\t\t\t\t\t  <a data-fancybox data-touch=\"false\" href=\"#forgotten-password\" class=\"profile_login__forgot\">";
        // line 247
        echo ($context["text_forgotten"] ?? null);
        echo "</a>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t<input class=\"input--profile_mod\" id=\"passwordLogin\" type=\"password\" placeholder=\"Пароль\" name=\"password\" required />
\t\t\t\t\t\t\t  </div>
\t\t\t\t\t\t\t  <button class=\"button profile_login__button\" type=\"button\">
\t\t\t\t\t\t\t\t<p>";
        // line 252
        echo ($context["text_sing_in"] ?? null);
        echo "</p>
\t\t\t\t\t\t\t  </button>
\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t<div class=\"profile_login__or\">
\t\t\t\t\t\t\t  <span class=\"profile_login__or_deco\"></span>
\t\t\t\t\t\t\t  <span class=\"profile_login__or_text\">";
        // line 257
        echo ($context["text_or"] ?? null);
        echo "</span>
\t\t\t\t\t\t\t  <span class=\"profile_login__or_deco\"></span>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"profile_login__buttons\">
\t\t\t\t\t\t\t  <button class=\"button profile_login__button_bottom\">
\t\t\t\t\t\t\t\t<img src=\"image/profile/facebook.svg\" alt=\"\" />
\t\t\t\t\t\t\t\t<p>Facebook</p>
\t\t\t\t\t\t\t  </button>
\t\t\t\t\t\t\t  <button class=\"button profile_login__button_bottom\">
\t\t\t\t\t\t\t\t<img src=\"image/profile/google.svg\" alt=\"\" />
\t\t\t\t\t\t\t\t<p>Google</p>
\t\t\t\t\t\t\t  </button>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t  </div>
\t\t\t\t\t\t  <div class=\"profile_login__footer\">
\t\t\t\t\t\t\t<p>";
        // line 272
        echo ($context["text_yet_guest"] ?? null);
        echo "</p>
\t\t\t\t\t\t\t<a class=\"profile_login__footer_register\" href=\"";
        // line 273
        echo ($context["register"] ?? null);
        echo "\">";
        echo ($context["text_register"] ?? null);
        echo "</a>
\t\t\t\t\t\t  </div>
\t\t\t\t\t    </div>
\t\t\t\t\t    </div>
\t\t\t\t\t\t<div class=\"profile_login active\" id=\"forgotten-password\" style=\"display: none;\">
                            <div class=\"profile_login__content\">
          \t\t\t\t\t\t";
        // line 282
        echo "          \t\t\t\t\t\t<h2 class=\"profile_login__title profile_login__title--resset_mod\">";
        echo ($context["text_forgotten"] ?? null);
        echo "</h2>
          \t\t\t\t\t\t<p class=\"profile_login__description\">
            \t\t\t\t\t\t";
        // line 284
        echo ($context["text_password_instruction"] ?? null);
        echo "
          \t\t\t\t\t\t</p>
          \t\t\t\t\t\t<div class=\"profile_login__body\">
           \t\t\t\t\t\t<form action=\"";
        // line 287
        echo ($context["action_forgotten"] ?? null);
        echo "\" method=\"post\">
              \t\t\t\t\t\t<div class=\"profile_login__wrapper\">
                \t\t\t\t\t\t<label class=\"profile_login__label\" for=\"resetLogin\">E-MAIL</label>
                \t\t\t\t\t\t<input class=\"input--profile_mod\" id=\"resetLogin\" type=\"email\" name=\"email\" placeholder=\"Логін\" required />
              \t\t\t\t\t\t</div>
              \t\t\t\t\t\t<div class=\"profile_login__button_row\">
                \t\t\t\t\t\t<button class=\"button profile_login__button profile_login__button--pink_mod\" type=\"submit\">
                  \t\t\t\t\t\t<p>";
        // line 294
        echo ($context["button_back"] ?? null);
        echo "</p>
                \t\t\t\t\t\t</button>
                \t\t\t\t\t\t<button class=\"button profile_login__button\" type=\"submit\">
                  \t\t\t\t\t\t<p>";
        // line 297
        echo ($context["button_continue"] ?? null);
        echo "</p>
                \t\t\t\t\t\t</button>
              \t\t\t\t\t\t</div>
            \t\t\t\t\t</form>
          \t\t\t\t\t</div>
        \t\t\t\t    </div>
\t\t\t\t\t\t";
        // line 329
        echo "\t\t\t\t\t</div>
          </div>

          <nav id=\"mainMenu\" class=\"main-menu mob-menu\">
            <div class=\"main-menu__drop\">
              <div class=\"main-menu__row\">
                <a href=\"#\" class=\"main-menu__row-logo\">
                  <img src=\"catalog/view/theme/default/image//header/logo.svg\" alt=\"Logo\" />
                </a>
                <div class=\"main-menu__row-languages\">
                  <button class=\"main-menu__row-button main-menu__row-button--active main-menu__row-ua\">УКР</button>
                  <span>|</span>
                  <button class=\"main-menu__row-button main-menu__row-ru\">РУС</button>
                </div>
              </div>
              <button type=\"button\" class=\"main-menu__button-drop\">
                <span class=\"main-menu__button-drop-deco\">
                  <svg><use href=\"catalog/view/theme/default/image/icons.svg#fire\"></use></svg>
                </span>
                Каталог товарів
              </button>

              <button id=\"closeButton\" class=\"main-menu__button-close\">
                <span class=\"main-menu__button-close_icon\">
                  <svg><use href=\"catalog/view/theme/default/image/icons.svg#close\"></use></svg>
                </span>
              </button>
              <ul class=\"main-menu__list\">
              ";
        // line 357
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 358
            echo "              ";
            if (twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 358)) {
                // line 359
                echo "                <li class=\"main-menu__list-item2\">
                  <a href=\"";
                // line 360
                echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 360);
                echo "\" class=\"main-menu__link\">
                    <svg class=\"main-menu__link-icon\"><use href=\"/image/sprite-category.svg#";
                // line 361
                echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 361);
                echo "\"></use></svg>
                    ";
                // line 362
                echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 362);
                echo "
                  </a>
                  <div class=\"main-nav__dropdown main-nav-dropdown\">
                    <div class=\"main-nav-dropdown__wrapper\">
                      <ul class=\"main-nav-dropdown__list\">
                        ";
                // line 367
                if ((twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 367) == 73)) {
                    // line 368
                    echo "\t\t\t\t\t\t\t          <li class=\"main-nav-dropdown__item\">
                          <a class=\"main-nav-dropdown__link\" href=\"";
                    // line 369
                    echo ($context["href_acum"] ?? null);
                    echo "\">
                            <img src=\"/image/acum.jpg\" alt=\"\" style=\"width: 70px; height: 70px;\">
                            <p>";
                    // line 371
                    echo ($context["text_acum"] ?? null);
                    echo "</p>
                          </a>
                        </li>
\t\t\t\t\t\t\t          ";
                }
                // line 375
                echo "                        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 375));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    // line 376
                    echo "                        <li class=\"main-nav-dropdown__item\">
                          <a class=\"main-nav-dropdown__link\" href=\"";
                    // line 377
                    echo twig_get_attribute($this->env, $this->source, $context["child"], "href", [], "any", false, false, false, 377);
                    echo "\">
                            <img src=\"";
                    // line 378
                    echo twig_get_attribute($this->env, $this->source, $context["child"], "image", [], "any", false, false, false, 378);
                    echo "\" alt=\"Product\" />
                            <p>";
                    // line 379
                    echo twig_get_attribute($this->env, $this->source, $context["child"], "name", [], "any", false, false, false, 379);
                    echo "</p>
                          </a>
                        </li>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 383
                echo "                      </ul>
                    </div>
                  </div>
                </li>
                ";
            } else {
                // line 388
                echo "\t\t\t          <li class=\"main-menu__list-item2\"><a class=\"main-menu__link\" href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 388);
                echo "\"><svg class=\"main-menu__link-icon\">
\t\t\t\t\t\t      <use xlink:href=\"/image/sprite-category.svg#";
                // line 389
                echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 389);
                echo "\"></use>
\t\t\t\t\t      </svg>";
                // line 390
                echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 390);
                echo "</a></li>
              ";
            }
            // line 392
            echo "              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 393
        echo "              </ul>

              <ul class=\"main-menu__list--secondary desctop-none\">
                <li class=\"main-menu__list-item2\">
                  <a href=\"";
        // line 397
        echo ($context["link_special"] ?? null);
        echo "\" class=\"main-menu__link\">
                    <svg class=\"main-menu__link-icon\"><use href=\"catalog/view/theme/default/image/icons.svg#promotion\"></use></svg>
                    ";
        // line 399
        echo ($context["text_special"] ?? null);
        echo "
                  </a>
                </li>
                <li class=\"main-menu__list-item2\">
                  <a href=\"";
        // line 403
        echo ($context["link_bestseller"] ?? null);
        echo "\" class=\"main-menu__link\">
                    <svg class=\"main-menu__link-icon\"><use href=\"catalog/view/theme/default/image/icons.svg#bestseller\"></use></svg>
                    ";
        // line 405
        echo ($context["text_bestseller"] ?? null);
        echo "
                  </a>
                </li>
                <li class=\"main-menu__list-item2\">
                  <a href=\"";
        // line 409
        echo ($context["link_news"] ?? null);
        echo "\" class=\"main-menu__link\">
                  <svg class=\"main-menu__link-icon\" width=\"22\" height=\"21\" viewBox=\"0 0 22 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                  <path d=\"M8.74712 1.2573C9.47552 0.528902 10.5044 0.185956 11.5241 0.331635L17.3738 1.1673C18.8138 1.37301 19.9451 2.50438 20.1508 3.94431L20.9865 9.79404C21.1322 10.8138 20.7892 11.8427 20.0608 12.5711L12.0255 20.6063C11.635 20.9969 11.0019 20.9969 10.6113 20.6063L0.711843 10.7069C0.321313 10.3163 0.321313 9.68317 0.711843 9.29257L8.74712 1.2573ZM12.7327 8.58547C13.5137 9.36657 14.78 9.36657 15.5611 8.58547C16.3421 7.80445 16.3421 6.53812 15.5611 5.75707C14.78 4.97603 13.5137 4.97603 12.7327 5.75707C11.9516 6.53812 11.9516 7.80445 12.7327 8.58547Z\" fill=\"#ed6e00\"/>
                  </svg>
                    ";
        // line 413
        echo ($context["text_news"] ?? null);
        echo "
                  </a>
                </li>
                <li class=\"main-menu__list-item2\">
                  <a href=\"javascript:void(0)\" class=\"main-menu__link buyer-link\" onclick=\"openSubMenu();\">
                  <svg class=\"main-menu__link-icon\" width=\"21\" height=\"21\" viewBox=\"0 0 21 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                  <path d=\"M0.833496 20.1666C0.833496 16.1165 4.11674 12.8333 8.16683 12.8333C12.2169 12.8333 15.5002 16.1165 15.5002 20.1666H0.833496ZM8.16683 11.9166C5.12808 11.9166 2.66683 9.45538 2.66683 6.41663C2.66683 3.37788 5.12808 0.916626 8.16683 0.916626C11.2056 0.916626 13.6668 3.37788 13.6668 6.41663C13.6668 9.45538 11.2056 11.9166 8.16683 11.9166ZM14.9161 13.9637C17.7443 14.6865 19.8707 17.1632 20.0685 20.1666H17.3335C17.3335 17.7743 16.417 15.596 14.9161 13.9637ZM13.0619 11.8771C14.5586 10.5345 15.5002 8.58552 15.5002 6.41663C15.5002 5.1174 15.1623 3.89709 14.5697 2.83876C16.6692 3.25777 18.2502 5.11006 18.2502 7.33329C18.2502 9.86558 16.1991 11.9166 13.6668 11.9166C13.4618 11.9166 13.2598 11.9032 13.0619 11.8771Z\" fill=\"#ed6e00\"/>
                  </svg>
                    ";
        // line 421
        echo ($context["text_buyer"] ?? null);
        echo "
                  </a>
                  <div class=\"main-nav--secondary__dropdown secondary-menu__dropdown\">
                    <div class=\"secondary-menu__wrapper\">
                      <ul class=\"secondary-menu__list-list\">
                        <li class=\"secondary-menu__item\">
                          <a class=\"secondary-menu__link\" href=\"";
        // line 427
        echo ($context["link_store"] ?? null);
        echo "\">";
        echo ($context["text_store"] ?? null);
        echo "</a>
                        </li>
                        <li class=\"secondary-menu__item\">
                          <a class=\"secondary-menu__link\" href=\"";
        // line 430
        echo ($context["link_services"] ?? null);
        echo "\">";
        echo ($context["text_services"] ?? null);
        echo "</a>
                        </li>
                        <li class=\"secondary-menu__item\">
                          <a class=\"secondary-menu__link\" href=\"";
        // line 433
        echo ($context["link_delivery"] ?? null);
        echo "\">";
        echo ($context["text_delivery"] ?? null);
        echo "</a>
                        </li>
                        <li class=\"secondary-menu__item\">
                          <a class=\"secondary-menu__link\" href=\"";
        // line 436
        echo ($context["link_black_list"] ?? null);
        echo "\">";
        echo ($context["text_black_list"] ?? null);
        echo "</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
              <ul class=\"main-nav__contact\">
                <li class=\"main-menu__list-item2 main-nav__contact-item\">
                  <a class=\"main-menu__link\" href=\"callto:+380800333900\" class=\"main-menu__link main-nav__contact-link\">
                  <svg class=\"main-menu__link-icon\" width=\"18\" height=\"18\" viewBox=\"0 0 18 18\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                  <path d=\"M18 13.42V16.9561C18 17.4811 17.5941 17.9167 17.0705 17.9537C16.6331 17.9846 16.2763 18 16 18C7.1634 18 0 10.8366 0 2C0 1.72371 0.01545 1.36687 0.04635 0.9295C0.08337 0.40588 0.51894 0 1.04386 0H4.5801C4.83678 0 5.05176 0.19442 5.07753 0.4498C5.10067 0.67907 5.12218 0.86314 5.14207 1.00202C5.34435 2.41472 5.75753 3.75936 6.3487 5.00303C6.44359 5.20265 6.38171 5.44159 6.20185 5.57006L4.04355 7.1118C5.35752 10.1811 7.8189 12.6425 10.8882 13.9565L12.4271 11.8019C12.5572 11.6199 12.799 11.5573 13.001 11.6532C14.2446 12.2439 15.5891 12.6566 17.0016 12.8584C17.1396 12.8782 17.3225 12.8995 17.5502 12.9225C17.8056 12.9483 18 13.1633 18 13.42Z\" fill=\"#ed6e00\"/>
                  </svg>
                    0 800 333 900
                  </a>
                </li>
                <li class=\"main-menu__list-item2 main-nav__contact-item\">
                  <a href=\"mailto:info@procraft.ua\" class=\"main-menu__link main-nav__contact-link\">
                  <svg class=\"main-menu__link-icon\" width=\"20\" height=\"18\" viewBox=\"0 0 20 18\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                  <path d=\"M1 0H19C19.5523 0 20 0.44772 20 1V17C20 17.5523 19.5523 18 19 18H1C0.44772 18 0 17.5523 0 17V1C0 0.44772 0.44772 0 1 0ZM10.0606 8.6829L3.64722 3.2377L2.35278 4.7623L10.0731 11.3171L17.6544 4.75616L16.3456 3.24384L10.0606 8.6829Z\" fill=\"#ed6e00\"/>
                  </svg>
                    info@procraft.ua
                  </a>
                </li>
              </ul>
              
            </div>
            <div class=\"main-menu__drop\">
            <ul class=\"main-menu-gift\">
              <li class=\"main-menu__list-item2 main-nav__contact-item\">
                <a href=\"";
        // line 466
        echo ($context["link_special"] ?? null);
        echo "\" class=\"main-menu__link main-nav__contact-link\">
                  <svg class=\"main-menu__link-icon\"><use href=\"catalog/view/theme/default/image/icons.svg#promotion\"></use></svg>
                  ";
        // line 468
        echo ($context["text_special"] ?? null);
        echo "
                </a>
              </li>
            </ul>
            </div>
          </nav> 
        </div>
      </div>
    </div>
  </header>

    <main class=\"main\" id=\"main\">
      <section class=\"hero\">
        <div class=\"hero__container\">
          <div class=\"hero__wrapper\">
            <aside class=\"hero__sidebar\">
            <nav id=\"mainMenu\" class=\"main-menu\">
            <div class=\"main-menu__drop\">
              <div class=\"main-menu__row\">
                <a href=\"#\" class=\"main-menu__row-logo\">
                  <img src=\"catalog/view/theme/default/image//header/logo.svg\" alt=\"Logo\" />
                </a>
                <div class=\"main-menu__row-languages\">
                  <button class=\"main-menu__row-button main-menu__row-button--active main-menu__row-ua\">УКР</button>
                  <span>|</span>
                  <button class=\"main-menu__row-button main-menu__row-ru\">РУС</button>
                </div>
              </div>
              <button type=\"button\" class=\"main-menu__button-drop\">
                <span class=\"main-menu__button-drop-deco\">
                  <svg><use href=\"catalog/view/theme/default/image/icons.svg#fire\"></use></svg>
                </span>
                Каталог товарів
              </button>

              <button id=\"closeButton\" class=\"main-menu__button-close\">
                <span class=\"main-menu__button-close_icon\">
                  <svg><use href=\"catalog/view/theme/default/image/icons.svg#close\"></use></svg>
                </span>
              </button>
              <ul class=\"main-menu__list\">
              ";
        // line 509
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 510
            echo "              ";
            if (twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 510)) {
                // line 511
                echo "                <li class=\"main-menu__list-item\">
                  <a href=\"";
                // line 512
                echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 512);
                echo "\" class=\"main-menu__link\">
                    <svg class=\"main-menu__link-icon\"><use href=\"/image/sprite-category.svg#";
                // line 513
                echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 513);
                echo "\"></use></svg>
                    ";
                // line 514
                echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 514);
                echo "
                  </a>
                  <div class=\"main-nav__dropdown main-nav-dropdown\">
                    <div class=\"main-nav-dropdown__wrapper\">
                      <ul class=\"main-nav-dropdown__list\">
                        ";
                // line 519
                if ((twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 519) == 73)) {
                    // line 520
                    echo "\t\t\t\t\t\t\t          <li class=\"main-nav-dropdown__item\">
                          <a class=\"main-nav-dropdown__link\" href=\"";
                    // line 521
                    echo ($context["href_acum"] ?? null);
                    echo "\">
                            <img src=\"/image/acum.jpg\" alt=\"\" style=\"width: 70px; height: 70px;\">
                            <p>";
                    // line 523
                    echo ($context["text_acum"] ?? null);
                    echo "</p>
                          </a>
                        </li>
\t\t\t\t\t\t\t          ";
                }
                // line 527
                echo "                        ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 527));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    // line 528
                    echo "                        <li class=\"main-nav-dropdown__item\">
                          <a class=\"main-nav-dropdown__link\" href=\"";
                    // line 529
                    echo twig_get_attribute($this->env, $this->source, $context["child"], "href", [], "any", false, false, false, 529);
                    echo "\">
                            <img src=\"";
                    // line 530
                    echo twig_get_attribute($this->env, $this->source, $context["child"], "image", [], "any", false, false, false, 530);
                    echo "\" alt=\"Product\" />
                            <p>";
                    // line 531
                    echo twig_get_attribute($this->env, $this->source, $context["child"], "name", [], "any", false, false, false, 531);
                    echo "</p>
                          </a>
                        </li>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 535
                echo "                      </ul>
                    </div>
                  </div>
                </li>
                ";
            } else {
                // line 540
                echo "\t\t\t          <li class=\"main-menu__list-item\"><a class=\"main-menu__link\" href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 540);
                echo "\"><svg class=\"main-menu__link-icon\">
\t\t\t\t\t\t      <use xlink:href=\"/image/sprite-category.svg#";
                // line 541
                echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 541);
                echo "\"></use>
\t\t\t\t\t      </svg>";
                // line 542
                echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 542);
                echo "</a></li>
              ";
            }
            // line 544
            echo "              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 545
        echo "              </ul>

              <ul class=\"main-menu__list--secondary desctop-none\">
                <li class=\"main-menu__list-item\">
                  <a href=\"";
        // line 549
        echo ($context["link_special"] ?? null);
        echo "\" class=\"main-menu__link\">
                    <svg class=\"main-menu__link-icon\"><use href=\"catalog/view/theme/default/image/icons.svg#promotion\"></use></svg>
                    ";
        // line 551
        echo ($context["text_special"] ?? null);
        echo "
                  </a>
                </li>
                <li class=\"main-menu__list-item\">
                  <a href=\"";
        // line 555
        echo ($context["link_bestseller"] ?? null);
        echo "\" class=\"main-menu__link\">
                    <svg class=\"main-menu__link-icon\"><use href=\"catalog/view/theme/default/image/icons.svg#bestseller\"></use></svg>
                    ";
        // line 557
        echo ($context["text_bestseller"] ?? null);
        echo "
                  </a>
                </li>
                <li class=\"main-menu__list-item\">
                  <a href=\"";
        // line 561
        echo ($context["link_news"] ?? null);
        echo "\" class=\"main-menu__link\">
                  <svg class=\"main-menu__link-icon\" width=\"22\" height=\"21\" viewBox=\"0 0 22 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                  <path d=\"M8.74712 1.2573C9.47552 0.528902 10.5044 0.185956 11.5241 0.331635L17.3738 1.1673C18.8138 1.37301 19.9451 2.50438 20.1508 3.94431L20.9865 9.79404C21.1322 10.8138 20.7892 11.8427 20.0608 12.5711L12.0255 20.6063C11.635 20.9969 11.0019 20.9969 10.6113 20.6063L0.711843 10.7069C0.321313 10.3163 0.321313 9.68317 0.711843 9.29257L8.74712 1.2573ZM12.7327 8.58547C13.5137 9.36657 14.78 9.36657 15.5611 8.58547C16.3421 7.80445 16.3421 6.53812 15.5611 5.75707C14.78 4.97603 13.5137 4.97603 12.7327 5.75707C11.9516 6.53812 11.9516 7.80445 12.7327 8.58547Z\" fill=\"#ed6e00\"/>
                  </svg>
                    ";
        // line 565
        echo ($context["text_news"] ?? null);
        echo "
                  </a>
                </li>
                <li class=\"main-menu__list-item\">
                  <a href=\"javascript:void(0)\" class=\"main-menu__link buyer-link\" onclick=\"openSubMenu();\">
                  <svg class=\"main-menu__link-icon\" width=\"21\" height=\"21\" viewBox=\"0 0 21 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                  <path d=\"M0.833496 20.1666C0.833496 16.1165 4.11674 12.8333 8.16683 12.8333C12.2169 12.8333 15.5002 16.1165 15.5002 20.1666H0.833496ZM8.16683 11.9166C5.12808 11.9166 2.66683 9.45538 2.66683 6.41663C2.66683 3.37788 5.12808 0.916626 8.16683 0.916626C11.2056 0.916626 13.6668 3.37788 13.6668 6.41663C13.6668 9.45538 11.2056 11.9166 8.16683 11.9166ZM14.9161 13.9637C17.7443 14.6865 19.8707 17.1632 20.0685 20.1666H17.3335C17.3335 17.7743 16.417 15.596 14.9161 13.9637ZM13.0619 11.8771C14.5586 10.5345 15.5002 8.58552 15.5002 6.41663C15.5002 5.1174 15.1623 3.89709 14.5697 2.83876C16.6692 3.25777 18.2502 5.11006 18.2502 7.33329C18.2502 9.86558 16.1991 11.9166 13.6668 11.9166C13.4618 11.9166 13.2598 11.9032 13.0619 11.8771Z\" fill=\"#ed6e00\"/>
                  </svg>
                    ";
        // line 573
        echo ($context["text_buyer"] ?? null);
        echo "
                  </a>
                  <div class=\"main-nav--secondary__dropdown secondary-menu__dropdown\">
                    <div class=\"secondary-menu__wrapper\">
                      <ul class=\"secondary-menu__list-list\">
                        <li class=\"secondary-menu__item\">
                          <a class=\"secondary-menu__link\" href=\"";
        // line 579
        echo ($context["link_store"] ?? null);
        echo "\">";
        echo ($context["text_store"] ?? null);
        echo "</a>
                        </li>
                        <li class=\"secondary-menu__item\">
                          <a class=\"secondary-menu__link\" href=\"";
        // line 582
        echo ($context["link_services"] ?? null);
        echo "\">";
        echo ($context["text_services"] ?? null);
        echo "</a>
                        </li>
                        <li class=\"secondary-menu__item\">
                          <a class=\"secondary-menu__link\" href=\"";
        // line 585
        echo ($context["link_delivery"] ?? null);
        echo "\">";
        echo ($context["text_delivery"] ?? null);
        echo "</a>
                        </li>
                        <li class=\"secondary-menu__item\">
                          <a class=\"secondary-menu__link\" href=\"";
        // line 588
        echo ($context["link_black_list"] ?? null);
        echo "\">";
        echo ($context["text_black_list"] ?? null);
        echo "</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </li>
              </ul>
              <ul class=\"main-nav__contact\">
                <li class=\"main-menu__list-item main-nav__contact-item\">
                  <a class=\"main-menu__link\" href=\"callto:+380800333900\" class=\"main-menu__link main-nav__contact-link\">
                  <svg class=\"main-menu__link-icon\" width=\"18\" height=\"18\" viewBox=\"0 0 18 18\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                  <path d=\"M18 13.42V16.9561C18 17.4811 17.5941 17.9167 17.0705 17.9537C16.6331 17.9846 16.2763 18 16 18C7.1634 18 0 10.8366 0 2C0 1.72371 0.01545 1.36687 0.04635 0.9295C0.08337 0.40588 0.51894 0 1.04386 0H4.5801C4.83678 0 5.05176 0.19442 5.07753 0.4498C5.10067 0.67907 5.12218 0.86314 5.14207 1.00202C5.34435 2.41472 5.75753 3.75936 6.3487 5.00303C6.44359 5.20265 6.38171 5.44159 6.20185 5.57006L4.04355 7.1118C5.35752 10.1811 7.8189 12.6425 10.8882 13.9565L12.4271 11.8019C12.5572 11.6199 12.799 11.5573 13.001 11.6532C14.2446 12.2439 15.5891 12.6566 17.0016 12.8584C17.1396 12.8782 17.3225 12.8995 17.5502 12.9225C17.8056 12.9483 18 13.1633 18 13.42Z\" fill=\"#ed6e00\"/>
                  </svg>
                    0 800 333 900
                  </a>
                </li>
                <li class=\"main-menu__list-item main-nav__contact-item\">
                  <a href=\"mailto:info@procraft.ua\" class=\"main-menu__link main-nav__contact-link\">
                  <svg class=\"main-menu__link-icon\" width=\"20\" height=\"18\" viewBox=\"0 0 20 18\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                  <path d=\"M1 0H19C19.5523 0 20 0.44772 20 1V17C20 17.5523 19.5523 18 19 18H1C0.44772 18 0 17.5523 0 17V1C0 0.44772 0.44772 0 1 0ZM10.0606 8.6829L3.64722 3.2377L2.35278 4.7623L10.0731 11.3171L17.6544 4.75616L16.3456 3.24384L10.0606 8.6829Z\" fill=\"#ed6e00\"/>
                  </svg>
                    info@procraft.ua
                  </a>
                </li>
              </ul>
              
            </div>
            <div class=\"main-menu__drop\">
            <ul class=\"main-menu-gift\">
              <li class=\"main-menu__list-item main-nav__contact-item\">
                <a href=\"";
        // line 618
        echo ($context["link_special"] ?? null);
        echo "\" class=\"main-menu__link main-nav__contact-link\">
                  <svg class=\"main-menu__link-icon\"><use href=\"catalog/view/theme/default/image/icons.svg#promotion\"></use></svg>
                  ";
        // line 620
        echo ($context["text_special"] ?? null);
        echo "
                </a>
              </li>
            </ul>
            </div>
          </nav> 
        </aside>
            <div class=\"hero__content\">
              ";
        // line 628
        echo ($context["content_full"] ?? null);
        echo "
              <div class=\"hero__bottom-row\">
                <a href=\"";
        // line 630
        echo ($context["link_special"] ?? null);
        echo "\" class=\"hero__bottom-item\">
                  <img class=\"hero__bottom-icon\" src=\"catalog/view/theme/default/image//hero/icon-1.svg\" alt=\"Icon\" />
                  <p>";
        // line 632
        echo ($context["text_special"] ?? null);
        echo "</p>
                </a>
                <a href=\"";
        // line 634
        echo ($context["link_bestseller"] ?? null);
        echo "\" class=\"hero__bottom-item\">
                  <img class=\"hero__bottom-icon\" src=\"catalog/view/theme/default/image//hero/icon-2.svg\" alt=\"Icon\" />
                  <p>";
        // line 636
        echo ($context["text_bestseller"] ?? null);
        echo "</p>
                </a>
                <a href=\"";
        // line 638
        echo ($context["link_news"] ?? null);
        echo "\" class=\"hero__bottom-item\">
                  <img class=\"hero__bottom-icon\" src=\"catalog/view/theme/default/image//hero/icon-3.svg\" alt=\"Icon\" />
                  <p>";
        // line 640
        echo ($context["text_news"] ?? null);
        echo "</p>
                </a>
              </div>
            </div>
          </div>
        </div>
      </section>
      ";
        // line 647
        echo ($context["content_top"] ?? null);
        echo "

      ";
        // line 649
        echo ($context["content_bottom"] ?? null);
        echo "
    </main>
  <script src=\"https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js\"></script>
  <script src=\"catalog/view/theme/default/javascript/script.js\"></script>
<script>
    function openSubMenu(){
      if(\$('.main-nav--secondary__dropdown').hasClass('secondary-menu__dropdown--active')){
        \$('.main-nav--secondary__dropdown').removeClass('secondary-menu__dropdown--active');
        \$('.buyer-link').removeClass('buyer-link-open');
      }else{
        \$('.main-nav--secondary__dropdown').addClass('secondary-menu__dropdown--active');
        \$('.buyer-link').addClass('buyer-link-open');
      }
    }

    \$('#modal-header-open').click(function(){
      \$('#contact-info-header').toggle();
\t  });
</script>


<script>
\$('.profile_login__button').click(function(){
  \$.ajax({
    url: '";
        // line 673
        echo ($context["action"] ?? null);
        echo "',
    type: 'post',
    data: \$('#login-form').serialize(),
    success: function(json){
      var res = JSON.parse(json);
      if(res['error']){
        \$('.alert-danger').show();
        \$('.alert-danger').text(error);
      }else if(res['success']){
        location = res['success'];
      }
    }
  });
});
</script>

    ";
        // line 689
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/template/common/home.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1192 => 689,  1173 => 673,  1146 => 649,  1141 => 647,  1131 => 640,  1126 => 638,  1121 => 636,  1116 => 634,  1111 => 632,  1106 => 630,  1101 => 628,  1090 => 620,  1085 => 618,  1050 => 588,  1042 => 585,  1034 => 582,  1026 => 579,  1017 => 573,  1006 => 565,  999 => 561,  992 => 557,  987 => 555,  980 => 551,  975 => 549,  969 => 545,  963 => 544,  958 => 542,  954 => 541,  949 => 540,  942 => 535,  932 => 531,  928 => 530,  924 => 529,  921 => 528,  916 => 527,  909 => 523,  904 => 521,  901 => 520,  899 => 519,  891 => 514,  887 => 513,  883 => 512,  880 => 511,  877 => 510,  873 => 509,  829 => 468,  824 => 466,  789 => 436,  781 => 433,  773 => 430,  765 => 427,  756 => 421,  745 => 413,  738 => 409,  731 => 405,  726 => 403,  719 => 399,  714 => 397,  708 => 393,  702 => 392,  697 => 390,  693 => 389,  688 => 388,  681 => 383,  671 => 379,  667 => 378,  663 => 377,  660 => 376,  655 => 375,  648 => 371,  643 => 369,  640 => 368,  638 => 367,  630 => 362,  626 => 361,  622 => 360,  619 => 359,  616 => 358,  612 => 357,  582 => 329,  573 => 297,  567 => 294,  557 => 287,  551 => 284,  545 => 282,  534 => 273,  530 => 272,  512 => 257,  504 => 252,  496 => 247,  485 => 239,  478 => 236,  474 => 231,  470 => 229,  460 => 227,  458 => 226,  451 => 222,  446 => 220,  440 => 217,  413 => 193,  401 => 184,  385 => 171,  370 => 159,  355 => 147,  351 => 146,  347 => 145,  343 => 144,  332 => 138,  328 => 136,  320 => 127,  314 => 126,  308 => 125,  302 => 124,  296 => 123,  290 => 122,  285 => 120,  277 => 117,  269 => 114,  261 => 111,  255 => 107,  247 => 105,  235 => 104,  223 => 94,  215 => 92,  211 => 91,  208 => 90,  204 => 88,  198 => 87,  192 => 84,  188 => 83,  183 => 82,  180 => 81,  176 => 80,  172 => 79,  169 => 78,  167 => 77,  164 => 76,  153 => 74,  149 => 73,  144 => 70,  135 => 68,  131 => 67,  126 => 64,  113 => 62,  109 => 61,  93 => 48,  86 => 47,  80 => 45,  78 => 44,  72 => 42,  70 => 41,  66 => 40,  62 => 39,  37 => 16,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/common/home.twig", "");
    }
}
