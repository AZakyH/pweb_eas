<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login Pendaftar</title>
        <link rel="stylesheet" type="text/css" href="presis.css">
    </head>
    <div class="header"><h2>Login Pendaftar</h2></div>
    <body>
        <?php 
    	    if(isset($_GET['pesan'])){
    	        if($_GET['pesan'] == "gagal"){
    	            echo "Login gagal! username dan password salah!";
    	        }else if($_GET['pesan'] == "logout"){
    	            echo "Anda telah berhasil logout";
    	        }else if($_GET['pesan'] == "belum_login"){
    	            echo "Anda harus login untuk mengakses halaman ini";
    	        }
          }
        ?>
        <form method="post" action="login.php">
            <table>
                <tr><td>Username</td><td><input type="text" value="NISN" name="username"></td></tr>
                <tr><td>Password</td><td><input type="password" value="NISN" name="password"></td></tr>

                <tr><td colspan="2"><button type="submit" value="simpan">LOGIN</button>
                <button><a href="daftar.php">DAFTAR</a></button>
            </table>
        </form>
    </body>
    <div class="footer">
        <b>Dinas Pendidikan</b>
    </div>
</html>
<!-- It works Alhamdulillah -->