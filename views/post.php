<div class="list-title">
    <div class="size">
        <img src="/img/happy.png" alt="feeling">
        <h1>HAPPY</h1>
    </div>
</div>

<div class="size">

<!-- $youtu_url = 'https://youtu.be/NBU5QHUTejk';
$regExp = '/^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#\&\?]*).*/';
preg_match($regExp, $youtu_url, $matches);
$result = $matches[7]; -->

<section id="post">
    <div class="post-title">
        <h2><?= $result ?></h2>
        <p><span>날짜 시간</span> <span>조회수 0</span> <span>좋아요 0</span></p>
        <h3><i class="fas fa-user-circle"></i> <a href="/">user-name</a></h3>
    </div>
    <div class="post-video">
        <iframe width="1280" height="720" src="https://www.youtube.com/embed/zkEnqWFihJE" frameborder="0" allowfullscreen></iframe>
    </div>
    <div class="post-contents">
        <p>내용을 씁니다.</p>
    </div>
    <div class="post-btns">
        <button><i class="far fa-heart"></i><p>112</p></button>
        <!-- <button><i class="fas fa-heart"></i><p>112</p></button> -->
        <button><i class="far fa-comment"></i><p>0</p></button>
        <button><i class="fas fa-share-alt"></i><p>Share</p></button>
        <button><i class="fas fa-folder-plus"></i><p>Save</p></button>
    </div>
    <div class="post-comments">
        <div class="post-comment-input">
            <textarea name="" id="" cols="100" rows="3"></textarea>
            <button>Post</button>
        </div>
        <div class="timeline">
            <div class="commet">
                <div class="comment-user-img">
                    <img src="/img/user.png" alt="user">
                </div>
                <div class="comment-sub">
                    <h2>username</h2>
                    <p>댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글</p>
                    <span>2021-03-14</span>
                </div>
            </div>
            <div class="commet">
                <div class="comment-user-img">
                    <img src="/img/user.png" alt="user">
                </div>
                <div class="comment-sub">
                    <h2>username</h2>
                    <p>댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글</p>
                    <span>2021-03-14</span>
                </div>
            </div>
            <div class="commet">
                <div class="comment-user-img">
                    <img src="/img/user.png" alt="user">
                </div>
                <div class="comment-sub">
                    <h2>username</h2>
                    <p>댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글댓글</p>
                    <span>2021-03-14</span>
                </div>
            </div>
        </div>
    </div>
</section>

</div>