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
    <div class="container">
        <img src="logo.png" alt="Logo" class="logo">
        <h2>Register Akun</h2>
        <form>
          <div class="form-grid">
              <div class="form-group">
                  <label for="nik">NIK</label>
                  <input type="text" id="nik" placeholder="Contoh: 18778273665">
              </div>
              <div class="form-group">
                  <label for="nama">Nama</label>
                  <input type="text" id="nama" placeholder="Nama Lengkap">
              </div>
              <div class="form-group">
                  <label for="gender">Jenis Kelamin</label>
                  <select id="gender">
                      <option value="laki-laki">Laki-Laki</option>
                      <option value="perempuan">Perempuan</option>
                  </select>
              </div>
              <div class="form-group">
                  <label for="telepon">Nomor Telepon</label>
                  <input type="text" id="telepon" placeholder="08195658000">
              </div>
              <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" id="email" placeholder="contoh@email.com">
              </div>
              <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" id="password" placeholder="********">
              </div>
              <div class="form-group full-width">
                  <label for="alamat">Alamat</label>
                  <input type="text" id="alamat" placeholder="Alamat Lengkap">
              </div>
          </div>
          <div class="button-container">
              <button type="submit">Kirim</button>
          </div>
      </form>
      
        <a href="#">Sudah punya akun? Login sekarang</a>
    </div>
</body>
</html>


</html>

body {
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #2e5c93;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  
  .container {
    background-color: white;
    width: 600px;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    display: flex;
    flex-direction: column;
  }
  
  .logo {
    width: 80px;
    margin: 0 auto 10px;
  }
  
  h2 {
    margin-bottom: 20px;
    color: #2e5c93;
    text-align: center;
  }
  
  .form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-bottom: 20px;
  }
  
  .form-group {
    display: flex;
    flex-direction: column;
  }
  
  label {
    margin-bottom: 5px;
    font-size: 14px;
    color: #333;
  }
  
  input, select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 14px;
    box-sizing: border-box;
  }
  
  .button-container {
    display: flex;
    justify-content: flex-end;
    margin-top: 20px;
  }
  
  button {
    background-color: #2e5c93;
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
  }
  
  button:hover {
    background-color: #1d4475;
  }
  
  a {
    color: #2e5c93;
    text-decoration: none;
    display: block;
    text-align: center;
    margin-top: 10px;
  }
  
  a:hover {
    text-decoration: underline;
  }
  
  @media (max-width: 768px) {
    .container {
        width: 90%;
        padding: 15px;
    }
  
    h2 {
        font-size: 18px;
    }
  
    .form-grid {
        grid-template-columns: 1fr;
    }
  
    button {
        font-size: 14px;
    }
  }
  
  @media (max-width: 480px) {
    .container {
        width: 95%;
        padding: 10px;
    }
  
    h2 {
        font-size: 16px;
    }
  
    input, select {
        padding: 8px;
    }
  
    button {
        padding: 8px 15px;
    }
  }
  