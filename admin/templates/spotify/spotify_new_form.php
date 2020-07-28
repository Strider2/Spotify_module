<?php

$this->show('spotify/spotify_header.php');
if(isset($spotify))
{echo '<div id="error">All fields must be filled out</div>'; }
?>

<h4>Spotify Playlist</h4>
<span style="color:red;">Note: All fields must be filled in.</span>
<table width="80%">
  <form name="eventform" action="<?php echo SITE_URL; ?>/admin/index.php/Spotify_admin" method="post">
  <table width="100%" class="tablesorter">
  <tr>
    <td valign="top"><strong>Name: </strong></td>
    <td>
      <input type="text" name="name"
      <?php
      if(isset($event))
      {
        echo 'value="'.$event['name'].'"';
      } ?>/>
    </td>
  </tr>
  <tr>
    <td><strong>width:</strong></td>
    <td>
      <input type="text" name="width"
      <?php
      if(isset($event))
      {
          echo 'value="'.$event['width'].'"';
      }
       ?>/>
       <p><span style="color:red;">Default 300.</span></p>

    </td>
  </tr>
  <tr>
    <td width="3%" nowrap><strong>Height:</strong></td>
    <td><input  name="height"
        <?php
        if(isset($event))
        {
          echo 'value="'.$event['height'].'"';
        }
        ?>/>
        <p><span style="color:red;">Default 380.</span></p>
    </td>
  </tr>
  <tr>
    <td><strong>Frameborder:</strong></td>
    <td><input name="frameborder"
      <?php
        if(isset($event))
        {
          echo 'value="'.$event['frameborder'].'"';
        }
       ?>/>
       <p><span style="color:red;">Default 0.</span></p>
    </td>
  </tr>
  <tr>
    <td valign="top"><strong>Allowtransparency:</strong> </td>
    <td><input type="text" name="allowtransparency"
      <?php
        if(isset($event))
        {
          echo 'value="'.$event['allowtransparency'].'"';
        }

       ?>/>
       <p><span style="color:red;">Default True.</span></p>
    </td>
  </tr>
  <tr>
    <td valign="top"><strong>Playlist code:</strong> </td>
    <td><input type="text" name="playlist"
        <?php
          if(isset($event))
          {
            echo 'value="'.$event['playlist'].'"';
          }
        ?>/><br />


      <p><span style="color:red;">Please enter the code like: 7rM9A6g9k1aVJGk3Gv4BKI.</span> </p>
    </td>
  </tr>


  <tr>
    <td></td>
    <td><input type="hidden" name="action" value="<?php echo $action;?>" />
      <input type="hidden" name="id" value="<?php echo $spotify->id;?>" />
      <input type="submit" name="submit" value="<?php echo $title;?>" />
    </td>
  </tr>
  </table>
  </form>
  </div>
