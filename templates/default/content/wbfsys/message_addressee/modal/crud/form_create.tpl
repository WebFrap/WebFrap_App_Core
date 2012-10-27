  <div id="wgt-tab-form-wbfsys_message_addressee-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_message_addressee_details"
        title="<?php echo $I18N->l('Message Addressee','wbfsys.message_addressee.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_message_addressee-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_message_addressee-default" >
          <?php echo $ELEMENT->inputWbfsysMessageAddresseeVid;?>

          <?php echo $ELEMENT->inputWbfsysMessageAddresseeIdVidEntity;?>

        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageAddresseeIdMessage;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageAddresseeIdType;?>
          <?php echo $ELEMENT->inputWbfsysMessageAddresseeIdArea;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_message_addressee-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_message_addressee-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageAddresseeMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysMessageAddresseeMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysMessageAddresseeRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysMessageAddresseeMUuid;?>
          <?php echo $ELEMENT->inputWbfsysMessageAddresseeMVersion;?>
          <?php echo $ELEMENT->inputWbfsysMessageAddresseeMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysMessageAddresseeMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
