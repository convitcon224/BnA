<?php

namespace App\Controllers\Guest;

use App\Controllers\BaseController;
use App\Services\UserService;
use App\Services\BookService;
use App\Services\RequestService;

class Home extends BaseController
{
    private $service;
    private $bookService;
    private $requestService;

    // Layout
    private $homeHeader = 'guest/layout/Header';
    private $aboutLeftMenu = 'guest/layout/AboutLeftMenu';
    private $borrowingLeftMenu = 'guest/layout/BorrowingLeftMenu';

    // CssJs
    private $CssJsHomeHeader = '<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>';

    public function __construct(){
        $this->service = new UserService();
        $this->bookService = new BookService();
        $this->requestService = new RequestService();
    }

    private function getCSSInAppURL($target){
        if($target=="header"){
            return '<link rel="stylesheet" type="text/css" href="'.base_url().'assets/guest/home/css/headerStyle.css">';
        } 
        // Both header and left menu
        else if($target=="both"){
            return '<link rel="stylesheet" type="text/css" href="'.base_url().'assets/guest/home/css/headerStyle.css">
            <link rel="stylesheet" type="text/css" href="'.base_url().'assets/guest/aboutUs/css/leftMenu.css">';
        }
    }

    public function index()
    {
        $data = [];
        $data = $this->loadMasterLayout($data,$this->homeHeader,$this->getCSSInAppURL("header").$this->CssJsHomeHeader);
        return view('guest/Home',$data);
    }

    public function aboutUs(){
        $data = [];
        $data = $this->loadMasterLayout($data,$this->homeHeader,$this->getCSSInAppURL("both").$this->CssJsHomeHeader,$this->aboutLeftMenu);
        return view("guest/AboutUs",$data);
    }

    public function contactUs(){
        $data = [];
        $data = $this->loadMasterLayout($data,$this->homeHeader,$this->getCSSInAppURL("both").$this->CssJsHomeHeader,$this->aboutLeftMenu);
        return view("guest/ContactUs",$data);
    }

    public function supportUs(){
        $data = [];
        $data = $this->loadMasterLayout($data,$this->homeHeader,$this->getCSSInAppURL("both").$this->CssJsHomeHeader,$this->aboutLeftMenu);
        return view("guest/SupportUs",$data);
    }

    public function joinUs(){
        $data = [];
        $data = $this->loadMasterLayout($data,$this->homeHeader,$this->getCSSInAppURL("both").$this->CssJsHomeHeader,$this->aboutLeftMenu);
        return view("guest/JoinUs",$data);
    }

    public function policy(){
        $data = [];
        $data = $this->loadMasterLayout($data,$this->homeHeader,$this->getCSSInAppURL("both").$this->CssJsHomeHeader,$this->aboutLeftMenu);
        return view("guest/Policy",$data);
    }

    public function borrowing(){
        $data = [];
        $data = $this->loadMasterLayout($data,$this->homeHeader,$this->getCSSInAppURL("both").$this->CssJsHomeHeader,$this->borrowingLeftMenu);
        return view("guest/BorrowingForm",$data);
    }

    public function historyResult($phone,$id){
        $data = [];
        $data["history"] = $this->requestService->getBorrowingHistory(base64_decode($id),base64_decode($phone));
        $data = $this->loadMasterLayout($data,$this->homeHeader,$this->getCSSInAppURL("both").$this->CssJsHomeHeader,$this->borrowingLeftMenu);
        return view("guest/Borrowing",$data);
    }

    public function checkBorrowHistoryForm(){
        return redirect()->to('Browse/History/'.base64_encode($this->request->getVar('phone-num-field'))."/".base64_encode($this->request->getVar('student-id')));
    }

    public function category(){
        $data = [];
        $data = $this->loadMasterLayout($data,$this->homeHeader,$this->getCSSInAppURL("both").$this->CssJsHomeHeader,$this->borrowingLeftMenu);
        return view("guest/Category",$data);
    }

    public function browse($choice){
        $data = [];
        $data["books"] = $this->bookService->getAllBooks();
        $data['title'] = $choice;
        $data = $this->loadMasterLayout($data,$this->homeHeader,$this->getCSSInAppURL("header").$this->CssJsHomeHeader);
        $data = $this->loadListBooksLayout($data);
        return view("guest/ListBooks",$data);
    }

    public function browseSearch($category,$detail){
        $data = [];
        $data["books"] = $this->bookService->getSearchedBook($category,$detail);
        $data['title'] = $detail;
        $data = $this->loadMasterLayout($data,$this->homeHeader,$this->getCSSInAppURL("header").$this->CssJsHomeHeader);
        $data = $this->loadListBooksLayout($data);
        return view("guest/ListBooks",$data);
    }

    public function bookDetail($choiceID){
        $data = [];
        $data['book'] = $this->bookService->getBookByID(base64_decode($choiceID));
        $data = $this->loadMasterLayout($data,$this->homeHeader,$this->getCSSInAppURL("header").$this->CssJsHomeHeader);
        return view("guest/BookDetail",$data);
    }

    public function openForm($formType){
        $data['formType'] = $formType;
        return view("guest/GuestForm",$data);
    }

    public function checkGuestForm(){
        if($this->request->getPost('formType')=="Borrow"){
            return redirect('BorrowBook')->withInput();
        } elseif($this->request->getPost('formType')=="Renew"){
            $result = $this->requestService->getCurrentBorrowingBook($this->request->getVar('phone-num-field'),$this->request->getVar('student-id'));
            // dd($result);
            if($result["error"]==1){
                return redirect()->back()->withInput()->with('errorsMsg',['You are not having any current borrowing']);
            } else{
                return redirect()->to('RenewBook/'.$result["book_id"])->withInput();
            }
        } elseif($this->request->getPost('formType')=="Return"){
            $result = $this->requestService->getCurrentBorrowingBook($this->request->getVar('phone-num-field'),$this->request->getVar('student-id'));
            if($result["error"]==1){
                return redirect()->back()->withInput()->with('errorsMsg',['You are not having any current borrowing']);
            } else{
                return redirect()->to('ReturnBook/'.$result["book_id"])->withInput();
            }
        }
        // dd("Done");
    }

    public function checkBorrowForm(){
        $result = $this->requestService->addNewBorrowRequest($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
    }

    public function borrowBook(){
        return view("guest/BorrowBook");
    }

    public function renewBook($bookID){
        $data["bookID"] = $bookID;
        return view("guest/Renew",$data);
    }

    public function checkRenewForm(){
        $result = $this->requestService->addNewRenewRequest($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
    }

    public function returnBook($bookID){
        $data["bookID"] = $bookID;
        return view("guest/ReturnBook",$data);
    }

    public function checkReturnForm(){
        $result = $this->requestService->addNewReturnRequest($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
    }

    public function suggestBook(){
        return view("guest/SuggestBook");
    }

    public function test(){
        // $data = [];
        // $data = $this->loadMasterLayout($data,$this->homeHeader,$this->getCSSInAppURL("both").$this->CssJsHomeHeader,$this->borrowingLeftMenu);
        return view("guest/layout/Footer");
    }

    public function signUp(){
        return view("guest/SignUp");
    }




    // public function create(){
    //     $result = $this->service->addUserInfo($this->request);
    // }


}
