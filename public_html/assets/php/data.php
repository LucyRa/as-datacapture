<?php

    /**
     * Store the DB details and test the connection.
     * 
     * @param $e - if there are errors store them and then display them via echo
     */
    $host = $_ENV['DBHOST'];
    $pass = $_ENV['DBPASS'];
    $user = $_ENV['DBUSER'];
    $dbse = $_ENV['DBSE'];
    $table = $_ENV['DBTABLE'];

    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbse", $user, $pass);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        /**
         *$selectData - SQL SELECT query to find and return data stored in the form submission database table.
         * 
         * while() - Fetches the data queried in $selectData and then echos out each result as a row in the table visable to the user.
            */
        $selectData = $conn->query("SELECT id, first_name, last_name, gender, age, height_ft, height_in FROM $table");

        while ($row = $selectData->fetch()) {

            echo '<tr>';
            echo '<th scope="row" class="col-1">';
            echo $row["id"];
            echo '</th>';
            echo '<td class="col-3">' . $row['first_name'] . '</td>';
            echo '<td class="col-3">' . $row['last_name'] . '</td>';
            echo '<td class="col-2">' . $row['gender'] . '</td>';
            echo '<td class="col-1">' . $row['age'] . '</td>';
            echo '<td class="col-2">' . $row['height_ft'] . 'ft' . ' ' . $row['height_in'] . 'in' . ' ' . '</td>';
            echo '</tr>';

        }

    } catch(PDOException $e) {
        echo 'Error, unable to connect';
        return 'Connection failed:' . $e->getMessage();
    }

?>