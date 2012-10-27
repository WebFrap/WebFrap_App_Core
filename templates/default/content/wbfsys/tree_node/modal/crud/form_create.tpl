  <div id="wgt-tab-form-wbfsys_tree_node-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_tree_node_details"
        title="<?php echo $I18N->l('Tree Node','wbfsys.tree_node.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_tree_node-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_tree_node-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysTreeNodeVid;?>
          <?php echo $ELEMENT->inputWbfsysTreeNodeFlagFolder;?>
          <?php echo $ELEMENT->inputWbfsysTreeNodeMParent;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysTreeNodeName;?>
          <?php echo $ELEMENT->inputWbfsysTreeNodeIcon;?>
          <?php echo $ELEMENT->inputWbfsysTreeNodeEntity;?>
          <?php echo $ELEMENT->inputWbfsysTreeNodeIdTree;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_tree_node-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_tree_node-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysTreeNodeDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_tree_node-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_tree_node-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysTreeNodeMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysTreeNodeMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysTreeNodeRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysTreeNodeMUuid;?>
          <?php echo $ELEMENT->inputWbfsysTreeNodeMVersion;?>
          <?php echo $ELEMENT->inputWbfsysTreeNodeMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysTreeNodeMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
