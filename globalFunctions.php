<?php

function toast(string $icon, string $title, int $timer = 1000): array
{
    return [
        "toast" => true,
        "icon"  => $icon,
        "title"   => $title,
        "position"  => "top-end",
        "timer" => $timer,
        "timerProgressBar"  => true,
        "showConfirmButton" => false,
    ];
}
