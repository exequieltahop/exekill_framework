<?php
    if(!isset($_SESSION['HasLog'])){
        header('Location: ./?rl=unauthorized');
        exit;
    }
    
    if(!isset($_SESSION['uid'])){
        header('Location: ./?rl=unauthorized');
        exit;
    }