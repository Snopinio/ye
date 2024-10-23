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
            <input type="text" id="station" placeholder="Wpisz nazwę stacji">

            <label for="city">Miasto</label>
            <select id="city">
                <option value="">Wybierz miasto</option>
                <option value="Warszawa">Warszawa</option>
                <option value="Kraków">Kraków</option>
                <option value="Gdańsk">Gdańsk</option>
                <option value="Wrocław">Wrocław</option>
                <option value="Poznań">Poznań</option>
            </select>

            <div id="filtry">
                <form>
                    <label for="zakres-ceny"><h1>Zakres cenowy</h1></label>
                    <input type="range" id="min-price" value="1.00" step="0.01">
                    <div id="ceny">
                        <span>Cena od: 1 pln</span>
                    </div>
                    <input type="range" id="max-price" value="9.99" step="0.01">
                    <div id="ceny">
                        <span>Cena do: 100 pln</span>
                    </div>
                    <button type="submit">RESTET</button>
                    <button type="submit">SZUKAJ</button>
                </form>
            </div>
        </div>
        <div id="szukanie">
            <?php
            $baza = new mysqli('localhost', 'root', '', 'stacjepaliw');
            <!
            $baza->close();
            ?>
        </div>
    </div>
</body>

</html>