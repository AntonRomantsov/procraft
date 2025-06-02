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

/* default/template/common/header3.twig */
class __TwigTemplate_43a62508451288f788bc93b6d18c074700808ffdb24defb110ca38dbea0ff0af extends \Twig\Template
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
        echo "<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir=\"";
        // line 3
        echo ($context["direction"] ?? null);
        echo "\" lang=\"";
        echo ($context["lang"] ?? null);
        echo "\" class=\"ie8\"><![endif]-->
<!--[if IE 9 ]><html dir=\"";
        // line 4
        echo ($context["direction"] ?? null);
        echo "\" lang=\"";
        echo ($context["lang"] ?? null);
        echo "\" class=\"ie9\"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
  <html dir=\"";
        // line 6
        echo ($context["direction"] ?? null);
        echo "\" lang=\"";
        echo ($context["lang"] ?? null);
        echo "\"> <!--<![endif]-->
  <head>
    <!-- Google Tag Manager -->
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
    <title>
      ";
        // line 27
        echo ($context["title"] ?? null);
        echo "
    </title>
    <base href=\"";
        // line 29
        echo ($context["base"] ?? null);
        echo "\" />
    ";
        // line 30
        if (($context["description"] ?? null)) {
            // line 31
            echo "      <meta name=\"description\" content=\"";
            echo ($context["description"] ?? null);
            echo "\" />
    ";
        }
        // line 33
        echo "    ";
        if (($context["keywords"] ?? null)) {
            // line 34
            echo "      <meta name=\"keywords\" content=\"";
            echo ($context["keywords"] ?? null);
            echo "\" />
    ";
        }
        // line 36
        echo "    <link rel=\"alternate\" href=\"";
        echo ($context["uri"] ?? null);
        echo "\" hreflang=\"";
        echo ($context["hreflang"] ?? null);
        echo "\">
    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 37
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
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["styles"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["style"]) {
            // line 51
            echo "      <link href=\"/";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "href", [], "any", false, false, false, 51);
            echo "\" type=\"text/css\" rel=\"";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "rel", [], "any", false, false, false, 51);
            echo "\" media=\"";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "media", [], "any", false, false, false, 51);
            echo "\" />
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['style'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 53
        echo "    <link href=\"/catalog/view/theme/default/stylesheet/main.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"catalog/view/theme/default/stylesheet/style/main.css\" />
    <link href=\"/catalog/view/theme/default/stylesheet/media.css\" rel=\"stylesheet\">
    ";
        // line 56
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["scripts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 57
            echo "      <script src=\"";
            echo $context["script"];
            echo "\" type=\"text/javascript\"></script>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "    <script src=\"/catalog/view/javascript/common.js\" type=\"text/javascript\"></script>
    ";
        // line 60
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["links"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
            // line 61
            echo "      <link href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["link"], "href", [], "any", false, false, false, 61);
            echo "\" rel=\"";
            echo twig_get_attribute($this->env, $this->source, $context["link"], "rel", [], "any", false, false, false, 61);
            echo "\" />
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "    <!-- XD stickers start -->
    ";
        // line 64
        if ( !twig_test_empty(($context["xdstickers"] ?? null))) {
            // line 65
            echo "      <style type='text/css'>
\t\t\t\t\t";
            // line 66
            echo ($context["xdstickers_inline_styles"] ?? null);
            echo "
\t\t\t\t\t
\t\t\t\t\t\t
\t\t\t\t\t\t\t.";
            // line 69
            echo twig_get_attribute($this->env, $this->source, ($context["xdsticker"] ?? null), "id", [], "any", false, false, false, 69);
            echo " {
\t\t\t\t\t\t\t\tbackground-color:";
            // line 70
            echo twig_get_attribute($this->env, $this->source, ($context["xdsticker"] ?? null), "bg", [], "any", false, false, false, 70);
            echo ";
\t\t\t\t\t\t\t\tcolor:";
            // line 71
            echo twig_get_attribute($this->env, $this->source, ($context["xdsticker"] ?? null), "color", [], "any", false, false, false, 71);
            echo ";
\t\t\t\t\t\t\t}
\t\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t</style> ";
            // line 75
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["xdstickers"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                echo " ";
                if ((twig_get_attribute($this->env, $this->source, $context["xdsticker"], "status", [], "any", false, false, false, 75) == "1")) {
                    echo " ";
                }
                echo " ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 76
            echo "    ";
        }
        // line 77
        echo "    <!-- XD stickers end -->
    ";
        // line 78
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["analytics"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["analytic"]) {
            // line 79
            echo "      ";
            echo $context["analytic"];
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['analytic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        echo "  </head>
  <body>
    <!-- Google Tag Manager (noscript) -->
    <noscript>
      <iframe src=\"https://www.googletagmanager.com/ns.html?id=GTM-M7JJKH9\" height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    <header class=\"header\">
      <div class=\"header-top\">
        <div class=\"container mobile-none\">
          <div class=\"header-top__flex\">
            <button type=\"button\" class=\"btn btn-primary open_mob_menu visible-sm visible-xs\" data-toggle=\"modal\" data-target=\"#modal-mob-menu\">
              <i class=\"fa fa-bars\"></i>
            </button>
            <div class=\"header-top__logo logo\">
              ";
        // line 96
        if (($context["logo"] ?? null)) {
            // line 97
            echo "                <a href=\"";
            echo ($context["home"] ?? null);
            echo "\">
                  <img src=\"";
            // line 98
            echo ($context["logo"] ?? null);
            echo "\" title=\"";
            echo ($context["name"] ?? null);
            echo "\" alt=\"";
            echo ($context["name"] ?? null);
            echo "\" class=\"img-responsive\" />
                </a>
              ";
        } else {
            // line 101
            echo "                <a href=\"";
            echo ($context["home"] ?? null);
            echo "\">
                  ";
            // line 102
            echo ($context["name"] ?? null);
            echo "
                </a>
              ";
        }
        // line 105
        echo "            </div>
            <nav class=\"header-top__nav nav-top\">
              <ul class=\"nav-top__list list-unstyled\">
                <li class=\"nav-top__item\">
                  <a href=\"";
        // line 109
        echo ($context["link_special"] ?? null);
        echo "\" class=\"nav-top__link\">
                    ";
        // line 110
        echo ($context["text_special"] ?? null);
        echo "
                  </a>
                </li>
                <li class=\"nav-top__item\">
                  <a href=\"";
        // line 114
        echo ($context["link_news"] ?? null);
        echo "\" class=\"nav-top__link\">
                    ";
        // line 115
        echo ($context["text_news"] ?? null);
        echo "
                  </a>
                </li>
                <li class=\"nav-top__item\">
                  <a href=\"";
        // line 119
        echo ($context["link_bestseller"] ?? null);
        echo "\" class=\"nav-top__link\">
                    ";
        // line 120
        echo ($context["text_bestseller"] ?? null);
        echo "
                  </a>
                </li>
                <li class=\"nav-top__item dropdown\">
                  <a href=\"#\" class=\"nav-top__link\" data-toggle=\"dropdown\">
                    ";
        // line 125
        echo ($context["text_buyer"] ?? null);
        echo "
                    <i class=\"fa fa-angle-down\"></i>
                  </a>
                  <ul class=\"nav-top__dropdown dropdown-menu list-unstyled\">
                    <!-- <li><a href=\"";
        // line 129
        echo ($context["link_register"] ?? null);
        echo "\">";
        echo ($context["text_register_instr"] ?? null);
        echo "</a></li> -->
                    <li>
                      <a href=\"";
        // line 131
        echo ($context["link_store"] ?? null);
        echo "\">
                        ";
        // line 132
        echo ($context["text_store"] ?? null);
        echo "
                      </a>
                    </li>
                    <li>
                      <a href=\"";
        // line 136
        echo ($context["link_services"] ?? null);
        echo "\">
                        ";
        // line 137
        echo ($context["text_services"] ?? null);
        echo "
                      </a>
                    </li>
                    <li>
                      <a href=\"";
        // line 141
        echo ($context["link_delivery"] ?? null);
        echo "\">
                        ";
        // line 142
        echo ($context["text_delivery"] ?? null);
        echo "
                      </a>
                    </li>
                    <li>
                      <a href=\"";
        // line 146
        echo ($context["link_black_list"] ?? null);
        echo "\">
                        ";
        // line 147
        echo ($context["text_black_list"] ?? null);
        echo "
                      </a>
                    </li>
                  <!-- <li><a href=\"";
        // line 150
        echo ($context["link_partner"] ?? null);
        echo "\">";
        echo ($context["text_partner"] ?? null);
        echo "</a></li>-->
                  </ul>
                </li>
              ";
        // line 159
        echo "              </ul>
            </nav>
            <div class=\"header-top__phone\">
              <a class=\"binct-phone-number-1\" href=\"tel:";
        // line 162
        echo ($context["telephone"] ?? null);
        echo "\">
                ";
        // line 163
        echo ($context["telephone"] ?? null);
        echo "
              </a>
              <i class=\"fa fa-angle-down\" style=\"color: white;\" id=\"modal-header-open\"></i>
              <div id=\"contact-info-header\" class=\"tb_wt tb_wt_block_group hover-block-show tbMobileShow display-block tb_equal_columns hoveredshow\" style=\"display:none;\">
                <div class=\"row tb_gut_xs_0 tb_gut_sm_0 tb_gut_md_0 tb_gut_lg_0\">
                  <div class=\"col col-xs-12 col-sm-2 col-md-12 col-lg-12 col-align-center col-valign-top\">
                    <div id=\"Html_MBFt06W6\" class=\"tb_wt tb_wt_html tbMobileShow hover-block-show display-block hoveredshow\">
                      <div class=\"panel-body tb_text_wrap\">
                        <div id=\"number-phone\">
                          <ul class=\"more-info-text\">
                            <li class=\"item-phone\">
                              <a class=\"binct-phone-number-1\" href=\"javascript:void(0);\" data-binct-original=\"2\">
                                <span>
                                  0
                                </span>
                                <span style=\"opacity: 0.6; margin-left: 3px;\">
                                  8
                                </span>
                                <span style=\"opacity: 0.5;\">
                                  0
                                </span>
                                <span style=\"opacity: 0.4;\">
                                  0
                                </span>
                                <span style=\"margin-left: 5px;\">
                                  <u>
                                    ";
        // line 189
        echo ($context["text_show"] ?? null);
        echo "
                                  </u>
                                </span>
                              </a>
                            </li>
                            <li class=\"cool\">
                              ";
        // line 195
        echo ($context["text_call_receiving"] ?? null);
        echo "
                              :
                            </li>
                            <li>
                              ";
        // line 199
        echo ($context["text_schedule1"] ?? null);
        echo "
                            </li>
                            <li>
                              ";
        // line 202
        echo ($context["text_schedule2"] ?? null);
        echo "
                            </li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class=\"col col-xs-12 col-sm-2 col-md-12 col-lg-12 col-align-center col-valign-top\">
                    <div id=\"OpenCart_VQeh6bJ0\" class=\"tb_wt tb_wt_open_cart tbMobileShow header-form hover-block-show display-block tb_module_jform hoveredshow\">
                      <div class=\"jform-wrap row tb_gut_xs_0\">
                        <div class=\"col  col-xs-12 tbMobileShow\">
                          <div class=\"form-title\">
                            <span></span>
                          </div>
                          <!-- <div data-success=\"Чекайте зв язку з менеджером.\" id=\"jfrom-1\"> -->
                          <form method=\"post\" enctype=\"multipart/form-data\" class=\"form-horizontal\">
                            <input type=\"hidden\" name=\"jform_id\" value=\"7\">
                            <input type=\"hidden\" name=\"current_url\" value=\"";
        // line 219
        echo ($context["uri"] ?? null);
        echo "\">
                            <div class=\"row tb_gut_xs_0\">
                              <div class=\"col col-xs-12 input-effect tbMobileShow\">
                                <div class=\"form-group\">
                                  <input type=\"text\" class=\"effect-17 form-control\" name=\"field855\" id=\"field-855\" placeholder=\"Ваш телефон*\" required>
                                  <label class=\"control-label\" for=\"field-855\"></label>
                                </div>
                              </div>
                            </div>
                            <div class=\"row tb_gut_xs_0\">
                              <div class=\"col col-xs-12 tbMobileShow\">
                                <div class=\"button-wrap\">
                                  <a class=\"btn btn-primary\" id=\"jfrom-submit-1\" onclick=\"sendCallback();\">
                                    ";
        // line 232
        echo ($context["text_callback"] ?? null);
        echo "
                                  </a>
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <script type=\"text/javascript\">function formsubmit(id){\$.ajax({url:'index.php?route=module/jform/formsubmit',type:'post',data:new FormData(\$('#jfrom-'+id+' form')[0]),dataType:'json',cache:false,contentType:false,processData:false,complete:function(){\$('#jfrom-submit-'+id).button('reset');},success:function(json){\$('#jfrom-'+id).find('.alert, .text-danger').remove();\$('#jfrom-'+id).find(\"input[type=text], textarea\").val(\"\");\$('#jfrom-'+id).find(\"input[type=checkbox]\").attr(\"checked\",false);go(\$('#jfrom-'+id).attr('data-success'),50);if(\$('#jfrom-'+id).parents('.popap-form').length||\$('#jfrom-'+id).parents('.mfp-content').length){\$('.close, .mfp-close').trigger('click'); }},error:function(xhr,ajaxOptions,thrownError){alert(thrownError+\"\\r\\n\"+xhr.statusText+\"\\r\\n\"+xhr.responseText); }});}function validate(id){\$.ajax({url:'index.php?route=module/jform/validate',type:'post',data:new FormData(\$('#jfrom-'+id+' form')[0]),dataType:'json',cache:false,contentType:false,processData:false,success:function(json){\$('.alert, .text-danger').remove();if(json['error']||json['field_id']){\$('#field-'+json['field_id']).before('<div class=\"text-danger\">'+json['error']+'</div>');}else if(json['error_captcha']){\$('#input-captcha-'+id).after('<div class=\"text-danger\">Error: '+json['error_captcha']+'</div>');}else{formsubmit(id); }},error:function(xhr,ajaxOptions,thrownError){alert(thrownError+\"\\r\\n\"+xhr.statusText+\"\\r\\n\"+xhr.responseText); }});}</script>
                    <script type=\"text/javascript\">\$('button[id^=\\'button-upload\\']').on('click',function(){var node=this;id=\$('input[name=\\'jform_id\\']').val();\$('#form-upload-1').remove();\$('body').prepend('<form enctype=\"multipart/form-data\" id=\"form-upload-1\" style=\"display: none;\"><input type=\"file\" name=\"file\" /></form>');\$('#form-upload-1 input[name=\\'file\\']').trigger('click');if(typeof timer!='undefined'){clearInterval(timer);}timer=setInterval(function(){if(\$('#form-upload-1 input[name=\\'file\\']').val()!=''){clearInterval(timer);\$.ajax({url:'index.php?route=module/jform/upload&jform_id='+id,type:'post',dataType:'json',data:new FormData(\$('#form-upload-1')[0]),cache:false,contentType:false,processData:false,beforeSend:function(){\$(node).button('loading');},complete:function(){\$(node).button('reset');},success:function(json){\$('.text-danger').remove();if(json['error']){\$(node).parent().find('input').after('<div class=\"text-danger\">'+json['error']+'</div>');}if(json['success']){alert(json['success']);\$(node).parent().find('input').attr('value',json['code']); }},error:function(xhr,ajaxOptions,thrownError){alert(thrownError+\"\\r\\n\"+xhr.statusText+\"\\r\\n\"+xhr.responseText); }}); }},500);});</script>
                  </div>
                </div>

              </div>
            </div>
            <div>
              <div class=\"header-top__lang\">
                ";
        // line 250
        echo ($context["language"] ?? null);
        echo "
              </div>
            </div>
          </div>
        </div>
        ";
        // line 255
        if (($context["notmainpage"] ?? null)) {
            // line 256
            echo "          <div class=\"header-second\">
            <div class=\"header__container\">
              <div class=\"header__wrapper\">
                <div class=\"header__main-menu\">
                  ";
            // line 260
            echo ($context["menu"] ?? null);
            echo "
                </div>
                <div class=\"header__search\">
                  ";
            // line 263
            echo ($context["search"] ?? null);
            echo "
                </div>
                <div class=\"header__actions-row\">
                  <div class=\"header-actions__item header-actions__cart\">
                    ";
            // line 267
            echo ($context["cart"] ?? null);
            echo "
                  </div>
                  <div class=\"header-actions__item header-actions__wishlist header-wishlist\">
                    <a href=\"";
            // line 270
            echo ($context["wishlist"] ?? null);
            echo "\" id=\"wishlist-total\" class=\"header-wishlist__link header-actions__link\">
                      <svg class=\"svg-icon\">
                        <use xlink:href=\"/image/sprite.svg#heart\"></use>
                      </svg>
                      <span>
                        ";
            // line 275
            echo ($context["text_wishlist"] ?? null);
            echo "
                      </span>
                    </a>
                  </div>
                  <div class=\"header-actions__item header-actions__user header-user\">
                    ";
            // line 280
            if (($context["logged"] ?? null)) {
                // line 281
                echo "                      <a href=\"";
                echo ($context["account"] ?? null);
                echo "\" class=\"header-user__link\">
                        <svg class=\"svg-icon\">
                          <use xlink:href=\"/image/sprite.svg#user\"></use>
                        </svg><!-- ";
                // line 284
                echo ($context["login_name"] ?? null);
                echo " <span>(";
                echo ($context["customer_percent"] ?? null);
                echo "%)</span>--></a>
                    ";
            } else {
                // line 286
                echo "                      <a data-fancybox data-touch=\"false\" href=\"#user-login\" class=\"header-user__link\">
                        <svg class=\"svg-icon\">
                          <use xlink:href=\"/image/sprite.svg#user\"></use>
                        </svg>
                      </a>
                    ";
            }
            // line 292
            echo "                    <div class=\"fancybox-hidden profile_login active\" style=\"display: none;\" id=\"user-login\">
                      <div class=\"profile_login__content\">
                        ";
            // line 297
            echo "                        <h2 class=\"profile_login__title\">
                          ";
            // line 298
            echo ($context["text_login"] ?? null);
            echo "
                        </h2>
                        <div class=\"alert alert-danger alert-dismissible\" style=\"display: none;\">
                          <i class=\"fa fa-exclamation-circle\"></i>
                        </div>
                        <div class=\"profile_login__body\">
                          <form action=\"index.php?route=account/login\" method=\"post\" enctype=\"multipart/form-data\" id=\"login-form\">
                            <div class=\"profile_login__wrapper\">
                              <label class=\"profile_login__label\" for=\"profileLogin\">
                                E-MAIL
                              </label>
                              <input class=\"input--profile_mod\" id=\"profileLogin\" type=\"email\" placeholder=\"Логін\" name=\"email\" required />
                            </div>
                            <div class=\"profile_login__wrapper\">
                              <div class=\"profile_login__row\">
                                <label class=\"profile_login__label\" for=\"passwordLogin\">
                                  Пароль
                                </label>
                                <a data-fancybox data-touch=\"false\" href=\"#forgotten-password\" class=\"profile_login__forgot\">
                                  ";
            // line 317
            echo ($context["text_forgotten"] ?? null);
            echo "
                                </a>
                              </div>
                              <input class=\"input--profile_mod\" id=\"passwordLogin\" type=\"password\" placeholder=\"Пароль\" name=\"password\" required />
                            </div>
                            <button class=\"button profile_login__button\" type=\"button\">
                              <p>
                                ";
            // line 324
            echo ($context["text_sing_in"] ?? null);
            echo "
                              </p>
                            </button>
                          </form>
                          <div class=\"profile_login__or\">
                            <span class=\"profile_login__or_deco\"></span>
                            <span class=\"profile_login__or_text\">
                              ";
            // line 331
            echo ($context["text_or"] ?? null);
            echo "
                            </span>
                            <span class=\"profile_login__or_deco\"></span>
                          </div>
                          <div class=\"profile_login__buttons\">
                            <button class=\"button profile_login__button_bottom\">
                              <img src=\"image/profile/facebook.svg\" alt=\"\" />
                              <p>
                                Facebook
                              </p>
                            </button>
                            <button class=\"button profile_login__button_bottom\">
                              <img src=\"image/profile/google.svg\" alt=\"\" />
                              <p>
                                Google
                              </p>
                            </button>
                          </div>
                        </div>
                        <div class=\"profile_login__footer\">
                          <p>
                            ";
            // line 352
            echo ($context["text_yet_guest"] ?? null);
            echo "
                          </p>
                          <a class=\"profile_login__footer_register\" href=\"";
            // line 354
            echo ($context["register"] ?? null);
            echo "\">
                            ";
            // line 355
            echo ($context["text_register"] ?? null);
            echo "
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class=\"profile_login active\" id=\"forgotten-password\" style=\"display: none;\">
                      <div class=\"profile_login__content\">
                        ";
            // line 365
            echo "                        <h2 class=\"profile_login__title profile_login__title--resset_mod\">
                          ";
            // line 366
            echo ($context["text_forgotten"] ?? null);
            echo "
                        </h2>
                        <p class=\"profile_login__description\">
                          ";
            // line 369
            echo ($context["text_password_instruction"] ?? null);
            echo "
                        </p>
                        <div class=\"profile_login__body\">
                          <form action=\"";
            // line 372
            echo ($context["action_forgotten"] ?? null);
            echo "\" method=\"post\">
                            <div class=\"profile_login__wrapper\">
                              <label class=\"profile_login__label\" for=\"resetLogin\">
                                E-MAIL
                              </label>
                              <input class=\"input--profile_mod\" id=\"resetLogin\" type=\"email\" name=\"email\" placeholder=\"Логін\" required />
                            </div>
                            <div class=\"profile_login__button_row\">
                              <button class=\"button profile_login__button profile_login__button--pink_mod\" type=\"submit\">
                                <p>
                                  ";
            // line 382
            echo ($context["button_back"] ?? null);
            echo "
                                </p>
                              </button>
                              <button class=\"button profile_login__button\" type=\"submit\">
                                <p>
                                  ";
            // line 387
            echo ($context["button_continue"] ?? null);
            echo "
                                </p>
                              </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    ";
            // line 418
            echo "                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        ";
        }
        // line 425
        echo "      </div>
    </header>
    ";
        // line 573
        echo "    <!-- </div></div> -->
    <script type=\"text/javascript\">
\t\$('#modal-header-open').click(function(){
    \$('#contact-info-header').toggle();
\t});
  
  // window.addEventListener('scroll', function() {
  //   if(\$('.header-top').css('overflow') == 'hidden'){
  // \t  \$('#contact-info-header').css('display', 'none');
  // \t  \$('.header-top').css('max-height', 0);
  //   }
  // });

\tfunction sendCallback(){
\t\tvar fields = [];
    fields[20] = \$('#field-855').val();
\t\t\$.ajax({
      url: 'index.php?route=page/form/add&page_form_id=7',
      type: 'post',
      data: {
        field: fields
      },
      dataType: 'json',
      
      success: function(json) {
    \t  if(json['success']){
    \t  \t\$('#buildersuccess-modal";
        // line 599
        echo ($context["module_row"] ?? null);
        echo "').remove();

          \$('body').append('<div id=\"buildersuccess-modal";
        // line 601
        echo ($context["module_row"] ?? null);
        echo "\" class=\"modal fade\" role=\"dialog\"><div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button><h4 class=\"modal-title\">'+ '";
        echo ($context["text_message_sent"] ?? null);
        echo "' +'</h4></div><div class=\"modal-body\">'+ '";
        echo ($context["text_wait"] ?? null);
        echo "' +'</div></div></div></div>');

          \$('#buildersuccess-modal";
        // line 603
        echo ($context["module_row"] ?? null);
        echo "').modal('show');
    \t  }
    \t  if(json['error']){
    \t  \t\$('input[name=\\'field855\\']').after('<div class=\"text-danger\">' + json['error']['field'][20] + '</div>');
    \t  }
      }
\t  });
  }
</script>
    <script>
\tdocument.addEventListener(\"DOMContentLoaded\", () => {
  if (window.innerWidth <= 1024) return;

  const mainMenu = document.querySelector(\".main-menu\");
  const main = document.querySelector(\"main\");

  if (!mainMenu) return;

  let activeDropdown = null;
  let activeSecondaryMenu = null;

  const activateDropdown = (menuItem) => {
    const dropdown = menuItem.querySelector(\".main-nav-dropdown\");

    if (dropdown) {
      deactivateDropdown();
      dropdown.classList.add(\"main-nav-dropdown--active\");
      activeDropdown = dropdown;
      mainMenu.classList.add(\"main-nav-dropdown--active\");
    } else {
      deactivateDropdown();
    }
  };

  const activateSecondaryMenu = (menuItem) => {
    const secondaryMenu = menuItem.querySelector(\".secondary-menu__dropdown\");

    if (secondaryMenu) {
      deactivateSecondaryMenu();
      secondaryMenu.classList.add(\"secondary-menu__dropdown--active\");
      activeSecondaryMenu = secondaryMenu;
    }
  };

  const deactivateDropdown = () => {
    if (activeDropdown) {
      activeDropdown.classList.remove(\"main-nav-dropdown--active\");
      activeDropdown = null;
    }
    mainMenu.classList.remove(\"main-nav-dropdown--active\");
  };

  const deactivateSecondaryMenu = () => {
    if (activeSecondaryMenu) {
      activeSecondaryMenu.classList.remove(\"secondary-menu__dropdown--active\");
      activeSecondaryMenu = null;
    }
  };

  const isCursorInside = (event, element) => {
    const rect = element.getBoundingClientRect();
    return event.clientX >= rect.left && event.clientX <= rect.right && event.clientY >= rect.top && event.clientY <= rect.bottom;
  };

  const menuItems = mainMenu.querySelectorAll(\".main-menu__list-item\");
  menuItems.forEach((menuItem) => {
    menuItem.addEventListener(\"mouseenter\", () => activateDropdown(menuItem));

    const firstLink = menuItem.querySelector(\".main-menu__link\");
    if (firstLink) {
      firstLink.addEventListener(\"click\", (event) => {
        const secondaryMenu = menuItem.querySelector(\".secondary-menu__dropdown\");
        if (secondaryMenu) {
          //event.preventDefault();
          activateSecondaryMenu(menuItem);
        }
      });
    }
  });

  document.addEventListener(\"mousemove\", (event) => {
    if (!isCursorInside(event, mainMenu)) {
      deactivateDropdown();
      deactivateSecondaryMenu();
    }
  });
});
</script>

    ";
        // line 715
        echo "    <script>
\t\$('.profile_login__button').click(function(){
\t  \$.ajax({
\t\turl: '";
        // line 718
        echo ($context["action"] ?? null);
        echo "',
\t\ttype: 'post',
\t\tdata: \$('#login-form').serialize(),
\t\tsuccess: function(json){
\t\t  var res = JSON.parse(json);
          if(res['error']){
            \$('.alert-danger').show();
            \$('.alert-danger').text(error);
          }else if(res['success']){
            location = res['success'];
          }
        }
\t  });
\t});
\t</script>

    ";
        // line 734
        echo ($context["mob_menu"] ?? null);
        echo "
  </body>
</html>
";
    }

    public function getTemplateName()
    {
        return "default/template/common/header3.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  894 => 734,  875 => 718,  870 => 715,  778 => 603,  769 => 601,  764 => 599,  736 => 573,  732 => 425,  723 => 418,  713 => 387,  705 => 382,  692 => 372,  686 => 369,  680 => 366,  677 => 365,  667 => 355,  663 => 354,  658 => 352,  634 => 331,  624 => 324,  614 => 317,  592 => 298,  589 => 297,  585 => 292,  577 => 286,  570 => 284,  563 => 281,  561 => 280,  553 => 275,  545 => 270,  539 => 267,  532 => 263,  526 => 260,  520 => 256,  518 => 255,  510 => 250,  489 => 232,  473 => 219,  453 => 202,  447 => 199,  440 => 195,  431 => 189,  402 => 163,  398 => 162,  393 => 159,  385 => 150,  379 => 147,  375 => 146,  368 => 142,  364 => 141,  357 => 137,  353 => 136,  346 => 132,  342 => 131,  335 => 129,  328 => 125,  320 => 120,  316 => 119,  309 => 115,  305 => 114,  298 => 110,  294 => 109,  288 => 105,  282 => 102,  277 => 101,  267 => 98,  262 => 97,  260 => 96,  243 => 81,  234 => 79,  230 => 78,  227 => 77,  224 => 76,  211 => 75,  204 => 71,  200 => 70,  196 => 69,  190 => 66,  187 => 65,  185 => 64,  182 => 63,  171 => 61,  167 => 60,  164 => 59,  155 => 57,  151 => 56,  146 => 53,  133 => 51,  129 => 50,  113 => 37,  106 => 36,  100 => 34,  97 => 33,  91 => 31,  89 => 30,  85 => 29,  80 => 27,  54 => 6,  47 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/common/header3.twig", "");
    }
}
