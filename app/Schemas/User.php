<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $role
 * @property boolean $admin
 * @property string $remember_token
 * @property string $created_at
 * @property string $updated_at
 * @property string $active
 */


/** @OA\Schema(
 *     title="User",
 *     @OA\Xml(
 *         name="User"
 *     )
 *   )
 */




class User extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'role', 'admin', 'remember_token', 'created_at', 'updated_at', 'active'];

}
