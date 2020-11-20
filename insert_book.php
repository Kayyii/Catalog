<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Entry Results</title>
</head>
<body>
    <h1>Book Entry Results</h1>
    <?php
    // TODO 1: Create short variable names.
    // $isbn = $_POST['isbn'];
    // $author = $_POST['author'];
    // $title = $_POST['title'];
    // $price = $_POST['price'];
    $isbn = '';
    $author = '';
    $title = '';
    $price = '';

    // TODO 2: Check and filter data coming from the user.
    if (!empty($_POST['isbn']) &&
        !empty($_POST['author']) &&
        !empty($_POST['title']) &&
        !empty($_POST['price'])) {
        $isbn = htmlspecialchars($_POST['isbn']);
        $author = htmlspecialchars($_POST['author']);
        $title = htmlspecialchars($_POST['title']);
        $price = htmlspecialchars($_POST['price']);
        // $isbn = htmlspecialchars($_POST['isbn']);
        // $author = htmlspecialchars($_POST['author']);
        // $title = htmlspecialchars($_POST['title']);
        // $price = htmlspecialchars($_POST['price']);

    // TODO 3: Setup a connection to the appropriate database.
    $hn = 'localhost';
    $db = 'publications';
    $un = 'tan';
    $pw = 'password';

    $conn = new mysqli($hn, $un, $pw, $db);
    if($conn->connect_error) die("Fatal Error");

    // TODO 4: Query the database.
    $query = "INSERT INTO catalogs (isbn, author, title, price) 
                VALUES ('$isbn', '$author', '$title', '$price')";
    
    // TODO 5: Display the feedback back to user.
    $result = $conn->query($query);
    if ($result) {
        echo "Insert Successful! <br><br>";
    } else {
        echo "Insert Failed! Please try again... <br><br>";
    }

    // TODO 6: Disconnecting from the database.
    $conn->close();

    } else {
        die("Please key in all field");
    }

    ?>
</body>
</html>