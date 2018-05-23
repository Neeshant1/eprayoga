'use strict';

var appRouter1;

	function validateAdhar(aadharNo){
     if(/^\d{4}\s\d{4}\s\d{4}$/.test(aadharNo))
        return true;
     return true;
    }
    
   function validateEmail(mailId){
    if (/^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/.test(mailId))
       //if (/^\w+([\.-]?\ w+)*@\w+([\.-]?\ w+)*(\.\w{2,3})+$/.test(mailId))
            return true;
       return false;
   }

   function validateFb(fbId){
       if ( /^[a-zA-Z][0-9a-zA-Z\r\n@!_#\$\^%&*()+=\-\[\]\\\';,\.\/\{\}\|\":<>\?]+$/.test(fbId))
            return true;
       return false;
   }

   function validateTax(taxId){
       if ( /^[a-zA-Z][0-9a-zA-Z\r\n@!_#\$\^%&*()+=\-\[\]\\\';,\.\/\{\}\|\":<>\?]+$/.test(taxId))
            return true;
       return false;
   }

   function validategst(gst){
       if ( /^[a-zA-Z0-9\-]+$/.test(gst))
            return true;
       return false;
   }

   function validateName(nameId){
       if ( /^[a-zA-Z\s]+$/.test(nameId))
            return true;
       return false;
   }
   function validateunivrsitycode(nameId){
       if ( /^[a-zA-Z0-9\s]+$/.test(nameId))
            return true;
       return false;
   }
   function validateNumber(mobileId){
       if ( /^[0-9\-]+$/.test(mobileId))
            return true;
       return false;
   }

   function validateMobile(mobileId){
       if ( /^(?:\s+|)((0|(?:(\+|)91))(?:\s|-)*(?:(?:\d(?:\s|-)*\d{9})|(?:\d{2}(?:\s|-)*\d{8})|(?:\d{3}(?:\s|-)*\d{7}))|\d{10})(?:\s+|)$/.test(mobileId))
            return true;
       return false;
   }

   function validateDept(deptId){
       if ( /^[a-zA-Z][a-zA-Z-.&\s]+$/.test(deptId))
            return true;
       return false;
   }

   
   function validateTextArea(text){
      if(text == '')
        return false;
      return true;
   }
   
  function validateSelect(value){
    if((value == '') || (value == null))
      return false;
    return true;
  }

  function validatePositiveNumber(val){
    return /^\+?(0|[1-9]\d*)$/.test(val);
  }
  function validateNumberone(mobileId){
       if ( /^[0-9\.\-]+$/.test(mobileId))
            return true;
       return false;
   }

	console.log('getting ready validation');
    appRouter1 = new admin.AdminAppRouter();
    console.log('View is Ready');