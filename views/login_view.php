<!DOCTYPE html>
<html lang="de">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include '../layouts/headimport.php'; ?> <!-- CSS und Bootstrap-Imports -->
</head>
<body>
    <?php include '../layouts/header.php'; ?> <!-- Header -->

    <main class="container mt-4">
        <h1>Login</h1>

        <!-- Fehleranzeige -->
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger">
                <?= htmlspecialchars($_GET['error']) ?>
            </div>
        <?php endif; ?>

        <form id="loginForm" action="../controllers/login.php" method="post">
            <div class="form-group">
                <label for="email">Benutzername (E-Mail):</label>
                <input 
                    type="text" 
                    id="email" 
                    name="email" 
                    class="form-control" 
                    required 
                    minlength="5" 
                    pattern=".*@.*"
                    title="Der Benutzername muss mindestens 5 Zeichen lang sein und ein '@' enthalten.">
            </div>
            <div class="form-group">
                <label for="password">Passwort:</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    class="form-control" 
                    required 
                    minlength="9" 
                    pattern="(?=.*[A-Z])(?=.*[a-z])(?=.*\d).*"
                    title="Das Passwort muss mindestens 9 Zeichen lang sein und Großbuchstaben, Kleinbuchstaben und eine Zahl enthalten.">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Login</button>
        </form>
        <input type="hidden" id="resolution" name="resolution">
    </main>

    <?php include '../layouts/footer.php'; ?> <!-- Footer -->

    <!-- Login-Validierung -->
    <script src="../assets/js/login_validation.js"></script>
    <script>
    // Bildschirmauflösung erfassen und ins versteckte Feld einfügen
    document.addEventListener("DOMContentLoaded", function () {
        const resolutionField = document.getElementById("resolution");

        if (resolutionField) {
            const resolution = `${window.screen.width}x${window.screen.height}`;
            resolutionField.value = resolution;
            console.log("Erfasste Auflösung:", resolution); // Debugging
        } else {
            console.error("Das Feld 'resolution' wurde nicht gefunden.");
        }
    });
    </script>
</body>
</html>