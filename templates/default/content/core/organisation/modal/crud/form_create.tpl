  <div id="wgt-tab-form-core_organisation-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_core_organisation_details"
        title="<?php echo $I18N->l('Organisation','core.organisation.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-core_organisation-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-core_organisation-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreOrganisationName;?>
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-core_organisation-comment').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Comment
        </legend>
        <div id="wgt-box-core_organisation-comment" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputCoreOrganisationComment;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-core_organisation-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-core_organisation-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreOrganisationMRoleChange;?>
          <?php echo $ELEMENT->inputCoreOrganisationMTimeChanged;?>
          <?php echo $ELEMENT->inputCoreOrganisationRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreOrganisationMUuid;?>
          <?php echo $ELEMENT->inputCoreOrganisationMVersion;?>
          <?php echo $ELEMENT->inputCoreOrganisationMRoleCreate;?>
          <?php echo $ELEMENT->inputCoreOrganisationMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
