<?php

namespace Mango\Controller;

use Mango\DB;

class HomeController extends MasterController {
    public function index()
    {
        // 로그인 되어있는지 체크
        if(!isset($_SESSION['user'])){
            DB::msgAndBack("로그인 후 이용해주시기바랍니다."); 
            exit;
        }

        // 유저 세션 $user값에 담아주기
        $user = $_SESSION['user'];

        $this->render("home", ["user" => $user]);
    }
}