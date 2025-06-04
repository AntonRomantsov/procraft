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

/* default/template/extension/module/cart_popup/cart_popup_index.twig */
class __TwigTemplate_317f2707d4d0847051c996f319bac7488446c4e957c3bd7aee0730205a5170c0 extends \Twig\Template
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
        echo "<div id=\"cp-modal-body\">
  <script type=\"text/javascript\" src=\"catalog/view/javascript/cart_popup/cart_popup.js\"></script>
  <div class=\"modal-heading\">
    ";
        // line 4
        echo ($context["heading_title"] ?? null);
        echo "
    <span class=\"modal-close\" onclick=\"\$.magnificPopup.close();\"></span>
  </div>
  <div class=\"modal-body\" id=\"check-data\">
    <div id=\"cp-modal-data\">
      ";
        // line 9
        if (($context["products"] ?? null)) {
            // line 10
            echo "        ";
            if (($context["error_stock"] ?? null)) {
                // line 11
                echo "        <div class=\"alert alert-danger\">";
                echo ($context["error_stock"] ?? null);
                echo "
          <button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button>
        </div>
        ";
            }
            // line 15
            echo "
        <div class=\"product-table-cart\">
<!--           <div class=\"product-table-heading\">
            <div class=\"remove\">";
            // line 18
            echo ($context["column_remove"] ?? null);
            echo "</div>
            <div class=\"name\">";
            // line 19
            echo ($context["column_name"] ?? null);
            echo "</div>
            <div class=\"price\">";
            // line 20
            echo ($context["column_price"] ?? null);
            echo "</div>
            <div class=\"quantity\">";
            // line 21
            echo ($context["column_quantity"] ?? null);
            echo "</div>
            <div class=\"total\">";
            // line 22
            echo ($context["column_total"] ?? null);
            echo "</div>
          </div> -->
          <div class=\"product-table-body\" id=\"product-table-body\">
            ";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 26
                echo "              <div class=\"product-table-body-row\">
                <div class=\"remove\">
                  <input type=\"button\" onclick=\"update_cart(this, 'remove');\" title=\"";
                // line 28
                echo ($context["button_remove"] ?? null);
                echo "\" />
                  <input name=\"product_key\" value=\"";
                // line 29
                echo twig_get_attribute($this->env, $this->source, $context["product"], "key", [], "any", false, false, false, 29);
                echo "\" style=\"display: none;\" hidden />
                  <input name=\"product_id_q\" value=\"";
                // line 30
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 30);
                echo "\" style=\"display: none;\" hidden />
                </div>
                <div class=\"name\">
                  ";
                // line 33
                if (($context["hide_main_img"] ?? null)) {
                    // line 34
                    echo "                  <div class=\"name-left\">
                    ";
                    // line 35
                    if (twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 35)) {
                        // line 36
                        echo "                      <a href=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 36);
                        echo "\"><img src=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 36);
                        echo "\" alt=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 36);
                        echo "\" title=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 36);
                        echo "\" /></a>
                    ";
                    }
                    // line 38
                    echo "                  </div>
                  ";
                }
                // line 40
                echo "                  <div class=\"name-right";
                if ( !($context["hide_main_img"] ?? null)) {
                    echo " fix";
                }
                echo "\">
                    <a href=\"";
                // line 41
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 41);
                echo "\" title=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 41);
                echo "\" ";
                if ( !twig_get_attribute($this->env, $this->source, $context["product"], "stock", [], "any", false, false, false, 41)) {
                    echo "class=\"error-stock\"";
                }
                echo " >";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 41);
                echo "</a>
                    ";
                // line 42
                if ((twig_get_attribute($this->env, $this->source, $context["product"], "model", [], "any", false, false, false, 42) && ($context["hide_product_model"] ?? null))) {
                    echo "<div class=\"model\"><span>";
                    echo ($context["text_model"] ?? null);
                    echo "</span>";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "model", [], "any", false, false, false, 42);
                    echo "</div>";
                }
                // line 43
                echo "                    ";
                if ((twig_get_attribute($this->env, $this->source, $context["product"], "ean", [], "any", false, false, false, 43) && ($context["hide_product_ean"] ?? null))) {
                    echo "<div class=\"ean\"><span>";
                    echo ($context["text_ean"] ?? null);
                    echo "</span>";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "ean", [], "any", false, false, false, 43);
                    echo "</div>";
                }
                // line 44
                echo "                    ";
                if ((twig_get_attribute($this->env, $this->source, $context["product"], "jan", [], "any", false, false, false, 44) && ($context["hide_product_jan"] ?? null))) {
                    echo "<div class=\"jan\"><span>";
                    echo ($context["text_jan"] ?? null);
                    echo "</span>";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "jan", [], "any", false, false, false, 44);
                    echo "</div>";
                }
                // line 45
                echo "                    ";
                if ((twig_get_attribute($this->env, $this->source, $context["product"], "isbn", [], "any", false, false, false, 45) && ($context["hide_product_isbn"] ?? null))) {
                    echo "<div class=\"isbn\"><span>";
                    echo ($context["text_isbn"] ?? null);
                    echo "</span>";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "isbn", [], "any", false, false, false, 45);
                    echo "</div>";
                }
                // line 46
                echo "                    ";
                if ((twig_get_attribute($this->env, $this->source, $context["product"], "mpn", [], "any", false, false, false, 46) && ($context["hide_product_mpn"] ?? null))) {
                    echo "<div class=\"mpn\"><span>";
                    echo ($context["text_mpn"] ?? null);
                    echo "</span>";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "mpn", [], "any", false, false, false, 46);
                    echo "</div>";
                }
                // line 47
                echo "                    ";
                if ((twig_get_attribute($this->env, $this->source, $context["product"], "location", [], "any", false, false, false, 47) && ($context["hide_product_location"] ?? null))) {
                    echo "<div class=\"location\"><span>";
                    echo ($context["text_location"] ?? null);
                    echo "</span>";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "location", [], "any", false, false, false, 47);
                    echo "</div>";
                }
                // line 48
                echo "                    ";
                if ((twig_get_attribute($this->env, $this->source, $context["product"], "stock_text", [], "any", false, false, false, 48) && ($context["hide_product_stock"] ?? null))) {
                    echo "<div class=\"stock-text\"><span>";
                    echo ($context["text_availability"] ?? null);
                    echo "</span>";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "stock_text", [], "any", false, false, false, 48);
                    echo "</div>";
                }
                // line 49
                echo "                    ";
                if ((twig_get_attribute($this->env, $this->source, $context["product"], "reward", [], "any", false, false, false, 49) && ($context["hide_product_reward"] ?? null))) {
                    echo "<div class=\"reward\"><span>";
                    echo ($context["text_points"] ?? null);
                    echo "</span>";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "reward", [], "any", false, false, false, 49);
                    echo "</div>";
                }
                // line 50
                echo "                    ";
                if ((twig_get_attribute($this->env, $this->source, $context["product"], "option", [], "any", false, false, false, 50) && ($context["hide_product_option"] ?? null))) {
                    // line 51
                    echo "                      <div class=\"options\">
                        ";
                    // line 52
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, $context["product"], "option", [], "any", false, false, false, 52));
                    foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                        // line 53
                        echo "                        <span>";
                        echo twig_get_attribute($this->env, $this->source, $context["option"], "name", [], "any", false, false, false, 53);
                        echo ": ";
                        echo twig_get_attribute($this->env, $this->source, $context["option"], "value", [], "any", false, false, false, 53);
                        echo "</span><br />
                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['option'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 55
                    echo "                      </div>
                    ";
                }
                // line 57
                echo "                  </div>
                </div>
                <div class=\"price\">
                  ";
                // line 60
                if ( !twig_test_empty((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = $context["product"]) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["old_price"] ?? null) : null))) {
                    // line 61
                    echo "                <div class=\"product-checkout__new-price\">";
                    echo (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = $context["product"]) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["price"] ?? null) : null);
                    echo "</div>
                <div class=\"product-checkout__old-price\" style=\"text-decoration: line-through;\">";
                    // line 62
                    echo (($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = $context["product"]) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["old_price"] ?? null) : null);
                    echo "</div>
              ";
                } else {
                    // line 64
                    echo "                <div>";
                    echo (($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = $context["product"]) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["price"] ?? null) : null);
                    echo "</div>
              ";
                }
                // line 66
                echo "                  ";
                if ((twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 66) && ($context["hide_product_tax"] ?? null))) {
                    echo "<span>";
                    echo ($context["text_tax"] ?? null);
                    echo "<br/>";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "tax", [], "any", false, false, false, 66);
                    echo "</span>";
                }
                // line 67
                echo "                </div>
<!--                 <div class=\"quantity\">
                  <div class=\"inner\">
                    <div>
                      <input name=\"product_id_q\" value=\"";
                // line 71
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 71);
                echo "\" style=\"display: none;\" hidden />
                      <input name=\"product_id\" value=\"";
                // line 72
                echo twig_get_attribute($this->env, $this->source, $context["product"], "key", [], "any", false, false, false, 72);
                echo "\" style=\"display: none;\" hidden />
                      <button onclick=\"\$(this).next().val(~~\$(this).next().val()+1); update_cart(this, 'update');\" id=\"increase-quantity\">+</button>
                      <input
                        type=\"text\"
                        name=\"quantity\"
                        value=\"";
                // line 77
                echo twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 77);
                echo "\"
                        onchange=\"update_cart(this, 'update'); return validate_input(this);\"
                        onkeyup=\"update_cart(this, 'update'); return validate_input(this);\"
                        class=\"input-quantity\"
                      />
                      <button onclick=\"\$(this).prev().val(~~\$(this).prev().val()-1); update_cart(this, 'update');\" id=\"decrease-quantity\">&mdash;</button>
                    </div>
                  </div>
                </div> -->
                <div class=\"quantity\">
                  <div>
                    <input name=\"product_id_q\" value=\"";
                // line 88
                echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 88);
                echo "\" style=\"display: none;\" hidden />
                      <input name=\"product_id\" value=\"";
                // line 89
                echo twig_get_attribute($this->env, $this->source, $context["product"], "key", [], "any", false, false, false, 89);
                echo "\" style=\"display: none;\" hidden />
                    <button onclick=\"\$(this).next().val(~~\$(this).next().val()-1); update_cart(this, 'update');\" id=\"decrease-quantity\">&mdash;</button>
                    <input type=\"text\" name=\"quantity\" size=\"2\" value=\"";
                // line 91
                echo twig_get_attribute($this->env, $this->source, $context["product"], "quantity", [], "any", false, false, false, 91);
                echo "\" onchange=\"update_cart(this, 'update'); return validate_input(this);\" class=\"input-quantity\" onkeyup=\"update_cart(this, 'update'); return validate_input(this);\">
                    <button onclick=\"\$(this).prev().val(~~\$(this).prev().val()+1); update_cart(this, 'update');\" id=\"increase-quantity\">+</button>
                  </div>
                </div>
                <div class=\"total\">
                  <div>";
                // line 96
                echo twig_get_attribute($this->env, $this->source, $context["product"], "total", [], "any", false, false, false, 96);
                echo "</div>
                  ";
                // line 97
                if ((twig_get_attribute($this->env, $this->source, $context["product"], "tax_total", [], "any", false, false, false, 97) && ($context["hide_product_tax"] ?? null))) {
                    echo "<span>";
                    echo ($context["text_tax"] ?? null);
                    echo "<br/>";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "tax_total", [], "any", false, false, false, 97);
                    echo "</span>";
                }
                // line 98
                echo "                </div>
              </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 101
            echo "          </div>
        </div>

        ";
            // line 104
            if ((((($context["hide_coupon"] ?? null) || ($context["hide_voucher"] ?? null)) || ($context["hide_reward"] ?? null)) || ($context["hide_shipping"] ?? null))) {
                // line 105
                echo " 
        <div class=\"cart-gifts\">
          <div class=\"cp-gift-heading\">";
                // line 107
                echo ($context["text_help_heading"] ?? null);
                echo "</div>
          <div class=\"panel-group\" id=\"cp-gift-accordion\">
            ";
                // line 109
                if ((($context["hide_coupon"] ?? null) && ($context["coupon"] ?? null))) {
                    // line 110
                    echo "            <div>
              <div class=\"heading\"><a href=\"#cp-collapse-coupon\" class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#cp-gift-accordion\">";
                    // line 111
                    echo ($context["text_coupon_title"] ?? null);
                    echo " <i class=\"fa fa-caret-down\"></i></a></div>
              <div class=\"collapse\" id=\"cp-collapse-coupon\">
                <div class=\"section\">";
                    // line 113
                    echo ($context["coupon"] ?? null);
                    echo "</div>
              </div>
            </div>
            ";
                }
                // line 117
                echo "            ";
                if ((($context["hide_voucher"] ?? null) && ($context["voucher"] ?? null))) {
                    // line 118
                    echo "            <div>
              <div class=\"heading\"><a href=\"#cp-collapse-voucher\" class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#cp-gift-accordion\" >";
                    // line 119
                    echo ($context["text_voucher_title"] ?? null);
                    echo " <i class=\"fa fa-caret-down\"></i></a></div>
              <div class=\"collapse\" id=\"cp-collapse-voucher\">
                <div class=\"section\">";
                    // line 121
                    echo ($context["voucher"] ?? null);
                    echo "</div>
              </div>
            </div>
            ";
                }
                // line 125
                echo "            ";
                if ((($context["hide_reward"] ?? null) && ($context["reward"] ?? null))) {
                    // line 126
                    echo "            <div>
              <div class=\"heading\"><a href=\"#cp-collapse-reward\" class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#cp-gift-accordion\">";
                    // line 127
                    echo ($context["text_reward_title"] ?? null);
                    echo " <i class=\"fa fa-caret-down\"></i></a></div>
              <div class=\"collapse\" id=\"cp-collapse-reward\">
                <div class=\"section\">";
                    // line 129
                    echo ($context["reward"] ?? null);
                    echo "</div>
              </div>
            </div>
            ";
                }
                // line 133
                echo "            ";
                if ((($context["hide_shipping"] ?? null) && ($context["shipping"] ?? null))) {
                    // line 134
                    echo "            <div>
              <div class=\"heading\"><a href=\"#cp-collapse-shipping\" class=\"accordion-toggle\" data-toggle=\"collapse\" data-parent=\"#cp-gift-accordion\">";
                    // line 135
                    echo ($context["text_shipping_title"] ?? null);
                    echo " <i class=\"fa fa-caret-down\"></i></a></div>
              <div class=\"collapse\" id=\"cp-collapse-shipping\">
                <div class=\"section\">";
                    // line 137
                    echo ($context["shipping"] ?? null);
                    echo "</div>
              </div>
            </div>
            ";
                }
                // line 141
                echo "          </div>
        </div>
        ";
            }
            // line 144
            echo "
        <div class=\"totals\">
          <input type=\"button\" onclick=\"\$.magnificPopup.close();\" value=\"";
            // line 146
            echo ($context["button_go_back"] ?? null);
            echo "\" class=\"close-button-bottom\" />
          <div>";
            // line 147
            echo ($context["text_total_bottom"] ?? null);
            echo "</div>
          <div>
            <div id=\"total-order\">";
            // line 149
            echo ($context["total"] ?? null);
            if (($context["hide_cart_weight"] ?? null)) {
                echo ";";
            }
            echo "</div>
            ";
            // line 150
            if (($context["hide_cart_weight"] ?? null)) {
                // line 151
                echo "            <span>";
                echo ($context["text_cart_weight"] ?? null);
                echo "</span>
            <div id=\"weight-order\">";
                // line 152
                echo ($context["cart_weight"] ?? null);
                echo "</div>
            ";
            }
            // line 154
            echo "          </div>
        </div>
        <div id=\"save-cart-data\">
          <div>
            <input type=\"button\" onclick=\"\$('#save-cart-data-for-email').slideToggle();\"  value=\"";
            // line 158
            echo ($context["buttom_save_cart_to_email"] ?? null);
            echo "\" class=\"save-cart-data-button";
            if ( !($context["customer_status"] ?? null)) {
                echo " fix";
            }
            echo "\" />
            ";
            // line 159
            if (($context["customer_status"] ?? null)) {
                // line 160
                echo "              <input type=\"button\" onclick=\"saveCart('wishlist');\"  value=\"";
                echo ($context["buttom_save_cart_to_wishlist"] ?? null);
                echo "\" class=\"save-cart-data-button\" />
            ";
            }
            // line 162
            echo "            <div id=\"save-cart-data-for-email\">
              <input type=\"text\" name=\"save_cart_email\" value=\"";
            // line 163
            echo ($context["save_cart_email"] ?? null);
            echo "\" />
              <input type=\"button\" onclick=\"saveCart('email');\" value=\"";
            // line 164
            echo ($context["button_send_cart"] ?? null);
            echo "\" class=\"save-cart-data-for-email-button\" />
            </div>
          </div>
          <div id=\"save-cart-data-result-error\"></div>
          <div id=\"save-cart-data-result-success\"></div>
        </div>
       ";
        } else {
            // line 171
            echo "        <div id=\"cp-modal-data-empty\">";
            echo ($context["text_empty"] ?? null);
            echo "</div>
        ";
        }
        // line 173
        echo "    </div>

    ";
        // line 175
        if (((($context["check"] ?? null) && (($context["check"] ?? null) != 0)) && ($context["cross_sell_products"] ?? null))) {
            // line 176
            echo "    <div id=\"cp-ajax-products\">
      <div class=\"cp-ajax-products-arrow\">
        <button id=\"ajax-products-arrow-prev\">";
            // line 178
            echo ($context["button_carousel_prev"] ?? null);
            echo "</button>
        <input type=\"hidden\" name=\"ajax_pagination\" value=\"0\" style=\"display:none;\" />
        <input type=\"hidden\" name=\"ajax_all_products\" value=\"";
            // line 180
            echo ($context["ajax_all_products"] ?? null);
            echo "\" style=\"display:none;\" />
        <button id=\"ajax-products-arrow-next\">";
            // line 181
            echo ($context["button_carousel_next"] ?? null);
            echo "</button>
      </div>
      <div id=\"cp-ajax-products-list\">
        ";
            // line 184
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["cross_sell_products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                // line 185
                echo "          <div class=\"ajax-product\">
            ";
                // line 186
                if (($context["m_hide_sub_img"] ?? null)) {
                    // line 187
                    echo "            <div class=\"image\"><a href=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 187);
                    echo "\"><img src=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "thumb", [], "any", false, false, false, 187);
                    echo "\" alt=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 187);
                    echo "\" title=\"";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 187);
                    echo "\" /></a></div>
            ";
                }
                // line 189
                echo "            <div class=\"name\"><a href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 189);
                echo "\">";
                echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 189);
                echo "</a></div>
            ";
                // line 190
                if ((twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 190) && ($context["m_hide_product_price"] ?? null))) {
                    // line 191
                    echo "            <div class=\"price\">
              ";
                    // line 192
                    if ( !twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 192)) {
                        // line 193
                        echo "              <span class=\"price-new\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 193);
                        echo "</span>
              ";
                    } else {
                        // line 195
                        echo "              <span class=\"price-new\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "special", [], "any", false, false, false, 195);
                        echo "</span> <span class=\"price-old\">";
                        echo twig_get_attribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 195);
                        echo "</span>
              ";
                    }
                    // line 197
                    echo "            </div>
            ";
                }
                // line 199
                echo "            ";
                if (($context["m_hide_product_addto_cart_button"] ?? null)) {
                    // line 200
                    echo "            <div class=\"cart\"><a onclick=\"update_cart(";
                    echo twig_get_attribute($this->env, $this->source, $context["product"], "product_id", [], "any", false, false, false, 200);
                    echo ", 'add');\">";
                    echo ($context["button_cart"] ?? null);
                    echo "</a></div>
            ";
                }
                // line 202
                echo "          </div>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 204
            echo "      </div>
    </div>
    ";
        }
        // line 206
        echo " 
  </div>
  <!-- BUTTONS -->
  <div class=\"modal-footer\">
    <div class=\"precehceckoutinfo_popupcart\">
        <a href=\"ua/register/\">
        Для зареєстрованих користувачів діє <span>накопичувальна система знижок</span>  </a>
    </div>
    ";
        // line 214
        if (($context["products"] ?? null)) {
            // line 215
            echo "      ";
            if (($context["hide_save_cart_button"] ?? null)) {
                // line 216
                echo "      <input type=\"button\" onclick=\"\$('#save-cart-data').slideToggle();\" value=\"";
                echo ($context["button_save_cart"] ?? null);
                echo "\" class=\"save-button-bottom\" />
      ";
            }
            // line 218
            echo "      <input type=\"button\" onclick=\"location.href='";
            echo ($context["checkout_link"] ?? null);
            echo "';\" value=\"";
            echo ($context["button_go_to_checkout"] ?? null);
            echo "\" class=\"go-button-bottom\" />
    ";
        }
        // line 220
        echo "  </div>
<div class=\"row block_buttom_by_one\">
      <div class=\"col col-xs-12 col-sm-7 col-md-7 col-lg-7\">
        <div class=\"title_bl\">";
        // line 223
        echo ($context["text_title_bl"] ?? null);
        echo "</div>
        <div class=\"text_bl\">";
        // line 224
        echo ($context["text_text_bl"] ?? null);
        echo "</div>
      </div>
      <div class=\"col col-xs-12 col-sm-5 col-md-5 col-lg-5\">
        <div data-success=\"Успешно отправлено\" id=\"jfrom-2\">
          <form method=\"post\" enctype=\"multipart/form-data\" class=\"form-horizontal\">
            <input type=\"hidden\" name=\"jform_id\" value=\"11\">
            <input type=\"hidden\" name=\"current_url\" value=\"";
        // line 230
        echo ($context["current_url"] ?? null);
        echo "\">
            ";
        // line 231
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["product"]) {
            // line 232
            echo "            <input type=\"hidden\" name=\"products[";
            echo $context["key"];
            echo "]\" value=\"";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "href", [], "any", false, false, false, 232);
            echo "\">
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 234
        echo "            <div class=\"row tb_gut_xs_0\">
              <div class=\"col col-xs-12 input-effect\">
                <div class=\"form-group required\">
                  <input type=\"text\" class=\"effect-17 form-control\" name=\"field832\" id=\"field-832\" placeholder=\"Ваш телефон\" required>

                  <label class=\"control-label\" for=\"field-832\"> </label>
                </div>
              </div>
            </div>
            <div class=\"row tb_gut_xs_0\">
              <div class=\"col col-xs-12\">
                <div class=\"button-wrap\">
                  <a class=\"btn btn-primary one-click-bottom\" id=\"jfrom-submit-2\" onclick=\"oneClickForm();\">";
        // line 246
        echo ($context["by_one_click"] ?? null);
        echo "</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

  <script type=\"text/javascript\">
  function update_cart(target, status) {
    maskElement('#check-data', true);
    var input_val    = \$(target).parent().children('input[name=quantity]').val(),
        quantity     = parseInt(input_val),
        product_id   = \$(target).parent().children('input[name=product_id]').val(),
        product_id_q = \$(target).parent().children('input[name=product_id_q]').val(),
        product_key  = \$(target).next().val(),
        urls         = null;

    if (quantity == 0 || (isNaN(quantity)&&status=='update')) {
      quantity = \$(target).parent().children('input[name=quantity]').val(1);
      maskElement('#check-data', false);
      return;
    }

    if (status == 'update') {
      urls = 'index.php?route=extension/module/cart_popup&update=' + product_id + '&quantity=' + quantity;
    } else if (status == 'add') {
      urls = 'index.php?route=extension/module/cart_popup&add=' + target + '&quantity=1';
    } else {
      urls = 'index.php?route=extension/module/cart_popup&remove=' + product_key;
    }

    \$.ajax({
      url: urls,
      type: 'get',
      dataType: 'html',
      cache: false,
      success: function(data) {
        \$('#cp-modal-data').html(\$(data).find('#cp-modal-data').children());
        \$('#cp-ajax-products').html(\$(data).find('#cp-ajax-products > *'));
        maskElement('#check-data', false);
        cpInit();
        \$('[onclick=\"call_cp(\\'' +  parseInt(product_id_q) + '\\',\\'' + 'load' + '\\');\"]')
        //.html('<i class=\"fa fa-shopping-cart\"></i> <span class=\"hidden-xs hidden-sm hidden-md\">";
        // line 290
        echo ($context["button_cart"] ?? null);
        echo "</span>')
        .html('<i class=\"fa fa-shopping-cart\" style=\"color: #ed6e00;\"></i>')
        .attr('onclick', 'call_cp(\\'' + parseInt(product_id_q) + '\\',\\'' + 'add' + '\\');');

        \$('[onclick=\"call_cp(\\'' + parseInt(product_id_q) + '\\',\\'' + 'load_option' + '\\');\"]')
        .html('";
        // line 295
        echo ($context["button_cart"] ?? null);
        echo "')
        .attr('onclick', 'call_cp(\\'' + parseInt(product_id_q) + '\\',\\'' + 'add_option' + '\\');');

        \$('[onclick=\"call_cp(\\'' + parseInt(product_id_q) + '\\',\\'' + 'add_option' + '\\');\"]')
        .html('";
        // line 299
        echo ($context["button_cart"] ?? null);
        echo "')
        .attr('onclick', 'call_cp(\\'' + parseInt(product_id_q) + '\\',\\'' + 'add_option' + '\\');');
      }
    });
  }

  \$(document).on('click', '#ajax-products-arrow-prev', function() {
    maskElement('#cp-ajax-products-list > .ajax-product', true);
    \$(this).next().val(~~\$(this).next().val() - 3);
    ajaxProducts(this);
  });

  \$(document).on('click', '#ajax-products-arrow-next', function() {
    maskElement('#cp-ajax-products-list > .ajax-product', true);
    var count_div = \$('#cp-ajax-products-list > .ajax-product').length,
        current_part = parseInt(\$('#cp-ajax-products input[name=ajax_pagination]').val()),
        all_products = parseInt(\$('#cp-ajax-products input[name=ajax_all_products]').val());

    if (count_div < 3) {
      \$(this).css({ 'opacity': 0.5, 'cursor' : 'default' }).unbind('onclick');
      maskElement('#cp-ajax-products-list > .ajax-product', false);
      return;
    } else if (current_part+3 >= all_products) {
      \$(this).css({ 'opacity': 0.5, 'cursor' : 'default' }).unbind('onclick');
      maskElement('#cp-ajax-products-list > .ajax-product', false);
      return;
    } else {
      \$(this).prev().prev().val(~~\$(this).prev().prev().val() + 3);
    }

    ajaxProducts(this);
  });

  function ajaxProducts(target) {
    var input_val  = \$(target).parent().children('input[name=ajax_pagination]').val(),
        quantity   = parseInt(input_val),
        count_ajax_products = \$(target).parent().children('input[name=ajax_all_products]').val();

    \$('.cp-ajax-products-arrow button').css({ 'opacity': 1, 'cursor' : 'pointer' });

    if (quantity <= -3) {
      \$('#ajax-products-arrow-prev').css({ 'opacity': 0.5, 'cursor' : 'default' });
      quantity = \$(target).parent().children('input[name=ajax_pagination]').val(0);
      maskElement('#cp-ajax-products-list > .ajax-product', false);
      return;
    }

    if (quantity >= \$('#cp-ajax-products input[name=ajax_all_products]').val()) {
      \$('#ajax-products-arrow-next').css({ 'opacity': 0.5, 'cursor' : 'default' });
      quantity = \$(target).parent().children('input[name=ajax_pagination]').val(\$('#cp-ajax-products input[name=ajax_all_products]').val());
      maskElement('#cp-ajax-products-list > .ajax-product', false);
      return;
    }

    if (quantity > count_ajax_products) {
      \$.ajax({
        url:  'index.php?route=extension/module/cart_popup&start=0' + '&end=3',
        type: 'get',
        dataType: 'html',
        cache: false,
        success: function(data) {
          \$(target).parent().children('input[name=ajax_pagination]').val(0);
          \$('#cp-ajax-products-list').html(\$(data).find('#cp-ajax-products-list > *'));
        }
      });
    } else {
      \$.ajax({
        url:  'index.php?route=extension/module/cart_popup&start=' + quantity + '&end=3',
        type: 'get',
        dataType: 'html',
        cache: false,
        success: function(data) {
          \$('#cp-ajax-products-list').html(\$(data).find('#cp-ajax-products-list > *'));
        }
      });
    }
  }
  // loadmask function
  function maskElement(element, status) {
    if (status == true) {
      \$('<div/>')
      .attr('class', 'cp-modal-loadmask')
      .prependTo(element);
      \$('<div class=\"cp-modal-loadmask-loading\" />').insertAfter(\$('.cp-modal-loadmask'));
    } else {
      \$('.cp-modal-loadmask').remove();
      \$('.cp-modal-loadmask-loading').remove();
    }
  }

  function validate_input(input) {
    input.value = input.value.replace(/[^\\d,]/g, '');
  }

  function saveCart(type) {
    maskElement('#check-data', true);
    \$.ajax({
      type: 'post',
      url:  'index.php?route=extension/module/cart_popup/saveCart&type=' + type,
      data: \$('#save-cart-data input[type=\\'text\\']'),
      dataType: 'json',
      cache: false,
      success: function(json) {
        if (json['error']) {
          maskElement('#check-data', false);
          \$('#save-cart-data-result-error').fadeIn().html(json['error']).delay(2000).fadeOut();
        }
        if (json['success']) {
          maskElement('#check-data', false);
          \$('#save-cart-data-result-success').fadeIn().html(json['success']).delay(2000).fadeOut();
          \$('#wishlist-total').html(json['total']);
        }
      }
    });
  }

function oneClickForm(){
  var products = '';
  var prices = '';
  var models = '';
  var pictures = '';
            ";
        // line 420
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
            // line 421
            echo "            products += '";
            echo twig_get_attribute($this->env, $this->source, $context["product"], "name", [], "any", false, false, false, 421);
            echo "' + ' ^ ';
            prices += '";
            // line 422
            echo twig_get_attribute($this->env, $this->source, $context["product"], "price_int", [], "any", false, false, false, 422);
            echo "' + ' - ';
            models += '";
            // line 423
            echo twig_get_attribute($this->env, $this->source, $context["product"], "sku", [], "any", false, false, false, 423);
            echo "' + ' - ';
            pictures += '";
            // line 424
            echo twig_get_attribute($this->env, $this->source, $context["product"], "crm_image", [], "any", false, false, false, 424);
            echo "' + ' - ';
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 426
        echo "  var fields = [];
  fields[1] = \$('#field-832').val();
  fields[16] = products;  
  fields[17] = prices;
  fields[18] = models;
  fields[19] = pictures;        
  \$.ajax({
    url: 'index.php?route=page/form/add&page_form_id=1',
    type: 'post',
    data: {
        field: fields
    },
    dataType: 'json',
    beforeSend: function() {
      \$('#button-buildersubmit";
        // line 440
        echo ($context["module_row"] ?? null);
        echo "').button('loading');
    },
    complete: function() {
      \$('#button-buildersubmit";
        // line 443
        echo ($context["module_row"] ?? null);
        echo "').button('reset');
    },
    success: function(json) {
      // \$('#layoutform";
        // line 446
        echo ($context["module_row"] ?? null);
        echo " .alert, #layoutform";
        echo ($context["module_row"] ?? null);
        echo " .text-danger').remove();
      // \$('#layoutform";
        // line 447
        echo ($context["module_row"] ?? null);
        echo " .form-group').removeClass('has-error');

      if (json['error']) {
        if (json['error']['field']) {
          for (i in json['error']['field']) {
            var element = \$('#layoutform";
        // line 452
        echo ($context["module_row"] ?? null);
        echo " #input-field' + i.replace('_', '-'));
            if (element.parent().hasClass('input-group')) {
              element.parent().after('<div class=\"text-danger\">' + json['error']['field'][i] + '</div>');
            } else {
              element.after('<div class=\"text-danger\">' + json['error']['field'][i] + '</div>');
            }
            alert(json['error']['field'][i]);
          }
        }

        if(json['captcha']) {
          \$('#layoutform";
        // line 463
        echo ($context["module_row"] ?? null);
        echo " .layout-cicaptcha').html(json['captcha']);
        }

        if (json['error']['warning']) {
          \$('#layoutform";
        // line 467
        echo ($context["module_row"] ?? null);
        echo " .form-horizontal').prepend('<div class=\"alert alert-danger warning\"><i class=\"fa fa-exclamation-circle\"></i> ' + json['error']['warning'] + '<button type=\"button\" class=\"close\" data-dismiss=\"alert\">&times;</button></div>');

          \$('html, body').animate({ scrollTop: \$('#layoutform";
        // line 469
        echo ($context["module_row"] ?? null);
        echo " .form-horizontal').offset().top - 8 }, 'slow');
        }

        // Highlight any found errors
        \$('.text-danger').parent().addClass('has-error');
      }

      if (json['success']) {
        \$('#buildersuccess-modal";
        // line 477
        echo ($context["module_row"] ?? null);
        echo "').remove();

        \$('body').append('<div id=\"buildersuccess-modal";
        // line 479
        echo ($context["module_row"] ?? null);
        echo "\" class=\"modal fade\" role=\"dialog\"><div class=\"modal-dialog\"><div class=\"modal-content\"><div class=\"modal-header\"><button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button><h4 class=\"modal-title\">'+ json['success_title'] +'</h4></div><div class=\"modal-body\">'+ json['success_description'] +'</div></div></div></div>');

        \$('#buildersuccess-modal";
        // line 481
        echo ($context["module_row"] ?? null);
        echo "').modal('show');

        \$('#layoutform";
        // line 483
        echo ($context["module_row"] ?? null);
        echo " input[type=\\'text\\'], #layoutform";
        echo ($context["module_row"] ?? null);
        echo " input[type=\\'hidden\\'], #layoutform";
        echo ($context["module_row"] ?? null);
        echo " input[type=\\'password\\'],  #layoutform";
        echo ($context["module_row"] ?? null);
        echo " textarea').val('');

        \$('#layoutform";
        // line 485
        echo ($context["module_row"] ?? null);
        echo " input[type=\\'checkbox\\']:checked, #layoutform";
        echo ($context["module_row"] ?? null);
        echo " input[type=\\'radio\\']:checked').prop('checked', false);

        \$('#layoutform";
        // line 487
        echo ($context["module_row"] ?? null);
        echo " select').val('');
        \$('#cp-modal-body').hide();
      }
    },
    error: function(xhr, ajaxOptions, thrownError) {
        alert(thrownError + \"\\r\\n\" + xhr.statusText + \"\\r\\n\" + xhr.responseText);
    }
  });
}
  </script>
</div>


";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/cart_popup/cart_popup_index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1024 => 487,  1017 => 485,  1006 => 483,  1001 => 481,  996 => 479,  991 => 477,  980 => 469,  975 => 467,  968 => 463,  954 => 452,  946 => 447,  940 => 446,  934 => 443,  928 => 440,  912 => 426,  904 => 424,  900 => 423,  896 => 422,  891 => 421,  887 => 420,  763 => 299,  756 => 295,  748 => 290,  701 => 246,  687 => 234,  676 => 232,  672 => 231,  668 => 230,  659 => 224,  655 => 223,  650 => 220,  642 => 218,  636 => 216,  633 => 215,  631 => 214,  621 => 206,  616 => 204,  609 => 202,  601 => 200,  598 => 199,  594 => 197,  586 => 195,  580 => 193,  578 => 192,  575 => 191,  573 => 190,  566 => 189,  554 => 187,  552 => 186,  549 => 185,  545 => 184,  539 => 181,  535 => 180,  530 => 178,  526 => 176,  524 => 175,  520 => 173,  514 => 171,  504 => 164,  500 => 163,  497 => 162,  491 => 160,  489 => 159,  481 => 158,  475 => 154,  470 => 152,  465 => 151,  463 => 150,  456 => 149,  451 => 147,  447 => 146,  443 => 144,  438 => 141,  431 => 137,  426 => 135,  423 => 134,  420 => 133,  413 => 129,  408 => 127,  405 => 126,  402 => 125,  395 => 121,  390 => 119,  387 => 118,  384 => 117,  377 => 113,  372 => 111,  369 => 110,  367 => 109,  362 => 107,  358 => 105,  356 => 104,  351 => 101,  343 => 98,  335 => 97,  331 => 96,  323 => 91,  318 => 89,  314 => 88,  300 => 77,  292 => 72,  288 => 71,  282 => 67,  273 => 66,  267 => 64,  262 => 62,  257 => 61,  255 => 60,  250 => 57,  246 => 55,  235 => 53,  231 => 52,  228 => 51,  225 => 50,  216 => 49,  207 => 48,  198 => 47,  189 => 46,  180 => 45,  171 => 44,  162 => 43,  154 => 42,  142 => 41,  135 => 40,  131 => 38,  119 => 36,  117 => 35,  114 => 34,  112 => 33,  106 => 30,  102 => 29,  98 => 28,  94 => 26,  90 => 25,  84 => 22,  80 => 21,  76 => 20,  72 => 19,  68 => 18,  63 => 15,  55 => 11,  52 => 10,  50 => 9,  42 => 4,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/cart_popup/cart_popup_index.twig", "");
    }
}
