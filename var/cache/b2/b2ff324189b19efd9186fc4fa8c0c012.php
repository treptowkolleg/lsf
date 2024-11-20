<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* base.html.twig */
class __TwigTemplate_1c165058bf9c57a61173d11b056ea3e3 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!doctype html>
<html lang=\"de\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"/apple-touch-icon.png\">
    <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"/favicon-32x32.png\">
    <link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"/favicon-16x16.png\">
    <link rel=\"manifest\" href=\"/site.webmanifest\">
    <link rel=\"mask-icon\" href=\"/safari-pinned-tab.svg\" color=\"#5bbad5\">
    <meta name=\"msapplication-TileColor\" content=\"#2b5797\">
    <meta name=\"theme-color\" content=\"#ffffff\">
    <meta name=\"description\" content=\"LSF Stundenplan\">
    <title>LSF Light</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH\" crossorigin=\"anonymous\">
    <link href=\"//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css\" rel=\"stylesheet\">
    <style>
        body {
            margin-bottom: 5em;
        }

        .row-striped:nth-of-type(odd), .headline{
            background-color: #76B90010;
            border-left: 4px #76B900 solid;
        }

        .row-striped:nth-of-type(even), .title{
            background-color: #ffffff;
            border-left: 4px #efefef solid;
        }

        .text-htw{
            color: #76B900;
            fill: #76B900;
        }

        .row-striped {
            padding: 15px 0;
        }
    </style>
</head>
<body class=\"bg-light\">
";
        // line 44
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 45
        yield "<footer class=\"fixed-bottom title\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-12\">
                <div class=\"py-2\">&copy;2024 Benjamin Wagner</div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>";
        yield from [];
    }

    // line 44
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  105 => 44,  90 => 45,  88 => 44,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!doctype html>
<html lang=\"de\">
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1, shrink-to-fit=no\">
    <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"/apple-touch-icon.png\">
    <link rel=\"icon\" type=\"image/png\" sizes=\"32x32\" href=\"/favicon-32x32.png\">
    <link rel=\"icon\" type=\"image/png\" sizes=\"16x16\" href=\"/favicon-16x16.png\">
    <link rel=\"manifest\" href=\"/site.webmanifest\">
    <link rel=\"mask-icon\" href=\"/safari-pinned-tab.svg\" color=\"#5bbad5\">
    <meta name=\"msapplication-TileColor\" content=\"#2b5797\">
    <meta name=\"theme-color\" content=\"#ffffff\">
    <meta name=\"description\" content=\"LSF Stundenplan\">
    <title>LSF Light</title>
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css\" rel=\"stylesheet\" integrity=\"sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH\" crossorigin=\"anonymous\">
    <link href=\"//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css\" rel=\"stylesheet\">
    <style>
        body {
            margin-bottom: 5em;
        }

        .row-striped:nth-of-type(odd), .headline{
            background-color: #76B90010;
            border-left: 4px #76B900 solid;
        }

        .row-striped:nth-of-type(even), .title{
            background-color: #ffffff;
            border-left: 4px #efefef solid;
        }

        .text-htw{
            color: #76B900;
            fill: #76B900;
        }

        .row-striped {
            padding: 15px 0;
        }
    </style>
</head>
<body class=\"bg-light\">
{% block body %}{% endblock %}
<footer class=\"fixed-bottom title\">
    <div class=\"container\">
        <div class=\"row\">
            <div class=\"col-12\">
                <div class=\"py-2\">&copy;2024 Benjamin Wagner</div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>", "base.html.twig", "C:\\Users\\BenjaminWagner\\PhpstormProjects\\lsf\\templates\\base.html.twig");
    }
}
