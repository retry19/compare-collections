<?php
  session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <title>🧙‍♂️ &times; Compare Collections</title>
  </head>
  <body>
    <div class="container">
      <div class="text-center mt-4">
        <h1>Compare Collections</h1>
        <small class="text-muted">Program ini dibuat untuk <u><strong data-toggle="tooltip" data-placement="bottom" title="Alisya Rufaidah Al-Ghiffari">teman saya</strong></u> yang amat sangat <em>ngagawekeun</em> 😊</small>
      </div>

      <br>

      <?php if (isset($_SESSION['is_compare']) && $_SESSION['is_compare']) : ?>
        <div class="alert alert-warning" role="alert">
          <h4 class="alert-heading">Selamat Komparasi telah berhasil! 😁</h4>
          <p>Berikut adalah hasil dari komparasinya :</p>
          <ol>
          <?php foreach ($_SESSION['result'] as $name) : ?>
            <li><?= $name ?></li>
          <?php endforeach ?>
          </ol>
        </div>

        <?php if (count($_SESSION['errors']) > 0) : ?>
          <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Daftar nama yang tidak ditemukan :</h4>
            <ol>
            <?php foreach ($_SESSION['errors'] as $name) : ?>
              <li><?= $name ?></li>
            <?php endforeach ?>
            </ol>
          </div>
        <?php endif ?>
      <?php endif ?>

      <form action="compare.php" method="post">
        <div class="row my-4">
          <div class="col-md-6">
            <textarea class="form-control" name="text_1" placeholder="Masukan daftar namanya disini (yang hendak dibandingkan / input peserta), contoh : &#10;&#10;Shinomiya Kaguya&#10;Hayasaka Ai&#10;Shirogane Miyuki&#10;Ishigami Yuu" rows="15" cols="100"></textarea>
          </div>
          <div class="col-md-6">
            <textarea class="form-control" name="text_2" placeholder="Masukan daftar namanya disini (data milik panitia / ASLI), contoh : &#10;&#10;Shinomiya Kaguya&#10;Hayasaka Ai&#10;Shirogane Miyuki&#10;Ishigami Yuu" rows="15" cols="100"></textarea>
          </div>
        </div>
        <div class="text-center">
          <button type="submit" class="btn btn-lg btn-primary shadow">🚀 Compare!!</button>&nbsp;
          <button type="reset" class="btn btn-lg btn-danger shadow">Reset</button>
        </div>
      </form>

      <br>
    </div>

    <footer class="text-center mb-2">
      <span>Made with ❤</span>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="js/app.js"></script>
  </body>
</html>

<?php session_destroy() ?>
