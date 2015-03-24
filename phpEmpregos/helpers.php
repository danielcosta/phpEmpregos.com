<?php

use Illuminate\Support\Str;

function get_php_version()
{
    return preg_replace('/-.*/', '', PHP_VERSION);
}

function date_database_2_atom($date)
{
    $oDate = new \DateTime($date);
    return $oDate->format(\DateTime::ATOM);
}

function get_or_fallback($data, $fallback = 'Não Disponível')
{
    return $data ?: $fallback;
}

function vaga_slug($job, $prefix = 'vaga-')
{
    if (!is_object($job)) {
        $job = Job::findOrFail($job);
    }

    return Str::slug($prefix . $job->title . '-' . $job->id);
}

function get_slug_id($slug)
{
    if (strstr($slug, '-')) {
        if (preg_match('/.*-(\d+)$/', $slug, $matches)) {
            $slug = $matches[1];
        }
    }

    return $slug;
}

function get_callee()
{
    $callers = debug_backtrace();
    return $callers[2]['function'];
}

function paginate($iCurrentPage, $iTotalPages, $iBoudaries, $iAround)
{
    $aPaginator = [];

    for ($i=1; $i<=$iTotalPages; $i++) {

        if ($iBoudaries) {
            if (($iBoudaries >= $i) || ($iTotalPages - $i < $iBoudaries)) {
                $aPaginator[$i] = $i;
                continue;
            }
        }

        if ($iAround) {
            if (abs($iCurrentPage - $i) <= $iAround) {
                $aPaginator[$i] = $i;
                continue;
            }
        }

        if ($i == $iCurrentPage) {
            $aPaginator[$i] = $i;
            continue;
        }

        if (!isset($aPaginator[$i - 1]) || (isset($aPaginator[$i - 1]) && false === $aPaginator[$i - 1])) {
            continue;
        } else {
            $aPaginator[$i] = false;
        }
    }

    return $aPaginator;
}

function date_format_2($sDate, $sFormat = 'd/m/Y', $sDefault = '')
{
    if (!$sDate) {
        return $sDefault;
    }

    $oDate = new \DateTime($sDate);
    return $oDate->format($sFormat);
}

function clean($sInput)
{
    return trim(strip_tags($sInput));
}