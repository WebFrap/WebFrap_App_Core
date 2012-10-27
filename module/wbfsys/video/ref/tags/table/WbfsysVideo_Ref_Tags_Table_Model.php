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
class WbfsysVideo_Ref_Tags_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityTag_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntityTag( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityTag_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntityTag(  $entity );

  }//end public function setEntity */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityTag_Entity
  */
  public function getEntityWbfsysEntityTag( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysEntityTag = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntityTag = $this->getRegisterd( 'entityWbfsysEntityTag' );


    //entity wbfsys_entity_tag
    if( !$entityWbfsysEntityTag )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntityTag = $orm->get( 'WbfsysEntityTag', $objid ) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentitytag with this id '.$objid,
              'wbfsys.entity_tag.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntityTag', $entityWbfsysEntityTag );
        $this->register( 'main_entity', $entityWbfsysEntityTag );

      }
      else
      {
        $entityWbfsysEntityTag   = new WbfsysEntityTag_Entity() ;
        $this->register( 'entityWbfsysEntityTag', $entityWbfsysEntityTag );
        $this->register( 'main_entity', $entityWbfsysEntityTag );
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntityTag->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntityTag = $orm->get( 'WbfsysEntityTag', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentitytag with this id '.$objid,
            'wbfsys.entity_tag.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntityTag', $entityWbfsysEntityTag );
      $this->register( 'main_entity', $entityWbfsysEntityTag );
    }

    return $entityWbfsysEntityTag;

  }//end public function getEntityWbfsysEntityTag */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityTag_Entity $entity
  */
  public function setEntityWbfsysEntityTag( $entity )
  {

    $this->register( 'entityWbfsysEntityTag', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntityTag */

  /**
  * returns the activ entity with data, or creates a empty one
  * and returns it instead
  *
  * @return EmbedTag_Entity
  */
  public function getEntityEmbedTag( $mainEntity = null )
  {

    $response = $this->getResponse();

    $objid = null;

    if( !is_null($mainEntity) )
      $objid = $mainEntity->id_tag;

    $entityEmbedTag = $this->getRegisterd( 'entityEmbedTag' );

    //entity wbfsys_entity_tag
    if( !$entityEmbedTag )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityEmbedTag = $orm->get( 'WbfsysTag', $objid) )
        {
          $response->addWarning
          (
            $response->i18n->l
            (
              'Missing the reference dataset wbfsystag with the id '.$objid,
              'wbfsys.entity_tag.message'
            )
          );

          $entityEmbedTag = new WbfsysTag_Entity;

          $entityEmbedTag->name = ' ';
          $entityEmbedTag->setId( $objid, true );
          $orm->insert( $entityEmbedTag, array(), false );

        }
        $this->register( 'entityEmbedTag', $entityEmbedTag );
      }
      else
      {
        $entityEmbedTag   = new WbfsysTag_Entity() ;
        $this->register( 'entityEmbedTag', $entityEmbedTag );
      }

    }
    elseif( $objid  && $objid != $entityEmbedTag->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityEmbedTag = $orm->get( 'WbfsysTag', $objid) )
      {
        $this->getResponse()->addError
        (
          $response->i18n->l
          (
            'Missing the reference dataset wbfsystag with the id '.$objid,
            'wbfsys.entity_tag.message'
          )
        );

        $entityEmbedTag = new WbfsysTag_Entity;

          $entityEmbedTag->name = ' ';
        $entityEmbedTag->setId( $objid, true );
        $orm->insert( $entityEmbedTag );
      }

      $this->register( 'entityEmbedTag', $entityEmbedTag );
    }

    return $entityEmbedTag;

  }//end public function getEntityEmbedTag */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param EntityEmbedTag $entity
  */
  public function setEntityEmbedTag( $entity )
  {

    $this->register( 'entityEmbedTag', $entity );

  }//end public function setEntityEmbedTag */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysTag_Entity
  */
  public function getEntityWbfsysTag( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysTag = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysTag = $this->getRegisterd( 'entityWbfsysTag' );

    //entity wbfsys_tag
    if( !$entityWbfsysTag )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysTag = $orm->get( 'WbfsysTag', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsystag with this id '.$objid,
              'wbfsys.tag.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysTag', $entityWbfsysTag );
        $this->register( 'main_entity', $entityWbfsysTag );

      }
      else
      {
        $entityWbfsysTag   = new WbfsysTag_Entity() ;
        $this->register( 'entityWbfsysTag', $entityWbfsysTag );
        $this->register( 'main_entity', $entityWbfsysTag );
      }

    }
    elseif( $objid && $objid != $entityWbfsysTag->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysTag = $orm->get( 'WbfsysTag', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsystag with this id '.$objid,
            'wbfsys.tag.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysTag', $entityWbfsysTag );
      $this->register( 'main_entity', $entityWbfsysTag );
    }

    return $entityWbfsysTag;

  }//end public function getEntityWbfsysTag */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysTag_Entity $entity
  */
  public function setEntityWbfsysTag( $entity )
  {

    $this->register( 'entityWbfsysTag', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysTag */

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

    $data['wbfsys_entity_tag']  = $this->getEntityWbfsysEntityTag();
    $data['embed_tag'] = $this->getEntityEmbedTag( $data['wbfsys_entity_tag'] );
    $data['wbfsys_tag']  = $this->getEntityWbfsysTag( $data['wbfsys_entity_tag']->id_tag );


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
   * table to list all connected WbfsysVideo
   *
   * @param int $idWbfsysVideo the id for the reference entity
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysVideo, $access, $params  )
  {

    $response  = $this->getResponse();

    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysTag_Entity' ) )
    {
      Error::addError
      (
        'tried so search for a nonexisting entity: wbfsys_tag with the expected source wbfsys_tag'
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

    if( !$fieldsWbfsysEntityTag = $this->getRegisterd( 'search_fields_wbfsys_entity_tag' ) )
    {
       $fieldsWbfsysEntityTag   = $orm->getSearchCols( 'WbfsysEntityTag' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_entity_tag' ) )
    {
      $fieldsWbfsysEntityTag = array_unique( array_merge
      (
        $fieldsWbfsysEntityTag,
        $refs
      ));
    }

    $filterWbfsysEntityTag     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysEntityTag', $fieldsWbfsysEntityTag ),
      $orm->getErrorMessages( 'WbfsysEntityTag'  ),
      'search_wbfsys_entity_tag'
    );
    $condition['wbfsys_entity_tag'] = $filterWbfsysEntityTag->getData();

    if
    (
      !$fieldsWbfsysTag
        = $this->getRegisterd( 'search_fields_wbfsys_tag' )
    )
    {
      $fieldsWbfsysTag    = $orm->getSearchCols( 'WbfsysTag' );
    }

    $filterWbfsysTag      = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysTag', $fieldsWbfsysTag ),
      $orm->getErrorMessages ( 'WbfsysTag' ),
      'search_wbfsys_tag'
    );
    $condition['wbfsys_tag'] = $filterWbfsysTag->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysVideo_Ref_Tags_Table' );
    /* @var $query WbfsysVideo_Ref_Tags_Table_Query  */
    $query->extendedConditions = $extendedConditions;

    // hard condition
    $query->setCondition( 'wbfsys_entity_tag.vid = '.$idWbfsysVideo );
    
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
    
}//end class WbfsysVideo_Ref_Tags_Table_Model

