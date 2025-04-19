<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project List</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <?php include '../../includes/header.php'; ?>
    <?php include '../../includes/navbar.php'; ?>

    <div class="container mt-5">
        <h1 class="mb-4">Project List</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Fetch projects from the database
                include '../../config/database.php';
                $query = "SELECT * FROM projects";
                $result = $db->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['name']}</td>
                                <td>{$row['description']}</td>
                                <td>
                                    <a href='detail.php?id={$row['id']}' class='btn btn-info'>View</a>
                                    <a href='update.php?id={$row['id']}' class='btn btn-warning'>Edit</a>
                                    <a href='delete.php?id={$row['id']}' class='btn btn-danger'>Delete</a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No projects found.</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <a href="create.php" class="btn btn-success">Create New Project</a>
    </div>

    <?php include '../../includes/footer.php'; ?>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/main.js"></script>
</body>
</html>