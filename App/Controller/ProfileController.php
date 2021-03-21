<?php

namespace Mango\Controller;

use Mango\DB;

class ProfileController extends MasterController {
    public function index()
    {
        $user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

        if($user == null){
            DB::msgAndBack("로그인 후 이용해주시기 바랍니다.");
            exit;
        }
        
        $sql3 = "SELECT * FROM `users` WHERE `id` = ? AND `pw` = ?";
        $user2 = DB::fetch($sql3, [$user->id, $user->pw]);
        $_SESSION['user'] = $user2;
        
        $likeResult = null;     

        if($user->liked != null){
            $like = explode("/",$user->liked);
            $like = array_diff($like, array(''));
            $cnt1 = 0;
            foreach($like as $i) {
                $sql = "SELECT m.*, u.img FROM music_posting m JOIN users u ON m.writer = u.id WHERE m.idx = ?";
                $result = DB::fetch($sql, [$i]);
                $likeResult[$cnt1] = $result;
                $cnt1++;
            }
            $like = count($like);
        }else {
            $like = 0;
        }


        
        $saveResult = null;   
        if($user->saved != null){
            $save = explode("/",$user->saved);
            $save = array_diff($save, array(''));
         
            $cnt2 = 0;
            foreach($save as $i) {
                $sql = "SELECT m.*, u.img FROM music_posting m JOIN users u ON m.writer = u.id WHERE m.idx = ?";
                $result = DB::fetch($sql, [$i]);
                $saveResult[$cnt2] = $result;
                $cnt2++;
            }
            
            $save = count($save);
        }else {
            $save = 0;
        }
        $posql = "SELECT m.*, u.img FROM music_posting m JOIN users u ON m.writer = u.id WHERE m.writer = ?";
        $posts = DB::fetchAll($posql, [$user->id]);
   
        


        $this->render("profile", ["user" => $user, "like" => $like, "save" => $save, "posts"=>$posts,"likes"=>$likeResult,"saves"=>$saveResult]);
    }
}