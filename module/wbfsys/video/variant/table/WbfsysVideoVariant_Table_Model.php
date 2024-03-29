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
class WbfsysVideoVariant_Table_Model
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
  * @return WbfsysVideoVariant_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysVideoVariant( $objid );

  }//end public function getEntity */

  /**
  * Setzen der Haupt Entity, unabhängig vom Maskenname
  * @param WbfsysVideoVariant_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysVideoVariant( $entity );

  }//end public function setEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysVideoVariant_Entity
  */
  public function getEntityWbfsysVideoVariant( $objid = null )
  {

    $response = $this->getResponse();

    if( !$entityWbfsysVideoVariant = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysVideoVariant = $this->getRegisterd( 'entityWbfsysVideoVariant' );

    //entity wbfsys_video_variant
    if( !$entityWbfsysVideoVariant )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysVideoVariant = $orm->get( 'WbfsysVideoVariant', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysvideovariant with this id '.$objid,
              'wbfsys.video_variant.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysVideoVariant', $entityWbfsysVideoVariant );
        $this->register( 'main_entity', $entityWbfsysVideoVariant);

      }
      else
      {
        $entityWbfsysVideoVariant   = new WbfsysVideoVariant_Entity() ;
        $this->register( 'entityWbfsysVideoVariant', $entityWbfsysVideoVariant );
        $this->register( 'main_entity', $entityWbfsysVideoVariant);
      }

    }
    elseif( $objid && $objid != $entityWbfsysVideoVariant->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysVideoVariant = $orm->get( 'WbfsysVideoVariant', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysvideovariant with this id '.$objid,
            'wbfsys.video_variant.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysVideoVariant', $entityWbfsysVideoVariant);
      $this->register( 'main_entity', $entityWbfsysVideoVariant);
    }

    return $entityWbfsysVideoVariant;

  }//end public function getEntityWbfsysVideoVariant */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysVideoVariant_Entity $entity
  */
  public function setEntityWbfsysVideoVariant( $entity )
  {

    $this->register( 'entityWbfsysVideoVariant', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysVideoVariant */

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

    $data['wbfsys_video_variant']  = $this->getEntityWbfsysVideoVariant();


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
    if( $data['wbfsys_video_variant']->id_video_codec )
    {
      $valWbfsysVideoCodec = $orm->getField
      (
        'WbfsysVideoCodec',
        'rowid = '.$data['wbfsys_video_variant']->id_video_codec,
        'name'
      );
      $tabData['wbfsys_video_codec_name'] = $valWbfsysVideoCodec;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_video_codec_name'] = '';
    }

    // if we have a value, try to load the display field (codeTableRefFields 4)
    if( $data['wbfsys_video_variant']->id_audio_codec )
    {
      $valWbfsysAudioCodec = $orm->getField
      (
        'WbfsysAudioCodec',
        'rowid = '.$data['wbfsys_video_variant']->id_audio_codec,
        'name'
      );
      $tabData['wbfsys_audio_codec_name'] = $valWbfsysAudioCodec;
    }
    else
    {
      // else just set an empty string, fastest way ;-)
      $tabData['wbfsys_audio_codec_name'] = '';
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




      if( !$fieldsWbfsysVideoVariant = $this->getRegisterd( 'search_fields_wbfsys_video_variant' ) )
      {
         $fieldsWbfsysVideoVariant   = $orm->getSearchCols( 'WbfsysVideoVariant' );
      }

      if( $refs = $httpRequest->dataSearchIds( 'search_wbfsys_video_variant' ) )
      {
        $fieldsWbfsysVideoVariant = array_unique( array_merge
        (
          $fieldsWbfsysVideoVariant,
          $refs
        ));
      }

      $filterWbfsysVideoVariant     = $httpRequest->checkSearchInput
      (
        $orm->getValidationData( 'WbfsysVideoVariant', $fieldsWbfsysVideoVariant ),
        $orm->getErrorMessages( 'WbfsysVideoVariant'  ),
        'search_wbfsys_video_variant'
      );
      $condition['wbfsys_video_variant'] = $filterWbfsysVideoVariant->getData();

      if( $mRoleCreate = $httpRequest->param( 'search_wbfsys_video_variant', Validator::EID, 'm_role_create'   ) )
        $condition['wbfsys_video_variant']['m_role_create'] = $mRoleCreate;

      if( $mRoleChange = $httpRequest->param( 'search_wbfsys_video_variant', Validator::EID, 'm_role_change'   ) )
        $condition['wbfsys_video_variant']['m_role_change'] = $mRoleChange;

      if( $mTimeCreatedBefore = $httpRequest->param( 'search_wbfsys_video_variant', Validator::DATE, 'm_time_created_before'   ) )
        $condition['wbfsys_video_variant']['m_time_created_before'] = $mTimeCreatedBefore;

      if( $mTimeCreatedAfter = $httpRequest->param( 'search_wbfsys_video_variant', Validator::DATE, 'm_time_created_after'   ) )
        $condition['wbfsys_video_variant']['m_time_created_after'] = $mTimeCreatedAfter;

      if( $mTimeChangedBefore = $httpRequest->param( 'search_wbfsys_video_variant', Validator::DATE, 'm_time_changed_before'   ) )
        $condition['wbfsys_video_variant']['m_time_changed_before'] = $mTimeChangedBefore;

      if( $mTimeChangedAfter = $httpRequest->param( 'search_wbfsys_video_variant}', Validator::DATE, 'm_time_changed_after'   ) )
        $condition['wbfsys_video_variant']['m_time_changed_after'] = $mTimeChangedAfter;

      if( $mRowid = $httpRequest->param( 'search_wbfsys_video_variant', Validator::EID, 'm_rowid'   ) )
        $condition['wbfsys_video_variant']['m_rowid'] = $mRowid;

      if( $mUuid = $httpRequest->param( 'search_wbfsys_video_variant', Validator::TEXT, 'm_uuid'    ) )
        $condition['wbfsys_video_variant']['m_uuid'] = $mUuid;






    $query = $db->newQuery( 'WbfsysVideoVariant_Table' );
    $query->extendedConditions = $extendedConditions;



		if( $params->dynFilters )
    {
      foreach( $params->dynFilters as $dynFilter  )
      {
        try
        {
          $filter = $db->newFilter
          (
            'WbfsysVideoVariant_Table_'.SParserString::subToCamelCase( $dynFilter )
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

      $excludeCond = ' wbfsys_video_variant.rowid NOT IN '
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


    //entity wbfsys_video_variant
    if( !$entityWbfsysVideoVariant = $this->getRegisterd( 'entityWbfsysVideoVariant' ) )
    {
      $entityWbfsysVideoVariant   = new WbfsysVideoVariant_Entity() ;
    }

    $formWbfsysVideoVariant    = $view->newForm( 'WbfsysVideoVariant' );
    $formWbfsysVideoVariant->setNamespace( 'WbfsysVideoVariant' );
    $formWbfsysVideoVariant->setPrefix( 'WbfsysVideoVariant' );
    $formWbfsysVideoVariant->createSearchForm
    (
      $entityWbfsysVideoVariant,
      ( isset($searchFields['wbfsys_video_variant'])?$searchFields['wbfsys_video_variant']:array() )
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
      'wbfsys_video_variant' => array
      (
        'id_video_codec',
        'id_audio_codec',
      ),

    );

  }//end public function getSearchFields */

}//end class WbfsysVideoVariant_Table_Model

