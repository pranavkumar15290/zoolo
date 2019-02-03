jQuery(document).ready(function($){

	//Return if form is not available in the DOM
	var popup_container = $('.xoo-el-container');
	if(popup_container.length  === 0){
		return false;
	}


	var spinner = '<i class="fa fa-circle-o-notch spinner fa-spin" aria-hidden="true"></i>',
		el_notice = $('.xoo-el-notice');


	//Opens popup
	var open_popup = function(){
		$('body , .xoo-el-container').addClass('xoo-el-popup-active');
	}

	//Close popup
	var close_popup = function(e){
		$.each(e.target.classList,function(key,value){
			if(value == 'xoo-el-modal' || value == 'xoo-el-close'){
				$('body , .xoo-el-container').removeClass('xoo-el-popup-active');
				clear_notice();
				return false;
			}
		})
	}

	$('.xoo-el-modal').on('click',close_popup);

	//Show notice
	var show_notice = function(notice,notice_type){
		var notice_string = typeof notice == 'object' ? '<span>'+notice.join('<br>')+'</span>' : '<span>'+notice+'</span>';
		var notice_class  = notice_type == 'error' ? 'xoo-el-notice-error' : 'xoo-el-notice-success';
		el_notice.html(notice_string)
			.addClass(notice_class)
			.addClass('xoo-el-active');
	}

	var clear_notice = function(){
		el_notice.attr('class','xoo-el-notice').html('');
		$('.xoo-el-lostpw-success').remove();
		$('form.xoo-el-action-form').show();
	}


	/* 
		Handles form interaction
	*/
	var formHandler = {

		init: function(){

			this.switch_form_to = this.switch_form_to.bind(this);
			this.submit_form 	= this.submit_form.bind(this);

			//Switch form
			$(document).on('click','.xoo-el-login-tgr , .xoo-el-reg-tgr , .xoo-el-lostpw-tgr',this.switch_form_to);
			//Submit form
			$(document).on('submit','.xoo-el-action-form',this.submit_form);

		},

		//Navigate to different parts of form Login/Register/Lost Password
		switch_form_to: function(eventObj){

			var $target = $(eventObj.currentTarget),
				section;

			if(!$target || $target.is('.xoo-el-login-tgr')){
				section = 'xoo-el-section-login';
			}

			else if($target.is('.xoo-el-reg-tgr')){
				section = 'xoo-el-section-register';
			}

			else if($target.is('.xoo-el-lostpw-tgr')){
				section = 'xoo-el-section-lostpw';
			}

			
			$('.xoo-el-section').removeClass('xoo-el-active');
			$('.'+section).addClass('xoo-el-active');
			open_popup();
			clear_notice();
		},


		submit_form: function(eventObj){

			eventObj.preventDefault();
			clear_notice();

			var $form 		= $(eventObj.currentTarget),
				$form_type 	= $form.find('input[name=_xoo_el_form]').val();

			if(!$form_type) return;

			var errors = validationHandler.validate($form_type);

			if(errors.length !== 0){
				show_notice(errors,'error');
				return;
			}

			this.perform_action($form)

		},

		perform_action: function($form){

			var $button 	= $form.find('.xoo-el-action-btn'),
				old_btn_txt = $button.text();

			$button.html(spinner).addClass('xoo-el-processing');

			var form_data = $form.serialize()+'&action=xoo_el_form_action';

			$.ajax({
				url: xoo_el_localize.adminurl,
				type: 'POST',
				data: form_data,
				success: function(response){
				
					$button.removeClass('xoo-el-processing').html(old_btn_txt);

					if(response.error == 1){ //has errors
						show_notice(response.notice,'error');
					}
					else{
						if($button.hasClass('xoo-el-lostpw-btn')){
							$button.parents('.xoo-el-action-form').hide();
							$button.parents('.xoo-el-fields').append(response.notice);
						}
						else{
							show_notice(response.notice,'success');
							setTimeout(function(){
								window.location = response.redirect;
							},300)
						}
					}
				}
			})

		}

	}


	/*
		Validates Input field
	*/

	var validationHandler = {

		errors: [],

		validate: function(validate_type){

			if(typeof this[ validate_type] !== 'function'){
				console.log(validate_type + ' is not a valid input form type.');
				return;
			}
			this[validate_type]();
			return this.getErrors();
		},


		setError: function(error){
			this.errors.push(error);
		},


		getErrors: function(){
			var saveErrors = this.errors;
			this.errors = []; //clear
			return saveErrors;
		},


		checkLength: function(input_el,length){
			return length > input_el.val().trim().length;
		},


		login: function(){

			var username = $('#xoo-el-username'),
				password = $('#xoo-el-password');

			//Both fields empty
			if(this.checkLength(username,1) || this.checkLength(password,1)){
				this.setError(xoo_el_localize.strings.errors.login.empty);
			}
		},


		register: function(){

			var email 	 		= $('#xoo-el-reg-email'),
				password 		= $('#xoo-el-reg-password'),
				password_again 	= $('#xoo-el-reg-confirm-password'),
				first_name 		= $('#xoo-el-reg-fname'),
				last_name 		= $('#xoo-el-reg-lname'),
				terms			= $('#xoo-el-terms'),
				strings 		= xoo_el_localize.strings.errors.register;

			//Enter valid email address
			if(/\S+@\S+\.\S+/.test(email.val()) === false){
				this.setError(strings.valid_email);
			}

			//Password must be minimum 6 characters.
			if(this.checkLength(password,6)){
				this.setError(strings.min_password);
			}
			else{//Passwords don't match
				if(password.val() !== password_again.val()){
					this.setError(strings.match_password);
				}
			}

			if(first_name.length !== 0){

				//First name must be minimum 3 characters.
				if(this.checkLength(first_name,3)){
					this.setError(strings.min_fname);
				}

				//Last name must be minimum 3 characters.
				if(this.checkLength(last_name,3)){
					this.setError(strings.min_lname);
				}

			}

			//Please accept the terms & conditions.
			if( !terms.is( ':checked' ) && !this.errors.length ){
				this.setError( strings.check_terms );
			}

		},

		lostPassword: function(){

			var email_user = $('#xoo-el-lostpw-email');

			if(this.checkLength(email_user,1)){
				this.setError(xoo_el_localize.strings.errors.register.valid_email);
			}
			
		},
	}

	//Initialize form handler
	formHandler.init();

})
