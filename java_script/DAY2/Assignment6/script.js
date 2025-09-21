function eCoutner() {
    let counter = 0
    var userinput = prompt("pls Enter you string Here").toLowerCase()
    for (let i = 0; i < userinput.length; i++) {
        if (userinput[i] === "e") {
            counter++
        }

    }
    document.writeln(`<h1> the count of E in the text is: ${counter}</h1>`)

}
eCoutner();