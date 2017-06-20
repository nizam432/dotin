<?php
defined('ABSPATH') || die('Access Denied');

class EcommercewdControllerUninstall extends EcommercewdController {
  public function __construct() {
    global $wde_options;
    if (!class_exists("DoradoWebConfig")) {
      include_once(WD_E_DIR . "/wd/config.php");
    }
    $config = new DoradoWebConfig();
    $config->set_options($wde_options);
    $deactivate_reasons = new DoradoWebDeactivate($config);
    $deactivate_reasons->submit_and_deactivate();
  }
}