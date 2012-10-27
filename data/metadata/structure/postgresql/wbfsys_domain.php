<?php 
/*//////////////////////////////////////////////////////////////////////////////
// create the metadata for entity: wbfsys_domain
//////////////////////////////////////////////////////////////////////////////*/

    // first attributes and indices
    $cols      = array();
    $indices   = array();
    $sequences = array();


    $cols['name']  = array
    (
      LibDbAdmin::COL_NAME        => 'name',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'NO',
      LibDbAdmin::COL_TYPE        => 'varchar',
      LibDbAdmin::COL_LENGTH      => '255',
      LibDbAdmin::COL_PRECISION   => '',
      LibDbAdmin::COL_SCALE       => '',
    );

    $indices['wbfsys_domain_name_search_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'name',
      LibDbAdmin::INDEX_TYPE      => 'btree'
    );

    $cols['id_cms_project']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_cms_project',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $indices['wbfsys_domain_id_cms_project_fk_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_cms_project',
      LibDbAdmin::INDEX_TYPE      => 'btree',
    );

    $cols['id_owner']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_owner',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $indices['wbfsys_domain_id_owner_fk_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_owner',
      LibDbAdmin::INDEX_TYPE      => 'btree',
    );

    $cols['id_customer']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_customer',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $indices['wbfsys_domain_id_customer_fk_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_customer',
      LibDbAdmin::INDEX_TYPE      => 'btree',
    );

    $cols['id_techc']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_techc',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $indices['wbfsys_domain_id_techc_fk_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_techc',
      LibDbAdmin::INDEX_TYPE      => 'btree',
    );

    $cols['id_adminc']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_adminc',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $indices['wbfsys_domain_id_adminc_fk_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_adminc',
      LibDbAdmin::INDEX_TYPE      => 'btree',
    );

    $cols['id_registrar']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_registrar',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $indices['wbfsys_domain_id_registrar_fk_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_registrar',
      LibDbAdmin::INDEX_TYPE      => 'btree',
    );

    $cols['id_dns']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_dns',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $indices['wbfsys_domain_id_dns_fk_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_dns',
      LibDbAdmin::INDEX_TYPE      => 'btree',
    );

    $cols['id_2dns']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_2dns',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $indices['wbfsys_domain_id_2dns_fk_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_2dns',
      LibDbAdmin::INDEX_TYPE      => 'btree',
    );

    $cols['id_dns_zone']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_dns_zone',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'int8',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '64',
      LibDbAdmin::COL_SCALE       => '0',
    );

    $indices['wbfsys_domain_id_dns_zone_fk_idx']  = array
    (
      LibDbAdmin::COL_NAME        => 'id_dns_zone',
      LibDbAdmin::INDEX_TYPE      => 'btree',
    );

    $cols['is_primary']  = array
    (
      LibDbAdmin::COL_NAME        => 'is_primary',
      LibDbAdmin::COL_DEFAULT     => '',
      LibDbAdmin::COL_NULL_ABLE   => 'YES',
      LibDbAdmin::COL_TYPE        => 'bool',
      LibDbAdmin::COL_LENGTH      => '',
      LibDbAdmin::COL_PRECISION   => '',
      LibDbAdmin::COL_SCALE       => '',
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

    $indices['wbfsys_domain_m_role_create_fk_idx']  = array
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

    $indices['wbfsys_domain_m_role_change_fk_idx']  = array
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

    if( $dbAdmin->tableExists( 'wbfsys_domain' )  )
    {

      $tmp = $dbAdmin->getTableColumns( 'wbfsys_domain' );
      $existingCols = array();
      foreach( $tmp as $tmpCol )
      {
        $existingCols[$tmpCol[LibDbAdmin::COL_NAME]] = $tmpCol[LibDbAdmin::COL_NAME];
      }

      foreach( $cols as $colName => $col )
      {

        if( $dbAdmin->columnExists( $colName, 'wbfsys_domain' ) )
        {
          if( $diff = $dbAdmin->diffColumn( $colName, $col, 'wbfsys_domain' ) )
          {
            
            if( $this->syncCol )
            {
              try
              {
                $dbAdmin->alterColumn( $colName, $col, $diff, 'wbfsys_domain' );
                $this->getResponse()->addMessage
                ( 
                  'Column: '.$colName.' in Table wbfsys_domain was successfully synced. '.$dbAdmin->reportDiffColumn( $colName, $col, 'wbfsys_domain' ) 
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
                      "The column {$colName} in Table wbfsys_domain was not compatible, so i had to drop and recreate it. "
                        .$dbAdmin->reportDiffColumn( $colName, $col, 'wbfsys_domain' )  
                    );
                    $dbAdmin->renameColumn( $colName,  $colName.'_incsync_'.date('Ymd'), 'wbfsys_domain' );
                    $dbAdmin->createAttributeColumn( 'wbfsys_domain', $col, false );
                  }
                  else
                  {
                    $this->getResponse()->addError
                    ( 
                      "The column {$colName} in Table wbfsys_domain was not compatible to sync. "
                        .$dbAdmin->reportDiffColumn( $colName, $col, 'wbfsys_domain' ).' '.$e->getMessage()  
                    );
                  }
                }
                catch( LibDb_Exception $e )
                {
                  $this->getResponse()->addError
                  ( 
                    "Failed to sync column {$colName} in Table wbfsys_domain ".$e->getMessage()
                  );
                }
                
              }
            }
            else
            {
              $this->getResponse()->addError
              ( 
                "The column {$colName} in Table wbfsys_domain is out of sync! "
                  .$dbAdmin->reportDiffColumn( $colName, $col, 'wbfsys_domain' )  
              );
            }
          }
        }
        else  // colum not exists
        {
          $dbAdmin->addColumn( $colName, $col, 'wbfsys_domain' );
          $this->getResponse()->addMessage( 'Added Missing Column: '.$colName.' in Table wbfsys_domain' );
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
            $this->getResponse()->addMessage( 'Removed column: '.$colName.' from Table wbfsys_domain cause it was not in the model' );
            $dbAdmin->dropColumn($colName , 'wbfsys_domain' );
          }
          else
          {
            $this->getResponse()->addError( "The column {$colName} in Table wbfsys_domain not exists in the Model!"  );
          }
        }
        catch( LibDb_Exception $e )
        {
          $this->getResponse()->addError( "Failed to delete column {$colName} in Table wbfsys_domain ".$e->getMessage() );
        }
        
      }

    }
    else
    {
      try
      {
        $dbAdmin->createTable( 'wbfsys_domain', $cols  );
        $this->getResponse()->addMessage( 'Created Missing Table wbfsys_domain' );
      }
      catch( LibDb_Exception $e )
      {
        $this->getResponse()->addError( "Failed to create table Table wbfsys_domain ".$e->getMessage() );
      }
      
    }

    unset( $allTables['wbfsys_domain'] );
