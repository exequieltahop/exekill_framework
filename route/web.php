<?php
    if(isset($_GET['rl'])){
        switch($_GET['rl']){
            case 'sign-in':
                include __DIR__.'/../view/sign-in.php';
                break;
            case 'sign-up':
                include __DIR__.'/../view/sign-up.php';
                break;
            default:
                include __DIR__.'/../view/sign-in.php';
                break;
        }
    }else{
        include __DIR__.'/../view/sign-in.php';
    }