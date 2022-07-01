<?php

return [
  'email_validation' => env('EMAIL_VALIDATION', true),
  'auth_menu' => env('AUTH_MENU', true),
  'terms' => env('AUTH_TERMS', true),
  'auth_role' => env('AUTH_ROLE', 'user'),
  'auth_teams' => env('AUTH_TEAMS', true),
  'auth_teams_reg' => env('AUTH_TEAMS_REGISTRATION', true),
];