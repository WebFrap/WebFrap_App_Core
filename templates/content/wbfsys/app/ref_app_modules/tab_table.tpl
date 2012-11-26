  <?php if( $ELEMENT->tableAppModules ){ ?>

    <form
      method="get"
      action="<?php echo $VAR->searchFormActionAppModules.$ELEMENT->tableAppModules->getAccessPath();?>"
      id="<?php echo $VAR->searchFormIdAppModules?>" >

       <input
        type="hidden"
        name="search_wbfsys_app_modules[id_app]"
        value="<?php echo $VAR->refIdAppModules?>"  />
    </form>



      <div class="wgt-clear xxsmall" ></div>

      <?php echo $ELEMENT->tableAppModules ?>


    <script type="application/javascript" >
      $S('#<?php echo $VAR->searchFormIdAppModules?>').data('connect',function( objid ){
        $R.post(
          'ajax.php?c=Wbfsys.App_Ref_AppModules.connect<?php echo $ELEMENT->tableAppModules->getJsAccessPath();?>',{
            'wbfsys_app_modules[id_app]':'<?php echo $VAR->refIdAppModules?>',
            'wbfsys_app_modules[id_module]':objid
          }
        );
      });
    </script>


  <?php }else{ ?>

    <p class="wgt-box error" >Sorry, an internal error occured. This resource is not loadable.</p>

  <?php } ?>