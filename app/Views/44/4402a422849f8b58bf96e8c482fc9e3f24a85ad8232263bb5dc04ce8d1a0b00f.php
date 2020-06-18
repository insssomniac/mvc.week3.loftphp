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

/* register.html */
class __TwigTemplate_9f6a69ed36b6fa4ec656c451fbbab208112e46f532ae8d24844a3055b3db62b9 extends \Twig\Template
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
    <link rel=\"stylesheet\" href=\"/css/normalize.css\">
    <link rel=\"stylesheet\" href=\"/css/main.css\">
    <title>Yet Another Interesting Blog | Register</title>
</head>

<body>
<div class=\"central-form\">
    <div class=\"central-form__container\">
            <div class=\"container\">
                <h2 class=\"inner-section__title\">";
        // line 15
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</h2>
                <form class=\"form\" action=\"/login/register\" method=\"post\">
                    <div class=\"form__row\">
                        <input type=\"text\" name=\"name\" placeholder=\"Имя пользователя\" class=\"form__input\">
                    </div>
                    <div class=\"form__row\">
                        <input type=\"text\" name=\"email\" placeholder=\"Email\" class=\"form__input\">
                    </div>
                    <div class=\"form__row\">
                        <input type=\"text\" name=\"password\" placeholder=\"Пароль\" class=\"form__input\">
                    </div>
                    <div class=\"form__row\">
                        <input type=\"text\" name=\"password_2\" placeholder=\"Подтвердите пароль\" class=\"form__input\">
                    </div>
                    <div class=\"form__btns\">
                        <button type=\"submit\" class=\"form__btn btn btn--regular btn--red\">Отправить</button>
                    </div>
                </form>
            </div>
    </div>
</div>
</body>
";
    }

    public function getTemplateName()
    {
        return "register.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 15,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "register.html", "C:\\OpenServer\\domains\\mvc.week3.loftphp\\app\\Views\\register.html");
    }
}
