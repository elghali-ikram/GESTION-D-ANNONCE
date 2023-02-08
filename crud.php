<!DOCTYPE html>
<html lang="en">
<?php require('connect.php'); ?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="crud.css">
  <script src="https://code.iconify.design/iconify-icon/1.0.3/iconify-icon.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous" defer></script>
  <link href="https://fonts.googleapis.com/css2?family=Italiana&display=swap" rel="stylesheet" />
</head>
<body>
  <div class="d-flex flex-column gap-3">
    <div>
      <nav class="navbar bghead fixed-top">
        <div class="container-fluid text-white">
          <h1>SAROUTY</h1>
        </div>
      </nav>
      <div class="bg text-white text-center d-md-flex  justify-content-center align-items-center">
        <form method="post" class="d-md-flex box bghead p-4 gap-4 ">
          <select class="form-select box" name="type">
            <option selected disabled>Type d’annonce</option>
            <option value="Location">Location</option>
            <option value="Vente">Vente</option>
          </select>
          <input type="number" name="min" class="form-control box" placeholder="Prix min" />
          <input type="number" name="max" class="form-control box" placeholder="Prix max" />
          <button type="submit" class="button" name="search">Rechercher</button>
        </form>
      </div>
    </div>
    <!-- Button add  modal -->
    <button type="submit" class="button align-self-center w-25 h-25" data-bs-target="#addModal" data-bs-toggle="modal">Ajouter</button>
    <!-- cards -->
    <div class="d-flex flex-row flex-wrap m-2 gap-1">
      <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $min = $_POST["min"];
        $max = $_POST["max"];
        $type = $_POST["type"];
        $sql = "SELECT * FROM `Annonces` WHERE `montant` BETWEEN $min AND $max AND `typeAnnonce`='$type'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
      ?>
            <div class="card w-25">
              <img src="<?php echo $row["image"] ?>" class="card-img-top" alt="card image" />
              <div class="card-img-overlay d-flex justify-content-between align-items-center pt-4 location">
                <h5 class="text-white"><?php echo $row["typeAnnonce"] ?></h5>
                <h6 class="text-white"><?php echo $row["dateAnnonce"] ?></h6>
              </div>
              <div class="card-body">
                <div class="d-flex justify-content-between mb-2">
                  <h4><?php echo $row["titre"] ?></h4>
                  <h4><?php echo $row["montant"] ?>$</h4>
                </div>
                <div class="d-flex gap-2">
                  <iconify-icon icon="material-symbols:location-on"></iconify-icon>
                  <h6><?php echo $row["adresse"] ?></h6>
                </div>
                <button type='button' class='btn btn-link' data-bs-toggle='modal' data-bs-target='#information<?php echo $row["id"] ?>'>
                  Plus d'info ...
                </button>
                <div class="d-flex justify-content-end gap-3">
                  <div class="w-50 editadd">
                    <!-- Button Edit  modal -->
                    <button type="button" class="btn btn-warning rounded-circle edit" data-bs-toggle="modal" data-bs-target="#edit<?php echo $row["id"] ?>">
                      <iconify-icon icon="material-symbols:edit-document-rounded"></iconify-icon>
                    </button>
                    <!-- Button delete modal -->
                    <button type="button" class="btn btn-danger rounded-circle delete" data-bs-toggle="modal" data-bs-target="#delete<?php echo $row["id"] ?>">
                      <iconify-icon icon="material-symbols:auto-delete"></iconify-icon>
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!-- Modal information-->
            <?php include('modalinfo.php'); ?>
            <?php require('modaldelet.php'); ?>
            <?php require('modaledit.php'); ?>
          <?php
          }
        } else {
          echo "NO results";
        }
      } else {
        $cardsPerPage = 4;
        // Retrieve the total number of cards
        $query = "SELECT COUNT(*) FROM annonces";
        $result = mysqli_query($conn, $query);
        $totalCards = mysqli_fetch_array($result)[0];

        // Calculate the number of pages
        $totalPages = ceil($totalCards / $cardsPerPage);

        // Determine the current page
        $currentPage = isset($_GET['page']) ? (int) $_GET['page'] : 1;
        $currentPage = max(1, min($totalPages, $currentPage));

        // Retrieve the cards for the current page
        $offset = ($currentPage - 1) * $cardsPerPage;
        $query = "SELECT * FROM annonces LIMIT $cardsPerPage OFFSET $offset";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
          // output data of each row
          while ($row = mysqli_fetch_assoc($result)) {
          ?>
            <div class='card ' style="width: 18rem;">
              <img src='<?php echo $row["image"] ?>' class='card-img-top' alt='card image' height="200px" />
              <div class='card-img-overlay d-flex justify-content-between align-items-center pt-4 location'>
                <h5 class='text-white'><?php echo $row["typeAnnonce"] ?></h5>
                <h6 class='text-white'><?php echo $row["dateAnnonce"] ?></h6>
              </div>
              <div class='card-body'>
                <div class='d-flex justify-content-between mb-2'>
                  <h4><?php echo $row["titre"] ?></h4>
                  <h4><?php echo $row["montant"] ?>$</h4>
                </div>
                <div class='d-flex gap-2'>
                  <iconify-icon icon='material-symbols:location-on'></iconify-icon>
                  <h6><?php echo $row["adresse"] ?></h6>
                </div>
                <button type='submit' class='btn btn-link' data-bs-toggle='modal' data-bs-target='#information<?php echo $row["id"] ?>'>
                  Plus d'info ...
                </button>
                <div class='d-flex justify-content-end gap-3'>
                  <div class='w-50 editadd'>
                    <!-- Button Edit  modal -->
                    <button type='submit' class='btn btn-warning rounded-circle edit' data-bs-toggle='modal' data-bs-target='#edit<?php echo $row["id"] ?>'>
                      <iconify-icon icon='material-symbols:edit-document-rounded'></iconify-icon>
                    </button>
                    <!-- Button delete modal -->
                    <button type='submit' class='btn btn-danger rounded-circle delete' data-bs-toggle='modal' data-bs-target='#delete<?php echo $row["id"] ?>'>
                      <iconify-icon icon='material-symbols:auto-delete'></iconify-icon>
                    </button>
                    <!-- Modal information-->
                    <?php include('modalinfo.php'); ?>
                    <!-- Modal DELETE-->
                    <?php require('modaldelet.php'); ?>
                    <!-- Modal EDIT-->
                    <?php require('modaledit.php'); ?>
                  </div>
                </div>
              </div>
            </div>
        <?php
          }
        } else {
          echo 'No result';
        }
        ?>
    </div>
    <!-- pagination  -->
    <div>
      <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
        <?php
        if ($currentPage > 1) {
          echo '<li class="page-item"> <a  class="page-link text-black " href="?page=' . ($currentPage - 1) . '"><iconify-icon icon="material-symbols:chevron-left-rounded"></iconify-icon></a> </li>';
        }
        for ($i = 1; $i <= $totalPages; $i++) {
          if ($i == $currentPage) {
            echo '<li class="page-item active"> <a  class="page-link  bg-black" href="#">' . $i . '</a> </li>';
          } else {
            echo '<li class="page-item"> <a  class="page-link text-black " href="?page=' . $i . '">' . $i . '</a> </li>';
          }
        }

        if ($currentPage < $totalPages) {
          echo '<li class="page-item"> <a class="page-link text-black " href="?page=' . ($currentPage + 1) . '"><iconify-icon icon="material-symbols:chevron-right-rounded"></iconify-icon></a> </li>';
        }
        mysqli_close($conn);
      }

        ?>
        </ul>
      </nav>
    </div>
    <footer style="background-color: #39686acb;">
      <div class="text-center p-3">
        <p> &copy; copyright</p>
      </div>
    </footer>
    <?php require('modaladd.php'); ?>
    <script src="crud.js"></script>
</body>

</html>