<?php 
  $months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
  $start_year = date("Y");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Seven Eleven</title>
  
  <link rel="stylesheet" href="assets/css/home.css">
  <link rel="stylesheet" href="assets/css/home-reponsive.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

  <?php 
    require "partials/header.php";
    require "partials/nav.php"
  ?>



  <script>
    let nav = document.getElementById("nav");

    const point = document.createElement("div");
    point.classList.add("arrow-up", "arrow-home3");
    nav.appendChild(point);

  </script>
  
  <main>
  <div><iframe src="https://maps.co/embed/669c8d6d49c63570929793sepd1260a" width="800" height="600" frameborder="0" allowfullscreen></iframe><div><a href="https://maps.co">Powered by MAPS</a></div></div>
    
</main>

  
    

  <?php require "partials/footer.php"; ?>

  <script src="assets/js/test.js"></script>

</body>
</html>