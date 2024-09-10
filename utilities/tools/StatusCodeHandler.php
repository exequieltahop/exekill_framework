<?php 
    namespace Tools;

    class StatusCodeHandler{
        public function HTTP_404() : void {
            http_response_code(400);
            header('Location: ../../?rl=unauthorized');
            exit;
        }
    }