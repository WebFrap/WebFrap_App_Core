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
class WbfsysProcessStep_Multi_Model
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
      if( !$listWbfsysProcessStep = $this->getRegisterd( 'listWbfsysProcessStep' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysProcessStep was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysProcessStep as $entityWbfsysProcessStep )
      {
        
        if( $entityWbfsysProcessStep->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysProcessStep_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysProcessStep );
            
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
                      'Process Step', 
                      'wbfsys.process_step.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
          if( !$orm->insert( $entityWbfsysProcessStep ) )
          {
            $entityText = $entityWbfsysProcessStep->text();
              
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create Process Step {@text@}',
                'wbfsys.process_step.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            
            
            $entityTexts[] = $entityWbfsysProcessStep->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysProcessStep_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysProcessStep );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update Process Step {@text@}',
                  'wbfsys.process_step.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysProcessStep ) )
          {
            $entityText = $entityWbfsysProcessStep->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save Process Step {@text@}',
                'wbfsys.process_step.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysProcessStep->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved Process Step: {@text@}',
          'wbfsys.process_step.message',
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
      if( !$listWbfsysProcessStep = $this->getRegisterd( 'listWbfsysProcessStep' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysProcessStep was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysProcessStep as $entityWbfsysProcessStep )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysProcessStep_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysProcessStep );
          
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
                    'Process Step', 
                    'wbfsys.process_step.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysProcessStep ) )
        {
          $entityText = $entityWbfsysProcessStep->text();
            
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create Process Step {@text@}',
              'wbfsys.process_step.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
          
          
          $entityTexts[] = $entityWbfsysProcessStep->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created Process Step: {@text@}',
          'wbfsys.process_step.message',
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
      if( !$listWbfsysProcessStep = $this->getRegisterd( 'listWbfsysProcessStep' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysProcessStep was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysProcessStep as $entityWbfsysProcessStep )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysProcessStep_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysProcessStep );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update Process Step {@text@}',
                'wbfsys.process_step.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysProcessStep ) )
        {
          $entityText = $entityWbfsysProcessStep->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update Process Step {@text@}',
              'wbfsys.process_step.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysProcessStep->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated Process Step: {@text@}',
          'wbfsys.process_step.message',
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
   * @param WbfsysProcessStep_Multi_Access_Delete $access
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
      
      $listWbfsysProcessStep = $orm->getByIds( 'WbfsysProcessStep', $deleteIds );

      foreach( $listWbfsysProcessStep as $entityWbfsysProcessStep )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysProcessStep_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysProcessStep );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete Process Step {@text@}',
                'wbfsys.process_step.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

        if( !$orm->delete( $entityWbfsysProcessStep ) )
        {
          $entityText = $entityWbfsysProcessStep->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete Process Step {@text@}',
              'wbfsys.process_step.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysProcessStep->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Process Step: {@text@}',
          'wbfsys.process_step.message',
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

      if( !$params->fieldsWbfsysProcessStep )
        $params->fieldsWbfsysProcessStep  = $orm->getCols( 'WbfsysProcessStep', $params->categories );

      // if the validation fails report
      $listWbfsysProcessStep = $httpRequest->validateMultiSave
      (
        'WbfsysProcessStep',
        'wbfsys_process_step',
        $params->fieldsWbfsysProcessStep
      );

      $this->register( 'listWbfsysProcessStep', $listWbfsysProcessStep );
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

      if( $params->fieldsWbfsysProcessStep )
      {
        $params->fieldsWbfsysProcessStep = $orm->getCols
        (
          'WbfsysProcessStep',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysProcessStep = $httpRequest->validateMultiInsert
      (
        'WbfsysProcessStep',
        'wbfsys_process_step',
        $params->fieldsWbfsysProcessStep
      );

      $this->register( 'listWbfsysProcessStep', $listWbfsysProcessStep );
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

      if( !$params->fieldsWbfsysProcessStep )
        $params->fieldsWbfsysProcessStep  = $orm->getCols( 'WbfsysProcessStep', $params->categories );

      // if the validation fails report
      $listWbfsysProcessStep = $httpRequest->validateMultiUpdate
      (
        'WbfsysProcessStep',
        'wbfsys_process_step',
        $params->fieldsWbfsysProcessStep
      );

      $this->register( 'listWbfsysProcessStep', $listWbfsysProcessStep );
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

}//end class WbfsysProcessStep_Multi_Model

