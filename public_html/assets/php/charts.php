<?php

    
    /**
     * Retrive the returned data and turn it into a JSON object to be read by Google Charts
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

        /**AVERAGE HEIGHTS OF FEMALES */
        //Query the database to calculate the average height of females aged up to 24, then execute the queries and round the numbers to the nearest integer.
        $avgHeightFt_Fem24 = $conn->query("SELECT AVG(height_ft) FROM $table WHERE gender='Female' AND age <= 24");
        $ftFem24 = $avgHeightFt_Fem24->fetch(); //Average value

        $avgHeightIn_Fem24 = $conn->query("SELECT AVG(height_in) FROM $table WHERE gender='Female' AND age <= 24");
        $inFem24 = $avgHeightIn_Fem24->fetch();

        $ftFem24_round = round($ftFem24['AVG(height_ft)']); //Round height (ft)
        $inFem24_round = round($inFem24['AVG(height_in)']); //Round height (in)



        //Query the database to calculate the average height of females aged 25-49, then execute the queries and round the numbers to the nearest integer.
        $avgHeightFt_Fem49 = $conn->query("SELECT AVG(height_ft) FROM $table WHERE gender='Female' AND age >= 25 AND age <= 49");
        $ftFem49 = $avgHeightFt_Fem49->fetch();
        
        $avgHeightIn_Fem49 = $conn->query("SELECT AVG(height_in) FROM $table WHERE gender='Female' AND age >= 25 AND age <= 49");
        $inFem49 = $avgHeightIn_Fem49->fetch();
        
        $ftFem49_round = round($ftFem49['AVG(height_ft)']); //Round height (ft)
        $inFem49_round = round($inFem49['AVG(height_in)']); //Round height (in)


        //Query the database to calculate the average height of females aged 50-74, then execute the queries and round the numbers to the nearest integer.
        $avgHeightFt_Fem74 = $conn->query("SELECT AVG(height_ft) FROM $table WHERE gender='Female' AND age >= 50 AND age <= 74");
        $ftFem74 = $avgHeightFt_Fem74->fetch();
        
        $avgHeightIn_Fem74 = $conn->query("SELECT AVG(height_in) FROM $table WHERE gender='Female' AND age >= 50 AND age <= 74");
        $inFem74 = $avgHeightIn_Fem74->fetch();
        
        $ftFem74_round = round($ftFem74['AVG(height_ft)']); //Round height (ft)
        $inFem74_round = round($inFem74['AVG(height_in)']); //Round height (in)


        //Query the database to calculate the average height of females aged 75+, then execute the queries and round the numbers to the nearest integer.
        $avgHeightFt_Fem75 = $conn->query("SELECT AVG(height_ft) FROM $table WHERE gender='Female' AND age >= 75");
        $ftFem75 = $avgHeightFt_Fem75->fetch();
        
        $avgHeightIn_Fem75 = $conn->query("SELECT AVG(height_in) FROM $table WHERE gender='Female' AND age >= 75");
        $inFem75 = $avgHeightIn_Fem75->fetch();
        
        $ftFem75_round = round($ftFem75['AVG(height_ft)']); //Round height (ft)
        $inFem75_round = round($inFem75['AVG(height_in)']); //Round height (in)

        /**AVERAGE HEIGHTS OF FEMALES - END */


        /**AVERAGE HEIGHTS OF MALES */
        //Query the database to calculate the average height of males aged up to 24, then execute the queries and round the numbers to the nearest integer.
        $avgHeightFt_Male24 = $conn->query("SELECT AVG(height_ft) FROM $table WHERE gender='Male' AND age <= 24");
        $ftMal24 = $avgHeightFt_Male24->fetch();
        
        $avgHeightIn_Male24 = $conn->query("SELECT AVG(height_in) FROM $table WHERE gender='Male' AND age <= 24");
        $inMal24 = $avgHeightIn_Male24->fetch();
        
        $ftMal24_round = round($ftMal24['AVG(height_ft)']); //Round height (ft)
        $inMal24_round = round($inMal24['AVG(height_in)']); //Round height (in)


        //Query the database to calculate the average height of males aged 25-49, then execute the queries and round the numbers to the nearest integer.
        $avgHeightFt_Male49 = $conn->query("SELECT AVG(height_ft) FROM $table WHERE gender='Male' AND age >= 25 AND age <= 49");
        $ftMal49 = $avgHeightFt_Male49->fetch();
        
        $avgHeightIn_Male49 = $conn->query("SELECT AVG(height_in) FROM $table WHERE gender='Male' AND age >= 25 AND age <= 49");
        $inMal49 = $avgHeightIn_Male49->fetch();
        
        $ftMal49_round = round($ftMal49['AVG(height_ft)']); //Round height (ft)
        $inMal49_round = round($inMal49['AVG(height_in)']); //Round height (in)


        //Query the database to calculate the average height of males aged 50-74, then execute the queries and round the numbers to the nearest integer.
        $avgHeightFt_Male74 = $conn->query("SELECT AVG(height_ft) FROM $table WHERE gender='Male' AND age >= 50 AND age <= 74");
        $ftMal74 = $avgHeightFt_Male74->fetch();
        
        $avgHeightIn_Male74 = $conn->query("SELECT AVG(height_in) FROM $table WHERE gender='Male' AND age >= 50 AND age <= 74");
        $inMal74 = $avgHeightIn_Male74->fetch();
        
        $ftMal74_round = round($ftMal74['AVG(height_ft)']); //Round height (ft)
        $inMal74_round = round($inMal74['AVG(height_in)']); //Round height (in)


        //Query the database to calculate the average height of males aged 75+, then execute the queries and round the numbers to the nearest integer.
        $avgHeightFt_Male75 = $conn->query("SELECT AVG(height_ft) FROM $table WHERE gender='Male' AND age >= 75");
        $ftMal75 = $avgHeightFt_Male75->fetch();
        
        $avgHeightIn_Male75 = $conn->query("SELECT AVG(height_in) FROM $table WHERE gender='Male' AND age >= 75");
        $inMal75 = $avgHeightIn_Male75->fetch();
        
        $ftMal75_round = round($ftMal75['AVG(height_ft)']); //Round height (ft)
        $inMal75_round = round($inMal75['AVG(height_in)']); //Round height (in)
        /**AVERAGE HEIGHTS OF MALES - END */


        /**AVERAGE HEIGHTS OF NON-BINARY */
        //Query the database to calculate the average height of non-binary aged up to 24, then execute the queries and round the numbers to the nearest integer.
        $avgHeightFt_Nb24 = $conn->query("SELECT AVG(height_ft) FROM $table WHERE gender='Non-Binary' AND age <= 24");
        $ftNb24 = $avgHeightFt_Nb24->fetch();

        $avgHeightIn_Nb24 = $conn->query("SELECT AVG(height_in) FROM $table WHERE gender='Non-Binary' AND age <= 24");
        $inNb24 = $avgHeightIn_Nb24->fetch();
        
        $ftNb24_round = round($ftNb24['AVG(height_ft)']); //Round height (ft)
        $inNb24_round = round($inNb24['AVG(height_in)']); //Round height (in)

        
        //Query the database to calculate the average height of non-binary aged 25-49, then execute the queries and round the numbers to the nearest integer.
        $avgHeightFt_Nb49 = $conn->query("SELECT AVG(height_ft) FROM $table WHERE gender='Non-Binary' AND age >= 25 AND age <= 49");
        $ftNb49 = $avgHeightFt_Nb49->fetch();
        
        $avgHeightIn_Nb49 = $conn->query("SELECT AVG(height_in) FROM $table WHERE gender='Non-Binary' AND age >= 25 AND age <= 49");
        $avgHeightIn_Nb49->fetch();
        $inNb49 = $avgHeightIn_Nb49->fetch();
        
        $ftNb49_round = round($ftNb49['AVG(height_ft)']); //Round height (ft)
        $inNb49_round = round($inNb49['AVG(height_in)']); //Round height (in)


        //Query the database to calculate the average height of non-binary aged 50-74, then execute the queries and round the numbers to the nearest integer.
        $avgHeightFt_Nb74 = $conn->query("SELECT AVG(height_ft) FROM $table WHERE gender='Non-Binary' AND age >= 50 AND age >= 74");
        $ftNb74 = $avgHeightFt_Nb74->fetch();
        
        $avgHeightIn_Nb74 = $conn->query("SELECT AVG(height_in) FROM $table WHERE gender='Non-Binary' AND age >= 50 AND age >= 74");
        $inNb74 = $avgHeightIn_Nb74->fetch();
        
        $ftNb74_round = round($ftNb74['AVG(height_ft)']); //Round height (ft)
        $inNb74_round = round($inNb74['AVG(height_in)']); //Round height (in)

        
        //Query the database to calculate the average height of non-binary aged 75+, then execute the queries and round the numbers to the nearest integer.
        $avgHeightFt_Nb75 = $conn->query("SELECT AVG(height_ft) FROM $table WHERE gender='Non-Binary' AND age >= 75");
        $ftNb75 = $avgHeightFt_Nb75->fetch();
        
        $avgHeightIn_Nb75 = $conn->query("SELECT AVG(height_in) FROM $table WHERE gender='Non-Binary' AND age >= 75");
        $inNb75 = $avgHeightIn_Nb75->fetch();
        
        $ftNb75_round = round($ftNb75['AVG(height_ft)']); //Round height (ft)
        $inNb75_round = round($inNb75['AVG(height_in)']); //Round height (in)
        /**AVERAGE HEIGHTS OF NON-BINARY - END */

        echo "
            ['0-24'," . $ftFem24_round . "." . $inFem24_round . ", " . $ftMal24_round . "." . $inMal24_round . ", " . $ftNb24_round . "." . $inNb24_round . "],
            ['25-49'," . $ftFem49_round . "." . $inFem49_round . ", " . $ftMal49_round . "." . $inMal49_round . ", " . $ftNb49_round . "." . $inNb49_round . "],
            ['50-74'," . $ftFem74_round . "." . $inFem74_round . ", " . $ftMal74_round . "." . $inMal74_round . ", " . $ftNb74_round . "." . $inNb74_round . "],
            ['75+'," . $ftFem75_round . "." . $inFem75_round . ", " . $ftMal75_round . "." . $inMal75_round . ", " . $ftNb75_round . "." . $inNb75_round . "]
        ";

    } catch(PDOException $e) {
        // Echo any connection errors to the user
        echo 'Error, unable to connect';
        return 'Connection failed:' . $e->getMessage();
    }



    // //Prepare the query to the database, then execute it ready to format the returned data
        // $chartsQuery = $conn->query("SELECT id, first_name, last_name, gender, age, height_ft, height_in FROM $table");
        // $chartsQuery->fetch();

        // //Return an array of the data selected from the database
        // $returnedChartData = $chartsQuery->fetchAll(PDO::FETCH_ASSOC);
        // echo '<pre>';
        // var_dump( $returnedChartData);
        // echo '</pre>';
?>