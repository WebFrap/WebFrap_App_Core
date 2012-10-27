<div>
<fieldset id="wgt-fieldset-<?php echo $this->id ?>-core_person-name_data"  class="wgt-space bw61" name="name_data" >
<legend>Name</legend>
<div class="left bw3">
          <?php echo $ELEMENT->inputCorePersonFirstname;?>
          <?php echo $ELEMENT->inputCorePersonLastname;?>
          <?php echo $ELEMENT->inputCorePersonAcademicTitle;?>
          <?php echo $ELEMENT->inputCorePersonNoblesseTitle;?>
 </div>
<div class="inline bw3">
          <?php echo $ELEMENT->inputCorePersonPhoto;?>
 </div>
  <div class="wgt-clear small" >&nbsp;</div>
 </fieldset>
<fieldset id="wgt-fieldset-<?php echo $this->id ?>-core_person-personal_data"  class="wgt-space bw61" name="personal_data" >
<legend>Personal Data</legend>
<div class="left bw3">
          <?php echo $ELEMENT->inputCorePersonBirthday;?>
          <?php echo $ELEMENT->inputCorePersonBirthCity;?>
 </div>
<div class="inline bw3">
          <?php echo $ELEMENT->inputCorePersonIdNationality;?>
          <?php echo $ELEMENT->inputCorePersonIdPreflang;?>
 </div>
  <div class="wgt-clear small" >&nbsp;</div>
 </fieldset>
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Core.Person.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left half" >
          <?php echo $ELEMENT->inputCorePersonMRoleChange;?>
          <?php echo $ELEMENT->inputCorePersonMTimeChanged;?>
          <?php echo $ELEMENT->inputCorePersonRowid;?>
        </div>
        <div class="inline half" >
          <?php echo $ELEMENT->inputCorePersonMUuid;?>
          <?php echo $ELEMENT->inputCorePersonMVersion;?>
          <?php echo $ELEMENT->inputCorePersonMRoleCreate;?>
          <?php echo $ELEMENT->inputCorePersonMTimeCreated;?>
        </div>

</div>

<div class="wgt-clear xxsmall">&nbsp;</div>