
  <!-- elements are assigned via class asgd-<?php echo $VAR->formId?> -->
  <form
    method="post"
    accept-charset="utf-8"
    class="<?php echo $VAR->formClass?>"
    id="<?php echo $VAR->formId?>"
    action="<?php echo $VAR->formAction?>" ></form>

        
  <div id="<?php echo $this->id?>" style="position:relative;height:100%;overflow-y:hidden;" class="wcm wcm_ui_accordion_tab"  >
    
    <!-- Accordion Head -->
    <div 
      style="position:absolute;width:200px;height:100%;top:0px:bottom:0px;"   >
    
      <div id="<?php echo $this->id?>-head"  >
      
    <!-- tab name:default -->
    <h3>
      <a 
        tab="default"
        class=""
        
      
       >Defaults</a>
    </h3>
    <div>
      
<p>The dashed fields marked with an asterisk in the label are mandatory.<br />
You will not be able to save any data until you have provided all required information.</p>

<label class="hint" >Hint:</label>
<p class="hint" >If you made changes don't forget to save before closing the tab, or else your work will be lost.</p>
      
<label>Address Items</label>
<p>Here you can maintain Address Items related to the System User.</p>
<p>To do so click on "Create new Address Item".</p>
      

    </div>
  <?php if( $VAR->showTabGroups ){ ?>
    <!-- tab name:groups -->


    <!-- tab name:groups -->
    <h3>
      <a 
        tab="groups"
        class=""
        
      wgt_src="ajax.php?c=Wbfsys.RoleUser_Tab_Groups.load&namespace=wbfsys_role_user&amp;objid=<?php
            echo $VAR->entityWbfsysRoleUser;
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-groups&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>"

      
       >Groups</a>
    </h3>
    <div>
      
<label>User Roles</label>
<p>Here you can assign User Roles to the currently selected System User.</p>
<p>To do so click on "Append new User Roles", search for the designated User Roles
and append it by clicking on the "connect" Action in the list entry menu.</p>
      
    </div>

  <?php } ?>

  <?php if( $VAR->showTabProfiles ){ ?>
    <!-- tab name:profiles -->


    <!-- tab name:profiles -->
    <h3>
      <a 
        tab="profiles"
        class=""
        
      wgt_src="ajax.php?c=Wbfsys.RoleUser_Tab_Profiles.load&namespace=wbfsys_role_user&amp;objid=<?php
            echo $VAR->entityWbfsysRoleUser;
          ?>&tabid=<?php
            echo $this->id;
          ?>-content-profiles&a_root=<?php
            echo $VAR->params->aclRoot;
          ?>&m_root=<?php
            echo $VAR->params->maskRoot;
          ?>&a_root_id=<?php
            echo $VAR->params->aclRootId;
          ?>&a_key=<?php
            echo $VAR->params->aclNode;
          ?>&a_level=<?php
            echo (1+$VAR->params->aclLevel);
          ?>"

      
       >Profiles</a>
    </h3>
    <div>
      
<label>Profiles</label>
<p>Here you can assign Profiles to the currently selected System User.</p>
<p>To do so click on "Append new Profiles", search for the designated Profiles
and append it by clicking on the "connect" Action in the list entry menu.</p>
      
    </div>

  <?php } ?>
      
      </div><!-- End accordion head -->
    </div><!-- End accordion container -->
    
    <!-- Content Main Container -->
    <div 
      id="<?php echo $this->id?>-content" 
      style="position:absolute;left:200px;right:0px;top:0px;bottom:0px;height:100%;overflow:hidden;overflow-y:auto;"  >
     <div class="container" id="<?php echo $this->id ?>-content-default" >
<fieldset id="wgt-fieldset-<?php echo $this->id ?>-wbfsys_role_user-default"  class="wgt-space bw61" name="default" >
<legend>Name</legend>
<div class="left bw3">
          <?php echo $ELEMENT->inputWbfsysRoleUserName;?>
          <?php echo $ELEMENT->inputEmbedPersonFirstname;?>
          <?php echo $ELEMENT->inputEmbedPersonLastname;?>
          <?php echo $ELEMENT->inputEmbedPersonAcademicTitle;?>
          <?php echo $ELEMENT->inputEmbedPersonNoblesseTitle;?>
 </div>
<div class="right bw3">
          <?php echo $ELEMENT->inputEmbedPersonPhoto;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserIdEmployee;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserIdPerson;?>
 </div>
 </fieldset>
<fieldset id="wgt-fieldset-<?php echo $this->id ?>-wbfsys_role_user-passwd"  class="wgt-space bw61" name="passwd" >
<legend>Password and Roles</legend>
<div class="left bw3">
          <?php echo $ELEMENT->inputWbfsysRoleUserPassword;?>
 </div>
<div class="inline bw3">
          <?php echo $ELEMENT->inputWbfsysRoleUserLevel;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserProfile;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserInactive;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserNonCertLogin;?>
 </div>
 </fieldset>
<div class="wgt-space bw61" name="address_item" >
<?php if( $ELEMENT->tableAddressItem ){ ?>

  <form
    method="get"
    action="<?php echo $VAR->searchFormActionAddressItem.$ELEMENT->tableAddressItem->getAccessPath(); ?>"
    id="<?php echo $VAR->searchFormIdAddressItem?>" >

     <input
      type="hidden"
      name="search_address_item[id_user]"
      value="<?php echo $VAR->refIdAddressItem?>"  />
      <?php // pre save ?>
  </form>

  <div class="wgt-clear xxsmall" ></div>

  <?php echo $ELEMENT->tableAddressItem?>



<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
 </div>
<fieldset id="wgt-fieldset-<?php echo $this->id ?>-wbfsys_role_user-description"  class="wgt-space bw61" name="description" >
<legend>Description</legend>
<div class="left bw3">
          <?php echo $ELEMENT->inputWbfsysRoleUserDescription;?>
 </div>
<div class="inline bw3">
    
<?php 

if( $ELEMENT->item_Skill )
{ 
?>
  
  <!-- Suchformular, wird für Suche und Paging verwendet -->
  <form
    method="get"
    accept-charset="utf-8"
    id="<?php echo $VAR->value
    ( 
      'searchFormId_Item_Skill', 
      'wgt-form--item-skill-'.$VAR->refId_Item_Skill.'-search'
    ) ?>"
    action="<?php echo $VAR->value
    ( 
      'searchFormAction_Item_Skill', 
      'ajax.php?c=._Item_Skill.search&amp;objid='.$VAR->refId_Item_Skill  
    ) ?>" ></form>

  <!-- Save Formular, wird zum speichern der editierbaren Itemfelder verwendet -->
  <form
    method="post"
    accept-charset="utf-8"
    id="<?php echo $VAR->value
    ( 
      'saveFormId_Item_Skill', 
      'wgt-form--item-skill-'.$VAR->refId_Item_Skill.'-update'
    ) ?>"
    action="<?php echo $VAR->value
    ( 
      'saveFormAction_Item_Skill', 
      'ajax.php?c=._Item_Skill.updateAssignments&amp;objid='.$VAR->refId_Item_Skill 
    ) ?>" ></form>


<?php 
  // ausgabe des Items
  echo $ELEMENT->item_Skill;
}
else
{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Item is not loadable.</p>

<?php } ?>
 </div>
 </fieldset>

      <fieldset class="wgt-space bw61" style="<?php echo $VAR->displayMeta ? '': 'display:none' ?>" >
        <legend>
          <span onclick="$S('#wgt-box-wbfsys_role_user-meta-<?php echo $VAR->entityWbfsysRoleUser; ?>').iconToggle(this);">
            <?php echo Wgt::icon('control/opened.png','xsmall',$I18N->l('Open','wbf.label'))?>
          </span>
          Meta
        </legend>
        <div id="wgt-box-wbfsys_role_user-meta-<?php echo $VAR->entityWbfsysRoleUser; ?>" style="display:none" >
<div class="full" >
  Link: <strong><?php echo $this->getServerAddress() ?>maintab.php?c=Wbfsys.RoleUser.edit&amp;objid=<?php echo $VAR->entity ?></strong>
</div>        <div class="left half" >
          <?php echo $ELEMENT->inputEmbedPersonMRoleChange;?>
          <?php echo $ELEMENT->inputEmbedPersonMVersion;?>
          <?php echo $ELEMENT->inputEmbedPersonMTimeCreated;?>
          <?php echo $ELEMENT->inputEmbedPersonRowid;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMTimeChanged;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMRoleChange;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserRowid;?>
        </div>
        <div class="inline half" >
          <?php echo $ELEMENT->inputEmbedPersonMTimeChanged;?>
          <?php echo $ELEMENT->inputEmbedPersonMUuid;?>
          <?php echo $ELEMENT->inputEmbedPersonMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMUuid;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMRoleCreate;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMVersion;?>
          <?php echo $ELEMENT->inputWbfsysRoleUserMTimeCreated;?>
        </div>

          <div class="wgt-clear small">&nbsp;</div>
        </div>
      </fieldset>
     </div>

  <?php if( $VAR->showTabGroups ){ ?>
    <!-- tab name:groups -->

     <div class="container" id="<?php echo $this->id ?>-content-groups" >
     </div>


  <?php } ?>

  <?php if( $VAR->showTabProfiles ){ ?>
    <!-- tab name:profiles -->

     <div class="container" id="<?php echo $this->id ?>-content-profiles" >
     </div>


  <?php } ?>
      
    </div>
    

<div class="wgt-clear xxsmall">&nbsp;</div>
