<?php include("connection.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style.css">
    <title>PHP CRUD Operations</title>
</head>
<body>

<a href="http://localhost/crud/display.php" class="button">Records</a>

<div class="container">
    <form action="#" method="POST">
        <div class="title">Registration Form</div>

        <div class="form">
            <div class="input_field">
                <label>First Name</label>
                <input type="text" class="input" name="fname" pattern="[A-Za-z]{2,}" placeholder="First Name" title="Only letters allowed" required>
            </div>

            <div class="input_field">
                <label>Last Name</label>
                <input type="text" class="input" name="lname" pattern="[A-Za-z]{2,}" placeholder="Last Name" title="Only letters allowed" required>
            </div>

            <div class="input_field">
                <label>Password
                    
                </label>
                <input type="password" class="input" name="password" pattern=".{8,}" placeholder="Password" title="Password must be at least 8 characters"  required>
            </div>

            <div class="input_field">
                <label>Confirm Password</label>
                <input type="password" class="input" name="conpassword" pattern=".{8,}" placeholder="Confirm Password" title="Password must be at least 8 characters" required>
            </div>

            <div class="input_field">
                <label>Gender</label>
                <div class="costom_select">
                    <select name="gender" required>
                        <option value="">Select</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
            </div>

            <div class="input_field">
                <label>Email Address</label>
                <input type="email" class="input" name="email" pattern="[a-z0-9._%+-]+@gmail\.com$" placeholder="Chonde@gmail.com" title="Email must end with @gmail.com" required>
            </div>

            <div class="input_field">
                <label>Phone Number</label>
                <input type="text" class="input" name="phone"  pattern="\d{10}" placeholder="Phone Number" title="Phone number must be 10 digits" required>
            </div>

            <div class="input_field">
                <label style="margin-right: 65px;">Caste</label>
                <input type="radio" name="r1" value="General" required><label>General</label>
                <input type="radio" name="r1" value="OBC"><label>OBC</label>
                <input type="radio" name="r1" value="SC"><label>SC</label>
                <input type="radio" name="r1" value="ST"><label>ST</label>
            </div>

            <div class="input_field">
                <label style="margin-right: 50px;">Language</label>
                <input type="checkbox" name="language[]" value="Marathi"><label>Marathi</label>
                <input type="checkbox" name="language[]" value="Hindi"><label>Hindi</label>
                <input type="checkbox" name="language[]" value="English"><label>English</label>
            </div>

            <div class="input_field">
                <label>Address</label>
                <textarea class="textarea" name="address" placeholder="Adderss" required></textarea>
            </div>

            <div class="input_field terms">
                <label class="check">
                    <input type="checkbox" required>
                    <span class="checkmark"></span>
                </label>
                <p>Agree to terms and conditions</p>
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
if (isset($_POST['register'])) {
    $fname   = $_POST['fname'];
    $lname   = $_POST['lname'];
    $pwd     = $_POST['password'];
    $cpwd    = $_POST['conpassword'];
    $gender  = $_POST['gender'];
    $email   = $_POST['email'];
    $phone   = $_POST['phone'];
    $caste   = $_POST['r1'];
    $lang    = isset($_POST['language']) ? $_POST['language'] : [];
    $lang1   = implode(",", $lang);
    $address = $_POST['address'];

    // Validate password match
    if ($pwd !== $cpwd) {
        echo "<script>alert('Passwords do not match.');</script>";
        exit;
    }

    // Insert into database
    $query = "INSERT INTO FORM (fname, lname, password, cpassword, gender, email, phone, caste, language, address)
              VALUES ('$fname', '$lname', '$pwd', '$cpwd', '$gender', '$email', '$phone', '$caste', '$lang1', '$address')";

    $data = mysqli_query($conn, $query);

    if ($data) {
        // echo "<script>alert('Data Inserted into Database');</script>";
     // Redirect to display.php after successful insertion
    header("Location: display.php");
    exit;
    } else {
        echo "<script>alert(' Failed');</script>";
    }
}
?>

