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

</head>
<body>
