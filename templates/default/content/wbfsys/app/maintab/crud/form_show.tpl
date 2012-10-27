
  <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
  <form
    method="post"
    accept-charset="utf-8"
    class="<?php echo $VAR->formClass?>"
    id="<?php echo $VAR->formId?>"
    action="<?php echo $VAR->formAction?>" ></form>

  <div 
    id="<?php echo $this->id?>" 
    style="position:relative;height:100%;overflow-y:hidden;" 
    class="wcm wcm_ui_accordion_tab"  >
    
    <!-- Accordion Head -->
    <div style="position:absolute;width:200px;height:100%;top:0px:bottom:0px;"   >
    
      <div id="<?php echo $this->id?>-head" style="height:600px;" >
          
        <h3><a tab="details" ><?php echo $I18N->l('App','wbfsys.app.label')?></a></h3>
        <div>
          
<p>This is a read only view of the App base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this App.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
        </div>
        
        
    <?php if(
      Webfrap::classLoadable('WbfsysAppModules_Entity')
        && Webfrap::classLoadable('WbfsysModule_Entity')
        && $VAR->showTabAppModules
    ){
    ?>

    <!-- tab: app_modules in management: WbfsysModule manytomany -->
    <h3>
      <a
        tab="app_modules"
        wgt_src="ajax.php?c=Wbfsys.App_Ref_AppModules.tab&amp;objid=<?php
            echo $VAR->entityWbfsysApp->getId();
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-app_modules&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>&a_node=mod-wbfsys-cat-core_data-ref-app_modules" ><?php echo $I18N->l('Modules','wbfsys.app.label.tab_app_modules')?></a>
    </h3>
    <div>
      
<label>Modules</label>
<p>Here you can assign Modules to the currently selected App.</p>
<p>To do so click on "Append new Module", search for the designated Module
and append it by clicking on the "connect" Action in the list entry menu.</p>
      
    </div>

    <?php } ?>

    <?php
      if // check if the recode exists and if it should be displayed
      (
        Webfrap::classLoadable('WbfsysDesktop_Entity')
          && $VAR->showTabDesktops
      ){
    ?>

      <!-- tab: desktops in management: WbfsysDesktop manytoone -->
      <h3>
        <a
          tab="desktops"
          wgt_src="ajax.php?c=Wbfsys.App_Ref_Desktops.tab&amp;objid=<?php
              echo $VAR->entityWbfsysApp->getId();
            ?>&tabid=<?php
              echo $this->id;
            ?>-content-desktops&a_root=<?php
              echo $VAR->params->aclRoot;
            ?>&m_root=<?php
              echo $VAR->params->maskRoot;
            ?>&a_root_id=<?php
              echo $VAR->params->aclRootId;
            ?>&a_key=<?php
              echo $VAR->params->aclNode;
            ?>&a_level=<?php
              echo (1+$VAR->params->aclLevel);
            ?>&a_node=mod-wbfsys-cat-core_data-ref-desktops" ><?php echo $I18N->l('Desktops','wbfsys.app.label')?></a>
      </h3>
      <div>
        
<label>Desktops</label>
<p>Here you can maintain Desktops related to the App.</p>
<p>To do so click on "Create new Desktop".</p>
      

      </div>

    <?php } ?>

        
      </div>
    </div>
    
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
  
      <div class="container" id="<?php echo $this->id?>-content-details" >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_app-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_app-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAppName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAppIdDefDesktop;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_app-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_app-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysAppDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_app-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_app-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.App.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAppMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysAppMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysAppRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAppMUuid;?>
          <?php echo $ELEMENT->inputWbfsysAppMVersion;?>
          <?php echo $ELEMENT->inputWbfsysAppMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysAppMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      <div class="container" id="<?php echo $this->id?>-content-app_modules" ></div>

      <div class="container" id="<?php echo $this->id?>-content-desktops" ></div>

      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
