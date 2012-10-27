<?php

$this->crumbs = array
(
  array
  (
    'Root',
    $this->interface.'?c=Webfrap.Navigation.explorer',
    'places/desktop.png'
  ),
  array
  (
    'wbfsys',
    $this->interface.'?c=wbfsys.base.menu',
    'places/module.png'
   ),
);

$this->firstEntry = array
(
  'menu_webfrap_root',
  Wgt::AJAX,
  '..',
  'webfrap root',
  $this->interface.'?c=Webfrap.Navigation.explorer',
  'places/folder_up.png',
);

if( $acl->access( 'mod-wbfsys:admin', null, true ) )
{

  $this->files[] = array
  (
    'menu-category-wbfsys-acl',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Wbfsys ACLs',
      'wbfsys.label'
    ),
    $this->view->i18n->l
    (
      'Wbfsys ACLs',
      'wbfsys.label'
    ),
    $this->interface.'?c=wbfsys.Base_Acl.listing',
    'places/acl.png',
    'mod-wbfsys:admin'
  );

}

$this->folders[] = array
(
  'menu_category_default',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'Default',
    'wbfsys.label'
  ),
  $this->view->i18n->l
  (
    'Default',
    'wbfsys.label'
  ),
  $this->interface.'?c=Wbfsys.base.menu&amp;menu=default',
  'places/category.png',
);

$this->folders[] = array
(
  'menu_category_master_data',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'Master Data',
    'wbfsys.label'
  ),
  $this->view->i18n->l
  (
    'Master Data',
    'wbfsys.label'
  ),
  $this->interface.'?c=Wbfsys.base.menu&amp;menu=master_data',
  'places/category.png',
);

$this->folders[] = array
(
  'menu_category_base_data',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'Base Data',
    'wbfsys.label'
  ),
  $this->view->i18n->l
  (
    'Base Data',
    'wbfsys.label'
  ),
  $this->interface.'?c=Wbfsys.base.menu&amp;menu=base_data',
  'places/category.png',
);

$this->folders[] = array
(
  'menu_category_tags',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'Tags',
    'wbfsys.label'
  ),
  $this->view->i18n->l
  (
    'Tags',
    'wbfsys.label'
  ),
  $this->interface.'?c=Wbfsys.base.menu&amp;menu=tags',
  'places/category.png',
);

$this->folders[] = array
(
  'menu_category_maintenance',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'Maintenance',
    'wbfsys.label'
  ),
  $this->view->i18n->l
  (
    'Maintenance',
    'wbfsys.label'
  ),
  $this->interface.'?c=Wbfsys.base.menu&amp;menu=maintenance',
  'places/category.png',
);

$this->folders[] = array
(
  'menu_category_admin',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'Admin',
    'wbfsys.label'
  ),
  $this->view->i18n->l
  (
    'Admin',
    'wbfsys.label'
  ),
  $this->interface.'?c=Wbfsys.base.menu&amp;menu=admin',
  'places/category.png',
);

$this->folders[] = array
(
  'menu_category_person_duplicate_suspicion',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'Person Duplicate Suspicion',
    'wbfsys.label'
  ),
  $this->view->i18n->l
  (
    'Person Duplicate Suspicion',
    'wbfsys.label'
  ),
  $this->interface.'?c=Wbfsys.base.menu&amp;menu=person_duplicate_suspicion',
  'places/category.png',
);

$this->folders[] = array
(
  'menu_category_announcement',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'Announcement',
    'wbfsys.label'
  ),
  $this->view->i18n->l
  (
    'Announcement',
    'wbfsys.label'
  ),
  $this->interface.'?c=Wbfsys.base.menu&amp;menu=announcement',
  'places/category.png',
);

$this->folders[] = array
(
  'menu_category_task_management',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'Task Management',
    'wbfsys.label'
  ),
  $this->view->i18n->l
  (
    'Task Management',
    'wbfsys.label'
  ),
  $this->interface.'?c=Wbfsys.base.menu&amp;menu=task_management',
  'places/category.png',
);

$this->folders[] = array
(
  'menu_category_message',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'Message',
    'wbfsys.label'
  ),
  $this->view->i18n->l
  (
    'Message',
    'wbfsys.label'
  ),
  $this->interface.'?c=Wbfsys.base.menu&amp;menu=message',
  'places/category.png',
);

$this->folders[] = array
(
  'menu_category_process',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'Process',
    'wbfsys.label'
  ),
  $this->view->i18n->l
  (
    'Process',
    'wbfsys.label'
  ),
  $this->interface.'?c=Wbfsys.base.menu&amp;menu=process',
  'places/category.png',
);

$this->folders[] = array
(
  'menu_category_protocol',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'Protocol',
    'wbfsys.label'
  ),
  $this->view->i18n->l
  (
    'Protocol',
    'wbfsys.label'
  ),
  $this->interface.'?c=Wbfsys.base.menu&amp;menu=protocol',
  'places/category.png',
);

$this->folders[] = array
(
  'menu_category_tree',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'Tree',
    'wbfsys.label'
  ),
  $this->view->i18n->l
  (
    'Tree',
    'wbfsys.label'
  ),
  $this->interface.'?c=Wbfsys.base.menu&amp;menu=tree',
  'places/category.png',
);

$this->folders[] = array
(
  'menu_category_system_structure',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'System Structure',
    'wbfsys.label'
  ),
  $this->view->i18n->l
  (
    'System Structure',
    'wbfsys.label'
  ),
  $this->interface.'?c=Wbfsys.base.menu&amp;menu=system_structure',
  'places/category.png',
);

$this->folders[] = array
(
  'menu_category_ui_management',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'Ui Management',
    'wbfsys.label'
  ),
  $this->view->i18n->l
  (
    'Ui Management',
    'wbfsys.label'
  ),
  $this->interface.'?c=Wbfsys.base.menu&amp;menu=ui_management',
  'places/category.png',
);

$this->folders[] = array
(
  'menu_category_user_management',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'User Management',
    'wbfsys.label'
  ),
  $this->view->i18n->l
  (
    'User Management',
    'wbfsys.label'
  ),
  $this->interface.'?c=Wbfsys.base.menu&amp;menu=user_management',
  'places/category.png',
);

// check if the active role has access for My Issues
if( $acl->access( 'mod-wbfsys/mgmt-wbfsys_issue>mgmt-wbfsys_my_issues:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_my_issues',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'My Issues',
      'wbfsys.my_issues.label'
    ),
    $this->view->i18n->l
    (
      'My Issues',
      'wbfsys.my_issues.label'
    ),
    $this->interface.'?c=Wbfsys.MyIssues.listing',
    'places/entity.png',
     'mod-wbfsys/mgmt-wbfsys_issue>mgmt-wbfsys_my_issues'
  );

}

// check if the active role has access for My Messages
if( $acl->access( 'mod-wbfsys/mgmt-wbfsys_message>mgmt-my_message:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_my_message',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'My Messages',
      'my.message.label'
    ),
    $this->view->i18n->l
    (
      'My Messages',
      'my.message.label'
    ),
    $this->interface.'?c=Wbfsys.Message.listing',
    'places/entity.png',
     'mod-wbfsys/mgmt-wbfsys_message>mgmt-my_message'
  );

}

// check if the active role has access for Employee
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_role_user_mask_employee',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Employees',
      'wbfsys.role_user_mask_employee.label'
    ),
    $this->view->i18n->l
    (
      'Employees',
      'wbfsys.role_user_mask_employee.label'
    ),
    $this->interface.'?c=Wbfsys.RoleUserMaskEmployee.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for My Profile
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_my_user_profile',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'My Profiles',
      'my.user_profile.label'
    ),
    $this->view->i18n->l
    (
      'My Profiles',
      'my.user_profile.label'
    ),
    $this->interface.'?c=Wbfsys.UserProfile.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for My Tasks
if( $acl->access( 'mod-wbfsys/mgmt-wbfsys_task>mgmt-my_wbfsys_task:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_my_wbfsys_task',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'My Tasks',
      'my.wbfsys_task.label'
    ),
    $this->view->i18n->l
    (
      'My Tasks',
      'my.wbfsys_task.label'
    ),
    $this->interface.'?c=Wbfsys.WbfsysTask.listing',
    'places/entity.png',
     'mod-wbfsys/mgmt-wbfsys_task>mgmt-my_wbfsys_task'
  );

}

// check if the active role has access for Language
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_language',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Languages',
      'wbfsys.language.label'
    ),
    $this->view->i18n->l
    (
      'Languages',
      'wbfsys.language.label'
    ),
    $this->interface.'?c=Wbfsys.Language.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for FAQ
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_docu_faq',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'FAQs',
      'wbfsys.docu_faq.label'
    ),
    $this->view->i18n->l
    (
      'FAQs',
      'wbfsys.docu_faq.label'
    ),
    $this->interface.'?c=Wbfsys.DocuFaq.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Help
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_docu_help',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Helps',
      'wbfsys.docu_help.label'
    ),
    $this->view->i18n->l
    (
      'Helps',
      'wbfsys.docu_help.label'
    ),
    $this->interface.'?c=Wbfsys.DocuHelp.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Docu Tree
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_docu_tree:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_docu_tree',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Docu Trees',
      'wbfsys.docu_tree.label'
    ),
    $this->view->i18n->l
    (
      'Docu Trees',
      'wbfsys.docu_tree.label'
    ),
    $this->interface.'?c=Wbfsys.DocuTree.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_docu_tree'
  );

}

// check if the active role has access for FAQ
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_faq',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'FAQs',
      'wbfsys.faq.label'
    ),
    $this->view->i18n->l
    (
      'FAQs',
      'wbfsys.faq.label'
    ),
    $this->interface.'?c=Wbfsys.Faq.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Issue
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_issue:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_issue',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Issues',
      'wbfsys.issue.label'
    ),
    $this->view->i18n->l
    (
      'Issues',
      'wbfsys.issue.label'
    ),
    $this->interface.'?c=Wbfsys.Issue.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_issue'
  );

}

// check if the active role has access for Menus
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_menu',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Menus',
      'wbfsys.menu.label'
    ),
    $this->view->i18n->l
    (
      'Menus',
      'wbfsys.menu.label'
    ),
    $this->interface.'?c=Wbfsys.Menu.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Security Area
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_security_area:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_security_area',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Security Areas',
      'wbfsys.security_area.label'
    ),
    $this->view->i18n->l
    (
      'Security Areas',
      'wbfsys.security_area.label'
    ),
    $this->interface.'?c=Wbfsys.SecurityArea.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_security_area'
  );

}

// check if the active role has access for Color Node
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_color_node:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_color_node',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Color Nodes',
      'wbfsys.color_node.label'
    ),
    $this->view->i18n->l
    (
      'Color Nodes',
      'wbfsys.color_node.label'
    ),
    $this->interface.'?c=Wbfsys.ColorNode.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_color_node'
  );

}

// check if the active role has access for Gateway
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_gateway',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Gateways',
      'wbfsys.gateway.label'
    ),
    $this->view->i18n->l
    (
      'Gateways',
      'wbfsys.gateway.label'
    ),
    $this->interface.'?c=Wbfsys.Gateway.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Universe
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_universe',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Universes',
      'wbfsys.universe.label'
    ),
    $this->view->i18n->l
    (
      'Universes',
      'wbfsys.universe.label'
    ),
    $this->interface.'?c=Wbfsys.Universe.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for Profiles
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_profile:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_profile',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Profiles',
      'wbfsys.profile.label'
    ),
    $this->view->i18n->l
    (
      'Profiles',
      'wbfsys.profile.label'
    ),
    $this->interface.'?c=Wbfsys.Profile.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_profile'
  );

}

// check if the active role has access for Mandant
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_role_mandant',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Mandants',
      'wbfsys.role_mandant.label'
    ),
    $this->view->i18n->l
    (
      'Mandants',
      'wbfsys.role_mandant.label'
    ),
    $this->interface.'?c=Wbfsys.RoleMandant.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for System User
if( $acl->access( 'mod-wbfsys>mod-wbfsys-cat-core_data:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_role_user',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'System Users',
      'wbfsys.role_user.label'
    ),
    $this->view->i18n->l
    (
      'System Users',
      'wbfsys.role_user.label'
    ),
    $this->interface.'?c=Wbfsys.RoleUser.listing',
    'places/entity.png',
     'mod-wbfsys>mod-wbfsys-cat-core_data'
  );

}

// check if the active role has access for User Announcement Status
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_user_announcement:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_user_announcement',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'User Announcement Status',
      'wbfsys.user_announcement.label'
    ),
    $this->view->i18n->l
    (
      'User Announcement Status',
      'wbfsys.user_announcement.label'
    ),
    $this->interface.'?c=Wbfsys.UserAnnouncement.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_user_announcement'
  );

}

// check if the active role has access for User Setting
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_user_setting:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_user_setting',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'User Settings',
      'wbfsys.user_setting.label'
    ),
    $this->view->i18n->l
    (
      'User Settings',
      'wbfsys.user_setting.label'
    ),
    $this->interface.'?c=Wbfsys.UserSetting.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_user_setting'
  );

}

// check if the active role has access for User Setting
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_user_setting_value:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_user_setting_value',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'User Settings',
      'wbfsys.user_setting_value.label'
    ),
    $this->view->i18n->l
    (
      'User Settings',
      'wbfsys.user_setting_value.label'
    ),
    $this->interface.'?c=Wbfsys.UserSettingValue.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_user_setting_value'
  );

}

// check if the active role has access for Calendar Appointment
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_calendar_appointment:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_calendar_appointment',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Calendar Appointments',
      'wbfsys.calendar_appointment.label'
    ),
    $this->view->i18n->l
    (
      'Calendar Appointments',
      'wbfsys.calendar_appointment.label'
    ),
    $this->interface.'?c=Wbfsys.CalendarAppointment.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_calendar_appointment'
  );

}

// check if the active role has access for Message Repository
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_message_repository:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_message_repository',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Message Repositorys',
      'wbfsys.message_repository.label'
    ),
    $this->view->i18n->l
    (
      'Message Repositorys',
      'wbfsys.message_repository.label'
    ),
    $this->interface.'?c=Wbfsys.MessageRepository.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_message_repository'
  );

}

// check if the active role has access for Acl Action
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_acl_action:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_acl_action',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Acl Actions',
      'wbfsys.acl_action.label'
    ),
    $this->view->i18n->l
    (
      'Acl Actions',
      'wbfsys.acl_action.label'
    ),
    $this->interface.'?c=Wbfsys.AclAction.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_acl_action'
  );

}

// check if the active role has access for Message Sendway
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_message_sendway:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_message_sendway',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Message Sendways',
      'wbfsys.message_sendway.label'
    ),
    $this->view->i18n->l
    (
      'Message Sendways',
      'wbfsys.message_sendway.label'
    ),
    $this->interface.'?c=Wbfsys.MessageSendway.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_message_sendway'
  );

}

// check if the active role has access for Data Link
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_data_link:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_data_link',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Data Links',
      'wbfsys.data_link.label'
    ),
    $this->view->i18n->l
    (
      'Data Links',
      'wbfsys.data_link.label'
    ),
    $this->interface.'?c=Wbfsys.DataLink.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_data_link'
  );

}

// check if the active role has access for App Modules
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_app_modules:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_app_modules',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'App Modules',
      'wbfsys.app_modules.label'
    ),
    $this->view->i18n->l
    (
      'App Modules',
      'wbfsys.app_modules.label'
    ),
    $this->interface.'?c=Wbfsys.AppModules.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_app_modules'
  );

}

// check if the active role has access for Vref File Type
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_vref_file_type:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_vref_file_type',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Vref File Types',
      'wbfsys.vref_file_type.label'
    ),
    $this->view->i18n->l
    (
      'Vref File Types',
      'wbfsys.vref_file_type.label'
    ),
    $this->interface.'?c=Wbfsys.VrefFileType.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_vref_file_type'
  );

}

// check if the active role has access for Entity Role Actions
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_entity_role_actions:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_entity_role_actions',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Entity Role Actions',
      'wbfsys.entity_role_actions.label'
    ),
    $this->view->i18n->l
    (
      'Entity Role Actions',
      'wbfsys.entity_role_actions.label'
    ),
    $this->interface.'?c=Wbfsys.EntityRoleActions.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_entity_role_actions'
  );

}

// check if the active role has access for Package Modules
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_package_modules:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_package_modules',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Package Modules',
      'wbfsys.package_modules.label'
    ),
    $this->view->i18n->l
    (
      'Package Modules',
      'wbfsys.package_modules.label'
    ),
    $this->interface.'?c=Wbfsys.PackageModules.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_package_modules'
  );

}

// check if the active role has access for Group Profiles
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_group_profiles:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_group_profiles',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Group Profiles',
      'wbfsys.group_profiles.label'
    ),
    $this->view->i18n->l
    (
      'Group Profiles',
      'wbfsys.group_profiles.label'
    ),
    $this->interface.'?c=Wbfsys.GroupProfiles.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_group_profiles'
  );

}

// check if the active role has access for User Profiles
if( $acl->access( 'mod-wbfsys>mgmt-wbfsys_user_profiles:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_wbfsys_user_profiles',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'User Profiles',
      'wbfsys.user_profiles.label'
    ),
    $this->view->i18n->l
    (
      'User Profiles',
      'wbfsys.user_profiles.label'
    ),
    $this->interface.'?c=Wbfsys.UserProfiles.listing',
    'places/entity.png',
     'mod-wbfsys>mgmt-wbfsys_user_profiles'
  );

}

$this->crumbs = array
(
  array
  (
    'Root',
    $this->interface.'?c=Webfrap.Navigation.explorer',
    'places/desktop.png'
  ),
  array
  (
    'core',
    $this->interface.'?c=core.base.menu',
    'places/module.png'
   ),
);

$this->firstEntry = array
(
  'menu_webfrap_root',
  Wgt::AJAX,
  '..',
  'webfrap root',
  $this->interface.'?c=Webfrap.Navigation.explorer',
  'places/folder_up.png',
);

if( $acl->access( 'mod-core:admin', null, true ) )
{

  $this->files[] = array
  (
    'menu-category-core-acl',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Core ACLs',
      'core.label'
    ),
    $this->view->i18n->l
    (
      'Core ACLs',
      'core.label'
    ),
    $this->interface.'?c=core.Base_Acl.listing',
    'places/acl.png',
    'mod-core:admin'
  );

}

$this->folders[] = array
(
  'menu_category_default',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'Default',
    'core.label'
  ),
  $this->view->i18n->l
  (
    'Default',
    'core.label'
  ),
  $this->interface.'?c=Core.base.menu&amp;menu=default',
  'places/category.png',
);

$this->folders[] = array
(
  'menu_category_master_data',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'Master Data',
    'core.label'
  ),
  $this->view->i18n->l
  (
    'Master Data',
    'core.label'
  ),
  $this->interface.'?c=Core.base.menu&amp;menu=master_data',
  'places/category.png',
);

// check if the active role has access for Organisation
if( $acl->access( 'mod-core>mgmt-core_organisation:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_core_organisation',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Organisations',
      'core.organisation.label'
    ),
    $this->view->i18n->l
    (
      'Organisations',
      'core.organisation.label'
    ),
    $this->interface.'?c=Core.Organisation.listing',
    'places/entity.png',
     'mod-core>mgmt-core_organisation'
  );

}

// check if the active role has access for Person
if( $acl->access( 'mod-core>mgmt-core_person:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_core_person',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Persons',
      'core.person.label'
    ),
    $this->view->i18n->l
    (
      'Persons',
      'core.person.label'
    ),
    $this->interface.'?c=Core.Person.listing',
    'places/entity.png',
     'mod-core>mgmt-core_person'
  );

}

$this->crumbs = array
(
  array
  (
    'Root',
    $this->interface.'?c=Webfrap.Navigation.explorer',
    'places/desktop.png'
  ),
  array
  (
    'hosting',
    $this->interface.'?c=hosting.base.menu',
    'places/module.png'
   ),
);

$this->firstEntry = array
(
  'menu_webfrap_root',
  Wgt::AJAX,
  '..',
  'webfrap root',
  $this->interface.'?c=Webfrap.Navigation.explorer',
  'places/folder_up.png',
);

if( $acl->access( 'mod-hosting:admin', null, true ) )
{

  $this->files[] = array
  (
    'menu-category-hosting-acl',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Hosting ACLs',
      'hosting.label'
    ),
    $this->view->i18n->l
    (
      'Hosting ACLs',
      'hosting.label'
    ),
    $this->interface.'?c=hosting.Base_Acl.listing',
    'places/acl.png',
    'mod-hosting:admin'
  );

}

$this->folders[] = array
(
  'menu_category_default',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'Default',
    'hosting.label'
  ),
  $this->view->i18n->l
  (
    'Default',
    'hosting.label'
  ),
  $this->interface.'?c=Hosting.base.menu&amp;menu=default',
  'places/category.png',
);

// check if the active role has access for Subdomain
if( $acl->access( 'mod-hosting>mgmt-hosting_subdomain:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_hosting_subdomain',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Subdomains',
      'hosting.subdomain.label'
    ),
    $this->view->i18n->l
    (
      'Subdomains',
      'hosting.subdomain.label'
    ),
    $this->interface.'?c=Hosting.Subdomain.listing',
    'places/entity.png',
     'mod-hosting>mgmt-hosting_subdomain'
  );

}

// check if the active role has access for Domain
if( $acl->access( 'mod-hosting>mgmt-hosting_domain:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_hosting_domain',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Domains',
      'hosting.domain.label'
    ),
    $this->view->i18n->l
    (
      'Domains',
      'hosting.domain.label'
    ),
    $this->interface.'?c=Hosting.Domain.listing',
    'places/entity.png',
     'mod-hosting>mgmt-hosting_domain'
  );

}

$this->crumbs = array
(
  array
  (
    'Root',
    $this->interface.'?c=Webfrap.Navigation.explorer',
    'places/desktop.png'
  ),
  array
  (
    'crm',
    $this->interface.'?c=crm.base.menu',
    'places/module.png'
   ),
);

$this->firstEntry = array
(
  'menu_webfrap_root',
  Wgt::AJAX,
  '..',
  'webfrap root',
  $this->interface.'?c=Webfrap.Navigation.explorer',
  'places/folder_up.png',
);

if( $acl->access( 'mod-crm:admin', null, true ) )
{

  $this->files[] = array
  (
    'menu-category-crm-acl',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Crm ACLs',
      'crm.label'
    ),
    $this->view->i18n->l
    (
      'Crm ACLs',
      'crm.label'
    ),
    $this->interface.'?c=crm.Base_Acl.listing',
    'places/acl.png',
    'mod-crm:admin'
  );

}

$this->folders[] = array
(
  'menu_category_default',
  Wgt::AJAX,
  $this->view->i18n->l
  (
    'Default',
    'crm.label'
  ),
  $this->view->i18n->l
  (
    'Default',
    'crm.label'
  ),
  $this->interface.'?c=Crm.base.menu&amp;menu=default',
  'places/category.png',
);

// check if the active role has access for Contact
if( $acl->access( 'mod-crm>mgmt-crm_contact:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_crm_contact',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Contacts',
      'crm.contact.label'
    ),
    $this->view->i18n->l
    (
      'Contacts',
      'crm.contact.label'
    ),
    $this->interface.'?c=Crm.Contact.listing',
    'places/entity.png',
     'mod-crm>mgmt-crm_contact'
  );

}

// check if the active role has access for Contact Calls
if( $acl->access( 'mod-crm>mgmt-crm_contact_calls:listing', null, true ) )
{

  $this->files[] = array
  (
    'menu_mgmt_crm_contact_calls',
    Wgt::AJAX,
    $this->view->i18n->l
    (
      'Contact Calls',
      'crm.contact_calls.label'
    ),
    $this->view->i18n->l
    (
      'Contact Calls',
      'crm.contact_calls.label'
    ),
    $this->interface.'?c=Crm.ContactCalls.listing',
    'places/entity.png',
     'mod-crm>mgmt-crm_contact_calls'
  );

}
