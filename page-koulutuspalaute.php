<?php
/**
 * Template Name: Koulutuspalaute
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other 'pages' on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>

<div id="main-content" class="main-content">



<?php
	if ( is_front_page() && twentyfourteen_has_featured_posts() ) {
		// Include the featured content template.
		get_template_part( 'featured-content' );
	}
?>
	<div id="primary" class="content-area">

		<div id="content" class="site-content" role="main">

		
<?php


//sisällytetään yhteystidot
include 'yhteys.php';





function koulutuksennimikysely(){
	include 'yhteys.php';
	$koulutus = mysqli_query ($yhteys,"SELECT * FROM koulutus WHERE palaute='kylla'");
	echo '<option value="tyhja" selected >Valitse koulutus</option>';
	while($tieto = mysqli_fetch_array($koulutus)){
		
		echo '<option value="' . $tieto['koulutusid'] . '">' . $tieto['koulutuksennimi'] . '</option>';
	}
	
}


?>




<html>
<head>
<script>

//Hakee koulutuksen tietoja
function data(str){
if (str=="") {
    document.getElementById("valitse").innerHTML="";
    return;
  } 
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else { // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {
      document.getElementById("valitse").innerHTML=xmlhttp.responseText;
    }
  }
  xmlhttp.open("GET","haetaankoulutustietoja.php?q="+str,true);
  xmlhttp.send();

}

//Tarkistaa onko koulutus valittu
function validateForm() {
    var x = document.forms["form1"]["koulutusid"].value;
    if (x=="tyhja") {
        alert("Valitse koulutus");
        return false;
    }
}

</script>

</head>

<body>

<table class="entry-content1">
<tr><td><h1 class="ajankohtaista">Koulutuspalaute</h1></td><tr><td><br><br>Toivomme, etta pohdit hetken kaymääsi koulutusta ja täytät alla olevan palautelomakkeen. Antamasi palaute on meille arvokasta kehittaessamme koulutuksiamme edelleen.</td></table><br>

<table class="entry-content1">
<form  name="form1" action="tavarakoulutuspalautetaulukkoon.php" onsubmit="return validateForm()" method="post"/>
<td><h3>1. Taustatiedot *</h3></td></table>




<table class="entry-content1">
<td>
	<select name="koulutusid" onchange="data(this.value)" >
		<?php koulutuksennimikysely() ?>
	</select>
	
	
	
</td>


</table>
<table class="entry-content1" id="valitse">

</table>

<br>

<table class="entry-content1">
<tr>
<td><h3>2. Koulutus</h3></td><tr>
<td width="500px">Arvioi koulutuksen osatekijoiden toteutumista asteikolla 1-5. Valitse sopivin vaihtoehto.</td><tr>

<td>1 = ei ollenkaan</td><tr>
<td>2 = jonkin verran</td><tr>
<td>3 = keskinkertaisesti</td><tr>
<td>4 = hyvin</td><tr>
<td>5 = erittain hyvin</td><tr>


<td><br></td><tr>
<td><b>a. Koulutustapahtuma</b></td><td><td align="center">1</td><td align="center">2</td><td align="center">3</td><td align="center">4</td><td align="center">5</td><tr>
<td>Olin etukateen tietoinen koulutuksen kokonaisuudesta</td><td>
<td><input type="radio" name="2a1" value="1"></td>
<td><input type="radio" name="2a1" value="2"></td>
<td><input type="radio" name="2a1" value="3"></td>
<td><input type="radio" name="2a1" value="4"></td>
<td><input type="radio" name="2a1" value="5"></td>
<tr>

<td>Koulutustapahtumasta tiedotettiin riittavasti etukateen</td><td>
<td><input type="radio" name="2a2" value="1"></td>
<td><input type="radio" name="2a2" value="2"></td>
<td><input type="radio" name="2a2" value="3"></td>
<td><input type="radio" name="2a2" value="4"></td>
<td><input type="radio" name="2a2" value="5"></td>
</td><tr>

<td>Koulutus vastasi sisalloltaan sen tavoitteita ja ennakkotietoja</td><td>
<td><input type="radio" name="2a3" value="1"></td>
<td><input type="radio" name="2a3" value="2"></td>
<td><input type="radio" name="2a3" value="3"></td>
<td><input type="radio" name="2a3" value="4"></td>
<td><input type="radio" name="2a3" value="5"></td>
</td><tr>

<td>Kaytannon jarjestelyt toimivat hyvin</td><td>
<td><input type="radio" name="2a4" value="1"></td>
<td><input type="radio" name="2a4" value="2"></td>
<td><input type="radio" name="2a4" value="3"></td>
<td><input type="radio" name="2a4" value="4"></td>
<td><input type="radio" name="2a4" value="5"></td>
</td><tr>

<td>Koulutustilat ja -laitteet olivat asianmukaiset</td><td>
<td><input type="radio" name="2a5" value="1"></td>
<td><input type="radio" name="2a5" value="2"></td>
<td><input type="radio" name="2a5" value="3"></td>
<td><input type="radio" name="2a5" value="4"></td>
<td><input type="radio" name="2a5" value="5"></td>
</td></td><tr>

<td><br></td><tr>
<td><b>b. Koulutuksen hyoty</b></td><td><td align="center">1</td><td align="center">2</td><td align="center">3</td><td align="center">4</td><td align="center">5</td><tr>
<td>Koulutus vastasi tarpeitani</td><td>
<td><input type="radio" name="2b1" value="1"></td>
<td><input type="radio" name="2b1" value="2"></td>
<td><input type="radio" name="2b1" value="3"></td>
<td><input type="radio" name="2b1" value="4"></td>
<td><input type="radio" name="2b1" value="5"></td>
<tr>

<td>Koulutus oli sisalloltaan onnistunut</td><td>
<td><input type="radio" name="2b2" value="1"></td>
<td><input type="radio" name="2b2" value="2"></td>
<td><input type="radio" name="2b2" value="3"></td>
<td><input type="radio" name="2b2" value="4"></td>
<td><input type="radio" name="2b2" value="5"></td>
<tr>

<td>Koin koulutuksen sisallon mielenkiintoiseksi</td><td>
<td><input type="radio" name="2b3" value="1"></td>
<td><input type="radio" name="2b3" value="2"></td>
<td><input type="radio" name="2b3" value="3"></td>
<td><input type="radio" name="2b3" value="4"></td>
<td><input type="radio" name="2b3" value="5"></td>
<tr>

<td>Koulutus edistaa ammatillista kehittymistani</td><td>
<td><input type="radio" name="2b4" value="1"></td>
<td><input type="radio" name="2b4" value="2"></td>
<td><input type="radio" name="2b4" value="3"></td>
<td><input type="radio" name="2b4" value="4"></td>
<td><input type="radio" name="2b4" value="5"></td>
<tr>

<td>Koulutuksen opit ovat sovellettavissa kaytantoon</td><td>
<td><input type="radio" name="2b5" value="1"></td>
<td><input type="radio" name="2b5" value="2"></td>
<td><input type="radio" name="2b5" value="3"></td>
<td><input type="radio" name="2b5" value="4"></td>
<td><input type="radio" name="2b5" value="5"></td>
<tr>

<td><br></td><tr>
<td><b>c. Koulutuksessa kaytetyt menetelmat</b></td><td><td align="center">1</td><td align="center">2</td><td align="center">3</td><td align="center">4</td><td align="center">5</td><tr>
<td>Koulutuksessa kaytettiin monipuolisia menetelmia</td><td>
<td><input type="radio" name="2c1" value="1"></td>
<td><input type="radio" name="2c1" value="2"></td>
<td><input type="radio" name="2c1" value="3"></td>
<td><input type="radio" name="2c1" value="4"></td>
<td><input type="radio" name="2c1" value="5"></td>
<tr>

<td>Koulutuksessa kaytetytmenetelmat sopivat aihesisaltoon</td><td>
<td><input type="radio" name="2c2" value="1"></td>
<td><input type="radio" name="2c2" value="2"></td>
<td><input type="radio" name="2c2" value="3"></td>
<td><input type="radio" name="2c2" value="4"></td>
<td><input type="radio" name="2c2" value="5"></td>
<tr>

<td>Koulutus aktivoi kysymyksiin ja keskusteluun</td><td>
<td><input type="radio" name="2c3" value="1"></td>
<td><input type="radio" name="2c3" value="2"></td>
<td><input type="radio" name="2c3" value="3"></td>
<td><input type="radio" name="2c3" value="4"></td>
<td><input type="radio" name="2c3" value="5"></td>
<tr>

<td>Koulutuksen oppimateriaali tuki oppimista</td><td>
<td><input type="radio" name="2c4" value="1"></td>
<td><input type="radio" name="2c4" value="2"></td>
<td><input type="radio" name="2c4" value="3"></td>
<td><input type="radio" name="2c4" value="4"></td>
<td><input type="radio" name="2c4" value="5"></td>
<tr>

<td>Etaopetuspaivan tehtavat tukivat oppimista</td><td>
<td><input type="radio" name="2c5" value="1"></td>
<td><input type="radio" name="2c5" value="2"></td>
<td><input type="radio" name="2c5" value="3"></td>
<td><input type="radio" name="2c5" value="4"></td>
<td><input type="radio" name="2c5" value="5"></td>
<tr>

<td><br></td><tr>
<td><b>d. Kouluttaja</b></td><td><td align="center">1</td><td align="center">2</td><td align="center">3</td><td align="center">4</td><td align="center">5</td><tr>
<td>Kouluttaja oli asiantunteva</td><td>
<td><input type="radio" name="2d1" value="1"></td>
<td><input type="radio" name="2d1" value="2"></td>
<td><input type="radio" name="2d1" value="3"></td>
<td><input type="radio" name="2d1" value="4"></td>
<td><input type="radio" name="2d1" value="5"></td>
<tr>

<td>Kouluttajan opetus oli selkeaa</td><td>
<td><input type="radio" name="2d2" value="1"></td>
<td><input type="radio" name="2d2" value="2"></td>
<td><input type="radio" name="2d2" value="3"></td>
<td><input type="radio" name="2d2" value="4"></td>
<td><input type="radio" name="2d2" value="5"></td>
<tr>

<td>Vuorovaikutus kouluttajan kanssa sujui hyvin</td><td>
<td><input type="radio" name="2d3" value="1"></td>
<td><input type="radio" name="2d3" value="2"></td>
<td><input type="radio" name="2d3" value="3"></td>
<td><input type="radio" name="2d3" value="4"></td>
<td><input type="radio" name="2d3" value="5"></td>
<tr>

<td>Yhteydenpito kouluttajaan onnistui etaopetuspaivana</td><td>
<td><input type="radio" name="2d4" value="1"></td>
<td><input type="radio" name="2d4" value="2"></td>
<td><input type="radio" name="2d4" value="3"></td>
<td><input type="radio" name="2d4" value="4"></td>
<td><input type="radio" name="2d4" value="5"></td>
<tr>

<td>Kouluttaja onnistui tehtavassaan</td><td>
<td><input type="radio" name="2d5" value="1"></td>
<td><input type="radio" name="2d5" value="2"></td>
<td><input type="radio" name="2d5" value="3"></td>
<td><input type="radio" name="2d5" value="4"></td>
<td><input type="radio" name="2d5" value="5"></td>
<tr>
</table>
<br>
<table class="entry-content1"><tr>
<td><h3>3. Vapaa sana</h3></td><tr>


<td>a. Mika oli mielestasi koulutuksen parasta antia?</td>
<tr>
<td><textarea style="max-width:100%"rows="3" cols="50" name="3a" ></textarea></td><tr>
<td><br></td><tr>

<td>b. Parannusehdotuksia?</td>
<tr>
<td><textarea rows="3" cols="50" name="3b" ></textarea></td><tr>
<td><br></td><tr>

<td>c. Minkalaiseen koulutukseen haluaisit jatkossa osallistua?</td>
<tr>
<td><textarea rows="3" cols="50" name="3c" ></textarea></td><tr>
<td><br></td><tr>

<td>d. Muita kommentteja?</td>
<tr>
<td><textarea rows="3" cols="50" name="3d" ></textarea></td><tr>
</table>

<br>
<table class="entry-content1"><tr>
<td><h3>4. Arvosana</h3></td><tr>
<td>Koulutukselle annan kokonaisarvosanan</td><td>
<td><select name="kokonaisarvosana" selected id="kokonaisarvosana">
<option value="0" selected>Valitse Arvosana</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>

</select></td><tr>
<td>Voisin suositella koulutusta muille</td><td>
<td><select name="suositus" id="suositus">
<option value="0" selected>Valitse Kyllä tai Ei</option>
<option value="1">Kyllä</option>
<option value="2">Ei</option>

</select></td><tr>
<td><br></td><tr>
<td><input type="submit" value="Lähetä"></td>
</table>
<br>

<br>
<br>
<br>
<br>
</form>

</body>
</html>

		
			<?php
				// Start the Loop.
				while ( have_posts() ) : the_post();

					// Include the page content template.
					get_template_part( 'content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) {
						comments_template();
					}
				endwhile;
			?>

		</div><!-- #content -->
		
		


	</div><!-- #primary -->
	
</div><!-- #main-content -->

<?php

get_footer();