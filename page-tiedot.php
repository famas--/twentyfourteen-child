<?php
/**
 * Template Name: Tiedot
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
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-kr">

</head>
<body>
<table class="entry-content1"><tr><td>
<h1 class="ajankohtaista">KOULUTUKSEN TIEDOT</h1></td></table><br>
<?php

//sis채llytet채채n yhteystidot
include 'yhteys.php';



// tallennetaan postatut tiedot variableihin
$id = $_POST['var2'];

$sql = mysqli_query($yhteys,"SELECT * FROM koulutus WHERE koulutusid = $id");
	while($tieto = mysqli_fetch_array ($sql)){
		
		echo "<table class=\"entry-content1\"><tr>
		
		
		
		<form id=\"form2\" action=\"http://www.nihakseutu.com/wordpress/?page_id=18\" method=\"POST\">
		<input type=\"hidden\" name=\"var2\" value=" . $tieto['koulutusid']. ">
		<input type=\"hidden\" name=\"var\" value=" . $tieto['koulutuksennimi']. ">
		<input type=\"hidden\" name=\"aloitusaika\" value=" . $tieto['aloitusaika']. ">
		<input type=\"hidden\" name=\"aloitusaikaklo\" value=" . $tieto['aloitusaikaklo']. ">
		<input type=\"hidden\" name=\"lopetusaika\" value=" . $tieto['lopetusaika']. ">
		<input type=\"hidden\" name=\"lopetusaikaklo\" value=" . $tieto['lopetusaikaklo']. ">
		<td><input type=\"submit\" value=\"Ilmoittaudu\"></td><tr>
		
		</form>
		</table>
		
		
		<table class=\"entry-content1\"><tr>
		<td class=\"tuomastd1\"><h1>" . $tieto['koulutuksennimi'] . "</h1></td>
		</table>
		
		<table class=\"entry-content1\"><tr>
		
		
		
		
		<td>Paikka</td><td class=\"tuomastd2\">" . $tieto['paikka'] . "</td></tr>
		
		<td>Alkaa</td><td class=\"tuomastd2\">" . date("d.m.Y", strtotime($tieto['aloitusaika'])) . "&nbsp;&nbsp;&nbsp;klo:&nbsp;&nbsp;" . substr($tieto['aloitusaikaklo'], 0, 5) . "</td></tr>
		
		<td>Loppuu</td><td class=\"tuomastd2\">" . date("d.m.Y", strtotime($tieto['lopetusaika'])) . "&nbsp;&nbsp;&nbsp;klo:&nbsp;&nbsp;" . substr($tieto['lopetusaikaklo'], 0, 5) . "</td></tr>
		
		
		
		<td>Ilmoittautuminen päättyy</td><td class=\"tuomastd2\">" . date("d.m.Y", strtotime($tieto['ilmoittautuminen'])) . "&nbsp;&nbsp;&nbsp;klo:&nbsp;&nbsp;" . substr($tieto['ilmoittautuminenklo'], 0, 5) . "</td></tr>
		
		
		
		<td>Ryhmän koko</td><td class=\"tuomastd2\">" . $tieto['ryhmankoko'] . "</td></tr>
		<td>Toteuttaja</td><td class=\"tuomastd2\">" . $tieto['toteuttaja'] . "</td></tr>
		<td>Yhteyshenkilön sähköpostiosoite</td><td class=\"tuomastd2\">" . $tieto['email'] . "</td></tr>
		<td>Yhteyshenkilön puhelinnumero</td><td class=\"tuomastd2\">" . $tieto['puh'] . "</td></tr>
		<td>Koulutuksen kesto</td><td class=\"tuomastd2\">" . $tieto['kesto'] . "</td></tr>
		<td>Hinta</td><td class=\"tuomastd2\">" . $tieto['hinta'] . "</td></tr>
		<td>Kuvaus</td><td class=\"tuomastd2\">" . $tieto['kuvaus'] . "</td></tr>
		
		</table>"; 
		
		
	}



// suljetaan yhteys
mysqli_close($yhteys);
?>





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
</body>
</html>
<?php

get_footer();