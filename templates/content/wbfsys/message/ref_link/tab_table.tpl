  <?php if( $ELEMENT->tableLink ){ ?>

    <form
      method="get"
      action="<?php echo $VAR->searchFormActionLink.$ELEMENT->tableLink->getAccessPath();?>"
      id="<?php echo $VAR->searchFormIdLink?>" >

       <input
        type="hidden"
        name="search_wbfsys_data_link[id_message]"
        value="<?php echo $VAR->refIdLink?>"  />
    </form>



      <div class="wgt-clear xxsmall" ></div>

      <?php echo $ELEMENT->tableLink ?>



  <?php }else{ ?>

    <p class="wgt-box error" >Sorry, an internal error occured. This resource is not loadable.</p>

  <?php } ?>