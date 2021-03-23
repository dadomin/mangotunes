
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
            
            <?php


            if($n_page > 0) {
                $p_start = ($n_page -1) * $page_scale;
                $link = "<button class='brown-btn-rev'><a href='/list&feeling=".$feeling."&start=${p_start}'>";
                $link .= "Prev";
                $link .= "</a></button>";
                echo $link." ";
            }
            $is = $n_page*$page_scale;
            for($i=$is; $i < $is+$page_scale; $i++){
                
                    if($i < $total_page){
                    $link = "<button class='brown-btn-rev'><a href='/list&feeling=".$feeling."&start=${i}'>";
                    $link .= $i+1;
                    $link .= "</a></button>";
                    echo $link." ";
                }
            }

            if($n_page < $page){
                $link = "<button class='brown-btn-rev'><a href='/list&feeling=".$feeling."&start=${i}'>";
                $link .= "Next";
                $link .= "</a></button>";
                echo $link." ";
            }

            ?>
        </div>
    </div>
</section>