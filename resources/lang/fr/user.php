<?php

return [
    'fields' => [
        'first_name' => [
            'validations' => [
                'required' => "Le champ prénom est requis.",
                'string' => "Le champ prénom doit absolument être une chaîne de caractères.",
                'min' => "Le champ prénom doit être composé au minimum de 2 caractères.",
                'max' => "Le champ prénom peut être composé au maximum de 255 caractères."
            ]
        ],
        'last_name' => [
            'validations' => [
                'required' => "Le champ nom de famille est requis.",
                'string' => "Le champ nom de famille doit absolument être une chaîne de caractères.",
                'min' => "Le champ nom de famille doit être composé au minimum de 2 caractères.",
                'max' => "Le champ nom de famille peut être composé au maximum de 255 caractères."
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
        'birthdate' => [
            'validations' => [
                'nullable' => "Le champ date de naissance n'est pas requis.",
                'date' => "Le champ date de naissance doit absolument être une date au format valide."
            ]
        ],
        'email' => [
            'validations' => [
                'nullable' => "Le champ adresse mail est requis.",
                'email' => "Le champ adresse mail doit absolument être une adresse mail valide.",
                'max' => "Le champ adresse mail peut être composé au maximum de 255 caractères.",
                'unique' => "Cette adresse mail est éjà enregistré dans la base de données."
            ]
        ],
        'password' => [
            'validations' => [
                'required' => "Le champ mot de passe est requis.",
            ]
        ],
        'url_facebook' => [
            'validations' => [
                'nullable' => "Le champ Facebook n'est pas requis.",
                'url' => "Le champ Facebook doit absolument être une adresse URL.",
                'regex' => "Le champ Facebook n'est pas une adresse Facebook valide."
            ]
        ],
        'url_instagram' => [
            'validations' => [
                'nullable' => "Le champ Instagram n'est pas requis.",
                'url' => "Le champ Instagram doit absolument être une adresse URL.",
                'regex' => "Le champ Instagram n'est pas une adresse Instagram valide."
            ]
        ],
        'url_twitter' => [
            'validations' => [
                'nullable' => "Le champ Twitter n'est pas requis.",
                'url' => "Le champ Twitter doit absolument être une adresse URL.",
                'regex' => "Le champ Twitter n'est pas une adresse Twitter valide."
            ]
        ],
        'url_linkedin' => [
            'validations' => [
                'nullable' => "Le champ Linkedin n'est pas requis.",
                'url' => "Le champ Linkedin doit absolument être une adresse URL.",
                'regex' => "Le champ Linkedin n'est pas une adresse Linkedin valide."
            ]
        ],
        'url_website' => [
            'validations' => [
                'nullable' => "Le champ site internet n'est pas requis.",
                'url' => "Le champ site internet doit absolument être une adresse URL."
            ]
        ]
    ],
];
