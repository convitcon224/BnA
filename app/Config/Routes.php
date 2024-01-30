<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('Error/Book/404',function(){
    return view('errors/html/error_404',['message'=>'Book not found']);
});
$routes->get('Error/Session/404',function(){
    return view('errors/html/error_404',['message'=>'Session not found']);
});

$routes->get('/', 'Guest\Home::index');
$routes->get('SignUp','Guest\Home::signUp');
$routes->get('AboutUs','Guest\Home::aboutUs');
$routes->get('ContactUs','Guest\Home::contactUs');
$routes->get('SupportUs','Guest\Home::supportUs');
$routes->get('Policy','Guest\Home::policy');
$routes->get('JoinUs','Guest\Home::joinUs');
$routes->get('BorrowBook','Guest\Home::borrowBook');
$routes->get('RenewBook/(:segment)','Guest\Home::renewBook/$1');
$routes->get('ReturnBook/(:segment)','Guest\Home::returnBook/$1');
$routes->get('SuggestBook','Guest\Home::suggestBook');
$routes->get('GuestForm/(:segment)','Guest\Home::openForm/$1');
$routes->post('Guest/Request/New','Guest\Home::checkGuestForm');
$routes->post('Guest/BorrowRequest/New','Guest\Home::checkBorrowForm');
$routes->post('Guest/RenewRequest/New','Guest\Home::checkRenewForm');
$routes->post('Guest/ReturnRequest/New','Guest\Home::checkReturnForm');

// $routes->get('Browse/(:any)','Guest\Home::browse/$1');
$routes->group('Browse',function($routes){
    $routes->get('TopSearch','Guest\Home::browse/Top Search');
    $routes->get('ValueBooks','Guest\Home::browse/Value Books');
    $routes->get('Search/(:segment)/(:segment)','Guest\Home::browseSearch/$1/$2');
    $routes->get('Borrowing','Guest\Home::borrowing');
    $routes->get('Category','Guest\Home::category');
    $routes->get('Search/(:segment)','Guest\Home::browse/$1');
    $routes->get('BookDetail/(:segment)','Guest\Home::bookDetail/$1');
    $routes->post('CheckBorrowingForm','Guest\Home::checkBorrowHistoryForm');
    $routes->get('History/(:segment)/(:segment)','Guest\Home::historyResult/$1/$2');
});



$routes->get('Login','Guest\Login::index');


// $routes->get('TestBnA/(:any)', 'TestBnA::index/$2');


$routes->group('Admin',function($routes){
    $routes->get('/','Admin\AdminHome::index');
    $routes->get('Member','Admin\AdminHome::memberList');
    $routes->get('Contact','Admin\AdminHome::contact');    
    $routes->group('Session',function($routes){
        $routes->get('All','Admin\AdminHome::sessionList');
        $routes->get('Accepted','Admin\AdminHome::acceptedSession');
        $routes->get('Accepted/Update/(:segment)','Admin\AdminHome::updateAcceptedSession/$1');
        $routes->post('Accepted/Confirm','Admin\AdminHome::confirmAcceptedSession');
    });
    $routes->group('Request',function($routes){
        $routes->get('Pending','Admin\AdminHome::notification');
        $routes->get('Pending/AcceptRequest/(:segment)','Admin\AdminHome::acceptRequest/$1');
        $routes->get('Pending/RefuseRequest/(:segment)','Admin\AdminHome::refuseRequest/$1');
        $routes->get('Pending/ReturnRequest/(:segment)','Admin\AdminHome::checkReturnRequest/$1');
        $routes->post('Pending/ReturnRequest/Confirm','Admin\AdminHome::confirmReturnRequest');
        $routes->get('All','Admin\AdminHome::listRequest');
    });
    $routes->group('Book',function($routes){
        $routes->get('ListBook','Admin\AdminHome::manageBook');
        $routes->get('AddBook','Admin\AdminHome::addBook');
        $routes->post('New','Admin\AdminHome::newBook');
        $routes->get('Edit/(:segment)','Admin\AdminHome::editBook/$1');
        $routes->post('Update','Admin\AdminHome::updateBook');
        $routes->get('Delete/(:segment)','Admin\AdminHome::deleteBook/$1');
    });
});


$routes->get('test','Guest\Home::test');