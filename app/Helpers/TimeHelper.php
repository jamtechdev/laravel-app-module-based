<?php

use Carbon\Carbon;

if (!function_exists('timeAgo')) {
    /**
     * Format a given date to display how long ago it was.
     *
     * @param  \Carbon\Carbon $date
     * @return string
     */
    function timeAgo(Carbon $date)
    {
        $now = Carbon::now();
        $diff = $now->diff($date);

        if ($diff->y) {
            return $diff->y . ' year' . ($diff->y > 1 ? 's' : '') . ' ago';
        }
        if ($diff->m) {
            return $diff->m . ' month' . ($diff->m > 1 ? 's' : '') . ' ago';
        }
        if ($diff->d) {
            return $diff->d . ' day' . ($diff->d > 1 ? 's' : '') . ' ago';
        }
        if ($diff->h) {
            return $diff->h . ' hour' . ($diff->h > 1 ? 's' : '') . ' ago';
        }
        if ($diff->i) {
            return $diff->i . ' minute' . ($diff->i > 1 ? 's' : '') . ' ago';
        }
        if ($diff->s) {
            return $diff->s . ' second' . ($diff->s > 1 ? 's' : '') . ' ago';
        }

        return 'just now';
    }
}
