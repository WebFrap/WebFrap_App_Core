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
class MyMessage_Ref_Link_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysDataLink_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysDataLink( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysDataLink_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysDataLink(  $entity );

  }//end public function setEntity */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysDataLink_Entity
  */
  public function getEntityWbfsysDataLink( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysDataLink = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysDataLink = $this->getRegisterd( 'entityWbfsysDataLink' );


    //entity wbfsys_data_link
    if( !$entityWbfsysDataLink )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysDataLink = $orm->get( 'WbfsysDataLink', $objid ) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysdatalink with this id '.$objid,
              'wbfsys.data_link.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysDataLink', $entityWbfsysDataLink );
        $this->register( 'main_entity', $entityWbfsysDataLink );

      }
      else
      {
        $entityWbfsysDataLink   = new WbfsysDataLink_Entity() ;
        $this->register( 'entityWbfsysDataLink', $entityWbfsysDataLink );
        $this->register( 'main_entity', $entityWbfsysDataLink );
      }

    }
    elseif( $objid && $objid != $entityWbfsysDataLink->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysDataLink = $orm->get( 'WbfsysDataLink', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysdatalink with this id '.$objid,
            'wbfsys.data_link.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysDataLink', $entityWbfsysDataLink );
      $this->register( 'main_entity', $entityWbfsysDataLink );
    }

    return $entityWbfsysDataLink;

  }//end public function getEntityWbfsysDataLink */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysDataLink_Entity $entity
  */
  public function setEntityWbfsysDataLink( $entity )
  {

    $this->register( 'entityWbfsysDataLink', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysDataLink */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysDataIndex_Entity
  */
  public function getEntityWbfsysDataIndex( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysDataIndex = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysDataIndex = $this->getRegisterd( 'entityWbfsysDataIndex' );

    //entity wbfsys_data_index
    if( !$entityWbfsysDataIndex )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysDataIndex = $orm->get( 'WbfsysDataIndex', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysdataindex with this id '.$objid,
              'wbfsys.data_index.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysDataIndex', $entityWbfsysDataIndex );
        $this->register( 'main_entity', $entityWbfsysDataIndex );

      }
      else
      {
        $entityWbfsysDataIndex   = new WbfsysDataIndex_Entity() ;
        $this->register( 'entityWbfsysDataIndex', $entityWbfsysDataIndex );
        $this->register( 'main_entity', $entityWbfsysDataIndex );
      }

    }
    elseif( $objid && $objid != $entityWbfsysDataIndex->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysDataIndex = $orm->get( 'WbfsysDataIndex', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysdataindex with this id '.$objid,
            'wbfsys.data_index.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysDataIndex', $entityWbfsysDataIndex );
      $this->register( 'main_entity', $entityWbfsysDataIndex );
    }

    return $entityWbfsysDataIndex;

  }//end public function getEntityWbfsysDataIndex */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysDataIndex_Entity $entity
  */
  public function setEntityWbfsysDataIndex( $entity )
  {

    $this->register( 'entityWbfsysDataIndex', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysDataIndex */

////////////////////////////////////////////////////////////////////////////////
// crud methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * insert an entity
   * this method fetchs the activ entity from the registry an tries to
   * insert it at the database
   * all connected entities will be added too
   *
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function insert( $params )
  {

    $orm       = $this->getOrm();
    $view      = $this->getView();
    $response  = $this->getResponse();

    try
    {
      if( !$entityWbfsysDataLink = $this->getEntityWbfsysDataLink() )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'entityWbfsysDataLink was not registered'
        );
      }

      if( !$orm->insert($entityWbfsysDataLink) )
      {

        $entityText = $entityWbfsysDataLink->text();
        $response->addError
        (
          $view->i18n->l
          (
            'Failed to create Data Link {@label@}',
            'my.message.message',
            array( 'label' => $entityText )
          )
        );
      }
      else
      {
        $entityText  = $entityWbfsysDataLink->text();

        $this->getResponse()->addMessage
        (
          $view->i18n->l
          (
            'Successfully created Data Link {@label@}',
            'my.message.message',
            array( 'label' => $entityText)
          )
        );


        $this->protocol
        (
          'created new Data Link: '.$entityText,
          'create',
          $entityWbfsysDataLink
        );


      }

    }
    catch( LibDb_Exception $e )
    {

      $response->addError($e->getMessage());
    }
    catch( Model_Exception $e )
    {

      $response->addError($e->getMessage());
    }

    return !$this->getResponse()->hasErrors();

  }//end public function insert */

////////////////////////////////////////////////////////////////////////////////
// fetch methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * fetch the data from the http request object for an insert
   *
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function fetchConnectData( $params )
  {

    $httpRequest = $this->getRequest();
    $orm         = $this->getOrm();
    $view        = $this->getView();

    try
    {

      //management  wbfsys_data_link source wbfsys_data_link
      $entityWbfsysDataLink = $orm->newEntity( 'WbfsysDataLink' );

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysDataLink,
        'wbfsys_data_link',
        array( 'id_link', 'id_message' )
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysDataLink', $entityWbfsysDataLink );


      return !$this->getResponse()->hasErrors();
    }
    catch( InvalidInput_Exception $e )
    {
      return null;
    }

  }//end public function fetchConnectData */

////////////////////////////////////////////////////////////////////////////////
// check methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * check if the reference allready exists
   * @param Entity $entity
   * @return boolean
   */
  public function checkUnique( $entity = null )
  {

    $orm = $this->getOrm();

    if(!$entity)
      $entity =  $this->getRegisterd('entityWbfsysDataLink');

    return $orm->checkUnique
    (
      $entity ,
      array( 'id_link', 'id_message' )
    );

  }//end public function checkUnique */

////////////////////////////////////////////////////////////////////////////////
// get fields
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * just fetch the post data without any required validation
   * @return array
   */
  public function getCreateFields()
  {

    return array
    (
      'wbfsys_data_link' => array
      (
        'id_message',
        'id_link',
        'm_version',
      ),
      'wbfsys_data_index' => array
      (
        'name',
        'title',
        'access_key',
        'description',
        'index_content',
        'vid',
        'id_vid_entity',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class MyMessage_Ref_Link_Crud_Model

