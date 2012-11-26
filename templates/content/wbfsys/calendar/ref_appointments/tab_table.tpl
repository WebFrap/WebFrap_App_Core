<?php if( $ELEMENT->tableAppointments ){ ?>

  <form
    method="get"
    action="<?php echo $VAR->searchFormActionAppointments.$ELEMENT->tableAppointments->getAccessPath(); ?>"
    id="<?php echo $VAR->searchFormIdAppointments?>" >

     <input
      type="hidden"
      name="search_appointments[id_calendar]"
      value="<?php echo $VAR->refIdAppointments?>"  />
      <?php // pre save ?>
  </form>

  <div class="wgt-clear xxsmall" ></div>

  <?php echo $ELEMENT->tableAppointments?>



<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
