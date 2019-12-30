<?php
namespace App\Gates;
use Illuminate\Auth\Access\Response;

class PostGate{
	public function allowed($user,$posts){
	  $roles = $user->role->pluck('name')->toArray();	
      return $user->id === $posts || in_array('Admin',$roles);
	}

	public function allowedPostEdit($user,$posts){
		$roles = $user->role->pluck('name')->toArray();
		return $user->id === $posts || in_array('Admin',$roles) ? Response::allow() : Response::deny('You are not authorized to edit the post');
	}
}

?>