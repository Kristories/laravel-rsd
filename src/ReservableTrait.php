<?php

namespace Kristories\Rsd;

trait ReservableTrait
{
    /**
     * Reserved
     *
     * @param  \Illuminate\Database\Eloquent\Builder    $query
     * @param  string                                   $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    function scopeReserved($query, $value)
    {
        if (!property_exists($this, 'reserved_column')) {
            throw new \Exception('$reserved_column not found!');
        }

        $query->where($this->reserved_column, $value);

        if (method_exists($this, 'scopeReservedExtra')) {
            $query->reservedExtra();
        }

        return $query;
    }
}
