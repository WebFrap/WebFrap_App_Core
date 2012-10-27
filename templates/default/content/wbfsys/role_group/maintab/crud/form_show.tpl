
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
          
        <h3><a tab="details" ><?php echo $I18N->l('User Roles','wbfsys.role_group.label')?></a></h3>
        <div>
          
<p>This is a read only view of the User Roles base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this User Roles.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
        </div>
        
        
    <?php if(
      Webfrap::classLoadable('WbfsysGroupUsers_Entity')
        && Webfrap::classLoadable('WbfsysRoleUser_Entity')
        && $VAR->showTabGroupUsers
    ){
    ?>

    <!-- tab: group_users in management: WbfsysRoleUser manytomany -->
    <h3>
      <a
        tab="group_users"
        wgt_src="ajax.php?c=Wbfsys.RoleGroup_Ref_GroupUsers.tab&amp;objid=<?php
            echo $VAR->entityWbfsysRoleGroup->getId();
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-group_users&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>&a_node=mgmt-wbfsys_role_group-ref-group_users" ><?php echo $I18N->l('Members','wbfsys.role_group.label.tab_group_users')?></a>
    </h3>
    <div>
      
<label>System Users</label>
<p>Here you can assign System Users to the currently selected User Roles.</p>
<p>To do so click on "Append new System User", search for the designated System User
and append it by clicking on the "connect" Action in the list entry menu.</p>
      
    </div>

    <?php } ?>

    <?php if(
      Webfrap::classLoadable('WbfsysGroupProfiles_Entity')
        && Webfrap::classLoadable('WbfsysProfile_Entity')
        && $VAR->showTabGroupProfiles
    ){
    ?>

    <!-- tab: group_profiles in management: WbfsysProfile manytomany -->
    <h3>
      <a
        tab="group_profiles"
        wgt_src="ajax.php?c=Wbfsys.RoleGroup_Ref_GroupProfiles.tab&amp;objid=<?php
            echo $VAR->entityWbfsysRoleGroup->getId();
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-group_profiles&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>&a_node=mgmt-wbfsys_role_group-ref-group_profiles" ><?php echo $I18N->l('Profiles','wbfsys.role_group.label.tab_group_profiles')?></a>
    </h3>
    <div>
      
<label>Profiles</label>
<p>Here you can assign Profiles to the currently selected User Roles.</p>
<p>To do so click on "Append new Profiles", search for the designated Profiles
and append it by clicking on the "connect" Action in the list entry menu.</p>
      
    </div>

    <?php } ?>

    <?php
      if // check if the recode exists and if it should be displayed
      (
        Webfrap::classLoadable('WbfsysSecurityAccess_Entity')
          && $VAR->showTabAccess
      ){
    ?>

      <!-- tab: access in management: WbfsysSecurityAccess manytoone -->
      <h3>
        <a
          tab="access"
          wgt_src="ajax.php?c=Wbfsys.RoleGroup_Ref_Access.tab&amp;objid=<?php
              echo $VAR->entityWbfsysRoleGroup->getId();
            ?>&tabid=<?php
              echo $this->id;
            ?>-content-access&a_root=<?php
              echo $VAR->params->aclRoot;
            ?>&m_root=<?php
              echo $VAR->params->maskRoot;
            ?>&a_root_id=<?php
              echo $VAR->params->aclRootId;
            ?>&a_key=<?php
              echo $VAR->params->aclNode;
            ?>&a_level=<?php
              echo (1+$VAR->params->aclLevel);
            ?>&a_node=mgmt-wbfsys_role_group-ref-access" ><?php echo $I18N->l('Access','wbfsys.role_group.label')?></a>
      </h3>
      <div>
        
<label>Access</label>
<p>Here you can maintain Access related to the User Roles.</p>
<p>To do so click on "Create new Access".</p>
      

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
          <span onclick="$S('#wgt-box-wbfsys_role_group-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_role_group-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysRoleGroupRevision;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupIdModule;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupIdMandant;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupMParent;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupIdType;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysRoleGroupName;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupFlagCore;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupSystem;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupLevel;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_role_group-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_role_group-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysRoleGroupDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_role_group-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_role_group-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.RoleGroup.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysRoleGroupMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysRoleGroupMUuid;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupMVersion;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      <div class="container" id="<?php echo $this->id?>-content-group_users" ></div>

      <div class="container" id="<?php echo $this->id?>-content-group_profiles" ></div>

      <div class="container" id="<?php echo $this->id?>-content-access" ></div>

      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
