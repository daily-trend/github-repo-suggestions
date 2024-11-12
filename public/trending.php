<?php
// Include Repositories class
require_once __DIR__ . '/../src/Repositories.php';

// Initialize Repositories class
$repositories = new Repositories();

// Get trending repositories (you can add more filters for trends)
$category = 'trending';
$repos = $repositories->getRepositoriesByCategory($category);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trending Repositories</title>
    <link rel="stylesheet" href="styles.css">  <!-- Link to your CSS file -->
</head>
<body>

<header>
    <h1>Trending GitHub Repositories</h1>
    <p>Discover the most popular repositories based on GitHub activity.</p>
</header>

<section class="repositories">
    <h2>Repositories</h2>
    <ul>
        <?php foreach ($repos as $repo): ?>
            <li>
                <a href="<?= htmlspecialchars($repo['html_url']) ?>" target="_blank">
                    <?= htmlspecialchars($repo['full_name']) ?>
                </a>
                <p><?= htmlspecialchars($repo['description']) ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</section>

</body>
</html>
