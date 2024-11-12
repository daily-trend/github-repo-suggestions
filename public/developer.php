<?php
// Include Repositories class
require_once __DIR__ . '/../src/Repositories.php';

// Initialize Repositories class
$repositories = new Repositories();

// Get the selected category and language, default to 'software-developer' and 'JavaScript'
$category = isset($_GET['category']) ? $_GET['category'] : 'software-developer';
$language = isset($_GET['language']) ? $_GET['language'] : 'JavaScript';

// Get repositories based on selected category and language
$repos = $repositories->getRepositoriesByCategoryAndLanguage($category, $language);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repositories for Software Developers</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<header>
    <div class="header-container">
        <h1>Top Repositories for Software Developers</h1>
        <p>Explore the best repositories for professional software developers.</p>
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
        <h2>Repositories in <?= htmlspecialchars($language) ?> for <?= htmlspecialchars($category) ?> Developers</h2>
        <ul>
            <?php foreach ($repos as $repo): ?>
                <li class="repo-item">
                    <a href="<?= htmlspecialchars($repo['html_url']) ?>" target="_blank">
                        <strong><?= htmlspecialchars($repo['full_name']) ?></strong>
                    </a>
                    <p><?= htmlspecialchars($repo['description']) ?></p>
                    <p><strong>Stars: </strong><?= htmlspecialchars($repo['stargazers_count']) ?> | 
                       <strong>Forks: </strong><?= htmlspecialchars($repo['forks_count']) ?></p>
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
