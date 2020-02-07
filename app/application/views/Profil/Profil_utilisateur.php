
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <?php foreach($partage as $description){?>
                    <?php if(!empty($description)){?>                   
                    <h3>Mes partage<h3>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="<?=base_url('/assets/image/'.$description->{'image'})?>" alt="">
                               
                            </div>
                            
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span><?php echo $description->{'nom'}?> <?php echo $description->{'prenom'}?></span>
                                    <h3><?php echo $description->{'titre'}?></h3>
                                </div>
                                <ul class="pd-tags">
                                    <li><span>Genre</span>: <?php echo $description->{'name'}?></li>
                                    <li><span>Publier le:</span>: <?php echo $description->{'date'}?></li>
                                </ul>
                               
                            </div>
                        </div>
                    </div><?php }?>
                    <?php }?>
                    <h3>Mes publication</h3>
                    <?php foreach($Montantara as $description){?>
                    <?php if(!empty($description)){?>  
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">
                                <img class="product-big-img" src="<?=base_url('/assets/image/'.$description->{'image'})?>" alt="">
                               
                            </div>
                            
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    <span><?php echo $description->{'nom'}?> <?php echo $description->{'prenom'}?></span>
                                    <h3><?php echo $description->{'titre'}?></h3>
                                </div>
                                <ul class="pd-tags">
                                    <li><span>Genre</span>: <?php echo $description->{'name'}?></li>
                                    <li><span>Ppublier le:</span>: <?php echo $description->{'date'}?></li>
                                </ul>
                               
                            </div>
                        </div>
                    </div><?php }?>
                    <?php }?>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->
