
<div class="size">
    <div id="profile-main">
        <div class="profile-box">
            <div class="user-img"><img src="<?= $user->img ?>" alt=""></div>
            <h2><?= $user->id ?></h2>
        </div>
        <div class="profile-menu">
            <button id="posts_btn"><?php if(!isset($user->posts)) : ?>0<?php else : ?><?= $user->posts?><?php endif; ?><p>Posts</p></button>
            <button id="liked_btn"><?= $like ?><p>Liked</p></button>
            <button id="saved_btn"><?= $save?><p>Saved</p></button>
            <button></button>
        </div>
    </div>

    <div id="profile-list">
        
        <div class="list-posts">
        <?php if($user->posts == null) : ?>
            존재하지않음
        <?php else : ?>
            <select name="" id="posts-how">
                <option value="all">all</option>
                <option value="happy">happy</option>
                <option value="sad">sad</option>
                <option value="stressed">stressed</option>
                <option value="relaxed">relaxed</option>
                <option value="mango">mango</option>
            </select>
            <table class="list-tbl">
                <tr>
                    <th width="70%">TITLE</th>
                    <th widht="30%">WRITER</th>
                </tr>

                <?php 
                    $list = array_reverse($posts);
                    foreach($posts as $item) :
                ?>
                <tr>
                    <td class="list-video-title">
                        
                        <input type="hidden" value="<?= $item->category ?>" class="posts-category">
                        <div class="list-video-img">
                            <img src="http://img.youtube.com/vi/<?= $item->link_id ?>/mqdefault.jpg" onerror="this.src='/img/music_note.png'">
                        </div>
                        <a href="/view&idx=<?=$item->idx?>"><?=$item->title?><span class="list-comment">[<?= $item->comments?>]</span><br><span class="list-video-vl">조회수 <?= $item->views ?> | 좋아요 <?= $item->is_like ?></span> </a>
                        
                    </td>
                    <td>
                    <div class="list-video-user"><div class="user-img"><img src="<?= $item->img ?>" alt=""></div> <a href="/"><?= $item->writer ?></a></div>
                    </td>
                </tr>
                <?php 
                    endforeach; ?>
            </table>
        <?php endif; ?>
        </div>

       
        <div class="list-liked"> 
            <?php if($likes == null) : ?>
            존재하지않음
        <?php else : ?>
            <select name="" id="likes-how">
                <option value="all">all</option>
                <option value="happy">happy</option>
                <option value="sad">sad</option>
                <option value="stressed">stressed</option>
                <option value="relaxed">relaxed</option>
                <option value="mango">mango</option>
            </select>
            <table class="list-tbl">
                <tr>
                    <th width="70%">TITLE</th>
                    <th widht="30%">WRITER</th>
                </tr>

                <?php 
                    $list = array_reverse($likes);
                    foreach($likes as $item) : 
                ?>
                <tr>
                    <td class="list-video-title">
                        
                        <input type="hidden" value="<?= $item->category ?>" class="likes-category">
                        <div class="list-video-img">
                            <img src="http://img.youtube.com/vi/<?= $item->link_id ?>/mqdefault.jpg" onerror="this.src='/img/music_note.png'">
                        </div>
                        <a href="/view&idx=<?=$item->idx?>"><?=$item->title?><span class="list-comment">[<?= $item->comments?>]</span><br><span class="list-video-vl">조회수 <?= $item->views ?> | 좋아요 <?= $item->is_like ?></span> </a>
                        
                    </td>
                    <td>
                    <div class="list-video-user"><div class="user-img"><img src="<?= $item->img ?>" alt=""></div> <a href="/"><?= $item->writer ?></a></div>
                    </td>
                </tr>
                <?php 
                    endforeach; ?>
            </table>
            
        <?php endif; ?>
        </div>

       
        <div class="list-saved">
        <?php if($saves == null) : ?>
            존재하지않음
        <?php else : ?>
            <select name="" id="saves-how">
                <option value="all">all</option>
                <option value="happy">happy</option>
                <option value="sad">sad</option>
                <option value="stressed">stressed</option>
                <option value="relaxed">relaxed</option>
                <option value="mango">mango</option>
            </select>
            <table class="list-tbl">
                <tr>
                    <th width="70%">TITLE</th>
                    <th widht="30%">WRITER</th>
                </tr>

                <?php 
                    $list = array_reverse($saves);
                    foreach($saves as $item) : 
                ?>
                <tr>
                    <td class="list-video-title">
                        <input type="hidden" value="<?= $item->category ?>" class="saves-category">
                        <div class="list-video-img">
                            <img src="http://img.youtube.com/vi/<?= $item->link_id ?>/mqdefault.jpg" onerror="this.src='/img/music_note.png'">
                        </div>
                        <a href="/view&idx=<?=$item->idx?>"><?=$item->title?><span class="list-comment">[<?= $item->comments?>]</span><br><span class="list-video-vl">조회수 <?= $item->views ?> | 좋아요 <?= $item->is_like ?></span> </a>
                        
                    </td>
                    <td>
                    <div class="list-video-user"><div class="user-img"><img src="<?= $item->img ?>" alt=""></div> <a href="/"><?= $item->writer ?></a></div>
                    </td>
                </tr>
                <?php 
                    endforeach; ?>
            </table>
            
        <?php endif; ?>
        </div>
    </div>
</div>

<script>
    $("#posts-how").on("change", (e)=>{
        let how = e.target.value;
        if(how != "all"){
            let arr = $(".posts-category");
            for(let i = 0; i < arr.length; i++) {
                if(arr[i].value != how){
                    console.log(arr[i].value);
                    arr[i].parentNode.parentNode.style.display = 'none';
                }else {
                    arr[i].parentNode.parentNode.style.display = '';
                }
            }
        }else {
            let arr = $(".posts-category");
            for(let i = 0; i < arr.length; i++) {
                arr[i].parentNode.parentNode.style.display = '';
            }
        }
        
    });

    $("#likes-how").on("change", (e)=>{
        let how = e.target.value;
        if(how != "all"){
            let arr = $(".likes-category");
            for(let i = 0; i < arr.length; i++) {
                if(arr[i].value != how){
                    console.log(arr[i].value);
                    arr[i].parentNode.parentNode.style.display = 'none';
                }else {
                    arr[i].parentNode.parentNode.style.display = '';
                }
            }
        }else {
            let arr = $(".likes-category");
            for(let i = 0; i < arr.length; i++) {
                arr[i].parentNode.parentNode.style.display = '';
            }
        }
        
    });

    $("#saves-how").on("change", (e)=>{
        let how = e.target.value;
        if(how != "all"){
            let arr = $(".saves-category");
            for(let i = 0; i < arr.length; i++) {
                if(arr[i].value != how){
                    console.log(arr[i].value);
                    arr[i].parentNode.parentNode.style.display = 'none';
                }else {
                    arr[i].parentNode.parentNode.style.display = '';
                }
            }
        }else {
            let arr = $(".saves-category");
            for(let i = 0; i < arr.length; i++) {
                arr[i].parentNode.parentNode.style.display = '';
            }
        }
        
    });

    // let now = null;
    $("#posts_btn").on("click", (e)=>{
        nowshow("posts");
        console.log("asdf");
    });
    $("#liked_btn").on("click", (e)=>{
        nowshow("liked");
    });
    $("#saved_btn").on("click", (e)=>{
        nowshow("saved");
    });
    function nowshow(now){
        console.log("asdf");
        let arr = $("#profile-list > div");
        for(let i = 0; i < arr.length; i++) {
            $(arr[i]).slideUp("fast");
        }
        $(`.list-${now}`).stop().fadeIn("slow");
    }
</script>