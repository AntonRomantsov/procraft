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

/* default/template/extension/module/ciformbuilder.twig */
class __TwigTemplate_eed3d5723b9523c488526f0b0312aa2b4b24e3b6df7cf729b9fd73cc27823a02 extends \Twig\Template
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
        echo "<style type=\"text/css\">
.layout-form .form-horizontal .control-label{ text-align: left; margin-bottom: 3px; }
.layout-form .form-horizontal .text-help{ margin-bottom: 3px; font-size: 11px; }
";
        // line 4
        echo ($context["css"] ?? null);
        echo "
</style>
<div class=\"layout-form\" id=\"layoutform";
        // line 6
        echo ($context["module_row"] ?? null);
        echo "\">
  ";
        // line 7
        echo ($context["description"] ?? null);
        echo "
  <div class=\"form-horizontal\">
    <fieldset id=\"pageform";
        // line 9
        echo ($context["module_row"] ?? null);
        echo "\" class=\"pageform\">
\t\t\t\t<div class=\"row\">
\t\t\t\t";
        // line 11
        $this->loadTemplate(($context["include_fields_file"] ?? null), "default/template/extension/module/ciformbuilder.twig", 11)->display($context);
        // line 12
        echo "\t\t\t\t</div>
\t\t\t\t<div class=\"layout-cicaptcha\">
\t\t\t\t\t";
        // line 14
        echo ($context["captcha"] ?? null);
        echo "
\t\t\t\t</div>
\t\t\t\t<div class=\"buttons\">
\t\t\t\t\t<div class=\"pull-left\">
\t\t\t\t\t\t";
        // line 18
        if (($context["reset_button"] ?? null)) {
            // line 19
            echo "\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-default button\" id=\"button-layout-formreset";
            echo ($context["module_row"] ?? null);
            echo "\"><i class=\"fa fa-refresh\"></i> ";
            echo ($context["button_reset"] ?? null);
            echo "</button>
\t\t\t\t\t\t";
        }
        // line 21
        echo "\t\t\t\t\t\t<button type=\"button\" class=\"btn btn-border button\" id=\"button-buildersubmit";
        echo ($context["module_row"] ?? null);
        echo "\">";
        echo ($context["button_continue"] ?? null);
        echo "</button>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t
    </fieldset>
  </div>
  ";
        // line 27
        echo ($context["bottom_description"] ?? null);
        echo "

<script type=\"text/javascript\"><!--
\$('#button-buildersubmit";
        // line 30
        echo ($context["module_row"] ?? null);
        echo "').on('click', function() {
  \$.ajax({
    url: 'index.php?route=page/form/add&page_form_id=";
        // line 32
        echo ($context["page_form_id"] ?? null);
        echo "',
    type: 'post',
    data: \$('#layoutform";
        // line 34
        echo ($context["module_row"] ?? null);
        echo " input[type=\\'text\\'], #layoutform";
        echo ($context["module_row"] ?? null);
        echo " input[type=\\'hidden\\'], #layoutform";
        echo ($context["module_row"] ?? null);
        echo " input[type=\\'password\\'], #layoutform";
        echo ($context["module_row"] ?? null);
        echo " input[type=\\'radio\\']:checked, #layoutform";
        echo ($context["module_row"] ?? null);
        echo " input[type=\\'checkbox\\']:checked, #layoutform";
        echo ($context["module_row"] ?? null);
        echo " select, #layoutform";
        echo ($context["module_row"] ?? null);
        echo " textarea'),
    dataType: 'json',
    beforeSend: function() {
      \$('#button-buildersubmit";
        // line 37
        echo ($context["module_row"] ?? null);
        echo "').button('loading');
    },
    complete: function() {
      \$('#button-buildersubmit";
        // line 40
        echo ($context["module_row"] ?? null);
        echo "').button('reset');
    },
    success: function(json) {
      \$('#layoutform";
        // line 43
        echo ($context["module_row"] ?? null);
        echo " .alert, #layoutform";
        echo ($context["module_row"] ?? null);
        echo " .text-danger').remove();
      \$('#layoutform";
        // line 44
        echo ($context["module_row"] ?? null);
        echo " .form-group').removeClass('has-error');

      if (json['error']) {
        if (json['error']['field']) {
          for (i in json['error']['field']) {
            var element = \$('#layoutform";
        // line 49
        echo ($context["module_row"] ?? null);
        echo " #input-field' + i.replace('_', '-'));
            if (element.parent().hasClass('input-group')) {
              element.parent().after('<div class=\"text-danger\">' + json['error']['field'][i] + '</div>');
            } else {
              element.after('<div class=\"text-danger\">' + json['error']['field'][i] + '</div>');
            }
          }
        }

        if(json['captcha']) {
          \$('#layoutform";
        // line 59
        echo ($context["module_row"] ?? null);
        echo " .layout-cicaptcha').html(json['captcha']);
        }

        if (json['error']['warning']) {
          \$('#layoutform";
        // line 63
        echo ($context["module_row"] ?? null);
        echo " .form-horizontal').prepend('<div class=\"alert alert-danger warning\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error']['warning'] + '<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');

          \$('html, body').animate({ scrollTop: \$('#layoutform";
        // line 65
        echo ($context["module_row"] ?? null);
        echo " .form-horizontal').offset().top - 8 }, 'slow');
        }

        // Highlight any found errors
        \$('.text-danger').parent().addClass('has-error');
      }

      if (json['success']) {
        \$('#buildersuccess-modal";
        // line 73
        echo ($context["module_row"] ?? null);
        echo "').remove();

        \$('body').append('<div id=\"buildersuccess-modal";
        // line 75
        echo ($context["module_row"] ?? null);
        echo "\" class=\"modal fade\" role=\"dialog\"><div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button><h4 class=\"modal-title\">'+ json['success_title'] +'</h4></div><div class=\"modal-body\">'+ json['success_description'] +'</div></div></div></div>');

        \$('#buildersuccess-modal";
        // line 77
        echo ($context["module_row"] ?? null);
        echo "').modal('show');

        \$('#layoutform";
        // line 79
        echo ($context["module_row"] ?? null);
        echo " input[type=\\'text\\'], #layoutform";
        echo ($context["module_row"] ?? null);
        echo " input[type=\\'hidden\\'], #layoutform";
        echo ($context["module_row"] ?? null);
        echo " input[type=\\'password\\'],  #layoutform";
        echo ($context["module_row"] ?? null);
        echo " textarea').val('');

        \$('#layoutform";
        // line 81
        echo ($context["module_row"] ?? null);
        echo " input[type=\\'checkbox\\']:checked, #layoutform";
        echo ($context["module_row"] ?? null);
        echo " input[type=\\'radio\\']:checked').prop('checked', false);

        \$('#layoutform";
        // line 83
        echo ($context["module_row"] ?? null);
        echo " select').val('');
      }
    },
    error: function(xhr, ajaxOptions, thrownError) {
        alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
    }
  });
});
//--></script>
<script type=\"text/javascript\"><!--
\$('#layoutform";
        // line 93
        echo ($context["module_row"] ?? null);
        echo " .country_id').on('change', function() {
  \$.ajax({
    url: 'index.php?route=page/form/country&country_id=' + this.value,
    dataType: 'json',
    beforeSend: function() {
      \$('#layoutform";
        // line 98
        echo ($context["module_row"] ?? null);
        echo " .country_id').after(' <i class=\"fa fa-circle-o-notch fa-spin\"></i>');
    },
    complete: function() {
      \$('#layoutform";
        // line 101
        echo ($context["module_row"] ?? null);
        echo " .fa-spin').remove();
    },
    success: function(json) {

      html = '<option value=\"\">";
        // line 105
        echo ($context["text_select"] ?? null);
        echo "</option>';

      if (json['zone'] && json['zone'] != '') {
        for (i = 0; i < json['zone'].length; i++) {
          html += '<option value=\"' + json['zone'][i]['zone_id'] + '\"';
          html += '>' + json['zone'][i]['name'] + '</option>';
        }
      } else {
        html += '<option value=\"0\" selected=\"selected\">";
        // line 113
        echo ($context["text_none"] ?? null);
        echo "</option>';
      }

      \$('#layoutform";
        // line 116
        echo ($context["module_row"] ?? null);
        echo " .zone_id').html(html);
    }
  });
});

\$('#layoutform";
        // line 121
        echo ($context["module_row"] ?? null);
        echo " .country_id').trigger('change');
//--></script>
<script type=\"text/javascript\"><!--
\$(document).ready(function () {
  /* Add File */
  Dropzone.autoDiscover = false;
  \$('#layoutform";
        // line 127
        echo ($context["module_row"] ?? null);
        echo " .dropzone').each(function() {
    var node = \$(this);
    var node_this = this;
    var thisid = '#'+ node.attr('id');
    var myDropzone = new Dropzone(thisid, {
      url: 'index.php?route=page/form/upload&page_form_id=";
        // line 132
        echo ($context["page_form_id"] ?? null);
        echo "',
      maxFiles: 1,
      init: function() {
        this.on(\"maxfilesexceeded\", function(file) {
            myDropzone.removeAllFiles();
            myDropzone.addFile(file);
        });
      },
      success: function(file, json) {
        \$(node_this).parent().find('.text-message').remove();

        if (json['warning']) {
          \$(node_this).after('<div class=\"text-message alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['warning'] + '</div>');
        }

        if (json['success']) {
          \$(node_this).after('<div class=\"text-message alert alert-success\"><i class=\"fa fa-check-circle\"></i> ' + json['success'] + '</div>');

          \$(node_this).find('.dz-preview').append('<i class=\"fa fa fa-trash-o delete-file\" onclick=\"deleteZoneFile(this);\"></i>');

          \$(node_this).parent().find('input').val(json['code']);
        }
      }
    });
  });
});
//--></script>
<script type=\"text/javascript\"><!--
\$('#button-layout-formreset";
        // line 160
        echo ($context["module_row"] ?? null);
        echo "').on('click', function() {
  \$('#layoutform";
        // line 161
        echo ($context["module_row"] ?? null);
        echo " input[type=\\'text\\'], #layoutform";
        echo ($context["module_row"] ?? null);
        echo " input[type=\\'password\\'], #layoutform";
        echo ($context["module_row"] ?? null);
        echo " select, #layoutform";
        echo ($context["module_row"] ?? null);
        echo " textarea').val('');

  \$('#layoutform";
        // line 163
        echo ($context["module_row"] ?? null);
        echo " input[type=\\'radio\\']:checked, #layoutform";
        echo ($context["module_row"] ?? null);
        echo " input[type=\\'checkbox\\']:checked').prop('checked', false);
  \$('#layoutform";
        // line 164
        echo ($context["module_row"] ?? null);
        echo " .upload-wise input[type=\\'hidden\\']').val('');

});
//--></script>
</div>";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/ciformbuilder.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  353 => 164,  347 => 163,  336 => 161,  332 => 160,  301 => 132,  293 => 127,  284 => 121,  276 => 116,  270 => 113,  259 => 105,  252 => 101,  246 => 98,  238 => 93,  225 => 83,  218 => 81,  207 => 79,  202 => 77,  197 => 75,  192 => 73,  181 => 65,  176 => 63,  169 => 59,  156 => 49,  148 => 44,  142 => 43,  136 => 40,  130 => 37,  112 => 34,  107 => 32,  102 => 30,  96 => 27,  84 => 21,  76 => 19,  74 => 18,  67 => 14,  63 => 12,  61 => 11,  56 => 9,  51 => 7,  47 => 6,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/ciformbuilder.twig", "");
    }
}
