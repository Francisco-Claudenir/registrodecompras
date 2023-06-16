<?php

namespace App\Observers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuditoriaObserver
{
    public function setInDatabase($event, $old, $new, $table, $key)
    {
        $data = [
            'user_type' => Auth::check() ? 'users' : "Seed",
            'user_id' => Auth::user()->id ?? null,
            'event' => $event,
            'table_log' => $table,
            'table_id' => strval($key),
            'old_values' => $old,
            'new_values' => $new,
            'url' => request()->fullUrl(),
            'ip_address' => request()->getClientIp(),
            'user_agent' => request()->userAgent(),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ];

        DB::table('auditorias')->insert($data);
    }

    public function created(Model $model)
    {
        $new = json_encode($model->toArray(), JSON_UNESCAPED_UNICODE);

        $this->setInDatabase('CREATED', null, $new, $model->getTable(), $model->getKey());
    }

    public function updated(Model $model)
    {
        $new = json_encode($model->getDirty(), JSON_UNESCAPED_UNICODE);
        $old = json_encode($model->getOriginal(), JSON_UNESCAPED_UNICODE);
        $this->setInDatabase('UPDATED', $old, $new, $model->getTable(), $model->getKey());
    }

    public function deleted(Model $model)
    {
        $old = json_encode($model->toArray(), JSON_UNESCAPED_UNICODE);
        $this->setInDatabase('DELETED', $old, null, $model->getTable(), $model->getKey());
    }
}
