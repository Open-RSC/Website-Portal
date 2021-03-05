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

/* pagination.html */
class __TwigTemplate_2c72e260bc249209e8c1ba8fde998d88d585632ae7df934a48551e7959450f6b extends \Twig\Template
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
        echo "<ul>
";
        // line 2
        if ((($context["BASE_URL"] ?? null) && (($context["TOTAL_PAGES"] ?? null) > 6))) {
            // line 3
            echo "\t<li class=\"dropdown-container dropdown-button-control dropdown-page-jump page-jump\">
\t\t<a class=\"button button-icon-only dropdown-trigger\" href=\"#\" title=\"";
            // line 4
            echo $this->extensions['phpbb\template\twig\extension']->lang("JUMP_TO_PAGE_CLICK");
            echo "\" role=\"button\"><i class=\"icon fa-level-down fa-rotate-270\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
            echo ($context["PAGE_NUMBER"] ?? null);
            echo "</span></a>
\t\t<div class=\"dropdown\">
\t\t\t<div class=\"pointer\"><div class=\"pointer-inner\"></div></div>
\t\t\t<ul class=\"dropdown-contents\">
\t\t\t\t<li>";
            // line 8
            echo $this->extensions['phpbb\template\twig\extension']->lang("JUMP_TO_PAGE");
            echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
            echo "</li>
\t\t\t\t<li class=\"page-jump-form\">
\t\t\t\t\t<input type=\"number\" name=\"page-number\" min=\"1\" max=\"999999\" title=\"";
            // line 10
            echo $this->extensions['phpbb\template\twig\extension']->lang("JUMP_PAGE");
            echo "\" class=\"inputbox tiny\" data-per-page=\"";
            echo ($context["PER_PAGE"] ?? null);
            echo "\" data-base-url=\"";
            echo twig_escape_filter($this->env, ($context["BASE_URL"] ?? null), "html_attr");
            echo "\" data-start-name=\"";
            echo ($context["START_NAME"] ?? null);
            echo "\" />
\t\t\t\t\t<input class=\"button2\" value=\"";
            // line 11
            echo $this->extensions['phpbb\template\twig\extension']->lang("GO");
            echo "\" type=\"button\" />
\t\t\t\t</li>
\t\t\t</ul>
\t\t</div>
\t</li>
";
        }
        // line 17
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "pagination", [], "any", false, false, false, 17));
        foreach ($context['_seq'] as $context["_key"] => $context["pagination"]) {
            // line 18
            echo "\t";
            if (twig_get_attribute($this->env, $this->source, $context["pagination"], "S_IS_PREV", [], "any", false, false, false, 18)) {
                // line 19
                echo "\t\t<li class=\"arrow previous\"><a class=\"button button-icon-only\" href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["pagination"], "PAGE_URL", [], "any", false, false, false, 19);
                echo "\" rel=\"prev\" role=\"button\"><i class=\"icon fa-chevron-";
                echo ($context["S_CONTENT_FLOW_BEGIN"] ?? null);
                echo " fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("PREVIOUS");
                echo "</span></a></li>
\t";
            } elseif (twig_get_attribute($this->env, $this->source,             // line 20
$context["pagination"], "S_IS_CURRENT", [], "any", false, false, false, 20)) {
                // line 21
                echo "\t<li class=\"active\"><span>";
                echo twig_get_attribute($this->env, $this->source, $context["pagination"], "PAGE_NUMBER", [], "any", false, false, false, 21);
                echo "</span></li>
\t";
            } elseif (twig_get_attribute($this->env, $this->source,             // line 22
$context["pagination"], "S_IS_ELLIPSIS", [], "any", false, false, false, 22)) {
                // line 23
                echo "\t<li class=\"ellipsis\" role=\"separator\"><span>";
                echo $this->extensions['phpbb\template\twig\extension']->lang("ELLIPSIS");
                echo "</span></li>
\t";
            } elseif (twig_get_attribute($this->env, $this->source,             // line 24
$context["pagination"], "S_IS_NEXT", [], "any", false, false, false, 24)) {
                // line 25
                echo "\t\t<li class=\"arrow next\"><a class=\"button button-icon-only\" href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["pagination"], "PAGE_URL", [], "any", false, false, false, 25);
                echo "\" rel=\"next\" role=\"button\"><i class=\"icon fa-chevron-";
                echo ($context["S_CONTENT_FLOW_END"] ?? null);
                echo " fa-fw\" aria-hidden=\"true\"></i><span class=\"sr-only\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("NEXT");
                echo "</span></a></li>
\t";
            } else {
                // line 27
                echo "\t\t<li><a class=\"button\" href=\"";
                echo twig_get_attribute($this->env, $this->source, $context["pagination"], "PAGE_URL", [], "any", false, false, false, 27);
                echo "\" role=\"button\">";
                echo twig_get_attribute($this->env, $this->source, $context["pagination"], "PAGE_NUMBER", [], "any", false, false, false, 27);
                echo "</a></li>
\t";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pagination'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 30
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "pagination.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  133 => 30,  121 => 27,  111 => 25,  109 => 24,  104 => 23,  102 => 22,  97 => 21,  95 => 20,  86 => 19,  83 => 18,  79 => 17,  70 => 11,  60 => 10,  54 => 8,  45 => 4,  42 => 3,  40 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "pagination.html", "");
    }
}
