
<?php
$conn = mysqli_connect(
     "localhost",
    "root",
    "",
    "student_db"
);
   
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
$studentID = $_GET['studentID'];
echo "Student ID received: " . $studentID . "<br>";


$sql = "SELECT * FROM students
        WHERE studentID='$studentID'";
        echo $sql . "<br>";

$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

echo "<pre>";
print_r($row);
echo "</pre>";
?>
<?php
if(isset($_POST['update'])){

    $fname = $_POST['fname'];
    $mname = $_POST['mname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    $update = "UPDATE students
               SET
               fname='$fname',
               mname='$mname',
               lname='$lname',
               email='$email',
               phone='$phone'
               WHERE studentID='$studentID'";

    if(mysqli_query($conn, $update)){

        header("Location: ViewStudent.php");
        exit();

    }else{

        echo mysqli_error($conn);

    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
</head>
<body>

<h2>Edit Student</h2>

<form method="POST">

    First Name:
    <input type="text" name="fname"
    value="<?php echo $row['fname']; ?>">
    <br><br>

    Middle Name:
    <input type="text" name="mname"
    value="<?php echo $row['mname']; ?>">
    <br><br>

    Last Name:
    <input type="text" name="lname"
    value="<?php echo $row['lname']; ?>">
    <br><br>

    Email:
    <input type="email" name="email"
    value="<?php echo $row['email']; ?>">
    <br><br>

    Phone:
    <input type="text" name="phone"
    value="<?php echo $row['phone']; ?>">
    <br><br>

    <button type="submit" name="update">
        Update Student
    </button>

</form>

</body>
</html>