<?php

namespace App\Controller;

class AddController extends AbstractController
{
    public function index()
    {
        return $this->twig->render('Home/add.html.twig');
    }
}
