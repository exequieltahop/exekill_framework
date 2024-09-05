<?php
    namespace Utilities\Database;

    require __DIR__.'/database-connection.php';

    use PDO;
    use PDOStatement;
    use Utilities\Database\DatabaseConnection;

    class QueryBuilder extends DatabaseConnection{
        private $query = '';
        private $column_count = 0;
        private $where_count = 0;
        private $bind_param = [];
        private $column_and_value = [];

        public function Select(string $column) : self {
            try {
                if($this->column_count < 1){
                    $this->query .= 'SELECT ';
                }else{
                    $this->query .= ', ';
                }

                $this->query .= $column;

                $this->column_count++;

                return $this;
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        // from
        public function From(string $table) : self {
            try {
                $this->query .= ' FROM '.$table;
                return $this;
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        //Where
        public function Where(string $column, string $operator, string $value, bool $binary) : self {
            try {
                if($this->where_count < 1){
                    $this->query .= ' WHERE ';
                }

                if($binary == true){
                    $this->query .= 'BINARY '.$column. ' ' . $operator. ' :'.$column;
                }else{
                    $this->query .= $column. ' ' . $operator. ' :'.$column;
                }

                $this->bind_param[] = [
                    'column' => $column,
                    'value' => $value
                ];

                $this->where_count++;
                return $this;
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        // AND 
        public function And() : self {
            try {
                $this->query .= ' AND ';
                return $this;
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        // AND 
        public function Or() : self {
            try {
                $this->query .= ' OR ';
                return $this;
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        // bind param
        public function BindParam(PDOStatement $stmt) : self {
            try {
                foreach($this->bind_param as $param){
                    $stmt->bindParam(':'.$param['column'], $param['value']);
                }

                return $this;
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        // get
        public function Get() : array {
            try {
                $stmt = $this->conn->prepare($this->query);
                $this->BindParam($stmt);
                $stmt->execute();
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC); 
                $this->Reset();
                return $result;
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        // execute
        public function Execute() : bool {
            try {
                $stmt = $this->conn->prepare($this->query);
                $this->BindParam($stmt);
                $stmt->execute(); 
                $this->Reset();
                return true;
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        // reset instances
        private function Reset() : void {
            try {
                $this->query = '';
                $this->column_count = 0;
                $this->where_count = 0;
                $this->bind_param = [];
                $this->column_and_value = [];
            } catch (\Throwable $th) {
                throw $th;
            }
        }

        // insert column and values
        public function Insert(array $columns_and_values) : self {
            try {
                $this->column_and_value = $columns_and_values;
                return $this;
            } catch (\Throwable $th) {
                throw $th;
            }
        }
        
        // into what table
        public function Into(string $table) : self {
            try {
                $column_count = 1;
                $array_count = count($this->column_and_value);

                $this->query .= 'INSERT INTO '.$table.'(';

                foreach($this->column_and_value as $key => $value){
                    if($column_count == $array_count){
                        $this->query .= $key.')';
                    }else{
                        $this->query .= $key.', ';
                    }
                    $this->bind_param[] = [
                        'column' => $key,
                        'value' => $value
                    ];
                    $column_count++;
                }

                $count2 = 1;
                $this->query .= ' VALUES (';
                foreach($this->column_and_value as $key => $value){
                    if($count2 == $array_count){
                        $this->query .= ':'.$key.')';
                    }else{
                        $this->query .= ':'.$key.', ';
                    }
                    $count2++;
                }
                return $this;
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }
