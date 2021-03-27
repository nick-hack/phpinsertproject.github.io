<?php
$host="localhost";
$user="root";
$pass="";
$db="new1";

$conn=mysqli_connect($host,$user,$pass,$db);
if(!$conn)
{
    die("conn failed");
}
echo "connection successfull<hr>";


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <title>INSERT DATABASE</title>
    <style>
        body{
            text-align:center;
        }
    .c {
        border : 5px solid black;
        text-align: center;  
        width :400px;
        height : 290px; 
        bottom:-50px;     
    }
    .form-group
    {
    margin-left:100px;
    }
    .form-group input{
        padding: -5px -5px;
    }
    
    </style>
    </head>
    <body>
    <div class="container c">
        <div class="row">
        <div class="col-sm-5">
            <form action="" method="POST">
            <div class="form-group">
            
            
                <input type="text" name="id" id="id" placeholder="Enter ID"><br><br>
                    
               
                <input type="text" name="name" id="name" placeholder="Enter Name"><br><br>
                
               
                <input type="text" name="roll" id="roll" placeholder="Enter RollNo"><br><br>
            
                
                <input type="text" name="add" id="add" placeholder="Enter Address"><br><br>
                
                
                <button type="submit" class="btn btn-success" name="submit">SUBMIT</button>

                </div> 
                    
                </form>
           <?php
           if(isset($_REQUEST['submit']))
           {
               if(($_REQUEST['id'] == "") ||($_REQUEST['name'] == "") || ($_REQUEST['roll'] == "") || ($_REQUEST['add'] == ""))
               {
                   echo "fill all fileds<hr>";
               }
               else
               {
                   $id=$_REQUEST['id'];
                   $name=$_REQUEST['name'];
                   $roll=$_REQUEST['roll'];
                   $add=$_REQUEST['add'];

           
                   $sql= "INSERT INTO student1 (id,name, roll, address) VALUES('$id','$name','$roll','$add')";
           
                   if(mysqli_query($conn,$sql))
                   {
                       echo "<b>new record inserted</b>";
                   }
                   else
                   {
                       echo "<b>not inserted data</b>";
                   }
               }
           }
           ?>
            </div>
        </div>
        </div>
        
    </body>
    </html>
 <?php
 $sql= "SELECT * FROM student1";
 $result= mysqli_query($conn,$sql);
 if(mysqli_num_rows($result)>0)
 {
     echo '<table class="table table-striped table-hover table-dark">';
     echo "<thead>";
     echo "<tr>";
     echo "<th>ID</th>";
     echo "<th>NAME</th>";
     echo "<th>ROLL NO</th>";
     echo "<th>ADDRESS</th>";
     
     echo "</tr>";
     echo "</thead>";
     echo "<tbody>";

     while($row = mysqli_fetch_assoc($result))
     {
        echo "<tr>";
        echo "<td>" . $row["id"]. "</td>";
        echo "<td>" . $row["name"]. "</td>";
        echo "<td>" . $row["roll"]. "</td>";
        echo "<td>" . $row["address"]. "</td>";
        
        
    }
     echo "<hr>";
    }
     else
     {
         echo "0 results";
     }

 
?>
</tbody>






