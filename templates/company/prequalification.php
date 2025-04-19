<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company Prequalification</title>
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <?php include '../../includes/header.php'; ?>
    <?php include '../../includes/navbar.php'; ?>

    <div class="container mt-5">
        <h2>Company Prequalification Form</h2>
        <form action="../../api/companies/prequalification.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="companyName">Company Name</label>
                <input type="text" class="form-control" id="companyName" name="companyName" required>
            </div>
            <div class="form-group">
                <label for="contactPerson">Contact Person</label>
                <input type="text" class="form-control" id="contactPerson" name="contactPerson" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="phone">Phone Number</label>
                <input type="tel" class="form-control" id="phone" name="phone" required>
            </div>
            <div class="form-group">
                <label for="companyDocuments">Upload Company Documents</label>
                <input type="file" class="form-control-file" id="companyDocuments" name="companyDocuments[]" multiple required>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit Prequalification</button>
        </form>
    </div>

    <?php include '../../includes/footer.php'; ?>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/main.js"></script>
</body>
</html>