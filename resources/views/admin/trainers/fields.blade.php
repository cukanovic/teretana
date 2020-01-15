@input([
    'name' => 'name',
    'labelTranslation' => 'second.fields.name',
    'default' => $trainer->name,
])

@input([
    'name' => 'email',
    'labelTranslation' => 'second.fields.email',
    'default' => $trainer->email,
])

@input([
    'name' => 'password',
    'inputType' => 'password',
    'labelTranslation' => 'second.fields.password',
    'skipDefault' => true,
])