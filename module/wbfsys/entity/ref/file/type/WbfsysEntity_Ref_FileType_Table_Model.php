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
class WbfsysEntity_Ref_FileType_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysVrefFileType_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysVrefFileType( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysVrefFileType_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysVrefFileType(  $entity );

  }//end public function setEntity */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysVrefFileType_Entity
  */
  public function getEntityWbfsysVrefFileType( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysVrefFileType = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysVrefFileType = $this->getRegisterd( 'entityWbfsysVrefFileType' );


    //entity wbfsys_vref_file_type
    if( !$entityWbfsysVrefFileType )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysVrefFileType = $orm->get( 'WbfsysVrefFileType', $objid ) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysvreffiletype with this id '.$objid,
              'wbfsys.vref_file_type.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysVrefFileType', $entityWbfsysVrefFileType );
        $this->register( 'main_entity', $entityWbfsysVrefFileType );

      }
      else
      {
        $entityWbfsysVrefFileType   = new WbfsysVrefFileType_Entity() ;
        $this->register( 'entityWbfsysVrefFileType', $entityWbfsysVrefFileType );
        $this->register( 'main_entity', $entityWbfsysVrefFileType );
      }

    }
    elseif( $objid && $objid != $entityWbfsysVrefFileType->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysVrefFileType = $orm->get( 'WbfsysVrefFileType', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysvreffiletype with this id '.$objid,
            'wbfsys.vref_file_type.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysVrefFileType', $entityWbfsysVrefFileType );
      $this->register( 'main_entity', $entityWbfsysVrefFileType );
    }

    return $entityWbfsysVrefFileType;

  }//end public function getEntityWbfsysVrefFileType */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysVrefFileType_Entity $entity
  */
  public function setEntityWbfsysVrefFileType( $entity )
  {

    $this->register( 'entityWbfsysVrefFileType', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysVrefFileType */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysFileType_Entity
  */
  public function getEntityWbfsysFileType( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysFileType = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysFileType = $this->getRegisterd( 'entityWbfsysFileType' );

    //entity wbfsys_file_type
    if( !$entityWbfsysFileType )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysFileType = $orm->get( 'WbfsysFileType', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysfiletype with this id '.$objid,
              'wbfsys.file_type.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysFileType', $entityWbfsysFileType );
        $this->register( 'main_entity', $entityWbfsysFileType );

      }
      else
      {
        $entityWbfsysFileType   = new WbfsysFileType_Entity() ;
        $this->register( 'entityWbfsysFileType', $entityWbfsysFileType );
        $this->register( 'main_entity', $entityWbfsysFileType );
      }

    }
    elseif( $objid && $objid != $entityWbfsysFileType->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysFileType = $orm->get( 'WbfsysFileType', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysfiletype with this id '.$objid,
            'wbfsys.file_type.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysFileType', $entityWbfsysFileType );
      $this->register( 'main_entity', $entityWbfsysFileType );
    }

    return $entityWbfsysFileType;

  }//end public function getEntityWbfsysFileType */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysFileType_Entity $entity
  */
  public function setEntityWbfsysFileType( $entity )
  {

    $this->register( 'entityWbfsysFileType', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysFileType */

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

    $data['wbfsys_vref_file_type']  = $this->getEntityWbfsysVrefFileType();
    $data['wbfsys_file_type']  = $this->getEntityWbfsysFileType( $data['wbfsys_vref_file_type']->id_type );


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



    return $tabData;

  }// end public function getEntryData */

////////////////////////////////////////////////////////////////////////////////
// search
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * table to list all connected WbfsysEntity
   *
   * @param int $idWbfsysEntity the id for the reference entity
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysEntity, $access, $params  )
  {

    $response  = $this->getResponse();

    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysFileType_Entity' ) )
    {
      Error::addError
      (
        'tried so search for a nonexisting entity: wbfsys_file_type with the expected source wbfsys_file_type'
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

    if( !$fieldsWbfsysVrefFileType = $this->getRegisterd( 'search_fields_wbfsys_vref_file_type' ) )
    {
       $fieldsWbfsysVrefFileType   = $orm->getSearchCols( 'WbfsysVrefFileType' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_vref_file_type' ) )
    {
      $fieldsWbfsysVrefFileType = array_unique( array_merge
      (
        $fieldsWbfsysVrefFileType,
        $refs
      ));
    }

    $filterWbfsysVrefFileType     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysVrefFileType', $fieldsWbfsysVrefFileType ),
      $orm->getErrorMessages( 'WbfsysVrefFileType'  ),
      'search_wbfsys_vref_file_type'
    );
    $condition['wbfsys_vref_file_type'] = $filterWbfsysVrefFileType->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysEntity_Ref_FileType_Table' );
    /* @var $query WbfsysEntity_Ref_FileType_Table_Query  */
    $query->extendedConditions = $extendedConditions;

    // hard condition
    $query->setCondition( 'wbfsys_vref_file_type.vid = '.$idWbfsysEntity );
    
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

}//end class WbfsysEntity_Ref_FileType_Table_Model

