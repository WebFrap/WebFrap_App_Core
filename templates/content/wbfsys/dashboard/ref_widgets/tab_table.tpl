  <?php if( $ELEMENT->tableWidgets ){ ?>

    <form
      method="get"
      action="<?php echo $VAR->searchFormActionWidgets.$ELEMENT->tableWidgets->getAccessPath();?>"
      id="<?php echo $VAR->searchFormIdWidgets?>" >

       <input
        type="hidden"
        name="search_wbfsys_dashboard_widget[id_dashboard]"
        value="<?php echo $VAR->refIdWidgets?>"  />
    </form>



      <div class="wgt-clear xxsmall" ></div>

      <?php echo $ELEMENT->tableWidgets ?>


    <script type="application/javascript" >
      $S('#<?php echo $VAR->searchFormIdWidgets?>').data('connect',function( objid ){
        $R.post(
          'ajax.php?c=Wbfsys.Dashboard_Ref_Widgets.connect<?php echo $ELEMENT->tableWidgets->getJsAccessPath();?>',{
            'wbfsys_dashboard_widget[id_dashboard]':'<?php echo $VAR->refIdWidgets?>',
            'wbfsys_dashboard_widget[id_widget]':objid
          }
        );
      });
    </script>


  <?php }else{ ?>

    <p class="wgt-box error" >Sorry, an internal error occured. This resource is not loadable.</p>

  <?php } ?>