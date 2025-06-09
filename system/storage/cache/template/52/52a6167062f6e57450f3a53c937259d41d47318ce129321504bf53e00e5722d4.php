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

/* setting/setting.twig */
class __TwigTemplate_359ff1e29e44621e56b419392fb91befc83d9496c477b839e6f172e13709348a extends \Twig\Template
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
        <button type=\"submit\" id=\"button-save\" form=\"form-setting\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\" disabled=\"disabled\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
        <a href=\"";
        // line 7
        echo ($context["cancel"] ?? null);
        echo "\" data-toggle=\"tooltip\" title=\"";
        echo ($context["button_cancel"] ?? null);
        echo "\" class=\"btn btn-default\"><i class=\"fa fa-reply\"></i></a></div>
      <h1>";
        // line 8
        echo ($context["heading_title"] ?? null);
        echo "</h1>
      <ul class=\"breadcrumb\">
        ";
        // line 10
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 11
            echo "        <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 11);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 11);
            echo "</a></li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 13
        echo "      </ul>
    </div>
  </div>
  <div class=\"container-fluid\"> ";
        // line 16
        if (($context["error_warning"] ?? null)) {
            // line 17
            echo "    <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 21
        echo "    ";
        if (($context["success"] ?? null)) {
            // line 22
            echo "    <div class=\"alert alert-success alert-dismissible\"><i class=\"fa fa-check-circle\"></i> ";
            echo ($context["success"] ?? null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 26
        echo "    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 28
        echo ($context["text_edit"] ?? null);
        echo "</h3>
      </div>
      <div class=\"panel-body\">
        <form action=\"";
        // line 31
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-setting\" class=\"form-horizontal\">
          <ul class=\"nav nav-tabs\">
            <li class=\"active\"><a href=\"#tab-general\" data-toggle=\"tab\">";
        // line 33
        echo ($context["tab_general"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-store\" data-toggle=\"tab\">";
        // line 34
        echo ($context["tab_store"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-local\" data-toggle=\"tab\">";
        // line 35
        echo ($context["tab_local"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-option\" data-toggle=\"tab\">";
        // line 36
        echo ($context["tab_option"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-image\" data-toggle=\"tab\">";
        // line 37
        echo ($context["tab_image"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-mail\" data-toggle=\"tab\">";
        // line 38
        echo ($context["tab_mail"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-server\" data-toggle=\"tab\">";
        // line 39
        echo ($context["tab_server"] ?? null);
        echo "</a></li>
          </ul>
          <div class=\"tab-content\">
            <div class=\"tab-pane active\" id=\"tab-general\">
              <div class=\"form-group required\">
                <label class=\"col-sm-2 control-label\" for=\"input-meta-title\">";
        // line 44
        echo ($context["entry_meta_title"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"config_meta_title\" value=\"";
        // line 46
        echo ($context["config_meta_title"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_meta_title"] ?? null);
        echo "\" id=\"input-meta-title\" class=\"form-control\" />
                  ";
        // line 47
        if (($context["error_meta_title"] ?? null)) {
            // line 48
            echo "                  <div class=\"text-danger\">";
            echo ($context["error_meta_title"] ?? null);
            echo "</div>
                  ";
        }
        // line 49
        echo " </div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-meta-description\">";
        // line 52
        echo ($context["entry_meta_description"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <textarea name=\"config_meta_description\" rows=\"5\" placeholder=\"";
        // line 54
        echo ($context["entry_meta_description"] ?? null);
        echo "\" id=\"input-meta-description\" class=\"form-control\">";
        echo ($context["config_meta_description"] ?? null);
        echo "</textarea>
                </div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-meta-keyword\">";
        // line 58
        echo ($context["entry_meta_keyword"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <textarea name=\"config_meta_keyword\" rows=\"5\" placeholder=\"";
        // line 60
        echo ($context["entry_meta_keyword"] ?? null);
        echo "\" id=\"input-meta-keyword\" class=\"form-control\">";
        echo ($context["config_meta_keyword"] ?? null);
        echo "</textarea>
                </div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-theme\">";
        // line 64
        echo ($context["entry_theme"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <select name=\"config_theme\" id=\"input-theme\" class=\"form-control\">
                    
                    ";
        // line 68
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["themes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["theme"]) {
            // line 69
            echo "                    ";
            if ((twig_get_attribute($this->env, $this->source, $context["theme"], "value", [], "any", false, false, false, 69) == ($context["config_theme"] ?? null))) {
                // line 70
                echo "                    
                    <option value=\"";
                // line 71
                echo twig_get_attribute($this->env, $this->source, $context["theme"], "value", [], "any", false, false, false, 71);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["theme"], "text", [], "any", false, false, false, 71);
                echo "</option>
                    
                    ";
            } else {
                // line 74
                echo "                    
                    <option value=\"";
                // line 75
                echo twig_get_attribute($this->env, $this->source, $context["theme"], "value", [], "any", false, false, false, 75);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["theme"], "text", [], "any", false, false, false, 75);
                echo "</option>
                    
                    ";
            }
            // line 78
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['theme'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 79
        echo "                  
                  </select>
                  <br />
                  <img src=\"\" alt=\"\" id=\"theme\" class=\"img-thumbnail\" /></div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-layout\">";
        // line 85
        echo ($context["entry_layout"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <select name=\"config_layout_id\" id=\"input-layout\" class=\"form-control\">
                    
                    ";
        // line 89
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["layouts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["layout"]) {
            // line 90
            echo "                    ";
            if ((twig_get_attribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 90) == ($context["config_layout_id"] ?? null))) {
                // line 91
                echo "                    
                    <option value=\"";
                // line 92
                echo twig_get_attribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 92);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["layout"], "name", [], "any", false, false, false, 92);
                echo "</option>
                    
                    ";
            } else {
                // line 95
                echo "                    
                    <option value=\"";
                // line 96
                echo twig_get_attribute($this->env, $this->source, $context["layout"], "layout_id", [], "any", false, false, false, 96);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["layout"], "name", [], "any", false, false, false, 96);
                echo "</option>
                    
                    ";
            }
            // line 99
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['layout'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 100
        echo "                  
                  </select>
                </div>
              </div>
            </div>
            <div class=\"tab-pane\" id=\"tab-store\">
              <div class=\"form-group required\">
                <label class=\"col-sm-2 control-label\" for=\"input-name\">";
        // line 107
        echo ($context["entry_name"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"config_name\" value=\"";
        // line 109
        echo ($context["config_name"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_name"] ?? null);
        echo "\" id=\"input-name\" class=\"form-control\" />
                  ";
        // line 110
        if (($context["error_name"] ?? null)) {
            // line 111
            echo "                  <div class=\"text-danger\">";
            echo ($context["error_name"] ?? null);
            echo "</div>
                  ";
        }
        // line 112
        echo " </div>
              </div>
              <div class=\"form-group required\">
                <label class=\"col-sm-2 control-label\" for=\"input-owner\">";
        // line 115
        echo ($context["entry_owner"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"config_owner\" value=\"";
        // line 117
        echo ($context["config_owner"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_owner"] ?? null);
        echo "\" id=\"input-owner\" class=\"form-control\" />
                  ";
        // line 118
        if (($context["error_owner"] ?? null)) {
            // line 119
            echo "                  <div class=\"text-danger\">";
            echo ($context["error_owner"] ?? null);
            echo "</div>
                  ";
        }
        // line 120
        echo " </div>
              </div>
              <div class=\"form-group required\">
                <label class=\"col-sm-2 control-label\" for=\"input-address\">";
        // line 123
        echo ($context["entry_address"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <textarea name=\"config_address\" placeholder=\"";
        // line 125
        echo ($context["entry_address"] ?? null);
        echo "\" rows=\"5\" id=\"input-address\" class=\"form-control\">";
        echo ($context["config_address"] ?? null);
        echo "</textarea>
                  ";
        // line 126
        if (($context["error_address"] ?? null)) {
            // line 127
            echo "                  <div class=\"text-danger\">";
            echo ($context["error_address"] ?? null);
            echo "</div>
                  ";
        }
        // line 128
        echo " </div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-geocode\"><span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
        // line 131
        echo ($context["help_geocode"] ?? null);
        echo "\">";
        echo ($context["entry_geocode"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"config_geocode\" value=\"";
        // line 133
        echo ($context["config_geocode"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_geocode"] ?? null);
        echo "\" id=\"input-geocode\" class=\"form-control\" />
                </div>
              </div>
              <div class=\"form-group required\">
                <label class=\"col-sm-2 control-label\" for=\"input-email\">";
        // line 137
        echo ($context["entry_email"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"config_email\" value=\"";
        // line 139
        echo ($context["config_email"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_email"] ?? null);
        echo "\" id=\"input-email\" class=\"form-control\" />
                  ";
        // line 140
        if (($context["error_email"] ?? null)) {
            // line 141
            echo "                  <div class=\"text-danger\">";
            echo ($context["error_email"] ?? null);
            echo "</div>
                  ";
        }
        // line 142
        echo " </div>
              </div>
              <div class=\"form-group required\">
                <label class=\"col-sm-2 control-label\" for=\"input-telephone\">";
        // line 145
        echo ($context["entry_telephone"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"config_telephone\" value=\"";
        // line 147
        echo ($context["config_telephone"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_telephone"] ?? null);
        echo "\" id=\"input-telephone\" class=\"form-control\" />
                  ";
        // line 148
        if (($context["error_telephone"] ?? null)) {
            // line 149
            echo "                  <div class=\"text-danger\">";
            echo ($context["error_telephone"] ?? null);
            echo "</div>
                  ";
        }
        // line 150
        echo " </div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-fax\">";
        // line 153
        echo ($context["entry_fax"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"config_fax\" value=\"";
        // line 155
        echo ($context["config_fax"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_fax"] ?? null);
        echo "\" id=\"input-fax\" class=\"form-control\" />
                </div>
              </div>              
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-image\">";
        // line 159
        echo ($context["entry_image"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\"><a href=\"\" id=\"thumb-image\" data-toggle=\"image\" class=\"img-thumbnail\"><img src=\"";
        // line 160
        echo ($context["thumb"] ?? null);
        echo "\" alt=\"\" title=\"\" data-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" /></a>
                  <input type=\"hidden\" name=\"config_image\" value=\"";
        // line 161
        echo ($context["config_image"] ?? null);
        echo "\" id=\"input-image\" />
                </div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-open\"><span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
        // line 165
        echo ($context["help_open"] ?? null);
        echo "\">";
        echo ($context["entry_open"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <textarea name=\"config_open\" rows=\"5\" placeholder=\"";
        // line 167
        echo ($context["entry_open"] ?? null);
        echo "\" id=\"input-open\" class=\"form-control\">";
        echo ($context["config_open"] ?? null);
        echo "</textarea>
                </div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-comment\"><span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
        // line 171
        echo ($context["help_comment"] ?? null);
        echo "\">";
        echo ($context["entry_comment"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <textarea name=\"config_comment\" rows=\"5\" placeholder=\"";
        // line 173
        echo ($context["entry_comment"] ?? null);
        echo "\" id=\"input-comment\" class=\"form-control\">";
        echo ($context["config_comment"] ?? null);
        echo "</textarea>
                </div>
              </div>
              ";
        // line 176
        if (($context["locations"] ?? null)) {
            // line 177
            echo "              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" data-container=\"#tab-general\" title=\"";
            // line 178
            echo ($context["help_location"] ?? null);
            echo "\">";
            echo ($context["entry_location"] ?? null);
            echo "</span></label>
                <div class=\"col-sm-10\"> ";
            // line 179
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["locations"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["location"]) {
                // line 180
                echo "                  <div class=\"checkbox\">
                    <label> ";
                // line 181
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["location"], "location_id", [], "any", false, false, false, 181), ($context["config_location"] ?? null))) {
                    // line 182
                    echo "                      <input type=\"checkbox\" name=\"config_location[]\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["location"], "location_id", [], "any", false, false, false, 182);
                    echo "\" checked=\"checked\" />
                      ";
                    // line 183
                    echo twig_get_attribute($this->env, $this->source, $context["location"], "name", [], "any", false, false, false, 183);
                    echo "
                      ";
                } else {
                    // line 185
                    echo "                      <input type=\"checkbox\" name=\"config_location[]\" value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["location"], "location_id", [], "any", false, false, false, 185);
                    echo "\" />
                      ";
                    // line 186
                    echo twig_get_attribute($this->env, $this->source, $context["location"], "name", [], "any", false, false, false, 186);
                    echo "
                      ";
                }
                // line 187
                echo " </label>
                  </div>
                  ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['location'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 189
            echo " </div>
              </div>
              ";
        }
        // line 191
        echo " </div>
            <div class=\"tab-pane\" id=\"tab-local\">
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-country\">";
        // line 194
        echo ($context["entry_country"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <select name=\"config_country_id\" id=\"input-country\" class=\"form-control\">
                    
                    ";
        // line 198
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["countries"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["country"]) {
            // line 199
            echo "                    ";
            if ((twig_get_attribute($this->env, $this->source, $context["country"], "country_id", [], "any", false, false, false, 199) == ($context["config_country_id"] ?? null))) {
                // line 200
                echo "                    
                    <option value=\"";
                // line 201
                echo twig_get_attribute($this->env, $this->source, $context["country"], "country_id", [], "any", false, false, false, 201);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["country"], "name", [], "any", false, false, false, 201);
                echo "</option>
                    
                    ";
            } else {
                // line 204
                echo "                    
                    <option value=\"";
                // line 205
                echo twig_get_attribute($this->env, $this->source, $context["country"], "country_id", [], "any", false, false, false, 205);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["country"], "name", [], "any", false, false, false, 205);
                echo "</option>
                    
                    ";
            }
            // line 208
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['country'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 209
        echo "                  
                  </select>
                </div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-zone\">";
        // line 214
        echo ($context["entry_zone"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <select name=\"config_zone_id\" id=\"input-zone\" class=\"form-control\">
                  </select>
                </div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-timezone\">";
        // line 221
        echo ($context["entry_timezone"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <select name=\"config_timezone\" id=\"input-timezone\" class=\"form-control\">
                    ";
        // line 224
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["timezones"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["timezone"]) {
            // line 225
            echo "                      ";
            if ((twig_get_attribute($this->env, $this->source, $context["timezone"], "value", [], "any", false, false, false, 225) == ($context["config_timezone"] ?? null))) {
                // line 226
                echo "                        <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["timezone"], "value", [], "any", false, false, false, 226);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["timezone"], "text", [], "any", false, false, false, 226);
                echo "</option>
                      ";
            } else {
                // line 228
                echo "                        <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["timezone"], "value", [], "any", false, false, false, 228);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["timezone"], "text", [], "any", false, false, false, 228);
                echo "</option>
                      ";
            }
            // line 230
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['timezone'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 231
        echo "                  </select>
                </div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-language\">";
        // line 235
        echo ($context["entry_language"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <select name=\"config_language\" id=\"input-language\" class=\"form-control\">
                    
                    ";
        // line 239
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 240
            echo "                    ";
            if ((twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 240) == ($context["config_language"] ?? null))) {
                // line 241
                echo "                    
                    <option value=\"";
                // line 242
                echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 242);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 242);
                echo "</option>
                    
                    ";
            } else {
                // line 245
                echo "                    
                    <option value=\"";
                // line 246
                echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 246);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 246);
                echo "</option>
                    
                    ";
            }
            // line 249
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 250
        echo "                  
                  </select>
                </div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-admin-language\">";
        // line 255
        echo ($context["entry_admin_language"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <select name=\"config_admin_language\" id=\"input-admin-language\" class=\"form-control\">
                    
                    ";
        // line 259
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            // line 260
            echo "                    ";
            if ((twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 260) == ($context["config_admin_language"] ?? null))) {
                // line 261
                echo "                    
                    <option value=\"";
                // line 262
                echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 262);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 262);
                echo "</option>
                    
                    ";
            } else {
                // line 265
                echo "                    
                    <option value=\"";
                // line 266
                echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 266);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 266);
                echo "</option>
                    
                    ";
            }
            // line 269
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 270
        echo "                  
                  </select>
                </div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-currency\"><span data-toggle=\"tooltip\" title=\"";
        // line 275
        echo ($context["help_currency"] ?? null);
        echo "\">";
        echo ($context["entry_currency"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <select name=\"config_currency\" id=\"input-currency\" class=\"form-control\">
                    
                    ";
        // line 279
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["currencies"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["currency"]) {
            // line 280
            echo "                    ";
            if ((twig_get_attribute($this->env, $this->source, $context["currency"], "code", [], "any", false, false, false, 280) == ($context["config_currency"] ?? null))) {
                // line 281
                echo "                    
                    <option value=\"";
                // line 282
                echo twig_get_attribute($this->env, $this->source, $context["currency"], "code", [], "any", false, false, false, 282);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["currency"], "title", [], "any", false, false, false, 282);
                echo "</option>
                    
                    ";
            } else {
                // line 285
                echo "                    
                    <option value=\"";
                // line 286
                echo twig_get_attribute($this->env, $this->source, $context["currency"], "code", [], "any", false, false, false, 286);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["currency"], "title", [], "any", false, false, false, 286);
                echo "</option>
                    
                    ";
            }
            // line 289
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['currency'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 290
        echo "                  
                  </select>
                </div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 295
        echo ($context["help_currency_auto"] ?? null);
        echo "\">";
        echo ($context["entry_currency_auto"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <label class=\"radio-inline\"> ";
        // line 297
        if (($context["config_currency_auto"] ?? null)) {
            // line 298
            echo "                    <input type=\"radio\" name=\"config_currency_auto\" value=\"1\" checked=\"checked\" />
                    ";
            // line 299
            echo ($context["text_yes"] ?? null);
            echo "
                    ";
        } else {
            // line 301
            echo "                    <input type=\"radio\" name=\"config_currency_auto\" value=\"1\" />
                    ";
            // line 302
            echo ($context["text_yes"] ?? null);
            echo "
                    ";
        }
        // line 303
        echo " </label>
                  <label class=\"radio-inline\"> ";
        // line 304
        if ( !($context["config_currency_auto"] ?? null)) {
            // line 305
            echo "                    <input type=\"radio\" name=\"config_currency_auto\" value=\"0\" checked=\"checked\" />
                    ";
            // line 306
            echo ($context["text_no"] ?? null);
            echo "
                    ";
        } else {
            // line 308
            echo "                    <input type=\"radio\" name=\"config_currency_auto\" value=\"0\" />
                    ";
            // line 309
            echo ($context["text_no"] ?? null);
            echo "
                    ";
        }
        // line 310
        echo " </label>
                </div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-length-class\">";
        // line 314
        echo ($context["entry_length_class"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <select name=\"config_length_class_id\" id=\"input-length-class\" class=\"form-control\">
                    
                    ";
        // line 318
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["length_classes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["length_class"]) {
            // line 319
            echo "                    ";
            if ((twig_get_attribute($this->env, $this->source, $context["length_class"], "length_class_id", [], "any", false, false, false, 319) == ($context["config_length_class_id"] ?? null))) {
                // line 320
                echo "                    
                    <option value=\"";
                // line 321
                echo twig_get_attribute($this->env, $this->source, $context["length_class"], "length_class_id", [], "any", false, false, false, 321);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["length_class"], "title", [], "any", false, false, false, 321);
                echo "</option>
                    
                    ";
            } else {
                // line 324
                echo "                    
                    <option value=\"";
                // line 325
                echo twig_get_attribute($this->env, $this->source, $context["length_class"], "length_class_id", [], "any", false, false, false, 325);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["length_class"], "title", [], "any", false, false, false, 325);
                echo "</option>
                    
                    ";
            }
            // line 328
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['length_class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 329
        echo "                  
                  </select>
                </div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-weight-class\">";
        // line 334
        echo ($context["entry_weight_class"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <select name=\"config_weight_class_id\" id=\"input-weight-class\" class=\"form-control\">
                    
                    ";
        // line 338
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["weight_classes"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["weight_class"]) {
            // line 339
            echo "                    ";
            if ((twig_get_attribute($this->env, $this->source, $context["weight_class"], "weight_class_id", [], "any", false, false, false, 339) == ($context["config_weight_class_id"] ?? null))) {
                // line 340
                echo "                    
                    <option value=\"";
                // line 341
                echo twig_get_attribute($this->env, $this->source, $context["weight_class"], "weight_class_id", [], "any", false, false, false, 341);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["weight_class"], "title", [], "any", false, false, false, 341);
                echo "</option>
                    
                    ";
            } else {
                // line 344
                echo "                    
                    <option value=\"";
                // line 345
                echo twig_get_attribute($this->env, $this->source, $context["weight_class"], "weight_class_id", [], "any", false, false, false, 345);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["weight_class"], "title", [], "any", false, false, false, 345);
                echo "</option>
                    
                    ";
            }
            // line 348
            echo "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['weight_class'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 349
        echo "                  
                  </select>
                </div>
              </div>
            </div>
            <div class=\"tab-pane\" id=\"tab-option\">
              <fieldset>
                <legend>";
        // line 356
        echo ($context["text_product"] ?? null);
        echo "</legend>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-discount\">Скидка</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_discount\" value=\"";
        // line 360
        echo ($context["config_discount"] ?? null);
        echo "\" placeholder=\"Скидка\" id=\"input-discount\" class=\"form-control\" />
                  </div>
                </div>
                <div class=\"form-group required\">
                  <label class=\"col-sm-2 control-label\" for=\"input-admin-limit\"><span data-toggle=\"tooltip\" title=\"";
        // line 364
        echo ($context["help_limit_admin"] ?? null);
        echo "\">";
        echo ($context["entry_limit_admin"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_limit_admin\" value=\"";
        // line 366
        echo ($context["config_limit_admin"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_limit_admin"] ?? null);
        echo "\" id=\"input-admin-limit\" class=\"form-control\" />
                    ";
        // line 367
        if (($context["error_limit_admin"] ?? null)) {
            // line 368
            echo "                    <div class=\"text-danger\">";
            echo ($context["error_limit_admin"] ?? null);
            echo "</div>
                    ";
        }
        // line 369
        echo " </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 373
        echo ($context["text_review"] ?? null);
        echo "</legend>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 375
        echo ($context["help_review"] ?? null);
        echo "\">";
        echo ($context["entry_review"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 377
        if (($context["config_review_status"] ?? null)) {
            // line 378
            echo "                      <input type=\"radio\" name=\"config_review_status\" value=\"1\" checked=\"checked\" />
                      ";
            // line 379
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 381
            echo "                      <input type=\"radio\" name=\"config_review_status\" value=\"1\" />
                      ";
            // line 382
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 383
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 384
        if ( !($context["config_review_status"] ?? null)) {
            // line 385
            echo "                      <input type=\"radio\" name=\"config_review_status\" value=\"0\" checked=\"checked\" />
                      ";
            // line 386
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 388
            echo "                      <input type=\"radio\" name=\"config_review_status\" value=\"0\" />
                      ";
            // line 389
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 390
        echo " </label>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 394
        echo ($context["help_review_guest"] ?? null);
        echo "\">";
        echo ($context["entry_review_guest"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 396
        if (($context["config_review_guest"] ?? null)) {
            // line 397
            echo "                      <input type=\"radio\" name=\"config_review_guest\" value=\"1\" checked=\"checked\" />
                      ";
            // line 398
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 400
            echo "                      <input type=\"radio\" name=\"config_review_guest\" value=\"1\" />
                      ";
            // line 401
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 402
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 403
        if ( !($context["config_review_guest"] ?? null)) {
            // line 404
            echo "                      <input type=\"radio\" name=\"config_review_guest\" value=\"0\" checked=\"checked\" />
                      ";
            // line 405
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 407
            echo "                      <input type=\"radio\" name=\"config_review_guest\" value=\"0\" />
                      ";
            // line 408
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 409
        echo " </label>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 414
        echo ($context["text_voucher"] ?? null);
        echo "</legend>
                <div class=\"form-group required\">
                  <label class=\"col-sm-2 control-label\" for=\"input-voucher-min\"><span data-toggle=\"tooltip\" title=\"";
        // line 416
        echo ($context["help_voucher_min"] ?? null);
        echo "\">";
        echo ($context["entry_voucher_min"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_voucher_min\" value=\"";
        // line 418
        echo ($context["config_voucher_min"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_voucher_min"] ?? null);
        echo "\" id=\"input-voucher-min\" class=\"form-control\" />
                    ";
        // line 419
        if (($context["error_voucher_min"] ?? null)) {
            // line 420
            echo "                    <div class=\"text-danger\">";
            echo ($context["error_voucher_min"] ?? null);
            echo "</div>
                    ";
        }
        // line 421
        echo " </div>
                </div>
                <div class=\"form-group required\">
                  <label class=\"col-sm-2 control-label\" for=\"input-voucher-max\"><span data-toggle=\"tooltip\" title=\"";
        // line 424
        echo ($context["help_voucher_max"] ?? null);
        echo "\">";
        echo ($context["entry_voucher_max"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_voucher_max\" value=\"";
        // line 426
        echo ($context["config_voucher_max"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_voucher_max"] ?? null);
        echo "\" id=\"input-voucher-max\" class=\"form-control\" />
                    ";
        // line 427
        if (($context["error_voucher_max"] ?? null)) {
            // line 428
            echo "                    <div class=\"text-danger\">";
            echo ($context["error_voucher_max"] ?? null);
            echo "</div>
                    ";
        }
        // line 429
        echo " </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 433
        echo ($context["text_tax"] ?? null);
        echo "</legend>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\">";
        // line 435
        echo ($context["entry_tax"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 437
        if (($context["config_tax"] ?? null)) {
            // line 438
            echo "                      <input type=\"radio\" name=\"config_tax\" value=\"1\" checked=\"checked\" />
                      ";
            // line 439
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 441
            echo "                      <input type=\"radio\" name=\"config_tax\" value=\"1\" />
                      ";
            // line 442
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 443
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 444
        if ( !($context["config_tax"] ?? null)) {
            // line 445
            echo "                      <input type=\"radio\" name=\"config_tax\" value=\"0\" checked=\"checked\" />
                      ";
            // line 446
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 448
            echo "                      <input type=\"radio\" name=\"config_tax\" value=\"0\" />
                      ";
            // line 449
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 450
        echo " </label>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-tax-default\"><span data-toggle=\"tooltip\" title=\"";
        // line 454
        echo ($context["help_tax_default"] ?? null);
        echo "\">";
        echo ($context["entry_tax_default"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_tax_default\" id=\"input-tax-default\" class=\"form-control\">
                      <option value=\"\">";
        // line 457
        echo ($context["text_none"] ?? null);
        echo "</option>
                      
                      ";
        // line 459
        if ((($context["config_tax_default"] ?? null) == "shipping")) {
            // line 460
            echo "                      
                      <option value=\"shipping\" selected=\"selected\">";
            // line 461
            echo ($context["text_shipping"] ?? null);
            echo "</option>
                      
                      ";
        } else {
            // line 464
            echo "                      
                      <option value=\"shipping\">";
            // line 465
            echo ($context["text_shipping"] ?? null);
            echo "</option>
                      
                      ";
        }
        // line 468
        echo "                      ";
        if ((($context["config_tax_default"] ?? null) == "payment")) {
            // line 469
            echo "                      
                      <option value=\"payment\" selected=\"selected\">";
            // line 470
            echo ($context["text_payment"] ?? null);
            echo "</option>
                      
                      ";
        } else {
            // line 473
            echo "                      
                      <option value=\"payment\">";
            // line 474
            echo ($context["text_payment"] ?? null);
            echo "</option>
                      
                      ";
        }
        // line 477
        echo "                    
                    </select>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-tax-customer\"><span data-toggle=\"tooltip\" title=\"";
        // line 482
        echo ($context["help_tax_customer"] ?? null);
        echo "\">";
        echo ($context["entry_tax_customer"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_tax_customer\" id=\"input-tax-customer\" class=\"form-control\">
                      <option value=\"\">";
        // line 485
        echo ($context["text_none"] ?? null);
        echo "</option>
                      
                      ";
        // line 487
        if ((($context["config_tax_customer"] ?? null) == "shipping")) {
            // line 488
            echo "                      
                      <option value=\"shipping\" selected=\"selected\">";
            // line 489
            echo ($context["text_shipping"] ?? null);
            echo "</option>
                      
                      ";
        } else {
            // line 492
            echo "                      
                      <option value=\"shipping\">";
            // line 493
            echo ($context["text_shipping"] ?? null);
            echo "</option>
                      
                      ";
        }
        // line 496
        echo "                      ";
        if ((($context["config_tax_customer"] ?? null) == "payment")) {
            // line 497
            echo "                      
                      <option value=\"payment\" selected=\"selected\">";
            // line 498
            echo ($context["text_payment"] ?? null);
            echo "</option>
                      
                      ";
        } else {
            // line 501
            echo "                      
                      <option value=\"payment\">";
            // line 502
            echo ($context["text_payment"] ?? null);
            echo "</option>
                      
                      ";
        }
        // line 505
        echo "                    
                    </select>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 511
        echo ($context["text_account"] ?? null);
        echo "</legend>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 513
        echo ($context["help_customer_online"] ?? null);
        echo "\">";
        echo ($context["entry_customer_online"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 515
        if (($context["config_customer_online"] ?? null)) {
            // line 516
            echo "                      <input type=\"radio\" name=\"config_customer_online\" value=\"1\" checked=\"checked\" />
                      ";
            // line 517
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 519
            echo "                      <input type=\"radio\" name=\"config_customer_online\" value=\"1\" />
                      ";
            // line 520
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 521
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 522
        if ( !($context["config_customer_online"] ?? null)) {
            // line 523
            echo "                      <input type=\"radio\" name=\"config_customer_online\" value=\"0\" checked=\"checked\" />
                      ";
            // line 524
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 526
            echo "                      <input type=\"radio\" name=\"config_customer_online\" value=\"0\" />
                      ";
            // line 527
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 528
        echo " </label>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 532
        echo ($context["help_customer_activity"] ?? null);
        echo "\">";
        echo ($context["entry_customer_activity"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 534
        if (($context["config_customer_activity"] ?? null)) {
            // line 535
            echo "                      <input type=\"radio\" name=\"config_customer_activity\" value=\"1\" checked=\"checked\" />
                      ";
            // line 536
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 538
            echo "                      <input type=\"radio\" name=\"config_customer_activity\" value=\"1\" />
                      ";
            // line 539
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 540
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 541
        if ( !($context["config_customer_activity"] ?? null)) {
            // line 542
            echo "                      <input type=\"radio\" name=\"config_customer_activity\" value=\"0\" checked=\"checked\" />
                      ";
            // line 543
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 545
            echo "                      <input type=\"radio\" name=\"config_customer_activity\" value=\"0\" />
                      ";
            // line 546
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 547
        echo " </label>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\">";
        // line 551
        echo ($context["entry_customer_search"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 553
        if (($context["config_customer_search"] ?? null)) {
            // line 554
            echo "                      <input type=\"radio\" name=\"config_customer_search\" value=\"1\" checked=\"checked\" />
                      ";
            // line 555
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 557
            echo "                      <input type=\"radio\" name=\"config_customer_search\" value=\"1\" />
                      ";
            // line 558
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 559
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 560
        if ( !($context["config_customer_search"] ?? null)) {
            // line 561
            echo "                      <input type=\"radio\" name=\"config_customer_search\" value=\"0\" checked=\"checked\" />
                      ";
            // line 562
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 564
            echo "                      <input type=\"radio\" name=\"config_customer_search\" value=\"0\" />
                      ";
            // line 565
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 566
        echo " </label>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-customer-group\"><span data-toggle=\"tooltip\" title=\"";
        // line 570
        echo ($context["help_customer_group"] ?? null);
        echo "\">";
        echo ($context["entry_customer_group"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_customer_group_id\" id=\"input-customer-group\" class=\"form-control\">
                      
                      ";
        // line 574
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 575
            echo "                      ";
            if ((twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 575) == ($context["config_customer_group_id"] ?? null))) {
                // line 576
                echo "                      
                      <option value=\"";
                // line 577
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 577);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 577);
                echo "</option>
                      
                      ";
            } else {
                // line 580
                echo "                      
                      <option value=\"";
                // line 581
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 581);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 581);
                echo "</option>
                      
                      ";
            }
            // line 584
            echo "                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 585
        echo "                    
                    </select>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 590
        echo ($context["help_customer_group_display"] ?? null);
        echo "\">";
        echo ($context["entry_customer_group_display"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\"> ";
        // line 591
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 592
            echo "                    <div class=\"checkbox\">
                      <label> ";
            // line 593
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 593), ($context["config_customer_group_display"] ?? null))) {
                // line 594
                echo "                        <input type=\"checkbox\" name=\"config_customer_group_display[]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 594);
                echo "\" checked=\"checked\" />
                        ";
                // line 595
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 595);
                echo "
                        ";
            } else {
                // line 597
                echo "                        <input type=\"checkbox\" name=\"config_customer_group_display[]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 597);
                echo "\" />
                        ";
                // line 598
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 598);
                echo "
                        ";
            }
            // line 599
            echo " </label>
                    </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 602
        echo "                    ";
        if (($context["error_customer_group_display"] ?? null)) {
            // line 603
            echo "                    <div class=\"text-danger\">";
            echo ($context["error_customer_group_display"] ?? null);
            echo "</div>
                    ";
        }
        // line 604
        echo " </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 607
        echo ($context["help_customer_price"] ?? null);
        echo "\">";
        echo ($context["entry_customer_price"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 609
        if (($context["config_customer_price"] ?? null)) {
            // line 610
            echo "                      <input type=\"radio\" name=\"config_customer_price\" value=\"1\" checked=\"checked\" />
                      ";
            // line 611
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 613
            echo "                      <input type=\"radio\" name=\"config_customer_price\" value=\"1\" />
                      ";
            // line 614
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 615
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 616
        if ( !($context["config_customer_price"] ?? null)) {
            // line 617
            echo "                      <input type=\"radio\" name=\"config_customer_price\" value=\"0\" checked=\"checked\" />
                      ";
            // line 618
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 620
            echo "                      <input type=\"radio\" name=\"config_customer_price\" value=\"0\" />
                      ";
            // line 621
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 622
        echo " </label>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-login-attempts\"><span data-toggle=\"tooltip\" title=\"";
        // line 626
        echo ($context["help_login_attempts"] ?? null);
        echo "\">";
        echo ($context["entry_login_attempts"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_login_attempts\" value=\"";
        // line 628
        echo ($context["config_login_attempts"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_login_attempts"] ?? null);
        echo "\" id=\"input-login-attempts\" class=\"form-control\" />
                    ";
        // line 629
        if (($context["error_login_attempts"] ?? null)) {
            // line 630
            echo "                    <div class=\"text-danger\">";
            echo ($context["error_login_attempts"] ?? null);
            echo "</div>
                    ";
        }
        // line 631
        echo " </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-account\"><span data-toggle=\"tooltip\" title=\"";
        // line 634
        echo ($context["help_account"] ?? null);
        echo "\">";
        echo ($context["entry_account"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_account_id\" id=\"input-account\" class=\"form-control\">
                      <option value=\"0\">";
        // line 637
        echo ($context["text_none"] ?? null);
        echo "</option>
                      
                      ";
        // line 639
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 640
            echo "                      ";
            if ((twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 640) == ($context["config_account_id"] ?? null))) {
                // line 641
                echo "                      
                      <option value=\"";
                // line 642
                echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 642);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 642);
                echo "</option>
                      
                      ";
            } else {
                // line 645
                echo "                      
                      <option value=\"";
                // line 646
                echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 646);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 646);
                echo "</option>
                      
                      ";
            }
            // line 649
            echo "                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 650
        echo "                    
                    </select>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 656
        echo ($context["text_checkout"] ?? null);
        echo "</legend>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-invoice-prefix\"><span data-toggle=\"tooltip\" title=\"";
        // line 658
        echo ($context["help_invoice_prefix"] ?? null);
        echo "\">";
        echo ($context["entry_invoice_prefix"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_invoice_prefix\" value=\"";
        // line 660
        echo ($context["config_invoice_prefix"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_invoice_prefix"] ?? null);
        echo "\" id=\"input-invoice-prefix\" class=\"form-control\" />
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 664
        echo ($context["help_cart_weight"] ?? null);
        echo "\">";
        echo ($context["entry_cart_weight"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 666
        if (($context["config_cart_weight"] ?? null)) {
            // line 667
            echo "                      <input type=\"radio\" name=\"config_cart_weight\" value=\"1\" checked=\"checked\" />
                      ";
            // line 668
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 670
            echo "                      <input type=\"radio\" name=\"config_cart_weight\" value=\"1\" />
                      ";
            // line 671
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 672
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 673
        if ( !($context["config_cart_weight"] ?? null)) {
            // line 674
            echo "                      <input type=\"radio\" name=\"config_cart_weight\" value=\"0\" checked=\"checked\" />
                      ";
            // line 675
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 677
            echo "                      <input type=\"radio\" name=\"config_cart_weight\" value=\"0\" />
                      ";
            // line 678
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 679
        echo " </label>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 683
        echo ($context["help_checkout_guest"] ?? null);
        echo "\">";
        echo ($context["entry_checkout_guest"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 685
        if (($context["config_checkout_guest"] ?? null)) {
            // line 686
            echo "                      <input type=\"radio\" name=\"config_checkout_guest\" value=\"1\" checked=\"checked\" />
                      ";
            // line 687
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 689
            echo "                      <input type=\"radio\" name=\"config_checkout_guest\" value=\"1\" />
                      ";
            // line 690
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 691
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 692
        if ( !($context["config_checkout_guest"] ?? null)) {
            // line 693
            echo "                      <input type=\"radio\" name=\"config_checkout_guest\" value=\"0\" checked=\"checked\" />
                      ";
            // line 694
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 696
            echo "                      <input type=\"radio\" name=\"config_checkout_guest\" value=\"0\" />
                      ";
            // line 697
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 698
        echo " </label>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-checkout\"><span data-toggle=\"tooltip\" title=\"";
        // line 702
        echo ($context["help_checkout"] ?? null);
        echo "\">";
        echo ($context["entry_checkout"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_checkout_id\" id=\"input-checkout\" class=\"form-control\">
                      <option value=\"0\">";
        // line 705
        echo ($context["text_none"] ?? null);
        echo "</option>
                      
                      ";
        // line 707
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 708
            echo "                      ";
            if ((twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 708) == ($context["config_checkout_id"] ?? null))) {
                // line 709
                echo "                      
                      <option value=\"";
                // line 710
                echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 710);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 710);
                echo "</option>
                      
                      ";
            } else {
                // line 713
                echo "                      
                      <option value=\"";
                // line 714
                echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 714);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 714);
                echo "</option>
                      
                      ";
            }
            // line 717
            echo "                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 718
        echo "                    
                    </select>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-order-status\"><span data-toggle=\"tooltip\" title=\"";
        // line 723
        echo ($context["help_order_status"] ?? null);
        echo "\">";
        echo ($context["entry_order_status"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_order_status_id\" id=\"input-order-status\" class=\"form-control\">
                      
                      ";
        // line 727
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 728
            echo "                      ";
            if ((twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 728) == ($context["config_order_status_id"] ?? null))) {
                // line 729
                echo "                      
                      <option value=\"";
                // line 730
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 730);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 730);
                echo "</option>
                      
                      ";
            } else {
                // line 733
                echo "                      
                      <option value=\"";
                // line 734
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 734);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 734);
                echo "</option>
                      
                      ";
            }
            // line 737
            echo "                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 738
        echo "                    
                    </select>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-process-status\"><span data-toggle=\"tooltip\" title=\"";
        // line 743
        echo ($context["help_processing_status"] ?? null);
        echo "\">";
        echo ($context["entry_processing_status"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <div class=\"well well-sm\" style=\"height: 150px; overflow: auto;\"> ";
        // line 745
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 746
            echo "                      <div class=\"checkbox\">
                        <label> ";
            // line 747
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 747), ($context["config_processing_status"] ?? null))) {
                // line 748
                echo "                          <input type=\"checkbox\" name=\"config_processing_status[]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 748);
                echo "\" checked=\"checked\" />
                          ";
                // line 749
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 749);
                echo "
                          ";
            } else {
                // line 751
                echo "                          <input type=\"checkbox\" name=\"config_processing_status[]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 751);
                echo "\" />
                          ";
                // line 752
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 752);
                echo "
                          ";
            }
            // line 753
            echo " </label>
                      </div>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 755
        echo " </div>
                    ";
        // line 756
        if (($context["error_processing_status"] ?? null)) {
            // line 757
            echo "                    <div class=\"text-danger\">";
            echo ($context["error_processing_status"] ?? null);
            echo "</div>
                    ";
        }
        // line 758
        echo " </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-complete-status\"><span data-toggle=\"tooltip\" title=\"";
        // line 761
        echo ($context["help_complete_status"] ?? null);
        echo "\">";
        echo ($context["entry_complete_status"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <div class=\"well well-sm\" style=\"height: 150px; overflow: auto;\"> ";
        // line 763
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 764
            echo "                      <div class=\"checkbox\">
                        <label> ";
            // line 765
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 765), ($context["config_complete_status"] ?? null))) {
                // line 766
                echo "                          <input type=\"checkbox\" name=\"config_complete_status[]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 766);
                echo "\" checked=\"checked\" />
                          ";
                // line 767
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 767);
                echo "
                          ";
            } else {
                // line 769
                echo "                          <input type=\"checkbox\" name=\"config_complete_status[]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 769);
                echo "\" />
                          ";
                // line 770
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 770);
                echo "
                          ";
            }
            // line 771
            echo " </label>
                      </div>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 773
        echo " </div>
                    ";
        // line 774
        if (($context["error_complete_status"] ?? null)) {
            // line 775
            echo "                    <div class=\"text-danger\">";
            echo ($context["error_complete_status"] ?? null);
            echo "</div>
                    ";
        }
        // line 776
        echo " </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-fraud-status\"><span data-toggle=\"tooltip\" title=\"";
        // line 779
        echo ($context["help_fraud_status"] ?? null);
        echo "\">";
        echo ($context["entry_fraud_status"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_fraud_status_id\" id=\"input-fraud-status\" class=\"form-control\">
                      
                      ";
        // line 783
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["order_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["order_status"]) {
            // line 784
            echo "                      ";
            if ((twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 784) == ($context["config_fraud_status_id"] ?? null))) {
                // line 785
                echo "                      
                      <option value=\"";
                // line 786
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 786);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 786);
                echo "</option>
                      
                      ";
            } else {
                // line 789
                echo "                      
                      <option value=\"";
                // line 790
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "order_status_id", [], "any", false, false, false, 790);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["order_status"], "name", [], "any", false, false, false, 790);
                echo "</option>
                      
                      ";
            }
            // line 793
            echo "                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 794
        echo "                    
                    </select>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-api\"><span data-toggle=\"tooltip\" title=\"";
        // line 799
        echo ($context["help_api"] ?? null);
        echo "\">";
        echo ($context["entry_api"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_api_id\" id=\"input-api\" class=\"form-control\">
                      <option value=\"0\">";
        // line 802
        echo ($context["text_none"] ?? null);
        echo "</option>
                      
                      ";
        // line 804
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["apis"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["api"]) {
            // line 805
            echo "                      ";
            if ((twig_get_attribute($this->env, $this->source, $context["api"], "api_id", [], "any", false, false, false, 805) == ($context["config_api_id"] ?? null))) {
                // line 806
                echo "                      
                      <option value=\"";
                // line 807
                echo twig_get_attribute($this->env, $this->source, $context["api"], "api_id", [], "any", false, false, false, 807);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["api"], "username", [], "any", false, false, false, 807);
                echo "</option>
                      
                      ";
            } else {
                // line 810
                echo "                      
                      <option value=\"";
                // line 811
                echo twig_get_attribute($this->env, $this->source, $context["api"], "api_id", [], "any", false, false, false, 811);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["api"], "username", [], "any", false, false, false, 811);
                echo "</option>
                      
                      ";
            }
            // line 814
            echo "                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['api'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 815
        echo "                    
                    </select>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 821
        echo ($context["text_stock"] ?? null);
        echo "</legend>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 823
        echo ($context["help_stock_display"] ?? null);
        echo "\">";
        echo ($context["entry_stock_display"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 825
        if (($context["config_stock_display"] ?? null)) {
            // line 826
            echo "                      <input type=\"radio\" name=\"config_stock_display\" value=\"1\" checked=\"checked\" />
                      ";
            // line 827
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 829
            echo "                      <input type=\"radio\" name=\"config_stock_display\" value=\"1\" />
                      ";
            // line 830
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 831
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 832
        if ( !($context["config_stock_display"] ?? null)) {
            // line 833
            echo "                      <input type=\"radio\" name=\"config_stock_display\" value=\"0\" checked=\"checked\" />
                      ";
            // line 834
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 836
            echo "                      <input type=\"radio\" name=\"config_stock_display\" value=\"0\" />
                      ";
            // line 837
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 838
        echo " </label>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 842
        echo ($context["help_stock_warning"] ?? null);
        echo "\">";
        echo ($context["entry_stock_warning"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 844
        if (($context["config_stock_warning"] ?? null)) {
            // line 845
            echo "                      <input type=\"radio\" name=\"config_stock_warning\" value=\"1\" checked=\"checked\" />
                      ";
            // line 846
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 848
            echo "                      <input type=\"radio\" name=\"config_stock_warning\" value=\"1\" />
                      ";
            // line 849
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 850
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 851
        if ( !($context["config_stock_warning"] ?? null)) {
            // line 852
            echo "                      <input type=\"radio\" name=\"config_stock_warning\" value=\"0\" checked=\"checked\" />
                      ";
            // line 853
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 855
            echo "                      <input type=\"radio\" name=\"config_stock_warning\" value=\"0\" />
                      ";
            // line 856
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 857
        echo " </label>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 861
        echo ($context["help_stock_checkout"] ?? null);
        echo "\">";
        echo ($context["entry_stock_checkout"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 863
        if (($context["config_stock_checkout"] ?? null)) {
            // line 864
            echo "                      <input type=\"radio\" name=\"config_stock_checkout\" value=\"1\" checked=\"checked\" />
                      ";
            // line 865
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 867
            echo "                      <input type=\"radio\" name=\"config_stock_checkout\" value=\"1\" />
                      ";
            // line 868
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 869
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 870
        if ( !($context["config_stock_checkout"] ?? null)) {
            // line 871
            echo "                      <input type=\"radio\" name=\"config_stock_checkout\" value=\"0\" checked=\"checked\" />
                      ";
            // line 872
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 874
            echo "                      <input type=\"radio\" name=\"config_stock_checkout\" value=\"0\" />
                      ";
            // line 875
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 876
        echo " </label>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 881
        echo ($context["text_affiliate"] ?? null);
        echo "</legend>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-affiliate-group\">";
        // line 883
        echo ($context["entry_affiliate_group"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_affiliate_group_id\" id=\"input-affiliate-group\" class=\"form-control\">
                      
                      ";
        // line 887
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["customer_group"]) {
            // line 888
            echo "                      ";
            if ((twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 888) == ($context["config_affiliate_group_id"] ?? null))) {
                // line 889
                echo "                      
                      <option value=\"";
                // line 890
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 890);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 890);
                echo "</option>
                      
                      ";
            } else {
                // line 893
                echo "                      
                      <option value=\"";
                // line 894
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "customer_group_id", [], "any", false, false, false, 894);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["customer_group"], "name", [], "any", false, false, false, 894);
                echo "</option>
                      
                      ";
            }
            // line 897
            echo "                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['customer_group'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 898
        echo "                    
                    </select>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 903
        echo ($context["help_affiliate_approval"] ?? null);
        echo "\">";
        echo ($context["entry_affiliate_approval"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 905
        if (($context["config_affiliate_approval"] ?? null)) {
            // line 906
            echo "                      <input type=\"radio\" name=\"config_affiliate_approval\" value=\"1\" checked=\"checked\" />
                      ";
            // line 907
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 909
            echo "                      <input type=\"radio\" name=\"config_affiliate_approval\" value=\"1\" />
                      ";
            // line 910
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 911
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 912
        if ( !($context["config_affiliate_approval"] ?? null)) {
            // line 913
            echo "                      <input type=\"radio\" name=\"config_affiliate_approval\" value=\"0\" checked=\"checked\" />
                      ";
            // line 914
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 916
            echo "                      <input type=\"radio\" name=\"config_affiliate_approval\" value=\"0\" />
                      ";
            // line 917
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 918
        echo " </label>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 922
        echo ($context["help_affiliate_auto"] ?? null);
        echo "\">";
        echo ($context["entry_affiliate_auto"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 924
        if (($context["config_affiliate_auto"] ?? null)) {
            // line 925
            echo "                      <input type=\"radio\" name=\"config_affiliate_auto\" value=\"1\" checked=\"checked\" />
                      ";
            // line 926
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 928
            echo "                      <input type=\"radio\" name=\"config_affiliate_auto\" value=\"1\" />
                      ";
            // line 929
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 930
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 931
        if ( !($context["config_affiliate_auto"] ?? null)) {
            // line 932
            echo "                      <input type=\"radio\" name=\"config_affiliate_auto\" value=\"0\" checked=\"checked\" />
                      ";
            // line 933
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 935
            echo "                      <input type=\"radio\" name=\"config_affiliate_auto\" value=\"0\" />
                      ";
            // line 936
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 937
        echo " </label>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-affiliate-commission\"><span data-toggle=\"tooltip\" title=\"";
        // line 941
        echo ($context["help_affiliate_commission"] ?? null);
        echo "\">";
        echo ($context["entry_affiliate_commission"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_affiliate_commission\" value=\"";
        // line 943
        echo ($context["config_affiliate_commission"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_affiliate_commission"] ?? null);
        echo "\" id=\"input-affiliate-commission\" class=\"form-control\" />
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-affiliate\"><span data-toggle=\"tooltip\" title=\"";
        // line 947
        echo ($context["help_affiliate"] ?? null);
        echo "\">";
        echo ($context["entry_affiliate"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_affiliate_id\" id=\"input-affiliate\" class=\"form-control\">
                      <option value=\"0\">";
        // line 950
        echo ($context["text_none"] ?? null);
        echo "</option>
                      
                      ";
        // line 952
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 953
            echo "                      ";
            if ((twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 953) == ($context["config_affiliate_id"] ?? null))) {
                // line 954
                echo "                      
                      <option value=\"";
                // line 955
                echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 955);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 955);
                echo "</option>
                      
                      ";
            } else {
                // line 958
                echo "                      
                      <option value=\"";
                // line 959
                echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 959);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 959);
                echo "</option>
                      
                      ";
            }
            // line 962
            echo "                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 963
        echo "                    
                    </select>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 969
        echo ($context["text_return"] ?? null);
        echo "</legend>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-return\"><span data-toggle=\"tooltip\" title=\"";
        // line 971
        echo ($context["help_return"] ?? null);
        echo "\">";
        echo ($context["entry_return"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_return_id\" id=\"input-return\" class=\"form-control\">
                      <option value=\"0\">";
        // line 974
        echo ($context["text_none"] ?? null);
        echo "</option>
                      
                      ";
        // line 976
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["informations"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["information"]) {
            // line 977
            echo "                      ";
            if ((twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 977) == ($context["config_return_id"] ?? null))) {
                // line 978
                echo "                      
                      <option value=\"";
                // line 979
                echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 979);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 979);
                echo "</option>
                      
                      ";
            } else {
                // line 982
                echo "                      
                      <option value=\"";
                // line 983
                echo twig_get_attribute($this->env, $this->source, $context["information"], "information_id", [], "any", false, false, false, 983);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["information"], "title", [], "any", false, false, false, 983);
                echo "</option>
                      
                      ";
            }
            // line 986
            echo "                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['information'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 987
        echo "                    
                    </select>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-return-status\"><span data-toggle=\"tooltip\" title=\"";
        // line 992
        echo ($context["help_return_status"] ?? null);
        echo "\">";
        echo ($context["entry_return_status"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_return_status_id\" id=\"input-return-status\" class=\"form-control\">
                      
                      ";
        // line 996
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["return_statuses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["return_status"]) {
            // line 997
            echo "                      ";
            if ((twig_get_attribute($this->env, $this->source, $context["return_status"], "return_status_id", [], "any", false, false, false, 997) == ($context["config_return_status_id"] ?? null))) {
                // line 998
                echo "                      
                      <option value=\"";
                // line 999
                echo twig_get_attribute($this->env, $this->source, $context["return_status"], "return_status_id", [], "any", false, false, false, 999);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["return_status"], "name", [], "any", false, false, false, 999);
                echo "</option>
                      
                      ";
            } else {
                // line 1002
                echo "                      
                      <option value=\"";
                // line 1003
                echo twig_get_attribute($this->env, $this->source, $context["return_status"], "return_status_id", [], "any", false, false, false, 1003);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["return_status"], "name", [], "any", false, false, false, 1003);
                echo "</option>
                      
                      ";
            }
            // line 1006
            echo "                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['return_status'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1007
        echo "                    
                    </select>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 1013
        echo ($context["text_captcha"] ?? null);
        echo "</legend>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 1015
        echo ($context["help_captcha"] ?? null);
        echo "\">";
        echo ($context["entry_captcha"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_captcha\" id=\"input-captcha\" class=\"form-control\">
                      <option value=\"\">";
        // line 1018
        echo ($context["text_none"] ?? null);
        echo "</option>
                      
                      ";
        // line 1020
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["captchas"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["captcha"]) {
            // line 1021
            echo "                      ";
            if ((twig_get_attribute($this->env, $this->source, $context["captcha"], "value", [], "any", false, false, false, 1021) == ($context["config_captcha"] ?? null))) {
                // line 1022
                echo "                      
                      <option value=\"";
                // line 1023
                echo twig_get_attribute($this->env, $this->source, $context["captcha"], "value", [], "any", false, false, false, 1023);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["captcha"], "text", [], "any", false, false, false, 1023);
                echo "</option>
                      
                      ";
            } else {
                // line 1026
                echo "                      
                      <option value=\"";
                // line 1027
                echo twig_get_attribute($this->env, $this->source, $context["captcha"], "value", [], "any", false, false, false, 1027);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["captcha"], "text", [], "any", false, false, false, 1027);
                echo "</option>
                      
                      ";
            }
            // line 1030
            echo "                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['captcha'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1031
        echo "                    
                    </select>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\">";
        // line 1036
        echo ($context["entry_captcha_page"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <div class=\"well well-sm\" style=\"height: 150px; overflow: auto;\"> ";
        // line 1038
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["captcha_pages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["captcha_page"]) {
            // line 1039
            echo "                      <div class=\"checkbox\">
                        <label> ";
            // line 1040
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["captcha_page"], "value", [], "any", false, false, false, 1040), ($context["config_captcha_page"] ?? null))) {
                // line 1041
                echo "                          <input type=\"checkbox\" name=\"config_captcha_page[]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["captcha_page"], "value", [], "any", false, false, false, 1041);
                echo "\" checked=\"checked\" />
                          ";
                // line 1042
                echo twig_get_attribute($this->env, $this->source, $context["captcha_page"], "text", [], "any", false, false, false, 1042);
                echo "
                          ";
            } else {
                // line 1044
                echo "                          <input type=\"checkbox\" name=\"config_captcha_page[]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["captcha_page"], "value", [], "any", false, false, false, 1044);
                echo "\" />
                          ";
                // line 1045
                echo twig_get_attribute($this->env, $this->source, $context["captcha_page"], "text", [], "any", false, false, false, 1045);
                echo "
                          ";
            }
            // line 1046
            echo " </label>
                      </div>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['captcha_page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1048
        echo " </div>
                  </div>
                </div>
              </fieldset>
            </div>
            <div class=\"tab-pane\" id=\"tab-image\">
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-logo\">";
        // line 1055
        echo ($context["entry_logo"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\"><a href=\"\" id=\"thumb-logo\" data-toggle=\"image\" class=\"img-thumbnail\"><img src=\"";
        // line 1056
        echo ($context["logo"] ?? null);
        echo "\" alt=\"\" title=\"\" data-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" /></a>
                  <input type=\"hidden\" name=\"config_logo\" value=\"";
        // line 1057
        echo ($context["config_logo"] ?? null);
        echo "\" id=\"input-logo\" />
                </div>
              </div>
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"input-icon\"><span data-toggle=\"tooltip\" title=\"";
        // line 1061
        echo ($context["help_icon"] ?? null);
        echo "\">";
        echo ($context["entry_icon"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\"><a href=\"\" id=\"thumb-icon\" data-toggle=\"image\" class=\"img-thumbnail\"><img src=\"";
        // line 1062
        echo ($context["icon"] ?? null);
        echo "\" alt=\"\" title=\"\" data-placeholder=\"";
        echo ($context["placeholder"] ?? null);
        echo "\" /></a>
                  <input type=\"hidden\" name=\"config_icon\" value=\"";
        // line 1063
        echo ($context["config_icon"] ?? null);
        echo "\" id=\"input-icon\" />
                </div>
              </div>
            </div>
            <div class=\"tab-pane\" id=\"tab-mail\">
              <fieldset>
                <legend>";
        // line 1069
        echo ($context["text_general"] ?? null);
        echo "</legend>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-mail-engine\"><span data-toggle=\"tooltip\" title=\"";
        // line 1071
        echo ($context["help_mail_engine"] ?? null);
        echo "\">";
        echo ($context["entry_mail_engine"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <select name=\"config_mail_engine\" id=\"input-mail-engine\" class=\"form-control\">
                      
                      ";
        // line 1075
        if ((($context["config_mail_engine"] ?? null) == "mail")) {
            // line 1076
            echo "                      
                      <option value=\"mail\" selected=\"selected\">";
            // line 1077
            echo ($context["text_mail"] ?? null);
            echo "</option>
                      
                      ";
        } else {
            // line 1080
            echo "                      
                      <option value=\"mail\">";
            // line 1081
            echo ($context["text_mail"] ?? null);
            echo "</option>
                      
                      ";
        }
        // line 1084
        echo "                      ";
        if ((($context["config_mail_engine"] ?? null) == "smtp")) {
            // line 1085
            echo "                      
                      <option value=\"smtp\" selected=\"selected\">";
            // line 1086
            echo ($context["text_smtp"] ?? null);
            echo "</option>
                      
                      ";
        } else {
            // line 1089
            echo "                      
                      <option value=\"smtp\">";
            // line 1090
            echo ($context["text_smtp"] ?? null);
            echo "</option>
                      
                      ";
        }
        // line 1093
        echo "                    
                    </select>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-mail-parameter\"><span data-toggle=\"tooltip\" title=\"";
        // line 1098
        echo ($context["help_mail_parameter"] ?? null);
        echo "\">";
        echo ($context["entry_mail_parameter"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_mail_parameter\" value=\"";
        // line 1100
        echo ($context["config_mail_parameter"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_mail_parameter"] ?? null);
        echo "\" id=\"input-mail-parameter\" class=\"form-control\" />
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-mail-smtp-hostname\"><span data-toggle=\"tooltip\" title=\"";
        // line 1104
        echo ($context["help_mail_smtp_hostname"] ?? null);
        echo "\">";
        echo ($context["entry_mail_smtp_hostname"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_mail_smtp_hostname\" value=\"";
        // line 1106
        echo ($context["config_mail_smtp_hostname"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_mail_smtp_hostname"] ?? null);
        echo "\" id=\"input-mail-smtp-hostname\" class=\"form-control\" />
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-mail-smtp-username\">";
        // line 1110
        echo ($context["entry_mail_smtp_username"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_mail_smtp_username\" value=\"";
        // line 1112
        echo ($context["config_mail_smtp_username"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_mail_smtp_username"] ?? null);
        echo "\" id=\"input-mail-smtp-username\" class=\"form-control\" />
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-mail-smtp-password\"><span data-toggle=\"tooltip\" title=\"";
        // line 1116
        echo ($context["help_mail_smtp_password"] ?? null);
        echo "\">";
        echo ($context["entry_mail_smtp_password"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_mail_smtp_password\" value=\"";
        // line 1118
        echo ($context["config_mail_smtp_password"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_mail_smtp_password"] ?? null);
        echo "\" id=\"input-mail-smtp-password\" class=\"form-control\" />
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-mail-smtp-port\">";
        // line 1122
        echo ($context["entry_mail_smtp_port"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_mail_smtp_port\" value=\"";
        // line 1124
        echo ($context["config_mail_smtp_port"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_mail_smtp_port"] ?? null);
        echo "\" id=\"input-mail-smtp-port\" class=\"form-control\" />
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-mail-smtp-timeout\">";
        // line 1128
        echo ($context["entry_mail_smtp_timeout"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_mail_smtp_timeout\" value=\"";
        // line 1130
        echo ($context["config_mail_smtp_timeout"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_mail_smtp_timeout"] ?? null);
        echo "\" id=\"input-mail-smtp-timeout\" class=\"form-control\" />
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 1135
        echo ($context["text_mail_alert"] ?? null);
        echo "</legend>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 1137
        echo ($context["help_mail_alert"] ?? null);
        echo "\">";
        echo ($context["entry_mail_alert"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <div class=\"well well-sm\" style=\"height: 150px; overflow: auto;\"> ";
        // line 1139
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["mail_alerts"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["mail_alert"]) {
            // line 1140
            echo "                      <div class=\"checkbox\">
                        <label> ";
            // line 1141
            if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["mail_alert"], "value", [], "any", false, false, false, 1141), ($context["config_mail_alert"] ?? null))) {
                // line 1142
                echo "                          <input type=\"checkbox\" name=\"config_mail_alert[]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["mail_alert"], "value", [], "any", false, false, false, 1142);
                echo "\" checked=\"checked\" />
                          ";
                // line 1143
                echo twig_get_attribute($this->env, $this->source, $context["mail_alert"], "text", [], "any", false, false, false, 1143);
                echo "
                          ";
            } else {
                // line 1145
                echo "                          <input type=\"checkbox\" name=\"config_mail_alert[]\" value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["mail_alert"], "value", [], "any", false, false, false, 1145);
                echo "\" />
                          ";
                // line 1146
                echo twig_get_attribute($this->env, $this->source, $context["mail_alert"], "text", [], "any", false, false, false, 1146);
                echo "
                          ";
            }
            // line 1147
            echo " </label>
                      </div>
                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['mail_alert'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1149
        echo " </div>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-mail-alert-email\"><span data-toggle=\"tooltip\" title=\"";
        // line 1153
        echo ($context["help_mail_alert_email"] ?? null);
        echo "\">";
        echo ($context["entry_mail_alert_email"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <textarea name=\"config_mail_alert_email\" rows=\"5\" placeholder=\"";
        // line 1155
        echo ($context["entry_mail_alert_email"] ?? null);
        echo "\" id=\"input-alert-email\" class=\"form-control\">";
        echo ($context["config_mail_alert_email"] ?? null);
        echo "</textarea>
                  </div>
                </div>
              </fieldset>
            </div>
            <div class=\"tab-pane\" id=\"tab-server\">
              <fieldset>
                <legend>";
        // line 1162
        echo ($context["text_general"] ?? null);
        echo "</legend>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 1164
        echo ($context["help_maintenance"] ?? null);
        echo "\">";
        echo ($context["entry_maintenance"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 1166
        if (($context["config_maintenance"] ?? null)) {
            // line 1167
            echo "                      <input type=\"radio\" name=\"config_maintenance\" value=\"1\" checked=\"checked\" />
                      ";
            // line 1168
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 1170
            echo "                      <input type=\"radio\" name=\"config_maintenance\" value=\"1\" />
                      ";
            // line 1171
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 1172
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 1173
        if ( !($context["config_maintenance"] ?? null)) {
            // line 1174
            echo "                      <input type=\"radio\" name=\"config_maintenance\" value=\"0\" checked=\"checked\" />
                      ";
            // line 1175
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 1177
            echo "                      <input type=\"radio\" name=\"config_maintenance\" value=\"0\" />
                      ";
            // line 1178
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 1179
        echo " </label>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 1183
        echo ($context["help_seo_url"] ?? null);
        echo "\">";
        echo ($context["entry_seo_url"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 1185
        if (($context["config_seo_url"] ?? null)) {
            // line 1186
            echo "                      <input type=\"radio\" name=\"config_seo_url\" value=\"1\" checked=\"checked\" />
                      ";
            // line 1187
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 1189
            echo "                      <input type=\"radio\" name=\"config_seo_url\" value=\"1\" />
                      ";
            // line 1190
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 1191
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 1192
        if ( !($context["config_seo_url"] ?? null)) {
            // line 1193
            echo "                      <input type=\"radio\" name=\"config_seo_url\" value=\"0\" checked=\"checked\" />
                      ";
            // line 1194
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 1196
            echo "                      <input type=\"radio\" name=\"config_seo_url\" value=\"0\" />
                      ";
            // line 1197
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 1198
        echo " </label>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"config_seo_url_type\">";
        // line 1202
        echo ($context["entry_seo_url_type"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <select id=\"config_seo_url_type\" class=\"form-control\" name=\"config_seo_url_type\">
                      ";
        // line 1205
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["seo_types"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["seo_type"]) {
            // line 1206
            echo "                        ";
            if ((twig_get_attribute($this->env, $this->source, $context["seo_type"], "type", [], "any", false, false, false, 1206) == ($context["config_seo_url_type"] ?? null))) {
                // line 1207
                echo "                          <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["seo_type"], "type", [], "any", false, false, false, 1207);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["seo_type"], "name", [], "any", false, false, false, 1207);
                echo "</option>
                        ";
            } else {
                // line 1209
                echo "                          <option value=\"";
                echo twig_get_attribute($this->env, $this->source, $context["seo_type"], "type", [], "any", false, false, false, 1209);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["seo_type"], "name", [], "any", false, false, false, 1209);
                echo "</option>
                        ";
            }
            // line 1211
            echo "                      ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['seo_type'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1212
        echo "                    </select>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 1216
        echo ($context["entry_detect_browser_lang_help"] ?? null);
        echo "\">";
        echo ($context["entry_detect_browser_lang"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 1218
        if (($context["config_detect_browser_lang"] ?? null)) {
            // line 1219
            echo "                        <input type=\"radio\" name=\"config_maintenance\" value=\"1\" checked=\"checked\" />
                        ";
            // line 1220
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 1222
            echo "                        <input type=\"radio\" name=\"config_maintenance\" value=\"1\" />
                        ";
            // line 1223
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 1224
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 1225
        if ( !($context["config_detect_browser_lang"] ?? null)) {
            // line 1226
            echo "                        <input type=\"radio\" name=\"config_maintenance\" value=\"0\" checked=\"checked\" />
                        ";
            // line 1227
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 1229
            echo "                        <input type=\"radio\" name=\"config_maintenance\" value=\"0\" />
                        ";
            // line 1230
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 1231
        echo " </label>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 1235
        echo ($context["entry_seo_url_include_path_help"] ?? null);
        echo "\">";
        echo ($context["entry_seo_url_include_path"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    ";
        // line 1237
        if (($context["config_seo_url_include_path"] ?? null)) {
            // line 1238
            echo "                      <label class=\"radio-inline\">
                        <input type=\"radio\" name=\"config_seo_url_include_path\" value=\"1\" checked=\"checked\"/>
                        ";
            // line 1240
            echo ($context["text_yes"] ?? null);
            echo "
                      </label>
                      <label class=\"radio-inline\">
                        <input type=\"radio\" name=\"config_seo_url_include_path\" value=\"0\"/>
                        ";
            // line 1244
            echo ($context["text_no"] ?? null);
            echo "
                      </label>
                    ";
        } else {
            // line 1247
            echo "                      <label class=\"radio-inline\">
                        <input type=\"radio\" name=\"config_seo_url_include_path\" value=\"1\"/>
                        ";
            // line 1249
            echo ($context["text_yes"] ?? null);
            echo "
                      </label>
                      <label class=\"radio-inline\">
                        <input type=\"radio\" name=\"config_seo_url_include_path\" value=\"0\" checked=\"checked\"/>
                        ";
            // line 1253
            echo ($context["text_no"] ?? null);
            echo "
                      </label>
                    ";
        }
        // line 1256
        echo "                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"config_seo_url_postfix\"><span data-toggle=\"tooltip\" title=\"";
        // line 1259
        echo ($context["entry_seo_url_postfix_help"] ?? null);
        echo "\">";
        echo ($context["entry_seo_url_postfix"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_seo_url_postfix\" value=\"";
        // line 1261
        echo ($context["config_seo_url_postfix"] ?? null);
        echo "\" id=\"config_seo_url_postfix\" class=\"form-control\"/>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-robots\"><span data-toggle=\"tooltip\" title=\"";
        // line 1265
        echo ($context["help_robots"] ?? null);
        echo "\">";
        echo ($context["entry_robots"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <textarea name=\"config_robots\" rows=\"5\" placeholder=\"";
        // line 1267
        echo ($context["entry_robots"] ?? null);
        echo "\" id=\"input-robots\" class=\"form-control\">";
        echo ($context["config_robots"] ?? null);
        echo "</textarea>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-compression\"><span data-toggle=\"tooltip\" title=\"";
        // line 1271
        echo ($context["help_compression"] ?? null);
        echo "\">";
        echo ($context["entry_compression"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_compression\" value=\"";
        // line 1273
        echo ($context["config_compression"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_compression"] ?? null);
        echo "\" id=\"input-compression\" class=\"form-control\" />
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 1278
        echo ($context["text_security"] ?? null);
        echo "</legend>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 1280
        echo ($context["help_secure"] ?? null);
        echo "\">";
        echo ($context["entry_secure"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 1282
        if (($context["config_secure"] ?? null)) {
            // line 1283
            echo "                      <input type=\"radio\" name=\"config_secure\" value=\"1\" checked=\"checked\" />
                      ";
            // line 1284
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 1286
            echo "                      <input type=\"radio\" name=\"config_secure\" value=\"1\" />
                      ";
            // line 1287
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 1288
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 1289
        if ( !($context["config_secure"] ?? null)) {
            // line 1290
            echo "                      <input type=\"radio\" name=\"config_secure\" value=\"0\" checked=\"checked\" />
                      ";
            // line 1291
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 1293
            echo "                      <input type=\"radio\" name=\"config_secure\" value=\"0\" />
                      ";
            // line 1294
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 1295
        echo " </label>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 1299
        echo ($context["help_password"] ?? null);
        echo "\">";
        echo ($context["entry_password"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 1301
        if (($context["config_password"] ?? null)) {
            // line 1302
            echo "                      <input type=\"radio\" name=\"config_password\" value=\"1\" checked=\"checked\" />
                      ";
            // line 1303
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 1305
            echo "                      <input type=\"radio\" name=\"config_password\" value=\"1\" />
                      ";
            // line 1306
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 1307
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 1308
        if ( !($context["config_password"] ?? null)) {
            // line 1309
            echo "                      <input type=\"radio\" name=\"config_password\" value=\"0\" checked=\"checked\" />
                      ";
            // line 1310
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 1312
            echo "                      <input type=\"radio\" name=\"config_password\" value=\"0\" />
                      ";
            // line 1313
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 1314
        echo " </label>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 1318
        echo ($context["help_shared"] ?? null);
        echo "\">";
        echo ($context["entry_shared"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 1320
        if (($context["config_shared"] ?? null)) {
            // line 1321
            echo "                      <input type=\"radio\" name=\"config_shared\" value=\"1\" checked=\"checked\" />
                      ";
            // line 1322
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 1324
            echo "                      <input type=\"radio\" name=\"config_shared\" value=\"1\" />
                      ";
            // line 1325
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 1326
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 1327
        if ( !($context["config_shared"] ?? null)) {
            // line 1328
            echo "                      <input type=\"radio\" name=\"config_shared\" value=\"0\" checked=\"checked\" />
                      ";
            // line 1329
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 1331
            echo "                      <input type=\"radio\" name=\"config_shared\" value=\"0\" />
                      ";
            // line 1332
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 1333
        echo " </label>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-encryption\"><span data-toggle=\"tooltip\" title=\"";
        // line 1337
        echo ($context["help_encryption"] ?? null);
        echo "\">";
        echo ($context["entry_encryption"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <textarea name=\"config_encryption\" rows=\"5\" placeholder=\"";
        // line 1339
        echo ($context["entry_encryption"] ?? null);
        echo "\" id=\"input-encryption\" class=\"form-control\">";
        echo ($context["config_encryption"] ?? null);
        echo "</textarea>
                    ";
        // line 1340
        if (($context["error_encryption"] ?? null)) {
            // line 1341
            echo "                    <div class=\"text-danger\">";
            echo ($context["error_encryption"] ?? null);
            echo "</div>
                    ";
        }
        // line 1342
        echo " </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 1346
        echo ($context["text_upload"] ?? null);
        echo "</legend>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-file-max-size\"><span data-toggle=\"tooltip\" title=\"";
        // line 1348
        echo ($context["help_file_max_size"] ?? null);
        echo "\">";
        echo ($context["entry_file_max_size"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_file_max_size\" value=\"";
        // line 1350
        echo ($context["config_file_max_size"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_file_max_size"] ?? null);
        echo "\" id=\"input-file-max-size\" class=\"form-control\" />
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-file-ext-allowed\"><span data-toggle=\"tooltip\" title=\"";
        // line 1354
        echo ($context["help_file_ext_allowed"] ?? null);
        echo "\">";
        echo ($context["entry_file_ext_allowed"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <textarea name=\"config_file_ext_allowed\" rows=\"5\" placeholder=\"";
        // line 1356
        echo ($context["entry_file_ext_allowed"] ?? null);
        echo "\" id=\"input-file-ext-allowed\" class=\"form-control\">";
        echo ($context["config_file_ext_allowed"] ?? null);
        echo "</textarea>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\" for=\"input-file-mime-allowed\"><span data-toggle=\"tooltip\" title=\"";
        // line 1360
        echo ($context["help_file_mime_allowed"] ?? null);
        echo "\">";
        echo ($context["entry_file_mime_allowed"] ?? null);
        echo "</span></label>
                  <div class=\"col-sm-10\">
                    <textarea name=\"config_file_mime_allowed\" rows=\"5\" placeholder=\"";
        // line 1362
        echo ($context["entry_file_mime_allowed"] ?? null);
        echo "\" id=\"input-file-mime-allowed\" class=\"form-control\">";
        echo ($context["config_file_mime_allowed"] ?? null);
        echo "</textarea>
                  </div>
                </div>
              </fieldset>
              <fieldset>
                <legend>";
        // line 1367
        echo ($context["text_error"] ?? null);
        echo "</legend>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\">";
        // line 1369
        echo ($context["entry_error_display"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 1371
        if (($context["config_error_display"] ?? null)) {
            // line 1372
            echo "                      <input type=\"radio\" name=\"config_error_display\" value=\"1\" checked=\"checked\" />
                      ";
            // line 1373
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 1375
            echo "                      <input type=\"radio\" name=\"config_error_display\" value=\"1\" />
                      ";
            // line 1376
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 1377
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 1378
        if ( !($context["config_error_display"] ?? null)) {
            // line 1379
            echo "                      <input type=\"radio\" name=\"config_error_display\" value=\"0\" checked=\"checked\" />
                      ";
            // line 1380
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 1382
            echo "                      <input type=\"radio\" name=\"config_error_display\" value=\"0\" />
                      ";
            // line 1383
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 1384
        echo " </label>
                  </div>
                </div>
                <div class=\"form-group\">
                  <label class=\"col-sm-2 control-label\">";
        // line 1388
        echo ($context["entry_error_log"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <label class=\"radio-inline\"> ";
        // line 1390
        if (($context["config_error_log"] ?? null)) {
            // line 1391
            echo "                      <input type=\"radio\" name=\"config_error_log\" value=\"1\" checked=\"checked\" />
                      ";
            // line 1392
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        } else {
            // line 1394
            echo "                      <input type=\"radio\" name=\"config_error_log\" value=\"1\" />
                      ";
            // line 1395
            echo ($context["text_yes"] ?? null);
            echo "
                      ";
        }
        // line 1396
        echo " </label>
                    <label class=\"radio-inline\"> ";
        // line 1397
        if ( !($context["config_error_log"] ?? null)) {
            // line 1398
            echo "                      <input type=\"radio\" name=\"config_error_log\" value=\"0\" checked=\"checked\" />
                      ";
            // line 1399
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        } else {
            // line 1401
            echo "                      <input type=\"radio\" name=\"config_error_log\" value=\"0\" />
                      ";
            // line 1402
            echo ($context["text_no"] ?? null);
            echo "
                      ";
        }
        // line 1403
        echo "</label>
                  </div>
                </div>
                <div class=\"form-group required\">
                  <label class=\"col-sm-2 control-label\" for=\"input-error-filename\">";
        // line 1407
        echo ($context["entry_error_filename"] ?? null);
        echo "</label>
                  <div class=\"col-sm-10\">
                    <input type=\"text\" name=\"config_error_filename\" value=\"";
        // line 1409
        echo ($context["config_error_filename"] ?? null);
        echo "\" placeholder=\"";
        echo ($context["entry_error_filename"] ?? null);
        echo "\" id=\"input-error-filename\" class=\"form-control\" />
                    ";
        // line 1410
        if (($context["error_log"] ?? null)) {
            // line 1411
            echo "                    <div class=\"text-danger\">";
            echo ($context["error_log"] ?? null);
            echo "</div>
                    ";
        }
        // line 1412
        echo " </div>
                </div>
              </fieldset>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <script type=\"text/javascript\"><!--
\$('select[name=\\'config_theme\\']').on('change', function() {
\t\$.ajax({
\t\turl: 'index.php?route=setting/setting/theme&user_token=";
        // line 1424
        echo ($context["user_token"] ?? null);
        echo "&theme=' + this.value,
\t\tdataType: 'html',
\t\tbeforeSend: function() {
\t\t\t\$('select[name=\\'config_theme\\']').prop('disabled', true);
\t\t},
\t\tcomplete: function() {
\t\t\t\$('select[name=\\'config_theme\\']').prop('disabled', false);
\t\t},
\t\tsuccess: function(html) {
\t\t\t\$('#theme').attr('src', html);
\t\t},
\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t}
\t});
});

\$('select[name=\\'config_theme\\']').trigger('change');
//--></script> 
  <script type=\"text/javascript\"><!--
\$('select[name=\\'config_country_id\\']').on('change', function() {
\t\$.ajax({
\t\turl: 'index.php?route=localisation/country/country&user_token=";
        // line 1446
        echo ($context["user_token"] ?? null);
        echo "&country_id=' + this.value,
\t\tdataType: 'json',
\t\tbeforeSend: function() {
\t\t\t\$('select[name=\\'config_country_id\\']').prop('disabled', true);
\t\t},
\t\tcomplete: function() {
\t\t\t\$('select[name=\\'config_country_id\\']').prop('disabled', false);
\t\t},
\t\tsuccess: function(json) {
\t\t\thtml = '<option value=\"\">";
        // line 1455
        echo ($context["text_select"] ?? null);
        echo "</option>';

\t\t\tif (json['zone'] && json['zone'] != '') {
\t\t\t\tfor (i = 0; i < json['zone'].length; i++) {
          \t\t\thtml += '<option value=\"' + json['zone'][i]['zone_id'] + '\"';

\t\t\t\t\tif (json['zone'][i]['zone_id'] == '";
        // line 1461
        echo ($context["config_zone_id"] ?? null);
        echo "') {
            \t\t\thtml += ' selected=\"selected\"';
\t\t\t\t\t}

\t\t\t\t\thtml += '>' + json['zone'][i]['name'] + '</option>';
\t\t\t\t}
\t\t\t} else {
\t\t\t\thtml += '<option value=\"0\" selected=\"selected\">";
        // line 1468
        echo ($context["text_none"] ?? null);
        echo "</option>';
\t\t\t}

\t\t\t\$('select[name=\\'config_zone_id\\']').html(html);
\t\t\t
\t\t\t\$('#button-save').prop('disabled', false);
\t\t},
\t\terror: function(xhr, ajaxOptions, thrownError) {
\t\t\talert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
\t\t}
\t});
});

\$('select[name=\\'config_country_id\\']').trigger('change');
//--></script></div>
";
        // line 1483
        echo ($context["footer"] ?? null);
        echo " ";
    }

    public function getTemplateName()
    {
        return "setting/setting.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  3836 => 1483,  3818 => 1468,  3808 => 1461,  3799 => 1455,  3787 => 1446,  3762 => 1424,  3748 => 1412,  3742 => 1411,  3740 => 1410,  3734 => 1409,  3729 => 1407,  3723 => 1403,  3718 => 1402,  3715 => 1401,  3710 => 1399,  3707 => 1398,  3705 => 1397,  3702 => 1396,  3697 => 1395,  3694 => 1394,  3689 => 1392,  3686 => 1391,  3684 => 1390,  3679 => 1388,  3673 => 1384,  3668 => 1383,  3665 => 1382,  3660 => 1380,  3657 => 1379,  3655 => 1378,  3652 => 1377,  3647 => 1376,  3644 => 1375,  3639 => 1373,  3636 => 1372,  3634 => 1371,  3629 => 1369,  3624 => 1367,  3614 => 1362,  3607 => 1360,  3598 => 1356,  3591 => 1354,  3582 => 1350,  3575 => 1348,  3570 => 1346,  3564 => 1342,  3558 => 1341,  3556 => 1340,  3550 => 1339,  3543 => 1337,  3537 => 1333,  3532 => 1332,  3529 => 1331,  3524 => 1329,  3521 => 1328,  3519 => 1327,  3516 => 1326,  3511 => 1325,  3508 => 1324,  3503 => 1322,  3500 => 1321,  3498 => 1320,  3491 => 1318,  3485 => 1314,  3480 => 1313,  3477 => 1312,  3472 => 1310,  3469 => 1309,  3467 => 1308,  3464 => 1307,  3459 => 1306,  3456 => 1305,  3451 => 1303,  3448 => 1302,  3446 => 1301,  3439 => 1299,  3433 => 1295,  3428 => 1294,  3425 => 1293,  3420 => 1291,  3417 => 1290,  3415 => 1289,  3412 => 1288,  3407 => 1287,  3404 => 1286,  3399 => 1284,  3396 => 1283,  3394 => 1282,  3387 => 1280,  3382 => 1278,  3372 => 1273,  3365 => 1271,  3356 => 1267,  3349 => 1265,  3342 => 1261,  3335 => 1259,  3330 => 1256,  3324 => 1253,  3317 => 1249,  3313 => 1247,  3307 => 1244,  3300 => 1240,  3296 => 1238,  3294 => 1237,  3287 => 1235,  3281 => 1231,  3276 => 1230,  3273 => 1229,  3268 => 1227,  3265 => 1226,  3263 => 1225,  3260 => 1224,  3255 => 1223,  3252 => 1222,  3247 => 1220,  3244 => 1219,  3242 => 1218,  3235 => 1216,  3229 => 1212,  3223 => 1211,  3215 => 1209,  3207 => 1207,  3204 => 1206,  3200 => 1205,  3194 => 1202,  3188 => 1198,  3183 => 1197,  3180 => 1196,  3175 => 1194,  3172 => 1193,  3170 => 1192,  3167 => 1191,  3162 => 1190,  3159 => 1189,  3154 => 1187,  3151 => 1186,  3149 => 1185,  3142 => 1183,  3136 => 1179,  3131 => 1178,  3128 => 1177,  3123 => 1175,  3120 => 1174,  3118 => 1173,  3115 => 1172,  3110 => 1171,  3107 => 1170,  3102 => 1168,  3099 => 1167,  3097 => 1166,  3090 => 1164,  3085 => 1162,  3073 => 1155,  3066 => 1153,  3060 => 1149,  3052 => 1147,  3047 => 1146,  3042 => 1145,  3037 => 1143,  3032 => 1142,  3030 => 1141,  3027 => 1140,  3023 => 1139,  3016 => 1137,  3011 => 1135,  3001 => 1130,  2996 => 1128,  2987 => 1124,  2982 => 1122,  2973 => 1118,  2966 => 1116,  2957 => 1112,  2952 => 1110,  2943 => 1106,  2936 => 1104,  2927 => 1100,  2920 => 1098,  2913 => 1093,  2907 => 1090,  2904 => 1089,  2898 => 1086,  2895 => 1085,  2892 => 1084,  2886 => 1081,  2883 => 1080,  2877 => 1077,  2874 => 1076,  2872 => 1075,  2863 => 1071,  2858 => 1069,  2849 => 1063,  2843 => 1062,  2837 => 1061,  2830 => 1057,  2824 => 1056,  2820 => 1055,  2811 => 1048,  2803 => 1046,  2798 => 1045,  2793 => 1044,  2788 => 1042,  2783 => 1041,  2781 => 1040,  2778 => 1039,  2774 => 1038,  2769 => 1036,  2762 => 1031,  2756 => 1030,  2748 => 1027,  2745 => 1026,  2737 => 1023,  2734 => 1022,  2731 => 1021,  2727 => 1020,  2722 => 1018,  2714 => 1015,  2709 => 1013,  2701 => 1007,  2695 => 1006,  2687 => 1003,  2684 => 1002,  2676 => 999,  2673 => 998,  2670 => 997,  2666 => 996,  2657 => 992,  2650 => 987,  2644 => 986,  2636 => 983,  2633 => 982,  2625 => 979,  2622 => 978,  2619 => 977,  2615 => 976,  2610 => 974,  2602 => 971,  2597 => 969,  2589 => 963,  2583 => 962,  2575 => 959,  2572 => 958,  2564 => 955,  2561 => 954,  2558 => 953,  2554 => 952,  2549 => 950,  2541 => 947,  2532 => 943,  2525 => 941,  2519 => 937,  2514 => 936,  2511 => 935,  2506 => 933,  2503 => 932,  2501 => 931,  2498 => 930,  2493 => 929,  2490 => 928,  2485 => 926,  2482 => 925,  2480 => 924,  2473 => 922,  2467 => 918,  2462 => 917,  2459 => 916,  2454 => 914,  2451 => 913,  2449 => 912,  2446 => 911,  2441 => 910,  2438 => 909,  2433 => 907,  2430 => 906,  2428 => 905,  2421 => 903,  2414 => 898,  2408 => 897,  2400 => 894,  2397 => 893,  2389 => 890,  2386 => 889,  2383 => 888,  2379 => 887,  2372 => 883,  2367 => 881,  2360 => 876,  2355 => 875,  2352 => 874,  2347 => 872,  2344 => 871,  2342 => 870,  2339 => 869,  2334 => 868,  2331 => 867,  2326 => 865,  2323 => 864,  2321 => 863,  2314 => 861,  2308 => 857,  2303 => 856,  2300 => 855,  2295 => 853,  2292 => 852,  2290 => 851,  2287 => 850,  2282 => 849,  2279 => 848,  2274 => 846,  2271 => 845,  2269 => 844,  2262 => 842,  2256 => 838,  2251 => 837,  2248 => 836,  2243 => 834,  2240 => 833,  2238 => 832,  2235 => 831,  2230 => 830,  2227 => 829,  2222 => 827,  2219 => 826,  2217 => 825,  2210 => 823,  2205 => 821,  2197 => 815,  2191 => 814,  2183 => 811,  2180 => 810,  2172 => 807,  2169 => 806,  2166 => 805,  2162 => 804,  2157 => 802,  2149 => 799,  2142 => 794,  2136 => 793,  2128 => 790,  2125 => 789,  2117 => 786,  2114 => 785,  2111 => 784,  2107 => 783,  2098 => 779,  2093 => 776,  2087 => 775,  2085 => 774,  2082 => 773,  2074 => 771,  2069 => 770,  2064 => 769,  2059 => 767,  2054 => 766,  2052 => 765,  2049 => 764,  2045 => 763,  2038 => 761,  2033 => 758,  2027 => 757,  2025 => 756,  2022 => 755,  2014 => 753,  2009 => 752,  2004 => 751,  1999 => 749,  1994 => 748,  1992 => 747,  1989 => 746,  1985 => 745,  1978 => 743,  1971 => 738,  1965 => 737,  1957 => 734,  1954 => 733,  1946 => 730,  1943 => 729,  1940 => 728,  1936 => 727,  1927 => 723,  1920 => 718,  1914 => 717,  1906 => 714,  1903 => 713,  1895 => 710,  1892 => 709,  1889 => 708,  1885 => 707,  1880 => 705,  1872 => 702,  1866 => 698,  1861 => 697,  1858 => 696,  1853 => 694,  1850 => 693,  1848 => 692,  1845 => 691,  1840 => 690,  1837 => 689,  1832 => 687,  1829 => 686,  1827 => 685,  1820 => 683,  1814 => 679,  1809 => 678,  1806 => 677,  1801 => 675,  1798 => 674,  1796 => 673,  1793 => 672,  1788 => 671,  1785 => 670,  1780 => 668,  1777 => 667,  1775 => 666,  1768 => 664,  1759 => 660,  1752 => 658,  1747 => 656,  1739 => 650,  1733 => 649,  1725 => 646,  1722 => 645,  1714 => 642,  1711 => 641,  1708 => 640,  1704 => 639,  1699 => 637,  1691 => 634,  1686 => 631,  1680 => 630,  1678 => 629,  1672 => 628,  1665 => 626,  1659 => 622,  1654 => 621,  1651 => 620,  1646 => 618,  1643 => 617,  1641 => 616,  1638 => 615,  1633 => 614,  1630 => 613,  1625 => 611,  1622 => 610,  1620 => 609,  1613 => 607,  1608 => 604,  1602 => 603,  1599 => 602,  1591 => 599,  1586 => 598,  1581 => 597,  1576 => 595,  1571 => 594,  1569 => 593,  1566 => 592,  1562 => 591,  1556 => 590,  1549 => 585,  1543 => 584,  1535 => 581,  1532 => 580,  1524 => 577,  1521 => 576,  1518 => 575,  1514 => 574,  1505 => 570,  1499 => 566,  1494 => 565,  1491 => 564,  1486 => 562,  1483 => 561,  1481 => 560,  1478 => 559,  1473 => 558,  1470 => 557,  1465 => 555,  1462 => 554,  1460 => 553,  1455 => 551,  1449 => 547,  1444 => 546,  1441 => 545,  1436 => 543,  1433 => 542,  1431 => 541,  1428 => 540,  1423 => 539,  1420 => 538,  1415 => 536,  1412 => 535,  1410 => 534,  1403 => 532,  1397 => 528,  1392 => 527,  1389 => 526,  1384 => 524,  1381 => 523,  1379 => 522,  1376 => 521,  1371 => 520,  1368 => 519,  1363 => 517,  1360 => 516,  1358 => 515,  1351 => 513,  1346 => 511,  1338 => 505,  1332 => 502,  1329 => 501,  1323 => 498,  1320 => 497,  1317 => 496,  1311 => 493,  1308 => 492,  1302 => 489,  1299 => 488,  1297 => 487,  1292 => 485,  1284 => 482,  1277 => 477,  1271 => 474,  1268 => 473,  1262 => 470,  1259 => 469,  1256 => 468,  1250 => 465,  1247 => 464,  1241 => 461,  1238 => 460,  1236 => 459,  1231 => 457,  1223 => 454,  1217 => 450,  1212 => 449,  1209 => 448,  1204 => 446,  1201 => 445,  1199 => 444,  1196 => 443,  1191 => 442,  1188 => 441,  1183 => 439,  1180 => 438,  1178 => 437,  1173 => 435,  1168 => 433,  1162 => 429,  1156 => 428,  1154 => 427,  1148 => 426,  1141 => 424,  1136 => 421,  1130 => 420,  1128 => 419,  1122 => 418,  1115 => 416,  1110 => 414,  1103 => 409,  1098 => 408,  1095 => 407,  1090 => 405,  1087 => 404,  1085 => 403,  1082 => 402,  1077 => 401,  1074 => 400,  1069 => 398,  1066 => 397,  1064 => 396,  1057 => 394,  1051 => 390,  1046 => 389,  1043 => 388,  1038 => 386,  1035 => 385,  1033 => 384,  1030 => 383,  1025 => 382,  1022 => 381,  1017 => 379,  1014 => 378,  1012 => 377,  1005 => 375,  1000 => 373,  994 => 369,  988 => 368,  986 => 367,  980 => 366,  973 => 364,  966 => 360,  959 => 356,  950 => 349,  944 => 348,  936 => 345,  933 => 344,  925 => 341,  922 => 340,  919 => 339,  915 => 338,  908 => 334,  901 => 329,  895 => 328,  887 => 325,  884 => 324,  876 => 321,  873 => 320,  870 => 319,  866 => 318,  859 => 314,  853 => 310,  848 => 309,  845 => 308,  840 => 306,  837 => 305,  835 => 304,  832 => 303,  827 => 302,  824 => 301,  819 => 299,  816 => 298,  814 => 297,  807 => 295,  800 => 290,  794 => 289,  786 => 286,  783 => 285,  775 => 282,  772 => 281,  769 => 280,  765 => 279,  756 => 275,  749 => 270,  743 => 269,  735 => 266,  732 => 265,  724 => 262,  721 => 261,  718 => 260,  714 => 259,  707 => 255,  700 => 250,  694 => 249,  686 => 246,  683 => 245,  675 => 242,  672 => 241,  669 => 240,  665 => 239,  658 => 235,  652 => 231,  646 => 230,  638 => 228,  630 => 226,  627 => 225,  623 => 224,  617 => 221,  607 => 214,  600 => 209,  594 => 208,  586 => 205,  583 => 204,  575 => 201,  572 => 200,  569 => 199,  565 => 198,  558 => 194,  553 => 191,  548 => 189,  540 => 187,  535 => 186,  530 => 185,  525 => 183,  520 => 182,  518 => 181,  515 => 180,  511 => 179,  505 => 178,  502 => 177,  500 => 176,  492 => 173,  485 => 171,  476 => 167,  469 => 165,  462 => 161,  456 => 160,  452 => 159,  443 => 155,  438 => 153,  433 => 150,  427 => 149,  425 => 148,  419 => 147,  414 => 145,  409 => 142,  403 => 141,  401 => 140,  395 => 139,  390 => 137,  381 => 133,  374 => 131,  369 => 128,  363 => 127,  361 => 126,  355 => 125,  350 => 123,  345 => 120,  339 => 119,  337 => 118,  331 => 117,  326 => 115,  321 => 112,  315 => 111,  313 => 110,  307 => 109,  302 => 107,  293 => 100,  287 => 99,  279 => 96,  276 => 95,  268 => 92,  265 => 91,  262 => 90,  258 => 89,  251 => 85,  243 => 79,  237 => 78,  229 => 75,  226 => 74,  218 => 71,  215 => 70,  212 => 69,  208 => 68,  201 => 64,  192 => 60,  187 => 58,  178 => 54,  173 => 52,  168 => 49,  162 => 48,  160 => 47,  154 => 46,  149 => 44,  141 => 39,  137 => 38,  133 => 37,  129 => 36,  125 => 35,  121 => 34,  117 => 33,  112 => 31,  106 => 28,  102 => 26,  94 => 22,  91 => 21,  83 => 17,  81 => 16,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "setting/setting.twig", "");
    }
}
