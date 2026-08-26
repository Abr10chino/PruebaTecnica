<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>
        <?php if ($character): ?>

            <?= htmlspecialchars($character['name']) ?>

        <?php else: ?>

            Personaje no encontrado

        <?php endif; ?>
    </title>

    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="https://images.seeklogo.com/logo-png/29/2/dragon-ball-super-logo-png_seeklogo-290968.png">  
</head>

<body>

    <?php if ($character): ?>

        <header class="page-header">

            <h1>
                <?= htmlspecialchars($character['name']) ?>
            </h1>

            <p>
                Información del personaje
            </p>

        </header>

        <main class="detail-container">

            <section class="detail-card">

                <div class="detail-image-container">

                    <img
                        src="<?= htmlspecialchars($character['image']) ?>"
                        alt="<?= htmlspecialchars($character['name']) ?>">

                </div>

                <div class="detail-info">

                    <h2>
                        <?= htmlspecialchars($character['name']) ?>
                    </h2>

                    <p>
                        <strong>ID:</strong>
                        <?= (int) $character['id'] ?>
                    </p>

                    <?php if (isset($character['ki'])): ?>

                        <p>
                            <strong>KI:</strong>
                            <?= htmlspecialchars($character['ki']) ?>
                        </p>

                    <?php endif; ?>

                    <?php if (isset($character['maxKi'])): ?>

                        <p>
                            <strong>MaxKi:</strong>
                            <?= htmlspecialchars($character['maxKi']) ?>
                        </p>

                    <?php endif; ?>

                    <?php if (isset($character['race'])): ?>

                        <p>
                            <strong>Raza:</strong>
                            <?= htmlspecialchars($character['race']) ?>
                        </p>

                    <?php endif; ?>

                    <?php if (isset($character['gender'])): ?>

                        <p>
                            <strong>Género:</strong>
                            <?= htmlspecialchars($character['gender']) ?>
                        </p>

                    <?php endif; ?>

                    <?php if (isset($character['description'])): ?>

                        <div class="description">

                            <h3>
                                Descripción
                            </h3>

                            <p>
                                <?= htmlspecialchars(
                                    $character['description']
                                ) ?>
                            </p>

                        </div>

                    <?php endif; ?>

                    <?php if (isset($character['affiliation'])): ?>

                        <p>
                            <strong>Afiliación:</strong>
                            <?= htmlspecialchars($character['affiliation']) ?>
                        </p>

                    <?php endif; ?>

                </div>

            </section>

            <section style='display:flex; flex-direction:row; margin: 10px; gap:15px;'>
                <?php if(((int) $character['id']-1) != 0): ?>
                    <a
                        class="back-button"
                        href="index.php?action=dragon-ball-show&id=<?= (int) $character['id'] -1 ?>">
                        ← Anterior
                    </a>
                <?php endif; ?>

                <?php if(((int) $character['id']) != $lastId): ?>
                    <a
                        class="back-button"
                        href="index.php?action=dragon-ball-show&id=<?= (int) $character['id'] +1 ?>">
                        Siguiente ->
                    </a>
                <?php endif; ?>
            </section>

            <a
                class="back-button"
                href="index.php?action=dragon-ball">
                ← Regresar a personajes
            </a>

        </main>

    <?php else: ?>

        <main class="detail-container">

            <section class="detail-card">

                <div class="detail-info">

                    <h2>
                        Personaje no encontrado
                    </h2>

                    <p>
                        No fue posible obtener la información
                        del personaje solicitado.
                    </p>

                    <a
                        class="back-button"
                        href="index.php?action=dragon-ball">
                        ← Regresar
                    </a>

                </div>

            </section>

        </main>

    <?php endif; ?>

</body>

</html>