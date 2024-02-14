<?php
session_start(); // セッションの開始

// ログイン処理
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['username']) && isset($_POST['password'])) {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];

    $servername = "localhost";
    $username = "angel";
    $password = "angel";
    $dbname = "countGame";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT username, password, point FROM user WHERE username = '$input_username' AND password = '$input_password'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $_SESSION['username'] = $row['username'];
        $_SESSION['point'] = $row['point'];
    } else {
        echo "ログインに失敗しました。";
    }

    $conn->close();
    header('Location: countGame.php');
    exit();
}

// 登録処理
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['newUsername']) && isset($_POST['newPassword'])) {
    $input_newUsername = $_POST['newUsername'];
    $input_newPassword = $_POST['newPassword'];
    $input_point = 0;

    $servername = "localhost";
    $username = "angel";
    $password = "angel";
    $dbname = "countGame";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO user (username, password, point) VALUES ('$input_newUsername', '$input_newPassword', $input_point)";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['username'] = $input_newUsername;
        $_SESSION['point'] = $input_point;
    } else {
        echo "エラー: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header('Location: countGame.php');
    exit();
}

// セーブ処理
if ($_SERVER['REQUEST_METHOD'] === "POST" && isset($_POST['winningPoint'])) {
    $input_winningPoint = 'winningPoint';
    $newPoint = $_SESSION['point'] + $_POST['winningPoint'];
    $subject = $_SESSION['username'];

    $servername = "localhost";
    $username = "angel";
    $password = "angel";
    $dbname = "countGame";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE user SET point = $newPoint WHERE username = '$subject'";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['username'] = $subject;
        $_SESSION['point'] = $newPoint;
    } else {
        echo "エラー: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header('Location: countGame.php');
    exit();
}
?>
