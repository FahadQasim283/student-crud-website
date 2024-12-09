<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop</title>
    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<div class="container" m-5>
    <h2>List of Clients</h2>
    <a btn btn-primary href="create.php" role="button">New Client</a>
</div>
<div class="table">
    <table>
        <thead>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Created AT</th>
            <th>Action</th>
        </thead>
        <tbody>
            <?php
            $serverName = 'localhost';
            $serverPort = 0;
            $userName = 'root';
            $userPassword = '';
            $database = 'myshop';
            try {
                $connect = new mysqli($serverName, $userName, $userPassword, $database,);
            } catch (mysqli_sql_exception $e) {
                echo "" . $e->getMessage() . "";
                die('connection failed');
            }
            //now reading data from database
            try {
                $sql = "SELECT * FROM clients";
                //get all rows from clients table
                $result = $connect->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[email]</td>
                        <td>$row[phone]</td>
                        <td>$row[address]</td>
                        <td>$row[created_at]</td>
                        <td>
                            <a href='edit.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a>
                            <a href='delete.php?id=$row[id]'class='btn btn-danger btn-sm'>Delete</a>
                        </td>
                    </tr>
                            ";
                    }
                }
            } catch (mysqli_sql_exception $e) {
                die("Error! " . $e->getMessage() . "");
            }
            ?>

        </tbody>
    </table>
</div>

<body>

</body>

</html>