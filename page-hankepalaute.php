<?php
/**
 * Template Name: Hankepalaute
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


//Tarkistaa onko koulutus valittu
function validateForm() {
    var x = document.forms["form1"]["koulutusid"].value;
    if (x=="tyhja") {
        alert("Valitse koulutus");
        return false;
    }
}

</script>


<link rel="stylesheet" type="text/css" href="mystyle.css">


</head>

<body>

<table class="entry-content1"><tr><td>
<h1 class="ajankohtaista">HANKEPALAUTE</h1></td></table><br>

<form name="form1" action="tavarapalautteettaulukkoon.php" onsubmit="return validateForm()" method="post" class="tuomas2widthcenter"/>
<table>
<tr><td><h1>Projektin alueellisten vaikutusten arviointi</h1></td></table>

<h3>1. Yrityshankkeen perustiedot</h3>


<table class="entry-content1">
<tr>
<td width="35%">Yhteistyösopimuksen pvm</td><td><input type="date" name=pvm></td><td><!--(pp.kk.vvvv)--></td><tr></table>
<table class="entry-content1">
<td width="35%">Yrityksen nimi</td><td><textarea type=text rows=1 cols=40 name=nimi style="resize: none" ></textarea></td><tr>
<td width="35%">Y-tunnus</td><td><textarea type=text rows=1 cols=40 name=ytunnus style="resize: none" ></textarea></td><tr>
<td width="35%">Paikkakunta</td><td><textarea type=text rows=1 cols=40 name=kunta style="resize: none" ></textarea></td><tr>
<td width="35%">Hankkeen budjetti</td><td><textarea type=text rows=1 cols=40 name=budjetti style="resize: none" ></textarea></td><tr>
<td width="35%">Yrityksen omarahoitusosuus</td><td><textarea type=text rows=1 cols=40 name=omarahoitus style="resize: none" ></textarea></td><tr>
<td width="35%">Yrityksen toteutuneet neuvontapalvelukustannukset</td><td><textarea type=text rows=2 cols=40 name=neuvontapalvelukustannukset></textarea></td><tr>
<td width="35%">Yhteistyöhankkeen sisältö</td><td><textarea type=text rows=2 cols=40 name=sisalto></textarea></td><tr>
</table>
<br>
<table class="entry-content1">
<td>1 = ei</td><tr>
<td>2 = jonkin verran</td><tr>
<td>3 = kyllä</td><tr>
<td>4 = paljon</td><tr>
<td>5 = erittäin paljon</td><tr>
</table>
<br>

<table>
<tr>
<td><h3>2. Työllisyysvaikutukset</h3></td><tr>
</table>


<table class="entry-content1">

<td><b>Henkilöstövaikutukset</b></td><td><td align="center">1</td><td align="center">2</td><td align="center">3</td><td align="center">4</td><td align="center">5</td><tr>
<td width="80%">henkilöstön osaaminen kasvoi</td><td>
<td><input type="radio" name="2a1" value="1"></td>
<td><input type="radio" name="2a1" value="2"></td>
<td><input type="radio" name="2a1" value="3"></td>
<td><input type="radio" name="2a1" value="4"></td>
<td><input type="radio" name="2a1" value="5"></td>
<tr>

<td width="80%">henkilöstön määrä kasvoi</td><td>
<td><input type="radio" name="2a2" value="1"></td>
<td><input type="radio" name="2a2" value="2"></td>
<td><input type="radio" name="2a2" value="3"></td>
<td><input type="radio" name="2a2" value="4"></td>
<td><input type="radio" name="2a2" value="5"></td>
</td><tr>
</table>
<br>
<table class="entry-content1">
<td><b>Uusien työpaikkojen määrä</b></td></table>
<table class="entry-content1"><tr>
<td width="35%">Miehet</td>
<td><input type="number" name="2a3" step="1" name="2a3" min="0" max="20"></td><tr>
<td width="35%">Naiset</td>
<td><input type="number" name="2a4" step="1" name="2a4" min="0" max="20"></td><tr>
</table>

<br>

<table class="entry-content1">
<td><b>Uusista työpaikoista tutkimus- tai tuotekehitystyöpaikkoja</b></td>
</table>

<table class="entry-content1">
<tr>
<td width="35%">Miehet</td>
<td><input type="number" step="1" name="2a5" min="0" max="20"></td><tr>
<td width="250px">Naiset</td>
<td><input type="number" step="1" name="2a6" min="0" max="20"></td>

</table>

<br>

<table class="entry-content1">
<tr>

<td width="80%"><b>Yritystoiminta</b></td><td><td align="center">1</td><td align="center">2</td><td align="center">3</td><td align="center">4</td><td align="center">5</td><tr>
<td>palveluiden / tuotteiden määrä kasvoi</td><td>
<td><input type="radio" name="2b1" value="1"></td>
<td><input type="radio" name="2b1" value="2"></td>
<td><input type="radio" name="2b1" value="3"></td>
<td><input type="radio" name="2b1" value="4"></td>
<td><input type="radio" name="2b1" value="5"></td>
<tr>

<td>verkostoituminen lisääntyi</td><td>
<td><input type="radio" name="2b2" value="1"></td>
<td><input type="radio" name="2b2" value="2"></td>
<td><input type="radio" name="2b2" value="3"></td>
<td><input type="radio" name="2b2" value="4"></td>
<td><input type="radio" name="2b2" value="5"></td>
</td><tr>

<td>asiakkaiden määrä lisääntyi</td><td>
<td><input type="radio" name="2b3" value="1"></td>
<td><input type="radio" name="2b3" value="2"></td>
<td><input type="radio" name="2b3" value="3"></td>
<td><input type="radio" name="2b3" value="4"></td>
<td><input type="radio" name="2b3" value="5"></td>
</td><tr>
</table>
<br>
<table class="entry-content1">
<td><b>Osuiko yrityksen kehittämishanke kasvukynnykseen, jonka johdosta liiketoiminta kasvoi?</b></td>
</table>

<table class="entry-content1">
<tr>
<td width="35%">Kyllä</td>
<td><input type="radio" name="2b4" value="1"></td><tr>
<td width="35%">Ei</td>
<td><input type="radio" name="2b4" value="2"></td></td><tr>
<td width="35%">Muu vaikutus, mikä?</td><td><textarea type=text rows=2 cols=40 name="2b5"></textarea></td>
</table>

<br>
<table class="entry-content1">
<tr>

<td width="80%"><h3>3. Jatkotoimenpiteet</h3></td><td><td align="center">1</td><td align="center">2</td><td align="center">3</td><td align="center">4</td><td align="center">5</td><tr>
<td>Onko ICT-alan yritystoiminnan kehittäminen projektista tiedotettu alueella tarpeeksi?</td><td>
<td><input type="radio" name="3a1" value="1"></td>
<td><input type="radio" name="3a1" value="2"></td>
<td><input type="radio" name="3a1" value="3"></td>
<td><input type="radio" name="3a1" value="4"></td>
<td><input type="radio" name="3a1" value="5"></td>
<tr>

<td style="width:400px;">Onko tällaiselle  hankkeelle tarvetta alueellamme jatkossa?</td><td>
<td><input type="radio" name="3a2" value="1"></td>
<td><input type="radio" name="3a2" value="2"></td>
<td><input type="radio" name="3a2" value="3"></td>
<td><input type="radio" name="3a2" value="4"></td>
<td><input type="radio" name="3a2" value="5"></td>
</td>


</table class="entry-content1">
<br>
<table>
<td>Onko yrityksellänne suunnitelmissa kehittää liiketoimintaa lähivuosina</td>
</table>

<table class="entry-content1">
<tr>
<td width="35%">Kyllä</td>
<td><input type="radio" name="3a3" value="1"></td><tr>
<td width="35%">Ei</td>
<td><input type="radio" name="3a3" value="2"></td></td><tr>
</table><table><tr>
<td>Jos vastasitte kyllä, valitkaa alla olevista kehittämistarpeista lähinnä suunnitelmianne vastaava kohta</td>
</table>
<table>
<td width="35%">Toiminnan laajentaminen</td>
<td><input type="checkbox" name="3a41" value="1"></td><tr>

<td width="35%">Markkinoinnnin kehittäminen</td>
<td><input type="checkbox" name="3a42" value="1"></td><tr>

<td width="35%">Neuvonta</td>
<td><input type="checkbox" name="3a43" value="1"></td><tr>

<td width="35%">Koulutus</td>
<td><input type="checkbox" name="3a44" value="1"></td><tr>

<td width="35%">Muu, mikä?</td>
<td><textarea type=text rows=2 cols=40 name=3a5></textarea></td>


</table>


<table class="entry-content1"><tr>
<td><h3>4. Muuta huomioitavaa</h3></td><tr>


<td>a. Mikä oli mielestasi ICT projektin parasta antia?</td>
<tr>
<td><textarea rows="10" cols="50" name="4a" ></textarea></td><tr>
<td><br></td><tr>

<td>b. Parannusehdotuksia?</td>
<tr>
<td><textarea rows="10" cols="50" name="4b" ></textarea></td><tr>
<td><br></td><tr>

<td>c. Minkalaisiin hankkeisiin haluaisit jatkossa osallistua?</td>
<tr>
<td><textarea rows="10" cols="50" name="4c" ></textarea></td><tr>
<td><br></td><tr>

<td>d. Millaisiavaikutuksia ICT -projektilla on mielestänne alueen yrityksiin?</td>
<tr>
<td><textarea rows="10" cols="50" name="4d" ></textarea></td><tr>
<td><br></td><tr>

<td>e. Millaisilla toimenpiteillä kunnat, kehitysyhtiöt ja oppilaitokset voivat parhaiten tukea alueensa yritystoiminnan kasvua ja kannattavuutta?</td>
<tr>
<td><textarea rows="10" cols="50" name="4e" ></textarea></td><tr>
<td><br></td><tr>


</table>

<br>
<table class="entry-content1"><tr>
<td><h3>4. Arvosana</h3></td><tr>
<td>Koulutukselle annan kokonaisarvosanan</td><td>
<td><select name="arvosana" selected id="arvosana">
<option value="0" selected>Valitse Arvosana</option>
<option value="4">4</option>
<option value="5">5</option>
<option value="6">6</option>
<option value="7">7</option>
<option value="8">8</option>
<option value="9">9</option>
<option value="10">10</option>

</td>
</table>
<br>
<input type="submit" value="Lähetä">
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
