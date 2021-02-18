<?php
/**
 *
 * CAPTCHA 4 post. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2020, David Colón, https://www.davidiq.com/
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace davidiq\captchaplus\event;

/**
 * @ignore
 */

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * CAPTCHA 4 post Event listener.
 */
class main_listener implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            'core.permissions' => 'add_permissions',
            'core.modify_posting_auth' => 'init_captchaplus_post',
            'core.viewtopic_modify_quick_reply_template_vars' => 'init_captchaplus_qr',
            'core.ucp_pm_compose_modify_data' => 'init_captchaplus_pm',
            'core.posting_modify_message_text' => 'validate_captchaplus',
            'core.ucp_pm_compose_modify_parse_before' => 'validate_captchaplus',
            'core.posting_modify_submit_post_after' => 'after_submit_check',
            'core.ucp_pm_compose_modify_parse_after' => 'after_submit_check_pm',
            'core.posting_modify_template_vars' => 'add_captchaplus',
            'core.ucp_pm_compose_template' => 'add_captchaplus_pm',
            'core.user_setup_after' => 'add_captchaplus_contactadmin',
            'core.message_admin_form_submit_before' => 'validate_captchaplus'
        ];
    }

    /** @var \davidiq\captchaplus\service */
    protected $captchaplus_service;

    /** @var \phpbb\captcha\plugins\captcha_abstract */
    protected $captcha;

    /** @var \phpbb\template\template */
    protected $template;

    /**
     * Constructor
     *
     * @param \davidiq\captchaplus\service $service CAPTCHA+ service
     * @param \phpbb\template\template $template Template object
     */
    public function __construct(\davidiq\captchaplus\service $service, \phpbb\template\template $template)
    {
        $this->captchaplus_service = $service;
        $this->template = $template;
    }

    /**
     * Add permissions to the ACP -> Permissions settings page
     *
     * @param \phpbb\event\data $event Event object
     */
    public function add_permissions($event)
    {
        $permissions = $event['permissions'];
        $permissions['f_nopostcaptcha'] = ['lang' => 'ACL_F_NOPOSTCAPTCHA', 'cat' => 'post'];
        $permissions['u_nopmcaptcha'] = ['lang' => 'ACL_U_NOPMCAPTCHA', 'cat' => 'pm'];
        $permissions['u_nocontactcaptcha'] = ['lang' => 'ACL_U_NOCONTACTCAPTCHA', 'cat' => 'misc'];
        $event['permissions'] = $permissions;
    }

    /**
     * Adds CAPTCHA to posting page when needed
     *
     * @param \phpbb\event\data $event Event object
     */
    public function init_captchaplus_post($event)
    {
        $forum_id = (int)$event['forum_id'];
        $can_post_without_captcha = $this->captchaplus_service->can_post_without_captcha($forum_id);
        $this->captcha = $this->captchaplus_service->init($can_post_without_captcha);
    }

    /**
     * Adds CAPTCHA to Quick Reply form
     *
     * @param \phpbb\event\data $event Event object
     */
    public function init_captchaplus_qr($event)
    {
        $topic_data = $event['topic_data'];
        $can_post_without_captcha = $this->captchaplus_service->can_post_without_captcha($topic_data['forum_id']);
        $captcha = $this->captchaplus_service->init($can_post_without_captcha);
        $tpl_ary = $event['tpl_ary'];
        $qr_hidden_fields = $tpl_ary['QR_HIDDEN_FIELDS'];
        if ($this->captchaplus_service->add_captcha_template($captcha, $qr_hidden_fields, $tpl_ary))
        {
            $tpl_ary['QR_HIDDEN_FIELDS'] = $qr_hidden_fields;
            $event['tpl_ary'] = $tpl_ary;
        }
    }

    /**
     * Adds CAPTCHA to PM
     *
     * @param \phpbb\event\data $event Event object
     */
    public function init_captchaplus_pm($event)
    {
        $can_pm_without_captcha = $this->captchaplus_service->can_pm_without_captcha();
        $this->captcha = $this->captchaplus_service->init($can_pm_without_captcha);
    }

    /**
     * Validates the CAPTCHA
     *
     * @param \phpbb\event\data $event Event object
     */
    public function validate_captchaplus($event)
    {
        $message = isset($event['message_parser']) ? $event['message_parser']->message : $event['body'];
        if (isset($event['post_data']))
        {
            $post_data = $event['post_data'];
            $subject = $post_data['post_subject'];
            $username = $post_data['username'];
        }
        else
        {
            $subject = $event['subject'];
            $username = $this->captchaplus_service->current_username();
        }
        $vc_response = $this->captchaplus_service->validate($this->captcha, $message, $subject, $username);
        if (!empty($vc_response))
        {
            $error_key = isset($event['error']) ? 'error' : 'errors';
            $error = $event[$error_key];
            $error[] = $vc_response;
            $event[$error_key] = $error;
        }
    }

    /**
     * Checks if the CAPTCHA needs a reset after submit
     *
     * @param \phpbb\event\data $event Event object
     */
    public function after_submit_check($event)
    {
        $this->captchaplus_service->reset($this->captcha);
    }

    /**
     * Checks if the CAPTCHA needs a reset after submitting a PM
     *
     * @param \phpbb\event\data $event Event object
     */
    public function after_submit_check_pm($event)
    {
        $submit = $event['submit'];
        $error = $event['error'];
        if (!count($error) && $submit)
        {
            $this->captchaplus_service->reset($this->captcha);
        }
    }

    /**
     * Add the CAPTCHA template
     *
     * @param \phpbb\event\data $event Event object
     */
    public function add_captchaplus($event)
    {
        $s_hidden_fields = $event['s_hidden_fields'];
        $page_data = $event['page_data'];
        if ($this->captchaplus_service->add_captcha_template($this->captcha, $s_hidden_fields, $page_data))
        {
            $event['s_hidden_fields'] = $s_hidden_fields;
            $event['page_data'] = $page_data;
        }
    }

    /**
     * Add the CAPTCHA template to PMs
     *
     * @param \phpbb\event\data $event Event object
     */
    public function add_captchaplus_pm($event)
    {
        $s_hidden_fields = '';
        $template_ary = $event['template_ary'];
        if ($this->captchaplus_service->add_captcha_template($this->captcha, $s_hidden_fields, $template_ary))
        {
            $template_ary['S_HIDDEN_FIELDS_PM'] = $s_hidden_fields;
            $event['template_ary'] = $template_ary;
        }
    }

    /**
     * Add the CAPTCHA template to the contact admin form
     */
    public function add_captchaplus_contactadmin()
    {
        if ($this->captchaplus_service->on_contactadmin_form() && !isset($this->captcha))
        {
            $can_contact_admin_without_captcha = $this->captchaplus_service->can_contact_admin_without_captcha();
            $this->captcha = $this->captchaplus_service->init($can_contact_admin_without_captcha);
            $s_hidden_fields = '';
            $template_ary = [];
            if ($this->captchaplus_service->add_captcha_template($this->captcha, $s_hidden_fields, $template_ary))
            {
                $template_ary['S_HIDDEN_FIELDS'] = $s_hidden_fields;
                $this->template->assign_vars($template_ary);
            }
        }
    }
}
