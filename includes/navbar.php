<?php
session_start();
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">Construction Bidding</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="templates/projects/list.php">Projects</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="templates/bids/list.php">Bids</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="templates/company/prequalification.php">Prequalification</a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <?php if (isset($_SESSION['user_id'])): ?>
                <li class="nav-item">
                    <a class="nav-link" href="api/auth/logout.php">Logout</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="templates/auth/login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="templates/auth/register.php">Register</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>