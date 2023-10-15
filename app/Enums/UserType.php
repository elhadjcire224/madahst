<?php
namespace App\Enums;
enum UserType: string
{
    case Admin = 'Admin';
    case Employe = "Employe";
    case Client = 'Client';
    case Developpeur = 'Developpeur';
}
