
<?php
$months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
$start_year = date("Y");

$servername = "localhost";
$username = "root"; // replace with your MySQL username
$password = ""; // replace with your MySQL password
$dbname = "seven_eleven_db";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($sql) === TRUE) {
   
} else {
    die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db($dbname);

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS registrations (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    mobile_number VARCHAR(15) NOT NULL,
    birth_date DATE NOT NULL,
    gender VARCHAR(10) NOT NULL,
    terms_accepted BOOLEAN NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
   
} else {
    die("Error creating table: " . $conn->error);
}

$response = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $mobile_number = $_POST['number'];
    $month = $_POST['month'];
    $day = $_POST['day'];
    $year = $_POST['year'];
    $birth_date = $year . '-' . $month . '-' . $day;
    $gender = $_POST['gender'];
    $terms_accepted = isset($_POST['check']) ? 1 : 0;

    $sql = "INSERT INTO registrations (name, email, mobile_number, birth_date, gender, terms_accepted)
    VALUES ('$name', '$email', '$mobile_number', '$birth_date', '$gender', '$terms_accepted')";

    if ($conn->query($sql) === TRUE) {
        $response['status'] = 'success';
        $response['message'] = 'New record created successfully';
    } else {
        $response['status'] = 'error';
        $response['message'] = 'Error: ' . $sql . '<br>' . $conn->error;
    }

    echo json_encode($response);
    exit;
}

$conn->close();
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
    require "partials/nav.php";
  ?>

  <script>
    let nav = document.getElementById("nav");

    const point = document.createElement("div");
    point.classList.add("arrow-up", "arrow-home4");
    nav.appendChild(point);

    function enableDaySelect() {
        let daySelect = document.getElementById("day");
        daySelect.disabled = false;
        daySelect.innerHTML = '<option value="" disabled selected>DAY</option>';
        let daysInMonth = new Date(2024, document.getElementById("month").selectedIndex, 0).getDate();
        for (let i = 1; i <= daysInMonth; i++) {
            let option = document.createElement("option");
            option.value = i;
            option.textContent = i;
            daySelect.appendChild(option);
        }
    }

    async function submitForm(event) {
        event.preventDefault();

        let form = document.getElementById('registrationForm');
        let formData = new FormData(form);

        try {
            let response = await fetch('', {
                method: 'POST',
                body: formData
            });

            let result = await response.json();

            if (result.status === 'success') {
                alert(result.message); // This will show a popup with the success message
                window.location.href = 'product.php'; // Redirect to product.php
            } else {
                let messageContainer = document.getElementById('message');
                messageContainer.innerHTML = '<p class="error">' + result.message + '</p>';
            }
        } catch (error) {
            console.error('Error:', error);
        }
    }
  </script>
  
  <main>
    <!-- this is the description container  -->

    <!-- the main form container  -->
    <div class="form-container">
      <h1>Register Form</h1>

      <div id="message"></div>

      <!-- REGISTRATION FORM  -->
      <form id="registrationForm" onsubmit="submitForm(event)">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>

        <label for="number">Mobile Number</label>
        <input type="text" id="number" name="number" required>

        <label for="birth-date">Date of Birth</label>
        <div class="option-container">

          <select name="month" id="month" required onchange="enableDaySelect();">
            <option value="" disabled selected>MONTH</option>
            <?php foreach($months as $month): ?>
              <option value="<?=$month?>"><?=$month?></option>
            <?php endforeach;?>
          </select>
  
          <select name="day" id="day" required disabled>
            <option value="" disabled selected>DAY</option>
          </select>
  
          <select name="year" required>
            <option value="" disabled selected>YEAR</option>
            <?php for($y = $start_year; $y > 1990; $y--): ?>
              <option value="<?=$y?>"><?=$y?></option>
            <?php endfor;?>
          </select>

        </div>

        <label for="gender">Gender</label>
        <div class="gender-container">
          <input type="radio" name="gender" id="female" value="Female" required>
          <label for="female">Female</label>

          <input type="radio" name="gender" id="male" value="Male" required>
          <label for="male">Male</label>
        </div>

        <div class="check-container">
          <span id="checkbox"><input type="checkbox" name="check" id="check"></span>
          <label for="check"> Privacy:<br> We value your privacy. Please review our Privacy Policy for details on how we collect and use your information.<br><br>I have read and agree to the Terms and Conditions.</label>
        </div>

        <div class="submit-container">
          <input type="submit" value="Submit">
        </div>

        <img src="assets/img/cards.png" alt="card logo">
      </form>
    </div>
  </main>

  <?php require "partials/footer.php"; ?>

  <script src="assets/js/test.js"></script>

</body>
</html>
