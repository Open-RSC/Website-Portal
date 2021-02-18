<?php
/**
 *
 * CAPTCHA+. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2020, David Colón, https://www.davidiq.com/
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace davidiq\captchaplus\message;

use phpbb\message\admin_form;

/**
 * CAPTCHA+ form extender
 */
class form_decorator extends admin_form
{
    /**
     * Construct
     *
     * @param \phpbb\auth\auth $auth
     * @param \phpbb\config\config $config
     * @param \phpbb\config\db_text $config_text
     * @param \phpbb\db\driver\driver_interface $db
     * @param \phpbb\user $user
     * @param \phpbb\event\dispatcher_interface $dispatcher
     * @param string $phpbb_root_path
     * @param string $phpEx
     */
    public function __construct(\phpbb\auth\auth $auth, \phpbb\config\config $config, \phpbb\config\db_text $config_text, \phpbb\db\driver\driver_interface $db, \phpbb\user $user, \phpbb\event\dispatcher_interface $dispatcher, $phpbb_root_path, $phpEx)
    {
        parent::__construct($auth, $config, $config_text, $db, $user, $dispatcher, $phpbb_root_path, $phpEx);
    }

    /**
     * Returns the file name of the form template
     *
     * @return string
     */
    public function get_template_file()
    {
        return '@davidiq_captchaplus/memberlist_contact_admin.html';
    }
}