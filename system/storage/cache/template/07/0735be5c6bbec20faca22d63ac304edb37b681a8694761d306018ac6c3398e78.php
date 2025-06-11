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

/* default/template/account/order_list.twig */
class __TwigTemplate_f85ef90db671d2f7bf32fd10609dc315797d7f8f730878b37cd24d644fb60b14 extends \Twig\Template
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
    </div>
    <div class=\"profile__container\">
      <div class=\"profile__wrapper\">
        ";
        // line 18
        echo ($context["account"] ?? null);
        echo "
        <div class=\"profile__main\">
          ";
        // line 20
        echo ($context["account_discount"] ?? null);
        echo "
          <div class=\"profile__block profile__block--line_mod\">
            <h2 class=\"profile__title\">
              ";
        // line 23
        echo ($context["heading_title"] ?? null);
        echo "
            </h2>
            ";
        // line 25
        if (($context["orders"] ?? null)) {
            // line 26
            echo "            <div class=\"profile__table_wrapper\">
            <div class=\"profile__table\" style=\"width: 95%;\">
              <div class=\"profile__table_head\">
                <div class=\"profile__table_row profile__table_row--head\">
                  <div class=\"profile__table_cell\">
                    ";
            // line 31
            echo ($context["column_date_added"] ?? null);
            echo "
                  </div>
                  <div class=\"profile__table_cell\">
                    ";
            // line 34
            echo ($context["column_order_id"] ?? null);
            echo "
                  </div>
                  <div class=\"profile__table_cell\">
                    ";
            // line 37
            echo ($context["column_total"] ?? null);
            echo "
                  </div>
                  <div class=\"profile__table_cell\">
                    ";
            // line 40
            echo ($context["column_quantity"] ?? null);
            echo "
                  </div>
                  <div class=\"profile__table_cell profile__table_head_status\">
                    ";
            // line 43
            echo ($context["column_status"] ?? null);
            echo "
                  </div>
                  <div class=\"profile__table_cell\"></div>
                </div>
              </div>
              <div class=\"profile__table_body\">
                ";
            // line 49
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["orders"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["order"]) {
                // line 50
                echo "                  <div class=\"profile__table_row\">
                    <div class=\"profile__table_cell\">
                      <span class=\"profile__table_cell--mob\">
                        ";
                // line 53
                echo ($context["column_date_added"] ?? null);
                echo "
                      </span>
                      <span class=\"profile__table_cell--mob_span\">
                        ";
                // line 56
                echo twig_get_attribute($this->env, $this->source, $context["order"], "date_added", [], "any", false, false, false, 56);
                echo "
                      </span>
                    </div>
                    <div class=\"profile__table_cell\">
                      <span class=\"profile__table_cell--mob\">
                        ";
                // line 61
                echo ($context["column_order_id"] ?? null);
                echo "
                      </span>
                      <span class=\"profile__table_cell--mob_span\">
                        ";
                // line 64
                echo twig_get_attribute($this->env, $this->source, $context["order"], "order_id", [], "any", false, false, false, 64);
                echo "
                      </span>
                    </div>
                    <div class=\"profile__table_cell\">
                      <span class=\"profile__table_cell--mob\">
                        ";
                // line 69
                echo ($context["column_total"] ?? null);
                echo "
                      </span>
                      <span class=\"profile__table_cell--mob_span\">
                        ";
                // line 72
                echo twig_get_attribute($this->env, $this->source, $context["order"], "total", [], "any", false, false, false, 72);
                echo "
                      </span>
                    </div>
                    <div class=\"profile__table_cell\">
                      <span class=\"profile__table_cell--mob\">
                        ";
                // line 77
                echo ($context["column_quantity"] ?? null);
                echo "
                      </span>
                      <span class=\"profile__table_cell--mob_span\">
                        ";
                // line 80
                echo twig_get_attribute($this->env, $this->source, $context["order"], "count_products", [], "any", false, false, false, 80);
                echo "
                      </span>
                    </div>
                    <div class=\"profile__table_cell profile__table_body_status ";
                // line 83
                if (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["order"], "status_id", [], "any", false, false, false, 83), ($context["cancelled_status"] ?? null))) {
                    echo "profile__table_body_status--canceled";
                } elseif (twig_in_filter(twig_get_attribute($this->env, $this->source, $context["order"], "status_id", [], "any", false, false, false, 83), ($context["success_status"] ?? null))) {
                    echo "profile__table_body_status--done";
                } else {
                    echo "profile__table_body_status--processing";
                }
                echo "\">
                      <span class=\"profile__table_cell--mob\">
                        ";
                // line 85
                echo ($context["column_status"] ?? null);
                echo "
                      </span>
                      <span class=\"profile__table_cell--mob_span\">
                        <span class=\"profile__table_body_dot\"></span>
                        ";
                // line 89
                echo twig_get_attribute($this->env, $this->source, $context["order"], "status", [], "any", false, false, false, 89);
                echo "
                      </span>
                    </div>
                    <div class=\"profile__table_cell\">
                      <a href=\"";
                // line 93
                echo twig_get_attribute($this->env, $this->source, $context["order"], "view", [], "any", false, false, false, 93);
                echo "\" class=\"profile__table_body_details\">
                        ";
                // line 94
                echo ($context["text_order_detail"] ?? null);
                echo "
                      </a>
                    </div>
                  </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 99
            echo "              </div>
            </div>
          </div>
          <div class=\"row\">
          <div class=\"col-sm-6 text-left\">
            ";
            // line 104
            echo ($context["pagination"] ?? null);
            echo "
          </div>
          </div>
          ";
        } else {
            // line 108
            echo "          <p>
            ";
            // line 109
            echo ($context["text_empty"] ?? null);
            echo "
          </p>
        ";
        }
        // line 112
        echo "          </div>

        </div>
      </div>
    </div>
  </section>
</main>
";
        // line 119
        echo ($context["footer"] ?? null);
        echo "
";
    }

    public function getTemplateName()
    {
        return "default/template/account/order_list.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  266 => 119,  257 => 112,  251 => 109,  248 => 108,  241 => 104,  234 => 99,  223 => 94,  219 => 93,  212 => 89,  205 => 85,  194 => 83,  188 => 80,  182 => 77,  174 => 72,  168 => 69,  160 => 64,  154 => 61,  146 => 56,  140 => 53,  135 => 50,  131 => 49,  122 => 43,  116 => 40,  110 => 37,  104 => 34,  98 => 31,  91 => 26,  89 => 25,  84 => 23,  78 => 20,  73 => 18,  67 => 14,  57 => 10,  53 => 9,  50 => 8,  46 => 7,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/account/order_list.twig", "");
    }
}
