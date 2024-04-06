<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radioamatérská Volací Značka</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Vyhledat Zemi podle Radioamatérské Volací Značky</h1>
        <form action="lookup.php" method="post">
            <div class="form-group">
                <label for="callsign">Zadejte volací značku nebo jen PREFIX:</label>
                <input type="text" class="form-control" id="callsign" name="callsign" required>
            </div>
            <button type="submit" class="btn btn-primary">Look</button>
        </form>
        <!-- Vyhledávání -->
        <div class="mt-4" id="result"></div>
    </div>
</body>
</html>
