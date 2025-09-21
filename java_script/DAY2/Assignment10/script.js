var userinput=prompt("pls Enter a sentence wihtout spacing")
userinput=userinput.replace(/\s+/g, "").toLowerCase()
var charResheaher=prompt("pls Enter a char that you want find his index").toLowerCase()
function searchF(s,r){
let result=[]
for( let i=0 ; i <s.length ;i++){
    if(s[i]== r){
        result.push(i+1);
    }
}
return result;
}
 var print=searchF(userinput,charResheaher)
document.writeln( print.length>0?`the char "${charResheaher}"is in these index: ${print.join(", ")}`:`the char "${charResheaher}" was not found  `);