<?php
    class functions extends db{

        //Retrive function
        public function select(){
            $sql    = "SELECT * FROM student_info ORDER BY id DESc";
            $result = $this->connect()->query($sql);

            if($result->rowCount() > 0){
                while($row = $result->fetch()){
                    $data[] = $row;
                }
                return $data;
            }
        }

        //insert function
        public function insert($fields){
            $impClm = implode(', ', array_keys($fields));
            $impHolder = implode(', :', array_keys($fields));

            $sql = "INSERT INTO student_info ($impClm) VALUES (:".$impHolder.")";
            $state = $this->connect()->prepare($sql);

            foreach($fields as $key => $value){
                $state->bindValue(':'.$key,$value);
            }

            $stateExec = $state->execute();

            if($stateExec){
                $msg = "Successfully Inserted";
                header('Location: index.php?msg='.$msg);
            }
        }

        //getting one item function
        public function selectOne($id){
            $sql = "SELECT * FROM student_info WHERE id=:id";
            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(":id",$id);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        //update function
        public function update($fields,$id){
           $st = "";
           $counter = 1;
           $total_fields = count($fields);

           foreach($fields as $key=>$value){
               if($counter === $total_fields){
                   $set = "$key = :".$key;
                   $st = $st.$set;
               }else{
                $set = "$key = :".$key.", ";
                $st = $st.$set; 
                $counter++;
               }
           }

           $sql = "";
           $sql.= "UPDATE student_info SET ".$st;
           $sql.= " WHERE id = ".$id;

           $stmt = $this->connect()->prepare($sql);

           foreach($fields as $key => $value){
               $stmt->bindValue(':'.$key, $value);
           }

           $stmtExec = $stmt->execute();

           if($stmtExec){
            $msg = "Successfully Updated";
            header('Location: index.php?msg='.$msg);
           }
        }

        //delete function
        public function delete($id){
            $sql = "DELETE FROM student_info WHERE id = :id";

            $stmt = $this->connect()->prepare($sql);
            $stmt->bindValue(":id", $id);
            $stmtExec = $stmt-> execute();

            if($stmtExec){
                $msg = "Successfully Deleted";
                header('Location: index.php?msg='.$msg);
               }
        }

    }
?>