<?php

namespace Mango\Controller;

use Mango\DB;

class PostController extends MasterController {

    public function list()
    {
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
        }else {
            $user=null;
        }
        $feeling = $_GET['feeling'];
        
        $sql = "SELECT m.*, u.img FROM music_posting m join users u on m.writer = u.id  WHERE m.category = ?";
        $list = DB::fetchAll($sql, [$feeling]);
        $this->render("list", ["feeling" => $feeling, "user" => $user, "list" => $list]);
    }

    public function view()
    {
        
        if(isset($_SESSION['user'])){
            $user = $_SESSION['user'];
        }else {
            $user = null;
        }

        $idx = $_GET['idx'];
        
        $hit = "UPDATE music_posting set views = views+1 where idx = ?";
        $connect = DB::query($hit, [$idx]);
        if(!$connect){
            DB::msgAndBack("해당 글이 존재하지 않습니다.");
            exit;
        }
        $sql = "SELECT m.*, u.img FROM music_posting m join users u on m.writer = u.id  WHERE m.idx = ?";
        $result = DB::fetch($sql, [$idx]);
        if(!$result) {
            DB::msgAndBack("해당 글이 존재하지 않습니다.");
            exit;
        }

        $comment = "SELECT c.*, u.img, u.id FROM music_comments c join users u on c.user_idx = u.idx where c.post_idx = ?";
        $comments = DB::fetchAll($comment, [$idx]);
        
        $this->render("view", ["user"=>$user, "result" => $result, "comments"=>$comments]);
    }

    public function write()
    {
        if(!isset($_SESSION['user'])){
            DB::msgAndBack("로그인 후 이용해주시기 바랍니다.");
            exit;
        }

        $user = $_SESSION['user'];
        $this->render("write", ["user" => $user]);
    }

    public function writecheck()
    { 
        if(!isset($_SESSION['user'])){
            DB::msgAndBack("로그인 후 이용해주시기 바랍니다.");
            exit;
        }

        $user = $_SESSION['user'];

        $title = trim($_POST['title']);
        $category = $_POST['category'];
        $link = trim($_POST['link']);
        $contents = trim($_POST['contents']);
        $day = new \DateTime('now', new \DateTimeZone('Asia/Seoul'));
        $date = $day->format('Y-m-d H:i:s');
        $writer = $user->id;

        // null 값 체크
        if($title == "" || $category == "" || $link == "" || $contents == "") {
            DB::msgAndBack("제목, 카테고리, 유투브 링크, 컨텐츠 내용 값은 비울수 없습니다.");
            exit;
        }

        // 유투브 링크 아이디 값 추출하기
        $regExp = '/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/';
        preg_match($regExp, $link, $matches);
        if($matches == null) {
            DB::msgAndBack("유투브 링크 값 오류");
            exit;
        }
        $link_id = $matches[7];

        // db에 넣기
        $ussql = "UPDATE users SET posts = posts+1 WHERE id = ?";
        $usok = DB::query($ussql, [$user->id]);

        $sql = "INSERT INTO music_posting(`title`, `category`, `link_id`, `contents`, `day`, `writer`) VALUES(?,?,?,?,?,?)";
        $cnt = DB::query($sql, [$title, $category, $link_id, $contents, $date, $writer]);
        
        if(!$cnt || !$usok) {
            DB::msgAndBack("글 추가하기 실패");
            exit;
        }

        $sql3 = "SELECT * FROM `users` WHERE `id` = ? AND `pw` = ?";
        $user2 = DB::fetch($sql3, [$user->id, $user->pw]);
        $_SESSION['user'] = $user2;
        
        DB::msgAndGo("글 추가 성공","/list&feeling={$category}");
    }

    public function like() {
        if(!isset($_SESSION['user'])){
            DB::msgAndBack("로그인 후 이용해주시기 바랍니다.");
            exit;
        }
        $user = $_SESSION['user'];
        $idx = $_GET['idx'];
        
        $checksql = "SELECT * FROM music_posting WHERE idx = ?";
        $check = DB::fetch($checksql, [$idx]);
        if(!$check) {
            DB::msgAndBack("해당 게시물 존재하지 않음");
            exit;
        }

        $liked = $user->liked;
        $liked = $idx."/".$liked;
        $usersql = "UPDATE users SET liked = ? WHERE id = ?";
        $userok = DB::query($usersql,[$liked, $user->id]);
        $postsql = "UPDATE music_posting SET is_like = is_like+1 WHERE idx = ?";
        $postok = DB::query($postsql,[$idx]);
        if(!$userok || !$postok){
            DB::msgAndBack("오류 발생");
            exit;
        }
       $_SESSION['user']->liked = $liked;
        DB::msgAndGo("좋아요를 누르셨습니다.", "/view&idx=$idx");
    }

    public function unlike() {
        if(!isset($_SESSION['user'])){
            DB::msgAndBack("로그인 후 이용해주시기 바랍니다.");
            exit;
        }
        $user = $_SESSION['user'];
        $idx = $_GET['idx'];

        $checksql = "SELECT * FROM music_posting WHERE idx = ?";
        $check = DB::fetch($checksql, [$idx]);
        if(!$check) {
            DB::msgAndBack("해당 게시물 존재하지 않음");
            exit;
        }

        $liked = $user->liked;
        $replace = str_replace($idx, "", $liked);
        $result = explode("/",$replace);
        $result = array_diff($result, array(''));
        $str = implode("/", $result);

        $usersql = "UPDATE users SET liked = ? WHERE id = ?";
        $userok = DB::query($usersql,[$str, $user->id]);
        $postsql = "UPDATE music_posting SET is_like = is_like-1 WHERE idx = ?";
        $postok = DB::query($postsql,[$idx]);
        if(!$userok || !$postok){
            DB::msgAndBack("오류 발생");
            exit;
        }
        $_SESSION['user']->liked = $str;

        DB::msgAndGo("좋아요를 취소하셨습니다.", "/view&idx=$idx");

        
    }

    public function comment()
    {
        if(!isset($_SESSION['user'])){
            DB::msgAndBack("로그인 후 이용해주시기 바랍니다.");
            exit;
        }
        $user = $_SESSION['user'];
        
        $idx = $_POST['idx'];
        $contents = trim($_POST['contents']);
        $day = new \DateTime();
        $date = $day->format('Y-m-d H:i:s');

        // 공백 체크
        if($contents == "") {
            DB::msgAndBack("댓글창이 비워져있습니다.");
            exit;
        }

        $sql = "INSERT INTO music_comments(`post_idx`, `contents`, `user_idx`,`day`) VALUES(?,?,?,?)";
        $result = DB::query($sql, [$idx, $contents, $user->idx, $date]);
        $postsql = "UPDATE music_posting SET comments = comments+1 WHERE idx = ?";
        $postok = DB::query($postsql, [$idx]);

        if(!$result || !$postok) {
            DB::msgAndBack("댓글쓰기 오류");
            exit;
        }
        DB::msgAndGo("댓글 쓰기 완료", "/view&idx=$idx");
    }

    public function save()
    {
        if(!isset($_SESSION['user'])){
            DB::msgAndBack("로그인 후 이용해주시기 바랍니다.");
            exit;
        }
        $user = $_SESSION['user'];
        
        $idx = $_GET['idx'];

        
        $checksql = "SELECT * FROM music_posting WHERE idx = ?";
        $check = DB::fetch($checksql, [$idx]);
        if(!$check) {
            DB::msgAndBack("해당 게시물 존재하지 않음");
            exit;
        }

        $saved = $user->saved;
        $saved = $idx."/".$saved;
        $usersql = "UPDATE users SET saved = ? WHERE id = ?";
        $userok = DB::query($usersql,[$saved, $user->id]);
        $postsql = "UPDATE music_posting SET is_save = is_save+1 WHERE idx = ?";
        $postok = DB::query($postsql,[$idx]);
        if(!$userok || !$postok){
            DB::msgAndBack("오류 발생");
            exit;
        }
       $_SESSION['user']->saved = $saved;
        DB::msgAndGo("저장하셨습니다.", "/view&idx=$idx");
        
    }

    public function unsave() {
        if(!isset($_SESSION['user'])){
            DB::msgAndBack("로그인 후 이용해주시기 바랍니다.");
            exit;
        }
        $user = $_SESSION['user'];
        $idx = $_GET['idx'];

        $checksql = "SELECT * FROM music_posting WHERE idx = ?";
        $check = DB::fetch($checksql, [$idx]);
        if(!$check) {
            DB::msgAndBack("해당 게시물 존재하지 않음");
            exit;
        }

        $saved = $user->saved;
        $replace = str_replace($idx, "", $saved);
        $result = explode("/",$replace);
        $result = array_diff($result, array(''));
        $str = implode("/", $result);

        $usersql = "UPDATE users SET saved = ? WHERE id = ?";
        $userok = DB::query($usersql,[$str, $user->id]);
        $postsql = "UPDATE music_posting SET is_save = is_save-1 WHERE idx = ?";
        $postok = DB::query($postsql,[$idx]);
        if(!$userok || !$postok){
            DB::msgAndBack("오류 발생");
            exit;
        }
        $_SESSION['user']->saved = $str;

        DB::msgAndGo("저장을 취소하셨습니다.", "/view&idx=$idx");

        
    }

    public function search() {
        if(!isset($_SESSION['user'])){$user = null;}else {$user = $_SESSION['user'];}
        
        $word =  $_GET['word'];
        $sql = "SELECT m.*, u.img FROM music_posting m join users u on m.writer = u.id  WHERE m.title like '%$word%' or m.contents like '%$word%' ";
        $list = DB::fetchAll($sql, []);
        if(!$list) {
            $list = null;
        }
        $this->render("search", ["user"=>$user, "list" => $list, "word" => $word]);
    }

}