<?php include("connection.php");

// echo 'hi';
$id = $_GET['id'];
// echo $id;
//  echo '2';
$query ="SELECT * FROM form where id='$id'";
$data = mysqli_query($conn, $query);
// $total =mysqli_num_rows($data);
$result = mysqli_fetch_assoc($data);
// print_r($result);
// exit;
$language =$result['language'];
$language1 =explode(",",$language);

?>

<!Doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="Viewport" content= "width=device-width,inital-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css" >
    <title>pHP CRUD Operations</title>
</head>

<body>
    <div class="container">
     <form action="#" method="POST">
    <div class="title">
            Update Student Details
    </div>

  <div class="form">
      <div class="input_field">
         <label> First Name </label>
           <input type="text" value="<?php echo $result['fname']; ?>" class="input" name="fname" pattern="[A-Za-z]{2,}" placeholder="First Name" title="Only letters allowed" required>
        </div>

        <div class="input_field">
         <label> Last Name </label>
           <input type="text" value="<?php echo $result['lname']; ?>" class="input" name="lname" pattern="[A-Za-z]{2,}" placeholder="Last Name" title="Only letters allowed" required>
        </div>

        <div class="input_field">
         <label>Password</label>
           <input type="password" value="<?php echo $result['password']; ?>" class="input" name="password" pattern=".{8,}" placeholder="Password" title="Password must be at least 8 characters"  required>
        </div>

        <div class="input_field">
         <label>confirm password</label>
           <input type="password" value="<?php echo $result['cpassword']; ?>" class="input" name="conpassword" pattern=".{8,}" placeholder="Confirm Password" title="Password must be at least 8 characters" required>
        </div>

        <div class="input_field">
         <label>Gender</label>
         <div  class="costom_select">

         <select name="gender" required>
                <option value="">select</option>
      
                <option value="male"
                    <?php
                     if ($result['gender'] =='male')
                     {
                        echo"selected";
                     }
                    ?>  
                >
                Male</option>
                <option value="female"
                    <?php
                     if ($result['gender'] =='female')
                     {
                        echo"selected";
                     }
                    ?>
                >
                Female</option>
    
               </select>

     </div>
     </div>

        <div class="input_field">
         <label> Email address </label>
           <input type="text" value="<?php echo $result['email']; ?>" class="input" name="email" pattern="[a-z0-9._%+-]+@gmail\.com$" placeholder="Chonde@gmail.com" title="Email must end with @gmail.com" required>
        </div>

        <div class="input_field">
         <label> Phone number </label>
           <input type="text" value="<?php echo $result['phone']; ?>" class="input" name="phone" pattern="\d{10}" placeholder="Phone Number" title="Phone number must be 10 digits" required>
        </div>

        <div class="input_field">
         <label style="margin-right: 70px;"> caste </label>
           <input type="radio" name="r1" value="General" required
           
           <?php
            //   if ($result[caste]=="General")
            if ($result['caste'] == "General")

              {
                echo"checked";
              }
           ?>

           >
           
           <label style="margin-left: 5px;">General</label>
           <input type="radio" name="r1" value="OBC" required
           
           <?php
            //   if ($result[caste]=="OBC")
            if ($result['caste'] == "OBC")  
            {
                echo"checked";
              }
           ?>
           >
           <label style="margin-left: 5px;">OBC</label>
           <input type="radio" name="r1" value="SC" required
           
           <?php
            //   if ($result[caste]=="SC")
            if ($result['caste'] == "SC")  
            {
                echo"checked";
              }
           ?>
           >
           <label style="margin-left: 5px;">SC</label>
           <input type="radio" name="r1" value="ST" required
           
           <?php
            //   if ($result[caste]=="ST")
            if ($result['caste'] == "ST")  
            {
                echo"checked";
              }
           ?>
           >
           <label style="margin-left: 5px;">ST</label>

        </div>

         <div class="input_field">
         <label style="margin-right: 50px;"> Language </label>
           <input type="checkbox" name="language[]" value="Marathi" 
           
           <?php
         //  if(in_array(Marathi,$language1)) 
         if (in_array('Marathi', $language1))
 
         {
            echo"checked";
          }
           ?>

           >
           <label style="margin-left: 5px;">Marathi</label>
           <input type="checkbox" name="language[]" value="Hindi" 
           
            <?php
         //  if(in_array(Hindi,$language1)) 
         if (in_array('Hindi', $language1))

         {
            echo"checked";
          }
           ?>
           
           >
           <label style="margin-left: 5px;">Hindi</label>
           <input type="checkbox" name="language[]" value="English" 
           
            <?php
         //  if(in_array(English,$language1)) 
         if (in_array('English', $language1))

         {
            echo"checked";
          }
           ?>
           

           >
           <label style="margin-left: 5px;">English</label>

        </div>


        <div class="input_field">
         <label> Address </label>
          <textarea  class="textarea" name="address"required>
            <?php echo $result['address'];?></textarea>
        </div>

        <div class="input_field terms">
           <label class= "check">
            <input type="checkbox" required>
            <spam class="checkmark"></span>
         </label>
         <p> Agree to terms and conditions </p>
        </div>

        <div class="input_field">
            <input type="submit" value="Update Details" class="btn" name="update">
        </div>
      </div>
   </form>
  </div>
</body>

</html>


 <?php
  if (isset($_POST["update"])) {

  // if($_POST["register"])
 {
    $fname   =$_POST['fname'];
    $lname   =$_POST['lname'];
    $pwd     =$_POST['password'];
    $cpwd    =$_POST['conpassword'];
    $gender  =$_POST['gender'];
    $email   =$_POST['email'];
    $phone   =$_POST['phone'];
    $caste   =$_POST['r1'];

    $lang   =$_POST['language'];
    $lang1  =implode(",",$lang);

    $address =$_POST['address'];
  
   //   $query ="INSERT INTO FORM (fname,lname,password,cpassword,gender,email,phone,address) VALUES('$fname','$lname', '$pwd','$cpwd','$gender','$email','$phone','$address' )";
   //  $query="update form set fname='$fname',lname='$lname',password='$pwd',cpassword='$cpwd',gender='$gender',email='$email',phone='$phone',address='$address'WHERE id=$id'";
   $query = "UPDATE form SET fname='$fname', lname='$lname', password='$pwd', cpassword='$cpwd', gender='$gender', email='$email', phone='$phone', caste='$caste',language='$lang1' ,address='$address' WHERE id='$id'";


    $data = mysqli_query($conn,$query);

    print_r($data);

     if($data) 
     {
       echo "<script>alert('Record Update')</script>";
       ?>
      <meta http-equiv="refresh" content ="0; url = http://localhost/crud/display.php"/>
      <?php
     }
     else
     {
        echo "Failed";
     }
    }
   }
?>