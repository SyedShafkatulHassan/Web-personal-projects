<?php
include "db_conect.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    if (!empty($email) && !empty($name) && !empty($password)) {
        if ($conn) {
            $DuplicateUser = mysqli_query($conn, "Select * From userinformation WHERE UserName ='$name'");
            if (mysqli_num_rows($DuplicateUser) == 0) {
                $sql = "INSERT INTO userinformation (UserName, Email, Password) VALUES ('$name', '$email', '$password')";
                mysqli_query($conn, $sql);
                mysqli_close($conn);
            } else {
                echo '<script>alert("UserNAme taken");</script>';
                echo "UserNAme taken";
                mysqli_close($conn);
            }
        }
    } else {
        echo "Fill up all the fields";
    }
    
}
?>

<!DOCTYPE html>

<body>
    <form method="POST" onsubmit="return validForm()" autocomplete="off">
        <label>User Name: </label>
        <input type="text" name="name" required><br>
        <label>Email: </label>
        <input type="text" name="email" required><br>
        <label>Password: </label>
        <input type="text" name="password" required><br>
        <button type="submit">Submit</button>
    </form>
    <script>
        function validForm() {
            var CheckName = document.forms[0].name.value;
            var CheckEmail = document.forms[0].email.value;
            var CheckPassword = document.forms[0].password.value;

            var UserNameRegex = /^(?=.*[A-Z]).{8}$/;

            if (!UserNameRegex.test(CheckName)) {
                alert("User name need to have one capital letter");
                return false;
            }
            var EmailRegex = /^\S+@\S+\.(com|org)$/;
            if (!EmailRegex.test(CheckEmail)) {
                alert("Email is not correct");
                return false;
            }
        }
    </script>
</body>

</html>