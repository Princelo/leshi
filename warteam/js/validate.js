function validate(){
   var objForm = document.myform;
   var strTeamname = objForm.teamname.value;
   var strName = objForm.teamname.value;
   var member1name = objForm.member1name.value;var member1cd = objForm.member1cd.value;var member1id = objForm.member1id.value;var member2name = objForm.member2name.value;var member2cd = objForm.member2cd.value;var member2id = objForm.member2id.value;var member3name = objForm.member3name.value;var member3cd = objForm.member3cd.value;var member3id = objForm.member3id.value;var member4name = objForm.member4name.value;var member4cd = objForm.member4cd.value;var member4id = objForm.member4id.value;var member5name = objForm.member5name.value;var member5cd = objForm.member5cd.value;var member5id = objForm.member5id.value;
   var member6name = objForm.member6name.value;var member6cd = objForm.member6cd.value;var member6id = objForm.member6id.value;
   var member7name = objForm.member7name.value;var member7cd = objForm.member7cd.value;var member7id = objForm.member7id.value;
   if ((objForm.warzone[0].checked)&&(strTeamname == ""|| member1name =="" || member1cd == "" || member1id == ""|| member2name =="" || member2cd == "" || member2id == ""|| member3name =="" || member3cd == "" || member3id == ""|| member4name =="" || member4cd == "" || member4id == ""|| member5name =="" || member5cd == "" || member5id == "")){
      alert("输入信息不完整，请完整输入战队名称、比赛时区、A赛时区需填写五名以上队员信息");
      return false;
   }
   if (!objForm.warzone[0].checked && !objForm.warzone[1].checked){
       alert("请选择比赛时区");
       return false;
   }
   if((objForm.warzone[0].checked)&&(objForm.member6name.value!=""||objForm.member6cd.value!=""||objForm.member6id.value!="")){
        if(objForm.member6name.value=="" || objForm.member6cd.value=="" || objForm.member6id.value=="" )
            {alert('第六名队员信息不完整');return false;}
   }
   if((objForm.warzone[0].checked)&&(objForm.member7name.value!=""||objForm.member7cd.value!=""||objForm.member7id.value!="")){
        if(objForm.member7name.value=="" || objForm.member7cd.value=="" || objForm.member7id.value=="" )
            {alert('第七名队员信息不完整');return false;}
   }
   if((objForm.warzone[0].checked)&&(objForm.member6name.value==""&&objForm.member7name.value!="")){
       alert('请按顺序报名');return false;
   }
   if((!(objForm.warzone[0].checked)&&(objForm.warzone[1].checked))&&(strTeamname == ""|| member1name =="" || member1cd == "" || member1id == "")){
      alert("输入信息不完整，请完整输入战队名称、比赛时区、A赛时区需填写五名以上队员信息、B时区需填写一名以上队员信息!");
      return false;
   }
   if((objForm.member1name.value!=""||objForm.member1cd.value!=""||objForm.member1id.value!="")){
        if(objForm.member1name.value=="" || objForm.member1cd.value=="" || objForm.member1id.value=="")
            {alert('第一名队员信息不完整');return false;}
   }
   if((objForm.member2name.value!=""||objForm.member2cd.value!=""||objForm.member2id.value!="")){
        if(objForm.member2name.value=="" || objForm.member2cd.value=="" || objForm.member2id.value=="" )
            {alert('第二名队员信息不完整');return false;}
   }
   if((objForm.member3name.value!=""||objForm.member3cd.value!=""||objForm.member3id.value!="")){
        if(objForm.member3name.value=="" || objForm.member3cd.value=="" || objForm.member3id.value=="" )
            {alert('第三名队员信息不完整');return false;}
   }
   if((objForm.member4name.value!=""||objForm.member4cd.value!=""||objForm.member4id.value!="")){
        if(objForm.member4name.value=="" || objForm.member4cd.value=="" || objForm.member4id.value=="" )
            {alert('第四名队员信息不完整');return false;}
   }
   if((objForm.member5name.value!=""||objForm.member5cd.value!=""||objForm.member5id.value!="")){
        if(objForm.member5name.value=="" || objForm.member5cd.value=="" || objForm.member5id.value=="" )
            {alert('第五名队员信息不完整');return false;}
   }
   if((objForm.member6name.value!=""||objForm.member6cd.value!=""||objForm.member6id.value!="")){
        if(objForm.member6name.value=="" || objForm.member6cd.value=="" || objForm.member6id.value=="" )
            {alert('第六名队员信息不完整');return false;}
   }
   if((objForm.member7name.value!=""||objForm.member7cd.value!=""||objForm.member7id.value!="")){
        if(objForm.member7name.value=="" || objForm.member7cd.value=="" || objForm.member7id.value=="" )
            {alert('第七名队员信息不完整');return false;}
   }
   if(objForm.member7name.value!="")
       if(objForm.member6name.value==""||objForm.member5name.value==""||objForm.member4name.value==""||objForm.member3name.value==""||objForm.member2name.value=="")
   {alert('请按顺序报名');return false;}
   if(objForm.member6name.value!="")
       if(objForm.member5name.value==""||objForm.member4name.value==""||objForm.member3name.value==""||objForm.member2name.value=="")
           {alert('请按顺序报名');return false;}
   if(objForm.member5name.value!="")
       if(objForm.member4name.value==""||objForm.member3name.value==""||objForm.member2name.value=="")
           {alert('请按顺序报名');return false;}
   if(objForm.member4name.value!="")
       if(objForm.member3name.value==""||objForm.member2name.value=="")
           {alert('请按顺序报名');return false;}
   if(objForm.member3name.value!="")
       if(objForm.member2name.value=="")
           {alert('请按顺序报名');return false;}   
   if(!(isIdCardNo(member1cd)&&isIdCardNo(member2cd)&&isIdCardNo(member3cd)&&isIdCardNo(member4cd)&&isIdCardNo(member5cd)&&isIdCardNo(member6cd)&&isIdCardNo(member7cd)))
	    {alert('请填写正确身份证');return false;}

   if(objForm.warzone[1].checked){
       if(member1cd.length>0)str1 = (member1cd.charAt(16)%2==0)?"f":"m";
       if(member2cd.length>0)str2 = (member2cd.charAt(16)%2==0)?"f":"m";
       if(member3cd.length>0)str3 = (member3cd.charAt(16)%2==0)?"f":"m";
       if(member4cd.length>0)str4 = (member4cd.charAt(16)%2==0)?"f":"m";
       if(member5cd.length>0)str5 = (member5cd.charAt(16)%2==0)?"f":"m";
       if(member6cd.length>0)str6 = (member6cd.charAt(16)%2==0)?"f":"m";
       if(member7cd.length>0)str7 = (member7cd.charAt(16)%2==0)?"f":"m";
       if(str2.length>0&&str1!=str2){alert("B时区为男女分组赛，报名队员性别须一致，请修改。");return false;}
       if(str3.length>0&&str1!=str3){alert("B时区为男女分组赛，报名队员性别须一致，请修改。");return false;}
       if(str4.length>0&&str1!=str4){alert("B时区为男女分组赛，报名队员性别须一致，请修改。");return false;}
       if(str5.length>0&&str1!=str5){alert("B时区为男女分组赛，报名队员性别须一致，请修改。");return false;}
       if(str6.length>0&&str1!=str6){alert("B时区为男女分组赛，报名队员性别须一致，请修改。");return false;}
       if(str7.length>0&&str1!=str7){alert("B时区为男女分组赛，报名队员性别须一致，请修改。");return false;}
   }
}

function isIdCardNo(num)  
{ 
    var factorArr = new Array(7,9,10,5,8,4,2,1,6,3,7,9,10,5,8,4,2,1); 
    var error; 
    var varArray = new Array(); 
    var intValue; 
    var lngProduct = 0; 
    var intCheckDigit; 
    var intStrLen = num.length; 
    var idNumber = num;     
    // initialize 
	if(intStrLen==0)return true;
    if ((intStrLen!=0)&&(intStrLen != 15) && (intStrLen != 18)) { 
        //error = "输入身份证号码长度不对！"; 
        //alert(error); 
        //frmAddUser.txtIDCard.focus(); 
        return false; 
    }     
    // check and set value 
    for(i=0;i<intStrLen;i++) { 
        varArray[i] = idNumber.charAt(i); 
        if ((varArray[i] < '0' || varArray[i] > '9') && (i != 17)) { 
            //error = "错误的身份证号码！."; 
            //alert(error); 
            //frmAddUser.txtIDCard.focus(); 
            return false; 
        } else if (i < 17) { 
            varArray[i] = varArray[i]*factorArr[i]; 
        } 
    } 
    if (intStrLen == 18) { 
        //check date 
        var date8 = idNumber.substring(6,14); 
        if (checkDate(date8) == false) { 
            //error = "身份证中日期信息不正确！."; 
            //alert(error); 
            return false; 
        }         
        // calculate the sum of the products 
        for(i=0;i<17;i++) { 
            lngProduct = lngProduct + varArray[i]; 
        }         
        // calculate the check digit 
        intCheckDigit = 12 - lngProduct % 11; 
        switch (intCheckDigit) { 
            case 10: 
                intCheckDigit = 'X'; 
                break; 
            case 11: 
                intCheckDigit = 0; 
                break; 
            case 12: 
                intCheckDigit = 1; 
                break; 
        }         
        // check last digit 
        if (varArray[17].toUpperCase() != intCheckDigit) { 
            //error = "身份证效验位错误!...正确为： " + intCheckDigit + "."; 
            //alert(error); 
            return false; 
        } 
    }  
    else{        //length is 15 
        //check date 
        var date6 = idNumber.substring(6,12); 
        if (checkDate(date6) == false) { 
            //alert("身份证日期信息有误！."); 
            return false; 
        } 
    } 
    //alert ("Correct."); 
    return true; 
} 

function checkDate(date) 
{ 
    return true; 
} 

