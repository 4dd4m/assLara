/*
 * ATTENTION: An "eval-source-map" devtool has been used.
 * This devtool is neither made for production nor for readable output files.
 * It uses "eval()" calls to create a separate source file with attached SourceMaps in the browser devtools.
 * If you are trying to read the output file, select a different devtool (https://webpack.js.org/configuration/devtool/)
 * or disable the default devtool with "devtool: false".
 * If you are looking for production-ready output files, see mode: "production" (https://webpack.js.org/configuration/mode/).
 */
/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./resources/js/myapp.js":
/*!*******************************!*\
  !*** ./resources/js/myapp.js ***!
  \*******************************/
/***/ (() => {

eval("function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _unsupportedIterableToArray(arr, i) || _nonIterableRest(); }\n\nfunction _nonIterableRest() { throw new TypeError(\"Invalid attempt to destructure non-iterable instance.\\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method.\"); }\n\nfunction _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === \"string\") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === \"Object\" && o.constructor) n = o.constructor.name; if (n === \"Map\" || n === \"Set\") return Array.from(o); if (n === \"Arguments\" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }\n\nfunction _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }\n\nfunction _iterableToArrayLimit(arr, i) { var _i = arr == null ? null : typeof Symbol !== \"undefined\" && arr[Symbol.iterator] || arr[\"@@iterator\"]; if (_i == null) return; var _arr = []; var _n = true; var _d = false; var _s, _e; try { for (_i = _i.call(arr); !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i[\"return\"] != null) _i[\"return\"](); } finally { if (_d) throw _e; } } return _arr; }\n\nfunction _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }\n\n$.ajaxSetup({\n  headers: {\n    'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')\n  }\n}); //handling of the new form buttons \n//bind an event listener to them\n//    $('.newForm').on('click',function(){\n//\n//        var targetDiv = this.getAttribute('data-name');\n//        var selector = \"#\"+targetDiv+\"_form\";\n//        var editForm = $(selector);\n//\n//        //display the modal\n//        $('#newComment').modal('show');\n//    });\n\n$.ajax({\n  type: \"GET\",\n  url: \"/show\",\n  dataType: \"json\",\n  success: function success(data) {\n    var output = \"\";\n    var currentStructure = \"\";\n    console.log(data);\n\n    for (var i = 0; i < data.length; i++) {\n      var e = data[i]; //change the header\n\n      if (currentStructure != e.name) {\n        currentStructure = e.name;\n        console.log(currentStructure);\n        var linkHref = e.name.replace(/ /g, \"_\");\n        output += \"<h1 class=\\\"stcructureTitle aOffset\\\" id=\\\"link_\".concat(linkHref, \"\\\">\").concat(e.name, \"</h1>\");\n      }\n\n      if (e.isApproved == 1) {\n        output += \" <div class=\\\"card text-white bg-success mb-3 shadow\\\">\";\n      } else {\n        output += \" <div class=\\\"card text-white bg-secondary mb-3 shadow\\\">\";\n      }\n\n      output += \"<div class=\\\"card-header\\\">\\n    <span class=\\\"glyphicon glyphicon-copy\\\"></span>\\n\\n   <span class=\\\"commentId\\\">#\".concat(e.code).concat(e.id, \"</span>\\n\\n<div class=\\\"form-check\\\">\\n<!--Clipboard checkbox -->\\n  <input class=\\\"form-check-input\\\" type=\\\"checkbox\\\" value=\\\"\").concat(e.tone, \"\\\" id=\\\"\").concat(e.id, \"\\\">\\n  <label class=\\\"form-check-label\\\" for=\\\"check_\").concat(e.id, \"\\\">\\n   <span data-toggle=\\\"tooltip\\\" data-placement=\\\"right\\\" title=\\\"Copy this comment to the clipboard\\\"> Clipboard</span>\\n  </label>\\n\\n<!--End of Clipboard checkbox -->\");\n\n      if (e.tone == 1) {\n        output += \"<span class=\\\"badge badge-success toneBadge\\\">Positive Tone</span>\";\n      } else {\n        output += \"<span class=\\\"badge badge-danger toneBadge\\\">Negative Tone</span>\";\n      }\n\n      if (e.isApproved == 1) {\n        output += \"<span class=\\\"toneBadge badge badge-info\\\">Approved Comment</span>\";\n      } else {\n        output += \"<span class=\\\"toneBadge badge  badge-warning\\\">Pending Comment</span>\";\n      }\n\n      output += \"\\n                        </div>\\n                        </div>\\n                        <div class=\\\"card-body\\\">\\n                        <p class=\\\"card-text\\\">\".concat(e.comment, \"</p>\\n                        <p class=\\\"submittedBy\\\">Submitted by <a href=\\\"#\\\" class=\\\"authorLink\\\">\").concat(e.firstName).concat(e.lastName, \" @ \").concat(e.updated_at, \"</a></p>\\n                        </div>\\n                        </div>\");\n    }\n\n    $('#cards').html(output);\n  } //success\n\n});\n$('.saveNewComment').on('click', function () {\n  var data = {\n    'firstName': $('#firstName').val(),\n    'lastName': $('#lastName').val(),\n    'email': $('#email').val(),\n    'tone': $('#tone').val(),\n    'comment': $('#comment').val(),\n    'structureId': $('#structureId').val()\n  }; //saving the new comment\n\n  $.ajax({\n    type: \"POST\",\n    url: \"/\",\n    dataType: \"json\",\n    data: data,\n    success: function success(data) {\n      $('#newComment').modal('hide');\n      $('#newComment').reset();\n    },\n    error: function error(data) {\n      var errormsg = \"\";\n      var errors = Object.entries(data.responseJSON.errors).map(function (_ref) {\n        var _ref2 = _slicedToArray(_ref, 2),\n            key = _ref2[0],\n            value = _ref2[1];\n\n        return {\n          key: key,\n          value: value\n        };\n      });\n      errorOutput = \"\";\n\n      for (var i = 0; i < errors.length; i++) {\n        errorOutput += \"<div class=\\\"alert alert-danger\\\" role=\\\"alert\\\">\".concat(err = errors[i].value[0], \"</div>\");\n      }\n\n      $('#errormsg').empty().html(errorOutput);\n    }\n  });\n});\n$('.closeNewForm').on('click', function () {\n  console.log(\"Reset\");\n  $('#newCommentForm').trigger(\"reset\");\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvbXlhcHAuanM/NDdhOSJdLCJuYW1lcyI6WyIkIiwiYWpheFNldHVwIiwiaGVhZGVycyIsImF0dHIiLCJhamF4IiwidHlwZSIsInVybCIsImRhdGFUeXBlIiwic3VjY2VzcyIsImRhdGEiLCJvdXRwdXQiLCJjdXJyZW50U3RydWN0dXJlIiwiY29uc29sZSIsImxvZyIsImkiLCJsZW5ndGgiLCJlIiwibmFtZSIsImxpbmtIcmVmIiwicmVwbGFjZSIsImlzQXBwcm92ZWQiLCJjb2RlIiwiaWQiLCJ0b25lIiwiY29tbWVudCIsImZpcnN0TmFtZSIsImxhc3ROYW1lIiwidXBkYXRlZF9hdCIsImh0bWwiLCJvbiIsInZhbCIsIm1vZGFsIiwicmVzZXQiLCJlcnJvciIsImVycm9ybXNnIiwiZXJyb3JzIiwiT2JqZWN0IiwiZW50cmllcyIsInJlc3BvbnNlSlNPTiIsIm1hcCIsImtleSIsInZhbHVlIiwiZXJyb3JPdXRwdXQiLCJlcnIiLCJlbXB0eSIsInRyaWdnZXIiXSwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7OztBQUFBQSxDQUFDLENBQUNDLFNBQUYsQ0FBWTtBQUNSQyxFQUFBQSxPQUFPLEVBQUU7QUFDTCxvQkFBZ0JGLENBQUMsQ0FBQyx5QkFBRCxDQUFELENBQTZCRyxJQUE3QixDQUFrQyxTQUFsQztBQURYO0FBREQsQ0FBWixFLENBS0E7QUFFQTtBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTs7QUFJQUgsQ0FBQyxDQUFDSSxJQUFGLENBQU87QUFDSEMsRUFBQUEsSUFBSSxFQUFHLEtBREo7QUFFSEMsRUFBQUEsR0FBRyxFQUFHLE9BRkg7QUFHSEMsRUFBQUEsUUFBUSxFQUFHLE1BSFI7QUFJSEMsRUFBQUEsT0FBTyxFQUFFLGlCQUFVQyxJQUFWLEVBQWU7QUFFcEIsUUFBSUMsTUFBTSxHQUFHLEVBQWI7QUFDQSxRQUFJQyxnQkFBZ0IsR0FBRyxFQUF2QjtBQUNBQyxJQUFBQSxP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QUFBLENBQUMsQ0FBQyxhQUFELENBQUQsQ0FBaUJnQyxLQUFqQjtBQUNILEtBUkU7QUFTSEMsSUFBQUEsS0FBSyxFQUFFLGVBQVN4QixJQUFULEVBQWM7QUFDakIsVUFBSXlCLFFBQVEsR0FBQyxFQUFiO0FBQ0EsVUFBSUMsTUFBTSxHQUFHQyxNQUFNLENBQUNDLE9BQVAsQ0FBZTVCLElBQUksQ0FBQzZCLFlBQUwsQ0FBa0JILE1BQWpDLEVBQXlDSSxHQUF6QyxDQUE2QztBQUFBO0FBQUEsWUFBRUMsR0FBRjtBQUFBLFlBQU9DLEtBQVA7O0FBQUEsZUFBbUI7QUFBQ0QsVUFBQUEsR0FBRyxFQUFIQSxHQUFEO0FBQUtDLFVBQUFBLEtBQUssRUFBTEE7QUFBTCxTQUFuQjtBQUFBLE9BQTdDLENBQWI7QUFFQUMsTUFBQUEsV0FBVyxHQUFHLEVBQWQ7O0FBQ0EsV0FBSSxJQUFJNUIsQ0FBQyxHQUFDLENBQVYsRUFBWUEsQ0FBQyxHQUFHcUIsTUFBTSxDQUFDcEIsTUFBdkIsRUFBK0JELENBQUMsRUFBaEMsRUFBbUM7QUFDL0I0QixRQUFBQSxXQUFXLCtEQUFvREMsR0FBRyxHQUFHUixNQUFNLENBQUNyQixDQUFELENBQU4sQ0FBVTJCLEtBQVYsQ0FBZ0IsQ0FBaEIsQ0FBMUQsV0FBWDtBQUNIOztBQUNEekMsTUFBQUEsQ0FBQyxDQUFDLFdBQUQsQ0FBRCxDQUFlNEMsS0FBZixHQUF1QmhCLElBQXZCLENBQTRCYyxXQUE1QjtBQUNIO0FBbEJFLEdBQVA7QUFvQkgsQ0EvQkQ7QUFpQ0ExQyxDQUFDLENBQUMsZUFBRCxDQUFELENBQW1CNkIsRUFBbkIsQ0FBc0IsT0FBdEIsRUFBK0IsWUFBVTtBQUNqQ2pCLEVBQUFBLE9BQU8sQ0FBQ0MsR0FBUixDQUFZLE9BQVo7QUFDQWIsRUFBQUEsQ0FBQyxDQUFDLGlCQUFELENBQUQsQ0FBcUI2QyxPQUFyQixDQUE2QixPQUE3QjtBQUNQLENBSEQiLCJzb3VyY2VzQ29udGVudCI6WyIkLmFqYXhTZXR1cCh7XG4gICAgaGVhZGVyczoge1xuICAgICAgICAnWC1DU1JGLVRPS0VOJzogJCgnbWV0YVtuYW1lPVwiY3NyZi10b2tlblwiXScpLmF0dHIoJ2NvbnRlbnQnKVxuICAgIH1cbn0pO1xuLy9oYW5kbGluZyBvZiB0aGUgbmV3IGZvcm0gYnV0dG9ucyBcblxuLy9iaW5kIGFuIGV2ZW50IGxpc3RlbmVyIHRvIHRoZW1cblxuLy8gICAgJCgnLm5ld0Zvcm0nKS5vbignY2xpY2snLGZ1bmN0aW9uKCl7XG4vL1xuLy8gICAgICAgIHZhciB0YXJnZXREaXYgPSB0aGlzLmdldEF0dHJpYnV0ZSgnZGF0YS1uYW1lJyk7XG4vLyAgICAgICAgdmFyIHNlbGVjdG9yID0gXCIjXCIrdGFyZ2V0RGl2K1wiX2Zvcm1cIjtcbi8vICAgICAgICB2YXIgZWRpdEZvcm0gPSAkKHNlbGVjdG9yKTtcbi8vXG4vLyAgICAgICAgLy9kaXNwbGF5IHRoZSBtb2RhbFxuLy8gICAgICAgICQoJyNuZXdDb21tZW50JykubW9kYWwoJ3Nob3cnKTtcbi8vICAgIH0pO1xuXG5cblxuJC5hamF4KHtcbiAgICB0eXBlIDogXCJHRVRcIixcbiAgICB1cmwgOiBcIi9zaG93XCIsXG4gICAgZGF0YVR5cGUgOiBcImpzb25cIixcbiAgICBzdWNjZXNzOiBmdW5jdGlvbiAoZGF0YSl7XG5cbiAgICAgICAgdmFyIG91dHB1dCA9IFwiXCI7XG4gICAgICAgIHZhciBjdXJyZW50U3RydWN0dXJlID0gXCJcIjtcbiAgICAgICAgY29uc29sZS5sb2coZGF0YSk7XG4gICAgICAgIGZvcihsZXQgaT0wO2kgPCBkYXRhLmxlbmd0aDtpKyspe1xuXG4gICAgICAgICAgICB2YXIgZSA9IGRhdGFbaV07XG5cbiAgICAgICAgICAgIC8vY2hhbmdlIHRoZSBoZWFkZXJcbiAgICAgICAgICAgIGlmKGN1cnJlbnRTdHJ1Y3R1cmUgIT0gZS5uYW1lKXtcbiAgICAgICAgICAgICAgICBjdXJyZW50U3RydWN0dXJlID0gZS5uYW1lO1xuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKGN1cnJlbnRTdHJ1Y3R1cmUpO1xuICAgICAgICAgICAgICAgIHZhciBsaW5rSHJlZiA9IGUubmFtZS5yZXBsYWNlKC8gL2csXCJfXCIpO1xuICAgICAgICAgICAgICAgIG91dHB1dCArPSBgPGgxIGNsYXNzPVwic3RjcnVjdHVyZVRpdGxlIGFPZmZzZXRcIiBpZD1cImxpbmtfJHtsaW5rSHJlZn1cIj4ke2UubmFtZX08L2gxPmA7XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgIGlmKGUuaXNBcHByb3ZlZCA9PSAxKXtcbiAgICAgICAgICAgICAgICBvdXRwdXQgKz0gYCA8ZGl2IGNsYXNzPVwiY2FyZCB0ZXh0LXdoaXRlIGJnLXN1Y2Nlc3MgbWItMyBzaGFkb3dcIj5gO1xuICAgICAgICAgICAgfWVsc2V7XG4gICAgICAgICAgICAgICAgb3V0cHV0ICs9IGAgPGRpdiBjbGFzcz1cImNhcmQgdGV4dC13aGl0ZSBiZy1zZWNvbmRhcnkgbWItMyBzaGFkb3dcIj5gO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgb3V0cHV0ICs9IGA8ZGl2IGNsYXNzPVwiY2FyZC1oZWFkZXJcIj5cbiAgICA8c3BhbiBjbGFzcz1cImdseXBoaWNvbiBnbHlwaGljb24tY29weVwiPjwvc3Bhbj5cblxuICAgPHNwYW4gY2xhc3M9XCJjb21tZW50SWRcIj4jJHtlLmNvZGV9JHtlLmlkfTwvc3Bhbj5cblxuPGRpdiBjbGFzcz1cImZvcm0tY2hlY2tcIj5cbjwhLS1DbGlwYm9hcmQgY2hlY2tib3ggLS0+XG4gIDxpbnB1dCBjbGFzcz1cImZvcm0tY2hlY2staW5wdXRcIiB0eXBlPVwiY2hlY2tib3hcIiB2YWx1ZT1cIiR7ZS50b25lfVwiIGlkPVwiJHtlLmlkfVwiPlxuICA8bGFiZWwgY2xhc3M9XCJmb3JtLWNoZWNrLWxhYmVsXCIgZm9yPVwiY2hlY2tfJHtlLmlkfVwiPlxuICAgPHNwYW4gZGF0YS10b2dnbGU9XCJ0b29sdGlwXCIgZGF0YS1wbGFjZW1lbnQ9XCJyaWdodFwiIHRpdGxlPVwiQ29weSB0aGlzIGNvbW1lbnQgdG8gdGhlIGNsaXBib2FyZFwiPiBDbGlwYm9hcmQ8L3NwYW4+XG4gIDwvbGFiZWw+XG5cbjwhLS1FbmQgb2YgQ2xpcGJvYXJkIGNoZWNrYm94IC0tPmA7XG4gICAgICAgICAgICBpZihlLnRvbmUgPT0gMSl7XG4gICAgICAgICAgICAgICAgb3V0cHV0ICs9IGA8c3BhbiBjbGFzcz1cImJhZGdlIGJhZGdlLXN1Y2Nlc3MgdG9uZUJhZGdlXCI+UG9zaXRpdmUgVG9uZTwvc3Bhbj5gO1xuICAgICAgICAgICAgfWVsc2V7XG4gICAgICAgICAgICAgICAgb3V0cHV0ICs9IGA8c3BhbiBjbGFzcz1cImJhZGdlIGJhZGdlLWRhbmdlciB0b25lQmFkZ2VcIj5OZWdhdGl2ZSBUb25lPC9zcGFuPmA7XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgIGlmKCBlLmlzQXBwcm92ZWQgPT0gMSl7XG5cbiAgICAgICAgICAgICAgICBvdXRwdXQgKz0gYDxzcGFuIGNsYXNzPVwidG9uZUJhZGdlIGJhZGdlIGJhZGdlLWluZm9cIj5BcHByb3ZlZCBDb21tZW50PC9zcGFuPmA7XG4gICAgICAgICAgICB9ZWxzZXtcbiAgICAgICAgICAgICAgICBvdXRwdXQgKz0gYDxzcGFuIGNsYXNzPVwidG9uZUJhZGdlIGJhZGdlICBiYWRnZS13YXJuaW5nXCI+UGVuZGluZyBDb21tZW50PC9zcGFuPmA7XG4gICAgICAgICAgICB9XG5cbiAgICAgICAgICAgIG91dHB1dCArPSBgXG4gICAgICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cbiAgICAgICAgICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cImNhcmQtYm9keVwiPlxuICAgICAgICAgICAgICAgICAgICAgICAgPHAgY2xhc3M9XCJjYXJkLXRleHRcIj4ke2UuY29tbWVudH08L3A+XG4gICAgICAgICAgICAgICAgICAgICAgICA8cCBjbGFzcz1cInN1Ym1pdHRlZEJ5XCI+U3VibWl0dGVkIGJ5IDxhIGhyZWY9XCIjXCIgY2xhc3M9XCJhdXRob3JMaW5rXCI+JHtlLmZpcnN0TmFtZX0ke2UubGFzdE5hbWV9IEAgJHtlLnVwZGF0ZWRfYXR9PC9hPjwvcD5cbiAgICAgICAgICAgICAgICAgICAgICAgIDwvZGl2PlxuICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+YDtcbiAgICAgICAgfVxuICAgICAgICAkKCcjY2FyZHMnKS5odG1sKG91dHB1dCk7XG4gICAgfSAvL3N1Y2Nlc3Ncbn0pO1xuXG4kKCcuc2F2ZU5ld0NvbW1lbnQnKS5vbignY2xpY2snLGZ1bmN0aW9uKCl7XG5cbiAgICB2YXIgZGF0YSA9IHtcbiAgICAgICAgJ2ZpcnN0TmFtZScgOiAkKCcjZmlyc3ROYW1lJykudmFsKCksXG4gICAgICAgICdsYXN0TmFtZScgOiAkKCcjbGFzdE5hbWUnKS52YWwoKSxcbiAgICAgICAgJ2VtYWlsJyA6ICQoJyNlbWFpbCcpLnZhbCgpLFxuICAgICAgICAndG9uZScgOiAkKCcjdG9uZScpLnZhbCgpLFxuICAgICAgICAnY29tbWVudCcgOiAkKCcjY29tbWVudCcpLnZhbCgpLFxuICAgICAgICAnc3RydWN0dXJlSWQnIDogJCgnI3N0cnVjdHVyZUlkJykudmFsKCksXG4gICAgfVxuICAgIC8vc2F2aW5nIHRoZSBuZXcgY29tbWVudFxuICAgICQuYWpheCh7XG4gICAgICAgIHR5cGUgOiBcIlBPU1RcIixcbiAgICAgICAgdXJsIDogXCIvXCIsXG4gICAgICAgIGRhdGFUeXBlIDogXCJqc29uXCIsXG4gICAgICAgIGRhdGEgOiBkYXRhLFxuICAgICAgICBzdWNjZXNzOiBmdW5jdGlvbiAoZGF0YSl7XG4gICAgICAgICAgICAkKCcjbmV3Q29tbWVudCcpLm1vZGFsKCdoaWRlJyk7XG4gICAgICAgICAgICAkKCcjbmV3Q29tbWVudCcpLnJlc2V0KCk7XG4gICAgICAgIH0sXG4gICAgICAgIGVycm9yOiBmdW5jdGlvbihkYXRhKXtcbiAgICAgICAgICAgIHZhciBlcnJvcm1zZz1cIlwiO1xuICAgICAgICAgICAgdmFyIGVycm9ycyA9IE9iamVjdC5lbnRyaWVzKGRhdGEucmVzcG9uc2VKU09OLmVycm9ycykubWFwKChba2V5LCB2YWx1ZV0pID0+ICh7a2V5LHZhbHVlfSkpO1xuXG4gICAgICAgICAgICBlcnJvck91dHB1dCA9IFwiXCI7XG4gICAgICAgICAgICBmb3IobGV0IGk9MDtpIDwgZXJyb3JzLmxlbmd0aCA7aSsrKXtcbiAgICAgICAgICAgICAgICBlcnJvck91dHB1dCArPSBgPGRpdiBjbGFzcz1cImFsZXJ0IGFsZXJ0LWRhbmdlclwiIHJvbGU9XCJhbGVydFwiPiR7ZXJyID0gZXJyb3JzW2ldLnZhbHVlWzBdfTwvZGl2PmA7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICAkKCcjZXJyb3Jtc2cnKS5lbXB0eSgpLmh0bWwoZXJyb3JPdXRwdXQpO1xuICAgICAgICB9LFxuICAgIH0pO1xufSk7XG5cbiQoJy5jbG9zZU5ld0Zvcm0nKS5vbignY2xpY2snLCBmdW5jdGlvbigpe1xuICAgICAgICBjb25zb2xlLmxvZyhcIlJlc2V0XCIpO1xuICAgICAgICAkKCcjbmV3Q29tbWVudEZvcm0nKS50cmlnZ2VyKFwicmVzZXRcIik7XG59KTtcblxuIl0sImZpbGUiOiIuL3Jlc291cmNlcy9qcy9teWFwcC5qcy5qcyIsInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/myapp.js\n");

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	
/******/ 	// startup
/******/ 	// Load entry module and return exports
/******/ 	// This entry module can't be inlined because the eval-source-map devtool is used.
/******/ 	var __webpack_exports__ = {};
/******/ 	__webpack_modules__["./resources/js/myapp.js"]();
/******/ 	
/******/ })()
;