<?php
$db = new mysqli("localhost", "root", "", "jquery_crud");

$raw = $db->query("SELECT * FROM students");

$table = "<table border='1'><tr><th>Name</th><th>Address</th></tr>";
$rows = "";
while ($record = $raw->fetch_assoc()) {
    $rows .= "<tr><td>" . $record['name'] .
        "</td><td>" . $record['address'] . "</td></tr>";
}

$table .= $rows;
$table .= "</table>";

echo $table;
