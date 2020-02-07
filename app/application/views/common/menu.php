<div class="nav-item">
    <div class="container">
        <nav class="nav-menu mobile-menu">
            <ul>
                <li><a href="<?php echo Site_url("Acceuil_controlleur")?>">Accueil</a></li>
                <?php if($profil == "mpiasan'radio"){?>
                    <?php if(empty($autorisation)){?>
                        <li><a href="<?php echo Site_url("Realisation_controlleur/ListeAutorisation")?>">(0) Autorisation valider</a></li>
                    <?php }?>
                    <?php if(!empty($autorisation)) {?>
                        <li><a href="<?php echo Site_url("Realisation_controlleur/ListeAutorisation")?>">(<?php echo $autorisation?>) Autorisation valider</a></li>
                    <?php }?>
                 <?php } ?>
                 <?php if($profil == "Mpamaky sy Mpanoratra"){?>
                      <li><a href="<?php echo Site_url("AjouterTantara_controlleur")?>">Ecrit un tantara</a></li>
                      <li><a href="<?php echo Site_url("partage_controlleur")?>">Mon profile</a></li>
                     <?php foreach($count as $isa){?>
                        <?php if(!empty($isa)){?>
                            <li class="notif"><a href="#">(<?php echo $isa->{'count(*)'} ?>) notifications</a>
                            <ul class="dropdown">
                                <?php foreach($notification as $notif){?>
                                   
                                    <?php if($notif->{'etat'}==0){?>
                                        <li class="red">
                                           <a> demande de realisation nom valider : <a>
                                           <p> <?php echo $notif->{'a2nom'}?> <?php echo $notif->{'a2nom'}?> à réaliser
                                             votre tantara(<?php echo $notif->{'titre'}?> le <?php echo $notif->{'date'}?>)
                                            sur le radio <?php echo $notif->{'radio_name'}?></p>
                                            <div class="sale pp-sale"><a href="<?php echo site_url("Partage_controlleur/partage?id_tantara=")?><?php echo $notif->{'id_tantara'}?>&envoyer=<?php echo $notif->{'envoyer'}?>" style="color : red"><i class="fa fa-check" aria-hidden="true"></i> Valider</a></div>
                                        </li>
                                   <?php }?>
                                   <?php if($notif->{'etat'}==1){?>
                                        <li class="white"><a href="#">
                                            déja valider : 
                                           <p> <?php echo $notif->{'a2nom'}?> <?php echo $notif->{'a2nom'}?> à réaliser
                                             votre tantara(<?php echo $notif->{'titre'}?> le <?php echo $notif->{'date'}?>
                                             sur le radio <?php echo $notif->{'radio_name'}?>)</p>
                                        </a></li>
                                   <?php }?>
                                   <?php if($notif->{'etat'}==-1){?>
                                        <li><a href="#">
                                            partage : 
                                        <p> <?php echo $notif->{'a2nom'}?> <?php echo $notif->{'a2nom'}?> à parager
                                             votre tantara(<?php echo $notif->{'titre'}?> le <?php echo $notif->{'date'}?>)</p>
                                        </a>
                                       
                                           
                                    </li>
                                   <?php }?>
                                <?php }?>
                                </ul>
                        </li>
                       <?php }?>
                        <?php if(empty($isa)){?>
                            <li><a href="#">(0) notification</a>
                           
                            </li>
                       <?php }?>
                     <?php }?>
                      
               <?php } ?>
               
               
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
    </div>
</div>