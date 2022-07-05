
<?php


// connection au base de donnée

$servername="localhost";
$username="root";
$passwod="";
$conn=new PDO("mysql:host=$servername; dbname=databasearrey",$username,$passwod);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);










if(isset($_GET['registre'])){
  try{
    $nom=$_GET['fname'];
    $email=$_GET['email'];
   
    $password=$_GET['pass'];

    

    $sql="insert into user(nom,email,password) value('$nom','$email','$password')";
      

    $conn->exec($sql);
    header ("Location:login.php");
    // echo "insertion success";

  } catch(PDOException $e) {
    echo "insertio est echoue: " . $e->getMessage();
  }

  $conn = null;
}

if(isset($_POST['login'])){
  if($_POST['email'] != "" || $_POST['password'] != ""){
  try{
    
    $email=$_POST['email'];
  //  $email="ilyas@gmail.com";
  //  $password="123";
    $password=$_POST['pass'];
    $email1="ilyas@gmail.com";
    $userProuver=false;
  

    $sql= $conn->prepare("Select  * from user  where email=? AND password=? ");
    $sql->execute(array($email,$password));
    $row = $sql->rowCount();
    $resultat=$sql->setFetchMode(PDO::FETCH_ASSOC);
    $result = $sql->fetchAll();
    if($row>0){
      // echo"<center><h5 class='text-success'>Login successfully</h5></center>";
      header("Location:index.php");
    }else{
      header("Location:login.php");
       echo"<center><h5 class='text-danger'>Invalid username or password</h5></center>";
    }
 
    }catch(PDOException $e){
      echo "Connection est echoue: " . $e->getMessage();
    }
    $conn = null;
  }else{
    echo"<center><h5 class='text-danger'>Invalid username or password</h5></center>";
  }
}

?>