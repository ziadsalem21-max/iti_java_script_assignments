let userinput= prompt("pls enter the series of string sepraded by space")
let statments= userinput.split(" ")

function captialiesF(arr){ 
    for(i =0 ;i<arr.length;i++){
      arr[i]=arr[i][0].toUpperCase()+arr[i].slice(1)
        
    }
    }
document.writeln(`<h2>the series have you entered Befor captialies:  ${statments.join(" ")}</h2> <br><br>`)
captialiesF(statments)
document.writeln(`<h2>the series have you entered  After captialies: ${statments.join(" ")}</h2> <br><br>`)