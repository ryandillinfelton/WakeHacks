var cards = document.getElementsByClassName('card');
var center = document.getElementById('center');
var centerContent = document.getElementById('centerContent');
var centerOpen = false;
var curPage;

function openCenter(pageNum) {
    if (!centerOpen) {
        curPage = pageNum;
        center = document.getElementById('center');
        centerContent = document.getElementById('centerContent');

        center.classList.remove('close');
        center.classList.add('opened');
        setTimeout(function () {
            if(pageNum == 1) {
                $( "#centerContent" ).load( "webDev.html" );
            } if (pageNum == 2) {
                centerContent.innerHTML = "<h2>Page 2</h2><p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>";
            } if (pageNum == 3) {
                centerContent.innerHTML = "<h2>Page 3</h2><p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>";
            }
            centerContent.classList.add('openedp');
        }, 500);
        centerOpen = true;
    } else if (centerOpen && curPage != pageNum) {
        curPage = pageNum;
        if(pageNum == 1) {
            $( "#centerContent" ).load( "webDev.html" );
        } if (pageNum == 2) {
            centerContent.innerHTML = "<h2>Page 2</h2><p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>";
        } if (pageNum == 3) {
            centerContent.innerHTML = "<h2>Page 3</h2><p> Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </p>";
        }
        centerContent.classList.add('openedp');
    } else {
        center.classList.add('close');
        centerContent.innerHTML = "";
        setTimeout(function () {
            center.classList.remove('opened');
            centerContent.classList.remove('openedp');
        }, 400);
        centerOpen = false;
    }
}