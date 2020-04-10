<?php

if(!function_exists('flash')){

	function flash($message, $type='success'){

		session()->flash('notif.message', $message);
		session()->flash('notif.type', $type);
	}
}