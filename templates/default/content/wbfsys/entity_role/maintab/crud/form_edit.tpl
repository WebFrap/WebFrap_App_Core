
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Entity Role','wbfsys.entity_role.label')?></a></h3>
        <div>
          
<p>The dashed fields marked with an asterisk in the label are mandatory.<br />
You will not be able to save any data until you have provided all required information.</p>

<label class="hint" >Hint:</label>
<p class="hint" >If you made changes don't forget to save before closing the tab, or else your work will be lost.</p>
      
        </div>
        
        
    <?php if(
      Webfrap::classLoadable('WbfsysEntityRoleActions_Entity')
        && Webfrap::classLoadable('WbfsysAclAction_Entity')
        && $VAR->showTabRoleActions
    ){
    ?>

    <!-- tab: role_actions in management: WbfsysAclAction manytomany -->
    <h3>
      <a
        tab="role_actions"
        wgt_src="ajax.php?c=Wbfsys.EntityRole_Ref_RoleActions.tab&amp;objid=<?php
            echo $VAR->entityWbfsysEntityRole->getId();
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-role_actions&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>&a_node=mod-wbfsys-cat-core_data-ref-role_actions" ><?php echo $I18N->l('Actions','wbfsys.entity_role.label.tab_role_actions')?></a>
    </h3>
    <div>
      
<label>Acl Actions</label>
<p>Here you can assign Acl Actions to the currently selected Entity Role.</p>
<p>To do so click on "Append new Acl Action", search for the designated Acl Action
and append it by clicking on the "connect" Action in the list entry menu.</p>
      
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
          <span onclick="$S('#wgt-box-wbfsys_entity_role-default-<?php echo $VAR->entityWbfsysEntityRole; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_entity_role-default-<?php echo $VAR->entityWbfsysEntityRole; ?>" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityRoleVid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityRoleIdRole;?>
          <?php echo $ELEMENT->inputWbfsysEntityRoleIdEntity;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_role-meta-<?php echo $VAR->entityWbfsysEntityRole; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_entity_role-meta-<?php echo $VAR->entityWbfsysEntityRole; ?>" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.EntityRole.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityRoleMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysEntityRoleMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysEntityRoleRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityRoleMUuid;?>
          <?php echo $ELEMENT->inputWbfsysEntityRoleMVersion;?>
          <?php echo $ELEMENT->inputWbfsysEntityRoleMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysEntityRoleMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      <div class="container" id="<?php echo $this->id?>-content-role_actions" ></div>

      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
