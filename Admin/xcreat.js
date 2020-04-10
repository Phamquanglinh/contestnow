
function creat() {
var data="";
var total_question=document.getElementById('total_question').value;
for(i=1;i<=total_question;i++){
    data+='<tr>';
    data+='<th><label>Câu '+i+'</label></th>';
    data+='<td><input id="ques"name="ques_'+i+'"type="text"></td></tr>';
    data+='<tr>';
    data+='<td><label>A.</label></td>';
    data+='<td><input id="asw"name="a_'+i+'"type="text"></td></tr>';
    data+='<td><label>B.</label></td>';
    data+='<td><input id="asw"name="b_'+i+'"type="text"></td></tr>';
    data+='<td><label>C.</label></td>';
    data+='<td><input id="asw"name="c_'+i+'"type="text"></td></tr>';
    data+='<td><label>D.</label></td>';
    data+='<td><input id="asw"name="d_'+i+'"type="text"></td></tr>';
    data+='<td><label>Đáp án đúng</label></td>';
    data+='<td><input id="correct"name="correct_'+i+'"type="text"><br></td></tr>';
    data+='<tr class="clear"></tr>';
}
data='<table>'+data+'</table>';
document.getElementById('question').innerHTML=data;













}