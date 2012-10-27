  <div id="wgt-tab-form-wbfsys_entity_role_actions-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_entity_role_actions_details"
        title="<?php echo $I18N->l('Entity Role Actions','wbfsys.entity_role_actions.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_role_actions-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_entity_role_actions-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityRoleActionsIdRole;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityRoleActionsIdAction;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity_role_actions-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_entity_role_actions-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityRoleActionsMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysEntityRoleActionsMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysEntityRoleActionsRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityRoleActionsMUuid;?>
          <?php echo $ELEMENT->inputWbfsysEntityRoleActionsMVersion;?>
          <?php echo $ELEMENT->inputWbfsysEntityRoleActionsMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysEntityRoleActionsMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
