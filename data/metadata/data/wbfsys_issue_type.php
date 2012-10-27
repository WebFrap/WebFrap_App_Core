<?php 

      if( !$data = $orm->getByKey( 'WbfsysIssueType', 'bug' ) )
      {
        $data = new WbfsysIssueType_Entity();
        $data->access_key  = 'bug';
      }
    $data->upgrade( 'name', 'Bug' );
    $data->upgrade( 'description', 'An Error' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'bug',
          'WbfsysIssueType',
          'Sucessfully created new WbfsysIssueType dataset key: bug'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'bug',
            'WbfsysIssueType',
            'Sucessfully updated WbfsysIssueType dataset key: bug'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_issue_type',
        'WbfsysIssueType',
        'Failed to sync WbfsysIssueType dataset key: bug '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysIssueType', 'typo' ) )
      {
        $data = new WbfsysIssueType_Entity();
        $data->access_key  = 'typo';
      }
    $data->upgrade( 'name', 'Typo' );
    $data->upgrade( 'description', 'Typo Error' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'typo',
          'WbfsysIssueType',
          'Sucessfully created new WbfsysIssueType dataset key: typo'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'typo',
            'WbfsysIssueType',
            'Sucessfully updated WbfsysIssueType dataset key: typo'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_issue_type',
        'WbfsysIssueType',
        'Failed to sync WbfsysIssueType dataset key: typo '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysIssueType', 'translation' ) )
      {
        $data = new WbfsysIssueType_Entity();
        $data->access_key  = 'translation';
      }
    $data->upgrade( 'name', 'Bad Translation' );
    $data->upgrade( 'description', 'Translation Error' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'translation',
          'WbfsysIssueType',
          'Sucessfully created new WbfsysIssueType dataset key: translation'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'translation',
            'WbfsysIssueType',
            'Sucessfully updated WbfsysIssueType dataset key: translation'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_issue_type',
        'WbfsysIssueType',
        'Failed to sync WbfsysIssueType dataset key: translation '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysIssueType', 'accessibility' ) )
      {
        $data = new WbfsysIssueType_Entity();
        $data->access_key  = 'accessibility';
      }
    $data->upgrade( 'name', 'Accessibility Problem' );
    $data->upgrade( 'description', 'An Error' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'accessibility',
          'WbfsysIssueType',
          'Sucessfully created new WbfsysIssueType dataset key: accessibility'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'accessibility',
            'WbfsysIssueType',
            'Sucessfully updated WbfsysIssueType dataset key: accessibility'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_issue_type',
        'WbfsysIssueType',
        'Failed to sync WbfsysIssueType dataset key: accessibility '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysIssueType', 'usability' ) )
      {
        $data = new WbfsysIssueType_Entity();
        $data->access_key  = 'usability';
      }
    $data->upgrade( 'name', 'Usability Problem' );
    $data->upgrade( 'description', 'Bad Usability' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'usability',
          'WbfsysIssueType',
          'Sucessfully created new WbfsysIssueType dataset key: usability'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'usability',
            'WbfsysIssueType',
            'Sucessfully updated WbfsysIssueType dataset key: usability'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_issue_type',
        'WbfsysIssueType',
        'Failed to sync WbfsysIssueType dataset key: usability '.$e->getMessage()
      ));
    }

      if( !$data = $orm->getByKey( 'WbfsysIssueType', 'feature_whish' ) )
      {
        $data = new WbfsysIssueType_Entity();
        $data->access_key  = 'feature_whish';
      }
    $data->upgrade( 'name', 'Feature Whish' );
    $data->upgrade( 'description', 'Bad Usability' );

    try
    {
      if( $data->isNew() )
      {
      
        $orm->insert( $data );
        $this->protocol(array(
          'insert',
          'feature_whish',
          'WbfsysIssueType',
          'Sucessfully created new WbfsysIssueType dataset key: feature_whish'
        ));
      }
      else
      {
        
        if( !$data->getSynchronized() )
        {
          $orm->update( $data );
          $this->protocol(array(
            'update',
            'feature_whish',
            'WbfsysIssueType',
            'Sucessfully updated WbfsysIssueType dataset key: feature_whish'
          ));
        }
      
      }
    }
    catch( Exception $e )
    {
      $this->protocol(array(
        'error',
        'wbfsys_issue_type',
        'WbfsysIssueType',
        'Failed to sync WbfsysIssueType dataset key: feature_whish '.$e->getMessage()
      ));
    }
