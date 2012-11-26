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
class WbfsysEntityTag_Table_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// Attributes
////////////////////////////////////////////////////////////////////////////////
    
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    

  /**
  * Erfragen der Haupt Entity unabhängig vom Maskenname
  * @param int $objid
  * @return WbfsysEntityTag_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysEntityTag( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysEntityTag_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysEntityTag( $entity );

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
        $this->register( 'main_entity', $entityWbfsysEntityTag);

      }
      else
      {
        $entityWbfsysEntityTag   = new WbfsysEntityTag_Entity() ;
        $this->register( 'entityWbfsysEntityTag', $entityWbfsysEntityTag );
        $this->register( 'main_entity', $entityWbfsysEntityTag);
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

      $this->register( 'entityWbfsysEntityTag', $entityWbfsysEntityTag);
      $this->register( 'main_entity', $entityWbfsysEntityTag);
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
// context: table
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * Suchfunktion für das Listen Element
   *
   * Wenn Suchparameter übergeben werden, werden diese automatisch in die
   * Query eingebaut, ansonsten wird eine plain query ausgeführt
   *
   * Berechtigungen werden bei Bedarf berücksichtigt
   *
   * Am Ende wird ein geladenes Query Objekt zurückgegeben, über welches
   * ( wie über einen Array ) itteriert werden kann
   *
   * @param LibAclContainer $access
   * @param TFlag $params named parameters
   * @param array $condition Übergabe möglicher such Parameter
   *
   * @return LibSqlQuery
   *
   * @throws LibDb_Exception
   *    wenn die Query fehlschlägt
   *    Datenbank Verbindungsfehler... etc ( siehe meldung )
   */
  public function search( $access, $params, $condition = array() )
  {

    // laden der benötigten resourcen
    $view         = $this->getView();
    $httpRequest = $this->getRequest();
    $response    = $this->getResponse();

    $db          = $this->getDb();
    $orm         = $db->getOrm();
    $user        = $this->getUser();
    
    $extendedConditions = array();
    


    // freitext suche
    if( $free = $httpRequest->param( 'free_search' , Validator::TEXT ) )
      $condition['free'] = $db->addSlashes( trim( $free ) );




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

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_entity_tag', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_entity_tag']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_entity_tag', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_entity_tag']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_entity_tag', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_entity_tag']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_entity_tag', Validator::DATE, 'm_time_created_after'   ) )
        $condition['wbfsys_entity_tag']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_entity_tag', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['wbfsys_entity_tag']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_entity_tag}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['wbfsys_entity_tag']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_entity_tag', Validator::EID, 'm_rowid'   ) )
        $condition['wbfsys_entity_tag']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_entity_tag', Validator::TEXT, 'm_uuid'    ) )
        $condition['wbfsys_entity_tag']['m_uuid'] = $mUuid;

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

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_tag', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_tag']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_tag', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_tag']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_tag', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_tag']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_tag', Validator::DATE , 'm_time_created_after' ) )
        $condition['wbfsys_tag']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_tag', Validator::DATE, 'm_time_changed_before'  ) )
        $condition['wbfsys_tag']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_tag', Validator::DATE, 'm_time_changed_after'  ) )
        $condition['wbfsys_tag']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_tag', Validator::EID, 'm_rowid' ) )
        $condition['wbfsys_tag']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_tag', Validator::TEXT, 'm_uuid' ) )
        $condition['wbfsys_tag']['m_uuid'] = $mUuid;






    $query = $db->newQuery( 'WbfsysEntityTag_Table' );
    $query->extendedConditions = $extendedConditions;



		if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'WbfsysEntityTag_Table_'.SParserString::subToCamelCase( $dynFilter )
          );

          if( $filter )
            $query->inject( $filter, $params );
        }
        catch( LibDb_Exception $e )
        {
          $response->addError( "Requested nonexisting filter ".$dynFilter );
        }

      }
    }


    // per exclude können regeln übergeben werden um bestimmte datensätze
    // auszublenden
    // wird häufig verwendet um bereits zugewiesenen datensätze aus zu blenden
    if( $params->exclude )
    {

      $tmp = explode( '-', $params->exclude );

      $conName   = $tmp[0];
      $srcId     = $tmp[1];
      $targetId  = $tmp[2];

      $excludeCond = ' wbfsys_entity_tag.rowid NOT IN '
      .'( select '.$targetId .' from '.$conName.' where '.$srcId.' = '.$params->objid.' and not '.$srcId.' is null ) ';

      $query->setCondition( $excludeCond );

    }

    // wenn der user nur teilberechtigungen hat, müssen die ACLs direkt beim
    // lesen der Daten berücksichtigt werden
    if
    (
      $access->isPartAssign || $access->hasPartAssign
    )
    {

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
      
    }
    else
    {

      // da die rechte scheins auf die komplette datenquelle vergeben wurden
      // kann hier auch einfach mit der ganzen quelle geladen werden
      // es wird davon ausgegangen, dass ein standard level definiert wurde
      // wenn kein standard level definiert wurde, werden die daten nur
      // aufgelistet ohne weitere interaktions möglichkeit
      $query->fetch
      (
        $condition,
        $params
      );

    }





    return $query;

  }//end public function search */

  /**
   * fill the elements in a search form
   *
   * @param LibTemplateWindow $view
   * @return boolean
   */
  public function searchForm( $view )
  {

    $searchFields = $this->getSearchFields();


    //entity wbfsys_entity_tag
    if( !$entityWbfsysEntityTag = $this->getRegisterd( 'entityWbfsysEntityTag' ) )
    {
      $entityWbfsysEntityTag   = new WbfsysEntityTag_Entity() ;
    }

    $formWbfsysEntityTag    = $view->newForm( 'WbfsysEntityTag' );
    $formWbfsysEntityTag->setNamespace( 'WbfsysEntityTag' );
    $formWbfsysEntityTag->setPrefix( 'WbfsysEntityTag' );
    $formWbfsysEntityTag->createSearchForm
    (
      $entityWbfsysEntityTag,
      ( isset($searchFields['wbfsys_entity_tag'])?$searchFields['wbfsys_entity_tag']:array() )
    );

    // management wbfsys_tag source wbfsys_tag
    if(!$entityWbfsysTag = $this->getRegisterd( 'entityWbfsysTag' ) )
    {
      $entityWbfsysTag   =  new WbfsysTag_Entity() ;
    }

    $formWbfsysTag    = $view->newForm( 'WbfsysTag' );
    $formWbfsysTag->setNamespace( 'WbfsysEntityTag' );
    $formWbfsysTag->setPrefix( 'WbfsysTag' );
    $formWbfsysTag->createSearchForm
    (
      $entityWbfsysTag,
      ( isset($searchFields['wbfsys_tag'])?$searchFields['wbfsys_tag']:array() )
    );



  }//end public function searchForm */

  /**
   * request all fields that have to be fetched from the request
   * @return array
   */
  public function getSearchFields()
  {

    return array
    (
      'wbfsys_tag' => array
      (
        'name',
      ),

    );

  }//end public function getSearchFields */

////////////////////////////////////////////////////////////////////////////////
// data provides
////////////////////////////////////////////////////////////////////////////////
    
}//end class WbfsysEntityTag_Table_Model

