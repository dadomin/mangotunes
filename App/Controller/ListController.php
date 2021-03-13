<?php

namespace Mango\Controller;

use Mango\DB;

class ListController extends MasterController {
    public function index()
    {
        $feeling = $_GET['feeling'];
        $this->render("list", ["feeling" => $feeling]);
    }
}