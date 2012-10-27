<?php 

      if( !$data = $orm->getByKey( 'WbfsysAddressItemType', 'mail' ) )
      {
        $data = new WbfsysAddressItemType_Entity();
        $data->access_key  = 'mail';
      }
    $data->upgrade( 'name', 'E-Mail' );
    $data->upgrade( 'icon', 'msg_protocol/mail.png' );
    $data->upgrade( 'description', 'E-Mail Item' );
    $data->upgrade( 'flag_msg_supported', 'true' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mail',
          'WbfsysAddressItemType',
          'Sucessfully created new WbfsysAddressItemType dataset key: mail'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mail',
            'WbfsysAddressItemType',
            'Sucessfully updated WbfsysAddressItemType dataset key: mail'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_address_item_type',
        'WbfsysAddressItemType',
        'Failed to sync WbfsysAddressItemType dataset key: mail '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysAddressItemType', 'message' ) )
      {
        $data = new WbfsysAddressItemType_Entity();
        $data->access_key  = 'message';
      }
    $data->upgrade( 'name', 'Message' );
    $data->upgrade( 'icon', 'msg_protocol/buiznode.png' );
    $data->upgrade( 'description', 'Message' );
    $data->upgrade( 'flag_msg_supported', 'true' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'message',
          'WbfsysAddressItemType',
          'Sucessfully created new WbfsysAddressItemType dataset key: message'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'message',
            'WbfsysAddressItemType',
            'Sucessfully updated WbfsysAddressItemType dataset key: message'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_address_item_type',
        'WbfsysAddressItemType',
        'Failed to sync WbfsysAddressItemType dataset key: message '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysAddressItemType', 'phone' ) )
      {
        $data = new WbfsysAddressItemType_Entity();
        $data->access_key  = 'phone';
      }
    $data->upgrade( 'name', 'Phone' );
    $data->upgrade( 'icon', 'msg_protocol/phone.png' );
    $data->upgrade( 'description', 'Phone' );
    $data->upgrade( 'flag_msg_supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'phone',
          'WbfsysAddressItemType',
          'Sucessfully created new WbfsysAddressItemType dataset key: phone'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'phone',
            'WbfsysAddressItemType',
            'Sucessfully updated WbfsysAddressItemType dataset key: phone'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_address_item_type',
        'WbfsysAddressItemType',
        'Failed to sync WbfsysAddressItemType dataset key: phone '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysAddressItemType', 'mobile' ) )
      {
        $data = new WbfsysAddressItemType_Entity();
        $data->access_key  = 'mobile';
      }
    $data->upgrade( 'name', 'Mobile' );
    $data->upgrade( 'icon', 'msg_protocol/mobile.png' );
    $data->upgrade( 'description', 'Mobile' );
    $data->upgrade( 'flag_msg_supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'mobile',
          'WbfsysAddressItemType',
          'Sucessfully created new WbfsysAddressItemType dataset key: mobile'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'mobile',
            'WbfsysAddressItemType',
            'Sucessfully updated WbfsysAddressItemType dataset key: mobile'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_address_item_type',
        'WbfsysAddressItemType',
        'Failed to sync WbfsysAddressItemType dataset key: mobile '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysAddressItemType', 'icq' ) )
      {
        $data = new WbfsysAddressItemType_Entity();
        $data->access_key  = 'icq';
      }
    $data->upgrade( 'name', 'ICQ' );
    $data->upgrade( 'icon', 'msg_protocol/icq.png' );
    $data->upgrade( 'description', 'ICQ' );
    $data->upgrade( 'flag_msg_supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'icq',
          'WbfsysAddressItemType',
          'Sucessfully created new WbfsysAddressItemType dataset key: icq'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'icq',
            'WbfsysAddressItemType',
            'Sucessfully updated WbfsysAddressItemType dataset key: icq'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_address_item_type',
        'WbfsysAddressItemType',
        'Failed to sync WbfsysAddressItemType dataset key: icq '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysAddressItemType', 'xmmp' ) )
      {
        $data = new WbfsysAddressItemType_Entity();
        $data->access_key  = 'xmmp';
      }
    $data->upgrade( 'name', 'Jabber / XMMP' );
    $data->upgrade( 'icon', 'msg_protocol/jabber.png' );
    $data->upgrade( 'description', 'Jabber / XMMP' );
    $data->upgrade( 'flag_msg_supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'xmmp',
          'WbfsysAddressItemType',
          'Sucessfully created new WbfsysAddressItemType dataset key: xmmp'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'xmmp',
            'WbfsysAddressItemType',
            'Sucessfully updated WbfsysAddressItemType dataset key: xmmp'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_address_item_type',
        'WbfsysAddressItemType',
        'Failed to sync WbfsysAddressItemType dataset key: xmmp '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysAddressItemType', 'google_xmmp' ) )
      {
        $data = new WbfsysAddressItemType_Entity();
        $data->access_key  = 'google_xmmp';
      }
    $data->upgrade( 'name', 'Google Talk' );
    $data->upgrade( 'icon', 'msg_protocol/google-talk.png' );
    $data->upgrade( 'description', 'Google Talk' );
    $data->upgrade( 'flag_msg_supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'google_xmmp',
          'WbfsysAddressItemType',
          'Sucessfully created new WbfsysAddressItemType dataset key: google_xmmp'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'google_xmmp',
            'WbfsysAddressItemType',
            'Sucessfully updated WbfsysAddressItemType dataset key: google_xmmp'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_address_item_type',
        'WbfsysAddressItemType',
        'Failed to sync WbfsysAddressItemType dataset key: google_xmmp '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysAddressItemType', 'google_plus' ) )
      {
        $data = new WbfsysAddressItemType_Entity();
        $data->access_key  = 'google_plus';
      }
    $data->upgrade( 'name', 'Google Plus' );
    $data->upgrade( 'icon', 'msg_protocol/google_plus.png' );
    $data->upgrade( 'description', 'Google Plus' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'google_plus',
          'WbfsysAddressItemType',
          'Sucessfully created new WbfsysAddressItemType dataset key: google_plus'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'google_plus',
            'WbfsysAddressItemType',
            'Sucessfully updated WbfsysAddressItemType dataset key: google_plus'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_address_item_type',
        'WbfsysAddressItemType',
        'Failed to sync WbfsysAddressItemType dataset key: google_plus '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysAddressItemType', 'skype' ) )
      {
        $data = new WbfsysAddressItemType_Entity();
        $data->access_key  = 'skype';
      }
    $data->upgrade( 'name', 'Skype' );
    $data->upgrade( 'icon', 'msg_protocol/skype.png' );
    $data->upgrade( 'description', 'Skype' );
    $data->upgrade( 'flag_msg_supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'skype',
          'WbfsysAddressItemType',
          'Sucessfully created new WbfsysAddressItemType dataset key: skype'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'skype',
            'WbfsysAddressItemType',
            'Sucessfully updated WbfsysAddressItemType dataset key: skype'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_address_item_type',
        'WbfsysAddressItemType',
        'Failed to sync WbfsysAddressItemType dataset key: skype '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysAddressItemType', 'msn' ) )
      {
        $data = new WbfsysAddressItemType_Entity();
        $data->access_key  = 'msn';
      }
    $data->upgrade( 'name', 'MSN' );
    $data->upgrade( 'icon', 'msg_protocol/msn.png' );
    $data->upgrade( 'description', 'MSN' );
    $data->upgrade( 'flag_msg_supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'msn',
          'WbfsysAddressItemType',
          'Sucessfully created new WbfsysAddressItemType dataset key: msn'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'msn',
            'WbfsysAddressItemType',
            'Sucessfully updated WbfsysAddressItemType dataset key: msn'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_address_item_type',
        'WbfsysAddressItemType',
        'Failed to sync WbfsysAddressItemType dataset key: msn '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysAddressItemType', 'sip' ) )
      {
        $data = new WbfsysAddressItemType_Entity();
        $data->access_key  = 'sip';
      }
    $data->upgrade( 'name', 'SIP' );
    $data->upgrade( 'icon', 'msg_protocol/sip.png' );
    $data->upgrade( 'description', 'SIP' );
    $data->upgrade( 'flag_msg_supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'sip',
          'WbfsysAddressItemType',
          'Sucessfully created new WbfsysAddressItemType dataset key: sip'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'sip',
            'WbfsysAddressItemType',
            'Sucessfully updated WbfsysAddressItemType dataset key: sip'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_address_item_type',
        'WbfsysAddressItemType',
        'Failed to sync WbfsysAddressItemType dataset key: sip '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysAddressItemType', 'twitter' ) )
      {
        $data = new WbfsysAddressItemType_Entity();
        $data->access_key  = 'twitter';
      }
    $data->upgrade( 'name', 'Twitter' );
    $data->upgrade( 'icon', 'msg_protocol/twitter.png' );
    $data->upgrade( 'description', 'Twitter' );
    $data->upgrade( 'flag_msg_supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'twitter',
          'WbfsysAddressItemType',
          'Sucessfully created new WbfsysAddressItemType dataset key: twitter'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'twitter',
            'WbfsysAddressItemType',
            'Sucessfully updated WbfsysAddressItemType dataset key: twitter'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_address_item_type',
        'WbfsysAddressItemType',
        'Failed to sync WbfsysAddressItemType dataset key: twitter '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysAddressItemType', 'facebook' ) )
      {
        $data = new WbfsysAddressItemType_Entity();
        $data->access_key  = 'facebook';
      }
    $data->upgrade( 'name', 'Facebook' );
    $data->upgrade( 'icon', 'msg_protocol/facebook.png' );
    $data->upgrade( 'description', 'Facebook' );
    $data->upgrade( 'flag_msg_supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'facebook',
          'WbfsysAddressItemType',
          'Sucessfully created new WbfsysAddressItemType dataset key: facebook'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'facebook',
            'WbfsysAddressItemType',
            'Sucessfully updated WbfsysAddressItemType dataset key: facebook'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_address_item_type',
        'WbfsysAddressItemType',
        'Failed to sync WbfsysAddressItemType dataset key: facebook '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysAddressItemType', 'git_hub' ) )
      {
        $data = new WbfsysAddressItemType_Entity();
        $data->access_key  = 'git_hub';
      }
    $data->upgrade( 'name', 'Git Hub' );
    $data->upgrade( 'icon', 'msg_protocol/github.png' );
    $data->upgrade( 'description', 'Git Hub' );
    $data->upgrade( 'flag_msg_supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'git_hub',
          'WbfsysAddressItemType',
          'Sucessfully created new WbfsysAddressItemType dataset key: git_hub'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'git_hub',
            'WbfsysAddressItemType',
            'Sucessfully updated WbfsysAddressItemType dataset key: git_hub'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_address_item_type',
        'WbfsysAddressItemType',
        'Failed to sync WbfsysAddressItemType dataset key: git_hub '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysAddressItemType', 'nick_name' ) )
      {
        $data = new WbfsysAddressItemType_Entity();
        $data->access_key  = 'nick_name';
      }
    $data->upgrade( 'name', 'Nickname' );
    $data->upgrade( 'icon', 'msg_protocol/nickname.png' );
    $data->upgrade( 'description', 'Nickname' );
    $data->upgrade( 'flag_msg_supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'nick_name',
          'WbfsysAddressItemType',
          'Sucessfully created new WbfsysAddressItemType dataset key: nick_name'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'nick_name',
            'WbfsysAddressItemType',
            'Sucessfully updated WbfsysAddressItemType dataset key: nick_name'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_address_item_type',
        'WbfsysAddressItemType',
        'Failed to sync WbfsysAddressItemType dataset key: nick_name '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysAddressItemType', 'else' ) )
      {
        $data = new WbfsysAddressItemType_Entity();
        $data->access_key  = 'else';
      }
    $data->upgrade( 'name', 'Else' );
    $data->upgrade( 'icon', 'msg_protocol/item.png' );
    $data->upgrade( 'description', 'Else' );
    $data->upgrade( 'flag_msg_supported', 'false' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'else',
          'WbfsysAddressItemType',
          'Sucessfully created new WbfsysAddressItemType dataset key: else'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'else',
            'WbfsysAddressItemType',
            'Sucessfully updated WbfsysAddressItemType dataset key: else'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_address_item_type',
        'WbfsysAddressItemType',
        'Failed to sync WbfsysAddressItemType dataset key: else '.$e->getMessage()
      ));
    }
