<?php

class SpotifyData extends CodonData
{
    public static function get_spotify()
    {
		return DB::get_results("SELECT * FROM ".TABLE_PREFIX."spotify WHERE id = 1");

    }
 	public static function get_upcoming_spotify()
    {
        $query = "SELECT * FROM ".TABLE_PREFIX."spotify
                ORDER BY id ASC";

        return DB::get_results($query);
    }
    public static function get_spotifys($id)
    {
        $query = "SELECT * FROM ".TABLE_PREFIX."spotify WHERE id='$id'";

        return DB::get_row($query);
    }

   public static function get_past_spotify()
    {
        $query = "SELECT * FROM ".TABLE_PREFIX."spotify
                ORDER BY id DESC";

        return DB::get_results($query);
    }

    public static function save_new_spotify($name, $width, $height, $frameborder, $allowtransparency, $playlist)
    {
      $query = "INSERT IGNORE INTO ".TABLE_PREFIX."spotify (name, width, height, frameborder, allowtransparency, playlist)
              VALUES ('$name', '$width', '$height', '$frameborder', '$allowtransparency', '$playlist')";

      DB::query($query);
    }
     public static function save_edit_spotify($name, $width, $height, $frameboarder, $trans, $playlist)
    {
        $query = "UPDATE ".TABLE_PREFIX."spotify SET
         name='$name',
         width='$width',
         height='$height',
         frameborder='$frameboarder',
         allowtransparency='$allowtransparency',
         playlist='$playlist'
         WHERE id='$id'";

        DB::query($query);
    }
    public static function delete_spotify($id)
    {
        $query = "DELETE FROM ".TABLE_PREFIX."spotify
                    WHERE id='$id'";

        DB::query($query);
    }
       /////////////////////////////////
       // Do not remove this code!   //
       ///////////////////////////////
       public static function getVersion()
       {

        return DB::get_results("SELECT * FROM ".TABLE_PREFIX."strider WHERE id = 2");
       }
}
