

<div class="list-title">
    <div class="size">
        <img src="/img/<?= $result->category?>.png" alt="feeling">
        <h1><?= strtoupper($result-> category)?></h1>
    </div>
</div>

<div class="size">

<section id="post">
    <div class="post-title">
        <h2><?= $result->title ?></h2>
        <p><span><?= $result->day ?></span><span class="line"></span><span>조회수&nbsp;&nbsp;<?= $result->views ?></span><span class="line"></span><span>좋아요&nbsp;&nbsp;<?= $result->is_like ?></span></p>
        <div class="post-user"><div class="user-img"><img src="<?= $result->img ?>" alt=""></div><?= $result->writer ?></div> 
    </div>
    <div class="post-video">
        <iframe width="854" height="480" src="https://www.youtube.com/embed/<?= $result->link_id ?>" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="post-contents">
        <p><?= $result->contents ?></p>
    </div>
    <div class="post-btns">
        <?php 
        if(isset($_SESSION['user'])):
        $target = (string)$result->idx;
        $liked = $user->liked;
        $array = explode("/", $liked);
        if(in_array($target, $array)) : ?>
            <button onclick="location.href='/unlike&idx=<?=$result->idx?>'"><i class="fas fa-heart"></i><p><?= $result->is_like ?></p></button>
        <?php  else:  ?>
        <button onclick="location.href='/like&idx=<?=$result->idx?>'"><i class="far fa-heart"></i><p><?= $result->is_like ?></p></button>
        <?php endif;?>
        <?php else : ?>
            <button onclick="location.href='/like&idx=<?=$result->idx?>'"><i class="far fa-heart"></i><p><?= $result->is_like ?></p></button>
        <?php endif;?>
        <button id="comment_btn"><i class="far fa-comment"></i><p><?= $result->comments ?></p></button>
        <button id="share_btn"><i class="fas fa-share-alt"></i><p>Share</p></button>
        <?php 
        if(isset($_SESSION['user'])) :
        $target2 = (string)$result->idx;
        $saved = $user->saved;
        $array2 = explode("/", $saved);
        if ( in_array($target2, $array2)) : ?>
        <button onclick="location.href='/unsave&idx=<?= $result->idx ?>'"><i class="fas fa-folder-minus"></i><p>Cancle</p></button>
            <?php  else : ?>
        <button onclick="location.href='/save&idx=<?= $result->idx ?>'"><i class="fas fa-folder-plus"></i><p>Save</p></button>
        <?php endif; ?>
        <?php  else : ?>
        <button onclick="location.href='/save&idx=<?= $result->idx ?>'"><i class="fas fa-folder-plus"></i><p>Save</p></button>
        <?php endif; ?>
    </div>
    <div class="post-comments">
        <form action="/write/comment" class="post-comment-input" method="post">
            <input type="hidden" value="<?= $result->idx ?>" name="idx">
            <textarea name="contents"></textarea>
            <button type="submit" class="brown-btn-rev">POST</button>
        </form>
        <div class="timeline">
            <?php foreach($comments as $item) : ?>
            <div class="comment">
                <div class="comment-user-name">
                    <div class="user-img"><img src="<?= $item->img ?>" alt=""></div>
                    <a href="/user"><?= $item->id ?></a>
                </div>
                <p><?= $item->contents?></p>
                <span><?= $item->day ?></span>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

</div>

<script>
    
    $("#share_btn").on("click", ()=>{
        
        // alert(`${location.href} \n위 링크를 복사하여 공유하세요.`);
        let div = document.createElement("div");
        div.classList.add("alert-div");
        let temp = `
            <div class="alert-box">
                <span class="alert-close">&#10005;</span>
                <h2>안내</h2>
                <h4>${location.href}</h4>
                <p>위 링크를 복사하여 공유해보세요!</p>
            </div>
            <div class="alert-back">
            </div>
        `;
        div.innerHTML=temp;
        
        div.querySelector(".alert-back").addEventListener("click", (e)=>{
            $(e.target.parentNode).fadeOut();
            setTimeout(() => {
                document.querySelector(".alert-div").remove();
            }, 1500);
        });
        document.querySelector("body").append(div);
    });;

    

    let isOpen = false;
    $("#comment_btn").on("click", ()=>{
        if(isOpen){
            // $(".post-comments").css("display","none");
            $(".post-comments").stop().slideUp("fast");
        }else {
            // $(".post-comments").css("display","block");
            $(".post-comments").stop().slideDown("fast");
        }
        isOpen = !isOpen;
    });
</script>