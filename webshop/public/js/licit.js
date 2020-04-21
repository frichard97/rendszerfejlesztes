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
/******/ 	return __webpack_require__(__webpack_require__.s = 8);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/licit.js":
/*!*******************************!*\
  !*** ./resources/js/licit.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  setInterval(licitTimer, 700);

  function licitTimer() {
    $.post("/product/get_licit", {
      '_token': $('meta[name=csrf-token]').attr('content'),
      'id': id,
      'licit_number': licit_number,
      type: "phase1"
    }).done(function (data) {
      console.log(data, licit_number);

      if (data > licit_number) {
        $.post("/product/get_licit", {
          '_token': $('meta[name=csrf-token]').attr('content'),
          'id': id,
          'licit_number': licit_number,
          'type': "phase2"
        }).done(function (data) {
          console.log(data);
          data.forEach(function (item) {
            $("#licit10").remove();
            var max = 0;

            if (licit_number >= 10) {
              max = 10;
            } else {
              max = licit_number;
            }

            for (var i = max; i >= 1; i--) {
              $("#licit" + i).attr("id", "licit" + (i + 1));
            }

            var div = $.parseHTML("<li class='list-group-item' id='licit1'><div class='row'><div class='col-xs-10 col-md-11'><div><div class='mic-info'>By: <a href='#'>" + item['user'] + "</a> <span style='color: green; padding-left: 3%'>" + item['price'] + "Ft</span> <span style='float: right'>" + item['date']['date'].split('.')[0] + "</span></div></div></div></div></li>");
            licit_number++;
            $("#add_licit").prepend(div);
          });
        });
      }
    });
  }
});

window.new_licit = function (id) {
  $.post("/product/new_licit", {
    '_token': $('meta[name=csrf-token]').attr('content'),
    'id': id,
    'price': $('#licit_price').val()
  }).done(function (data) {
    console.log(data);
  });
  $("#comment-message").val(null);
};

/***/ }),

/***/ 8:
/*!*************************************!*\
  !*** multi ./resources/js/licit.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! D:\Rendszerfejlesztes\webshop\resources\js\licit.js */"./resources/js/licit.js");


/***/ })

/******/ });