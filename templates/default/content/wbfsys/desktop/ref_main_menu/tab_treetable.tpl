<?php if( $ELEMENT->treetableMainMenu ){ ?>

    <form
      method="get"
      action="<?php echo $VAR->searchFormActionMainMenu.$ELEMENT->treetableMainMenu->getAccessPath();?>"
      id="<?php echo $VAR->searchFormIdMainMenu?>" >

       <input
        type="hidden"
        name="search_main_menu[id_menu]"
        value="<?php echo $VAR->refIdMainMenu?>"  />
        <?php // pre save ?>
    </form>
    <form
      method="post"
      action="ajax.php?c=Wbfsys.Desktop_Ref_MainMenu.append<?php echo $ELEMENT->treetableMainMenu->getAccessPath();?>"
      id="wgt_append_form_wbfsys_desktop_main_menu" >

      <input
        type="hidden" name="wbfsys_menu_entry[id_menu]"
        value="<?php echo $VAR->refIdMainMenu?>" />

    </form>

    <script type="text/javascript" >
      function append_wbfsys_desktop_main_menu_<?php echo $VAR->refIdMainMenu?>( targetId ){
        $R.form( 'wgt_append_form_wbfsys_desktop_main_menu' , '&amp;objid='+target_id, {append:true} );
      }
    </script>



        <div class="wgt-clear xxsmall" ></div>
        <?php echo $ELEMENT->treetableMainMenu?>

<?php }else{ ?>

  <p class="wgt-box error" >Sorry, an internal Error occured. This Resource is not loadable.</p>

<?php } ?>
