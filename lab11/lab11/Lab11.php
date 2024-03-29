<?php
//Fill this place

//****** Hint ******
//connect database and fetch data here
if (isset($_GET['submit'])) {
  $continent = $_GET['continent'];
  $country = $_GET['country'];
  $title = $_GET['title'];
}

$database = new mysqli('localhost', 'root', 'phpandmysql', 'travel');
if (mysqli_connect_errno()) {
  echo '<p>Error: Could not connect to database.</br>Please try again later.</p>';
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Lab11</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

  <link rel="stylesheet" href="css/bootstrap.min.css" />



  <link rel="stylesheet" href="css/captions.css" />
  <link rel="stylesheet" href="css/bootstrap-theme.css" />

</head>

<body>
  <?php include 'header.inc.php'; ?>



  <!-- Page Content -->
  <main class="container">
    <div class="panel panel-default">
      <div class="panel-heading">Filters</div>
      <div class="panel-body">
        <form action="Lab11.php" method="get" class="form-horizontal">
          <div class="form-inline">
            <select name="continent" class="form-control">
              <option value="0">Select Continent</option>
              <?php
              //Fill this place

              //****** Hint ******
              //display the list of continents
              $qu = "SELECT * From continents ";
              $result = $database->query($qu);
              while ($row = $result->fetch_assoc()) {
                echo '<option value=' . $row['ContinentCode'] . '>' . $row['ContinentName'] . '</option>';
              }

              ?>
            </select>

            <select name="country" class="form-control">
              <option value="0">Select Country</option>
              <?php
              //Fill this place

              //****** Hint ******
              /* display list of countries */
              $qu = "SELECT * From countries ";
              $result = $database->query($qu);
              while ($row = $result->fetch_assoc()) {
                echo '<option value=' . $row['ISO'] . '>' . $row['CountryName'] . '</option>';
              }
              ?>
            </select>
            <input type="text" placeholder="Search title" class="form-control" name="title">
            <button type="submit" name="submit" class="btn btn-primary">Filter</button>
          </div>
        </form>

      </div>
    </div>


    <ul class="caption-style-2">
      <?php
      function findatabaseyCountry($country, $database)
      {
        $qu = "SELECT * From imagedetails WHERE CountryCodeISO = '$country' ";
        $result = $database->query($qu);
        while ($row = $result->fetch_assoc()) {
          echo "<li>";
          echo "<a href='detail.php?id=" . $row['ImageID'] . "' class='img-responsive'>";
          echo "<img style='height:225px;width:225px;' src='images/square-medium/" . $row['Path'] . "' alt='" . $row['Title'] . "'>";
          echo "<div class='caption'>";
          echo "<div class='blur'></div>";
          echo "<div class='caption-text'>";
          echo "<p>" . $row['Title'] . "</p>";
          echo "</div></div></a></li>";
        }
      }
      function findatabaseyContinent($continent, $database)
      {
        $qu = "SELECT * From imagedetails WHERE ContinentCode = '$continent' ";
        $result = $database->query($qu);
        while ($row = $result->fetch_assoc()) {
          echo "<li>";
          echo "<a href='detail.php?id=" . $row['ImageID'] . "' class='img-responsive'>";
          echo "<img style='height:225px;width:225px;' src='images/square-medium/" . $row['Path'] . "' alt='" . $row['Title'] . "'>";
          echo "<div class='caption'>";
          echo "<div class='blur'></div>";
          echo "<div class='caption-text'>";
          echo "<p>" . $row['Title'] . "</p>";
          echo "</div></div></a></li>";
        }
      }
      function findatabaseyContinentAndCountry($continent, $country, $database)
      {
        $qu = "SELECT * From imagedetails WHERE ContinentCode = '$continent' AND CountryCodeISO = '$country'";
        $result = $database->query($qu);
        while ($row = $result->fetch_assoc()) {
          echo "<li>";
          echo "<a href='detail.php?id=" . $row['ImageID'] . "' class='img-responsive'>";
          echo "<img style='height:225px;width:225px;' src='images/square-medium/" . $row['Path'] . "' alt='" . $row['Title'] . "'>";
          echo "<div class='caption'>";
          echo "<div class='blur'></div>";
          echo "<div class='caption-text'>";
          echo "<p>" . $row['Title'] . "</p>";
          echo "</div></div></a></li>";
        }
      }
      function findatabaseyTitle($title, $database)
      {
        $qu = "SELECT * From imagedetails WHERE Title LIKE '%$title%' ";
        $result = $database->query($qu);
        while ($row = $result->fetch_assoc()) {
          echo "<li>";
          echo "<a href='detail.php?id=" . $row['ImageID'] . "' class='img-responsive'>";
          echo "<img style='height:225px;width:225px;' src='images/square-medium/" . $row['Path'] . "' alt='" . $row['Title'] . "'>";
          echo "<div class='caption'>";
          echo "<div class='blur'></div>";
          echo "<div class='caption-text'>";
          echo "<p>" . $row['Title'] . "</p>";
          echo "</div></div></a></li>";
        }
      }
      function findatabaseyThree($title, $continent, $country, $database)
      {
        $qu = "SELECT * From imagedetails WHERE Title LIKE '%$title%' AND ContinentCode = '$continent' AND CountryCodeISO = '$country'";
        $result = $database->query($qu);
        while ($row = $result->fetch_assoc()) {
          echo "<li>";
          echo "<a href='detail.php?id=" . $row['ImageID'] . "' class='img-responsive'>";
          echo "<img style='height:225px;width:225px;' src='images/square-medium/" . $row['Path'] . "' alt='" . $row['Title'] . "'>";
          echo "<div class='caption'>";
          echo "<div class='blur'></div>";
          echo "<div class='caption-text'>";
          echo "<p>" . $row['Title'] . "</p>";
          echo "</div></div></a></li>";
        }
      }
      function findatabaseyContinentAndTitle($title, $continent, $database)
      {
        $qu = "SELECT * From imagedetails WHERE Title LIKE '%$title%' AND ContinentCode = '$continent' ";
        $result = $database->query($qu);
        while ($row = $result->fetch_assoc()) {
          echo "<li>";
          echo "<a href='detail.php?id=" . $row['ImageID'] . "' class='img-responsive'>";
          echo "<img style='height:225px;width:225px;' src='images/square-medium/" . $row['Path'] . "' alt='" . $row['Title'] . "'>";
          echo "<div class='caption'>";
          echo "<div class='blur'></div>";
          echo "<div class='caption-text'>";
          echo "<p>" . $row['Title'] . "</p>";
          echo "</div></div></a></li>";
        }
      }
      function findatabaseyCountryAndTitle($title, $country, $database)
      {
        $qu = "SELECT * From imagedetails WHERE Title LIKE '%$title%' AND CountryCodeISO = '$country' ";
        $result = $database->query($qu);
        while ($row = $result->fetch_assoc()) {
          echo "<li>";
          echo "<a href='detail.php?id=" . $row['ImageID'] . "' class='img-responsive'>";
          echo "<img style='height:225px;width:225px;' src='images/square-medium/" . $row['Path'] . "' alt='" . $row['Title'] . "'>";
          echo "<div class='caption'>";
          echo "<div class='blur'></div>";
          echo "<div class='caption-text'>";
          echo "<p>" . $row['Title'] . "</p>";
          echo "</div></div></a></li>";
        }
      }
      function find($database)
      {
        $qu = "SELECT * From imagedetails ";
        $result = $database->query($qu);
        while ($row = $result->fetch_assoc()) {
          echo "<li>";
          echo "<a href='detail.php?id=" . $row['ImageID'] . "' class='img-responsive'>";
          echo "<img style='height:225px;width:225px;' src='images/square-medium/" . $row['Path'] . "' alt='" . $row['Title'] . "'>";
          echo "<div class='caption'>";
          echo "<div class='blur'></div>";
          echo "<div class='caption-text'>";
          echo "<p>" . $row['Title'] . "</p>";
          echo "</div></div></a></li>";
        }
      }
      //Fill this place

      //****** Hint ******
      /* use while loop to display images that meet requirements ... sample below ... replace ???? with field data
            <li>
              <a href="detail.php?id=????" class="img-responsive">
                <img src="images/square-medium/????" alt="????">
                <div class="caption">
                  <div class="blur"></div>
                  <div class="caption-text">
                    <p>????</p>
                  </div>
                </div>
              </a>
            </li>        
            */

      if (isset($_GET['submit'])) {
        if (!empty($title) && !empty($continent) && !empty($country)) {
          findatabaseyThree($title, $continent, $country, $database);
        } else if (!empty($continent) && !empty($country)) {
          findatabaseyContinentAndCountry($continent, $country, $database);
        } else if (!empty($continent) && !empty($title)) {
          findatabaseyContinentAndTitle($title, $continent, $database);
        } else if (!empty($title) && !empty($country)) {
          findatabaseyCountryAndTitle($title, $country, $database);
        } else if (!empty($title)) {
          findatabaseyTitle($title, $database);
        } else if (!empty($country)) {
          findatabaseyCountry($country, $database);
        } else if (!empty($continent)) {
          findatabaseyContinent($continent, $database);
        } else {
          find($database);
        }
      }
      ?>
    </ul>


  </main>

  <footer>
    <div class="container-fluid">
      <div class="row final">
        <p>Copyright &copy; 2017 Creative Commons ShareAlike</p>
        <p><a href="#">Home</a> / <a href="#">About</a> / <a href="#">Contact</a> / <a href="#">Browse</a></p>
      </div>
    </div>


  </footer>


  <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>

</html>