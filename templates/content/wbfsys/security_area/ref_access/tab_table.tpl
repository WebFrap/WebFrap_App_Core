<?php if( $ELEMENT->tableAccess ){ ?>

  <form
    method="get"
    action="<?php echo $VAR->searchFormActionAccess.$ELEMENT->tableAccess->getAccessPath(); ?>"
    id="<?php echo $VAR->searchFormIdAccess?>" >

     <input
      type="hidden"
      name="search_access[id_area]"
      value="<?php echo $VAR->refIdAccess?>"  />
      <?php // pre save ?>
  </form>

  <div class="wgt-clear xxsmall" ></div>

  <?php echo $ELEMENT->tableAccess?>



<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
