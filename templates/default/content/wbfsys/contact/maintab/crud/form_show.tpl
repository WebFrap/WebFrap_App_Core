
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
          
        <h3><a tab="details" ><?php echo $I18N->l('Contact','wbfsys.contact.label')?></a></h3>
        <div>
          
<p>This is a read only view of the Contact base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this Contact.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
        </div>
        
        
    <?php
      if // check if the recode exists and if it should be displayed
      (
        Webfrap::classLoadable('WbfsysAddressItem_Entity')
          && $VAR->showTabAddressItem
      ){
    ?>

      <!-- tab: address_item in management: WbfsysAddressItem manytoone -->
      <h3>
        <a
          tab="address_item"
          wgt_src="ajax.php?c=Wbfsys.Contact_Ref_AddressItem.tab&amp;objid=<?php
              echo $VAR->entityWbfsysContact->getId();
            ?>&tabid=<?php
              echo $this->id;
            ?>-content-address_item&a_root=<?php
              echo $VAR->params->aclRoot;
            ?>&m_root=<?php
              echo $VAR->params->maskRoot;
            ?>&a_root_id=<?php
              echo $VAR->params->aclRootId;
            ?>&a_key=<?php
              echo $VAR->params->aclNode;
            ?>&a_level=<?php
              echo (1+$VAR->params->aclLevel);
            ?>&a_node=mod-wbfsys-cat-core_data-ref-address_item" ><?php echo $I18N->l('Message Item','wbfsys.contact.label')?></a>
      </h3>
      <div>
        
<label>Address Items</label>
<p>Here you can maintain Address Items related to the Contact.</p>
<p>To do so click on "Create new Address Item".</p>
      

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
          <span onclick="$S('#wgt-box-wbfsys_contact-default').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Default
        </legend>
        <div id="wgt-box-wbfsys_contact-default" >
        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysContactIdPerson;?>
        </div>
        <div class="inline bw3" >
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_contact-meta').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_contact-meta" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.Contact.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left bw3" >
          <?php echo $ELEMENT->inputWbfsysContactMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysContactMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysContactRowid;?>
        </div>
        <div class="inline bw3" >
          <?php echo $ELEMENT->inputWbfsysContactMUuid;?>
          <?php echo $ELEMENT->inputWbfsysContactMVersion;?>
          <?php echo $ELEMENT->inputWbfsysContactMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysContactMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>

      </div>
      
      
      <div class="container" id="<?php echo $this->id?>-content-address_item" ></div>

      
    </div>
    
  </div>

<div class="wgt-clear xxsmall">&nbsp;</div>
