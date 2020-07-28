<?php


$this->show('spotify/spotify_header.php');

?>


<h4>Edit Spotify Playlist</h4>
<hr />
<form name="eventform" action="<?php echo SITE_URL; ?>/admin/index.php/Spotify_admin" method="post" >
<table width="80%">

            <tr>
                <td>Name</td>
                <td>
                  <input type="text" name="name"
                  <?php echo 'value="'$spotify->name.'"';?>/></td>

            </tr>
            <tr>
                <td>Width</td>
                <td><input type="text"  name="width"
                           <?php echo 'value="'.$spotify->width.'"'; ?>
                           /></td>
            </tr>
            <tr>
                <td>Height</td>
                <td><input type="text" name="height"
                            <?php

                                  echo 'value="'.$spotify->height.'"';
                                ?>/></td>
                              </tr>
            <tr>
                <td>Frameborder</td>
                <td><input type="text" name="frameborder"
                           <?php echo 'value="'.$spotify->frameborder.'"'; ?>
                          /></td>
            </tr>
            <tr>
                <td>Allowtransparency</td>
                <td><input type="text" name="trans"
                  <?php

                      echo 'value="'.$spotify->trans.'"';

                   ?>/>
            </tr>
            <tr>
                <td>Playlist Code</td>
                <td><input type="text" name="playlist"
                      <?php
                        echo 'value="'.$spotify->playlist.'"';


                       ?>/>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="hidden" name="id" value="<?php echo $spotify->id; ?>" />
                    <input type="hidden" name="action" value="save_edit_spotify" />
                    <input type="submit" value="Edit Playlist"></td>
            </tr>

    </table>     </form>
    
