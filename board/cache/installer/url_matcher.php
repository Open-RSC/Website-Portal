<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class phpbb_url_matcher extends Symfony\Component\Routing\Matcher\UrlMatcher
{
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($rawPathinfo)
    {
        $allow = [];
        $pathinfo = rawurldecode($rawPathinfo);
        $trimmedPathinfo = rtrim($pathinfo, '/');
        $context = $this->context;
        $request = $this->request ?: $this->createRequest($pathinfo);
        $requestMethod = $canonicalMethod = $context->getMethod();

        if ('HEAD' === $requestMethod) {
            $canonicalMethod = 'GET';
        }

        // phpbb_installer_index
        if ('/' === $pathinfo) {
            return array (  '_controller' => 'phpbb.installer.controller.welcome:handle',  'mode' => 'intro',  '_route' => 'phpbb_installer_index',);
        }

        // phpbb_installer_license
        if ('/license' === $pathinfo) {
            return array (  '_controller' => 'phpbb.installer.controller.welcome:handle',  'mode' => 'license',  '_route' => 'phpbb_installer_license',);
        }

        // phpbb_installer_support
        if ('/support' === $pathinfo) {
            return array (  '_controller' => 'phpbb.installer.controller.welcome:handle',  'mode' => 'support',  '_route' => 'phpbb_installer_support',);
        }

        if (0 === strpos($pathinfo, '/install')) {
            // phpbb_installer_install
            if ('/install' === $pathinfo) {
                return array (  '_controller' => 'phpbb.installer.controller.install:handle',  '_route' => 'phpbb_installer_install',);
            }

            // phpbb_installer_status
            if ('/installer/status' === $pathinfo) {
                return array (  '_controller' => 'phpbb.installer.controller.status:status',  '_route' => 'phpbb_installer_status',);
            }

        }

        // phpbb_installer_update
        if ('/update' === $pathinfo) {
            return array (  '_controller' => 'phpbb.installer.controller.update:handle',  '_route' => 'phpbb_installer_update',);
        }

        // phpbb_installer_update_file_download
        if ('/download/updated' === $pathinfo) {
            return array (  '_controller' => 'phpbb.installer.controller.file_downloader:update_archive',  '_route' => 'phpbb_installer_update_file_download',);
        }

        // phpbb_installer_update_conflict_download
        if ('/download/conflict' === $pathinfo) {
            return array (  '_controller' => 'phpbb.installer.controller.file_downloader:conflict_archive',  '_route' => 'phpbb_installer_update_conflict_download',);
        }

        if (0 === strpos($pathinfo, '/convert')) {
            // phpbb_convert_intro
            if (preg_match('#^/convert(?:/(?P<start_new>[^/]++))?$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'phpbb_convert_intro']), array (  '_controller' => 'phpbb.installer.controller.convert:intro',  'start_new' => 0,));
            }

            // phpbb_convert_settings
            if (0 === strpos($pathinfo, '/convert/settings') && preg_match('#^/convert/settings/(?P<converter>[a-zA-Z0-9_]+)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'phpbb_convert_settings']), array (  '_controller' => 'phpbb.installer.controller.convert:settings',));
            }

            // phpbb_convert_convert
            if (0 === strpos($pathinfo, '/convert/in_progress') && preg_match('#^/convert/in_progress/(?P<converter>[a-zA-Z0-9_]+)$#sD', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, ['_route' => 'phpbb_convert_convert']), array (  '_controller' => 'phpbb.installer.controller.convert:convert',));
            }

            // phpbb_convert_finish
            if ('/convert/finished' === $pathinfo) {
                return array (  '_controller' => 'phpbb.installer.controller.convert:finish',  '_route' => 'phpbb_convert_finish',);
            }

        }

        if ('/' === $pathinfo && !$allow) {
            throw new Symfony\Component\Routing\Exception\NoConfigurationException();
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
