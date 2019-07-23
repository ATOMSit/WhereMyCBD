<?php

return [
    'fields' => [
        'name' => [
            'validations' => [
                'required' => "Le champ nom est requis.",
                'string' => "Le champ nom doit absolument être une chaîne de caractères.",
                'min' => "Le champ nom doit être composé au minimum de 2 caractères.",
                'max' => "Le champ nom peut être composé au maximum de 255 caractères."
            ]
        ],
        'description' => [
            'validations' => [
                'nullable' => "Le champ description n'est pas requis.",
                'string' => "Le champ description doit absolument être une chaîne de caractères.",
                'min' => "Le champ description doit être composé au minimum de 20 caractères.",
                'max' => "Le champ description peut être composé au maximum de 500 caractères."
            ]
        ],
    ],
];
