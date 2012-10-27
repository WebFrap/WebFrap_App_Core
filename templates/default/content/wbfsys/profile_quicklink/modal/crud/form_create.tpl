  <div id="wgt-tab-form-wbfsys_profile_quicklink-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_profile_quicklink_details"
        title="<?php echo $I18N->l('Profile Quicklink','wbfsys.profile_quicklink.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_profile_quicklink-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_profile_quicklink-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProfileQuicklinkShortDesc;?>
          <?php echo $ELEMENT->inputWbfsysProfileQuicklinkIdProfile;?>
          <?php echo $ELEMENT->inputWbfsysProfileQuicklinkHttpUrl;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProfileQuicklinkAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysProfileQuicklinkLabel;?>
          <?php echo $ELEMENT->inputWbfsysProfileQuicklinkRevision;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_profile_quicklink-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_profile_quicklink-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProfileQuicklinkRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProfileQuicklinkMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysProfileQuicklinkMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
