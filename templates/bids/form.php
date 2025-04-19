<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Bid Package</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <?php include '../../includes/header.php'; ?>
    <?php include '../../includes/navbar.php'; ?>

    <div class="container mt-5">
        <h2>Create Bid Package</h2>
        <form action="../../api/bids/create.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="project_id">Project ID</label>
                <input type="text" class="form-control" id="project_id" name="project_id" required>
            </div>
            <div class="form-group">
                <label for="package_name">Bid Package Name</label>
                <input type="text" class="form-control" id="package_name" name="package_name" required>
            </div>
            <div class="form-group">
                <label for="bid_manual">Bid Manual (PDF)</label>
                <input type="file" class="form-control-file" id="bid_manual" name="bid_manual" accept=".pdf" required>
            </div>
            <div class="form-group">
                <label for="submission_deadline">Submission Deadline</label>
                <input type="datetime-local" class="form-control" id="submission_deadline" name="submission_deadline" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Bid Package</button>
        </form>
    </div>

    <?php include '../../includes/footer.php'; ?>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/main.js"></script>
</body>
</html>