
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Module','wbfsys.module.label')?></a></h3>
        <div>
          
<p>The dashed fields marked with an asterisk in the label are mandatory.<br />
You will not be able to save any data until you have provided all required information.</p>

<label class="hint" >Hint:</label>
<p class="hint" >If you made changes don't forget to save before closing the tab, or else your work will be lost.</p>
      
        </div>
        
        
    <?php
      if // check if the recode exists and if it should be displayed
      (
        Webfrap::classLoadable('WbfsysEntity_Entity')
          && $VAR->showTabEntity
      ){
    ?>

      <!-- tab: entity in management: WbfsysEntity manytoone -->
      <h3>
        <a
          tab="entity"
          wgt_src="ajax.php?c=Wbfsys.Module_Ref_Entity.tab&amp;objid=<?php
              echo $VAR->entityWbfsysModule->getId();
            ?>&tabid=<?php
              echo $this->id;
            ?>-content-entity&a_root=<?php
              echo $VAR->params->aclRoot;
            ?>&m_root=<?php
              echo $VAR->params->maskRoot;
            ?>&a_root_id=<?php
              echo $VAR->params->aclRootId;
            ?>&a_key=<?php
              echo $VAR->params->aclNode;
            ?>&a_level=<?php
              echo (1+$VAR->params->aclLevel);
            ?>&a_node=mod-wbfsys-cat-core_data-ref-entity" ><?php echo $I18N->l('Entity','wbfsys.module.label')?></a>
      </h3>
      <div>
        
<label>Entitys</label>
<p>Here you can maintain Entitys related to the Module.</p>
<p>To do so click on "Create new Entity".</p>
      

      </div>

    <?php } ?>

    <?php
      if // check if the recode exists and if it should be displayed
      (
        Webfrap::classLoadable('WbfsysManagement_Entity')
          && $VAR->showTabManagement
      ){
    ?>

      <!-- tab: management in management: WbfsysManagement manytoone -->
      <h3>
        <a
          tab="management"
          wgt_src="ajax.php?c=Wbfsys.Module_Ref_Management.tab&amp;objid=<?php
              echo $VAR->entityWbfsysModule->getId();
            ?>&tabid=<?php
              echo $this->id;
            ?>-content-management&a_root=<?php
              echo $VAR->params->aclRoot;
            ?>&m_root=<?php
              echo $VAR->params->maskRoot;
            ?>&a_root_id=<?php
              echo $VAR->params->aclRootId;
            ?>&a_key=<?php
              echo $VAR->params->aclNode;
            ?>&a_level=<?php
              echo (1+$VAR->params->aclLevel);
            ?>&a_node=mod-wbfsys-cat-core_data-ref-management" ><?php echo $I18N->l('Management','wbfsys.module.label')?></a>
      </h3>
      <div>
        
<label>Management Nodes</label>
<p>Here you can maintain Management Nodes related to the Module.</p>
<p>To do so click on "Create new Management Node".</p>
      

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
          <span onclick="$S('#wgt-box-wbfsys_module-default-<?php echo $VAR->entityWbfsysModule; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_module-default-<?php echo $VAR->entityWbfsysModule; ?>" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysModuleName;?>
          <?php echo $ELEMENT->inputWbfsysModuleRevision;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysModuleAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysModuleIdSecurityArea;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_module-description-<?php echo $VAR->entityWbfsysModule; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_module-description-<?php echo $VAR->entityWbfsysModule; ?>" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysModuleDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_module-meta-<?php echo $VAR->entityWbfsysModule; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_module-meta-<?php echo $VAR->entityWbfsysModule; ?>" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.Module.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysModuleMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysModuleMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysModuleRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysModuleMUuid;?>
          <?php echo $ELEMENT->inputWbfsysModuleMVersion;?>
          <?php echo $ELEMENT->inputWbfsysModuleMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysModuleMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      <div class="container" id="<?php echo $this->id?>-content-entity" ></div>

      <div class="container" id="<?php echo $this->id?>-content-management" ></div>

      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
