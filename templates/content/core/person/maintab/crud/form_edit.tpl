
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
      
<p>The dashed fields marked with an asterisk in the label are mandatory.<br />
You will not be able to save any data until you have provided all required information.</p>

<label class="hint" >Hint:</label>
<p class="hint" >If you made changes don't forget to save before closing the tab, or else your work will be lost.</p>
      
    </div>      
      </div><!-- End accordion head -->
    </div><!-- End accordion container -->
    
    <!-- Content Main Container -->
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
     <div class="container" id="<?php echo $this->id ?>-content-default" >
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
          <span onclick="$S('#wgt-box-core_person-meta-<?php echo $VAR->entityCorePerson; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-core_person-meta-<?php echo $VAR->entityCorePerson; ?>" style="display:none" >
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

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>
     </div>
      
    </div>
    

<div class="wgt-clear xxsmall">&nbsp;</div>
