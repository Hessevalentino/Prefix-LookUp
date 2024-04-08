<!DOCTYPE html>
<html lang="cs">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Radioamatérská Volací Značka Vyhledávání zemí podle radioamaterskeho prefixu.</title>
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
                    "3A" => "Monaco",
                    "3B" => "Mauritius",
                    "3C" => "Equatorial Guinea",
                    "3D" => "Swaziland",
                    "3E" => "Panama",
                    "3F" => "Panama",
                    "3G" => "Chile",
                    "3H" => "China",
                    "3I" => "China",
                    "3J" => "China",
                    "3K" => "China",
                    "3L" => "China",
                    "3M" => "China",
                    "3N" => "China",
                    "3O" => "China",
                    "3P" => "China",
                    "3Q" => "China",
                    "3R" => "China",
                    "3S" => "China",
                    "3T" => "China",
                    "3U" => "China",
                    "3V" => "Tunisia",
                    "3W" => "Viet Nam",
                    "3X" => "Guinea",
                    "3Y" => "Norway",
                    "3Z" => "Polan",
                    "4A" => "Mexico",
                    "4B" => "Mexico",
                    "4C" => "Mexico",
                    "4D" => "Philippines",
                    "4E" => "Philippines",
                    "4F" => "Philippines",
                    "4G" => "Philippines",
                    "4H" => "Philippines",
                    "4I" => "Philippines",
                    "4J" => "Azerbaijani Republic",
                    "4K" => "Azerbaijani Republic",
                    "4K" => "Azerbaijani Republic",
                    "4L" => "Georgia",
                    "4M" => "Venezuela",
                    "4O" => "Montenegro",
                    "4P" => "Sri Lanka",
                    "4Q" => "Sri Lanka",
                    "4R" => "Sri Lanka",
                    "4S" => "Sri Lanka",
                    "4T" => "Peru",
                    "4U" => "United Nation",
                    "4V" => "Haity",
                    "4W" => "Timor-Leste",
                    "4X" => "Israel",
                    "4Y" => "International Civil Aviation Organization",
                    "4Z" => "Israel",
                    "5A" => "Socialist People's Libyan Arab Jamahiriya",
                    "5B" => "Cyprus",
                    "5C" => "Morocco",
                    "5D" => "Morocco",
                    "5E" => "Morocco",
                    "5F" => "Morocco",
                    "5G" => "Morocco",
                    "5H" => "Tanzania",
                    "5J" => "Columbia",
                    "5K" => "Columbia",
                    "5L" => "Liberia",
                    "5M" => "Liberia",
                    "5N" => "Nigeria",
                    "5O" => "Nigeria",
                    "5P" => "Denmark",
                    "5Q" => "Denmark",
                    "5S" => "Madagaskar",
                    "5T" => "Mauritania (Islamic Republic of)",
                    "5U" => "Niger",
                    "5V" => "Togolese",
                    "5W" => "Samoa",
                    "5X" => "Uganda",
                    "5Y" => "Kenya",
                    "5Z" => "Kenya",
                    "6A" => "Egypt",
                    "6B" => "Egypt",
                    "6C" => "Syrian Arab Republic",
                    "6D" => "Mexico",
                    "6E" => "Mexico",
                    "6F" => "Mexico",
                    "6G" => "Mexico",
                    "6H" => "Mexico",
                    "6I" => "Mexico",
                    "6J" => "Mexico",
                    "6K" => "Korea",
                    "6L" => "Korea",
                    "6M" => "Korea",
                    "6N" => "Korea",
                    "6O" => "Somali Democratic Republic",
                    "6P" => "Pakistan",
                    "6Q" => "Pakistan",
                    "6R" => "Pakistan",
                    "6S" => "Pakistan",
                    "6T" => "Sudan",
                    "6U" => "Sudan",
                    "6V" => "Senegal",
                    "6W" => "Senegal",
                    "6X" => "Madagaskar",
                    "6Y" => "Jamaica",
                    "6Z" => "Liberia",
                    "7A" => "Indonesia",
                    "7B" => "Indonesia",
                    "7C" => "Indonesia",
                    "7D" => "Indonesia",
                    "7E" => "Indonesia",
                    "7F" => "Indonesia",
                    "7G" => "Indonesia",
                    "7H" => "Indonesia",
                    "7I" => "Indonesia",
                    "7J" => "Japan",
                    "7K" => "Japan",
                    "7L" => "Japan",
                    "7M" => "Japan",
                    "7N" => "Japan",
                    "7O" => "Yemen",
                    "7P" => "Lesotho",
                    "7Q" => "Malawi",
                    "7R" => "Algeria",
                    "7S" => "Sweden",
                    "7T" => "Algeria",
                    "7U" => "Algeria",
                    "7V" => "Algeria",
                    "7W" => "Algeria",
                    "7X" => "Algeria",
                    "7Y" => "Algeria",
                    "7Z" => "Saudi Arabia",
                    "8A" => "Indonesia",
                    "8B" => "Indonesia",
                    "8C" => "Indonesia",
                    "8D" => "Indonesia",
                    "8E" => "Indonesia",
                    "8F" => "Indonesia",
                    "8G" => "Indonesia",
                    "8H" => "Indonesia",
                    "8I" => "Indonesia",
                    "8J" => "Japan",
                    "8K" => "Japan",
                    "8L" => "Japan",
                    "8M" => "Japan",
                    "8N" => "Japan",
                    "8O" => "Botswana",
                    "8P" => "Barbados",
                    "8Q" => "Maledives",
                    "8R" => "Guyana",
                    "8S" => "Sweden",
                    "8T" => "India",
                    "8U" => "India",
                    "8V" => "India",
                    "8W" => "India",
                    "8X" => "India",
                    "8Y" => "India",
                    "8Z" => "Saudi Arabia",
                    "9A" => "Croatia",
                    "9B" => "Iran",
                    "9C" => "Iran",
                    "9D" => "Iran",
                    "9E" => "Ethiopia",
                    "9F" => "Ethiopia",
                    "9G" => "Ghana",
                    "9H" => "Malta",
                    "9I" => "Zambia",
                    "9J" => "Iran",
                    "9K" => "Kuwait",
                    "9L" => "Sierra Leone",
                    "9M" => "Malaysia",
                    "9N" => "Nepal",
                    "9O" => "Congo",
                    "9P" => "Congo",
                    "9Q" => "Congo",
                    "9R" => "Congo",
                    "9S" => "Congo",
                    "9T" => "Congo",
                    "9U" => "Burundy",
                    "9V" => "Singapore",
                    "9W" => "Malaysia",
                    "9X" => "Rwanda",
                    "9Y" => "Trinidad, Tobago",
                    "A2" => "Botswana",
                    "A3" => "Tonga",
                    "A4" => "Oman",
                    "A5" => "Bhutan",
                    "A6" => "United Arab Emirates",
                    "A7" => "Qatar",
                    "A8" => "Liberia",
                    "A9" => "Bahrain",
                    "AA" => "USA",
                    "AB" => "USA",
                    "AC" => "USA",
                    "AD" => "USA",
                    "AE" => "USA",
                    "AF" => "USA",
                    "AG" => "USA",
                    "AH" => "USA",
                    "AI" => "USA",
                    "AJ" => "USA",
                    "AK" => "USA",
                    "AL" => "USA",
                    "AM" => "Spain",
                    "AN" => "Spain",
                    "AM" => "Spain",
                    "AO" => "Spain",
                    "AP" => "Pakistan",
                    "AQ" => "Pakistan",
                    "AR" => "Pakistan",
                    "AS" => "Pakistan",
                    "AT" => "India",
                    "AU" => "India",
                    "AV" => "India",
                    "AW" => "India",
                    "AX" => "Australia",
                    "AY" => "Argentina",
                    "AZ" => "Argentina",
                    "BA" => "China",
                    "BB" => "China",
                    "BC" => "China",
                    "BD" => "China",
                    "BE" => "China",
                    "BF" => "China",
                    "BG" => "China",
                    "BH" => "China",
                    "BI" => "China",
                    "BJ" => "China",
                    "BK" => "China",
                    "BL" => "China",
                    "BM" => "China",
                    "BN" => "China",
                    "BO" => "China",
                    "BP" => "China",
                    "BQ" => "China",
                    "BR" => "China",
                    "BS" => "China",
                    "BT" => "China",
                    "BU" => "China",
                    "BV" => "China",
                    "BW" => "China",
                    "BX" => "China",
                    "BY" => "China",
                    "BZ" => "China",
                    "C2" => "Naru",
                    "C3" => "Andora",
                    "C4" => "Cyprus",
                    "C5" => "Gambia",
                    "C6" => "Bahamas",
                    "C7" => "World Meterorological Org.",
                    "C8" => "Mozambique",
                    "C9" => "Mozambiqe",
                    "CA" => "Chile",
                    "CB" => "Chile",
                    "CC" => "Chile",
                    "CD" => "Chile",
                    "CE" => "Chile",
                    "CF" => "Canada",
                    "CG" => "Canada",
                    "CH" => "Canada",
                    "CI" => "Canada",
                    "CJ" => "Canada",
                    "CK" => "Canada",
                    "CL" => "Cuba",
                    "CP" => "Bolivia",
                    "CQ" => "Portugal",
                    "CR" => "Portugal",
                    "CT" => "Portugal",
                    "CS" => "Portugal",
                    "CU" => "Portugal",
                    "CV" => "Uruguay",
                    "CW" => "Uruguay",
                    "CX" => "Uruguay",
                    "CY" => "Canada",
                    "CZ" => "Canada",
                    "D2" => "Angola",
                    "D3" => "Angola",
                    "D4" => "Cape Verde",
                    "D5" => "Liberia",
                    "D6" => "Comoros",
                    "D7" => "Korea",
                    "D8" => "Korea",
                    "D9" => "Korea",
                    "DA" => "Germany",
                    "DB" => "Germany",
                    "DC" => "Germany",
                    "DD" => "Germany",
                    "DE" => "Germany",
                    "DF" => "Germany",
                    "DG" => "Germany",
                    "DH" => "Germany",
                    "DI" => "Germany",
                    "DJ" => "Germany",
                    "DK" => "Germany",
                    "DL" => "Germany",
                    "DM" => "Germany",
                    "DN" => "Germany",
                    "DO" => "Germany",
                    "DP" => "Germany",
                    "DQ" => "Germany",
                    "DR" => "Germany",
                    "DS" => "Korea",
                    "DT" => "Korea",
                    "DU" => "Philippines",
                    "DV" => "Philippines",
                    "DW" => "Philippines",
                    "DX" => "Philippines",
                    "DZ" => "Philippines",
                    "DY" => "Philippines",
                    "E2" => "Thailand",
                    "E3" => "Eritra",
                    "E4" => "Palestina",
                    "E5" => "New Zeland",
                    "E6" => "Niue",
                    "E7" => "Bosnia and Herzegovina",
                    "EA" => "Spain",
                    "EB" => "Spain",
                    "EC" => "Spain",
                    "ED" => "Spain",
                    "EE" => "Spain",
                    "EF" => "Spain",
                    "EG" => "Spain",
                    "EH" => "Spain",
                    "EI" => "Ireland",
                    "EJ" => "Ireland",
                    "EK" => "Armenia",
                    "EL" => "Liberia",
                    "EM" => "Ukraine",
                    "EN" => "Ukraine",
                    "EP" => "Iran",
                    "EQ" => "Iran",
                    "ER" => "Moldova",
                    "ES" => "Estonia",
                    "ET" => "Ethiopia",
                    "EU" => "Belarus",
                    "EV" => "Belarus",
                    "EW" => "Belarus",
                    "EX" => "Kyrgyz Republic",
                    "EY" => "Tajikistan",
                    "FA" => "France",
                    "FB" => "France",
                    "FC" => "France",
                    "FD" => "France",
                    "FE" => "France",
                    "FF" => "France",
                    "FG" => "France",
                    "FH" => "France",
                    "FI" => "France",
                    "FJ" => "France",
                    "FK" => "France",
                    "FL" => "France",
                    "FM" => "France",
                    "FN" => "France",
                    "FO" => "France",
                    "FP" => "France",
                    "FQ" => "France",
                    "FR" => "France",
                    "FS" => "France",
                    "FT" => "France",
                    "FU" => "France",
                    "FV" => "France",
                    "FW" => "France",
                    "FX" => "France",
                    "FY" => "France",
                    "FZ" => "France",
                    "GA" => "United Kingdom of Great Britain and Northern Ireland",
                    "GB" => "United Kingdom of Great Britain and Northern Ireland",
                    "GC" => "United Kingdom of Great Britain and Northern Ireland",
                    "GD" => "United Kingdom of Great Britain and Northern Ireland",
                    "GE" => "United Kingdom of Great Britain and Northern Ireland",
                    "GF" => "United Kingdom of Great Britain and Northern Ireland",
                    "GG" => "United Kingdom of Great Britain and Northern Ireland",
                    "GH" => "United Kingdom of Great Britain and Northern Ireland",
                    "GI" => "United Kingdom of Great Britain and Northern Ireland",
                    "GJ" => "United Kingdom of Great Britain and Northern Ireland",
                    "GK" => "United Kingdom of Great Britain and Northern Ireland",
                    "GL" => "United Kingdom of Great Britain and Northern Ireland",
                    "GM" => "United Kingdom of Great Britain and Northern Ireland",
                    "GN" => "United Kingdom of Great Britain and Northern Ireland",
                    "GO" => "United Kingdom of Great Britain and Northern Ireland",
                    "GP" => "United Kingdom of Great Britain and Northern Ireland",
                    "GQ" => "United Kingdom of Great Britain and Northern Ireland",
                    "GR" => "United Kingdom of Great Britain and Northern Ireland",
                    "GS" => "United Kingdom of Great Britain and Northern Ireland",
                    "GT" => "United Kingdom of Great Britain and Northern Ireland",
                    "GU" => "United Kingdom of Great Britain and Northern Ireland",
                    "GV" => "United Kingdom of Great Britain and Northern Ireland",
                    "GW" => "United Kingdom of Great Britain and Northern Ireland",
                    "GX" => "United Kingdom of Great Britain and Northern Ireland",
                    "GY" => "United Kingdom of Great Britain and Northern Ireland",
                    "GZ" => "United Kingdom of Great Britain and Northern Ireland",
                    "H2" => "Cyprus",
                    "H3" => "Panama",
                    "H4" => "Solomon Islands",
                    "H6" => "Nicaragua",
                    "H7" => "Nicaragua",
                    "H8" => "Panama",
                    "H9" => "Panama",
                    "HA" => "Hungary",
                    "HB" => "Switzerland",
                    "HC" => "Ecuador",
                    "HD" => "Ecuador",
                    "HD" => "Ecuador",
                    "HE" => "Switzerland",
                    "HF" => "Poland",
                    "HG" => "Hungary",
                    "HH" => "Haiti",
                    "HI" => "Dominican Rep.",
                    "HJ" => "Columbia",
                    "HL" => "Korea",
                    "HM" => "Democratic People's Republic of Korea",
                    "HN" => "Iraq",
                    "HO" => "Panama",
                    "HP" => "Panama",
                    "HQ" => "Honduras",
                    "HS" => "Thailand",
                    "HT" => "Nicaragua",
                    "HU" => "El Salvador",
                    "HV" => "Vatican City State",
                    "HW" => "France",
                    "HX" => "France",
                    "HY" => "France",
                    "HZ" => "Saudi Arabia",
                    "IA" => "Italy",
                    "IB" => "Italy",
                    "IC" => "Italy",
                    "ID" => "Italy",
                    "IE" => "Italy",
                    "IF" => "Italy",
                    "IG" => "Italy",
                    "IH" => "Italy",
                    "II" => "Italy",
                    "IJ" => "Italy",
                    "IK" => "Italy",
                    "IL" => "Italy",
                    "IM" => "Italy",
                    "IN" => "Italy",
                    "IO" => "Italy",
                    "IP" => "Italy",
                    "IQ" => "Italy",
                    "IR" => "Italy",
                    "IS" => "Italy",
                    "IT" => "Italy",
                    "IU" => "Italy",
                    "IV" => "Italy",
                    "IW" => "Italy",
                    "IX" => "Italy",
                    "IY" => "Italy",
                    "IZ" => "Italy",
                    "J2" => "Djibouti",
                    "J3" => "Grenada",
                    "J4" => "Greece",
                    "J5" => "Guinea-Bissau",
                    "J6" => "Saint Lucia",
                    "J7" => "Dominica",
                    "J8" => "Saint Vincente and the Grenadines",
                    "JA" => "Japan",
                    "JB" => "Japan",
                    "JC" => "Japan",
                    "JD" => "Japan",
                    "JE" => "Japan",
                    "JF" => "Japan",
                    "JG" => "Japan",
                    "JH" => "Japan",
                    "JI" => "Japan",
                    "JJ" => "Japan",
                    "JK" => "Japan",
                    "JL" => "Japan",
                    "JM" => "Japan",
                    "JN" => "Japan",
                    "JO" => "Japan",
                    "JP" => "Japan",
                    "JQ" => "Japan",
                    "JR" => "Japan",
                    "JS" => "Japan",
                    "JT" => "Mongolia",
                    "JU" => "Mongolia",
                    "JV" => "Mongolia",
                    "JW" => "Norway",
                    "JY" => "Jordan (Hashemite Kingdom of)",
                    "JZ" => "Indonesia",
                    "KA" => "United States of America",
                    "KB" => "United States of America",
                    "KC" => "United States of America",
                    "KD" => "United States of America",
                    "KE" => "United States of America",
                    "KF" => "United States of America",
                    "KG" => "United States of America",
                    "KH" => "United States of America",
                    "KI" => "United States of America",
                    "KJ" => "United States of America",
                    "KK" => "United States of America",
                    "KL" => "United States of America",
                    "KM" => "United States of America",
                    "KN" => "United States of America",
                    "KO" => "United States of America",
                    "KP" => "United States of America",
                    "KQ" => "United States of America",
                    "KR" => "United States of America",
                    "KS" => "United States of America",
                    "KT" => "United States of America",
                    "KU" => "United States of America",
                    "KV" => "United States of America",
                    "KW" => "United States of America",
                    "KX" => "United States of America",
                    "KY" => "United States of America",
                    "KZ" => "United States of America",
                    "L2" => "Argentine Republic",
                    "L3" => "Argentine Republic",
                    "L4" => "Argentine Republic",
                    "L5" => "Argentine Republic",
                    "L6" => "Argentine Republic",
                    "L7" => "Argentine Republic",
                    "L8" => "Argentine Republic",
                    "L9" => "Argentine Republic",
                    "LA" => "Norway",
                    "LB" => "Norway",
                    "LC" => "Norway",
                    "LD" => "Norway",
                    "LE" => "Norway",
                    "LF" => "Norway",
                    "LG" => "Norway",
                    "LH" => "Norway",
                    "LI" => "Norway",
                    "LJ" => "Norway",
                    "LK" => "Norway",
                    "LL" => "Norway",
                    "LM" => "Norway",
                    "LN" => "Norway",
                    "LO" => "Argentine Republic",
                    "LP" => "Argentine Republic",
                    "LQ" => "Argentine Republic",
                    "LR" => "Argentine Republic",
                    "LS" => "Argentine Republic",
                    "LT" => "Argentine Republic",
                    "LU" => "Argentine Republic",
                    "LV" => "Argentine Republic",
                    "LW" => "Argentine Republic",
                    "Lx" => "Luxembourg",
                    "Ly" => "Lithuania",
                    "LZ" => "Bulgaria",
                    "MA" => "United Kingdom of Great Britain and Northern Ireland",
                    "MB" => "United Kingdom of Great Britain and Northern Ireland",
                    "MC" => "United Kingdom of Great Britain and Northern Ireland",
                    "MD" => "United Kingdom of Great Britain and Northern Ireland",
                    "MG" => "United Kingdom of Great Britain and Northern Ireland",
                    "MH" => "United Kingdom of Great Britain and Northern Ireland",
                    "MI" => "United Kingdom of Great Britain and Northern Ireland",
                    "MJ" => "United Kingdom of Great Britain and Northern Ireland",
                    "MK" => "United Kingdom of Great Britain and Northern Ireland",
                    "ML" => "United Kingdom of Great Britain and Northern Ireland",
                    "MM" => "United Kingdom of Great Britain and Northern Ireland",
                    "MN" => "United Kingdom of Great Britain and Northern Ireland",
                    "MO" => "United Kingdom of Great Britain and Northern Ireland",
                    "MP" => "United Kingdom of Great Britain and Northern Ireland",
                    "MQ" => "United Kingdom of Great Britain and Northern Ireland",
                    "MR" => "United Kingdom of Great Britain and Northern Ireland",
                    "MS" => "United Kingdom of Great Britain and Northern Ireland",
                    "MT" => "United Kingdom of Great Britain and Northern Ireland",
                    "MU" => "United Kingdom of Great Britain and Northern Ireland",
                    "MV" => "United Kingdom of Great Britain and Northern Ireland",
                    "MW" => "United Kingdom of Great Britain and Northern Ireland",
                    "MX" => "United Kingdom of Great Britain and Northern Ireland",
                    "MY" => "United Kingdom of Great Britain and Northern Ireland",
                    "MZ" => "United Kingdom of Great Britain and Northern Ireland",
                    "NA" => "United States of America",
                    "NB" => "United States of America",
                    "NC" => "United States of America",
                    "ND" => "United States of America",
                    "NE" => "United States of America",
                    "NF" => "United States of America",
                    "NG" => "United States of America",
                    "NH" => "United States of America",
                    "NI" => "United States of America",
                    "NJ" => "United States of America",
                    "NK" => "United States of America",
                    "NL" => "United States of America",
                    "NM" => "United States of America",
                    "NN" => "United States of America",
                    "NO" => "United States of America",
                    "NP" => "United States of America",
                    "NQ" => "United States of America",
                    "NR" => "United States of America",
                    "NS" => "United States of America",
                    "NT" => "United States of America",
                    "NU" => "United States of America",
                    "NV" => "United States of America",
                    "NW" => "United States of America",
                    "NX" => "United States of America",
                    "NY" => "United States of America",
                    "NZ" => "United States of America",
                    "OA" => "Peru",
                    "OB" => "Peru",
                    "OC" => "Peru",
                    "OD" => "Lebanon",
                    "OE" => "Austria",
                    "OF" => "Finland",
                    "OG" => "Finland",
                    "OH" => "Finland",
                    "OI" => "Finland",
                    "OJ" => "Finland",
                    "OK" => "Czech Republic",
                    "OL" => "Czech Republic",
                    "OM" => "Slovak Republic",
                    "ON" => "Belgium",
                    "OO" => "Belgium",
                    "OP" => "Belgium",
                    "OQ" => "Belgium",
                    "OR" => "Belgium",
                    "OS" => "Belgium",
                    "OT" => "Belgium",
                    "OU" => "Denmark",
                    "OV" => "Denmark",
                    "OW" => "Denmark",
                    "OX" => "Denmark",
                    "OY" => "Denmark",
                    "OZ" => "Denmark",
                    "P2" => "Papua New Guinea",
                    "P3" => "Cyprus",
                    "P4" => "Netherlands",
                    "P5" => "Democratic People's Republic of Korea",
                    "P6" => "Democratic People's Republic of Korea",
                    "P7" => "Democratic People's Republic of Korea",
                    "P8" => "Democratic People's Republic of Korea",
                    "P9" => "Democratic People's Republic of Korea",
                    "PA" => "Netherlands (Kingdom of the)",
                    "PB" => "Netherlands (Kingdom of the)",
                    "PC" => "Netherlands (Kingdom of the)",
                    "PD" => "Netherlands (Kingdom of the)",
                    "PE" => "Netherlands (Kingdom of the)",
                    "PF" => "Netherlands (Kingdom of the)",
                    "PG" => "Netherlands (Kingdom of the)",
                    "PH" => "Netherlands (Kingdom of the)",
                    "PI" => "Netherlands (Kingdom of the)",
                    "PJ" => "Netherlands (Kingdom of the) - Netherlands Antilles",
                    "PK" => "Indonesia",
                    "PL" => "Indonesia",
                    "PM" => "Indonesia",
                    "PN" => "Indonesia",
                    "PO" => "Indonesia",
                    "PP" => "Brazil (Federative Republic of)",
                    "PQ" => "Brazil (Federative Republic of)",
                    "PR" => "Brazil (Federative Republic of)",
                    "PS" => "Brazil (Federative Republic of)",
                    "PT" => "Brazil (Federative Republic of)",
                    "PU" => "Brazil (Federative Republic of)",
                    "PV" => "Brazil (Federative Republic of)",
                    "PW" => "Brazil (Federative Republic of)",
                    "PX" => "Brazil (Federative Republic of)",
                    "PY" => "Brazil (Federative Republic of)",
                    "PZ" => "Brazil (Suriname (Republic of)",
                    "RA" => "Russian Federation",
                    "RB" => "Russian Federation",
                    "RC" => "Russian Federation",
                    "RD" => "Russian Federation",
                    "RE" => "Russian Federation",
                    "RF" => "Russian Federation",
                    "RG" => "Russian Federation",
                    "RH" => "Russian Federation",
                    "RI" => "Russian Federation",
                    "RJ" => "Russian Federation",
                    "RK" => "Russian Federation",
                    "RL" => "Russian Federation",
                    "RM" => "Russian Federation",
                    "RN" => "Russian Federation",
                    "RO" => "Russian Federation",
                    "RP" => "Russian Federation",
                    "RQ" => "Russian Federation",
                    "RR" => "Russian Federation",
                    "RS" => "Russian Federation",
                    "RT" => "Russian Federation",
                    "RU" => "Russian Federation",
                    "RV" => "Russian Federation",
                    "RW" => "Russian Federation",
                    "RX" => "Russian Federation",
                    "RY" => "Russian Federation",
                    "RZ" => "Russian Federation",
                    "S2" => "Bangladesh (People's Republic of)",
                    "S3" => "Bangladesh (People's Republic of)",
                    "S5" => "Slovenia",
                    "S6" => "Singapore",
                    "S7" => "Seychelles",
                    "S8" => "South Africa",
                    "S9" => "Sao Tome and Principe (Democratic Republic of)",
                    "SA" => "Sweden",
                    "SB" => "Sweden",
                    "SC" => "Sweden",
                    "SD" => "Sweden",
                    "SE" => "Sweden",
                    "SF" => "Sweden",
                    "SG" => "Sweden",
                    "SH" => "Sweden",
                    "SI" => "Sweden",
                    "SJ" => "Sweden",
                    "SK" => "Sweden",
                    "SL" => "Sweden",
                    "SM" => "Sweden",
                    "SN" => "Poland",
                    "SO" => "Poland",
                    "SP" => "Poland",
                    "SQ" => "Poland",
                    "SR" => "Poland",
                    "SS" => "Egypt",
                    "ST" => "Sudan",
                    "SU" => "Egypt",
                    "SV" => "Greece",
                    "SW" => "Greece",
                    "SX" => "Greece",
                    "SY" => "Greece",
                    "SZ" => "Greece",

                    
                    

                    
                    
                    
                    
                    




                   


                    


                    

                




                    
                    


                    






                    

                    
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
