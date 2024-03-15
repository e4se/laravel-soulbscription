<?php

namespace LucasDotVin\Soulbscription\Models\Concerns;

use Illuminate\Support\Carbon;
use LucasDotVin\Soulbscription\Enums\PeriodicityType;

trait HandlesRecurrence
{
    public function calculateNextRecurrenceEnd(Carbon|string $start = null): Carbon
    {
        if (empty($start)) {
            $start = now();
        }

        if (is_string($start)) {
            $start = Carbon::parse($start);
        }

        $expirationDate = $start->copy()->add($this->periodicity_type, $this->periodicity);

        return $expirationDate;
    }
}
