<?php
/**
 * Template Name: Ilmoittautuminen
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

		
		
		
<html>

<body>
<table class="tuomaswidthcenter"><tr><td>
<h1 class="ajankohtaista">ILMOITTAUTUMISLOMAKE</h1></td></table><br>
		
		
		
		
			<?php
			
			
			
			
			
			
			




//sisällytetään yhteystidot
include 'yhteys.php';



// tallennetaan postatut tiedot variableihin
$id = $_POST['var2'];

$aloitusaika = $_POST['aloitusaika'];
$aloitusaikaklo = $_POST['aloitusaikaklo'];
$lopetusaika = $_POST['lopetusaika'];
$lopetusaikaklo = $_POST['lopetusaikaklo'];


//Koulutuksen nimi kysely
$nimi = mysqli_query ($yhteys,"SELECT * FROM koulutus WHERE koulutusid = $id");
while($tieto = mysqli_fetch_array ($nimi)){

echo "<table class=\"tuomaswidthcenter\"><tr>
<td>Koulutuksen nimi:</td><td style=\"strong\">" . $tieto['koulutuksennimi'] . "</td>



<form action=\"tavarailmoittautuneettaulukkoon.php\" method=\"post\"/>
<input type=\"hidden\" name=\"var2\" value=". $id .">
<tr>




<td>Ajankohta: </td> <td>".  date("d.m.Y", strtotime($aloitusaika)) . "&nbsp;&nbsp;-&nbsp;&nbsp;" . date("d.m.Y", strtotime($lopetusaika)) .

"</td><tr>

<td>Yritys: </td><td><input type=\"text\" name=\"yritys\" size=\"40\"></td><tr>

<td>nimi: </td> <td><input type=\"text\" name=\"nimi\" size=\"40\"></td><tr><tr><td><br></td><tr>

<td><p><b>Sukupuoli</b></p></td><tr>
<td>mies</td> <td><input type=\"radio\" name=\"sukupuoli\" value=\"mies\"></td><tr>
<td>nainen</td> <td><input type=\"radio\" name=\"sukupuoli\" value=\"nainen\"></td><tr><tr><td><br></td><tr>

<td><p><b>Yrityksen henkilomaara</b></p></td><tr>
<td>alle 5</td> <td><input type=\"radio\" name=\"henkilomaara\" value=\"alle 5\"></td><tr>
<td>10-19</td> <td><input type=\"radio\" name=\"henkilomaara\" value=\"10-19\"></td><tr>
<td>20-49</td> <td><input type=\"radio\" name=\"henkilomaara\" value=\"20-49\"></td><tr>
<td>50-99</td> <td><input type=\"radio\" name=\"henkilomaara\" value=\"50-99\"></td><tr>
<td>100-249</td> <td><input type=\"radio\" name=\"henkilomaara\" value=\"100-249\"></td><tr>
<td>500 tai yli</td> <td><input type=\"radio\" name=\"henkilomaara\" value=\"500 tai yli\"></td><tr><tr><td><br></td><tr>

<td><p><b>Minka ikainen olet</b></p></td><tr>
<td>alle 25 vuotias</td> <td><input type=\"radio\" name=\"ika\" value=\"alle 25 vuotias\"></td><tr>
<td>25-29-vuotias</td> <td><input type=\"radio\" name=\"ika\" value=\"25-29-vuotias\"></td><tr>
<td>30-54-vuotias</td> <td><input type=\"radio\" name=\"ika\" value=\"30-54-vuotias\"></td><tr>
<td>yli 54-vuotias</td> <td><input type=\"radio\" name=\"ika\" value=\"yli 54-vuotias\"></td><tr><tr><td><br></td><tr>

<td><p><b>Tyotilanne talla hetkella</b></p></td><tr>
<td>toissa</td> <td><input type=\"radio\" name=\"ammatti\" value=\"toissa\"></td><tr>
<td>koulussa</td> <td><input type=\"radio\" name=\"ammatti\" value=\"koulussa\"></td><tr>
<td>tyoton</td> <td><input type=\"radio\" name=\"ammatti\" value=\"tyoton\"></td><tr>
<td>tyomarkkinoiden ulkopuolella</td> <td><input type=\"radio\" name=\"ammatti\" value=\"tyomarkkinoiden ulkopuolella\"></td><tr>
<td></td><td class=\"tuomastd3\"><input type=\"submit\" value=\"&nbsp;&nbsp;LÄHETÄ&nbsp;&nbsp;\"></td>

</table>

</form>";}








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
</body>
</html>
<?php

get_footer();
