<?php if (!defined('FLUX_ROOT')) exit; ?>
<h2>Codes</h2>
<?php if ($codes): ?>
    <table class="vertical-table">
	<tr>
		<th>Code</th>
		<th>Created By</th>
        <th>Used By</th>
		<th colspan="2">Expiration Time</th>
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
            <td><?php echo htmlspecialchars($code->expirationTime) ?></td>
		</tr>
	<?php endforeach ?>
</table>
<?php else: ?>
<p>No items found. <a href="javascript:history.go(-1)">Go back</a>.</p>
<?php endif ?>
