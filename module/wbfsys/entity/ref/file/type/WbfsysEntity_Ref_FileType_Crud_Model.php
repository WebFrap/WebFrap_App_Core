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
class WbfsysEntity_Ref_FileType_Crud_Model
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
      if( !$entityWbfsysVrefFileType = $this->getEntityWbfsysVrefFileType() )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'entityWbfsysVrefFileType was not registered'
        );
      }

      if( !$orm->insert($entityWbfsysVrefFileType) )
      {

        $entityText = $entityWbfsysVrefFileType->text();
        $response->addError
        (
          $view->i18n->l
          (
            'Failed to create Vref File Type {@label@}',
            'wbfsys.entity.message',
            array( 'label' => $entityText )
          )
        );
      }
      else
      {
        $entityText  = $entityWbfsysVrefFileType->text();

        $this->getResponse()->addMessage
        (
          $view->i18n->l
          (
            'Successfully created Vref File Type {@label@}',
            'wbfsys.entity.message',
            array( 'label' => $entityText)
          )
        );


        $this->protocol
        (
          'created new Vref File Type: '.$entityText,
          'create',
          $entityWbfsysVrefFileType
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

      //management  wbfsys_vref_file_type source wbfsys_vref_file_type
      $entityWbfsysVrefFileType = $orm->newEntity( 'WbfsysVrefFileType' );

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysVrefFileType,
        'wbfsys_vref_file_type',
        array( 'id_type', 'vid' )
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysVrefFileType', $entityWbfsysVrefFileType );


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
      $entity =  $this->getRegisterd('entityWbfsysVrefFileType');

    return $orm->checkUnique
    (
      $entity ,
      array( 'id_type', 'vid' )
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
      'wbfsys_vref_file_type' => array
      (
        'vid',
        'id_type',
        'm_version',
      ),
      'wbfsys_file_type' => array
      (
        'm_order',
        'name',
        'access_key',
        'description',
        'mimetype',
        'ending',
        'id_mgmt',
        'flag_global',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysEntity_Ref_FileType_Crud_Model

