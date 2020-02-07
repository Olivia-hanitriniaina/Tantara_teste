<script type="text/javascript" src="<?php echo base_url()?>/asset/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>/asset/ckfinder/ckfinder.js"></script>
<div class="register-login-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 offset-lg-3">
                    <div class="login-form">

                        <h2>Auteur par défaut : <?php echo $information?></h2>  
                        <form action="<?php echo site_url("AjouterTantara_controlleur/upload")?>" method="post" enctype="multipart/form-data">
                        <?php if(!empty($message)){?>
                            <p style="color:red"><?php echo $message?>
                        <?php }?>
                        <div class="col-lg-6 col-sm-6">
                            <div class="group-input">
                                <label for="username">Titre(*)</label>
                                <input type="text" name="titre">
                            </div>
                         </div>
                         
                        <div class="col-lg-6 col-sm-6">
                            <div class="group-input">
                                <label for="pass">Date de realisation(*)</label>
                                <input type="date"  format ="YYYY-MM-DD" name="date">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="group-input">
                                <label for="pass">Image(*)</label>
                                <input type="file" class="btn btn-default" name="files[]" multiple>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="group-input">
                                    <label for="pass">Genre(*)</label>
                                    <div class="select-option">
                                        <select class="sorting" name='genre'>
                                            <option></option>
                                            <?php foreach ($genre as $karazany){?>
                                            <option value ="<?php echo $karazany->{'id_genre'}?>"><?php echo $karazany->{'name'}?>
                                            <?php }?>
                                        </select>
                                    </div>
                            </div>
                        </div>
                        <div class="col-lg-12 col-sm-12">
                            <div class="group-input">
                                <label for="pass">Tantara(*)</label>
                                <textarea cols="180" id="edi" name="texte" rows="10"> </textarea>
                             </div>
                         </div>
                       
                        <div class="col-lg-4 col-sm-6"> </div>
                        <div class="col-lg-4 col-sm-2"> 
                        <button type="submit" class="site-btn login-btn">Publier</button>

                        </div>
                        <div class="col-lg-4 col-sm-4"> 
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Register Form Section End -->