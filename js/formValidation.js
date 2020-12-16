
async function submitForm () {
    try {
        const name = document.getElementById('name').value
        const email = document.getElementById('email').value
        const subject = document.getElementById('subject').value
        const message = document.getElementById('message').value

        console.log("Input", name, email, subject, message)

    }catch (e) {
        console.error("Error", e)
    }
}