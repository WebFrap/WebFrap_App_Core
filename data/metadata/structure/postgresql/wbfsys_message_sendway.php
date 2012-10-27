<?php 
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: wbfsys_message_sendway
//////////////////////////////////////////////////////////////////////////////*/

    // first attributes and indices
    $cols      = array();
    $indices   = array();
    $sequences = array();


    $cols['id_message']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_message',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $indices['wbfsys_message_sendway_id_message_fk_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_message',
      LibDbAdmin::INDEX_TYPE      => 'btree',
    );

    $cols['id_repository']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_repository',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $indices['wbfsys_message_sendway_id_repository_fk_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_repository',
      LibDbAdmin::INDEX_TYPE      => 'btree',
    );

    $cols['rowid']  = array
    (
      LibDbAdmin::COL_NAME        => 'rowid',
      LibDbAdmin::COL_DEFAULT     => 'nextval(\'entity_oid_seq\'::regclass)',
      LibDbAdmin::COL_NULL_ABLE   => 'NO',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $cols['m_time_created']  = array
    (
      LibDbAdmin::COL_NAME        => 'm_time_created',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'timestamp',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '',
      LibDbAdmin::COL_SCALE       => '',
    );

    $cols['m_role_create']  = array
    (
      LibDbAdmin::COL_NAME        => 'm_role_create',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $indices['wbfsys_message_sendway_m_role_create_fk_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'm_role_create',
      LibDbAdmin::INDEX_TYPE      => 'btree',
    );

    $cols['m_time_changed']  = array
    (
      LibDbAdmin::COL_NAME        => 'm_time_changed',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'timestamp',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '',
      LibDbAdmin::COL_SCALE       => '',
    );

    $cols['m_role_change']  = array
    (
      LibDbAdmin::COL_NAME        => 'm_role_change',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $indices['wbfsys_message_sendway_m_role_change_fk_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'm_role_change',
      LibDbAdmin::INDEX_TYPE      => 'btree',
    );

    $cols['m_version']  = array
    (
      LibDbAdmin::COL_NAME        => 'm_version',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int4',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '32',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $cols['m_uuid']  = array
    (
      LibDbAdmin::COL_NAME        => 'm_uuid',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'uuid',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '',
      LibDbAdmin::COL_SCALE       => '',
    );


    foreach( $sequences as $sequence )
    {
      if( !$dbAdmin->sequenceExists( $sequence['name'] ) )
      {
        try
        {
          $dbAdmin->createSequence( $sequence['name'] );
        }
        catch( Exception $e )
        {
          $this->getResponse()->addError( $e->getMessage() );
        }
      }
    }

    if( $dbAdmin->tableExists( 'wbfsys_message_sendway' )  )
    {

      $tmp = $dbAdmin->getTableColumns( 'wbfsys_message_sendway' );
      $existingCols = array();
      foreach( $tmp as $tmpCol )
      {
        $existingCols[$tmpCol[LibDbAdmin::COL_NAME]] = $tmpCol[LibDbAdmin::COL_NAME];
      }

      foreach( $cols as $colName => $col )
      {

        if( $dbAdmin->columnExists( $colName, 'wbfsys_message_sendway' ) )
        {
          if( $diff = $dbAdmin->diffColumn( $colName, $col, 'wbfsys_message_sendway' ) )
          {
            
            if( $this->syncCol )
            {
              try
              {
                $dbAdmin->alterColumn( $colName, $col, $diff, 'wbfsys_message_sendway' );
                $this->getResponse()->addMessage
                ( 
                  'Column: '.$colName.' in Table wbfsys_message_sendway was successfully synced. '.$dbAdmin->reportDiffColumn( $colName, $col, 'wbfsys_message_sendway' ) 
                );
              }
              catch( LibDb_Exception $e )
              {
                
                try
                {
                  if( $this->forceColSync )
                  {
                    $this->getResponse()->addWarning
                    ( 
                      "The column {$colName} in Table wbfsys_message_sendway was not compatible, so i had to drop and recreate it. "
                        .$dbAdmin->reportDiffColumn( $colName, $col, 'wbfsys_message_sendway' )  
                    );
                    $dbAdmin->renameColumn( $colName,  $colName.'_incsync_'.date('Ymd'), 'wbfsys_message_sendway' );
                    $dbAdmin->createAttributeColumn( 'wbfsys_message_sendway', $col, false );
                  }
                  else
                  {
                    $this->getResponse()->addError
                    ( 
                      "The column {$colName} in Table wbfsys_message_sendway was not compatible to sync. "
                        .$dbAdmin->reportDiffColumn( $colName, $col, 'wbfsys_message_sendway' ).' '.$e->getMessage()  
                    );
                  }
                }
                catch( LibDb_Exception $e )
                {
                  $this->getResponse()->addError
                  ( 
                    "Failed to sync column {$colName} in Table wbfsys_message_sendway ".$e->getMessage()
                  );
                }
                
              }
            }
            else
            {
              $this->getResponse()->addError
              ( 
                "The column {$colName} in Table wbfsys_message_sendway is out of sync! "
                  .$dbAdmin->reportDiffColumn( $colName, $col, 'wbfsys_message_sendway' )  
              );
            }
          }
        }
        else  // colum not exists
        {
          $dbAdmin->addColumn( $colName, $col, 'wbfsys_message_sendway' );
          $this->getResponse()->addMessage( 'Added Missing Column: '.$colName.' in Table wbfsys_message_sendway' );
        }

        unset( $existingCols[$col[LibDbAdmin::COL_NAME]] );

      }

      // drop old data
      foreach( $existingCols as $colName )
      {
        
        try
        {
          if( $this->syncCol )
          {
            $this->getResponse()->addMessage( 'Removed column: '.$colName.' from Table wbfsys_message_sendway cause it was not in the model' );
            $dbAdmin->dropColumn($colName , 'wbfsys_message_sendway' );
          }
          else
          {
            $this->getResponse()->addError( "The column {$colName} in Table wbfsys_message_sendway not exists in the Model!"  );
          }
        }
        catch( LibDb_Exception $e )
        {
          $this->getResponse()->addError( "Failed to delete column {$colName} in Table wbfsys_message_sendway ".$e->getMessage() );
        }
        
      }

    }
    else
    {
      try
      {
        $dbAdmin->createTable( 'wbfsys_message_sendway', $cols  );
        $this->getResponse()->addMessage( 'Created Missing Table wbfsys_message_sendway' );
      }
      catch( LibDb_Exception $e )
      {
        $this->getResponse()->addError( "Failed to create table Table wbfsys_message_sendway ".$e->getMessage() );
      }
      
    }

    unset( $allTables['wbfsys_message_sendway'] );
