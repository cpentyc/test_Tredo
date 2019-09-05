<?php
/**
 * Created by PhpStorm.
 * User: cpentyc
 * Date: 05.09.2019
 * Time: 14:53
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * This is the model class for table "employee".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property int $wage
 * @property int $gender 1-муж, 0-жен
 * @property int $created_at
 * @property int $updated_at
 */
class Employee extends Model
{
    //

    /**
     * Отделы сотрудника
     */
    public function departments()
    {
        return $this->belongsToMany('App\Department');
    }
}
