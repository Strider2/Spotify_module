<?php
$this->show('spotify/spotify_header.php');

echo 'Click On Playlist details for editing the playlist or viewing the name and playlist code.<hr />';

echo '<h4>Playlists</h4><hr />';
    if(!$spotify)
    {
     echo 'No playlists found';

    }
    else
    {

    foreach($spotify as $music)
    {
        echo '<p><iframe src="https://open.spotify.com/embed/playlist/'.$music->playlist.'"
         width="'.$music->width.'" height="'.$music->height.'"
         frameborder="'.$music->frameborder.'" allowtransparency="'.$music->allowtransparency.'" allow="encrypted-media"></iframe></p>';
         echo '<p><a href="'.SITE_URL.'/admin/index.php/Spotify_admin/get_spotify?id='.$music->id.'">Playlist Details</a></p>';
  }

    }

?>
