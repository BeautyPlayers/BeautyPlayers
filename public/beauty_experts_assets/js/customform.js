$(document).ready(function () {
  var name = document.getElementById('name'),
    nameError = document.getElementById('name-err'),
    restaurant = document.getElementById("form-issue-list"),
    restaurantError = document.getElementById("restaurant-error"),
    email = document.getElementById("email"),
    emailError = document.getElementById("email-err");
    email.addEventListener('input', function () {
      emailError.innerText = '';
    });
  name.addEventListener('input', function () {
    nameError.innerText = '';
  });
  var consentCheckobox = document.getElementById('consent-checkbox');
  var phone = document.getElementById('phone');
  if (phone && phone.value) {
    phone.value = phone.value.trim();
  }
  console.log(phone.value);
  var phoneError = document.getElementById('phone-err');
  phone.addEventListener('input', function () {
    phoneError.innerText = '';
  });
  var message = document.getElementById('description');
  var success = document.getElementById('form-success');
  let demoTest = document.getElementById("form-issue-list");
    demoTest.addEventListener('click', function (e) {
        if (e.target.tagName === "INPUT") {
            restaurantError.innerHTML = '';
        }
    })
  function validateForm() {
    var nameReg = /^[A-Z a-z]+$/;
    var numberReg = /^[6-9]\d{9}$/;
    var emailReg = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    // stringToCompare = "Select business category";
    var isvalid = true;
    if(!emailReg.test(email.value)){
      emailError.innerText = "Please enter correct email ID";
      isvalid = false;
    }
    if (!nameReg.test(name.value)) {
      nameError.innerText = "Please enter your name";
      isvalid = false;
    }
    if (!numberReg.test(phone.value)) {
      phoneError.innerText = "Please enter valid mobile number";
      isvalid = false;
    }
    var restaurant = document.getElementsByClassName("bsuinesstype"),
      restaurantError = document.getElementById("restaurant-error"),
      isChecked = false;
    for (let i = 0; i < restaurant.length; i += 1) {
      if (restaurant[i].checked) {
        isChecked = true;
      }
    }
    if (!isChecked) {
      restaurantError.innerHTML = "Please select a business category";
      return false;
      
    }
    nameError.value = '';
    phoneError.value = '';
    emailError.value = '';
    return isvalid;
  }
  var clearFormData = () => {
    name.value = '';
    phone.value = '';
    email.value = '';
    restaurantError.innerHTML = '';
    if (message && message.value)
      message.value = '';
  };
  
  function gtag_report_conversion(url) {
    var callback = function () {
      if (url) {
        setTimeout(() => {
          window.location = url;
        }, 10000)
      }
    };
    gtag('event', 'conversion', {
      'send_to': 'AW-417289495/aP6pCJv28fUBEJeq_cYB',
      'event_callback': callback
    });
    return false;
  }
  function gtag_report_conversion_mob(url) {
    var callback = function () {
      if (url) {
        setTimeout(() => {
          window.location = url;
        }, 10000)
      }
    };
    gtag('event', 'conversion', {
      'send_to': 'AW-417289495/aP6pCJv28fUBEJeq_cYB',
      'event_callback': callback
    });
    return false;
  }
  $("#landing-form-submit").click(function () {
    var payload = JSON.stringify({
      name: name.value,
      phone: phone.value,
      businessCategory: document.querySelector(`input[type="radio"][name=restaurant]:checked`).value,
      source: "landing-" + window.location.href,
      tncCheck: consentCheckobox?.checked,
      // businessCategory: restaurantCat.innerText,
    });
    if (validateForm()) {
      $.ajax({
        type: "POST",
        url: 'https://api.dotpe.in/api/catalog/store/enquiry/details',
        contentType: 'application/json',
        data: payload,
        dataType: 'json',
        success: function (data) {
          success.style.display = 'flex'
          setTimeout(function () {
            success.style.display = 'none'
          }, 25000)
          clearFormData();
          gtag('event', 'Request demo (main)', { 'event_category': 'Submit lead form', 'event_label': '' });
          fbq('track', 'Lead');
        },
        error: function (error) {
          alert('error while submitting demo request');
        }
      })
    }
  });

  $("#landing-form-submit-mob").click(function () {
    let businessCategoryElement = document.getElementsByClassName("bsuinesstype"),
    businessCategory = "";
    for (let i=0; i<businessCategoryElement.length; i++){
      if(businessCategoryElement[i].checked){
        businessCategory = businessCategoryElement[i].value;
      }
    }
    var payload = JSON.stringify({
      name: name.value,
      phone: phone.value,
      email: email.value,
      businessCategory,
      source: "landing-" + window.location.href,
      tncCheck: consentCheckobox?.checked,
      // businessCategory: restaurantCat.innerText,
    });
    if (validateForm()) {
      $.ajax({
        type: "POST",
        url: 'https://api.dotpe.in/api/catalog/store/enquiry/details',
        contentType: 'application/json',
        data: payload,
        dataType: 'json',
        success: function (data) {
          document.getElementById('demo_form_sub').style.display = 'none'
          document.getElementById('success-popup').style.display = 'flex'
          setTimeout(function () {
            success.innerHTML = ''
          }, 25000)
          clearFormData();
          formClose();
          gtag_report_conversion_mob(window.location.href);
          fbq('track', 'Lead');
        },
        error: function (error) {
          alert('error while submitting demo request');
        }
      })
    }
  });
  $("#landing-form-submit-mob-new").click(function () {
    let businessCategoryElement = document.getElementsByClassName("bsuinesstype"),
    businessCategory = "";
    for (let i=0; i<businessCategoryElement.length; i++){
      if(businessCategoryElement[i].checked){
        businessCategory = businessCategoryElement[i].value;
      }
    }
    var payload = JSON.stringify({
      name: name.value,
      phone: phone.value,
      email: email.value,
      businessCategory,
      source: "landing-" + window.location.href,
      tncCheck: consentCheckobox?.checked,      
    });
    
    
    if (validateForm()) {
      $.ajax({
        type: "POST",
        url: 'https://api.dotpe.in/api/catalog/store/enquiry/details',
        contentType: 'application/json',
        data: payload,
        dataType: 'json',
        success: function (data) {
          document.getElementById('demo_form_sub').style.display = 'none'
          document.getElementById('success-popup').style.display = 'flex';
          setTimeout(function () {
            success.innerHTML = ''
          }, 25000)
          clearFormData();
          formClose();
          document.querySelector("body").style.overflowY = "hidden";
          gtag_report_conversion_mob(window.location.href);
          fbq('track', 'Lead');
        },
        error: function (error) {
          alert('error while submitting demo request');
        }
      })
    }
    
  });
  $("#email-submit-demo").click(function () {
    var payload = JSON.stringify({
      name: name.value,
      phone: phone.value,
      businessCategory: document.querySelector(`input[type="radio"][name=restaurant]`).value,
      source: "landing-" + window.location.href,
      tncCheck: consentCheckobox?.checked,
      // businessCategory: restaurantCat.innerText,
    });
    

    if (validateForm()) {
      $.ajax({
        type: "POST",
        url: 'https://api.dotpe.in/api/catalog/store/enquiry/details',
        contentType: 'application/json',
        data: payload,
        dataType: 'json',
        success: function (data) {
          success.style.display = 'flex'
          setTimeout(function () {
            success.style.display = 'none'
          }, 25000)
          clearFormData();
          gtag('event', 'Get a callback (main)', { 'event_category': 'Submit lead form', 'event_label': '' });
          fbq('track', 'Lead');
        },
        error: function (error) {
          alert('error while submitting demo request');
        }
      })
    }
  });
})

function formShow() {
  document.getElementById('section_demo_form').style.display = 'block'
}

function formClose() {
  document.getElementById('section_demo_form').style.display = 'none'
}

function getUtmSource() {
  const params = new URLSearchParams(window.location.search);
  return params.get('utm_source') || "";
}








