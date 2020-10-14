<?php
namespace GDO\PHPBB\Method;

use GDO\UI\MethodPage;
use GDO\Net\GDT_Url;

final class Forum extends MethodPage
{
    public function gdoParameters()
    {
        return array(
            GDT_Url::make('forumURL')->initial(GWF_WEB_ROOT . 'GDO/PHPBB/phpbb/phpBB')->writable(false)->editable(false),
        );
    }

}
