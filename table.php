<?php

$con = new mysqli("localhost", "root", "", "legister form");


if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}


$sql = "SELECT firstname, secondname, email FROM legister";
$result = $con->query($sql);

echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>User Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            padding: 20px;
            background-color: #f4f4f4;
            text-align: center;
        }
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background: white;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        th, td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background: #007bff;
            color: white;
        }
        tr:nth-child(even) {
            background: #f2f2f2;
        }
        tr:hover {
            background: #ddd;
        }
    </style>
</head>
<body>
    <h2>User Data</h2>";


if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>First Name</th>
                <th>Second Name</th>
                <th>Email</th>
            </tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['firstname']) . "</td>
                <td>" . htmlspecialchars($row['secondname']) . "</td>
                <td>" . htmlspecialchars($row['email']) . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "<p>No records found!</p>";
}

echo "</body></html>";


$con->close();
?>
