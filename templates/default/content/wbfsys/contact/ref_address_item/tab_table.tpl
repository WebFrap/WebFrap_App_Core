<?php if( $ELEMENT->tableAddressItem ){ ?>

  <form
    method="get"
    action="<?php echo $VAR->searchFormActionAddressItem.$ELEMENT->tableAddressItem->getAccessPath(); ?>"
    id="<?php echo $VAR->searchFormIdAddressItem?>" >

     <input
      type="hidden"
      name="search_address_item[vid]"
      value="<?php echo $VAR->refIdAddressItem?>"  />
      <?php // pre save ?>
  </form>

  <div class="wgt-clear xxsmall" ></div>

  <?php echo $ELEMENT->tableAddressItem?>



<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
