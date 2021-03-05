<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* acp_main.html */
class __TwigTemplate_b4701400f11ced9577589de1e55dbf31b9276e2a46fb5c0a2db4b116a9a46560 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        $location = "overall_header.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_header.html", "acp_main.html", 1)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
        // line 2
        echo "
<a id=\"maincontent\"></a>

";
        // line 5
        if (($context["S_RESTORE_PERMISSIONS"] ?? null)) {
            // line 6
            echo "
\t<h1>";
            // line 7
            echo $this->extensions['phpbb\template\twig\extension']->lang("PERMISSIONS_TRANSFERRED");
            echo "</h1>

\t<p>";
            // line 9
            echo $this->extensions['phpbb\template\twig\extension']->lang("PERMISSIONS_TRANSFERRED_EXPLAIN");
            echo "</p>

";
        } else {
            // line 12
            echo "
\t<h1>";
            // line 13
            echo $this->extensions['phpbb\template\twig\extension']->lang("WELCOME_PHPBB");
            echo "</h1>

\t<p>";
            // line 15
            echo $this->extensions['phpbb\template\twig\extension']->lang("ADMIN_INTRO");
            echo "</p>

\t";
            // line 17
            if (($context["S_UPDATE_INCOMPLETE"] ?? null)) {
                // line 18
                echo "\t\t<div class=\"errorbox\">
\t\t\t<p>";
                // line 19
                echo $this->extensions['phpbb\template\twig\extension']->lang("UPDATE_INCOMPLETE");
                echo " <a href=\"";
                echo ($context["U_VERSIONCHECK"] ?? null);
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("MORE_INFORMATION");
                echo "</a></p>
\t\t</div>
\t";
            } elseif (            // line 21
($context["S_VERSIONCHECK_FAIL"] ?? null)) {
                // line 22
                echo "\t\t<div class=\"errorbox notice\">
\t\t\t<p>";
                // line 23
                echo $this->extensions['phpbb\template\twig\extension']->lang("VERSIONCHECK_FAIL");
                echo "</p>
\t\t\t<p>";
                // line 24
                echo ($context["VERSIONCHECK_FAIL_REASON"] ?? null);
                echo "</p>
\t\t\t<p><a href=\"";
                // line 25
                echo ($context["U_VERSIONCHECK_FORCE"] ?? null);
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("VERSIONCHECK_FORCE_UPDATE");
                echo "</a> &middot; <a href=\"";
                echo ($context["U_VERSIONCHECK"] ?? null);
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("MORE_INFORMATION");
                echo "</a></p>
\t\t</div>
\t";
            } elseif ( !            // line 27
($context["S_VERSION_UP_TO_DATE"] ?? null)) {
                // line 28
                echo "\t\t<div class=\"errorbox\">
\t\t\t<p>";
                // line 29
                echo $this->extensions['phpbb\template\twig\extension']->lang("VERSION_NOT_UP_TO_DATE_TITLE");
                echo "</p>
\t\t\t<p><a href=\"";
                // line 30
                echo ($context["U_VERSIONCHECK_FORCE"] ?? null);
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("VERSIONCHECK_FORCE_UPDATE");
                echo "</a> &middot; <a href=\"";
                echo ($context["U_VERSIONCHECK"] ?? null);
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("MORE_INFORMATION");
                echo "</a></p>
\t\t</div>
\t";
            }
            // line 33
            echo "\t";
            if (($context["S_VERSION_UPGRADEABLE"] ?? null)) {
                // line 34
                echo "\t\t<div class=\"errorbox notice\">
\t\t\t<p>";
                // line 35
                echo ($context["UPGRADE_INSTRUCTIONS"] ?? null);
                echo "</p>
\t\t</div>
\t";
            }
            // line 38
            echo "
\t";
            // line 39
            if (($context["S_SEARCH_INDEX_MISSING"] ?? null)) {
                // line 40
                echo "\t\t<div class=\"errorbox\">
\t\t\t<h3>";
                // line 41
                echo $this->extensions['phpbb\template\twig\extension']->lang("WARNING");
                echo "</h3>
\t\t\t<p>";
                // line 42
                echo $this->extensions['phpbb\template\twig\extension']->lang("NO_SEARCH_INDEX");
                echo "</p>
\t\t</div>
\t";
            }
            // line 45
            echo "
\t";
            // line 46
            if (($context["S_REMOVE_INSTALL"] ?? null)) {
                // line 47
                echo "\t\t<div class=\"errorbox\">
\t\t\t<h3>";
                // line 48
                echo $this->extensions['phpbb\template\twig\extension']->lang("WARNING");
                echo "</h3>
\t\t\t<p>";
                // line 49
                echo $this->extensions['phpbb\template\twig\extension']->lang("REMOVE_INSTALL");
                echo "</p>
\t\t</div>
\t";
            }
            // line 52
            echo "
\t";
            // line 53
            if (($context["S_MBSTRING_LOADED"] ?? null)) {
                // line 54
                echo "\t\t";
                if (($context["S_MBSTRING_FUNC_OVERLOAD_FAIL"] ?? null)) {
                    // line 55
                    echo "\t\t\t<div class=\"errorbox\">
\t\t\t\t<h3>";
                    // line 56
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ERROR_MBSTRING_FUNC_OVERLOAD");
                    echo "</h3>
\t\t\t\t<p>";
                    // line 57
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ERROR_MBSTRING_FUNC_OVERLOAD_EXPLAIN");
                    echo "</p>
\t\t\t</div>
\t\t";
                }
                // line 60
                echo "
\t\t";
                // line 61
                if (($context["S_MBSTRING_ENCODING_TRANSLATION_FAIL"] ?? null)) {
                    // line 62
                    echo "\t\t\t<div class=\"errorbox\">
\t\t\t\t<h3>";
                    // line 63
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ERROR_MBSTRING_ENCODING_TRANSLATION");
                    echo "</h3>
\t\t\t\t<p>";
                    // line 64
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ERROR_MBSTRING_ENCODING_TRANSLATION_EXPLAIN");
                    echo "</p>
\t\t\t</div>
\t\t";
                }
                // line 67
                echo "
\t\t";
                // line 68
                if (($context["S_MBSTRING_HTTP_INPUT_FAIL"] ?? null)) {
                    // line 69
                    echo "\t\t\t<div class=\"errorbox\">
\t\t\t\t<h3>";
                    // line 70
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ERROR_MBSTRING_HTTP_INPUT");
                    echo "</h3>
\t\t\t\t<p>";
                    // line 71
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ERROR_MBSTRING_HTTP_INPUT_EXPLAIN");
                    echo "</p>
\t\t\t</div>
\t\t";
                }
                // line 74
                echo "
\t\t";
                // line 75
                if (($context["S_MBSTRING_HTTP_OUTPUT_FAIL"] ?? null)) {
                    // line 76
                    echo "\t\t\t<div class=\"errorbox\">
\t\t\t\t<h3>";
                    // line 77
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ERROR_MBSTRING_HTTP_OUTPUT");
                    echo "</h3>
\t\t\t\t<p>";
                    // line 78
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ERROR_MBSTRING_HTTP_OUTPUT_EXPLAIN");
                    echo "</p>
\t\t\t</div>
\t\t";
                }
                // line 81
                echo "
\t\t";
                // line 82
                if (($context["S_DEFAULT_CHARSET_FAIL"] ?? null)) {
                    // line 83
                    echo "\t\t\t<div class=\"errorbox\">
\t\t\t\t<h3>";
                    // line 84
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ERROR_DEFAULT_CHARSET");
                    echo "</h3>
\t\t\t\t<p>";
                    // line 85
                    echo $this->extensions['phpbb\template\twig\extension']->lang("ERROR_DEFAULT_CHARSET_EXPLAIN");
                    echo "</p>
\t\t\t</div>
\t\t";
                }
                // line 88
                echo "\t";
            }
            // line 89
            echo "
\t";
            // line 90
            if (($context["S_WRITABLE_CONFIG"] ?? null)) {
                // line 91
                echo "\t\t<div class=\"errorbox notice\">
\t\t\t<p>";
                // line 92
                echo $this->extensions['phpbb\template\twig\extension']->lang("WRITABLE_CONFIG");
                echo "</p>
\t\t</div>
\t";
            }
            // line 95
            echo "
\t";
            // line 96
            if (($context["S_PHP_VERSION_OLD"] ?? null)) {
                // line 97
                echo "\t\t<div class=\"errorbox notice\">
\t\t\t<p>";
                // line 98
                echo $this->extensions['phpbb\template\twig\extension']->lang("PHP_VERSION_OLD");
                echo "</p>
\t\t</div>
\t";
            }
            // line 101
            echo "
\t";
            // line 102
            // line 103
            echo "
\t\t<div class=\"lside\">
\t\t\t<table class=\"table2 zebra-table no-header\" data-no-responsive-header=\"true\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>";
            // line 108
            echo $this->extensions['phpbb\template\twig\extension']->lang("STATISTIC");
            echo "</th>
\t\t\t\t\t\t<th>";
            // line 109
            echo $this->extensions['phpbb\template\twig\extension']->lang("VALUE");
            echo "</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>

\t\t\t\t<tbody>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"tabled\">";
            // line 115
            echo ($this->extensions['phpbb\template\twig\extension']->lang("BOARD_STARTED") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo "</td>
\t\t\t\t\t\t<td class=\"tabled\"><strong>";
            // line 116
            echo ($context["START_DATE"] ?? null);
            echo "</strong></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"tabled\">";
            // line 119
            echo ($this->extensions['phpbb\template\twig\extension']->lang("AVATAR_DIR_SIZE") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo "</td>
\t\t\t\t\t\t<td class=\"tabled\"><strong>";
            // line 120
            echo ($context["AVATAR_DIR_SIZE"] ?? null);
            echo "</strong></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"tabled\">";
            // line 123
            echo ($this->extensions['phpbb\template\twig\extension']->lang("DATABASE_SIZE") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo "</td>
\t\t\t\t\t\t<td class=\"tabled\"><strong>";
            // line 124
            echo ($context["DBSIZE"] ?? null);
            echo "</strong></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"tabled\">";
            // line 127
            echo ($this->extensions['phpbb\template\twig\extension']->lang("UPLOAD_DIR_SIZE") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo "</td>
\t\t\t\t\t\t<td class=\"tabled\"><strong>";
            // line 128
            echo ($context["UPLOAD_DIR_SIZE"] ?? null);
            echo "</strong></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"tabled\">";
            // line 131
            echo ($this->extensions['phpbb\template\twig\extension']->lang("DATABASE_SERVER_INFO") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo "</td>
\t\t\t\t\t\t<td class=\"tabled\"><strong>";
            // line 132
            echo ($context["DATABASE_INFO"] ?? null);
            echo "</strong></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"tabled\">";
            // line 135
            echo ($this->extensions['phpbb\template\twig\extension']->lang("GZIP_COMPRESSION") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo "</td>
\t\t\t\t\t\t<td class=\"tabled\"><strong>";
            // line 136
            echo ($context["GZIP_COMPRESSION"] ?? null);
            echo "</strong></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"tabled\">";
            // line 139
            echo ($this->extensions['phpbb\template\twig\extension']->lang("PHP_VERSION") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo "</td>
\t\t\t\t\t\t<td class=\"tabled\"><strong>";
            // line 140
            echo ($context["PHP_VERSION_INFO"] ?? null);
            echo "</strong></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t";
            // line 143
            if (($context["S_TOTAL_ORPHAN"] ?? null)) {
                // line 144
                echo "\t\t\t\t\t\t<td class=\"tabled\">";
                echo ($this->extensions['phpbb\template\twig\extension']->lang("NUMBER_ORPHAN") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
                echo "</td>
\t\t\t\t\t\t<td class=\"tabled\">
\t\t\t\t\t\t";
                // line 146
                if ((($context["TOTAL_ORPHAN"] ?? null) > 0)) {
                    // line 147
                    echo "\t\t\t\t\t\t\t<a href=\"";
                    echo ($context["U_ATTACH_ORPHAN"] ?? null);
                    echo "\" title=\"";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("MORE_INFORMATION");
                    echo "\"><strong>";
                    echo ($context["TOTAL_ORPHAN"] ?? null);
                    echo "</strong></a>
\t\t\t\t\t\t";
                } else {
                    // line 149
                    echo "\t\t\t\t\t\t\t<strong>";
                    echo ($context["TOTAL_ORPHAN"] ?? null);
                    echo "</strong>
\t\t\t\t\t\t";
                }
                // line 151
                echo "\t\t\t\t\t\t</td>
\t\t\t\t\t\t";
            } else {
                // line 153
                echo "\t\t\t\t\t";
            }
            // line 154
            echo "\t\t\t\t\t</tr>
\t\t\t\t\t";
            // line 155
            if (($context["S_VERSIONCHECK"] ?? null)) {
                // line 156
                echo "\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"tabled\">";
                // line 157
                echo ($this->extensions['phpbb\template\twig\extension']->lang("BOARD_VERSION") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
                echo "</td>
\t\t\t\t\t\t<td class=\"tabled\">
\t\t\t\t\t\t\t<strong><a href=\"";
                // line 159
                echo ($context["U_VERSIONCHECK"] ?? null);
                echo "\" ";
                if (($context["S_VERSION_UP_TO_DATE"] ?? null)) {
                    echo "style=\"color: #228822;\" ";
                } elseif ( !($context["S_VERSIONCHECK_FAIL"] ?? null)) {
                    echo "style=\"color: #BC2A4D;\" ";
                }
                echo "title=\"";
                echo $this->extensions['phpbb\template\twig\extension']->lang("MORE_INFORMATION");
                echo "\">";
                echo ($context["BOARD_VERSION"] ?? null);
                echo "</a></strong> [&nbsp;<a href=\"";
                echo ($context["U_VERSIONCHECK_FORCE"] ?? null);
                echo "\">";
                echo $this->extensions['phpbb\template\twig\extension']->lang("VERSIONCHECK_FORCE_UPDATE");
                echo "</a>&nbsp;]
\t\t\t\t\t\t</td>
\t\t\t\t\t</tr>
\t\t\t\t\t";
            }
            // line 163
            echo "\t\t\t\t</tbody>
\t\t\t</table>

\t\t\t<table class=\"table2 zebra-table no-header\" data-no-responsive-header=\"true\">
\t\t\t\t<thead>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<th>";
            // line 169
            echo $this->extensions['phpbb\template\twig\extension']->lang("STATISTIC");
            echo "</th>
\t\t\t\t\t\t<th>";
            // line 170
            echo $this->extensions['phpbb\template\twig\extension']->lang("VALUE");
            echo "</th>
\t\t\t\t\t</tr>
\t\t\t\t</thead>

\t\t\t\t<tbody>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"tabled\">";
            // line 176
            echo ($this->extensions['phpbb\template\twig\extension']->lang("NUMBER_POSTS") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo "</td>
\t\t\t\t\t\t<td class=\"tabled\"><strong>";
            // line 177
            echo ($context["TOTAL_POSTS"] ?? null);
            echo "</strong></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"tabled\">";
            // line 180
            echo ($this->extensions['phpbb\template\twig\extension']->lang("POSTS_PER_DAY") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo "</td>
\t\t\t\t\t\t<td class=\"tabled\"><strong>";
            // line 181
            echo ($context["POSTS_PER_DAY"] ?? null);
            echo "</strong></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"tabled\">";
            // line 184
            echo ($this->extensions['phpbb\template\twig\extension']->lang("NUMBER_TOPICS") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo "</td>
\t\t\t\t\t\t<td class=\"tabled\"><strong>";
            // line 185
            echo ($context["TOTAL_TOPICS"] ?? null);
            echo "</strong></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"tabled\">";
            // line 188
            echo ($this->extensions['phpbb\template\twig\extension']->lang("TOPICS_PER_DAY") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo "</td>
\t\t\t\t\t\t<td class=\"tabled\"><strong>";
            // line 189
            echo ($context["TOPICS_PER_DAY"] ?? null);
            echo "</strong></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"tabled\">";
            // line 192
            echo ($this->extensions['phpbb\template\twig\extension']->lang("NUMBER_USERS") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo "</td>
\t\t\t\t\t\t<td class=\"tabled\"><strong>";
            // line 193
            echo ($context["TOTAL_USERS"] ?? null);
            echo "</strong></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"tabled\">";
            // line 196
            echo ($this->extensions['phpbb\template\twig\extension']->lang("USERS_PER_DAY") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo "</td>
\t\t\t\t\t\t<td class=\"tabled\"><strong>";
            // line 197
            echo ($context["USERS_PER_DAY"] ?? null);
            echo "</strong></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"tabled\">";
            // line 200
            echo ($this->extensions['phpbb\template\twig\extension']->lang("NUMBER_FILES") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo "</td>
\t\t\t\t\t\t<td class=\"tabled\"><strong>";
            // line 201
            echo ($context["TOTAL_FILES"] ?? null);
            echo "</strong></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"tabled\">";
            // line 204
            echo ($this->extensions['phpbb\template\twig\extension']->lang("FILES_PER_DAY") . $this->extensions['phpbb\template\twig\extension']->lang("COLON"));
            echo "</td>
\t\t\t\t\t\t<td class=\"tabled\"><strong>";
            // line 205
            echo ($context["FILES_PER_DAY"] ?? null);
            echo "</strong></td>
\t\t\t\t\t</tr>
\t\t\t\t\t<tr>
\t\t\t\t\t\t<td class=\"tabled\">&nbsp;</td>
\t\t\t\t\t\t<td class=\"tabled\">&nbsp;</td>
\t\t\t\t\t</tr>
\t\t\t\t</tbody>
\t\t\t</table>
\t\t</div>

\t";
            // line 215
            if (($context["S_ACTION_OPTIONS"] ?? null)) {
                // line 216
                echo "\t\t<fieldset>
\t\t\t<legend>";
                // line 217
                echo $this->extensions['phpbb\template\twig\extension']->lang("STATISTIC_RESYNC_OPTIONS");
                echo "</legend>

\t\t\t<form id=\"action_online_form\" method=\"post\" action=\"";
                // line 219
                echo ($context["U_ACTION"] ?? null);
                echo "\" data-ajax=\"true\">
\t\t\t\t<dl>
\t\t\t\t\t<dt><label for=\"action_online\">";
                // line 221
                echo $this->extensions['phpbb\template\twig\extension']->lang("RESET_ONLINE");
                echo "</label><br /><span>&nbsp;</span></dt>
\t\t\t\t\t<dd><input type=\"hidden\" name=\"action\" value=\"online\" /><input class=\"button2\" type=\"submit\" id=\"action_online\" name=\"action_online\" value=\"";
                // line 222
                echo $this->extensions['phpbb\template\twig\extension']->lang("RUN");
                echo "\" /></dd>
\t\t\t\t</dl>
\t\t\t</form>

\t\t\t<form id=\"action_date_form\" method=\"post\" action=\"";
                // line 226
                echo ($context["U_ACTION"] ?? null);
                echo "\" data-ajax=\"true\">
\t\t\t\t<dl>
\t\t\t\t\t<dt><label for=\"action_date\">";
                // line 228
                echo $this->extensions['phpbb\template\twig\extension']->lang("RESET_DATE");
                echo "</label><br /><span>&nbsp;</span></dt>
\t\t\t\t\t<dd><input type=\"hidden\" name=\"action\" value=\"date\" /><input class=\"button2\" type=\"submit\" id=\"action_date\" name=\"action_date\" value=\"";
                // line 229
                echo $this->extensions['phpbb\template\twig\extension']->lang("RUN");
                echo "\" /></dd>
\t\t\t\t</dl>
\t\t\t</form>

\t\t\t<form id=\"action_stats_form\" method=\"post\" action=\"";
                // line 233
                echo ($context["U_ACTION"] ?? null);
                echo "\">
\t\t\t\t<dl>
\t\t\t\t\t<dt><label for=\"action_stats\">";
                // line 235
                echo $this->extensions['phpbb\template\twig\extension']->lang("RESYNC_STATS");
                echo "</label><br /><span>";
                echo $this->extensions['phpbb\template\twig\extension']->lang("RESYNC_STATS_EXPLAIN");
                echo "</span></dt>
\t\t\t\t\t<dd><input type=\"hidden\" name=\"action\" value=\"stats\" /><input class=\"button2\" type=\"submit\" id=\"action_stats\" name=\"action_stats\" value=\"";
                // line 236
                echo $this->extensions['phpbb\template\twig\extension']->lang("RUN");
                echo "\" /></dd>
\t\t\t\t</dl>
\t\t\t</form>

\t\t\t<form id=\"action_user_form\" method=\"post\" action=\"";
                // line 240
                echo ($context["U_ACTION"] ?? null);
                echo "\">
\t\t\t\t<dl>
\t\t\t\t\t<dt><label for=\"action_user\">";
                // line 242
                echo $this->extensions['phpbb\template\twig\extension']->lang("RESYNC_POSTCOUNTS");
                echo "</label><br /><span>";
                echo $this->extensions['phpbb\template\twig\extension']->lang("RESYNC_POSTCOUNTS_EXPLAIN");
                echo "</span></dt>
\t\t\t\t\t<dd><input type=\"hidden\" name=\"action\" value=\"user\" /><input class=\"button2\" type=\"submit\" id=\"action_user\" name=\"action_user\" value=\"";
                // line 243
                echo $this->extensions['phpbb\template\twig\extension']->lang("RUN");
                echo "\" /></dd>
\t\t\t\t</dl>
\t\t\t</form>

\t\t\t<form id=\"action_db_track_form\" method=\"post\" action=\"";
                // line 247
                echo ($context["U_ACTION"] ?? null);
                echo "\">
\t\t\t\t<dl>
\t\t\t\t\t<dt><label for=\"action_db_track\">";
                // line 249
                echo $this->extensions['phpbb\template\twig\extension']->lang("RESYNC_POST_MARKING");
                echo "</label><br /><span>";
                echo $this->extensions['phpbb\template\twig\extension']->lang("RESYNC_POST_MARKING_EXPLAIN");
                echo "</span></dt>
\t\t\t\t\t<dd><input type=\"hidden\" name=\"action\" value=\"db_track\" /><input class=\"button2\" type=\"submit\" id=\"action_db_track\" name=\"action_db_track\" value=\"";
                // line 250
                echo $this->extensions['phpbb\template\twig\extension']->lang("RUN");
                echo "\" /></dd>
\t\t\t\t</dl>
\t\t\t</form>

\t\t\t";
                // line 254
                if (($context["S_FOUNDER"] ?? null)) {
                    // line 255
                    echo "\t\t\t<form id=\"action_purge_sessions_form\" method=\"post\" action=\"";
                    echo ($context["U_ACTION"] ?? null);
                    echo "\" data-ajax=\"true\">
\t\t\t\t<dl>
\t\t\t\t\t<dt><label for=\"action_purge_sessions\">";
                    // line 257
                    echo $this->extensions['phpbb\template\twig\extension']->lang("PURGE_SESSIONS");
                    echo "</label><br /><span>";
                    echo $this->extensions['phpbb\template\twig\extension']->lang("PURGE_SESSIONS_EXPLAIN");
                    echo "</span></dt>
\t\t\t\t\t<dd><input type=\"hidden\" name=\"action\" value=\"purge_sessions\" /><input class=\"button2\" type=\"submit\" id=\"action_purge_sessions\" name=\"action_purge_sessions\" value=\"";
                    // line 258
                    echo $this->extensions['phpbb\template\twig\extension']->lang("RUN");
                    echo "\" /></dd>
\t\t\t\t</dl>
\t\t\t</form>
\t\t\t";
                }
                // line 262
                echo "
\t\t\t<form id=\"action_purge_cache_form\" method=\"post\" action=\"";
                // line 263
                echo ($context["U_ACTION"] ?? null);
                echo "\" data-ajax=\"true\">
\t\t\t\t<dl>
\t\t\t\t\t<dt><label for=\"action_purge_cache\">";
                // line 265
                echo $this->extensions['phpbb\template\twig\extension']->lang("PURGE_CACHE");
                echo "</label><br /><span>";
                echo $this->extensions['phpbb\template\twig\extension']->lang("PURGE_CACHE_EXPLAIN");
                echo "</span></dt>
\t\t\t\t\t<dd><input type=\"hidden\" name=\"action\" value=\"purge_cache\" /><input class=\"button2\" type=\"submit\" id=\"action_purge_cache\" name=\"action_purge_cache\" value=\"";
                // line 266
                echo $this->extensions['phpbb\template\twig\extension']->lang("RUN");
                echo "\" /></dd>
\t\t\t\t</dl>
\t\t\t</form>

\t\t\t";
                // line 270
                // line 271
                echo "  \t\t</fieldset>
\t";
            }
            // line 273
            echo "
\t";
            // line 274
            if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "log", [], "any", false, false, false, 274))) {
                // line 275
                echo "\t\t<h2>";
                echo $this->extensions['phpbb\template\twig\extension']->lang("ADMIN_LOG");
                echo "</h2>

\t\t<p>";
                // line 277
                echo $this->extensions['phpbb\template\twig\extension']->lang("ADMIN_LOG_INDEX_EXPLAIN");
                echo "</p>

\t\t<div style=\"text-align: right;\"><a href=\"";
                // line 279
                echo ($context["U_ADMIN_LOG"] ?? null);
                echo "\">&raquo; ";
                echo $this->extensions['phpbb\template\twig\extension']->lang("VIEW_ADMIN_LOG");
                echo "</a></div>

\t\t<table class=\"table1 zebra-table\">
\t\t<thead>
\t\t<tr>
\t\t\t<th>";
                // line 284
                echo $this->extensions['phpbb\template\twig\extension']->lang("USERNAME");
                echo "</th>
\t\t\t<th>";
                // line 285
                echo $this->extensions['phpbb\template\twig\extension']->lang("IP");
                echo "</th>
\t\t\t<th>";
                // line 286
                echo $this->extensions['phpbb\template\twig\extension']->lang("TIME");
                echo "</th>
\t\t\t<th>";
                // line 287
                echo $this->extensions['phpbb\template\twig\extension']->lang("ACTION");
                echo "</th>
\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t";
                // line 291
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "log", [], "any", false, false, false, 291));
                foreach ($context['_seq'] as $context["_key"] => $context["log"]) {
                    // line 292
                    echo "\t\t\t<tr>
\t\t\t\t<td>";
                    // line 293
                    echo twig_get_attribute($this->env, $this->source, $context["log"], "USERNAME", [], "any", false, false, false, 293);
                    echo "</td>
\t\t\t\t<td style=\"text-align: center;\">";
                    // line 294
                    echo twig_get_attribute($this->env, $this->source, $context["log"], "IP", [], "any", false, false, false, 294);
                    echo "</td>
\t\t\t\t<td style=\"text-align: center;\">";
                    // line 295
                    echo twig_get_attribute($this->env, $this->source, $context["log"], "DATE", [], "any", false, false, false, 295);
                    echo "</td>
\t\t\t\t<td>";
                    // line 296
                    echo twig_get_attribute($this->env, $this->source, $context["log"], "ACTION", [], "any", false, false, false, 296);
                    echo "</td>
\t\t\t</tr>
\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['log'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 299
                echo "\t\t</tbody>
\t\t</table>
\t";
            }
            // line 302
            echo "
\t";
            // line 303
            if (($context["S_INACTIVE_USERS"] ?? null)) {
                // line 304
                echo "\t\t<h2>";
                echo $this->extensions['phpbb\template\twig\extension']->lang("INACTIVE_USERS");
                echo "</h2>

\t\t<p>";
                // line 306
                echo $this->extensions['phpbb\template\twig\extension']->lang("INACTIVE_USERS_EXPLAIN_INDEX");
                echo "</p>

\t\t<div style=\"text-align: right;\"><a href=\"";
                // line 308
                echo ($context["U_INACTIVE_USERS"] ?? null);
                echo "\">&raquo; ";
                echo $this->extensions['phpbb\template\twig\extension']->lang("VIEW_INACTIVE_USERS");
                echo "</a></div>

\t\t<table class=\"table1 zebra-table\">
\t\t<thead>
\t\t<tr>
\t\t\t<th>";
                // line 313
                echo $this->extensions['phpbb\template\twig\extension']->lang("USERNAME");
                echo "</th>
\t\t\t<th>";
                // line 314
                echo $this->extensions['phpbb\template\twig\extension']->lang("JOINED");
                echo "</th>
\t\t\t<th>";
                // line 315
                echo $this->extensions['phpbb\template\twig\extension']->lang("INACTIVE_DATE");
                echo "</th>
\t\t\t<th>";
                // line 316
                echo $this->extensions['phpbb\template\twig\extension']->lang("LAST_VISIT");
                echo "</th>
\t\t\t<th>";
                // line 317
                echo $this->extensions['phpbb\template\twig\extension']->lang("INACTIVE_REASON");
                echo "</th>
\t\t</tr>
\t\t</thead>
\t\t<tbody>
\t\t";
                // line 321
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["loops"] ?? null), "inactive", [], "any", false, false, false, 321));
                $context['_iterated'] = false;
                foreach ($context['_seq'] as $context["_key"] => $context["inactive"]) {
                    // line 322
                    echo "\t\t\t<tr>
\t\t\t\t<td style=\"vertical-align: top;\">
\t\t\t\t\t";
                    // line 324
                    echo twig_get_attribute($this->env, $this->source, $context["inactive"], "USERNAME_FULL", [], "any", false, false, false, 324);
                    echo "
\t\t\t\t\t";
                    // line 325
                    if (twig_get_attribute($this->env, $this->source, $context["inactive"], "POSTS", [], "any", false, false, false, 325)) {
                        echo "<br />";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("POSTS");
                        echo $this->extensions['phpbb\template\twig\extension']->lang("COLON");
                        echo " <strong>";
                        echo twig_get_attribute($this->env, $this->source, $context["inactive"], "POSTS", [], "any", false, false, false, 325);
                        echo "</strong> [<a href=\"";
                        echo twig_get_attribute($this->env, $this->source, $context["inactive"], "U_SEARCH_USER", [], "any", false, false, false, 325);
                        echo "\">";
                        echo $this->extensions['phpbb\template\twig\extension']->lang("SEARCH_USER_POSTS");
                        echo "</a>]";
                    }
                    // line 326
                    echo "\t\t\t\t</td>
\t\t\t\t<td style=\"vertical-align: top;\">";
                    // line 327
                    echo twig_get_attribute($this->env, $this->source, $context["inactive"], "JOINED", [], "any", false, false, false, 327);
                    echo "</td>
\t\t\t\t<td style=\"vertical-align: top;\">";
                    // line 328
                    echo twig_get_attribute($this->env, $this->source, $context["inactive"], "INACTIVE_DATE", [], "any", false, false, false, 328);
                    echo "</td>
\t\t\t\t<td style=\"vertical-align: top;\">";
                    // line 329
                    echo twig_get_attribute($this->env, $this->source, $context["inactive"], "LAST_VISIT", [], "any", false, false, false, 329);
                    echo "</td>
\t\t\t\t<td style=\"vertical-align: top;\">
\t\t\t\t\t";
                    // line 331
                    echo twig_get_attribute($this->env, $this->source, $context["inactive"], "REASON", [], "any", false, false, false, 331);
                    echo "
\t\t\t\t\t";
                    // line 332
                    if (twig_get_attribute($this->env, $this->source, $context["inactive"], "REMINDED", [], "any", false, false, false, 332)) {
                        echo "<br />";
                        echo twig_get_attribute($this->env, $this->source, $context["inactive"], "REMINDED_EXPLAIN", [], "any", false, false, false, 332);
                    }
                    // line 333
                    echo "\t\t\t\t</td>
\t\t\t</tr>
\t\t";
                    $context['_iterated'] = true;
                }
                if (!$context['_iterated']) {
                    // line 336
                    echo "\t\t\t<tr>
\t\t\t\t<td colspan=\"5\" style=\"text-align: center;\">";
                    // line 337
                    echo $this->extensions['phpbb\template\twig\extension']->lang("NO_INACTIVE_USERS");
                    echo "</td>
\t\t\t</tr>
\t\t";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['inactive'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 340
                echo "\t\t</tbody>
\t\t</table>
\t";
            }
            // line 343
            echo "
";
        }
        // line 345
        echo "
";
        // line 346
        $location = "overall_footer.html";
        $namespace = false;
        if (strpos($location, '@') === 0) {
            $namespace = substr($location, 1, strpos($location, '/') - 1);
            $previous_look_up_order = $this->env->getNamespaceLookUpOrder();
            $this->env->setNamespaceLookUpOrder(array($namespace, '__main__'));
        }
        $this->loadTemplate("overall_footer.html", "acp_main.html", 346)->display($context);
        if ($namespace) {
            $this->env->setNamespaceLookUpOrder($previous_look_up_order);
        }
    }

    public function getTemplateName()
    {
        return "acp_main.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  935 => 346,  932 => 345,  928 => 343,  923 => 340,  914 => 337,  911 => 336,  904 => 333,  899 => 332,  895 => 331,  890 => 329,  886 => 328,  882 => 327,  879 => 326,  866 => 325,  862 => 324,  858 => 322,  853 => 321,  846 => 317,  842 => 316,  838 => 315,  834 => 314,  830 => 313,  820 => 308,  815 => 306,  809 => 304,  807 => 303,  804 => 302,  799 => 299,  790 => 296,  786 => 295,  782 => 294,  778 => 293,  775 => 292,  771 => 291,  764 => 287,  760 => 286,  756 => 285,  752 => 284,  742 => 279,  737 => 277,  731 => 275,  729 => 274,  726 => 273,  722 => 271,  721 => 270,  714 => 266,  708 => 265,  703 => 263,  700 => 262,  693 => 258,  687 => 257,  681 => 255,  679 => 254,  672 => 250,  666 => 249,  661 => 247,  654 => 243,  648 => 242,  643 => 240,  636 => 236,  630 => 235,  625 => 233,  618 => 229,  614 => 228,  609 => 226,  602 => 222,  598 => 221,  593 => 219,  588 => 217,  585 => 216,  583 => 215,  570 => 205,  566 => 204,  560 => 201,  556 => 200,  550 => 197,  546 => 196,  540 => 193,  536 => 192,  530 => 189,  526 => 188,  520 => 185,  516 => 184,  510 => 181,  506 => 180,  500 => 177,  496 => 176,  487 => 170,  483 => 169,  475 => 163,  454 => 159,  449 => 157,  446 => 156,  444 => 155,  441 => 154,  438 => 153,  434 => 151,  428 => 149,  418 => 147,  416 => 146,  410 => 144,  408 => 143,  402 => 140,  398 => 139,  392 => 136,  388 => 135,  382 => 132,  378 => 131,  372 => 128,  368 => 127,  362 => 124,  358 => 123,  352 => 120,  348 => 119,  342 => 116,  338 => 115,  329 => 109,  325 => 108,  318 => 103,  317 => 102,  314 => 101,  308 => 98,  305 => 97,  303 => 96,  300 => 95,  294 => 92,  291 => 91,  289 => 90,  286 => 89,  283 => 88,  277 => 85,  273 => 84,  270 => 83,  268 => 82,  265 => 81,  259 => 78,  255 => 77,  252 => 76,  250 => 75,  247 => 74,  241 => 71,  237 => 70,  234 => 69,  232 => 68,  229 => 67,  223 => 64,  219 => 63,  216 => 62,  214 => 61,  211 => 60,  205 => 57,  201 => 56,  198 => 55,  195 => 54,  193 => 53,  190 => 52,  184 => 49,  180 => 48,  177 => 47,  175 => 46,  172 => 45,  166 => 42,  162 => 41,  159 => 40,  157 => 39,  154 => 38,  148 => 35,  145 => 34,  142 => 33,  130 => 30,  126 => 29,  123 => 28,  121 => 27,  110 => 25,  106 => 24,  102 => 23,  99 => 22,  97 => 21,  88 => 19,  85 => 18,  83 => 17,  78 => 15,  73 => 13,  70 => 12,  64 => 9,  59 => 7,  56 => 6,  54 => 5,  49 => 2,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "acp_main.html", "");
    }
}
