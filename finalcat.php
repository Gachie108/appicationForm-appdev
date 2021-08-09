<html>
    <head>
        <title>Message</title>
    </head>
    <body>
        <?php
            $connect=mysqli_connect("localhost","root","","PHP");
            $first_name=mysqli_real_escape_string($connect, $_POST['first_name']);
            $last_name=mysqli_real_escape_string($connect, $_POST['last_name']);
            $phone_number=mysqli_real_escape_string($connect, $_POST['phone_number']);
            $email=mysqli_real_escape_string($connect, $_POST['email']);
            $country=mysqli_real_escape_string($connect, $_POST['country']);
            $county=mysqli_real_escape_string($connect, $_POST['county']);
            $id=mysqli_real_escape_string($connect, $_POST['id']);
            $date=mysqli_real_escape_string($connect, $_POST['date']);
            $gender=mysqli_real_escape_string($connect, $_POST['gender']);
            $level=mysqli_real_escape_string($connect, $_POST['level']);
           
            $course=mysqli_real_escape_string($connect, $_POST['course']);


            $table="INSERT INTO form(first_name, last_name, phone_number, email, country,county,id,date,gender, level,course)
            VALUES('$first_name','$last_name' ,'$phone_number','$email','$country','$county','$id','$date','$gender','$level','$course')";

            if(mysqli_query($connect,$table))
            {
                echo "Data Saved!";
            }
            else
            {
                echo "Data not saved!".mysqli_error($connect);
            }

            $headers="From:appdev@spu.ac.ke";
            $subject="Successful";
            $message="Dear $last_name $first_name, Your application has been successfully submitted for $course. Please await the outcome in two weeks time . Yours Registrar";

            mail($email, $subject, $message, $headers);
        ?>
    </body>
</html>