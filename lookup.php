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
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="form-group">
                <label for="callsign">Zadejte volací značku nebo jen PREFIX:</label>
                <input type="text" class="form-control" id="callsign" name="callsign" required>
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Look</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
            // Funkce pro získání země podle prefixu
            function lookupCountry($prefix) {
                // Databáze s předem danými prefixy a zeměmi
                $countries = array(
                    "OK" => "Czech Republic",
                    "2A" => "United Kingdom of Great Britain and Northern Ireland",
                    "2B" => "United Kingdom of Great Britain and Northern Ireland",
                    "2C" => "United Kingdom of Great Britain and Northern Ireland",
                    "2D" => "United Kingdom of Great Britain and Northern Ireland",
                    "2E" => "United Kingdom of Great Britain and Northern Ireland",
                    "2F" => "United Kingdom of Great Britain and Northern Ireland",
                    "2G" => "United Kingdom of Great Britain and Northern Ireland",
                    "2H" => "United Kingdom of Great Britain and Northern Ireland",
                    "2I" => "United Kingdom of Great Britain and Northern Ireland",
                    "2J" => "United Kingdom of Great Britain and Northern Ireland",
                    "2K" => "United Kingdom of Great Britain and Northern Ireland",
                    "2L" => "United Kingdom of Great Britain and Northern Ireland",
                    "2M" => "United Kingdom of Great Britain and Northern Ireland",
                    "2N" => "United Kingdom of Great Britain and Northern Ireland",
                    "2O" => "United Kingdom of Great Britain and Northern Ireland",
                    "2P" => "United Kingdom of Great Britain and Northern Ireland",
                    "2Q" => "United Kingdom of Great Britain and Northern Ireland",
                    "2R" => "United Kingdom of Great Britain and Northern Ireland",
                    "2T" => "United Kingdom of Great Britain and Northern Ireland",
                    "2U" => "United Kingdom of Great Britain and Northern Ireland",
                    "2V" => "United Kingdom of Great Britain and Northern Ireland",
                    "2W" => "United Kingdom of Great Britain and Northern Ireland",
                    "2X" => "United Kingdom of Great Britain and Northern Ireland",
                    "2Y" => "United Kingdom of Great Britain and Northern Ireland",
                    "2Z" => "United Kingdom of Great Britain and Northern Ireland",
                    "US" => "Raousko",
                    "OM" => "Slovensko",
                    "3H" => "China",
                    "3J" => "China",
                    "3L" => "China",

                    
                );

                // Kontrola DB
                if (array_key_exists($prefix, $countries)) {
                    return $countries[$prefix];
                } else {
                    return "Země nenalezena pro tento prefix.";
                }
            }

            $callsign = strtoupper($_POST["callsign"]); // Převede volací značku na velká písmena
            $prefix = substr($callsign, 0, 2); // Získá prefix z volací značky

            // Zavolání funkce pro vyhledání země podle prefixu
            $country = lookupCountry($prefix);

            // Výstup
            echo "<div class='mt-4'>";
            echo "<h2>Informace o volací značce $callsign:</h2>";
            echo "<p><strong>Prefix:</strong> $prefix</p>";
            echo "<p><strong>Země:</strong> $country</p>";
            echo "</div>";
        }
        ?>
    </div>
</body>
</html>
