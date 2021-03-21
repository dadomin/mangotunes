<?php

namespace Mango\Controller;

use Mango\DB;

class MainController extends MasterController {

	public function index()
	{	
		if(isset($_SESSION['user'])){
			$user = $_SESSION['user'];
        }else {
			$user = null;
		}

		$sql1 = "SELECT m.*, u.img FROM music_posting m join users u on m.writer = u.id ORDER BY m.views desc, m.is_like desc LIMIT 4";
		$sql2 = "SELECT m.*, u.img FROM music_posting m join users u on m.writer = u.id WHERE m.category = ? ORDER BY m.views desc, m.is_like desc LIMIT 4";

		$popular = DB::fetchAll($sql1, []);
		$happy = DB::fetchAll($sql2, ['happy']);
		$sad = DB::fetchAll($sql2, ['sad']);
		$stressed = DB::fetchAll($sql2, ['stressed']);
		$relaxed = DB::fetchAll($sql2, ['relaxed']);
		$mango = DB::fetchAll($sql2, ['mango']);

        $this->render("main", ["user" => $user, "popular" => $popular, "happy"=>$happy, "sad"=>$sad, "stressed"=>$stressed, "relaxed"=>$relaxed, "mango"=>$mango]);
	}
}