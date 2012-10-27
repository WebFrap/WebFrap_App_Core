<?php if( $ELEMENT->tableManagement ){ ?>

  <form
    method="get"
    action="<?php echo $VAR->searchFormActionManagement.$ELEMENT->tableManagement->getAccessPath(); ?>"
    id="<?php echo $VAR->searchFormIdManagement?>" >

     <input
      type="hidden"
      name="search_management[id_module]"
      value="<?php echo $VAR->refIdManagement?>"  />
      <?php // pre save ?>
  </form>

  <div class="wgt-clear xxsmall" ></div>

  <?php echo $ELEMENT->tableManagement?>



<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
