<?php
namespace GDO\PHPBB;

use GDO\Core\GDO_Module;
use GDO\UI\GDT_Bar;
use GDO\UI\GDT_Link;
use GDO\User\GDO_User;
use GDO\DB\Database;

final class Module_PHPBB extends GDO_Module
{
    public function onInstall() { Install::onInstall($this); }
    
    public function href_administrate_module() { return href('PHPBB', 'PostInstall'); }
    
    public function onLoadLanguage() { return $this->loadLanguage('lang/phpbb'); }
    
    public function hookLeftBar(GDT_Bar $bar)
    {
        $bar->addField(GDT_Link::make('link_forum')->labelArgs(0)->href(href('PHPBB', 'Forum')));
    }
    
    public function hookUserAuthenticated(GDO_User $user)
    {
    }
    
    public function hookUserActivated(GDO_User $user)
    {
        $values = array(
            'user_type' => 3,
            'group_id' => 2,
        );
        $query = "INSERT INTO phpbb_users ($keys) VALUES ($values)";
        Database::instance()->queryWrite($query);
    }
    
}
