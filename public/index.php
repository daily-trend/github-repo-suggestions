<?php
// Include Repositories class
require_once __DIR__ . '/../src/Repositories.php';

// Initialize Repositories class
$repositories = new Repositories();

// Get the selected category and language, default to 'beginner' and 'Python'
$category = isset($_GET['category']) ? $_GET['category'] : 'beginner';
$language = isset($_GET['language']) ? $_GET['language'] : 'Python';

// Get repositories based on selected category and language
$repos = $repositories->getRepositoriesByCategoryAndLanguage($category, $language);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GitHub Repository Suggestions</title>
    <link rel="stylesheet" href="/../style.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
</head>
<body>

<header>
    <div class="header-container">
        <h1>GitHub Repository Suggestions</h1>
        <p>Find the best repositories based on your experience level and preferred language.</p>
    </div>
</header>

<main>
    <!-- Filters -->
    <section class="filter">
        <form action="" method="GET">
            <label for="category">Choose a Category: </label>
            <select name="category" id="category" onchange="this.form.submit()">
                <option value="beginner" <?= $category == 'beginner' ? 'selected' : ''; ?>>Beginner</option>
                <option value="intermediate" <?= $category == 'intermediate' ? 'selected' : ''; ?>>Intermediate</option>
                <option value="advanced" <?= $category == 'advanced' ? 'selected' : ''; ?>>Advanced</option>
            </select>

            <label for="language">Choose a Language: </label>
            <select name="language" id="language" onchange="this.form.submit()">
                <option value="Python" <?= $language == 'Python' ? 'selected' : ''; ?>>Python</option>
                <option value="TypeScript" <?= $language == 'TypeScript' ? 'selected' : ''; ?>>TypeScript</option>
                <option value="Java" <?= $language == 'Java' ? 'selected' : ''; ?>>Java</option>
                <option value="JavaScript" <?= $language == 'JavaScript' ? 'selected' : ''; ?>>JavaScript</option>
                <option value="PHP" <?= $language == 'PHP' ? 'selected' : ''; ?>>PHP</option>
                <option value="C++" <?= $language == 'C++' ? 'selected' : ''; ?>>C++</option>
            </select>
        </form>
    </section>

    <!-- Display Repositories -->
    <section class="repositories">
        <h2>Top Repositories in <?= htmlspecialchars($language) ?> for <?= htmlspecialchars($category) ?> Developers</h2>
        <ul>
            <?php foreach ($repos as $repo): ?>
                <li class="repo-item">
                    <a href="<?= htmlspecialchars($repo['html_url']) ?>" target="_blank">
                        <?= htmlspecialchars($repo['full_name']) ?>
                    </a>
                    <p><?= htmlspecialchars($repo['description']) ?></p>
                    <div class="stats">
                        <span>⭐ <?= htmlspecialchars($repo['stargazers_count']) ?> Stars</span>
                        <span>🍴 <?= htmlspecialchars($repo['forks_count']) ?> Forks</span>
                    </div>
                    <span class="label"><?= htmlspecialchars($repo['language']) ?></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </section>
</main>

<footer>
    <p>&copy; <?= date("Y"); ?> GitHub Repo Suggestions</p>
</footer>

</body>
</html>
