<?php if( $ELEMENT->tableSubdomain ){ ?>

  <form
    method="get"
    action="<?php echo $VAR->searchFormActionSubdomain.$ELEMENT->tableSubdomain->getAccessPath(); ?>"
    id="<?php echo $VAR->searchFormIdSubdomain?>" >

     <input
      type="hidden"
      name="search_subdomain[id_domain]"
      value="<?php echo $VAR->refIdSubdomain?>"  />
      <?php // pre save ?>
  </form>

  <div class="wgt-clear xxsmall" ></div>

  <?php echo $ELEMENT->tableSubdomain?>



<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
