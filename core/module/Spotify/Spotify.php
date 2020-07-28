<?php

class Spotify extends CodonModule
{
	public function index()
	{
		$this->set('copyright', SpotifyData::getVersion());
		$this->set('spotify', SpotifyData::get_spotify());
		$this->render('spotify/Spotify.php');
	}
	public function copyright()
	{
		$this->set('copyright', SpotifyData::getVersion());
		$this->render('spotify/footer.php');
	}
}
