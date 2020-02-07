<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

  
</head>

<body>
    <!-- Product Shop Section Begin -->
    <p id="message"></p>
    <section class="product-shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 order-1 order-lg-2">
                    <div class="product-show-option">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                            <div class="row justify-content-center">
                                <div class="col-md-4">
                                <div class="featured-btn-wrap">
                                    <?php for($i = 1; $i<=$page; $i++){?>
                                    <a href="<?php echo site_url('Acceuil_controlleur/liste_paginer2/'.$i)?>"class="btn btn-danger"><?php echo $i ?></a><?php }?>
                                    </div>
                                </div>
                            </div>
                            </div>
                           
                        </div>
                    </div>
                   
                    <div class="product-list">
                        <div class="row" >
                        <?php foreach($tantara as $histoire){?>
                       
                            <div class="col-lg-4 col-sm-6">
                                <div class="product-item" id="row">
                                    <div class="pi-pic" id="image">
                                      <img src="<?=base_url('/assets/image/'.$histoire['image'])?>" alt="">
                                      <a href ="<?php echo Site_url("Description_controlleur?id_tantara=").$histoire['id_tantara']?>">
                                        <div class="sale pp-sale"><i class="fa fa-book" aria-hidden="true"></i>    Lire</div>
                                        <?php if($profil == "mpiasan'radio"){?>
                                            <a href="javascript:void(0)" class="btn btn-success ml-3" data-toggle="modal" data-target="#myModal<?=$histoire['id_tantara']?>"><i class="fa fa-trophy" aria-hidden="true"></i>   Réaliser</a>
                                       <?php } ?>
                                        <?php if($profil == "Mpamaky sy Mpanoratra"){?>
                                        <a href="<?php echo site_url("Partage_controlleur/partager?id_tantara=")?><?php echo $histoire['id_utilisateur']?>" class="btn btn-primary ml-3" id="partage"><i class="fa fa-share" ></i>  partager</a>
                                        <?php }?>
                                    </div>
                                    <div class="pi-text" id="description">
                                        <div class="catagory-name">Auteur : <?php echo $histoire['nom'] ?> <?php echo $histoire['prenom'] ?></div>
                                        <a href="#">
                                            <h5>Titre : <?php echo $histoire['titre'] ?></h5>
                                    </a>        
                                    </div>
                                </div> 
                            </div>
                            <div class="modal fade" id="myModal<?= $histoire['id_tantara'] ?>" role="dialog">
                            <div class="modal-dialog">
                                <!-- Modal content-->
                                
                                <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                    <p id="suppr" style="color:red;font-size:1.5em;text-align:center;font-weight:bold">Dans quelle radio vous avez réalisé cette tantara</p>
                                </div>
                                <div class="modal-body" style="width:95%;margin:auto">
                                <div class="form-group">
                                <input type="hidden"  value="<?php echo $histoire['id_tantara']?>" id=<?php echo $histoire['id_tantara']?>>
                                <input type="hidden" value="<?php echo $histoire['id_utilisateur']?>" id="id_utilisateur">
                                        <label for="name">Radio* : </label>
                                        <select name="local_manager" id="radio" class="form-control">
                                        <?php foreach ($radio as $radion){ ?>
                                            <option value="<?php echo $radion->{'radio_id'}?>"><?php echo $radion->{'radio_name'}?> </option>
                                            <?php } ?>    
                                            </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button onclick=myFunction(<?php echo $histoire['id_tantara']?>,<?=$histoire['id_utilisateur']?>) class="btn btn-danger" id="supprimer-depot2" >ok</button>
                                    <button class="btn btn-defaut" data-dismiss="modal">Fermer</button>
                                </div>
                                </div>
                                
                            </div>
                            </div>
                            <?php }?>
                    </div>
                       
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id='pagination' style="margin-left:-90%"></div>

<!-- Modal --
    <!-- Js Plugins -->
<!--Modal for delete station-->
<div class="modal fade" id="ajax-delete-modal2" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="deleteForm" name="deleteForm" class="form-horizontal">
                <div class="modal-body" style="width:95%;margin:auto">
                    <p id="suppr2" style="color:red;font-size:1.5em;text-align:center;font-weight:bold">
                    Voulez vous partager cette tantara</p>
                    
                </div>
                <div class="modal-footer">
                    <a href="<?php echo site_url("Realisation_controlleur/partage")?>" class="btn btn-danger" id="supprimer-depot2" >Supprimer</a>
                    <button class="btn btn-defaut" data-dismiss="modal">Fermer</button>
                    
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var SITEURL='<?php echo base_url();?>';
    function myFunction(teste,teste2) {

        var radio=document.getElementById("radio").value;
        var id_utilisateur=document.getElementById("id_utilisateur").value;
        var messsage=document.getElementById("message");
        message.innerHTML="";
        var xmlhtp = new XMLHttpRequest();
		xmlhtp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var obj = JSON.parse(this.responseText);
                for($i = 0;$i<obj.length; $i++){
                    alert(obj[$i]);
                }
            }
        };
        setTimeout(function(){
            
            location.reload();
            
        },100);
        
        xmlhtp.open("GET","<?php echo site_url("Realisation_controlleur/get_realisation"); ?>?id_tantara="+teste+"&radio="+radio+"&id_utilisateur="+teste2+"", true);
		xmlhtp.send();
       
        
    }
</script>
</body>

</html>