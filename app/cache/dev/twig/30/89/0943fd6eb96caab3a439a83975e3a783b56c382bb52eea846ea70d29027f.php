<?php

/* MovieBattleGetMoviesBundle:Default:index.html.twig */
class __TwigTemplate_30890943fd6eb96caab3a439a83975e3a783b56c382bb52eea846ea70d29027f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<ol>
    ";
        // line 2
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["name"]) ? $context["name"] : $this->getContext($context, "name")));
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 3
            echo "        <li>";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["user"], "movie", array()), "title", array()), "html", null, true);
            echo "</li>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['user'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 5
        echo "</ol>
";
    }

    public function getTemplateName()
    {
        return "MovieBattleGetMoviesBundle:Default:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 5,  26 => 3,  22 => 2,  19 => 1,);
    }
}
