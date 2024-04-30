document.addEventListener("DOMContentLoaded", function() {
    const searchInput = document.getElementById("search");

    searchInput.addEventListener("input", () => {
        const inputValue = searchInput.value.trim();
        let cardDisplay = document.querySelector(".php-card-container");
        let container = document.querySelector(".posts-main-container");
        if (inputValue.length >= 3) {

            run(inputValue);
        }
    });

    function run(data) {
        let xhr = new XMLHttpRequest();
        let jsonData = { string: data };

        let url = 'http://test/components.php';
        xhr.open("POST", url, true);
        xhr.setRequestHeader('Content-Type', 'application/json');

        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                let pageData = JSON.parse(xhr.responseText);
                let container = document.querySelector(".posts-main-container");
                container.innerHTML = "";
                pageData.forEach(element => {
                    container.insertAdjacentHTML("beforeend",
                        `<ul>
                            <li>Author: ${element["id"]}</li>
                            <li>Title: ${element["title"]}</li>
                            <li>Body: ${element["body"]}</li>
                            <li><a href="commentsPage.php?id=${element["id"]}">Comments</a></li>
                        </ul>`);
                });
            }
        }

        xhr.send(JSON.stringify(jsonData));
    }
});