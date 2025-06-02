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
class __TwigTemplate_98fefb9ee74d27c8795691c765b7f344ce420b372e876a53602e57669d63d0e0 extends \Twig\Template
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
        // line 39
        echo ($context["title"] ?? null);
        echo "
    </title>
    <base href=\"";
        // line 41
        echo ($context["base"] ?? null);
        echo "\" />
    ";
        // line 42
        if (($context["description"] ?? null)) {
            // line 43
            echo "      <meta name=\"description\" content=\"";
            echo ($context["description"] ?? null);
            echo "\" />
    ";
        }
        // line 45
        echo "    ";
        if (($context["keywords"] ?? null)) {
            // line 46
            echo "      <meta name=\"keywords\" content=\"";
            echo ($context["keywords"] ?? null);
            echo "\" />
    ";
        }
        // line 48
        echo "    <link rel=\"alternate\" href=\"";
        echo ($context["uri"] ?? null);
        echo "\" hreflang=\"";
        echo ($context["hreflang"] ?? null);
        echo "\">
    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 49
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
        // line 62
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["styles"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["style"]) {
            // line 63
            echo "      <link href=\"/";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "href", [], "any", false, false, false, 63);
            echo "\" type=\"text/css\" rel=\"";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "rel", [], "any", false, false, false, 63);
            echo "\" media=\"";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "media", [], "any", false, false, false, 63);
            echo "\" />
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['style'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "    <link href=\"/catalog/view/theme/default/stylesheet/main.css\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"catalog/view/theme/default/stylesheet/style/main.css\" />
    <link href=\"/catalog/view/theme/default/stylesheet/media.css\" rel=\"stylesheet\">
    ";
        // line 68
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["scripts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 69
            echo "      <script src=\"";
            echo $context["script"];
            echo "\" type=\"text/javascript\"></script>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "    <script src=\"catalog/view/javascript/cart_popup/jquery.magnific-popup.min.js\" type=\"text/javascript\"></script>
    <script type=\"text/javascript\" src=\"catalog/view/javascript/cart_popup/cart_popup.js\"></script>
    <script src=\"/catalog/view/javascript/common.js\" type=\"text/javascript\"></script>
    ";
        // line 74
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["links"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
            // line 75
            echo "      <link href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["link"], "href", [], "any", false, false, false, 75);
            echo "\" rel=\"";
            echo twig_get_attribute($this->env, $this->source, $context["link"], "rel", [], "any", false, false, false, 75);
            echo "\" />
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 77
        echo "    <!-- XD stickers start -->
    ";
        // line 78
        if ( !twig_test_empty(($context["xdstickers"] ?? null))) {
            // line 79
            echo "      <style type='text/css'>
\t\t\t\t\t";
            // line 80
            echo ($context["xdstickers_inline_styles"] ?? null);
            echo "
\t\t\t\t\t
\t\t\t\t\t\t
\t\t\t\t\t\t\t.";
            // line 83
            echo twig_get_attribute($this->env, $this->source, ($context["xdsticker"] ?? null), "id", [], "any", false, false, false, 83);
            echo " {
\t\t\t\t\t\t\t\tbackground-color:";
            // line 84
            echo twig_get_attribute($this->env, $this->source, ($context["xdsticker"] ?? null), "bg", [], "any", false, false, false, 84);
            echo ";
\t\t\t\t\t\t\t\tcolor:";
            // line 85
            echo twig_get_attribute($this->env, $this->source, ($context["xdsticker"] ?? null), "color", [], "any", false, false, false, 85);
            echo ";
\t\t\t\t\t\t\t}
\t\t\t\t\t\t
\t\t\t\t\t
\t\t\t\t\t</style> ";
            // line 89
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["xdstickers"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["xdsticker"]) {
                echo " ";
                if ((twig_get_attribute($this->env, $this->source, $context["xdsticker"], "status", [], "any", false, false, false, 89) == "1")) {
                    echo " ";
                }
                echo " ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['xdsticker'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 90
            echo "    ";
        }
        // line 91
        echo "    <!-- XD stickers end -->
    ";
        // line 92
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["analytics"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["analytic"]) {
            // line 93
            echo "      ";
            echo $context["analytic"];
            echo "
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['analytic'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 95
        echo "  </head>
  <body id=\"body\" class=\"body\">
    <header class=\"header\">
      <div class=\"header-top mobile-none\">
        <div class=\"container\">
          <div class=\"header-top__flex\">
            <button type=\"button\" class=\"btn btn-primary open_mob_menu visible-sm visible-xs\" data-toggle=\"modal\" data-target=\"#modal-mob-menu\">
              <i class=\"fa fa-bars\"></i>
            </button>
            <div class=\"header-top__logo logo\">
              ";
        // line 105
        if (($context["logo"] ?? null)) {
            // line 106
            echo "                <a href=\"";
            echo ($context["home"] ?? null);
            echo "\">
                  <img src=\"";
            // line 107
            echo ($context["logo"] ?? null);
            echo "\" title=\"";
            echo ($context["name"] ?? null);
            echo "\" alt=\"";
            echo ($context["name"] ?? null);
            echo "\" class=\"img-responsive\" />
                </a>
              ";
        } else {
            // line 110
            echo "                <a href=\"";
            echo ($context["home"] ?? null);
            echo "\">
                  ";
            // line 111
            echo ($context["name"] ?? null);
            echo "
                </a>
              ";
        }
        // line 114
        echo "            </div>
            <nav class=\"header-top__nav nav-top\">
              <ul class=\"nav-top__list list-unstyled\">
                <li class=\"nav-top__item\">
                  <a href=\"";
        // line 118
        echo ($context["link_special"] ?? null);
        echo "\" class=\"nav-top__link\">
                    ";
        // line 119
        echo ($context["text_special"] ?? null);
        echo "
                  </a>
                </li>
                <li class=\"nav-top__item\">
                  <a href=\"";
        // line 123
        echo ($context["link_news"] ?? null);
        echo "\" class=\"nav-top__link\">
                    ";
        // line 124
        echo ($context["text_news"] ?? null);
        echo "
                  </a>
                </li>
                <li class=\"nav-top__item\">
                  <a href=\"";
        // line 128
        echo ($context["link_bestseller"] ?? null);
        echo "\" class=\"nav-top__link\">
                    ";
        // line 129
        echo ($context["text_bestseller"] ?? null);
        echo "
                  </a>
                </li>
                <li class=\"nav-top__item dropdown\">
                  <a href=\"#\" class=\"nav-top__link\" data-toggle=\"dropdown\">
                    ";
        // line 134
        echo ($context["text_buyer"] ?? null);
        echo "
                    <i class=\"fa fa-angle-down\"></i>
                  </a>
                  <ul class=\"nav-top__dropdown dropdown-menu list-unstyled\">
                    <!-- <li><a href=\"";
        // line 138
        echo ($context["link_register"] ?? null);
        echo "\">";
        echo ($context["text_register_instr"] ?? null);
        echo "</a></li> -->
                    <li>
                      <a href=\"";
        // line 140
        echo ($context["link_store"] ?? null);
        echo "\">
                        ";
        // line 141
        echo ($context["text_store"] ?? null);
        echo "
                      </a>
                    </li>
                    <li>
                      <a href=\"";
        // line 145
        echo ($context["link_services"] ?? null);
        echo "\">
                        ";
        // line 146
        echo ($context["text_services"] ?? null);
        echo "
                      </a>
                    </li>
                    <li>
                      <a href=\"";
        // line 150
        echo ($context["link_delivery"] ?? null);
        echo "\">
                        ";
        // line 151
        echo ($context["text_delivery"] ?? null);
        echo "
                      </a>
                    </li>
                    <li>
                      <a href=\"";
        // line 155
        echo ($context["link_black_list"] ?? null);
        echo "\">
                        ";
        // line 156
        echo ($context["text_black_list"] ?? null);
        echo "
                      </a>
                    </li>
                  <!-- <li><a href=\"";
        // line 159
        echo ($context["link_partner"] ?? null);
        echo "\">";
        echo ($context["text_partner"] ?? null);
        echo "</a></li>-->
                  </ul>
                </li>
              ";
        // line 168
        echo "              </ul>
            </nav>
            <div class=\"header-top__phone\">
              <a class=\"binct-phone-number-1\" href=\"tel:";
        // line 171
        echo ($context["telephone"] ?? null);
        echo "\">
                ";
        // line 172
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
        // line 198
        echo ($context["text_show"] ?? null);
        echo "
                                  </u>
                                </span>
                              </a>
                            </li>
                            <li class=\"cool\">
                              ";
        // line 204
        echo ($context["text_call_receiving"] ?? null);
        echo "
                              :
                            </li>
                            <li>
                              ";
        // line 208
        echo ($context["text_schedule1"] ?? null);
        echo "
                            </li>
                            <li>
                              ";
        // line 211
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
        // line 228
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
        // line 241
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
        // line 259
        echo ($context["language"] ?? null);
        echo "
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class=\"header-second\">
        <div class=\"header__container\">
          <div class=\"header__wrapper\">
            <div class=\"header__main-menu\">
              <a href=\"";
        // line 269
        echo ($context["catalog"] ?? null);
        echo "\" type=\"button\" class=\"main-menu__button main-menu__button-js\">
                <span class=\"main-menu__button-deco\">
                  <svg>
                    <use href=\"catalog/view/theme/default/image/icons.svg#catalog\"></use>
                  </svg>
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
                  <svg>
                    <use href=\"catalog/view/theme/default/image/icons.svg#search\"></use>
                  </svg>
                </span>
              </div>
            </div>

            <div class=\"header__actions-row\">
              <div class=\"header-actions__item header-actions__cart\">
                ";
        // line 297
        echo ($context["cart"] ?? null);
        echo "
              </div>
              <div class=\"header-actions__item header-actions__wishlist header-wishlist\">
                <a href=\"";
        // line 300
        echo ($context["wishlist"] ?? null);
        echo "\" id=\"wishlist-total\" class=\"header-wishlist__link header-actions__link\">
                  <svg class=\"svg-icon\">
                    <use xlink:href=\"/image/sprite.svg#heart\"></use>
                  </svg>
                  <span>
                    ";
        // line 305
        echo ($context["text_wishlist"] ?? null);
        echo "
                  </span>
                </a>
              </div>
              <div class=\"header-actions__item header-actions__user header-user\">
                ";
        // line 310
        if (($context["logged"] ?? null)) {
            // line 311
            echo "                  <a href=\"";
            echo ($context["account"] ?? null);
            echo "\" class=\"header-user__link\">
                    <svg class=\"svg-icon\">
                      <use xlink:href=\"/image/sprite.svg#user\"></use>
                    </svg><!-- ";
            // line 314
            echo ($context["login_name"] ?? null);
            echo " <span>(";
            echo ($context["customer_percent"] ?? null);
            echo "%)</span>--></a>
                ";
        } else {
            // line 316
            echo "                  <a data-fancybox data-touch=\"false\" href=\"#user-login\" class=\"header-user__link\">
                    <svg class=\"svg-icon\">
                      <use xlink:href=\"/image/sprite.svg#user\"></use>
                    </svg>
                  </a>
                ";
        }
        // line 322
        echo "                <div class=\"fancybox-hidden profile_login active\" style=\"display: none;\" id=\"user-login\">
                  <div class=\"profile_login__content\">
                    ";
        // line 327
        echo "                    <h2 class=\"profile_login__title\">
                      ";
        // line 328
        echo ($context["text_login"] ?? null);
        echo "
                    </h2>
                    <div class=\"alert alert-danger alert-dismissible\" style=\"display: none;\">
                      <i class=\"fa fa-exclamation-circle\"></i>
                    </div>
                    <div class=\"profile_login__body\">
                      <form action=\"";
        // line 334
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"login-form\">
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
        // line 347
        echo ($context["text_forgotten"] ?? null);
        echo "
                            </a>
                          </div>
                          <input class=\"input--profile_mod\" id=\"passwordLogin\" type=\"password\" placeholder=\"Пароль\" name=\"password\" required />
                        </div>
                        <button class=\"button profile_login__button\" type=\"button\">
                          <p>
                            ";
        // line 354
        echo ($context["text_sing_in"] ?? null);
        echo "
                          </p>
                        </button>
                      </form>
                      <div class=\"profile_login__or\">
                        <span class=\"profile_login__or_deco\"></span>
                        <span class=\"profile_login__or_text\">
                          ";
        // line 361
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
        // line 382
        echo ($context["text_yet_guest"] ?? null);
        echo "
                      </p>
                      <a class=\"profile_login__footer_register\" href=\"";
        // line 384
        echo ($context["register"] ?? null);
        echo "\">
                        ";
        // line 385
        echo ($context["text_register"] ?? null);
        echo "
                      </a>
                    </div>
                  </div>
                </div>
                <div class=\"profile_login active\" id=\"forgotten-password\" style=\"display: none;\">
                  <div class=\"profile_login__content\">
                    ";
        // line 395
        echo "                    <h2 class=\"profile_login__title profile_login__title--resset_mod\">
                      ";
        // line 396
        echo ($context["text_forgotten"] ?? null);
        echo "
                    </h2>
                    <p class=\"profile_login__description\">
                      ";
        // line 399
        echo ($context["text_password_instruction"] ?? null);
        echo "
                    </p>
                    <div class=\"profile_login__body\">
                      <form action=\"";
        // line 402
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
        // line 412
        echo ($context["button_back"] ?? null);
        echo "
                            </p>
                          </button>
                          <button class=\"button profile_login__button\" type=\"submit\">
                            <p>
                              ";
        // line 417
        echo ($context["button_continue"] ?? null);
        echo "
                            </p>
                          </button>
                        </div>
                      </form>
                    </div>
                  </div>
                ";
        // line 450
        echo "                </div>
              </div>

              <nav id=\"mainMenu\" class=\"main-menu mob-menu\">
                <div class=\"main-menu__drop\">
                  <div class=\"main-menu__row\">
                    <a href=\"#\" class=\"main-menu__row-logo\">
                      <img src=\"catalog/view/theme/default/image//header/logo.svg\" alt=\"Logo\" />
                    </a>
                    <div class=\"main-menu__row-languages\">
                      <button class=\"main-menu__row-button main-menu__row-button--active main-menu__row-ua\">
                        УКР
                      </button>
                      <span>
                        |
                      </span>
                      <button class=\"main-menu__row-button main-menu__row-ru\">
                        РУС
                      </button>
                    </div>
                  </div>
                  <button type=\"button\" class=\"main-menu__button-drop\">
                    <span class=\"main-menu__button-drop-deco\">
                      <svg>
                        <use href=\"catalog/view/theme/default/image/icons.svg#fire\"></use>
                      </svg>
                    </span>
                    Каталог товарів
                  </button>

                  <button id=\"closeButton\" class=\"main-menu__button-close\">
                    <span class=\"main-menu__button-close_icon\">
                      <svg>
                        <use href=\"catalog/view/theme/default/image/icons.svg#close\"></use>
                      </svg>
                    </span>
                  </button>
                  <ul class=\"main-menu__list\">
                    ";
        // line 488
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 489
            echo "                      ";
            if (twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 489)) {
                // line 490
                echo "                        <li class=\"main-menu__list-item\">
                          <a href=\"";
                // line 491
                echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 491);
                echo "\" class=\"main-menu__link\">
                            <svg class=\"main-menu__link-icon\">
                              <use href=\"/image/sprite-category.svg#";
                // line 493
                echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 493);
                echo "\"></use>
                            </svg>
                            ";
                // line 495
                echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 495);
                echo "
                          </a>
                          <div class=\"main-nav__dropdown main-nav-dropdown\">
                            <div class=\"main-nav-dropdown__wrapper\">
                              <ul class=\"main-nav-dropdown__list\">
                                ";
                // line 500
                if ((twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 500) == 73)) {
                    // line 501
                    echo "                                  <li class=\"main-nav-dropdown__item\">
                                    <a class=\"main-nav-dropdown__link\" href=\"";
                    // line 502
                    echo ($context["href_acum"] ?? null);
                    echo "\">
                                      <img src=\"/image/acum.jpg\" alt=\"\" style=\"width: 70px; height: 70px;\">
                                      <p>
                                        ";
                    // line 505
                    echo ($context["text_acum"] ?? null);
                    echo "
                                      </p>
                                    </a>
                                  </li>
                                ";
                }
                // line 510
                echo "                                ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 510));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    // line 511
                    echo "                                  <li class=\"main-nav-dropdown__item\">
                                    <a class=\"main-nav-dropdown__link\" href=\"";
                    // line 512
                    echo twig_get_attribute($this->env, $this->source, $context["child"], "href", [], "any", false, false, false, 512);
                    echo "\">
                                      <img src=\"";
                    // line 513
                    echo twig_get_attribute($this->env, $this->source, $context["child"], "image", [], "any", false, false, false, 513);
                    echo "\" alt=\"Product\" />
                                      <p>
                                        ";
                    // line 515
                    echo twig_get_attribute($this->env, $this->source, $context["child"], "name", [], "any", false, false, false, 515);
                    echo "
                                      </p>
                                    </a>
                                  </li>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 520
                echo "                              </ul>
                            </div>
                          </div>
                        </li>
                      ";
            } else {
                // line 525
                echo "                        <li class=\"main-menu__list-item\">
                          <a class=\"main-menu__link\" href=\"";
                // line 526
                echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 526);
                echo "\">
                            <svg class=\"main-menu__link-icon\">
                              <use xlink:href=\"/image/sprite-category.svg#";
                // line 528
                echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 528);
                echo "\"></use>
                            </svg>
                            ";
                // line 530
                echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 530);
                echo "
                          </a>
                        </li>
                      ";
            }
            // line 534
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 535
        echo "                  </ul>

                  <ul class=\"main-menu__list--secondary desctop-none\">
                    <li class=\"main-menu__list-item\">
                      <a href=\"";
        // line 539
        echo ($context["link_special"] ?? null);
        echo "\" class=\"main-menu__link\">
                        <svg class=\"main-menu__link-icon\">
                          <use href=\"catalog/view/theme/default/image/icons.svg#promotion\"></use>
                        </svg>
                        ";
        // line 543
        echo ($context["text_special"] ?? null);
        echo "
                      </a>
                    </li>
                    <li class=\"main-menu__list-item\">
                      <a href=\"";
        // line 547
        echo ($context["link_bestseller"] ?? null);
        echo "\" class=\"main-menu__link\">
                        <svg class=\"main-menu__link-icon\">
                          <use href=\"catalog/view/theme/default/image/icons.svg#bestseller\"></use>
                        </svg>
                        ";
        // line 551
        echo ($context["text_bestseller"] ?? null);
        echo "
                      </a>
                    </li>
                    <li class=\"main-menu__list-item\">
                      <a href=\"";
        // line 555
        echo ($context["link_news"] ?? null);
        echo "\" class=\"main-menu__link\">
                        <svg class=\"main-menu__link-icon\" width=\"22\" height=\"21\" viewBox=\"0 0 22 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                          <path d=\"M8.74712 1.2573C9.47552 0.528902 10.5044 0.185956 11.5241 0.331635L17.3738 1.1673C18.8138 1.37301 19.9451 2.50438 20.1508 3.94431L20.9865 9.79404C21.1322 10.8138 20.7892 11.8427 20.0608 12.5711L12.0255 20.6063C11.635 20.9969 11.0019 20.9969 10.6113 20.6063L0.711843 10.7069C0.321313 10.3163 0.321313 9.68317 0.711843 9.29257L8.74712 1.2573ZM12.7327 8.58547C13.5137 9.36657 14.78 9.36657 15.5611 8.58547C16.3421 7.80445 16.3421 6.53812 15.5611 5.75707C14.78 4.97603 13.5137 4.97603 12.7327 5.75707C11.9516 6.53812 11.9516 7.80445 12.7327 8.58547Z\" fill=\"#ed6e00\" />
                        </svg>
                        ";
        // line 559
        echo ($context["text_news"] ?? null);
        echo "
                      </a>
                    </li>
                    <li class=\"main-menu__list-item\">
                      <a href=\"javascript:void(0)\" class=\"main-menu__link buyer-link\" onclick=\"openSubMenu();\">
                        <svg class=\"main-menu__link-icon\" width=\"21\" height=\"21\" viewBox=\"0 0 21 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                          <path d=\"M0.833496 20.1666C0.833496 16.1165 4.11674 12.8333 8.16683 12.8333C12.2169 12.8333 15.5002 16.1165 15.5002 20.1666H0.833496ZM8.16683 11.9166C5.12808 11.9166 2.66683 9.45538 2.66683 6.41663C2.66683 3.37788 5.12808 0.916626 8.16683 0.916626C11.2056 0.916626 13.6668 3.37788 13.6668 6.41663C13.6668 9.45538 11.2056 11.9166 8.16683 11.9166ZM14.9161 13.9637C17.7443 14.6865 19.8707 17.1632 20.0685 20.1666H17.3335C17.3335 17.7743 16.417 15.596 14.9161 13.9637ZM13.0619 11.8771C14.5586 10.5345 15.5002 8.58552 15.5002 6.41663C15.5002 5.1174 15.1623 3.89709 14.5697 2.83876C16.6692 3.25777 18.2502 5.11006 18.2502 7.33329C18.2502 9.86558 16.1991 11.9166 13.6668 11.9166C13.4618 11.9166 13.2598 11.9032 13.0619 11.8771Z\" fill=\"#ed6e00\" />
                        </svg>
                        ";
        // line 567
        echo ($context["text_buyer"] ?? null);
        echo "
                      </a>
                      <div class=\"main-nav--secondary__dropdown secondary-menu__dropdown\">
                        <div class=\"secondary-menu__wrapper\">
                          <ul class=\"secondary-menu__list-list\">
                            <li class=\"secondary-menu__item\">
                              <a class=\"secondary-menu__link\" href=\"";
        // line 573
        echo ($context["link_store"] ?? null);
        echo "\">
                                ";
        // line 574
        echo ($context["text_store"] ?? null);
        echo "
                              </a>
                            </li>
                            <li class=\"secondary-menu__item\">
                              <a class=\"secondary-menu__link\" href=\"";
        // line 578
        echo ($context["link_services"] ?? null);
        echo "\">
                                ";
        // line 579
        echo ($context["text_services"] ?? null);
        echo "
                              </a>
                            </li>
                            <li class=\"secondary-menu__item\">
                              <a class=\"secondary-menu__link\" href=\"";
        // line 583
        echo ($context["link_delivery"] ?? null);
        echo "\">
                                ";
        // line 584
        echo ($context["text_delivery"] ?? null);
        echo "
                              </a>
                            </li>
                            <li class=\"secondary-menu__item\">
                              <a class=\"secondary-menu__link\" href=\"";
        // line 588
        echo ($context["link_black_list"] ?? null);
        echo "\">
                                ";
        // line 589
        echo ($context["text_black_list"] ?? null);
        echo "
                              </a>
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
                          <path d=\"M18 13.42V16.9561C18 17.4811 17.5941 17.9167 17.0705 17.9537C16.6331 17.9846 16.2763 18 16 18C7.1634 18 0 10.8366 0 2C0 1.72371 0.01545 1.36687 0.04635 0.9295C0.08337 0.40588 0.51894 0 1.04386 0H4.5801C4.83678 0 5.05176 0.19442 5.07753 0.4498C5.10067 0.67907 5.12218 0.86314 5.14207 1.00202C5.34435 2.41472 5.75753 3.75936 6.3487 5.00303C6.44359 5.20265 6.38171 5.44159 6.20185 5.57006L4.04355 7.1118C5.35752 10.1811 7.8189 12.6425 10.8882 13.9565L12.4271 11.8019C12.5572 11.6199 12.799 11.5573 13.001 11.6532C14.2446 12.2439 15.5891 12.6566 17.0016 12.8584C17.1396 12.8782 17.3225 12.8995 17.5502 12.9225C17.8056 12.9483 18 13.1633 18 13.42Z\" fill=\"#ed6e00\" />
                        </svg>
                        0 800 333 900
                      </a>
                    </li>
                    <li class=\"main-menu__list-item main-nav__contact-item\">
                      <a href=\"mailto:info@procraft.ua\" class=\"main-menu__link main-nav__contact-link\">
                        <svg class=\"main-menu__link-icon\" width=\"20\" height=\"18\" viewBox=\"0 0 20 18\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                          <path d=\"M1 0H19C19.5523 0 20 0.44772 20 1V17C20 17.5523 19.5523 18 19 18H1C0.44772 18 0 17.5523 0 17V1C0 0.44772 0.44772 0 1 0ZM10.0606 8.6829L3.64722 3.2377L2.35278 4.7623L10.0731 11.3171L17.6544 4.75616L16.3456 3.24384L10.0606 8.6829Z\" fill=\"#ed6e00\" />
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
        // line 620
        echo ($context["link_special"] ?? null);
        echo "\" class=\"main-menu__link main-nav__contact-link\">
                        <svg class=\"main-menu__link-icon\">
                          <use href=\"catalog/view/theme/default/image/icons.svg#promotion\"></use>
                        </svg>
                        ";
        // line 624
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
                <nav class=\"main-menu2\">
                  <div class=\"main-menu__drop\">
                    <div class=\"main-menu__row\">
                      <a href=\"#\" class=\"main-menu__row-logo\">
                        <img src=\"catalog/view/theme/default/image//header/logo.svg\" alt=\"Logo\" />
                      </a>
                      <div class=\"main-menu__row-languages\">
                        <button class=\"main-menu__row-button main-menu__row-button--active main-menu__row-ua\">
                          УКР
                        </button>
                        <span>
                          |
                        </span>
                        <button class=\"main-menu__row-button main-menu__row-ru\">
                          РУС
                        </button>
                      </div>
                    </div>
                    <button type=\"button\" class=\"main-menu__button-drop\">
                      <span class=\"main-menu__button-drop-deco\">
                        <svg>
                          <use href=\"catalog/view/theme/default/image/icons.svg#fire\"></use>
                        </svg>
                      </span>
                      Каталог товарів
                    </button>

                    <button id=\"closeButton\" class=\"main-menu__button-close\">
                      <span class=\"main-menu__button-close_icon\">
                        <svg>
                          <use href=\"catalog/view/theme/default/image/icons.svg#close\"></use>
                        </svg>
                      </span>
                    </button>
                    <ul class=\"main-menu__list\">
                      ";
        // line 675
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["categories"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
            // line 676
            echo "                        ";
            if (twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 676)) {
                // line 677
                echo "                          <li class=\"main-menu__list-item\">
                            <a href=\"";
                // line 678
                echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 678);
                echo "\" class=\"main-menu__link\">
                              <svg class=\"main-menu__link-icon\">
                                <use href=\"/image/sprite-category.svg#";
                // line 680
                echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 680);
                echo "\"></use>
                              </svg>
                              ";
                // line 682
                echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 682);
                echo "
                            </a>
                            <div class=\"main-nav__dropdown main-nav-dropdown\">
                              <div class=\"main-nav-dropdown__wrapper\">
                                <ul class=\"main-nav-dropdown__list\">
                                  ";
                // line 687
                if ((twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 687) == 73)) {
                    // line 688
                    echo "                                    <li class=\"main-nav-dropdown__item\">
                                      <a class=\"main-nav-dropdown__link\" href=\"";
                    // line 689
                    echo ($context["href_acum"] ?? null);
                    echo "\">
                                        <img src=\"/image/acum.jpg\" alt=\"\" style=\"width: 70px; height: 70px;\">
                                        <p>
                                          ";
                    // line 692
                    echo ($context["text_acum"] ?? null);
                    echo "
                                        </p>
                                      </a>
                                    </li>
                                  ";
                }
                // line 697
                echo "                                  ";
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 697));
                foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                    // line 698
                    echo "                                    <li class=\"main-nav-dropdown__item\">
                                      <a class=\"main-nav-dropdown__link\" href=\"";
                    // line 699
                    echo twig_get_attribute($this->env, $this->source, $context["child"], "href", [], "any", false, false, false, 699);
                    echo "\">
                                        <img src=\"";
                    // line 700
                    echo twig_get_attribute($this->env, $this->source, $context["child"], "image", [], "any", false, false, false, 700);
                    echo "\" alt=\"Product\" />
                                        <p>
                                          ";
                    // line 702
                    echo twig_get_attribute($this->env, $this->source, $context["child"], "name", [], "any", false, false, false, 702);
                    echo "
                                        </p>
                                      </a>
                                    </li>
                                  ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 707
                echo "                                </ul>
                              </div>
                            </div>
                          </li>
                        ";
            } else {
                // line 712
                echo "                          <li class=\"main-menu__list-item\">
                            <a class=\"main-menu__link\" href=\"";
                // line 713
                echo twig_get_attribute($this->env, $this->source, $context["category"], "href", [], "any", false, false, false, 713);
                echo "\">
                              <svg class=\"main-menu__link-icon\">
                                <use xlink:href=\"/image/sprite-category.svg#";
                // line 715
                echo twig_get_attribute($this->env, $this->source, $context["category"], "category_id", [], "any", false, false, false, 715);
                echo "\"></use>
                              </svg>
                              ";
                // line 717
                echo twig_get_attribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 717);
                echo "
                            </a>
                          </li>
                        ";
            }
            // line 721
            echo "                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['category'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 722
        echo "                    </ul>

                    <ul class=\"main-menu__list--secondary desctop-none\">
                      <li class=\"main-menu__list-item\">
                        <a href=\"";
        // line 726
        echo ($context["link_special"] ?? null);
        echo "\" class=\"main-menu__link\">
                          <svg class=\"main-menu__link-icon\">
                            <use href=\"catalog/view/theme/default/image/icons.svg#promotion\"></use>
                          </svg>
                          ";
        // line 730
        echo ($context["text_special"] ?? null);
        echo "
                        </a>
                      </li>
                      <li class=\"main-menu__list-item\">
                        <a href=\"";
        // line 734
        echo ($context["link_bestseller"] ?? null);
        echo "\" class=\"main-menu__link\">
                          <svg class=\"main-menu__link-icon\">
                            <use href=\"catalog/view/theme/default/image/icons.svg#bestseller\"></use>
                          </svg>
                          ";
        // line 738
        echo ($context["text_bestseller"] ?? null);
        echo "
                        </a>
                      </li>
                      <li class=\"main-menu__list-item\">
                        <a href=\"";
        // line 742
        echo ($context["link_news"] ?? null);
        echo "\" class=\"main-menu__link\">
                          <svg class=\"main-menu__link-icon\" width=\"22\" height=\"21\" viewBox=\"0 0 22 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                            <path d=\"M8.74712 1.2573C9.47552 0.528902 10.5044 0.185956 11.5241 0.331635L17.3738 1.1673C18.8138 1.37301 19.9451 2.50438 20.1508 3.94431L20.9865 9.79404C21.1322 10.8138 20.7892 11.8427 20.0608 12.5711L12.0255 20.6063C11.635 20.9969 11.0019 20.9969 10.6113 20.6063L0.711843 10.7069C0.321313 10.3163 0.321313 9.68317 0.711843 9.29257L8.74712 1.2573ZM12.7327 8.58547C13.5137 9.36657 14.78 9.36657 15.5611 8.58547C16.3421 7.80445 16.3421 6.53812 15.5611 5.75707C14.78 4.97603 13.5137 4.97603 12.7327 5.75707C11.9516 6.53812 11.9516 7.80445 12.7327 8.58547Z\" fill=\"#ed6e00\" />
                          </svg>
                          ";
        // line 746
        echo ($context["text_news"] ?? null);
        echo "
                        </a>
                      </li>
                      <li class=\"main-menu__list-item\">
                        <a href=\"javascript:void(0)\" class=\"main-menu__link buyer-link\" onclick=\"openSubMenu();\">
                          <svg class=\"main-menu__link-icon\" width=\"21\" height=\"21\" viewBox=\"0 0 21 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                            <path d=\"M0.833496 20.1666C0.833496 16.1165 4.11674 12.8333 8.16683 12.8333C12.2169 12.8333 15.5002 16.1165 15.5002 20.1666H0.833496ZM8.16683 11.9166C5.12808 11.9166 2.66683 9.45538 2.66683 6.41663C2.66683 3.37788 5.12808 0.916626 8.16683 0.916626C11.2056 0.916626 13.6668 3.37788 13.6668 6.41663C13.6668 9.45538 11.2056 11.9166 8.16683 11.9166ZM14.9161 13.9637C17.7443 14.6865 19.8707 17.1632 20.0685 20.1666H17.3335C17.3335 17.7743 16.417 15.596 14.9161 13.9637ZM13.0619 11.8771C14.5586 10.5345 15.5002 8.58552 15.5002 6.41663C15.5002 5.1174 15.1623 3.89709 14.5697 2.83876C16.6692 3.25777 18.2502 5.11006 18.2502 7.33329C18.2502 9.86558 16.1991 11.9166 13.6668 11.9166C13.4618 11.9166 13.2598 11.9032 13.0619 11.8771Z\" fill=\"#ed6e00\" />
                          </svg>
                          ";
        // line 754
        echo ($context["text_buyer"] ?? null);
        echo "
                        </a>
                        <div class=\"main-nav--secondary__dropdown secondary-menu__dropdown\">
                          <div class=\"secondary-menu__wrapper\">
                            <ul class=\"secondary-menu__list-list\">
                              <li class=\"secondary-menu__item\">
                                <a class=\"secondary-menu__link\" href=\"";
        // line 760
        echo ($context["link_store"] ?? null);
        echo "\">
                                  ";
        // line 761
        echo ($context["text_store"] ?? null);
        echo "
                                </a>
                              </li>
                              <li class=\"secondary-menu__item\">
                                <a class=\"secondary-menu__link\" href=\"";
        // line 765
        echo ($context["link_services"] ?? null);
        echo "\">
                                  ";
        // line 766
        echo ($context["text_services"] ?? null);
        echo "
                                </a>
                              </li>
                              <li class=\"secondary-menu__item\">
                                <a class=\"secondary-menu__link\" href=\"";
        // line 770
        echo ($context["link_delivery"] ?? null);
        echo "\">
                                  ";
        // line 771
        echo ($context["text_delivery"] ?? null);
        echo "
                                </a>
                              </li>
                              <li class=\"secondary-menu__item\">
                                <a class=\"secondary-menu__link\" href=\"";
        // line 775
        echo ($context["link_black_list"] ?? null);
        echo "\">
                                  ";
        // line 776
        echo ($context["text_black_list"] ?? null);
        echo "
                                </a>
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
                            <path d=\"M18 13.42V16.9561C18 17.4811 17.5941 17.9167 17.0705 17.9537C16.6331 17.9846 16.2763 18 16 18C7.1634 18 0 10.8366 0 2C0 1.72371 0.01545 1.36687 0.04635 0.9295C0.08337 0.40588 0.51894 0 1.04386 0H4.5801C4.83678 0 5.05176 0.19442 5.07753 0.4498C5.10067 0.67907 5.12218 0.86314 5.14207 1.00202C5.34435 2.41472 5.75753 3.75936 6.3487 5.00303C6.44359 5.20265 6.38171 5.44159 6.20185 5.57006L4.04355 7.1118C5.35752 10.1811 7.8189 12.6425 10.8882 13.9565L12.4271 11.8019C12.5572 11.6199 12.799 11.5573 13.001 11.6532C14.2446 12.2439 15.5891 12.6566 17.0016 12.8584C17.1396 12.8782 17.3225 12.8995 17.5502 12.9225C17.8056 12.9483 18 13.1633 18 13.42Z\" fill=\"#ed6e00\" />
                          </svg>
                          0 800 333 900
                        </a>
                      </li>
                      <li class=\"main-menu__list-item main-nav__contact-item\">
                        <a href=\"mailto:info@procraft.ua\" class=\"main-menu__link main-nav__contact-link\">
                          <svg class=\"main-menu__link-icon\" width=\"20\" height=\"18\" viewBox=\"0 0 20 18\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                            <path d=\"M1 0H19C19.5523 0 20 0.44772 20 1V17C20 17.5523 19.5523 18 19 18H1C0.44772 18 0 17.5523 0 17V1C0 0.44772 0.44772 0 1 0ZM10.0606 8.6829L3.64722 3.2377L2.35278 4.7623L10.0731 11.3171L17.6544 4.75616L16.3456 3.24384L10.0606 8.6829Z\" fill=\"#ed6e00\" />
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
        // line 807
        echo ($context["link_special"] ?? null);
        echo "\" class=\"main-menu__link main-nav__contact-link\">
                          <svg class=\"main-menu__link-icon\">
                            <use href=\"catalog/view/theme/default/image/icons.svg#promotion\"></use>
                          </svg>
                          ";
        // line 811
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
        // line 819
        echo ($context["content_full"] ?? null);
        echo "
                <div class=\"hero__bottom-row\">
                  <a href=\"";
        // line 821
        echo ($context["link_special"] ?? null);
        echo "\" class=\"hero__bottom-item\">
                    <img class=\"hero__bottom-icon\" src=\"catalog/view/theme/default/image//hero/icon-1.svg\" alt=\"Icon\" />
                    <p>
                      ";
        // line 824
        echo ($context["text_special"] ?? null);
        echo "
                    </p>
                  </a>
                  <a href=\"";
        // line 827
        echo ($context["link_bestseller"] ?? null);
        echo "\" class=\"hero__bottom-item\">
                    <img class=\"hero__bottom-icon\" src=\"catalog/view/theme/default/image//hero/icon-2.svg\" alt=\"Icon\" />
                    <p>
                      ";
        // line 830
        echo ($context["text_bestseller"] ?? null);
        echo "
                    </p>
                  </a>
                  <a href=\"";
        // line 833
        echo ($context["link_news"] ?? null);
        echo "\" class=\"hero__bottom-item\">
                    <img class=\"hero__bottom-icon\" src=\"catalog/view/theme/default/image//hero/icon-3.svg\" alt=\"Icon\" />
                    <p>
                      ";
        // line 836
        echo ($context["text_news"] ?? null);
        echo "
                    </p>
                  </a>
                </div>
              </div>
            </div>
          </div>
        </section>
        ";
        // line 844
        echo ($context["content_top"] ?? null);
        echo "

        ";
        // line 846
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

    let elem = document.querySelector('.hero__content');
    let coords = elem.getBoundingClientRect();

    \$('.main-nav-dropdown').css('left', coords.left - 50 + 'px');
    \$('.main-nav-dropdown').css('width', coords.width + +10 + 'px');
</script>

      <script>
\$('.profile_login__button').click(function(){
  \$.ajax({
    url: '";
        // line 875
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

let elem3 = document.querySelector('.main-menu__button');
let coords2 = elem3.getBoundingClientRect();
\$('.main-menu2').css('left', coords2.left + 'px');


    window.addEventListener(\"scroll\", function () {
      if(window.innerWidth > 1024){
        if (window.pageYOffset > 600) {
          \$('.main-menu__button').mouseenter(() => {
          if (window.pageYOffset > 600) { 
            body.classList.add(\"menu-open\");
            \$('.main-menu2').css('position', 'fixed');
            \$('.main-menu2').css('top', '144px');
            \$('.main-menu2').css('z-index', '1000');
            let elem2 = document.querySelector('.header__main-menu');
            let coords = elem2.getBoundingClientRect();
            \$('.main-nav__dropdown').addClass('scroll-dropdown');
            \$('.main-menu2').css('left', coords.left + 'px');
          }
        });
         \$('.main-menu__button').mouseleave(event => {
          if(event.relatedTarget.getAttribute('class') != 'header__wrapper'){
            body.classList.remove(\"menu-open\");
            \$('.main-menu2').css('position', 'absolute');
            \$('.main-nav__dropdown').removeClass('scroll-dropdown');
          }
          \$('.main-menu2').mouseleave(() => {
            body.classList.remove(\"menu-open\");
            \$('.main-menu2').css('position', 'absolute');
            \$('.main-nav__dropdown').removeClass('scroll-dropdown');
          });
        });
      
        \$('.header__search').mouseenter(() => {
          body.classList.remove(\"menu-open\");
          \$('.main-menu2').css('position', 'absolute');
          \$('.main-nav__dropdown').removeClass('scroll-dropdown');
         });
      
        \$('.header__actions-row').mouseenter(() => {
          body.classList.remove(\"menu-open\");
          \$('.main-menu2').css('position', 'absolute');
          \$('.main-nav__dropdown').removeClass('scroll-dropdown');
        }); 
        
      } else {
        body.classList.remove(\"menu-open\");
        \$('.main-menu2').css('position', 'absolute');
        \$('.main-nav__dropdown').removeClass('scroll-dropdown');
        \$('.main-menu__button').mouseenter(() => {

        });
      }
      if (window.pageYOffset <= 600) {
        \$('.main-menu2').css('position', 'absolute');
        \$('.main-nav__dropdown').removeClass('scroll-dropdown');
        \$('.main-menu__button').mouseenter(() => {
        });
      }
      }
    });

    \$('')
</script>

      ";
        // line 955
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
        return array (  1485 => 955,  1402 => 875,  1370 => 846,  1365 => 844,  1354 => 836,  1348 => 833,  1342 => 830,  1336 => 827,  1330 => 824,  1324 => 821,  1319 => 819,  1308 => 811,  1301 => 807,  1267 => 776,  1263 => 775,  1256 => 771,  1252 => 770,  1245 => 766,  1241 => 765,  1234 => 761,  1230 => 760,  1221 => 754,  1210 => 746,  1203 => 742,  1196 => 738,  1189 => 734,  1182 => 730,  1175 => 726,  1169 => 722,  1163 => 721,  1156 => 717,  1151 => 715,  1146 => 713,  1143 => 712,  1136 => 707,  1125 => 702,  1120 => 700,  1116 => 699,  1113 => 698,  1108 => 697,  1100 => 692,  1094 => 689,  1091 => 688,  1089 => 687,  1081 => 682,  1076 => 680,  1071 => 678,  1068 => 677,  1065 => 676,  1061 => 675,  1007 => 624,  1000 => 620,  966 => 589,  962 => 588,  955 => 584,  951 => 583,  944 => 579,  940 => 578,  933 => 574,  929 => 573,  920 => 567,  909 => 559,  902 => 555,  895 => 551,  888 => 547,  881 => 543,  874 => 539,  868 => 535,  862 => 534,  855 => 530,  850 => 528,  845 => 526,  842 => 525,  835 => 520,  824 => 515,  819 => 513,  815 => 512,  812 => 511,  807 => 510,  799 => 505,  793 => 502,  790 => 501,  788 => 500,  780 => 495,  775 => 493,  770 => 491,  767 => 490,  764 => 489,  760 => 488,  720 => 450,  710 => 417,  702 => 412,  689 => 402,  683 => 399,  677 => 396,  674 => 395,  664 => 385,  660 => 384,  655 => 382,  631 => 361,  621 => 354,  611 => 347,  595 => 334,  586 => 328,  583 => 327,  579 => 322,  571 => 316,  564 => 314,  557 => 311,  555 => 310,  547 => 305,  539 => 300,  533 => 297,  502 => 269,  489 => 259,  468 => 241,  452 => 228,  432 => 211,  426 => 208,  419 => 204,  410 => 198,  381 => 172,  377 => 171,  372 => 168,  364 => 159,  358 => 156,  354 => 155,  347 => 151,  343 => 150,  336 => 146,  332 => 145,  325 => 141,  321 => 140,  314 => 138,  307 => 134,  299 => 129,  295 => 128,  288 => 124,  284 => 123,  277 => 119,  273 => 118,  267 => 114,  261 => 111,  256 => 110,  246 => 107,  241 => 106,  239 => 105,  227 => 95,  218 => 93,  214 => 92,  211 => 91,  208 => 90,  195 => 89,  188 => 85,  184 => 84,  180 => 83,  174 => 80,  171 => 79,  169 => 78,  166 => 77,  155 => 75,  151 => 74,  146 => 71,  137 => 69,  133 => 68,  128 => 65,  115 => 63,  111 => 62,  95 => 49,  88 => 48,  82 => 46,  79 => 45,  73 => 43,  71 => 42,  67 => 41,  62 => 39,  37 => 16,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/common/home.twig", "");
    }
}
