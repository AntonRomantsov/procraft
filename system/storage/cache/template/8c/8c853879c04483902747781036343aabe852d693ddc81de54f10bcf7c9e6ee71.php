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

/* tool/neoseo_checkout_scfield_form.twig */
class __TwigTemplate_47b7d867b8efb50a628c785d950ba124afbd127b5eba07f61fa898957e60fc02 extends \Twig\Template
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
        echo "<div id=\"tab-scfields\">

    ";
        // line 3
        if ((twig_length_filter($this->env, ($context["customer_groups"] ?? null)) > 1)) {
            // line 4
            echo "        ";
            $context["i"] = 0;
            echo " ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["customer_groups"] ?? null));
            foreach ($context['_seq'] as $context["type"] => $context["name"]) {
                echo " ";
                $context["i"] = (($context["i"] ?? null) + 1);
                // line 5
                echo "        <div class=\"field radiobox custom-radiobox\" >
            <input type=\"radio\" id=\"type-";
                // line 6
                echo $context["type"];
                echo "\" ";
                if (($context["type"] == (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["customData"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["type"] ?? null) : null))) {
                    echo " checked=\"checked\" ";
                }
                echo " name=\"type\" value=\"";
                echo $context["type"];
                echo "\" class=\"large-field\" />
            <label for=\"type-";
                // line 7
                echo $context["type"];
                echo "\">";
                echo $context["name"];
                echo ":</label>
        </div>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['type'], $context['name'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 10
            echo "    ";
        } else {
            // line 11
            echo "        <input type=\"hidden\" name=\"type\" value=\"";
            $context["keys"] = twig_get_array_keys_filter(($context["customer_groups"] ?? null));
            echo " ";
            echo (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["keys"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[0] ?? null) : null);
            echo "\" />
    ";
        }
        // line 13
        echo "
    ";
        // line 14
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["customData"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["fields"] ?? null) : null));
        foreach ($context['_seq'] as $context["type"] => $context["fields"]) {
            // line 15
            echo "
        <div class=\"types type-";
            // line 16
            echo $context["type"];
            echo "\">

            <table class=\"form\">

                ";
            // line 20
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["fields"]);
            foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
                // line 21
                echo "                    ";
                $context["type"] = (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = $context["field"]) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["type"] ?? null) : null);
                // line 22
                echo "                    ";
                $context["name"] = (($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 = $context["field"]) && is_array($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4) || $__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4 instanceof ArrayAccess ? ($__internal_d7fc55f1a54b629533d60b43063289db62e68921ee7a5f8de562bd9d4a2b7ad4["name"] ?? null) : null);
                // line 23
                echo "                    ";
                $context["value"] = ((twig_get_attribute($this->env, $this->source, $context["field"], "value", [], "array", true, true, false, 23)) ? ((($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 = $context["field"]) && is_array($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666) || $__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666 instanceof ArrayAccess ? ($__internal_01476f8db28655ee4ee02ea2d17dd5a92599be76304f08cd8bc0e05aced30666["value"] ?? null) : null)) : ((($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e = $context["field"]) && is_array($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e) || $__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e instanceof ArrayAccess ? ($__internal_01c35b74bd85735098add188b3f8372ba465b232ab8298cb582c60f493d3c22e["default"] ?? null) : null)));
                // line 24
                echo "                    ";
                $context["label"] = (($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 = $context["field"]) && is_array($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52) || $__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52 instanceof ArrayAccess ? ($__internal_63ad1f9a2bf4db4af64b010785e9665558fdcac0e8db8b5b413ed986c62dbb52["label"] ?? null) : null);
                // line 25
                echo "                    ";
                if (twig_test_iterable((($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 = $context["field"]) && is_array($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136) || $__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136 instanceof ArrayAccess ? ($__internal_f10a4cc339617934220127f034125576ed229e948660ebac906a15846d52f136["label"] ?? null) : null))) {
                    // line 26
                    echo "                        ";
                    $context["label"] = (($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 = (($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 = $context["field"]) && is_array($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9) || $__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9 instanceof ArrayAccess ? ($__internal_d527c24a729d38501d770b40a0d25e1ce8a7f0bff897cc4f8f449ba71fcff3d9["label"] ?? null) : null)) && is_array($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386) || $__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386 instanceof ArrayAccess ? ($__internal_887a873a4dc3cf8bd4f99c487b4c7727999c350cc3a772414714e49a195e4386[($context["language_id"] ?? null)] ?? null) : null);
                    // line 27
                    echo "                    ";
                }
                // line 28
                echo "                    ";
                $context["error_style"] = ((((isset($context["errors"]) || array_key_exists("errors", $context)) && twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), ($context["name"] ?? null), [], "array", true, true, false, 28))) ? ("style=\"border:1px solid #f00; background:#F8ACAC;\"") : (""));
                // line 29
                echo "                    ";
                $context["error_name"] = ((((isset($context["errors"]) || array_key_exists("errors", $context)) && twig_get_attribute($this->env, $this->source, ($context["errors"] ?? null), ($context["name"] ?? null), [], "array", true, true, false, 29))) ? ((("<br><span class=\"error\">" . (($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae = ($context["errors"] ?? null)) && is_array($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae) || $__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae instanceof ArrayAccess ? ($__internal_f6dde3a1020453fdf35e718e94f93ce8eb8803b28cc77a665308e14bbe8572ae[($context["name"] ?? null)] ?? null) : null)) . "</span>")) : (""));
                // line 30
                echo "
                    ";
                // line 31
                if (twig_get_attribute($this->env, $this->source, $context["field"], "display", [], "array", true, true, false, 31)) {
                    // line 32
                    echo "
                        ";
                    // line 33
                    if (($context["type"] == "input")) {
                        // line 34
                        echo "                            <tr>
                                <td>";
                        // line 35
                        echo ($context["label"] ?? null);
                        echo "</td>
                                <td><input id=\"scfield-";
                        // line 36
                        echo ($context["name"] ?? null);
                        echo "\" type=\"text\" name=\"";
                        echo ($context["name"] ?? null);
                        echo "\" value=\"";
                        echo ($context["value"] ?? null);
                        echo "\" ";
                        echo ($context["error_style"] ?? null);
                        echo " /> ";
                        echo ($context["error_name"] ?? null);
                        echo "</td>
                            </tr>
                        ";
                    } elseif ((                    // line 38
$context["type"] == "password")) {
                        // line 39
                        echo "                            <tr>
                                <td>";
                        // line 40
                        echo ($context["label"] ?? null);
                        echo "</td>
                                <td><input id=\"scfield-";
                        // line 41
                        echo ($context["name"] ?? null);
                        echo "\" type=\"password\" id=\"guest_";
                        echo ($context["name"] ?? null);
                        echo "\" name=\"";
                        echo ($context["name"] ?? null);
                        echo "\" value=\"";
                        echo ($context["value"] ?? null);
                        echo "\" ";
                        echo ($context["error_style"] ?? null);
                        echo " /> ";
                        echo ($context["error_name"] ?? null);
                        echo "</td>
                            </tr>
                        ";
                    } elseif ((                    // line 43
$context["type"] == "checkbox")) {
                        // line 44
                        echo "                            <tr>
                                <td>";
                        // line 45
                        echo ($context["label"] ?? null);
                        echo "</td>
                                <td><input id=\"scfield-";
                        // line 46
                        echo ($context["name"] ?? null);
                        echo "\" type=\"checkbox\" id=\"guest_";
                        echo ($context["name"] ?? null);
                        echo "\" name=\"";
                        echo ($context["name"] ?? null);
                        echo "\" value=\"";
                        echo ($context["value"] ?? null);
                        echo "\" ";
                        echo ($context["error_style"] ?? null);
                        echo " /> ";
                        echo ($context["error_name"] ?? null);
                        echo "</td>
                            </tr>
                        ";
                    } elseif ((                    // line 48
$context["type"] == "radio")) {
                        // line 49
                        echo "                            <tr>
                                <td>";
                        // line 50
                        echo ($context["label"] ?? null);
                        echo "</td>
                                <td><input id=\"scfield-";
                        // line 51
                        echo ($context["name"] ?? null);
                        echo "\" type=\"radio\" id=\"guest_";
                        echo ($context["name"] ?? null);
                        echo "\" name=\"";
                        echo ($context["name"] ?? null);
                        echo "\" value=\"";
                        echo ($context["value"] ?? null);
                        echo "\" ";
                        echo ($context["error_style"] ?? null);
                        echo " /> ";
                        echo ($context["error_name"] ?? null);
                        echo "</td>
                            </tr>
                        ";
                    } elseif ((                    // line 53
$context["type"] == "textarea")) {
                        // line 54
                        echo "                            <tr>
                                <td>";
                        // line 55
                        echo ($context["label"] ?? null);
                        echo "</td>
                                <td><textarea id=\"scfield-";
                        // line 56
                        echo ($context["name"] ?? null);
                        echo "\" name=\"";
                        echo ($context["name"] ?? null);
                        echo "\" ";
                        echo ($context["error_style"] ?? null);
                        echo " > ";
                        echo ($context["value"] ?? null);
                        echo " </textarea> ";
                        echo ($context["error_name"] ?? null);
                        echo "</td>
                            </tr>
                        ";
                    }
                    // line 59
                    echo "
                    ";
                }
                // line 61
                echo "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 62
            echo "            </table>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['type'], $context['fields'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 65
        echo "
    <script>
        ";
        // line 67
        if ((twig_length_filter($this->env, ($context["customer_groups"] ?? null)) > 1)) {
            // line 68
            echo "        \$('[name=type]').click(function(e){
            var type = \$(this).val();
            \$(\".types\").hide();
            \$(\".types input\").attr(\"disabled\", true);
            \$(\".types select\").attr(\"disabled\", true);
            \$(\".types textarea\").attr(\"disabled\", true);

            \$(\".type-\" + type).show();
            \$(\".type-\" + type + \" input\").attr(\"disabled\", false);
            \$(\".type-\" + type + \" select\").attr(\"disabled\", false);
            \$(\".type-\" + type + \" textarea\").attr(\"disabled\", false);
        });
        \$('#type-";
            // line 80
            echo (($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f = ($context["customData"] ?? null)) && is_array($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f) || $__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f instanceof ArrayAccess ? ($__internal_25c0fab8152b8dd6b90603159c0f2e8a936a09ab76edb5e4d7bc95d9a8d2dc8f["type"] ?? null) : null);
            echo "').click();
        ";
        }
        // line 82
        echo "
        \$(document).ready(function(){
            ";
        // line 84
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["fields"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["field"]) {
            echo " ";
            if (((($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40 = $context["field"]) && is_array($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40) || $__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40 instanceof ArrayAccess ? ($__internal_f769f712f3484f00110c86425acea59f5af2752239e2e8596bcb6effeb425b40["display"] ?? null) : null) && (($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f = $context["field"]) && is_array($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f) || $__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f instanceof ArrayAccess ? ($__internal_98e944456c0f58b2585e4aa36e3a7e43f4b7c9038088f0f056004af41f4a007f["mask"] ?? null) : null))) {
                // line 85
                echo "            \$(\"#scfield-";
                echo (($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760 = $context["field"]) && is_array($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760) || $__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760 instanceof ArrayAccess ? ($__internal_a06a70691a7ca361709a372174fa669f5ee1c1e4ed302b3a5b61c10c80c02760["name"] ?? null) : null);
                echo "\").mask(\"";
                echo (($__internal_653499042eb14fd8415489ba6fa87c1e85cff03392e9f57b26d0da09b9be82ce = $context["field"]) && is_array($__internal_653499042eb14fd8415489ba6fa87c1e85cff03392e9f57b26d0da09b9be82ce) || $__internal_653499042eb14fd8415489ba6fa87c1e85cff03392e9f57b26d0da09b9be82ce instanceof ArrayAccess ? ($__internal_653499042eb14fd8415489ba6fa87c1e85cff03392e9f57b26d0da09b9be82ce["mask"] ?? null) : null);
                echo "\");
            ";
            }
            // line 86
            echo " ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['field'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 87
        echo "        });
    </script>
</div>

";
    }

    public function getTemplateName()
    {
        return "tool/neoseo_checkout_scfield_form.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  327 => 87,  321 => 86,  313 => 85,  307 => 84,  303 => 82,  298 => 80,  284 => 68,  282 => 67,  278 => 65,  270 => 62,  264 => 61,  260 => 59,  246 => 56,  242 => 55,  239 => 54,  237 => 53,  222 => 51,  218 => 50,  215 => 49,  213 => 48,  198 => 46,  194 => 45,  191 => 44,  189 => 43,  174 => 41,  170 => 40,  167 => 39,  165 => 38,  152 => 36,  148 => 35,  145 => 34,  143 => 33,  140 => 32,  138 => 31,  135 => 30,  132 => 29,  129 => 28,  126 => 27,  123 => 26,  120 => 25,  117 => 24,  114 => 23,  111 => 22,  108 => 21,  104 => 20,  97 => 16,  94 => 15,  90 => 14,  87 => 13,  79 => 11,  76 => 10,  65 => 7,  55 => 6,  52 => 5,  43 => 4,  41 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tool/neoseo_checkout_scfield_form.twig", "");
    }
}
