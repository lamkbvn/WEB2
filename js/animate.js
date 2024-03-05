const inputField = document.querySelector(".find-input");
const placeholders = [
    "Nhập địa điểm bạn muốn tìm...",
    "Bạn muốn khám phá điều gì?",
    "Tìm kiếm các tour du lịch...",
    "Nhập tên địa điểm hoặc loại tour...",
];
let index = 0;
function changePlaceholder() {
    inputField.setAttribute("placeholder", placeholders[index]);
    inputField.classList.add("placeholder-active");
    index = (index + 1) % placeholders.length;
    setTimeout(function () {
        inputField.classList.remove("placeholder-active");
    }, 3000);
}
setInterval(changePlaceholder, 4000);

// let currentIndex = 0;
// const itemsPerPage = 3;
// const items = document.querySelectorAll(".attractive-offer--item");

// function showItems(startIndex) {
//     items.forEach((item, index) => {
//         if (index >= startIndex && index < startIndex + itemsPerPage) {
//             item.classList.remove("hidden");
//         } else {
//             item.classList.add("hidden");
//         }
//     });
// }

// function nextSlide() {
//     if (currentIndex + itemsPerPage < items.length) {
//         currentIndex += itemsPerPage;
//         showItems(currentIndex);
//     }
// }

// function previousSlide() {
//     if (currentIndex - itemsPerPage >= 0) {
//         currentIndex -= itemsPerPage;
//         showItems(currentIndex);
//     }
// }

// showItems(currentIndex);

// document.addEventListener("DOMContentLoaded", function () {
//     const itemsContainer = document.querySelector(".attractive-offer--list");
//     const prevBtn = document.querySelector(".attractive-offer__pre");
//     const nextBtn = document.querySelector(".attractive-offer__next");
//     let currentIndex = 0;
//     const itemWidth = document.querySelector(".attractive-offer--item").offsetWidth;
//     const numVisibleItems = 3;

//     function slide(direction) {
//         if (direction === "next") {
//             currentIndex = Math.min(
//                 currentIndex + numVisibleItems,
//                 itemsContainer.children.length - numVisibleItems
//             );
//         } else {
//             currentIndex = Math.max(currentIndex - numVisibleItems, 0);
//         }
//         itemsContainer.style.transform = `translateX(-${
//             currentIndex * itemWidth
//         }px)`;
//     }

//     prevBtn.addEventListener("click", function () {
//         slide("prev");
//     });

//     nextBtn.addEventListener("click", function () {
//         slide("next");
//     });
// });

document.addEventListener("DOMContentLoaded", function () {
    var submitBtn = document.getElementById("submitBtn");
    submitBtn.addEventListener("click", function () {
        var emailValue = document.getElementById("email").value;
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "handle_form.php", true);
        xhr.setRequestHeader(
            "Content-Type",
            "application/x-www-form-urlencoded"
        );
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    alert("Gửi thành công!"); // Hiển thị thông báo thành công
                } else {
                    alert("Gửi không thành công!"); // Hiển thị thông báo lỗi nếu có
                }
            }
        };
        xhr.send("email=" + encodeURIComponent(emailValue));
    });
});
