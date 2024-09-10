<?php
    session_start();

    require __DIR__.'/../../utilities/tools/StatusCodeHandler.php';
    
    use Tools\StatusCodeHandler;

    try {
        if($_SERVER['REQUEST_METHOD'] != 'POST'){
            $statusCodehandler = new StatusCodeHandler();
            $statusCodehandler->HTTP_404();
        }        
        echo 1;
    } catch (\Throwable $th) {
        header('Content-Type: application/json');
        echo json_encode(['err' => $th->getMessage()]);
    }