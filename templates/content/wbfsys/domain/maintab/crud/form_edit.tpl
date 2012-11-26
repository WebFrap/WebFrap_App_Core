
  <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
  <form
    method="post"
    accept-charset="utf-8"
    class="<?php echo $VAR->formClass?>"
    id="<?php echo $VAR->formId?>"
    action="<?php echo $VAR->formAction?>" ></form>

  <div 
    id="<?php echo $this->id?>" 
    style="position:relative;height:100%;overflow-y:hidden;" 
    class="wcm wcm_ui_accordion_tab"  >
    
    <!-- Accordion Head -->
    <div style="position:absolute;width:200px;height:100%;top:0px:bottom:0px;"   >
    
      <div id="<?php echo $this->id?>-head" style="height:600px;" >
          
        <h3><a tab="details" ><?php echo $I18N->l('Domain','wbfsys.domain.label')?></a></h3>
        <div>
          
<p>The dashed fields marked with an asterisk in the label are mandatory.<br />
You will not be able to save any data until you have provided all required information.</p>

<label class="hint" >Hint:</label>
<p class="hint" >If you made changes don't forget to save before closing the tab, or else your work will be lost.</p>
      
        </div>
        
        
    <?php
      if // check if the recode exists and if it should be displayed
      (
        Webfrap::classLoadable('HostingSubdomain_Entity')
          && $VAR->showTabSubdomain
      ){
    ?>

      <!-- tab: subdomain in management: HostingSubdomain manytoone -->
      <h3>
        <a
          tab="subdomain"
          wgt_src="ajax.php?c=Wbfsys.Domain_Ref_Subdomain.tab&amp;objid=<?php
              echo $VAR->entityWbfsysDomain->getId();
            ?>&tabid=<?php
              echo $this->id;
            ?>-content-subdomain&a_root=<?php
              echo $VAR->params->aclRoot;
            ?>&m_root=<?php
              echo $VAR->params->maskRoot;
            ?>&a_root_id=<?php
              echo $VAR->params->aclRootId;
            ?>&a_key=<?php
              echo $VAR->params->aclNode;
            ?>&a_level=<?php
              echo (1+$VAR->params->aclLevel);
            ?>&a_node=mod-wbfsys-cat-core_data-ref-subdomain" ><?php echo $I18N->l('Subdomain','wbfsys.domain.label')?></a>
      </h3>
      <div>
        
<label>Subdomains</label>
<p>Here you can maintain Subdomains related to the Domain.</p>
<p>To do so click on "Create new Subdomain".</p>
      

      </div>

    <?php } ?>

        
      </div>
    </div>
    
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
  
      <div class="container" id="<?php echo $this->id?>-content-details" >
        
      <fieldset class="wgt-space bw61" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_domain-default-<?php echo $VAR->entityWbfsysDomain; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_domain-default-<?php echo $VAR->entityWbfsysDomain; ?>" >
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
          <span onclick="$S('#wgt-box-wbfsys_domain-description-<?php echo $VAR->entityWbfsysDomain; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Description
        </legend>
        <div id="wgt-box-wbfsys_domain-description-<?php echo $VAR->entityWbfsysDomain; ?>" >
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
          <span onclick="$S('#wgt-box-wbfsys_domain-meta-<?php echo $VAR->entityWbfsysDomain; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_domain-meta-<?php echo $VAR->entityWbfsysDomain; ?>" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.Domain.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
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
      
      
      <div class="container" id="<?php echo $this->id?>-content-subdomain" ></div>

      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
