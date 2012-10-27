
  <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
  <form
    method="post"
    accept-charset="utf-8"
    class="<?php echo $VAR->formClass?>"
    id="<?php echo $VAR->formId?>"
    action="<?php echo $VAR->formAction?>" ></form>

  <fieldset id="wgt-fieldset-<?php echo $this->id ?>-wbfsys_role_user-default"  class="wgt-space bw61" name="default" >
<legend>Name</legend>
<div class="left bw3">
          <?php echo $ELEMENT->inputWbfsysRoleUserName;?>
          <?php echo $ELEMENT->inputEmbedPersonFirstname;?>
          <?php echo $ELEMENT->inputEmbedPersonLastname;?>
          <?php echo $ELEMENT->inputEmbedPersonAcademicTitle;?>
          <?php echo $ELEMENT->inputEmbedPersonNoblesseTitle;?>
 </div>
<div class="right bw3">
          <?php echo $ELEMENT->inputEmbedPersonPhoto;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserIdEmployee;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserIdPerson;?>
 </div>
 </fieldset>
<fieldset id="wgt-fieldset-<?php echo $this->id ?>-wbfsys_role_user-passwd"  class="wgt-space bw61" name="passwd" >
<legend>Password and Roles</legend>
<div class="left bw3">
          <?php echo $ELEMENT->inputWbfsysRoleUserPassword;?>
 </div>
<div class="inline bw3">
          <?php echo $ELEMENT->inputWbfsysRoleUserLevel;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserProfile;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserInactive;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserNonCertLogin;?>
 </div>
 </fieldset>
<fieldset id="wgt-fieldset-<?php echo $this->id ?>-wbfsys_role_user-description"  class="wgt-space bw61" name="description" >
<legend>Description</legend>
<div class="left bw3">
          <?php echo $ELEMENT->inputWbfsysRoleUserDescription;?>
 </div>
 </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_role_user-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_role_user-meta" style="display:none" >
        <div class="left half" >
          <?php echo $ELEMENT->inputEmbedPersonMRoleChange;?>
          <?php echo $ELEMENT->inputEmbedPersonMVersion;?>
          <?php echo $ELEMENT->inputEmbedPersonMTimeCreated;?>
          <?php echo $ELEMENT->inputEmbedPersonRowid;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserRowid;?>
        </div>
        <div class="inline half" >
          <?php echo $ELEMENT->inputEmbedPersonMTimeChanged;?>
          <?php echo $ELEMENT->inputEmbedPersonMUuid;?>
          <?php echo $ELEMENT->inputEmbedPersonMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMUuid;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMVersion;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>


<div class="wgt-clear xxsmall">&nbsp;</div>
