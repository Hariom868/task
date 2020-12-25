<?php
define('server','localhost');// defining hostname
define('username','root'); // defining username
define('password' ,''); // defining Password
define('databasename', 'list');// defining database name
class Database_Connection
{
        // it is a constructor
function __construct()
{
$connection = mysqli_connect(server,username,password,databasename);
$this->dbhost=$connection;
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
}
// Here is the function for signup which we will callout when we do signup
public function insertionvalue($name,$type,$date,$userlist)
{
$adding=mysqli_query($this->dbhost,"insert into expenses(name,type,date,list_name) values('$name','$type','$date','$userlist')");
return $adding;
}
public function insertion()
{
        $adding = mysqli_query($this->dbhost,"SELECT DISTINCT list_name from expenses");
        return $adding;
}  
public function viewing1($how)
{
$viewing = mysqli_query($this->dbhost,"select * from expenses where type='$how'");
return $viewing;
}
public function viewing($how)
{
        $viewing = mysqli_query($this->dbhost,"select * from expenses where NOT (type = '$how')");
        return $viewing;
}
public function viewing2($how)
{
        $viewing = mysqli_query($this->dbhost,"select * from expenses where list_name='$how'");
        return $viewing;      
}
}

?>
