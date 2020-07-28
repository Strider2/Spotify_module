
<h3>Spotify Playlists</h3>



<?php
if(!$spotify)
    {
    	echo '<span style="color:red;">You have not added any spotify playlists.</span>';
    }
    else {?>



	<?php

    foreach($spotify as $music){


        ?>
        <iframe src="https://open.spotify.com/embed/playlist/<?php echo $music->playlist;?>"
          width="<?php echo $music->width;?>" height="<?php echo $music->height;?>"
          frameborder="<?php echo $music->frameborder;?>" allowtransparency="<?php echo $music->allowtransparency;?>" allow="encrypted-media"></iframe>
<?php
}
}
?>
<hr />
<?php
if(!$copyright){
echo '<span style="color:red;">Please put the strider table in your database as this is required.</span>';

}

else{
  foreach($copyright as $copy){
echo $copy->copyright .' '.date("Y").' '.$copy->name.' '.$copy->module.' '.$copy->version.'.';
}
}
 ?>
