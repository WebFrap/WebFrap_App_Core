<?php if( $ELEMENT->tableVersion ){ ?>

  <form
    method="get"
    action="<?php echo $VAR->searchFormActionVersion.$ELEMENT->tableVersion->getAccessPath(); ?>"
    id="<?php echo $VAR->searchFormIdVersion?>" >

     <input
      type="hidden"
      name="search_version[id_os]"
      value="<?php echo $VAR->refIdVersion?>"  />
      <?php // pre save ?>
  </form>

  <div class="wgt-clear xxsmall" ></div>

  <?php echo $ELEMENT->tableVersion?>



<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
