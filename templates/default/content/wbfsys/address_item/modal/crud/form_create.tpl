  <div id="wgt-tab-form-wbfsys_address_item-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_address_item_details"
        title="<?php echo $I18N->l('Address Item','wbfsys.address_item.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_address_item-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_address_item-default" >
          <?php echo $ELEMENT->inputWbfsysAddressItemVid;?>

          <?php echo $ELEMENT->inputWbfsysAddressItemIdVidEntity;?>

        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysAddressItemAddressValue;?>
        </div>
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAddressItemName;?>
          <?php echo $ELEMENT->inputWbfsysAddressItemUseForContact;?>
          <?php echo $ELEMENT->inputWbfsysAddressItemFlagPrivate;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAddressItemIdUser;?>
          <?php echo $ELEMENT->inputWbfsysAddressItemIdType;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_address_item-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_address_item-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysAddressItemDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_address_item-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_address_item-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysAddressItemMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysAddressItemMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysAddressItemRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysAddressItemMUuid;?>
          <?php echo $ELEMENT->inputWbfsysAddressItemMVersion;?>
          <?php echo $ELEMENT->inputWbfsysAddressItemMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysAddressItemMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
