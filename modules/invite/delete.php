<?php
if (!defined('FLUX_ROOT')) exit;

$this->loginRequired();

$title = 'Invite Codes';

$bind        = array();

$sql  = "SELECT * FROM {$server->loginDatabase}.invite_codes";
$sth  = $server->connection->getStatement($sql);

$sth->execute($bind);
$codes = $sth->fetchAll();

if (count($_POST)) {
	$codeinput   = $_POST['inputval'];
	
    $arr = array($codeinput);

	$sql  = "SELECT code, usedBy FROM {$server->loginDatabase}.invite_codes WHERE code='?'";
	$sth  = $server->connection->getStatement($sql);
	
	$sth->execute($arr);
	$checkcode = $sth->fetch();
	
	if (!$checkcode) {
		$errorMessage = sprintf(Flux::message('InviteCodeErrorNotExists'));
	} 
    else if ($checkcode && $checkcode->usedBy != 0) {
        $errorMessage = sprintf(Flux::message('InviteCodeErrorBeenUsed'));
    }
	else if ($server->loginServer->delInviteCode($codeinput)) {
		$this->redirect($this->url('invite'));
	}
	else {
		$errorMessage = Flux::message('IpbanAddFailed');
	}
	
}

?>
