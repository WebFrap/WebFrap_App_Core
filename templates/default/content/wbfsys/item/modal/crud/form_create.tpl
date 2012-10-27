  <div id="wgt-tab-form-wbfsys_item-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_item_details"
        title="<?php echo $I18N->l('Item','wbfsys.item.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_item-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_item-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysItemName;?>
          <?php echo $ELEMENT->inputWbfsysItemIdManagement;?>
          <?php echo $ELEMENT->inputWbfsysItemIdEntity;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysItemCname;?>
          <?php echo $ELEMENT->inputWbfsysItemAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysItemRevision;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_item-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_item-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysItemDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_item-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_item-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysItemMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysItemMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysItemRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysItemMUuid;?>
          <?php echo $ELEMENT->inputWbfsysItemMVersion;?>
          <?php echo $ELEMENT->inputWbfsysItemMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysItemMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
