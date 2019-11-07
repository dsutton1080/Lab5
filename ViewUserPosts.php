<?php
    $user = $_POST['user'];
    $mysqli = new mysqli("mysql.eecs.ku.edu", "dsutton1080", "aeT7ooph", "dsutton1080");
    $select = "select post_id, content from Posts where author_id='$user'";

    if ($result = $mysqli->query($select)) {
        echo "
                <html>
                    <head></head>
                    <body>
                        <table border='1'>
                            <tr>
                                <th>Post ID</th>
                                <th>Post</th>
                            </tr>
            ";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
                echo "<td>";
                    echo $row["post_id"];
                echo "</td>";
                echo "<td>";
                    echo $row["content"];
                echo "</td>";
            echo "</tr>";
        }
        echo "
                        </table>
                    </body>
                </html>
            ";
    }
    $mysqli->close();
?>