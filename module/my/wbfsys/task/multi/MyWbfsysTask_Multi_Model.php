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
class MyWbfsysTask_Multi_Model
  extends Model
{
////////////////////////////////////////////////////////////////////////////////
// persist methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * multi save action, with this action you can save multiple entries
   * for this model in the database
   * save means create if not exist and update if allready exists
   *
   * @param LibTemplateWindow $view
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function multiSave( $access, $params   )
  {

    $orm       = $this->getOrm();
    $db        = $this->getDb();
    $user      = $this->getUser();
    $response  = $this->getResponse();

    try
    {
      // start a transaction in the database
      $db->begin();

      // for insert there has to be a list of values that have to be saved
      if( !$listMyWbfsysTask = $this->getRegisterd( 'listMyWbfsysTask' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listMyWbfsysTask was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listMyWbfsysTask as $entityMyWbfsysTask )
      {
        
        if( $entityMyWbfsysTask->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new MyWbfsysTask_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityMyWbfsysTask );
            
            if( !$accessDataset->insert )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to insert new entries in {@resource@}',
                  'wbf.message',
                  array
                  (
                    'resource'  => $response->i18n->l
                    ( 
                      'My Tasks', 
                      'my.wbfsys_task.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
            // build process
            $process_Flow = new WbfsysTask_Handling_Process
            (
              $this->getDb()
            );
            $process_Flow->setEntity( $entityMyWbfsysTask );
            
            // init before kann einen fehler werfen, welcher den aktuellen vorgang abbricht
            $error = $process_Flow->call( 'init', 'before', $params );
            
            if( $error )
            {
              $response->addError( $error );
              continue;
            }
            
          if( !$orm->insert( $entityMyWbfsysTask ) )
          {
            $entityText = $entityMyWbfsysTask->text();
              
              $process_Flow->call( 'init', 'fail', $params );
              
              
              $process_Flow->call( 'init', 'after', $params );
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create My Tasks {@text@}',
                'my.wbfsys_task.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            $process_Flow->init( );
            $process_Flow->call( 'init', 'sucess', $params );
            
            
            $process_Flow->call( 'init', 'after', $params );
            
            $entityTexts[] = $entityMyWbfsysTask->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new MyWbfsysTask_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityMyWbfsysTask );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update My Tasks {@text@}',
                  'my.wbfsys_task.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityMyWbfsysTask ) )
          {
            $entityText = $entityMyWbfsysTask->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save My Tasks {@text@}',
                'my.wbfsys_task.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityMyWbfsysTask->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved My Tasks: {@text@}',
          'my.wbfsys_task.message',
          array( 'text' => $textSaved )
        )
      );

      // everything ok
      $db->commit();

    }
    catch( LibDb_Exception $e )
    {


      $db->rollback();
      return $e;
    }
    catch( Model_Exception $e )
    {


      return $e;
    }



    
    // check if there were any errors, if not fine
    return null;

  }//end public function multiSave */

  /**
   * multi save action, with this action you can save multiple entries
   * for this model in the database
   * save means create if not exist and update if allready exists
   *
   * @param LibTemplateWindow $view
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function multiInsert( $access, $params   )
  {

    $orm       = $this->getOrm();
    $db        = $this->getDb();
    $user      = $this->getUser();
    $response  = $this->getResponse();

    try
    {
      // start a transaction in the database
      $db->begin();

      // for insert there has to be a list of values that have to be saved
      if( !$listMyWbfsysTask = $this->getRegisterd( 'listMyWbfsysTask' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listMyWbfsysTask was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listMyWbfsysTask as $entityMyWbfsysTask )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new MyWbfsysTask_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityMyWbfsysTask );
          
          if( !$accessDataset->insert )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to insert new entries in {@resource@}',
                'wbf.message',
                array
                (
                  'resource'  => $response->i18n->l
                  ( 
                    'My Tasks', 
                    'my.wbfsys_task.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityMyWbfsysTask ) )
        {
          $entityText = $entityMyWbfsysTask->text();
            
                $process_Flow->call( 'init', 'fail', $params );
            
            
                $process_Flow->call( 'init', 'after', $params );
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create My Tasks {@text@}',
              'my.wbfsys_task.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
              $process_Flow->init( );
              $process_Flow->call( 'init', 'sucess', $params );
          
          
              $process_Flow->call( 'init', 'after', $params );
          
          $entityTexts[] = $entityMyWbfsysTask->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created My Tasks: {@text@}',
          'my.wbfsys_task.message',
          array( 'text' => $textSaved )
        )
      );

      // everything ok
      $db->commit();

    }
    catch( LibDb_Exception $e )
    {
      $db->rollback();
      return $e;
    }
    catch( Model_Exception $e )
    {
      return $e;
    }

    // check if there were any errors, if not fine
    return null;

  }//end public function multiInsert */

  /**
   * multi save action, with this action you can save multiple entries
   * for this model in the database
   * save means create if not exist and update if allready exists
   *
   * @param LibTemplateWindow $view
   * @param TFlag $params named parameters
   * @return boolean
   */
  public function multiUpdate( $access, $params   )
  {

    $orm       = $this->getOrm();
    $db        = $this->getDb();
    $user      = $this->getUser();
    $response  = $this->getResponse();

    try
    {
      // start a transaction in the database
      $db->begin();

      // for insert there has to be a list of values that have to be saved
      if( !$listMyWbfsysTask = $this->getRegisterd( 'listMyWbfsysTask' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listMyWbfsysTask was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listMyWbfsysTask as $entityMyWbfsysTask )
      {
        if( !$access->update )
        {
          $accessDataset = new MyWbfsysTask_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityMyWbfsysTask );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update My Tasks {@text@}',
                'my.wbfsys_task.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityMyWbfsysTask ) )
        {
          $entityText = $entityMyWbfsysTask->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update My Tasks {@text@}',
              'my.wbfsys_task.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityMyWbfsysTask->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated My Tasks: {@text@}',
          'my.wbfsys_task.message',
          array( 'text' => $textSaved )
        )
      );

      // everything ok
      $db->commit();

    }
    catch( LibDb_Exception $e )
    {
      $db->rollback();
      return $e;
    }
    catch( Model_Exception $e )
    {
      return $e;
    }

    // check if there were any errors, if not fine
    return null;

  }//end public function multiUpdate */

  /**
   * multi save action, with this action you can save multiple entries
   * for this model in the database
   * save means create if not exist and update if allready exists
   *
   * @param MyWbfsysTask_Multi_Access_Delete $access
   * @param array $deleteIds
   * @param TFlag $params named parameters
   *
   * @return boolean
   */
  public function multiDelete( $access, $deleteIds, $params   )
  {

    $orm       = $this->getOrm();
    $db        = $this->getDb();
    $user      = $this->getUser();
    $response  = $this->getResponse();

    try
    {
      // start a transaction in the database
      $db->begin();


      $entityTexts = array();
      
      $listMyWbfsysTask = $orm->getByIds( 'MyWbfsysTask', $deleteIds );

      foreach( $listMyWbfsysTask as $entityMyWbfsysTask )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new MyWbfsysTask_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityMyWbfsysTask );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete My Tasks {@text@}',
                'my.wbfsys_task.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

// build process
$process_Flow = new WbfsysTask_Handling_Process
(
  $this->getDb()
);

$process_Flow->load( $entityMyWbfsysTask, $params );
$process_Flow->fetchRequest( );

// trigger before bricht bei einem Fehler automatisch den aktuellen Vorgang ab
$error = $process_Flow->call( 'delete', 'before', $params );

if( $error )
{
  $request->addError( $error );
  continue;
}

        if( !$orm->delete( $entityMyWbfsysTask ) )
        {
          $entityText = $entityMyWbfsysTask->text();

$process_Flow->call( 'delete', 'fail', $params );


$process_Flow->call( 'delete', 'after', $params );

          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete My Tasks {@text@}',
              'my.wbfsys_task.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {

$process_Flow->delete( $entityMyWbfsysTask, $params );
$process_Flow->call( 'delete', 'success', $params );


$process_Flow->call( 'delete', 'after', $params );

          $entityTexts[] = $entityMyWbfsysTask->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted My Tasks: {@text@}',
          'my.wbfsys_task.message',
          array( 'text' => $textSaved )
        )
      );

      // everything ok
      $db->commit();

    }
    catch( LibDb_Exception $e )
    {


      $db->rollback();
      return $e;
    }
    catch( Model_Exception $e )
    {


      return $e;
    }



    // check if there were any errors, if not fine
    return null;

  }//end public function multiDelete */

////////////////////////////////////////////////////////////////////////////////
// fetch methodes
////////////////////////////////////////////////////////////////////////////////
    
  /**
   * fetch the data from the http request object for an insert
   * 
   * @param TFlag $params named parameters
   * @return null / InvalidInput_Exception im Fehlerfall
   */
  public function fetchMultiSaveData( $params  )
  {

    $httpRequest = $this->getRequest();
    $orm         = $this->getOrm();
    $response    = $this->getResponse();

    try
    {

      if( !$params->categories )
        $params->categories = array();

      if( !$params->fieldsMyWbfsysTask )
        $params->fieldsMyWbfsysTask  = $orm->getCols( 'WbfsysTask', $params->categories );

      // if the validation fails report
      $listMyWbfsysTask = $httpRequest->validateMultiSave
      (
        'WbfsysTask',
        'my_wbfsys_task',
        $params->fieldsMyWbfsysTask
      );

      $this->register( 'listMyWbfsysTask', $listMyWbfsysTask );
      return null;

    }
    catch( InvalidInput_Exception $e )
    {
      return $e;
    }

  }//end public function fetchMultiSaveData */

  /**
   * fetch the data from the http request object for an insert
   *
   * @param TFlag $params named parameters
   * @return null / InvalidInput_Exception im Fehlerfall
   */
  public function fetchMultiInsertData( $params  )
  {

    $httpRequest = $this->getRequest();
    $orm         = $this->getOrm();
    $response    = $this->getResponse();

    try
    {

      if( !$params->categories )
        $params->categories = array();

      if( $params->fieldsMyWbfsysTask )
      {
        $params->fieldsMyWbfsysTask = $orm->getCols
        (
          'WbfsysTask',
          $params->categories
        );
      }

      // if the validation fails report
      $listMyWbfsysTask = $httpRequest->validateMultiInsert
      (
        'WbfsysTask',
        'my_wbfsys_task',
        $params->fieldsMyWbfsysTask
      );

      $this->register( 'listMyWbfsysTask', $listMyWbfsysTask );
      return null;

    }
    catch( InvalidInput_Exception $e )
    {
      return $e;
    }

  }//end public function fetchMultiInsertData */

  /**
   * fetch the data from the http request object for an insert
   * 
   * @param TFlag $params named parameters
   * @return null / InvalidInput_Exception im Fehlerfall
   */
  public function fetchMultiUpdateData( $params  )
  {

    $httpRequest = $this->getRequest();
    $orm         = $this->getOrm();
    $response    = $this->getResponse();

    try
    {

      if( !$params->categories )
        $params->categories = array();

      if( !$params->fieldsMyWbfsysTask )
        $params->fieldsMyWbfsysTask  = $orm->getCols( 'WbfsysTask', $params->categories );

      // if the validation fails report
      $listMyWbfsysTask = $httpRequest->validateMultiUpdate
      (
        'WbfsysTask',
        'my_wbfsys_task',
        $params->fieldsMyWbfsysTask
      );

      $this->register( 'listMyWbfsysTask', $listMyWbfsysTask );
      return null;

    }
    catch( InvalidInput_Exception $e )
    {
      return $e;
    }

  }//end public function fetchMultiUpdateData */

  /**
   * fetch the data from the http request object for an insert
   * 
   * @param TFlag $params named parameters
   * @return null / InvalidInput_Exception im Fehlerfall
   */
  public function fetchMultiDelete( $params  )
  {

    $httpRequest = $this->getRequest();
    $response    = $this->getResponse();

    $deleteIds = $request->data( 'delid', Validator::INT );
    
    return $deleteIds;

  }//end public function fetchMultiDelete */

}//end class MyWbfsysTask_Multi_Model

