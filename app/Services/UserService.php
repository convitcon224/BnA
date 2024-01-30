<?php namespace App\Services;
use App\Models\UserModel;

class UserService extends BaseService
{
    private $user;

    function __construct(){
        parent::__construct();
        $this->user = new UserModel();
    }

    public function getAllUsers(){
        return $this->user->findAll();
    }

    public function addUserInfo($requestData){
        $validate = $this->validateAddUser($requestData);

        if ($validate->getErrors()){
            dd($validate->getErrors());
        }
        dd("Clear!");
    }

    private function validateAddUser($requestData){
        $rule = [
            "email" => "required|valid_email|is_unique[users.email]",
            "name" => "required|max_length[100]",
            "password" => "required|max_length[30]|min_length[6]",
            'pass_confirm' => 'required|max_length[30]|matches[password]',
            "phone" => "required|regex_match[/^[0-9]{30}$/]|is_unique[users.phone]",
        ];

        // $message = [
        //     "email" => [
        //         "valid_email" => "Account {field} {value}",
        //         "is_unique" => "",
        //     ],
        // ];

        $this->validation->setRules($rule);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
}