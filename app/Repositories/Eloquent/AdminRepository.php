<?php

namespace App\Repositories\Eloquent;

use App\Models\Admin;
use App\Repositories\AdminREpositoryInterface;

class AdminRepository extends BaseRepository implements AdminREpositoryInterface
{
    protected $model;

    public function __construct(Admin $model)
    {
        $this->model = $model;
    }
}
