<?php
function showdetails($standard,$rollno)
{
    include 'dbcon.php';
    $standard=$_POST['class'];
    $rollno=$_POST['rollno'];
    $query="SELECT * FROM `students` WHERE `rollno` = '$rollno' AND `standard` = '$standard'";
    $run=mysqli_query($con,$query);
    if(mysqli_num_rows($run)>0)
    {
        $data=mysqli_fetch_assoc($run);
        ?>
        <table>
            <tr>
            <th colspan="3">Student Details</th>
            </tr>
            <tr>
            <td rowspan="5"> <img src="dataimg/<?php echo $data['image']; ?>" style="max-width:120px; max-height:150px"></td>
            <th>Roll No.</th>
            <td><?php echo $data['rollno']; ?></td>
            </tr>
            <tr>
            <th>Name</th>
            <td><?php echo $data['name']; ?></td>
            </tr>
            <tr>
            <th>Standard</th>
            <td><?php echo $data['standard']; ?></td>
            </tr>
            <tr>
            <th>Parent's Contact No.</th>
            <td><?php echo $data['pcont']; ?></td>
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