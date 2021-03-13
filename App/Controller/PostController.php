<?php

namespace Mango\Controller;

use Mango\DB;

class PostController extends MasterController {
    public function index()
    {
        $this->render("post", []);
    }
}