<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZGŁOSZENIA</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $server = "localhost";
    $user = "root"; 
    $password = "";
    $database = "zgloszenia";
    $connection = mysqli_connect($server, $user, $password, $database);
    if ($connection) {
        echo "database connection error";}
    ?>
    <div class="header">
        <h1>ZGŁOSZENIA</h1>
    </div>
    <div class="main">
        <div class="right">
            <h2>Nowe zgloszenie</h2>
            <ol>
            <?php
            $connection = mysqli_connect($server, $user, $password, $database);
            $query = "SELECT personel.id, personel.nazwisko FROM personel WHERE personel.id not in (SELECT rejestr.id_personel FROM rejestr)";
            $result = mysqli_query($connection, $query);
            echo mysqli_num_rows($result);
            mysqli_close($connection);
            ?>
            <ol>
        </div>
        <div class="left">
            <h2>Personel</h2>
            <form method="post">
                <input type="checkbox" checked name="Policjant">
                <label for="Policjant">Policjant</label>
                <input type="checkbox" checked name="Ratownik">
                <label for="Ratownik">Ratownik</label>
                <button type="submit">Pokaż</button>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Imie</th>
                        <th>Nazwisko</th>
                    </tr>
                    <?php
                    ?>
                </table>
                <form> method="post">
                    <input type="text" label="Wybierz id osoby z listy">
                    <input type="number">
                    <button type="submit">Dodaj zgloszenie</button>

        </div>
    </div>
    <div class="footer"> Strone wykonal: Ballerina Cappuccina</div>


</body>

</html>
