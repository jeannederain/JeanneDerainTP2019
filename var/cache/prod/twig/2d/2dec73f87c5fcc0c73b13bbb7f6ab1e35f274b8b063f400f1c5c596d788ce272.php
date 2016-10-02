<?php

/* AppBundle:Subject:index.html.twig */
class __TwigTemplate_381d08d3508879678dc940f3262ecbccb495a255c00d2246959c34cb00a95183 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "AppBundle:Subject:index.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo "Sujets";
    }

    // line 5
    public function block_body($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["subjects"]) ? $context["subjects"] : null));
        foreach ($context['_seq'] as $context["_key"] => $context["subject"]) {
            // line 7
            echo "        <article class=\"card card-block\">
            <h3 class=\"card-title\">";
            // line 8
            echo twig_escape_filter($this->env, $this->getAttribute($context["subject"], "title", array()), "html", null, true);
            echo "</h3>
            <section class=\"card-text\">";
            // line 9
            echo twig_escape_filter($this->env, $this->getAttribute($context["subject"], "description", array()), "html", null, true);
            echo "</section>
            <span class=\"card-text\">
                <small class=\"text-muted\">
                    ";
            // line 12
            echo twig_escape_filter($this->env, twig_localized_date_filter($this->env, $this->getAttribute($context["subject"], "updatedAt", array())), "html", null, true);
            echo "
                </small>
            </span>
        </article>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['subject'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "AppBundle:Subject:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  56 => 12,  50 => 9,  46 => 8,  43 => 7,  38 => 6,  35 => 5,  29 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block title 'Sujets' %}*/
/* */
/* {% block body %}*/
/*     {% for subject in subjects %}*/
/*         <article class="card card-block">*/
/*             <h3 class="card-title">{{ subject.title }}</h3>*/
/*             <section class="card-text">{{ subject.description }}</section>*/
/*             <span class="card-text">*/
/*                 <small class="text-muted">*/
/*                     {{ subject.updatedAt|localizeddate }}*/
/*                 </small>*/
/*             </span>*/
/*         </article>*/
/*     {% endfor %}*/
/* {% endblock %}*/
