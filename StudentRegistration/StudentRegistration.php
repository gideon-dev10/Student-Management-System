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
$name=$department=$mname=$lname=$num=$admission=$relationship=$level=$studentID=$gname=$state=$address=$tel=$email=$gender=$dob=$haddress="";
$error="";
if(isset($_POST['submitted'])){
    $name = trim($_POST['name']);
    $department = trim($_POST['department']);
    $mname = trim($_POST['mname']);
    $lname = trim($_POST['lname']);
    $num = trim($_POST['num']);
    $admission = trim($_POST['admission']);
    $relationship = trim($_POST['relationship']);
    $level = trim($_POST['level']);
    $studentID = trim($_POST['studentID']);
    $state = trim($_POST['state']);
    $address = trim($_POST['address']);
    $tel = trim($_POST['tel']);
    $email = trim($_POST['email']);
    $gender = trim($_POST['gender']);
    $dob = trim($_POST['dob']);
    $haddress = trim($_POST['haddress']);
    $gname = trim($_POST['gname']);


      if(empty($name)|| empty($mname)||empty($lname)){
        $error = "The above fields must be filled";
    }

}
if(!empty($error)){
    echo $error;
}

if(isset($_POST['submitted'])&& empty($error)){
    $check = "SELECT * FROM students
          WHERE studentID='$studentID'";

$result = mysqli_query($conn, $check);
if(mysqli_num_rows($result) > 0){

    echo "Student ID already exists.";

}else{

 $sql = "INSERT INTO students(
        fname,
        mname,
        lname,
        dob,
        gender,
        phone,
        email,
        address,
        state,
        studentID,
        department,
        level,
        admission,
        gname,
        relationship,
        guardian_phone,
        guardian_address

     )
       

VALUES(
    '$name',
    '$mname',
    '$lname',
    '$dob',
    '$gender',
    '$tel',
    '$email',
    '$address',
    '$state',
    '$studentID',
    '$department',
    '$level',
    '$admission',
    '$gname',
    '$relationship',
    '$num',
    '$haddress'

)";
if(mysqli_query($conn, $sql)){
        header("Location: success.php");
        exit();
    }else{
        echo "Error" . mysqli_error($conn);
    }

    // INSERT query here
}
    
}


// echo"<strong>Registration Successful!!!</strong><br>";
    // echo"Full name: ".$name." ".$mname." ".$lname."<br>";
    // echo"Matric number: ".$studentID."<br>";
    // echo"Department: ".$department."<br>";
    // echo"Admission Type: ".$admission."<br>";
    // echo"State of Residence: ".$state."<br>";
    // echo"Level: ".$level."<br>";
    // echo"Phone Number: ".$tel."<br>";
    // echo"Email: ".$email."<br>";
    // echo"Date of Birth: ".$dob."<br>";
    // echo"Gender: ".$gender."<br>";
    // echo"Address: ".$address."<br>";
    // echo"Sponsor/Guardian name: ".$gname."<br>";
    // echo"Relationship: ".$relationship."<br>";
    // echo"Address: ".$haddress."<br>";
    // echo"Phone Number: ".$num."<br>";

    



// {
//     echo"<strong>Registration Successful</strong>";
// }else{
//     echo "Error: " . mysqli_error($conn);
// }
?>
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style type="text/css">
        h1{
            color: #09F;
            text-align: center;
        
        }
        body{
            background-color: #f2f2f2;
            font: 1em sans-serif;
            
        }
        fieldset{
            width: 70%;
            margin: auto;
            background-color: white;
            padding: 20px;
            border-radius: 10px;
            border: none;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        input[type=text],
        input[type=email],
        input[type=date],
        select,
        textarea{
            width: 100px;
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 15px;
            box-sizing: 40px;
            /* box-sizing: border-box; */
        }
        button{
            background-color: green;
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover{
            background-color: grey;
        }
        label{
            font-weight: bold;
        }
    </style>
</head>
<body>
    
    <form method="POST"action="">
        <fieldset>
            <h1>Student Registration Form</h1> <br>
            <label for="First name">First name: </label>
            <input type="text"name="name"required> <br> <br>
            <label for="Middle name">Middle name: </label>
            <input type="text"name="mname"required> <br> <br>
            <label for="Last name">Last name:</label>
            <input type="text"name="lname"required> <br> <br>
            <label for="Date of Birth">Date of Birth:</label>
            <input type="date" id="dob" name="dob"> <br> <br>
            <label for="Gender">Gender:
                Male <input type="radio" name="gender"value="Male">
                Female <input type="radio" name="gender"value="Female">
            </label> <br> <br>
            <label for="phone number">Phone number: </label>
            <input type="text"name="tel"> <br><br>
            <label for="email">Email:</label>
            <input type="email"name="email"> <br><br>
            <label for="Home Address">Home Address: </label>
            <textarea name="address" rows="10" cols="30"></textarea> <br> <br>
            <label for="State of Origin">State of Residence:</label>
            <select name="state" id="">
                <option value="State of Origin">--select--</option>
                <option>Abia</option>
                <option>Adamawa</option>
                <option>Akwa Ibom</option>
                <option>Anambra</option>
                <option>Bauchi</option>
                <option>Bayelsa</option>
                <option>Benue</option>
                <option>Borno</option>
                <option>Cross River</option>
                <option>Delta</option>
                <option>Ebonyi</option>
                <option>Edo</option>
                <option>Ekiti</option>
                <option>Enugu</option>
                <option>Gombe</option>
                <option>Imo</option>
                <option>Jigawa</option>
                <option>Kaduna</option>
                <option>Kano</option>
                <option>Katsina</option>
                <option>Kebbi</option>
                <option>Kogi</option>
                <option>Kwara</option>
                <option>Lagos</option>
                <option>Nasarawa</option>
                <option>Niger</option>
                <option>Ogun</option>
                <option>Ondo</option>
                <option>Osun</option>
                <option>Oyo</option>
                <option>Plateau</option>
                <option>Rivers</option>
                <option>Sokoto</option>
                <option>Taraba</option>
                <option>Yobe</option>
                <option>Zamfara</option>
            </select><br><br>
            <label for="Student ID">Student ID:</label>
            <input type="text" name="studentID"><br><br>
            <label for="Department">Program/Department:</label>
            <select name="department" id="">
                <option value="">--select--</option>
                <option>Software Engineering</option>
                <option>Computer Science</option>
                <option>Information Technology</option>
                <option>Medicine & Surgery</option>
                <option>Nursing</option>
                <option>Economics</option>
                <option>Anatomy</option>
                <option>Business Administration</option>
                <option>Accounting</option>
                <option>History & International Relations</option>
                <option>International Law & Diplomacy</option>
                <option>Architecture</option>
                <option>Mass Communication</option>
                <option>Theatre Art</option>
                <option>Social Works</option>

            </select> <br><br>
            <label for="Level">Level:</label>
            <select name="level" id="">
                <option value="">--Select--</option>
                <option>100</option>
                <option>200</option>
                <option>300</option>
                <option>400</option>
                <option>500</option>
                <option>600</option>
            </select><br><br>
            <label for="Admission">Admission Type:</label>
            <select name="admission" id="">
                <option value="">--Select--</option>
                <option>Freshman</option>
                <option>Direct Entry</option>
                <option>Transfer</option>
            </select> <br><br>
            <label for="Emergency">Sponsor/guardian name:</label>
            <input name="gname"type="text" name="relationship"> <br><br>
            <label for="Relationship">Relationship:</label>
            <select name="relationship" id="">
                <option>--Select--</option>
                <option>Parent</option>
                <option>Sibling</option>
                <option>Relative</option>
            </select> <br><br>
            <label for="Number">Phone number:</label>
            <input type="text"name="num"><br><br>
            <label for="Add">Address:</label>
            <textarea name="haddress" cols="30" rows="10"></textarea> <br><br>
            <p>Confirm if the informations above are correct <input type="checkbox"></p>
            <input type="hidden"name="submitted" value="1">
            <button type="submit">Click to submit</button>

           <br><br><br>
        </fieldset>
    </form>
</body>
</html>


    