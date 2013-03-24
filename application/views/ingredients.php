<td valign="top" align="left">

<h2>Tillåten mat</h2>

[Lista alfabetiskt] | [<a href="ingrkategori.php">Lista efter kategori</a>]

<p>Detta är den tillåtna maten i SCD. Värt att notera är att alla
sorters gryner (vete, råg, korn, havre, majs, ris), socker, och en del
rotfrukter är <em>strikt</em> förbjudna. Detta medför att de flesta
halv- och helfabrikat du hittar i butiken inte är tillåtna när du
följer SCD.</p>
<p>Listan på tillåten mat är hämtad från <a
href="http://www.breakingtheviciouscycle.info/legal/legal_illegal_a-c.htm">
den officiella sidan</a>. Om du hittar någon skillnad (mat som står
som tillåten här men inte på den officiella sidan), <a
href="<?php echo site_url("pages/view/contact"); ?>">kontakta mig</a> genast. Om du saknar någon
tillåten mat så får du också gärna <a href="<?php echo site_url("pages/view/contact"); ?>">kontakta
mig</a>.</p>
<?php if($can_add_ingredient): ?>
<h3>Lägg till ingrediens</h3>
<form action="<?php echo site_url("ingredients/add");?>" method="post">
Ingrediens <input id="ingredient_textbox" name="ingredient" type="text" />
Kommentar <input name="comment" type="text" />
<input type="submit" value="Lägg till"/>
</form>

<h3>Lägg till ingredienskategori</h3>
<form action="<?php echo site_url("ingredients/add_category"); ?>" method="post">
Kategori <input id="category_textbox" name="category" type="text" />
<input type="submit" value="Lägg till"/>
</form>
<?php endif; ?>

<table>
<?php foreach($ingredients_grouped_by_initial as $initial => $ingredients): ?>
<tr><td class="heading"><?php echo $initial; ?></td><td></td></tr>
<?php foreach($ingredients as $ingredient): ?>
<tr><td><a href="<?php echo site_url("ingredients/edit_ingredient/" . $ingredient['id']); ?>"><?php echo $ingredient['name']; ?></a></td><td><?php echo $ingredient['comment']; ?></td></tr>
<?php endforeach; ?>
<?php endforeach; ?>
</table>

</td>

<script>
window.onload = function () {
	document.getElementById("ingredient_textbox").focus();
}
</script>
