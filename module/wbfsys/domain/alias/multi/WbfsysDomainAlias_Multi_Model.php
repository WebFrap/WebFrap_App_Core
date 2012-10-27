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
class WbfsysDomainAlias_Multi_Model
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
      if( !$listWbfsysDomainAlias = $this->getRegisterd( 'listWbfsysDomainAlias' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysDomainAlias was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysDomainAlias as $entityWbfsysDomainAlias )
      {
        
        if( $entityWbfsysDomainAlias->isNew() )
        {
        
          if( !$access->insert )
          {
            $accessDataset = new WbfsysDomainAlias_Crud_Access_Insert( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysDomainAlias );
            
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
                      'Domain Alias', 
                      'wbfsys.domain_alias.label' 
                     )
                  )
                )
              );
              continue;          
            }
          }
            
          if( !$orm->insert( $entityWbfsysDomainAlias ) )
          {
            $entityText = $entityWbfsysDomainAlias->text();
              
              
            $response->addError
            (
              $response->i18n->l
              (
                'Failed to create Domain Alias {@text@}',
                'wbfsys.domain_alias.message',
                array( 'text' => $entityText)
              )
            );
            
          }
          else
          {
            
            
            $entityTexts[] = $entityWbfsysDomainAlias->text();
          }
          
        }
        else
        {
        
          if( !$access->update )
          {
            $accessDataset = new WbfsysDomainAlias_Crud_Access_Update( null, null, $this );
            $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysDomainAlias );
            
            if( !$accessDataset->update )
            {
              $response->addError
              (
                $response->i18n->l
                (
                  'You have no permission to update Domain Alias {@text@}',
                  'wbfsys.domain_alias.message',
                  array( 'text' => $entityText )
                )
              );
              continue;          
            }
          }

          if( !$orm->update( $entityWbfsysDomainAlias ) )
          {
            $entityText = $entityWbfsysDomainAlias->text();


            $response->addError
            (
              $response->i18n->l
              (
                'Failed to save Domain Alias {@text@}',
                'wbfsys.domain_alias.message',
                array( 'text' => $entityText)
              )
            );
          }
          else
          {


            $entityTexts[] = $entityWbfsysDomainAlias->text();
          }
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully saved Domain Alias: {@text@}',
          'wbfsys.domain_alias.message',
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
      if( !$listWbfsysDomainAlias = $this->getRegisterd( 'listWbfsysDomainAlias' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysDomainAlias was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysDomainAlias as $entityWbfsysDomainAlias )
      {
      
        if( !$access->insert )
        {
          $accessDataset = new WbfsysDomainAlias_Crud_Access_Insert( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysDomainAlias );
          
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
                    'Domain Alias', 
                    'wbfsys.domain_alias.label' 
                   )
                )
              )
            );
            continue;          
          }
        }
        

        if( !$orm->insert( $entityWbfsysDomainAlias ) )
        {
          $entityText = $entityWbfsysDomainAlias->text();
            
            
          $response->addError
          (
            $response->i18n->l
            (
              'Failed to create Domain Alias {@text@}',
              'wbfsys.domain_alias.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {
          
          
          $entityTexts[] = $entityWbfsysDomainAlias->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully created Domain Alias: {@text@}',
          'wbfsys.domain_alias.message',
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
      if( !$listWbfsysDomainAlias = $this->getRegisterd( 'listWbfsysDomainAlias' ) )
      {
        throw new Model_Exception
        (
          'Internal Error',
          'listWbfsysDomainAlias was not registered'
        );
      }

      $entityTexts = array();

      foreach( $listWbfsysDomainAlias as $entityWbfsysDomainAlias )
      {
        if( !$access->update )
        {
          $accessDataset = new WbfsysDomainAlias_Crud_Access_Update( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysDomainAlias );
          
          if( !$accessDataset->update )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to update Domain Alias {@text@}',
                'wbfsys.domain_alias.message',
                array( 'text' => $entityText)
              )
            );
            continue;          
          }
        }


        if( !$orm->update( $entityWbfsysDomainAlias ) )
        {
          $entityText = $entityWbfsysDomainAlias->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to update Domain Alias {@text@}',
              'wbfsys.domain_alias.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysDomainAlias->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully updated Domain Alias: {@text@}',
          'wbfsys.domain_alias.message',
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
   * @param WbfsysDomainAlias_Multi_Access_Delete $access
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
      
      $listWbfsysDomainAlias = $orm->getByIds( 'WbfsysDomainAlias', $deleteIds );

      foreach( $listWbfsysDomainAlias as $entityWbfsysDomainAlias )
      {
      
        if( !$access->delete )
        {
        
          $accessDataset = new WbfsysDomainAlias_Crud_Access_Delete( null, null, $this );
          $accessDataset->load( $user->getProfileName(), $params, $entityWbfsysDomainAlias );
          
          if( !$accessDataset->delete )
          {
            $response->addError
            (
              $response->i18n->l
              (
                'You have no permission to delete Domain Alias {@text@}',
                'wbfsys.domain_alias.message',
                array( 'text' => $entityText )
              )
            );
            continue;          
          }
          
        }

        if( !$orm->delete( $entityWbfsysDomainAlias ) )
        {
          $entityText = $entityWbfsysDomainAlias->text();


          $response->addError
          (
            $response->i18n->l
            (
              'Failed to delete Domain Alias {@text@}',
              'wbfsys.domain_alias.message',
              array( 'text' => $entityText)
            )
          );
        }
        else
        {


          $entityTexts[] = $entityWbfsysDomainAlias->text();
        }
      }

      $textSaved = implode( $entityTexts, ', ' );
      $response->addMessage
      (
        $response->i18n->l
        (
          'Successfully deleted Domain Alias: {@text@}',
          'wbfsys.domain_alias.message',
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

      if( !$params->fieldsWbfsysDomainAlias )
        $params->fieldsWbfsysDomainAlias  = $orm->getCols( 'WbfsysDomainAlias', $params->categories );

      // if the validation fails report
      $listWbfsysDomainAlias = $httpRequest->validateMultiSave
      (
        'WbfsysDomainAlias',
        'wbfsys_domain_alias',
        $params->fieldsWbfsysDomainAlias
      );

      $this->register( 'listWbfsysDomainAlias', $listWbfsysDomainAlias );
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

      if( $params->fieldsWbfsysDomainAlias )
      {
        $params->fieldsWbfsysDomainAlias = $orm->getCols
        (
          'WbfsysDomainAlias',
          $params->categories
        );
      }

      // if the validation fails report
      $listWbfsysDomainAlias = $httpRequest->validateMultiInsert
      (
        'WbfsysDomainAlias',
        'wbfsys_domain_alias',
        $params->fieldsWbfsysDomainAlias
      );

      $this->register( 'listWbfsysDomainAlias', $listWbfsysDomainAlias );
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

      if( !$params->fieldsWbfsysDomainAlias )
        $params->fieldsWbfsysDomainAlias  = $orm->getCols( 'WbfsysDomainAlias', $params->categories );

      // if the validation fails report
      $listWbfsysDomainAlias = $httpRequest->validateMultiUpdate
      (
        'WbfsysDomainAlias',
        'wbfsys_domain_alias',
        $params->fieldsWbfsysDomainAlias
      );

      $this->register( 'listWbfsysDomainAlias', $listWbfsysDomainAlias );
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

}//end class WbfsysDomainAlias_Multi_Model

