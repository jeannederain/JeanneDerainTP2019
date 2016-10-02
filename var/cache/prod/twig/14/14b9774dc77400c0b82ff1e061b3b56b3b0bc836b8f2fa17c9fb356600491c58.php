<?php

/* base.html.twig */
class __TwigTemplate_7a02ca4256179f921526a869c28670d4ed1cc7ded6f86f5402f4d1409e419459 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
        <link rel=\"stylesheet\" type=\"text/css\" href=\"//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css\" />
    </head>
    <body>
        <section class=\"container\">
            <h1>WSF - TP Symfony P2019</h1>
            <main>
                <h2>";
        // line 14
        $this->displayBlock("title", $context, $blocks);
        echo "</h2>
                <section>
                    ";
        // line 16
        $this->displayBlock('body', $context, $blocks);
        // line 17
        echo "                </section>
            </main>
        </section>
        ";
        // line 20
        $this->displayBlock('javascripts', $context, $blocks);
        // line 21
        echo "    </body>
</html>
";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "WSF";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 16
    public function block_body($context, array $blocks = array())
    {
    }

    // line 20
    public function block_javascripts($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 20,  77 => 16,  72 => 6,  66 => 5,  60 => 21,  58 => 20,  53 => 17,  51 => 16,  46 => 14,  35 => 7,  33 => 6,  29 => 5,  23 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}WSF{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*         <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.2/css/bootstrap.min.css" />*/
/*     </head>*/
/*     <body>*/
/*         <section class="container">*/
/*             <h1>WSF - TP Symfony P2019</h1>*/
/*             <main>*/
/*                 <h2>{{ block('title') }}</h2>*/
/*                 <section>*/
/*                     {% block body %}{% endblock %}*/
/*                 </section>*/
/*             </main>*/
/*         </section>*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
