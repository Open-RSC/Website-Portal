<?php

use Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\DependencyInjection\Container;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\LogicException;
use Symfony\Component\DependencyInjection\Exception\RuntimeException;
use Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;

/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class phpbb_cache_container extends \Symfony\Component\DependencyInjection\Container
{
    private $parameters = [];
    private $targetDirs = [];

    public function __construct()
    {
        $this->parameters = $this->getDefaultParameters();

        $this->services = [];
        $this->methodMap = [
            'cache.driver' => 'getCache_DriverService',
            'config' => 'getConfigService',
            'console.exception_subscriber' => 'getConsole_ExceptionSubscriberService',
            'console.installer.command.config.show' => 'getConsole_Installer_Command_Config_ShowService',
            'console.installer.command.config.validate' => 'getConsole_Installer_Command_Config_ValidateService',
            'console.installer.command.install' => 'getConsole_Installer_Command_InstallService',
            'console.installer.command_collection' => 'getConsole_Installer_CommandCollectionService',
            'console.updater.command.config.show' => 'getConsole_Updater_Command_Config_ShowService',
            'console.updater.command.config.validate' => 'getConsole_Updater_Command_Config_ValidateService',
            'console.updater.command.update' => 'getConsole_Updater_Command_UpdateService',
            'controller.resolver' => 'getController_ResolverService',
            'dispatcher' => 'getDispatcherService',
            'file_locator' => 'getFileLocatorService',
            'filesystem' => 'getFilesystemService',
            'http_kernel' => 'getHttpKernelService',
            'installer.file_updater.collection' => 'getInstaller_FileUpdater_CollectionService',
            'installer.file_updater.compress' => 'getInstaller_FileUpdater_CompressService',
            'installer.file_updater.factory' => 'getInstaller_FileUpdater_FactoryService',
            'installer.file_updater.file' => 'getInstaller_FileUpdater_FileService',
            'installer.file_updater.ftp' => 'getInstaller_FileUpdater_FtpService',
            'installer.helper.config' => 'getInstaller_Helper_ConfigService',
            'installer.helper.container_factory' => 'getInstaller_Helper_ContainerFactoryService',
            'installer.helper.database' => 'getInstaller_Helper_DatabaseService',
            'installer.helper.install_helper' => 'getInstaller_Helper_InstallHelperService',
            'installer.helper.iohandler' => 'getInstaller_Helper_IohandlerService',
            'installer.helper.iohandler_ajax' => 'getInstaller_Helper_IohandlerAjaxService',
            'installer.helper.iohandler_cli' => 'getInstaller_Helper_IohandlerCliService',
            'installer.helper.iohandler_factory' => 'getInstaller_Helper_IohandlerFactoryService',
            'installer.helper.update_helper' => 'getInstaller_Helper_UpdateHelperService',
            'installer.install.module_collection' => 'getInstaller_Install_ModuleCollectionService',
            'installer.install_data.add_bots' => 'getInstaller_InstallData_AddBotsService',
            'installer.install_data.add_languages' => 'getInstaller_InstallData_AddLanguagesService',
            'installer.install_data.add_modules' => 'getInstaller_InstallData_AddModulesService',
            'installer.install_data.create_search_index' => 'getInstaller_InstallData_CreateSearchIndexService',
            'installer.install_database.add_config_settings' => 'getInstaller_InstallDatabase_AddConfigSettingsService',
            'installer.install_database.add_default_data' => 'getInstaller_InstallDatabase_AddDefaultDataService',
            'installer.install_database.add_tables' => 'getInstaller_InstallDatabase_AddTablesService',
            'installer.install_database.create_schema_file' => 'getInstaller_InstallDatabase_CreateSchemaFileService',
            'installer.install_database.set_up_database' => 'getInstaller_InstallDatabase_SetUpDatabaseService',
            'installer.install_filesystem.create_config_file' => 'getInstaller_InstallFilesystem_CreateConfigFileService',
            'installer.install_finish.install_extensions' => 'getInstaller_InstallFinish_InstallExtensionsService',
            'installer.install_finish.notify_user' => 'getInstaller_InstallFinish_NotifyUserService',
            'installer.install_finish.populate_migrations' => 'getInstaller_InstallFinish_PopulateMigrationsService',
            'installer.installer.install' => 'getInstaller_Installer_InstallService',
            'installer.installer.update' => 'getInstaller_Installer_UpdateService',
            'installer.module.data_install' => 'getInstaller_Module_DataInstallService',
            'installer.module.data_install_collection' => 'getInstaller_Module_DataInstallCollectionService',
            'installer.module.database_install' => 'getInstaller_Module_DatabaseInstallService',
            'installer.module.filesystem_install' => 'getInstaller_Module_FilesystemInstallService',
            'installer.module.filesystem_update' => 'getInstaller_Module_FilesystemUpdateService',
            'installer.module.finish_install' => 'getInstaller_Module_FinishInstallService',
            'installer.module.install_database_collection' => 'getInstaller_Module_InstallDatabaseCollectionService',
            'installer.module.install_filesystem_collection' => 'getInstaller_Module_InstallFilesystemCollectionService',
            'installer.module.install_finish_collection' => 'getInstaller_Module_InstallFinishCollectionService',
            'installer.module.install_obtain_data_collection' => 'getInstaller_Module_InstallObtainDataCollectionService',
            'installer.module.install_requirements_collection' => 'getInstaller_Module_InstallRequirementsCollectionService',
            'installer.module.obtain_data_install' => 'getInstaller_Module_ObtainDataInstallService',
            'installer.module.obtain_data_update' => 'getInstaller_Module_ObtainDataUpdateService',
            'installer.module.requirements_install' => 'getInstaller_Module_RequirementsInstallService',
            'installer.module.requirements_update' => 'getInstaller_Module_RequirementsUpdateService',
            'installer.module.update_database' => 'getInstaller_Module_UpdateDatabaseService',
            'installer.module.update_database_collection' => 'getInstaller_Module_UpdateDatabaseCollectionService',
            'installer.module.update_filesystem_collection' => 'getInstaller_Module_UpdateFilesystemCollectionService',
            'installer.module.update_obtain_data_collection' => 'getInstaller_Module_UpdateObtainDataCollectionService',
            'installer.module.update_requirements_collection' => 'getInstaller_Module_UpdateRequirementsCollectionService',
            'installer.navigation.convertor_navigation' => 'getInstaller_Navigation_ConvertorNavigationService',
            'installer.navigation.install_navigation' => 'getInstaller_Navigation_InstallNavigationService',
            'installer.navigation.main_navigation' => 'getInstaller_Navigation_MainNavigationService',
            'installer.navigation.provider' => 'getInstaller_Navigation_ProviderService',
            'installer.navigation.service_collection' => 'getInstaller_Navigation_ServiceCollectionService',
            'installer.navigation.update_navigation' => 'getInstaller_Navigation_UpdateNavigationService',
            'installer.obtain_data.file_updater_method' => 'getInstaller_ObtainData_FileUpdaterMethodService',
            'installer.obtain_data.obtain_admin_data' => 'getInstaller_ObtainData_ObtainAdminDataService',
            'installer.obtain_data.obtain_board_data' => 'getInstaller_ObtainData_ObtainBoardDataService',
            'installer.obtain_data.obtain_database_data' => 'getInstaller_ObtainData_ObtainDatabaseDataService',
            'installer.obtain_data.obtain_email_data' => 'getInstaller_ObtainData_ObtainEmailDataService',
            'installer.obtain_data.obtain_server_data' => 'getInstaller_ObtainData_ObtainServerDataService',
            'installer.obtain_data.update_files' => 'getInstaller_ObtainData_UpdateFilesService',
            'installer.obtain_data.update_ftp_settings' => 'getInstaller_ObtainData_UpdateFtpSettingsService',
            'installer.obtain_data.update_options' => 'getInstaller_ObtainData_UpdateOptionsService',
            'installer.requirements.check_filesystem' => 'getInstaller_Requirements_CheckFilesystemService',
            'installer.requirements.check_filesystem_update' => 'getInstaller_Requirements_CheckFilesystemUpdateService',
            'installer.requirements.check_server_environment' => 'getInstaller_Requirements_CheckServerEnvironmentService',
            'installer.requirements.update_requirements' => 'getInstaller_Requirements_UpdateRequirementsService',
            'installer.update.module_collection' => 'getInstaller_Update_ModuleCollectionService',
            'installer.update_database.update_extensions' => 'getInstaller_UpdateDatabase_UpdateExtensionsService',
            'installer.update_database.update_task' => 'getInstaller_UpdateDatabase_UpdateTaskService',
            'installer.update_filesystem.check_task' => 'getInstaller_UpdateFilesystem_CheckTaskService',
            'installer.update_filesystem.diff_files' => 'getInstaller_UpdateFilesystem_DiffFilesService',
            'installer.update_filesystem.download_updated_files' => 'getInstaller_UpdateFilesystem_DownloadUpdatedFilesService',
            'installer.update_filesystem.show_file_status' => 'getInstaller_UpdateFilesystem_ShowFileStatusService',
            'installer.update_filesystem.update_files' => 'getInstaller_UpdateFilesystem_UpdateFilesService',
            'kernel_exception_subscriber' => 'getKernelExceptionSubscriberService',
            'kernel_terminate_subscriber' => 'getKernelTerminateSubscriberService',
            'language' => 'getLanguageService',
            'language.helper.language_file' => 'getLanguage_Helper_LanguageFileService',
            'language.loader' => 'getLanguage_LoaderService',
            'path_helper' => 'getPathHelperService',
            'php_ini' => 'getPhpIniService',
            'phpbb.installer.controller.convert' => 'getPhpbb_Installer_Controller_ConvertService',
            'phpbb.installer.controller.file_downloader' => 'getPhpbb_Installer_Controller_FileDownloaderService',
            'phpbb.installer.controller.helper' => 'getPhpbb_Installer_Controller_HelperService',
            'phpbb.installer.controller.install' => 'getPhpbb_Installer_Controller_InstallService',
            'phpbb.installer.controller.status' => 'getPhpbb_Installer_Controller_StatusService',
            'phpbb.installer.controller.update' => 'getPhpbb_Installer_Controller_UpdateService',
            'phpbb.installer.controller.welcome' => 'getPhpbb_Installer_Controller_WelcomeService',
            'request' => 'getRequestService',
            'request_stack' => 'getRequestStackService',
            'router' => 'getRouterService',
            'router.listener' => 'getRouter_ListenerService',
            'routing.chained_resources_locator' => 'getRouting_ChainedResourcesLocatorService',
            'routing.delegated_loader' => 'getRouting_DelegatedLoaderService',
            'routing.helper' => 'getRouting_HelperService',
            'routing.loader.collection' => 'getRouting_Loader_CollectionService',
            'routing.loader.yaml' => 'getRouting_Loader_YamlService',
            'routing.resolver' => 'getRouting_ResolverService',
            'routing.resources_locator.collection' => 'getRouting_ResourcesLocator_CollectionService',
            'routing.resources_locator.default' => 'getRouting_ResourcesLocator_DefaultService',
            'symfony_request' => 'getSymfonyRequestService',
            'symfony_response_listener' => 'getSymfonyResponseListenerService',
            'template' => 'getTemplateService',
            'template.twig.environment' => 'getTemplate_Twig_EnvironmentService',
            'template.twig.extensions.avatar' => 'getTemplate_Twig_Extensions_AvatarService',
            'template.twig.extensions.collection' => 'getTemplate_Twig_Extensions_CollectionService',
            'template.twig.extensions.config' => 'getTemplate_Twig_Extensions_ConfigService',
            'template.twig.extensions.debug' => 'getTemplate_Twig_Extensions_DebugService',
            'template.twig.extensions.phpbb' => 'getTemplate_Twig_Extensions_PhpbbService',
            'template.twig.extensions.routing' => 'getTemplate_Twig_Extensions_RoutingService',
            'template.twig.extensions.username' => 'getTemplate_Twig_Extensions_UsernameService',
            'template.twig.lexer' => 'getTemplate_Twig_LexerService',
            'template.twig.loader' => 'getTemplate_Twig_LoaderService',
            'template_context' => 'getTemplateContextService',
            'user' => 'getUserService',
        ];
        $this->privates = [
            'cache.driver' => true,
            'config' => true,
            'console.exception_subscriber' => true,
            'console.installer.command.config.show' => true,
            'console.installer.command.config.validate' => true,
            'console.installer.command.install' => true,
            'console.installer.command_collection' => true,
            'console.updater.command.config.show' => true,
            'console.updater.command.config.validate' => true,
            'console.updater.command.update' => true,
            'controller.resolver' => true,
            'dispatcher' => true,
            'file_locator' => true,
            'filesystem' => true,
            'http_kernel' => true,
            'installer.file_updater.collection' => true,
            'installer.file_updater.compress' => true,
            'installer.file_updater.factory' => true,
            'installer.file_updater.file' => true,
            'installer.file_updater.ftp' => true,
            'installer.helper.config' => true,
            'installer.helper.container_factory' => true,
            'installer.helper.database' => true,
            'installer.helper.install_helper' => true,
            'installer.helper.iohandler' => true,
            'installer.helper.iohandler_ajax' => true,
            'installer.helper.iohandler_cli' => true,
            'installer.helper.iohandler_factory' => true,
            'installer.helper.update_helper' => true,
            'installer.install.module_collection' => true,
            'installer.install_data.add_bots' => true,
            'installer.install_data.add_languages' => true,
            'installer.install_data.add_modules' => true,
            'installer.install_data.create_search_index' => true,
            'installer.install_database.add_config_settings' => true,
            'installer.install_database.add_default_data' => true,
            'installer.install_database.add_tables' => true,
            'installer.install_database.create_schema_file' => true,
            'installer.install_database.set_up_database' => true,
            'installer.install_filesystem.create_config_file' => true,
            'installer.install_finish.install_extensions' => true,
            'installer.install_finish.notify_user' => true,
            'installer.install_finish.populate_migrations' => true,
            'installer.installer.install' => true,
            'installer.installer.update' => true,
            'installer.module.data_install' => true,
            'installer.module.data_install_collection' => true,
            'installer.module.database_install' => true,
            'installer.module.filesystem_install' => true,
            'installer.module.filesystem_update' => true,
            'installer.module.finish_install' => true,
            'installer.module.install_database_collection' => true,
            'installer.module.install_filesystem_collection' => true,
            'installer.module.install_finish_collection' => true,
            'installer.module.install_obtain_data_collection' => true,
            'installer.module.install_requirements_collection' => true,
            'installer.module.obtain_data_install' => true,
            'installer.module.obtain_data_update' => true,
            'installer.module.requirements_install' => true,
            'installer.module.requirements_update' => true,
            'installer.module.update_database' => true,
            'installer.module.update_database_collection' => true,
            'installer.module.update_filesystem_collection' => true,
            'installer.module.update_obtain_data_collection' => true,
            'installer.module.update_requirements_collection' => true,
            'installer.navigation.convertor_navigation' => true,
            'installer.navigation.install_navigation' => true,
            'installer.navigation.main_navigation' => true,
            'installer.navigation.provider' => true,
            'installer.navigation.service_collection' => true,
            'installer.navigation.update_navigation' => true,
            'installer.obtain_data.file_updater_method' => true,
            'installer.obtain_data.obtain_admin_data' => true,
            'installer.obtain_data.obtain_board_data' => true,
            'installer.obtain_data.obtain_database_data' => true,
            'installer.obtain_data.obtain_email_data' => true,
            'installer.obtain_data.obtain_server_data' => true,
            'installer.obtain_data.update_files' => true,
            'installer.obtain_data.update_ftp_settings' => true,
            'installer.obtain_data.update_options' => true,
            'installer.requirements.check_filesystem' => true,
            'installer.requirements.check_filesystem_update' => true,
            'installer.requirements.check_server_environment' => true,
            'installer.requirements.update_requirements' => true,
            'installer.update.module_collection' => true,
            'installer.update_database.update_extensions' => true,
            'installer.update_database.update_task' => true,
            'installer.update_filesystem.check_task' => true,
            'installer.update_filesystem.diff_files' => true,
            'installer.update_filesystem.download_updated_files' => true,
            'installer.update_filesystem.show_file_status' => true,
            'installer.update_filesystem.update_files' => true,
            'kernel_exception_subscriber' => true,
            'kernel_terminate_subscriber' => true,
            'language' => true,
            'language.helper.language_file' => true,
            'language.loader' => true,
            'path_helper' => true,
            'php_ini' => true,
            'phpbb.installer.controller.convert' => true,
            'phpbb.installer.controller.file_downloader' => true,
            'phpbb.installer.controller.helper' => true,
            'phpbb.installer.controller.install' => true,
            'phpbb.installer.controller.status' => true,
            'phpbb.installer.controller.update' => true,
            'phpbb.installer.controller.welcome' => true,
            'request' => true,
            'request_stack' => true,
            'router' => true,
            'router.listener' => true,
            'routing.chained_resources_locator' => true,
            'routing.delegated_loader' => true,
            'routing.helper' => true,
            'routing.loader.collection' => true,
            'routing.loader.yaml' => true,
            'routing.resolver' => true,
            'routing.resources_locator.collection' => true,
            'routing.resources_locator.default' => true,
            'symfony_request' => true,
            'symfony_response_listener' => true,
            'template' => true,
            'template.twig.environment' => true,
            'template.twig.extensions.avatar' => true,
            'template.twig.extensions.collection' => true,
            'template.twig.extensions.config' => true,
            'template.twig.extensions.debug' => true,
            'template.twig.extensions.phpbb' => true,
            'template.twig.extensions.routing' => true,
            'template.twig.extensions.username' => true,
            'template.twig.lexer' => true,
            'template.twig.loader' => true,
            'template_context' => true,
            'user' => true,
        ];

        $this->aliases = [];
    }

    public function getRemovedIds()
    {
        return [
            'Psr\\Container\\ContainerInterface' => true,
            'Symfony\\Component\\DependencyInjection\\ContainerInterface' => true,
            'cache.driver' => true,
            'config' => true,
            'console.exception_subscriber' => true,
            'console.installer.command.config.show' => true,
            'console.installer.command.config.validate' => true,
            'console.installer.command.install' => true,
            'console.installer.command_collection' => true,
            'console.updater.command.config.show' => true,
            'console.updater.command.config.validate' => true,
            'console.updater.command.update' => true,
            'controller.resolver' => true,
            'dispatcher' => true,
            'file_locator' => true,
            'filesystem' => true,
            'http_kernel' => true,
            'installer.file_updater.collection' => true,
            'installer.file_updater.compress' => true,
            'installer.file_updater.factory' => true,
            'installer.file_updater.file' => true,
            'installer.file_updater.ftp' => true,
            'installer.helper.config' => true,
            'installer.helper.container_factory' => true,
            'installer.helper.database' => true,
            'installer.helper.install_helper' => true,
            'installer.helper.iohandler' => true,
            'installer.helper.iohandler_abstract' => true,
            'installer.helper.iohandler_ajax' => true,
            'installer.helper.iohandler_cli' => true,
            'installer.helper.iohandler_factory' => true,
            'installer.helper.update_helper' => true,
            'installer.install.module_collection' => true,
            'installer.install_data.add_bots' => true,
            'installer.install_data.add_languages' => true,
            'installer.install_data.add_modules' => true,
            'installer.install_data.create_search_index' => true,
            'installer.install_database.add_config_settings' => true,
            'installer.install_database.add_default_data' => true,
            'installer.install_database.add_tables' => true,
            'installer.install_database.create_schema_file' => true,
            'installer.install_database.set_up_database' => true,
            'installer.install_filesystem.create_config_file' => true,
            'installer.install_finish.install_extensions' => true,
            'installer.install_finish.notify_user' => true,
            'installer.install_finish.populate_migrations' => true,
            'installer.installer.abstract' => true,
            'installer.installer.install' => true,
            'installer.installer.update' => true,
            'installer.module.data_install' => true,
            'installer.module.data_install_collection' => true,
            'installer.module.database_install' => true,
            'installer.module.filesystem_install' => true,
            'installer.module.filesystem_update' => true,
            'installer.module.finish_install' => true,
            'installer.module.install_database_collection' => true,
            'installer.module.install_filesystem_collection' => true,
            'installer.module.install_finish_collection' => true,
            'installer.module.install_obtain_data_collection' => true,
            'installer.module.install_requirements_collection' => true,
            'installer.module.obtain_data_install' => true,
            'installer.module.obtain_data_update' => true,
            'installer.module.requirements_install' => true,
            'installer.module.requirements_update' => true,
            'installer.module.update_database' => true,
            'installer.module.update_database_collection' => true,
            'installer.module.update_filesystem_collection' => true,
            'installer.module.update_obtain_data_collection' => true,
            'installer.module.update_requirements_collection' => true,
            'installer.module_base' => true,
            'installer.navigation.convertor_navigation' => true,
            'installer.navigation.install_navigation' => true,
            'installer.navigation.main_navigation' => true,
            'installer.navigation.provider' => true,
            'installer.navigation.service_collection' => true,
            'installer.navigation.update_navigation' => true,
            'installer.obtain_data.file_updater_method' => true,
            'installer.obtain_data.obtain_admin_data' => true,
            'installer.obtain_data.obtain_board_data' => true,
            'installer.obtain_data.obtain_database_data' => true,
            'installer.obtain_data.obtain_email_data' => true,
            'installer.obtain_data.obtain_server_data' => true,
            'installer.obtain_data.update_files' => true,
            'installer.obtain_data.update_ftp_settings' => true,
            'installer.obtain_data.update_options' => true,
            'installer.requirements.check_filesystem' => true,
            'installer.requirements.check_filesystem_update' => true,
            'installer.requirements.check_server_environment' => true,
            'installer.requirements.update_requirements' => true,
            'installer.update.module_collection' => true,
            'installer.update_database.update_extensions' => true,
            'installer.update_database.update_task' => true,
            'installer.update_filesystem.check_task' => true,
            'installer.update_filesystem.diff_files' => true,
            'installer.update_filesystem.download_updated_files' => true,
            'installer.update_filesystem.show_file_status' => true,
            'installer.update_filesystem.update_files' => true,
            'kernel_exception_subscriber' => true,
            'kernel_terminate_subscriber' => true,
            'language' => true,
            'language.helper.language_file' => true,
            'language.loader' => true,
            'language.loader_abstract' => true,
            'path_helper' => true,
            'php_ini' => true,
            'phpbb.installer.controller.convert' => true,
            'phpbb.installer.controller.file_downloader' => true,
            'phpbb.installer.controller.helper' => true,
            'phpbb.installer.controller.install' => true,
            'phpbb.installer.controller.status' => true,
            'phpbb.installer.controller.update' => true,
            'phpbb.installer.controller.welcome' => true,
            'request' => true,
            'request_stack' => true,
            'router' => true,
            'router.listener' => true,
            'routing.chained_resources_locator' => true,
            'routing.delegated_loader' => true,
            'routing.helper' => true,
            'routing.loader.collection' => true,
            'routing.loader.yaml' => true,
            'routing.resolver' => true,
            'routing.resources_locator.collection' => true,
            'routing.resources_locator.default' => true,
            'symfony_request' => true,
            'symfony_response_listener' => true,
            'template' => true,
            'template.twig.environment' => true,
            'template.twig.extensions.avatar' => true,
            'template.twig.extensions.collection' => true,
            'template.twig.extensions.config' => true,
            'template.twig.extensions.debug' => true,
            'template.twig.extensions.phpbb' => true,
            'template.twig.extensions.routing' => true,
            'template.twig.extensions.username' => true,
            'template.twig.lexer' => true,
            'template.twig.loader' => true,
            'template_context' => true,
            'user' => true,
        ];
    }

    public function compile()
    {
        throw new LogicException('You cannot compile a dumped container that was already compiled.');
    }

    public function isCompiled()
    {
        return true;
    }

    public function isFrozen()
    {
        @trigger_error(sprintf('The %s() method is deprecated since Symfony 3.3 and will be removed in 4.0. Use the isCompiled() method instead.', __METHOD__), E_USER_DEPRECATED);

        return true;
    }

    protected function createProxy($class, \Closure $factory)
    {
        return $factory();
    }

    /**
     * Gets the private 'cache.driver' shared service.
     *
     * @return \phpbb\cache\driver\file
     */
    protected function getCache_DriverService()
    {
        return $this->services['cache.driver'] = new \phpbb\cache\driver\file('../cache/installer/');
    }

    /**
     * Gets the private 'config' shared service.
     *
     * @return \phpbb\config\config
     */
    protected function getConfigService()
    {
        return $this->services['config'] = new \phpbb\config\config(['rand_seed' => 'installer_seed', 'rand_seed_last_update' => 0]);
    }

    /**
     * Gets the private 'console.exception_subscriber' shared service.
     *
     * @return \phpbb\console\exception_subscriber
     */
    protected function getConsole_ExceptionSubscriberService()
    {
        return $this->services['console.exception_subscriber'] = new \phpbb\console\exception_subscriber(${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'}, false);
    }

    /**
     * Gets the private 'console.installer.command.config.show' shared service.
     *
     * @return \phpbb\install\console\command\install\config\show
     */
    protected function getConsole_Installer_Command_Config_ShowService()
    {
        return $this->services['console.installer.command.config.show'] = new \phpbb\install\console\command\install\config\show(${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler_factory']) ? $this->services['installer.helper.iohandler_factory'] : ($this->services['installer.helper.iohandler_factory'] = new \phpbb\install\helper\iohandler\factory($this))) && false ?: '_'});
    }

    /**
     * Gets the private 'console.installer.command.config.validate' shared service.
     *
     * @return \phpbb\install\console\command\install\config\validate
     */
    protected function getConsole_Installer_Command_Config_ValidateService()
    {
        return $this->services['console.installer.command.config.validate'] = new \phpbb\install\console\command\install\config\validate(${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler_factory']) ? $this->services['installer.helper.iohandler_factory'] : ($this->services['installer.helper.iohandler_factory'] = new \phpbb\install\helper\iohandler\factory($this))) && false ?: '_'});
    }

    /**
     * Gets the private 'console.installer.command.install' shared service.
     *
     * @return \phpbb\install\console\command\install\install
     */
    protected function getConsole_Installer_Command_InstallService()
    {
        return $this->services['console.installer.command.install'] = new \phpbb\install\console\command\install\install(${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler_factory']) ? $this->services['installer.helper.iohandler_factory'] : ($this->services['installer.helper.iohandler_factory'] = new \phpbb\install\helper\iohandler\factory($this))) && false ?: '_'}, ${($_ = isset($this->services['installer.installer.install']) ? $this->services['installer.installer.install'] : $this->getInstaller_Installer_InstallService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.install_helper']) ? $this->services['installer.helper.install_helper'] : ($this->services['installer.helper.install_helper'] = new \phpbb\install\helper\install_helper('../', 'php'))) && false ?: '_'});
    }

    /**
     * Gets the private 'console.installer.command_collection' shared service.
     *
     * @return \phpbb\di\service_collection
     */
    protected function getConsole_Installer_CommandCollectionService()
    {
        $this->services['console.installer.command_collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('console.installer.command.install');
        $instance->add('console.installer.command.config.show');
        $instance->add('console.installer.command.config.validate');
        $instance->add('console.updater.command.update');
        $instance->add('console.updater.command.config.show');
        $instance->add('console.updater.command.config.validate');

        return $instance;
    }

    /**
     * Gets the private 'console.updater.command.config.show' shared service.
     *
     * @return \phpbb\install\console\command\update\config\show
     */
    protected function getConsole_Updater_Command_Config_ShowService()
    {
        return $this->services['console.updater.command.config.show'] = new \phpbb\install\console\command\update\config\show(${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler_factory']) ? $this->services['installer.helper.iohandler_factory'] : ($this->services['installer.helper.iohandler_factory'] = new \phpbb\install\helper\iohandler\factory($this))) && false ?: '_'});
    }

    /**
     * Gets the private 'console.updater.command.config.validate' shared service.
     *
     * @return \phpbb\install\console\command\update\config\validate
     */
    protected function getConsole_Updater_Command_Config_ValidateService()
    {
        return $this->services['console.updater.command.config.validate'] = new \phpbb\install\console\command\update\config\validate(${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler_factory']) ? $this->services['installer.helper.iohandler_factory'] : ($this->services['installer.helper.iohandler_factory'] = new \phpbb\install\helper\iohandler\factory($this))) && false ?: '_'});
    }

    /**
     * Gets the private 'console.updater.command.update' shared service.
     *
     * @return \phpbb\install\console\command\update\update
     */
    protected function getConsole_Updater_Command_UpdateService()
    {
        return $this->services['console.updater.command.update'] = new \phpbb\install\console\command\update\update(${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler_factory']) ? $this->services['installer.helper.iohandler_factory'] : ($this->services['installer.helper.iohandler_factory'] = new \phpbb\install\helper\iohandler\factory($this))) && false ?: '_'}, ${($_ = isset($this->services['installer.installer.update']) ? $this->services['installer.installer.update'] : $this->getInstaller_Installer_UpdateService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.install_helper']) ? $this->services['installer.helper.install_helper'] : ($this->services['installer.helper.install_helper'] = new \phpbb\install\helper\install_helper('../', 'php'))) && false ?: '_'});
    }

    /**
     * Gets the private 'controller.resolver' shared service.
     *
     * @return \phpbb\controller\resolver
     */
    protected function getController_ResolverService()
    {
        return $this->services['controller.resolver'] = new \phpbb\controller\resolver($this, '../', ${($_ = isset($this->services['template']) ? $this->services['template'] : $this->getTemplateService()) && false ?: '_'});
    }

    /**
     * Gets the private 'dispatcher' shared service.
     *
     * @return \phpbb\event\dispatcher
     */
    protected function getDispatcherService()
    {
        $this->services['dispatcher'] = $instance = new \phpbb\event\dispatcher($this);

        $instance->addListener('kernel.exception', [0 => function () {
            return ${($_ = isset($this->services['kernel_exception_subscriber']) ? $this->services['kernel_exception_subscriber'] : $this->getKernelExceptionSubscriberService()) && false ?: '_'};
        }, 1 => 'on_kernel_exception'], 0);
        $instance->addListener('kernel.terminate', [0 => function () {
            return ${($_ = isset($this->services['kernel_terminate_subscriber']) ? $this->services['kernel_terminate_subscriber'] : ($this->services['kernel_terminate_subscriber'] = new \phpbb\event\kernel_terminate_subscriber())) && false ?: '_'};
        }, 1 => 'on_kernel_terminate'], -9223372036854775807-1);
        $instance->addListener('kernel.response', [0 => function () {
            return ${($_ = isset($this->services['symfony_response_listener']) ? $this->services['symfony_response_listener'] : ($this->services['symfony_response_listener'] = new \Symfony\Component\HttpKernel\EventListener\ResponseListener('UTF-8'))) && false ?: '_'};
        }, 1 => 'onKernelResponse'], 0);
        $instance->addListener('kernel.request', [0 => function () {
            return ${($_ = isset($this->services['router.listener']) ? $this->services['router.listener'] : $this->getRouter_ListenerService()) && false ?: '_'};
        }, 1 => 'onKernelRequest'], 32);
        $instance->addListener('kernel.finish_request', [0 => function () {
            return ${($_ = isset($this->services['router.listener']) ? $this->services['router.listener'] : $this->getRouter_ListenerService()) && false ?: '_'};
        }, 1 => 'onKernelFinishRequest'], 0);
        $instance->addListener('kernel.exception', [0 => function () {
            return ${($_ = isset($this->services['router.listener']) ? $this->services['router.listener'] : $this->getRouter_ListenerService()) && false ?: '_'};
        }, 1 => 'onKernelException'], -64);
        $instance->addListener('console.error', [0 => function () {
            return ${($_ = isset($this->services['console.exception_subscriber']) ? $this->services['console.exception_subscriber'] : $this->getConsole_ExceptionSubscriberService()) && false ?: '_'};
        }, 1 => 'on_error'], 0);

        return $instance;
    }

    /**
     * Gets the private 'file_locator' shared service.
     *
     * @return \phpbb\routing\file_locator
     */
    protected function getFileLocatorService()
    {
        return $this->services['file_locator'] = new \phpbb\routing\file_locator(${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'}, '../');
    }

    /**
     * Gets the private 'filesystem' shared service.
     *
     * @return \phpbb\filesystem\filesystem
     */
    protected function getFilesystemService()
    {
        return $this->services['filesystem'] = new \phpbb\filesystem\filesystem();
    }

    /**
     * Gets the private 'http_kernel' shared service.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernel
     */
    protected function getHttpKernelService()
    {
        return $this->services['http_kernel'] = new \Symfony\Component\HttpKernel\HttpKernel(${($_ = isset($this->services['dispatcher']) ? $this->services['dispatcher'] : $this->getDispatcherService()) && false ?: '_'}, ${($_ = isset($this->services['controller.resolver']) ? $this->services['controller.resolver'] : $this->getController_ResolverService()) && false ?: '_'}, ${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())) && false ?: '_'});
    }

    /**
     * Gets the private 'installer.file_updater.collection' shared service.
     *
     * @return \phpbb\di\service_collection
     */
    protected function getInstaller_FileUpdater_CollectionService()
    {
        $this->services['installer.file_updater.collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('installer.file_updater.compress');
        $instance->add('installer.file_updater.ftp');
        $instance->add('installer.file_updater.file');

        return $instance;
    }

    /**
     * Gets the private 'installer.file_updater.compress' shared service.
     *
     * @return \phpbb\install\helper\file_updater\compression_file_updater
     */
    protected function getInstaller_FileUpdater_CompressService()
    {
        return $this->services['installer.file_updater.compress'] = new \phpbb\install\helper\file_updater\compression_file_updater(${($_ = isset($this->services['installer.helper.update_helper']) ? $this->services['installer.helper.update_helper'] : ($this->services['installer.helper.update_helper'] = new \phpbb\install\helper\update_helper('../'))) && false ?: '_'}, '../', 'php');
    }

    /**
     * Gets the private 'installer.file_updater.factory' shared service.
     *
     * @return \phpbb\install\helper\file_updater\factory
     */
    protected function getInstaller_FileUpdater_FactoryService()
    {
        return $this->services['installer.file_updater.factory'] = new \phpbb\install\helper\file_updater\factory(${($_ = isset($this->services['installer.file_updater.collection']) ? $this->services['installer.file_updater.collection'] : $this->getInstaller_FileUpdater_CollectionService()) && false ?: '_'});
    }

    /**
     * Gets the private 'installer.file_updater.file' shared service.
     *
     * @return \phpbb\install\helper\file_updater\file_updater
     */
    protected function getInstaller_FileUpdater_FileService()
    {
        return $this->services['installer.file_updater.file'] = new \phpbb\install\helper\file_updater\file_updater(${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'}, '../');
    }

    /**
     * Gets the private 'installer.file_updater.ftp' shared service.
     *
     * @return \phpbb\install\helper\file_updater\ftp_file_updater
     */
    protected function getInstaller_FileUpdater_FtpService()
    {
        return $this->services['installer.file_updater.ftp'] = new \phpbb\install\helper\file_updater\ftp_file_updater(${($_ = isset($this->services['installer.helper.update_helper']) ? $this->services['installer.helper.update_helper'] : ($this->services['installer.helper.update_helper'] = new \phpbb\install\helper\update_helper('../'))) && false ?: '_'}, '../', 'php');
    }

    /**
     * Gets the private 'installer.helper.config' shared service.
     *
     * @return \phpbb\install\helper\config
     */
    protected function getInstaller_Helper_ConfigService()
    {
        return $this->services['installer.helper.config'] = new \phpbb\install\helper\config(${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'}, ${($_ = isset($this->services['php_ini']) ? $this->services['php_ini'] : ($this->services['php_ini'] = new \bantu\IniGetWrapper\IniGetWrapper())) && false ?: '_'}, '../');
    }

    /**
     * Gets the private 'installer.helper.container_factory' shared service.
     *
     * @return \phpbb\install\helper\container_factory
     */
    protected function getInstaller_Helper_ContainerFactoryService()
    {
        return $this->services['installer.helper.container_factory'] = new \phpbb\install\helper\container_factory(${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'}, ${($_ = isset($this->services['request']) ? $this->services['request'] : ($this->services['request'] = new \phpbb\request\request(NULL, true))) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.update_helper']) ? $this->services['installer.helper.update_helper'] : ($this->services['installer.helper.update_helper'] = new \phpbb\install\helper\update_helper('../'))) && false ?: '_'}, '../', 'php');
    }

    /**
     * Gets the private 'installer.helper.database' shared service.
     *
     * @return \phpbb\install\helper\database
     */
    protected function getInstaller_Helper_DatabaseService()
    {
        return $this->services['installer.helper.database'] = new \phpbb\install\helper\database(${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'}, '../');
    }

    /**
     * Gets the private 'installer.helper.install_helper' shared service.
     *
     * @return \phpbb\install\helper\install_helper
     */
    protected function getInstaller_Helper_InstallHelperService()
    {
        return $this->services['installer.helper.install_helper'] = new \phpbb\install\helper\install_helper('../', 'php');
    }

    /**
     * Gets the private 'installer.helper.iohandler' shared service.
     *
     * @return \phpbb\install\helper\iohandler\iohandler_interface
     */
    protected function getInstaller_Helper_IohandlerService()
    {
        return $this->services['installer.helper.iohandler'] = ${($_ = isset($this->services['installer.helper.iohandler_factory']) ? $this->services['installer.helper.iohandler_factory'] : ($this->services['installer.helper.iohandler_factory'] = new \phpbb\install\helper\iohandler\factory($this))) && false ?: '_'}->get();
    }

    /**
     * Gets the private 'installer.helper.iohandler_ajax' shared service.
     *
     * @return \phpbb\install\helper\iohandler\ajax_iohandler
     */
    protected function getInstaller_Helper_IohandlerAjaxService()
    {
        $this->services['installer.helper.iohandler_ajax'] = $instance = new \phpbb\install\helper\iohandler\ajax_iohandler(${($_ = isset($this->services['path_helper']) ? $this->services['path_helper'] : $this->getPathHelperService()) && false ?: '_'}, ${($_ = isset($this->services['request']) ? $this->services['request'] : ($this->services['request'] = new \phpbb\request\request(NULL, true))) && false ?: '_'}, ${($_ = isset($this->services['template']) ? $this->services['template'] : $this->getTemplateService()) && false ?: '_'}, ${($_ = isset($this->services['router']) ? $this->services['router'] : $this->getRouterService()) && false ?: '_'}, '../');

        $instance->set_language(${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'installer.helper.iohandler_cli' shared service.
     *
     * @return \phpbb\install\helper\iohandler\cli_iohandler
     */
    protected function getInstaller_Helper_IohandlerCliService()
    {
        $this->services['installer.helper.iohandler_cli'] = $instance = new \phpbb\install\helper\iohandler\cli_iohandler();

        $instance->set_language(${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'installer.helper.iohandler_factory' shared service.
     *
     * @return \phpbb\install\helper\iohandler\factory
     */
    protected function getInstaller_Helper_IohandlerFactoryService()
    {
        return $this->services['installer.helper.iohandler_factory'] = new \phpbb\install\helper\iohandler\factory($this);
    }

    /**
     * Gets the private 'installer.helper.update_helper' shared service.
     *
     * @return \phpbb\install\helper\update_helper
     */
    protected function getInstaller_Helper_UpdateHelperService()
    {
        return $this->services['installer.helper.update_helper'] = new \phpbb\install\helper\update_helper('../');
    }

    /**
     * Gets the private 'installer.install.module_collection' shared service.
     *
     * @return \phpbb\di\ordered_service_collection
     */
    protected function getInstaller_Install_ModuleCollectionService()
    {
        $this->services['installer.install.module_collection'] = $instance = new \phpbb\di\ordered_service_collection($this);

        $instance->add('installer.module.data_install', 50);
        $instance->add('installer.module.database_install', 40);
        $instance->add('installer.module.filesystem_install', 30);
        $instance->add('installer.module.finish_install', 60);
        $instance->add('installer.module.obtain_data_install', 20);
        $instance->add('installer.module.requirements_install', 10);

        return $instance;
    }

    /**
     * Gets the private 'installer.install_data.add_bots' shared service.
     *
     * @return \phpbb\install\module\install_data\task\add_bots
     */
    protected function getInstaller_InstallData_AddBotsService()
    {
        return $this->services['installer.install_data.add_bots'] = new \phpbb\install\module\install_data\task\add_bots(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.container_factory']) ? $this->services['installer.helper.container_factory'] : $this->getInstaller_Helper_ContainerFactoryService()) && false ?: '_'}, ${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'}, '../', 'php');
    }

    /**
     * Gets the private 'installer.install_data.add_languages' shared service.
     *
     * @return \phpbb\install\module\install_data\task\add_languages
     */
    protected function getInstaller_InstallData_AddLanguagesService()
    {
        return $this->services['installer.install_data.add_languages'] = new \phpbb\install\module\install_data\task\add_languages(${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.container_factory']) ? $this->services['installer.helper.container_factory'] : $this->getInstaller_Helper_ContainerFactoryService()) && false ?: '_'}, ${($_ = isset($this->services['language.helper.language_file']) ? $this->services['language.helper.language_file'] : ($this->services['language.helper.language_file'] = new \phpbb\language\language_file_helper('../'))) && false ?: '_'});
    }

    /**
     * Gets the private 'installer.install_data.add_modules' shared service.
     *
     * @return \phpbb\install\module\install_data\task\add_modules
     */
    protected function getInstaller_InstallData_AddModulesService()
    {
        return $this->services['installer.install_data.add_modules'] = new \phpbb\install\module\install_data\task\add_modules(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.container_factory']) ? $this->services['installer.helper.container_factory'] : $this->getInstaller_Helper_ContainerFactoryService()) && false ?: '_'});
    }

    /**
     * Gets the private 'installer.install_data.create_search_index' shared service.
     *
     * @return \phpbb\install\module\install_data\task\create_search_index
     */
    protected function getInstaller_InstallData_CreateSearchIndexService()
    {
        return $this->services['installer.install_data.create_search_index'] = new \phpbb\install\module\install_data\task\create_search_index(${($_ = isset($this->services['config']) ? $this->services['config'] : ($this->services['config'] = new \phpbb\config\config(['rand_seed' => 'installer_seed', 'rand_seed_last_update' => 0]))) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.container_factory']) ? $this->services['installer.helper.container_factory'] : $this->getInstaller_Helper_ContainerFactoryService()) && false ?: '_'}, '../', 'php');
    }

    /**
     * Gets the private 'installer.install_database.add_config_settings' shared service.
     *
     * @return \phpbb\install\module\install_database\task\add_config_settings
     */
    protected function getInstaller_InstallDatabase_AddConfigSettingsService()
    {
        return $this->services['installer.install_database.add_config_settings'] = new \phpbb\install\module\install_database\task\add_config_settings(${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.container_factory']) ? $this->services['installer.helper.container_factory'] : $this->getInstaller_Helper_ContainerFactoryService()) && false ?: '_'}, ${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'}, '../');
    }

    /**
     * Gets the private 'installer.install_database.add_default_data' shared service.
     *
     * @return \phpbb\install\module\install_database\task\add_default_data
     */
    protected function getInstaller_InstallDatabase_AddDefaultDataService()
    {
        return $this->services['installer.install_database.add_default_data'] = new \phpbb\install\module\install_database\task\add_default_data(${($_ = isset($this->services['installer.helper.database']) ? $this->services['installer.helper.database'] : $this->getInstaller_Helper_DatabaseService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.container_factory']) ? $this->services['installer.helper.container_factory'] : $this->getInstaller_Helper_ContainerFactoryService()) && false ?: '_'}, ${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'}, '../');
    }

    /**
     * Gets the private 'installer.install_database.add_tables' shared service.
     *
     * @return \phpbb\install\module\install_database\task\add_tables
     */
    protected function getInstaller_InstallDatabase_AddTablesService()
    {
        return $this->services['installer.install_database.add_tables'] = new \phpbb\install\module\install_database\task\add_tables(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.database']) ? $this->services['installer.helper.database'] : $this->getInstaller_Helper_DatabaseService()) && false ?: '_'}, ${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'}, '../');
    }

    /**
     * Gets the private 'installer.install_database.create_schema_file' shared service.
     *
     * @return \phpbb\install\module\install_database\task\create_schema_file
     */
    protected function getInstaller_InstallDatabase_CreateSchemaFileService()
    {
        return $this->services['installer.install_database.create_schema_file'] = new \phpbb\install\module\install_database\task\create_schema_file(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.database']) ? $this->services['installer.helper.database'] : $this->getInstaller_Helper_DatabaseService()) && false ?: '_'}, ${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'}, '../', 'php');
    }

    /**
     * Gets the private 'installer.install_database.set_up_database' shared service.
     *
     * @return \phpbb\install\module\install_database\task\set_up_database
     */
    protected function getInstaller_InstallDatabase_SetUpDatabaseService()
    {
        return $this->services['installer.install_database.set_up_database'] = new \phpbb\install\module\install_database\task\set_up_database(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.database']) ? $this->services['installer.helper.database'] : $this->getInstaller_Helper_DatabaseService()) && false ?: '_'}, ${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, '../');
    }

    /**
     * Gets the private 'installer.install_filesystem.create_config_file' shared service.
     *
     * @return \phpbb\install\module\install_filesystem\task\create_config_file
     */
    protected function getInstaller_InstallFilesystem_CreateConfigFileService()
    {
        return $this->services['installer.install_filesystem.create_config_file'] = new \phpbb\install\module\install_filesystem\task\create_config_file(${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.database']) ? $this->services['installer.helper.database'] : $this->getInstaller_Helper_DatabaseService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, '../', 'php', []);
    }

    /**
     * Gets the private 'installer.install_finish.install_extensions' shared service.
     *
     * @return \phpbb\install\module\install_finish\task\install_extensions
     */
    protected function getInstaller_InstallFinish_InstallExtensionsService()
    {
        return $this->services['installer.install_finish.install_extensions'] = new \phpbb\install\module\install_finish\task\install_extensions(${($_ = isset($this->services['installer.helper.container_factory']) ? $this->services['installer.helper.container_factory'] : $this->getInstaller_Helper_ContainerFactoryService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, '../');
    }

    /**
     * Gets the private 'installer.install_finish.notify_user' shared service.
     *
     * @return \phpbb\install\module\install_finish\task\notify_user
     */
    protected function getInstaller_InstallFinish_NotifyUserService()
    {
        return $this->services['installer.install_finish.notify_user'] = new \phpbb\install\module\install_finish\task\notify_user(${($_ = isset($this->services['installer.helper.container_factory']) ? $this->services['installer.helper.container_factory'] : $this->getInstaller_Helper_ContainerFactoryService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, '../', 'php');
    }

    /**
     * Gets the private 'installer.install_finish.populate_migrations' shared service.
     *
     * @return \phpbb\install\module\install_finish\task\populate_migrations
     */
    protected function getInstaller_InstallFinish_PopulateMigrationsService()
    {
        return $this->services['installer.install_finish.populate_migrations'] = new \phpbb\install\module\install_finish\task\populate_migrations(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.container_factory']) ? $this->services['installer.helper.container_factory'] : $this->getInstaller_Helper_ContainerFactoryService()) && false ?: '_'});
    }

    /**
     * Gets the private 'installer.installer.install' shared service.
     *
     * @return \phpbb\install\installer
     */
    protected function getInstaller_Installer_InstallService()
    {
        $this->services['installer.installer.install'] = $instance = new \phpbb\install\installer(${($_ = isset($this->services['cache.driver']) ? $this->services['cache.driver'] : ($this->services['cache.driver'] = new \phpbb\cache\driver\file('../cache/installer/'))) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['path_helper']) ? $this->services['path_helper'] : $this->getPathHelperService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.container_factory']) ? $this->services['installer.helper.container_factory'] : $this->getInstaller_Helper_ContainerFactoryService()) && false ?: '_'});

        $instance->set_modules(${($_ = isset($this->services['installer.install.module_collection']) ? $this->services['installer.install.module_collection'] : $this->getInstaller_Install_ModuleCollectionService()) && false ?: '_'});
        $instance->set_purge_cache_before(false);

        return $instance;
    }

    /**
     * Gets the private 'installer.installer.update' shared service.
     *
     * @return \phpbb\install\installer
     */
    protected function getInstaller_Installer_UpdateService()
    {
        $this->services['installer.installer.update'] = $instance = new \phpbb\install\installer(${($_ = isset($this->services['cache.driver']) ? $this->services['cache.driver'] : ($this->services['cache.driver'] = new \phpbb\cache\driver\file('../cache/installer/'))) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['path_helper']) ? $this->services['path_helper'] : $this->getPathHelperService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.container_factory']) ? $this->services['installer.helper.container_factory'] : $this->getInstaller_Helper_ContainerFactoryService()) && false ?: '_'});

        $instance->set_modules(${($_ = isset($this->services['installer.update.module_collection']) ? $this->services['installer.update.module_collection'] : $this->getInstaller_Update_ModuleCollectionService()) && false ?: '_'});
        $instance->set_purge_cache_before(true);

        return $instance;
    }

    /**
     * Gets the private 'installer.module.data_install' shared service.
     *
     * @return \phpbb\install\module\install_data\module
     */
    protected function getInstaller_Module_DataInstallService()
    {
        $this->services['installer.module.data_install'] = $instance = new \phpbb\install\module\install_data\module(${($_ = isset($this->services['installer.module.data_install_collection']) ? $this->services['installer.module.data_install_collection'] : $this->getInstaller_Module_DataInstallCollectionService()) && false ?: '_'});

        $instance->setup(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'installer.module.data_install_collection' shared service.
     *
     * @return \phpbb\di\ordered_service_collection
     */
    protected function getInstaller_Module_DataInstallCollectionService()
    {
        $this->services['installer.module.data_install_collection'] = $instance = new \phpbb\di\ordered_service_collection($this);

        $instance->add_service_class('installer.install_data.add_bots', 'phpbb\\install\\module\\install_data\\task\\add_bots');
        $instance->add('installer.install_data.add_bots', 20);
        $instance->add_service_class('installer.install_data.add_languages', 'phpbb\\install\\module\\install_data\\task\\add_languages');
        $instance->add('installer.install_data.add_languages', 10);
        $instance->add_service_class('installer.install_data.add_modules', 'phpbb\\install\\module\\install_data\\task\\add_modules');
        $instance->add('installer.install_data.add_modules', 30);
        $instance->add_service_class('installer.install_data.create_search_index', 'phpbb\\install\\module\\install_data\\task\\create_search_index');
        $instance->add('installer.install_data.create_search_index', 40);

        return $instance;
    }

    /**
     * Gets the private 'installer.module.database_install' shared service.
     *
     * @return \phpbb\install\module\install_database\module
     */
    protected function getInstaller_Module_DatabaseInstallService()
    {
        $this->services['installer.module.database_install'] = $instance = new \phpbb\install\module\install_database\module(${($_ = isset($this->services['installer.module.install_database_collection']) ? $this->services['installer.module.install_database_collection'] : $this->getInstaller_Module_InstallDatabaseCollectionService()) && false ?: '_'});

        $instance->setup(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'installer.module.filesystem_install' shared service.
     *
     * @return \phpbb\install\module\install_filesystem\module
     */
    protected function getInstaller_Module_FilesystemInstallService()
    {
        $this->services['installer.module.filesystem_install'] = $instance = new \phpbb\install\module\install_filesystem\module(${($_ = isset($this->services['installer.module.install_filesystem_collection']) ? $this->services['installer.module.install_filesystem_collection'] : $this->getInstaller_Module_InstallFilesystemCollectionService()) && false ?: '_'});

        $instance->setup(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'installer.module.filesystem_update' shared service.
     *
     * @return \phpbb\install\module\update_filesystem\module
     */
    protected function getInstaller_Module_FilesystemUpdateService()
    {
        $this->services['installer.module.filesystem_update'] = $instance = new \phpbb\install\module\update_filesystem\module(${($_ = isset($this->services['installer.module.update_filesystem_collection']) ? $this->services['installer.module.update_filesystem_collection'] : $this->getInstaller_Module_UpdateFilesystemCollectionService()) && false ?: '_'}, true, false);

        $instance->setup(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'installer.module.finish_install' shared service.
     *
     * @return \phpbb\install\module\install_finish\module
     */
    protected function getInstaller_Module_FinishInstallService()
    {
        $this->services['installer.module.finish_install'] = $instance = new \phpbb\install\module\install_finish\module(${($_ = isset($this->services['installer.module.install_finish_collection']) ? $this->services['installer.module.install_finish_collection'] : $this->getInstaller_Module_InstallFinishCollectionService()) && false ?: '_'});

        $instance->setup(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'installer.module.install_database_collection' shared service.
     *
     * @return \phpbb\di\ordered_service_collection
     */
    protected function getInstaller_Module_InstallDatabaseCollectionService()
    {
        $this->services['installer.module.install_database_collection'] = $instance = new \phpbb\di\ordered_service_collection($this);

        $instance->add_service_class('installer.install_database.create_schema_file', 'phpbb\\install\\module\\install_database\\task\\create_schema_file');
        $instance->add('installer.install_database.create_schema_file', 10);
        $instance->add_service_class('installer.install_database.set_up_database', 'phpbb\\install\\module\\install_database\\task\\set_up_database');
        $instance->add('installer.install_database.set_up_database', 20);
        $instance->add_service_class('installer.install_database.add_tables', 'phpbb\\install\\module\\install_database\\task\\add_tables');
        $instance->add('installer.install_database.add_tables', 30);
        $instance->add_service_class('installer.install_database.add_default_data', 'phpbb\\install\\module\\install_database\\task\\add_default_data');
        $instance->add('installer.install_database.add_default_data', 40);
        $instance->add_service_class('installer.install_database.add_config_settings', 'phpbb\\install\\module\\install_database\\task\\add_config_settings');
        $instance->add('installer.install_database.add_config_settings', 50);

        return $instance;
    }

    /**
     * Gets the private 'installer.module.install_filesystem_collection' shared service.
     *
     * @return \phpbb\di\ordered_service_collection
     */
    protected function getInstaller_Module_InstallFilesystemCollectionService()
    {
        $this->services['installer.module.install_filesystem_collection'] = $instance = new \phpbb\di\ordered_service_collection($this);

        $instance->add_service_class('installer.install_filesystem.create_config_file', 'phpbb\\install\\module\\install_filesystem\\task\\create_config_file');
        $instance->add('installer.install_filesystem.create_config_file', 10);

        return $instance;
    }

    /**
     * Gets the private 'installer.module.install_finish_collection' shared service.
     *
     * @return \phpbb\di\ordered_service_collection
     */
    protected function getInstaller_Module_InstallFinishCollectionService()
    {
        $this->services['installer.module.install_finish_collection'] = $instance = new \phpbb\di\ordered_service_collection($this);

        $instance->add_service_class('installer.install_finish.populate_migrations', 'phpbb\\install\\module\\install_finish\\task\\populate_migrations');
        $instance->add('installer.install_finish.populate_migrations', 10);
        $instance->add_service_class('installer.install_finish.install_extensions', 'phpbb\\install\\module\\install_finish\\task\\install_extensions');
        $instance->add('installer.install_finish.install_extensions', 20);
        $instance->add_service_class('installer.install_finish.notify_user', 'phpbb\\install\\module\\install_finish\\task\\notify_user');
        $instance->add('installer.install_finish.notify_user', 30);

        return $instance;
    }

    /**
     * Gets the private 'installer.module.install_obtain_data_collection' shared service.
     *
     * @return \phpbb\di\ordered_service_collection
     */
    protected function getInstaller_Module_InstallObtainDataCollectionService()
    {
        $this->services['installer.module.install_obtain_data_collection'] = $instance = new \phpbb\di\ordered_service_collection($this);

        $instance->add_service_class('installer.obtain_data.obtain_admin_data', 'phpbb\\install\\module\\obtain_data\\task\\obtain_admin_data');
        $instance->add('installer.obtain_data.obtain_admin_data', 10);
        $instance->add_service_class('installer.obtain_data.obtain_board_data', 'phpbb\\install\\module\\obtain_data\\task\\obtain_board_data');
        $instance->add('installer.obtain_data.obtain_board_data', 50);
        $instance->add_service_class('installer.obtain_data.obtain_database_data', 'phpbb\\install\\module\\obtain_data\\task\\obtain_database_data');
        $instance->add('installer.obtain_data.obtain_database_data', 20);
        $instance->add_service_class('installer.obtain_data.obtain_email_data', 'phpbb\\install\\module\\obtain_data\\task\\obtain_email_data');
        $instance->add('installer.obtain_data.obtain_email_data', 40);
        $instance->add_service_class('installer.obtain_data.obtain_server_data', 'phpbb\\install\\module\\obtain_data\\task\\obtain_server_data');
        $instance->add('installer.obtain_data.obtain_server_data', 30);

        return $instance;
    }

    /**
     * Gets the private 'installer.module.install_requirements_collection' shared service.
     *
     * @return \phpbb\di\ordered_service_collection
     */
    protected function getInstaller_Module_InstallRequirementsCollectionService()
    {
        $this->services['installer.module.install_requirements_collection'] = $instance = new \phpbb\di\ordered_service_collection($this);

        $instance->add_service_class('installer.requirements.check_filesystem', 'phpbb\\install\\module\\requirements\\task\\check_filesystem');
        $instance->add('installer.requirements.check_filesystem', 10);
        $instance->add_service_class('installer.requirements.check_server_environment', 'phpbb\\install\\module\\requirements\\task\\check_server_environment');
        $instance->add('installer.requirements.check_server_environment', 20);

        return $instance;
    }

    /**
     * Gets the private 'installer.module.obtain_data_install' shared service.
     *
     * @return \phpbb\install\module\obtain_data\install_module
     */
    protected function getInstaller_Module_ObtainDataInstallService()
    {
        $this->services['installer.module.obtain_data_install'] = $instance = new \phpbb\install\module\obtain_data\install_module(${($_ = isset($this->services['installer.module.install_obtain_data_collection']) ? $this->services['installer.module.install_obtain_data_collection'] : $this->getInstaller_Module_InstallObtainDataCollectionService()) && false ?: '_'}, true, false);

        $instance->setup(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'installer.module.obtain_data_update' shared service.
     *
     * @return \phpbb\install\module\obtain_data\update_module
     */
    protected function getInstaller_Module_ObtainDataUpdateService()
    {
        $this->services['installer.module.obtain_data_update'] = $instance = new \phpbb\install\module\obtain_data\update_module(${($_ = isset($this->services['installer.module.update_obtain_data_collection']) ? $this->services['installer.module.update_obtain_data_collection'] : $this->getInstaller_Module_UpdateObtainDataCollectionService()) && false ?: '_'}, true, false);

        $instance->setup(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'installer.module.requirements_install' shared service.
     *
     * @return \phpbb\install\module\requirements\install_module
     */
    protected function getInstaller_Module_RequirementsInstallService()
    {
        $this->services['installer.module.requirements_install'] = $instance = new \phpbb\install\module\requirements\install_module(${($_ = isset($this->services['installer.module.install_requirements_collection']) ? $this->services['installer.module.install_requirements_collection'] : $this->getInstaller_Module_InstallRequirementsCollectionService()) && false ?: '_'}, true, false);

        $instance->setup(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'installer.module.requirements_update' shared service.
     *
     * @return \phpbb\install\module\requirements\update_module
     */
    protected function getInstaller_Module_RequirementsUpdateService()
    {
        $this->services['installer.module.requirements_update'] = $instance = new \phpbb\install\module\requirements\update_module(${($_ = isset($this->services['installer.module.update_requirements_collection']) ? $this->services['installer.module.update_requirements_collection'] : $this->getInstaller_Module_UpdateRequirementsCollectionService()) && false ?: '_'}, true, false);

        $instance->setup(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'installer.module.update_database' shared service.
     *
     * @return \phpbb\install\module\update_database\module
     */
    protected function getInstaller_Module_UpdateDatabaseService()
    {
        $this->services['installer.module.update_database'] = $instance = new \phpbb\install\module\update_database\module(${($_ = isset($this->services['installer.module.update_database_collection']) ? $this->services['installer.module.update_database_collection'] : $this->getInstaller_Module_UpdateDatabaseCollectionService()) && false ?: '_'}, true, false);

        $instance->setup(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'installer.module.update_database_collection' shared service.
     *
     * @return \phpbb\di\ordered_service_collection
     */
    protected function getInstaller_Module_UpdateDatabaseCollectionService()
    {
        $this->services['installer.module.update_database_collection'] = $instance = new \phpbb\di\ordered_service_collection($this);

        $instance->add_service_class('installer.update_database.update_task', 'phpbb\\install\\module\\update_database\\task\\update');
        $instance->add('installer.update_database.update_task', 10);
        $instance->add_service_class('installer.update_database.update_extensions', 'phpbb\\install\\module\\update_database\\task\\update_extensions');
        $instance->add('installer.update_database.update_extensions', 20);

        return $instance;
    }

    /**
     * Gets the private 'installer.module.update_filesystem_collection' shared service.
     *
     * @return \phpbb\di\ordered_service_collection
     */
    protected function getInstaller_Module_UpdateFilesystemCollectionService()
    {
        $this->services['installer.module.update_filesystem_collection'] = $instance = new \phpbb\di\ordered_service_collection($this);

        $instance->add_service_class('installer.update_filesystem.check_task', 'phpbb\\install\\module\\update_filesystem\\task\\file_check');
        $instance->add('installer.update_filesystem.check_task', 10);
        $instance->add_service_class('installer.update_filesystem.diff_files', 'phpbb\\install\\module\\update_filesystem\\task\\diff_files');
        $instance->add('installer.update_filesystem.diff_files', 20);
        $instance->add_service_class('installer.update_filesystem.show_file_status', 'phpbb\\install\\module\\update_filesystem\\task\\show_file_status');
        $instance->add('installer.update_filesystem.show_file_status', 30);
        $instance->add_service_class('installer.update_filesystem.update_files', 'phpbb\\install\\module\\update_filesystem\\task\\update_files');
        $instance->add('installer.update_filesystem.update_files', 40);
        $instance->add_service_class('installer.update_filesystem.download_updated_files', 'phpbb\\install\\module\\update_filesystem\\task\\download_updated_files');
        $instance->add('installer.update_filesystem.download_updated_files', 50);

        return $instance;
    }

    /**
     * Gets the private 'installer.module.update_obtain_data_collection' shared service.
     *
     * @return \phpbb\di\ordered_service_collection
     */
    protected function getInstaller_Module_UpdateObtainDataCollectionService()
    {
        $this->services['installer.module.update_obtain_data_collection'] = $instance = new \phpbb\di\ordered_service_collection($this);

        $instance->add_service_class('installer.obtain_data.update_options', 'phpbb\\install\\module\\obtain_data\\task\\obtain_update_settings');
        $instance->add('installer.obtain_data.update_options', 10);
        $instance->add_service_class('installer.obtain_data.file_updater_method', 'phpbb\\install\\module\\obtain_data\\task\\obtain_file_updater_method');
        $instance->add('installer.obtain_data.file_updater_method', 20);
        $instance->add_service_class('installer.obtain_data.update_files', 'phpbb\\install\\module\\obtain_data\\task\\obtain_update_files');
        $instance->add('installer.obtain_data.update_files', 30);
        $instance->add_service_class('installer.obtain_data.update_ftp_settings', 'phpbb\\install\\module\\obtain_data\\task\\obtain_update_ftp_data');
        $instance->add('installer.obtain_data.update_ftp_settings', 40);

        return $instance;
    }

    /**
     * Gets the private 'installer.module.update_requirements_collection' shared service.
     *
     * @return \phpbb\di\ordered_service_collection
     */
    protected function getInstaller_Module_UpdateRequirementsCollectionService()
    {
        $this->services['installer.module.update_requirements_collection'] = $instance = new \phpbb\di\ordered_service_collection($this);

        $instance->add_service_class('installer.requirements.check_server_environment', 'phpbb\\install\\module\\requirements\\task\\check_server_environment');
        $instance->add('installer.requirements.check_server_environment', 20);
        $instance->add_service_class('installer.requirements.check_filesystem_update', 'phpbb\\install\\module\\requirements\\task\\check_filesystem');
        $instance->add('installer.requirements.check_filesystem_update', 10);
        $instance->add_service_class('installer.requirements.update_requirements', 'phpbb\\install\\module\\requirements\\task\\check_update');
        $instance->add('installer.requirements.update_requirements', 30);

        return $instance;
    }

    /**
     * Gets the private 'installer.navigation.convertor_navigation' service.
     *
     * @return \phpbb\install\helper\navigation\convertor_navigation
     */
    protected function getInstaller_Navigation_ConvertorNavigationService()
    {
        return new \phpbb\install\helper\navigation\convertor_navigation(${($_ = isset($this->services['installer.helper.install_helper']) ? $this->services['installer.helper.install_helper'] : ($this->services['installer.helper.install_helper'] = new \phpbb\install\helper\install_helper('../', 'php'))) && false ?: '_'});
    }

    /**
     * Gets the private 'installer.navigation.install_navigation' service.
     *
     * @return \phpbb\install\helper\navigation\install_navigation
     */
    protected function getInstaller_Navigation_InstallNavigationService()
    {
        return new \phpbb\install\helper\navigation\install_navigation(${($_ = isset($this->services['installer.helper.install_helper']) ? $this->services['installer.helper.install_helper'] : ($this->services['installer.helper.install_helper'] = new \phpbb\install\helper\install_helper('../', 'php'))) && false ?: '_'});
    }

    /**
     * Gets the private 'installer.navigation.main_navigation' service.
     *
     * @return \phpbb\install\helper\navigation\main_navigation
     */
    protected function getInstaller_Navigation_MainNavigationService()
    {
        return new \phpbb\install\helper\navigation\main_navigation();
    }

    /**
     * Gets the private 'installer.navigation.provider' shared service.
     *
     * @return \phpbb\install\helper\navigation\navigation_provider
     */
    protected function getInstaller_Navigation_ProviderService()
    {
        return $this->services['installer.navigation.provider'] = new \phpbb\install\helper\navigation\navigation_provider(${($_ = isset($this->services['installer.navigation.service_collection']) ? $this->services['installer.navigation.service_collection'] : $this->getInstaller_Navigation_ServiceCollectionService()) && false ?: '_'});
    }

    /**
     * Gets the private 'installer.navigation.service_collection' shared service.
     *
     * @return \phpbb\di\service_collection
     */
    protected function getInstaller_Navigation_ServiceCollectionService()
    {
        $this->services['installer.navigation.service_collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('installer.navigation.main_navigation');
        $instance->add('installer.navigation.install_navigation');
        $instance->add('installer.navigation.update_navigation');
        $instance->add('installer.navigation.convertor_navigation');

        return $instance;
    }

    /**
     * Gets the private 'installer.navigation.update_navigation' service.
     *
     * @return \phpbb\install\helper\navigation\update_navigation
     */
    protected function getInstaller_Navigation_UpdateNavigationService()
    {
        return new \phpbb\install\helper\navigation\update_navigation(${($_ = isset($this->services['installer.helper.install_helper']) ? $this->services['installer.helper.install_helper'] : ($this->services['installer.helper.install_helper'] = new \phpbb\install\helper\install_helper('../', 'php'))) && false ?: '_'});
    }

    /**
     * Gets the private 'installer.obtain_data.file_updater_method' shared service.
     *
     * @return \phpbb\install\module\obtain_data\task\obtain_file_updater_method
     */
    protected function getInstaller_ObtainData_FileUpdaterMethodService()
    {
        return $this->services['installer.obtain_data.file_updater_method'] = new \phpbb\install\module\obtain_data\task\obtain_file_updater_method(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'});
    }

    /**
     * Gets the private 'installer.obtain_data.obtain_admin_data' shared service.
     *
     * @return \phpbb\install\module\obtain_data\task\obtain_admin_data
     */
    protected function getInstaller_ObtainData_ObtainAdminDataService()
    {
        return $this->services['installer.obtain_data.obtain_admin_data'] = new \phpbb\install\module\obtain_data\task\obtain_admin_data(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'});
    }

    /**
     * Gets the private 'installer.obtain_data.obtain_board_data' shared service.
     *
     * @return \phpbb\install\module\obtain_data\task\obtain_board_data
     */
    protected function getInstaller_ObtainData_ObtainBoardDataService()
    {
        return $this->services['installer.obtain_data.obtain_board_data'] = new \phpbb\install\module\obtain_data\task\obtain_board_data(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, ${($_ = isset($this->services['language.helper.language_file']) ? $this->services['language.helper.language_file'] : ($this->services['language.helper.language_file'] = new \phpbb\language\language_file_helper('../'))) && false ?: '_'});
    }

    /**
     * Gets the private 'installer.obtain_data.obtain_database_data' shared service.
     *
     * @return \phpbb\install\module\obtain_data\task\obtain_database_data
     */
    protected function getInstaller_ObtainData_ObtainDatabaseDataService()
    {
        return $this->services['installer.obtain_data.obtain_database_data'] = new \phpbb\install\module\obtain_data\task\obtain_database_data(${($_ = isset($this->services['installer.helper.database']) ? $this->services['installer.helper.database'] : $this->getInstaller_Helper_DatabaseService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'});
    }

    /**
     * Gets the private 'installer.obtain_data.obtain_email_data' shared service.
     *
     * @return \phpbb\install\module\obtain_data\task\obtain_email_data
     */
    protected function getInstaller_ObtainData_ObtainEmailDataService()
    {
        return $this->services['installer.obtain_data.obtain_email_data'] = new \phpbb\install\module\obtain_data\task\obtain_email_data(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'});
    }

    /**
     * Gets the private 'installer.obtain_data.obtain_server_data' shared service.
     *
     * @return \phpbb\install\module\obtain_data\task\obtain_server_data
     */
    protected function getInstaller_ObtainData_ObtainServerDataService()
    {
        return $this->services['installer.obtain_data.obtain_server_data'] = new \phpbb\install\module\obtain_data\task\obtain_server_data(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'});
    }

    /**
     * Gets the private 'installer.obtain_data.update_files' shared service.
     *
     * @return \phpbb\install\module\obtain_data\task\obtain_update_files
     */
    protected function getInstaller_ObtainData_UpdateFilesService()
    {
        return $this->services['installer.obtain_data.update_files'] = new \phpbb\install\module\obtain_data\task\obtain_update_files(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, '../', 'php');
    }

    /**
     * Gets the private 'installer.obtain_data.update_ftp_settings' shared service.
     *
     * @return \phpbb\install\module\obtain_data\task\obtain_update_ftp_data
     */
    protected function getInstaller_ObtainData_UpdateFtpSettingsService()
    {
        return $this->services['installer.obtain_data.update_ftp_settings'] = new \phpbb\install\module\obtain_data\task\obtain_update_ftp_data(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.update_helper']) ? $this->services['installer.helper.update_helper'] : ($this->services['installer.helper.update_helper'] = new \phpbb\install\helper\update_helper('../'))) && false ?: '_'}, 'php');
    }

    /**
     * Gets the private 'installer.obtain_data.update_options' shared service.
     *
     * @return \phpbb\install\module\obtain_data\task\obtain_update_settings
     */
    protected function getInstaller_ObtainData_UpdateOptionsService()
    {
        return $this->services['installer.obtain_data.update_options'] = new \phpbb\install\module\obtain_data\task\obtain_update_settings(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'});
    }

    /**
     * Gets the private 'installer.requirements.check_filesystem' shared service.
     *
     * @return \phpbb\install\module\requirements\task\check_filesystem
     */
    protected function getInstaller_Requirements_CheckFilesystemService()
    {
        return $this->services['installer.requirements.check_filesystem'] = new \phpbb\install\module\requirements\task\check_filesystem(${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, '../', 'php');
    }

    /**
     * Gets the private 'installer.requirements.check_filesystem_update' shared service.
     *
     * @return \phpbb\install\module\requirements\task\check_filesystem
     */
    protected function getInstaller_Requirements_CheckFilesystemUpdateService()
    {
        return $this->services['installer.requirements.check_filesystem_update'] = new \phpbb\install\module\requirements\task\check_filesystem(${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, '../', 'php', false);
    }

    /**
     * Gets the private 'installer.requirements.check_server_environment' shared service.
     *
     * @return \phpbb\install\module\requirements\task\check_server_environment
     */
    protected function getInstaller_Requirements_CheckServerEnvironmentService()
    {
        return $this->services['installer.requirements.check_server_environment'] = new \phpbb\install\module\requirements\task\check_server_environment(${($_ = isset($this->services['installer.helper.database']) ? $this->services['installer.helper.database'] : $this->getInstaller_Helper_DatabaseService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'});
    }

    /**
     * Gets the private 'installer.requirements.update_requirements' shared service.
     *
     * @return \phpbb\install\module\requirements\task\check_update
     */
    protected function getInstaller_Requirements_UpdateRequirementsService()
    {
        return $this->services['installer.requirements.update_requirements'] = new \phpbb\install\module\requirements\task\check_update(${($_ = isset($this->services['installer.helper.container_factory']) ? $this->services['installer.helper.container_factory'] : $this->getInstaller_Helper_ContainerFactoryService()) && false ?: '_'}, ${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.update_helper']) ? $this->services['installer.helper.update_helper'] : ($this->services['installer.helper.update_helper'] = new \phpbb\install\helper\update_helper('../'))) && false ?: '_'}, '../', 'php');
    }

    /**
     * Gets the private 'installer.update.module_collection' shared service.
     *
     * @return \phpbb\di\ordered_service_collection
     */
    protected function getInstaller_Update_ModuleCollectionService()
    {
        $this->services['installer.update.module_collection'] = $instance = new \phpbb\di\ordered_service_collection($this);

        $instance->add('installer.module.update_database', 40);
        $instance->add('installer.module.filesystem_update', 30);
        $instance->add('installer.module.obtain_data_update', 20);
        $instance->add('installer.module.requirements_update', 10);

        return $instance;
    }

    /**
     * Gets the private 'installer.update_database.update_extensions' shared service.
     *
     * @return \phpbb\install\module\update_database\task\update_extensions
     */
    protected function getInstaller_UpdateDatabase_UpdateExtensionsService()
    {
        return $this->services['installer.update_database.update_extensions'] = new \phpbb\install\module\update_database\task\update_extensions(${($_ = isset($this->services['installer.helper.container_factory']) ? $this->services['installer.helper.container_factory'] : $this->getInstaller_Helper_ContainerFactoryService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.update_helper']) ? $this->services['installer.helper.update_helper'] : ($this->services['installer.helper.update_helper'] = new \phpbb\install\helper\update_helper('../'))) && false ?: '_'}, '../');
    }

    /**
     * Gets the private 'installer.update_database.update_task' shared service.
     *
     * @return \phpbb\install\module\update_database\task\update
     */
    protected function getInstaller_UpdateDatabase_UpdateTaskService()
    {
        return $this->services['installer.update_database.update_task'] = new \phpbb\install\module\update_database\task\update(${($_ = isset($this->services['installer.helper.container_factory']) ? $this->services['installer.helper.container_factory'] : $this->getInstaller_Helper_ContainerFactoryService()) && false ?: '_'}, ${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, ${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'}, '../');
    }

    /**
     * Gets the private 'installer.update_filesystem.check_task' shared service.
     *
     * @return \phpbb\install\module\update_filesystem\task\file_check
     */
    protected function getInstaller_UpdateFilesystem_CheckTaskService()
    {
        return $this->services['installer.update_filesystem.check_task'] = new \phpbb\install\module\update_filesystem\task\file_check(${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.update_helper']) ? $this->services['installer.helper.update_helper'] : ($this->services['installer.helper.update_helper'] = new \phpbb\install\helper\update_helper('../'))) && false ?: '_'}, '../');
    }

    /**
     * Gets the private 'installer.update_filesystem.diff_files' shared service.
     *
     * @return \phpbb\install\module\update_filesystem\task\diff_files
     */
    protected function getInstaller_UpdateFilesystem_DiffFilesService()
    {
        return $this->services['installer.update_filesystem.diff_files'] = new \phpbb\install\module\update_filesystem\task\diff_files(${($_ = isset($this->services['installer.helper.container_factory']) ? $this->services['installer.helper.container_factory'] : $this->getInstaller_Helper_ContainerFactoryService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.update_helper']) ? $this->services['installer.helper.update_helper'] : ($this->services['installer.helper.update_helper'] = new \phpbb\install\helper\update_helper('../'))) && false ?: '_'}, '../', 'php');
    }

    /**
     * Gets the private 'installer.update_filesystem.download_updated_files' shared service.
     *
     * @return \phpbb\install\module\update_filesystem\task\download_updated_files
     */
    protected function getInstaller_UpdateFilesystem_DownloadUpdatedFilesService()
    {
        return $this->services['installer.update_filesystem.download_updated_files'] = new \phpbb\install\module\update_filesystem\task\download_updated_files(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, ${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'});
    }

    /**
     * Gets the private 'installer.update_filesystem.show_file_status' shared service.
     *
     * @return \phpbb\install\module\update_filesystem\task\show_file_status
     */
    protected function getInstaller_UpdateFilesystem_ShowFileStatusService()
    {
        return $this->services['installer.update_filesystem.show_file_status'] = new \phpbb\install\module\update_filesystem\task\show_file_status(${($_ = isset($this->services['installer.helper.container_factory']) ? $this->services['installer.helper.container_factory'] : $this->getInstaller_Helper_ContainerFactoryService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, ${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'}, ${($_ = isset($this->services['installer.file_updater.factory']) ? $this->services['installer.file_updater.factory'] : $this->getInstaller_FileUpdater_FactoryService()) && false ?: '_'});
    }

    /**
     * Gets the private 'installer.update_filesystem.update_files' shared service.
     *
     * @return \phpbb\install\module\update_filesystem\task\update_files
     */
    protected function getInstaller_UpdateFilesystem_UpdateFilesService()
    {
        return $this->services['installer.update_filesystem.update_files'] = new \phpbb\install\module\update_filesystem\task\update_files(${($_ = isset($this->services['installer.helper.container_factory']) ? $this->services['installer.helper.container_factory'] : $this->getInstaller_Helper_ContainerFactoryService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler']) ? $this->services['installer.helper.iohandler'] : $this->getInstaller_Helper_IohandlerService()) && false ?: '_'}, ${($_ = isset($this->services['installer.file_updater.factory']) ? $this->services['installer.file_updater.factory'] : $this->getInstaller_FileUpdater_FactoryService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.update_helper']) ? $this->services['installer.helper.update_helper'] : ($this->services['installer.helper.update_helper'] = new \phpbb\install\helper\update_helper('../'))) && false ?: '_'}, '../');
    }

    /**
     * Gets the private 'kernel_exception_subscriber' shared service.
     *
     * @return \phpbb\install\event\kernel_exception_subscriber
     */
    protected function getKernelExceptionSubscriberService()
    {
        return $this->services['kernel_exception_subscriber'] = new \phpbb\install\event\kernel_exception_subscriber(${($_ = isset($this->services['phpbb.installer.controller.helper']) ? $this->services['phpbb.installer.controller.helper'] : $this->getPhpbb_Installer_Controller_HelperService()) && false ?: '_'}, ${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'}, ${($_ = isset($this->services['template']) ? $this->services['template'] : $this->getTemplateService()) && false ?: '_'});
    }

    /**
     * Gets the private 'kernel_terminate_subscriber' shared service.
     *
     * @return \phpbb\event\kernel_terminate_subscriber
     */
    protected function getKernelTerminateSubscriberService()
    {
        return $this->services['kernel_terminate_subscriber'] = new \phpbb\event\kernel_terminate_subscriber();
    }

    /**
     * Gets the private 'language' shared service.
     *
     * @return \phpbb\language\language
     */
    protected function getLanguageService()
    {
        return $this->services['language'] = new \phpbb\language\language(${($_ = isset($this->services['language.loader']) ? $this->services['language.loader'] : ($this->services['language.loader'] = new \phpbb\language\language_file_loader('../', 'php'))) && false ?: '_'});
    }

    /**
     * Gets the private 'language.helper.language_file' shared service.
     *
     * @return \phpbb\language\language_file_helper
     */
    protected function getLanguage_Helper_LanguageFileService()
    {
        return $this->services['language.helper.language_file'] = new \phpbb\language\language_file_helper('../');
    }

    /**
     * Gets the private 'language.loader' shared service.
     *
     * @return \phpbb\language\language_file_loader
     */
    protected function getLanguage_LoaderService()
    {
        return $this->services['language.loader'] = new \phpbb\language\language_file_loader('../', 'php');
    }

    /**
     * Gets the private 'path_helper' shared service.
     *
     * @return \phpbb\path_helper
     */
    protected function getPathHelperService()
    {
        return $this->services['path_helper'] = new \phpbb\path_helper(${($_ = isset($this->services['symfony_request']) ? $this->services['symfony_request'] : $this->getSymfonyRequestService()) && false ?: '_'}, ${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'}, ${($_ = isset($this->services['request']) ? $this->services['request'] : ($this->services['request'] = new \phpbb\request\request(NULL, true))) && false ?: '_'}, '../', 'php');
    }

    /**
     * Gets the private 'php_ini' shared service.
     *
     * @return \bantu\IniGetWrapper\IniGetWrapper
     */
    protected function getPhpIniService()
    {
        return $this->services['php_ini'] = new \bantu\IniGetWrapper\IniGetWrapper();
    }

    /**
     * Gets the private 'phpbb.installer.controller.convert' shared service.
     *
     * @return \phpbb\convert\controller\convertor
     */
    protected function getPhpbb_Installer_Controller_ConvertService()
    {
        return $this->services['phpbb.installer.controller.convert'] = new \phpbb\convert\controller\convertor(${($_ = isset($this->services['cache.driver']) ? $this->services['cache.driver'] : ($this->services['cache.driver'] = new \phpbb\cache\driver\file('../cache/installer/'))) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.container_factory']) ? $this->services['installer.helper.container_factory'] : $this->getInstaller_Helper_ContainerFactoryService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.database']) ? $this->services['installer.helper.database'] : $this->getInstaller_Helper_DatabaseService()) && false ?: '_'}, ${($_ = isset($this->services['phpbb.installer.controller.helper']) ? $this->services['phpbb.installer.controller.helper'] : $this->getPhpbb_Installer_Controller_HelperService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.install_helper']) ? $this->services['installer.helper.install_helper'] : ($this->services['installer.helper.install_helper'] = new \phpbb\install\helper\install_helper('../', 'php'))) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler_factory']) ? $this->services['installer.helper.iohandler_factory'] : ($this->services['installer.helper.iohandler_factory'] = new \phpbb\install\helper\iohandler\factory($this))) && false ?: '_'}, ${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'}, ${($_ = isset($this->services['installer.navigation.provider']) ? $this->services['installer.navigation.provider'] : $this->getInstaller_Navigation_ProviderService()) && false ?: '_'}, ${($_ = isset($this->services['request']) ? $this->services['request'] : ($this->services['request'] = new \phpbb\request\request(NULL, true))) && false ?: '_'}, ${($_ = isset($this->services['template']) ? $this->services['template'] : $this->getTemplateService()) && false ?: '_'}, '../', 'php');
    }

    /**
     * Gets the private 'phpbb.installer.controller.file_downloader' shared service.
     *
     * @return \phpbb\install\controller\archive_download
     */
    protected function getPhpbb_Installer_Controller_FileDownloaderService()
    {
        return $this->services['phpbb.installer.controller.file_downloader'] = new \phpbb\install\controller\archive_download(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'});
    }

    /**
     * Gets the private 'phpbb.installer.controller.helper' shared service.
     *
     * @return \phpbb\install\controller\helper
     */
    protected function getPhpbb_Installer_Controller_HelperService()
    {
        return $this->services['phpbb.installer.controller.helper'] = new \phpbb\install\controller\helper(${($_ = isset($this->services['installer.helper.config']) ? $this->services['installer.helper.config'] : $this->getInstaller_Helper_ConfigService()) && false ?: '_'}, ${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'}, ${($_ = isset($this->services['language.helper.language_file']) ? $this->services['language.helper.language_file'] : ($this->services['language.helper.language_file'] = new \phpbb\language\language_file_helper('../'))) && false ?: '_'}, ${($_ = isset($this->services['installer.navigation.provider']) ? $this->services['installer.navigation.provider'] : $this->getInstaller_Navigation_ProviderService()) && false ?: '_'}, ${($_ = isset($this->services['template']) ? $this->services['template'] : $this->getTemplateService()) && false ?: '_'}, ${($_ = isset($this->services['path_helper']) ? $this->services['path_helper'] : $this->getPathHelperService()) && false ?: '_'}, ${($_ = isset($this->services['request']) ? $this->services['request'] : ($this->services['request'] = new \phpbb\request\request(NULL, true))) && false ?: '_'}, ${($_ = isset($this->services['symfony_request']) ? $this->services['symfony_request'] : $this->getSymfonyRequestService()) && false ?: '_'}, ${($_ = isset($this->services['router']) ? $this->services['router'] : $this->getRouterService()) && false ?: '_'}, '../');
    }

    /**
     * Gets the private 'phpbb.installer.controller.install' shared service.
     *
     * @return \phpbb\install\controller\install
     */
    protected function getPhpbb_Installer_Controller_InstallService()
    {
        return $this->services['phpbb.installer.controller.install'] = new \phpbb\install\controller\install(${($_ = isset($this->services['phpbb.installer.controller.helper']) ? $this->services['phpbb.installer.controller.helper'] : $this->getPhpbb_Installer_Controller_HelperService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler_factory']) ? $this->services['installer.helper.iohandler_factory'] : ($this->services['installer.helper.iohandler_factory'] = new \phpbb\install\helper\iohandler\factory($this))) && false ?: '_'}, ${($_ = isset($this->services['installer.navigation.provider']) ? $this->services['installer.navigation.provider'] : $this->getInstaller_Navigation_ProviderService()) && false ?: '_'}, ${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'}, ${($_ = isset($this->services['template']) ? $this->services['template'] : $this->getTemplateService()) && false ?: '_'}, ${($_ = isset($this->services['request']) ? $this->services['request'] : ($this->services['request'] = new \phpbb\request\request(NULL, true))) && false ?: '_'}, ${($_ = isset($this->services['installer.installer.install']) ? $this->services['installer.installer.install'] : $this->getInstaller_Installer_InstallService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.install_helper']) ? $this->services['installer.helper.install_helper'] : ($this->services['installer.helper.install_helper'] = new \phpbb\install\helper\install_helper('../', 'php'))) && false ?: '_'});
    }

    /**
     * Gets the private 'phpbb.installer.controller.status' shared service.
     *
     * @return \phpbb\install\controller\timeout_check
     */
    protected function getPhpbb_Installer_Controller_StatusService()
    {
        return $this->services['phpbb.installer.controller.status'] = new \phpbb\install\controller\timeout_check(${($_ = isset($this->services['phpbb.installer.controller.helper']) ? $this->services['phpbb.installer.controller.helper'] : $this->getPhpbb_Installer_Controller_HelperService()) && false ?: '_'}, '../');
    }

    /**
     * Gets the private 'phpbb.installer.controller.update' shared service.
     *
     * @return \phpbb\install\controller\update
     */
    protected function getPhpbb_Installer_Controller_UpdateService()
    {
        return $this->services['phpbb.installer.controller.update'] = new \phpbb\install\controller\update(${($_ = isset($this->services['phpbb.installer.controller.helper']) ? $this->services['phpbb.installer.controller.helper'] : $this->getPhpbb_Installer_Controller_HelperService()) && false ?: '_'}, ${($_ = isset($this->services['installer.installer.update']) ? $this->services['installer.installer.update'] : $this->getInstaller_Installer_UpdateService()) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.install_helper']) ? $this->services['installer.helper.install_helper'] : ($this->services['installer.helper.install_helper'] = new \phpbb\install\helper\install_helper('../', 'php'))) && false ?: '_'}, ${($_ = isset($this->services['installer.helper.iohandler_factory']) ? $this->services['installer.helper.iohandler_factory'] : ($this->services['installer.helper.iohandler_factory'] = new \phpbb\install\helper\iohandler\factory($this))) && false ?: '_'}, ${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'}, ${($_ = isset($this->services['installer.navigation.provider']) ? $this->services['installer.navigation.provider'] : $this->getInstaller_Navigation_ProviderService()) && false ?: '_'}, ${($_ = isset($this->services['request']) ? $this->services['request'] : ($this->services['request'] = new \phpbb\request\request(NULL, true))) && false ?: '_'}, ${($_ = isset($this->services['template']) ? $this->services['template'] : $this->getTemplateService()) && false ?: '_'});
    }

    /**
     * Gets the private 'phpbb.installer.controller.welcome' shared service.
     *
     * @return \phpbb\install\controller\installer_index
     */
    protected function getPhpbb_Installer_Controller_WelcomeService()
    {
        return $this->services['phpbb.installer.controller.welcome'] = new \phpbb\install\controller\installer_index(${($_ = isset($this->services['phpbb.installer.controller.helper']) ? $this->services['phpbb.installer.controller.helper'] : $this->getPhpbb_Installer_Controller_HelperService()) && false ?: '_'}, ${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'}, ${($_ = isset($this->services['template']) ? $this->services['template'] : $this->getTemplateService()) && false ?: '_'}, '../');
    }

    /**
     * Gets the private 'request' shared service.
     *
     * @return \phpbb\request\request
     */
    protected function getRequestService()
    {
        return $this->services['request'] = new \phpbb\request\request(NULL, true);
    }

    /**
     * Gets the private 'request_stack' shared service.
     *
     * @return \Symfony\Component\HttpFoundation\RequestStack
     */
    protected function getRequestStackService()
    {
        return $this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack();
    }

    /**
     * Gets the private 'router' shared service.
     *
     * @return \phpbb\routing\router
     */
    protected function getRouterService()
    {
        return $this->services['router'] = new \phpbb\routing\router($this, ${($_ = isset($this->services['routing.chained_resources_locator']) ? $this->services['routing.chained_resources_locator'] : $this->getRouting_ChainedResourcesLocatorService()) && false ?: '_'}, ${($_ = isset($this->services['routing.delegated_loader']) ? $this->services['routing.delegated_loader'] : $this->getRouting_DelegatedLoaderService()) && false ?: '_'}, 'php', '../cache/installer/');
    }

    /**
     * Gets the private 'router.listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\RouterListener
     */
    protected function getRouter_ListenerService()
    {
        return $this->services['router.listener'] = new \Symfony\Component\HttpKernel\EventListener\RouterListener(${($_ = isset($this->services['router']) ? $this->services['router'] : $this->getRouterService()) && false ?: '_'}, ${($_ = isset($this->services['request_stack']) ? $this->services['request_stack'] : ($this->services['request_stack'] = new \Symfony\Component\HttpFoundation\RequestStack())) && false ?: '_'});
    }

    /**
     * Gets the private 'routing.chained_resources_locator' shared service.
     *
     * @return \phpbb\routing\resources_locator\chained_resources_locator
     */
    protected function getRouting_ChainedResourcesLocatorService()
    {
        return $this->services['routing.chained_resources_locator'] = new \phpbb\routing\resources_locator\chained_resources_locator(${($_ = isset($this->services['routing.resources_locator.collection']) ? $this->services['routing.resources_locator.collection'] : $this->getRouting_ResourcesLocator_CollectionService()) && false ?: '_'});
    }

    /**
     * Gets the private 'routing.delegated_loader' shared service.
     *
     * @return \Symfony\Component\Config\Loader\DelegatingLoader
     */
    protected function getRouting_DelegatedLoaderService()
    {
        return $this->services['routing.delegated_loader'] = new \Symfony\Component\Config\Loader\DelegatingLoader(${($_ = isset($this->services['routing.resolver']) ? $this->services['routing.resolver'] : $this->getRouting_ResolverService()) && false ?: '_'});
    }

    /**
     * Gets the private 'routing.helper' shared service.
     *
     * @return \phpbb\routing\helper
     */
    protected function getRouting_HelperService()
    {
        return $this->services['routing.helper'] = new \phpbb\routing\helper(${($_ = isset($this->services['config']) ? $this->services['config'] : ($this->services['config'] = new \phpbb\config\config(['rand_seed' => 'installer_seed', 'rand_seed_last_update' => 0]))) && false ?: '_'}, ${($_ = isset($this->services['router']) ? $this->services['router'] : $this->getRouterService()) && false ?: '_'}, ${($_ = isset($this->services['symfony_request']) ? $this->services['symfony_request'] : $this->getSymfonyRequestService()) && false ?: '_'}, ${($_ = isset($this->services['request']) ? $this->services['request'] : ($this->services['request'] = new \phpbb\request\request(NULL, true))) && false ?: '_'}, ${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'}, '../', 'php');
    }

    /**
     * Gets the private 'routing.loader.collection' shared service.
     *
     * @return \phpbb\di\service_collection
     */
    protected function getRouting_Loader_CollectionService()
    {
        $this->services['routing.loader.collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('routing.loader.yaml');

        return $instance;
    }

    /**
     * Gets the private 'routing.loader.yaml' shared service.
     *
     * @return \Symfony\Component\Routing\Loader\YamlFileLoader
     */
    protected function getRouting_Loader_YamlService()
    {
        return $this->services['routing.loader.yaml'] = new \Symfony\Component\Routing\Loader\YamlFileLoader(${($_ = isset($this->services['file_locator']) ? $this->services['file_locator'] : $this->getFileLocatorService()) && false ?: '_'});
    }

    /**
     * Gets the private 'routing.resolver' shared service.
     *
     * @return \phpbb\routing\loader_resolver
     */
    protected function getRouting_ResolverService()
    {
        return $this->services['routing.resolver'] = new \phpbb\routing\loader_resolver(${($_ = isset($this->services['routing.loader.collection']) ? $this->services['routing.loader.collection'] : $this->getRouting_Loader_CollectionService()) && false ?: '_'});
    }

    /**
     * Gets the private 'routing.resources_locator.collection' shared service.
     *
     * @return \phpbb\di\service_collection
     */
    protected function getRouting_ResourcesLocator_CollectionService()
    {
        $this->services['routing.resources_locator.collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('routing.resources_locator.default');

        return $instance;
    }

    /**
     * Gets the private 'routing.resources_locator.default' shared service.
     *
     * @return \phpbb\routing\resources_locator\installer_resources_locator
     */
    protected function getRouting_ResourcesLocator_DefaultService()
    {
        return $this->services['routing.resources_locator.default'] = new \phpbb\routing\resources_locator\installer_resources_locator(${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'}, '../', 'installer');
    }

    /**
     * Gets the private 'symfony_request' shared service.
     *
     * @return \phpbb\symfony_request
     */
    protected function getSymfonyRequestService()
    {
        return $this->services['symfony_request'] = new \phpbb\symfony_request(${($_ = isset($this->services['request']) ? $this->services['request'] : ($this->services['request'] = new \phpbb\request\request(NULL, true))) && false ?: '_'});
    }

    /**
     * Gets the private 'symfony_response_listener' shared service.
     *
     * @return \Symfony\Component\HttpKernel\EventListener\ResponseListener
     */
    protected function getSymfonyResponseListenerService()
    {
        return $this->services['symfony_response_listener'] = new \Symfony\Component\HttpKernel\EventListener\ResponseListener('UTF-8');
    }

    /**
     * Gets the private 'template' shared service.
     *
     * @return \phpbb\template\twig\twig
     */
    protected function getTemplateService()
    {
        return $this->services['template'] = new \phpbb\template\twig\twig(${($_ = isset($this->services['path_helper']) ? $this->services['path_helper'] : $this->getPathHelperService()) && false ?: '_'}, ${($_ = isset($this->services['config']) ? $this->services['config'] : ($this->services['config'] = new \phpbb\config\config(['rand_seed' => 'installer_seed', 'rand_seed_last_update' => 0]))) && false ?: '_'}, ${($_ = isset($this->services['template_context']) ? $this->services['template_context'] : ($this->services['template_context'] = new \phpbb\template\context())) && false ?: '_'}, ${($_ = isset($this->services['template.twig.environment']) ? $this->services['template.twig.environment'] : $this->getTemplate_Twig_EnvironmentService()) && false ?: '_'}, '../cache/installer/twig/', NULL, ${($_ = isset($this->services['template.twig.extensions.collection']) ? $this->services['template.twig.extensions.collection'] : $this->getTemplate_Twig_Extensions_CollectionService()) && false ?: '_'});
    }

    /**
     * Gets the private 'template.twig.environment' shared service.
     *
     * @return \phpbb\template\twig\environment
     */
    protected function getTemplate_Twig_EnvironmentService()
    {
        $this->services['template.twig.environment'] = $instance = new \phpbb\template\twig\environment(${($_ = isset($this->services['config']) ? $this->services['config'] : ($this->services['config'] = new \phpbb\config\config(['rand_seed' => 'installer_seed', 'rand_seed_last_update' => 0]))) && false ?: '_'}, ${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'}, ${($_ = isset($this->services['path_helper']) ? $this->services['path_helper'] : $this->getPathHelperService()) && false ?: '_'}, '../cache/installer/twig/', NULL, ${($_ = isset($this->services['template.twig.loader']) ? $this->services['template.twig.loader'] : $this->getTemplate_Twig_LoaderService()) && false ?: '_'}, NULL, []);

        $instance->setLexer(${($_ = isset($this->services['template.twig.lexer']) ? $this->services['template.twig.lexer'] : $this->getTemplate_Twig_LexerService()) && false ?: '_'});

        return $instance;
    }

    /**
     * Gets the private 'template.twig.extensions.avatar' shared service.
     *
     * @return \phpbb\template\twig\extension\avatar
     */
    protected function getTemplate_Twig_Extensions_AvatarService()
    {
        return $this->services['template.twig.extensions.avatar'] = new \phpbb\template\twig\extension\avatar();
    }

    /**
     * Gets the private 'template.twig.extensions.collection' shared service.
     *
     * @return \phpbb\di\service_collection
     */
    protected function getTemplate_Twig_Extensions_CollectionService()
    {
        $this->services['template.twig.extensions.collection'] = $instance = new \phpbb\di\service_collection($this);

        $instance->add('template.twig.extensions.phpbb');
        $instance->add('template.twig.extensions.avatar');
        $instance->add('template.twig.extensions.config');
        $instance->add('template.twig.extensions.routing');
        $instance->add('template.twig.extensions.username');

        return $instance;
    }

    /**
     * Gets the private 'template.twig.extensions.config' shared service.
     *
     * @return \phpbb\template\twig\extension\config
     */
    protected function getTemplate_Twig_Extensions_ConfigService()
    {
        return $this->services['template.twig.extensions.config'] = new \phpbb\template\twig\extension\config(${($_ = isset($this->services['config']) ? $this->services['config'] : ($this->services['config'] = new \phpbb\config\config(['rand_seed' => 'installer_seed', 'rand_seed_last_update' => 0]))) && false ?: '_'});
    }

    /**
     * Gets the private 'template.twig.extensions.debug' shared service.
     *
     * @return \Twig\Extension\DebugExtension
     */
    protected function getTemplate_Twig_Extensions_DebugService()
    {
        return $this->services['template.twig.extensions.debug'] = new \Twig\Extension\DebugExtension();
    }

    /**
     * Gets the private 'template.twig.extensions.phpbb' shared service.
     *
     * @return \phpbb\template\twig\extension
     */
    protected function getTemplate_Twig_Extensions_PhpbbService()
    {
        return $this->services['template.twig.extensions.phpbb'] = new \phpbb\template\twig\extension(${($_ = isset($this->services['template_context']) ? $this->services['template_context'] : ($this->services['template_context'] = new \phpbb\template\context())) && false ?: '_'}, ${($_ = isset($this->services['template.twig.environment']) ? $this->services['template.twig.environment'] : $this->getTemplate_Twig_EnvironmentService()) && false ?: '_'}, ${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'});
    }

    /**
     * Gets the private 'template.twig.extensions.routing' shared service.
     *
     * @return \phpbb\template\twig\extension\routing
     */
    protected function getTemplate_Twig_Extensions_RoutingService()
    {
        return $this->services['template.twig.extensions.routing'] = new \phpbb\template\twig\extension\routing(${($_ = isset($this->services['routing.helper']) ? $this->services['routing.helper'] : $this->getRouting_HelperService()) && false ?: '_'});
    }

    /**
     * Gets the private 'template.twig.extensions.username' shared service.
     *
     * @return \phpbb\template\twig\extension\username
     */
    protected function getTemplate_Twig_Extensions_UsernameService()
    {
        return $this->services['template.twig.extensions.username'] = new \phpbb\template\twig\extension\username();
    }

    /**
     * Gets the private 'template.twig.lexer' shared service.
     *
     * @return \phpbb\template\twig\lexer
     */
    protected function getTemplate_Twig_LexerService($lazyLoad = true)
    {
        if ($lazyLoad) {
            return $this->services['template.twig.lexer'] = $this->createProxy('lexer_6d586c2', function () {
                return \lexer_6d586c2::staticProxyConstructor(function (&$wrappedInstance, \ProxyManager\Proxy\LazyLoadingInterface $proxy) {
                    $wrappedInstance = $this->getTemplate_Twig_LexerService(false);

                    $proxy->setProxyInitializer(null);

                    return true;
                });
            });
        }

        return new \phpbb\template\twig\lexer(${($_ = isset($this->services['template.twig.environment']) ? $this->services['template.twig.environment'] : $this->getTemplate_Twig_EnvironmentService()) && false ?: '_'});
    }

    /**
     * Gets the private 'template.twig.loader' shared service.
     *
     * @return \phpbb\template\twig\loader
     */
    protected function getTemplate_Twig_LoaderService()
    {
        return $this->services['template.twig.loader'] = new \phpbb\template\twig\loader(${($_ = isset($this->services['filesystem']) ? $this->services['filesystem'] : ($this->services['filesystem'] = new \phpbb\filesystem\filesystem())) && false ?: '_'});
    }

    /**
     * Gets the private 'template_context' shared service.
     *
     * @return \phpbb\template\context
     */
    protected function getTemplateContextService()
    {
        return $this->services['template_context'] = new \phpbb\template\context();
    }

    /**
     * Gets the private 'user' shared service.
     *
     * @return \phpbb\user
     */
    protected function getUserService()
    {
        return $this->services['user'] = new \phpbb\user(${($_ = isset($this->services['language']) ? $this->services['language'] : $this->getLanguageService()) && false ?: '_'}, '\\phpbb\\datetime');
    }

    public function getParameter($name)
    {
        $name = (string) $name;
        if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
            $name = $this->normalizeParameterName($name);

            if (!(isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters))) {
                throw new InvalidArgumentException(sprintf('The parameter "%s" must be defined.', $name));
            }
        }
        if (isset($this->loadedDynamicParameters[$name])) {
            return $this->loadedDynamicParameters[$name] ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
        }

        return $this->parameters[$name];
    }

    public function hasParameter($name)
    {
        $name = (string) $name;
        $name = $this->normalizeParameterName($name);

        return isset($this->parameters[$name]) || isset($this->loadedDynamicParameters[$name]) || array_key_exists($name, $this->parameters);
    }

    public function setParameter($name, $value)
    {
        throw new LogicException('Impossible to call set() on a frozen ParameterBag.');
    }

    public function getParameterBag()
    {
        if (null === $this->parameterBag) {
            $parameters = $this->parameters;
            foreach ($this->loadedDynamicParameters as $name => $loaded) {
                $parameters[$name] = $loaded ? $this->dynamicParameters[$name] : $this->getDynamicParameter($name);
            }
            $this->parameterBag = new FrozenParameterBag($parameters);
        }

        return $this->parameterBag;
    }

    private $loadedDynamicParameters = [];
    private $dynamicParameters = [];

    /**
     * Computes a dynamic parameter.
     *
     * @param string $name The name of the dynamic parameter to load
     *
     * @return mixed The value of the dynamic parameter
     *
     * @throws InvalidArgumentException When the dynamic parameter does not exist
     */
    private function getDynamicParameter($name)
    {
        throw new InvalidArgumentException(sprintf('The dynamic parameter "%s" must be defined.', $name));
    }

    private $normalizedParameterNames = [];

    private function normalizeParameterName($name)
    {
        if (isset($this->normalizedParameterNames[$normalizedName = strtolower($name)]) || isset($this->parameters[$normalizedName]) || array_key_exists($normalizedName, $this->parameters)) {
            $normalizedName = isset($this->normalizedParameterNames[$normalizedName]) ? $this->normalizedParameterNames[$normalizedName] : $normalizedName;
            if ((string) $name !== $normalizedName) {
                @trigger_error(sprintf('Parameter names will be made case sensitive in Symfony 4.0. Using "%s" instead of "%s" is deprecated since Symfony 3.4.', $name, $normalizedName), E_USER_DEPRECATED);
            }
        } else {
            $normalizedName = $this->normalizedParameterNames[$normalizedName] = (string) $name;
        }

        return $normalizedName;
    }

    /**
     * Gets the default parameters.
     *
     * @return array An array of the default parameters
     */
    protected function getDefaultParameters()
    {
        return [
            'core.root_path' => '../',
            'core.php_ext' => 'php',
            'core.environment' => 'installer',
            'core.debug' => false,
            'core.cache_dir' => '../cache/installer/',
            'cache.driver.class' => 'phpbb\\cache\\driver\\file',
            'core.template.cache_path' => '../cache/installer/twig/',
            'core.disable_super_globals' => true,
            'datetime.class' => '\\phpbb\\datetime',
            'mimetype.guesser.priority.lowest' => -2,
            'mimetype.guesser.priority.low' => -1,
            'mimetype.guesser.priority.default' => 0,
            'mimetype.guesser.priority.high' => 1,
            'mimetype.guesser.priority.highest' => 2,
            'passwords.algorithms' => [
                0 => 'passwords.driver.argon2id',
                1 => 'passwords.driver.argon2i',
                2 => 'passwords.driver.bcrypt_2y',
                3 => 'passwords.driver.bcrypt',
                4 => 'passwords.driver.salted_md5',
                5 => 'passwords.driver.phpass',
            ],
            'installer.create_config_file.options' => [

            ],
            'allow_install_dir' => false,
            'debug.exceptions' => false,
            'debug.load_time' => false,
            'debug.sql_explain' => false,
            'debug.memory' => false,
            'debug.show_errors' => false,
            'debug.error_handler' => false,
            'session.log_errors' => false,
            'tables' => [

            ],
        ];
    }
}

class lexer_6d586c2 extends \phpbb\template\twig\lexer implements \ProxyManager\Proxy\VirtualProxyInterface
{

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $valueHolder6d586c2 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer6d586c2 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties6d586c2 = [
        
    ];

    /**
     * {@inheritDoc}
     */
    public function tokenize(\Twig\Source $source)
    {
        $this->initializer6d586c2 && ($this->initializer6d586c2->__invoke($valueHolder6d586c2, $this, 'tokenize', array('source' => $source), $this->initializer6d586c2) || 1) && $this->valueHolder6d586c2 = $valueHolder6d586c2;

        return $this->valueHolder6d586c2->tokenize($source);
    }

    /**
     * {@inheritDoc}
     */
    public function fix_begin_tokens($code, $parent_nodes = [])
    {
        $this->initializer6d586c2 && ($this->initializer6d586c2->__invoke($valueHolder6d586c2, $this, 'fix_begin_tokens', array('code' => $code, 'parent_nodes' => $parent_nodes), $this->initializer6d586c2) || 1) && $this->valueHolder6d586c2 = $valueHolder6d586c2;

        return $this->valueHolder6d586c2->fix_begin_tokens($code, $parent_nodes);
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?: $reflection = new \ReflectionClass(__CLASS__);
        $instance = (new \ReflectionClass(get_class()))->newInstanceWithoutConstructor();

        \Closure::bind(function (\Twig\Lexer $instance) {
            unset($instance->tokens, $instance->code, $instance->cursor, $instance->lineno, $instance->end, $instance->state, $instance->states, $instance->brackets, $instance->env, $instance->source, $instance->options, $instance->regexes, $instance->position, $instance->positions, $instance->currentVarBlockLine);
        }, $instance, 'Twig\\Lexer')->__invoke($instance);

        $instance->initializer6d586c2 = $initializer;

        return $instance;
    }

    /**
     * {@inheritDoc}
     */
    public function __construct(\Twig\Environment $env, array $options = [])
    {
        static $reflection;

        if (! $this->valueHolder6d586c2) {
            $reflection = $reflection ?: new \ReflectionClass('phpbb\\template\\twig\\lexer');
            $this->valueHolder6d586c2 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Twig\Lexer $instance) {
            unset($instance->tokens, $instance->code, $instance->cursor, $instance->lineno, $instance->end, $instance->state, $instance->states, $instance->brackets, $instance->env, $instance->source, $instance->options, $instance->regexes, $instance->position, $instance->positions, $instance->currentVarBlockLine);
        }, $this, 'Twig\\Lexer')->__invoke($this);

        }

        $this->valueHolder6d586c2->__construct($env, $options);
    }

    /**
     * @param string $name
     */
    public function & __get($name)
    {
        $this->initializer6d586c2 && ($this->initializer6d586c2->__invoke($valueHolder6d586c2, $this, '__get', ['name' => $name], $this->initializer6d586c2) || 1) && $this->valueHolder6d586c2 = $valueHolder6d586c2;

        if (isset(self::$publicProperties6d586c2[$name])) {
            return $this->valueHolder6d586c2->$name;
        }

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder6d586c2;

            $backtrace = debug_backtrace(false);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    get_parent_class($this),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
            return;
        }

        $targetObject = $this->valueHolder6d586c2;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    /**
     * @param string $name
     * @param mixed $value
     */
    public function __set($name, $value)
    {
        $this->initializer6d586c2 && ($this->initializer6d586c2->__invoke($valueHolder6d586c2, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer6d586c2) || 1) && $this->valueHolder6d586c2 = $valueHolder6d586c2;

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder6d586c2;

            return $targetObject->$name = $value;
            return;
        }

        $targetObject = $this->valueHolder6d586c2;
        $accessor = function & () use ($targetObject, $name, $value) {
            return $targetObject->$name = $value;
        };
        $backtrace = debug_backtrace(true);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    /**
     * @param string $name
     */
    public function __isset($name)
    {
        $this->initializer6d586c2 && ($this->initializer6d586c2->__invoke($valueHolder6d586c2, $this, '__isset', array('name' => $name), $this->initializer6d586c2) || 1) && $this->valueHolder6d586c2 = $valueHolder6d586c2;

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder6d586c2;

            return isset($targetObject->$name);
            return;
        }

        $targetObject = $this->valueHolder6d586c2;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    /**
     * @param string $name
     */
    public function __unset($name)
    {
        $this->initializer6d586c2 && ($this->initializer6d586c2->__invoke($valueHolder6d586c2, $this, '__unset', array('name' => $name), $this->initializer6d586c2) || 1) && $this->valueHolder6d586c2 = $valueHolder6d586c2;

        $realInstanceReflection = new \ReflectionClass(get_parent_class($this));

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder6d586c2;

            unset($targetObject->$name);
            return;
        }

        $targetObject = $this->valueHolder6d586c2;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __clone()
    {
        $this->initializer6d586c2 && ($this->initializer6d586c2->__invoke($valueHolder6d586c2, $this, '__clone', array(), $this->initializer6d586c2) || 1) && $this->valueHolder6d586c2 = $valueHolder6d586c2;

        $this->valueHolder6d586c2 = clone $this->valueHolder6d586c2;
    }

    public function __sleep()
    {
        $this->initializer6d586c2 && ($this->initializer6d586c2->__invoke($valueHolder6d586c2, $this, '__sleep', array(), $this->initializer6d586c2) || 1) && $this->valueHolder6d586c2 = $valueHolder6d586c2;

        return array('valueHolder6d586c2');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Twig\Lexer $instance) {
            unset($instance->tokens, $instance->code, $instance->cursor, $instance->lineno, $instance->end, $instance->state, $instance->states, $instance->brackets, $instance->env, $instance->source, $instance->options, $instance->regexes, $instance->position, $instance->positions, $instance->currentVarBlockLine);
        }, $this, 'Twig\\Lexer')->__invoke($this);
    }

    /**
     * {@inheritDoc}
     */
    public function setProxyInitializer(\Closure $initializer = null)
    {
        $this->initializer6d586c2 = $initializer;
    }

    /**
     * {@inheritDoc}
     */
    public function getProxyInitializer()
    {
        return $this->initializer6d586c2;
    }

    /**
     * {@inheritDoc}
     */
    public function initializeProxy() : bool
    {
        return $this->initializer6d586c2 && ($this->initializer6d586c2->__invoke($valueHolder6d586c2, $this, 'initializeProxy', array(), $this->initializer6d586c2) || 1) && $this->valueHolder6d586c2 = $valueHolder6d586c2;
    }

    /**
     * {@inheritDoc}
     */
    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder6d586c2;
    }

    /**
     * {@inheritDoc}
     */
    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder6d586c2;
    }


}
