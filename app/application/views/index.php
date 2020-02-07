<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page de connexion</title>

    <link rel="stylesheet" href="<?=base_url('/assets/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('/assets/css/font-awesome.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('/assets/css/login_form.css')?>">

    

</head>
<body>
    <div class="container-fluid page_login">
        <?php $this->load->helper('form') ?>
    
    <div class="container">
        <img src="<?=base_url('/assets/image/logo.jpg')?>" alt="logo" id="logo">
		<?= form_open('Auth_controlleur/user_login',array('class'=>'form')) ?>
		<br>
        <fieldset class="scheduler-border">
            <div class="form-group">
                <?= form_label("Email d'utilisateur&nbsp:","email")?>
                <?= form_input(['name'=>'email','id'=>'email','class'=>'form-control','type'=>'email'],set_value('email'))?>
            </div>

            <div class="form-group"> 
                <?= form_label("Mot de passe&nbsp:","motdepasse")?>
                <?= form_password(['name'=>'motdepasse','id'=>'motdepasse','class'=>'form-control'],set_value('motdepasse'))?>
            </div>

            <div class="form-group">
                <button type="submit" name="login" id="login" class="btn btn-primary"><i class="fa fa-sign-in" aria-hidden="true"></i> Se connecter</button>
			</div> 
             <!--Déclération des 2 variables contenant les erreurs dans les inputs -->
			 <?php 
                $login_error=form_error('email');
                $passeword_error=form_error('motdepasse');
            ?>
            <!-- Gestion des erreurs -->
            <?php if(!empty($error)): ?>
                <div class="alert alert-danger " style="text-align:center"><?=$error?></div>
            <?php elseif(!empty($login_error) AND !empty($passeword_error) ):?>
                <div class="alert alert-danger " style="text-align:center"><?=$login_error.'and'.$passeword_error?></div>
            <?php elseif(!empty($login_error)):?>
                <div class="alert alert-danger " style="text-align:center"><?=$login_error?></div>
            <?php elseif(!empty($passeword_error)):?>
                <div class="alert alert-danger" style="text-align:center"><?=$passeword_error?></div> 
            <?php elseif(isset($error_message)):?>  
                <div class="alert alert-danger" style="text-align:center"><?=$error_message?></div>       
            <?php endif;?>         
        </fieldset>
        <?= form_close()?>
   </div>   
    </div>
    <script src="<?=base_url('/assets/js/jquery.min.js')?>"></script>
    <script src="<?=base_url('/assets/js/bootstrap.min.js')?>"></script>
   
</body>
</html>