<?php
// basically it will include pdo1 file for data connection to the sql server
include_once('pdo1.php');
//it make a new class in the database_connection
$datainsert=new Database_Connection();
if(isset($_POST['name']) && isset($_POST['type']) && isset($_POST['date']) && isset($_POST['list']))
{
// Posted Values
$Name=$_POST['name'];
$Usertype=$_POST['type'];
$Userdate=$_POST['date'];
$Userlist=($_POST['list']);
//Function Calling
$sql=$datainsert->insertionvalue($Name,$Usertype,$Userdate,$Userlist);
if($sql)
{
// Message for successfull insertion
echo  '<div style="background-color:green"><h1 style="text-align:center;color:white">Sucess</h1></div>';
echo "<script>window.location.href='add_list.php'</script>";
}
else
{
// Message for unsuccessfull insertion
echo '<div style="background-color:red"><h1 style="text-align:center;color:white">Oops!! Try Again</h1></div>';
echo "<script>window.location.href='add_list.php'</script>";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="add.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>TO-DO-LIST | Homepage </title>
    </head>
    <body>
        <header class="axis">
            <div class="navbar">
                <a href="add_list.php">Add Task</a>
                <a href="view_task.php">View Task</a>
                <a href="view_daily.php">Daily Task</a>
                <div class="dropdown">
                <button class="dropbtn" onclick="myFunction()">All List
                  <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content" id="myDropdown">
                <?php
                $sql=$datainsert->insertion();
                while ($row=mysqli_fetch_array($sql)) 
                {
                  $r = $row['list_name']
                  ?>
                  <?php echo "<a href='view_list.php?a=".$row['list_name']."'>$r</a>"; ?>
                 <?php }?>
                
                </div>
                </div> 
              </div>
        </header>
        <br><br>
        <body>
            <section id="add__expense">
           
         
        <div class ="main">
        <h1 class="input__head">ADD TASK</h1>
            <hr />
            <div class="handle__form">
           <form method="POST">
           <input type="text" id="fname" class="adjust__first" name="name" placeholder="Name of the task">
           <input type="date" name="date" id="date">
           <input type="text" id="number" name="list" placeholder="List name">
           <select name="type" id="type">
           <option value="daily">Daily Task</option>
           <option value="One_time">One-Time-Task</option>
           </select>
           <button class="BUTTON_KMY">Add Task</button>
           </form>
            </div></div></section>
    </body>
    <script>
        function myFunction() {
          document.getElementById("myDropdown").classList.toggle("show");
        }
        window.onclick = function(e) {
          if (!e.target.matches('.dropbtn')) {
          var myDropdown = document.getElementById("myDropdown");
            if (myDropdown.classList.contains('show')) {
              myDropdown.classList.remove('show');
            }
          }
        }
        </script>
        </html>