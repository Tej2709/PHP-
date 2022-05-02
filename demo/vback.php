
			
			 
			 var $FNameLNameRegEx = /^([a-zA-Z]{2,20})$/;
			 var $PasswordRegEx = /^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[^\w\s]).{4,12}$/;
			 var $EmailIdRegEx = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,8}\b$/;

			$(document).ready(function(){
				
				
				var fnameflag=false,lnameflag=false,emailflag=false,passwordflag=false,addressflag=fase;
				$("#Fname").blur(function(){
					$("#name_err").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#name_err").html("(*) Firstname required..!!");
						fnameflag=false;
					}
					else{
						if(!$(this).val().match($FNameLNameRegEx))
						{
							$("#name_err").html("(*) Invalid firstname..!!");
							fnameflag=false;
						}
						else{
							fnameflag=true;
						}
					}
				});
				$("#Lname").blur(function(){
					$("#lastname").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#lastname").html("(*) Lastname required..!!");
						lnameflag=false;
					}
					else{
						if(!$(this).val().match($FNameLNameRegEx))
						{
							$("#lastname").html("(*) Invalid Lastname..!!");
							lnameflag=false;
						}
						else{
							lnameflag=true;
						}
					}
				});
				$("#Email").blur(function(){
					$("#email_err").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#email_err").html("(*) Email required..!!");
						emailflag=false;
					}
					else{
						if(!$(this).val().match($EmailIdRegEx))
						{
							$("#email_err").html("(*) Invalid Email..!!");
							emailflag=false;
						}
						else{
							emailflag=true;
						}
					}
				});
				$("#Password").blur(function(){
					$("#pass_err").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#pass_err").html("(*) Password required..!!");
						passwordflag=false;
					}
					else{
						if(!$(this).val().match($PasswordRegEx))
						{
							$("#pass_err").html("(*) Invalid Password..!!");
							passwordflag=false;
						}
						else{
							passwordflag=true;
						}
					}
				});
				$("#Address").blur(function(){
					$("#add_err").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#add_err").html("(*) Address required..!!");
						addressflag=false;
					}
					else{
						addressflag=true;
					}
				});
				$("#designation").blur(function(){
					$("#designation_err").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#designation_err").html("(*) Select Designation..!!");
						emailflag=false;
					}
					else{
						emailflag=true;
					}
				});
				$('#submit').click(function(){
					$("#name_err").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						alert("htlo");
						$("#name_err").html("(*) Firstname required..!!");
						fnameflag=false;
					}
					else{
						if(!$(this).val().match($FNameLNameRegEx))
						{
							$("#name_err").html("(*) Invalid firstname..!!");
							fnameflag=false;
						}
						else{
							fnameflag=true;
						}
					}
					$("#lastname").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#lastname").html("(*) Lastname required..!!");
						lnameflag=false;
					}
					else{
						if(!$(this).val().match($FNameLNameRegEx))
						{
							$("#lastname").html("(*) Invalid Lastname..!!");
							lnameflag=false;
						}
						else{
							lnameflag=true;
						}
					}
					$("#email_err").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("email_err").html("(*) Email required..!!");
						emailflag=false;
					}
					else{
						if(!$(this).val().match($EmailIdRegEx))
						{
							$("#email_err").html("(*) Invalid Email..!!");
							emailflag=false;
						}
						else{
							emailflag=true;
						}
					}
					$("#pass_err").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#pass_err").html("(*) Password required..!!");
						emailflag=false;
					}
					else{
						if(!$(this).val().match($PasswordRegEx))
						{
							$("#pass_err").html("(*) Invalid Password..!!");
							emailflag=false;
						}
						else{
							emailflag=true;
						}
					}
					$("#add_err").empty();
					if($(this).val()=="" || $(this).val()==null)
					{
						$("#add_err").html("(*) Address required..!!");
						emailflag=false;
					}
					else{
						emailflag=true;
					}
				});
				$('#Fname ').keypress(function(e){
					$('#name_err').empty();
					var flag= false;
					(e.which>=65 && e.which<=90) || (e.which>=92 && e.which<=122)
					?flag=true
					:(flag=false,$('#name_err').html('(*) Please Enter Valid Name..'));
					return flag;
				});
				$('#Lastname').keypress(function(e){
					$('#lastname').empty();
					var flag= false;
					(e.which>=65 && e.which<=90) || (e.which>=92 && e.which<=122)
					?flag=true
					:(flag=false,$('#lastname').html('(*) Please Enter Valid Name..'));
					return flag;
				});
			});