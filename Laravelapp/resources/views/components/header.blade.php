<style>
img{
    max-width: 100%;
    margin: 0;
    display: block;
    vertical-align: bottom;
}

.logo{
    width: 80px;
}

.header {
    display: flex;
    align-items: center;
    border-bottom: 2px solid #ddd;
    padding: 1em;
}

.header h1 {
    margin: 0;
    padding: 0 .5em;
    font-size: 25px;
    font-weight: normal;
}
</style>

<div class="header">
    <div class="logo">
        <img src="http://<?php print $_SERVER['HTTP_HOST']; ?>/img/laravel.png" alt="laravel-logo">
    </div>
    <h1>Laravel 学習 2021</h1>
</div>