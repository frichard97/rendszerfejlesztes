/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/product_view.js":
/*!**************************************!*\
  !*** ./resources/js/product_view.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('.panel-heading').click(function () {
    if (!$('.panel-body').hasClass('collapse show')) {
      $('.downbutton').removeClass('fa fa-chevron-right');
      $('.downbutton').addClass('fa fa-chevron-down');
    } else {
      $('.downbutton').removeClass('fa fa-chevron-down');
      $('.downbutton').addClass('fa fa-chevron-right');
    }
  });
  setInterval(kommentTimer, 3000);

  function kommentTimer() {
    $.post("/product/get_comment", {
      '_token': $('meta[name=csrf-token]').attr('content'),
      'id': id,
      'comment_number': comment_number,
      type: "phase1"
    }).done(function (data) {
      if (data > comment_number) {
        $.post("/product/get_comment", {
          '_token': $('meta[name=csrf-token]').attr('content'),
          'id': id,
          'comment_number': comment_number,
          type: "phase2"
        }).done(function (data) {
          data.forEach(function (item) {
            console.log(item);
            var div = $.parseHTML("<li class='list-group-item'> <div class='row'> <div class='col-xs-10 col-md-11'> <div> <div class='mic-info'>By: <a href='#'>" + item['user'] + "</a> <span style='float:right'> " + item['date']['date'].split('.')[0] + " </span></div> </div> <div class='comment-text'>" + item['message'] + "</div> </div> </div> </li>");
            comment_number++;
            $("#addcomment").prepend(div);
          });
          $("#comment_count").text(comment_number);
        });
      }
    });
  }
});

window.new_comment = function (id) {
  $.post("/product/new_comment", {
    '_token': $('meta[name=csrf-token]').attr('content'),
    'id': id,
    'message': $('#comment-message').val()
  }).done(function (data) {});
  $("#comment-message").val(null);
};

$(document).ready(function () {
  setInterval(makeTimer, 1000);

  function makeTimer() {
    var now = new Date();
    now = Date.parse(now) / 1000;
    var timeLeft = endTime - now;

    if (timeLeft == 0) {
      location.reload(true);
    } else if (timeLeft > 0) {
      var days = Math.floor(timeLeft / 86400);
      var hours = Math.floor((timeLeft - days * 86400) / 3600);
      var minutes = Math.floor((timeLeft - days * 86400 - hours * 3600) / 60);
      var seconds = Math.floor(timeLeft - days * 86400 - hours * 3600 - minutes * 60);

      if (hours < "10") {
        hours = "0" + hours;
      }

      if (minutes < "10") {
        minutes = "0" + minutes;
      }

      if (seconds < "10") {
        seconds = "0" + seconds;
      }

      if (days > 0) {
        $("#days").html(days + " nap");
      }

      $("#hours").html(hours + " óra");
      $("#minutes").html(minutes + " perc");
      $("#seconds").html(seconds + " másodperc");
    }
  }
});

/***/ }),

/***/ 4:
/*!********************************************!*\
  !*** multi ./resources/js/product_view.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Egyetem\19-20-2\RendszerFejlesztes\rendszerfejlesztes.git\webshop\resources\js\product_view.js */"./resources/js/product_view.js");


/***/ })

/******/ });