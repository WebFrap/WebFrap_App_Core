<?php 
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: wbfsys_file
//////////////////////////////////////////////////////////////////////////////*/

    // first attributes and indices
    $cols      = array();
    $indices   = array();
    $sequences = array();


    $cols['access_key']  = array
    (
      LibDbAdmin::COL_NAME        => 'access_key',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'varchar',
      LibDbAdmin::COL_LENGTH      => '120',
      LibDbAdmin::COL_PRECISION   => '',
      LibDbAdmin::COL_SCALE       => '',
    );

    $indices['wbfsys_file_access_key_manual_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'access_key',
      LibDbAdmin::INDEX_TYPE      => 'btree',
    );

    $cols['name']  = array
    (
      LibDbAdmin::COL_NAME        => 'name',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'varchar',
      LibDbAdmin::COL_LENGTH      => '250',
      LibDbAdmin::COL_PRECISION   => '',
      LibDbAdmin::COL_SCALE       => '',
    );

    $cols['link']  = array
    (
      LibDbAdmin::COL_NAME        => 'link',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'varchar',
      LibDbAdmin::COL_LENGTH      => '400',
      LibDbAdmin::COL_PRECISION   => '',
      LibDbAdmin::COL_SCALE       => '',
    );

    $indices['wbfsys_file_link_search_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'link',
      LibDbAdmin::INDEX_TYPE      => 'btree'
    );

    $cols['activ']  = array
    (
      LibDbAdmin::COL_NAME        => 'activ',
      LibDbAdmin::COL_DEFAULT     => 'true',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'bool',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '',
      LibDbAdmin::COL_SCALE       => '',
    );

    $indices['wbfsys_file_activ_search_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'activ',
      LibDbAdmin::INDEX_TYPE      => 'btree'
    );

    $cols['id_type']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_type',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $indices['wbfsys_file_id_type_fk_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_type',
      LibDbAdmin::INDEX_TYPE      => 'btree',
    );

    $cols['id_confidentiality']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_confidentiality',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $indices['wbfsys_file_id_confidentiality_fk_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_confidentiality',
      LibDbAdmin::INDEX_TYPE      => 'btree',
    );

    $cols['flag_local']  = array
    (
      LibDbAdmin::COL_NAME        => 'flag_local',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'bool',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '',
      LibDbAdmin::COL_SCALE       => '',
    );

    $cols['id_licence']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_licence',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $indices['wbfsys_file_id_licence_fk_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_licence',
      LibDbAdmin::INDEX_TYPE      => 'btree',
    );

    $cols['flag_versioning']  = array
    (
      LibDbAdmin::COL_NAME        => 'flag_versioning',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'bool',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '',
      LibDbAdmin::COL_SCALE       => '',
    );

    $cols['id_mediathek']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_mediathek',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $indices['wbfsys_file_id_mediathek_fk_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_mediathek',
      LibDbAdmin::INDEX_TYPE      => 'btree',
    );

    $cols['id_storage']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_storage',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $indices['wbfsys_file_id_storage_fk_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_storage',
      LibDbAdmin::INDEX_TYPE      => 'btree',
    );

    $cols['max_version']  = array
    (
      LibDbAdmin::COL_NAME        => 'max_version',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int4',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '32',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $cols['id_visibility']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_visibility',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int4',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '32',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $cols['description']  = array
    (
      LibDbAdmin::COL_NAME        => 'description',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'text',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '',
      LibDbAdmin::COL_SCALE       => '',
    );

    $cols['mimetype']  = array
    (
      LibDbAdmin::COL_NAME        => 'mimetype',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'varchar',
      LibDbAdmin::COL_LENGTH      => '20',
      LibDbAdmin::COL_PRECISION   => '',
      LibDbAdmin::COL_SCALE       => '',
    );

    $cols['file_size']  = array
    (
      LibDbAdmin::COL_NAME        => 'file_size',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int4',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '32',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $cols['file_hash']  = array
    (
      LibDbAdmin::COL_NAME        => 'file_hash',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'varchar',
      LibDbAdmin::COL_LENGTH      => '32',
      LibDbAdmin::COL_PRECISION   => '',
      LibDbAdmin::COL_SCALE       => '',
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

    $indices['wbfsys_file_m_role_create_fk_idx']  = array
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

    $indices['wbfsys_file_m_role_change_fk_idx']  = array
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

    if( $dbAdmin->tableExists( 'wbfsys_file' )  )
    {

      $tmp = $dbAdmin->getTableColumns( 'wbfsys_file' );
      $existingCols = array();
      foreach( $tmp as $tmpCol )
      {
        $existingCols[$tmpCol[LibDbAdmin::COL_NAME]] = $tmpCol[LibDbAdmin::COL_NAME];
      }

      foreach( $cols as $colName => $col )
      {

        if( $dbAdmin->columnExists( $colName, 'wbfsys_file' ) )
        {
          if( $diff = $dbAdmin->diffColumn( $colName, $col, 'wbfsys_file' ) )
          {
            
            if( $this->syncCol )
            {
              try
              {
                $dbAdmin->alterColumn( $colName, $col, $diff, 'wbfsys_file' );
                $this->getResponse()->addMessage
                ( 
                  'Column: '.$colName.' in Table wbfsys_file was successfully synced. '.$dbAdmin->reportDiffColumn( $colName, $col, 'wbfsys_file' ) 
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
                      "The column {$colName} in Table wbfsys_file was not compatible, so i had to drop and recreate it. "
                        .$dbAdmin->reportDiffColumn( $colName, $col, 'wbfsys_file' )  
                    );
                    $dbAdmin->renameColumn( $colName,  $colName.'_incsync_'.date('Ymd'), 'wbfsys_file' );
                    $dbAdmin->createAttributeColumn( 'wbfsys_file', $col, false );
                  }
                  else
                  {
                    $this->getResponse()->addError
                    ( 
                      "The column {$colName} in Table wbfsys_file was not compatible to sync. "
                        .$dbAdmin->reportDiffColumn( $colName, $col, 'wbfsys_file' ).' '.$e->getMessage()  
                    );
                  }
                }
                catch( LibDb_Exception $e )
                {
                  $this->getResponse()->addError
                  ( 
                    "Failed to sync column {$colName} in Table wbfsys_file ".$e->getMessage()
                  );
                }
                
              }
            }
            else
            {
              $this->getResponse()->addError
              ( 
                "The column {$colName} in Table wbfsys_file is out of sync! "
                  .$dbAdmin->reportDiffColumn( $colName, $col, 'wbfsys_file' )  
              );
            }
          }
        }
        else  // colum not exists
        {
          $dbAdmin->addColumn( $colName, $col, 'wbfsys_file' );
          $this->getResponse()->addMessage( 'Added Missing Column: '.$colName.' in Table wbfsys_file' );
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
            $this->getResponse()->addMessage( 'Removed column: '.$colName.' from Table wbfsys_file cause it was not in the model' );
            $dbAdmin->dropColumn($colName , 'wbfsys_file' );
          }
          else
          {
            $this->getResponse()->addError( "The column {$colName} in Table wbfsys_file not exists in the Model!"  );
          }
        }
        catch( LibDb_Exception $e )
        {
          $this->getResponse()->addError( "Failed to delete column {$colName} in Table wbfsys_file ".$e->getMessage() );
        }
        
      }

    }
    else
    {
      try
      {
        $dbAdmin->createTable( 'wbfsys_file', $cols  );
        $this->getResponse()->addMessage( 'Created Missing Table wbfsys_file' );
      }
      catch( LibDb_Exception $e )
      {
        $this->getResponse()->addError( "Failed to create table Table wbfsys_file ".$e->getMessage() );
      }
      
    }

    unset( $allTables['wbfsys_file'] );
