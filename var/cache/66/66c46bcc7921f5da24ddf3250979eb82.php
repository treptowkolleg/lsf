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

/* index.html.twig */
class __TwigTemplate_6ab7b7a7fd40aa40df34a51a41b04db8 extends Template
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

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("base.html.twig", "index.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 4
        yield "    <div class=\"container\">
        ";
        // line 5
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["events"] ?? null));
        foreach ($context['_seq'] as $context["name"] => $context["day"]) {
            // line 6
            yield "            <div class=\"schedule mt-5\">
                <div class=\"row headline\">
                    <h2 class=\"display-6 text-uppercase my-3\">";
            // line 8
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["name"], "html", null, true);
            yield "</h2>
                </div>
                ";
            // line 10
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["day"]);
            $context['_iterated'] = false;
            foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
                // line 11
                yield "                <div class=\"row row-striped\">
                    <div class=\"col-12\">
                        <h4 class=\"text-uppercase\"><strong>";
                // line 13
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "veranstaltung", [], "any", false, false, false, 13), "html", null, true);
                yield "</strong></h4>
                        <p>";
                // line 14
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "typ", [], "any", false, false, false, 14), "html", null, true);
                yield "</p>
                        <ul class=\"list-inline mb-1\">
                            <li class=\"list-inline-item\"><i class=\"text-htw fa fa-calendar-o\" aria-hidden=\"true\"></i> ";
                // line 16
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "tag", [], "any", false, false, false, 16), "html", null, true);
                yield "</li>
                            <li class=\"list-inline-item\"><i class=\"text-htw fa fa-clock-o\" aria-hidden=\"true\"></i> ";
                // line 17
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "beginn", [], "any", false, false, false, 17), "html", null, true);
                yield " - ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "ende", [], "any", false, false, false, 17), "html", null, true);
                yield " Uhr</li>
                            <li class=\"list-inline-item\"><i class=\"text-htw fa fa-location-arrow\" aria-hidden=\"true\"></i> ";
                // line 18
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "ort", [], "any", false, false, false, 18), "html", null, true);
                yield "</li>
                        </ul>
                    </div>
                </div>
                ";
                $context['_iterated'] = true;
            }
            if (!$context['_iterated']) {
                // line 23
                yield "                    <p>Keine Veranstaltungen gefunden!</p>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['event'], $context['_parent'], $context['_iterated']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 25
            yield "            </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['name'], $context['day'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        yield "    </div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "index.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  126 => 27,  119 => 25,  112 => 23,  102 => 18,  96 => 17,  92 => 16,  87 => 14,  83 => 13,  79 => 11,  74 => 10,  69 => 8,  65 => 6,  61 => 5,  58 => 4,  51 => 3,  40 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block body %}
    <div class=\"container\">
        {% for name, day in events %}
            <div class=\"schedule mt-5\">
                <div class=\"row headline\">
                    <h2 class=\"display-6 text-uppercase my-3\">{{ name }}</h2>
                </div>
                {% for event in day %}
                <div class=\"row row-striped\">
                    <div class=\"col-12\">
                        <h4 class=\"text-uppercase\"><strong>{{ event.veranstaltung }}</strong></h4>
                        <p>{{ event.typ }}</p>
                        <ul class=\"list-inline mb-1\">
                            <li class=\"list-inline-item\"><i class=\"text-htw fa fa-calendar-o\" aria-hidden=\"true\"></i> {{ event.tag }}</li>
                            <li class=\"list-inline-item\"><i class=\"text-htw fa fa-clock-o\" aria-hidden=\"true\"></i> {{ event.beginn }} - {{ event.ende }} Uhr</li>
                            <li class=\"list-inline-item\"><i class=\"text-htw fa fa-location-arrow\" aria-hidden=\"true\"></i> {{ event.ort }}</li>
                        </ul>
                    </div>
                </div>
                {% else %}
                    <p>Keine Veranstaltungen gefunden!</p>
            {% endfor %}
            </div>
        {% endfor %}
    </div>
{% endblock %}
", "index.html.twig", "C:\\Users\\BenjaminWagner\\PhpstormProjects\\lsf\\templates\\index.html.twig");
    }
}
