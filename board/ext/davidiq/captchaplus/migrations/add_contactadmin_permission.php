<?php
/**
 *
 * CAPTCHA 4 post. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2020, David Colón, https://www.davidiq.com/
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace davidiq\captchaplus\migrations;

class add_contactadmin_permission extends \phpbb\db\migration\migration
{
    public static function depends_on()
    {
        return ['\davidiq\captchaplus\migrations\install_permissions'];
    }

    /**
     * Add permissions data to the database during extension installation.
     *
     * @return array Array of data update instructions
     */
    public function update_data()
    {
        return [
            // Add new permission
            ['permission.add', ['u_nocontactcaptcha', true, 'u_nopmcaptcha']], // Copy settings from "Can send private messages without CAPTCHA"
        ];
    }
}
