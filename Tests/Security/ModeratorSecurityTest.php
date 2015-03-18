<?php
namespace Tests\Security;

use Security\ModeratorSecurity;

/**
 * Class ModeratorSecurityTest
 *
 * @autor       -  jochen.mandl / mandl.js@googlemail.com
 * @date        -  12.03.2015
 * @time        -  20:02
 * @description -
 *
 * @package Tests\Security
 */
class ModeratorSecurityTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var ModeratorSecurity $moderator
     */
    private $moderator;

    /**
     * @see ModeratorSecurityTest::setUp()
     *
     */
    protected function setUp()
    {
        $this->moderator = new ModeratorSecurity();
    }

    /**
     * @see ModeratorSecurityTest::expectedGroups()
     *
     * @return array
     */
    public function expectedGroups()
    {
        return array(
            array(
                array(
                    'WRITE_POST'    => ModeratorSecurity::WRITE_POST,
                    'READ_POST'     => ModeratorSecurity::READ_POST,
                    'DELETE_POST'   => ModeratorSecurity::DELETE_POST,
                    'DELETE_POSTS'  => ModeratorSecurity::DELETE_POSTS,
                    'READ_POSTS'    => ModeratorSecurity::READ_POSTS,
                    'WRITE_USER'    => ModeratorSecurity::WRITE_USER,
                    'READ_USER'     => ModeratorSecurity::READ_USER,
                    'DELETE_USER'   => ModeratorSecurity::DELETE_USER,
                    'DELETE_USERS'  => ModeratorSecurity::DELETE_USERS,
                    'READ_USERS'    => ModeratorSecurity::READ_USERS
                )
            )
        );
    }

    /**
     * @see ModeratorSecurityTest::testModeratorSecurityHasNotPermissionWritePost()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertFalse
     */
    public function testModeratorSecurityHasNotPermissionWritePost($expected)
    {
        $this->assertFalse($this->moderator->hasPermission($expected['WRITE_POST']));
    }

    /**
     * @see ModeratorSecurityTest::testModeratorSecurityHasPermissionReadPost()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testModeratorSecurityHasPermissionReadPost($expected)
    {
        $this->assertTrue($this->moderator->hasPermission($expected['READ_POST']));
    }

    /**
     * @see ModeratorSecurityTest::testModeratorSecurityHasPermissionDeletePost()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testModeratorSecurityHasPermissionDeletePost($expected)
    {
        $this->assertTrue($this->moderator->hasPermission($expected['DELETE_POST']));
    }

    /**
     * @see ModeratorSecurityTest::testModeratorSecurityHasNotPermissionReadPosts()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertFalse
     */
    public function testModeratorSecurityHasNotPermissionReadPosts($expected)
    {
        $this->assertFalse($this->moderator->hasPermission($expected['READ_POSTS']));
    }

    /**
     * @see ModeratorSecurityTest::testModeratorSecurityHasNotPermissionWriteUser()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertFalse
     */
    public function testModeratorSecurityHasNotPermissionWriteUser($expected)
    {
        $this->assertFalse($this->moderator->hasPermission($expected['WRITE_USER']));
    }

    /**
     * @see ModeratorSecurityTest::testModeratorSecurityHasPermissionDeleteUser()
     *
     * @dataProvider expectedGroups
     * @param $expected     *
     *
     * @Assert assertTrue
     */
    public function testModeratorSecurityHasPermissionDeleteUser($expected)
    {
        $this->assertTrue($this->moderator->hasPermission($expected['DELETE_USER']));
    }

    /**
     * @see ModeratorSecurityTest::testModeratorSecurityHasNotPermissionDeleteUsers()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertFalse
     */
    public function testModeratorSecurityHasNotPermissionDeleteUsers($expected)
    {
        $this->assertFalse($this->moderator->hasPermission($expected['DELETE_USERS']));
    }

    /**
     * @see ModeratorSecurityTest::testModeratorSecurityHasPermissionReadUsers()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testModeratorSecurityHasPermissionReadUsers($expected)
    {
        $this->assertTrue($this->moderator->hasPermission($expected['READ_USERS']));
    }

    /**
     * @see ModeratorSecurityTest::testModeratorSecurityRemoveGroup()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testModeratorSecurityRemoveGroup($expected)
    {
        $this->assertTrue($this->moderator->removeGroup($expected['READ_USERS']));
    }

    /**
     * @see ModeratorSecurityTest::testModeratorSecurityRemoveGroupThenHasNotPermission()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertFalse
     */
    public function testModeratorSecurityRemoveGroupThenHasNotPermission($expected)
    {
        $this->moderator->removeGroup($expected['READ_USERS']);
        $this->assertFalse($this->moderator->hasPermission($expected['READ_USERS']));
    }

    /**
     * @see ModeratorSecurityTest::testModeratorSecurityAddGroup()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testModeratorSecurityAddGroup($expected)
    {
        $this->moderator->removeGroup($expected['READ_USERS']);

        $this->assertTrue($this->moderator->addGroup($expected['READ_USERS']));
    }

    /**
     * @see ModeratorSecurityTest::testModeratorSecurityAddGroupThenHasPermission()
     *
     * @dataProvider expectedGroups
     * @param $expected
     *
     * @Assert assertTrue
     */
    public function testModeratorSecurityAddGroupThenHasPermission($expected)
    {
        $this->moderator->removeGroup($expected['READ_USERS']);

        $this->moderator->addGroup($expected['READ_USERS']);
        $this->assertTrue($this->moderator->hasPermission($expected['READ_USERS']));
    }
}