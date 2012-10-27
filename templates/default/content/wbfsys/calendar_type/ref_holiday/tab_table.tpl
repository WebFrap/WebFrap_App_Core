<?php if( $ELEMENT->tableHoliday ){ ?>

  <form
    method="get"
    action="<?php echo $VAR->searchFormActionHoliday.$ELEMENT->tableHoliday->getAccessPath(); ?>"
    id="<?php echo $VAR->searchFormIdHoliday?>" >

     <input
      type="hidden"
      name="search_holiday[id_calendar_type]"
      value="<?php echo $VAR->refIdHoliday?>"  />
      <?php // pre save ?>
  </form>

  <div class="wgt-clear xxsmall" ></div>

  <?php echo $ELEMENT->tableHoliday?>



<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
