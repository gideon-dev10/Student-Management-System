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
$studentID=$_GET['studentID'];
$sql = "DELETE FROM students
        WHERE studentID='$studentID'
";
if(mysqli_query($conn,$sql)){
    header("Location: ViewStudent.php");
    exit();
}else{
    echo "Error: " . mysqli_error($conn);
}
?>