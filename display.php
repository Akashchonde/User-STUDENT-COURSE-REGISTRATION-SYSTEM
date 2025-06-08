<?php include("connection.php"); ?>
 
 <html>
    <head>
        <title>Display</title>
        <style>
           body
           {
               background: #D071f9;
           }  
           table
           {
               background-color: White;
           }
           .update,.delete
           {
            background-color:green;
            color:white;
            border:0;
            outline:none;
            border-radius:5px;
            height: 23px;
            width:80px;
            font-weight:bold;
            cursor:pointer;
           }

           .delete
           {
            background-color:red;
            
           }
        </style>
    </head>
<body>
    <!-- <h1>HII</h1> -->
    <?php
// include("connection.php");
// error_reporting(0);

$query ="SELECT * FROM form";
$data = mysqli_query($conn, $query);

// echo $data;

$total =mysqli_num_rows($data);


    ?>
<a href="http://localhost/crud/form.php" class="button">Form</a>
     
     <h2 align="center"><mark>Displaying All Records</mark></h2>
     <center><table border="1" cellspacing="7" width="100%">
        <tr>
        <th width="5%">ID</th>
        <th width="8%">First Name</th>
        <th width="8%">Last Name</th>
        <th width="10%">Gender</th>
        <th width="20%">Email</th>
        <th width="10%">Phone</th>
        <th width="10%">caste</th>
        <th width="10%">Languages</th>
        <th width="24%">Address</th>
        <th width="25%">Operations</th>
        </tr>  

    <?php
    while($result = mysqli_fetch_assoc($data))
    {
     echo "<tr>
           <td>".$result['id']."</td>
           <td>".$result['fname']."</td> 
           <td>".$result['lname']."</td>
           <td>".$result['gender']."</td>
           <td>".$result['email']."</td>
           <td>".$result['phone']."</td>
           <td>".$result['caste']."</td>
           <td>".$result['language']."</td>
           <td>".$result['address']."</td>

           <td><a href='update_design.php?id=$result[id]'><input type='Submit' value='Upate' class='update'></a> 
          
              <a href='delete.php?id=$result[id]'><input type='Submit' value='delete' class='delete' onclick ='return checkdelete()'></a> </td>

           </tr>
          ";
    }
// else
// {
//     each"NO records found";
// }

?>
</table>
</center>

    <script>
        function checkdelete()
        {
         return confirm('Are you Sure your want to delete this record ?');
        }
    </script>

 