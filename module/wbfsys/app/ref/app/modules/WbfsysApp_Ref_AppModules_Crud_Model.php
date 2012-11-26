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
class WbfsysApp_Ref_AppModules_Crud_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// getter for the entities
////////////////////////////////////////////////////////////////////////////////
    
  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysAppModules_Entity
  */
  public function getEntity( $objid = null )
  {

    return $this->getEntityWbfsysAppModules( $objid );

  }//end public function getEntity */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysAppModules_Entity $entity
  */
  public function setEntity( $entity )
  {

    $this->setEntityWbfsysAppModules(  $entity );

  }//end public function setEntity */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysAppModules_Entity
  */
  public function getEntityWbfsysAppModules( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysAppModules = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysAppModules = $this->getRegisterd( 'entityWbfsysAppModules' );


    //entity wbfsys_app_modules
    if( !$entityWbfsysAppModules )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysAppModules = $orm->get( 'WbfsysAppModules', $objid ) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysappmodules with this id '.$objid,
              'wbfsys.app_modules.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysAppModules', $entityWbfsysAppModules );
        $this->register( 'main_entity', $entityWbfsysAppModules );

      }
      else
      {
        $entityWbfsysAppModules   = new WbfsysAppModules_Entity() ;
        $this->register( 'entityWbfsysAppModules', $entityWbfsysAppModules );
        $this->register( 'main_entity', $entityWbfsysAppModules );
      }

    }
    elseif( $objid && $objid != $entityWbfsysAppModules->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysAppModules = $orm->get( 'WbfsysAppModules', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysappmodules with this id '.$objid,
            'wbfsys.app_modules.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysAppModules', $entityWbfsysAppModules );
      $this->register( 'main_entity', $entityWbfsysAppModules );
    }

    return $entityWbfsysAppModules;

  }//end public function getEntityWbfsysAppModules */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysAppModules_Entity $entity
  */
  public function setEntityWbfsysAppModules( $entity )
  {

    $this->register( 'entityWbfsysAppModules', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysAppModules */

  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param int $objid
  * @return WbfsysModule_Entity
  */
  public function getEntityWbfsysModule( $objid = null )
  {

    $response = $this->getResponse();
    
    if( !$entityWbfsysModule = $this->getRegisterd( 'main_entity' ) )
      $entityWbfsysModule = $this->getRegisterd( 'entityWbfsysModule' );

    //entity wbfsys_module
    if( !$entityWbfsysModule )
    {

      if( !is_null( $objid ) )
      {
        $orm = $this->getOrm();

        if( !$entityWbfsysModule = $orm->get( 'WbfsysModule', $objid) )
        {
          $response->addError
          (
            $response->i18n->l
            (
              'There is no wbfsysmodule with this id '.$objid,
              'wbfsys.module.message'
            )
          );
          return null;
        }

        $this->register( 'entityWbfsysModule', $entityWbfsysModule );
        $this->register( 'main_entity', $entityWbfsysModule );

      }
      else
      {
        $entityWbfsysModule   = new WbfsysModule_Entity() ;
        $this->register( 'entityWbfsysModule', $entityWbfsysModule );
        $this->register( 'main_entity', $entityWbfsysModule );
      }

    }
    elseif( $objid && $objid != $entityWbfsysModule->getId() )
    {
      $orm = $this->getOrm();

      if( !$entityWbfsysModule = $orm->get( 'WbfsysModule', $objid) )
      {
        $response->addError
        (
          $response->i18n->l
          (
            'There is no wbfsysmodule with this id '.$objid,
            'wbfsys.module.message'
          )
        );
        return null;
      }

      $this->register( 'entityWbfsysModule', $entityWbfsysModule );
      $this->register( 'main_entity', $entityWbfsysModule );
    }

    return $entityWbfsysModule;

  }//end public function getEntityWbfsysModule */


  /**
  * returns the activ main entity with data, or creates a empty one
  * and returns it instead
  * @param WbfsysModule_Entity $entity
  */
  public function setEntityWbfsysModule( $entity )
  {

    $this->register( 'entityWbfsysModule', $entity );
    $this->register( 'main_entity', $entity );

  }//end public function setEntityWbfsysModule */

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
      if( !$entityWbfsysAppModules = $this->getEntityWbfsysAppModules() )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'entityWbfsysAppModules was not registered'
        );
      }

      if( !$orm->insert( $entityWbfsysAppModules ) )
      {

        $entityText = $entityWbfsysAppModules->text();
        $response->addError
        (
          $view->i18n->l
          (
            'Failed to create App Modules {@label@}',
            'wbfsys.app.message',
            array( 'label' => $entityText )
          )
        );
      }
      else
      {
        $entityText  = $entityWbfsysAppModules->text();

        $this->getResponse()->addMessage
        (
          $view->i18n->l
          (
            'Successfully created App Modules {@label@}',
            'wbfsys.app.message',
            array( 'label' => $entityText)
          )
        );


        $this->protocol
        (
          'created new App Modules: '.$entityText,
          'create',
          $entityWbfsysAppModules
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

      //management  wbfsys_app_modules source wbfsys_app_modules
      $entityWbfsysAppModules = $orm->newEntity( 'WbfsysAppModules' );

      // if the validation fails report
      $httpRequest->validateInsert
      (
        $entityWbfsysAppModules,
        'wbfsys_app_modules',
        array( 'id_module', 'id_app' )
      );

      // register the entity in the mode registry
      $this->register( 'entityWbfsysAppModules', $entityWbfsysAppModules );


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
      $entity =  $this->getRegisterd('entityWbfsysAppModules');

    return $orm->checkUnique
    (
      $entity ,
      array( 'id_module', 'id_app' )
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
      'wbfsys_app_modules' => array
      (
        'id_app',
        'id_module',
        'm_version',
      ),
      'wbfsys_module' => array
      (
        'name',
        'access_key',
        'id_security_area',
        'description',
        'revision',
        'm_version',
      ),

    );

  }//end public function getCreateFields */

}//end class WbfsysApp_Ref_AppModules_Crud_Model

