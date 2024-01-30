<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Services\BookService;
use App\Services\RequestService;
use App\Services\UserService;

class AdminHome extends BaseController
{
    private $userService;
    private $bookService;
    private $requestService;

    private $topNav = 'admin/layout/TopNav';
    private $sideNav = 'admin/layout/SideNav';

    public function __construct(){
        $this->userService = new UserService();
        $this->bookService = new BookService();
        $this->requestService = new RequestService();
    }

    private function getCSSJSURL($target){
        if($target=="left"){
            return '<link rel="stylesheet" type="text/css" href="'.base_url().'assets/admin/home/css/leftsidebar.css">
            <script src="'.base_url().'assets/admin/home/js/sideNav.js"></script>
            <script src="https://kit.fontawesome.com/bd2b7b4b68.js" crossorigin="anonymous"></script>';
        } 
        // Both header and left menu
        else {
            return '<link rel="stylesheet" type="text/css" href="'.base_url().'assets/admin/home/css/leftsidebar.css">
            <link rel="stylesheet" type="text/css" href="'.base_url().'assets/admin/home/css/topnav.css">
            <script src="'.base_url().'assets/admin/home/js/sideNav.js"></script>
            <script src="https://kit.fontawesome.com/bd2b7b4b68.js" crossorigin="anonymous"></script>';
        }
    }

    public function index()
    {
        $data = [];
        $data["users"] = $this->userService->getAllUsers();
        $data = $this->loadAdminLayout($data,$this->topNav,$this->getCSSJSURL("header,left"),$this->sideNav);
        return view('admin/BnA',$data);
    }

    public function manageBook()
    {
        $data = [];
        $data["books"] = $this->bookService->getAllBooks();
        $data = $this->loadAdminLayout($data,$this->topNav,$this->getCSSJSURL("header,left"),$this->sideNav);
        return view('admin/ListBook',$data);
    }

    public function addBook()
    {
        $data = [];
        $data = $this->loadAdminLayout($data,$this->topNav,$this->getCSSJSURL("header,left"),$this->sideNav);
        return view('admin/AddBook',$data);
    }

    public function newBook()
    {
        $result = $this->bookService->addNewBook($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
    }

    public function editBook($bookID)
    {
        $book = $this->bookService->getBookByID($bookID);
        if (!$book){
            return redirect('Error/Book/404');
        }
        $data = [];
        $data = $this->loadAdminLayout($data,$this->topNav,$this->getCSSJSURL("header,left"),$this->sideNav);
        $data['book'] = $book;
        return view('admin/EditBook',$data);
    }

    public function updateBook(){
        $result = $this->bookService->updateBook($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
    }

    public function deleteBook($bookID)
    {
        $book = $this->bookService->getBookByID($bookID);
        if (!$book){
            return redirect('Error/Book/404');
        }
        $result = $this->bookService->deleteBook($bookID);
        return redirect('Admin/Book/ListBook', 'refresh')->with($result['messageCode'],$result['messages']);
    }

    public function contact(){
        $data = [];
        $data = $this->loadAdminLayout($data,$this->topNav,$this->getCSSJSURL("header,left"),$this->sideNav);
        return view('admin/Contact',$data);
    }

    public function notification(){
        $data = [];
        $data["pendingRequests"] = $this->requestService->getRequestsbyStatus("Pending");
        $data = $this->loadAdminLayout($data,$this->topNav,$this->getCSSJSURL("header,left"),$this->sideNav);
        return view('admin/Notification',$data);
    }

    public function listRequest(){
        $data = [];
        $data["allRequests"] = $this->requestService->getAllRequest();
        $data = $this->loadAdminLayout($data,$this->topNav,$this->getCSSJSURL("header,left"),$this->sideNav);
        return view('admin/ListRequest',$data);
    }

    public function acceptRequest($id){
        $result = $this->requestService->acceptRequest($id,0);
        return redirect('Admin/Request/Pending', 'refresh')->with($result['messageCode'],$result['messages']);
    }

    public function refuseRequest($id){
        $result = $this->requestService->refuseRequest($id);
        return redirect('Admin/Request/Pending', 'refresh')->with($result['messageCode'],$result['messages']);
    }

    public function checkReturnRequest($id){
        $theRequest = $this->requestService->getSessionDetail($id);
        $data = [];
        $data = $this->loadAdminLayout($data,$this->topNav,$this->getCSSJSURL("header,left"),$this->sideNav);
        $data["allRequests"] = $theRequest;
        $data["returnID"] = $id;
        // dd($theRequest);
        return view('admin/BorrowingDetail',$data);
    }

    public function confirmReturnRequest(){
        $result = $this->requestService->addNewDetailRecord($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
        // dd($this->request->getPost());
    }

    public function sessionList(){
        $data = [];
        $data["Sessions"] = $this->requestService->getAllSession();
        $data = $this->loadAdminLayout($data,$this->topNav,$this->getCSSJSURL("header,left"),$this->sideNav);
        return view('admin/ListSession',$data);
    }

    public function acceptedSession(){
        $data = [];
        $data["Sessions"] = $this->requestService->getSessionAccepted();
        $data = $this->loadAdminLayout($data,$this->topNav,$this->getCSSJSURL("header,left"),$this->sideNav);
        return view('admin/SessionAccepted',$data);
    }

    public function updateAcceptedSession($choice){
        $choseSession = $this->requestService->getAcceptedSessionDetail($choice);
        if (!$choseSession){
            return redirect('Error/Session/404');
        }
        $data = [];
        $data = $this->loadAdminLayout($data,$this->topNav,$this->getCSSJSURL("header,left"),$this->sideNav);
        $data['detail'] = $choseSession;
        return view('admin/UpdateAcceptedSession',$data);
    }

    public function confirmAcceptedSession(){
        $result = $this->requestService->updateAcceptedSession($this->request);
        return redirect()->back()->withInput()->with($result['messageCode'],$result['messages']);
    }
}
