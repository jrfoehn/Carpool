<?php
function saveImage($pseudo){
	$destinationPath = 'images'; // upload path
	$extension = Input::file('photo')->getClientOriginalExtension(); // getting image extension
	$filename = $pseudo.'.'.$extension;
	Input::file('photo')->move($destinationPath, $filename);
	
	return $filename;
}
?>