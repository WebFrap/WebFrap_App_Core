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
class WbfsysOsVersion_Multi_Model
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
      if( !$listWbfsysOsVersion = $this->getRegisterd( 'listWbfsysOsVersion' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysOsVersion was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysOsVersion as $entityWbfsysOsVersion )
      {
        
        if( $entityWbfsysOsVersion->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysOsVersion_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysOsVersion );
            
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
                      'OS Version', 
                      'wbfsys.os_version.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
          if( !$orm->insert( $entityWbfsysOsVersion ) )
          {
            $entityText = $entityWbfsysOsVersion->text();
              
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create OS Version {@text@}',
                'wbfsys.os_version.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            
            
            $entityTexts[] = $entityWbfsysOsVersion->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysOsVersion_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysOsVersion );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update OS Version {@text@}',
                  'wbfsys.os_version.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysOsVersion ) )
          {
            $entityText = $entityWbfsysOsVersion->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save OS Version {@text@}',
                'wbfsys.os_version.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysOsVersion->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved OS Version: {@text@}',
          'wbfsys.os_version.message',
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
      if( !$listWbfsysOsVersion = $this->getRegisterd( 'listWbfsysOsVersion' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysOsVersion was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysOsVersion as $entityWbfsysOsVersion )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysOsVersion_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysOsVersion );
          
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
                    'OS Version', 
                    'wbfsys.os_version.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysOsVersion ) )
        {
          $entityText = $entityWbfsysOsVersion->text();
            
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create OS Version {@text@}',
              'wbfsys.os_version.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
          
          
          $entityTexts[] = $entityWbfsysOsVersion->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created OS Version: {@text@}',
          'wbfsys.os_version.message',
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
      if( !$listWbfsysOsVersion = $this->getRegisterd( 'listWbfsysOsVersion' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysOsVersion was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysOsVersion as $entityWbfsysOsVersion )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysOsVersion_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysOsVersion );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update OS Version {@text@}',
                'wbfsys.os_version.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysOsVersion ) )
        {
          $entityText = $entityWbfsysOsVersion->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update OS Version {@text@}',
              'wbfsys.os_version.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysOsVersion->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated OS Version: {@text@}',
          'wbfsys.os_version.message',
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
   * @param WbfsysOsVersion_Multi_Access_Delete $access
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
      
      $listWbfsysOsVersion = $orm->getByIds( 'WbfsysOsVersion', $deleteIds );

      foreach( $listWbfsysOsVersion as $entityWbfsysOsVersion )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysOsVersion_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysOsVersion );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete OS Version {@text@}',
                'wbfsys.os_version.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

        if( !$orm->delete( $entityWbfsysOsVersion ) )
        {
          $entityText = $entityWbfsysOsVersion->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete OS Version {@text@}',
              'wbfsys.os_version.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysOsVersion->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted OS Version: {@text@}',
          'wbfsys.os_version.message',
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

      if( !$params->fieldsWbfsysOsVersion )
        $params->fieldsWbfsysOsVersion  = $orm->getCols( 'WbfsysOsVersion', $params->categories );

      // if the validation fails report
      $listWbfsysOsVersion = $httpRequest->validateMultiSave
      (
        'WbfsysOsVersion',
        'wbfsys_os_version',
        $params->fieldsWbfsysOsVersion
      );

      $this->register( 'listWbfsysOsVersion', $listWbfsysOsVersion );
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

      if( $params->fieldsWbfsysOsVersion )
      {
        $params->fieldsWbfsysOsVersion = $orm->getCols
        (
          'WbfsysOsVersion',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysOsVersion = $httpRequest->validateMultiInsert
      (
        'WbfsysOsVersion',
        'wbfsys_os_version',
        $params->fieldsWbfsysOsVersion
      );

      $this->register( 'listWbfsysOsVersion', $listWbfsysOsVersion );
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

      if( !$params->fieldsWbfsysOsVersion )
        $params->fieldsWbfsysOsVersion  = $orm->getCols( 'WbfsysOsVersion', $params->categories );

      // if the validation fails report
      $listWbfsysOsVersion = $httpRequest->validateMultiUpdate
      (
        'WbfsysOsVersion',
        'wbfsys_os_version',
        $params->fieldsWbfsysOsVersion
      );

      $this->register( 'listWbfsysOsVersion', $listWbfsysOsVersion );
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

}//end class WbfsysOsVersion_Multi_Model

