<?php
//it is to keep admin logged in until he/she logs out voluntarily
session_start();
if(isset($_SESSION['uid']))
{
    header('location:admin/admindash.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>login:-SMS</title>
</head>
<body>
    <div class="container">
    <nav class="navbar-nav navbar-expand bg-dark">
           <div class="header header-logo display-4 text-info m-2"> 
           <a href="index.php"><img title="Back to home page" class="nav-logo img-rounded" height="100px" src="images/logo.jpg" alt="logo"> 
            </a> </div>
    </nav>
    <hr>
    <div class="row justify-content-center">
   
        <div class=" mt-2">
            <h1 class="border rounded border-dark bg-light h1 display-4" style="padding:10px">Enter Your Details</h1>
        </div>
        </div>
        <hr>
            <div class="mt-4 row justify-content-center table">
        <table>
        <form action="login.php" method="POST" class="form-group">
        <tr><td>
        <label >Username :</label></td>
        <td><input type="text" name="uname" placeholder="Enter username" required class="form-control" autocomplete="off"></td>
        </tr>
        <tr>
        <td><label >Password :</label></td>
        <td><input type="password" required name="pass" placeholder="Enter password" class="form-control" autocomplete="off"></td></tr>
        <tr>
        <td colspan="2"><input type="submit" name="login" value="Log In" class="btn btn-outline-primary form-control"></td></tr>
        </form>
        </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<?php
include 'dbcon.php';
if(isset($_POST['login']))
{
    $username=$_POST['uname'];
    $password=$_POST['pass'];
    $query="SELECT * FROM ADMIN WHERE username = '$username' AND password = '$password'";
    $run=mysqli_query($con,$query);
    $row=mysqli_num_rows($run);
    if($row<1)
    {
        ?>
        <script>
            alert('Enter correct Username or password');
            window.open('login.php','_self');
        </script>
        <?php
    }
    else
    {
        $data=mysqli_fetch_assoc($run);
        $id=$data['id'];
       // echo "id = ".$id;

        session_start();
        $_SESSION['uid']=$id;
        header('location:admin/admindash.php');
    }
}
?>