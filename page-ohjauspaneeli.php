<?php
/**
 * Template Name: Ohjauspaneeli
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


//sisällytetään yhteystidot
include 'yhteys.php';



echo "<table width=\"820px\">
<tr>
<td valign=\"top\"><h1>ICT- hanke ohjauspaneeli</h1></td><td><form id=\"form0\" action=\"koulutus3.php\" method=\"POST\">
	<td  align=\"right\" valign=\"top\"><input type=\"submit\" value=\"LIS&Auml&Auml UUSI KOULUTUS\">
	</form><form id=\"form0\" action=\"palautteet_yhteenveto4.php\" method=\"POST\">
	<td  align=\"right\" valign=\"top\"><input type=\"submit\" value=\"KAIKKI PALAUTTEET\">
	</form></td>
</table>";









$sql = mysqli_query($yhteys,"SELECT * FROM koulutus");
while($tulos = mysqli_fetch_array($sql))
{
	
	
	echo 
	
	"<table width=\"820px\">
	
	
	<tr><td>" . $tulos['koulutuksennimi'] . "</td>
	
	<form id=\"form1\" action=\"muokkaa_tiedot.php\" method=\"POST\">
	<input type=\"hidden\" name=\"var2\" value=" . $tulos['koulutusid']. ">
	<input type=\"hidden\" name=\"var\" value=" . $tulos['koulutuksennimi']. ">
	<td style=\"width:85px\" align=\"right\"><input type=\"submit\" value=\"Muokkaa\"></td>
		
	</form>
	
	
	
	
	<form id=\"form3\" action=\"ilmoittautuneet.php\" method=\"POST\">
	<input type=\"hidden\" name=\"var2\" value=" . $tulos['koulutusid']. ">
	
	<td style=\"width:85px\" align=\"right\"><input type=\"submit\" value=\"Ilmoittautuneet\"></td>
	
	</form>
	
	<form id=\"form3\" action=\"osallistujalista.php\" method=\"POST\">
	<input type=\"hidden\" name=\"var2\" value=" . $tulos['koulutusid']. ">
	
	<td style=\"width:85px\" align=\"right\"><input type=\"submit\" value=\"Osallistujalista\"></td>
	
	</form>
	
	<form id=\"form3\" action=\"koulutuksenpalautteet.php\" method=\"POST\">
	<input type=\"hidden\" name=\"var2\" value=" . $tulos['koulutusid']. ">
	<td style=\"width:100px\" align=\"right\"><input type=\"submit\" value=\"Palautteet\">=></td>
	
	</form>
	
	
	<form id=\"form4\" action=\"palaute_vaihto.php\" method=\"POST\">
	<input type=\"hidden\" name=\"var2\" value=" . $tulos['koulutusid']. ">
	
	<td style=\"width:85px\" align=\"right\"><input type=\"submit\" name=\"var3\" value="
	
	. $tulos['palaute'].
	
	"></td></tr>
	
	</form>
	
	</table>";
	
}




?>  