<?php
if (!defined('FLUX_ROOT')) exit;

$this->loginRequired();

$title = 'Invite Codes';

$bind        = array();

$sql  = "SELECT * FROM {$server->loginDatabase}.invite_codes";
$sth  = $server->connection->getStatement($sql);

$sth->execute($bind);
$codes = $sth->fetchAll();
?>
