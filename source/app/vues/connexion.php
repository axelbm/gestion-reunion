<div class="bg-dark">
   <div class="container mt-4">
        <div class="row">
        <strong id="result">Coucou</strong>
        </div>
   </div>
   </div>
   <div class="col-lg-4 offset-lg-4 bg-light rounded" id="login-box">
        <h2 class="text-center mt-2">Se connecter</h2>
        <form action="" method="post" role="form" class="p-2" id="login-frm">
            <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Courrier électronique" required>
            </div>
            <div class="form-group">
            <input type="password" name="password" class="form-control" placeholder="Mot de passe" required>
            </div>
            <div class="form-group">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" name="rem" class="custom-control-input" id="customCheck">
                    <label for="customCheck" class="custom-control-label">Se souvenir de moi</label>
                    <a href="#" id="forgot-btn" class="float-right">Mot de passe oublié ?</a>
                </div>
            </div>
            <div class="form-group">
                <input type="submit" name="login" id="login" value="Login" class="btn btn-primary btn-block">
            </div>
            <div class="form-group">
                <p class="text-center">Première fois ? <a href="#" id="register-btn">S'inscrire ici</a></p>
            </div>
        </form>
   </div>

   <div class="col-lg-4 offset-lg-4 bg-light rounded" id="register-box">
        <h2 class="text-center mt-2">S'inscrire</h2>
        <form action="" method="post" role="form" class="p-2" id="register-frm">
            <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Prénom" required>
            </div>
            <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="Nom" required>
            </div>
            <div class="form-group">
            <input type="text" name="email" class="form-control" placeholder="Courrier électronique" required>
            </div>
            <div class="form-group">
            <input type="password" name="pass" class="form-control" placeholder="Mot de passe" required>
            </div>
            <div class="form-group">
            <input type="password" name="cpass" class="form-control" placeholder="Veuillez confirmer votre mot de passe" required>
            </div>
            <div class="form-group">
            <input type="text" name="name" class="form-control" placeholder="*No. d'Invitation" required>
            </div>
            <div class="form-group">
                <input type="submit" name="register" id="register" value="Register" class="btn btn-primary btn-block">
            </div>
            <div class="form-group">
                <p class="text-center">Déjà inscrit ? <a href="#" id="login-btn">Se connecter ici</a></p>
            </div>
        </form>
   </div>
   <script type="text/javascript">
       $(document).ready(function(){
           $("#register-btn").click(function(){
               $("#register-box").show();
               $("#login-box").hide();
           });
           $("#login-btn").click(function(){
               $("#register-box").hide();
               $("#login-box").show();
       });
       });
   </script>
</div>
