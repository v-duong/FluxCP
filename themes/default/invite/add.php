<?php if (!defined('FLUX_ROOT')) exit; ?>
<h2>Create Code</h2>
<?php if (!empty($errorMessage)): ?>
	<p class="red"><?php echo htmlspecialchars($errorMessage) ?></p>
<?php endif ?>
<?php if (!empty($infoMessage)): ?>
	<p class="blue"><?php echo htmlspecialchars($infoMessage) ?></p>
<?php endif ?>
<form action="<?php echo $this->urlWithQs ?>" method="post" class="generic-form">
	<table class="generic-form-table">
		<tr>
			<th><label for="codeinput"><?php echo htmlspecialchars(Flux::message('InviteCodeLabel')) ?></label></th>
			<td><input type="text" name="codeinput" id="codeinput" value="<?php echo htmlspecialchars($params->get('codeinput')) ?>" /></td>
		</tr>
        <tr>
			<th><label for="expiretoggle"><?php echo htmlspecialchars(Flux::message('InviteCodeHasTimeLabel')) ?></label></th>
			<td><input type="checkbox" name="expiretoggle" id="expiretoggle" value="<?php $params->get('expiretoggle') ?>" /></td>
		</tr>
		<tr>
			<th><label><?php echo htmlspecialchars(Flux::message('InviteCodeTimeLabel')) ?></label></th>
			<td><?php echo $this->dateTimeField('rtime', ($rtime=$params->get('rtime')) ? $rtime : null) ?></td>
			<td></td>
		</tr>
		<tr>
			<td></td>
			<td colspan="2"><input type="submit" value="<?php echo htmlspecialchars(Flux::message('InviteCodeCreateLabel')) ?>" /></td>
		</tr>
	</table>
</form>
