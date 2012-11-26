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
class WbfsysRoleGroup_Treetable_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    

  /**
  * Erfragen der Haupt Entity unabhängig vom Maskenname
  * @param int $objid
  * @return WbfsysRoleGroup_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysRoleGroup( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysRoleGroup_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysRoleGroup( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysRoleGroup_Entity
  */
  public function getEntityWbfsysRoleGroup( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysRoleGroup = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysRoleGroup = $this->getRegisterd( 'entityWbfsysRoleGroup' );

    //entity wbfsys_role_group
    if( !$entityWbfsysRoleGroup )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysRoleGroup = $orm->get( 'WbfsysRoleGroup', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysrolegroup with this id '.$objid,
              'wbfsys.role_group.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysRoleGroup', $entityWbfsysRoleGroup );
        $this->register( 'main_entity', $entityWbfsysRoleGroup);

      }
      else
      {
        $entityWbfsysRoleGroup   = new WbfsysRoleGroup_Entity() ;
        $this->register( 'entityWbfsysRoleGroup', $entityWbfsysRoleGroup );
        $this->register( 'main_entity', $entityWbfsysRoleGroup);
      }

    }
    elseif( $objid && $objid != $entityWbfsysRoleGroup->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysRoleGroup = $orm->get( 'WbfsysRoleGroup', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysrolegroup with this id '.$objid,
            'wbfsys.role_group.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysRoleGroup', $entityWbfsysRoleGroup);
      $this->register( 'main_entity', $entityWbfsysRoleGroup);
    }

    return $entityWbfsysRoleGroup;

  }//end public function getEntityWbfsysRoleGroup */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysRoleGroup_Entity $entity
  */
  public function setEntityWbfsysRoleGroup( $entity )
  {

    $this->register( 'entityWbfsysRoleGroup', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysRoleGroup */

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

    $data['wbfsys_role_group']  = $this->getEntityWbfsysRoleGroup();


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
    if( $data['wbfsys_role_group']->id_mandant )
    {
      $valWbfsysRoleMandant = $orm->getField
      (
        'WbfsysRoleMandant',
        'rowid = '.$data['wbfsys_role_group']->id_mandant,
        'name'
      );
      $tabData['wbfsys_role_mandant_name'] = $valWbfsysRoleMandant;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_role_mandant_name'] = '';
    }

    // if we have a value, try to load the display field (codeTableRefFields 4)
    if( $data['wbfsys_role_group']->id_type )
    {
      $valWbfsysRoleGroupType = $orm->getField
      (
        'WbfsysRoleGroupType',
        'rowid = '.$data['wbfsys_role_group']->id_type,
        'name'
      );
      $tabData['wbfsys_role_group_type_name'] = $valWbfsysRoleGroupType;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_role_group_type_name'] = '';
    }


    return $tabData;

  }// end public function getEntryData */

////////////////////////////////////////////////////////////////////////////////
// context: treetable
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




      if( !$fieldsWbfsysRoleGroup = $this->getRegisterd( 'search_fields_wbfsys_role_group' ) )
      {
         $fieldsWbfsysRoleGroup   = $orm->getSearchCols( 'WbfsysRoleGroup' );
      }

      if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_role_group' ) )
      {
        $fieldsWbfsysRoleGroup = array_unique( array_merge
        (
          $fieldsWbfsysRoleGroup,
          $refs
        ));
      }

      $filterWbfsysRoleGroup     = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'WbfsysRoleGroup', $fieldsWbfsysRoleGroup ),
        $orm->getErrorMessages( 'WbfsysRoleGroup'  ),
        'search_wbfsys_role_group'
      );
      $condition['wbfsys_role_group'] = $filterWbfsysRoleGroup->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_role_group', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_role_group']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_role_group', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_role_group']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_role_group', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_role_group']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_role_group', Validator::DATE, 'm_time_created_after'   ) )
        $condition['wbfsys_role_group']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_role_group', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['wbfsys_role_group']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_role_group}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['wbfsys_role_group']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_role_group', Validator::EID, 'm_rowid'   ) )
        $condition['wbfsys_role_group']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_role_group', Validator::TEXT, 'm_uuid'    ) )
        $condition['wbfsys_role_group']['m_uuid'] = $mUuid;






    $query = $db->newQuery( 'WbfsysRoleGroup_Treetable' );
    $query->extendedConditions = $extendedConditions;



		if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'WbfsysRoleGroup_Treetable_'.SParserString::subToCamelCase( $dynFilter )
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

      $excludeCond = ' wbfsys_role_group.rowid NOT IN '
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
        'treetable',
        $condition,
        $params
      );
            $query->fetchInAcls
      (
        $validKeys,
        $access,
        $condition,
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


    //entity wbfsys_role_group
    if( !$entityWbfsysRoleGroup = $this->getRegisterd( 'entityWbfsysRoleGroup' ) )
    {
      $entityWbfsysRoleGroup   = new WbfsysRoleGroup_Entity() ;
    }

    $formWbfsysRoleGroup    = $view->newForm( 'WbfsysRoleGroup' );
    $formWbfsysRoleGroup->setNamespace( 'WbfsysRoleGroup' );
    $formWbfsysRoleGroup->setPrefix( 'WbfsysRoleGroup' );
    $formWbfsysRoleGroup->createSearchForm
    (
      $entityWbfsysRoleGroup,
      ( isset($searchFields['wbfsys_role_group'])?$searchFields['wbfsys_role_group']:array() )
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
      'wbfsys_role_group' => array
      (
        'name',
        'access_key',
        'id_type',
      ),

    );

  }//end public function getSearchFields */

}//end class WbfsysRoleGroup_Treetable_Model

