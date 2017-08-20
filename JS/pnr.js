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