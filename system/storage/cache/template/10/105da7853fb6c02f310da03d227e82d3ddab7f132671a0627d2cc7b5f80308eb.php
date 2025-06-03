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

/* default/template/account/simpleedit.twig */
class __TwigTemplate_208bdbf6e41f99170c1b739ba5e308496ca54b81f38f69b8162a0178015b905a extends \Twig\Template
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
        if ((( !($context["ajax"] ?? null) &&  !($context["popup"] ?? null)) &&  !($context["as_module"] ?? null))) {
            // line 2
            echo "
";
            // line 3
            $context["simple_page"] = "simpleedit";
            // line 4
            echo ($context["header"] ?? null);
            echo "

      <main>
        <section class=\"profile\">
          <div class=\"breadcrumbs__container\" bis_skin_checked=\"1\">
          <ul class=\"breadcrumb\">
          ";
            // line 10
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
                // line 11
                echo "          <li><a href=\"";
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
            echo "        </ul>
          </div>
          <div class=\"profile__container\">
            <div class=\"profile__wrapper\">
            ";
            // line 17
            echo ($context["account"] ?? null);
            echo "
              <div class=\"profile__main\">
              ";
            // line 19
            echo ($context["account_discount"] ?? null);
            echo "
                <div class=\"profile__block profile__block--line_mod\">
                  <h2 class=\"profile__title\">";
            // line 21
            echo ($context["heading_title"] ?? null);
            echo "</h2>
                  <form class=\"profile__form\" action=\"";
            // line 22
            echo ($context["action"] ?? null);
            echo "\" method=\"post\" enctype=\"multipart/form-data\">
                  <div class=\"profile__form_row\">
                    <div class=\"profile__form_column\">
                      <label class=\"registration_input__label\" for=\"profileEmail\">
                        <span>*</span>
                        ";
            // line 27
            echo ($context["entry_email"] ?? null);
            echo "
                      </label>
                      <input class=\"input--profile_mod\" id=\"profileEmail\" type=\"email\" placeholder=\"";
            // line 29
            echo ($context["entry_email"] ?? null);
            echo "\" name=\"edit[email]\" value=\"";
            echo ($context["email"] ?? null);
            echo "\" required />
                    </div>
                    <div class=\"profile__form_column\">
                      <label class=\"registration_input__label\" for=\"profileName\">
                        <span>*</span>
                          ";
            // line 34
            echo ($context["entry_firstname"] ?? null);
            echo "
                      </label>
                      <input class=\"input--profile_mod\" id=\"profileName\" type=\"text\" placeholder=\"";
            // line 36
            echo ($context["entry_firstname"] ?? null);
            echo "\" name=\"edit[firstname]\" value=\"";
            echo ($context["firstname"] ?? null);
            echo "\" required />
                    </div>
                  </div>
                  <div class=\"profile__form_row\">
                    <div class=\"profile__form_column\">
                      <label class=\"registration_input__label\" for=\"profileLastName\">
                        <span>*</span>
                        ";
            // line 43
            echo ($context["entry_lastname"] ?? null);
            echo "
                      </label>
                      <input class=\"input--profile_mod\" id=\"profileLastName\" type=\"text\" placeholder=\"";
            // line 45
            echo ($context["entry_lastname"] ?? null);
            echo "\" name=\"edit[lastname]\" value=\"";
            echo ($context["lastname"] ?? null);
            echo "\" required />
                    </div>
                    <div class=\"profile__form_column\">
                      <label class=\"registration_input__label\" for=\"profileTel\">
                        <span>*</span>
                          ";
            // line 50
            echo ($context["entry_telephone"] ?? null);
            echo "
                      </label>
                      <input class=\"input--profile_mod\" id=\"profileTel\" type=\"tel\" placeholder=\"+380 __ ___ __ __\"  name=\"edit[telephone]\" value=\"";
            // line 52
            echo ($context["telephone"] ?? null);
            echo "\" required />
                    </div>
                  </div>
                  <button class=\"button profile__form_button\" type=\"submit\" name=\"submitted\" value=\"1\">";
            // line 55
            echo ($context["text_continue"] ?? null);
            echo "</button>
                </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </main>
      
";
            // line 64
            $this->loadTemplate(($context["simple_footer"] ?? null), "default/template/account/simpleedit.twig", 64)->display($context);
        }
        // line 66
        echo "<script>
\$('#profileTel').mask('+38(999) 999 99 99');
</script>
";
    }

    public function getTemplateName()
    {
        return "default/template/account/simpleedit.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  169 => 66,  166 => 64,  154 => 55,  148 => 52,  143 => 50,  133 => 45,  128 => 43,  116 => 36,  111 => 34,  101 => 29,  96 => 27,  88 => 22,  84 => 21,  79 => 19,  74 => 17,  68 => 13,  57 => 11,  53 => 10,  44 => 4,  42 => 3,  39 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/account/simpleedit.twig", "");
    }
}
