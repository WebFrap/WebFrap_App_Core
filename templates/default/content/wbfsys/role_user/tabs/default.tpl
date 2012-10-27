<div>
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

</div>

<div class="wgt-clear xxsmall">&nbsp;</div>