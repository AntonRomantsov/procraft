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

/* extension/modification/editor.twig */
class __TwigTemplate_2284c965925b5abf238c63fac0b1dbf33e9897b887d5b251781d445079247cb6 extends \Twig\Template
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
        echo ($context["column_left"] ?? null);
        echo "
<div id=\"content\">
  <div class=\"page-header\">
    <div class=\"container-fluid\">
      <div class=\"pull-right\">
        <button type=\"button\" id=\"button-erase-theme\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_erase_theme"] ?? null);
        echo "\" class=\"btn btn-success\" data-loading-text=\"";
        echo ($context["text_erasing"] ?? null);
        echo "\"><i class=\"fa fa-eraser\"></i></button>
        <button type=\"button\" id=\"button-erase-data\" data-toggle=\"tooltip\" title=\"";
        // line 7
        echo ($context["button_erase_data"] ?? null);
        echo "\" class=\"btn btn-warning\" data-loading-text=\"";
        echo ($context["text_erasing"] ?? null);
        echo "\"><i class=\"fa fa-eraser\"></i></button>
        <button type=\"button\" id=\"button-erase-image\" data-toggle=\"tooltip\" title=\"";
        // line 8
        echo ($context["button_erase_image"] ?? null);
        echo "\" class=\"btn btn-danger\" data-loading-text=\"";
        echo ($context["text_erasing"] ?? null);
        echo "\"><i class=\"fa fa-eraser\"></i></button>
        <button type=\"button\" id=\"button-save\" data-toggle=\"tooltip\" title=\"";
        // line 9
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\" data-loading-text=\"";
        echo ($context["text_loading"] ?? null);
        echo "\"><i class=\"fa fa-save\"></i></button>
        <a href=\"";
        // line 10
        echo ($context["return"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_return"] ?? null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a>
      </div>
      <h1>";
        // line 12
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 15
            echo "        <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 15);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 15);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\">
    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 23
        echo ($context["name"] ?? null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <div class=\"alert alert-info\"><i class=\"fa fa-info-circle\"></i> ";
        // line 26
        echo ($context["text_help_ocmod"] ?? null);
        echo "
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
        </div>
        <form action=\"\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-modification\" class=\"form-horizontal\">
          <fieldset>
            <legend>";
        // line 31
        echo ($context["text_xml_code"] ?? null);
        echo "</legend>
            <div class=\"form-group\">
              <div class=\"col-sm-12\">
                <pre id=\"code\" style=\"width:100% !important; height:480px; position:relative; font-size:1.1em;\">";
        // line 34
        echo ($context["xml"] ?? null);
        echo "</pre>
                <input type=\"hidden\" name=\"modification_id\" value=\"";
        // line 35
        echo ($context["modification_id"] ?? null);
        echo "\" />
              </div>
            </div>
          </fieldset>
        </form>
      </div>
    </div>
  </div>
</div>
<script type=\"text/javascript\"><!--
  var path = \"view/javascript/ace\";
  var editorconfig = ace.require(\"ace/config\");
  editorconfig.set(\"workerPath\", path);
  var xml_editor = ace.edit(\"code\");
  xml_editor.setTheme(\"ace/theme/cobalt\");
  xml_editor.getSession().setMode(\"ace/mode/xml\");
  \$('#button-erase-theme').on('click', function() {
    \$('.alert').remove();
    \$.ajax({
      url: 'index.php?route=extension/modification/editor/erase_cache_theme&user_token=";
        // line 54
        echo ($context["user_token"] ?? null);
        echo "',
      dataType: 'json',
      cache: false,
      beforeSend: function() {
        \$('#button-erase-theme').button('loading');
      },
      complete: function() {
        \$('#button-erase-theme').button('reset');
      },
      success: function(json) {
        if (json['error']) {
          \$('.panel-default').before('<div class=\"alert alert-danger\" role=\"alert\">'+json['error']+'</div>');
        } else {
          \$('.panel-default').before('<div class=\"alert alert-success\" role=\"alert\">'+json['success']+'</div>');
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
      }
    });
  });
  \$('#button-erase-data').on('click', function() {
    \$('.alert').remove();
    \$.ajax({
      url: 'index.php?route=extension/modification/editor/erase_cache_data&user_token=";
        // line 78
        echo ($context["user_token"] ?? null);
        echo "',
      dataType: 'json',
      cache: false,
      beforeSend: function() {
        \$('#button-erase-data').button('loading');
      },
      complete: function() {
        \$('#button-erase-data').button('reset');
      },
      success: function(json) {
        if (json['error']) {
          \$('.panel-default').before('<div class=\"alert alert-danger\" role=\"alert\">'+json['error']+'</div>');
        } else {
          \$('.panel-default').before('<div class=\"alert alert-success\" role=\"alert\">'+json['success']+'</div>');
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
      }
    });
  });
  \$('#button-erase-image').on('click', function() {
    \$('.alert').remove();
    \$.ajax({
      url: 'index.php?route=extension/modification/editor/erase_cache_image&user_token=";
        // line 102
        echo ($context["user_token"] ?? null);
        echo "',
      dataType: 'json',
      cache: false,
      beforeSend: function() {
        \$('#button-erase-image').button('loading');
      },
      complete: function() {
        \$('#button-erase-image').button('reset');
      },
      success: function(json) {
        if (json['error']) {
          \$('.panel-default').before('<div class=\"alert alert-danger\" role=\"alert\">'+json['error']+'</div>');
        } else {
          \$('.panel-default').before('<div class=\"alert alert-success\" role=\"alert\">'+json['success']+'</div>');
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
      }
    });
  });
  \$('#button-save').on('click', function(){
    \$('.alert').remove();
    var id = \$('input[name=\"modification_id\"]').val();
    var xml_code = xml_editor.getValue();
    \$.ajax({
      url: 'index.php?route=extension/modification/editor/save&user_token=";
        // line 128
        echo ($context["user_token"] ?? null);
        echo "',
      type: 'post',
      dataType: 'json',
      data: { modification_id: id, xml: xml_code },
      cache: false,
      beforeSend: function() {
        \$('#button-save').button('loading');
      },
      complete: function() {
        \$('#button-save').button('reset');
      },
      success: function(json) {
        if (json['error']) {
          \$('.panel-default').before('<div class=\"alert alert-danger\" role=\"alert\">'+json['error']+'</div>');
        } else {
          \$('.panel-default').before('<div class=\"alert alert-success\" role=\"alert\">'+json['success']+'</div>');
          if (id == 0) { location.href = 'index.php?route=extension/modification&user_token=";
        // line 144
        echo ($context["user_token"] ?? null);
        echo "'; }
        }
      },
      error: function(xhr, ajaxOptions, thrownError) {
        alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
      }
    });
  });
//--></script> 
";
        // line 153
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "extension/modification/editor.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  265 => 153,  253 => 144,  234 => 128,  205 => 102,  178 => 78,  151 => 54,  129 => 35,  125 => 34,  119 => 31,  111 => 26,  105 => 23,  97 => 17,  86 => 15,  82 => 14,  77 => 12,  70 => 10,  64 => 9,  58 => 8,  52 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/modification/editor.twig", "");
    }
}
