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
class WbfsysContact_Ref_AddressItem_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysAddressItem_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysAddressItem( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysAddressItem_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysAddressItem(  $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysAddressItem_Entity
  */
  public function getEntityWbfsysAddressItem( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysAddressItem = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysAddressItem = $this->getRegisterd( 'entityWbfsysAddressItem' );

    //entity wbfsys_address_item
    if( !$entityWbfsysAddressItem )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysAddressItem = $orm->get( 'WbfsysAddressItem', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysaddressitem with this id '.$objid,
              'wbfsys.address_item.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysAddressItem', $entityWbfsysAddressItem );
        $this->register( 'main_entity', $entityWbfsysAddressItem );

      }
      else
      {
        $entityWbfsysAddressItem   = new WbfsysAddressItem_Entity() ;
        $this->register( 'entityWbfsysAddressItem', $entityWbfsysAddressItem );
        $this->register( 'main_entity', $entityWbfsysAddressItem );
      }

    }
    elseif( $objid && $objid != $entityWbfsysAddressItem->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysAddressItem = $orm->get( 'WbfsysAddressItem', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysaddressitem with this id '.$objid,
            'wbfsys.address_item.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysAddressItem', $entityWbfsysAddressItem );
      $this->register( 'main_entity', $entityWbfsysAddressItem );
    }

    return $entityWbfsysAddressItem;

  }//end public function getEntityWbfsysAddressItem */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysAddressItem_Entity $entity
  */
  public function setEntityWbfsysAddressItem( $entity )
  {

    $this->register( 'entityWbfsysAddressItem', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysAddressItem */

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

    $data['wbfsys_address_item']  = $this->getEntityWbfsysAddressItem();


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
    if( $data['wbfsys_address_item']->id_type )
    {
      $valWbfsysAddressItemType = $orm->getField
      (
        'WbfsysAddressItemType',
        'rowid = '.$data['wbfsys_address_item']->id_type,
        'name'
      );
      $tabData['wbfsys_address_item_type_name'] = $valWbfsysAddressItemType;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_address_item_type_name'] = '';
    }


    return $tabData;

  }// end public function getEntryData */

////////////////////////////////////////////////////////////////////////////////
// search
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * table to list all connected WbfsysContact
   *
   * @param int $idWbfsysContact the id for the reference entity
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   */
  public function search( $idWbfsysContact, $access, $params  )
  { 
  
    $response  = $this->getResponse();
    
    // if the entity is not loadable just break here
    // the tab will not be shown in the window
    if( !Webfrap::classLoadable( 'WbfsysAddressItem_Entity' ) )
    {
      $response->addError
      (
        'tried so search for a nonexisting entity: wbfsys_address_item with the expected source wbfsys_address_item'
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

    if( !$fieldsWbfsysAddressItem = $this->getRegisterd( 'search_fields_wbfsys_address_item' ) )
    {
       $fieldsWbfsysAddressItem   = $orm->getSearchCols( 'WbfsysAddressItem' );
    }

    if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_address_item' ) )
    {
      $fieldsWbfsysAddressItem = array_unique( array_merge
      (
        $fieldsWbfsysAddressItem,
        $refs
      ));
    }

    $filterWbfsysAddressItem     = $httpRequest->checkSearchInput
    (
      $orm->getValidationData( 'WbfsysAddressItem', $fieldsWbfsysAddressItem ),
      $orm->getErrorMessages( 'WbfsysAddressItem'  ),
      'search_wbfsys_address_item'
    );
    $condition['wbfsys_address_item'] = $filterWbfsysAddressItem->getData();




    // create a new query object
    $query = $db->newQuery( 'WbfsysContact_Ref_AddressItem_Table' );
    /* @var $query WbfsysContact_Ref_AddressItem_Table_Query  */

    // hard condition
    $query->setCondition( 'wbfsys_address_item.vid = '.$idWbfsysContact );

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

}//end class WbfsysContact_Ref_AddressItem_Table_Model

