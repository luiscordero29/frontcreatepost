<?php 
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
function front_create_post_view() {
	?>
		<section id="front_create_post_view" class="front_create_post">
			<form action="" method="post">
                <div class="row">
                	<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="row">
                        	<div class="col-xs-6">
		                        <label for="nombre">Catégorie <span class="red">*</span></label>
		                        <select name="escort" id="escort" class="form-control" required tabindex=1>
		        					<option value="">Toutes Categories</option>
                                    <option value="escort-boys">Escort Boys</option>
                                    <option value="escort-gay">Escort Gay</option>
                                    <option value="escort-girls">Escort Girls</option>
                                    <option value="escort-transsexuels">Escort Transsexuels</option>
                                    <option value="rencontres-serieuses">Rencontres serieuses</option>
                                    <option value="rencontres-webcam">Rencontres webcam</option>
		        				</select>
		                    </div>
		                    <div class="col-xs-6">
		                        <label for="nombre">Ville <span class="red">*</span></label>
		                        <select name="ville" id="ville" class="form-control" required tabindex=2>
		        					<option value="">Villes Francias</option>
                                    <option value="agen">Agen</option>
                                    <option value="ajaccio">Ajaccio</option>
                                    <option value="angers">Angers</option>
		        				</select>
		                    </div>
		                    <div class="col-xs-12">
		                        <label for="title">Titre de l'annonce <span class="red">*</span></label>
		                        <input type="text" class="form-control" name="title" id="title" required tabindex=3>
		                    </div>
		                    <div class="col-xs-4">
		                        <label for="iam">Je suis <span class="red">*</span></label>
		                        <select name="iam" id="iam" class="form-control" required tabindex=4>
		        					<option value="">Je suis</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
		        				</select>
		                    </div>
		                    <div class="col-xs-4">
		                        <label for="isearch">Je cherche <span class="red">*</span></label>
		                        <select name="isearch" id="isearch" class="form-control" required tabindex=5>
		        					<option value="">Je cherche</option>
                                    <option value="male">Male</option>
                                    <option value="female">Female</option>
		        				</select>
		                    </div>
		                    <div class="col-xs-4">
		                        <label for="age">Mon âge <span class="red">*</span></label>
		                        <input type="text" class="form-control" name="age" id="age" required tabindex=6>
		                    </div>
		                    <div class="col-xs-12">
		                        <label for="description">Description <span class="red">*</span></label>
                    			<textarea class="form-control" name="description" id="description" required rows="10" tabindex=7></textarea>
		                    </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="row">
                        	<div class="col-xs-12">
		                        <label for="name">Nom/Pseudo <span class="red">*</span></label>
		                        <input type="text" class="form-control" name="name" id="name" required tabindex=8>
		                    </div>
		                    <div class="col-xs-12">
		                        <label for="email">E-mail <span class="red">*</span></label>
		                        <input type="email" class="form-control" name="email" id="email" required tabindex=9>
		                    </div>
		                    <div class="col-xs-6">
		                        <label for="phone_1">Téléphone 1 <span class="red">*</span></label>
		                        <input type="text" class="form-control" name="phone_1" id="phone_1" required tabindex=10>
		                    </div>
		                    <div class="col-xs-6">
		                        <label for="schedule_1">Horaire <span class="red">*</span></label> 
		                    	<select  id="schedule_1" name="schedule_1" class="form-control" required tabindex=11>
		                    		<option value="">Horaire</option>
		                    		<option value="Matin">Matin</option>
		                    		<option value="Après-midi">Après-midi</option>
		                    		<option value="Soir">Soir</option>
		                    		<option value="24 heures">24 heures</option>	                    		
		                    	</select>
		                    </div>
		                    <div class="col-xs-6">
		                        <label for="phone_2">Téléphone 2 <span class="red">*</span></label>
		                        <input type="text" class="form-control" name="phone_2" id="phone_2" required tabindex=12>
		                    </div>
		                    <div class="col-xs-6">
		                        <label for="schedule_2">Horaire <span class="red">*</span></label> 
		                    	<select  id="schedule_2" name="schedule_2" class="form-control" required tabindex=13>
		                    		<option value="">Horaire</option>
		                    		<option value="Matin">Matin</option>
		                    		<option value="Après-midi">Après-midi</option>
		                    		<option value="Soir">Soir</option>
		                    		<option value="24 heures">24 heures</option>	                    		
		                    	</select>
		                    </div>
		                    <div class="col-xs-6">
		                        <label for="expiration">Expiration  <span class="red">*</span></label> 
		                    	<select  id="expiration" name="expiration" class="form-control" required tabindex=13>
		                    		<option value="">Expiration</option>
		                    		<option value="30">30 Jours</option>
		                    		<option value="60">60 Jours</option>
		                    		<option value="90">90 Jours</option>	                    		
		                    	</select>
		                    </div>
		                    <div class="col-xs-12">
                    			<div class="checkbox">
								    <h3>conditions d'utilisation</h3>
								    <label>
								      	<input type="checkbox" name="thisok" value="ok" required tabindex=14> 
                    					J'accepte les conditions d'utilisation et certifie par la présente que je suis d'âge légal dans ma juridiction et que j'ai créé ce profil de ma propre initiative, libre de toute pression extérieure et que je n'offrirai aucun service qui serait contraire aux lois locales.
								    </label>
								</div>
                    		</div>							
                    		<div class="col-xs-12">
		                        <button type="submit" class="btn btn-default" tabindex=15>Publier cette annonce</button>
		                        <input type="hidden" name="send" value="send">
		                    </div>
                        </div>
                    </div>
                </div>
            </form>
		</section>
		<script type="text/javascript">
		 
		</script>
	<?php
}
?>