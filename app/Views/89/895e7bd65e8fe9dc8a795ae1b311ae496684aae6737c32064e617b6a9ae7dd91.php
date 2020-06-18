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
    <title>Блог</title>
</head>

<body>
<div class=\"wrapper\">
    <section class=\"top-line\">
        <div class=\"container top-line__container\">
            <header class=\"header\">
                <h1 class=\"main-title top-line__title\">Yet Another Interesting Blog</h1>
            </header>
        </div>
    </section>

    <main class=\"main-content\">
        <div class=\"container\">
            <ul class=\"posts\">
                ";
        // line 24
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["posts"] ?? null));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["post"]) {
            // line 25
            echo "                <li class=\"posts__item\">
                    ";
            // line 26
            if (twig_get_attribute($this->env, $this->source, $context["post"], "getImage", [], "any", false, false, false, 26)) {
                // line 27
                echo "                    <div class=\"posts__picture-wrap\">
                        <img class=\"post_img\" src=\"/images/";
                // line 28
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "getImage", [], "any", false, false, false, 28), "html", null, true);
                echo "\">
                    </div>
                    ";
            }
            // line 31
            echo "                    <div class=\"posts__content\">
                        <h2 class=\"posts__title\">";
            // line 32
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "title", [], "any", false, false, false, 32), "html", null, true);
            echo "</h2>
                        <div class=\"posts__author-date-container\">
                            ";
            // line 34
            $context["author"] = twig_get_attribute($this->env, $this->source, $context["post"], "getAuthor", [], "any", false, false, false, 34);
            // line 35
            echo "                            ";
            if (($context["author"] ?? null)) {
                // line 36
                echo "                            <div class=\"posts__author\">";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["author"] ?? null), "getName", [], "any", false, false, false, 36), "html", null, true);
                echo "</div>
                            ";
            } else {
                // line 38
                echo "                            <div class=\"posts__author\">Автор был удален за ненадобностью</div>
                            ";
            }
            // line 40
            echo "                            <div class=\"posts__date\">";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "createdAt", [], "any", false, false, false, 40), "html", null, true);
            echo "</div>
                        </div>

                        <div class=\"posts__text\">
                            <p>";
            // line 44
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "text", [], "any", false, false, false, 44), "html", null, true);
            echo "</p>
                        </div>
                        ";
            // line 46
            if ((twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "isAdmin", [], "any", false, false, false, 46) == true)) {
                // line 47
                echo "                        <a href=\"/admin/deletePost/?id=";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["post"], "id", [], "any", false, false, false, 47), "html", null, true);
                echo "\" class=\"btn btn--regular btn--white\">Удалить пост</a>
                        ";
            }
            // line 49
            echo "                    </div>
                </li>
                ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 52
            echo "                    Постов пока нет
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['post'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
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
        return array (  139 => 54,  132 => 52,  125 => 49,  119 => 47,  117 => 46,  112 => 44,  104 => 40,  100 => 38,  94 => 36,  91 => 35,  89 => 34,  84 => 32,  81 => 31,  75 => 28,  72 => 27,  70 => 26,  67 => 25,  62 => 24,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "blog.html", "C:\\OpenServer\\domains\\mvc.week3.loftphp\\app\\Views\\blog.html");
    }
}
