<?php
    session_start();

    require __DIR__.'/../../utilities/tools/StatusCodeHandler.php';
    require_once __DIR__.'/../../utilities/tools/email-validator.php';
    
    use Tools\StatusCodeHandler;
    use Utilities\Tools\EmailValidator;

    try {
        if($_SERVER['REQUEST_METHOD'] != 'POST'){
            $statusCodehandler = new StatusCodeHandler();
            $statusCodehandler->HTTP_404();
        }
        
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        if(EmailValidator::IsValid($email)){
            throw new Exception("Invalid Email!");
        }

        header('Content-Type: application/json');
        echo json_encode(['success' => 'Successfully Registered An Account!']);
    } catch (\Throwable $th) {
        header('Content-Type: application/json');
        echo json_encode(['error' => $th->getMessage()]);
    }