<html>
    <head>
        <link rel="shortcut icon" href="tablogo.png">
        <title>Transaction Details</title>
        <style>
            * {
                margin: 0px;
            }
            body{
                background-color: cornsilk;
            }
            .nav {
                width: 100%;
                height: 11%;
                background-color: rgba(245, 245, 245, 0.89);
            }
            .navbtn {
                cursor: pointer;
                margin-top: 10px;
                border: none;
                width: 12%;
                height: 65%;
                float: right;
                background: none;
                color:rgb(6, 248, 46);
                font-weight: bold;
                font-size: medium;
            }
            #logo {
                float: right;
                margin-top: 0px;
                margin-left: 20px;
                background-color: blueviolet;
            }
            .table{
                width: 75%;
                border: black solid 1px;
                border-radius: 5px;
                border-collapse: collapse;
                margin-left: 10% ;
                font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
                font-size:1em;
            }
            td{
                text-align: center;
                height:35px;
                padding: 5px 5px;
            }
            th{
                border-bottom: green solid 3px;
                background-color: #00FF00;
                height:30px;
            }
            table tr{background-color: #00FF00;}
            table tr:hover {background-color: #ddd;}
        </style>
    </head>
    <body>
        <nav id="home">
            <div class="nav">
                <img id="logo" src="tablogo.png" height="72px" width="72px" >
                <a href="index.html"><button class="navbtn"><b>Home</b></button></a>
                <a href="view.php"><button class="navbtn"><b>View All Customer</b></button></a>
            </div>
        </nav><br><br><br>
<?php
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
      $sql = "SELECT * FROM Transaction";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
  // output data of each row
        $i = 1;
        echo '<center><table class="table">';
        echo "<tr><th colspan=7>Transaction History</th></tr>";
        echo "<tr><th>Serial</th><th>Sender Serial</th><th>Sender Name</th><th>Transacted Amount</th><th>Receipient Serial</th><th>Receipient Name</th><th>Date</th></tr>";
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>".$i."</td><td>".$row["Sender_ID"]."</td><td>".$row["Sender_Name"]."</td><td>".$row["Transfer_Amount"]."</td>
          <td>".$row["Receiver_Id"]."</td><td>".$row["Receiver_Name"]."</td><td>".$row["Date"]."</td></tr>";
          $i = $i + 1;
        }
        echo "<tr><td colspan=7>Total No. of Transactions : ".$result->num_rows."</td></tr></table><center>";
      } 
      else {
        echo "You are not registered.<br>So, Please Register first.";
      }
      $conn->close();
    ?>
    </body>
    </html>