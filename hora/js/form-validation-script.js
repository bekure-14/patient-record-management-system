var Script = function () {

    $.validator.setDefaults({
        submitHandler: function() { alert("submitted!"); }
    });

    $().ready(function() {
        // validate the comment form when it is submitted
        $("#feedback_form").validate();

        // validate signup form on keyup and submit
        $("#register_form").validate({
            rules: {
                fname: {
                    required: true,
                    minlength: 4
                },
				mname: {
                    required: true,
                    minlength: 4
                },
				lname: {
                    required: true,
                    minlength: 4
                },
                address: {
                    required: true,
                    minlength: 4
                },
                special: {
                    required: true,
                    minlength: 5
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true
                },
                topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"
            },
            messages: {                
                fname: {
                    required: "Please enter a First Name.",
                    minlength: "Your First Name must consist of at least 4 characters long."
                },
				mname: {
                    required: "Please enter a Middle Name.",
                    minlength: "Your Middle Name must consist of at least 4 characters long."
                },
				lname: {
                    required: "Please enter a Last Name.",
                    minlength: "Your Last Name must consist of at least 4 characters long."
                },
                address: {
                    required: "Please enter an Address.",
                    minlength: "Your Address must consist of at least 10 characters long."
                },
                special: {
                    required: "Please enter a Specialization.",
                    minlength: "Your Specialization must consist of at least 5 characters long."
                },
                password: {
                    required: "Please provide a password.",
                    minlength: "Your password must be at least 5 characters long."
                },
                confirm_password: {
                    required: "Please provide a password.",
                    minlength: "Your password must be at least 5 characters long.",
                    equalTo: "Please enter the same password as above."
                },
                email: "Please enter a valid email address.",
                agree: "Please accept our terms & condition."
            }
        });

        // propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if(firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });
    });


}();