
    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <?php foreach($auto as $description){?>

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
                                    <li><span>Radio</span>: <?php echo $description->{'radio_name'}?></li>
                                    <li><span>Genre</span>: <?php echo $description->{'name'}?></li>
                                    <li><span>Publier le:</span>: <?php echo $description->{'date'}?></li>
                                </ul>
                               
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->