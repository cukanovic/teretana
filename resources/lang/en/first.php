<?php

return [
    'heading' => 'Treninzi',
    'list' => [
        'relationship' => [
            'count' => '{0} Nema rezervacija|[1] 1 rezervacija|[2, 4] :value rezervacije|[5,*] :value rezervacija'
        ],
        '{0} There are none|[1,19] There are some|[20,*] There are many'
    ],
    'create' => [
        'cta' => 'Dodaj trening',
        'heading' => 'Novi trening',
        'submitCta' => 'Dodaj',
        'cancelCta' => 'Odustani',
    ],
    'fields' => [
        'nameLabel' => 'Ime',
        'descriptionLabel' => 'Opis',
        'priceLabel' => 'Cena',
        'countLabel' => 'Broj treninga',
        'enumLabel' => 'Težina',
        'enumOptions' => [
            'first' => 'Lako',
            'second' => 'Srednje',
            'third' => 'Teško',
            'fourth' => 'Nemoguće',
        ],
        'relationshipLabel' => 'Trener',
    ]
];
