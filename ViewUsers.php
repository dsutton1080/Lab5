<?php
    $mysqli = new mysqli("mysql.eecs.ku.edu", "dsutton1080", "aeT7ooph", "dsutton1080");
    if ($mysqli->connect_error) {
        printf("Connect failed: %s\n", $mysqli->connect_error);
        exit();
    }
    else{
        $select = "select user_id from Users";

        if ($result = $mysqli->query($select)) {
            echo "
                <html>
                    <head></head>
                    <body style='text-align: center;'>
                        <h1>This is a List of All the Users</h1><br><br>
                        <table border='1'>
                            <tr>
                                <th>Users</th>
                            </tr>
            ";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>";
                echo $row["user_id"];
                echo "</td>";
                echo "</tr>";
            }
            echo "
                        </table>
                    </body>
                </html>
            ";
        }
    }
    $mysqli->close();
?>