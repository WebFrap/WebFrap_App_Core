  <div id="wgt-tab-form-wbfsys_know_how_node-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_know_how_node_details"
        title="<?php echo $I18N->l('Know How Node','wbfsys.know_how_node.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_know_how_node-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_know_how_node-default" >
          <?php echo $ELEMENT->inputWbfsysKnowHowNodeContent;?>

        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysKnowHowNodeTitle;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysKnowHowNodeAccessKey;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysKnowHowNodeIdLang;?>
          <?php echo $ELEMENT->inputWbfsysKnowHowNodeIdRepository;?>
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysKnowHowNodeRawContent;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_know_how_node-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_know_how_node-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysKnowHowNodeMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysKnowHowNodeMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysKnowHowNodeRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysKnowHowNodeMUuid;?>
          <?php echo $ELEMENT->inputWbfsysKnowHowNodeMVersion;?>
          <?php echo $ELEMENT->inputWbfsysKnowHowNodeMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysKnowHowNodeMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
