<?php

namespace Mango\Controller;

use Mango\DB;

class MainController extends MasterController {

	public function index()
	{	
		// 로그인 되어있는지 체크
        // if(isset($_SESSION['user'])){
        //     DB::msgAndBack("로그아웃 후 이용해주시기 바랍니다.");
        //     exit;
		// }
		if(isset($_SESSION['user'])){
			$user = $_SESSION['user'];
        }else {
			$user = null;
		}

        $this->render("main", ["user" => $user]);
	}
}