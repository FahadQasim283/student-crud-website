<?php
$userName = '';
$email = '';
$phone = '';
$address = '';
$errormsg = '';
$successmsg = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userName = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    do {
        if (empty($userName) || empty($email) || empty($phone) || empty($address)) {
            $errormsg = 'All fields are required';
            break;
        }
        // You can add database insertion logic here.

        // Clear form fields after successful submission.
        $userName = '';
        $email = '';
        $phone = '';
        $address = '';
        $errormsg = '';
        $successmsg = 'Data added successfully';
    } while (false);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyShop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h2>List of Clients</h2>
        <a class="btn btn-primary" href="create.php" role="button">New Client</a>
        <?php if (!empty($errormsg)) : ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <strong><?php echo $errormsg; ?></strong>
                <button class="btn-close" data-bs-dismiss="alert" aria-label="Close" type="button"></button>
            </div>
        <?php endif; ?>
    </div>
    <div class="container mt-5">
        <h2>New Client</h2>
        <form method="POST">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($userName); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($email); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Phone Number</label>
                <input type="text" class="form-control" name="phone" value="<?php echo htmlspecialchars($phone); ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Address</label>
                <input type="text" class="form-control" name="address" value="<?php echo htmlspecialchars($address); ?>">
            </div>
            <?php if (!empty($successmsg)) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong><?php echo $successmsg; ?></strong>
                    <button class="btn-close" data-bs-dismiss="alert" aria-label="Close" type="button"></button>
                </div>
            <?php endif; ?>
            <div class="mb-3">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
            <div class="mb-3">
                <a class="btn btn-outline-primary" href="index.php">Cancel</a>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>