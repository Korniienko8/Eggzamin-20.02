<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZGŁOSZENIA</title>
    <link rel="stylesheet" href="styl.css">
</head>

<body>
    <?php
    $server = "localhost";
    $user = "root"; 
    $password = "";
    $database = "zgloszenia";
    $connection = mysqli_connect($server, $user, $password, $database);
  
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
                $query = 'SELECT personel.id, personel.nazwisko FROM personel WHERE personel.id not in (SELECT rejestr.id_personel FROM rejestr);';
                $result = mysqli_query($connection, $query);

                echo "<ol>";


               for ($i = 0; $i < mysqli_num_rows($result); $i++) {

                        $dane1 = mysqli_fetch_array($result);

                        echo "<li>$dane1[id] $dane1[nazwisko]</li>";



                    }
                          echo "</ol>";

                ?>
                
            <ol>
                   <form method="post">
                    <input type="text" label="Wybierz id osoby z listy">Wybierz id osoby z listy</input>
                    <br>
                    <input type="number">
                    <button type="submit">Dodaj zgloszenie</button>

        </div>


        <div class="left">
            <h2>Personel</h2>
            <form method="post">
                <input type="radio" value="policjant" checked name="Policjant">
                <label for="Policjant">Policjant</label>
                <input type="radio" value="ratownik" name="Policjant">
                <label for="Ratownik">Ratownik</label>
                <button type="submit">Pokaż</button>
                <table>
                    <tr>
                        <th>Id</th>
                        <th>Imie</th>
                        <th>Nazwisko</th>
                    </tr>
                    <?php
                    if (isset($_POST['Policjant'])) {
                        $policjant = $_POST['Policjant'];
                        $query1 = "SELECT personel.id, personel.imie, personel.nazwisko FROM personel WHERE personel.status = '$policjant'";
                        $result = mysqli_query($connection, $query1);



                        while ($table = mysqli_fetch_row($result)) {
                            echo "<tr>";
                            echo "<th>$table[0]</th>";
                            echo "<th>$table[1]</th>";
                            echo "<th>$table[2]</th>";
                            echo "</tr>";
                        }
                    } 
                
                      mysqli_close($connection);
                    ?>
                </table>
             

        </div>
    </div>
    <div class="footer"> Strone wykonal: Ballerina Cappuccina</div>


</body>

</html>
