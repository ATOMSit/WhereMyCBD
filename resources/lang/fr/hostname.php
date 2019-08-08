<?php

return [
    'fields' => [
        'fqdn' => [
            'validations' => [
                'required' => "Le nom de domaine est requis.",
                'fqdn' => "Le nom de domaine n'est pas un nom de domaine valide.",
                'max' => "Le nom de domaine ne peut être composé au maximum de 100 caractères.",
                'unique'=>"Le nom de domaine est déjà enregistré dans la base de données."
            ]
        ]
    ],
];
