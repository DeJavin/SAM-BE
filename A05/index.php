<?php
include("connect.php");
include("classes.php");

$islands = array();
$islandContents = array();

$query = "SELECT * FROM `islandsofpersonality`";

$queryResult = executeQuery($query);

while ($islandRow = mysqli_fetch_assoc($queryResult)) {
  $array = new Island($islandRow['islandOfPersonalityID'], $islandRow['name'], $islandRow['shortDescription'], $islandRow['longDescription'], $islandRow['color'], $islandRow['image']);

  array_push($islands, $array);
  }

  $contentQuery = "SELECT * FROM islandcontents";
  $contentResult = mysqli_query($conn, $contentQuery);

  while ($contentRow = mysqli_fetch_assoc($contentResult)) {
      $a = new Content($contentRow['islandContentID'], $contentRow['islandOfPersonalityID'], $contentRow['image'], $contentRow['content'], $contentRow['color']);

      array_push($islandContents, $a);
  }

?>

<!DOCTYPE html>
<html>
<head>
<title>Bootstrap Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body, html {
  height: 100%;
  line-height: 1.8;
}
.bgimg-1 {
  background-position: center;
  background-size: cover;
  background-image: url("images/ins.jpg");
  min-height: 100%;
}

.bold-lead {
  font-weight: bold;
  font-size:1.4rem;
}
.large-bold-lead {
    font-weight: bold;
    font-size: 2.2rem
}

.card-img-top {
  height: 270px
}

</style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#home">DJAP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#island">ISLAND</a></li>
      </ul>
    </div>
  </div>
</nav>

<!-- Header -->
<header class="bgimg-1 d-flex align-items-center justify-content-center text-center text-black" id="home" style="height: 100vh;">
  <div>
    <h1 class="display-3">Deneb Pañares</h1>
    <p class="bold-lead mt-5">Meet the different sides of me</p>
    <a href="#island" class="btn btn-light btn-lg mt-1">My personalities</a>
  </div>
</header>

<!-- Island Section -->
<div class="container py-5" id="island">
  <div class="row">
  <?php 
    foreach ($islands as $island) {
        // Output Island Title
        echo '<div class="col-12 text-center mt-4">';
        echo $island->generateTitle();
        echo '</div>';
        
        // Loop through the corresponding content for each island
        foreach ($islandContents as $content) {
            // Check if the content's fk matches the island's id
            if ($content->fk == $island->id) {
                // Output the content related to the island
                echo $content->generateContent();
            }
        }
    }
  ?>
  </div>
</div>


<!-- Footer with social icons -->
<footer class="bg-dark text-white pt-2 pb-2" id="footer">
  <div class="row align-items-center">
  <div class="col-md-12 text-center">
  <p class="mb-0">© DEJAVIN. All rights reserved.</p>
  </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
