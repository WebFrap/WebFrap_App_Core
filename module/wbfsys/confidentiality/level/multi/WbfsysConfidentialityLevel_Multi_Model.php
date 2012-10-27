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
class WbfsysConfidentialityLevel_Multi_Model
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
      if( !$listWbfsysConfidentialityLevel = $this->getRegisterd( 'listWbfsysConfidentialityLevel' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysConfidentialityLevel was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysConfidentialityLevel as $entityWbfsysConfidentialityLevel )
      {
        
        if( $entityWbfsysConfidentialityLevel->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysConfidentialityLevel_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysConfidentialityLevel );
            
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
                      'Confidentiality Level', 
                      'wbfsys.confidentiality_level.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
          if( !$orm->insert( $entityWbfsysConfidentialityLevel ) )
          {
            $entityText = $entityWbfsysConfidentialityLevel->text();
              
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create Confidentiality Level {@text@}',
                'wbfsys.confidentiality_level.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            
            
            $entityTexts[] = $entityWbfsysConfidentialityLevel->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysConfidentialityLevel_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysConfidentialityLevel );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update Confidentiality Level {@text@}',
                  'wbfsys.confidentiality_level.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysConfidentialityLevel ) )
          {
            $entityText = $entityWbfsysConfidentialityLevel->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save Confidentiality Level {@text@}',
                'wbfsys.confidentiality_level.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysConfidentialityLevel->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved Confidentiality Level: {@text@}',
          'wbfsys.confidentiality_level.message',
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
      if( !$listWbfsysConfidentialityLevel = $this->getRegisterd( 'listWbfsysConfidentialityLevel' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysConfidentialityLevel was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysConfidentialityLevel as $entityWbfsysConfidentialityLevel )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysConfidentialityLevel_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysConfidentialityLevel );
          
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
                    'Confidentiality Level', 
                    'wbfsys.confidentiality_level.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysConfidentialityLevel ) )
        {
          $entityText = $entityWbfsysConfidentialityLevel->text();
            
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create Confidentiality Level {@text@}',
              'wbfsys.confidentiality_level.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
          
          
          $entityTexts[] = $entityWbfsysConfidentialityLevel->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created Confidentiality Level: {@text@}',
          'wbfsys.confidentiality_level.message',
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
      if( !$listWbfsysConfidentialityLevel = $this->getRegisterd( 'listWbfsysConfidentialityLevel' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysConfidentialityLevel was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysConfidentialityLevel as $entityWbfsysConfidentialityLevel )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysConfidentialityLevel_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysConfidentialityLevel );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update Confidentiality Level {@text@}',
                'wbfsys.confidentiality_level.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysConfidentialityLevel ) )
        {
          $entityText = $entityWbfsysConfidentialityLevel->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update Confidentiality Level {@text@}',
              'wbfsys.confidentiality_level.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysConfidentialityLevel->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated Confidentiality Level: {@text@}',
          'wbfsys.confidentiality_level.message',
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
   * @param WbfsysConfidentialityLevel_Multi_Access_Delete $access
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
      
      $listWbfsysConfidentialityLevel = $orm->getByIds( 'WbfsysConfidentialityLevel', $deleteIds );

      foreach( $listWbfsysConfidentialityLevel as $entityWbfsysConfidentialityLevel )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysConfidentialityLevel_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysConfidentialityLevel );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete Confidentiality Level {@text@}',
                'wbfsys.confidentiality_level.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

        if( !$orm->delete( $entityWbfsysConfidentialityLevel ) )
        {
          $entityText = $entityWbfsysConfidentialityLevel->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete Confidentiality Level {@text@}',
              'wbfsys.confidentiality_level.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysConfidentialityLevel->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Confidentiality Level: {@text@}',
          'wbfsys.confidentiality_level.message',
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

      if( !$params->fieldsWbfsysConfidentialityLevel )
        $params->fieldsWbfsysConfidentialityLevel  = $orm->getCols( 'WbfsysConfidentialityLevel', $params->categories );

      // if the validation fails report
      $listWbfsysConfidentialityLevel = $httpRequest->validateMultiSave
      (
        'WbfsysConfidentialityLevel',
        'wbfsys_confidentiality_level',
        $params->fieldsWbfsysConfidentialityLevel
      );

      $this->register( 'listWbfsysConfidentialityLevel', $listWbfsysConfidentialityLevel );
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

      if( $params->fieldsWbfsysConfidentialityLevel )
      {
        $params->fieldsWbfsysConfidentialityLevel = $orm->getCols
        (
          'WbfsysConfidentialityLevel',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysConfidentialityLevel = $httpRequest->validateMultiInsert
      (
        'WbfsysConfidentialityLevel',
        'wbfsys_confidentiality_level',
        $params->fieldsWbfsysConfidentialityLevel
      );

      $this->register( 'listWbfsysConfidentialityLevel', $listWbfsysConfidentialityLevel );
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

      if( !$params->fieldsWbfsysConfidentialityLevel )
        $params->fieldsWbfsysConfidentialityLevel  = $orm->getCols( 'WbfsysConfidentialityLevel', $params->categories );

      // if the validation fails report
      $listWbfsysConfidentialityLevel = $httpRequest->validateMultiUpdate
      (
        'WbfsysConfidentialityLevel',
        'wbfsys_confidentiality_level',
        $params->fieldsWbfsysConfidentialityLevel
      );

      $this->register( 'listWbfsysConfidentialityLevel', $listWbfsysConfidentialityLevel );
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

}//end class WbfsysConfidentialityLevel_Multi_Model

