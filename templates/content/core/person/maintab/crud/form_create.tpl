
  <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
  <form
    method="post"
    accept-charset="utf-8"
    class="<?php echo $VAR->formClass?>"
    id="<?php echo $VAR->formId?>"
    action="<?php echo $VAR->formAction?>" ></form>

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

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-core_person-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-core_person-meta" style="display:none" >
        <div class="left half" >
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

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>


<div class="wgt-clear xxsmall">&nbsp;</div>
