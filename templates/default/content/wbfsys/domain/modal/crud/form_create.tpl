  <div id="wgt-tab-form-wbfsys_domain-create" class="wcm wcm_ui_tab" >
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
        id="<?php echo $this->id?>_tab_wbfsys_domain_details"
        title="<?php echo $I18N->l('Domain','wbfsys.domain.label')?>"  >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_domain-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_domain-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDomainName;?>
          <?php echo $ELEMENT->inputWbfsysDomainId2dns;?>
          <?php echo $ELEMENT->inputWbfsysDomainIdDns;?>
          <?php echo $ELEMENT->inputWbfsysDomainIdTechc;?>
          <?php echo $ELEMENT->inputWbfsysDomainIdCustomer;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDomainIdDnsZone;?>
          <?php echo $ELEMENT->inputWbfsysDomainIsPrimary;?>
          <?php echo $ELEMENT->inputWbfsysDomainIdRegistrar;?>
          <?php echo $ELEMENT->inputWbfsysDomainIdAdminc;?>
          <?php echo $ELEMENT->inputWbfsysDomainIdOwner;?>
          <?php echo $ELEMENT->inputWbfsysDomainIdCmsProject;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_domain-description').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_domain-description" >
        <div class="left bw3" >
        </div>
        <div class="inline bw3" >
        </div>
        <div class="full" >
          <?php echo $ELEMENT->inputWbfsysDomainDescription;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_domain-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_domain-meta" style="display:none" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysDomainMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysDomainMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysDomainRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysDomainMUuid;?>
          <?php echo $ELEMENT->inputWbfsysDomainMVersion;?>
          <?php echo $ELEMENT->inputWbfsysDomainMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysDomainMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>



      <div class="wgt-clear small">&nbsp;</div>
    </div>
  </div>
