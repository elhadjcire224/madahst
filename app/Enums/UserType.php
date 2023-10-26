<?php
namespace App\Enums;
enum UserType: string
{
    case Employe = "Employe";
    case Client = 'Client';
    case Developpeur = 'Developpeur';
}
