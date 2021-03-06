<?php
/*
 Copyright (c) 2018 [Glacies UG, Berlin, Germany] (http://glacies.de)
 Developer: Thilina Hasantha (http://lk.linkedin.com/in/thilinah | https://github.com/thilinah)
 */

$moduleName = 'dashboard';
$moduleGroup = 'modules';
define('MODULE_PATH',dirname(__FILE__));
include APP_BASE_PATH.'header.php';
include APP_BASE_PATH.'modulejslibs.inc.php';
?><div class="span9">

    <div class="row">

        <?php
        $moduleManagers = \Classes\BaseService::getInstance()->getModuleManagers();
        $dashBoardList = array();
        foreach($moduleManagers as $moduleManagerObj){

            $allowed = \Classes\BaseService::getInstance()->isModuleAllowedForUser($moduleManagerObj);

            if(!$allowed){
                continue;
            }

            $item = $moduleManagerObj->getDashboardItem();
            if(!empty($item)) {
                $index = $moduleManagerObj->getDashboardItemIndex();
                $dashBoardList[$index] = $item;
            }
        }

        ksort($dashBoardList);

        foreach($dashBoardList as $k=>$v){
            echo \Classes\LanguageManager::translateTnrText($v);
        }
        ?>




    </div>

</div>
<script>
var modJsList = new Array();

modJsList['tabDashboard'] = new DashboardAdapter('Dashboard','Dashboard');

var modJs = modJsList['tabDashboard'];
/*
$("#employeeLink").attr("href",modJs.getCustomUrl('?g=admin&n=employees&m=admin_Admin'));
$("#jobsLink").attr("href",modJs.getCustomUrl('?g=admin&n=jobpositions&m=admin_Recruitment'));
$("#candidatesLink").attr("href",modJs.getCustomUrl('?g=admin&n=candidates&m=admin_Recruitment'));
$("#projectAdminLink").attr("href",modJs.getCustomUrl('?g=admin&n=projects&m=admin_Admin'));
$("#trainingLink").attr("href",modJs.getCustomUrl('?g=admin&n=training&m=admin_Admin'));
$("#travelLink").attr("href",modJs.getCustomUrl('?g=admin&n=travel&m=admin_Employees'));
$("#documentLink").attr("href",modJs.getCustomUrl('?g=admin&n=documents&m=admin_Employees'));
$("#expenseLink").attr("href",modJs.getCustomUrl('?g=admin&n=expenses&m=admin_Employees'));



$("#myProfileLink").attr("href",modJs.getCustomUrl('?g=modules&n=employees&m=module_Personal_Information'));
$("#atteandanceLink").attr("href",modJs.getCustomUrl('?g=modules&n=attendance&m=module_Time_Management'));
$("#leavesLink").attr("href",modJs.getCustomUrl('?g=modules&n=leaves&m=module_Leaves'));
$("#timesheetLink").attr("href",modJs.getCustomUrl('?g=modules&n=time_sheets&m=module_Time_Management'));
$("#projectsLink").attr("href",modJs.getCustomUrl('?g=modules&n=projects&m=module_Personal_Information'));
$("#myDocumentsLink").attr("href",modJs.getCustomUrl('?g=modules&n=documents&m=module_Documents'));
$("#mytravelLink").attr("href",modJs.getCustomUrl('?g=modules&n=travel&m=module_Travel_Management'));
$("#myExpensesLink").attr("href",modJs.getCustomUrl('?g=modules&n=expenses&m=module_Finance'));

modJs.getPunch();
modJs.getInitData();
*/

</script>
<?php include APP_BASE_PATH.'footer.php';?>
