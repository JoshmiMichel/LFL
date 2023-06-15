<?php include ('../config/db.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestion vente provande</title>
  <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/datatables-buttons/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="../assets/fontawesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="../dist/css/adminlte.min.css">
   <link rel="stylesheet" href="assets/css/styles.css">
  <link rel="stylesheet" href="../assets/css/w3.css">
  <link rel="stylesheet" href="../assets/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <style type="text/css">
    h6{
      font-family:"cambria";
    }

.lettre{
  font-size:18px;
  color:blue;
}
  </style>
</head>
<body>
<div id="header" class="header">
  <nav id="topnav" class="navbar navbar-expand-lg navbar-dark text-capitalize">
    <div class="col-md-1">
      <img src="../assets/img/logo.jpg" alt="logo_LFL" class="w3-circle w3-opacity-min logo">
    </div>
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#show-menu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="show-menu">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="../index.php"><i class="ion-ios-home-outline"></i> Acceuil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="form_produit.php "><i class="ion-bag"></i> Produits</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="form_commande.php"><i class="ion-android-cart"></i> Commande</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="reaprov.php"><i class="ion-plus"></i> Reaprovisionnement</a>
          </li>
           <li class="dropdown nav-item">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
              <i class="ion-ios-gear-outline"></i> Paramètres
            </a>
            <div class="dropdown-menu dropdown-with-icons">
              <a href="historique.php" class="dropdown-item">
                <i class="ion-ios-list-outline"></i> Historiques
              </a>
              </a>
              <a href="transaction.php" class="dropdown-item">
                <i class="ion-cash"></i> Transaction
              </a>
            </div>
          </li>
          <li class="nav-item pull-right">
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
        <div class="row mb-2">
            <div class="col-sm-6">
              <div  id="tags" class="w3-tag w3-round w3-dark-gray" style="padding:3px">
                <div class="w3-tag w3-round w3-dark-gray w3-border w3-border-white">
                  <h3>Les transactions des achats</h3>
                </div>
              </div> 
            </div><!-- /.col -->
        </div><!-- /.row -->
     <div class="col-12">
     <?php if (!empty($_SESSION['flash'])):?>
            <div class="alert alert-<?= $_SESSION['flash']['type'] ?> alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <?= $_SESSION['flash']['message'] ?>
            </div>
            <?php unset($_SESSION['flash']) ?>
            <?php endif; ?>
     </div>
<!-- card tableau  -->
<div class="w3-card " id="card">
    <header class="w3-container w3-amber">
      <h4><span class="ion-card"></span>&nbsp;Transaction</h4>
    </header>
<div class="card-body">
        <div id="div1">
            <h6 align="left">
              Tranombarotra NRJ</br>
              <i>Vente de Produits Locaux et de Provande</i></br>
              NIF:2000 474 129 </br>
              Stat:472.9211000000049 </br>
              Talatamaty FIANARANTSOA 
            </h6>
            <h6 align="right">Fianarantsoa le ..................................</h6>
        <table id="" class="table table-bordered">
            <thead>
                <tr>
                    <th>Désignation</th>
                    <th>Prix Unitaire /kg</th>
                    <th>Quantité acheté</th>
                    <th>Montant à payer</th>
                    <th>Jour de l'achat</th>
                </tr>
            </thead>
            <tbody>
            <?php  
                try{
                  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                  $bdd = new PDO('mysql:host=localhost;dbname=vente_provande', 'root', '',$pdo_options);
                  $reponse = $bdd->query('SELECT * FROM panier');
                  $i=0;
                  while ($donnees=$reponse->fetch()){
                  $i++;
            ?>
                 <tr align="center">
                    <td><?php echo $donnees['nomP'] ?></td>
                    <td><?php echo  $donnees['prixP']?>Ar</td>
                    <td><?php echo  $donnees['qte'] ?></td>
                    <td><?php echo  $donnees['montant'] ?>Ar</td>
                    <td><?php echo  $donnees['dateP'] ?></td>
                 </tr>
            <?php
              }
                }catch(Exception $e){
                  die('Erreur : '.$e->getMessage());
                }
			?>
            </tbody>     
        </table>
        <?php
            try{
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                $bdd = new PDO('mysql:host=localhost;dbname=vente_provande', 'root', '',$pdo_options);
                $reponse = $bdd->query('SELECT sum(montant) FROM panier');
                $donnees=$reponse->fetch();                     
                if(empty($donnees['sum(montant)'])){
                    echo'<div><strong>SOMME TRANSACTION ACHAT:  <span class="trans">0 Ariary</span></strong></div>';;
                }else{
                    echo'<div><strong >SOMME TRANSACTION ACHAT: <span class="trans">'.$donnees['sum(montant)'].' Ariary</span></strong></div>';
                }
            }catch(Exception $e){
                die('Erreur : '.$e->getMessage());
            }
        ?>
        <?php 
            require_once 'chiffreEnLettre.php'; 
            $conversion  = new ChiffreEnLettre();
            $data = $donnees['sum(montant)'];
        ?>
        <h6> La somme total de la transaction est de: &nbsp; <?php echo  '<i class="lettre">'.$conversion->conversion($data).'</i>';?> &nbsp;Ariary</h6>
        </div>
    </div>
    <div class="card-footer">
        <div align="right" class="col-md-6 col-sm-6 pull-right">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#remise" >
                <i class="ion-ios-loop-strong"></i> Remettre  le cash à Zero
            </button>
        </div>
        <div class="col-md-6 col-sm-6"></div>
        <button type="button" onclick="printContent('div1')" class="btn w3-amber ion-ios-printer-outline imprim"> Imprimer</button>
    </div>
</div>
</div><br>
<div class="container">
  <div class="w3-card" id="card">
      <header class="w3-container w3-amber">
        <h4 align="left">
          <span class="ion-card"></span>&nbsp;Depense d'approvisionnements
        </h4>
      </header>
      <div class="card-body">
      <table id="" class="table table-bordered">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Produits</th>
                    <th>Nombre d'Approvision</th>
                    <th>PU (Ar)</th>
                    <th>Montant (Ar)</th>
                </tr>
            </thead>
            <tbody>
              <?php 
                  try {
                    $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                    $bdd = new PDO('mysql:host=localhost;dbname=vente_provande', 'root', '',$pdo_options);
                    $reponse=$bdd->query('SELECT aprov.idAp, aprov.qtAp, aprov.dateAp , produit.id_prod , produit.nom_prod ,produit.prix_detail 
                                          FROM aprov 
                                          JOIN produit 
                                          ON aprov.prodAp=produit.id_prod ORDER BY idAp DESC');
                      $tot=0;
                      $i=0;
                      while($donnees=$reponse->fetch()){
                        $i++;
                        $qt=$donnees['qtAp'];
                        $pu=$donnees['prix_detail'];
                        $montant=$qt*$pu;
                        $tot=$tot+$montant;
                        ?>
                        <tr>
                          <th><?=date('d-m-Y à H:i:s', strtotime($donnees['dateAp']))?></th>
                          <th><?php echo $donnees['nom_prod'] ?></th>
                          <th><span class="badge badge-pill badge-warning"><?php echo $donnees['qtAp'] ?></span></th>
                          <th><?php echo $donnees['prix_detail'] ?></th>
                          <th><?php echo $montant ?></th>
                        </tr>
                        <?php
                      }
                  } catch (Exception $e) {
                    die('Erreur : '.$e->getMessage());
                  }
              ?>
            </tbody>
            <tfoot>
              <div>
                <strong>DEPENSE APROVISIONNEMENTS:<span class="trans">&nbsp;<?php echo $tot ?></span>&nbsp;Ariary</strong>
              </div>
              <?php 
                require_once 'chiffreEnLettre.php'; 
                $conversion  = new ChiffreEnLettre();
                $data = $tot;
              ?>
              <h6> La somme total de la depense d'approvisionnement est de: &nbsp; <?php echo  '<i class="lettre">'.$conversion->conversion($data).'</i>';?> &nbsp;Ariary</h6>
            </tfoot>
        </table>
      </div>
      <div class="card-footer">
        <div align="right" class="col-md-6 col-sm-6 pull-right">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#depense" >
                <i class="ion-ios-loop-strong"></i> Remettre  le cash à Zero
            </button>
        </div>
      </div>
  </div>
<!-- Modal remise à zéro  transaction-->
<div class="modal fade" id="remise" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header w3-amber">
         <h4 class="modal-title" id="myModalLabel">Remettre à zéro le transaction</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="notifDel"></div>
        <h4>Voulez-vous remettre à zéro le transaction?</h4>          
      </div>
      <div class="modal-footer">
        <div class="btn-group">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Non</button>
            <button type="button" id="remiseConfirm" class="btn btn-warning btn-sm">Oui</button>          
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Model remise à zéro Depense d'aprovisionnement -->
<div class="modal fade" id="depense" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header w3-amber">
         <h4 class="modal-title" id="myModalLabel">Remettre à zéro le dépense d'approvisionnement</h4>
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">x</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="notifDel"></div>
        <h4>Voulez-vous remettre à zéro ce cash ?</h4>          
      </div>
      <div class="modal-footer">
        <div class="btn-group">
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Non</button>
            <button type="button" id="depenseConfirm" class="btn btn-warning btn-sm">Oui</button>          
        </div>
      </div>
    </div>
  </div>
</div>
  <script src="../assets/jquery/jquery.min.js"></script>
  <script src="../controller/js/produit.func.js"></script>
  <script src="../controller/js/commande.func.js"></script>
  <script src="../controller/js/stock.func.js"></script>
  <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/datatables/jquery.dataTables.min.js"></script>
  <script src="../assets/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="../assets/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script src="../assets/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script src="../assets/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="../assets/datatables-buttons/js/buttons.html5.min.js"></script>
  <script src="../assets/datatables-buttons/js/buttons.print.min.js"></script>
  <script src="../assets/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="../assets/pdfmake/pdfmake.min.js"></script>
  <script src="../assets/jquery/sweetalert.js"></script>
  <script src="../assets/pdfmake/vfs_fonts.js"></script>
  <script src="../assets/jszip/jszip.min.js"></script>
  <script src="../assets/pdfmake/vfs_fonts.js"></script>
  <script>
    function printContent(el){
        var restorepage=document.body.innerHTML;
        var printContent=document.getElementById(el).innerHTML;
        document.body.innerHTML=printContent;
        window.print();
        document.body.innerHTML=restorepage;
    }
        //   close modal ajouter
        $("#close").click(function(e){
          e.preventDefault();
          $("#addNew").modal('hide');
        })
</script>
</body>
</html>