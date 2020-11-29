<?php
namespace interfaces;

interface RenderInterface
{
    function render($template, $params = []);
}