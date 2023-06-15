<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestion vente provande</title>
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="assets/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="assets/css/w3.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/Ionicons/css/ionicons.min.css">
</head>
<body>
<div id="header" class="header">
  <nav id="topnav" class="navbar navbar-expand-lg navbar-dark text-capitalize">
    <div class="col-md-1">
      <img src="assets/img/logo.jpg" alt="logo_LFL" class="w3-circle w3-opacity-min logo">
    </div>
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#show-menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="show-menu">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#"><i class="ion-ios-home-outline"></i> Acceuil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/form_produit.php "><i class="ion-bag"></i> Produits</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/form_commande.php"><i class="ion-android-cart"></i> Commande</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pages/reaprov.php"><i class="ion-plus"></i> Reaprovisionnement</a>
          </li>
          <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="ion-ios-gear-outline"></i> Paramètres
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="pages/historique.php" class="dropdown-item">
                <i class="ion-ios-list-outline"></i> Historiques
              </a>
              </a>
              <a href="pages/transaction.php" class="dropdown-item">
                <i class="ion-cash"></i> Transaction
              </a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="tooltip" data-placement="top" title="Se déconnecter" href=" ">
                <span class="ion-log-out" aria-hidden="true"></span>
            </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
<div class="container">
  <div class="container-fluid">
      <h2>Tableau de bord</h2>
      <h4 id="texte"></h4>
  </div>
  <!-- card graph -->
  <div class="card">
      <div class="card-header border-0">
          <div class="d-flex justify-content-between">
              <h1 class="card-title"></h1>
          </div>
      </div>
      <div class="card-body">
          <div class="d-flex">
              <p class="d-flex flex-column">
                  <span class="text-bold text-lg"></span>
                  <span></span>
              </p>
              <p class="ml-auto d-flex flex-column text-right">
                  <span class="text-warning">
                      <i class="fa fa-arrow-up"></i>
                  </span>
                  <span class="text-muted"></span>
              </p>
          </div>
          <!-- /.d-flex -->
          <div class="position-relative mb-4">
              <canvas id="visitors-chart" height="200"></canvas>
          </div>
          <div class="d-flex flex-row justify-content-end">
              <span class="mr-2">
                  <i class="fa fa-square text-warning"></i>
              </span>
              <span>
                  <i class="fa fa-square text-gray"></i>
              </span>
          </div>
      </div>
  </div>
  <!-- end Card graph -->
</div>
  <script src="assets/jquery/jquery-3.6.1.min.js"></script>
  <script src="controller/js/produit.func.js"></script>
  <script src="controller/js/commande.func.js"></script>
  <script src="controller/js/stock.func.js"></script>
  <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/datatables/jquery.dataTables.min.js"></script>
  <script src="assets/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="assets/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="assets/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="assets/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="assets/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="assets/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="assets/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="assets/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="assets/pdfmake/pdfmake.min.js"></script>
  <script src="assets/pdfmake/vfs_fonts.js"></script>
  <script src="assets/jszip/jszip.min.js"></script>
  <script src="assets/pdfmake/vfs_fonts.js"></script>

  <script type="text/javascript">
    var sentenses ="Bienvenu sur le système d'information pour la gestion de stock et vente de produit LFL";
    var myArray =sentenses.split("");
    var timeLooper;
    function loop(){
      if (myArray.length >0) {
        document.getElementById("texte").innerHTML+=myArray.shift();
      }else{
        clearTimeout(timeLooper);
      }
      timeLooper = setTimeout('loop()',50);
    }
    loop();
    // chart
    
  </script>
</body>
</html>