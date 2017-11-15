/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function getsector(id,txt,id2)
{
    var res,st
    if (txt!=="")
    {
        $.get("getsector.php",{data: txt, id2: id2, id: id},function(res, st)
        {
             if(st=="success")
             {
                 document.getElementById(id).innerHTML=res;
                 document.getElementById(id).style="visibility: visible;";
             }
        }
                
        );
       
    }
}


function setsector(id2,txt,id)
{
    document.getElementById(id2).value=txt;
    document.getElementById(id).style="visibility: hidden;";
}




function calculate(id)
{
    var c,r,t;
    if(document.getElementById('capacity').value!=="")
    {
        if(document.getElementById('total_price').value!=="")
        {
           r=parseFloat(document.getElementById('total_price').value)/parseInt(document.getElementById('capacity').value);
        }
    }
    document.getElementById('rate').value=Math.round(r);
    document.getElementById('sell_price').value=Math.round(r);
}


function getage(datestr)
{
    birth_month= parseInt(datestr.substr(5,2));
    birth_day= parseInt(datestr.substr(8,2));
    birth_year= parseInt(datestr.substr(0,4));
    today_date = new Date();
    today_year = today_date.getFullYear();
    today_month = today_date.getMonth();
    today_day = today_date.getDate();
    age = today_year - birth_year;

    if ( today_month < (birth_month - 1))
    {
        age--;
    }
    if (((birth_month - 1) == today_month) && (today_day < birth_day))
    {
        age--;
    }
    document.getElementById('c_age').value= age;
}