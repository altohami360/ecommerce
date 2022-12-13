<?php

namespace App\Services;

class DataFormate
{

    public Static function DataInRowTable($data)
    {
        $i = [];
        foreach ($data as $item) {
            array_push($i, '<tr>
                        <td>' . $item->product->name . '</td>
                        <td>' . $item->qty . '</td>
                        <td>' . $item->price . '</td>
                        <td>' . $item->total_price . '</td>
                    </tr>');
        }
        return $i;
    }
}
