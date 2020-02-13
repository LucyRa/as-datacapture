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
         * Validate the data sent from the form by checking that there are no extra spaces, no forward or back slashes and then turn all symbols into html entity characters.
         * 
         * @return string - validated data.
         */

        $fname = '';
        $lname = '';
        $gender = '';
        $age = '';
        $heightft = '';
        $heightin = '';

        function checks($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $fname = checks($_POST['fname']);
            $lname = checks($_POST['lname']);
            $gender = checks($_POST['gender']);
            $age = checks($_POST['age']);
            $heightft = checks($_POST['height_ft']);
            $heightin = checks($_POST['height_in']);

            

            /**
             * Prepare a SQL statement containing the collected data from the form, then insert the data into the database.
             * 
             * $stmt - SQL query to insert data into the database. Data values are stored as vairables and then bound to the SQL statment
             */

            $bindings = [$fname, $lname, $gender, $age, $heightft, $heightin];

            $stmt = $conn->prepare("INSERT INTO $table (first_name, last_name, gender, age, height_ft, height_in) VALUES (?, ?, ?, ?, ?, ?)");

            /**
             * Bind the data collected from the form to the variables called in the prepared statement.
             * 
             * Exectute the statement to run the SQL query and insert into the database.
             */

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $gender = $_POST['gender'];
            $age = $_POST['age'];
            $heightft = $_POST['height_ft'];
            $heightin = $_POST['height_in'];
            $stmt->execute($bindings);

            $stmt = null;
            $conn = null;

        }

    }
    catch(PDOException $e)
        {
        echo "Connection failed: " . $e->getMessage();
    }

    

?>