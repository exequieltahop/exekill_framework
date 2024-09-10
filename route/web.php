<?php
    
    if(isset($_GET['rl'])){
        switch($_GET['rl']){
            case 'sign-in':
                include __DIR__.'/../view/layouts/auth/sign-in.php';
                break;
            case 'sign-up':
                include __DIR__.'/../view/layouts/auth/sign-UP.php';
                break;
            case 'unauthorized':
                include __DIR__.'/../view/unauthorize/unauthorize.php';
                break;  
            case 'migration-status':
                include __DIR__.'/../view/MigrationStatus/migration-result.php';
                break;  
            case 'mentainance':
                include __DIR__.'/../view/maintenance/maintenance.php';
                break;
            case 'home':
                include __DIR__.'/../view/layouts/components/home.php';
                break;  
            default:
                include __DIR__.'/../view/layouts/auth/sign-in.php';
                break;
        }
    }else{
        include __DIR__.'/../view/layouts/auth/sign-in.php';
    }
