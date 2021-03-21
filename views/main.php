
<!-- main - nav -->
<nav id="main-nav">
    <ul>
        <li><a href="/list&feeling=happy"><img src="/img/happy.png" alt="happy"><span>HAPPY</span></a></li>
        <li><a href="/list&feeling=sad"><img src="/img/sad.png" alt="sad"><span>SAD</span></a></li>
        <li><a href="/list&feeling=stressed"><img src="/img/stressed.png" alt="stressed"><span>STRESSED</span></a></li>
        <li><a href="/list&feeling=relaxed"><img src="/img/relaxed.png" alt="relaxed"><span>RELAXED</span></a></li>
        <li><a href="/list&feeling=mango"><img src="/img/mango.png" alt="mango"><span>FEELING MANGO?</span></a></li>
    </ul>
</nav>
<!-- // main - nav -->

<!-- <iframe width="640" height="360" src="https://www.youtube.com/embed/zkEnqWFihJE" frameborder="0" allowfullscreen></iframe> -->

<section id="main-ranking">
    <div class="ranking-popular">
        <h2>Popular</h2>
        <div class="ranking-video-box">
            <?php foreach($popular as $item) : ?>
            <div class="ranking-video">
                <div class="ranking-video-img"> 
                    <img src="http://img.youtube.com/vi/<?= $item->link_id ?>/mqdefault.jpg" alt="">   
                </div>   
                <h2><?= $item->title ?></h2>
                <div class="ranking-video-user">
                    <div class="user-img"><img src="<?= $item->img ?>" alt=""></div>
                    <span><?= $item->writer ?></span>
                </div>
                <a href="/view&idx=<?= $item->idx ?>"></a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="ranking-happy">
        <h2>Happy</h2>
        <a href="/list&feeling=happy">+more</a>
        <div class="ranking-video-box">
            <?php foreach($happy as $item) : ?>
            <div class="ranking-video">
                <div class="ranking-video-img"> 
                    <img src="http://img.youtube.com/vi/<?= $item->link_id ?>/mqdefault.jpg" alt="">   
                </div>   
                <h2><?= $item->title ?></h2>
                <div class="ranking-video-user">
                    <div class="user-img"><img src="<?= $item->img ?>" alt=""></div>
                    <span><?= $item->writer ?></span>
                </div>
                <a href="/view&idx=<?= $item->idx ?>"></a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="ranking-sad">
        <h2>Sad</h2>
        <a href="/list&feeling=sad">+more</a>
        <div class="ranking-video-box">
            <?php foreach($sad as $item) : ?>
            <div class="ranking-video">
                <div class="ranking-video-img"> 
                    <img src="http://img.youtube.com/vi/<?= $item->link_id ?>/mqdefault.jpg" alt="">   
                </div>   
                <h2><?= $item->title ?></h2>
                <div class="ranking-video-user">
                    <div class="user-img"><img src="<?= $item->img ?>" alt=""></div>
                    <span><?= $item->writer ?></span>
                </div>
                <a href="/view&idx=<?= $item->idx ?>"></a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="ranking-stressed">
        <h2>Stressed</h2>
        <a href="/list&feeling=stressed">+more</a>
        <div class="ranking-video-box">
            <?php foreach($stressed as $item) : ?>
            <div class="ranking-video">
                <div class="ranking-video-img"> 
                    <img src="http://img.youtube.com/vi/<?= $item->link_id ?>/mqdefault.jpg" alt="">   
                </div>   
                <h2><?= $item->title ?></h2>
                <div class="ranking-video-user">
                    <div class="user-img"><img src="<?= $item->img ?>" alt=""></div>
                    <span><?= $item->writer ?></span>
                </div>
                <a href="/view&idx=<?= $item->idx ?>"></a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="ranking-relaxed">
        <h2>Relaxed</h2>
        <a href="/list&feeling=relaxed">+more</a>
        <div class="ranking-video-box">
            <?php foreach($relaxed as $item) : ?>
            <div class="ranking-video">
                <div class="ranking-video-img"> 
                    <img src="http://img.youtube.com/vi/<?= $item->link_id ?>/mqdefault.jpg" alt="">   
                </div>   
                <h2><?= $item->title ?></h2>
                <div class="ranking-video-user">
                    <div class="user-img"><img src="<?= $item->img ?>" alt=""></div>
                    <span><?= $item->writer ?></span>
                </div>
                <a href="/view&idx=<?= $item->idx ?>"></a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="ranking-mango">
        <h2>Mango</h2>
        <a href="/list&feeling=mango">+more</a>
        <div class="ranking-video-box">
            <?php foreach($mango as $item) : ?>
            <div class="ranking-video">
                <div class="ranking-video-img"> 
                    <img src="http://img.youtube.com/vi/<?= $item->link_id ?>/mqdefault.jpg" alt="">   
                </div>   
                <h2><?= $item->title ?></h2>
                <div class="ranking-video-user">
                    <div class="user-img"><img src="<?= $item->img ?>" alt=""></div>
                    <span><?= $item->writer ?></span>
                </div>
                <a href="/view&idx=<?= $item->idx ?>"></a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section id="help">
    <a href="https://www.mentalhealth.gov/get-help/immediate-help">
        <i class="fas fa-phone-alt"></i><br>
        <span>You're not alone</span><br>
        <p>Get immediate help</p>
    </a>
    <a href="https://www.mentalhealth.gov/talk/community-conversation">
    
    <i class="fas fa-heartbeat"></i><br>
        <span>About Mental Health</span><br>
        <p>Let’s talk!</p>
    </a>
    <a href="https://www.mentalhealth.gov/talk/young-people">
        <i class="fas fa-graduation-cap"></i><br>
        <span>About Young People and Mental Health</span><br>
        <p>Learn More!</p>
    </a>
</section>

