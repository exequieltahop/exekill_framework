<?php  
    namespace Utilities\Database;

    use PDO;
    use Exception;
    use PDOException;

    class DatabaseConnection{
        protected $conn;

        // OPEN DATABASE CONNECTION
        public function Connect() : void {
            try {
                $this->conn = new PDO('mysql:host=localhost;dbname=firstlivewire;', 'root', '');
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $th) {
                throw $th;
            }
        }
        
        // DISCONNECT CONNECTION
        public function Disconnect() : void {
            try {
                $this->conn = null;
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }