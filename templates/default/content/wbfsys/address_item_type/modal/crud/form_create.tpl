  <div id="wgt-tab-form-wbfsys_address_item_type-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_address_item_type_details"
        title="<?php echo $I18N->l('address item Type','wbfsys.address_item_type.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_address_item_type-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_address_item_type-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAddressItemTypeName;?>
          <?php echo $ELEMENT->inputWbfsysAddressItemTypeFlagMsgSupported;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAddressItemTypeAccessKey;?>
          <?php echo $ELEMENT->inputWbfsysAddressItemTypeIcon;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_address_item_type-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_address_item_type-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysAddressItemTypeDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_address_item_type-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_address_item_type-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAddressItemTypeMOrder;?>
          <?php echo $ELEMENT->inputWbfsysAddressItemTypeMUuid;?>
          <?php echo $ELEMENT->inputWbfsysAddressItemTypeMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysAddressItemTypeMRoleCreate;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAddressItemTypeMVersion;?>
          <?php echo $ELEMENT->inputWbfsysAddressItemTypeMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysAddressItemTypeMTimeCreated;?>
          <?php echo $ELEMENT->inputWbfsysAddressItemTypeRowid;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
