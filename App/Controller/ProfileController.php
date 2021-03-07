<?php

namespace Damin\Controller;

use Damin\DB;

class ProfileController extends MasterController {
    public function index()
    {
        $user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

        if($user == null){
            DB::msgAndBack("로그인 후 이용해주시기 바랍니다.");
            exit;
        }

        $this->render("profile", ["user" => $user]);
    }
}