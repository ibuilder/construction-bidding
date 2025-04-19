<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bid Packages List</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <?php include '../../includes/header.php'; ?>
    <?php include '../../includes/navbar.php'; ?>

    <div class="container mt-5">
        <h1 class="mb-4">Bid Packages</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project Name</th>
                    <th>Package Name</th>
                    <th>Deadline</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch bid packages from the database
                // Assuming a function getBidPackages() that retrieves bid packages
                $bidPackages = getBidPackages(); // This function should be defined in your API

                foreach ($bidPackages as $bid) {
                    echo "<tr>
                            <td>{$bid['id']}</td>
                            <td>{$bid['project_name']}</td>
                            <td>{$bid['package_name']}</td>
                            <td>{$bid['deadline']}</td>
                            <td>
                                <a href='form.php?id={$bid['id']}' class='btn btn-primary'>Edit</a>
                                <a href='../../api/bids/delete.php?id={$bid['id']}' class='btn btn-danger'>Delete</a>
                            </td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="form.php" class="btn btn-success">Create New Bid Package</a>
    </div>

    <?php include '../../includes/footer.php'; ?>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/main.js"></script>
</body>
</html>