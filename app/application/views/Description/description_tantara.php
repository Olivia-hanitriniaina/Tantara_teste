
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php foreach($detail_tantara as $description){?>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="<?=base_url('/assets/image/'.$description['image'])?>" alt="">
                               
                            </div>
                            
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span><?php echo $description['nom']?> <?php echo $description['prenom']?></span>
                                    <h3><?php echo $description['titre']?></h3>
                                </div>
                                <div class="pd-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(5) partages</span>
                                </div>
                                <ul class="pd-tags">
                                    <li><span>Genre</span>: <?php echo $description['name']?></li>
                                    <li><span>Date</span>: <?php echo $description['date']?></li>
                                </ul>
                                <div class="pd-desc">
                                    <p><?php echo $description['description']?></p>
                                </div>
                               
                                <div class="quantity">
                                    <a href="<?php echo site_url("Acceuil_controlleur")?>" class="retour-btn pd-cart">Retour à la page prescédente</a>
                                    <a href="<?php echo site_url("Partage_controlleur/partager?id_tantara=")?><?php echo $description['id_utilisateur']?>" class="primary-btn pd-cart">Partager</a>
                                </div>
                                
                                <div class="pd-share">
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->
