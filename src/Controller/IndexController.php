<?php

namespace App\Controller;

use App\Model\IndexModel;

class IndexController extends AbstractController
{
    public $connection;

    public function browse()
    {
        $connection = new IndexModel();
        $results = $connection->selectAll('entreprise');
        return $results;
    }

    public function read(string $tag)
    {
        $connection = new IndexModel();
        $results = $connection->selectByTag($tag);
        return $results;
    }

    public function index()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $results = $this->browse();
            return $this->twig->render('Home/index.html.twig', ['results' => $results]);
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $results = $this->read($_POST['search']);
            return $this->twig->render('Home/index.html.twig', ['results' => $results]);
        }
    }
}
