<?php

namespace AdminDashboard;

require_once BASE_PATH . "/admin-dashboard/Database.php";
require_once BASE_PATH . "/admin-dashboard/Admin.php";

use Database\Database;
use AdminDashboard\Admin;

class WebSetting extends Admin
{
    public function index()
    {
        $db = new Database();
        $setting = ($db->select("SELECT * FROM `websetting`;"))->fetch();
        require_once BASE_PATH . "/template/admin/websetting/index.php";
    }

    public function set()
    {
        $db = new Database();
        $setting = ($db->select("SELECT * FROM `websetting`;"))->fetch();
        require_once BASE_PATH . "/template/admin/websetting/set.php";
    }

    public function store($request)
    {
        $db = new Database();
        $setting = ($db->select("SELECT * FROM `websetting`;"))->fetch();
        if ($setting != null) {
            if (empty($request['icon']['tmp_name'])) {
                unset($request['icon']);
            } else {
                $this->removeImage($setting->icon);
                $request['icon'] = $this->saveImage($request['icon'], 'websetting', 'icon');
            }
            if (empty($request['logo']['tmp_name'])) {
                unset($request['logo']);
            } else {
                $this->removeImage($setting->logo);
                $request['logo'] = $this->saveImage($request['logo'], 'websetting', 'logo');
            }

            $db->update('websetting', array_keys($request), $request, $setting->id);
            $this->redirect('websetting');
        } else {
            $request['icon'] = $this->saveImage($request['icon'], 'websetting', 'icon');
            $request['logo'] = $this->saveImage($request['logo'], 'websetting', 'logo');
            $db->insert('websetting', array_keys($request), $request);
            $this->redirect('websetting');
        }
    }
}