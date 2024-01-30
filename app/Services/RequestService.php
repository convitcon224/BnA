<?php namespace App\Services;
use App\Models\RequestModel;
use App\Common\ResultUtils;
use App\Models\BookModel;
use App\Models\BorrowingDetailModel;
use App\Models\SessionModel;
use CodeIgniter\HTTP\Request;
use CodeIgniter\I18n\Time;
use Exception;

use function PHPUnit\Framework\isEmpty;

class RequestService extends BaseService
{
    private $requestM;
    private $bookM;
    private $sessionM;
    private $bDetailM;

    function __construct(){
        parent::__construct();
        $this->requestM = new RequestModel();
        $this->requestM->protect(false);

        $this->bookM = new BookModel();
        $this->bookM->protect(false);

        $this->sessionM = new SessionModel();
        $this->sessionM->protect(false);

        $this->bDetailM = new BorrowingDetailModel();
        $this->bDetailM->protect(false);
    }

    public function getAllSession(){
        return $this->sessionM->findAll();
    }

    public function getAcceptedSessionDetail($id){
        $result = $this->sessionM->select("session.sessionID, request.student_id, request.user_name, request.user_phone, request.book_id, books.title, books.author, books.location, session.book_condition, request.holding_time")
        ->join("request","session.sessionID=request.session_id","right")->join("books","request.book_id=books.bookID","left")->where("session.sessionID",$id)->first();
        // dd($result);
        return $result;
    }

    public function getSessionAccepted(){
        $result = $this->sessionM->select("session.sessionID, request.student_id, request.user_name, request.user_phone, request.book_id, books.title, books.author, session.book_condition, request.holding_time")
        ->join("request","session.sessionID=request.session_id","right")->join("books","request.book_id=books.bookID","left")->where("session.status","Accepted")->findAll();
        // dd($result);
        return $result;
    }

    public function getBorrowingHistory($id,$phone){
        try{
            $result = $this->sessionM->select("session.sessionID, session.status, request.book_id, session.deposit, session.time as start_time, borrowing_detail.return_date, borrowing_detail.fine")
            ->join("request","session.sessionID=request.session_id","left")->join("borrowing_detail","session.sessionID=borrowing_detail.session_id","left")->where("user_phone",$phone)->where("type","Borrow")->where("student_id",$id)->where("request.status","Accepted")->orderBy("request_date","DESC")->findAll();
            return $result;
            
        } catch (Exception $e){
            // return $e->getMessage();
            return [];
        }
        return [];
    }

    public function getAllRequest(){
        return $this->requestM->findAll();
    }

    public function getRequestsbyStatus($status){
        return $this->requestM->where("status",$status)->get()->getResultArray();
    }

    // Get session detail by requestID
    public function getSessionDetail($idRequest){
        $sessionID = $this->requestM->select("session_id")->find($idRequest);
        $result = $this->sessionM->select("session.sessionID, request.book_id, session.deposit, session.time as start_time, session.book_condition, request.type, request.request_date, request.holding_time, request.user_name, request.student_id, request.user_phone")
        ->join("request","session.sessionID=request.session_id","right")->where("session.sessionID",$sessionID)->findAll();

        return $result;
    }

    // Secondary key
    public function checkBookByID($id){
        $result = $this->bookM->where("bookID",$id)->first();
        return !$result?false:true;
    }

    public function getCurrentBorrowingBook($phoneNumber,$stID){
        try{
            $theRequest = $this->requestM->select("book_id,status,session_id")->where("user_phone",$phoneNumber)->where("type","Borrow")->where("student_id",$stID)->where("status","Accepted")->orderBy("request_date","DESC")->first();
            $theSession = $this->sessionM->select("sessionID,status")->find($theRequest["session_id"]);
            // return $theSession;
            if($theSession["status"]=="On going"|$theSession["status"]=="Renewed"){
                return[
                    "error" => 0,
                    "book_id" => $theRequest["book_id"],
                    "sessionID" => $theSession["sessionID"],
                    "status" => $theSession["status"]
                ];
            }
        } catch (Exception $e){
            // return $e->getMessage();
            return ["error" => 1];
        }
        return ["error" => 1];
    }

    public function addNewBorrowRequest($requestData){
        $validate = $this->validateNewRequest($requestData);

        if ($validate->getErrors()){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  $validate->getErrors()
            ];
        }

        if(!$this->checkBookByID($requestData->getPost("borrow-book-code"))){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  ["Book ID doesn't exist"]
            ];
        }

        try{
            $data = [
                "book_id" => $requestData->getPost("borrow-book-code"),
                "user_name" => $requestData->getPost("name-field"),
                "user_phone" => $requestData->getPost("phone-num-field"),
                "student_id" => $requestData->getPost("student-id"),
                "request_date" => new Time('+7 hour'),
                "holding_time" => $requestData->getPost("time-extend-option"),
                "type" => $requestData->getPost("formType"),
                "status" => "Pending",
                "session_id" => -1,
            ];
            $this->requestM->save($data);
            return[
                'status'        =>  ResultUtils::STATUS_CODE_OK,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_OK,
                'messages'      =>  ["Your request is sent to BnA admin successfully"]
            ];
        } catch (Exception $e){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  [$e->getMessage()]
            ];
        }
    }

    private function validateNewRequest($requestData){
        $rule = [
            "borrow-book-code" => "required",
            "time-extend-option" => "required",
            // "book-origin-option" => "required",
            "formType" => "required",
            "student-id" => "required|max_length[30]",
            "name-field" => "required|max_length[100]",
            "phone-num-field" => "required|regex_match[/[0-9]/]|max_length[30]",
        ];

        $message = [
            "borrow-book-code" => [
                "required" => "The book code field is required.",
            ],
            "time-extend-option" => [
                "required" => "The borrowing time field is required.",
            ],
            // "book-origin-option" => [
            //     "required" => "The book location field is required.",
            // ],
            "formType" => [
                "required" => "Invalid form.",
            ],
            "student-id" => [
                "required" => "The student id field is required.",
                "max_length" => "The student id field cannot exceed 30 characters in length.",
            ],
            "name-field" => [
                "required" => "The name field is required.",
                "max_length" => "The name field cannot exceed 100 characters in length."
            ],
            "phone-num-field" => [
                "required" => "The phone field is required.",
                "regex_match" => "The phone field must be numbers.",
                "max_length" => "The phone field cannot exceed 30 characters in length."
            ],
        ];

        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }
    
    public function addNewRenewRequest($requestData){
        $validate = $this->validateRenewRequest($requestData);
        if ($validate->getErrors()){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  $validate->getErrors()
            ];
        }

        $currentBook = $this->getCurrentBorrowingBook($requestData->getPost("phone-num-field"),$requestData->getPost("student-id"));

        if($currentBook["error"]==1|$currentBook["status"]=="Renewed"){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  ["Couldn't find your book or you have requested for renew"]
            ];
        }

        if($requestData->getPost("renew-book-code")!=$currentBook["book_id"]){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  ["You are not borrowing this book"]
            ];
        }

        try{
            $data = [
                "book_id" => $requestData->getPost("renew-book-code"),
                "user_name" => $requestData->getPost("name-field"),
                "user_phone" => $requestData->getPost("phone-num-field"),
                "student_id" => $requestData->getPost("student-id"),
                "request_date" => new Time('+7 hour'),
                "holding_time" => $requestData->getPost("time-extend-option"),
                "type" => $requestData->getPost("formType"),
                "status" => "Pending",
                "session_id" => $currentBook["sessionID"],
            ];
            $this->requestM->save($data);

            $updateSessionData = [
                "status" => "Renewed"
            ];
            $this->sessionM->update($currentBook["sessionID"],$updateSessionData);

            return[
                'status'        =>  ResultUtils::STATUS_CODE_OK,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_OK,
                'messages'      =>  ["Your request is sent to BnA admin successfully"]
            ];
        } catch (Exception $e){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  [$e->getMessage()]
            ];
        }
    }

    private function validateRenewRequest($requestData){
        $rule = [
            "renew-book-code" => "required",
            "time-extend-option" => "required",
            "formType" => "required",
            "student-id" => "required|max_length[30]",
            "name-field" => "required|max_length[100]",
            "phone-num-field" => "required|regex_match[/[0-9]/]|max_length[30]",
        ];

        $message = [
            "renew-book-code" => [
                "required" => "The book code field is required.",
            ],
            "time-extend-option" => [
                "required" => "The borrowing time field is required.",
            ],
            "formType" => [
                "required" => "Invalid form.",
            ],
            "student-id" => [
                "required" => "The student id field is required.",
                "max_length" => "The student id field cannot exceed 30 characters in length.",
            ],
            "name-field" => [
                "required" => "The name field is required.",
                "max_length" => "The name field cannot exceed 100 characters in length."
            ],
            "phone-num-field" => [
                "required" => "The phone field is required.",
                "regex_match" => "The phone field must be numbers.",
                "max_length" => "The phone field cannot exceed 30 characters in length."
            ],
        ];

        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    public function addNewReturnRequest($requestData){
        $validate = $this->validateReturnRequest($requestData);
        if ($validate->getErrors()){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  $validate->getErrors()
            ];
        }

        $currentBook = $this->getCurrentBorrowingBook($requestData->getPost("phone-num-field"),$requestData->getPost("student-id"));

        if($currentBook["error"]==1){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  ["Couldn't find your book or you have asked for returning"]
            ];
        }

        if($requestData->getPost("return-book-code")!=$currentBook["book_id"]){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  ["You are not borrowing this book"]
            ];
        }

        try{
            $data = [
                "book_id" => $requestData->getPost("return-book-code"),
                "user_name" => $requestData->getPost("name-field"),
                "user_phone" => $requestData->getPost("phone-num-field"),
                "student_id" => $requestData->getPost("student-id"),
                "request_date" => new Time('+7 hour'),
                "holding_time" => 0,
                "type" => $requestData->getPost("formType"),
                "status" => "Pending",
                "session_id" => $currentBook["sessionID"],
            ];
            $this->requestM->save($data);

            $updateSessionData = [
                "status" => "Returning"
            ];
            $this->sessionM->update($currentBook["sessionID"],$updateSessionData);

            return[
                'status'        =>  ResultUtils::STATUS_CODE_OK,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_OK,
                'messages'      =>  ["Your request is sent to BnA admin successfully, please wait for BnA to check the book"]
            ];
        } catch (Exception $e){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  [$e->getMessage()]
            ];
        }
    }

    private function validateReturnRequest($requestData){
        $rule = [
            "return-book-code" => "required",
            "formType" => "required",
            "student-id" => "required|max_length[30]",
            "name-field" => "required|max_length[100]",
            "phone-num-field" => "required|regex_match[/[0-9]/]|max_length[30]",
        ];

        $message = [
            "return-book-code" => [
                "required" => "The book code field is required.",
            ],
            "formType" => [
                "required" => "Invalid form.",
            ],
            "student-id" => [
                "required" => "The student id field is required.",
                "max_length" => "The student id field cannot exceed 30 characters in length.",
            ],
            "name-field" => [
                "required" => "The name field is required.",
                "max_length" => "The name field cannot exceed 100 characters in length."
            ],
            "phone-num-field" => [
                "required" => "The phone field is required.",
                "regex_match" => "The phone field must be numbers.",
                "max_length" => "The phone field cannot exceed 30 characters in length."
            ],
        ];

        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    public function addNewDetailRecord($requestData){
        $validate = $this->validateDetailRecord($requestData);
        if ($validate->getErrors()){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  $validate->getErrors()
            ];
        }

        if($this->requestM->select("status")->find($requestData->getPost("return_id"))["status"]=="Accepted"){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  ["This borrowing session is done."]
            ];
        }

        try{
            $data = [
                "session_id" => $requestData->getPost("session_id"),
                "return_date" => new Time('+7 hour'),
                "condition_after" => $requestData->getPost("condition_after"),
                "fine" => $requestData->getPost("fine"),
                "note" => $requestData->getPost("note"),
            ];
            $this->bDetailM->save($data);

            $updateSessionData = [
                "status" => "Done"
            ];
            $this->sessionM->update($requestData->getPost("session_id"),$updateSessionData);

            $updateRequest = [
                "status" => "Accepted"
            ];
            $this->requestM->update($requestData->getPost("return_id"),$updateRequest);

            $this->bookM->set("status","Available")->where("bookID",$this->requestM->find($requestData->getPost("return_id"))["book_id"])->update();

            return[
                'status'        =>  ResultUtils::STATUS_CODE_OK,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_OK,
                'messages'      =>  ["Return book successfully"]
            ];
        } catch (Exception $e){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  [$e->getMessage()]
            ];
        }
    }

    private function validateDetailRecord($requestData){
        $rule = [
            "session_id" => "required",
            "return_id" => "required",
            "condition_after" => "required",
            "fine" => "required|greater_than[-0.00001]",
            "note" => "max_length[255]",
        ];

        $message = [
            "session_id" => [
                "required" => "Invalid form.",
            ],
            "return_id" => [
                "required" => "Invalid form.",
            ],
            "condition_after" => [
                "required" => "The Book's condition field is required.",
            ],
            "fine" => [
                "required" => "The Fine field is required.",
                "greater_than" => "The Fine field cannot be negative."
            ],
            "note" => [
                "max_length" => "The Note field cannot exceed 255 characters in length.",
            ]
        ];

        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    public function updateAcceptedSession($requestData){
        $validate = $this->validateAcceptedSession($requestData);
        if ($validate->getErrors()){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  $validate->getErrors()
            ];
        }

        if($this->sessionM->select("status")->find($requestData->getPost("sessionID"))["status"]=="On going"){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  ["This session is on going."]
            ];
        }

        try{
            $data = [
                "manager_id" => $requestData->getPost("manager_id"),
                "deposit" => $requestData->getPost("deposit"),
                "time" => new Time('+7 hour'),
                "status" => "On going"
            ];
            $this->sessionM->update($requestData->getPost("sessionID"),$data);

            return[
                'status'        =>  ResultUtils::STATUS_CODE_OK,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_OK,
                'messages'      =>  ["Update session successfully"]
            ];
        } catch (Exception $e){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  [$e->getMessage()]
            ];
        }
    }

    private function validateAcceptedSession($requestData){
        $rule = [
            "sessionID" => "required",
            "manager_id" => "required",
            "deposit" => "required|greater_than[-0.00001]",
        ];

        $message = [
            "sessionID" => [
                "required" => "Invalid form.",
            ],
            "manager_id" => [
                "required" => "Invalid form.",
            ],
            "deposit" => [
                "required" => "The Deposit field is required.",
                "greater_than" => "The Deposit field cannot be negative."
            ]
        ];

        $this->validation->setRules($rule,$message);
        $this->validation->withRequest($requestData)->run();

        return $this->validation;
    }

    private function addSessionRecord($currentRequest,$managerID){
        $bookid = $currentRequest["book_id"];
        $sessionData = [
            "manager_id" => $managerID,
            "deposit" => 0,
            "time" => new Time('+7 hour'),
            "book_condition" => $this->bookM->select("book_condition")->where("bookID",$bookid)->first()["book_condition"],
            "status" => "Accepted"
        ];
        $this->sessionM->save($sessionData);
        return $this->sessionM->getInsertID();
    }

    public function acceptRequest($id,$managerID){
        $currentRequest = $this->requestM->find($id);
        if($currentRequest["status"] != "Pending"){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  ["Couldn't find the request"]
            ];
        }

        if($currentRequest["type"]=="Borrow"){
            try{
                $sessionID = $this->addSessionRecord($currentRequest,$managerID);
                $updateBook = [
                    "status" => "Borrowing"
                ];
                $this->bookM->set("status","Borrowing")->where("bookID",$currentRequest["book_id"])->update();
            } catch (Exception $e){
                return[
                    'status'        =>  ResultUtils::STATUS_CODE_ERR,
                    'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                    'messages'      =>  [$e->getMessage()]
                ];
            }
            
            try{
                $updateData = [
                    "status" => "Accepted",
                    "session_id" => $sessionID,
                ];
                $this->requestM->update($id,$updateData);
                return[
                    'status'        =>  ResultUtils::STATUS_CODE_OK,
                    'messageCode'   =>  ResultUtils::MESSAGE_CODE_OK,
                    'messages'      =>  ["Request is accepted"]
                ];
            } catch (Exception $e){
                return[
                    'status'        =>  ResultUtils::STATUS_CODE_ERR,
                    'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                    'messages'      =>  [$e->getMessage()]
                ];
            }
        }
        
        try{
            $updateData = [
                "status" => "Accepted",
            ];
            $this->requestM->update($id,$updateData);
            return[
                'status'        =>  ResultUtils::STATUS_CODE_OK,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_OK,
                'messages'      =>  ["Request is accepted"]
            ];
        } catch (Exception $e){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  [$e->getMessage()]
            ];
        }
    }

    public function refuseRequest($id){
        $updateData = [
            "status" => "Refused"
        ];
        try{
            $this->requestM->update($id,$updateData);
            return[
                'status'        =>  ResultUtils::STATUS_CODE_OK,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_OK,
                'messages'      =>  ["Request is refused"]
            ];
        } catch (Exception $e){
            return[
                'status'        =>  ResultUtils::STATUS_CODE_ERR,
                'messageCode'   =>  ResultUtils::MESSAGE_CODE_ERR,
                'messages'      =>  [$e->getMessage()]
            ];
        }
    }

}