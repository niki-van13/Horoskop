
async function initSite() {
    getHoroscope()
}

async function getHoroscope() {
    let horoscope = document.getElementById("printHoroscope")
    let collectedDate = await makeRequest("./server/viewHoroscope.php", "GET", undefined)
    console.log(collectedDate) 
    
    horoscope.innerText = collectedDate 

    if(collectedDate == false) {
        horoscope.innerText = ""
    }

}

async function addHoroscope() {
    let dateInput = document.getElementById("dateInput").value
    let horoscope = document.getElementById("printHoroscope")
    let body = new FormData()
    body.set("date", dateInput)
    let serverResponse = await makeRequest("./server/addHoroscope.php", "POST", body) 
    console.log(serverResponse)
   
    horoscope.innerText = getHoroscope()

}

async function deleteHoroscope() {
    let horoscope = document.getElementById("printHoroscope")
    let deleteRequest = await makeRequest("./server/deleteHoroscope.php", "DELETE", undefined)

    if(horoscope !== "") {
        horoscope.innerText = ""
        console.log(deleteRequest)
    }

}

async function updateHoroscope() {
    let dateInput = document.getElementById("dateInput").value
    let horoscope = document.getElementById("printHoroscope") 
    let body = new FormData()
    body.set("date", dateInput)
    let updateRequest = await makeRequest("./server/updateHoroscope.php", "POST", body)

    if(updateRequest === true) {
        horoscope.innerText = getHoroscope()
    }

        else {
            horoscope.innerText =   getHoroscope();
        }

}


async function makeRequest(path, method, body) { //Tar in 3 parametrar.
    try {
        let response = await fetch(path, {
            method, 
            body 
        })
        console.log(response)
        return await response.json()
    }   
        catch(e) {
        console.error("Couldnt fetch") 
    }
}

window.addEventListener("load", initSite)
document.getElementById("saveBtn").addEventListener("click", addHoroscope)
document.getElementById("updateBtn").addEventListener("click", updateHoroscope)
document.getElementById("deleteBtn").addEventListener("click", deleteHoroscope) 
