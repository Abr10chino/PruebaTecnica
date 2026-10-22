<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demon Slayer</title>
    <link rel="stylesheet" href="../public/style.css">
    <link rel="icon" type="image/png" href="https://1000logos.net/wp-content/uploads/2022/06/Demon-Slayer-Logo.png">  
</head>
<body>
    <header class="page-header">
        <h1>Demon Slayer</h1>
        <p>Personajes</p>
    </header>
    <main class="characters-container">
        <?php if (empty($characters)): ?>
            <p class="message">
                No fue posible obtener los personajes.
            </p>
        <?php else: ?>
            <?php foreach ($characters as $character): ?>
                <a class="character-card" href="index.php?action=demon-slayer-show&id=<?= (int) $character['id'] ?>">
                    <div class="character-image-container">
                        <img src="<?= htmlspecialchars($character['img']) ?>" alt="<?= htmlspecialchars($character['name']) ?>">
                    </div>
                    <div class="character-info">
                        <h2>
                            <?= htmlspecialchars($character['name']) ?>
                        </h2>
                        <p>
                            ID: <?= (int) $character['id'] ?>
                        </p>
                    </div>
                </a>
            <?php endforeach; ?>
        <?php endif; ?>
    </main>
    <section style='display:flex; flex-direction:row; margin: 10px; gap:15px; justify-content:center; align-items:center;'>
        <?php 
        $totalPages = $pagination['totalPages'];
        $prevPage = max(1, $page - 1);
        $nextPage = min($totalPages, $page + 1);
        ?>

        <a class="back-button" href="index.php?action=demon-slayer&page=1">
            &lt;&lt;
        </a>

        <a class="back-button" href="index.php?action=demon-slayer&page=<?= $prevPage ?>">
            &lt;
        </a>

        <a class="back-button" style="background-color: #444;" href="index.php?action=demon-slayer&page=<?= $page ?>">
            <?= $page ?>
        </a>

        <a class="back-button" href="index.php?action=demon-slayer&page=<?= $nextPage ?>">
            &gt;
        </a>

        <a class="back-button" href="index.php?action=demon-slayer&page=<?= $totalPages ?>">
            &gt;&gt;
        </a>
    </section>
    <div class="navigation-container" style="display:flex; justify-content:center; margin-bottom: 20px;">
        <a class="back-button" href="index.php">
            ← Regresar al dashboard
        </a>
    </div>
</body>
</html>