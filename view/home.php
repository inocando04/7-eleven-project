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
  <link rel="stylesheet" href="assets/css/background.css">
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
    point.classList.add("arrow-up", "arrow-home1");
    nav.appendChild(point);

  </script>
  

  <div class ="home-container">

    <img src="assets/img/franchise.png" alt="">

  </div>


  
    

  <?php require "partials/footer.php"; ?>

  <script src="assets/js/test.js"></script>

</body>
</html>