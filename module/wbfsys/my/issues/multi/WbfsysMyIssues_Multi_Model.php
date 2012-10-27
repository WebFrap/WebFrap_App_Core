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
class WbfsysMyIssues_Multi_Model
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
      if( !$listWbfsysMyIssues = $this->getRegisterd( 'listWbfsysMyIssues' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysMyIssues was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysMyIssues as $entityWbfsysMyIssues )
      {
        
        if( $entityWbfsysMyIssues->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysMyIssues_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysMyIssues );
            
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
                      'My Issues', 
                      'wbfsys.my_issues.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
            // build process
            $process_Handling = new IssueHandling_Process
            (
              $this->getDb()
            );
            $process_Handling->setEntity( $entityWbfsysMyIssues );
            
            // init before kann einen fehler werfen, welcher den aktuellen vorgang abbricht
            $error = $process_Handling->call( 'init', 'before', $params );
            
            if( $error )
            {
              $response->addError( $error );
              continue;
            }
            
          if( !$orm->insert( $entityWbfsysMyIssues ) )
          {
            $entityText = $entityWbfsysMyIssues->text();
              
              $process_Handling->call( 'init', 'fail', $params );
              
              
              $process_Handling->call( 'init', 'after', $params );
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create My Issues {@text@}',
                'wbfsys.my_issues.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            $process_Handling->init( );
            $process_Handling->call( 'init', 'sucess', $params );
            
            
            $process_Handling->call( 'init', 'after', $params );
            
            $entityTexts[] = $entityWbfsysMyIssues->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysMyIssues_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysMyIssues );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update My Issues {@text@}',
                  'wbfsys.my_issues.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysMyIssues ) )
          {
            $entityText = $entityWbfsysMyIssues->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save My Issues {@text@}',
                'wbfsys.my_issues.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysMyIssues->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved My Issues: {@text@}',
          'wbfsys.my_issues.message',
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
      if( !$listWbfsysMyIssues = $this->getRegisterd( 'listWbfsysMyIssues' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysMyIssues was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysMyIssues as $entityWbfsysMyIssues )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysMyIssues_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysMyIssues );
          
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
                    'My Issues', 
                    'wbfsys.my_issues.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysMyIssues ) )
        {
          $entityText = $entityWbfsysMyIssues->text();
            
                $process_Handling->call( 'init', 'fail', $params );
            
            
                $process_Handling->call( 'init', 'after', $params );
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create My Issues {@text@}',
              'wbfsys.my_issues.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
              $process_Handling->init( );
              $process_Handling->call( 'init', 'sucess', $params );
          
          
              $process_Handling->call( 'init', 'after', $params );
          
          $entityTexts[] = $entityWbfsysMyIssues->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created My Issues: {@text@}',
          'wbfsys.my_issues.message',
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
      if( !$listWbfsysMyIssues = $this->getRegisterd( 'listWbfsysMyIssues' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysMyIssues was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysMyIssues as $entityWbfsysMyIssues )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysMyIssues_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysMyIssues );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update My Issues {@text@}',
                'wbfsys.my_issues.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysMyIssues ) )
        {
          $entityText = $entityWbfsysMyIssues->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update My Issues {@text@}',
              'wbfsys.my_issues.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysMyIssues->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated My Issues: {@text@}',
          'wbfsys.my_issues.message',
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
   * @param WbfsysMyIssues_Multi_Access_Delete $access
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
      
      $listWbfsysMyIssues = $orm->getByIds( 'WbfsysMyIssues', $deleteIds );

      foreach( $listWbfsysMyIssues as $entityWbfsysMyIssues )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysMyIssues_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysMyIssues );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete My Issues {@text@}',
                'wbfsys.my_issues.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

// build process
$process_Handling = new IssueHandling_Process
(
  $this->getDb()
);

$process_Handling->load( $entityWbfsysMyIssues, $params );
$process_Handling->fetchRequest( );

// trigger before bricht bei einem Fehler automatisch den aktuellen Vorgang ab
$error = $process_Handling->call( 'delete', 'before', $params );

if( $error )
{
  $request->addError( $error );
  continue;
}

        if( !$orm->delete( $entityWbfsysMyIssues ) )
        {
          $entityText = $entityWbfsysMyIssues->text();

$process_Handling->call( 'delete', 'fail', $params );


$process_Handling->call( 'delete', 'after', $params );

          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete My Issues {@text@}',
              'wbfsys.my_issues.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {

$process_Handling->delete( $entityWbfsysMyIssues, $params );
$process_Handling->call( 'delete', 'success', $params );


$process_Handling->call( 'delete', 'after', $params );

          $entityTexts[] = $entityWbfsysMyIssues->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted My Issues: {@text@}',
          'wbfsys.my_issues.message',
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

      if( !$params->fieldsWbfsysMyIssues )
        $params->fieldsWbfsysMyIssues  = $orm->getCols( 'WbfsysIssue', $params->categories );

      // if the validation fails report
      $listWbfsysMyIssues = $httpRequest->validateMultiSave
      (
        'WbfsysIssue',
        'wbfsys_my_issues',
        $params->fieldsWbfsysMyIssues
      );

      $this->register( 'listWbfsysMyIssues', $listWbfsysMyIssues );
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

      if( $params->fieldsWbfsysMyIssues )
      {
        $params->fieldsWbfsysMyIssues = $orm->getCols
        (
          'WbfsysIssue',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysMyIssues = $httpRequest->validateMultiInsert
      (
        'WbfsysIssue',
        'wbfsys_my_issues',
        $params->fieldsWbfsysMyIssues
      );

      $this->register( 'listWbfsysMyIssues', $listWbfsysMyIssues );
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

      if( !$params->fieldsWbfsysMyIssues )
        $params->fieldsWbfsysMyIssues  = $orm->getCols( 'WbfsysIssue', $params->categories );

      // if the validation fails report
      $listWbfsysMyIssues = $httpRequest->validateMultiUpdate
      (
        'WbfsysIssue',
        'wbfsys_my_issues',
        $params->fieldsWbfsysMyIssues
      );

      $this->register( 'listWbfsysMyIssues', $listWbfsysMyIssues );
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

}//end class WbfsysMyIssues_Multi_Model

