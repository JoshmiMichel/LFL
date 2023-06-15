$(document).ready(function(){
     //vider le panier
    $("#viderConfirm").click(function(e){
        e.preventDefault();
        var url='../controller/panier/viderPanier.php';
        $.post(url,function(){
            swal({title:'Panier vide!',
            showLoaderOnConfirm:true,
            closeOnConfirm: false,
            type:'success'
        });
           window.location.replace('../pages/form_commande.php');
        })
    })
    //Remettre à zéro le transaction
    $("#remiseConfirm").click(function(e){
        e.preventDefault();
        var url='../controller/transaction/viderTransaction.php';
        $.post(url,function(){
            swal({title:'Transaction remetre à zéro',
                showLoaderOnConfirm:true,
                closeOnConfirm: false,
                type:'success'
            });
           window.location.replace('../pages/transaction.php');
        })
    })
    //Dépense d'approvisionnement
    $("#depenseConfirm").click(function(e){
        e.preventDefault();
        var url='../controller/transaction/depenseAprov.php';
        $.post(url,function(){
            swal({title:'Transaction remetre à zéro',
                showLoaderOnConfirm:true,
                closeOnConfirm: false,
                type:'success'
            });
           window.location.replace('../pages/transaction.php');
        })
    })
});

//Function rupture de stock
function calculmontant(frm){
    var a=parseInt(document.getElementById("pu1").value);
    var b=(document.getElementById("qt1").value);
    var c = a*b;
    document.getElementById("montant").value=c;
}
function ControlStock(frm){
    var a=parseInt(document.getElementById("stock").value);
    var b=parseInt(document.getElementById("qt1").value);
    if(a<=b){
      swal({title:'Insuffisance du stock!. Faire un réaprovisionnement',
          showLoaderOnConfirm:true,
          closeOnConfirm: false,
          type:'warning'
      })
      return false;
    }
}