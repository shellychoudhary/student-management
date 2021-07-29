<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>SMS:- Let us manage this.</title>
</head>
<body>
   <div class="container">
        <nav class="navbar-nav navbar-expand bg-dark">
           <div class="header header-logo display-4 text-info m-2"> 
           <a href="index.php"><img class="nav-logo img-rounded" height="100px" src="images/logo.jpg" alt="logo"> 
            </a></div>
            <div class="ml-auto m-2">
                <button class= "btn btn-outline-primary "><a href="login.php">I'm an Admin</a> </button>
           </div>
        </nav>
        <hr>
        <div class="row justify-content-center">
        <div class=" mt-2 mb-2">
        <h1 class="border rounded border-dark bg-light h1 display-4" style="padding:10px">Welcome to SMS !</h1>
        </div>
        </div>
        <hr>
        <div class="row justify-content-center">
        <form action="index.php" class="form-group" method="POST">
        <table class="table">
        <tr>
        <td colspan="2" style="text-align:center"><u>Student Information</u></td>
        </tr>
        <tr>
        <td>Choose Standard
        </td>
        <td>
        <select name="class" required>
        <option value="Choose Standard">Choose Standard</option>
        <option value="1st">1st</option>
        <option value="2nd">2nd</option>
        <option value="3rd">3rd</option>
        <option value="4th">4th</option>
        <option value="5th">5th</option>
        <option value="6th">6th</option>
        </select>
        </td>
        </tr>
        <tr>
        <td>Enter Roll No.</td>
        <td><input type="text" class="form-control" name="rollno" autocomplete="off" required placeholder="Enter Roll no."></td></tr>
        <tr>
        <td colspan="2"><input class="btn btn-outline-primary form-control" name="submit" type="submit" value="Show Info"></td></tr>
        </table>
        
        </form>
        </div>
   </div> 
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
<?php
if(isset($_POST['submit']))
{
   $standard=$_POST['class'];
   $rollno=$_POST['rollno'];
   include 'dbcon.php';
   $query="SELECT * FROM `students` WHERE `rollno` = '$rollno' AND class = '$standard'";
   $run=mysqli_query($con,$query);
   if(mysqli_num_rows($run)>0)
   {
       $data=mysqli_fetch_assoc($run);
       ?>
       <table class="table row justify-content-center">
           <tr>
           <th colspan="3">Student Details</th>
           </tr>
           <tr>
           <td rowspan="5"> <img src="dataimg/<?php echo $data['image']; ?>" style="max-width:250px; max-height:250px"></td>
           <th>Roll No.</th>
           <td><?php echo $data['rollno']; ?></td>
           </tr>
           <tr>
           <th>Name</th>
           <td><?php echo $data['name']; ?></td>
           </tr>
           <tr>
           <th>Standard</th>
           <td><?php echo $data['class']; ?></td>
           </tr>
           <tr>
           <th>Parent's Contact No.</th>
           <td><?php echo $data['parents contact']; ?></td>
           </tr>
           <tr>
           <th>City</th>
           <td><?php echo $data['city']; ?></td>
           </tr>
       </table>
       <?php
   }
   else
   {
       echo "<script>alert('No Record Found.');</script>";
   }
}
?>
