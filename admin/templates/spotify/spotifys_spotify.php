<?php

$this->show('spotify/spotify_header.php');



echo '<h4>spotify Playlist name: '.$spotify->name.'</h4><hr />';

echo 'Playlist code: <b>'.$spotify->playlist.'</b><br />';

echo '</b><hr />';
echo '<a href="'.SITE_URL.'/admin/index.php/Spotify_admin/edit_spotify?id='.$spotify->id.'"><b>Edit playlist</b></a><br /><hr />';
echo '<a href="'.SITE_URL.'/admin/index.php/Spotify_admin/delete_spotify?id='.$spotify->id.'"><span style="color:red;"><b>Delete Playlist</b></a> - This will delete the Spotify Playlist from the datbase permanently!</span><br /><hr />';
?>
