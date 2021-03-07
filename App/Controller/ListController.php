<?php

namespace Mango\Controller;

use Mango\DB;

class ListController extends MasterController {
    public function index($feeling)
    {
        $this->render("list", ["feeling" => $feeling]);
    }

    public function happy()
    {
        $this->index("happy");
    }

    public function sad()
    {
        $this->index("sad");
    }

    public function stressed()
    {
        $this->index("stressed");
    }

    public function relaxed()
    {
        $this->index("relaxed");
    }

    public function mango()
    {
        $this->index("mango");
    }
}