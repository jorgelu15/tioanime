"use strict";

// Initialize function, create initial tokens with itens that are already selected by the user
function init(element) {
  // Create div that wroaps all the elements inside (select, elements selected, search div) to put select inside
  var wrapper = document.createElement("div");
  wrapper.addEventListener("click", clickOnWrapper);
  wrapper.classList.add("multi-select-component"); // Create elements of search

  var search_div = document.createElement("div");
  search_div.classList.add("search-container");
  var input = document.createElement("input");
  input.classList.add("selected-input");
  input.setAttribute("autocomplete", "off");
  input.setAttribute("tabindex", "0");
  input.addEventListener("keyup", inputChange);
  input.addEventListener("keydown", deletePressed);
  input.addEventListener("click", openOptions);
  var dropdown_icon = document.createElement("a");
  dropdown_icon.setAttribute("href", "#");
  dropdown_icon.classList.add("dropdown-icon");
  dropdown_icon.addEventListener("click", clickDropdown);
  var autocomplete_list = document.createElement("ul");
  autocomplete_list.classList.add("autocomplete-list");
  search_div.appendChild(input);
  search_div.appendChild(autocomplete_list);
  search_div.appendChild(dropdown_icon); // set the wrapper as child (instead of the element)

  element.parentNode.replaceChild(wrapper, element); // set element as child of wrapper

  wrapper.appendChild(element);
  wrapper.appendChild(search_div);
  createInitialTokens(element);
  addPlaceholder(wrapper);
}

function removePlaceholder(wrapper) {
  var input_search = wrapper.querySelector(".selected-input");
  input_search.removeAttribute("placeholder");
}

function addPlaceholder(wrapper) {
  var input_search = wrapper.querySelector(".selected-input");
  var tokens = wrapper.querySelectorAll(".selected-wrapper");
  if (!tokens.length && !(document.activeElement === input_search)) input_search.setAttribute("placeholder", "Elegir");
} // Function that create the initial set of tokens with the options selected by the users


function createInitialTokens(select) {
  var _getOptions = getOptions(select),
      options_selected = _getOptions.options_selected;

  var wrapper = select.parentNode;

  for (var i = 0; i < options_selected.length; i++) {
    createToken(wrapper, options_selected[i]);
  }
} // Listener of user search


function inputChange(e) {
  var wrapper = e.target.parentNode.parentNode;
  var select = wrapper.querySelector("select");
  var dropdown = wrapper.querySelector(".dropdown-icon");
  var input_val = e.target.value;

  if (input_val) {
    dropdown.classList.add("active");
    populateAutocompleteList(select, input_val.trim());
  } else {
    dropdown.classList.remove("active");

    var _event = new Event('click');

    dropdown.dispatchEvent(_event);
  }
} // Listen for clicks on the wrapper, if click happens focus on the input


function clickOnWrapper(e) {
  var wrapper = e.target;

  if (wrapper.tagName == "DIV") {
    var input_search = wrapper.querySelector(".selected-input");
    var dropdown = wrapper.querySelector(".dropdown-icon");

    if (!dropdown.classList.contains("active")) {
      var _event2 = new Event('click');

      dropdown.dispatchEvent(_event2);
    }

    input_search.focus();
    removePlaceholder(wrapper);
  }
}

function openOptions(e) {
  var input_search = e.target;
  var wrapper = input_search.parentElement.parentElement;
  var dropdown = wrapper.querySelector(".dropdown-icon");

  if (!dropdown.classList.contains("active")) {
    var _event3 = new Event('click');

    dropdown.dispatchEvent(_event3);
  }

  e.stopPropagation();
} // Function that create a token inside of a wrapper with the given value


function createToken(wrapper, value) {
  var search = wrapper.querySelector(".search-container"); // Create token wrapper

  var token = document.createElement("div");
  token.classList.add("selected-wrapper");
  var token_span = document.createElement("span");
  token_span.classList.add("selected-label");
  token_span.innerText = value;
  var close = document.createElement("a");
  close.classList.add("selected-close");
  close.setAttribute("tabindex", "-1");
  close.setAttribute("data-option", value);
  close.setAttribute("data-hits", 0);
  close.setAttribute("href", "#");
  close.innerText = "x";
  close.addEventListener("click", removeToken);
  token.appendChild(token_span);
  token.appendChild(close);
  wrapper.insertBefore(token, search);
} // Listen for clicks in the dropdown option


function clickDropdown(e) {
  var dropdown = e.target;
  var wrapper = dropdown.parentNode.parentNode;
  var input_search = wrapper.querySelector(".selected-input");
  var select = wrapper.querySelector("select");
  dropdown.classList.toggle("active");

  if (dropdown.classList.contains("active")) {
    removePlaceholder(wrapper);
    input_search.focus();

    if (!input_search.value) {
      populateAutocompleteList(select, "", true);
    } else {
      populateAutocompleteList(select, input_search.value);
    }
  } else {
    clearAutocompleteList(select);
    addPlaceholder(wrapper);
  }
} // Clears the results of the autocomplete list


function clearAutocompleteList(select) {
  var wrapper = select.parentNode;
  var autocomplete_list = wrapper.querySelector(".autocomplete-list");
  autocomplete_list.innerHTML = "";
} // Populate the autocomplete list following a given query from the user


function populateAutocompleteList(select, query) {
  var dropdown = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : false;

  var _getOptions2 = getOptions(select),
      autocomplete_options = _getOptions2.autocomplete_options;

  var options_to_show;
  if (dropdown) options_to_show = autocomplete_options;else options_to_show = autocomplete(query, autocomplete_options);
  var wrapper = select.parentNode;
  var input_search = wrapper.querySelector(".search-container");
  var autocomplete_list = wrapper.querySelector(".autocomplete-list");
  autocomplete_list.innerHTML = "";
  var result_size = options_to_show.length;

  if (result_size == 1) {
    var li = document.createElement("li");
    li.innerText = options_to_show[0];
    li.setAttribute('data-value', options_to_show[0]);
    li.addEventListener("click", selectOption);
    autocomplete_list.appendChild(li);

    if (query.length == options_to_show[0].length) {
      var _event4 = new Event('click');

      li.dispatchEvent(_event4);
    }
  } else if (result_size > 1) {
    for (var i = 0; i < result_size; i++) {
      var _li = document.createElement("li");

      _li.innerText = options_to_show[i];

      _li.setAttribute('data-value', options_to_show[i]);

      _li.addEventListener("click", selectOption);

      autocomplete_list.appendChild(_li);
    }
  } else {
    var _li2 = document.createElement("li");

    _li2.classList.add("not-cursor");

    _li2.innerText = "No options found";
    autocomplete_list.appendChild(_li2);
  }
} // Listener to autocomplete results when clicked set the selected property in the select option 


function selectOption(e) {
  var wrapper = e.target.parentNode.parentNode.parentNode;
  var input_search = wrapper.querySelector(".selected-input");
  var option = wrapper.querySelector("select option[value=\"".concat(e.target.dataset.value, "\"]"));
  option.setAttribute("selected", "");
  createToken(wrapper, e.target.dataset.value);

  if (input_search.value) {
    input_search.value = "";
  }

  input_search.focus();
  e.target.remove();
  var autocomplete_list = wrapper.querySelector(".autocomplete-list");

  if (!autocomplete_list.children.length) {
    var li = document.createElement("li");
    li.classList.add("not-cursor");
    li.innerText = "No options found";
    autocomplete_list.appendChild(li);
  }

  var event = new Event('keyup');
  input_search.dispatchEvent(event);
  e.stopPropagation();
} // function that returns a list with the autcomplete list of matches


function autocomplete(query, options) {
  // No query passed, just return entire list
  if (!query) {
    return options;
  }

  var options_return = [];

  for (var i = 0; i < options.length; i++) {
    if (query.toLowerCase() === options[i].slice(0, query.length).toLowerCase()) {
      options_return.push(options[i]);
    }
  }

  return options_return;
} // Returns the options that are selected by the user and the ones that are not


function getOptions(select) {
  // Select all the options available
  var all_options = Array.from(select.querySelectorAll("option")).map(function (el) {
    return el.value;
  }); // Get the options that are selected from the user

  var options_selected = Array.from(select.querySelectorAll("option:checked")).map(function (el) {
    return el.value;
  }); // Create an autocomplete options array with the options that are not selected by the user

  var autocomplete_options = [];
  all_options.forEach(function (option) {
    if (!options_selected.includes(option)) {
      autocomplete_options.push(option);
    }
  });
  autocomplete_options.sort();
  return {
    options_selected: options_selected,
    autocomplete_options: autocomplete_options
  };
} // Listener for when the user wants to remove a given token.


function removeToken(e) {
  // Get the value to remove
  var value_to_remove = e.target.dataset.option;
  var wrapper = e.target.parentNode.parentNode;
  var input_search = wrapper.querySelector(".selected-input");
  var dropdown = wrapper.querySelector(".dropdown-icon"); // Get the options in the select to be unselected

  var option_to_unselect = wrapper.querySelector("select option[value=\"".concat(value_to_remove, "\"]"));
  option_to_unselect.removeAttribute("selected"); // Remove token attribute

  e.target.parentNode.remove();
  input_search.focus();
  dropdown.classList.remove("active");
  var event = new Event('click');
  dropdown.dispatchEvent(event);
  e.stopPropagation();
} // Listen for 2 sequence of hits on the delete key, if this happens delete the last token if exist


function deletePressed(e) {
  var wrapper = e.target.parentNode.parentNode;
  var input_search = e.target;
  var key = e.keyCode || e.charCode;
  var tokens = wrapper.querySelectorAll(".selected-wrapper");

  if (tokens.length) {
    var last_token_x = tokens[tokens.length - 1].querySelector("a");
    var hits = +last_token_x.dataset.hits;

    if (key == 8 || key == 46) {
      if (!input_search.value) {
        if (hits > 1) {
          // Trigger delete event
          var _event5 = new Event('click');

          last_token_x.dispatchEvent(_event5);
        } else {
          last_token_x.dataset.hits = 2;
        }
      }
    } else {
      last_token_x.dataset.hits = 0;
    }
  }

  return true;
}

document.addEventListener("DOMContentLoaded", function () {
  // get select that has the options available
  var select = document.querySelectorAll("[data-multi-select-plugin]");
  select.forEach(function (select) {
    init(select);
  }); // Dismiss on outside click

  document.addEventListener('click', function () {
    // get select that has the options available
    var select = document.querySelectorAll("[data-multi-select-plugin]");

    for (var i = 0; i < select.length; i++) {
      if (event) {
        var isClickInside = select[i].parentElement.parentElement.contains(event.target);

        if (!isClickInside) {
          var wrapper = select[i].parentElement.parentElement;
          var dropdown = wrapper.querySelector(".dropdown-icon");
          var autocomplete_list = wrapper.querySelector(".autocomplete-list"); //the click was outside the specifiedElement, do something

          dropdown.classList.remove("active");
          autocomplete_list.innerHTML = "";
          addPlaceholder(wrapper);
        }
      }
    }
  });
});