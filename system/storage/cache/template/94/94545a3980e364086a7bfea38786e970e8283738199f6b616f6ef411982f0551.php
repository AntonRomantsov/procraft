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

/* default/template/common/footer2.twig */
class __TwigTemplate_670059a9d70db35c9ebdf85dd4243712ae2565af07f7c0b3a7f2867907a3e777 extends \Twig\Template
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
        echo "<footer class=\"footer\" id=\"footer\">
  <div class=\"container footer__container\">
    <div class=\"row\">
      <div class=\"col-sm-6 col-md-3\">
        <p class=\"footer-title\">";
        // line 5
        echo ($context["text_procraft"] ?? null);
        echo "</p>
        <ul class=\"list-unstyled footer-list\">
\t\t  <li><a href=\"";
        // line 7
        echo ($context["about"] ?? null);
        echo "\">";
        echo ($context["text_about"] ?? null);
        echo "</a></li>
          <li><a href=\"";
        // line 8
        echo ($context["store"] ?? null);
        echo "\">";
        echo ($context["text_store"] ?? null);
        echo "</a></li>
\t\t  <li><a href=\"";
        // line 9
        echo ($context["news"] ?? null);
        echo "\">";
        echo ($context["text_news"] ?? null);
        echo "</a></li> 
          <li><a href=\"";
        // line 10
        echo ($context["bestseller"] ?? null);
        echo "\">";
        echo ($context["text_bestseller"] ?? null);
        echo "</a></li>
      <!--<li><a href=\"";
        // line 11
        echo ($context["all_category"] ?? null);
        echo "\">";
        echo ($context["text_all_category"] ?? null);
        echo "</a></li>-->
          <li><a href=\"";
        // line 12
        echo ($context["blog"] ?? null);
        echo "\">";
        echo ($context["text_blog"] ?? null);
        echo "</a></li>
        <!--   <li><a href=\"";
        // line 13
        echo ($context["partnery"] ?? null);
        echo "\">";
        echo ($context["text_partnery"] ?? null);
        echo "</a></li>-->
        </ul>
      </div>
      <div class=\"col-sm-6 col-md-3\">
        <p class=\"footer-title\">";
        // line 17
        echo ($context["text_extra"] ?? null);
        echo "</p>
        <ul class=\"list-unstyled footer-list\">
          <li><a href=\"/contacts\">";
        // line 19
        echo ($context["text_contact"] ?? null);
        echo "</a></li>
          <li><a href=\"";
        // line 20
        echo ($context["delivery"] ?? null);
        echo "\">";
        echo ($context["text_delivery"] ?? null);
        echo "</a></li>
          <li><a href=\"/sitemap\">";
        // line 21
        echo ($context["text_sitemap"] ?? null);
        echo "</a></li>
          <li><a href=\"";
        // line 22
        echo ($context["black_list"] ?? null);
        echo "\">";
        echo ($context["text_black_list"] ?? null);
        echo "</a></li>
        </ul>
      </div>
      <div class=\"col-sm-6 col-md-3\">
        <p class=\"footer-title\">";
        // line 26
        echo ($context["text_service"] ?? null);
        echo "</p>
        <ul class=\"list-unstyled footer-list\">
          <li><a href=\"";
        // line 28
        echo ($context["service_map"] ?? null);
        echo "\">";
        echo ($context["text_service_map"] ?? null);
        echo "</a></li>
          <!-- <li><a href=\"";
        // line 29
        echo ($context["instrument"] ?? null);
        echo "\">";
        echo ($context["text_instrument"] ?? null);
        echo "</a></li>  -->
        </ul>
\t\t\t\t<div class=\"social-links\">
\t\t\t\t\t<p class=\"footer-title\">";
        // line 32
        echo ($context["text_social"] ?? null);
        echo "</p>
\t\t\t\t\t<ul class=\"list-unstyled social-links__list\">
\t\t\t\t\t\t<li class=\"social-links__item\">
\t\t\t\t\t\t\t<a class=\"social-links__link\" href=\"https://www.instagram.com/procraft.ua/\" rel=\"nofollow noindex\" target=\"_blank\"><i class=\"fa fa-instagram\"></i></a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"social-links__item\">
\t\t\t\t\t\t\t<a class=\"social-links__link\" href=\"https://www.facebook.com/Procraft.ua\" rel=\"nofollow noindex\" target=\"_blank\"><i class=\"fa fa-facebook\"></i></a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"social-links__item\">
\t\t\t\t\t\t\t<a class=\"social-links__link\" href=\"https://www.youtube.com/channel/UCxpqLkXMr-C8he2-BPiyDKg\" rel=\"nofollow noindex\" target=\"_blank\"><i class=\"fa fa-youtube\"></i></a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"social-links__item\">
\t\t\t\t\t\t\t<a class=\"social-links__link\" href=\"https://t.me/Procraftinfo\" rel=\"nofollow noindex\" target=\"_blank\"><i class=\"fa fa-telegram\"></i></a>
\t\t\t\t\t\t</li>
\t\t\t\t\t\t<li class=\"social-links__item\">
\t\t\t\t\t\t\t<a class=\"social-links__link\" href=\"https://www.tiktok.com/@procraft.ua?_t=8ewabgHYZ1y&_r=1\" target=\"_blank\" class=\"tiktok\"><img src=\"/image/tik_tok.svg\" alt=\"\"></a>
\t\t\t\t\t\t</li>
\t\t\t\t\t</ul>
\t\t\t\t</div>
      </div>
      <div class=\"col-sm-6 col-md-3\">
        <p class=\"footer-title\">";
        // line 53
        echo ($context["text_call"] ?? null);
        echo "</p>
        <ul class=\"list-unstyled footer-list footer-contact\">
          <li class=\"footer-contact__item footer-contact__item--phone\"><a class=\"binct-phone-number-1\" href=\"";
        // line 55
        echo ($context["footer_phone_href"] ?? null);
        echo "\">";
        echo ($context["footer_phone"] ?? null);
        echo "</a></li>
          <li class=\"footer-contact__item footer-contact__item--email\"><a href=\"mailto:info@procraft.ua\">info@procraft.ua</a></li>
        </ul>
\t\t\t\t";
        // line 58
        if (($context["form_newsletter"] ?? null)) {
            // line 59
            echo "\t\t\t\t<div class=\"footer-newsletter\">
\t\t\t\t\t";
            // line 60
            echo ($context["form_newsletter"] ?? null);
            echo "
\t\t\t\t</div>
\t\t\t\t";
        }
        // line 63
        echo "      </div>
    </div>
  </div>
\t<div class=\"footer-bottom\">
\t\t<div class=\"container\">
\t\t\t<div class=\"row\">
\t\t\t\t<div class=\"col-md-2\">
\t\t\t\t\t<div class=\"logo-footer\"><img src=\"/image/catalog/news/logo.png\" alt=\"logo-footer\" width=\"113\"></div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-7\">
\t\t\t\t\t<div class=\"footer-copy\">";
        // line 73
        echo ($context["powered"] ?? null);
        echo "</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"col-md-3\">
\t\t\t\t\t<div class=\"payment-home-custom\">
\t\t\t\t\t\t<span>";
        // line 77
        echo ($context["text_accept"] ?? null);
        echo "</span>
\t\t\t\t\t\t<img class=\"visa\" src=\"/image/icon/visa.png\" alt=\"visa\"> 
\t\t\t\t\t\t<img class=\"mastercard\" src=\"/image/icon/mastercard.png\" alt=\"mastercard\">
          </div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</div>
\t<a id=\"tbScrollToTop\" class=\"btn btn-default tb_no_text\" href=\"javascript:;\" style=\"opacity: 100;\"><i class=\"fa fa-angle-up\"></i></a>
</footer>
<section class=\"secondary-footer\">
      <div class=\"secondary-footer__wrapper\">
        <a href=\"\" class=\"secondary-footer__item\">
          <span class=\"secondary-footer__icon\">
            <svg><use href=\"image/icons.svg#catalog-1\"></use></svg>
          </span>
          <p class=\"secondary-footer__title\">";
        // line 93
        echo ($context["text_homepage"] ?? null);
        echo "</p>
        </a>
        <a href=\"";
        // line 95
        echo ($context["catalog"] ?? null);
        echo "\" class=\"secondary-footer__item\">
          <span class=\"secondary-footer__icon\">
            <svg><use href=\"image/icons.svg#catalog-1\"></use></svg>
          </span>
          <p class=\"secondary-footer__title\">";
        // line 99
        echo ($context["text_catalog"] ?? null);
        echo "</p>
        </a>
        <a class=\"secondary-footer__item\" onclick=\"call_cp(false,'load');\">
          <span class=\"secondary-footer__icon\">
            <svg><use href=\"image/icons.svg#cart\"></use></svg>
            <span class=\"secondary-footer__number\">";
        // line 104
        echo ($context["count_cart"] ?? null);
        echo "</span>
          </span>
          <p class=\"secondary-footer__title\">";
        // line 106
        echo ($context["text_cart"] ?? null);
        echo "</p>
        </a>
        <a href=\"";
        // line 108
        echo ($context["special"] ?? null);
        echo "\" class=\"secondary-footer__item\">
          <span class=\"secondary-footer__icon\">
            <svg><use href=\"image/icons.svg#promotion-1\"></use></svg>
          </span>
          <p class=\"secondary-footer__title\">";
        // line 112
        echo ($context["text_special"] ?? null);
        echo "</p>
        </a>
        <a href=\"#user-login\" class=\"secondary-footer__item\" data-fancybox>
          <span class=\"secondary-footer__icon secondary-footer__icon--profile\">
            <svg><use href=\"image/icons.svg#profile-1\"></use></svg>
          </span>
          <p class=\"secondary-footer__title\">";
        // line 118
        echo ($context["text_account2"] ?? null);
        echo "</p>
        </a>
      </div>
    </section>
<div id=\"underfooter\"></div>
";
        // line 123
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["styles"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["style"]) {
            // line 124
            echo "<link href=\"/";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "href", [], "any", false, false, false, 124);
            echo "\" type=\"text/css\" rel=\"";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "rel", [], "any", false, false, false, 124);
            echo "\" media=\"";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "media", [], "any", false, false, false, 124);
            echo "\" />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['style'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 126
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["scripts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 127
            echo "<script src=\"/";
            echo $context["script"];
            echo "\" type=\"text/javascript\"></script>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 129
        echo "<script type=\"text/javascript\">
// function hideBlock() {
//     var block = \$('#tbScrollToTop');
//     if(\$('body').scrollTop() >= 120) {
//       block.css('opacity', 100);
//     }else {
//       block.css('opacity', 0);
//     }
//   }
//   \$(window).scroll(hideBlock);



\t\$(\"#tbScrollToTop\").bind('click', function(e){
        e.preventDefault();
        \$('body,html').animate({scrollTop: 0}, 400);    
    });

</script>
<!--
OpenCart is open source software and you are free to remove the powered by OpenCart if you want, but its generally accepted practise to make a small donation.
Please donate via PayPal to donate@opencart.com
//-->
<script>var modal = document.getElementById(\"myModal\");

var span = document.getElementsByClassName(\"close\")[0];

if(span){
  span.onclick = function() {
    modal.style.display = \"none\";
    sessionStorage.setItem(\"modalShown\", \"true\");
  }
}

if(modal){
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = \"none\";
      sessionStorage.setItem(\"modalShown\", \"true\");
    }
  } 

  window.onload = function() {
    if(sessionStorage.getItem(\"modalShown\") !== \"true\"){
      modal.style.display = \"block\";
    }
  }
}


</script>
<script type=\"text/javascript\">
\t\$(document).ready(function(){
\t      window.addEventListener('scroll', function() {
\t      \tvar footer = document.getElementById('underfooter');
\t      var footer_box = footer.getBoundingClientRect();
\t      var doc_footer = footer_box.top + window.pageYOffset;
\t      var control_point = doc_footer - \$('footer').height() - document.documentElement.clientHeight;
          if(window.pageYOffset > control_point){
       \t    \$('.modules-menu').css('position', 'absolute');
       \t    \$('.modules-menu').css('top', 125 + +control_point +'px');
          }else{
       \t    \$('.modules-menu').css('position', 'fixed');
       \t    \$('.modules-menu').css('top', '155px');
          }
        });
\t\t}, 0);
</script>
<script>
function open_cart(){
  \$('#cart > ul').load('index.php?route=common/cart/info ul li');

}
</script>
<script>
  document.addEventListener(\"DOMContentLoaded\", function () {
    const backToTop = document.getElementById(\"tbScrollToTop\");
   
    window.addEventListener(\"scroll\", function () {
      if (window.pageYOffset > 300) {
        backToTop.style.display = \"flex\";
      } else {
        backToTop.style.display = \"none\";
      }
    });
   
    backToTop.addEventListener(\"click\", function (event) {
      event.preventDefault();
      window.scrollTo({ top: 0, behavior: \"smooth\" });
    });
  });</script>
<div id=\"myModal\" class=\"modal\">
  <div class=\"modal-content\">
    <span class=\"close\">&times;</span>
    <div class=\"warning\">На сайті будуть проводитись технічні роботи 08.07.2023 з 17.00 - 20.00. Пробачте за незручності.</div>
  </div>
</div>
<link rel=\"stylesheet\" href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css\" integrity=\"sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==\" crossorigin=\"anonymous\" referrerpolicy=\"no-referrer\">

        ";
        // line 228
        if ((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["cp_setting"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["customer_groups"] ?? null) : null)) {
            // line 229
            echo "            ";
            $context["customer_groups"] = (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["cp_setting"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["customer_groups"] ?? null) : null);
            // line 230
            echo "        ";
        } else {
            // line 231
            echo "            ";
            $context["customer_groups"] = [];
            // line 232
            echo "        ";
        }
        // line 233
        echo "        ";
        if ((($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["cp_setting"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["stores"] ?? null) : null)) {
            // line 234
            echo "            ";
            $context["stores"] = (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = ($context["cp_setting"] ?? null)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["stores"] ?? null) : null);
            // line 235
            echo "        ";
        } else {
            // line 236
            echo "            ";
            $context["stores"] = [];
            // line 237
            echo "        ";
        }
        // line 238
        echo "
        ";
        // line 239
        if ((((($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = ($context["cp_setting"] ?? null)) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4["activate"] ?? null) : null) && !twig_in_filter(($context["cp_customer_group_id"] ?? null), ($context["customer_groups"] ?? null))) && !twig_in_filter(($context["cp_store_id"] ?? null), ($context["stores"] ?? null)))) {
            // line 240
            echo "        <script type=\"text/javascript\">
          \$(function() {
            \$.ajax({
              type: 'get',
              url:  'index.php?route=extension/module/cart_popup/initcart',
              dataType: 'json',
              cache: false,
              success: function(json) {
                \$.each(\$(\"[onclick^='\"+json['add_function_selector']+\"']\"), function() {
                  var product_id = \$(this).attr('onclick').match(/[0-9]+/);
                    \$(this)
                    .attr('onclick', 'call_cp(\\'' + \$(this).attr('onclick').match(/[0-9]+/) + '\\',\\'' + 'add' + '\\');');
                    //.addClass('cp-call-button');
                });
                var product_id_in_page = \$(\"input[name='product_id']\").val();
                  \$('#'+json['add_id_selector'])
                  .unbind('click')
                  .attr('onclick', 'call_cp(\\'' + product_id_in_page + '\\',\\'' + 'add_option' + '\\');');

                if (json['cart_products']) {
                  \$.each(json['cart_products'], function(i,value) {
                    \$('[onclick=\"call_cp(\\'' + value + '\\',\\'' + 'add' + '\\');\"]')
                    ";
            // line 262
            if ((($context["route"] ?? null) != "account/wishlist")) {
                // line 263
                echo "                    .html('<i class=\"fa fa-shopping-cart\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">' + json['text_in_cart'] + '</span>')
                    .attr('onclick', 'call_cp(\\'' + value + '\\',\\'' + 'load' + '\\');');
                    ";
            } else {
                // line 266
                echo "                    \$('[onclick=\"call_cp(\\'' + value + '\\',\\'' + 'add' + '\\');\"]')
                    .html('<i class=\"fa fa-shopping-cart\" style=\"color: #ed6e00;\"></i>');
                    ";
            }
            // line 269
            echo "                    \$('[onclick=\"call_cp(\\'' + value + '\\',\\'' + 'add_option' + '\\');\"]')
                    .html(json['text_in_cart'])
                    .attr('onclick', 'call_cp(\\'' + value + '\\',\\'' + 'load_option' + '\\');');
                  });
                }
                if (json['cart_products_vs_options']) {
                  \$.each(json['cart_products_vs_options'], function(i,value) {
                    ";
            // line 276
            if ((($context["route"] ?? null) != "account/wishlist")) {
                // line 277
                echo "                    \$('[onclick=\"call_cp(\\'' + value + '\\',\\'' + 'add' + '\\');\"]')
                    .html('<i class=\"fa fa-shopping-cart\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">' + json['text_in_cart'] + '</span>');
                    ";
            } else {
                // line 280
                echo "                    \$('[onclick=\"call_cp(\\'' + value + '\\',\\'' + 'add' + '\\');\"]')
                    .html('<i class=\"fa fa-shopping-cart\" style=\"color: #ed6e00;></i>');
                    ";
            }
            // line 283
            echo "                    \$('[onclick=\"call_cp(\\'' + value + '\\',\\'' + 'add_option' + '\\');\"]')
                    .html(json['text_in_cart_vs_options']);
                  });
                }
              }
            });
          });
          function call_cp(product_id, action) {
            quantity = typeof(quantity) != 'undefined' ? quantity : 1;
            if (action == \"add\") {
              \$.ajax({
                url: 'index.php?route=checkout/cart/add',
                type: 'post',
                data: 'product_id=' + product_id + '&quantity=' + quantity,
                dataType: 'json',
                cache: false,
                success: function(json) {
                  if (json['redirect']) {
                    location = json['redirect'];
                  }
                  if (json['success']) {
                    
                    call_cp(product_id,'load');
                    \$('#cart-total').html(json['total']);
                    \$('#cart > button > span').html(json['count_cart']);
                    \$('.secondary-footer__number').html(json['count_cart']);
                  }
                }
              });
            }

            if (action == \"load\" || action == \"load_option\") {
              \$.magnificPopup.open({
                tLoading: '<img src=\"catalog/view/theme/default/stylesheet/cart_popup/loading.svg\" alt=\"\" />',
                items: {
                  src: 'index.php?route=extension/module/cart_popup',
                  type: 'ajax'
                },
                showCloseBtn: false
              });
              \$('.mfp-bg').css({
                'background': 'url(image/cart_popup/background/";
            // line 324
            echo (($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 = ($context["cp_setting"] ?? null)) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666["style_beckground"] ?? null) : null);
            echo ")',
                'opacity': '";
            // line 325
            if (((($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e = ($context["cp_setting"] ?? null)) && is_array($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e) || $__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e instanceof ArrayAccess ? ($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e["background_opacity"] ?? null) : null) == 0)) {
                echo (($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 = ($context["cp_setting"] ?? null)) && is_array($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52) || $__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 instanceof ArrayAccess ? ($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52["background_opacity"] ?? null) : null);
            } else {
                echo ((($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 = ($context["cp_setting"] ?? null)) && is_array($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136) || $__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 instanceof ArrayAccess ? ($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136["background_opacity"] ?? null) : null) / 10);
            }
            echo "'
              });
            }

            if (action == \"add_option\") {
              \$.ajax({
                url: 'index.php?route=checkout/cart/add',
                type: 'post',
                data: \$('#product input[type=\\'text\\'], #product input[type=\\'hidden\\'], #product input[type=\\'radio\\']:checked, #product input[type=\\'checkbox\\']:checked, #product select, #product textarea'),
                dataType: 'json',
                cache: false,
                beforeSend: function() {
                  \$('#button-cart').button('loading');
                },
                complete: function() {
                  \$('#button-cart').button('reset');
                },
                success: function(json) {
                  \$('.alert, .text-danger').remove();
                  \$('.form-group').removeClass('has-error');

                  if (json['error']) {
                    if (json['error']['option']) {
                      for (i in json['error']['option']) {
                        var element = \$('#input-option' + i.replace('_', '-'));

                        if (element.parent().hasClass('input-group')) {
                          element.parent().after('<div class=\"text-danger\">' + json['error']['option'][i] + '</div>');
                        } else {
                          element.after('<div class=\"text-danger\">' + json['error']['option'][i] + '</div>');
                        }
                      }
                    }
                    \$('.text-danger').parent().addClass('has-error');
                  }
                  if (json['success']) {
                    call_cp(product_id, 'load_option');
                    \$('#cart-total').html(json['total']);
                    \$('#cart > button > span').html(json['count_cart']);
                    \$('.secondary-footer__number').html(json['count_cart']);
                  }
                }
              });
            }
          }
        </script>
        ";
        }
        // line 372
        echo "      
</body></html> ";
    }

    public function getTemplateName()
    {
        return "default/template/common/footer2.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  603 => 372,  549 => 325,  545 => 324,  502 => 283,  497 => 280,  492 => 277,  490 => 276,  481 => 269,  476 => 266,  471 => 263,  469 => 262,  445 => 240,  443 => 239,  440 => 238,  437 => 237,  434 => 236,  431 => 235,  428 => 234,  425 => 233,  422 => 232,  419 => 231,  416 => 230,  413 => 229,  411 => 228,  310 => 129,  301 => 127,  297 => 126,  284 => 124,  280 => 123,  272 => 118,  263 => 112,  256 => 108,  251 => 106,  246 => 104,  238 => 99,  231 => 95,  226 => 93,  207 => 77,  200 => 73,  188 => 63,  182 => 60,  179 => 59,  177 => 58,  169 => 55,  164 => 53,  140 => 32,  132 => 29,  126 => 28,  121 => 26,  112 => 22,  108 => 21,  102 => 20,  98 => 19,  93 => 17,  84 => 13,  78 => 12,  72 => 11,  66 => 10,  60 => 9,  54 => 8,  48 => 7,  43 => 5,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/common/footer2.twig", "");
    }
}
