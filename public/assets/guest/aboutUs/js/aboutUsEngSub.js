// Get the ids of the p element
var aboutUs = document.getElementById("paragraph-about-us");

// Get the u element
var changeSubElement = document.getElementById("paragraph-change-sub");
// The boolean value of isVie (0: for english, 1: for vietnamese)
let isVie = 1;

// the default value of p element, "hello world"
aboutUs.innerHTML = "Câu lạc bộ Sách và Hành động USTH sinh ngày 31/07/2019 nhằm mục đích xây dựng cho giới trẻ nói chung và sinh viên USTH nói riêng thói quen đọc sách và tinh thần hành động. Bằng việc kiến tạo không gian sách sinh viên, tổ chức những hoạt động về sách, các chiến dịch, sự kiện có tầm ảnh hưởng đến cộng đồng, chúng mình hi vọng sẽ có thể góp phần nhỏ công sức để lan tỏa văn hóa đọc cũng như tinh thần trách nhiệm: 'Nói được - Làm được' rộng rãi trong cộng đồng.";
changeSubElement.innerHTML = "Eng Sub";
isVie = 1;

function changeSub(event){

    // Change the content of p element
    if(isVie == 1){
        aboutUs.innerHTML = "The USTH Books and Actions Club was born on 31/07/2019 with the aim of building reading habits and spirit of action for young people in general and USTH students in particular. By creating a student book space, organizing activities about books, campaigns, events that have an impact on the community, we hope to be able to contribute a small part of the effort to spread the reading culture as well as the spirit of responsibility: 'Say it - Do it' widely in the community.";
        changeSubElement.innerHTML = "Vie Sub";
        isVie = 0;
    }
    else if(isVie == 0){
        aboutUs.innerHTML = "Câu lạc bộ Sách và Hành động USTH sinh ngày 31/07/2019 nhằm mục đích xây dựng cho giới trẻ nói chung và sinh viên USTH nói riêng thói quen đọc sách và tinh thần hành động. Bằng việc kiến tạo không gian sách sinh viên, tổ chức những hoạt động về sách, các chiến dịch, sự kiện có tầm ảnh hưởng đến cộng đồng, chúng mình hi vọng sẽ có thể góp phần nhỏ công sức để lan tỏa văn hóa đọc cũng như tinh thần trách nhiệm: 'Nói được - Làm được' rộng rãi trong cộng đồng."
        changeSubElement.innerHTML = "Eng Sub";  
        isVie = 1;
    }
}