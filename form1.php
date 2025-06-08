<?php include("connection.php"); ?>

<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="Viewport" content= "width=device-width,inital-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css" >
    <title>pHP CRUD Operations</title>
</head>

<body>
<a href="http://localhost/crud/display.php" class="button">Records</a>

    <div class="container">
     <form action="#" method="POST">
    <div class="title">
            Registration Form
    </div>

  <div class="form">
      <div class="input_field">
         <label> First Name </label>
           <input type="text" class="input" name="fname" required>
        </div>

        <div class="input_field">
         <label> Last Name </label>
           <input type="text" class="input" name="lname" required>
        </div>

        <div class="input_field">
         <label>Password</label>
           <input type="password" class="input" name="password" required>
        </div>

        <div class="input_field">
         <label>confirm password</label>
           <input type="password" class="input" name="conpassword" required>
        </div>

        <div class="input_field">
         <label>Gender</label>
         <div class="costom_select">
         <select name="gender" required>
                <option value="">select</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
     </select>
     </div>
     </div>

        <div class="input_field">
         <label> Email address </label>
           <input type="text" class="input" name="email" required>
        </div>

        <div class="input_field">
         <label> Phone number </label>
           <!-- <input type="text" class="input" name="phone" required> -->
           <input type="text" class="input" name="phone" required pattern="\d{10}" title="Phone number must be 10 digits">

        </div>

        <div class="input_field">
         <label style="margin-right: 60px;"> caste </label>
           <input type="radio" name="r1" value="General" required><label style="margin-left: 5px;">General</label>
           <input type="radio" name="r1" value="OBC" required><label style="margin-left: 5px;">OBC</label>
           <input type="radio" name="r1" value="SC" required><label style="margin-left: 5px;">SC</label>
           <input type="radio" name="r1" value="ST" required><label style="margin-left: 5px;">ST</label>

        </div>

        <div class="input_field">
         <label style="margin-right: 60px;"> Language </label>
           <input type="checkbox" name="language[]" value="Marathi" ><label style="margin-left: 5px;">Marathi</label>
           <input type="checkbox" name="language[]" value="Hindi" ><label style="margin-left: 5px;">Hindi</label>
           <input type="checkbox" name="language[]" value="English" ><label style="margin-left: 5px;">English</label>

        </div>

        <div class="input_field">
         <label> Address </label>
          <textarea  class="textarea" name="address" required></textarea>
        </div>

        <div class="input_field terms">
           <label class= "check">
            <input type="checkbox" required>
            <spam class="checkmark"></span>
         </label>
         <p> Agree to terms and conditions </p>
        </div>

        <div class="input_field">
            <input type="submit" value="Register" class="btn" name="register">
        </div>
      </div>
   </form>
  </div>
</body>

</html>

<?php
   if($_POST['register'])
 {
    $fname   =$_POST['fname'];
    $lname   =$_POST['lname'];
    $pwd     =$_POST['password'];
    $cpwd    =$_POST['conpassword'];
    $gender  =$_POST['gender'];
    $email   =$_POST['email'];
    $phone   =$_POST['phone'];
    $caste   =$_POST['r1'];
    $long   =$_POST['language'];
    $lang1  =implode(",",$lang);
    $address =$_POST['address'];

   //   Mobile number validation
   //  if (!preg_match("/^[0-9]{10}$/", $phone)) {
   //      echo "Phone number must be exactly 10 digits.<br>";
   //      exit;
   //  }

    // Validate passwords match
    if ($pwd !== $cpwd) {
        echo "Passwords do not match.";
        exit;
    }
     //$query ="INSERT INTO FORM (fname,lname,password,cpassword,gender,email,phone,caste,Language,address) VALUES('$fname','$lname', '$pwd','$cpwd','$gender','$email','$phone','$caste','$Language','$address' )";
       $query = "INSERT INTO FORM (fname, lname, password, cpassword, gender, email, phone, caste, language, address) VALUES('$fname', '$lname', '$pwd', '$cpwd', '$gender', '$email', '$phone', '$caste', '$lang1','$address')";

     $data = mysqli_query($conn,$query);

     if($data)
     {
       echo "Data Inserted into Database";
     }
     else
     {
        echo "Failed";
     }
    }
?>