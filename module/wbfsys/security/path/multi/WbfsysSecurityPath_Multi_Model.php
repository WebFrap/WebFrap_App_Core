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
class WbfsysSecurityPath_Multi_Model
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
      if( !$listWbfsysSecurityPath = $this->getRegisterd( 'listWbfsysSecurityPath' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysSecurityPath was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysSecurityPath as $entityWbfsysSecurityPath )
      {
        
        if( $entityWbfsysSecurityPath->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysSecurityPath_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysSecurityPath );
            
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
                      'Security Path', 
                      'wbfsys.security_path.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
          if( !$orm->insert( $entityWbfsysSecurityPath ) )
          {
            $entityText = $entityWbfsysSecurityPath->text();
              
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create Security Path {@text@}',
                'wbfsys.security_path.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            
            
            $entityTexts[] = $entityWbfsysSecurityPath->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysSecurityPath_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysSecurityPath );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update Security Path {@text@}',
                  'wbfsys.security_path.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysSecurityPath ) )
          {
            $entityText = $entityWbfsysSecurityPath->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save Security Path {@text@}',
                'wbfsys.security_path.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysSecurityPath->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved Security Path: {@text@}',
          'wbfsys.security_path.message',
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
      if( !$listWbfsysSecurityPath = $this->getRegisterd( 'listWbfsysSecurityPath' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysSecurityPath was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysSecurityPath as $entityWbfsysSecurityPath )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysSecurityPath_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysSecurityPath );
          
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
                    'Security Path', 
                    'wbfsys.security_path.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysSecurityPath ) )
        {
          $entityText = $entityWbfsysSecurityPath->text();
            
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create Security Path {@text@}',
              'wbfsys.security_path.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
          
          
          $entityTexts[] = $entityWbfsysSecurityPath->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created Security Path: {@text@}',
          'wbfsys.security_path.message',
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
      if( !$listWbfsysSecurityPath = $this->getRegisterd( 'listWbfsysSecurityPath' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysSecurityPath was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysSecurityPath as $entityWbfsysSecurityPath )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysSecurityPath_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysSecurityPath );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update Security Path {@text@}',
                'wbfsys.security_path.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysSecurityPath ) )
        {
          $entityText = $entityWbfsysSecurityPath->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update Security Path {@text@}',
              'wbfsys.security_path.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysSecurityPath->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated Security Path: {@text@}',
          'wbfsys.security_path.message',
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
   * @param WbfsysSecurityPath_Multi_Access_Delete $access
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
      
      $listWbfsysSecurityPath = $orm->getByIds( 'WbfsysSecurityPath', $deleteIds );

      foreach( $listWbfsysSecurityPath as $entityWbfsysSecurityPath )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysSecurityPath_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysSecurityPath );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete Security Path {@text@}',
                'wbfsys.security_path.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

        if( !$orm->delete( $entityWbfsysSecurityPath ) )
        {
          $entityText = $entityWbfsysSecurityPath->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete Security Path {@text@}',
              'wbfsys.security_path.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysSecurityPath->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Security Path: {@text@}',
          'wbfsys.security_path.message',
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

      if( !$params->fieldsWbfsysSecurityPath )
        $params->fieldsWbfsysSecurityPath  = $orm->getCols( 'WbfsysSecurityPath', $params->categories );

      // if the validation fails report
      $listWbfsysSecurityPath = $httpRequest->validateMultiSave
      (
        'WbfsysSecurityPath',
        'wbfsys_security_path',
        $params->fieldsWbfsysSecurityPath
      );

      $this->register( 'listWbfsysSecurityPath', $listWbfsysSecurityPath );
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

      if( $params->fieldsWbfsysSecurityPath )
      {
        $params->fieldsWbfsysSecurityPath = $orm->getCols
        (
          'WbfsysSecurityPath',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysSecurityPath = $httpRequest->validateMultiInsert
      (
        'WbfsysSecurityPath',
        'wbfsys_security_path',
        $params->fieldsWbfsysSecurityPath
      );

      $this->register( 'listWbfsysSecurityPath', $listWbfsysSecurityPath );
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

      if( !$params->fieldsWbfsysSecurityPath )
        $params->fieldsWbfsysSecurityPath  = $orm->getCols( 'WbfsysSecurityPath', $params->categories );

      // if the validation fails report
      $listWbfsysSecurityPath = $httpRequest->validateMultiUpdate
      (
        'WbfsysSecurityPath',
        'wbfsys_security_path',
        $params->fieldsWbfsysSecurityPath
      );

      $this->register( 'listWbfsysSecurityPath', $listWbfsysSecurityPath );
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

}//end class WbfsysSecurityPath_Multi_Model

