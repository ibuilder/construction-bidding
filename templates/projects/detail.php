<?php
// detail.php - Displays detailed information about a specific project

require_once '../../config/database.php';
require_once '../../api/projects/read.php';

$projectId = $_GET['id'] ?? null;

if ($projectId) {
    $project = getProjectById($projectId); // Function to retrieve project details
} else {
    header("Location: list.php");
    exit;
}

include '../../includes/header.php';
include '../../includes/navbar.php';
?>

<div class="container mt-5">
    <h1>Project Details</h1>
    <?php if ($project): ?>
        <h2><?php echo htmlspecialchars($project['name']); ?></h2>
        <p><strong>Description:</strong> <?php echo htmlspecialchars($project['description']); ?></p>
        <p><strong>Start Date:</strong> <?php echo htmlspecialchars($project['start_date']); ?></p>
        <p><strong>End Date:</strong> <?php echo htmlspecialchars($project['end_date']); ?></p>
        <p><strong>Company:</strong> <?php echo htmlspecialchars($project['company_name']); ?></p>
        
        <h3>Bid Packages</h3>
        <ul>
            <?php foreach ($project['bid_packages'] as $bid): ?>
                <li><?php echo htmlspecialchars($bid['title']); ?> - <?php echo htmlspecialchars($bid['due_date']); ?></li>
            <?php endforeach; ?>
        </ul>

        <h3>Files</h3>
        <ul>
            <?php foreach ($project['files'] as $file): ?>
                <li><a href="../../api/files/download.php?file_id=<?php echo $file['id']; ?>"><?php echo htmlspecialchars($file['filename']); ?></a></li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No project found.</p>
    <?php endif; ?>
</div>

<?php include '../../includes/footer.php'; ?>