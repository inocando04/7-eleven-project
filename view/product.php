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
  <link rel="stylesheet" href="assets/css/product.css">
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
    point.classList.add("arrow-up", "arrow-home2");
    nav.appendChild(point);

  </script>
  
<main>

  <div class="sample-container">
    <h1 class>What's new</h1>
  </div>

  <div class="food-container">
  <img src="assets/img/product-img/cake-roll.jpg" alt="cake-roll">
  <img src="assets/img/product-img/cheese-hot.jpg" alt="cheese-hot">
  <img src="assets/img/product-img/chicken-burger.jpg" alt="chicken-burger">
  
  </div>

  <div class="food-container">
  <img src="assets/img/product-img/chicken-fillet.jpg" alt="cake-roll">
  <img src="assets/img/product-img/cookies.jpg" alt="cheese-hot">
  <img src="assets/img/product-img/frank.jpg" alt="chicke-burger">
  
  </div>

  <div class="food-container">
  <img src="assets/img/product-img/hotdog.jpg" alt="cake-roll">
  <img src="assets/img/product-img/meat-balls.jpg" alt="cheese-hot">
  <img src="assets/img/product-img/siopao.jpg" alt="chicke-burger">
  
  </div>

</main>
    

  <?php require "partials/footer.php"; ?>

  <script src="assets/js/test.js"></script>

</body>
</html>