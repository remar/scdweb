<td width="150pt" valign="top" align="left">

<?php $pages = array('news' => 'Nyheter',
					 'pages/view/about' => 'Om SCD',
					 'ingredients' => 'Tillåten mat',
					 'recipies' => 'Recept',
					 'pages/view/tips' => 'Tips',
					 'pages/view/books' => 'Böcker',
					 'pages/view/links' => 'Länkar',
					 'pages/view/contact' => 'Kontakt'); ?>

<h1>SCD på svenska</h1>
<ul>
<?php foreach($pages as $href => $title): ?>
<li><a href="<?php echo site_url($href); ?>">
	<?php if($page === $href): ?>
	<strong>
	<?php endif; ?>
	<?php echo $title;?></a>
	<?php if($page === $href): ?>
	</strong>
	<?php endif; ?>
	<?php endforeach; ?>
</ul>

<?php if(!isset($logged_in) || !$logged_in): ?>
<form name="login" action="<?php echo site_url("login"); ?>" method="post">
Email<br/>
<input type="text" name="username" />
Lösenord<br/>
<input type="password" name="password" />
<input type="submit" value="Logga in" />
</form>
<?php if(isset($login_failed) && $login_failed): ?>
Inloggning misslyckades!
<?php endif; ?>
<?php else: ?>
<strong>Inloggad som</strong><br/>
<?php echo $user->username; ?><br/>
<a href="<?php echo site_url("logout"); ?>">Logga ut</a>
<?php endif; ?>
</td>
