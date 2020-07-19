<?PHP
$dbHost = "localhost";
$dbUser = "root";
$dbPassword = "";
$dbName = "personal-site";

try {
  $dsn = "mysql:host=" . $dbHost . ";dbname=" . $dbName;
  $pdo = new PDO($dsn, $dbUser, $dbPassword);
} catch(PDOException $e) {
  echo "DB Connection Failed: " . $e->getMessage();
}

$status = "";
if($_SERVER['REQUEST_METHOD'] == 'POST') {
  $firstname = $_POST['fname'];
  $lastname = $_POST['lname'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  if(empty($firstname) || empty($lastname) || empty($email) || empty($message)) {
    $status = "All fields are compulsory.";
  } else {
    if(strlen($firstname) >= 255 || !preg_match("/^[a-zA-Z-'\s]+$/", $firstname) || strlen($lastname) >= 255 || !preg_match("/^[a-zA-Z-'\s]+$/", $lastname)) {
      $status = "Please enter a valid name";
    } else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $status = "Please enter a valid email";
    } else {

      $sql = "INSERT INTO contactinfo (fname, lname, email, message) VALUES (:fname, :lname, :email, :message)";

      $stmt = $pdo->prepare($sql);
      
      $stmt->execute(['fname' => $firstname, 'lname' => $lastname, 'email' => $email, 'message' => $message]);

      $status = "Your message was sent";
      $firstname = "";
      $email = "";
      $message = "";
    }
  }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <title>Contact Us</title>
</head>

<body>

  <div class="container">
    <h1>Contact Us Here</h1>

    <form action="" method="POST" class="main-form">
      <div class="form-group">
        <label for="name">First Name</label>
        <input type="text" name="fname" id="fname" class="gt-input">
      </div>

      <div class="form-group">
        <label for="name">last Name</label>
        <input type="text" name="lname" id="lname" class="gt-input">
      </div>

      <div class="form-group">
        <label for="email">Email</label>
        <input type="text" name="email" id="email" class="gt-input">
      </div>

      <div class="form-group">
        <label for="message">Your Message</label>
        <textarea name="message" id="message" cols="30" rows="10"
          class="gt-input gt-text"></textarea>
      </div>

      <input type="submit" class="gt-button" value="Submit">

      <div class="form-status">
        <?php echo $status ?>
      </div>
    </form>
  </div>

  <script src="main.js"></script>

</body>

</html>