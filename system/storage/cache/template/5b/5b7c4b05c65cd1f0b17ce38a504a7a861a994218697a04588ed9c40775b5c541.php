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

/* common/header.twig */
class __TwigTemplate_5d48ee019454e2c37cbad6c13985ceae82fc57cfac3c4f6367df6d30d7078859 extends \Twig\Template
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
<html dir=\"";
        // line 2
        echo ($context["direction"] ?? null);
        echo "\" lang=\"";
        echo ($context["lang"] ?? null);
        echo "\">
<head>
<meta charset=\"UTF-8\" />
<title>";
        // line 5
        echo ($context["title"] ?? null);
        echo "</title>
<base href=\"";
        // line 6
        echo ($context["base"] ?? null);
        echo "\" />
";
        // line 7
        if (($context["description"] ?? null)) {
            // line 8
            echo "<meta name=\"description\" content=\"";
            echo ($context["description"] ?? null);
            echo "\" />
";
        }
        // line 10
        if (($context["keywords"] ?? null)) {
            // line 11
            echo "<meta name=\"keywords\" content=\"";
            echo ($context["keywords"] ?? null);
            echo "\" />
";
        }
        // line 13
        echo "<meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0\" />
<script type=\"text/javascript\" src=\"view/javascript/jquery/jquery-2.1.1.min.js\"></script>

\t\t\t<script type=\"text/javascript\" src=\"view/javascript/jquery/jquery-ui/pagejquery-ui.js\"></script>
\t\t\t

\t\t\t\t\t<script src=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js\"></script>
\t\t\t\t
<script type=\"text/javascript\" src=\"view/javascript/bootstrap/js/bootstrap.min.js\"></script>
<link href=\"view/stylesheet/bootstrap.css\" type=\"text/css\" rel=\"stylesheet\" />
<link href=\"view/javascript/font-awesome/css/font-awesome.min.css\" type=\"text/css\" rel=\"stylesheet\" />
<script src=\"view/javascript/jquery/datetimepicker/moment/moment.min.js\" type=\"text/javascript\"></script>
<script src=\"view/javascript/jquery/datetimepicker/moment/moment-with-locales.min.js\" type=\"text/javascript\"></script>
<script src=\"view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js\" type=\"text/javascript\"></script>
<link href=\"view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css\" type=\"text/css\" rel=\"stylesheet\" media=\"screen\" />
<link type=\"text/css\" href=\"view/stylesheet/stylesheet.css\" rel=\"stylesheet\" media=\"screen\" />
<link href=\"view/stylesheet/extended_reviews.css\" type=\"text/css\" rel=\"stylesheet\" />
";
        // line 30
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["styles"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["style"]) {
            // line 31
            echo "<link type=\"text/css\" href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "href", [], "any", false, false, false, 31);
            echo "\" rel=\"";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "rel", [], "any", false, false, false, 31);
            echo "\" media=\"";
            echo twig_get_attribute($this->env, $this->source, $context["style"], "media", [], "any", false, false, false, 31);
            echo "\" />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['style'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["links"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["link"]) {
            // line 34
            echo "<link href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["link"], "href", [], "any", false, false, false, 34);
            echo "\" rel=\"";
            echo twig_get_attribute($this->env, $this->source, $context["link"], "rel", [], "any", false, false, false, 34);
            echo "\" />
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['link'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "<script src=\"view/javascript/common.js\" type=\"text/javascript\"></script>
";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["scripts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["script"]) {
            // line 38
            echo "<script type=\"text/javascript\" src=\"";
            echo $context["script"];
            echo "\"></script>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['script'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 40
        echo "</head>
<body>
<div id=\"container\">
<header id=\"header\" class=\"navbar navbar-static-top\">
  <div class=\"container-fluid\">
    <div id=\"header-logo\" class=\"navbar-header\"><a href=\"";
        // line 45
        echo ($context["home"] ?? null);
        echo "\" class=\"navbar-brand\"><img src=\"view/image/logo.png\" alt=\"";
        echo ($context["heading_title"] ?? null);
        echo "\" title=\"";
        echo ($context["heading_title"] ?? null);
        echo "\" /></a></div>
    ";
        // line 46
        if (($context["logged"] ?? null)) {
            echo "<a href=\"#\" id=\"button-menu\" class=\"hidden-md hidden-lg\"><span class=\"fa fa-bars\"></span></a>
    <ul class=\"nav navbar-nav navbar-right\">

        ";
            // line 49
            if (((isset($context["extended_review_settings"]) || array_key_exists("extended_review_settings", $context)) || (isset($context["extended_review_store_settings"]) || array_key_exists("extended_review_store_settings", $context)))) {
                // line 50
                echo "        <li class=\"dropdown\"><a class=\"dropdown-toggle\" data-toggle=\"dropdown\"><span class=\"label label-danger pull-right\">";
                echo ($context["reviews_count"] ?? null);
                echo "</span><i class=\"fa fa-comments-o fa-lg\" aria-hidden=\"true\"></i></a>
          <ul class=\"dropdown-menu dropdown-menu-right\">
        ";
                // line 52
                if ((isset($context["extended_review_settings"]) || array_key_exists("extended_review_settings", $context))) {
                    // line 53
                    echo "            <li class=\"dropdown-header\">Расширенные отзывы</li>
            <li><a href=\"";
                    // line 54
                    echo ($context["extended_review_settings"] ?? null);
                    echo "\">Настройки</a></li>
    \t\t<li class=\"divider\"></li>
    \t\t<li class=\"dropdown-header\">Отзывы</li>
            <li><a href=\"";
                    // line 57
                    echo ($context["extended_review"] ?? null);
                    echo "\"><span class=\"label label-success pull-right\">";
                    echo ($context["all_review_total"] ?? null);
                    echo "</span>Все отзывы</a></li>
            <li><a href=\"";
                    // line 58
                    echo ($context["extended_review_off"] ?? null);
                    echo "\"><span class=\"label label-danger pull-right\">";
                    echo ($context["review_total"] ?? null);
                    echo "</span>Новые отзывы</a></li>
    \t\t<li class=\"divider\"></li>
    \t\t<li class=\"dropdown-header\">Комментарии</li>
            <li><a href=\"";
                    // line 61
                    echo ($context["extended_review_answer"] ?? null);
                    echo "\"><span class=\"label label-success pull-right\">";
                    echo ($context["all_answer_total"] ?? null);
                    echo "</span>Все комментарии</a></li>
            <li><a href=\"";
                    // line 62
                    echo ($context["extended_review_answer_off"] ?? null);
                    echo "\"><span class=\"label label-danger pull-right\">";
                    echo ($context["answer_total"] ?? null);
                    echo "</span>Новые комментарии</a></li>
            ";
                }
                // line 64
                echo "            ";
                if ((isset($context["extended_review_store_settings"]) || array_key_exists("extended_review_store_settings", $context))) {
                    // line 65
                    echo "            <li class=\"divider\"></li>
            <li class=\"dropdown-header\">Расширенные отзывы о магазине</li>
            <li><a href=\"";
                    // line 67
                    echo ($context["extended_review_store_settings"] ?? null);
                    echo "\">Настройки</a></li>
    \t\t<li class=\"divider\"></li>
    \t\t<li class=\"dropdown-header\">Отзывы о магазине</li>
            <li><a href=\"";
                    // line 70
                    echo ($context["extended_review_store"] ?? null);
                    echo "\"><span class=\"label label-success pull-right\">";
                    echo ($context["review_store_total"] ?? null);
                    echo "</span>Все отзывы</a></li>
            <li><a href=\"";
                    // line 71
                    echo ($context["extended_review_store_off"] ?? null);
                    echo "\"><span class=\"label label-danger pull-right\">";
                    echo ($context["review_store"] ?? null);
                    echo "</span>Новые отзывы</a></li>
            ";
                }
                // line 73
                echo "          </ul>
        </li>
        ";
            }
            // line 76
            echo "
    ";
            // line 77
            if ((($context["is_demo_data_removed"] ?? null) != 1)) {
                // line 78
                echo "      <li class=\"dropdown\" id=\"rdd_li\">
        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><button role=\"button\">";
                // line 79
                echo ($context["text_remove_demo_data"] ?? null);
                echo "</button></a>
        <ul class=\"dropdown-menu dropdown-menu-right\" style=\"width: 300px;padding: 10px;\">
          <li class=\"dropdown-header\">";
                // line 81
                echo ($context["text_remove_header"] ?? null);
                echo "</li>
          ";
                // line 82
                echo ($context["text_data_to_remove"] ?? null);
                echo "
          <li><a href=\"#\" title=\"\" onclick=\"clearDemoData();return false;\"><i class=\"fa fa-trash\"></i> ";
                // line 83
                echo ($context["text_delete"] ?? null);
                echo "</a></li>
          <li><a href=\"#\" title=\"\" onclick=\"return false;\"><i class=\"fa fa-times\"></i> ";
                // line 84
                echo ($context["text_not_now"] ?? null);
                echo "</a></li>
          <li><a href=\"#\" title=\"\" onclick=\"leaveDemoData();return false;\"><i class=\"fa fa-check-square\"></i> ";
                // line 85
                echo ($context["text_never"] ?? null);
                echo "</a></li>
        </ul>
      </li>
      ";
            }
            // line 88
            echo " ";
            // line 89
            echo "
      <li class=\"dropdown\">
        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-trash\"></i></a>
        <ul class=\"dropdown-menu dropdown-menu-right\">
          <li class=\"dropdown-header\">";
            // line 93
            echo ($context["text_clear_cache"] ?? null);
            echo "</li>
          <li role=\"separator\" class=\"divider\"></li>
          <li><a href=\"#\" title=\"\" onclick=\"clearSysCache('theme');return false;\"><i class=\"fa fa-trash\"></i> ";
            // line 95
            echo ($context["text_clear_cache_theme"] ?? null);
            echo "</a></li>
          <li><a href=\"#\" title=\"\" onclick=\"clearSysCache('sass');return false;\"><i class=\"fa fa-trash\"></i> ";
            // line 96
            echo ($context["text_clear_cache_sass"] ?? null);
            echo "</a></li>
          <li><a href=\"#\" title=\"\" onclick=\"clearSysCache('sysCache');return false;\"><i class=\"fa fa-trash\"></i> ";
            // line 97
            echo ($context["text_clear_cache_system"] ?? null);
            echo "</a></li>
          <li><a href=\"#\" title=\"\" onclick=\"clearSysCache('imgCache');return false;\"><i class=\"fa fa-trash\"></i> ";
            // line 98
            echo ($context["text_clear_cache_image"] ?? null);
            echo "</a></li>
          <li><a href=\"#\" title=\"\" onclick=\"clearSysCache('clearAllCaches');return false;\"><i class=\"fa fa-trash\"></i> ";
            // line 99
            echo ($context["text_clear_cache_all"] ?? null);
            echo "</a></li>
        </ul>
      </li>

      <li class=\"dropdown\"><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><img src=\"";
            // line 103
            echo ($context["image"] ?? null);
            echo "\" alt=\"";
            echo ($context["firstname"] ?? null);
            echo " ";
            echo ($context["lastname"] ?? null);
            echo "\" title=\"";
            echo ($context["username"] ?? null);
            echo "\" id=\"user-profile\" class=\"img-circle\" />";
            echo ($context["firstname"] ?? null);
            echo " ";
            echo ($context["lastname"] ?? null);
            echo " <i class=\"fa fa-caret-down fa-fw\"></i></a>
        <ul class=\"dropdown-menu dropdown-menu-right\">
          <li><a href=\"";
            // line 105
            echo ($context["profile"] ?? null);
            echo "\"><i class=\"fa fa-user-circle-o fa-fw\"></i> ";
            echo ($context["text_profile"] ?? null);
            echo "</a></li>
          <li role=\"separator\" class=\"divider\"></li>
          <li class=\"dropdown-header\">";
            // line 107
            echo ($context["text_store"] ?? null);
            echo "</li>
          ";
            // line 108
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["stores"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["store"]) {
                // line 109
                echo "          <li><a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["store"], "href", [], "any", false, false, false, 109);
                echo "\" target=\"_blank\">";
                echo twig_get_attribute($this->env, $this->source, $context["store"], "name", [], "any", false, false, false, 109);
                echo "</a></li>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['store'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 111
            echo "          <li role=\"separator\" class=\"divider\"></li>
          <li class=\"dropdown-header\">";
            // line 112
            echo ($context["text_help"] ?? null);
            echo "</li>
          <li><a href=\"https://neoseo.com.ua\" target=\"_blank\"><img src=\"view/image/neoseo.png\" width=\"20\" height=\"20\"> ";
            // line 113
            echo ($context["text_neoseo"] ?? null);
            echo "</a></li>
          <li><a href=\"https://opencartmasters.com\" target=\"_blank\"><i class=\"fa fa-comments-o fa-fw\"></i> ";
            // line 114
            echo ($context["text_support"] ?? null);
            echo "</a></li>
          <li><a href=\"https://www.opencart.com\" target=\"_blank\"><i class=\"fa fa-opencart fa-fw\"></i> ";
            // line 115
            echo ($context["text_homepage"] ?? null);
            echo "</a></li>
          <li><a href=\"https://docs.opencart.com\" target=\"_blank\"><i class=\"fa fa-file-text-o fa-fw\"></i> ";
            // line 116
            echo ($context["text_documentation"] ?? null);
            echo "</a></li>
        </ul>
      </li>
      <li><a href=\"";
            // line 119
            echo ($context["logout"] ?? null);
            echo "\"><i class=\"fa fa-sign-out\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">";
            echo ($context["text_logout"] ?? null);
            echo "</span></a></li>
    </ul>
    ";
        }
        // line 121
        echo " </div>
</header>
  <script>
    function clearSysCache(type)
    {
      \$.ajax({
        url: 'index.php?route=common/developer/' + type + '&user_token=";
        // line 127
        echo ($context["user_token"] ?? null);
        echo "',
        dataType: 'json',
        beforeSend: function() {
           \$('.navbar-static-top').append('<span class=\"alert alert-info cache-notify\" style=\"position: absolute;right: 30px;\">";
        // line 130
        echo ($context["text_loading"] ?? null);
        echo "</span>');
        },
        success: function(json) {
          if (json['error']) {
            \$('.navbar-static-top').append('<div class=\"alert alert-danger alert-dismissible cache-notify\" style=\"position: absolute;right: 30px;\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error']['warning'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
          }
          if (json['success']) {
            \$('.navbar-static-top').append('<div class=\"alert alert-success alert-dismissible cache-notify\" style=\"position: absolute;right: 30px;\"><i class=\"fa fa-check-circle\"></i> ' + json['success'] + ' <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');
          }
          \$('.cache-notify').fadeOut(5000);
        },
        error: function(xhr, ajaxOptions, thrownError) {
          alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
        }
      });
    }
    ";
        // line 146
        if ((($context["is_demo_data_removed"] ?? null) != 1)) {
            // line 147
            echo "    function clearDemoData()
    {
       if(confirm('";
            // line 149
            echo ($context["text_confirm"] ?? null);
            echo "')){
         \$.ajax({
           url: 'index.php?route=common/developer/clearDemoData&user_token=";
            // line 151
            echo ($context["user_token"] ?? null);
            echo "',
           dataType: 'json',
           success: function(json) {
              location.reload();
           },
           error: function(xhr, ajaxOptions, thrownError) {
             alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
           }
         });
       }
    }

    function leaveDemoData()
    {
      if(confirm('";
            // line 165
            echo ($context["text_confirm"] ?? null);
            echo "')){
        \$.ajax({
          url: 'index.php?route=common/developer/leaveDemoData&user_token=";
            // line 167
            echo ($context["user_token"] ?? null);
            echo "',
          dataType: 'json',
          success: function(json) {
            \$('#rdd_li').fadeOut();
          },
          error: function(xhr, ajaxOptions, thrownError) {
            alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
          }
        });
      }
    }
    ";
        }
        // line 179
        echo "  </script>";
    }

    public function getTemplateName()
    {
        return "common/header.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  464 => 179,  449 => 167,  444 => 165,  427 => 151,  422 => 149,  418 => 147,  416 => 146,  397 => 130,  391 => 127,  383 => 121,  375 => 119,  369 => 116,  365 => 115,  361 => 114,  357 => 113,  353 => 112,  350 => 111,  339 => 109,  335 => 108,  331 => 107,  324 => 105,  309 => 103,  302 => 99,  298 => 98,  294 => 97,  290 => 96,  286 => 95,  281 => 93,  275 => 89,  273 => 88,  266 => 85,  262 => 84,  258 => 83,  254 => 82,  250 => 81,  245 => 79,  242 => 78,  240 => 77,  237 => 76,  232 => 73,  225 => 71,  219 => 70,  213 => 67,  209 => 65,  206 => 64,  199 => 62,  193 => 61,  185 => 58,  179 => 57,  173 => 54,  170 => 53,  168 => 52,  162 => 50,  160 => 49,  154 => 46,  146 => 45,  139 => 40,  130 => 38,  126 => 37,  123 => 36,  112 => 34,  108 => 33,  95 => 31,  91 => 30,  72 => 13,  66 => 11,  64 => 10,  58 => 8,  56 => 7,  52 => 6,  48 => 5,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "common/header.twig", "");
    }
}
