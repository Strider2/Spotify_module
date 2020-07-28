<?php


class Spotify_admin extends CodonModule
{
    public function HTMLHead()
    {
        $this->set('sidebar', 'spotify/sidebar_spotify.php');
    }

    public function NavBar()
    {
        echo '<li><a href="'.SITE_URL.'/admin/index.php/Spotify_admin">Spotify</a></li>';
    }

    public function index()
    {
        if($this->post->action == 'save_new_spotify')
        {
            $this->save_new_spotify();
        }
        elseif($this->post->action == 'save_edit_spotify')
        {
            $this->save_edit_spotify();
        }
        else
        {
            $this->set('spotify', SpotifyData::get_spotify());
			      $this->set('history', SpotifyData::get_past_spotify());
            $this->set('copyright', SpotifyData::getVersion());
            $this->show('spotify/spotify_index.php');
        }
    }
    public function get_spotify()
    {
        $id = $_GET[id];
        $this->set('spotify', SpotifyData::get_spotifys($id));
        $this->set('copyright', SpotifyData::getVersion());
        $this->show('spotify/spotifys_spotify.php');
    }
    public function new_spotify()
    {
        $spotify = SpotifyData::get_spotify();
        $this->set('copyright', SpotifyData::getVersion());
        $this->set('title', 'Add Playlist');
        $this->set('action', 'save_new_spotify');
        $this->set('spotify', $spotify);


        $this->render('spotify/spotify_new_form.php');
        /*$this->set('codeshares', $codeshares);
        $this->show('codeshare/codeshare_new_form.php');*/
    }
    protected function save_new_spotify()
    {
      $spotify = array();

      $spotify['name'] = DB::escape($this->post->name);
      $spotify['width'] = DB::escape($this->post->width);
      $spotify['height'] = DB::escape($this->post->height);
      $spotify['frameborder'] = DB::escape($this->post->frameborder);
      $spotify['allowtransparency'] = DB::escape($this->post->allowtransparency);
      $spotify['playlist'] = DB::escape($this->post->playlist);


      /*foreach($spotify as $test)
      {
          if(empty($test))
          {
              $this->set('spotify', $spotify);
              $this->show('spotify/spotify_new_form.php');
              return;
          }
      }*/


      # Add it in
      SpotifyData::save_new_spotify($spotify['name'], $spotify['width'],
                            $spotify['height'],
                            $spotify['frameborder'],
                            $spotify['allowtransparency'],
                            $spotify['playlist']);


      $this->set('message', 'The playlist "' . $this->post->name .'" has been added');
      $this->render('core_success.php');
      $this->set('spotify', SpotifyData::get_spotify());
      $this->show('spotify/spotify_index');
      LogData::addLog(Auth::$userinfo->pilotid, 'Added spotify playlist "' . $this->post->name . '"');
    }
    public function edit_spotify() {
            $id = $_GET[id];
            $spotify = array();
            $spotify = SpotifyData::get_spotifys($id);
            $this->set('copyright', SpotifyData::getVersion());
            $this->set('spotify', $spotify);
            $this->show('spotify/spotify_edit_form.php');
    }
    protected function save_edit_spotify()
    {
      $spotify = array();

      $spotify['name'] = DB::escape($this->post->name);
      $spotify['width'] = DB::escape($this->post->width);
      $spotify['height'] = DB::escape($this->post->height);
      $spotify['frameborder'] = DB::escape($this->post->frameborder);
      $spotify['allowtransparency'] = DB::escape($this->post->allowtransparency);
      $spotify['playlist'] = DB::escape($this->post->playlist);


        $ret=SpotifyData::save_edit_spotify($spotify['name'], $spotify['width'],
                              $spotify['height'],
                              $spotify['frameborder'],
                              $spotify['allowtransparency'],
                              $spotify['playlist']);

        if (DB::errno() != 0 && $ret == false) {
            $this->set('message',
                       'There was an error adding the spotify playlist,
                       already exists DB error: ' . DB::error());
            $this->render('core_error.php');
            return;
        }

        $this->set('message', 'The Spotify Playlist "' . $this->post->name .
                   '" has been added');
        $this->render('core_success.php');

        LogData::addLog(Auth::$userinfo->pilotid, 'Added spotify playlist "' . $this->post->name . '"');

        $id = $spotify['id'];
        $this->set('spotify', SpotifyData::get_spotifys($id));

        $this->show('spotify/spotifys_spotify.php');
    }

    public function delete_spotify()
    {
        $id = $_GET[id];
        SpotifyData::delete_spotify($id);

        $this->set('spotify', SpotifyData::get_upcoming_spotifys());
        $this->show('spotify/spotify_index.php');
    }
}
