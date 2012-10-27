  <div id="wgt-tab-form-wbfsys_process_node-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_process_node_details"
        title="<?php echo $I18N->l('Process Node','wbfsys.process_node.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_process_node-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_process_node-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessNodeLabel;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeRevision;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeTextColor;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeBgColor;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeIsEndNode;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeIsStartNode;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessNodePhaseKey;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeIcon;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeBorderColor;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeIdPhase;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeIdProcess;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_process_node-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_process_node-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysProcessNodeDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_process_node-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_process_node-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessNodeMOrder;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeMUuid;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeMRoleCreate;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysProcessNodeMVersion;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeMTimeCreated;?>
          <?php echo $ELEMENT->inputWbfsysProcessNodeRowid;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
