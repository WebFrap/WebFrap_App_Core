<?php 
/*******************************************************************************
*
* @author      : Dominik Bonsch <dominik.bonsch@webfrap.net>
* @date        :
* @copyright   : Webfrap Developer Network <contact@webfrap.net>
* @project     : Webfrap Web Frame Application
* @projectUrl  : http://webfrap.net
*
* @licence     : BSD License see: LICENCE/BSD Licence.txt
* 
* @version: @package_version@  Revision: @package_revision@
*
* Changes:
*
*******************************************************************************/

/**
 * @package WebFrap
 * @subpackage ModWbfsys
 * @author Dominik Bonsch <dominik.bonsch@s-db.de>
 * @copyright Softwareentwicklung Dominik Bonsch <contact@webfrap.de>
 * @licence WebFrap.net
 */
class MyWbfsysTask_Ref_Attachments_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityAttachment_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntityAttachment( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityAttachment_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntityAttachment(  $entity );

  }//end public function setEntity */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityAttachment_Entity
  */
  public function getEntityWbfsysEntityAttachment( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysEntityAttachment = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntityAttachment = $this->getRegisterd( 'entityWbfsysEntityAttachment' );


    //entity wbfsys_entity_attachment
    if( !$entityWbfsysEntityAttachment )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntityAttachment = $orm->get( 'WbfsysEntityAttachment', $objid ) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentityattachment with this id '.$objid,
              'wbfsys.entity_attachment.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntityAttachment', $entityWbfsysEntityAttachment );
        $this->register( 'main_entity', $entityWbfsysEntityAttachment );

      }
      else
      {
        $entityWbfsysEntityAttachment   = new WbfsysEntityAttachment_Entity() ;
        $this->register( 'entityWbfsysEntityAttachment', $entityWbfsysEntityAttachment );
        $this->register( 'main_entity', $entityWbfsysEntityAttachment );
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntityAttachment->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntityAttachment = $orm->get( 'WbfsysEntityAttachment', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentityattachment with this id '.$objid,
            'wbfsys.entity_attachment.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntityAttachment', $entityWbfsysEntityAttachment );
      $this->register( 'main_entity', $entityWbfsysEntityAttachment );
    }

    return $entityWbfsysEntityAttachment;

  }//end public function getEntityWbfsysEntityAttachment */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityAttachment_Entity $entity
  */
  public function setEntityWbfsysEntityAttachment( $entity )
  {

    $this->register( 'entityWbfsysEntityAttachment', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntityAttachment */

  /**
  * returns the activ entity with data, or creates a empty one
  * and returns it instead
  *
  * @return EntityFile_Entity
  */
  public function getEntityEntityFile( $mainEntity = null )
  {

    $response = $this->getResponse();

    $objid = null;

    if( !is_null($mainEntity) )
      $objid = $mainEntity->id_file;

    $entityEntityFile = $this->getRegisterd( 'entityEntityFile' );

    //entity wbfsys_entity_attachment
    if( !$entityEntityFile )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityEntityFile = $orm->get( 'WbfsysFile', $objid) )
        {
          $response->addWarning
          (
            $response->i18n->l
            (
              'Missing the reference dataset wbfsysfile with the id '.$objid,
              'wbfsys.entity_attachment.message'
            )
          );

          $entityEntityFile = new WbfsysFile_Entity;

          $entityEntityFile->setId( $objid, true );
          $orm->insert( $entityEntityFile, array(), false );

        }
        $this->register( 'entityEntityFile', $entityEntityFile );
      }
      else
      {
        $entityEntityFile   = new WbfsysFile_Entity() ;
        $this->register( 'entityEntityFile', $entityEntityFile );
      }

    }
    elseif( $objid  && $objid != $entityEntityFile->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityEntityFile = $orm->get( 'WbfsysFile', $objid) )
      {
        $this->getResponse()->addError
        (
          $response->i18n->l
          (
            'Missing the reference dataset wbfsysfile with the id '.$objid,
            'wbfsys.entity_attachment.message'
          )
        );

        $entityEntityFile = new WbfsysFile_Entity;

        $entityEntityFile->setId( $objid, true );
        $orm->insert( $entityEntityFile );
      }

      $this->register( 'entityEntityFile', $entityEntityFile );
    }

    return $entityEntityFile;

  }//end public function getEntityEntityFile */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param EntityEntityFile $entity
  */
  public function setEntityEntityFile( $entity )
  {

    $this->register( 'entityEntityFile', $entity );

  }//end public function setEntityEntityFile */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysFile_Entity
  */
  public function getEntityWbfsysFile( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysFile = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysFile = $this->getRegisterd( 'entityWbfsysFile' );

    //entity wbfsys_file
    if( !$entityWbfsysFile )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysFile = $orm->get( 'WbfsysFile', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysfile with this id '.$objid,
              'wbfsys.file.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysFile', $entityWbfsysFile );
        $this->register( 'main_entity', $entityWbfsysFile );

      }
      else
      {
        $entityWbfsysFile   = new WbfsysFile_Entity() ;
        $this->register( 'entityWbfsysFile', $entityWbfsysFile );
        $this->register( 'main_entity', $entityWbfsysFile );
      }

    }
    elseif( $objid && $objid != $entityWbfsysFile->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysFile = $orm->get( 'WbfsysFile', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysfile with this id '.$objid,
            'wbfsys.file.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysFile', $entityWbfsysFile );
      $this->register( 'main_entity', $entityWbfsysFile );
    }

    return $entityWbfsysFile;

  }//end public function getEntityWbfsysFile */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysFile_Entity $entity
  */
  public function setEntityWbfsysFile( $entity )
  {

    $this->register( 'entityWbfsysFile', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysFile */

  /**
   * just fetch the post data without any required validation
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function getEntryData( $params )
  {

    $orm   = $this->getOrm();
    $data  = array();

    $data['wbfsys_entity_attachment']  = $this->getEntityWbfsysEntityAttachment();
    $data['entity_file'] = $this->getEntityEntityFile( $data['wbfsys_entity_attachment'] );
    $data['wbfsys_file']  = $this->getEntityWbfsysFile( $data['wbfsys_entity_attachment']->id_file );


    $tabData = array();

    foreach( $data as $tabName => $ent )
    {
      // prüfen ob etwas gefunden wurde
      if( !$ent )
      {
        Debug::console( "Missing Entity for Reference: ".$tabName );
        continue;
      }

      $tabData = array_merge( $tabData , $ent->getAllData( $tabName ) );
    }


    // if we have a value, try to load the display field (codeTableRefFields 4)
    if( $data['wbfsys_file']->id_type )
    {
      $valWbfsysFileType = $orm->getField
      (
        'WbfsysFileType',
        'rowid = '.$data['wbfsys_file']->id_type,
        'name'
      );
      $tabData['wbfsys_file_type_name'] = $valWbfsysFileType;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_file_type_name'] = '';
    }


    return $tabData;

  }// end public function getEntryData */

////////////////////////////////////////////////////////////////////////////////
// search
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * table to list all connected MyWbfsysTask
   *
   * @param int $idMyWbfsysTask the id for the reference entity
   * @param TFlag $params named parameters
   */
  public function search( $idMyWbfsysTask, $access, $params  )
  {

    $response  = $this->getResponse();

    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysFile_Entity' ) )
    {
      Error::addError
      (
        'tried so search for a nonexisting entity: wbfsys_file with the expected source wbfsys_file'
      );
      return array();
    }

    $db          = $this->getDb();
    $orm         = $db->getOrm();
    $httpRequest = $this->getRequest();
    $user        = $this->getUser();
    $view        = $this->getView();
    
		$extendedConditions = array();

    $condition = array();




    if( $free = $httpRequest->param( 'free_search' , Validator::TEXT ) )
      $condition['free'] = $free;

    if( !$fieldsWbfsysEntityAttachment = $this->getRegisterd( 'search_fields_wbfsys_entity_attachment' ) )
    {
       $fieldsWbfsysEntityAttachment   = $orm->getSearchCols( 'WbfsysEntityAttachment' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_entity_attachment' ) )
    {
      $fieldsWbfsysEntityAttachment = array_unique( array_merge
      (
        $fieldsWbfsysEntityAttachment,
        $refs
      ));
    }

    $filterWbfsysEntityAttachment     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysEntityAttachment', $fieldsWbfsysEntityAttachment ),
      $orm->getErrorMessages( 'WbfsysEntityAttachment'  ),
      'search_wbfsys_entity_attachment'
    );
    $condition['wbfsys_entity_attachment'] = $filterWbfsysEntityAttachment->getData();

    if
    (
      !$fieldsWbfsysFile
        = $this->getRegisterd( 'search_fields_wbfsys_file' )
    )
    {
      $fieldsWbfsysFile    = $orm->getSearchCols( 'WbfsysFile' );
    }

    $filterWbfsysFile      = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysFile', $fieldsWbfsysFile ),
      $orm->getErrorMessages ( 'WbfsysFile' ),
      'search_wbfsys_file'
    );
    $condition['wbfsys_file'] = $filterWbfsysFile->getData();




    // create a new query object
    $query = $db->newQuery( 'MyWbfsysTask_Ref_Attachments_Table' );
    /* @var $query MyWbfsysTask_Ref_Attachments_Table_Query  */
    $query->extendedConditions = $extendedConditions;

    // hard condition
    $query->setCondition( 'wbfsys_entity_attachment.vid = '.$idMyWbfsysTask );
    
    $validKeys  = $access->fetchListIds
    ( 
      $user->getProfileName(), 
      $query, 
      'table',  
      $condition, 
      $params 
    );

    $query->fetchInAcls
    (
      $validKeys,
      $params
    );



    return $query;

  }//end public public search */

////////////////////////////////////////////////////////////////////////////////
// data provides
////////////////////////////////////////////////////////////////////////////////
    
}//end class MyWbfsysTask_Ref_Attachments_Table_Model

