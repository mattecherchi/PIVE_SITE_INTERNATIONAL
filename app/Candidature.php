<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidature extends Model
{
    protected $table='candidatures';
    protected $primaryKey='email';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $connection = 'mysql';
    protected $fillable = [
        'email',
        'prenom',
        'nom',
        'date_naissance',
        'nationalite',
        'adresse_fixe',
        'code_postal',
        'ville',
        'tel_fixe',
        'portable',
        'boursier',
        'region_origine',
        'annee_entree',
        'annee_actuelle',
        'diplome_choisi',
        'specialisation',
        'langue1',
        'annee_langue1',
        'langue2',
        'annee_langue2',
        'langue3',
        'annee_langue3',
        'toeic',
        'annee_toeic',
        'deja_parti_erasmus',
        'destination_erasmus',
        'date_erasmus',
        'choix1',
        'semestre_choix1',
        'choix2',
        'semestre_choix2',
        'choix3',
        'semestre_choix3',
        'signature'
    ];
}
