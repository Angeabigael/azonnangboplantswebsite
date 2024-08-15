document.querySelector('.php-email-form').addEventListener('submit', function(e) {
  e.preventDefault();
  document.querySelector('.loading').classList.add('d-block');

  let params = {
    name: this.name.value,
    email: this.email.value,
    subject: this.subject.value,
    message: this.message.value
  };
  
  let serviceID = "service_xfyj9cf";
  let templateID = "template_ue0dkun";


  emailjs.send(serviceID, templateID, params)
      .then(function(res) {
        document.querySelector('.sent-message').classList.add('d-block');
        document.querySelector('.loading').classList.remove('d-block');
      }, function(error) {
        document.querySelector('.error-message').classList.add('d-block');
        document.querySelector('.loading').classList.remove('d-block');
        //alert(JSON.stringify(error));
      });
});
