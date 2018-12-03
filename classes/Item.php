<?php
    require_once("Database.php");

    class Item extends Database{

        public function select(){

        $sql = "SELECT * FROM items INNER JOIN users ON items.user_id=users.user_id";
        $result = $this->conn->query($sql);
        $row = array();
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
            $sql = "SELECT * FROM items WHERE item_id=$id";
            $result = $this->conn->query($sql);

            if($result->num_rows > 0){
                $row = $result->fetch_assoc();
                return $row;
            }

            else{
                return false;
            }
        }

        public function store($iname, $idetails, $iquantity, $iprice){
           
                $sql = "INSERT INTO items(item_name,item_details,item_quantity,item_price) VALUES('$iname','$idetails','$iquantity','$iprice')";
                $result = $this->conn->query($sql);

                if($result){
                    header("location: items.php");
                }
                else{
                    return $conn->error;
                }
            
        }

        public function update($id, $iname, $idetails, $iquantity, $iprice){
         
                $sql = "UPDATE items SET item_name='$iname', item_details='$idetails', item_quantity='$iquantity', item_price='$iprice' WHERE item_id = $id";
                $result = $this->conn->query($sql);
                if($result){
                    header("location: items.php");
                }
                else{
                    echo $this->conn->error;
                }

            $this->conn->close();
        }

        public function delete($id){
            $sql = "DELETE FROM items WHERE item_id =$id";
            $result = $this->conn->query($sql);
            if($result){
                header("location:items.php");
            }
            else{
                echo $this->conn->error;
            }
            $this->conn->close();
        }
    }
?>