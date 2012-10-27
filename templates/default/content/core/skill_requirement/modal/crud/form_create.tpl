  <div id="wgt-tab-form-core_skill_requirement-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_core_skill_requirement_details"
        title="<?php echo $I18N->l('Skill Requirement','core.skill_requirement.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-core_skill_requirement-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-core_skill_requirement-default" >
          <?php echo $ELEMENT->inputCoreSkillRequirementVid;?>

          <?php echo $ELEMENT->inputCoreSkillRequirementIdVidEntity;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreSkillRequirementIdSkill;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreSkillRequirementRate;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-core_skill_requirement-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-core_skill_requirement-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputCoreSkillRequirementMRoleChange;?>
          <?php echo $ELEMENT->inputCoreSkillRequirementMTimeChanged;?>
          <?php echo $ELEMENT->inputCoreSkillRequirementRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputCoreSkillRequirementMUuid;?>
          <?php echo $ELEMENT->inputCoreSkillRequirementMVersion;?>
          <?php echo $ELEMENT->inputCoreSkillRequirementMRoleCreate;?>
          <?php echo $ELEMENT->inputCoreSkillRequirementMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
