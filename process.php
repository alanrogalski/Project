<?php
$conn = new mysqli("localhost", "root", "", "neongames");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$stmt = $conn->prepare("INSERT INTO uzytkownicy (nickname, email, phone_number, password) VALUES (?, ?, ?, ?)");

if (!$stmt) {
  die("Error: " . $conn->error);
}

// Pobierz dane rejestracji
$nickname = $_POST['nickname'];
$email = $_POST['email'];

$checkEmail = $conn->prepare("SELECT COUNT(*) AS count FROM uzytkownicy WHERE email = ?");

// Check if the SQL statement was prepared successfully
if (!$checkEmail) {
    die("Error: " . $conn->error);
}

// Bind the email parameter to the prepared statement
$checkEmail->bind_param("s", $email);

// Execute the prepared statement
$checkEmail->execute();

$checkEmail->store_result();

// Bind the result variables
$checkEmail->bind_result($count);

// Fetch the result
$checkEmail->fetch();

// Check if the count is greater than 0 (email exists)
if ($count > 0) {
  // Email exists in the database
  header("Location: login.php?error=email_exists");
  exit; // Exit the script
}

$checkNickname = $conn->prepare("SELECT COUNT(*) AS count FROM uzytkownicy WHERE nickname = ?");

// Check if the SQL statement was prepared successfully
if (!$checkNickname) {
    die("Error: " . $conn->error);
}

// Bind the email parameter to the prepared statement
$checkNickname->bind_param("s", $nickname);

// Execute the prepared statement
$checkNickname->execute();

$checkNickname->store_result();

// Bind the result variables
$checkNickname->bind_result($count);

// Fetch the result
$checkNickname->fetch();

// Check if the count is greater than 0 (email exists)
if ($count > 0) {
  // Email exists in the database
  header("Location: login.php?error=nickname_exists");
  exit; // Exit the script
}

$phone_number = $_POST['phone_number'];
$password = $_POST['password'];

// Zhashuj hasło
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Wykonaj zapytanie
$stmt->bind_param("ssss", $nickname, $email, $phone_number, $hashed_password);
$stmt->execute();

// Sprawdź, czy użytkownik został utworzony
if ($stmt->affected_rows == 1) {
  // Przejdź do strony logowania
  header("Location: login.php");
  exit;
} else {
  // Wyświetl komunikat o błędzie
  echo '<div class="alert alert-danger" role="alert">
  <strong>Błąd!</strong> Nie udało się utworzyć użytkownika.
</div>';
}

// Zamknij połączenie z bazą danych
$conn->close();
?>