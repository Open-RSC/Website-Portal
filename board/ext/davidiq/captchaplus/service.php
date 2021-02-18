<?php
/**
 *
 * CAPTCHA+. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2020, David Colón, https://www.davidiq.com/
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace davidiq\captchaplus;

/**
 * CAPTCHA+ Service info.
 */
class service
{
    /** @var \phpbb\user */
    protected $user;

    /** @var \phpbb\auth\auth */
    protected $auth;

    /** @var /phpbb/config/config */
    protected $config;

    /** @var \phpbb\captcha\factory */
    protected $captcha_factory;

    /**
     * Constructor
     *
     * @param \phpbb\user $user User object
     * @param \phpbb\auth\auth $auth Auth object
     * @param \phpbb\config\config $config Configuration object
     * @param \phpbb\captcha\factory $captcha_factory CAPTCHA factory object
     */
    public function __construct(\phpbb\user $user, \phpbb\auth\auth $auth, \phpbb\config\config $config, \phpbb\captcha\factory $captcha_factory)
    {
        $this->user = $user;
        $this->auth = $auth;
        $this->config = $config;
        $this->captcha_factory = $captcha_factory;
    }

    /**
     * Initializes CAPTCHA for use when needed
     *
     * @param bool $can_do_without_captcha Indicates if can do action without CAPTCHA
     * @return \phpbb\captcha\plugins\captcha_abstract|object|null
     */
    public function init(bool $can_do_without_captcha)
    {
        if (!$can_do_without_captcha && !empty($this->config['captcha_plugin']))
        {
            $captcha = $this->captcha_factory->get_instance($this->config['captcha_plugin']);
            $captcha->init(CONFIRM_POST);
            return $captcha;
        }
        return null;
    }

    /**
     * Validates the CAPTCHA
     *
     * @param \phpbb\captcha\plugins\captcha_abstract|null $captcha CAPTCHA plugin object
     * @param string $message Message used for CAPTCHA data validation
     * @param string $subject Subject used for CAPTCHA data validation
     * @param string $username Username used for CAPTCHA data validation
     * @return mixed|null Error response for CAPTCHA
     */
    public function validate($captcha, string $message, string $subject, string $username)
    {
        if (!isset($captcha))
        {
            return null;
        }

        $captcha_data = [
            'message' => $message,
            'subject' => $subject,
            'username' => $username,
        ];
        $vc_response = $captcha->validate($captcha_data);
        if ($vc_response)
        {
            return $vc_response;
        }
        return null;
    }

    /**
     * Checks if the CAPTCHA needs a reset after submit
     *
     * @param \phpbb\captcha\plugins\captcha_abstract|null $captcha CAPTCHA plugin object
     */
    public function reset($captcha)
    {
        if (!isset($captcha))
        {
            return;
        }

        if ($captcha->is_solved() === true)
        {
            $captcha->reset();
        }
    }

    /**
     * Add the CAPTCHA template
     *
     * @param \phpbb\captcha\plugins\captcha_abstract|null $captcha CAPTCHA plugin object
     * @param string $s_hidden_fields String with hidden fields
     * @param array $template_data Template data
     * @return bool
     */
    public function add_captcha_template($captcha, string &$s_hidden_fields, array &$template_data)
    {
        if (!isset($captcha))
        {
            return false;
        }

        if ($captcha->is_solved() === false)
        {
            $s_hidden_fields .= build_hidden_fields($captcha->get_hidden_fields());
            $template_data['CAPTCHAPLUS_TEMPLATE'] = $captcha->get_template();
            return true;
        }
        return false;
    }

    /**
     * Determines if the user can post without CAPTCHA
     *
     * @param int $forum_id The forum ID
     * @return bool|mixed
     */
    public function can_post_without_captcha(int $forum_id)
    {
        return $this->auth->acl_get('f_nopostcaptcha', $forum_id);
    }

    /**
     * Determines if a user can PM without having to solve a CAPTCHA
     *
     * @return bool|mixed
     */
    public function can_pm_without_captcha()
    {
        return $this->auth->acl_get('u_nopmcaptcha');
    }

    /**
     * Determines if a user can contact admin without having to solve a CAPTCHA
     *
     * @return bool|mixed
     */
    public function can_contact_admin_without_captcha()
    {
        return $this->auth->acl_get('u_nocontactcaptcha');
    }

    /**
     * Gets the current user's username
     *
     * @return string
     */
    public function current_username()
    {
        return $this->user->data['username'];
    }

    /**
     * Determines if user is on contactadmin form
     *
     * @return bool
     */
    public function on_contactadmin_form()
    {
        return strpos($this->user->page['query_string'], 'mode=contactadmin') !== false &&
                strpos($this->user->page['page_name'], 'memberlist') !== false;
    }
}
