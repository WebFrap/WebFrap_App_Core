  <div id="wgt-tab-form-wbfsys_domain_alias-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_domain_alias_details"
        title="<?php echo $I18N->l('Domain Alias','wbfsys.domain_alias.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_domain_alias-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_domain_alias-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDomainAliasIdDomain;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDomainAliasDestination;?>
          <?php echo $ELEMENT->inputWbfsysDomainAliasAddress;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_domain_alias-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_domain_alias-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDomainAliasMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysDomainAliasMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysDomainAliasRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDomainAliasMUuid;?>
          <?php echo $ELEMENT->inputWbfsysDomainAliasMVersion;?>
          <?php echo $ELEMENT->inputWbfsysDomainAliasMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysDomainAliasMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
