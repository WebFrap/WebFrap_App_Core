  <div id="wgt-tab-form-wbfsys_ban-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_ban_details"
        title="<?php echo $I18N->l('Ban','wbfsys.ban.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_ban-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_ban-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysBanBanTill;?>
          <?php echo $ELEMENT->inputWbfsysBanIdRole;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysBanIdStatus;?>
          <?php echo $ELEMENT->inputWbfsysBanBanFrom;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_ban-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_ban-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysBanMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysBanMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysBanRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysBanMUuid;?>
          <?php echo $ELEMENT->inputWbfsysBanMVersion;?>
          <?php echo $ELEMENT->inputWbfsysBanMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysBanMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
