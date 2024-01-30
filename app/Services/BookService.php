<?php namespace App\Services;
use App\Models\BookModel;
use App\Common\ResultUtils;
use Exception;

class BookService extends BaseService
{
    private $book;

    function __construct(){
        parent::__construct();
        $this->book = new BookModel();
        $this->book->protect(false);
    }

    public function getAllBooks(){
        return $this->book->findAll();
    }

    public function getSearchedBook($type,$detail){
        if($type=="Categories"){
            return $this->book->like("type",$detail)->get()->getResultArray();
        }elseif($type=="Book ID"){
            return $this->book->like("bookID",$detail)->get()->getResultArray();
        }elseif($type=="Title"){
            return $this->book->like("title",$detail)->get()->getResultArray();
        }elseif($type=="Author"){
            return $this->book->like("author",$detail)->get()->getResultArray();
        }else{
            return [];
        }
    }

    // Primary key
    public function getBookByID($id){
        return $this->book->find($id);
    }

    public function addNewBook($requestData){
        $validate = $this->validateNewBook($requestData);

        if ($validate->getErrors()){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  $validate->getErrors()
            ];
        }
        // dd($requestData->getPost());
        try{
            $this->book->save($requestData->getPost());
            return[
                'status'        =>  ResultUtils::STATUS_CODE_OK,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_OK,
                'messages'      =>  ["Added book successfully"]
            ];
        } catch (Exception $e){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  [$e->getMessage()]
            ];
        }
    }

    private function validateNewBook($requestData){
        $rule = [
            "bookID" => "required|is_unique[books.bookID]|max_length[20]",
            "title" => "required|max_length[255]",
            "author" => "required|max_length[255]",
            'book_condition' => 'required|max_length[100]',
            'type' => 'required|max_length[255]',
        ];

        $message = [
            "bookID" => [
                "required" => "The ID field is required.",
                "is_unique" => "The ID field must contain a unique value.",
                "max_length" => "The ID field cannot exceed 20 characters in length."
            ],
            "title" => [
                "required" => "The Title field is required.",
                "max_length" => "The Title field cannot exceed 255 characters in length."
            ],
            "author" => [
                "required" => "The Author field is required.",
                "max_length" => "The Author field cannot exceed 255 characters in length."
            ],
            "book_condition" => [
                "required" => "The Condition field is required.",
                "max_length" => "The Condition field cannot exceed 100 characters in length."
            ],
            "type" => [
                "required" => "The Type field is required.",
                "max_length" => "The Type field cannot exceed 255 characters in length."
            ],
        ];

        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    public function updateBook($requestData){
        $validate = $this->validateUpdateBook($requestData);

        if ($validate->getErrors()){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  $validate->getErrors()
            ];
        }

        $dataUpdate = $requestData->getPost();
        if(!empty($dataUpdate)){
            unset($dataUpdate['book_cover']);
        }

        try{
            $this->book->save($dataUpdate);
            return[
                'status'        =>  ResultUtils::STATUS_CODE_OK,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_OK,
                'messages'      =>  ["Updated book successfully"]
            ];
        } catch (Exception $e){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  [$e->getMessage()]
            ];
        }
    }

    private function validateUpdateBook($requestData){
        $rule = [
            "bookID" => "required|is_unique[books.bookID,id,".$requestData->getPost()['id']."]|max_length[20]",
            "title" => "required|max_length[255]",
            "author" => "required|max_length[255]",
            'book_condition' => 'required|max_length[100]',
            'type' => 'required|max_length[255]',
        ];

        $message = [
            "bookID" => [
                "required" => "The ID field is required.",
                "is_unique" => "The ID field must contain a unique value.",
                "max_length" => "The ID field cannot exceed 20 characters in length."
            ],
            "title" => [
                "required" => "The Title field is required.",
                "max_length" => "The Title field cannot exceed 255 characters in length."
            ],
            "author" => [
                "required" => "The Author field is required.",
                "max_length" => "The Author field cannot exceed 255 characters in length."
            ],
            "book_condition" => [
                "required" => "The Condition field is required.",
                "max_length" => "The Condition field cannot exceed 100 characters in length."
            ],
            "type" => [
                "required" => "The Type field is required.",
                "max_length" => "The Type field cannot exceed 255 characters in length."
            ],
        ];

        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    public function deleteBook($id){
        try{
            $this->book->delete($id);
            return[
                'status'        =>  ResultUtils::STATUS_CODE_OK,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_OK,
                'messages'      =>  ["Deleted book successfully"]
            ];
        } catch (Exception $e){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  [$e->getMessage()]
            ];
        }
    }

    private function addEditHistory($managerID,$action,$bookid){

    }
}