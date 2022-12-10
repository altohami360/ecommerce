<?php

namespace App\Services;

class AppendAttribute
{

    public function AppendCheckedToCollection($collection, $a)
    {
        $a = $a->map(fn ($a) => $a['id'])->toArray();

        $collection->map(function ($c) use ($a) {
            $c['checked'] = in_array($c->id, $a);
            return $c;
        });

        return $collection;
    }
}
