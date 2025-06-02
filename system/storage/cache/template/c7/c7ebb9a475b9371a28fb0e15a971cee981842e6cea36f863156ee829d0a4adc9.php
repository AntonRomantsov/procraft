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

/* default/template/common/simple_row_field.twig */
class __TwigTemplate_5aab595480de9fcc98964db9d3fe35e108baf12932b7d710bbc4a146f43f9d75 extends \Twig\Template
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
        echo "<div class=\"form-group ";
        if (($context["required"] ?? null)) {
            echo "required";
        }
        echo " row-";
        echo ($context["id"] ?? null);
        echo "\">
    <label class=\"control-label ";
        // line 2
        echo (((($context["page"] ?? null) == "checkout")) ? ("col-sm-4") : ("col-sm-12"));
        echo "\" for=\"";
        echo ($context["id"] ?? null);
        echo "\">";
        echo ($context["label"] ?? null);
        echo "</label>
    <div class=\"";
        // line 3
        echo (((($context["page"] ?? null) == "checkout")) ? ("col-sm-8") : ("col-sm-12"));
        echo "\">
      ";
        // line 4
        if (((($context["type"] ?? null) == "select") || (($context["type"] ?? null) == "select2"))) {
            // line 5
            echo "        <select class=\"form-control\" name=\"";
            echo ($context["name"] ?? null);
            echo "\" id=\"";
            echo ($context["id"] ?? null);
            echo "\" ";
            echo ((($context["bootstrap"] ?? null)) ? ("data-theme=\"bootstrap\"") : (""));
            echo " ";
            echo (((($context["type"] ?? null) == "select2")) ? ("data-type=\"select2\"") : (""));
            echo " ";
            echo ((($context["reload"] ?? null)) ? ("data-onchange=\"reloadAll\"") : (""));
            echo ">
          ";
            // line 6
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["values"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["info"]) {
                // line 7
                echo "            <option value=\"";
                echo twig_escape_filter($this->env, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $context["info"]) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["id"] ?? null) : null));
                echo "\" ";
                echo (((($context["value"] ?? null) == (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = $context["info"]) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["id"] ?? null) : null))) ? ("selected=\"selected\"") : (""));
                echo ">";
                echo (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = $context["info"]) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["text"] ?? null) : null);
                echo "</option>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['info'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 9
            echo "        </select>
      ";
        } elseif ((        // line 10
($context["type"] ?? null) == "radio")) {
            // line 11
            echo "        <div>
        ";
            // line 12
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["values"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["info"]) {
                // line 13
                echo "          <div class=\"radio\">
            <label><input type=\"radio\" name=\"";
                // line 14
                echo ($context["name"] ?? null);
                echo "\" id=\"";
                echo ($context["id"] ?? null);
                echo "_";
                echo (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = $context["info"]) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["id"] ?? null) : null);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, (($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = $context["info"]) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4["id"] ?? null) : null));
                echo "\" ";
                echo (((($context["value"] ?? null) == (($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 = $context["info"]) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666["id"] ?? null) : null))) ? ("checked=\"checked\"") : (""));
                echo " ";
                echo ((($context["reload"] ?? null)) ? ("data-onchange=\"reloadAll\"") : (""));
                echo ">";
                echo (($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e = $context["info"]) && is_array($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e) || $__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e instanceof ArrayAccess ? ($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e["text"] ?? null) : null);
                echo "</label>
          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['info'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 17
            echo "        </div>
      ";
        } elseif ((        // line 18
($context["type"] ?? null) == "checkbox")) {
            // line 19
            echo "        <div>
        ";
            // line 20
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["values"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["info"]) {
                // line 21
                echo "          <div class=\"checkbox\">
            <label><input type=\"checkbox\" name=\"";
                // line 22
                echo ($context["name"] ?? null);
                echo "[]\" id=\"";
                echo ($context["id"] ?? null);
                echo "_";
                echo (($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 = $context["info"]) && is_array($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52) || $__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 instanceof ArrayAccess ? ($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52["id"] ?? null) : null);
                echo "\" value=\"";
                echo twig_escape_filter($this->env, (($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 = $context["info"]) && is_array($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136) || $__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 instanceof ArrayAccess ? ($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136["id"] ?? null) : null));
                echo "\" ";
                echo ((twig_in_filter((($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 = $context["info"]) && is_array($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386) || $__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 instanceof ArrayAccess ? ($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386["id"] ?? null) : null), ($context["value"] ?? null))) ? ("checked=\"checked\"") : (""));
                echo " ";
                echo ((($context["reload"] ?? null)) ? ("data-onchange=\"reloadAll\"") : (""));
                echo ">";
                echo (($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 = $context["info"]) && is_array($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9) || $__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 instanceof ArrayAccess ? ($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9["text"] ?? null) : null);
                echo "</label>
          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['info'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            echo "        </div>
      ";
        } elseif ((        // line 26
($context["type"] ?? null) == "switcher")) {
            // line 27
            echo "        <div>
          <div class=\"checkbox\">
            <label><input type=\"checkbox\" name=\"";
            // line 29
            echo ($context["name"] ?? null);
            echo "\" id=\"";
            echo ($context["id"] ?? null);
            echo "\" data-unchecked-value=\"0\" value=\"1\" ";
            echo (((($context["value"] ?? null) == "1")) ? ("checked=\"checked\"") : (""));
            echo " ";
            echo ((($context["reload"] ?? null)) ? ("data-onchange=\"reloadAll\"") : (""));
            echo ">";
            echo ($context["placeholder"] ?? null);
            echo "</label>
          </div>
        </div>
      ";
        } elseif ((        // line 32
($context["type"] ?? null) == "textarea")) {
            // line 33
            echo "        <textarea class=\"form-control\" name=\"";
            echo ($context["name"] ?? null);
            echo "\" id=\"";
            echo ($context["id"] ?? null);
            echo "\" placeholder=\"";
            echo ($context["placeholder"] ?? null);
            echo "\" ";
            echo ((($context["reload"] ?? null)) ? ("data-onchange=\"reloadAll\"") : (""));
            echo ">";
            echo ($context["value"] ?? null);
            echo "</textarea>
      ";
        } elseif ((        // line 34
($context["type"] ?? null) == "captcha")) {
            // line 35
            echo "        ";
            if (($context["site_key"] ?? null)) {
                // line 36
                echo "          <script src=\"https://www.google.com/recaptcha/api.js?hl=";
                echo ($context["lang"] ?? null);
                echo "&onload=recaptchaInit&render=explicit\" type=\"text/javascript\" async defer></script>
          <input type=\"hidden\" name=\"";
                // line 37
                echo ($context["name"] ?? null);
                echo "\" id=\"";
                echo ($context["id"] ?? null);
                echo "\" value=\"";
                echo ($context["value"] ?? null);
                echo "\">
          <script type=\"text/javascript\">
            function recaptchaCallback(value) {
              \$('#";
                // line 40
                echo ($context["id"] ?? null);
                echo "').val(value).trigger('change');
            }
            function recaptchaInit(){
              grecaptcha.render('simple-recaptcha');
            }
          </script>
          <div id=\"simple-recaptcha\" data-sitekey=\"";
                // line 46
                echo ($context["site_key"] ?? null);
                echo "\" data-callback=\"recaptchaCallback\"></div>
        ";
            } else {
                // line 48
                echo "          <input type=\"text\" class=\"form-control\" name=\"";
                echo ($context["name"] ?? null);
                echo "\" id=\"";
                echo ($context["id"] ?? null);
                echo "\" value=\"\" placeholder=\"";
                echo ($context["placeholder"] ?? null);
                echo "\" ";
                echo ((($context["reload"] ?? null)) ? ("data-onchange=\"reloadAll\"") : (""));
                echo ">
          <div class=\"simple-captcha-container\"><img src=\"index.php?";
                // line 49
                echo ($context["additional_path"] ?? null);
                echo "route=common/simple_connector/captcha&t=";
                echo ($context["time"] ?? null);
                echo "\" alt=\"\" id=\"captcha\" /></div>
        ";
            }
            // line 51
            echo "      ";
        } elseif ((($context["type"] ?? null) == "file")) {
            // line 52
            echo "        <input type=\"button\" value=\"";
            echo ($context["button_upload"] ?? null);
            echo "\" data-file=\"";
            echo ($context["id"] ?? null);
            echo "\" class=\"button form-control\">
        <div id=\"text_";
            // line 53
            echo ($context["id"] ?? null);
            echo "\" style=\"margin-top:3px;max-width:200px;\">";
            echo ($context["filename"] ?? null);
            echo "</div>
        <input type=\"hidden\" name=\"";
            // line 54
            echo ($context["name"] ?? null);
            echo "\" id=\"";
            echo ($context["id"] ?? null);
            echo "\" value=\"";
            echo ($context["value"] ?? null);
            echo "\">
      ";
        } elseif ((        // line 55
($context["type"] ?? null) == "date")) {
            // line 56
            echo "        <div class=\"input-group date\">
          <input class=\"form-control\" type=\"text\" data-type=\"date\" name=\"";
            // line 57
            echo ($context["name"] ?? null);
            echo "\" id=\"";
            echo ($context["id"] ?? null);
            echo "\" value=\"";
            echo ($context["value"] ?? null);
            echo "\" placeholder=\"";
            echo ($context["placeholder"] ?? null);
            echo "\" ";
            echo ($context["attrs"] ?? null);
            echo " ";
            echo ((($context["reload"] ?? null)) ? ("data-onchange=\"reloadAll\"") : (""));
            echo ">
          <span class=\"input-group-btn\">
            <button type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-calendar\"></i></button>
          </span>
        </div>
      ";
        } elseif ((        // line 62
($context["type"] ?? null) == "time")) {
            // line 63
            echo "      <div class=\"input-group time\">
        <input class=\"form-control\" type=\"text\" data-type=\"time\" name=\"";
            // line 64
            echo ($context["name"] ?? null);
            echo "\" id=\"";
            echo ($context["id"] ?? null);
            echo "\" value=\"";
            echo ($context["value"] ?? null);
            echo "\" placeholder=\"";
            echo ($context["placeholder"] ?? null);
            echo "\" ";
            echo ($context["attrs"] ?? null);
            echo " ";
            echo ((($context["reload"] ?? null)) ? ("data-onchange=\"reloadAll\"") : (""));
            echo ">
        <span class=\"input-group-btn\">
          <button type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-clock-o\"></i></button>
        </span>
      </div>
      ";
        } elseif ((        // line 69
($context["type"] ?? null) == "datetime")) {
            // line 70
            echo "      <div class=\"input-group datetime\">
        <input class=\"form-control\" type=\"text\" data-type=\"datetime\" name=\"";
            // line 71
            echo ($context["name"] ?? null);
            echo "\" id=\"";
            echo ($context["id"] ?? null);
            echo "\" value=\"";
            echo ($context["value"] ?? null);
            echo "\" placeholder=\"";
            echo ($context["placeholder"] ?? null);
            echo "\" ";
            echo ($context["attrs"] ?? null);
            echo " ";
            echo ((($context["reload"] ?? null)) ? ("data-onchange=\"reloadAll\"") : (""));
            echo ">
        <span class=\"input-group-btn\">
          <button type=\"button\" class=\"btn btn-default\"><i class=\"fa fa-calendar\"></i></button>
        </span>
      </div>
      ";
        } else {
            // line 77
            echo "        <input  class=\"form-control\" type=\"";
            echo ($context["type"] ?? null);
            echo "\" name=\"";
            echo ($context["name"] ?? null);
            echo "\" id=\"";
            echo ($context["id"] ?? null);
            echo "\" ";
            echo (((($context["type"] ?? null) == "password")) ? ("data-validate-on=\"keyup\"") : (""));
            echo " value=\"";
            echo ($context["value"] ?? null);
            echo "\" placeholder=\"";
            echo ($context["placeholder"] ?? null);
            echo "\" ";
            echo ($context["attrs"] ?? null);
            echo " ";
            echo ((($context["reload"] ?? null)) ? ("data-onchange=\"reloadAll\"") : (""));
            echo ">
      ";
        }
        // line 79
        echo "      ";
        if ( !twig_test_empty(($context["rules"] ?? null))) {
            // line 80
            echo "        <div class=\"simplecheckout-rule-group\" data-for=\"";
            echo ($context["id"] ?? null);
            echo "\">
          ";
            // line 81
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["rules"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["rule"]) {
                // line 82
                echo "            <div ";
                echo ((((($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae = $context["rule"]) && is_array($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae) || $__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae instanceof ArrayAccess ? ($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae["display"] ?? null) : null) &&  !(($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f = $context["rule"]) && is_array($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f) || $__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f instanceof ArrayAccess ? ($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f["passed"] ?? null) : null))) ? ("") : ("style=\"display:none;\""));
                echo " data-for=\"";
                echo ($context["id"] ?? null);
                echo "\" data-for-type=\"";
                echo ($context["type"] ?? null);
                echo "\"  data-rule=\"";
                echo (($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40 = $context["rule"]) && is_array($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40) || $__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40 instanceof ArrayAccess ? ($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40["id"] ?? null) : null);
                echo "\" class=\"simplecheckout-error-text simplecheckout-rule\" ";
                echo (($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f = $context["rule"]) && is_array($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f) || $__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f instanceof ArrayAccess ? ($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f["attrs"] ?? null) : null);
                echo ">";
                echo (($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760 = $context["rule"]) && is_array($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760) || $__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760 instanceof ArrayAccess ? ($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760["text"] ?? null) : null);
                echo "</div>
          ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['rule'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 84
            echo "        </div>
      ";
        }
        // line 86
        echo "      ";
        if (($context["description"] ?? null)) {
            // line 87
            echo "        <div class=\"simplecheckout-tooltip\" data-for=\"";
            echo ($context["id"] ?? null);
            echo "\">";
            echo ($context["description"] ?? null);
            echo "</div>
      ";
        }
        // line 89
        echo "    </div>
 </div>
";
    }

    public function getTemplateName()
    {
        return "default/template/common/simple_row_field.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  412 => 89,  404 => 87,  401 => 86,  397 => 84,  378 => 82,  374 => 81,  369 => 80,  366 => 79,  346 => 77,  327 => 71,  324 => 70,  322 => 69,  304 => 64,  301 => 63,  299 => 62,  281 => 57,  278 => 56,  276 => 55,  268 => 54,  262 => 53,  255 => 52,  252 => 51,  245 => 49,  234 => 48,  229 => 46,  220 => 40,  210 => 37,  205 => 36,  202 => 35,  200 => 34,  187 => 33,  185 => 32,  171 => 29,  167 => 27,  165 => 26,  162 => 25,  141 => 22,  138 => 21,  134 => 20,  131 => 19,  129 => 18,  126 => 17,  105 => 14,  102 => 13,  98 => 12,  95 => 11,  93 => 10,  90 => 9,  77 => 7,  73 => 6,  60 => 5,  58 => 4,  54 => 3,  46 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/common/simple_row_field.twig", "");
    }
}
