<?php 

    $age = $gender = $race = $residence = "";


        if(isset($_POST['age'])){

            $major = $_POST["age"];

        }

        if(isset($_POST['gender'])){

            $major = $_POST["gender"];

        }

        if(isset($_POST['race'])){

            $major = $_POST["race"];

        }

        if(isset($_POST['residence'])){

            $major = $_POST["residence"];

        }

    }



?>



<html>

<body>

    <a href="Survey.html">Back to Form</a><br><br>

    <b>Age:</b> <?php echo $age; ?><br><br>

    <b>Gender:</b> <?php echo $gender; ?><br><br>

    <b>Race:</b> <?php echo $race; ?><br><br>

    <b>Residence:</b> <?php echo $residence; ?><br><br>

    <br>

    <h3>Thank You</h3>



</body>

</html>