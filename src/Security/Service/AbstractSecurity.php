<?php
/**
 * Created by PhpStorm.
 * User: jochen.mandl
 * Date: 12.03.2015
 * Time: 21:13
 */

namespace Security\Service;

/**
 * Class AbstractSecurity
 * @package Security\Service
 */
class AbstractSecurity
{
    /**
     * @var null
     */
    protected $group = null;

    /**
     * Adds a new authorization of Groupe added
     * @example:  111011 | 000100 = 111111
     *
     * @method addGroup
     *
     * @param $group
     * @return bool
     */
    public function addGroup($group)
    {
        if($this->hasPermission($group)){
            return false;
        }
        $this->group |= $group;
        return true;
    }

    /**
     * Removes a new authorization of Group added
     * @example:  111111 ^ 000100 = 111011
     *
     * @method removeGroup
     *
     * @param $group
     * @return bool
     */
    public function removeGroup($group)
    {
        if(!$this->hasPermission($group)){
            return false;
        }
        $this->group ^= $group;
        return true;
    }

    /**
     * Checks if the authorization is available
     * @example:  (111111 & 000100) = 000100 === 000100
     *
     * @method hasPermission
     *
     * @param $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        return (boolean) (($this->group & $permission) === $permission);
    }
}