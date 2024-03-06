<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="insertMultiple.css">
</head>
<body>
    <h1>PHP MySQL Insert Multiple Records</h1>
<form method="POST">
    <div class="one">
    <label for="">Firstname :</label>
    <input type="text" name="Fname" id="">
    <label for="">Lastname :</label>
    <input type="text" name="Lname" id="">
    <label for="">Email :</label>
    <input type="text" name="Email" id="">
    </div>
    <div class="two">
    <label for="">Firstname :</label>
    <input type="text" name="FnameOne" id="">
    <label for="">Lastname :</label>
    <input type="text" name="LnameOne" id="">
    <label for="">Email :</label>
    <input type="text" name="EmailOne" id="">
    </div>
        <input type="submit" name="sub" id="he" value="Insert">
    </form>
    <?php 
        if($_SERVER["REQUEST_METHOD"] == "POST" ){
            $servername ="localhost";
            $username = "root";
            $password = "";
        try {
            $conn = new PDO("mysql:host=$servername;dbname=test", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $stmt = $conn -> prepare("INSERT INTO `tableone`(firstName, lastName, email) VALUES (:firstname, :lastname, :email)");
            $stmt->bindParam(':firstname', $firstname);
            $stmt->bindParam(':lastname', $lastname);
            $stmt->bindParam(':email', $email);

             // insert a row
            $firstname = $_POST["Fname"];
            $lastname = $_POST["Lname"];
            $email= $_POST["Email"];
            $stmt->execute();

            // insert another row
            $firstnam = $_POST["FnameOne"];
            $lastname = $_POST["LnameOne"];
            $email= $_POST["EmailOne"];
            $stmt->execute();
            echo "<p class = green>New records created successfully</p>";
            } catch (PDOException $e) {
            echo "<p class = red>New record note created</p> " . $e->getMessage();
        }
    }
    ?>
</body>
</html>