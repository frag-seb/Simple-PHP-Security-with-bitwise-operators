<?php
/**
 * Created by PhpStorm.
 * User: jochen.mandl
 * Date: 12.03.2015
 * Time: 21:13
 */

namespace Security\Service;

/**
 * Interface Security
 * @package Security\Service
 */
interface Security
{

    /**
     * @calculation:
     * (1<<0) = 0000000001 = 1
     * (1*1) = 1
     * WRITE_POST
     */
    const WRITE_POST    = 1;

    /**
     * @calculation:
     * (1<<1) = 0000000010 = 2
     * (1*2)+(0*1)... = 2
     * READ_POST
     */
    const READ_POST     = 2;

    /**
     * @calculation:
     * (1<<2) = 0000000100 = 4
     * (1*4)+(0*2)+(0*1) = 4
     * DELETE_POST
     */
    const DELETE_POST   = 4;

    /**
     * @calculation:
     * (1<<3) = 0000001000 = 8
     * (1*8)+(0*4)+(0*2)+(0*1) = 8
     * DELETE_POSTS
     */
    const DELETE_POSTS  = 8;

    /**
     * @calculation:
     * (1<<4) = 0000010000 = 16
     * (1*16)+(0*8)+(0*4)+(0*2)+(0*1). = 16
     * READ_POSTS
     */
    const READ_POSTS    = 16;

    /**
     * @calculation:
     * (1<<5) = 0000100000 = 32
     * (1*32)+(0*16)+(0*8)+(0*4)+(0*2)+(0*1) = 32
     * WRITE_USER
     */
    const WRITE_USER    = 32;

    /**
     * @calculation:
     * (1<<6) = 0001000000 = 64
     * (1*64)+(0*32)+(0*16)+(0*8)+(0*4)+(0*2)+(0*1) = 64
     * READ_USER
     */
    const READ_USER     = 64;

    /**
     * @calculation:
     * (1<<7) = 0010000000 = 128
     * (1*128)+(0*64)+(0*32)+(0*16)+(0*8)+(0*4)+(0*2)+(0*1) = 128
     * DELETE_USER
     */
    const DELETE_USER   = 128;

    /**
     * @calculation:
     * (1<<8) = 0100000000 = 256
     * (1*256)+(0*128)+(0*64)+(0*32)+(0*16)+(0*8)+(0*4)+(0*2)+(0*1)  = 256;
     */
    const DELETE_USERS   = 256;

    /**
     * @calculation:
     * (1<<9) = 1000000000 = 512
     * (1*512)+(0*256)+(0*128)+(0*64)+(0*32)+(0*16)+(0*8)+(0*4)+(0*2)+(0*1) = 512
     * READ_USERS
     */
    const READ_USERS    = 512;

    /**
     * Set authorization for the Group
     * @method __construct
     */
    public function __construct();

    /**
     * Adds a new authorization of Group added
     * @method addGroup
     *
     * @param $type
     * @param $group
     * @return bool
     */
    public function addGroup($group);

    /**
     * Removes a new authorization of Group added
     * @method removeGroup
     *
     * @param $group
     * @return bool
     */
    public function removeGroup($group);

    /**
     * Checks if the authorization is available
     * @method hasPermission
     *
     * @param $permission
     * @return bool
     */
    public function hasPermission($permission);

}