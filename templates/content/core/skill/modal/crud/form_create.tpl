  <div id="wgt-tab-form-core_skill-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_core_skill_details"
        title="<?php echo $I18N->l('Skill','core.skill.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-core_skill-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-core_skill-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreSkillName;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreSkillAccessKey;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-core_skill-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-core_skill-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputCoreSkillDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-core_skill-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-core_skill-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreSkillMRoleChange;?>
          <?php echo $ELEMENT->inputCoreSkillMTimeChanged;?>
          <?php echo $ELEMENT->inputCoreSkillRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreSkillMUuid;?>
          <?php echo $ELEMENT->inputCoreSkillMVersion;?>
          <?php echo $ELEMENT->inputCoreSkillMRoleCreate;?>
          <?php echo $ELEMENT->inputCoreSkillMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
