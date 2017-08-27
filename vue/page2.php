
	<section>
		<h2>Nous contacter</h2>
		<article>
			<h3>Formulaire de contact</h3>
			<p>
				<form action="../control/form_recept.php" method="post" accept-charset="utf-8">
					<p> 
						*Nom :  </br>
						<input type="text" name="NOM" value="" placeholder="Nom, Prénom" size="50">
					</p>
					<p> *Email : </br>
						<input type="email" name="EMAIL" value="" placeholder="Email@monfournisseur.com" size="50" required>
					</p>
					<p> Je suis :</BR>
						<select name="JESUIS" ="50">
							<option value="ETUD">Élève</option>
							<option value="PARETUD">Parent d'élève</option>
							<option value="PROF">Professeur</option>
						</select>
					</p>

					<p> *Votre messsage:</br>
						<textarea name="MESSAGE" cols="70" rows="10" required></textarea>
						
					</p>
					<p>
						<input type="checkbox" name="NEWSLETTER" value="1">
						Je veux recevoir la newsletter.
					</p>

					<P>
						<input type="submit" name="" value="Envoyer">
					</P>
				</form>
			</p> 
		</article>

		<article>
			<h3>Par courrier</h3>
			<p>
				LOCAVOITURES</br>
				Département Charleroi</br>
				Grand rue 185 </br>
				6000 Charleroi </br>
			</p>
		</article>		
		<article>
			<h3>Le secrétariat</h3>
			<p>Tel : 071/285.905
			<table class="TBHOUV">
				<caption>Heures d'ouverture</caption>
				<tr>
					<td class="invisible"></td>
					<td class="TitreTB">Lundi</td>
					<td class="TitreTB">Mardi</td>
					<td class="TitreTB">Mercredi</td>
					<td class="TitreTB">Jeudi</td>
					<td class="TitreTB">Vendredi</td>
					<td class="TitreTB">Samedi</td>
					<td class="TitreTB">Dimanche</td>
				</tr>
				<tr>
					<td class="TitreTB">Matin</td>
					<td >9h30 à 12h30</td>
					<td >9h30 à 12h30</td>
					<td rowspan="2" class="CellGrise">Fermé</td>
					<td >9h30 à 12h30</td>
					<td >9h30 à 12h30</td>
					<td colspan="2" rowspan="2" class="CellGrise">Fermé</td>
				</tr>
				<tr>
					<td class="TitreTB">Après-midi</td>
					<td >17h30 à 20h30</td>
					<td >17h30 à 20h30</td>
					<td >17h30 à 20h30</td>
					<td >17h30 à 20h30</td>
				</tr>
				<tr>
					<td colspan="8" class="TitreTB">du 1/09 au 30/6</td>
				</tr>
			</table>
			
		</p>
		<p>
			du lundi au vendredi de 9h30 à 12h30 et de 13h30 à 20h30
		</p>
	</article>		
</section>
