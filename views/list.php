<!-- <nav id="main-nav">
    <ul>
        <li><a href="/list/happy"><img src="/img/happy.png" alt="happy"><span>HAPPY</span></a></li>
        <li><a href="/list/sad"><img src="/img/sad.png" alt="sad"><span>SAD</span></a></li>
        <li><a href="/list/stressed"><img src="/img/stressed.png" alt="stressed"><span>STRESSED</span></a></li>
        <li><a href="/list/relaxed"><img src="/img/relaxed.png" alt="relaxed"><span>RELAXED</span></a></li>
        <li><a href="/list/mango"><img src="/img/mango.png" alt="mango"><span>FEELING MANGO?</span></a></li>
    </ul>
</nav> -->

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
                    <div class="list-video-user"><div class="user-img"><img src="<?= $item->img ?>" alt=""></div> <a href="/user"><?= $item->writer ?></a></div>
                    </td>
                </tr>
                <?php 
                    $cnt--;
                    endforeach; ?>
                
            </table>
        </div>

        <div class="list-page-btns">
            <button class="brown-btn-rev"><a href="/">Prev</a></button>
            <button class="brown-btn-rev"><a href="/">Next</a></button>
        </div>
    </div>
</section>