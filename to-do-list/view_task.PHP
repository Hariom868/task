<?php
include_once('pdo1.php');// it uses the pdo1.php file into it
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta id="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="add.css">
      <link rel="stylesheet" href="index.css">
      <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="../CSS/add.css?v=<?php echo time(); ?>">
      <link rel="stylesheet" href="../CSS/expense_report.css?v=<?php echo time(); ?>">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
      <link href='https://fonts.googleapis.com/css?family=Poppins' rel='stylesheet'>
      <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <script src="https://kit.fontawesome.com/a076d05399.js"></script>
      <title>list | View task </title> </head>
      <header>
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
               $datainsert=new Database_Connection();
                $sql=$datainsert->insertion();
                while ($row=mysqli_fetch_array($sql)) {
                  $r = $row['list_name'];
                  ?>
                  <?php echo "<a href='view_list.php?a=".$row['list_name']."'>$r</a>"; ?>
                 <?php }?>
                </div>
                </div> 
              </div>
    </header>
 
  <body><br><br><br><br>
      <section id="add__expense">
          <div class ="user__inputarea">
           <h1 class="input__head">VIEW TASK</h1>
           <hr />
           <table class="expense__report__table">
            <thead>
            <tr>
              <th>S.NO.</th>
              <th> Task Name</th>
              <th> Task Date</th>
              <th> ..... </th>
            </tr>
            </thead>
            <?php
            $type = 'daily';
            $dataviewing=new Database_Connection();
              $sql = $dataviewing->viewing($type);//it basically send the value to the function viewing 
              $count=1;
                // this will continue till it have any row where there is any expenses and delete function take you to the delete.php file with Regdate to it so that it can be deleted
              while ($row=mysqli_fetch_array($sql)) {
                  ?>
                  <tbody>
                    <tr>
                      <td><?php echo $count;?></td>
                      <td><?php  echo $row['name'];?></td>
                      <td><?php  echo $row['date'];?></td>
                      <td> <?php echo "<a href='delete.php?a=".$row['RegDate']."'>Done</a>"; ?></td>
                    </tr>
                    <?php
                     $count=$count+1;
                     }?>

                  </tbody>
                </table><br><br>
         

</div>


</div>
</section>
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