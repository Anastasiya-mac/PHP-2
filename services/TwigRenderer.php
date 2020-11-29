<?php


namespace services;

use interfaces\RenderInterface;

class TwigRenderer implements RenderInterface
{
    protected $renderer;

    /**
     * TwigRenderer constructor.
     */
    public function __construct()
    {
        $loader = new \Twig\Loader\FilesystemLoader(VIEWS_DIR . 'twig');
        $this->renderer = new \Twig\Environment($loader, []);
    }

    public function render($template, $params = [])
    {
        $template .= ".twig";
        return $this->renderer->render($template, $params);
    }}