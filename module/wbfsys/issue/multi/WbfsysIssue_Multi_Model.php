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
class WbfsysIssue_Multi_Model
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
      if( !$listWbfsysIssue = $this->getRegisterd( 'listWbfsysIssue' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysIssue was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysIssue as $entityWbfsysIssue )
      {
        
        if( $entityWbfsysIssue->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysIssue_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysIssue );
            
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
                      'Issue', 
                      'wbfsys.issue.label' 
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
            $process_Handling->setEntity( $entityWbfsysIssue );
            
            // init before kann einen fehler werfen, welcher den aktuellen vorgang abbricht
            $error = $process_Handling->call( 'init', 'before', $params );
            
            if( $error )
            {
              $response->addError( $error );
              continue;
            }
            
          if( !$orm->insert( $entityWbfsysIssue ) )
          {
            $entityText = $entityWbfsysIssue->text();
              
              $process_Handling->call( 'init', 'fail', $params );
              
              
              $process_Handling->call( 'init', 'after', $params );
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create Issue {@text@}',
                'wbfsys.issue.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            $process_Handling->init( );
            $process_Handling->call( 'init', 'sucess', $params );
            
            
            $process_Handling->call( 'init', 'after', $params );
            
            $entityTexts[] = $entityWbfsysIssue->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysIssue_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysIssue );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update Issue {@text@}',
                  'wbfsys.issue.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysIssue ) )
          {
            $entityText = $entityWbfsysIssue->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save Issue {@text@}',
                'wbfsys.issue.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysIssue->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved Issue: {@text@}',
          'wbfsys.issue.message',
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
      if( !$listWbfsysIssue = $this->getRegisterd( 'listWbfsysIssue' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysIssue was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysIssue as $entityWbfsysIssue )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysIssue_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysIssue );
          
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
                    'Issue', 
                    'wbfsys.issue.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysIssue ) )
        {
          $entityText = $entityWbfsysIssue->text();
            
                $process_Handling->call( 'init', 'fail', $params );
            
            
                $process_Handling->call( 'init', 'after', $params );
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create Issue {@text@}',
              'wbfsys.issue.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
              $process_Handling->init( );
              $process_Handling->call( 'init', 'sucess', $params );
          
          
              $process_Handling->call( 'init', 'after', $params );
          
          $entityTexts[] = $entityWbfsysIssue->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created Issue: {@text@}',
          'wbfsys.issue.message',
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
      if( !$listWbfsysIssue = $this->getRegisterd( 'listWbfsysIssue' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysIssue was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysIssue as $entityWbfsysIssue )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysIssue_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysIssue );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update Issue {@text@}',
                'wbfsys.issue.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysIssue ) )
        {
          $entityText = $entityWbfsysIssue->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update Issue {@text@}',
              'wbfsys.issue.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysIssue->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated Issue: {@text@}',
          'wbfsys.issue.message',
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
   * @param WbfsysIssue_Multi_Access_Delete $access
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
      
      $listWbfsysIssue = $orm->getByIds( 'WbfsysIssue', $deleteIds );

      foreach( $listWbfsysIssue as $entityWbfsysIssue )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysIssue_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysIssue );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete Issue {@text@}',
                'wbfsys.issue.message',
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

$process_Handling->load( $entityWbfsysIssue, $params );
$process_Handling->fetchRequest( );

// trigger before bricht bei einem Fehler automatisch den aktuellen Vorgang ab
$error = $process_Handling->call( 'delete', 'before', $params );

if( $error )
{
  $request->addError( $error );
  continue;
}

        if( !$orm->delete( $entityWbfsysIssue ) )
        {
          $entityText = $entityWbfsysIssue->text();

$process_Handling->call( 'delete', 'fail', $params );


$process_Handling->call( 'delete', 'after', $params );

          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete Issue {@text@}',
              'wbfsys.issue.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {

$process_Handling->delete( $entityWbfsysIssue, $params );
$process_Handling->call( 'delete', 'success', $params );


$process_Handling->call( 'delete', 'after', $params );

          $entityTexts[] = $entityWbfsysIssue->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Issue: {@text@}',
          'wbfsys.issue.message',
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

      if( !$params->fieldsWbfsysIssue )
        $params->fieldsWbfsysIssue  = $orm->getCols( 'WbfsysIssue', $params->categories );

      // if the validation fails report
      $listWbfsysIssue = $httpRequest->validateMultiSave
      (
        'WbfsysIssue',
        'wbfsys_issue',
        $params->fieldsWbfsysIssue
      );

      $this->register( 'listWbfsysIssue', $listWbfsysIssue );
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

      if( $params->fieldsWbfsysIssue )
      {
        $params->fieldsWbfsysIssue = $orm->getCols
        (
          'WbfsysIssue',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysIssue = $httpRequest->validateMultiInsert
      (
        'WbfsysIssue',
        'wbfsys_issue',
        $params->fieldsWbfsysIssue
      );

      $this->register( 'listWbfsysIssue', $listWbfsysIssue );
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

      if( !$params->fieldsWbfsysIssue )
        $params->fieldsWbfsysIssue  = $orm->getCols( 'WbfsysIssue', $params->categories );

      // if the validation fails report
      $listWbfsysIssue = $httpRequest->validateMultiUpdate
      (
        'WbfsysIssue',
        'wbfsys_issue',
        $params->fieldsWbfsysIssue
      );

      $this->register( 'listWbfsysIssue', $listWbfsysIssue );
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

}//end class WbfsysIssue_Multi_Model

