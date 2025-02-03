<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Yummy Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Amatic+SC:wght@400;700&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Yummy
  * Template URL: https://bootstrapmade.com/yummy-bootstrap-restaurant-website-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>
    <div class="login-container">
        <img src="logo.png" alt="Logo" class="logo">
        <h2>Login</h2>
        <form>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" placeholder="Masukkan username">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Masukkan password">
            </div>
            <div class="button-container">
                <button class="small-button" type="submit">Login</button>
            </div>
        </form>
        <div class="register-container">
            <p>Belum punya akun? Buat sekarang</p>
        </div>
    </div>
</body>
</html>


</html>


body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    margin: 0;
    background-color: #2e5c93;
    font-family: Arial, sans-serif;
  }
  
  .login-container {
    background-color: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    text-align: center;
    width: 100%;
    max-width: 400px;
  }
  
  .logo {
    width: 80px;
    margin-bottom: 20px;
  }
  
  h2 {
    color: #2e5c93;
  }
  
  .form-group {
    margin-bottom: 15px;
    text-align: left;
  }
  
  label {
    display: block;
    margin-bottom: 5px;
    font-size: 14px;
    color: #333;
  }
  
  input {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
  }
  
  .button-container {
    margin-top: 30px;
    display: flex;
    justify-content: center;
  }
  
  .small-button {
    background-color: #2e5c93;
    color: white;
    border: none;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    font-size: 16px;
    text-align: center;
    display: inline-block;
  }
  
  .small-button:hover {
    background-color: #1d4475;
  }
  
  .register-container {
    margin-top: 20px;
    font-size: 14px;
    color: #333;
    display: flex;
    justify-content: center;
    align-items: center;
    gap: 10px;
  }
  
  @media (max-width: 768px) {
    .login-container {
        width: 90%;
    }
  }
  
  @media (max-width: 480px) {
    .login-container {
        width: 95%;
    }
  }e