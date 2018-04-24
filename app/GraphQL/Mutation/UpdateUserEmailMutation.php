<?php

namespace App\GraphQL\Mutation;

use GraphQL;
use App\User;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;

class UpdateUserEmailMutation extends Mutation
{
    protected $attributes = [
        'name'  => 'UpdateUserEmail',
    ];

    public function type()
    {
        return GraphQL::type('User');
    }

    public function args()
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::string(),
                'rules'  => ['required']
            ],
            'email' => [
                'name' =>'email',
                'type' => Type::string(),
                'rules'  => ['required', 'email'],
            ]
        ];
    }

//    public function rules()
//    {
//        return [
//            'id'    => ['required'],
//            'email' => ['required', 'email'],
//        ];
//    }

    public function resolve($root, $args)
    {
        $user = User::find($args['id']);
        if(!$user){
            return null;
        }
        $user->email = $args['email'];
        $user->save();
        return $user;
    }
}
