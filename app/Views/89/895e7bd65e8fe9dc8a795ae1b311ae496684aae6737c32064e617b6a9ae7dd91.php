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

/* blog.html */
class __TwigTemplate_ab280ad7aa5d10cce5b6adf4eca1133a3942af66b5a25b1a0cb0a98696b247cc extends \Twig\Template
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
        echo "<!DOCTYPE html>
<html lang=\"ru\">
<head>
    <meta charset=\"UTF-8\">
    <link href=\"https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700&display=swap\" rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"css/normalize.css\">
    <link rel=\"stylesheet\" href=\"css/main.css\">
    <title>Yet Another Interesting Blog | Welcome</title>
</head>

<body>
<div class=\"wrapper\">
    <section class=\"top-line\">
        <div class=\"container top-line__container\">
            <header class=\"header\">
                <div class=\"header__col--align--right text-grey\">
                    Вы вошли как <b>";
        // line 17
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "name", [], "any", false, false, false, 17), "html", null, true);
        echo "</b>&nbsp;&nbsp;::&nbsp;&nbsp;<a href=\"/logout\">Выйти</a>
                </div>
            </header>
            <div class=\"top-line__title\">
                <h1 class=\"main-title\">Yet Another Interesting Blog</h1>
            </div>
        </div>
    </section>

    <main class=\"main-content\">
        <div class=\"container\">
            <ul class=\"posts\">
                ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["posts"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 30
            echo "                <li class=\"posts__item\">
                    ";
            // line 31
            if (twig_get_attribute($this->env, $this->source, $context["post"], "getImage", [], "any", false, false, false, 31)) {
                // line 32
                echo "                    <div class=\"posts__picture-wrap\">
                        <img class=\"post_img\" src=\"/images/";
                // line 33
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "getImage", [], "any", false, false, false, 33), "html", null, true);
                echo "\">
                    </div>
                    ";
            }
            // line 36
            echo "                    <div class=\"posts__content\">
                        <h2 class=\"posts__title\">";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 37), "html", null, true);
            echo "</h2>
                        <div class=\"posts__author-date-container\">
                            ";
            // line 39
            $context["author"] = twig_get_attribute($this->env, $this->source, $context["post"], "getAuthor", [], "any", false, false, false, 39);
            // line 40
            echo "                            ";
            if (($context["author"] ?? null)) {
                // line 41
                echo "                            <div class=\"posts__author\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["author"] ?? null), "getName", [], "any", false, false, false, 41), "html", null, true);
                echo "</div>
                            ";
            } else {
                // line 43
                echo "                            <div class=\"posts__author\">Автор был удален за ненадобностью</div>
                            ";
            }
            // line 45
            echo "                            <div class=\"posts__date\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "createdAt", [], "any", false, false, false, 45), "html", null, true);
            echo "</div>
                        </div>

                        <div class=\"posts__text\">
                            <p>";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "text", [], "any", false, false, false, 49), "html", null, true);
            echo "</p>
                        </div>
                        ";
            // line 51
            if ((twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "isAdmin", [], "any", false, false, false, 51) == true)) {
                // line 52
                echo "                        <a href=\"/admin/deletePost/?id=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 52), "html", null, true);
                echo "\" class=\"btn btn--regular btn--white\">Удалить пост</a>
                        ";
            }
            // line 54
            echo "                    </div>
                </li>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 57
            echo "                    Постов пока нет
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "            </ul>
        </div>
        <section class=\"inner-section\">
            <div class=\"container\">
                <h2 class=\"inner-section__title\">Добавить пост</h2>
                <form class=\"form\" enctype=\"multipart/form-data\" action=\"/blog/createPost\" method=\"post\">
                    <div class=\"form__row\">
                        <input type=\"text\" name=\"title\" placeholder=\"Заголовок поста\" class=\"form__input\">
                    </div>
                    <div class=\"form__row\">
                        <textarea type=\"text\" class=\"form__input form__input--textarea\" value=\"\" name=\"text\" placeholder=\"Очень интересный текст ;)\"></textarea>
                    </div>
                    <div class=\"form__btns\">
                        <div class=\"file-upload\">
                            <input type=\"file\" name=\"image\" id=\"file\" class=\"input-file\">
                            <label for=\"file\" class=\"btn btn-tertiary labelFile\">
                                <span class=\"fileName\">Загрузить файл</span>
                            </label>
                        </div>
                        <button type=\"reset\" class=\"form__btn btn btn--regular btn--gray\">Очистить</button>
                        <button type=\"submit\" class=\"form__btn btn btn--regular btn--red\">Отправить</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "blog.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  147 => 59,  140 => 57,  133 => 54,  127 => 52,  125 => 51,  120 => 49,  112 => 45,  108 => 43,  102 => 41,  99 => 40,  97 => 39,  92 => 37,  89 => 36,  83 => 33,  80 => 32,  78 => 31,  75 => 30,  70 => 29,  55 => 17,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "blog.html", "C:\\OpenServer\\domains\\mvc.week3.loftphp\\app\\Views\\blog.html");
    }
}
