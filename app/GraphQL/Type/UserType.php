<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class UserType extends GraphQLType
{
    protected $attributes = [
        'name'  =>   'User',
        'description'   => 'A User'
    ];

    public function fields()
    {
        return [
           'id' => [
                'type'  => Type::nonNull(Type::string()),
                'description'   => 'The is of the user',
           ],
           'email' => [
                'type'  => Type::string(),
                'description'   => 'The email of user'
           ]
        ];
    }

    protected function resolveEmailField($root, $args)
    {
        return strtolower($root->email);
    }
}
