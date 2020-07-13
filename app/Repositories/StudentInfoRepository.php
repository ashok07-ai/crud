<?php

namespace App\Repositories;

use App\Models\StudentInfo;
use App\Repositories\BaseRepository;

/**
 * Class StudentInfoRepository
 * @package App\Repositories
 * @version July 11, 2020, 2:52 pm UTC
*/

class StudentInfoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'address',
        'description'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return StudentInfo::class;
    }
}
