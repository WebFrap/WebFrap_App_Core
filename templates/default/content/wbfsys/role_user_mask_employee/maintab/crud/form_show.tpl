
  <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
  <form
    method="post"
    accept-charset="utf-8"
    class="<?php echo $VAR->formClass?>"
    id="<?php echo $VAR->formId?>"
    action="<?php echo $VAR->formAction?>" ></form>

        
  <div id="<?php echo $this->id?>" style="position:relative;height:100%;overflow-y:hidden;" class="wcm wcm_ui_accordion_tab"  >
    
    <!-- Accordion Head -->
    <div 
      style="position:absolute;width:200px;height:100%;top:0px:bottom:0px;"   >
    
      <div id="<?php echo $this->id?>-head"  >
      
    <!-- tab name:default -->
    <h3>
      <a 
        tab="default"
        class=""
        
      
       >Defaults</a>
    </h3>
    <div>
      
<p>This is a read only view of the Employee base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Employee.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
    </div>
  <?php if( $VAR->showTabGroupsNProfiles ){ ?>
    <!-- tab name:groups_n_profiles -->


    <!-- tab name:groups_n_profiles -->
    <h3>
      <a 
        tab="groups_n_profiles"
        class=""
        
      wgt_src="ajax.php?c=Wbfsys.RoleUserMaskEmployee_Tab_GroupsNProfiles.load&namespace=wbfsys_role_user_mask_employee&amp;objid=<?php
            echo $VAR->entityWbfsysRoleUserMaskEmployee;
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-groups_n_profiles&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>"

      
       >Groups and Profiles</a>
    </h3>
    <div>
      
<label>User Roles</label>
<p>Here you can assign User Roles to the currently selected Employee.</p>
<p>To do so click on "Append new User Roles", search for the designated User Roles
and append it by clicking on the "connect" Action in the list entry menu.</p>
      
<label>Profiles</label>
<p>Here you can assign Profiles to the currently selected Employee.</p>
<p>To do so click on "Append new Profiles", search for the designated Profiles
and append it by clicking on the "connect" Action in the list entry menu.</p>
      
    </div>

  <?php } ?>
      
      </div><!-- End accordion head -->
    </div><!-- End accordion container -->
    
    <!-- Content Main Container -->
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
     <div class="container" id="<?php echo $this->id ?>-content-default" >
<fieldset class="wgt-space bw61">
<legend>Default</legend>
<div class="left wgt-space bw3">
<?php // did not find field empl_number ?>
          <?php echo $ELEMENT->inputEmbedPersonFirstname;?>
          <?php echo $ELEMENT->inputEmbedPersonLastname;?>
          <?php echo $ELEMENT->inputEmbedPersonAcademicTitle;?>
          <?php echo $ELEMENT->inputEmbedPersonNoblesseTitle;?>
 </div>
<div class="inline wgt-space bw3">
          <?php echo $ELEMENT->inputEmbedPersonPhoto;?>
 </div>
 </fieldset>
<fieldset class="wgt-space bw61">
<legend>Password and Roles</legend>
<div class="left wgt-space bw3">
          <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeePassword;?>
 </div>
<div class="inline wgt-space bw3">
          <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeProfile;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeLevel;?>
 </div>
 </fieldset>
<?php //group data is empty  ?><?php //group location is empty  ?><fieldset class="wgt-space bw61">
<legend>Description</legend>
          <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeDescription;?>
 </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_role_user_mask_employee-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_role_user_mask_employee-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.RoleUserMaskEmployee.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left half" >
          <?php echo $ELEMENT->inputEmbedPersonMRoleChange;?>
          <?php echo $ELEMENT->inputEmbedPersonMVersion;?>
          <?php echo $ELEMENT->inputEmbedPersonMTimeCreated;?>
          <?php echo $ELEMENT->inputEmbedPersonRowid;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeRowid;?>
        </div>
        <div class="inline half" >
          <?php echo $ELEMENT->inputEmbedPersonMTimeChanged;?>
          <?php echo $ELEMENT->inputEmbedPersonMUuid;?>
          <?php echo $ELEMENT->inputEmbedPersonMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeMUuid;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeMVersion;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>
     </div>

  <?php if( $VAR->showTabGroupsNProfiles ){ ?>
    <!-- tab name:groups_n_profiles -->

     <div class="container" id="<?php echo $this->id ?>-content-groups_n_profiles" >
     </div>


  <?php } ?>
      
    </div>
    

<div class="wgt-clear xxsmall">&nbsp;</div>