<?php if (!defined('FLUX_ROOT')) exit; ?>
<h2>Codes</h2>
<?php if (!empty($errorMessage)): ?>
	<p class="red"><?php echo htmlspecialchars($errorMessage) ?></p>
<?php endif ?>
<?php if (!empty($infoMessage)): ?>
	<p class="blue"><?php echo htmlspecialchars($infoMessage) ?></p>
<?php endif ?>
<?php if ($codes): ?>
    <form action="<?php echo $this->urlWithQs ?>" method="post" class="generic-form">
    <table class="vertical-table">
	<tr>
		<th>Code</th>
		<th>Created By</th>
        <th>Used By</th>
		<th colspan="2">Expiration Time</th>
        <th>Delete</th>
	</tr>
	<?php foreach ($codes as $code): ?>
		<tr>
			<td><?php echo htmlspecialchars($code->code) ?></td>
            <td>
            <?php if ($auth->actionAllowed('account', 'view') && $auth->allowedToViewAccount): ?>
				<?php echo $this->linkToAccount($code->createdBy, $code->createdBy) ?>
			<?php else: ?>
				<?php echo htmlspecialchars($code->createdBy) ?>
			<?php endif ?>
            </td>
            <td><?php echo htmlspecialchars($code->usedBy ? $code->usedBy : "Unused") ?></td>
            <td colspan="2"> <?php echo htmlspecialchars($code->expirationTime) ?></td>
            <td><input type="submit" name="inputval" value="<?php echo htmlspecialchars($code->code) ?>" /></td>
		</tr>
	<?php endforeach ?>
</table>
</form>

<?php else: ?>
<p>No items found. <a href="javascript:history.go(-1)">Go back</a>.</p>
<?php endif ?>
