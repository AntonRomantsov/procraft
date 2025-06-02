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
class __TwigTemplate_3680bd2fe3e9182f807f87634aa08e61a2172e3c0a841d4a076fdbf1d0c833ac extends \Twig\Template
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
        echo "    
  </head>
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
        // line 97
        if (($context["logo"] ?? null)) {
            // line 98
            echo "                <a href=\"";
            echo ($context["home"] ?? null);
            echo "\">
                  <img src=\"";
            // line 99
            echo ($context["logo"] ?? null);
            echo "\" title=\"";
            echo ($context["name"] ?? null);
            echo "\" alt=\"";
            echo ($context["name"] ?? null);
            echo "\" class=\"img-responsive\" />
                </a>
              ";
        } else {
            // line 102
            echo "                <a href=\"";
            echo ($context["home"] ?? null);
            echo "\">
                  ";
            // line 103
            echo ($context["name"] ?? null);
            echo "
                </a>
              ";
        }
        // line 106
        echo "            </div>
            <nav class=\"header-top__nav nav-top\">
              <ul class=\"nav-top__list list-unstyled\">
                <li class=\"nav-top__item\">
                  <a href=\"";
        // line 110
        echo ($context["link_special"] ?? null);
        echo "\" class=\"nav-top__link\">
                    ";
        // line 111
        echo ($context["text_special"] ?? null);
        echo "
                  </a>
                </li>
                <li class=\"nav-top__item\">
                  <a href=\"";
        // line 115
        echo ($context["link_news"] ?? null);
        echo "\" class=\"nav-top__link\">
                    ";
        // line 116
        echo ($context["text_news"] ?? null);
        echo "
                  </a>
                </li>
                <li class=\"nav-top__item\">
                  <a href=\"";
        // line 120
        echo ($context["link_bestseller"] ?? null);
        echo "\" class=\"nav-top__link\">
                    ";
        // line 121
        echo ($context["text_bestseller"] ?? null);
        echo "
                  </a>
                </li>
                <li class=\"nav-top__item dropdown\">
                  <a href=\"#\" class=\"nav-top__link\" data-toggle=\"dropdown\">
                    ";
        // line 126
        echo ($context["text_buyer"] ?? null);
        echo "
                    <i class=\"fa fa-angle-down\"></i>
                  </a>
                  <ul class=\"nav-top__dropdown dropdown-menu list-unstyled\">
                    <!-- <li><a href=\"";
        // line 130
        echo ($context["link_register"] ?? null);
        echo "\">";
        echo ($context["text_register_instr"] ?? null);
        echo "</a></li> -->
                    <li>
                      <a href=\"";
        // line 132
        echo ($context["link_store"] ?? null);
        echo "\">
                        ";
        // line 133
        echo ($context["text_store"] ?? null);
        echo "
                      </a>
                    </li>
                    <li>
                      <a href=\"";
        // line 137
        echo ($context["link_services"] ?? null);
        echo "\">
                        ";
        // line 138
        echo ($context["text_services"] ?? null);
        echo "
                      </a>
                    </li>
                    <li>
                      <a href=\"";
        // line 142
        echo ($context["link_delivery"] ?? null);
        echo "\">
                        ";
        // line 143
        echo ($context["text_delivery"] ?? null);
        echo "
                      </a>
                    </li>
                    <li>
                      <a href=\"";
        // line 147
        echo ($context["link_black_list"] ?? null);
        echo "\">
                        ";
        // line 148
        echo ($context["text_black_list"] ?? null);
        echo "
                      </a>
                    </li>
                  <!-- <li><a href=\"";
        // line 151
        echo ($context["link_partner"] ?? null);
        echo "\">";
        echo ($context["text_partner"] ?? null);
        echo "</a></li>-->
                  </ul>
                </li>
              ";
        // line 160
        echo "              </ul>
            </nav>
            <div class=\"header-top__phone\">
              <a class=\"binct-phone-number-1\" href=\"tel:";
        // line 163
        echo ($context["telephone"] ?? null);
        echo "\">
                ";
        // line 164
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
        // line 190
        echo ($context["text_show"] ?? null);
        echo "
                                  </u>
                                </span>
                              </a>
                            </li>
                            <li class=\"cool\">
                              ";
        // line 196
        echo ($context["text_call_receiving"] ?? null);
        echo "
                              :
                            </li>
                            <li>
                              ";
        // line 200
        echo ($context["text_schedule1"] ?? null);
        echo "
                            </li>
                            <li>
                              ";
        // line 203
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
        // line 220
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
        // line 233
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
        // line 251
        echo ($context["language"] ?? null);
        echo "
              </div>
            </div>
          </div>
        </div>
        ";
        // line 256
        if (($context["notmainpage"] ?? null)) {
            // line 257
            echo "          <div class=\"header-second\">
            <div class=\"header__container\">
              <div class=\"header__wrapper\">
                <div class=\"header__main-menu\">
                  ";
            // line 261
            echo ($context["menu"] ?? null);
            echo "
                </div>
                <div class=\"header__search\">
                  ";
            // line 264
            echo ($context["search"] ?? null);
            echo "
                </div>
                <div class=\"header__actions-row\">
                  <div class=\"header-actions__item header-actions__cart\">
                    ";
            // line 268
            echo ($context["cart"] ?? null);
            echo "
                  </div>
                  <div class=\"header-actions__item header-actions__wishlist header-wishlist\">
                    <a href=\"";
            // line 271
            echo ($context["wishlist"] ?? null);
            echo "\" id=\"wishlist-total\" class=\"header-wishlist__link header-actions__link\">
                      <svg class=\"svg-icon\">
                        <use xlink:href=\"/image/sprite.svg#heart\"></use>
                      </svg>
                      <span>
                        ";
            // line 276
            echo ($context["text_wishlist"] ?? null);
            echo "
                      </span>
                    </a>
                  </div>
                  <div class=\"header-actions__item header-actions__user header-user\">
                    ";
            // line 281
            if (($context["logged"] ?? null)) {
                // line 282
                echo "                      <a href=\"";
                echo ($context["account"] ?? null);
                echo "\" class=\"header-user__link\">
                        <svg class=\"svg-icon\">
                          <use xlink:href=\"/image/sprite.svg#user\"></use>
                        </svg><!-- ";
                // line 285
                echo ($context["login_name"] ?? null);
                echo " <span>(";
                echo ($context["customer_percent"] ?? null);
                echo "%)</span>--></a>
                    ";
            } else {
                // line 287
                echo "                      <a data-fancybox data-touch=\"false\" href=\"#user-login\" class=\"header-user__link\">
                        <svg class=\"svg-icon\">
                          <use xlink:href=\"/image/sprite.svg#user\"></use>
                        </svg>
                      </a>
                    ";
            }
            // line 293
            echo "                    <div class=\"fancybox-hidden profile_login active\" style=\"display: none;\" id=\"user-login\">
                      <div class=\"profile_login__content\">
                        ";
            // line 298
            echo "                        <h2 class=\"profile_login__title\">
                          ";
            // line 299
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
            // line 318
            echo ($context["text_forgotten"] ?? null);
            echo "
                                </a>
                              </div>
                              <input class=\"input--profile_mod\" id=\"passwordLogin\" type=\"password\" placeholder=\"Пароль\" name=\"password\" required />
                            </div>
                            <button class=\"button profile_login__button\" type=\"button\">
                              <p>
                                ";
            // line 325
            echo ($context["text_sing_in"] ?? null);
            echo "
                              </p>
                            </button>
                          </form>
                          <div class=\"profile_login__or\">
                            <span class=\"profile_login__or_deco\"></span>
                            <span class=\"profile_login__or_text\">
                              ";
            // line 332
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
            // line 353
            echo ($context["text_yet_guest"] ?? null);
            echo "
                          </p>
                          <a class=\"profile_login__footer_register\" href=\"";
            // line 355
            echo ($context["register"] ?? null);
            echo "\">
                            ";
            // line 356
            echo ($context["text_register"] ?? null);
            echo "
                          </a>
                        </div>
                      </div>
                    </div>
                    <div class=\"profile_login active\" id=\"forgotten-password\" style=\"display: none;\">
                      <div class=\"profile_login__content\">
                        ";
            // line 366
            echo "                        <h2 class=\"profile_login__title profile_login__title--resset_mod\">
                          ";
            // line 367
            echo ($context["text_forgotten"] ?? null);
            echo "
                        </h2>
                        <p class=\"profile_login__description\">
                          ";
            // line 370
            echo ($context["text_password_instruction"] ?? null);
            echo "
                        </p>
                        <div class=\"profile_login__body\">
                          <form action=\"";
            // line 373
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
            // line 383
            echo ($context["button_back"] ?? null);
            echo "
                                </p>
                              </button>
                              <button class=\"button profile_login__button\" type=\"submit\">
                                <p>
                                  ";
            // line 388
            echo ($context["button_continue"] ?? null);
            echo "
                                </p>
                              </button>
                            </div>
                          </form>
                        </div>
                      </div>
                    ";
            // line 419
            echo "                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        ";
        }
        // line 426
        echo "      </div>
    </header>
    <div class=\"nomainpage-menu\">
      <div class=\"hero__container\">
      <nav class=\"main-menu2 main-menu-nomainpage header__main-menu_hidden--mod\" id=\"mainMenu\">
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
        // line 455
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 456
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 456)) {
                // line 457
                echo "      <li class=\"main-menu__list-item\">
      <a href=\"";
                // line 458
                echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 458);
                echo "\" class=\"main-menu__link\">
      <svg class=\"main-menu__link-icon\"><use href=\"/image/sprite-category.svg#";
                // line 459
                echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 459);
                echo "\"></use></svg>
      ";
                // line 460
                echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 460);
                echo "
      </a>
      <div class=\"main-nav__dropdown main-nav-dropdown nomainpage-dropdown\">
      <div class=\"main-nav-dropdown__wrapper\">
      <ul class=\"main-nav-dropdown__list\">
      ";
                // line 465
                if ((twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 465) == 73)) {
                    // line 466
                    echo "      <li class=\"main-nav-dropdown__item\">
      <a class=\"main-nav-dropdown__link\" href=\"";
                    // line 467
                    echo ($context["href_acum"] ?? null);
                    echo "\">
      <img src=\"/image/acum.jpg\" alt=\"\" style=\"width: 70px; height: 70px;\">
      <p>";
                    // line 469
                    echo ($context["text_acum"] ?? null);
                    echo "</p>
      </a>
      </li>
      ";
                }
                // line 473
                echo "      ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 473));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    // line 474
                    echo "      <li class=\"main-nav-dropdown__item\">
      <a class=\"main-nav-dropdown__link\" href=\"";
                    // line 475
                    echo twig_get_attribute($this->env, $this->source, $context["child"], "href", [], "any", false, false, false, 475);
                    echo "\">
      <img src=\"";
                    // line 476
                    echo twig_get_attribute($this->env, $this->source, $context["child"], "image", [], "any", false, false, false, 476);
                    echo "\" alt=\"Product\" />
      <p>";
                    // line 477
                    echo twig_get_attribute($this->env, $this->source, $context["child"], "name", [], "any", false, false, false, 477);
                    echo "</p>
      </a>
      </li>
      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 481
                echo "      </ul>
      </div>
      </div>
      </li>
      ";
            } else {
                // line 486
                echo "      <li class=\"main-menu__list-item\"><a class=\"main-menu__link\" href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 486);
                echo "\"><svg class=\"main-menu__link-icon\">
      <use xlink:href=\"/image/sprite-category.svg#";
                // line 487
                echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 487);
                echo "\"></use>
      </svg>";
                // line 488
                echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 488);
                echo "</a></li>
      ";
            }
            // line 490
            echo "      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 491
        echo "      </ul>
      
      <ul class=\"main-menu__list--secondary desctop-none\">
      <li class=\"main-menu__list-item\">
      <a href=\"";
        // line 495
        echo ($context["link_special"] ?? null);
        echo "\" class=\"main-menu__link\">
      <svg class=\"main-menu__link-icon\"><use href=\"catalog/view/theme/default/image/icons.svg#promotion\"></use></svg>
      ";
        // line 497
        echo ($context["text_special"] ?? null);
        echo "
      </a>
      </li>
      <li class=\"main-menu__list-item\">
      <a href=\"";
        // line 501
        echo ($context["link_bestseller"] ?? null);
        echo "\" class=\"main-menu__link\">
      <svg class=\"main-menu__link-icon\"><use href=\"catalog/view/theme/default/image/icons.svg#bestseller\"></use></svg>
      ";
        // line 503
        echo ($context["text_bestseller"] ?? null);
        echo "
      </a>
      </li>
      <li class=\"main-menu__list-item\">
      <a href=\"";
        // line 507
        echo ($context["link_news"] ?? null);
        echo "\" class=\"main-menu__link\">
      <svg class=\"main-menu__link-icon\" width=\"22\" height=\"21\" viewBox=\"0 0 22 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
      <path d=\"M8.74712 1.2573C9.47552 0.528902 10.5044 0.185956 11.5241 0.331635L17.3738 1.1673C18.8138 1.37301 19.9451 2.50438 20.1508 3.94431L20.9865 9.79404C21.1322 10.8138 20.7892 11.8427 20.0608 12.5711L12.0255 20.6063C11.635 20.9969 11.0019 20.9969 10.6113 20.6063L0.711843 10.7069C0.321313 10.3163 0.321313 9.68317 0.711843 9.29257L8.74712 1.2573ZM12.7327 8.58547C13.5137 9.36657 14.78 9.36657 15.5611 8.58547C16.3421 7.80445 16.3421 6.53812 15.5611 5.75707C14.78 4.97603 13.5137 4.97603 12.7327 5.75707C11.9516 6.53812 11.9516 7.80445 12.7327 8.58547Z\" fill=\"#ed6e00\"/>
      </svg>
      ";
        // line 511
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
        // line 519
        echo ($context["text_buyer"] ?? null);
        echo "
      </a>
      <div class=\"main-nav--secondary__dropdown secondary-menu__dropdown\">
      <div class=\"secondary-menu__wrapper\">
      <ul class=\"secondary-menu__list-list\">
      <li class=\"secondary-menu__item\">
      <a class=\"secondary-menu__link\" href=\"";
        // line 525
        echo ($context["link_store"] ?? null);
        echo "\">";
        echo ($context["text_store"] ?? null);
        echo "</a>
      </li>
      <li class=\"secondary-menu__item\">
      <a class=\"secondary-menu__link\" href=\"";
        // line 528
        echo ($context["link_services"] ?? null);
        echo "\">";
        echo ($context["text_services"] ?? null);
        echo "</a>
      </li>
      <li class=\"secondary-menu__item\">
      <a class=\"secondary-menu__link\" href=\"";
        // line 531
        echo ($context["link_delivery"] ?? null);
        echo "\">";
        echo ($context["text_delivery"] ?? null);
        echo "</a>
      </li>
      <li class=\"secondary-menu__item\">
      <a class=\"secondary-menu__link\" href=\"";
        // line 534
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
        // line 564
        echo ($context["link_special"] ?? null);
        echo "\" class=\"main-menu__link main-nav__contact-link\">
      <svg class=\"main-menu__link-icon\"><use href=\"catalog/view/theme/default/image/icons.svg#promotion\"></use></svg>
      ";
        // line 566
        echo ($context["text_special"] ?? null);
        echo "
      </a>
      </li>
      </ul>
      </div>
      </nav>
      </div>
    </div>
    <!-- </div></div> -->
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
        // line 600
        echo ($context["module_row"] ?? null);
        echo "').remove();

          \$('body').append('<div id=\"buildersuccess-modal";
        // line 602
        echo ($context["module_row"] ?? null);
        echo "\" class=\"modal fade\" role=\"dialog\"><div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button><h4 class=\"modal-title\">'+ '";
        echo ($context["text_message_sent"] ?? null);
        echo "' +'</h4></div><div class=\"modal-body\">'+ '";
        echo ($context["text_wait"] ?? null);
        echo "' +'</div></div></div></div>');

          \$('#buildersuccess-modal";
        // line 604
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
    
    let elem = document.querySelector('.header__main-menu');
    let coords = elem.getBoundingClientRect();

    \$('.nomainpage-menu').css('left', coords.left + 'px');
    \$('.nomainpage-menu').css('width', coords.width + +10 + 'px');

    \$('.main-menu__button').mouseenter(() => {
      \$('.nomainpage-menu .header__main-menu_hidden--mod').show();
      body.classList.add(\"menu-open\");
      
      });
      \$('.main-menu__button').mouseleave(event => {
      if(event.relatedTarget.getAttribute('class') != 'header__wrapper'){
      \$('.nomainpage-menu .header__main-menu_hidden--mod').hide();
      body.classList.remove(\"menu-open\");
      }else{
      \$('.header__wrapper').mouseout(event2 => {
      console.log(event2.relatedTarget.getAttribute('class'));
      });
      }
      \$('.main-menu').mouseleave(() => {
        \$('.nomainpage-menu .main-menu').hide();
        body.classList.remove(\"menu-open\");
      });
      });
      
      \$('.header__search').mouseenter(() => {
      \$('.nomainpage-menu .header__main-menu_hidden--mod').hide();
      body.classList.remove(\"menu-open\");
      });
      
      \$('.header__actions-row').mouseenter(() => {
      \$('.nomainpage-menu .header__main-menu_hidden--mod').hide();
      body.classList.remove(\"menu-open\");
    });
    </script>
    <script>
\t\$('.profile_login__button').click(function(){
\t  \$.ajax({
\t\turl: '";
        // line 731
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

  /* ======================== header burger ======================== */
const burger2 = document.getElementById(\"burger\");
const menu2 = document.getElementById(\"mainMenu\");
";
        // line 752
        echo "
//if (burger && menu && body && html) {
     
  burger2.addEventListener(\"click\", () => {
    if (burger2) {
      burger2.classList.toggle(\"active\");
      if (burger2.classList.contains(\"active\")) {
        if (menu2) menu2.classList.add(\"main-menu--active\");
        if (menu2) menu2.addStyle(\"display\", \"block\");
        if (body) body.classList.add(\"overflow_hidden\");
        if (html) html.classList.add(\"overflow_hidden\");
      } else {
        closeMenu();
      }
    }
  });

  document.addEventListener(\"click\", (event) => {
    if (menu2 && burger2) {
      const clickOnMenu = menu2.contains(event.target);
      const clickOnBurger = burger2.contains(event.target);
      if (!clickOnMenu && !clickOnBurger) {
        closeMenu();
      }
    }
  });

  if (menu2) {
    menu2.addEventListener(\"click\", (event) => {
      if (event.target.tagName === \"IMG\") {
        closeMenu();
      }
    });
  }

  if (closeButton) {
    closeButton.addEventListener(\"click\", () => {
      closeMenu();
    });
  }

  function resize() {
    const screenWidth = window.innerWidth;
    if (screenWidth > 1024) {
      closeMenu();
    }
  }
  window.addEventListener(\"resize\", resize);
  resize();

  function closeMenu() {
    if (menu2) menu2.classList.remove(\"main-menu--active\");
    if (menu2) menu2.addStyle(\"display\", \"none\");
    if (body) body.classList.remove(\"overflow_hidden\");
    if (html) html.classList.remove(\"overflow_hidden\");
    if (burger2) burger2.classList.remove(\"active\");
  }
//}
\t</script>

    ";
        // line 812
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
        return array (  1245 => 812,  1183 => 752,  1162 => 731,  1032 => 604,  1023 => 602,  1018 => 600,  981 => 566,  976 => 564,  941 => 534,  933 => 531,  925 => 528,  917 => 525,  908 => 519,  897 => 511,  890 => 507,  883 => 503,  878 => 501,  871 => 497,  866 => 495,  860 => 491,  854 => 490,  849 => 488,  845 => 487,  840 => 486,  833 => 481,  823 => 477,  819 => 476,  815 => 475,  812 => 474,  807 => 473,  800 => 469,  795 => 467,  792 => 466,  790 => 465,  782 => 460,  778 => 459,  774 => 458,  771 => 457,  768 => 456,  764 => 455,  733 => 426,  724 => 419,  714 => 388,  706 => 383,  693 => 373,  687 => 370,  681 => 367,  678 => 366,  668 => 356,  664 => 355,  659 => 353,  635 => 332,  625 => 325,  615 => 318,  593 => 299,  590 => 298,  586 => 293,  578 => 287,  571 => 285,  564 => 282,  562 => 281,  554 => 276,  546 => 271,  540 => 268,  533 => 264,  527 => 261,  521 => 257,  519 => 256,  511 => 251,  490 => 233,  474 => 220,  454 => 203,  448 => 200,  441 => 196,  432 => 190,  403 => 164,  399 => 163,  394 => 160,  386 => 151,  380 => 148,  376 => 147,  369 => 143,  365 => 142,  358 => 138,  354 => 137,  347 => 133,  343 => 132,  336 => 130,  329 => 126,  321 => 121,  317 => 120,  310 => 116,  306 => 115,  299 => 111,  295 => 110,  289 => 106,  283 => 103,  278 => 102,  268 => 99,  263 => 98,  261 => 97,  243 => 81,  234 => 79,  230 => 78,  227 => 77,  224 => 76,  211 => 75,  204 => 71,  200 => 70,  196 => 69,  190 => 66,  187 => 65,  185 => 64,  182 => 63,  171 => 61,  167 => 60,  164 => 59,  155 => 57,  151 => 56,  146 => 53,  133 => 51,  129 => 50,  113 => 37,  106 => 36,  100 => 34,  97 => 33,  91 => 31,  89 => 30,  85 => 29,  80 => 27,  54 => 6,  47 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/common/header3.twig", "");
    }
}
