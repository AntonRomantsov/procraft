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

/* default/template/account/address_list.twig */
class __TwigTemplate_d88d78d9c5768ba3860930f26c0aeae795d4602ee2297436f9adbf534bb07f4d extends \Twig\Template
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
        echo "
<main>
  <section class=\"profile\">
    <div class=\"breadcrumbs__container\" bis_skin_checked=\"1\">
    <ul class=\"breadcrumb\">
    ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 7
            echo "    <li><a href=\"";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 7);
            echo "\">";
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 7);
            echo "</a></li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 9
        echo "  </ul>
    </div>
    <div class=\"profile__container\">
      <div class=\"profile__wrapper\">
      ";
        // line 13
        echo ($context["account"] ?? null);
        echo "
        <div class=\"profile__main\">
        ";
        // line 15
        echo ($context["account_discount"] ?? null);
        echo "
        <div class=\"profile__block profile__block--line_mod\">
      <h2 class=\"profile__title\">";
        // line 17
        echo ($context["text_address_add"] ?? null);
        echo "</h2>
      <form class=\"profile__form\" action=\"";
        // line 18
        echo ($context["action"] ?? null);
        echo "\" method=\"post\">
        <div class=\"profile__form_row\">
          <div class=\"profile__form_column\">
            <label class=\"registration_input__label\" for=\"city\">";
        // line 21
        echo ($context["entry_city"] ?? null);
        echo "</label>
            <input class=\"input--profile_mod\" id=\"city\" type=\"text\" placeholder=\"";
        // line 22
        echo ($context["entry_city"] ?? null);
        echo "\" name=\"address[city]\" required />
          </div>
          <div class=\"profile__form_column\">
            <label class=\"registration_input__label\" for=\"address\">";
        // line 25
        echo ($context["text_address"] ?? null);
        echo "</label>
            <input class=\"input--profile_mod\" id=\"address\" type=\"text\" placeholder=\"";
        // line 26
        echo ($context["text_address"] ?? null);
        echo "\" name=\"address[address_1]\" required />
          </div>
        </div>
        <button class=\"button profile__form_button\" type=\"submit\">";
        // line 29
        echo ($context["text_address_add"] ?? null);
        echo "</button>
      </form>
    </div>
    <div class=\"profile__block\">
  <h2 class=\"profile__title\">";
        // line 33
        echo ($context["text_address_book"] ?? null);
        echo "</h2>
  <div class=\"profile__address_wrapper\">
";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["addresses"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["address"]) {
            // line 36
            echo "    <label class=\"profile__address_item ";
            if (twig_get_attribute($this->env, $this->source, $context["address"], "default", [], "any", false, false, false, 36)) {
                echo "profile__address_item--active_mod";
            }
            echo "\" for=\"profileAddress";
            echo twig_get_attribute($this->env, $this->source, $context["address"], "address_id", [], "any", false, false, false, 36);
            echo "\">
      <h3 class=\"profile__address_city\">";
            // line 37
            echo twig_get_attribute($this->env, $this->source, $context["address"], "city", [], "any", false, false, false, 37);
            echo "</h3>
      <p class=\"profile__address_street\">";
            // line 38
            echo twig_get_attribute($this->env, $this->source, $context["address"], "address", [], "any", false, false, false, 38);
            echo "</p>
      <span class=\"profile__address_decor\"></span>
      <div class=\"profile__address_inner\">
        <input id=\"profileAddress";
            // line 41
            echo twig_get_attribute($this->env, $this->source, $context["address"], "address_id", [], "any", false, false, false, 41);
            echo "\" type=\"checkbox\" required style=\"display: none;\" />
";
            // line 42
            if (twig_get_attribute($this->env, $this->source, $context["address"], "default", [], "any", false, false, false, 42)) {
                echo "<span class=\"profile__address_label profile__address_label--checkbox_mod\">";
                echo ($context["text_default_address"] ?? null);
                echo "</span>";
            }
            // line 43
            echo "        <div class=\"profile__address_buttons\">
          <a href=\"";
            // line 44
            echo twig_get_attribute($this->env, $this->source, $context["address"], "update", [], "any", false, false, false, 44);
            echo "\" class=\"profile__address_button\">
            <svg class=\"profile__address_button_icon\" viewBox=\"0 0 16 16\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
              <path
                d=\"M2.16667 13.7414H3.34517L11.1066 5.97999L9.92808 4.80148L2.16667 12.5629V13.7414ZM15.5 15.4081H0.5V11.8725L11.6958 0.676692C12.0213 0.351259 12.5489 0.351259 12.8743 0.676692L15.2314 3.03372C15.5568 3.35915 15.5568 3.88679 15.2314 4.21223L5.7022 13.7414H15.5V15.4081ZM11.1066 3.62298L12.2851 4.80148L13.4636 3.62298L12.2851 2.44446L11.1066 3.62298Z\"
              />
            </svg>
          </a>
          <a href=\"";
            // line 51
            echo twig_get_attribute($this->env, $this->source, $context["address"], "delete", [], "any", false, false, false, 51);
            echo "\" class=\"profile__address_button\">
            <svg class=\"profile__address_button_icon\" viewBox=\"0 0 18 18\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
              <path
                d=\"M13.1667 3.99984H17.3333V5.6665H15.6667V16.4998C15.6667 16.9601 15.2936 17.3332 14.8333 17.3332H3.16667C2.70644 17.3332 2.33334 16.9601 2.33334 16.4998V5.6665H0.666672V3.99984H4.83334V1.49984C4.83334 1.0396 5.20644 0.666504 5.66667 0.666504H12.3333C12.7936 0.666504 13.1667 1.0396 13.1667 1.49984V3.99984ZM14 5.6665H4.00001V15.6665H14V5.6665ZM10.1785 10.6663L11.6517 12.1394L10.4732 13.3179L9 11.8448L7.52684 13.3179L6.34835 12.1394L7.82151 10.6663L6.34835 9.19317L7.52684 8.01467L9 9.48775L10.4732 8.01467L11.6517 9.19317L10.1785 10.6663ZM6.5 2.33317V3.99984H11.5V2.33317H6.5Z\"
              />
            </svg>
          </a>
        </div>
      </div>
    </label>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['address'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "
  </div>
</div>
        </div>
      </div>
    </div>
  </section>
</main>
";
        // line 70
        echo ($context["footer"] ?? null);
    }

    public function getTemplateName()
    {
        return "default/template/account/address_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  191 => 70,  181 => 62,  164 => 51,  154 => 44,  151 => 43,  145 => 42,  141 => 41,  135 => 38,  131 => 37,  122 => 36,  118 => 35,  113 => 33,  106 => 29,  100 => 26,  96 => 25,  90 => 22,  86 => 21,  80 => 18,  76 => 17,  71 => 15,  66 => 13,  60 => 9,  49 => 7,  45 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/account/address_list.twig", "");
    }
}
