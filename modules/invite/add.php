<?php
if (!defined('FLUX_ROOT')) exit;

$this->loginRequired();

$title = 'Invite Codes';

if (count($_POST)) {	
	$codeinput   = trim($params->get('codeinput'));
	$expiretoggle = trim($params->get('expiretoggle'));
	$rtime  = trim($params->get('rtime_date'));
	
	if (!$codeinput) {
		$errorMessage = Flux::message('InviteCodeErrorEnterCode');
	}
    elseif (strlen($codeinput) < 6){
        $errorMessage = Flux::message('InviteCodeErrorLength');
    }
    elseif (!preg_match('/^([A-Za-z0-9])+$/', $codeinput)) {
		$errorMessage = Flux::message('InviteCodeErrorCharacter');
	}
	elseif ($expiretoggle && strtotime($rtime) <= time()) {
		$errorMessage = Flux::message('InviteCodeFutureDate');
	}
	else {
        $arr = array($codeinput);

		$sql  = "SELECT code FROM {$server->loginDatabase}.invite_codes WHERE code='?'";
		$sth  = $server->connection->getStatement($sql);
		
		$sth->execute($arr);
		$checkcode = $sth->fetch();
		
		if ($checkcode) {
			$errorMessage = sprintf(Flux::message('InviteCodeErrorExists'), $checkcode->list);
		}
		else if ($server->loginServer->addInviteCode($codeinput, $session->account->account_id, $rtime)) {
			$this->redirect($this->url('invite'));
		}
		else {
			$errorMessage = Flux::message('IpbanAddFailed');
		}
	}
}
?>