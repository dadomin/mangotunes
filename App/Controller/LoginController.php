<?php

namespace Mango\Controller;

use Mango\DB;

class LoginController extends MasterController {

    public function register()
    {
        $this->render("register", []);
    }
    
    public function regicheck()
    {   
        // 로그인 되어있는지 체크
        if(isset($_SESSION['user'])){
            DB::msgAndBack("로그아웃 후 이용해주시기 바랍니다.");
            exit;
        }
        
        $id = trim($_POST['id']);
        $name = trim($_POST['name']);
        $pass = trim($_POST['pass']);
        $cpass = trim($_POST['cpass']);
        $birth = trim($_POST['birth']);
        $sex = trim($_POST['sex']);
        $file = $_FILES['file'];

        // 비어있는지 체크
        if($id == "" || $name == "" || $pass == "" || $cpass == "" || $birth== "" || $sex == "" || $file == "") {
            DB::msgAndBack("필수입력란이 비어져있습니다. 모든 항목이 필수 입력란입니다.");
            exit;
        }

        // 아이디 공백체크
        $id = preg_replace("/\s| /",'',$id);

        // 회원가입된 회원있는지 체크
        $sql1 = "SELECT COUNT(*) AS cnt FROM `sns_user`";
        $cnt1 = DB::fetch($sql1, [])->cnt;
        
        // 회원이 있을경우 아이디&닉네임 겹치는지 체크
        if($cnt1 != 0) {
            $sql2 = "SELECT * FROM `sns_user`";
            $cnt2 = DB::fetchAll($sql2, []);
            foreach($cnt2 as $i){
                if($i->id == $id) {
                    DB::msgAndBack("해당 아이디가 이미 등록되어있습니다.");
                    exit;
                }

                if($i->nick == $name) {
                    DB::msgAndBack("해당 이름이 이미 등록되어있습니다.");
                    exit;
                }
            }
        }

        // 비밀번호 & 비밀번호 확인란 값 비교
        if($pass != $cpass) {
            DB::msgAndBack("비밀번호와 비밀번호 확인란의 값이 다릅니다.");
            exit;
        }
        //이미지 파일인지 체크
        if(explode("/", $file['type'])[0] != "image") {
            DB::msgAndBack("이미지 파일만 업로드 가능합니다.");
            exit;
        }

        //파일 옮기기
        $tmp = $file['tmp_name'];
        $path = './upload/' . time() . "_" . $file['name'];
        move_uploaded_file($tmp, $path);
        
        $sql3 = "INSERT INTO `sns_user`(`id`,`nick`,`pass`,`birth`,`sex`, `img`) VALUES (?, ?, PASSWORD(?), ?, ?, ?)";
        $cnt3 = DB::query($sql3, [$id, $name, $pass, $birth, $sex, $path]);
        if(!$cnt3){
            DB::msgAndBack("회원가입 실패");
            exit;
        }

        DB::msgAndGo("회원가입 성공", "/");

    }
    
    public function logcheck()
    {
        // 로그인 되어있는지 체크
        if(isset($_SESSION['user'])){
            DB::msgAndBack("로그아웃 후 이용해주시기 바랍니다.");
            exit;
        }

        $id = $_POST['id'];
        $pass = $_POST['pass'];

        // 해당란이 비워져있는지 체크
        if($id == "" || $pass == "") {
            DB::msgAndBack("필수입력란이 비워져 있습니다.");
            exit;
        }

        $sql = "SELECT * FROM `sns_user` WHERE `id` = ? AND `pass` = PASSWORD(?)";
        $user = DB::fetch($sql, [$id, $pass]);

        if(!$user) {
            DB::msgAndBack("로그인 실패");
            exit;
        }

        $_SESSION['user'] = $user;
        DB::msgAndGo("{$user->nick}님 로그인되었습니다.", "/");
    }

    public function login()
    {
        $this->render("login", []);
    }

    public function logout() 
    {
        unset($_SESSION['user']);
        DB::msgAndGo("로그아웃 되었습니다.", "/");
    }

}