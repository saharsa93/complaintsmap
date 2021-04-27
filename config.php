<?php


return [
	"db" => [
		"server" => "localhost",
		"dbname" => "admin_sabeti",
		"user" => "admin_sabeti",
		"pass" => "HNJ1AONxtavlbEKu",
	],
];


$server = mysqli_connect("localhost", "admin_sabeti", "HNJ1AONxtavlbEKu", "admin_sabeti");


if(!$server){
    echo "connection lost";
} else {
    echo "connection successful";
}

$myquery = "select phone,latitude,longitude from users";
$query = mysqli_query($server, $myquery);
if(!$query){
    echo mysqli_error($server);
} else {
    echo "query listed";
}
?>