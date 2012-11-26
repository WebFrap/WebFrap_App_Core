<div>
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

</div>

<div class="wgt-clear xxsmall">&nbsp;</div>