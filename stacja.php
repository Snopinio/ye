<?php

$conn = new mysqli('localhost', 'root', '', 'stacjepaliw');

// Pobranie wartości ceny z formularza
if (isset($_POST['max-price'])) {
    $cena = (float)$_POST['max-price'];  
    echo "Otrzymana cena z formularza: " . $cena . " PLN<br>";
} else {
    die("Brak ustawionej wartości ceny.");
} 

// Zapytanie SQL do bazy danych
$sql = "SELECT stacje_paliw.nazwa, adresy.miasto, adresy.ulica, adresy.numer, stacje_paliw.cena_paliwa 
        FROM stacje_paliw 
        JOIN adresy ON stacje_paliw.adres = adresy.id 
        WHERE stacje_paliw.cena_paliwa <= ?";

$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Błąd przygotowania zapytania: " . $conn->error);
}

$stmt->bind_param("d", $cena);
$stmt->execute();
$result = $stmt->get_result();

if ($result === false) {
    die("Błąd wykonania zapytania: " . $conn->error);
}

// Wyświetlanie wyników
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Stacja: " . $row["nazwa"] . " - " . $row["miasto"] . ", " . $row["ulica"] . " " . $row["numer"] . " - Cena: " . $row["cena_paliwa"] . " PLN<br>";
    }
} else {
    echo "Brak stacji spełniających kryteria.<br>";
}

$stmt->close();
$conn->close();


