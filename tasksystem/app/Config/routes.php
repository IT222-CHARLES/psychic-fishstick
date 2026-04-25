<?php

return [
    '/' => 'Public@index',
    '/login' => 'Public@login',
    '/register' => 'Public@register',
    '/logout' => 'Public@logout',

    '/auth/authenticate' => 'Auth@authenticate',
];