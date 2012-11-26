
  <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
  <form
    method="post"
    accept-charset="utf-8"
    class="<?php echo $VAR->formClass?>"
    id="<?php echo $VAR->formId?>"
    action="<?php echo $VAR->formAction?>" ></form>

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
          <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeLevel;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMaskEmployeeProfile;?>
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
        <div class="left half" >
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


<div class="wgt-clear xxsmall">&nbsp;</div>
