<?php

$iconBack = $this->icon('process/back.png','Back');
$iconForward = $this->icon('process/forward.png','Forward');
$iconResponsible = $this->icon('control/receiver.png','Responsible');

?>  

<div id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-uform"  class="wgt-editor_form" >
  <div class="wcm wcm_ui_accordion" >
  
    <h3><a href="#">Process Data</a></h3>
    <div>
      <h2>Process Task Handling</h2>
      
      <label>Description</label>
      <div class="wgt-bspace" ></div>
      
      <label>Stats</label>
      <table>
        <tr>
          <td>Project:</td>
          <td><?php echo $VAR->entity->text(); ?></td>
        </tr>
        <tr>
          <td>Active node:</td>
          <td><?php echo $VAR->activeNode->label; ?></td>
        </tr>
        <tr>
          <td>Process start:</td>
          <td><?php echo $VAR->process->activStatus->getTimeStamp('m_time_created'); ?></td>
        </tr>
        <tr>
          <td>Number nodes:</td>
          <td>10</td>
        </tr>
      </table>
      
    </div>
    
    <h3><a href="#" >Node Data</a></h3>
    <div>
    <div 
      id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-info-new"
      class="node_entry <?php echo $VAR->process->activKey == 'new'?'active':''; ?>" 
      style="<?php echo $VAR->process->activKey == 'new'?'':'display:none'; ?>" >
      
      <h2 class="name" >Node: New</h2>

      <div class="wgt-clear small" >&nbsp;</div>
      
      <label>Node type</label>
      <div class="type wgt-bspace" >start</div>
      
      <label class="wgt-bspace-s" >Description</label>
      <div class="description wgt-bspace" >New</div>
      
      <label>Possible next steps</label>
      <ul class="edges" >
              <li class="forward wgt-bspace wgt-border wgt-corner" >
        
        <div>
          <label>Action:</label> 
          <?php echo $iconForward ?>Accepted
        </div>
        
        <div>
          <label>Description:</label><br />
          Accepted
        </div>

        <label>Actions:</label>
        <ul>
            <li>success:accepted</li>

        </ul>
      </li>
      <li class="forward wgt-bspace wgt-border wgt-corner" >
        
        <div>
          <label>Action:</label> 
          <?php echo $iconForward ?>Rejected
        </div>
        
        <div>
          <label>Description:</label><br />
          Rejected
        </div>

        <label>Actions:</label>
        <ul>
            <li>success:rejected</li>

        </ul>
      </li>
      </ul>
      
    </div>

    <div 
      id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-info-rejected"
      class="node_entry <?php echo $VAR->process->activKey == 'rejected'?'active':''; ?>" 
      style="<?php echo $VAR->process->activKey == 'rejected'?'':'display:none'; ?>" >
      
      <h2 class="name" >Node: Rejected</h2>

      <div class="wgt-clear small" >&nbsp;</div>
      
      <label>Node type</label>
      <div class="type wgt-bspace" >default</div>
      
      <label class="wgt-bspace-s" >Description</label>
      <div class="description wgt-bspace" >Rejected</div>
      
      <label>Possible next steps</label>
      <ul class="edges" >
              <li class="back wgt-bspace wgt-border wgt-corner" >
        
        <div>
          <label>Action:</label> 
          <?php echo $iconBack ?>New
        </div>
        
        <div>
          <label>Description:</label><br />
          New
        </div>

        <label>Actions:</label>
        <ul>
            <li>success:new</li>

        </ul>
      </li>
      <li class="forward wgt-bspace wgt-border wgt-corner" >
        
        <div>
          <label>Action:</label> 
          <?php echo $iconForward ?>Retired
        </div>
        
        <div>
          <label>Description:</label><br />
          Retired
        </div>

        <label>Actions:</label>
        <ul>
            <li>success:retired</li>

        </ul>
      </li>
      </ul>
      
    </div>

    <div 
      id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-info-accepted"
      class="node_entry <?php echo $VAR->process->activKey == 'accepted'?'active':''; ?>" 
      style="<?php echo $VAR->process->activKey == 'accepted'?'':'display:none'; ?>" >
      
      <h2 class="name" >Node: Accepted</h2>

      <div class="wgt-clear small" >&nbsp;</div>
      
      <label>Node type</label>
      <div class="type wgt-bspace" >default</div>
      
      <label class="wgt-bspace-s" >Description</label>
      <div class="description wgt-bspace" >Accepted</div>
      
      <label>Possible next steps</label>
      <ul class="edges" >
              <li class="forward wgt-bspace wgt-border wgt-corner" >
        
        <div>
          <label>Action:</label> 
          <?php echo $iconForward ?>Need More Information
        </div>
        
        <div>
          <label>Description:</label><br />
          Need More Information
        </div>

        <label>Actions:</label>
        <ul>
            <li>success:need_more_information</li>

        </ul>
      </li>
      <li class="forward wgt-bspace wgt-border wgt-corner" >
        
        <div>
          <label>Action:</label> 
          <?php echo $iconForward ?>In Progress
        </div>
        
        <div>
          <label>Description:</label><br />
          In Progress
        </div>

        <label>Actions:</label>
        <ul>
            <li>success:in_progress</li>

        </ul>
      </li>
      <li class="forward wgt-bspace wgt-border wgt-corner" >
        
        <div>
          <label>Action:</label> 
          <?php echo $iconForward ?>Finished
        </div>
        
        <div>
          <label>Description:</label><br />
          Finished
        </div>

        <label>Actions:</label>
        <ul>
            <li>success:completed</li>

        </ul>
      </li>
      <li class="forward wgt-bspace wgt-border wgt-corner" >
        
        <div>
          <label>Action:</label> 
          <?php echo $iconForward ?>Retired
        </div>
        
        <div>
          <label>Description:</label><br />
          Retired
        </div>

        <label>Actions:</label>
        <ul>
            <li>success:retired</li>

        </ul>
      </li>
      </ul>
      
    </div>

    <div 
      id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-info-need_more_information"
      class="node_entry <?php echo $VAR->process->activKey == 'need_more_information'?'active':''; ?>" 
      style="<?php echo $VAR->process->activKey == 'need_more_information'?'':'display:none'; ?>" >
      
      <h2 class="name" >Node: Need More Information</h2>

      <div class="wgt-clear small" >&nbsp;</div>
      
      <label>Node type</label>
      <div class="type wgt-bspace" >default</div>
      
      <label class="wgt-bspace-s" >Description</label>
      <div class="description wgt-bspace" >Need More Information</div>
      
      <label>Possible next steps</label>
      <ul class="edges" >
              <li class="forward wgt-bspace wgt-border wgt-corner" >
        
        <div>
          <label>Action:</label> 
          <?php echo $iconForward ?>In Progress
        </div>
        
        <div>
          <label>Description:</label><br />
          In Progress
        </div>

        <label>Actions:</label>
        <ul>
            <li>success:in_progress</li>

        </ul>
      </li>
      <li class="forward wgt-bspace wgt-border wgt-corner" >
        
        <div>
          <label>Action:</label> 
          <?php echo $iconForward ?>Finished
        </div>
        
        <div>
          <label>Description:</label><br />
          Finished
        </div>

        <label>Actions:</label>
        <ul>
            <li>success:completed</li>

        </ul>
      </li>
      <li class="forward wgt-bspace wgt-border wgt-corner" >
        
        <div>
          <label>Action:</label> 
          <?php echo $iconForward ?>Retired
        </div>
        
        <div>
          <label>Description:</label><br />
          Retired
        </div>

        <label>Actions:</label>
        <ul>
            <li>success:retired</li>

        </ul>
      </li>
      </ul>
      
    </div>

    <div 
      id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-info-in_progress"
      class="node_entry <?php echo $VAR->process->activKey == 'in_progress'?'active':''; ?>" 
      style="<?php echo $VAR->process->activKey == 'in_progress'?'':'display:none'; ?>" >
      
      <h2 class="name" >Node: In Progress</h2>

      <div class="wgt-clear small" >&nbsp;</div>
      
      <label>Node type</label>
      <div class="type wgt-bspace" >default</div>
      
      <label class="wgt-bspace-s" >Description</label>
      <div class="description wgt-bspace" >In Progress</div>
      
      <label>Possible next steps</label>
      <ul class="edges" >
              <li class="back wgt-bspace wgt-border wgt-corner" >
        
        <div>
          <label>Action:</label> 
          <?php echo $iconBack ?>Need More Information
        </div>
        
        <div>
          <label>Description:</label><br />
          Need More Information
        </div>

        <label>Actions:</label>
        <ul>
            <li>success:need_more_information</li>

        </ul>
      </li>
      <li class="forward wgt-bspace wgt-border wgt-corner" >
        
        <div>
          <label>Action:</label> 
          <?php echo $iconForward ?>Finished
        </div>
        
        <div>
          <label>Description:</label><br />
          Finished
        </div>

        <label>Actions:</label>
        <ul>
            <li>success:completed</li>

        </ul>
      </li>
      <li class="forward wgt-bspace wgt-border wgt-corner" >
        
        <div>
          <label>Action:</label> 
          <?php echo $iconForward ?>Retired
        </div>
        
        <div>
          <label>Description:</label><br />
          Retired
        </div>

        <label>Actions:</label>
        <ul>
            <li>success:retired</li>

        </ul>
      </li>
      </ul>
      
    </div>

    <div 
      id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-info-completed"
      class="node_entry <?php echo $VAR->process->activKey == 'completed'?'active':''; ?>" 
      style="<?php echo $VAR->process->activKey == 'completed'?'':'display:none'; ?>" >
      
      <h2 class="name" >Node: Finished</h2>

      <div class="wgt-clear small" >&nbsp;</div>
      
      <label>Node type</label>
      <div class="type wgt-bspace" >default</div>
      
      <label class="wgt-bspace-s" >Description</label>
      <div class="description wgt-bspace" >Finished</div>
      
      <label>Possible next steps</label>
      <ul class="edges" >
              <li class="forward wgt-bspace wgt-border wgt-corner" >
        
        <div>
          <label>Action:</label> 
          <?php echo $iconForward ?>Re Opened
        </div>
        
        <div>
          <label>Description:</label><br />
          Re Opened
        </div>

        <label>Actions:</label>
        <ul>
            <li>success:re_opened</li>

        </ul>
      </li>
      </ul>
      
    </div>

    <div 
      id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-info-re_opened"
      class="node_entry <?php echo $VAR->process->activKey == 're_opened'?'active':''; ?>" 
      style="<?php echo $VAR->process->activKey == 're_opened'?'':'display:none'; ?>" >
      
      <h2 class="name" >Node: Re Opened</h2>

      <div class="wgt-clear small" >&nbsp;</div>
      
      <label>Node type</label>
      <div class="type wgt-bspace" >default</div>
      
      <label class="wgt-bspace-s" >Description</label>
      <div class="description wgt-bspace" >Re Opened</div>
      
      <label>Possible next steps</label>
      <ul class="edges" >
              <li class="back wgt-bspace wgt-border wgt-corner" >
        
        <div>
          <label>Action:</label> 
          <?php echo $iconBack ?>Finished
        </div>
        
        <div>
          <label>Description:</label><br />
          Finished
        </div>

        <label>Actions:</label>
        <ul>
            <li>success:completed</li>

        </ul>
      </li>
      </ul>
      
    </div>

    <div 
      id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-info-closed"
      class="node_entry <?php echo $VAR->process->activKey == 'closed'?'active':''; ?>" 
      style="<?php echo $VAR->process->activKey == 'closed'?'':'display:none'; ?>" >
      
      <h2 class="name" >Node: Closed</h2>

      <div class="wgt-clear small" >&nbsp;</div>
      
      <label>Node type</label>
      <div class="type wgt-bspace" >default</div>
      
      <label class="wgt-bspace-s" >Description</label>
      <div class="description wgt-bspace" >Closed and Deployed</div>
      
      <label>Possible next steps</label>
      <ul class="edges" >
              <li class="forward wgt-bspace wgt-border wgt-corner" >
        
        <div>
          <label>Action:</label> 
          <?php echo $iconForward ?>Archived
        </div>
        
        <div>
          <label>Description:</label><br />
          Archived
        </div>

        <label>Actions:</label>
        <ul>

        </ul>
      </li>
      </ul>
      
    </div>

    <div 
      id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-info-retired"
      class="node_entry <?php echo $VAR->process->activKey == 'retired'?'active':''; ?>" 
      style="<?php echo $VAR->process->activKey == 'retired'?'':'display:none'; ?>" >
      
      <h2 class="name" >Node: Retired</h2>

      <div class="wgt-clear small" >&nbsp;</div>
      
      <label>Node type</label>
      <div class="type wgt-bspace" >default</div>
      
      <label class="wgt-bspace-s" >Description</label>
      <div class="description wgt-bspace" >Retired</div>
      
      <label>Possible next steps</label>
      <ul class="edges" >
              <li class="back wgt-bspace wgt-border wgt-corner" >
        
        <div>
          <label>Action:</label> 
          <?php echo $iconBack ?>New
        </div>
        
        <div>
          <label>Description:</label><br />
          New
        </div>

        <label>Actions:</label>
        <ul>
            <li>success:new</li>

        </ul>
      </li>
      <li class="back wgt-bspace wgt-border wgt-corner" >
        
        <div>
          <label>Action:</label> 
          <?php echo $iconBack ?>Retired
        </div>
        
        <div>
          <label>Description:</label><br />
          Retired
        </div>

        <label>Actions:</label>
        <ul>
            <li>success:retired</li>

        </ul>
      </li>
      </ul>
      
    </div>

    <div 
      id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-info-archived"
      class="node_entry <?php echo $VAR->process->activKey == 'archived'?'active':''; ?>" 
      style="<?php echo $VAR->process->activKey == 'archived'?'':'display:none'; ?>" >
      
      <h2 class="name" >Node: Archived</h2>

      <div class="wgt-clear small" >&nbsp;</div>
      
      <label>Node type</label>
      <div class="type wgt-bspace" >default</div>
      
      <label class="wgt-bspace-s" >Description</label>
      <div class="description wgt-bspace" >Archived</div>
      
      <label>Possible next steps</label>
      <ul class="edges" >
        
      </ul>
      
    </div>

    </div>
    
    <h3><a href="#" >Responsibles</a></h3>
    <div>
      <h2>Responsibles</h2>
      <ul>
  <li class="wgt-bspace" id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-resp-owner" ><label>Owner</label>
  <ul class="wgt-border wgt-corner" >
    <li class="wgt-bspace" >
      <strong>Area:</strong> wbfsys_task<br />
      <strong>Type:</strong> role<br />
      <strong>Relation:</strong> dataset<br />
      <strong>Roles:</strong>
       <ul>
         <li class="role" >owner</li>
      </ul>
    </li>
  </ul>
</li>
  <li class="wgt-bspace" id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-resp-staff" ><label>Staff</label>
  <ul class="wgt-border wgt-corner" >
    <li class="wgt-bspace" >
      <strong>Area:</strong> wbfsys_task<br />
      <strong>Type:</strong> role<br />
      <strong>Relation:</strong> dataset<br />
      <strong>Roles:</strong>
       <ul>
         <li class="role" >staff</li>
      </ul>
    </li>
  </ul>
</li>
</ul>

    </div>
    
    <h3><a href="#" >History</a></h3>
    <div>
      <h2>History</h2>
    </div>

  </div>
  <var>{"fillSpace": true,"animated": false}</var>
</div>

<div 
  id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>" 
  class="wgt-editor_container wcm wcm_widget_process_editor" >
<var>{
"label":"Task Handling",
"description":null,
"messages":"",
"actions":"",
"responsibles":""
}</var>
  
  <div class="wgt-graph_body" >
    <div 
      id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-n-new" 
      class="node pos_auto wgt-corner start <?php echo $VAR->process->activKey == 'new'?'active':''; ?>"  >
        <var>{ 
        "label":"New",
        "key":"new",
        "phase_label":"",
        "phase_key":"",
        "description":"New",
        "type":"start",
        "edges":[        {
          "label": "Accepted",
          "description": "Accepted",
          "target": "accepted",
          "dir": "forward"
        },
        {
          "label": "Rejected",
          "description": "Rejected",
          "target": "rejected",
          "dir": "forward"
        }]
        }</var>
        <label>New</label>
    </div>

    <div 
      id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-n-rejected" 
      class="node pos_auto wgt-corner default <?php echo $VAR->process->activKey == 'rejected'?'active':''; ?>"  >
        <var>{ 
        "label":"Rejected",
        "key":"rejected",
        "phase_label":"",
        "phase_key":"",
        "description":"Rejected",
        "type":"default",
        "edges":[        {
          "label": "New",
          "description": "New",
          "target": "new",
          "dir": "back"
        },
        {
          "label": "Retired",
          "description": "Retired",
          "target": "retired",
          "dir": "forward"
        }]
        }</var>
        <label>Rejected</label>
    </div>

    <div 
      id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-n-accepted" 
      class="node pos_auto wgt-corner default <?php echo $VAR->process->activKey == 'accepted'?'active':''; ?>"  >
        <var>{ 
        "label":"Accepted",
        "key":"accepted",
        "phase_label":"",
        "phase_key":"",
        "description":"Accepted",
        "type":"default",
        "edges":[        {
          "label": "Need More Information",
          "description": "Need More Information",
          "target": "need_more_information",
          "dir": "forward"
        },
        {
          "label": "In Progress",
          "description": "In Progress",
          "target": "in_progress",
          "dir": "forward"
        },
        {
          "label": "Finished",
          "description": "Finished",
          "target": "completed",
          "dir": "forward"
        },
        {
          "label": "Retired",
          "description": "Retired",
          "target": "retired",
          "dir": "forward"
        }]
        }</var>
        <label>Accepted</label>
    </div>

    <div 
      id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-n-need_more_information" 
      class="node pos_auto wgt-corner default <?php echo $VAR->process->activKey == 'need_more_information'?'active':''; ?>"  >
        <var>{ 
        "label":"Need More Information",
        "key":"need_more_information",
        "phase_label":"",
        "phase_key":"",
        "description":"Need More Information",
        "type":"default",
        "edges":[        {
          "label": "In Progress",
          "description": "In Progress",
          "target": "in_progress",
          "dir": "forward"
        },
        {
          "label": "Finished",
          "description": "Finished",
          "target": "completed",
          "dir": "forward"
        },
        {
          "label": "Retired",
          "description": "Retired",
          "target": "retired",
          "dir": "forward"
        }]
        }</var>
        <label>Need More Information</label>
    </div>

    <div 
      id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-n-in_progress" 
      class="node pos_auto wgt-corner default <?php echo $VAR->process->activKey == 'in_progress'?'active':''; ?>"  >
        <var>{ 
        "label":"In Progress",
        "key":"in_progress",
        "phase_label":"",
        "phase_key":"",
        "description":"In Progress",
        "type":"default",
        "edges":[        {
          "label": "Need More Information",
          "description": "Need More Information",
          "target": "need_more_information",
          "dir": "back"
        },
        {
          "label": "Finished",
          "description": "Finished",
          "target": "completed",
          "dir": "forward"
        },
        {
          "label": "Retired",
          "description": "Retired",
          "target": "retired",
          "dir": "forward"
        }]
        }</var>
        <label>In Progress</label>
    </div>

    <div 
      id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-n-completed" 
      class="node pos_auto wgt-corner default <?php echo $VAR->process->activKey == 'completed'?'active':''; ?>"  >
        <var>{ 
        "label":"Finished",
        "key":"completed",
        "phase_label":"",
        "phase_key":"",
        "description":"Finished",
        "type":"default",
        "edges":[        {
          "label": "Re Opened",
          "description": "Re Opened",
          "target": "re_opened",
          "dir": "forward"
        }]
        }</var>
        <label>Finished</label>
    </div>

    <div 
      id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-n-re_opened" 
      class="node pos_auto wgt-corner default <?php echo $VAR->process->activKey == 're_opened'?'active':''; ?>"  >
        <var>{ 
        "label":"Re Opened",
        "key":"re_opened",
        "phase_label":"",
        "phase_key":"",
        "description":"Re Opened",
        "type":"default",
        "edges":[        {
          "label": "Finished",
          "description": "Finished",
          "target": "completed",
          "dir": "back"
        }]
        }</var>
        <label>Re Opened</label>
    </div>

    <div 
      id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-n-closed" 
      class="node pos_auto wgt-corner default <?php echo $VAR->process->activKey == 'closed'?'active':''; ?>"  >
        <var>{ 
        "label":"Closed",
        "key":"closed",
        "phase_label":"",
        "phase_key":"",
        "description":"Closed and Deployed",
        "type":"default",
        "edges":[        {
          "label": "Archived",
          "description": "Archived",
          "target": "archived",
          "dir": "forward"
        }]
        }</var>
        <label>Closed</label>
    </div>

    <div 
      id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-n-retired" 
      class="node pos_auto wgt-corner default <?php echo $VAR->process->activKey == 'retired'?'active':''; ?>"  >
        <var>{ 
        "label":"Retired",
        "key":"retired",
        "phase_label":"",
        "phase_key":"",
        "description":"Retired",
        "type":"default",
        "edges":[        {
          "label": "New",
          "description": "New",
          "target": "new",
          "dir": "back"
        },
        {
          "label": "Retired",
          "description": "Retired",
          "target": "retired",
          "dir": "back"
        }]
        }</var>
        <label>Retired</label>
    </div>

    <div 
      id="wgt-graph-wbfsys_task-handling-<?php echo $VAR->entity->getId() ?>-n-archived" 
      class="node pos_auto wgt-corner default <?php echo $VAR->process->activKey == 'archived'?'active':''; ?>"  >
        <var>{ 
        "label":"Archived",
        "key":"archived",
        "phase_label":"",
        "phase_key":"",
        "description":"Archived",
        "type":"default",
        "edges":[]
        }</var>
        <label>Archived</label>
    </div>

  </div>
  
</div>

<div class="wgt-clear" ></div>
