
<div class="size">
    <section id="search">
        
    <h2>'<span><?= $word?></span>' 에 대한 검색결과</h2>


<?php if($list == null) :?>
    <h3>해당 검색결과가 존재하지 않습니다.</h3>
<?php else : ?>
    <div class="list-table">
        <table class="list-tbl">
            <tr>
                <th width="5%">NO</th>
                <th width="70%">TITLE</th>
                <th width="10%">DATE</th>
                <th widht="20%">WRITER</th>
            </tr>

            <?php 
                    $list = array_reverse($list);
                    $cnt = count($list);
                    foreach($list as $item) : 
                ?>
                <tr>
                    <td><p class="list-video-no"><?= $cnt ?></p></td>
                    <td class="list-video-title">
                        <div class="list-video-img">
                            <img src="http://img.youtube.com/vi/<?= $item->link_id ?>/mqdefault.jpg" onerror="this.src='/img/music_note.png'">
                        </div>
                        <a href="/view&idx=<?=$item->idx?>"><?=$item->title?><span class="list-comment">[<?= $item->comments?>]</span><br><span class="list-video-vl">조회수 <?= $item->views ?> | 좋아요 <?= $item->is_like ?></span> </a>
                        
                    </td>
                    <td>
                        <p><?= $item->day ?></p>
                    </td>
                    <td>
                    <div class="list-video-user"><div class="user-img"><img src="<?= $item->img ?>" alt=""></div> <a href="/user&id=<?= $item->writer?>"><?= $item->writer ?></a></div>
                    </td>
                </tr>
                <?php 
                    $cnt--;
                    endforeach; ?>
        </table>
    </div>
<?php endif; ?>

</section>
</div>