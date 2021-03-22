<!-- <nav id="main-nav">
    <ul>
        <li><a href="/list/happy"><img src="/img/happy.png" alt="happy"><span>HAPPY</span></a></li>
        <li><a href="/list/sad"><img src="/img/sad.png" alt="sad"><span>SAD</span></a></li>
        <li><a href="/list/stressed"><img src="/img/stressed.png" alt="stressed"><span>STRESSED</span></a></li>
        <li><a href="/list/relaxed"><img src="/img/relaxed.png" alt="relaxed"><span>RELAXED</span></a></li>
        <li><a href="/list/mango"><img src="/img/mango.png" alt="mango"><span>FEELING MANGO?</span></a></li>
    </ul>
</nav> -->

<?php

$start = null;
if(isset($_GET['start'])){
    $start = $_GET['start'];
}else {
    $start=0;
}

$scale = 10;
$page_scale = 5;

$total_page = ceil($total / $scale);
$page = floor($total_page / $page_scale);
$n_page = floor($start / $page_scale);

?>
<!-- list -->

<section id="list">
    <div class="list-title">
        <div class="size">
            <img src="/img/<?=$feeling?>.png" alt="feeling">
            <h1><?=strtoupper($feeling)?></h1>
        </div>
    </div>
    <div class="size">
        <!-- <div class="list-nav">
            <select name="" id="">
                <option value="">Recently</option>
                <option value="">Many views</option>
                <option value="">Popularity</option>
            </select>
            <div class="search-box">
                <input type="text">
                <a href="/"><i class="fas fa-search"></i></a>
            </div>
        </div> -->
        <div class="list-table">
            <select name="" id="">
                <option value="">Most Popular</option>
                <option value="">Oldest</option>
                <option value="">Newest</option>
            </select>
            <table class="list-tbl">
                <tr>
                    <th width="70%">Title</th>
                    <th width="10%">Date</th>
                    <th widht="20%">User</th>
                </tr>

                <?php 
                    $list = array_reverse($list);
                    $cnt = count($list);
                    $a = 1;
                    foreach($list as $item) : 
                    
                    $n = $scale*($start+1) - $total;
                    if($a > $scale*$start && $a < $scale*$start+11) :
                ?>
                <tr>
                    <td class="list-video-title" onclick="location.href='/view&idx=<?=$item->idx?>'">
                        <div class="list-video-img">
                            <img src="http://img.youtube.com/vi/<?= $item->link_id ?>/mqdefault.jpg" onerror="this.src='/img/music_note.png'">
                        </div>
                        <a href="/view&idx=<?=$item->idx?>"><?=$item->title?><span class="list-comment">[<?= $item->comments?>]</span><br><span class="list-video-vl">Views <?= $item->views ?> | Likes <?= $item->is_like ?></span> </a>
                        
                    </td>
                    <td>
                        <p><?= $item->day ?></p>
                    </td>
                    <td>
                    <div class="list-video-user"><div class="user-img"><img src="<?= $item->img ?>" alt=""></div> <span><?= $item->writer ?></span></div>
                    </td>
                </tr>
                <?php 
                    endif;
                    $a++;
                    $cnt--;
                    endforeach; ?>
                
            </table>
        </div>

        <div class="list-page-btns">
            <!-- <button class="brown-btn-rev"><a href="/">Prev</a></button>
            <button class="brown-btn-rev"><a href="/">Next</a></button> -->
            
            <?php


            if($n_page > 0) {
                $p_start = ($n_page -1) * $page_scale;
                $link = "<button class='brown-btn-rev'><a href='/list&feeling=".$feeling."&start=${p_start}'>";
                $link .= "Prev";
                $link .= "</a></button>";
                echo $link." ";
            }
            $is = $n_page*$page_scale;//단위블럭 페이지 시작번호 구하기 현재 페이지 번호를 이용하여 현재 단위블럭 페이지 번호를 구하고 그 값을 이용하여 단위블럭 페이지 출력수를 곱한 값
            for($i=$is; $i < $is+$page_scale; $i++){
                //i는 현재 단위블럭 페이지 번호*단위블럭 페이지 출력수 부터 시작하고 i는 단위블럭 페이지 출력수를 더한 값만큼만 반복하도록 지정
                    if($i < $total_page){//i가 총 페이지수 보다 작을 동안만 출력하기 위한조건
                    $link = "<button class='brown-btn-rev'><a href='/list&feeling=".$feeling."&start=${i}'>";
                    $link .= $i+1;//start값이 i로 지정됨으로 화면상 출력기준을 1부터 시작하는 10진수로 맞추기 위해 +1을 연산
                    $link .= "</a></button>";
                    echo $link." ";
                }
            }

            if($n_page < $page){//현재 단위블럭 페이지번호 보다 총 단위블럭 페이지 수가 작을 경우에만 다음 링크 출력
                $link = "<button class='brown-btn-rev'><a href='/list&feeling=".$feeling."&start=${i}'>";//i는 상단 for문에서 이미 마지막 페이지 start번호보다 +1한 값을 가지고 있기 때문에 i를 그냥 출력함
                $link .= "Next";
                $link .= "</a></button>";
                echo $link." ";
            }

            ?>
        </div>
    </div>
</section>