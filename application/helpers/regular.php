<?php
function is_online(){
	## Als de sessie gevuld is
	if($this->session->userdata('user_id') != 0){
		## User is ingelogd
		return true;
	}else{
		## User is niet ingelogd
		return false;
	}
}