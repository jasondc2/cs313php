<?php 

    $age = $gender = $race = $residence = "";

    if($_POST["action"] == "Submit")
    {
        echo "<center><h1>Survey Submitted</h1></center>";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

        if(isset($_POST['age'])){

            $age = $_POST["age"];

        }

        if(isset($_POST['gender'])){

            $gender = $_POST["gender"];

        }

        if(isset($_POST['race'])){

            $race = $_POST["race"];

        }

        if(isset($_POST['residence'])){

            $residence = $_POST["residence"];

        }

        }
    }
    else
    {
        echo "<center><h1>Survey Saved</h1></center>";
        $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
        $age = $_POST["age"];
        fwrite($myfile, $age);
        $gender = $_POST["gender"];
        fwrite($myfile, $gender);
        $race = $_POST["race"];;
        fwrite($myfile, $race);
        $residence = $_POST["residence"];;
        fwrite($myfile, $residence);
        fclose($myfile);
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