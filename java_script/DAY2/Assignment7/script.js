
function palindromeCheck() {
    var statusOfWork = confirm("if you want case senstive click ok")
    var result = ""
    let reverseinput = ""
    if(statusOfWork){
        var userinput = prompt("pls Enter you string Here")
    for (let j = ((userinput.length) - 1); j >= 0; j--) {
        reverseinput +=userinput[j]
    }
    if (userinput ===reverseinput) {
        result = "the text you enterd is palingrome"
    }
    else {
        result = "the text you enterd is not palingrome"
    }
    document.writeln(`<h1>
    ${result}</h1>`)
    }
    else{
        var userinput = prompt("pls Enter you string Here")
    for (let j = ((userinput.length) - 1); j >= 0; j--) {
        reverseinput +=userinput[j]
    }
    if (userinput.toLowerCase() ===reverseinput.toLowerCase()) {
        result = "the text you enterd is palingrome"
    }
    else {
        result = "the text you enterd is not palingrome"
    }
    document.writeln(`<h1>
    ${result}</h1>`)
    }
    
}
palindromeCheck()
