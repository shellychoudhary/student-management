<?php
$servername="localhost";
$username="root";
$password="";
$dbname="sms";
$con=mysqli_connect($servername,$username,$password,$dbname);
if($con)
{

}
else
{
     die("Couldn't connect to Database".mysqli_connect_error($con));
}

?>