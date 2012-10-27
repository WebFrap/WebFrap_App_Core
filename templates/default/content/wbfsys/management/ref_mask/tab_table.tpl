<?php if( $ELEMENT->tableMask ){ ?>

  <form
    method="get"
    action="<?php echo $VAR->searchFormActionMask.$ELEMENT->tableMask->getAccessPath(); ?>"
    id="<?php echo $VAR->searchFormIdMask?>" >

     <input
      type="hidden"
      name="search_mask[id_management]"
      value="<?php echo $VAR->refIdMask?>"  />
      <?php // pre save ?>
  </form>

  <div class="wgt-clear xxsmall" ></div>

  <?php echo $ELEMENT->tableMask?>



<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
