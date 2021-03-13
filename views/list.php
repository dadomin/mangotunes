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
            <table id="list-tbl">
                <tr>
                    <th>NO</th>
                    <th>TITLE</th>
                    <th>DATE</th>
                    <th>WRITER</th>
                </tr>
                <tr>
                    <td><p class="list-video-no">3</p></td>
                    <td class="list-video-title">
                        <div class="list-video-img">
                            <img src="http://img.youtube.com/vi/zkEnqWFihJE/maxresdefault.jpg" alt="">
                        </div>
                        <a href="/post">제목이 나타납니다제목이 나타납니다제목이 나타납니다제목이 나타납니다제목이 나타납니다제목이 나타납니다제목이 나타납니다제목이 나타납니다제목이 나타납니다제목이 나타납니다제목이 나타납니다제목이 나타납니다<span class="list-video-comments">[15]</span><br>
                            <span class="list-video-vl">조회수 0 | 좋아요 0</span>    
                        </a>
                    </td>
                    <td>
                        <p>2021-03-14</p>
                    </td>
                    <td>
                    <div class="list-video-user"><div><img src="/img/user.png" alt=""></div> <a href="/">user-name</a></div>
                    </td>
                </tr>
                <tr>
                    <td><p class="list-video-no">2</p></td>
                    <td class="list-video-title">
                        <div class="list-video-img">
                            <img src="/img/music_note.png" alt="AS">
                        </div>
                        <a href="/">제목이 나타납니다<span>[15]</span></a>
                    </td>
                    <td>
                        <p>2021-03-14</p>
                    </td>
                    <td>
                    <div class="list-video-user"><div><img src="/img/user.png" alt=""></div> <a href="/">user-name</a></div>
                    </td>
                </tr>
                <tr>
                    <td><p class="list-video-no">1</p></td>
                    <td class="list-video-title">
                        <div class="list-video-img">
                            <img src="http://img.youtube.com/vi/zkEnqWFihJE/maxresdefault.jpg" alt="">
                        </div>
                        <a href="/">제목이 나타납니다<span>[15]</span></a>
                    </td>
                    <td>
                        <p>2021-03-14</p>
                    </td>
                    <td>
                        <div class="list-video-user"><div><img src="/img/user.png" alt=""></div> <a href="/">user-name</a></div>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</section>