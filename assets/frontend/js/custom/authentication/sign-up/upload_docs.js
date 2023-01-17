// Define form element
const form1 = document.getElementById('kt_upload_docs_form');

// Init form validation rules. For more info check the FormValidation plugin's official documentation:https://formvalidation.io/
var validator = FormValidation.formValidation(
    form1,
    {
        fields: {
                    id_front_file: {
                        validators: {
                            notEmpty: {
                                message: "ID Card Front required"
                            }
                        }
                    },
                    id_back_file: {
                        validators: {
                            notEmpty: {
                                message: "ID Card Back required"
                            }
                        }
                    },
                    passing_year_matric: {
                        validators: {
                            notEmpty: {
                                message: "Passing Year required"
                            }
                        }
                    },
                    matirc_file: {
                        validators: {
                            notEmpty: {
                                message: "Matric File is required"
                            }
                        }
                    },
                    passing_year_inter: {
                        validators: {
                            notEmpty: {
                                message: "Passing Year required"
                            }
                        }
                    },
                    inter_file: {
                        validators: {
                            notEmpty: {
                                message: "Inter File is required"
                            }
                        }
                    },
                    passing_year_undergraduate: {
                        validators: {
                            notEmpty: {
                                message: "Passing Year required"
                            }
                        }
                    },
                    undergraduate_file: {
                        validators: {
                            notEmpty: {
                                message: "Undergraduate File is required"
                            }
                        }
                    },
                    passing_year_postgraduate: {
                        validators: {
                            notEmpty: {
                                message: "Passing Year required"
                            }
                        }
                    },
                    postgraduate_file: {
                        validators: {
                            notEmpty: {
                                message: "Postgraduate File is required"
                            }
                        }
                    },
                    passing_year_phd: {
                        validators: {
                            notEmpty: {
                                message: "Passing Year required"
                            }
                        }
                    },
                    phd_file: {
                        validators: {
                            notEmpty: {
                                message: "PhD File is required"
                            }
                        }
                    },
                    passing_year_pmdc: {
                        validators: {
                            notEmpty: {
                                message: "Passing Year required"
                            }
                        }
                    },
                    pmdc_file: {
                        validators: {
                            notEmpty: {
                                message: "PMDC File is required"
                            }
                        }
                    },
                   
                },

        plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap5({
                rowSelector: '.fv-row',
                eleInvalidClass: '',
                eleValidClass: ''
            })
        }
    }
);

// Submit button handler
const submitDocButtons = document.getElementById('kt_upload_docs_submit');
submitDocButtons.addEventListener('click', function (e) {
    // Prevent default button action
    e.preventDefault();

    // Validate form before submit
    if (validator) {
        validator.validate().then(function (status) {
            console.log('validated!');

            if (status == 'Valid') {
                // Show loading indication
                submitDocButtons.setAttribute('data-kt-indicator', 'on');

                // Disable button to avoid multiple click
                submitDocButtons.disabled = true;

                // Simulate form submission. For more info check the plugin's official documentation: https://sweetalert2.github.io/
                setTimeout(function () {
                    // Remove loading indication
                    submitDocButtons.removeAttribute('data-kt-indicator');

                    // Enable button
                    submitDocButtons.disabled = false;
                    //form_data = new FormData(document.getElementById("kt_payment_form"));
                    //form_data = '';
                     
                var form_data = new FormData(document.getElementById("kt_upload_docs_form"));
                        $.ajax({
                      
                         
                     type:"post",
                     data:form_data,  
                      
                     processData:false,
                     contentType:false,
                     cache:false,
                     async:false,
                     dataType: "json",
                        success: function(data) {
                            console.log(data);
                           // $('#sectionID').html(data);
                           var res = data;
                           console.log(res);
                            
                           if(res.return){
                            Swal.fire({
                            text: "Your Documents Submitted Successfully!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Ok, got it!",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            }
                        }).then((function(t) {
                            if (t.isConfirmed) {
                                //e.querySelector('[name="email"]').value = "", e.querySelector('[name="password"]').value = "";
                                var i = 'signin/index';
                                i && (location.href = jsbaseurl+i)
                            }
                        }))
                        }else{
                            Swal.fire({
                        text: "Sorry, Invalid details, please try again.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Ok, got it!",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        }
                    })
                        }
                        }
                        })
                     

                    //form.submit(); // Submit form
                }, 2000);
            }
        });
    }
});