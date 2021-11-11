<html>
  <head>
    <link rel="shortcut icon" href="tablogo.png">  
    <style>
      *{
        margin: 0px;
      }
      body{
        background-color: cornsilk;
        background-size: 75% 100%;
        background-repeat: no-repeat;
        background-position: center;
      }
      .nav{
        width: 100%;
        height: 10%;
        background-color: rgba(245, 245, 245, 0.89);
      }
      #logo {
      float: right;
      margin-top: 0px;
      margin-left: 20px;
      background-color: blueviolet;
    }

    .navbtn {
      cursor: pointer;
      margin-top: 10px;
      border: none;
      width: 12%;
      height: 65%;
      float: right;
      background: none;
      color: rgb(6, 248, 46);
      font-weight: bold;
      font-size: medium;
    }
      .update{
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size:1.1em;
        margin-top: 13%;
      }
    </style>
  </head>
  <body>
  <nav id="home">
      <div class="nav">
        <img id="logo" src="tablogo.png" height="72px" width="72px" >
        <a href="index.html"><button class="navbtn"><b>Home</b></button></a>
        <a href="view.php"><button class="navbtn"><b>View All Customer</b></button></a>
        <a href="history.php"><button class="navbtn"><b>Transaction History</b></button></a>

      </div>
    </nav> 
    <?php
    session_start();
    $servername = "localhost";
    $username = "root";
    $password = ""; 
    $dbname = "Bank";
// Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    $sqlo = "UPDATE Customer SET Balance = Balance - ".$_POST["tp"]." WHERE C_ID = ".$_SESSION["TC"].";";
    $F=0;
    if ($conn->query($sqlo) === TRUE) {
        $F=1;
      } else {
        echo $conn->error;
      }
      $sql = "UPDATE Customer SET Balance = Balance + ".$_POST["tp"]." WHERE C_ID = ".$_POST["user"].";";
      $S=0; 
      if ($conn->query($sql) === TRUE) {
          $S=1;
        } else {
          echo "Error updating record: " . $conn->error;
        }
    $sql = "SELECT Name FROM Customer WHERE C_Id='" . $_POST["user"]. "'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $reciver = $row["Name"];
      }
    } 
    else {
      echo "You are not registered.<br>So, Please Register first.";
    }
    $sql = "INSERT INTO Transaction (Sender_Id, Sender_Name, Transfer_Amount, Receiver_Id, Receiver_Name, Date) VALUE (".$_SESSION["TC"].",'".$_SESSION["Sender"]."',".$_POST['tp'].",".$_POST["user"].",'".$reciver."' ,NOW() )";
    $T=0;    
    if ($conn->query($sql) === TRUE) {
         $T=1;
        } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
        }
    if ($F == 1 and $S == 1 and $T == 1){
      echo "<div class='update'><center><h1>Money Transfer Successful !!!</h1><br>Amount of <b>Rs.".$_POST["tp"]."</b>
        <br>has been transferred to account having<br><b>Customer ID : ".$_POST["user"]."</b><br>
        
        <br><b><h1>Thank You ...</h1></b></center></div>";
    }    
    $conn->close();
?>
</body>
<html>
