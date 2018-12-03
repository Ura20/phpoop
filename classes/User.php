<?php
    require_once("Database.php");
 
    class User extends Database{

        public function login($uname,$pass){
            $sql = "SELECT * FROM users WHERE username='$uname' AND password ='$pass'";

            $result = $this->conn->query($sql);
            if($result->num_rows == 1){
                $row = $result->fetch_assoc();
                $_SESSION['userid'] = $row['user_id'];
                header("location:users.php");
            }

            else{
                return false;
            }
        }

        

        public function select(){
            //query
            $sql = "SELECT * FROM users"; 
            //execute or run the query
            $result = $this->conn->query($sql);
            //initialize an array
            $rows = array();
            if($result->num_rows > 0){
               while($row = $result->fetch_assoc()){
                    $rows[] = $row;
               }
                return $rows;
            }

            else{
               return false;
            }

        }

        public function selectOne($id){
            $sql = "SELECT * FROM users WHERE user_id=$id";
            $result = $this->conn->query($sql);

            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return $row;
            }

            else{
                return false;
            }
        }

        public function store($uname,$pass,$fname,$lname){
            $sql = "SELECT * FROM users WHERE username = '$uname'";
            $result = $this->conn->query($sql);
            if($result->num_rows > 0){
                return false;
            }
            else{
                $pass = md5($pass);
                $sql = "INSERT INTO users(username,password,firstname,lastname) VALUES('$uname', '$pass','$fname','$lname')";
                $result = $this->conn->query($sql);
                if($result){
                    header("location: users.php");
                }
                else{
                    return $conn->error;
                }
            
            }
            $this->conn->close();
        }

        public function update($id, $uname,$fname,$lname){
            $sql = "SELECT * FROM users WHERE username = '$uname' AND user_id != $id";
            $result = $this->conn->query($sql);
            if($result->num_rows > 0){
                return false;
            }

            else{
                $sql = "UPDATE users SET username='$uname', firstname='$fname', lastname='$lname' WHERE user_id=$id";
                $result = $this->conn->query($sql);
                if($result){
                    header('location: users.php');

                }
                else{
                    echo $this->conn->error;
                }

            }
            $this->conn->close();
        }

        public function delete($id){

            $sql = "DELETE FROM users WHERE user_id=$id";
            $result = $this->conn->query($sql);
            if($result){
                header("location: users.php");
            }
            else{
                echo $this->conn->error;
            }

            $this->conn->close();
        } 

    }
    
?>



                       
