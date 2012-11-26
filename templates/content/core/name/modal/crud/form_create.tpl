  <div id="wgt-tab-form-core_name-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_core_name_details"
        title="<?php echo $I18N->l('Name','core.name.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-core_name-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-core_name-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreNameValue;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreNameIdType;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-core_name-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-core_name-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputCoreNameDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-core_name-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-core_name-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreNameMRoleChange;?>
          <?php echo $ELEMENT->inputCoreNameMTimeChanged;?>
          <?php echo $ELEMENT->inputCoreNameRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreNameMUuid;?>
          <?php echo $ELEMENT->inputCoreNameMVersion;?>
          <?php echo $ELEMENT->inputCoreNameMRoleCreate;?>
          <?php echo $ELEMENT->inputCoreNameMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
