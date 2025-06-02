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

/* extension/module/owlcarousel.twig */
class __TwigTemplate_1ffd473b18a6bd3ed6f265f4bb0f1298f5e5fa5b9e0aff66f66c441e7874a9b7 extends \Twig\Template
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
        <button type=\"submit\" form=\"form-module\" data-toggle=\"tooltip\" title=\"";
        // line 6
        echo ($context["button_save"] ?? null);
        echo "\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i></button>
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

  <div class=\"container-fluid\">
    ";
        // line 18
        if (($context["error_warning"] ?? null)) {
            // line 19
            echo "    <div class=\"alert alert-danger alert-dismissible\"><i class=\"fa fa-exclamation-circle\"></i> ";
            echo ($context["error_warning"] ?? null);
            echo "
      <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
    </div>
    ";
        }
        // line 23
        echo "
    <div class=\"panel panel-default\">
      <div class=\"panel-heading\">
        <h3 class=\"panel-title\"><i class=\"fa fa-pencil\"></i> ";
        // line 26
        echo ($context["entry_tab_options"] ?? null);
        echo "</h3>
      </div>

      <div class=\"panel-body\">
        <form action=\"";
        // line 30
        echo ($context["action"] ?? null);
        echo "\" method=\"post\" enctype=\"multipart/form-data\" id=\"form-owlcarousel\" class=\"form-horizontal\">
        
        <div id=\"tab-module\" class=\"vtabs-content\">
          <ul class=\"nav nav-tabs\">
            <li class=\"active\"><a href=\"#tab-settings\" data-toggle=\"tab\">";
        // line 34
        echo ($context["entry_main"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-product\" data-toggle=\"tab\">";
        // line 35
        echo ($context["entry_product"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-additional\" data-toggle=\"tab\">";
        // line 36
        echo ($context["entry_additional"] ?? null);
        echo "</a></li>
            <li><a href=\"#tab-display\" data-toggle=\"tab\">";
        // line 37
        echo ($context["entry_display"] ?? null);
        echo "</a></li>
          </ul>

          <div class=\"tab-content\">

            <div class=\"tab-pane active\" id=\"tab-settings\">
              <div class=\"tab-pane\">
                <ul class=\"nav nav-tabs\" id=\"language\">
                  ";
        // line 45
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            echo " 
                    <li><a href=\"#language";
            // line 46
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 46);
            echo "\" data-toggle=\"tab\"><img src=\"language/";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 46);
            echo "/";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "code", [], "any", false, false, false, 46);
            echo ".png\" title=\"";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 46);
            echo "\" /> ";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "name", [], "any", false, false, false, 46);
            echo "</a></li>
                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo " 
                </ul>
                
                <div class=\"tab-content\">
                  ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["languages"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["language"]) {
            echo " 
                    <div class=\"tab-pane\" id=\"language";
            // line 52
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 52);
            echo "\">
                      <div class=\"form-group required\">
                        <label class=\"col-sm-2 control-label\" for=\"title-language";
            // line 54
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 54);
            echo "\">";
            echo ($context["entry_title"] ?? null);
            echo "</label>
                        <div class=\"col-sm-10\">
                          <input type=\"text\" name=\"owlcarousel_module[title][";
            // line 56
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 56);
            echo "]\" id=\"title-";
            echo twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 56);
            echo "\" value=\"";
            echo (((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "title", [], "any", false, false, false, 56)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 56)] ?? null) : null)) ? ((($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "title", [], "any", false, false, false, 56)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[twig_get_attribute($this->env, $this->source, $context["language"], "language_id", [], "any", false, false, false, 56)] ?? null) : null)) : (""));
            echo "\" class=\"form-control\" />
                        </div>
                      </div>
                    </div>
                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['language'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 60
        echo " 
                </div>
              </div>

              <div class=\"form-group required\">
                <label class=\"col-sm-2 control-label\">";
        // line 65
        echo ($context["entry_add_block_name"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"owlcarousel_module[name]\" value=\"";
        // line 67
        echo twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "name", [], "any", false, false, false, 67);
        echo "\" class=\"form-control\" />
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 72
        echo ($context["entry_status"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <select name=\"owlcarousel_module[status]\" class=\"form-control\">
                    ";
        // line 75
        if (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "status", [], "any", false, false, false, 75)) {
            echo " 
                      <option value=\"1\" selected=\"selected\">";
            // line 76
            echo ($context["text_enabled"] ?? null);
            echo "</option>
                      <option value=\"0\">";
            // line 77
            echo ($context["text_disabled"] ?? null);
            echo " </option>
                    ";
        } else {
            // line 79
            echo "                      <option value=\"1\">";
            echo ($context["text_enabled"] ?? null);
            echo " </option>
                      <option value=\"0\" selected=\"selected\">";
            // line 80
            echo ($context["text_disabled"] ?? null);
            echo "</option>
                    ";
        }
        // line 82
        echo "                    </select>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 87
        echo ($context["entry_add_class_name"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"owlcarousel_module[add_class_name]\" value=\"";
        // line 89
        echo twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "add_class_name", [], "any", false, false, false, 89);
        echo "\" class=\"form-control\" />
                </div>
              </div>

            </div>

            <div class=\"tab-pane\" id=\"tab-product\">
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 97
        echo ($context["entry_source"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <select name=\"owlcarousel_module[category_id]\" id=\"select\" onchange=\"showhide();\" class=\"form-control\">
                    <option value=\"0\" ";
        // line 100
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "category_id", [], "any", false, false, false, 100) == "0")) {
            echo "selected=\"selected\"";
        }
        echo ">";
        echo ($context["text_all_product"] ?? null);
        echo "</option>
                    <option value=\"viewed\" ";
        // line 101
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "category_id", [], "any", false, false, false, 101) == "viewed")) {
            echo "selected=\"selected\"";
        }
        echo ">";
        echo ($context["text_viewed"] ?? null);
        echo "</option>
                    <option value=\"featured\" ";
        // line 102
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "category_id", [], "any", false, false, false, 102) == "featured")) {
            echo "selected=\"selected\"";
        }
        echo ">";
        echo ($context["text_featured"] ?? null);
        echo "</option>
                    <option value=\"bestseller\" ";
        // line 103
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "category_id", [], "any", false, false, false, 103) == "bestseller")) {
            echo "selected=\"selected\"";
        }
        echo ">";
        echo ($context["text_bestseller"] ?? null);
        echo "</option>
                    <option value=\"news\" ";
        // line 104
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "category_id", [], "any", false, false, false, 104) == "news")) {
            echo "selected=\"selected\"";
        }
        echo ">";
        echo ($context["text_news"] ?? null);
        echo "</option>
                    <option value=\"special\" ";
        // line 105
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "category_id", [], "any", false, false, false, 105) == "special")) {
            echo "selected=\"selected\"";
        }
        echo ">";
        echo ($context["text_special"] ?? null);
        echo "</option>
                    ";
        // line 106
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["rootcats"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["rootcat"]) {
            echo " 
                    ";
            // line 107
            if ((twig_get_attribute($this->env, $this->source, $context["rootcat"], "category_id", [], "any", false, false, false, 107) == twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "category_id", [], "any", false, false, false, 107))) {
                echo " 
                      <option value=\"";
                // line 108
                echo twig_get_attribute($this->env, $this->source, $context["rootcat"], "category_id", [], "any", false, false, false, 108);
                echo "\" selected=\"selected\">";
                echo twig_get_attribute($this->env, $this->source, $context["rootcat"], "name", [], "any", false, false, false, 108);
                echo "</option>
                    ";
            } else {
                // line 109
                echo " 
                      <option value=\"";
                // line 110
                echo twig_get_attribute($this->env, $this->source, $context["rootcat"], "category_id", [], "any", false, false, false, 110);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["rootcat"], "name", [], "any", false, false, false, 110);
                echo "</option>
                    ";
            }
            // line 111
            echo " 
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rootcat'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 112
        echo " 
                  </select>
                </div>
              </div>
              
              ";
        // line 117
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "category_id", [], "any", false, false, false, 117) == "featured")) {
            // line 118
            echo "                ";
            $context["show_block"] = "block";
            // line 119
            echo "              ";
        } else {
            // line 120
            echo "                ";
            $context["show_block"] = "none";
            // line 121
            echo "              ";
        }
        // line 122
        echo "
              <div class=\"form-group\" id=\"rowfeatured\" style=\"display:";
        // line 123
        echo ($context["show_block"] ?? null);
        echo ";\">
               <label class=\"col-sm-2 control-label\" for=\"visible\"><span data-toggle=\"tooltip\" title=\"";
        // line 124
        echo ($context["help_category"] ?? null);
        echo "\">";
        echo ($context["entry_category"] ?? null);
        echo "</label> 
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"product\" value=\"\" placeholder=\"";
        // line 126
        echo ($context["entry_product"] ?? null);
        echo "\" id=\"input-product\" class=\"form-control\" />
                  <br/>
                  <div class=\"scrollbox well well-sm\" id=\"featured-product\" style=\"height: 150px; overflow: auto;\">
                    ";
        // line 129
        $context["class"] = "odd";
        // line 130
        echo "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            echo " 
                        ";
            // line 131
            $context["class"] = (("even") ? ("odd") : ("even"));
            // line 132
            echo "                        <div id=\"featured-product";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 132);
            echo " \" class=\"";
            echo ($context["class"] ?? null);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 132);
            echo " <i class=\"fa fa-minus-circle\"></i>
                              <input type=\"hidden\" value=\"";
            // line 133
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 133);
            echo "\" />
                        </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 135
        echo " 
                  </div>
                  <input type=\"hidden\" name=\"owlcarousel_module[featured]\" value=\"";
        // line 137
        echo twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "featured", [], "any", false, false, false, 137);
        echo "\" />
                </div>
              </div>
              
              ";
        // line 141
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "category_id", [], "any", false, false, false, 141) == "viewed")) {
            // line 142
            echo "                ";
            $context["show_block"] = "block";
            // line 143
            echo "              ";
        } else {
            // line 144
            echo "                ";
            $context["show_block"] = "none";
            // line 145
            echo "              ";
        }
        // line 146
        echo "
              <div class=\"form-group\" id=\"rowviewed\" style=\"display:";
        // line 147
        echo ($context["show_block"] ?? null);
        echo ";\">
                <div class=\"col-sm-10 col-sm-push-2\">
                  <div class=\"alert alert-danger\"><i class=\"fa fa-exclamation-circle\"></i> ";
        // line 149
        echo ($context["text_hide_module"] ?? null);
        echo "</div>
                </div>
              </div>

              ";
        // line 153
        if (((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "category_id", [], "any", false, false, false, 153) == "featured") || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "category_id", [], "any", false, false, false, 153) == "viewed"))) {
            // line 154
            echo "                ";
            $context["hide_block"] = "none";
            // line 155
            echo "              ";
        } else {
            // line 156
            echo "                ";
            $context["hide_block"] = "block";
            // line 157
            echo "              ";
        }
        // line 158
        echo "
              <div class=\"form-group\" id=\"rowcategory\" style=\"display:";
        // line 159
        echo ($context["hide_block"] ?? null);
        echo ";\">
                <label class=\"col-sm-2 control-label\">";
        // line 160
        echo ($context["entry_manufacturer"] ?? null);
        echo "</label>
                <div class=\"col-sm-10 scrollbox\" id=\"featured-product\">
                 <select name=\"owlcarousel_module[manufacturer_id]\" id=\"select\" class=\"form-control\">
                    <option value=\"0\" <";
        // line 163
        if (twig_in_filter(twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "manufacturer_id", [], "any", false, false, false, 163), "0")) {
            echo " selected=\"selected\"";
        }
        echo ">";
        echo ($context["text_all_manufacturers"] ?? null);
        echo "</option>
                    ";
        // line 164
        if (($context["manufacturers"] ?? null)) {
            // line 165
            echo "                      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["manufacturers"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["manufacturer"]) {
                echo " 
                        ";
                // line 166
                if ((twig_get_attribute($this->env, $this->source, $context["manufacturer"], "manufacturer_id", [], "any", false, false, false, 166) == twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "manufacturer_id", [], "any", false, false, false, 166))) {
                    echo " 
                          <option value=\"";
                    // line 167
                    echo twig_get_attribute($this->env, $this->source, $context["manufacturer"], "manufacturer_id", [], "any", false, false, false, 167);
                    echo "\" selected=\"selected\">";
                    echo twig_get_attribute($this->env, $this->source, $context["manufacturer"], "name", [], "any", false, false, false, 167);
                    echo "</option>
                        ";
                } else {
                    // line 169
                    echo "                          <option value=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["manufacturer"], "manufacturer_id", [], "any", false, false, false, 169);
                    echo "\">";
                    echo twig_get_attribute($this->env, $this->source, $context["manufacturer"], "name", [], "any", false, false, false, 169);
                    echo "</option>
                        ";
                }
                // line 171
                echo "                      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['manufacturer'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 172
            echo "                    ";
        }
        echo " 
                  </select>
                </div>
              </div>

              <div class=\"form-group\" id=\"rowsort\" style=\"display:";
        // line 177
        echo ($context["hide_block"] ?? null);
        echo ";\">
                <label class=\"col-sm-2 control-label\">";
        // line 178
        echo ($context["entry_sort"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <select name=\"owlcarousel_module[sort]\" class=\"form-control\">
                    ";
        // line 181
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "sort", [], "any", false, false, false, 181) == "p.date_added")) {
            // line 182
            echo "                      <option value=\"p.date_added\" selected=\"selected\">";
            echo ($context["text_sort_date_added"] ?? null);
            echo "</option>
                    ";
        } else {
            // line 184
            echo "                      <option value=\"p.date_added\">";
            echo ($context["text_sort_date_added"] ?? null);
            echo "</option>
                    ";
        }
        // line 186
        echo "
                    ";
        // line 187
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "sort", [], "any", false, false, false, 187) == "rating")) {
            // line 188
            echo "                      <option value=\"rating\" selected=\"selected\">";
            echo ($context["text_sort_rating"] ?? null);
            echo "</option>
                    ";
        } else {
            // line 190
            echo "                      <option value=\"rating\">";
            echo ($context["text_sort_rating"] ?? null);
            echo "</option>
                    ";
        }
        // line 192
        echo "
                    ";
        // line 193
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "sort", [], "any", false, false, false, 193) == "p.viewed")) {
            // line 194
            echo "                      <option value=\"p.viewed\" selected=\"selected\">";
            echo ($context["text_sort_viewed"] ?? null);
            echo "</option>
                    ";
        } else {
            // line 196
            echo "                      <option value=\"p.viewed\">";
            echo ($context["text_sort_viewed"] ?? null);
            echo "</option>
                    ";
        }
        // line 198
        echo "
                    ";
        // line 199
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "sort", [], "any", false, false, false, 199) == "p.sort_order")) {
            echo " 
                      <option value=\"p.sort_order\" selected=\"selected\">";
            // line 200
            echo ($context["text_sort_order"] ?? null);
            echo "</option>
                    ";
        } else {
            // line 202
            echo "                      <option value=\"p.sort_order\">";
            echo ($context["text_sort_order"] ?? null);
            echo "</option>
                    ";
        }
        // line 204
        echo "
                    ";
        // line 205
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "sort", [], "any", false, false, false, 205) == "topsellers")) {
            // line 206
            echo "                      <option value=\"topsellers\" selected=\"selected\">";
            echo ($context["text_sort_bestseller"] ?? null);
            echo "</option>
                    ";
        } else {
            // line 208
            echo "                      <option value=\"topsellers\">";
            echo ($context["text_sort_bestseller"] ?? null);
            echo "</option>
                    ";
        }
        // line 210
        echo "
                    ";
        // line 211
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "sort", [], "any", false, false, false, 211) == "special")) {
            // line 212
            echo "                      <option value=\"special\" selected=\"selected\">";
            echo ($context["text_sort_special"] ?? null);
            echo "</option>
                    ";
        } else {
            // line 214
            echo "                      <option value=\"special\">";
            echo ($context["text_sort_special"] ?? null);
            echo "</option>
                    ";
        }
        // line 216
        echo "                  </select>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 221
        echo ($context["entry_image"] ?? null);
        echo "</label>
                <div class=\"col-sm-5\">
                  <input type=\"text\" name=\"owlcarousel_module[image_width]\" value=\"";
        // line 223
        echo twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "image_width", [], "any", false, false, false, 223);
        echo "\" class=\"form-control\" />
                </div>
                <div class=\"col-sm-5\">
                  <input type=\"text\" name=\"owlcarousel_module[image_height]\" value=\"";
        // line 226
        echo twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "image_height", [], "any", false, false, false, 226);
        echo "\" class=\"form-control\" />
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"description\"><span data-toggle=\"tooltip\" title=\"";
        // line 231
        echo ($context["help_count"] ?? null);
        echo "\">";
        echo ($context["entry_description"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"owlcarousel_module[description]\" value=\"";
        // line 233
        echo twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "description", [], "any", false, false, false, 233);
        echo "\" class=\"form-control\" id=\"description\" />
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"count\"><span data-toggle=\"tooltip\" title=\"";
        // line 238
        echo ($context["help_count"] ?? null);
        echo "\">";
        echo ($context["entry_count"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"owlcarousel_module[count]\" value=\"";
        // line 240
        echo twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "count", [], "any", false, false, false, 240);
        echo "\" class=\"form-control\" id=\"count\" />
                </div>
              </div>

              <div class=\"form-group\">
                 <label class=\"col-sm-2 control-label\" for=\"visible\"><span data-toggle=\"tooltip\" title=\"";
        // line 245
        echo ($context["help_visible"] ?? null);
        echo "\">";
        echo ($context["entry_visible"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"owlcarousel_module[visible]\" value=\"";
        // line 247
        echo twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "visible", [], "any", false, false, false, 247);
        echo "\" class=\"form-control\" id=\"visible\" />
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"visible_1000\"><span data-toggle=\"tooltip\" title=\"";
        // line 252
        echo ($context["help_visible_1000"] ?? null);
        echo "\">";
        echo ($context["entry_visible_1000"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"owlcarousel_module[visible_1000]\" value=\"";
        // line 254
        echo twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "visible_1000", [], "any", false, false, false, 254);
        echo "\" class=\"form-control\" id=\"visible_1000\" />
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"visible_900\"><span data-toggle=\"tooltip\" title=\"";
        // line 259
        echo ($context["help_visible_900"] ?? null);
        echo "\">";
        echo ($context["entry_visible_900"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"owlcarousel_module[visible_900]\" value=\"";
        // line 261
        echo twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "visible_900", [], "any", false, false, false, 261);
        echo "\" class=\"form-control\" id=\"visible_900\" />
                </div>
              </div>

              <div class=\"form-group\">
                 <label class=\"col-sm-2 control-label\" for=\"visible_600\"><span data-toggle=\"tooltip\" title=\"";
        // line 266
        echo ($context["help_visible_600"] ?? null);
        echo "\">";
        echo ($context["entry_visible_600"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"owlcarousel_module[visible_600]\" value=\"";
        // line 268
        echo twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "visible_600", [], "any", false, false, false, 268);
        echo "\" class=\"form-control\" id=\"visible_600\" />
                </div>
              </div>

              <div class=\"form-group\">
               <label class=\"col-sm-2 control-label\" for=\"visible_479\"><span data-toggle=\"tooltip\" title=\"";
        // line 273
        echo ($context["help_visible_479"] ?? null);
        echo "\">";
        echo ($context["entry_visible_479"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                 <input type=\"text\" name=\"owlcarousel_module[visible_479]\" value=\"";
        // line 275
        echo twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "visible_479", [], "any", false, false, false, 275);
        echo "\" class=\"form-control\" id=\"visible_479\" />
                </div>
              </div>
            </div>

            <div class=\"tab-pane\" id=\"tab-additional\">
              <div class=\"form-group\">
               <label class=\"col-sm-2 control-label\" for=\"slide_speed\"><span data-toggle=\"tooltip\" title=\"";
        // line 282
        echo ($context["help_slide_speed"] ?? null);
        echo "\">";
        echo ($context["entry_slide_speed"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"owlcarousel_module[slide_speed]\" value=\"";
        // line 284
        echo twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "slide_speed", [], "any", false, false, false, 284);
        echo "\" class=\"form-control\" id=\"slide_speed\" />
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"pagination_speed\"><span data-toggle=\"tooltip\" title=\"";
        // line 289
        echo ($context["help_pagination_speed"] ?? null);
        echo "\">";
        echo ($context["entry_pagination_speed"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"owlcarousel_module[pagination_speed]\" value=\"";
        // line 291
        echo twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "pagination_speed", [], "any", false, false, false, 291);
        echo "\" class=\"form-control\" id=\"pagination_speed\" />
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"autoscroll\"><span data-toggle=\"tooltip\" title=\"";
        // line 296
        echo ($context["help_autoscroll"] ?? null);
        echo "\">";
        echo ($context["entry_autoscroll"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"owlcarousel_module[autoscroll]\" value=\"";
        // line 298
        echo twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "autoscroll", [], "any", false, false, false, 298);
        echo "\" class=\"form-control\" />
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"item_prev_next\"><span data-toggle=\"tooltip\" title=\"";
        // line 303
        echo ($context["help_item_prev_next"] ?? null);
        echo "\">";
        echo ($context["entry_item_prev_next"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <input type=\"text\" name=\"owlcarousel_module[item_prev_next]\" value=\"";
        // line 305
        echo twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "item_prev_next", [], "any", false, false, false, 305);
        echo "\" class=\"form-control\" />
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 310
        echo ($context["help_per_page"] ?? null);
        echo "\">";
        echo ($context["entry_per_page"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_per_page\"></label>
                    <input id=\"no_per_page\" type=\"radio\" name=\"owlcarousel_module[show_per_page]\" value=\"0\" ";
        // line 314
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_per_page", [], "any", true, true, false, 314) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_per_page", [], "any", false, false, false, 314) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_per_page\"></label>
                    <input id=\"yes_per_page\" type=\"radio\" name=\"owlcarousel_module[show_per_page]\" value=\"1\" ";
        // line 316
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_per_page", [], "any", true, true, false, 316) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_per_page", [], "any", false, false, false, 316) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 323
        echo ($context["entry_random_item"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_random_item\"></label>
                    <input id=\"no_random_item\" type=\"radio\" name=\"owlcarousel_module[show_random_item]\" value=\"0\" ";
        // line 327
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_random_item", [], "any", true, true, false, 327) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_random_item", [], "any", false, false, false, 327) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_random_item\"></label>
                    <input id=\"yes_random_item\" type=\"radio\" name=\"owlcarousel_module[show_random_item]\" value=\"1\" ";
        // line 329
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_random_item", [], "any", true, true, false, 329) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_random_item", [], "any", false, false, false, 329) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 336
        echo ($context["entry_stock"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_stock\"></label>
                    <input id=\"no_stock\" type=\"radio\" name=\"owlcarousel_module[show_stock]\" value=\"0\" ";
        // line 340
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_stock", [], "any", true, true, false, 340) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_stock", [], "any", false, false, false, 340) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_stock\"></label>
                    <input id=\"yes_stock\" type=\"radio\" name=\"owlcarousel_module[show_stock]\" value=\"1\" ";
        // line 342
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_stock", [], "any", true, true, false, 342) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_stock", [], "any", false, false, false, 342) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 349
        echo ($context["help_current_category"] ?? null);
        echo "\">";
        echo ($context["entry_current_category"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_current_category\"></label>
                    <input id=\"no_current_category\" type=\"radio\" name=\"owlcarousel_module[show_current_category]\" value=\"0\" ";
        // line 353
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_current_category", [], "any", true, true, false, 353) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_current_category", [], "any", false, false, false, 353) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_current_category\"></label>
                    <input id=\"yes_current_category\" type=\"radio\" name=\"owlcarousel_module[show_current_category]\" value=\"1\" ";
        // line 355
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_current_category", [], "any", true, true, false, 355) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_current_category", [], "any", false, false, false, 355) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\"><span data-toggle=\"tooltip\" title=\"";
        // line 362
        echo ($context["help_current_product"] ?? null);
        echo "\">";
        echo ($context["entry_current_product"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_current_product\"></label>
                    <input id=\"no_current_product\" type=\"radio\" name=\"owlcarousel_module[show_current_product]\" value=\"0\" ";
        // line 366
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_current_product", [], "any", true, true, false, 366) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_current_product", [], "any", false, false, false, 366) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_current_product\"></label>
                    <input id=\"yes_current_product\" type=\"radio\" name=\"owlcarousel_module[show_current_product]\" value=\"1\" ";
        // line 368
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_current_product", [], "any", true, true, false, 368) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_current_product", [], "any", false, false, false, 368) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" for=\"hide_module\"><span data-toggle=\"tooltip\" title=\"";
        // line 375
        echo ($context["help_hide_module"] ?? null);
        echo "\">";
        echo ($context["entry_hide_module"] ?? null);
        echo "</span></label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_hide_module\"></label>
                    <input id=\"no_hide_module\" type=\"radio\" name=\"owlcarousel_module[hide_module]\" value=\"0\" ";
        // line 379
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "hide_module", [], "any", true, true, false, 379) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "hide_module", [], "any", false, false, false, 379) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_hide_module\"></label>
                    <input id=\"yes_hide_module\" type=\"radio\" name=\"owlcarousel_module[hide_module]\" value=\"1\" ";
        // line 381
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "hide_module", [], "any", true, true, false, 381) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "hide_module", [], "any", false, false, false, 381) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\" >";
        // line 388
        echo ($context["entry_use_cache"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_use_cache\"></label>
                    <input id=\"no_use_cache\" type=\"radio\" name=\"owlcarousel_module[use_cache]\" value=\"0\" ";
        // line 392
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "use_cache", [], "any", true, true, false, 392) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "use_cache", [], "any", false, false, false, 392) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_use_cache\"></label>
                    <input id=\"yes_use_cache\" type=\"radio\" name=\"owlcarousel_module[use_cache]\" value=\"1\" ";
        // line 394
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "use_cache", [], "any", true, true, false, 394) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "use_cache", [], "any", false, false, false, 394) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>
            </div>

            <div class=\"tab-pane\" id=\"tab-display\">
              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 403
        echo ($context["entry_show_title"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_title\"></label>
                    <input id=\"no_title\" type=\"radio\" name=\"owlcarousel_module[show_title]\" value=\"0\" ";
        // line 407
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_title", [], "any", true, true, false, 407) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_title", [], "any", false, false, false, 407) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_title\"></label>
                    <input id=\"yes_title\" type=\"radio\" name=\"owlcarousel_module[show_title]\" value=\"1\" ";
        // line 409
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_title", [], "any", true, true, false, 409) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_title", [], "any", false, false, false, 409) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 416
        echo ($context["entry_show_name"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_name\"></label>
                    <input id=\"no_name\" type=\"radio\" name=\"owlcarousel_module[show_name]\" value=\"0\" ";
        // line 420
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_name", [], "any", true, true, false, 420) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_name", [], "any", false, false, false, 420) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_name\"></label>
                    <input id=\"yes_name\" type=\"radio\" name=\"owlcarousel_module[show_name]\" value=\"1\" ";
        // line 422
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_name", [], "any", true, true, false, 422) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_name", [], "any", false, false, false, 422) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 429
        echo ($context["entry_show_desc"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_desc\"></label>
                    <input id=\"no_desc\" type=\"radio\" name=\"owlcarousel_module[show_desc]\" value=\"0\" ";
        // line 433
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_desc", [], "any", true, true, false, 433) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_desc", [], "any", false, false, false, 433) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_desc\"></label>
                    <input id=\"yes_desc\" type=\"radio\" name=\"owlcarousel_module[show_desc]\" value=\"1\" ";
        // line 435
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_desc", [], "any", true, true, false, 435) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_desc", [], "any", false, false, false, 435) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 442
        echo ($context["entry_show_price"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_price\"></label>
                    <input id=\"no_price\" type=\"radio\" name=\"owlcarousel_module[show_price]\" value=\"0\" ";
        // line 446
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_price", [], "any", true, true, false, 446) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_price", [], "any", false, false, false, 446) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_price\"></label>
                    <input id=\"yes_price\" type=\"radio\" name=\"owlcarousel_module[show_price]\" value=\"1\" ";
        // line 448
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_price", [], "any", true, true, false, 448) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_price", [], "any", false, false, false, 448) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 455
        echo ($context["entry_show_rate"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_rate\"></label>
                    <input id=\"no_rate\" type=\"radio\" name=\"owlcarousel_module[show_rate]\" value=\"0\" ";
        // line 459
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_rate", [], "any", true, true, false, 459) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_rate", [], "any", false, false, false, 459) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_rate\"></label>
                    <input id=\"yes_rate\" type=\"radio\" name=\"owlcarousel_module[show_rate]\" value=\"1\" ";
        // line 461
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_rate", [], "any", true, true, false, 461) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_rate", [], "any", false, false, false, 461) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 468
        echo ($context["entry_show_cart"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_cart\"></label>
                    <input id=\"no_cart\" type=\"radio\" name=\"owlcarousel_module[show_cart]\" value=\"0\" ";
        // line 472
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_cart", [], "any", true, true, false, 472) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_cart", [], "any", false, false, false, 472) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_cart\"></label>
                    <input id=\"yes_cart\" type=\"radio\" name=\"owlcarousel_module[show_cart]\" value=\"1\" ";
        // line 474
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_cart", [], "any", true, true, false, 474) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_cart", [], "any", false, false, false, 474) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 481
        echo ($context["entry_show_wishlist"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_wishlist\"></label>
                    <input id=\"no_wishlist\" type=\"radio\" name=\"owlcarousel_module[show_wishlist]\" value=\"0\" ";
        // line 485
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_wishlist", [], "any", true, true, false, 485) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_wishlist", [], "any", false, false, false, 485) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_wishlist\"></label>
                    <input id=\"yes_wishlist\" type=\"radio\" name=\"owlcarousel_module[show_wishlist]\" value=\"1\" ";
        // line 487
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_wishlist", [], "any", true, true, false, 487) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_wishlist", [], "any", false, false, false, 487) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 494
        echo ($context["entry_show_compare"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_compare\"></label>
                    <input id=\"no_compare\" type=\"radio\" name=\"owlcarousel_module[show_compare]\" value=\"0\" ";
        // line 498
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_compare", [], "any", true, true, false, 498) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_compare", [], "any", false, false, false, 498) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_compare\"></label>
                    <input id=\"yes_compare\" type=\"radio\" name=\"owlcarousel_module[show_compare]\" value=\"1\" ";
        // line 500
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_compare", [], "any", true, true, false, 500) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_compare", [], "any", false, false, false, 500) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 507
        echo ($context["entry_show_page"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_page\"></label>
                    <input id=\"no_page\" type=\"radio\" name=\"owlcarousel_module[show_page]\" value=\"0\" ";
        // line 511
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_page", [], "any", true, true, false, 511) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_page", [], "any", false, false, false, 511) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_page\"></label>
                    <input id=\"yes_page\" type=\"radio\" name=\"owlcarousel_module[show_page]\" value=\"1\" ";
        // line 513
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_page", [], "any", true, true, false, 513) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_page", [], "any", false, false, false, 513) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 520
        echo ($context["entry_show_nav"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_nav\"></label>
                    <input id=\"no_nav\" type=\"radio\" name=\"owlcarousel_module[show_nav]\" value=\"0\" ";
        // line 524
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_nav", [], "any", true, true, false, 524) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_nav", [], "any", false, false, false, 524) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_nav\"></label>
                    <input id=\"yes_nav\" type=\"radio\" name=\"owlcarousel_module[show_nav]\" value=\"1\" ";
        // line 526
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_nav", [], "any", true, true, false, 526) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_nav", [], "any", false, false, false, 526) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 533
        echo ($context["entry_show_lazy_load"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_lazy_load\"></label>
                    <input id=\"no_lazy_load\" type=\"radio\" name=\"owlcarousel_module[show_lazy_load]\" value=\"0\" ";
        // line 537
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_lazy_load", [], "any", true, true, false, 537) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_lazy_load", [], "any", false, false, false, 537) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_lazy_load\"></label>
                    <input id=\"yes_lazy_load\" type=\"radio\" name=\"owlcarousel_module[show_lazy_load]\" value=\"1\" ";
        // line 539
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_lazy_load", [], "any", true, true, false, 539) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_lazy_load", [], "any", false, false, false, 539) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 546
        echo ($context["entry_show_mouse_drag"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_mouse_drag\"></label>
                    <input id=\"no_mouse_drag\" type=\"radio\" name=\"owlcarousel_module[show_mouse_drag]\" value=\"0\" ";
        // line 550
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_mouse_drag", [], "any", true, true, false, 550) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_mouse_drag", [], "any", false, false, false, 550) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_mouse_drag\"></label>
                    <input id=\"yes_mouse_drag\" type=\"radio\" name=\"owlcarousel_module[show_mouse_drag]\" value=\"1\" ";
        // line 552
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_mouse_drag", [], "any", true, true, false, 552) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_mouse_drag", [], "any", false, false, false, 552) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 559
        echo ($context["entry_show_touch_drag"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_touch_drag\"></label>
                    <input id=\"no_touch_drag\" type=\"radio\" name=\"owlcarousel_module[show_touch_drag]\" value=\"0\" ";
        // line 563
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_touch_drag", [], "any", true, true, false, 563) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_touch_drag", [], "any", false, false, false, 563) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_touch_drag\"></label>
                    <input id=\"yes_touch_drag\" type=\"radio\" name=\"owlcarousel_module[show_touch_drag]\" value=\"1\" ";
        // line 565
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_touch_drag", [], "any", true, true, false, 565) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_touch_drag", [], "any", false, false, false, 565) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 572
        echo ($context["entry_stop_on_hover"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_stop_on_hover\"></label>
                    <input id=\"no_stop_on_hover\" type=\"radio\" name=\"owlcarousel_module[show_stop_on_hover]\" value=\"0\" ";
        // line 576
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_stop_on_hover", [], "any", true, true, false, 576) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_stop_on_hover", [], "any", false, false, false, 576) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_stop_on_hover\"></label>
                    <input id=\"yes_stop_on_hover\" type=\"radio\" name=\"owlcarousel_module[show_stop_on_hover]\" value=\"1\" ";
        // line 578
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_stop_on_hover", [], "any", true, true, false, 578) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_stop_on_hover", [], "any", false, false, false, 578) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                </div>
              </div>

              <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">";
        // line 585
        echo ($context["entry_show_tabs"] ?? null);
        echo "</label>
                <div class=\"col-sm-10\">
                  <div class=\"switch\">
                    <label for=\"no_tabs\"></label>
                    <input id=\"no_tabs\" type=\"radio\" name=\"owlcarousel_module[show_tabs]\" value=\"0\" ";
        // line 589
        if ((twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_tabs", [], "any", true, true, false, 589) && (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_tabs", [], "any", false, false, false, 589) == "0"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <label for=\"yes_tabs\"></label>
                    <input id=\"yes_tabs\" type=\"radio\" name=\"owlcarousel_module[show_tabs]\" value=\"1\" ";
        // line 591
        if (( !twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_tabs", [], "any", true, true, false, 591) || (twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "show_tabs", [], "any", false, false, false, 591) == "1"))) {
            echo " checked=\"checked\" ";
        }
        echo " />
                    <span></span>
                  </div>
                  <div id=\"other_modules\">
                    ";
        // line 595
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["other_modules"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["other"]) {
            echo " 
                      <div>
                        <label><input type=\"checkbox\" value=\"1\" name=\"owlcarousel_module[display_with][";
            // line 597
            echo (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = $context["other"]) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["id"] ?? null) : null);
            echo "]\" ";
            echo ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["module"] ?? null), "display_with", [], "array", false, true, false, 597), (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = $context["other"]) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["id"] ?? null) : null), [], "array", true, true, false, 597)) ? ("checked=\"checked\"") : (""));
            echo ">&nbsp;";
            echo (($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = $context["other"]) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4["name"] ?? null) : null);
            echo "</label>
                      </div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['other'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 599
        echo " 
                  </div>
                </div>
              </div>
              
            </div>

          </div>

        </div>

        </form>

      </div>
    </div>
  </div>
</div>

<script type=\"text/javascript\">
  function showhide() {
    var \$select = \$('#select');
    var selectedValue = \$select.val();
    \$(\"#rowfeatured\")[selectedValue == 'featured' ? 'show' : 'hide'] ();
    \$(\"#rowviewed\")[selectedValue == 'viewed' ? 'show' : 'hide'] ();
    \$(\"#rowcategory\")[selectedValue == 'featured' || selectedValue == 'viewed' ? 'hide' : 'show'] ();
    \$(\"#rowsort, #rowbrand\")[selectedValue == 'featured' || selectedValue == 'viewed' ? 'hide' : 'show'] ();
  }
</script>

<script type=\"text/javascript\"><!--
  \$('#featured-product div img').on('click', function() {
    var modid = \$(\".selected\").attr('modid');
    \$(this).parent().remove();

    \$('#featured-product'+ modid +' div:odd').attr('class', 'odd');
    \$('#featured-product'+ modid +' div:even').attr('class', 'even');

    data = \$.map(\$('#featured-product'+ modid +' input'), function(element){
      return \$(element).attr('value');
    });

    \$('input[name=\\'owlcarousel_module[' + modid + '][featured]\\']').attr('value', data.join());
  });


  \$('#module-add').before('<a href=\"#tab-module\" modid =\" id=\"module\">";
        // line 644
        echo ($context["add_tab_module"] ?? null);
        echo "&nbsp;<img src=\"view/image/delete.png\" alt=\"\" onclick=\"\$(\\'.vtabs a:first\\').trigger(\\'click\\'); \$(\\'#module\\').remove(); \$(\\'#tab-module\\').remove(); return false;\" /></a>');

  \$('.vtabs a').tabs();
  \$('#module').trigger('click');
//--></script>

<script type=\"text/javascript\"><!--
  \$('input[name=\\'product\\']').autocomplete({
    source: function(request, response) {
      \$.ajax({
        url: 'index.php?route=catalog/product/autocomplete&user_token=";
        // line 654
        echo ($context["user_token"] ?? null);
        echo "&filter_name=' +  encodeURIComponent(request),
        dataType: 'json',
        success: function(json) {
          response(\$.map(json, function(item) {
            return {
              label: item['name'],
              value: item['product_id']
            }
          }));
        }
      });
    },
    select: function(item) {
        \$('#featured-product' + item.value).remove();

        \$('#featured-product').append('<div id=\"featured-product' +  item.value + '\">' + item.label + ' <i class=\"fa fa-minus-circle\"></i><input type=\"hidden\" value=\"' + item.value + '\" /></div>');

        \$('#featured-product div:odd').attr('class', 'odd');
        \$('#featured-product div:even').attr('class', 'even');

        var data = \$.map(\$('#featured-product input'), function(element){
          return \$(element).attr('value');
        });

        \$('input[name=\\'owlcarousel_module[featured]\\']').attr('value', data.join());
    }
  });

  \$('.scrollbox').on('click', '.fa-minus-circle', function() {
    \$(this).parent().remove();

    \$('#featured-product div:odd').attr('class', 'odd');
    \$('#featured-product div:even').attr('class', 'even');

    var data = \$.map(\$('#featured-product input'), function(element){
      return \$(element).attr('value');
    });

    \$('input[name=\\'owlcarousel_module[featured]\\']').attr('value', data.join());
  });
//--></script>

<script type=\"text/javascript\"><!--
  \$('#language a:first').tab('show');
//-->
</script>

<script type=\"text/javascript\"><!--
\$(function(){
  function display_other_modules() {
    if (~~\$('input[name*=show_tabs]:checked').val()) {
      \$('#other_modules').show();
    } else {
      \$('#other_modules').hide();
    }
  }

  \$('input[name*=show_tabs]').on('change', display_other_modules);

  display_other_modules();
});
//--></script>

<style type=\"text/css\">
.switch *,.switch:after,.switch:before{-webkit-box-sizing:border-box;box-sizing:border-box}.switch{height:30px;margin:3px auto;font-size:0;position:relative}.switch label{color:#000;opacity:.33;-webkit-transition:opacity .3s ease;transition:opacity .3s ease;cursor:pointer;display:inline-block;width:0;height:0;visibility:hidden;overflow:hidden}.switch label+input{margin-left:10px}.switch span{height:100%;border-radius:30px;padding:4px;overflow:hidden;-webkit-transition:.3s ease all;transition:.3s ease all;background:#fff;border:2px solid #e3e3e3;position:absolute;width:60px;left:0}.switch span:before{content:\"\";border-radius:50%;background:#fff;position:absolute;-webkit-transition:.3s ease all;transition:.3s ease all;height:30px;width:30px;top:-2px}.switch input{position:absolute;top:0;z-index:2;opacity:0;cursor:pointer;height:30px;width:60px;left:-10px;margin:0}.switch input~input:checked~span{background:#1e91cf}.switch input~input:checked~span:before{left:28px}.switch input:checked{z-index:1}.switch input:checked+label{opacity:1;cursor:default}.switch input:checked~span:before{border:2px solid #e3e3e3;left:-1px}.switch input:not(:checked)+label:hover{opacity:.5}
</style>
";
        // line 720
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "extension/module/owlcarousel.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1575 => 720,  1506 => 654,  1493 => 644,  1446 => 599,  1433 => 597,  1426 => 595,  1417 => 591,  1410 => 589,  1403 => 585,  1391 => 578,  1384 => 576,  1377 => 572,  1365 => 565,  1358 => 563,  1351 => 559,  1339 => 552,  1332 => 550,  1325 => 546,  1313 => 539,  1306 => 537,  1299 => 533,  1287 => 526,  1280 => 524,  1273 => 520,  1261 => 513,  1254 => 511,  1247 => 507,  1235 => 500,  1228 => 498,  1221 => 494,  1209 => 487,  1202 => 485,  1195 => 481,  1183 => 474,  1176 => 472,  1169 => 468,  1157 => 461,  1150 => 459,  1143 => 455,  1131 => 448,  1124 => 446,  1117 => 442,  1105 => 435,  1098 => 433,  1091 => 429,  1079 => 422,  1072 => 420,  1065 => 416,  1053 => 409,  1046 => 407,  1039 => 403,  1025 => 394,  1018 => 392,  1011 => 388,  999 => 381,  992 => 379,  983 => 375,  971 => 368,  964 => 366,  955 => 362,  943 => 355,  936 => 353,  927 => 349,  915 => 342,  908 => 340,  901 => 336,  889 => 329,  882 => 327,  875 => 323,  863 => 316,  856 => 314,  847 => 310,  839 => 305,  832 => 303,  824 => 298,  817 => 296,  809 => 291,  802 => 289,  794 => 284,  787 => 282,  777 => 275,  770 => 273,  762 => 268,  755 => 266,  747 => 261,  740 => 259,  732 => 254,  725 => 252,  717 => 247,  710 => 245,  702 => 240,  695 => 238,  687 => 233,  680 => 231,  672 => 226,  666 => 223,  661 => 221,  654 => 216,  648 => 214,  642 => 212,  640 => 211,  637 => 210,  631 => 208,  625 => 206,  623 => 205,  620 => 204,  614 => 202,  609 => 200,  605 => 199,  602 => 198,  596 => 196,  590 => 194,  588 => 193,  585 => 192,  579 => 190,  573 => 188,  571 => 187,  568 => 186,  562 => 184,  556 => 182,  554 => 181,  548 => 178,  544 => 177,  535 => 172,  529 => 171,  521 => 169,  514 => 167,  510 => 166,  503 => 165,  501 => 164,  493 => 163,  487 => 160,  483 => 159,  480 => 158,  477 => 157,  474 => 156,  471 => 155,  468 => 154,  466 => 153,  459 => 149,  454 => 147,  451 => 146,  448 => 145,  445 => 144,  442 => 143,  439 => 142,  437 => 141,  430 => 137,  426 => 135,  417 => 133,  408 => 132,  406 => 131,  399 => 130,  397 => 129,  391 => 126,  384 => 124,  380 => 123,  377 => 122,  374 => 121,  371 => 120,  368 => 119,  365 => 118,  363 => 117,  356 => 112,  349 => 111,  342 => 110,  339 => 109,  332 => 108,  328 => 107,  322 => 106,  314 => 105,  306 => 104,  298 => 103,  290 => 102,  282 => 101,  274 => 100,  268 => 97,  257 => 89,  252 => 87,  245 => 82,  240 => 80,  235 => 79,  230 => 77,  226 => 76,  222 => 75,  216 => 72,  208 => 67,  203 => 65,  196 => 60,  181 => 56,  174 => 54,  169 => 52,  163 => 51,  157 => 47,  141 => 46,  135 => 45,  124 => 37,  120 => 36,  116 => 35,  112 => 34,  105 => 30,  98 => 26,  93 => 23,  85 => 19,  83 => 18,  76 => 13,  65 => 11,  61 => 10,  56 => 8,  50 => 7,  46 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "extension/module/owlcarousel.twig", "");
    }
}
