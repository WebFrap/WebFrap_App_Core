<?php 
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: wbfsys_data_index
//////////////////////////////////////////////////////////////////////////////*/

    // first attributes and indices
    $cols      = array();
    $indices   = array();
    $sequences = array();


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

    $indices['wbfsys_data_index_name_search_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'name',
      LibDbAdmin::INDEX_TYPE      => 'btree'
    );

    $cols['title']  = array
    (
      LibDbAdmin::COL_NAME        => 'title',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'varchar',
      LibDbAdmin::COL_LENGTH      => '400',
      LibDbAdmin::COL_PRECISION   => '',
      LibDbAdmin::COL_SCALE       => '',
    );

    $indices['wbfsys_data_index_title_search_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'title',
      LibDbAdmin::INDEX_TYPE      => 'btree'
    );

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

    $indices['wbfsys_data_index_access_key_manual_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'access_key',
      LibDbAdmin::INDEX_TYPE      => 'btree',
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

    $cols['index_content']  = array
    (
      LibDbAdmin::COL_NAME        => 'index_content',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'tsvector',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '',
      LibDbAdmin::COL_SCALE       => '',
    );

    $cols['vid']  = array
    (
      LibDbAdmin::COL_NAME        => 'vid',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $cols['id_vid_entity']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_vid_entity',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $indices['wbfsys_data_index_id_vid_entity_fk_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_vid_entity',
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

    $indices['wbfsys_data_index_m_role_create_fk_idx']  = array
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

    $indices['wbfsys_data_index_m_role_change_fk_idx']  = array
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

    if( $dbAdmin->tableExists( 'wbfsys_data_index' )  )
    {

      $tmp = $dbAdmin->getTableColumns( 'wbfsys_data_index' );
      $existingCols = array();
      foreach( $tmp as $tmpCol )
      {
        $existingCols[$tmpCol[LibDbAdmin::COL_NAME]] = $tmpCol[LibDbAdmin::COL_NAME];
      }

      foreach( $cols as $colName => $col )
      {

        if( $dbAdmin->columnExists( $colName, 'wbfsys_data_index' ) )
        {
          if( $diff = $dbAdmin->diffColumn( $colName, $col, 'wbfsys_data_index' ) )
          {
            
            if( $this->syncCol )
            {
              try
              {
                $dbAdmin->alterColumn( $colName, $col, $diff, 'wbfsys_data_index' );
                $this->getResponse()->addMessage
                ( 
                  'Column: '.$colName.' in Table wbfsys_data_index was successfully synced. '.$dbAdmin->reportDiffColumn( $colName, $col, 'wbfsys_data_index' ) 
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
                      "The column {$colName} in Table wbfsys_data_index was not compatible, so i had to drop and recreate it. "
                        .$dbAdmin->reportDiffColumn( $colName, $col, 'wbfsys_data_index' )  
                    );
                    $dbAdmin->renameColumn( $colName,  $colName.'_incsync_'.date('Ymd'), 'wbfsys_data_index' );
                    $dbAdmin->createAttributeColumn( 'wbfsys_data_index', $col, false );
                  }
                  else
                  {
                    $this->getResponse()->addError
                    ( 
                      "The column {$colName} in Table wbfsys_data_index was not compatible to sync. "
                        .$dbAdmin->reportDiffColumn( $colName, $col, 'wbfsys_data_index' ).' '.$e->getMessage()  
                    );
                  }
                }
                catch( LibDb_Exception $e )
                {
                  $this->getResponse()->addError
                  ( 
                    "Failed to sync column {$colName} in Table wbfsys_data_index ".$e->getMessage()
                  );
                }
                
              }
            }
            else
            {
              $this->getResponse()->addError
              ( 
                "The column {$colName} in Table wbfsys_data_index is out of sync! "
                  .$dbAdmin->reportDiffColumn( $colName, $col, 'wbfsys_data_index' )  
              );
            }
          }
        }
        else  // colum not exists
        {
          $dbAdmin->addColumn( $colName, $col, 'wbfsys_data_index' );
          $this->getResponse()->addMessage( 'Added Missing Column: '.$colName.' in Table wbfsys_data_index' );
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
            $this->getResponse()->addMessage( 'Removed column: '.$colName.' from Table wbfsys_data_index cause it was not in the model' );
            $dbAdmin->dropColumn($colName , 'wbfsys_data_index' );
          }
          else
          {
            $this->getResponse()->addError( "The column {$colName} in Table wbfsys_data_index not exists in the Model!"  );
          }
        }
        catch( LibDb_Exception $e )
        {
          $this->getResponse()->addError( "Failed to delete column {$colName} in Table wbfsys_data_index ".$e->getMessage() );
        }
        
      }

    }
    else
    {
      try
      {
        $dbAdmin->createTable( 'wbfsys_data_index', $cols  );
        $this->getResponse()->addMessage( 'Created Missing Table wbfsys_data_index' );
      }
      catch( LibDb_Exception $e )
      {
        $this->getResponse()->addError( "Failed to create table Table wbfsys_data_index ".$e->getMessage() );
      }
      
    }

    unset( $allTables['wbfsys_data_index'] );
