
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Person','core.person.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Person base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Person.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
        </div>
        
        
        
      </div>
    </div>
    
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
  
      <div class="container" id="<?php echo $this->id?>-content-details" >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-core_person-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Base Data
        </legend>
        <div id="wgt-box-core_person-default" >
          <?php echo $ELEMENT->inputCorePersonMimetype;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputCorePersonIsAliasFor;?>
          <?php echo $ELEMENT->inputCorePersonGender;?>
          <?php echo $ELEMENT->inputCorePersonLastname;?>
          <?php echo $ELEMENT->inputCorePersonFirstname;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCorePersonBirthday;?>
          <?php echo $ELEMENT->inputCorePersonNoblesseTitle;?>
          <?php echo $ELEMENT->inputCorePersonAcademicTitle;?>
          <?php echo $ELEMENT->inputCorePersonPhoto;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-core_person-personal_data').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Personal Data
        </legend>
        <div id="wgt-box-core_person-personal_data" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCorePersonIdPreflang;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCorePersonIdNationality;?>
          <?php echo $ELEMENT->inputCorePersonBirthCity;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-core_person-ident_data').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Ident Data
        </legend>
        <div id="wgt-box-core_person-ident_data" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCorePersonTaxNumber;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCorePersonPkid;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-core_person-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-core_person-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Core.Person.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputCorePersonMRoleChange;?>
          <?php echo $ELEMENT->inputCorePersonMTimeChanged;?>
          <?php echo $ELEMENT->inputCorePersonRowid;?>
        </div>
        <div class="inline bw3" >
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
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
