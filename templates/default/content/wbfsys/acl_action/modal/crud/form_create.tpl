  <div id="wgt-tab-form-wbfsys_acl_action-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_acl_action_details"
        title="<?php echo $I18N->l('Acl Action','wbfsys.acl_action.label')?>"  >
        
      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_acl_action-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_acl_action-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAclActionMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysAclActionMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysAclActionRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAclActionMUuid;?>
          <?php echo $ELEMENT->inputWbfsysAclActionMVersion;?>
          <?php echo $ELEMENT->inputWbfsysAclActionMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysAclActionMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
