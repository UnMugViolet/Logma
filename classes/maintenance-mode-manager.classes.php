<?php
class MaintenanceModeManager {
    private $configFilePath;
    private $authorizedIPs;
    private $clientIP;

    public function __construct($configFilePath, $authorizedIPs) {
        $this->configFilePath = $configFilePath;
        $this->authorizedIPs = $authorizedIPs;
        $this->clientIP = $_SERVER['REMOTE_ADDR'];
    }

    public function isAuthorizedIP() {
        return in_array($this->clientIP, $this->authorizedIPs);
    }

    public function toggleMaintenanceMode($enable) {
        $maintenanceMode = $enable;

        // Update the maintenance mode status in config.php
        $configContents = '<?php $maintenanceMode = ' . var_export($maintenanceMode, true) . ';';
        file_put_contents($this->configFilePath, $configContents, LOCK_EX);

        // Redirect to the maintenance page (or elsewhere) as needed
        header("location: ../access-admin-logma/maintenance?error=none");
        exit();
    }

    public function isMaintenanceModeActive() {
        include($this->configFilePath);
        return $maintenanceMode;
    }

    public function displayMaintenanceOnBanner(){
        echo '
        <div class="fixed top-0 right-0 bg-color-white pad-10 ">
            <p>Mode maintenance actif ✅</p>
        </div>';
    }
}
