<?php if( $ELEMENT->tableEntity ){ ?>

  <form
    method="get"
    action="<?php echo $VAR->searchFormActionEntity.$ELEMENT->tableEntity->getAccessPath(); ?>"
    id="<?php echo $VAR->searchFormIdEntity?>" >

     <input
      type="hidden"
      name="search_entity[id_module]"
      value="<?php echo $VAR->refIdEntity?>"  />
      <?php // pre save ?>
  </form>

  <div class="wgt-clear xxsmall" ></div>

  <?php echo $ELEMENT->tableEntity?>



<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
