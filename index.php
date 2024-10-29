<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Najtańsze paliwo</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>

    <div id="kontener">
        <div id="lewastrona">
            <div id="logo">
                <img src="jasper.jpg" alt="logo">
            </div>
            <form action="stacje.php" method="post">
                <button type="submit">WSZYTSKIE STACJE</button>
            </form>
            <input type="text" id="stacja" placeholder="Wpisz nazwę stacji">

            <label for="miasto">Miasto</label>
            <select id="miasto">
                <option value="Warszawa">Warszawa</option>
                <option value="Kraków">Kraków</option>
                <option value="Gdańsk">Gdańsk</option>
                <option value="Wrocław">Wrocław</option>
                <option value="Poznań">Poznań</option>
            </select>

            <div id="filtry">
                    <form method="post" action="stacja.php">
                        <label for="min_price">Cena minimalna:</label>
                        <input type="number" step="0.01" name="min_price" id="min_price"
                            value="<?php echo $min_price; ?>">
                        <label for="max_price">Cena maksymalna:</label>
                        <input type="number" step="0.01" name="max_price" id="max_price"
                            value="<?php echo $max_price; ?>">
                        <input type="submit">
                    </form>
            </div>
        </div>
        <div id="szukanie">
        
        </div>
    </div>
</body>

</html>