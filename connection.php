
<?php


// $nom= $_GET['nom'];
// $email=$_GET['email'];
// $pass=$_GET['pass'];

// $pass2=$_GET['pass2'];


// echo " bonjour $nom votre email est $email et votre passwod est $pass";

// if()


//     // if(isset($_GET['email'])){
//     //     echo $_GET['email'] ;
//     // }else{
//     //     echo "aucun email";
//     // }

//     // print_r($_SERVER['SCRIPT_NAME']);
// // $email= $_GET['email'] ;

// // echo $email;
// header('Location :index.php' );



$servername="localhost";
$username="root";
$passwod="";

if(isset($_GET['registre'])){
  try{
    $nom=$_GET['fname'];
    $email=$_GET['email'];
    $password=$_GET['pass'];

    $conn=new PDO("mysql:host=$servername; dbname=databasearrey",$username,$passwod);




    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
    
    // $sql="create database databaseArrey";

    $sql="insert into user(nom,email,password) value('$nom','$email','$password')";
      

    $conn->exec($sql);
    header ("Location:login.php");
    // echo "insertion success";

  } catch(PDOException $e) {
    echo "insertio est echoue: " . $e->getMessage();
  }

  $conn = null;
}

if(isset($_GET['login'])){
  try{
    $email=$_GET['email'];
    $password=$_GET['pass'];

    $conn=new PDO("mysql:host=$servername; dbname=databasearrey",$username,$passwod);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql= $conn->prepare("Select  * from user ");
    $sql->execute();
    $resultat=$sql->fetchAll();
    foreach($resultat as $row){
      foreach($row as $key=>$val){
          if($val==$email  && $val==$password){
            header("Location:index.php");
        //   echo $key.' => '.$v;
          }
          else{
           header("Location:index.php");
        }
       
        
      }
      echo " <br> ";
    }

    
  }catch(PDOException $e){
    echo "Connection est echoue: " . $e->getMessage();
  }
  $conn = null;
}

?>