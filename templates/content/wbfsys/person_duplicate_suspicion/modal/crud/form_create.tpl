  <div id="wgt-tab-form-wbfsys_person_duplicate_suspicion-create" class="wcm wcm_ui_tab" >
    <div class="wgt_tab_body" >

    <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
    <form
      method="post"
      accept-charset="utf-8"
      class="<?php echo $VAR->formClass?>"
      id="<?php echo $VAR->formId?>"
      action="<?php echo $VAR->formAction?>" ></form>

      <!-- Tab Details -->
      <div  
        id="<?php echo $this->id?>_tab_wbfsys_person_duplicate_suspicion_details"
        title="<?php echo $I18N->l('Person Duplicate','wbfsys.person_duplicate_suspicion.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_person_duplicate_suspicion-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_person_duplicate_suspicion-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysPersonDuplicateSuspicionIdPerson;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysPersonDuplicateSuspicionIdPropability;?>
          <?php echo $ELEMENT->inputWbfsysPersonDuplicateSuspicionIdDuplicate;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_person_duplicate_suspicion-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_person_duplicate_suspicion-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysPersonDuplicateSuspicionMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysPersonDuplicateSuspicionMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysPersonDuplicateSuspicionRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysPersonDuplicateSuspicionMUuid;?>
          <?php echo $ELEMENT->inputWbfsysPersonDuplicateSuspicionMVersion;?>
          <?php echo $ELEMENT->inputWbfsysPersonDuplicateSuspicionMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysPersonDuplicateSuspicionMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
