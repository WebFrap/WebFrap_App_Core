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
<?php //group data is empty  ?><div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.RoleUser_Viewer.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left half" >
          <?php echo $ELEMENT->inputEmbedPersonMRoleChange;?>
          <?php echo $ELEMENT->inputEmbedPersonMVersion;?>
          <?php echo $ELEMENT->inputEmbedPersonMTimeCreated;?>
          <?php echo $ELEMENT->inputEmbedPersonRowid;?>
          <?php echo $ELEMENT->inputWbfsysRoleUser_ViewerMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysRoleUser_ViewerMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysRoleUser_ViewerRowid;?>
        </div>
        <div class="inline half" >
          <?php echo $ELEMENT->inputEmbedPersonMTimeChanged;?>
          <?php echo $ELEMENT->inputEmbedPersonMUuid;?>
          <?php echo $ELEMENT->inputEmbedPersonMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysRoleUser_ViewerMUuid;?>
          <?php echo $ELEMENT->inputWbfsysRoleUser_ViewerMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysRoleUser_ViewerMVersion;?>
          <?php echo $ELEMENT->inputWbfsysRoleUser_ViewerMTimeCreated;?>
        </div>

</div>

<div class="wgt-clear xxsmall">&nbsp;</div>