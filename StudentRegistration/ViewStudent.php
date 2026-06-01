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
$sql = "SELECT * FROM students";
$result = mysqli_query($conn,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registered Students</title>
    <style>
        table{
            border-collapse: collapse;
            width: 100%;

        }
        body{
            font-family: Arial, sans-serif;
        }
        th,td{
            border: 1px solid black;
            padding: 8px;
            text-align: left;

        }
        th{
            background-color: #09F;
            color: white;
        }
        #edit:hover{
            background-color: green;
            color: white;
            
        }
        #delete:hover{
            background-color:red;
            color:white;

        }
         
        
    </style>
</head>
<body>
    <form method="GET">
    <input type="text" name="search" placeholder="Search by Student ID">
    <button type="submit">Search</button>
</form>
<?php
if(isset($_GET['search'])){
    $search = $_GET['search'];
    echo "Searching for: " . $search . "<br>";
    $sql = "SELECT * FROM students
            WHERE studentID LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);

    echo "Rows found: " . mysqli_num_rows($result);
}else{
    $sql = "SELECT * FROM students";
    $result = mysqli_query($conn,$sql);
}

?>
    <table>
        
        <tr>
        
        <th>id</th>
        <th>Student ID</th>
        <th>Full Name</th>
        <th>Department</th>
        <th>Level</th>
        <th>Email</th>
        <th>Phone Number</th>
        <th>Admission Type</th>
        <th>State of Residence</th>
        <th>Action</th>
        <th>Delete</th>
    </tr>
 <?php
   
     while($row = mysqli_fetch_assoc($result)){
           echo "<tr>";
           echo "<td>" . $row['id'] . "</td>";
           echo"<td>" . $row['studentID'] . "</td>";
           echo"<td>". 
           $row['fname']." ". 
           $row['mname']." ". 
           $row['lname']. 
       "</td>";

          
          echo "<td>" . $row['department'] . "</td>";
          echo "<td>" . $row['level'] . "</td>";
          echo "<td>" . $row['email'] . "</td>";
          echo "<td>" . $row['phone'] . "</td>";
          echo "<td>" . $row['admission'] . "</td>";
          echo "<td>" . $row['state'] . "</td>";

         echo "<td id='edit'><a id='button' href='EditStudents.php?studentID=".$row['studentID']." '>Edit</a></td>";
         echo"<td id='delete'><a href='DeleteStudent.php?studentID=".$row['studentID']."'onclick=\"return confirm('Are you sure you want to delete this student?')\">Delete</a></td>";
          

        echo "</tr>";
}
?>

</table>
    
</body>
</html>

