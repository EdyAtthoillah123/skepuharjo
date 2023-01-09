<?php

include 'koneksi/koneksi.php';
error_reporting(0);
session_start();

// if (isset($_SESSION['nama_lengkap'])) {
//     header("Location: dashboard.php");
// }
// include 'Api/PDO/pdo.php';
// /* Login status: false = not authenticated, true = authenticated. */
// $login = FALSE;
// /* Username from the login form. */
// $username = $_POST['id_akun'];
// /* Password from the login form. */
// $password = $_POST['password'];
// /* Remember to validate $username and $password. */
// /* Look for the username in the database. */
// $query = 'SELECT * FROM akun WHERE (id_akun = :id_akunn)';
// /* Values array for PDO. */
// $values = [':id_akunn' => $username];
// /* Execute the query */
// try
// {
//   $res = $pdo->prepare($query);
//   $res->execute($values);
// }
// catch (PDOException $e)
// {
//   /* Query error. */
//   echo 'Query error.';
//   die();
// }
// $row = $res->fetch(PDO::FETCH_ASSOC);
// /* If there is a result, check if the password matches using password_verify(). */
// if (is_array($row))
// {
//   if (password_verify($password, $row['password']))
//   {
//     /* The password is correct. */
//     $login = TRUE;
//     session_start();
//                 $_SESSION['id_akun'];
//                 $_SESSION['password'];
//                 $_SESSION['nama_lengkap'];
//                 $_SESSION['hak_akses'];

//                 $_SESSION['rt'];
//                 $_SESSION['rw'];
                
//     header('Location: dashboard.php');

//   }
// }
if (isset($_POST['submit'])) {
    $email = ($_POST['id_akun']);
    $password = md5($_POST['password']);

    if (!empty(trim($email)) && !empty(trim($password))) {
        $sql = "SELECT * FROM akun WHERE id_akun='$email' and hak_akses = '1' ";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        while ($row = mysqli_fetch_array($result)) {
            $userval = $row['id_akun'];
            // $_SESSION = $userval;
            $passval = $row['password'];
            // $_SESSION = $passval;
            $username = $row['nama_lengkap'];
            // $_SESSION = $username;
            $hakakses = $row['hak_akses'];
            $RT = $row['rt'];
            $RW = $row['rw'];
        }

        if ($num != 0) {
            if ($userval == $email && $passval == $password) {
                session_start();
                $_SESSION['id_akun'] = $userval;
                $_SESSION['password'] = $passval;
                $_SESSION['nama_lengkap'] = $username;
                $_SESSION['hak_akses'] = $hakakses;

                $_SESSION['rt'] = $RT;
                $_SESSION['rw'] = $RW;
                

                header('Location: dashboard.php?nama_lengkap =' . urlencode($username));

            } else {
                echo "<script>alert('Password Anda salah. Silahkan coba lagi!')</script>";
            }
        } else {
            echo "<script>alert('Username Anda Salah. Silahkan coba lagi!')</script>";
        }
    } else {
        echo "<script>alert('Data Tidak Boleh Kosong!')</script>";
    }



    if (isset($_POST['submit'])) {
        $email = ($_POST['id_akun']);
        $password = md5($_POST['password']);

        if (!empty(trim($email)) && !empty(trim($password))) {
            $sql = "SELECT * FROM akun WHERE id_akun='$email' and hak_akses = '2' ";
            $result = mysqli_query($conn, $sql);
            $num = mysqli_num_rows($result);
            while ($row = mysqli_fetch_array($result)) {
                $userval = $row['id_akun'];
                // $_SESSION = $userval;
                $passval = $row['password'];
                // $_SESSION = $passval;
                $username = $row['nama_lengkap'];
                // $_SESSION = $username;
                $hakakses = $row['hak_akses'];
                $RT = $row['rt'];
            $RW = $row['rw'];
            }

            if ($num != 0) {
                if ($userval == $email && $passval == $password) {
                    session_start();
                    $_SESSION['id_akun'] = $userval;
                    $_SESSION['password'] = $passval;
                    $_SESSION['nama_lengkap'] = $username;
                    $_SESSION['hak_akses'] = $hakakses;
                    $_SESSION['rt'] = $RT;
                $_SESSION['rw'] = $RW;

                    header('Location: dashboard.php?nama_lengkap =' . urlencode($username));

                } else {
                    echo "<script>alert('Password Anda salah. Silahkan coba lagi!')</script>";
                }
            } else {
                echo "<script>alert('Username Anda Salah. Silahkan coba lagi!')</script>";
            }
        } else {
            echo "<script>alert('Data Tidak Boleh Kosong!')</script>";
        }



        if (isset($_POST['submit'])) {
            $email = ($_POST['id_akun']);
            $password = md5($_POST['password']);

            if (!empty(trim($email)) && !empty(trim($password))) {
                $sql = "SELECT * FROM akun WHERE id_akun='$email' and hak_akses = '3' ";
                $result = mysqli_query($conn, $sql);
                $num = mysqli_num_rows($result);
                while ($row = mysqli_fetch_array($result)) {
                    $userval = $row['id_akun'];
                    // $_SESSION = $userval;
                    $passval = $row['password'];
                    // $_SESSION = $passval;
                    $username = $row['nama_lengkap'];
                    // $_SESSION = $username;
                    $hakakses = $row['hak_akses'];
                    $RT = $row['rt'];
            $RW = $row['rw'];
                }

                if ($num != 0) {
                    if ($userval == $email && $passval == $password) {
                        session_start();
                        $_SESSION['id_akun'] = $userval;
                        $_SESSION['password'] = $passval;
                        $_SESSION['nama_lengkap'] = $username;
                        $_SESSION['hak_akses'] = $hakakses;
                        $_SESSION['rt'] = $RT;
                $_SESSION['rw'] = $RW;

                        header('Location: dashboard.php?nama_lengkap =' . urlencode($username));

                    } else {
                        echo "<script>alert('Password Anda salah. Silahkan coba lagi!')</script>";
                    }
                } else {
                    echo "<script>alert('Username Anda Salah. Silahkan coba lagi!')</script>";
                }
            } else {
                echo "<script>alert('Data Tidak Boleh Kosong!')</script>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="view/style.css">

    <title>S-Kepuharjo</title>
    <link rel="shortcut icon" href="images/logo_kepuharjo.png" />
</head>

<body>
    <div class="alert alert-warning" role="alert">
        <?php echo $_SESSION['error'] ?>
    </div>

    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class="login-text" style="font-size: 2rem; font-weight: 800;">Login</p>
            <div class="input-group">
                <input type="field" placeholder="User Id" name="id_akun" required>
            </div>
            <div class="input-group">
                <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
            <!-- <p class="login-register-text">Anda belum punya akun? <a href="register.php">Register</a></p> -->
        </form>
    </div>
</body>

</html>