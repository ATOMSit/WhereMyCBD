<?php

return [
    'fields' => [
        'first_name' => [
            'label' => "Prénom",
            'validations' => [
                'required' => "Le champ prénom est requis.",
                'regex' => "Le champ prénom doit absolument être une chaîne de caractères.",
                'min' => "Le champ prénom doit être composé au minimum de 2 caractères.",
                'max' => "Le champ prénom peut être composé au maximum de 255 caractères."
            ]
        ],
        'last_name' => [
            'label' => "Nom de famille",
            'validations' => [
                'required' => "Le champ nom de famille est requis.",
                'regex' => "Le champ nom de famille doit absolument être une chaîne de caractères.",
                'min' => "Le champ nom de famille doit être composé au minimum de 2 caractères.",
                'max' => "Le champ nom de famille peut être composé au maximum de 255 caractères."
            ]
        ],
        'description' => [
            'label' => "Description",
            'validations' => [
                'nullable' => "Le champ description n'est pas requis.",
                'string' => "Le champ description doit absolument être une chaîne de caractères.",
                'min' => "Le champ description doit être composé au minimum de 20 caractères.",
                'max' => "Le champ description peut être composé au maximum de 500 caractères."
            ]
        ],
        'birthdate' => [
            'label' => "Date de naissance",
            'validations' => [
                'nullable' => "Le champ date de naissance n'est pas requis.",
                'date' => "Le champ date de naissance doit absolument être une date au format valide."
            ]
        ],
        'email' => [
            'label' => "Adresse mail",
            'validations' => [
                'required' => "Le champ adresse mail est requis.",
                'email' => "Le champ adresse mail doit absolument être une adresse mail valide.",
                'max' => "Le champ adresse mail peut être composé au maximum de 255 caractères.",
                'unique' => "Cette adresse mail est éjà enregistré dans la base de données."
            ]
        ],
        'password' => [
            'label' => "Mot de passe",
            'validations' => [
                'required' => "Le champ mot de passe est requis.",
                'min' => "Le mot de passe doit être composé au minimum de 6 caractères.",
                'regex' => "Le mot de passe doit être composé d'une minuscule, d'une majuscule et d'un chiffre."
            ]
        ],
        'url_facebook' => [
            'label' => "Profil Facebook",
            'validations' => [
                'nullable' => "Le champ Facebook n'est pas requis.",
                'url' => "Le champ Facebook doit absolument être une adresse URL.",
                'regex' => "Le champ Facebook n'est pas une adresse Facebook valide."
            ]
        ],
        'url_instagram' => [
            'label' => "Profil Instagram",
            'validations' => [
                'nullable' => "Le champ Instagram n'est pas requis.",
                'url' => "Le champ Instagram doit absolument être une adresse URL.",
                'regex' => "Le champ Instagram n'est pas une adresse Instagram valide."
            ]
        ],
        'url_twitter' => [
            'label' => "Profil Twitter",
            'validations' => [
                'nullable' => "Le champ Twitter n'est pas requis.",
                'url' => "Le champ Twitter doit absolument être une adresse URL.",
                'regex' => "Le champ Twitter n'est pas une adresse Twitter valide."
            ]
        ],
        'url_linkedin' => [
            'label' => "Profil LinkedIn",
            'validations' => [
                'nullable' => "Le champ Linkedin n'est pas requis.",
                'url' => "Le champ Linkedin doit absolument être une adresse URL.",
                'regex' => "Le champ Linkedin n'est pas une adresse Linkedin valide."
            ]
        ],
        'url_website' => [
            'label' => "Site internet",
            'validations' => [
                'nullable' => "Le champ site internet n'est pas requis.",
                'url' => "Le champ site internet doit absolument être une adresse URL."
            ]
        ],
        'submit' => [
            'label' => "Sauvegarder"
        ]
    ],
];
