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

/* default/template/account/wishlist.twig */
class __TwigTemplate_83ab738ded3b8eed4241463f7f8c30f84bfe5c9fd612a5fc4c303a0b65501c74 extends \Twig\Template
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
        // line 7
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["breadcrumbs"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["breadcrumb"]) {
            // line 8
            echo "          <li>
            <a href=\"";
            // line 9
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "href", [], "any", false, false, false, 9);
            echo "\">
              ";
            // line 10
            echo twig_get_attribute($this->env, $this->source, $context["breadcrumb"], "text", [], "any", false, false, false, 10);
            echo "
            </a>
          </li>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['breadcrumb'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        echo "      </ul>
      ";
        // line 15
        if (($context["success"] ?? null)) {
            // line 16
            echo "        <div class=\"alert alert-success alert-dismissible\">
          <i class=\"fa fa-check-circle\"></i>
          ";
            // line 18
            echo ($context["success"] ?? null);
            echo "
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\">
            &times;
          </button>
        </div>
      ";
        }
        // line 24
        echo "    </div>
    <div class=\"profile__container\">
      <div class=\"profile__wrapper\">
        ";
        // line 27
        echo ($context["account"] ?? null);
        echo "
        <div class=\"profile__main\">
          ";
        // line 29
        echo ($context["account_discount"] ?? null);
        echo "
          <div class=\"profile__block profile__block--line_mod\">
            <h2 class=\"profile__title\">
              ";
        // line 32
        echo ($context["heading_title"] ?? null);
        echo "
            </h2>
            <div class=\"profile__table_wrapper profile__table_wrapper--wishlist_mod wishlist-table\">
              <div class=\"profile__table\">
                <div class=\"profile__table_head\">
                  <div class=\"profile__table_row profile__table_row--head\">
                    <div class=\"profile__table_cell\">
                      ";
        // line 39
        echo ($context["column_name"] ?? null);
        echo "
                    </div>
                    <div class=\"profile__table_cell\">
                      ";
        // line 42
        echo ($context["column_stock"] ?? null);
        echo "
                    </div>
                    <div class=\"profile__table_cell\">
                      ";
        // line 45
        echo ($context["column_price"] ?? null);
        echo "
                    </div>
                    <div class=\"profile__table_cell\"></div>
                  </div>
                </div>
                <div class=\"profile__table_body\">
                  ";
        // line 51
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 52
            echo "                    <div class=\"profile__table_row\">
                      <div class=\"profile__table_cell\">
                        <span class=\"profile__table_cell--mob\">
                          ";
            // line 55
            echo ($context["column_name"] ?? null);
            echo "
                        </span>
                        <span class=\"profile__table_cell--mob_span\">
                          <img class=\"profile__table_cell_photo\" src=\"";
            // line 58
            echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 58);
            echo "\" alt=\"Product\" />
                          <a href=\"";
            // line 59
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 59);
            echo "\">
                            ";
            // line 60
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 60);
            echo "
                          </a>
                        </span>
                      </div>
                      <div class=\"profile__table_cell\">
                        <span class=\"profile__table_cell--mob\">
                          ";
            // line 66
            echo ($context["column_stock"] ?? null);
            echo "
                        </span>
                        <span class=\"profile__table_cell--mob_span\">
                          ";
            // line 69
            echo twig_get_attribute($this->env, $this->source, $context["product"], "stock", [], "any", false, false, false, 69);
            echo "
                        </span>
                      </div>
                      <div class=\"profile__table_cell\">
                        <span class=\"profile__table_cell--mob\">
                          ";
            // line 74
            echo ($context["column_price"] ?? null);
            echo "
                        </span>
                        <span class=\"profile__table_cell--mob_span\">
                          ";
            // line 77
            echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 77);
            echo "
                        </span>
                      </div>
                      <div class=\"profile__table_cell\">
                        <button class=\"profile__table_body_actions\" data-bs-toggle=\"tooltip\" title=\"";
            // line 81
            echo ($context["text_add_to_cart"] ?? null);
            echo "\" onclick=\"cart.add('";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 81);
            echo "');\">
                          <svg viewBox=\"0 0 19 19\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                            <path d=\"M3.33697 4.34751L0.634766 1.64531L1.81327 0.466797L4.51547 3.169H17.2169C17.6772 3.169 18.0502 3.5421 18.0502 4.00233C18.0502 4.08343 18.0384 4.16411 18.0152 4.24179L16.0152 10.9085C15.9094 11.261 15.5849 11.5024 15.2169 11.5024H5.00363V13.169H14.1703V14.8357H4.1703C3.71006 14.8357 3.33697 14.4625 3.33697 14.0024V4.34751ZM5.00363 4.83566V9.8357H14.5969L16.0969 4.83566H5.00363ZM4.58697 18.169C3.89661 18.169 3.33697 17.6094 3.33697 16.919C3.33697 16.2286 3.89661 15.669 4.58697 15.669C5.27733 15.669 5.83697 16.2286 5.83697 16.919C5.83697 17.6094 5.27733 18.169 4.58697 18.169ZM14.587 18.169C13.8966 18.169 13.337 17.6094 13.337 16.919C13.337 16.2286 13.8966 15.669 14.587 15.669C15.2773 15.669 15.837 16.2286 15.837 16.919C15.837 17.6094 15.2773 18.169 14.587 18.169Z\" />
                          </svg>
                          <p class=\"profile__table_body_actions_text\">
                            ";
            // line 86
            echo ($context["text_add_to_cart"] ?? null);
            echo "
                          </p>
                        </button>
                        <a href=\"";
            // line 89
            echo twig_get_attribute($this->env, $this->source, $context["product"], "remove", [], "any", false, false, false, 89);
            echo "\" class=\"profile__table_body_actions\" data-toggle=\"tooltip\" data-original-title=\"";
            echo ($context["text_remove"] ?? null);
            echo "\" >
                          <svg viewBox=\"0 0 18 18\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                            <path d=\"M13.1667 4.00033H17.3334V5.66699H15.6667V16.5003C15.6667 16.9606 15.2936 17.3337 14.8334 17.3337H3.16669C2.70645 17.3337 2.33335 16.9606 2.33335 16.5003V5.66699H0.666687V4.00033H4.83335V1.50033C4.83335 1.04009 5.20645 0.666992 5.66669 0.666992H12.3334C12.7936 0.666992 13.1667 1.04009 13.1667 1.50033V4.00033ZM14 5.66699H4.00002V15.667H14V5.66699ZM10.1785 10.6667L11.6517 12.1399L10.4732 13.3184L9.00002 11.8452L7.52685 13.3184L6.34837 12.1399L7.82152 10.6667L6.34837 9.19366L7.52685 8.01516L9.00002 9.48824L10.4732 8.01516L11.6517 9.19366L10.1785 10.6667ZM6.50002 2.33366V4.00033H11.5V2.33366H6.50002Z\" />
                          </svg>
                          <p class=\"profile__table_body_actions_text\">
                            ";
            // line 94
            echo ($context["text_remove"] ?? null);
            echo "
                          </p>
                        </a>
                      </div>
                    </div>
                  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 100
        echo "
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
";
        // line 110
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/template/account/wishlist.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  241 => 110,  229 => 100,  217 => 94,  207 => 89,  201 => 86,  191 => 81,  184 => 77,  178 => 74,  170 => 69,  164 => 66,  155 => 60,  151 => 59,  147 => 58,  141 => 55,  136 => 52,  132 => 51,  123 => 45,  117 => 42,  111 => 39,  101 => 32,  95 => 29,  90 => 27,  85 => 24,  76 => 18,  72 => 16,  70 => 15,  67 => 14,  57 => 10,  53 => 9,  50 => 8,  46 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/account/wishlist.twig", "");
    }
}
