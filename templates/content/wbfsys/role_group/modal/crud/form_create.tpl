  <div id="wgt-tab-form-wbfsys_role_group-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_role_group_details"
        title="<?php echo $I18N->l('User Roles','wbfsys.role_group.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_role_group-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_role_group-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysRoleGroupRevision;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupIdModule;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupIdMandant;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupMParent;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupIdType;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysRoleGroupName;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupFlagCore;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupSystem;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupLevel;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_role_group-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_role_group-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysRoleGroupDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_role_group-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_role_group-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysRoleGroupMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysRoleGroupMUuid;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupMVersion;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysRoleGroupMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
