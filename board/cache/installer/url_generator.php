<?php

use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Psr\Log\LoggerInterface;

/**
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class phpbb_url_generator extends Symfony\Component\Routing\Generator\UrlGenerator
{
    private static $declaredRoutes;

    public function __construct(RequestContext $context, LoggerInterface $logger = null)
    {
        $this->context = $context;
        $this->logger = $logger;
        if (null === self::$declaredRoutes) {
            self::$declaredRoutes = [
        'phpbb_installer_index' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'phpbb.installer.controller.welcome:handle',    'mode' => 'intro',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'phpbb_installer_license' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'phpbb.installer.controller.welcome:handle',    'mode' => 'license',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/license',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'phpbb_installer_support' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'phpbb.installer.controller.welcome:handle',    'mode' => 'support',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/support',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'phpbb_installer_install' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'phpbb.installer.controller.install:handle',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/install',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'phpbb_installer_update' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'phpbb.installer.controller.update:handle',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/update',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'phpbb_installer_update_file_download' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'phpbb.installer.controller.file_downloader:update_archive',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/download/updated',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'phpbb_installer_update_conflict_download' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'phpbb.installer.controller.file_downloader:conflict_archive',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/download/conflict',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'phpbb_convert_intro' => array (  0 =>   array (    0 => 'start_new',  ),  1 =>   array (    '_controller' => 'phpbb.installer.controller.convert:intro',    'start_new' => 0,  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[^/]++',      3 => 'start_new',    ),    1 =>     array (      0 => 'text',      1 => '/convert',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'phpbb_convert_settings' => array (  0 =>   array (    0 => 'converter',  ),  1 =>   array (    '_controller' => 'phpbb.installer.controller.convert:settings',  ),  2 =>   array (    'converter' => '[a-zA-Z0-9_]+',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[a-zA-Z0-9_]+',      3 => 'converter',    ),    1 =>     array (      0 => 'text',      1 => '/convert/settings',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'phpbb_convert_convert' => array (  0 =>   array (    0 => 'converter',  ),  1 =>   array (    '_controller' => 'phpbb.installer.controller.convert:convert',  ),  2 =>   array (    'converter' => '[a-zA-Z0-9_]+',  ),  3 =>   array (    0 =>     array (      0 => 'variable',      1 => '/',      2 => '[a-zA-Z0-9_]+',      3 => 'converter',    ),    1 =>     array (      0 => 'text',      1 => '/convert/in_progress',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'phpbb_convert_finish' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'phpbb.installer.controller.convert:finish',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/convert/finished',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
        'phpbb_installer_status' => array (  0 =>   array (  ),  1 =>   array (    '_controller' => 'phpbb.installer.controller.status:status',  ),  2 =>   array (  ),  3 =>   array (    0 =>     array (      0 => 'text',      1 => '/installer/status',    ),  ),  4 =>   array (  ),  5 =>   array (  ),),
    ];
        }
    }

    public function generate($name, $parameters = [], $referenceType = self::ABSOLUTE_PATH)
    {
        if (!isset(self::$declaredRoutes[$name])) {
            throw new RouteNotFoundException(sprintf('Unable to generate a URL for the named route "%s" as such route does not exist.', $name));
        }

        list($variables, $defaults, $requirements, $tokens, $hostTokens, $requiredSchemes) = self::$declaredRoutes[$name];

        return $this->doGenerate($variables, $defaults, $requirements, $tokens, $parameters, $name, $referenceType, $hostTokens, $requiredSchemes);
    }
}
