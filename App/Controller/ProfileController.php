<?php

namespace Mango\Controller;

use Mango\DB;

class ProfileController extends MasterController {
    public function index()
    {
        $user = isset($_SESSION['user']) ? $_SESSION['user'] : null;

        if(!isset($_GET['id'])){
            if($user == null){
                DB::msgAndBack("로그인 후 이용해주시기 바랍니다.");
                exit;
            }else {
                $other = $user;
            }
        }else {
            $other = $_GET['id'];
            $chsql = "SELECT * FROM users WHERE id = ?";
            $check = DB::fetch($chsql, [$other]);
            if(!$check){
                DB::msgAndBack("해당 아이디가 존재하지 않습니다.");
                exit;
            }
            $other = $check;
        }
        
        $likeResult = null;     

        if($other->liked != null){
            $like = explode("/",$other->liked);
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
        if($other->saved != null){
            $save = explode("/",$other->saved);
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
        $posts = DB::fetchAll($posql, [$other->id]);
   
        


        $this->render("profile", ["user" => $user,"oter"=>$other, "like" => $like, "save" => $save, "posts"=>$posts,"likes"=>$likeResult,"saves"=>$saveResult]);
    }
}