<?php
/**
 * Template Name: Ajankohtaista
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


get_header();

?>

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
<head>
<meta charset="UTF-8">
</head>
<body>
<table class="entry-content1"><tr><td>
<h1 class="ajankohtaista">AJANKOHTAISTA</h1></td></table><br>
<?php

//sisällytetään yhteystidot
include 'yhteys.php';





$sql = mysqli_query($yhteys,"SELECT * FROM koulutus WHERE ilmoittautuminen >= CURTIME()");
while($tulos = mysqli_fetch_array($sql))
{
	
	
	echo "<table class=\"entry-content1\">
	
	<tr><td>" . $tulos['koulutuksennimi'] . "</td>
	<td style=\"width:100px\" align=\"left\">" . date("d.m.Y", strtotime($tulos['aloitusaika'])) . "       </td>
	
	<form id=\"form1\" action=\"http://localhost/wordpress/?page_id=23\" method=\"POST\">
	<input type=\"hidden\" name=\"var2\" value=" . $tulos['koulutusid']. ">
	<input type=\"hidden\" name=\"var\" value=" . $tulos['koulutuksennimi']. ">
	<td style=\"width:100px\" align=\"right\"><input type=\"submit\" value=\"Tiedot\"></td>
		
	</form>
	
	
	<form id=\"form2\" action=\"http://localhost/wordpress/?page_id=18\" method=\"POST\">
	<input type=\"hidden\" name=\"var2\" value=" . $tulos['koulutusid']. ">
	<input type=\"hidden\" name=\"var\" value=" . $tulos['koulutuksennimi']. ">
	<input type=\"hidden\" name=\"aloitusaika\" value=" . $tulos['aloitusaika']. ">
	<input type=\"hidden\" name=\"aloitusaikaklo\" value=" . $tulos['aloitusaikaklo']. ">
	<input type=\"hidden\" name=\"lopetusaika\" value=" . $tulos['lopetusaika']. ">
	<input type=\"hidden\" name=\"lopetusaikaklo\" value=" . $tulos['lopetusaikaklo']. ">
	<td style=\"width:85px\" align=\"right\"><input type=\"submit\" value=\"Ilmoittaudu\"></td>
	
	</form>
	
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
