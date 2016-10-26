<html>
<body>

<?php

// default Heroku Postgres configuration URL
$dbUrl = getenv('DATABASE_URL');

if (empty($dbUrl)) {
 // example localhost configuration URL with postgres username and a database called cs313db
 $dbUrl = "postgres://postgres:password@localhost:5432/cs313db";
}

$dbopts = parse_url($dbUrl);

//print "<p>$dbUrl</p>\n\n";

$dbHost = $dbopts["host"]; 
$dbPort = $dbopts["port"]; 
$dbUser = $dbopts["user"]; 
$dbPassword = $dbopts["pass"];
$dbName = ltrim($dbopts["path"],'/');

//print "<p>pgsql:host=$dbHost;port=$dbPort;dbname=$dbName</p>\n\n";

//$className = $classGrade = $dueDate = $startDate = $completeDate = $expectedGrade = $receivedGrade = $expectedTime = $actualTime = "";

    
/*if (isset($_POST) && !empty($_POST)){
	if($_POST['form'] == 'form1') {
	if(!empty($_POST[''])){
                $topics = $_POST["topics"];
                        if(in_array("0", $topics)){
                            if($_POST["Other"] != ""){
                                $newTopic = $_POST["Other"];
                            }
                            else{
                                $topicErr = "Please provide a topic next to the selected checkbox";
                            }
                        }
            }
            else{
                $topicErr = "Please select a topic";
            }	*/

try {
 $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);
}
catch (PDOException $ex) {
 print "<p>error: $ex->getMessage() </p>\n\n";
 die();
}

if($_POST["getData"] == "Classes")
{
	print '<p><strong>Name   Grade</strong>';

	foreach ($db->query('SELECT name, grade FROM class') as $row)
	{
		print '<p>' . $row['name'] . ' ' . $row['grade'] . '%';
		print '<p>';
	}
}
else if($_POST["getData"] == "Dates")
{
	print '<p><strong>Due     Start     Complete</strong></p>';

	foreach ($db->query('SELECT due, start, complete FROM date') as $row)
	{	
 		print '<p>' . $row['due'] . ' ' . $row['start'] . ' ' . $row['complete'];
 		print '<p>';
	}
}
else if($_POST["getData"] == "Grades")
{
	print '<p><strong>Expected Received</strong>';

	foreach ($db->query('SELECT expected, received FROM grade') as $row)
	{
 		print '<p>' . $row['expected'] . '%   ' . $row['received'] . '%';
 		print '<p>';
	}
}
else if($_POST["getData"] == "Time")
{
	print '<p><strong>Expected Actual</strong>';

	foreach ($db->query('SELECT expected, actual FROM time') as $row)
	{
		print '<p>' . $row['expected'] . ' Hours ' . $row['actual'] . ' Hours';
 		print '<p>';
	}
}

 $db->exec("INSERT INTO class (name) VALUES ('$newTopic')");

?>

</body>
</html>