  <nav>
    <div class="nav-container closeHamburgermenu" id="nav">
      <ul>
      <li><a href="home.php">Home</a></li>
        <li><a href="product.php">Product</a></li>
        <li><a href="location.php">Location</a></li>
       
        <li><a href="contact.php">Registration Form</a></li>
      </ul>
    </div>

    <!-- this is the hamburger menu
     this is set to display none when in deskstop mode  -->
     <div class="menu-container" onmouseover="hoverMenuColorAdd()" onmouseout="hoverMenuColorGone()" onclick="openHamburgerMenu()">
        <span class="line"></span>
        <span class="line"></span>
        <span class="line"></span>
      </div>

    <!-- search bar  
     this is set to display none when in desktop mode-->
    <div class="search-container">
      <input type="text">
      <button type="submit"><i class="fa fa-search"></i></button>
    </div>
  </nav>