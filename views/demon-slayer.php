<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Demon Slayer</title>

    <link rel="stylesheet" href="style.css">
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

                <a
                    class="character-card"
                    href="index.php?action=demon-slayer-show&id=<?= (int) $character['id'] ?>">

                    <div class="character-image-container">

                        <img
                            src="<?= htmlspecialchars($character['img']) ?>"
                            alt="<?= htmlspecialchars($character['name']) ?>">

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

    <div class="navigation-container">

        <a
            class="back-button"
            href="index.php">
            ← Regresar al dashboard
        </a>

    </div>

</body>

</html>