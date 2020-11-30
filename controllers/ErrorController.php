<?php

namespace controllers;


class ErrorController extends Controller
{
    public function actionNotFound()
    {
        $this->useLayout = false;
        echo "Страница не найдена";
        //$this->render('not_found');
        $this->redirect('HTTP/1.0 404 Not Found');
    }


    public function redirect(string $url)
    {
        header("Location: {$url}");
        exit;
    }
}