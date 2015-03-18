<?php
/**
 * @autor       -  jochen.mandl / mandl.js@googlemail.com
 * @date        -  12.03.2015
 * @time        -  21:13
 * @description -
 *
 * @package Security\Service
 */
require_once "../../bootstrap.php";

use Security\Service\Security;
use Security\FactorySecurity;

$moderator = FactorySecurity::factory('Moderator');
$admin     = FactorySecurity::factory('Admin');
$start = time()+(double)microtime();



if(!$moderator->hasPermission(Security::WRITE_POST)) {
    writePost('Moderator', 'Group (%s) has NO write rights to post.');
}
if($moderator->addGroup( Security::WRITE_POST)) {
    writePost('Moderator', 'Group (%s) has now also write right.');
}
if($moderator->hasPermission(Security::WRITE_POST)) {
    writePost('Moderator');
}
print ("<hr>");

if($admin->hasPermission(Security::WRITE_POST)) {
    writePost('Admin');
}
if($admin->removeGroup(Security::WRITE_POST)) {
    writePost('Admin', 'Group (%s) now has none, write more right');
}
if(!$admin->hasPermission(Security::WRITE_POST)) {
    writePost('Admin', 'Group (%s) has NO write rights to post.');
}

/**
 * @method writePost
 *
 * @param $group
 * @param string $message
 */
function writePost($group, $message = 'Group (%s) has write rights to post.') {
    printf($message."<br>", $group);
}



