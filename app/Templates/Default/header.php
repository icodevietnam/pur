<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
    <title><?php echo $title.' - '.SITETITLE;?></title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?php
    echo $meta;//place to pass data / plugable hook zone
    Assets::css([
        Url::templatePath().'css/main/home.min.css',
    ]);
    echo $css; //place to pass data / plugable hook zone
    ?>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDNhQodvMWGRaXcSs5blVgRyoJCsvV_W74&callback=General.addDom" async defer></script>

</head>
<body>
<div class="header container">
    <div class="header-language right">
      <p class="center">
        <?php if(Session::get('language')==='En') {?>
          <?= Language::show('en', 'General'); ?>
        <?php } 
          else { ?>
            <?= Language::show('vi', 'General'); ?>
        <?php }?>
        <i class="fa fa-sort-desc" aria-hidden="true"></i>
      </p>
    </div>
    <a href="<?= SITEURL ?>">
        <img src="<?= Url::imagePath() ?>/logo.png" />
    </a>
    <ul class="list-language right">
      <li><a href="<?= DIR ?>lang/en"><?= Language::show('en', 'General'); ?></a></li>
      <li><a href="<?= DIR ?>lang/vi"><?= Language::show('vi', 'General'); ?></a></li>
    </ul>
</div>
<div class="container">
    <nav class="pur">
  <ul class="primary">
    <li>
      <a href="#"><?= Language::show('home', 'General'); ?></a>
    </li>
    <li>
      <a href=""><?= Language::show('product', 'General'); ?></a>
      <ul class="sub">
        <li><a href="">Tabby</a></li>
        <li><a href="">Black Cat</a></li>
        <li><a href="">Wrinkly Cat</a></li>
      </ul>
    </li>
    <li>
      <a href=""><?= Language::show('galery', 'General'); ?></a>
      <ul class="sub">
        <li><a href="">Humming Bird</a></li>
        <li><a href="">Hawk</a></li>
        <li><a href="">Crow</a></li>
      </ul>  
    </li>
    <li>
      <a href=""><?= Language::show('news', 'General'); ?></a>
      <ul class="sub">
        <li><a href="">Brown Horse</a></li>
        <li><a href="">Race Horse</a></li>
        <li><a href="">Tall Horse</a></li>
      </ul>  
    </li>
    <li>
      <a href=""><?= Language::show('contact-us', 'General'); ?></a>
      <ul class="sub">
        <li><a href="">Cheesy</a></li>
        <li><a href="">More Ketchup</a></li>
        <li><a href="">Some Mustard</a></li>
        <li><a href="">Extra Butter</a></li>
      </ul>  
    </li>
    <li>
      <div class='search-input'>
        <span class="icon"><i class="fa fa-2x fa-search"></i></span>
        <input type="search" id="search" placeholder="<?= Language::show('search', 'General'); ?>..." />
      </div>
    </li>
  </ul>
</nav>
</div>
