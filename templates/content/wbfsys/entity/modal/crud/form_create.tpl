  <div id="wgt-tab-form-wbfsys_entity-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_entity_details"
        title="<?php echo $I18N->l('Entity','wbfsys.entity.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_entity-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityName;?>
          <?php echo $ELEMENT->inputWbfsysEntityDefaultSelection;?>
          <?php echo $ELEMENT->inputWbfsysEntityDefaultEdit;?>
          <?php echo $ELEMENT->inputWbfsysEntityDefaultCreate;?>
          <?php echo $ELEMENT->inputWbfsysEntityRevision;?>
          <?php echo $ELEMENT->inputWbfsysEntityRelevance;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysEntityIdSecurityArea;?>
          <?php echo $ELEMENT->inputWbfsysEntityIdModule;?>
          <?php echo $ELEMENT->inputWbfsysEntityFlagIndex;?>
          <?php echo $ELEMENT->inputWbfsysEntityDefaultList;?>
          <?php echo $ELEMENT->inputWbfsysEntityDefaultShow;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_entity-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysEntityDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_entity-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_entity-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysEntityMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysEntityRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysEntityMUuid;?>
          <?php echo $ELEMENT->inputWbfsysEntityMVersion;?>
          <?php echo $ELEMENT->inputWbfsysEntityMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysEntityMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
