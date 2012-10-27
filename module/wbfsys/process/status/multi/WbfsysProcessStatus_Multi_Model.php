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
class WbfsysProcessStatus_Multi_Model
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
      if( !$listWbfsysProcessStatus = $this->getRegisterd( 'listWbfsysProcessStatus' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysProcessStatus was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysProcessStatus as $entityWbfsysProcessStatus )
      {
        
        if( $entityWbfsysProcessStatus->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysProcessStatus_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysProcessStatus );
            
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
                      'Process Status', 
                      'wbfsys.process_status.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
          if( !$orm->insert( $entityWbfsysProcessStatus ) )
          {
            $entityText = $entityWbfsysProcessStatus->text();
              
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create Process Status {@text@}',
                'wbfsys.process_status.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            
            
            $entityTexts[] = $entityWbfsysProcessStatus->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysProcessStatus_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysProcessStatus );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update Process Status {@text@}',
                  'wbfsys.process_status.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysProcessStatus ) )
          {
            $entityText = $entityWbfsysProcessStatus->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save Process Status {@text@}',
                'wbfsys.process_status.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysProcessStatus->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved Process Status: {@text@}',
          'wbfsys.process_status.message',
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
      if( !$listWbfsysProcessStatus = $this->getRegisterd( 'listWbfsysProcessStatus' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysProcessStatus was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysProcessStatus as $entityWbfsysProcessStatus )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysProcessStatus_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysProcessStatus );
          
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
                    'Process Status', 
                    'wbfsys.process_status.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysProcessStatus ) )
        {
          $entityText = $entityWbfsysProcessStatus->text();
            
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create Process Status {@text@}',
              'wbfsys.process_status.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
          
          
          $entityTexts[] = $entityWbfsysProcessStatus->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created Process Status: {@text@}',
          'wbfsys.process_status.message',
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
      if( !$listWbfsysProcessStatus = $this->getRegisterd( 'listWbfsysProcessStatus' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysProcessStatus was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysProcessStatus as $entityWbfsysProcessStatus )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysProcessStatus_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysProcessStatus );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update Process Status {@text@}',
                'wbfsys.process_status.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysProcessStatus ) )
        {
          $entityText = $entityWbfsysProcessStatus->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update Process Status {@text@}',
              'wbfsys.process_status.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysProcessStatus->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated Process Status: {@text@}',
          'wbfsys.process_status.message',
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
   * @param WbfsysProcessStatus_Multi_Access_Delete $access
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
      
      $listWbfsysProcessStatus = $orm->getByIds( 'WbfsysProcessStatus', $deleteIds );

      foreach( $listWbfsysProcessStatus as $entityWbfsysProcessStatus )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysProcessStatus_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysProcessStatus );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete Process Status {@text@}',
                'wbfsys.process_status.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

        if( !$orm->delete( $entityWbfsysProcessStatus ) )
        {
          $entityText = $entityWbfsysProcessStatus->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete Process Status {@text@}',
              'wbfsys.process_status.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysProcessStatus->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Process Status: {@text@}',
          'wbfsys.process_status.message',
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

      if( !$params->fieldsWbfsysProcessStatus )
        $params->fieldsWbfsysProcessStatus  = $orm->getCols( 'WbfsysProcessStatus', $params->categories );

      // if the validation fails report
      $listWbfsysProcessStatus = $httpRequest->validateMultiSave
      (
        'WbfsysProcessStatus',
        'wbfsys_process_status',
        $params->fieldsWbfsysProcessStatus
      );

      $this->register( 'listWbfsysProcessStatus', $listWbfsysProcessStatus );
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

      if( $params->fieldsWbfsysProcessStatus )
      {
        $params->fieldsWbfsysProcessStatus = $orm->getCols
        (
          'WbfsysProcessStatus',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysProcessStatus = $httpRequest->validateMultiInsert
      (
        'WbfsysProcessStatus',
        'wbfsys_process_status',
        $params->fieldsWbfsysProcessStatus
      );

      $this->register( 'listWbfsysProcessStatus', $listWbfsysProcessStatus );
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

      if( !$params->fieldsWbfsysProcessStatus )
        $params->fieldsWbfsysProcessStatus  = $orm->getCols( 'WbfsysProcessStatus', $params->categories );

      // if the validation fails report
      $listWbfsysProcessStatus = $httpRequest->validateMultiUpdate
      (
        'WbfsysProcessStatus',
        'wbfsys_process_status',
        $params->fieldsWbfsysProcessStatus
      );

      $this->register( 'listWbfsysProcessStatus', $listWbfsysProcessStatus );
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

}//end class WbfsysProcessStatus_Multi_Model

