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

/* default/template/extension/module/account.twig */
class __TwigTemplate_75caba2a8fd435071f3a4a52dbb356a056dce820440b14cbdefd03e8c06f306b extends \Twig\Template
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
        echo "<aside class=\"profile__aside\">
              <div class=\"profile__aside_info\">
                <div class=\"profile__aside_info_photo\">
                  <img src=\"image/profile/info_photo.png\" alt=\"Photo\" />
                </div>
                <h3 class=\"profile__aside_info_name\">";
        // line 6
        echo ($context["user_name"] ?? null);
        echo "</h3>
              </div>
              <ul class=\"profile__aside_list\">
                <li class=\"profile__aside_list_item\">
                  <a href=\"";
        // line 10
        echo ($context["edit"] ?? null);
        echo "\" class=\"profile__aside_list_link ";
        if ((($context["route"] ?? null) == "account/simpleedit")) {
            echo "profile__aside_list_link--active";
        }
        echo "\">
                    <svg class=\"profile__aside_list_icon\" viewBox=\"0 0 16 21\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                      <path
                        d=\"M3.66669 20.1667C3.66669 16.1166 6.94993 12.8334 11 12.8334C15.0501 12.8334 18.3334 16.1166 18.3334 20.1667H3.66669ZM11 11.9167C7.96127 11.9167 5.50002 9.4555 5.50002 6.41675C5.50002 3.378 7.96127 0.916748 11 0.916748C14.0388 0.916748 16.5 3.378 16.5 6.41675C16.5 9.4555 14.0388 11.9167 11 11.9167Z\"
                      />
                    </svg>
                    <p>";
        // line 16
        echo ($context["text_edit"] ?? null);
        echo "</p>
                  </a>
                </li>
                <li class=\"profile__aside_list_item\">
                  <a href=\"";
        // line 20
        echo ($context["address"] ?? null);
        echo "\" class=\"profile__aside_list_link ";
        if ((($context["route"] ?? null) == "account/address")) {
            echo "profile__aside_list_link--active";
        }
        echo "\">
                    <svg class=\"profile__aside_list_icon\" viewBox=\"0 0 22 22\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                      <path
                        d=\"M16.8337 15.9169L11 21.7505L5.16637 15.9169C1.94454 12.695 1.94454 7.47145 5.16637 4.24962C8.3882 1.0278 13.6118 1.0278 16.8337 4.24962C20.0555 7.47145 20.0555 12.695 16.8337 15.9169ZM11 11.9166C12.0126 11.9166 12.8333 11.0958 12.8333 10.0833C12.8333 9.07073 12.0126 8.24992 11 8.24992C9.98745 8.24992 9.16667 9.07073 9.16667 10.0833C9.16667 11.0958 9.98745 11.9166 11 11.9166Z\"
                      />
                    </svg>
                    <p>";
        // line 26
        echo ($context["text_address"] ?? null);
        echo "</p>
                  </a>
                </li>
                <li class=\"profile__aside_list_item\">
                  <a href=\"";
        // line 30
        echo ($context["order"] ?? null);
        echo "\" class=\"profile__aside_list_link ";
        if (((($context["route"] ?? null) == "account/order") || (($context["route"] ?? null) == "account/order/info"))) {
            echo "profile__aside_list_link--active";
        }
        echo "\">
                    <svg class=\"profile__aside_list_icon\" viewBox=\"0 0 22 22\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                      <path
                        d=\"M18.3333 20.1666H3.66667C3.16041 20.1666 2.75 19.7562 2.75 19.2499V2.74992C2.75 2.24366 3.16041 1.83325 3.66667 1.83325H18.3333C18.8396 1.83325 19.25 2.24366 19.25 2.74992V19.2499C19.25 19.7562 18.8396 20.1666 18.3333 20.1666ZM7.33333 6.41659V8.24992H14.6667V6.41659H7.33333ZM7.33333 10.0833V11.9166H14.6667V10.0833H7.33333ZM7.33333 13.7499V15.5833H11.9167V13.7499H7.33333Z\"
                      />
                    </svg>
                    <p>";
        // line 36
        echo ($context["text_order"] ?? null);
        echo "</p>
                  </a>
                </li>
                <li class=\"profile__aside_list_item\">
                  <a href=\"";
        // line 40
        echo ($context["instrument"] ?? null);
        echo "\" class=\"profile__aside_list_link ";
        if ((($context["route"] ?? null) == "account/instrument")) {
            echo "profile__aside_list_link--active";
        }
        echo "\">
                    <svg class=\"profile__aside_list_icon\" viewBox=\"0 0 22 22\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                      <path
                        d=\"M4.88531 2.99887C6.01564 2.59702 7.32627 2.84845 8.231 3.75317C9.13598 4.65815 9.38731 5.96927 8.98496 7.09982L18.926 17.0409L16.9814 18.9855L7.03941 9.04475C5.90908 9.44663 4.59845 9.19518 3.69373 8.29044C2.78875 7.38546 2.53743 6.07435 2.93976 4.94379L4.99009 6.99408C5.52706 7.53105 6.39766 7.53105 6.93463 6.99408C7.4716 6.45711 7.4716 5.58651 6.93463 5.04954L4.88531 2.99887ZM14.3887 4.72544L17.3056 3.105L18.6019 4.40136L16.9814 7.31817L15.3609 7.64226L13.4164 9.58678L12.1201 8.29044L14.0646 6.3459L14.3887 4.72544ZM7.90691 11.8554L9.85142 13.8L5.31418 18.3373C4.77721 18.8743 3.9066 18.8743 3.36964 18.3373C2.86425 17.8318 2.83453 17.0309 3.28045 16.4908L3.36964 16.3927L7.90691 11.8554Z\"
                      />
                    </svg>
                    <p>";
        // line 46
        echo ($context["text_instrument"] ?? null);
        echo "</p>
                  </a>
                </li>
                <li class=\"profile__aside_list_item\">
                  <a href=\"";
        // line 50
        echo ($context["wishlist"] ?? null);
        echo "\" class=\"profile__aside_list_link ";
        if ((($context["route"] ?? null) == "account/wishlist")) {
            echo "profile__aside_list_link--active";
        }
        echo "\">
                    <svg class=\"profile__aside_list_icon\" viewBox=\"0 0 22 22\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                      <path
                        fill-rule=\"evenodd\"
                        clip-rule=\"evenodd\"
                        d=\"M2.45953 4.54588C3.39434 3.6705 4.66206 3.17874 5.98389 3.17874C7.30572 3.17874 8.57343 3.6705 9.50825 4.54588L10.9688 5.91286L12.4294 4.54588C12.8893 4.09991 13.4393 3.74418 14.0475 3.49946C14.6557 3.25474 15.3098 3.12593 15.9717 3.12054C16.6336 3.11515 17.29 3.23329 17.9027 3.46808C18.5153 3.70286 19.0719 4.04958 19.5399 4.48801C20.008 4.92643 20.3781 5.44778 20.6288 6.02164C20.8794 6.5955 21.0056 7.21037 20.9998 7.83037C20.9941 8.45038 20.8565 9.0631 20.5953 9.63279C20.334 10.2025 19.9543 10.7177 19.4782 11.1485L10.9688 19.1204L2.45953 11.1485C1.52499 10.2728 1 9.08534 1 7.84718C1 6.60901 1.52499 5.42153 2.45953 4.54588Z\"
                      />
                    </svg>
                    <p>";
        // line 58
        echo ($context["text_wishlist"] ?? null);
        echo "</p>
                  </a>
                </li>
                <li class=\"profile__aside_list_item\">
                  <a href=\"";
        // line 62
        echo ($context["password"] ?? null);
        echo "\" class=\"profile__aside_list_link  ";
        if ((($context["route"] ?? null) == "account/password")) {
            echo "profile__aside_list_link--active";
        }
        echo "\">
                    <svg class=\"profile__aside_list_icon\" viewBox=\"0 0 22 22\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                      <path
                        d=\"M9.12449 2.02634C10.3469 1.77044 11.624 1.76237 12.8745 2.02382C13.0367 3.08674 13.6627 4.06897 14.6664 4.6484C15.6699 5.22783 16.8336 5.27889 17.8352 4.8879C18.687 5.84021 19.3185 6.95015 19.708 8.13677C18.8697 8.80874 18.333 9.84129 18.333 10.9992C18.333 12.1579 18.8704 13.191 19.7095 13.8629C19.5158 14.4499 19.2595 15.0261 18.9382 15.5826C18.6169 16.1391 18.2461 16.6491 17.8346 17.1104C16.8331 16.7196 15.6698 16.7708 14.6664 17.3501C13.6635 17.929 13.0377 18.9102 12.8748 19.9722C11.6525 20.228 10.3755 20.2361 9.12487 19.9747C8.96267 18.9118 8.33661 17.9295 7.33301 17.3501C6.32941 16.7707 5.16575 16.7196 4.16414 17.1106C3.31242 16.1583 2.68092 15.0483 2.29131 13.8617C3.12959 13.1898 3.66635 12.1572 3.66635 10.9992C3.66635 9.84065 3.12896 8.80754 2.28986 8.1356C2.48353 7.54854 2.73984 6.97239 3.06111 6.41592C3.38239 5.85945 3.7532 5.3494 4.16477 4.88815C5.16625 5.27887 6.32962 5.22771 7.33301 4.6484C8.33581 4.06943 8.96168 3.0883 9.12449 2.02634ZM10.9997 13.7492C12.5184 13.7492 13.7497 12.5181 13.7497 10.9992C13.7497 9.48049 12.5184 8.24925 10.9997 8.24925C9.48088 8.24925 8.24967 9.48049 8.24967 10.9992C8.24967 12.5181 9.48088 13.7492 10.9997 13.7492Z\"
                      />
                    </svg>
                    <p>";
        // line 68
        echo ($context["text_password"] ?? null);
        echo "</p>
                  </a>
                </li>
                <li class=\"profile__aside_list_item\">
                  <a href=\"#profile-logout\" data-fancybox data-touch=\"false\" class=\"profile__aside_list_link\">
                    <svg class=\"profile__aside_list_icon\" viewBox=\"0 0 22 22\" fill=\"none\" xmlns=\"http://www.w3.org/2000/svg\">
                      <path
                        d=\"M1.83154 19.2502V17.4168L3.66488 17.4166V4.43182C3.66488 3.98881 3.98169 3.60919 4.41756 3.52994L13.0998 1.95135C13.3986 1.89701 13.685 2.09523 13.7394 2.39409C13.7452 2.42655 13.7482 2.45949 13.7482 2.49248V3.66664L17.4148 3.66679C17.9211 3.66679 18.3315 4.0772 18.3315 4.58346V17.4166L20.1648 17.4168V19.2502H16.4982V5.50012L13.7482 5.49997V19.2502H1.83154ZM10.9982 10.0835H9.16488V11.9168H10.9982V10.0835Z\"
                      />
                    </svg>
                    <p>";
        // line 78
        echo ($context["text_logout"] ?? null);
        echo "</p>
                  </a>
                </li>
              </ul>
            </aside>
            <div class=\"profile_login active fancybox-hidden\" id=\"profile-logout\" style=\"display: none;\">
              <div class=\"profile_login__content\">
                ";
        // line 88
        echo "                <h2 class=\"profile_login__title profile_login__title--logout_mod\">";
        echo ($context["text_logout"] ?? null);
        echo "</h2>
                <p class=\"profile_login__description\">
                  ";
        // line 90
        echo ($context["text_message"] ?? null);
        echo "
                </p>
                <div class=\"profile_login__body profile_login__body--center_mod\">
                  <a href=\"index.php?route=account/logout\" class=\"button profile_login__button profile_login__button--fit_mod\" id=\"logout\">
                    <p>";
        // line 94
        echo ($context["text_logout"] ?? null);
        echo "</p>
                    </a>
                </div>
              </div>
            </div>
          <script>
          ";
        // line 107
        echo "
          let scroll = document.querySelector('.profile__aside_list');
          let element = scroll.querySelector('.profile__aside_list_link--active');
          element.scrollIntoView();
          
          </script>

";
    }

    public function getTemplateName()
    {
        return "default/template/extension/module/account.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  211 => 107,  202 => 94,  195 => 90,  189 => 88,  179 => 78,  166 => 68,  153 => 62,  146 => 58,  131 => 50,  124 => 46,  111 => 40,  104 => 36,  91 => 30,  84 => 26,  71 => 20,  64 => 16,  51 => 10,  44 => 6,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "default/template/extension/module/account.twig", "");
    }
}
