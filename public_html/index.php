<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Google charts scripts -->
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
    google.charts.load('current', {'packages':['corechart', 'bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Age (years)', 'Female', 'Male', 'Non-binary'],
          <?php include('assets/php/charts.php'); ?> //Calls the file that formats the data object
        ]);

        var options = {
          chart: {
            title: 'Average height, based on age and gender',
            subtitle: 'Data collected: 24/01/2018 - 24/01/2019'
          },
          colors: ['#FB8F94', '#4591A9', '#45A845'], //Set the bar colours to visually distinguish gender values
          series: {
              0: {axis: 'height'} //Bind series one to an axis named 'height' so that a label can be assigned to it
          },
          axes: {
              y: {
                height: {label: 'Height (ft)'} //Add a label to the left Y axis
            }
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }

    </script>
    <!-- Google charts scripts END -->

    <!-- Stylesheets -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
    <!-- Stylesheets END -->

    <title>L Ramplin</title>
</head>
<body>
    <nav class="navbar fixed-top">
        <span class="text-white">Data Capture</span>
    </nav>

    <main>    
        <div class="container-md" id="top-section">
            <div class="row">
                <div class="col-md-4">

                    <?php include('assets/php/process.php'); ?>

                    <!-- Data collection form -->
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="fname">First name:</label>
                                <input type="text" class="form-control" id="fname" placeholder="Enter your first name..." name="fname" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="lname">Last name:</label>
                                <input type="text" class="form-control" id="lname" placeholder="Enter your last name..." name="lname" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="gender">Gender</label>
                                <select class="form-control" id="gender" placeholder="Gender" name="gender" required>
                                <option value="" disabled selected>Select your gender</option>
                                <option value="Female">Female</option>
                                <option value="Male">Male</option>
                                <option value="Non-Binary">Non-binary</option>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                                </select>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <label for="age">Age:</label>
                                <input type="number" class="form-control" id="age" placeholder="Enter your age" name="age" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <label >Height:</label>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-6">
                                <input type="number" class="form-control" id="height_ft" placeholder="Ft." name="height_ft" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>

                            <div class="col-md-6">
                                <input type="number" class="form-control" id="height_in" placeholder="In." name="height_in" required>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback">Please fill out this field.</div>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-dark">Submit</button>    
                            </div>
                        </div>
                    </form>
                    <!-- Data collection form END -->
                </div>

                <div class="col-md-8">
                    <div class="row" id="chart-wrap">
                        <div id="columnchart_material"></div>
                    </div>                    
                </div>
            </div>
        </div>

        <div class="container-fluid bg-dark" id="table-container">
            <div class="container-md bg-dark">
                <div class="row">
                    <div class="table-responsive-md">
                        <table class="table table-dark" id="table-structure">
                            <thead>
                                <tr>
                                    <th scope="col" class="col-1">ID</th>
                                    <th scope="col" class="col-3">First name</th>
                                    <th scope="col" class="col-3">Last name</th>
                                    <th scope="col" class="col-2">Gender</th>
                                    <th scope="col" class="col-1">Age</th>
                                    <th scope="col" class="col-2">Height</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- PHP - SELECT from DB, while loop (for each row. ECHO each element + data) -->
                                <?php include('assets/php/data.php'); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script src="assets/js/script.js"></script>
    <!-- JS Scripts END -->
</body>
</html>