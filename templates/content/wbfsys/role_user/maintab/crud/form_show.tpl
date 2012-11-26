
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
      
<p>This is a read only view of the System User base and related data.
To edit the dataset change into the edit mode.</p>

<label class="hint" >Hint:</label> 
<p class="hint" >If the edit mode button is not visible you do not have the edit rights for this System User.
Should you feel that you should have edit rights, please contact the system admin.</p>
      
<label>Address Items</label>
<p>Here you can maintain Address Items related to the System User.</p>
<p>To do so click on "Create new Address Item".</p>
      

    </div>      
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
<div class="full">
          <?php echo $ELEMENT->inputWbfsysRoleUserDescription;?>
 </div>
 </fieldset>
     </div>
      
    </div>
    

<div class="wgt-clear xxsmall">&nbsp;</div>
