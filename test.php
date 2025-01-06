<?php

// include 'config.php';
// class calc{
//   public function divide($a, $b)
//   {
//     if  ($b == 0)
//     {
//     throw new Exception( "cannot divide by 0");
//   }
//   return $a/$b;
// }
// }

// $calc = new calc();
// try {
//   catch(Exception $e)
//   {
//     echo"error" $e -> getCode();
//   }
// }
include('database.php');

if (isset ($_post ['save_category_bt']))
{
  $name = $_post['name_category'];
}




?>









// data base connection

<?php
function connect_db()
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'devblog_db';
    
    // $mysqli = mysqli_connect($host, $username, $password, $database);
    
    // if (mysqli_connect_errno()) {
    //     error_log("Connection failed: " . mysqli_connect_error());
    //     die("Connection failed. Please try again later.");
    // }
    
    // return $mysqli;



    try {
      $conn =  new PDO("mysql:host=$servername; dbname=$database";$username; $password);
        } catch (PDOException $e)
    echo "connection fieled".$e -> getMessage();
    }
}





// articles get by id and delete


// public function getArticleById($id) {
    //     $sql = "SELECT * FROM articles WHERE id = :id";
        
    //     $x = $this->db->prepare($sql);
    //     $x->bindParam(':id', $id);
        
    //     $x->execute();
    //     return $x->fetch(PDO::FETCH_ASSOC);
    // }

    // public function deleteArticle($id) {
    //     $sql = "DELETE FROM articles WHERE id = :id";
        
    //     $x = $this->db->prepare($sql);
    //     $x->bindParam(':id', $id);
        
    //     return $x->execute();
    // }