<?php 

      if( !$data = $orm->getByKey( 'WbfsysUserSettingType', 'wallpaper' ) )
      {
        $data = new WbfsysUserSettingType_Entity();
        $data->access_key  = 'wallpaper';
      }
    $data->upgrade( 'description', 'Wallpaper for the Userdesktop' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'wallpaper',
          'WbfsysUserSettingType',
          'Sucessfully created new WbfsysUserSettingType dataset key: wallpaper'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'wallpaper',
            'WbfsysUserSettingType',
            'Sucessfully updated WbfsysUserSettingType dataset key: wallpaper'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_user_setting_type',
        'WbfsysUserSettingType',
        'Failed to sync WbfsysUserSettingType dataset key: wallpaper '.$e->getMessage()
      ));
    }
