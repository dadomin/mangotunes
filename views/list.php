<nav id="main-nav">
    <ul>
        <li><a href="/list/happy"><img src="/img/happy.png" alt="happy"><span>HAPPY</span></a></li>
        <li><a href="/list/sad"><img src="/img/sad.png" alt="sad"><span>SAD</span></a></li>
        <li><a href="/list/stressed"><img src="/img/stressed.png" alt="stressed"><span>STRESSED</span></a></li>
        <li><a href="/list/relaxed"><img src="/img/relaxed.png" alt="relaxed"><span>RELAXED</span></a></li>
        <li><a href="/list/mango"><img src="/img/mango.png" alt="mango"><span>FEELING MANGO?</span></a></li>
    </ul>
</nav>

<!-- list -->
<section id="list">
    <div class="list-title">
        <img src="/img/<?=$feeling?>.png" alt="feeling">
        <h1><?=$feeling?></h1>
    </div>
    <div class="list-nav">
        <select name="" id="">
            <option value="">Recently</option>
            <option value="">Many views</option>
            <option value="">Popularity</option>
        </select>
        <div class="search-box">
            <input type="text">
            <a href="/"><i class="fas fa-search"></i></a>
        </div>
    </div>
    <div class="list-table">
        <table>
            <th>
                <td>NO</td>
                <td>TITLE</td>
                <td>WRITER</td>
            </th>
            <tr>
                <td></td>
            </tr>
        </table>
    </div>
</section>