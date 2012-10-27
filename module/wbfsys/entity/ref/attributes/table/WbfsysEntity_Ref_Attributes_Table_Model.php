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
class WbfsysEntity_Ref_Attributes_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityAttribute_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntityAttribute( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityAttribute_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntityAttribute(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysEntityAttribute_Entity
  */
  public function getEntityWbfsysEntityAttribute( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysEntityAttribute = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysEntityAttribute = $this->getRegisterd( 'entityWbfsysEntityAttribute' );

    //entity wbfsys_entity_attribute
    if( !$entityWbfsysEntityAttribute )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysEntityAttribute = $orm->get( 'WbfsysEntityAttribute', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysentityattribute with this id '.$objid,
              'wbfsys.entity_attribute.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysEntityAttribute', $entityWbfsysEntityAttribute );
        $this->register( 'main_entity', $entityWbfsysEntityAttribute );

      }
      else
      {
        $entityWbfsysEntityAttribute   = new WbfsysEntityAttribute_Entity() ;
        $this->register( 'entityWbfsysEntityAttribute', $entityWbfsysEntityAttribute );
        $this->register( 'main_entity', $entityWbfsysEntityAttribute );
      }

    }
    elseif( $objid && $objid != $entityWbfsysEntityAttribute->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysEntityAttribute = $orm->get( 'WbfsysEntityAttribute', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysentityattribute with this id '.$objid,
            'wbfsys.entity_attribute.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysEntityAttribute', $entityWbfsysEntityAttribute );
      $this->register( 'main_entity', $entityWbfsysEntityAttribute );
    }

    return $entityWbfsysEntityAttribute;

  }//end public function getEntityWbfsysEntityAttribute */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysEntityAttribute_Entity $entity
  */
  public function setEntityWbfsysEntityAttribute( $entity )
  {

    $this->register( 'entityWbfsysEntityAttribute', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysEntityAttribute */

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

    $data['wbfsys_entity_attribute']  = $this->getEntityWbfsysEntityAttribute();


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
    if( $data['wbfsys_entity_attribute']->id_type )
    {
      $valWbfsysEntityAttributeType = $orm->getField
      (
        'WbfsysEntityAttributeType',
        'rowid = '.$data['wbfsys_entity_attribute']->id_type,
        'name'
      );
      $tabData['wbfsys_entity_attribute_type_name'] = $valWbfsysEntityAttributeType;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_entity_attribute_type_name'] = '';
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
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysEntity, $access, $params  )
  { 
  
    $response  = $this->getResponse();
    
    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysEntityAttribute_Entity' ) )
    {
      $response->addError
      (
        'tried so search for a nonexisting entity: wbfsys_entity_attribute with the expected source wbfsys_entity_attribute'
      );
      return array();
    }

    $db          = $this->getDb();
    $orm         = $db->getOrm();
    $httpRequest = $this->getRequest();
    $user        = $this->getUser();
    $view        = $this->getView();


    $condition = array();




    if( $free = $httpRequest->param( 'free_search' , Validator::TEXT ) )
      $condition['free'] = $free;

    if( !$fieldsWbfsysEntityAttribute = $this->getRegisterd( 'search_fields_wbfsys_entity_attribute' ) )
    {
       $fieldsWbfsysEntityAttribute   = $orm->getSearchCols( 'WbfsysEntityAttribute' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_entity_attribute' ) )
    {
      $fieldsWbfsysEntityAttribute = array_unique( array_merge
      (
        $fieldsWbfsysEntityAttribute,
        $refs
      ));
    }

    $filterWbfsysEntityAttribute     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysEntityAttribute', $fieldsWbfsysEntityAttribute ),
      $orm->getErrorMessages( 'WbfsysEntityAttribute'  ),
      'search_wbfsys_entity_attribute'
    );
    $condition['wbfsys_entity_attribute'] = $filterWbfsysEntityAttribute->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysEntity_Ref_Attributes_Table' );
    /* @var $query WbfsysEntity_Ref_Attributes_Table_Query  */

    // hard condition
    $query->setCondition( 'wbfsys_entity_attribute.id_entity = '.$idWbfsysEntity );

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

}//end class WbfsysEntity_Ref_Attributes_Table_Model

