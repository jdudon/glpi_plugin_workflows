<?php
/*
 -------------------------------------------------------------------------
 workflows plugin for GLPI
 Copyright (C) 2019 by the workflows Development Team.

 https://github.com/pluginsGLPI/workflows
 -------------------------------------------------------------------------

 LICENSE

 This file is part of workflows.

 workflows is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 workflows is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with workflows. If not, see <http://www.gnu.org/licenses/>.
 --------------------------------------------------------------------------
 */

define('PLUGIN_WORKFLOWS_VERSION', '0.0.1');

/**
 * Init hooks of the plugin.
 * REQUIRED
 *
 * @return void
 */
function plugin_init_workflows() {
   global $PLUGIN_HOOKS;
   $plugin = new Plugin();
   $PLUGIN_HOOKS['csrf_compliant']['workflows'] = true;
   if ($plugin->isInstalled('workflows') && $plugin->isActivated('workflows')) {
      $PLUGIN_HOOKS["menu_toadd"]['workflows']['config'] ='PluginWorkflowsWorkflow';
   }
}


/**
 * Get the name and the version of the plugin
 * REQUIRED
 *
 * @return array
 */
function plugin_version_workflows() {
   return [
      'name'           => 'workflows',
      'version'        => PLUGIN_WORKFLOWS_VERSION,
      'author'         => 'Jessica DUDON',
      'license'        => '',
      'homepage'       => '',
      'requirements'   => [
         'glpi' => [
            'min' => '9.3',
         ]
      ]
   ];
}

/**
 * Check pre-requisites before install
 * OPTIONNAL, but recommanded
 *
 * @return boolean
 */
function plugin_workflows_check_prerequisites() {

   //Version check is not done by core in GLPI < 9.2 but has to be delegated to core in GLPI >= 9.2.
   $version = preg_replace('/^((\d+\.?)+).*$/', '$1', GLPI_VERSION);
   if (version_compare($version, '9.2', '<')) {
      echo "This plugin requires GLPI >= 9.2";
      return false;
   }
   return true;
}

/**
 * Check configuration process
 *
 * @param boolean $verbose Whether to display message on failure. Defaults to false
 *
 * @return boolean
 */
function plugin_workflows_check_config($verbose = false) {
   if (true) { // Your configuration check
      return true;
   }

   if ($verbose) {
      echo __('Installed / not configured', 'workflows');
   }
   return false;
}
