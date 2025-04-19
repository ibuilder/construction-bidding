<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Project</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <?php include '../../includes/header.php'; ?>
    <?php include '../../includes/navbar.php'; ?>

    <div class="container mt-5">
        <h2>Create New Project</h2>
        <form action="../../api/projects/create.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="projectName">Project Name</label>
                <input type="text" class="form-control" id="projectName" name="projectName" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="bidPackage">Bid Package</label>
                <input type="file" class="form-control-file" id="bidPackage" name="bidPackage" required>
            </div>
            <div class="form-group">
                <label for="bidManual">Bid Manual</label>
                <input type="file" class="form-control-file" id="bidManual" name="bidManual" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Project</button>
        </form>
    </div>

    <?php include '../../includes/footer.php'; ?>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/main.js"></script>
</body>
</html>