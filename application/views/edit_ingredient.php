<td valign="top" align="left">

<h2>Modifiera ingrediens</h2>

<form action="<?php echo site_url("ingredients/edit_ingredient"); ?>" method="post">
Namn <input id="ingredient_textbox" name="ingredient" value="<?php echo $ingredient['name']; ?>"/><br/>
Kommentar <input name="comment" value="<?php $ingredient['comment']; ?>" /><br/>
<input type="hidden" name="ingredient_id" value="<?php echo $ingredient['id']; ?>" />
<input type="submit" value="Modifiera"/>
</form>

</td>
