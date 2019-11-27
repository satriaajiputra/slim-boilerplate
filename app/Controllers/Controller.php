<?php

namespace App\Controllers;

use Psr\Container\ContainerInterface;

class Controller
{
    protected $c, $view, $db;

    public function __construct(ContainerInterface $container) {
        $this->c = $container;
        $this->db = $this->c->get('db');
        $this->view = $this->c->get('view');
    }
}
