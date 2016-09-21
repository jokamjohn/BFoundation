<?php

/**
 * @param $user
 * @return bool
 */
function seeker($user)
{
    return $user->admin == 0 && $user->employer == 0;
}

/**
 * @return int|null
 */
function userId()
{
    return Auth::id();
}

