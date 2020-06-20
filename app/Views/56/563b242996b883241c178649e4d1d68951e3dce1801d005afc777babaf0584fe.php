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

/* auth.html */
class __TwigTemplate_8ad15208a4bb7caa32db06b6cfe33002d04b94d1ae088b91501a9d28c4fbb522 extends \Twig\Template
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
    <title>Yet Another Interesting Blog | Auth</title>
</head>

<body>
<div class=\"central-form\">
    <div class=\"central-form__container\">
        <div class=\"container\">
            <h2 class=\"inner-section__title\">";
        // line 15
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</h2>
            <form class=\"form\" action=\"/login/auth\" method=\"post\">
                <div class=\"form__row\">
                    <input type=\"text\" name=\"email\" placeholder=\"Email\" class=\"form__input\">
                </div>
                <div class=\"form__row\">
                    <input type=\"text\" name=\"password\" placeholder=\"Пароль\" class=\"form__input\">
                </div>
                <div class=\"form__btns\">
                    <button type=\"submit\" class=\"form__btn btn btn--regular btn--red\">Войти</button>
                </div>
            </form>
        </div>
    </div>
</div>
</body>";
    }

    public function getTemplateName()
    {
        return "auth.html";
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
        return new Source("", "auth.html", "C:\\OpenServer\\domains\\mvc.week3.loftphp\\app\\Views\\auth.html");
    }
}
