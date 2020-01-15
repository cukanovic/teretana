@input([
    'name' => 'name',
    'labelTranslation' => 'first.fields.nameLabel',
    'default' => $training->name,
])

@textarea([
    'name' => 'description',
    'labelTranslation' => 'first.fields.descriptionLabel',
    'default' => $training->description,
])

@input([
    'type' => 'number',
    'name' => 'price',
    'labelTranslation' => 'first.fields.priceLabel',
    'default' => $training->price,
])

@input([
    'type' => 'number',
    'name' => 'number_of_sessions',
    'labelTranslation' => 'first.fields.countLabel',
    'default' => $training->number_of_sessions,
])

@dropdown([
    'name' => 'difficulty',
    'labelTranslation' => 'first.fields.enumLabel',
    'options' => [
        'easy' => __('first.fields.enumOptions.first'),
        'medium' => __('first.fields.enumOptions.second'),
        'hard' => __('first.fields.enumOptions.third'),
        'insane' => __('first.fields.enumOptions.fourth'),
    ],
])

@dropdown([
    'name' => 'trainer_id',
    'labelTranslation' => 'first.fields.relationshipLabel',
    'options' => $trainers->keyBy('id')->pluck('name'),
])