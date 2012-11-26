  <div id="wgt-tab-form-wbfsys_group_profiles-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_group_profiles_details"
        title="<?php echo $I18N->l('Group Profiles','wbfsys.group_profiles.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_group_profiles-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_group_profiles-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysGroupProfilesIdGroup;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysGroupProfilesIdProfile;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_group_profiles-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_group_profiles-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysGroupProfilesMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysGroupProfilesMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysGroupProfilesRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysGroupProfilesMUuid;?>
          <?php echo $ELEMENT->inputWbfsysGroupProfilesMVersion;?>
          <?php echo $ELEMENT->inputWbfsysGroupProfilesMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysGroupProfilesMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
